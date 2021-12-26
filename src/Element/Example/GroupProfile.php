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
 * Class UserProfile.
 */
class GroupProfile extends AbstractElement
{
    public $group = 'Curators';
    public $first_name = 'Website';
    public $last_name = 'Curators';

    /**
     * @return mixed|string
     */
    public function onRender()
    {
        return '<div class="group_profile">'.$this->xml.'</div>';
    }
}
