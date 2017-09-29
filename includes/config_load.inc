<?php
// function to load configs
function config_load(string $file, $bool = false){
	return parse_ini_file('config/'.$file.'.conf', $bool);	
}

// define global config, CFG
$CFG = config_load('default.settings');

// set environmental variables based on config
date_default_timezone_set($CFG['timezone']);

?>