<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Partial;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

class UserMenu extends AbstractElement
{
    public function onRender()
    {
        return <<<HTML
<!-- User Menu -->
<div>
<condition toggle="signed_in">
    <h2>Welcome, <var name="username"/></h2>
    <p>You're signed in right now</p>
</condition>
<condition toggle="signed_out">
    <a href="1000" alt="Test">Sign in</a>
</condition>
</div>
HTML;
    }
}
