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

/**
 * Class UserProfile
 * @package LHTML\Element\Custom\Example
 */
class UserProfile extends AbstractElement
{
    public $username = 'jane_doe';
    public $first_name = 'Jane';
    public $last_name = 'Doe';

    public function onRender() : string
    {
        return '<div class="user_profile">' . $this->xml . '</div>';
    }
}
