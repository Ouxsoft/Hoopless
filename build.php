<?php
error_reporting(E_ALL);
echo 'test';
require 'lib/mustache/Autoloader.php';

Mustache_Autoloader::register();
$m = new Mustache_Engine;
echo $m->render('Hello, {{planet}}!', array('planet' => 'World')); // "Hello, World!"