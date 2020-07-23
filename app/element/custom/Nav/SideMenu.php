<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Nav;

use LivingMarkup\Element\AbstractElement;

/**
 * Class HeaderDefault
 * @package LivingMarkup\Modules\Custom\Partials
 */
class SideMenu extends AbstractElement
{
    public function onRender()
    {
        return <<<HTML
<!-- SideMenu -->
<section id="side-menu" class="narrow-col mt-5 pt-3 mt-md-0 order-md-1 col-md-4 col-lg-3">
    <nav class="nav flex-column" style="border-left: 5px solid #343a40">
        <a href="/help/" class="nav-item nav-link active">
            Editing Guide
        </a>
        <a href="/help/examples/" class="nav-item nav-link">
            Module Examples
        </a>
    </nav>
    {$this->innerText()}
</section>
HTML;
    }
}
