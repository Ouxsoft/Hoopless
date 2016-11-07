<?php
session_start();
require('lib/log.class.php');
require('lib/db.class.php');
require('lib/instance.class.php');

// if page is active, protected, or disabled and provide results
switch ($instance->page['current']['state']) {
	case 'active':
		// require signin for specific node if not signed in
		if(($instance->page['current']['signin_required']==1)&&(!isset($instance->user['id']))){
			$instance->window('header', true);
			include('lib/alert.class.php');
			echo '<div class="container">';
			$alert->add('alert','<a href="'.$instance->href('users/sign-up.html').'">Sign up</a> to access this page');
			$alert->get();
			echo '</div>';
			echo "Sign-in node not created";
			//include('nodes/users/sign-in.php');
			$instance->window('footer', true);
		} else {
			$instance->window('header');
			include('nodes/'.$instance->page['current']['file']);
			$instance->window('footer');
		}
		break;
	case 'protected':
		// check for account has access to protected access
		if (isset($instance->user['id'])) {
			if($instance->user['permission']==1){
				$instance->window('header');
				include('nodes/'.$instance->page['current']['file']);
				$instance->window('footer');
			} else {
				// deny access
				include('lib/alert.class.php');
				$instance->window('header', true);
				echo '<div class="container">';
				$alert->add('alert','<b style="text-transform: uppercase;">'.$instance->user['username'].'</b>, your account is not authorized to access this page. Sign in with an account authorized to use this page');
				$alert->get();
				echo '<div class="pagepad" style="display: block; text-align: center; font-weight: bold; text-transform: uppercase; font-size: 18px; font-family: Arial, Helvetica, sans-serif; margin-top: 25px;">Authorized Users Only</div>';
				echo '</div>';
				include('nodes/users/sign-in.php');
				$instance->window('footer', true);
			}
		} else {
			// sign required
			$instance->window('header', true);
			include('lib/alert.class.php');
			echo '<div class="container">';
			$alert->add('alert','You must sign-in to an authorized account to access this page');
			$alert->get();
			echo '<div class="pagepad" style="display: block; text-align: center; font-weight: bold; text-transform: uppercase; font-size: 18px; font-family: Arial, Helvetica, sans-serif; margin-top: 25px;">Authorized Users Only</div>';
			echo '</div>';
			include('nodes/users/sign-in.php');
			$instance->window('footer', true);
		}
		break;
	default:
		$instance->page['current']['title'] = 'Page Not Found';
		$instance->page['current']['file'] = '0.php';
		$instance->page['current']['alias'] = 'page-not-found.html';
		$instance->page['current']['page_description'] = 'Page not found';
		$instance->page['current']['standalone'] = false;
		$instance->page['current']['state'] = 'active';
		$instance->page['breadcrumbs'] = array(array('node_id' => 1, 'alias' => 'home.html', 'title'=>'Home'), array('node_id'=>0, 'alias' => 'page-not-found.html', 'title'=>'Page Not Found'));
		$instance->window('header');
		include('nodes/'.$instance->page['current']['file']);
		$instance->window('footer');
		break;
}
?>
