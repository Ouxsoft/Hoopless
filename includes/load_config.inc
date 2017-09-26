<?php
// function to load configs
function load_config(string $file){
	return parse_ini_file('resources/config/'.$file.'.conf');	
}

// define global config, CFG
$CFG = load_config('default.settings');

// set environmental variables based on config
date_default_timezone_set($CFG['timezone']);

?>