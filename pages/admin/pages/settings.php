<?php
require('lib/build_tree.function.php');

$results = $db->query('SELECT `id`, `parent_id`, `name` FROM `pages` ORDER BY `parent_id`;');

function arrayPrettyPrint($array, $level) {
    global $instance;
	global $db;
	foreach($array as $key => $value) {
		if($_GET['q']==$value['id']){
			//when clicked on highlighted
			echo '<tr id="page'.$value['id'].'">';
			echo '<td><a href="?q="><span class="glyphicon glyphicon glyphicon-minus"></span></a></td>';
			echo '<td style="padding-left:'.($level*3).'em"><b>'.$value['name'].'</b></td>';
			echo '</tr>';
			echo '<tr style="background-color: #EEE;">';
			echo '<td></td>';
			echo '<td style="padding-left:'.($level*3).'em">';
			echo 'URL:<input class="form-control" type="text" value="'.$value['link'].'"/><a href="'.$instance->href($value['link']).'"></a>';
			echo 'Description:<textarea class="form-control">'.$value['meta_description'].'</textarea>';
			echo 'Change Frequency:<select class="form-control"><option>'.$value['change_freq'].'</option></select>';
			echo 'Site Map Priority:<select class="form-control"><option>'.$value['priority'].'</option></select>';
			echo 'Standalone:<select class="form-control">';
			if($value['standalone']){
				echo '<option>Yes</option>';
			} else {
				echo '<option>No</option>';
			}
			echo '</select>';
			echo 'Parent Page:<select class="form-control">';
			if($value['standalone']){
				echo '<option>Yes</option>';
			} else {
				echo '<option>No</option>';
			}
			echo '</select>';
			echo '</td></tr>';
		} else {
			echo '<tr id="page'.$value['id'].'">';
			echo '<td><a href="?q='.$value['id'].'#page'.$value['id'].'"><span class="glyphicon glyphicon glyphicon-plus"></span></a></td>';
			echo '<td style="padding-left:'.($level*3).'em">'.$value['name'].'</td>';
			echo '</tr>';			
		}
		if(is_array($value)){
		    arrayPrettyPrint($value['children'], $level+1);
		}
    }
}

$results = $db->query('SELECT `id`, `parent_id`, `name`, `meta_description`, `link`, `change_freq`, `priority`, `standalone` FROM `pages`;');

$tree = buildTree($results);

//Remove Page 


//pages
/*	page_id
	name // switch to title
	parent_id
	meta_description
	link
	change_freq
	priority
	standalone
	timestamp
*/
echo '<div class="container background-white"/>';
echo '<p class="text-right">';
echo '<button type="button" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>New Page</button>';
echo '</p>';

echo '<table class="table table-hover">';
echo '<tbody>';

arrayPrettyPrint($tree,0);

// page_id switch to and description instead of meta_description
echo '</tbody>';
echo '</table>';
echo '</div>';
/*
page_menu
	id
	page_id

page_permission (rename)
	id
	page_id
	`signin_required` (move)
	state
*/?>