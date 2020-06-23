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
        $this->href = isset($this->args['href']) ? $this->args['href'] : '#';
        $this->alt = isset($this->args['alt']) ? $this->args['alt'] : '';

        return "<a href=\"{$this->href}\">{$this->xml}</a>";
    }
}
