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
    'name' => 'Widget',
    'class_name' => 'LHTML\Modules\Custom\Examples\HelloWorld',
    'xpath' => '//widget',
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

<html lang="en">
<body>
<example name="HelloWorld"></example>
</body>
</html>