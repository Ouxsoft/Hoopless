<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Widget;

use Ouxsoft\PHPMarkup\Element\AbstractElement;
use Ouxsoft\LuckByDice\Factory\TurnFactory;

class DiceRoll extends AbstractElement
{
    const DEFAULT_NOTATION = '1d4+2*2,3d6';

    public function onRender()
    {
        $notation = array_key_exists('dice-notation', $_POST) ? $_POST['dice-notation'] : self::DEFAULT_NOTATION;
        $luck = array_key_exists('luck', $_POST) ? (int) $_POST['luck'] : 0;
        $turn = TurnFactory::getInstance($notation);
        $turn->setLuck($luck);

        return <<<HTML
<!-- DiceRoll -->
<hr/>
<form method="post">
  <div class="form-inline">  
        <div class="input-group">
            <div class="input-group-prepend">
                <label for="dice-notation" class="mr-2">Dice Notation:</label>
            </div>
            <input id="dice-notation" name="dice-notation" class="form-control" type="text" placeholder="1d4" value="{$notation}"/>
        </div>
        <div class="input-group">
            <input type="submit" class="btn btn-primary" value="Roll"/>
        </div>
    </div>
    <input type="hidden" name="luck" value="{$turn->getLuck()}"/>
</form>
<hr/>

<h2>Results</h2>
<p>Shows the results of five consecutive rolls:</p>
<table class="table table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Outcome</th>
            <th>Luck</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>1</th>
            <td>{$turn->roll()}</td>
            <td>{$turn->getLuck()}</td>
        </tr>
        <tr>
            <th>2</th>
            <td>{$turn->roll()}</td>
            <td>{$turn->getLuck()}</td>
        </tr>
        <tr>
            <th>3</th>
            <td>{$turn->roll()}</td>
            <td>{$turn->getLuck()}</td>
        </tr>
        <tr>
            <th>4</th>
            <td>{$turn->roll()}</td>
            <td>{$turn->getLuck()}</td>
        </tr>
        <tr>
            <th>5</th>
            <td>{$turn->roll()}</td>
            <td>{$turn->getLuck()}</td>
        </tr>
    </tbody>
</table>
HTML;
    }
}
