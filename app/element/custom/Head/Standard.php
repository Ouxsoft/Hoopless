<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Head;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class Standard
 * @package LHTML\Element\Custom\Head
 */
class Standard extends AbstractElement
{
    public function onRender()
    {
        return <<<HTML
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="author" content="Ouxsoft"/>    
    <meta name="keywords" content="Ouxsoft, Web Design"/>
    <link href="/assets/css/main.min.css" rel="stylesheet"/>    
    {$this->innerText()}
</head>
HTML;
    }
}
