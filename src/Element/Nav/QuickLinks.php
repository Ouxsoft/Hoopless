<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Nav;

use Ouxsoft\PHPMarkup\Element\AbstractElement;
use \SimpleXMLElement;

/**
 * Class QuickLinks
 * @package LHTML\Element\Custom\Nav
 */
class QuickLinks extends AbstractElement
{
    public function onRender()
    {
        $xml = new SimpleXMLElement(
            '<root><nav class="nav nav-pills flex-column border">' .
            $this->innerText() .
            '</nav></root>'
        );

        $links = '';
        foreach ($xml->nav->a as $link) {
            $links .= $link->addAttribute('class', 'nav-item nav-link');
        }

        if (ctype_space($this->innerText())) {
            return '';
        }

        return $this->view->render('quick-links.html.twig', [
            'html' => $xml->nav->saveXML(),
            'links' => $links
        ]);
    }
}
