<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Nav;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class HeaderDefault
 * @package PHPMarkup\Modules\Custom\Partials
 */
class SideMenu extends AbstractElement
{
    private $menus = [
        'news' => [
            '/news/' => 'News',
        ],
        'about' => [
            '/about/' => 'About',
        ],
        'help' => [
            '/help/' => 'Editing Guide',
            '/help/phpmarkup/' => 'PHPMarkup',
        ],
    ];
    public function onRender()
    {
        $menu = $this->getArgByName('menu');
        $out = '';
        foreach ($this->menus[$menu] as $url => $title) {
            $out .= '<a href="' . $url . '" class="nav-item nav-link">' . $title . '</a>';
        }

        return <<<HTML
<!-- SideMenu -->
<section id="side-menu" class="narrow-col mt-5 pt-3 mt-md-0 order-md-1 col-md-4 col-lg-3">

    <nav class="nav flex-column" style="border-left: 5px solid #343a40">
    {$out}
    </nav>
    {$this->innerText()}
</section>
HTML;
    }
}
