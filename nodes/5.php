<?php
include('lib/alert.class.php');

/*
Hoopless

use git for page version control
draft page not commit
published are commited
save commit changes
	set git config based on user based on $_SESSION
		exec('git config --global etc.');
	GIT ADD - page
		exec('git add \'node/'.$instance->page[current][id].'.php\'');
	GIT COMMIT - have field to describe changes
		exec('git commit -m \''.$commit_msg.'\');
	do not push changes - although a admin option to push changes would be cool.

page_menu
	id
	page_id

page_permission (rename)
	id
	page_id
	`signin_required` (move)
	state
*/

if($instance->verify(true)){
	// add validation
	switch($_POST['submit']){
		case 'save':
			// update node
			$db->bind('node_id',$record_id);
			$db->bind('title',$_POST['page']['title']);
			$db->bind('parent_id',$_POST['page']['parent_id']);
			$db->bind('description',$_POST['page']['description']);
			$db->bind('standalone',$_POST['page']['standalone']);
			$db->bind('change_freq',$_POST['page']['change_freq']);
			$db->bind('priority',$_POST['page']['priority']);
			$db->query('UPDATE `node` SET `parent_id` = :parent_id, `title` = :title, `meta_description` = :description, `change_freq` = :change_freq, `priority` = :priority, `standalone` = :standalone WHERE `node_id` = :node_id LIMIT 1;');
			// update alias
			$db->bind('node_id',$record_id);
			$db->bind('alias',$_POST['page']['alias']);
			$db->query('UPDATE `node_alias` SET `alias` = :alias WHERE `node_alias`.`node_id` = :node_id');
			// update state
			$db->bind('node_id',$record_id);
			$db->bind('state',$_POST['page']['state']);
			$db->query('UPDATE `node_permission` SET `state` = :state WHERE `node_permission`.`node_id` = :node_id');

			$alert->add('success','Node successfully updated');
			break;
		case 'new':
			$db->bind('node_id',$record_id);
			$exists = $db->single('SELECT 1 FROM `node` WHERE `node_id` = :node_id;');
			if($exists!=1){
				// insert node
				$db->bind('node_id',$record_id);
				$db->query("INSERT INTO `node` (`node_id`, `parent_id`, `title`, `meta_description`,  `change_freq`, `priority`, `standalone`, `signin_required`, `timestamp`) VALUES (:node_id, '1', 'Title', 'Description', 'weekly', '0.5', NULL, NULL, CURRENT_TIMESTAMP);");
				// insert alias
				$db->bind('node_id',$record_id);
				$db->bind('alias','new-page.html');
				$db->query('INSERT INTO `node_alias` (`node_id`,`alias`) VALUES (:node_id, :alias);');
				// insert state
				$db->bind('node_id',$record_id);
				$db->query("INSERT INTO `node_permission` (`node_id`, `state`) VALUES (:node_id, 'active');");

				$alert->add('success','Node successfully added');
			}
			break;
		case 'remove':
			// delete node
			$db->bind('node_id',$record_id);
			$db->query('DELETE FROM `node` WHERE `node_id` = :node_id;');
			// delete alias
			$db->bind('node_id',$record_id);
			$db->query('DELETE FROM `node_alias` WHERE `node_id` = :node_id;');
			// delete state
			$db->bind('node_id',$record_id);
			$db->query('DELETE FROM `node_permission` WHERE `node_id` = :node_id;');

			$alert->add('success','Node successfully removed');
			break;
	}
}

$nodes = $db->query('SELECT `node`.`node_id` AS `id`, `node`.`parent_id`, `node`.`title`, `node`.`meta_description`, `node_alias`.`alias`, `node`.`priority`, `node`.`change_freq`, `node`.`standalone`, `node`.`signin_required`, `node_permission`.`state` FROM `node` LEFT JOIN `node_permission` ON `node`.`node_id` = `node_permission`.`node_id` LEFT JOIN `node_alias` ON `node`.`node_id` = `node_alias`.`node_id` ORDER BY `node`.`title`');

function print_node_menu($array, $level) {
	global $instance;
	global $nodes;
	global $record_id;
	foreach($array as $key => $value) {
		if($record_id==$value['id']){
			//when clicked on highlighted
			echo '<div class="well well-sm" id="page'.$value['id'].'" style="margin: 0.2em 0 0.2em '.($level*2+1).'em;">';
			echo '<form id="edit" name="edit" method="post" action="'.$instance->href(NULL, $value['id']).'#page'.$value['id'].'" enctype="multipart/form-data">';

			echo '<div style="float:right">';
			echo '<a href="'.$instance->href($value['alias']).'" style="margin-right: 1em"><span class="glyphicon glyphicon-link"></span></a>';
			echo '<a href="'.$instance->href('admin/node/edit.html',$value['id']).'" style="margin-right: 1em"><span class="glyphicon glyphicon-edit"></span></a>';
			echo '<a href="?q=#page'.$value['id'].'"><span class="glyphicon glyphicon glyphicon-minus"></span></a>';
			echo '</div>';


			echo '<h3>'.$value['title'].'</h3>';

			// title
			echo '<label for="title">Title</label>';
			echo '<input id="title" name="page[title]" class="form-control" type="text" value="'.$value['title'].'"/>';

			// alias
			echo '<label for="alias">Alias</label>';
			echo '<input id="alias" name="page[alias]" class="form-control" type="text" value="'.$value['alias'].'"/>';

			// parent page
			if($value['parent_id']==0){
				echo '<label for="parent_id">Parent Page</label>';
				echo '<select id="parent_id" name="page[parent_id]" class="form-control"><option value="0" selected>None</option></select>';
			} else {
				echo '<label for="parent_id">Parent Page</label>';
				echo '<select id="parent_id" name="page[parent_id]" class="form-control">';
				foreach($nodes as $key2 => $value2){
					echo '<option value="'.$value2['id'].'"'.(($value2['id']==$value['parent_id'])?' selected':'').'>'.$value2['title'].'</option>';
				}
				echo '</select>';
			}
			// description
			echo '<label for="description">Description</label>';
			echo '<textarea id="description" name="page[description]" class="form-control">'.$value['meta_description'].'</textarea>';

			// standalone
			echo '<label for="standalone">Standalone</label>';
			echo '<select id="standalone" name="page[standalone]" class="form-control">';
			foreach(array('No','Yes') as $key2 => $value2){
				echo '<option value="'.$key2.'"'.(($value['standalone']==$key2)?' selected':'').'>'.$value2.'</option>';
			}
			echo '</select>';

			// status
			echo '<label for="priority">State</label>';
			echo '<select id="priority" name="page[state]" class="form-control">';
			foreach(array('disabled','active','protected') as $key2 => $value2){
				echo '<option'.(($value['state']==$value2)?' selected':'').'>'.$value2.'</option>';
			}
			echo '</select>';

			// update frequency
			echo '<label for="change_freq">Update Frequency</label>';
			echo '<select id="change_freq" name="page[change_freq]" class="form-control">';
			foreach(array('always','hourly','daily','weekly','monthly','yearly','never') as $key2 => $value2){
				echo '<option value="'.$value2.'"'.(($value2==$value['change_freq'])?' selected':'').'>'.$value2.'</option>';
			}
			echo '</select>';

			// site map priority
			echo '<label for="priority">Site Map Priority</label>';
			echo '<select id="priority" name="page[priority]" class="form-control">';
			for($i = 0; $i<1; $i += 0.1){
				// double quotes done to fix issue with values 0.8, 0.9, 1.0 -- from floats?
				echo '<option'.(("{$value['priority']}"=="{$i}")?' selected':'').'>'.$i.'</option>';
			}
			echo '</select>';

			echo '<br/>';
			echo '<button type="submit" name="submit" class="btn btn-primary" form="edit" value="save">Save</button> ';
			echo '<button type="submit" name="submit"  class="btn btn-danger" form="edit" value="remove">Remove</button>';
			echo '<div style="float:right">';
			echo '<button type="submit" name="submit"  class="btn btn-default" form="edit" value="cancel">Cancel</button>';
			echo '</div>';
			echo '</form>';
			echo '</div>';
		} else {
			echo '<div class="well well-sm" id="page'.$value['id'].'" style="background: #FFF; margin: 0.2em 0 0.2em '.($level*2+1).'em;">';
			echo $value['title'];
			echo '<div style="float:right">';
			echo '<a href="'.$instance->href($value['alias']).'" style="margin-right: 1em"><span class="glyphicon glyphicon-link"></span></a>';
			echo '<a href="'.$instance->href('admin/node/edit.html',$value['id']).'" style="margin-right: 1em"><span class="glyphicon glyphicon-edit"></span></a>';
			echo '<a href="'.$instance->href(NULL, $value['id']).'#page'.$value['id'].'"><span class="glyphicon glyphicon-plus"></span></a>';
			echo '</div>';
			echo '</div>';
		}
		if(is_array($value)){
				print_node_menu($value['children'], $level+1);
		}
	}
}

$alert->get();

echo '<div class="container background-white">';

$new_id = $db->single('SELECT MAX(`node_id`)+1 FROM `node`');
echo '<form id="new" name="new" method="post" action="'.$instance->href(NULL, $new_id).'#page'.$new_id.'" enctype="multipart/form-data">';
echo '<p class="text-right">';
echo '<button type="submit" name="submit" class="btn btn-default" form="new" value="new" aria-label="Left Align"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>New Page</button>';
echo '</p>';
echo '</form>';

print_node_menu(build_tree($nodes),0);

echo '</div>';
?>
