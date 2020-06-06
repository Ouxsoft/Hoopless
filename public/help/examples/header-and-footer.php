<?php require 'vendor/autoload.php';
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

global $add_modules;
$add_modules[] = [
    'name' => 'Footer',
    'class_name' => 'LHTML\Modules\Custom\Examples\Footer',
    'xpath' => '//footer',
];
$add_modules[] = [
    'name' => 'Head',
    'class_name' => 'LHTML\Modules\Custom\Examples\Head',
    'xpath' => '//head',
];

?>
<!--
  ~ This file is part of the LivingMarkup package.
  ~
  ~ (c) Matthew Heroux <matthewheroux@gmail.com>
  ~
  ~ For the full copyright and license information, please view the LICENSE
  ~ file that was distributed with this source code.
  -->

<html>
<head></head>
    <body>
        <h1>Header and Footer Example</h1>
        <footer></footer>
    </body>
</html>