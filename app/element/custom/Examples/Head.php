<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Examples;

use LivingMarkup\Element\AbstractElement;


class Head extends AbstractElement
{
    public function onRender()
    {
        return <<<HTML
<head lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<title>My Website</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
HTML;
    }
}
