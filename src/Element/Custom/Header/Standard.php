<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Header;

use Ouxsoft\PHPMarkup\Element\AbstractElement;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

/**
 * Class Standard
 * @package LHTML\Element\Custom\Header
 */
class Standard extends AbstractElement
{
    public $separator = '/';

    /**
     * Renders a breadcrumb trail for the current page
     *
     * @return mixed|string
     */
    public function getBreadcrumbs()
    {
        // skip breadcrumb on front page
        if ($this->getArgByName('frontpage')) {
            return '';
        }

        $view = new Mustache_Engine([
            'loader' => new Mustache_Loader_FilesystemLoader(ROOT_DIR . 'templates')
        ]);

        // TODO: get current page

        return $view->render('elements/breadcrumb',
            [
                'separator' => $this->separator,
                'pages' => [
                    [
                        'title' => 'Home',
                        'href' => '/'
                    ]
                ]
            ]
        );
    }


    public function getNavbar()
    {
        $view = new Mustache_Engine([
            'loader' => new Mustache_Loader_FilesystemLoader(ROOT_DIR . 'templates')
        ]);

        return $view->render('elements/top-navbar',
            [
            ]
        );
    }

    public function onRender()
    {
        return <<<HTML
        <!-- Header -->
        <header>
            {$this->getNavbar()}
            {$this->getBreadcrumbs()}
        </header>
HTML;
    }
}
