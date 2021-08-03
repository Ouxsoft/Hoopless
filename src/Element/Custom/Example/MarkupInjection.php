<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Custom\Example;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class MarkupInjection
 * @package LHTML\Element\Custom\Example
 */
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
