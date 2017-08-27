<?php
// actually you can add these later maybe as &? uses a switch statement
// consider get($atribute)
// consider set($attribute, $value)

/*
Designed by Matt Heroux (c) 2008-2016
*/
class character {
	public $luck;
	public $roll;

	public function __construct () {
		// load character stats
		$this->luck = array(
			"current" => 0,
			"natural" => 0,
			"min" => 0,
			"max" => 100,
			"applicable" => 0,
		);
		$this->roll = array(
			"outcome" => 0,
			"min" => 0,
			"max" => 100,
		);
	}
	public function roll($max = null){
		/*
		a roll is used to determines a character's chances of success, which is influenced by luck.
		luck is designed to be variable and elusive in both is value, ability to change, and applicability.
		*/
		if(isset($max)){$this->roll["max"];}
		$this->luck["applicable"] = mt_rand(0, $this->luck["current"]) + 1; // luck is not always applicable
		$this->roll["outcome"] =  round(mt_rand($this->roll["min"], $this->roll["max"]),2) + ($this->luck["applicable"] * 0.1);

		if ($this->roll["outcome"] > $this->roll["max"]) {$this->roll["outcome"] = $this->roll["max"];}

		// adjust luck based on roll_outcome and the applicability of luck
		if ($this->roll["outcome"] > ($this->roll["max"] * 0.618)) { // luck increases
			if ($this->luck["current"] <= $this->luck["min"]) {
				$this->luck["current"]++;
			} else {
				$this->luck["current"] += $this->luck["applicable"];
			}
			if ($this->luck["current"] > $this->luck["max"]) { $this->luck["current"] = $this->luck["max"]; }
		} else if ($this->roll["outcome"] < ($this->roll["max"] * 0.382)) { // luck decreases
			$this->luck["current"] -= $this->luck["applicable"];
			if ($this->luck["current"] < $this->luck["min"]) { $this->luck["current"] = 0; }
		}
		return $this->roll["outcome"];
	}
}

$player = new character();
$page->render['roll_example'] = array();

for ($i = 0; $i < 10; $i++) {
	$roll = $player->roll(100);
	$page->render['roll_example'][] = array(
		'roll' => $roll,
		'roll_max' => $player->roll['max'],
		'roll_percent' => number_format($roll/$player->roll['max'] * 100, 2),
		'luck_applicable' => $player->luck['applicable'],
		'luck_current' => $player->luck['current'],
		'luck_max' => $player->luck['max'],
		'luck_percent' => number_format($player->luck['applicable']/$player->luck['current'] * 100, 2),
	);
}
?>
