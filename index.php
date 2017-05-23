<?php
session_start();

require 'includes/log.inc';
require 'includes/db.inc';
require 'includes/instance_controller.inc';

require 'includes/Mustache/Autoloader.php';
Mustache_Autoloader::register();

$view = new Mustache_Engine(array(
  'loader'=> new Mustache_Loader_CascadingLoader(
    array(
	     new Mustache_Loader_FilesystemLoader('resources/themes/'.$instance->website['theme'].'/templates'),
       new Mustache_Loader_FilesystemLoader('nodes/'.$instance->page['current']['node_id']),
       )
    )
  )
);

echo $view->render('header',$instance);

// if page is active, protected, or disabled and provide results
switch ($instance->page['current']['state']) {
	case 'active':
		// require signin for specific node if not signed in
		if(($instance->page['current']['signin_required']==1)&&(!isset($instance->user['id']))){
			echo $view->render('header',$instance);
			include('lib/alert.class.php');
			echo '<div class="container">';
			$alert->add('alert','<a href="'.$instance->href('users/sign-up').'">Sign up</a> to access this page');
			$alert->get();
			echo '</div>';
      echo $view->render('sign-in',$instance);
		} else {
  		include('nodes/'.$instance->page['current']['node_id'].'/logic.php');
			echo $view->render('view',$instance);
		}
		break;
	case 'protected':
		// check for account has access to protected access
		if (isset($instance->user['id'])) {
			if($instance->user['permission']==1){
	  		include('nodes/'.$instance->page['current']['node_id'].'/logic.php');
				echo $view->render('view',$instance);
			} else {
				// deny access
				include('lib/alert.class.php');
				echo '<div class="container">';
				$alert->add('alert','<b style="text-transform: uppercase;">'.$instance->user['username'].'</b>, your account is not authorized to access this page. Sign in with an account authorized to use this page');
				$alert->get();
				echo '<div class="pagepad" style="display: block; text-align: center; font-weight: bold; text-transform: uppercase; font-size: 18px; font-family: Arial, Helvetica, sans-serif; margin-top: 25px;">Authorized Users Only</div>';
				echo '</div>';
				echo $view->render('sign-in',$instance);
			}
		} else {
			// sign required
			include('lib/alert.class.php');
			echo '<div class="container">';
			$alert->add('alert','You must sign-in to an authorized account to access this page');
			$alert->get();
			echo '<div class="pagepad" style="display: block; text-align: center; font-weight: bold; text-transform: uppercase; font-size: 18px; font-family: Arial, Helvetica, sans-serif; margin-top: 25px;">Authorized Users Only</div>';
			echo '</div>';
			echo $view->render('sign-in',$instance);
		}
		break;
	default:
    break;
}

echo $view->render('footer',$instance);
?>
