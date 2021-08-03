<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Custom\Footer;

use Ouxsoft\PHPMarkup\Element\AbstractElement;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

/**
 * Class Standard
 * @package LHTML\Element\Custom\Footer
 */
class Standard extends AbstractElement
{
    public function onRender()
    {
        $view = new Mustache_Engine([
            'loader' => new Mustache_Loader_FilesystemLoader(ROOT_DIR . 'templates')
        ]);

        return $view->render('elements/footer',[
            'year' => date('Y')
        ]);
    }
}
