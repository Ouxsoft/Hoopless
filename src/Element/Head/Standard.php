<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Head;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class Standard.
 */
class Standard extends AbstractElement
{
    public function onRender()
    {
        return $this->view->render('head.html.twig', [
            'html' => $this->innerText(),
        ]);
    }
}
