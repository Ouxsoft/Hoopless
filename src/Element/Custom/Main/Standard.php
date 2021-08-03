<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Custom\Main;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class HeaderDefault
 * @package PHPMarkup\Modules\Custom\Partials
 */
class Standard extends AbstractElement
{
    public function onRender()
    {
        return <<<HTML
<!-- Main Content -->
<main id="main-content" class="order-md-2 col-md-8 pl-md-3 col-lg-9 pl-lg-5 ">
{$this->innerText()}
</main>
HTML;
    }
}
