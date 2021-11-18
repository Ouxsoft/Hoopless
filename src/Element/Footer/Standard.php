<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Footer;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class Standard
 * @package LHTML\Element\Custom\Footer
 */
class Standard extends AbstractElement
{
    public function onRender()
    {
        return $this->view->render('/footer.html.twig', [
            'year' => date('Y'),
            'margin' => $this->getArgByName('margin')
        ]);
    }
}
