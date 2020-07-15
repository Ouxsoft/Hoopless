<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Examples;

use LivingMarkup\Element\AbstractElement;

class MarkupInjection extends AbstractElement
{
    public function onRender()
    {
        if ($this->xml == 'Example Domain') {
            return '<h1 style="color:#F00">Spoofed :-)</h1>';
        }

        return '<h1>' . $this->xml . '</h1>';
    }
}
