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

echo "<div class=\"container background-white\">";
echo "<h2>Luck</h2>";
echo "<p>The concept of luck is a perplexing problem to approach programmatically because of its intangibility. You are either lucky or you are not and your luck can change depending on the situation. You shouldn't be lucky all the time or unlucky all the time for that matter. Everyone's luck should be in a constant state of change. Luck should only be a contributing factor to help determine whether an action is a success and not necessarily the deciding factor. It should be elusive in value, its ability to change, and applicability.</p>";
echo "<p>Based on this vision of how luck works, I created the following roll class for use in my latest game engine, which is used to determine a character's chances of succeeding at an action and is influenced by luck. I originally programmed this in C#, but I ported the following portion of the class to PHP.</p>";
echo "<h3>Code</h3>";
?>
<pre>
<code class="language-php">
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
</code></pre>
<?php
echo "<h3>Example <button class=\"btn btn-primary\" onclick=\"javascript:window.location.href='javascript:history.go(0)'\">Refresh <span class=\"glyphicon glyphicon glyphicon-refresh\" aria-hidden=\"true\"></span></button></h3>";

for ($i = 0; $i < 10; $i++) {
	echo "<div class=\"row\">";

	$roll = $player->roll(100);
	$pb_percent = number_format($roll/$player->roll["max"] * 100, 2);
	echo "<div class=\"col-md-4\">Roll Outcome ({$roll}/{$player->roll["max"]})";
	echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"{$roll}\" aria-valuemin=\"0\" aria-valuemax=\"{$player->roll["max"]}\" style=\"width:{$pb_percent}%\">{$pb_percent}%</div></div>";
	echo "</div>";

	echo "<div class=\"col-md-4\">Luck Applicability ({$player->luck["applicable"]}/{$player->luck["current"]})<div class=\"progress\">";
	if($player->luck["current"]==0){
		echo "N/A";
	} else {
		$pb_percent = number_format($player->luck["applicable"]/$player->luck["current"] * 100, 2);
		echo "<div class=\"progress-bar  progress-bar-info\" role=\"progressbar\" aria-valuenow=\"{$pb_percent}\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:{$pb_percent}%\">{$pb_percent}%</div>";
	}
	echo "</div></div>";


	echo "<div class=\"col-md-4\">Luck ({$player->luck["current"]}/{$player->luck["max"]})";
	echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-warning\" role=\"progressbar\" aria-valuenow=\"{$player->luck["current"]}\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:{$player->luck["current"]}%\">{$player->luck["current"]}%</div></div>";
	echo "</div>";

	echo "</div>";
}
echo "</div>";
?>
