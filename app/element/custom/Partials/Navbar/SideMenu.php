<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Partials\Navbar;

use LivingMarkup\Element\AbstractElement;

/**
 * Class HeaderDefault
 * @package LivingMarkup\Modules\Custom\Partials
 */
class SideMenu extends AbstractElement
{
    public function onRender()
    {
        $year = date('Y');

        return <<<HTML
<div class="narrow-col mt-5 mt-md-0 order-md-1 col-md-4 col-lg-3">
    <nav class="nav flex-column" style="border-left: 5px solid #343a40">
        <a href="/help/" class="nav-item nav-link active t-0">
            Editing Guide
        </a>
        <a href="/help/examples/" class="nav-item nav-link">
            Module Examples
        </a>
    </nav>

    <h4 class="mt-4"> Quick Links</h4>
    <nav class="nav nav-pills flex-column border">
        <a href="https://github.com/ouxsoft/hoopless" class="nav-item nav-link">
            Hoopless
        </a>
        <a href="https://github.com/ouxsoft/LivingMarkup" class="nav-item nav-link">
            LivingMarkup
        </a>
        <a href="https://github.com/ouxsoft/LHTML" class="nav-item nav-link">
            LHTML Standard
        </a>
    </nav>
</div>
HTML;
    }
}
