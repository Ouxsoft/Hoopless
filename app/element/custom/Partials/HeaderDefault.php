<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Partials;

use LivingMarkup\Element\AbstractElement;

/**
 * Class HeaderDefault
 * @package LivingMarkup\Modules\Custom\Partials
 */
class HeaderDefault extends AbstractElement
{
    public function onRender()
    {
        return <<<HTML

        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand text-center" href="/">
                <img src="/assets/images/livingmarkup/icon/light-transparent-bg.png" width="24" class="brand align-top" alt=""/>
                LivingMarkup            
            </a>
        </nav>
HTML;
    }
}
