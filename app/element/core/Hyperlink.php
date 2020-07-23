<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Core;

use LivingMarkup\Element\AbstractElement;

/**
 * Class Hyperlink
 *
 * Replaces <a> tag links on website
 *
 */
class Hyperlink extends AbstractElement
{
    private $href;
    private $alt;

    /**
     * Returns an Hyperlink tag with HREF attribute similar to original DomElement
     *
     * TODO: look up href_id to allows for pages to be moved without updating link
     *
     * @return string
     */
    public function onRender()
    {
        $args = $this->getArgs();
        $attributes = '';

        foreach ($args as $arg => $value) {
            switch ($arg) {
                case 'href':
                    $value = isset($value) ? $value : '#';
                    break;
                default:
                    // do nothing;
                    break;
            }

            $value = htmlspecialchars($value);
            $attributes .= " {$arg}=\"{$value}\"";
        }

        return "<a{$attributes}>{$this->xml}</a>";
    }
}
