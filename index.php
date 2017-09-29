<?php
// get rid of cloud don't use seasons :P
session_start(); 

require 'includes/load_config.inc';
require 'includes/log.inc';
require 'includes/db.inc';
require 'includes/request.inc';
require 'includes/user.inc';
require 'includes/page.inc';
require 'includes/render.inc';

$log = new log();
$db = new database();
$request = new request(); 
$user = new user();
$page = new page($request->page_address,array('metadata','render'));
$render = new render();

// load html_writter

// how was the node requested
switch ($request->action){
	case 'edit':

//"node-json-edit"
//"node-logic-edit"
//"node-view-edit"

		require 'includes/html_writer.inc';
		if($user->has_permission('node-view-edit')){
			require 'node_interactions/edit.inc';
			echo $html_writer->render('node-edit',$render);
		} else {
			if($user->signed_in()){	
				print_r($user);
				echo $html_writer->render('sign-in',$render);
			} else {
				echo $html_writer->render('access-denied',$render);
			}
		}
		break;
	case 'blame':
		if($user->has_permission('blame')){
			require 'nodes/interactions/blame.inc';
		} else {
			if($user->signed_in()){
				echo $html_writer->render('sign-in',$render);
			} else {
				echo $html_writer->render('access-denied',$render);
			}
		}
		break;
	case 'view': 
	default:
	if($render->template!=NULL){
		require 'includes/html_writer.inc';
	}
	
		//  if user has permission
		if($user->has_permission($page->permission)){
			// process nodes logic, which might not exist
			@include 'nodes/'.$page->node_id.'/logic.php';
		
			// render view
			if($render->template==NULL){
				// without template, for e.g. pdf
				echo $html_writer->render('view',$render);
			} else {
				// with template specified
				echo $html_writer->render($render->template,$render);
			}
		} else {
			if($user->signed_in()){
				echo $html_writer->render('sign-in',$render);
			} else {
				echo $html_writer->render('access-denied',$render);
			}
		}
		break;
}
?>