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
    'name' => 'Block',
    'class_name' => 'LHTML\Modules\Custom\Examples\{name}',
    'xpath' => '//block',
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
	<block name="GroupProfile">
		<fieldset>
			<legend>Group:</legend>
			<var name="group"/>

			<block name="UserProfile">
				<p>Welcome <var tag="block" name="first_name"/> <var name="last_name"/></p>
			</block>
		</fieldset>
	</block>
</body>
</html>