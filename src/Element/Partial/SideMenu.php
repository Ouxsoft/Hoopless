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

        if (array_key_exists($menu, $this->menus)) {
            $links = $this->menus[$menu];
        }

        return $this->view->render('/sidemenu.html.twig', [
            'html' => $this->innerText(),
            'links' => $links ?? []
        ]);
    }
}
