<?php
class character {
	public $roll;
	public $stats;
	public $afflictions;

	public function __construct () {
		// afflictions["name"] = expiration datetime or true if does not expire;
		$this->afflictions = array();
		
		// load character stats
		$this->stats = array(
			// strength-to overcome physical challenges and apply physical damage 
			"strength" => array("current" => 0, "natural" => 0),
			// agility-to move quickly and accurately and evade
			"agility" => array("current" => 0, "natural" => 0),
			// stamina-to endure damage and fatigue
			"stamina" => array("current" => 0, "natural" => 0),
			// intellect-to understand and comprehend things
			"intellect" => array("current" => 0, "natural" => 0),
			// spirit-to restore self and others
			"spirit" => array("current" => 0, "natural" => 0),
			// charisma-to lead and deceive others
			"charisma" => array("current" => 0, "natural" => 0),
			// luck - influences success rate
			"luck" => array("current" => 0, "natural" => 0, "min" => 0, "max" => 100, "applicable" => 0,),
		);
		$this->roll = array("outcome" => 0, "min" => 0, "max" => 100,);
	}
	
	public function vital_check(){
		/* 
		routine check of characters vitals 
		*/
		
		// apply cooresponding affliction if any base stats are 0
		$base_check = array(
			"strength" => "weak", // too weak to move
			"agility" => "clumsy", // too clumsy to move
			"stamina" => "fatique", // too fatigued to move
			"intellect" => "feeble", // too feeble minded to move
			"spirit" => "spiritless", // without the morale to move
			"charisma" => "lost", // without the resolve to move
		);
		foreach($base_check as $key => $value){
			if($this->stats[$key]["current"]==0){
				$this->afflictions[$value] = true;
			} else if($this->stats[$key]["current"]>0){
				unset($this->afflictions[$value]);
			}
		}
	}
	
	public function roll($max = null){
		/* 
		a roll is used to determines a character's chances of success, which is influenced by luck
		luck is designed to be variable and elusive in both is value, ability to change, and applicability. 
		*/
		if(isset($max)){$this->roll["max"];}
		$this->stats["luck"]["applicable"] = mt_rand(0, $this->stats["luck"]["current"]) + 1; // luck is not always applicable
		$this->roll["outcome"] =  round(mt_rand($this->roll["min"], $this->roll["max"]),2) + ($this->stats["luck"]["applicable"] * 0.1);
		
		if ($this->roll["outcome"] > $this->roll["max"]) {$this->roll["outcome"] = $this->roll["max"];} 
		
		// adjust luck based on roll_outcome and the applicability of luck
		if ($this->roll["outcome"] > ($this->roll["max"] * 0.618)) { // luck increases
			if ($this->stats["luck"]["current"] <= $this->stats["luck"]["min"]) {
				$this->stats["luck"]["current"]++;
			} else { 
				$this->stats["luck"]["current"] += $this->stats["luck"]["applicable"];
			}
			if ($this->stats["luck"]["current"] > $this->stats["luck"]["max"]) { $this->stats["luck"]["current"] = $this->stats["luck"]["max"]; }
		} else if ($this->roll["outcome"] < ($this->roll["max"] * 0.382)) { // luck decreases
			$this->stats["luck"]["current"] -= $this->stats["luck"]["applicable"];    
			if ($this->stats["luck"]["current"] < $this->stats["luck"]["min"]) { $this->stats["luck"]["current"] = 0; }
		}
		return $this->roll["outcome"];
	}
}

$player = new character();

echo "<div class=\"container background-white\">";
echo "<h2>Afflictions</h2>";
echo "<p>When developing a game engine you are essentially programming an entire world and defining the rules in which it operates. For my latest game engine, I wanted the effectiveness of each character's abilities to be determined based on their base stats. As each character grows more powerful, their base stats should improve in a manner that is related to their selected discipline which should be related to their actions. Different character types should be reliant on completely different base stats.  For example a warrior should be more reliant on strength than a healer. In addition, whenever any of a character's base stats except luck are equal to 0 the character should gain an affliction that prevents them from taking action.</p><p>Based on this concept, I theorized the below listed stats and afflictions and coded the following class.</p>";
echo "<h3>Code</h3>";
?>
<pre>
class character {
	public $roll;
	public $stats;
	public $afflictions;

	public function __construct () {
		// afflictions["name"] = expiration datetime or true if does not expire;
		$this->afflictions = array();
		
		// load character stats
		$this->stats = array(
			// strength-to overcome physical challenges and apply physical damage 
			"strength" => array("current" => 0, "natural" => 0),
			// agility-to move quickly and accurately and evade
			"agility" => array("current" => 0, "natural" => 0),
			// stamina-to endure damage and fatigue
			"stamina" => array("current" => 0, "natural" => 0),
			// intellect-to understand and comprehend things
			"intellect" => array("current" => 0, "natural" => 0),
			// spirit-to restore self and others
			"spirit" => array("current" => 0, "natural" => 0),
			// charisma-to lead and deceive others
			"charisma" => array("current" => 0, "natural" => 0),
			// luck - influences success rate
			"luck" => array("current" => 0, "natural" => 0, "min" => 0, "max" => 100, "applicable" => 0,),
		);
		$this->roll = array("outcome" => 0, "min" => 0, "max" => 100,);
	}
	
	public function vital_check(){
		/* 
		routine check of characters vitals 
		*/
		
		// apply cooresponding affliction if any base stats are 0
		$base_check = array(
			"strength" => "weak", // too weak to move
			"agility" => "clumsy", // too clumsy to move
			"stamina" => "fatique", // too fatigued to move
			"intellect" => "feeble", // too feeble minded to move
			"spirit" => "spiritless", // without the morale to move
			"charisma" => "lost", // without the resolve to move
		);
		foreach($base_check as $key => $value){
			if($this->stats[$key]["current"]==0){
				$this->afflictions[$value] = true;
			} else if($this->stats[$key]["current"]>0){
				unset($this->afflictions[$value]);
			}
		}
	}
	
	public function roll($max = null){
		/* 
		a roll is used to determines a character's chances of success, which is influenced by luck
		luck is designed to be variable and elusive in both is value, ability to change, and applicability. 
		*/
		if(isset($max)){$this->roll["max"];}
		$this->stats["luck"]["applicable"] = mt_rand(0, $this->stats["luck"]["current"]) + 1; // luck is not always applicable
		$this->roll["outcome"] =  round(mt_rand($this->roll["min"], $this->roll["max"]),2) + ($this->stats["luck"]["applicable"] * 0.1);
		
		if ($this->roll["outcome"] > $this->roll["max"]) {$this->roll["outcome"] = $this->roll["max"];} 
		
		// adjust luck based on roll_outcome and the applicability of luck
		if ($this->roll["outcome"] > ($this->roll["max"] * 0.618)) { // luck increases
			if ($this->stats["luck"]["current"] <= $this->stats["luck"]["min"]) {
				$this->stats["luck"]["current"]++;
			} else { 
				$this->stats["luck"]["current"] += $this->stats["luck"]["applicable"];
			}
			if ($this->stats["luck"]["current"] > $this->stats["luck"]["max"]) { $this->stats["luck"]["current"] = $this->stats["luck"]["max"]; }
		} else if ($this->roll["outcome"] < ($this->roll["max"] * 0.382)) { // luck decreases
			$this->stats["luck"]["current"] -= $this->stats["luck"]["applicable"];    
			if ($this->stats["luck"]["current"] < $this->stats["luck"]["min"]) { $this->stats["luck"]["current"] = 0; }
		}
		return $this->roll["outcome"];
	}
}
</pre>
<?php
echo "<h3>Example <button class=\"btn btn-primary\" onclick=\"javascript:window.location.href='javascript:history.go(0)'\">Refresh <span class=\"glyphicon glyphicon glyphicon-refresh\" aria-hidden=\"true\"></span></button></h3>";
echo "<div class=\"row\">";
foreach($player->stats as $key => $value){
	$player->stats[$key]["current"] = mt_rand(0,1);
	$pb_percent = number_format($player->stats[$key]["current"]/1 * 100, 2);	
	echo "<div class=\"col-md-4\">";
	echo "{$key}<div class=\"progress\"><div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"{$pb_percent}\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:{$pb_percent}%\">{$pb_percent}%</div></div>";
	echo "</div>";
}
echo "</div>";
$player->vital_check();
echo "<p>Afflictions:<p><p>";
foreach($player->afflictions as $key => $value) {
	echo "<span class=\"badge\">{$key}</span> ";
}
echo "</p>";
echo "</div>";
?>
        