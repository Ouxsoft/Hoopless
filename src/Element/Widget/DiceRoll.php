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

use Ouxsoft\LuckByDice\Factory\TurnFactory;
use Ouxsoft\PHPMarkup\Element\AbstractElement;

class DiceRoll extends AbstractElement
{
    public const DEFAULT_NOTATION = '1d4+2*2,3d6';

    public function onRender()
    {
        $notation = array_key_exists('dice-notation', $_POST) ? $_POST['dice-notation'] : self::DEFAULT_NOTATION;
        $luck = array_key_exists('luck', $_POST) ? (int) $_POST['luck'] : 0;
        $turn = TurnFactory::getInstance($notation);
        $turn->setLuck($luck);

        $turns = [];
        for ($i = 1; $i < 5; ++$i) {
            $turns[] = [
                'roll' => $turn->roll(),
                'luck' => $turn->getLuck(),
            ];
        }

        return $this->view->render('/widget/dice-roll.html.twig', [
            'notation' => $notation,
            'luck' => $turn->getLuck(),
            'turns' => $turns,
        ]);
    }
}
