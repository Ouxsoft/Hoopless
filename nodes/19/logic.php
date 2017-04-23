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

// set stats
$instance->render['player_stat'] = array();
foreach($player->stats as $key => $value){
	$player->stats[$key]['current'] =  mt_rand(0,1);
	$instance->render['player_stat'][] = array(
		'key' => $key,
		'value' => number_format($player->stats[$key]['current']/1 * 100, 2)
	);

}

$player->vital_check();

// set afflictions based on stats
foreach($player->afflictions as $key => $value) {
	$instance->render['player_afflictions'][] = $key;
}
?>
