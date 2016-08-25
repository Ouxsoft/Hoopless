<?php
/* 
This is a work in progress likely the final version will involve WebSockets
will need to seporate the affected from action initialize
*/

// setup db
$config = parse_ini_file("game-config.ini.php");
$db = new database($config["host"], $config["user"], $config["password"], $config["dbname"]);

class game_instance {
	private $char;
	/* Attacking, how it works – First to determine if the target is hittable there must be a tile comparison that checks the range of the attack and the characters location. To see how an attack hits the target an Accuracy to Evasion check is made. To determine how much damage is done a Power to Defense check must be made. The remaining Power left over after the check is the damage dealt. It essential works like so:

	Step 1) action occurs
	Step 2) tile comparison made = True / False (is the target hittable?)
	Step 3) accuracy - evasion = Hit (how good did I hit him?)
	Step 4) power * hit - defense = Damage (did I do damage?)
	Step 5) Remainder * DTM = Damage (how much?)
	Step 6) Display damage
	*/
	
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
		// dynamic wait timers – allow the user to put more resources into the maneuver 
		// (example: user holds circle to put more stamina into Jump)
		// dynamic action timers – allow for the action to have an extended duration 
		// (example: Warding of a monster for a static duration of time)
		// dynamic recovery timer – make it harder for a player to recovery 
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
	
	/*
	Damage Formula
	Hit = check (User’s Accuracy) – check (Target’s Evasion)
	Critical bonus = round ((Hit – 18) / 9)

	Roll (Mod Dice) = (Random (0 – Mod Dice) * .01 + 1) * (Random (0 – Luck) *.01 + 1))
	Mod Dice (Dice) = Dice + Dice * (((Power + Power Resources) – (Defense + Defense Resources)) * .01)

	Damage from one dice = Roll (Dice) * (Target’s DTM (type) *.01 + 1)

	Damage = Roll (Dice)
	Dices = Standard Roll Amount + Critical bonus

	Action Example:
	4d8, 2d12fire, %50burn,

	Total Damage = { }
	Damage = Roll (standard + critical bonus) (maximum damage) (DTM)

	Damage Done = Round (((Power + Resource Bonus) * (0.01 * (Accuracy – Evasion) + 1) – Defense) * (DTM *.01 + 1))
	*If Damage is less than 0 then Damage done equal 0
	*If Evasion is greater then Accuracy then Hit Type equals “Miss” and no Damage is done
	*/
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



/*
SELECT  `pages`.`id` ,  `parent_id` ,  `name` ,  `link` 
FROM  `pages` 
LEFT JOIN  `page_permissions` ON  `pages`.`id` =  `page_permissions`.`page_id` 
WHERE  `state` =  'active'
AND  `menu_item` =1
ORDER BY  `parent_id` ,  `link` 

$menu = array(
	array("title" => "Home", "link" => "home.html"),
	array("title" => "Portfolio", "link" => "portfolio.html",
		"submenu" => array(
			array("title" => "Web Design & Development", "link" => "portfolio/web-design-and-development.html",),
			array("title" => "Art Design", "link" => "portfolio/art-design.html"),
			array("title" => "Robotic Programming", "link" => "portfolio/robotics-development.html",),
			array("title" => "Game Design", "link" => "portfolio/game-design.html",),
		),
	),
	array("title" => "Snippets", "link" => "snippets.html"),
	array("title" => "Resume", "link" => "resume.html"),
	array("title" => "Contact", "link" => "contact.html", "class" => "outline"),
);
*/

//www.linkedin.com/in/mrheroux

?>

