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
		$this->luck = array();
		$this->luck["current"] = 0;
		$this->luck["natural"] = 0;
		$this->luck["min"] = 0;
		$this->luck["max"] = 100;
		$this->luck["applicable"] = 0;
		
		$this->roll = array();
		$this->roll["outcome"] = 0;
		$this->roll["min"] = 0;
		$this->roll["max"] = 100;
	}
	public function roll(){	
		/* 
		a roll is used to determines a character's chances of success, which is influenced by luck.
		luck is designed to be variable and elusive in both is value, ability to change, and applicability. 
		*/
		$this->luck["applicable"] = mt_rand(0, $this->luck["current"]) + 1; // luck is not always applicable
		$this->roll["outcome"] =  round(mt_rand($this->roll["min"], $this->roll["max"]),2) + ($this->luck["applicable"] * 0.1);
		
		if ($this->roll["outcome"] > $this->roll["max"]) {$this->roll["outcome"] = $this->roll["max"];} 
		
		// adjust luck based on roll_outcome
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
//echo "<table>";
$player->roll["max"] = 100;

echo "<h1 class=\"center\">Blog<h1>";
echo "<h2>Feelin' Lucky?</h2>";
echo "<p>The concept of luck is a great problem to approach programmatically because of its intangibility. You are either lucky or you are not. Luck can change depending on the situation. You shouldn't be lucky all the time or unlucky all the time for that matter. Everyone's luck should be in a constant state of change. Luck should only be a contributing factor to help determine whether an action is a success and not necessarily the deciding factor. It should be elusive in value, its ability to change, and applicability.</p><p>Based on this vision of how luck works, I created the following roll class for use in my latest game engine.  The roll class is used to determine a character's chances of succeeding at any action and is influenced by luck. I originally programmed this in C#, but I ported the following function to PHP.</p>";
echo "<h2>PHP Code</h2>";
?>
<pre>
/*
Designed by Matt Heroux (c) 2008-2016 
*/
class character {
	public $luck;
	public $roll;

	public function __construct () {
		// load character stats
		$this->luck = array();
		$this->luck["current"] = 0;
		$this->luck["natural"] = 0;
		$this->luck["min"] = 0;
		$this->luck["max"] = 100;
		$this->luck["applicable"] = 0;
		
		$this->roll = array();
		$this->roll["outcome"] = 0;
		$this->roll["min"] = 0;
		$this->roll["max"] = 100;
	}
	public function roll(){	
		/* 
		a roll is used to determines a character's chances of success, which is influenced by luck.
		luck is designed to be variable and elusive in both is value, ability to change, and applicability. 
		*/
		$this->luck["applicable"] = mt_rand(0, $this->luck["current"]) + 1; // luck is not always applicable
		$this->roll["outcome"] =  round(mt_rand($this->roll["min"], $this->roll["max"]),2) + ($this->luck["applicable"] * 0.1);
		
		if ($this->roll["outcome"] > $this->roll["max"]) {$this->roll["outcome"] = $this->roll["max"];} 
		
		// adjust luck based on roll_outcome
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
</pre>
<?php
echo "<h2>Example <button class=\"btn btn-primary\" onclick=\"javascript:window.location.href='javascript:history.go(0)'\">Refresh <span class=\"glyphicon glyphicon glyphicon-refresh\" aria-hidden=\"true\"></span></button></h2>";
echo "";


for ($i = 0; $i < 10; $i++) {
	echo "<div class=\"row\">";
	
	$roll = $player->roll();
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
die();
?>

using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace Game
{
    public partial class ui : Form
    {
        public ui()
        {
            InitializeComponent();
        }

        private void ui_Load(object sender, EventArgs e)
        {
            character meeku = new character();

           meeku.life = 5;
           
            combat test = new combat();

            string testrun = ",";
            string testrun1 = "luck\n";

            long high = 0;
            long low = 0;
            long average = 0;

            long rollIncrease = 1;
            decimal trys = 2000m;

            for (int f = 2; f < 10; f++)
            {
                meeku.roll = f*rollIncrease;
                high = 0;
                low = 0;
                average = 0;
                meeku.luck = 0;
                for (int i = 0; i < trys; i++)
                {
                    testrun = meeku.roll.ToString() + "/" + meeku.luck.ToString() + ",";
                    average = average + meeku.luck;
                    if (meeku.luck > high) { high = meeku.luck; }
                    if (meeku.luck < low) { low = meeku.luck; }
                }
                testrun1 = testrun1 + (f * rollIncrease).ToString() + " average:" + (average / trys).ToString() + " low:" + low.ToString() + " high:" + high.ToString() + "\n";
            }
            MessageBox.Show(testrun1);

            testrun1 = "roll\n";

            int testrun2 = 0 ;
            for (int f = 2; f < 10; f++)
            {
                meeku.roll = f * rollIncrease;
                high = 0;
                low = 0;
                average = 0;
                meeku.luck = 0;
                for (int i = 0; i < trys; i++)
                {
                    testrun2 = Convert.ToInt32(meeku.roll);
                    average = average + testrun2;
                    if (testrun2 > high) { high = testrun2; }
                    if (testrun2 < low) { low = testrun2; }
                }
                decimal percent = ((average / trys)/(f * rollIncrease));
                testrun1 = testrun1 + (f * rollIncrease).ToString() + " Percent:" + percent.ToString() + " average:" + (average / trys).ToString() + " low:" + (low / f * rollIncrease).ToString() + " high:" + (high / f * rollIncrease).ToString() + "\n";
            }
            MessageBox.Show(testrun1);

            for (int f = 2; f < 6; f++)
            {
                testrun = "Luck\n";
                meeku.roll = f * rollIncrease;
                high = 0;
                low = 0;
                average = 0;
                meeku.luck = 0;
                for (int i = 0; i < trys; i++)
                {
                    testrun1 = meeku.roll.ToString();
                    testrun += ";" + meeku.luck.ToString();
                }
                MessageBox.Show(testrun);
            }

            for (int f = 2; f < 6; f++)
            {
                testrun = "Roll\n";
                meeku.roll = f* rollIncrease;
                high = 0;
                low = 0;
                average = 0;
                meeku.luck = 0;
                for (int i = 0; i < trys; i++)
                {
                    testrun1 = meeku.roll.ToString();
                    testrun += (Convert.ToDecimal(meeku.roll) / Convert.ToInt64(f * rollIncrease))+.00m+";";
                }
                MessageBox.Show(testrun);
            }
        }
    }
}
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Collections;

namespace Game
{
    class character
    {
/*
Character Stats
*/

/* 
Primary Stats
These stats are the bases for using the character existing with on the game board.
*/
        
// Name (S) – what the character is called.
// Weight (I) – how heavy the character is. 
// Disciplines (T) – The classes per say that the character has taken up.
// Actions (T) – The actions the character can do.

/* 
Base Stats
These are stats which the character improves on as they become more powerful. A character progression in these stats is heavily based on their Disciplines.
*/
        
// Strength – to apply physical damage and overcome physical challenges. 
// Agility – to move quickly and accurately and evade.
// Stamina – to endure damage and fatigue.
// Intellect – to understand and comprehend things.
// Spirit – to restore self and others.
// Charisma – to lead and deceive others.

/*
        Should be programmed into set function for each above
 * 
 * Note: If any base stats become equal to zero they will be knocked out for a corresponding reason. 
Strength – Weak. Too weak to move
Agility – Clumsy. Too clumsy to move.
Stamina – Fatigue. Too much Fatigue to move.
Intellect – Feeble. Too feeble minded to move.
Spirit – Spiritless. Too spiritless (without morale) to move. 
Charisma – Lost. Too lost to move.

*/
        
/*
Secondary Stats
Secondary stats are stats that are based on base stats and have modifiers of their own.
*/
// Life (G) – a character’s ability to stay alive.
// Formula:  based on Stamina
// Drive (G) – a character’s ability to do drive maneuvers. A characters Drive gauge represents their determination.
// Formula: 
// Speed (S) – a character’s movement speed.
// Formula: based on Agility
// Power (S) – a character’s maximum physical potential.
// Formula: 
// Defense (S) – Used to determine if physical attack hits hard enough to do damage. 
// Formula: Determined by Armor and Agility.
// Accuracy (S) – Used to determine how well character hits opponent
// Formula: determined by Agility.
// Evasion (S) – Used to determine if enemies attack hits.
// Formula: determined by Agility.
// Luck (S) – Luck is used to aid the Rolls made by character.

/*
Damage Type Modifiers 
*/

/*
Afflictions (T) 
*/	

/*
Immunities (T)
*/
/*
Gear (T)
*/

die();
?>        
        public int stat_max = 1000; // maximum amount a character stat can be
    
        //Gauges are going to need a current and a max value

        /* CHARACTER DATA */
        // Name (S) – what the character is called
        private string _name = "Wood person"; // look up work for wooden person
        public string name
        {
            get { return _name; }
            set { _name = value; }
        }
        // Weight (I) – how heavy is the character 
        private decimal _weight = 0;
        public decimal weight
        {
            get { return _weight; }
            set { _weight = value; }
        }
        // Classes (T)
        // Actions (T)
        // Life (G) – a character’s ability to stay alive
        private decimal _life = 0;
        public decimal life
        {
            get { return _life; }
            set { _life = value; }
        }
        // Stamina (G) – Stamina is a character’s ability to do physical maneuvers. When characters Stamina level reaches less than 0 the character will become Knocked Out.
        private decimal _stamina = 0;
        public decimal stamina
        {
            get { return _stamina; }
            set { _stamina = value; }
        }
        // Spirit (G) – Spirit is a character’s ability to do spiritual maneuvers. A characters Spirit gauge represents their inner strength.
        private decimal _spirit = 0;
        public decimal spirit
        {
            get { return _spirit; }
            set { _spirit = value; }
        }
        // Drive (G) – a character’s ability to do drive maneuvers. A characters Drive gauge represents their determination.
        private decimal _drive = 0;
        public decimal drive
        {
            get { return _drive; }
            set { _drive = value; }
        }
        // Speed (S) – a character’s movement speed
        private decimal _speed = 0;
        public decimal speed
        {
            get { return _speed; }
            set { _speed = value; }
        }
        // Power (S) – a character’s maximum physical potential.
        private decimal _power = 0;
        public decimal power
        {
            get { return _power; }
            set { _power = value; }
        }
        // Defense (S) – Used to determine if physical attack hits hard enough to do damage
        private decimal _defense = 0;
        public decimal defense
        {
            get { return _defense; }
            set { _defense = value; }
        }
        // Accuracy (S) – Used to determine how well character hits opponent.
        private decimal _accuracy = 0;
        public decimal accuracy
        {
            get { return _accuracy; }
            set { _accuracy = value; }
        }
        // Evasion (S) – Used to determine if enemies attack hits
        private decimal _evasion = 0;
        public decimal evasion
        {
            get { return _evasion; }
            set { _evasion = value; }
        }
        // Luck (S) – Luck is used to aid the Rolls made by character.
        private int _luck_max = 100;
        public int luck_max
        {
            get { return _luck_max; }
            set { _luck_max = value; }
        }
        private int _luck = 0;
        public int luck
        {
            get { return _luck; }
            set { _luck = value; }
        }
        // Damage Type Modifiers (DTM)
        private ArrayList _dtm = new ArrayList();
        public ArrayList dtm
        {
            get { return _dtm; }
            set { _dtm = value; }
        }
        // Afflictions - a character receives an abnormal status that which changes their behavoir until affliction is gone.
        private ArrayList _afflictions = new ArrayList();
        public ArrayList afflictions
        {
            get { return _afflictions; }
            set { _afflictions = value; }
        }
        // Immunities - a character abiliy to reduced the chances of or be protected against status affliction, moves, interactions
        private ArrayList _immunities = new ArrayList();
        public ArrayList immunities
        {
            get { return _immunities; }
            set { _immunities = value; }
        }
        // Gear - the items a character is carrying
        private ArrayList _gear = new ArrayList();
        public ArrayList gear
        {
            get { return _gear; }
            set { _gear = value; }
        }
        // Roll - a character's chances of success
        Random random_seed = new Random();
        private decimal _roll = 6m; // random number
        public decimal roll
        {
            get
            {
                int local_luck = random_seed.Next(0, _luck + 1);
                int local_roll = random_seed.Next(0, Convert.ToInt16(_roll) * 100); // multipled by 100 to accomendate for lower numbers.
                decimal local_amount = _roll * 100; 

                decimal rolled = Math.Round(local_roll + (local_luck * 0.1m),2);
                // if Roll Outcome is greater than Roll Max then Roll Outcome equals Roll Max.
                if (rolled > local_amount) { rolled = local_amount; }
   
                // adjust luck based on rolled
                if ((rolled >= (local_amount * 0.60m))) // luck increases
                {
                    if (luck < 1) { _luck = _luck + 1;}
                    else { _luck += local_luck;}
                } else if ((rolled*0.40m) < local_roll ) { // luck decreases
                    luck = luck - (local_luck+1);                
                }
                // adjust luck if too high or low
                if (luck < 0) { luck = 0;}
                else if (luck > luck_max) { luck = luck_max; }

                return (rolled / 100);
            }
            set
            {
                // the amount to be rolled
                if (value < 0) {value = 0;}
                _roll = Convert.ToInt32(value);
            }
        }
    }
}
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Game
{
    class display
    {
        /*
        Statuses
        this is something that modifies a characters behavoir represented by an icon when inflicted (afflictions are statuses)
        */
    }
}
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Game
{
    class combat
    {

    }
    class equipment
    {
        //add {}
        //remove {}
    }

/*
Nature - this is the damage type modifier for nature 
Electric - this is the damage type modifier for lightning 
Fire - this is the damage type modifier for fire  
Water - this is the damage type modifier for water 
Air - this is the damage type modifier for wind 
Earth - this is the damage type modifier for earth 
Darkness - this is the damage type modifier for darkness.
Light - this is the damage type modifier for light.
Physical - this is the damage type modifier for physical.
Psychic - this is the damage type modifier for psychic 
*/

    /*
Berserk – character can only attack. Power increased by Drive.
Lifeless – Afflicted when Life is less than 0
Knocked Out – character is unable to move. Set when Stamina is less than 0.
Confused –
Drunk – character accuracy decreases.
Doomed – heal before timer runs out or character KOs
Mortally Wounded –
Frozen – 
Cold – Speed reduced
Burned –
Bound – character can only try to Break Free or use Tool 
Sleepy –
Down – character is disabled and has fallen down
Disarmed – character must get weapon and arm self again in order to attack.
Bound – Cannot do anything but Break Free (interaction)
Blitz – Strength and are speed modified for only duration of battle (-5x through +5x) 
Exiled – Kick out of battle cannot return until battle is over 
Infection – Damage is received each turn until infliction is healed. 
Metamorphic – You are inflicted with random status affect each turn. 
Omni – character enters a berserk like mode and attacks uncontrollable.
Fear – character cannot move.
Stupid – character unable to use Learn
Zipped – character cannot use Gear.
Silence – character cannot use Spells.
Fathom – character cannot use Drive.
*/
}
