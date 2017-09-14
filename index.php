<?php
// get rid of cloud don't use seasons :P
session_start(); 

require 'includes/log.inc';
require 'includes/db.inc';
require 'includes/request.inc';
require 'includes/user.inc';
require 'includes/page.inc';

$log = new log();
$db = new database();
$request = new request(); 
$user = new user();
$page = new page();

// load html_writter
if($page->template!=NULL){
	require 'includes/html_writer.inc';
}

// how was the node requested
switch ($request->action){
	case 'edit':
		if($user->has_permission('edit')){
			require 'nodes/interactions/edit.inc';
			break;
		} else {
 			if($user->signed_in()){
				$html_writer->render('sign-in',$page);
			} else {
				$html_writer->render('access-denied',$page);
			}
		}
	case 'blame':
		if($user->has_permission('blame')){
			require 'nodes/interactions/blame.inc';
		} else {
			if($user->signed_in()){
				$html_writer->render('sign-in',$page);
			} else {
				$html_writer->render('access-denied',$page);
			}
		}
		break;
	case 'view': 
	default:
		//  if user has permission
		if($user->has_permission($page->permission)){
			// process nodes logic, which might not exist
			@include 'nodes/'.$page->node_id.'/logic.php';
		


			// render view
			if($page->template==NULL){
				// without template, for e.g. pdf
				echo $html_writer->render('view',$page);
			} else {
				// with template specified
				echo $html_writer->render($page->template,$page);
			}
		} else {
			if($user->signed_in()){
				$html_writer->render('sign-in',$page);
			} else {
				$html_writer->render('access-denied',$page);
			}
		}
		break;
}
?>