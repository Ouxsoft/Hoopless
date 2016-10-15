<div class="container background-white"><h2>WAR Game Engine</h2>
<div class="alert alert-info" role="alert">Here is a brief update on designing and developing the unfinished game engine.</div><p>There are numerous elements that I intend to implement in my unique "WAR game engine", some of which I originally conceptualized over a decade ago.</p><p>One such example is the wait, action, and recovery system that the engine's name is derived from. In this system, a character's action has a period they must wait before performing an action. The action itself occurs only after the user has waited the required time to perform the action. After the action occurs, the character must recover from the action for a specified period of time. Time periods are dependent on the action and the characters skill level at performing the action. They can vary depending on the action from nonexistent to over a minute. Although most wait, action, and recovery times are static, durations may be dynamic and based on user input. For example, a user may hold a button down to perform a charged attack or be forced to press a button repeatedly until they are recovered from an action.</p><p>Based on this concept, I began adding the wait, action, and recovery functionality to the engine. Note this is still unfinished.</p><h3>Code</h3><pre>
/* This is a work in progress. The final version is likely to involve WebSockets */

// setup db
$config = parse_ini_file("game-config.ini.php");
$db = new database($config["host"], $config["user"], $config["password"], $config["dbname"]);

class game_instance {
	private $char;
	
	function __construct() {
		$this->process_queue();
		$this->vital_check();
	}
	
	private function process_queue(){
		global $db;
		// process wait queues
		$results = $db->query("SELECT `action_queue_id`, `char_id`, `action_id` FROM `action_queue` WHERE `category` = 'wait' AND `expiration` < NOW() AND `expiration` IS NOT NULL;");
		foreach($results as $row){
			$db->bind("action_queue_id",$row["action_queue_id"]);
			$db->query("UPDATE `action_queue` SET `category` = 'action' WHERE `action_queue_id` = :action_queue_id LIMIT 1;");
		}
		
		// process actions on effected targets

		// determine skills area of effect / todo
		$aoe = array(
			"x" => array("min" => 0,"max" => 10),
			"y" => array("min" => 0,"max" => 10),
			"z" => array("min" => 0,"max" => 10),
		);
		
		// determine who/what is affected 
		$db->bind("x_min",$aoe["x"]["min"]);
		$db->bind("x_max",$aoe["x"]["max"]);
		$db->bind("y_min",$aoe["y"]["min"]);
		$db->bind("y_max",$aoe["y"]["max"]);
		$db->bind("z_min",$aoe["z"]["min"]);
		$db->bind("z_max",$aoe["z"]["max"]);
		$results = $db->query("SELECT `character_id` FROM `gis` WHERE `x_pos` BETWEEN :x_min AND :x_max AND `y_pos` BETWEEN :y_min AND :y_max AND `z_pos` BETWEEN :z_min AND :z_max;");
		foreach($results as $row){
			echo "character #{$row["character_id"]} was affected";
		}
		
		// only if character succeeds in performing move should count ++
	}
	
	function action(&$char, $action_id) {
		global $db;
		$this->char = &$char;

		// retrieve base w.a.r. times
		$db->bind("char_id", $char->info["id"]);
		$db->bind("action_id", $action_id);
		$row = $db->row("SELECT  `wait_modifier`, `wait_time`,  `action_time`,  `action_modifier`,  `recovery_time`,  `recovery_modifier` FROM  `actions` LEFT JOIN  `char_actions` ON  `actions`.`action_id` =  `char_actions`.`action_id` WHERE  `char_actions`.`char_id` = :char_id AND `char_actions`.`action_id` = :action_id LIMIT 1;");

		// modify w.a.r. timers based on character's proficiency
		// todo
		
		// add static w.a.r. times to action_que fix
		$db->bind("char_id", $char->info["id"]);
		$db->bind("action_id", $action_id);
		$db->bind("wait_time", $row["wait_time"]); // occurs now
		$db->query("INSERT INTO `action_queue` (`char_id`,`action_id`, `category`, `expiration`) VALUES (:char_id, :action_id, 'wait', ADDTIME(NOW(), :wait_time)) ON DUPLICATE KEY UPDATE `expiration` = NOW(), `bonus`=`bonus` + 1;");
		
		// add support for dynamic w.a.r. times
		// dynamic moves use up constant amount of resources until resources run out or until canceled.
		// dynamic wait timers - allow the user to put more resources into the maneuver 
		// (example: user holds circle to put more stamina into Jump)
		// dynamic action timers - allow for the action to have an extended duration 
		// (example: Warding of a monster for a static duration of time)
		// dynamic recovery timer - make it harder for a player to recovery 
		// (example: a player must press Action button until they recover)
	}
	
	public function vital_check(){
		// routine check of characters vitals 
		global $db;

		// apply cooresponding affliction if any base stats are 0
		$base_check = array(
			"life_value" => 7, // too weak to move
			"strength_value" => 1, // too weak to move
			"agility_value" => 2, // too clumsy to move
			"stamina_value" => 3, // too fatigued to move
			"intellect_value" => 4, // too feeble minded to move
			"spirit_value" => 5, // without the morale to move
			"charisma_value" => 6, // without the resolve to move
		);
		$results = $db->query("SELECT `char_id`, `life_value`, `strength_value`, `agility_value`, `stamina_value`, `intellect_value`, `spirit_value`, `charisma_value` FROM `char_stats` WHERE `life_value` = 0 OR `strength_value` = 0 OR `agility_value` = 0 OR `stamina_value` = 0 OR `intellect_value` = 0 OR `spirit_value` = 0 OR `charisma_value` = 0;");
		foreach($results as $row){
			foreach($base_check as $key => $value){
				if($row[$key]==0){
					$db->bind("char_id",$row["char_id"]);
					$db->bind("affliction_id",$value);
					if($db->single("SELECT 1 FROM `char_afflictions` WHERE `char_id` = :char_id AND `affliction_id` = :affliction_id;")!==1){	
						$db->bind("char_id",$row["char_id"]);
						$db->bind("affliction_id",$value);
						$db->query("INSERT INTO `char_afflictions` (`char_id`,`affliction_id`) VALUES (:char_id,:affliction_id);");
					}
				}
			}
		}
		// remove invalid afflictions maybe do this during action script...
	}

	public function roll($roll_max = null, $roll_min = 0){ // determines a character's chances of success
		$luck_min = 0;
		$luck_applicable = mt_rand(0, $this->char->stats["luck_value"]) + 1; // luck is not always applicable
		$roll_outcome =  round(mt_rand($roll_min, $roll_max),2) + ($luck_applicable * 0.1);
		
		if ($roll_outcome > $roll_max) {$roll_outcome = $roll_max;} 
		
		// adjust luck based on roll_outcome and the applicability of luck
		if ($roll_outcome > ($roll_max * 0.618)) { // luck increases
			if ($this->char->stats["luck_value"] <= $luck_min) {
				$this->char->stats["luck_value"]++;
			} else { 
				$this->char->stats["luck_value"] += $luck_applicable;
			}
			if ($this->char->stats["luck_value"] > $this->char->stats["luck_max"]) { $this->char->stats["luck_value"] = $this->char->stats["luck_max"]; }
		} else if ($roll_outcome < ($roll_max * 0.382)) { // luck decreases
			$this->char->stats["luck_value"] -= $luck_applicable;    
			if ($this->char->stats["luck_value"] < $luck_min) { $this->char->stats["luck_value"] = 0; }
		}
		return $roll_outcome;
	}
}
class character {
	public $info;
	public $stats;
	public $gauges;
	public $afflictions;
	public $dtm; 
	public $immunities;
	public $gear;

	public function __construct($char_id) {
		global $db;
		// "level" => 10, // basic assessment of skill level
		// level = function level(experience)
		// experience = character sum of action experience  
		
		$db->bind("char_id", $char_id);
		$this->info = $db->row("SELECT `char_id` AS `id`, CONCAT(`first_name`, ' ',`last_name`) AS `name` FROM `chars` WHERE `char_id` = :char_id LIMIT 1;");
		
		// damage type modifiers
		$this->dtm = array("nature" => 0, "electric" => 0, "fire" => 0, "water" => 0, "air" => 0, "earth" => 0, "darkness" => 0, "light" => 0, "physical" => 0, "psychic" => 0, );
	
		// load afflictions
		$db->bind("char_id", $char_id);
		$this->afflictions = $db->query("SELECT `afflictions`.`affliction_id` AS `id`, `afflictions`.`name` FROM `char_afflictions` LEFT JOIN `afflictions` ON `char_afflictions`.`affliction_id` = `afflictions`.`affliction_id` WHERE `char_id` = :char_id;");
				
		// load character stats (all stats are gauges)
		// figure how to handle "weight" => array("value"=>10,"modifers"=>10,"value"=>10), // used for checks

		$db->bind("char_id", $char_id);
		$this->stats = $db->row("SELECT `life_value`, `drive_value`, `strength_value`, `agility_value`, `stamina_value`, `intellect_value`, `spirit_value`, `charisma_value`, `luck_value`, `luck_max` FROM `char_stats` WHERE `char_id` = :char_id LIMIT 1;");
	}
	
	public function stat_check($stat){
		// for checks character stats are rolled based on maximum potential and are generally close to orignal stats with some variation
		return ($this->roll($this->stats[$stat]["value"])+$this->stats[$stat]["value"])*0.618;
	}
}

$player1 = new character(1);
$player2 = new character(1);

$game_instance = new game_instance();
$game_instance->action($player1, 1);
</pre>
</div>