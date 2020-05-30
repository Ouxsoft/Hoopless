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

/**
 * Class UserProfile
 *
 * @package LivingMarkup\Modules\Widgets
 */
class GroupProfile extends Module
{
    public $group = 'Curators';
    public $first_name = 'Website';
    public $last_name = 'Curators';

    /**
     * @return mixed|string
     */
    public function onRender()
    {
        return '<div class="group_profile">' . $this->xml . '</div>';
    }
}
