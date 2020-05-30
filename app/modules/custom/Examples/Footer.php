<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Modules\Custom\Examples;


use LivingMarkup\Module;

class Footer extends Module
{
    public function onRender()
    {
        $year = date('Y');
        return <<<HTML
<footer>
    <hr/>
    <p>&copy; {$year} </p>
</footer>
<script/>
HTML;
    }
}
