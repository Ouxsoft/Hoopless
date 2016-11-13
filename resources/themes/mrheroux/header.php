<?php
global $db;
include('lib/build_tree.function.php');

function print_menu($array, $level) {
	global $instance;
	foreach($array as $value) {
		echo '<li'.(($value['alias']==$instance->page['current']['alias'])?' class="active"':'').'>';
		if(is_array($value['children'])){
			echo '<a href="'.$instance->href($value['alias']).'" class="dropdown-toggle" data-toggle="dropdown">';
			echo $value['title'].' <b class="caret"></b>';
			echo '</a>';
			echo '<ul class="dropdown-menu multi-level">';
			print_menu($value['children'], $level+1);
			echo '</ul>';
		} else {
			echo '<a '.(!isset($value['class'])?'':' class="'.$value['class'].'"');
			//echo (!isset($value['target'])?'':' target="'.$value['target'].'"');
			echo ' href="'.$instance->href($value['alias']).'">';
			echo $value['title'];
			echo '</a>';
		}
		echo '</li>';
  }
}

echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<title>'.$instance->page['current']['name'].'</title>';
echo '<meta name="description" content="'.$instance->page['current']['meta_description'].'"/>';
echo '<meta name="keywords" content="'.$instance->page['current']['name'].'"/>';
echo '<link type="text/plain" rel="author" href="'.SERVER.'/humans.txt"/>';
echo '<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>';
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
echo '<meta name="apple-mobile-web-app-capable" content="yes">';
echo '<meta name="mobile-web-app-capable" content="yes">';
echo '<meta name="theme-color" content="#000">';
echo '<link rel="shortcut icon" href="'.$instance->href('images/favicon/favicon.ico').'" type="image/x-icon">';
echo '<link rel="icon" href="'.$instance->href('icons/favicon/favicon.ico').'" type="image/x-icon">';
echo '<link rel="stylesheet" href="'.$instance->href('stylesheets/top.min.css').'" type="text/css"/>';
echo '</head>';
echo '<body>';

echo '<div class="window" id="pagetop">';
echo '<form method="get" name="top" action="'.$instance->href('search.html').'" enctype="multipart/form-data">';
echo '<nav class="navbar navbar-default navbar-static-top">';
echo '<div class="container">';
if($instance->page['current']['alias']!='home.html'){
	echo '<div class="brand">';
	echo '<a href="'.$instance->href('home.html').'" title="Home"><em>Matt</em> Heroux</a>';
	echo '</div>';
}
echo '<div class="navbar-header">';
echo '<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>';
echo '<div id="navbar" class="navbar-collapse collapse window">';

$results = $db->query('SELECT `menu_item`.`node_id` AS `id`,`menu_item`.`parent_id`,IF(`menu_item`.`title` IS NULL,`node`.`title`, `menu_item`.`title`) AS `title`, `node_alias`.`alias` FROM `menu` LEFT JOIN `menu_item` ON `menu`.`menu_id` = `menu_item`.`menu_id` LEFT JOIN `node` ON `menu_item`.`node_id` = `node`.`node_id` LEFT JOIN `node_alias` ON `menu_item`.`node_id` = `node_alias`.`node_id` WHERE `menu`.`title` = \'top-menu\' ORDER BY `menu_item`.`item_id` ASC');

echo '<ul class="nav navbar-nav navbar-left">';
print_menu(build_tree($results),0);
echo '</ul>';

echo '<div class="nav navbar-nav navbar-right">';
echo '<div class="input-group">';
//echo '<input type="hidden" name="search_param" value="all" id="search_param">';
echo '<input type="text" class="form-control" id="search" name="q" placeholder="Search">';
echo '<span class="input-group-btn">';
echo '<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>';
echo '</span>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<!--/.nav-collapse -->';
echo '</div>';
echo '</nav>';
echo '</form>';
echo '</div>';
if($instance->page['current']['alias']!='home.html'){
	echo '<div id="page-title" style="background-image: url(\''.$instance->href('images/body-container/'.$instance->page['current']['node_id'].'.jpg').'\');">';
	echo '<h1 class="container load-transition text-center">'.$instance->page['current']['title'].'</h1>';
	echo '</div>';
}
?>
