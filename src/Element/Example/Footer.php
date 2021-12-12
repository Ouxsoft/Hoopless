<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Example;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

class Footer extends AbstractElement
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
