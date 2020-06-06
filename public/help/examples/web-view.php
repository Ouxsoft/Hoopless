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
    'name' => 'ReactNativeWebView',
    'class_name' => 'LHTML\Modules\Custom\Examples\ReactNativeWebView',
    'xpath' => '//webview',
];
?><!doctype html>
<html>
<head>
    <title>Example Domain</title>
</head>

<body>
<div>
    <webview>
        <arg name="initiate">true</arg>
        <arg name="object">{"key": 123}</arg>
        <h1>This is the body for webview</h1>
    </webview>
</div>
</body>
</html>