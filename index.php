<?php
ini_set('error_reporting', E_ALL);

session_start(); // get rid of cloud does use seasons

require 'includes/db.inc';
require 'includes/instance.inc';
require 'includes/user.inc';

$instance = new instance();
$user = new user();

// load html_writter


if($instance->page['current']['template']!=NULL){
	require 'includes/html_writer.inc';
}

// how was the node requested
switch ($instance->page['action']){
	case NULL:
		$html_writer->render('default',$instance);
		break;
	case 'edit':
		if($user->has_permission('edit')){
			require 'nodes/interactions/edit.inc';
			break;
		} else {
 			if($user->signed_in()){
				$html_writer->render('sign-in',$instance);
			} else {
				$html_writer->render('access-denied',$instance);
			}
		}
	case 'blame':
		if($user->has_permission('blame')){
			require 'nodes/interactions/blame.inc';
		} else {
			if($user->signed_in()){
				$html_writer->render('sign-in',$instance);
			} else {
				$html_writer->render('access-denied',$instance);
			}
		}
		break;
	case 'view': 
	default:
	
		//  if user has permission
		if($user->has_permission($instance->page['current']['permission'])){
			// process nodes logic, which might not exist
			@include 'nodes/'.$instance->page['current']['node_id'].'/logic.php';
			
			// render view
			if($instance->page['current']['template']==NULL){
				// without template, for e.g. pdf
				echo $html_writer->render('view',$instance);
			} else {
				// with template specified
				echo $html_writer->render($instance->page['current']['template'],$instance);
			}
		} else {
			if($user->signed_in()){
				$html_writer->render('sign-in',$instance);
			} else {
				$html_writer->render('access-denied',$instance);
			}
		}
		break;
}

?>