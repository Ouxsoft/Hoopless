<?php
session_start();

require 'includes/db.inc';
require 'includes/instance_controller.inc';

require 'includes/Mustache/Autoloader.php';
Mustache_Autoloader::register();

/*
// use .html instead of .mustache for default template extension
$options =  array('extension' => '.html');

$m = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/views', $options),
));
*/

$view = new Mustache_Engine(
	array(
		'loader'=> new Mustache_Loader_CascadingLoader(
			array(
				new Mustache_Loader_FilesystemLoader('resources/themes/'.$instance->website['theme'].'/templates'),
				new Mustache_Loader_FilesystemLoader('nodes/'.$instance->page['current']['node_id']),
			)
		)
	)
);

/*
// allow for mustache permalinks
// q=2&b=2&3#top
$instance->alert = array(
	'get' => function($string, Mustache_LambdaHelper $helper) {
		global $instance;
	}
);
*/

$instance->link = array(
	'id' => function($string, Mustache_LambdaHelper $helper) {
		global $instance;
		// separate fragment identifier from remaining string
		if (($pos = strpos($string, '#')) !== FALSE) {
			list($string, $fragment_id) = explode('#',$string);
		}
	
		// split alias_id and remaining string
		list($alias_id, $string) = explode('&',$string,2);
	
		// split parameters from remaining string
		parse_str($string, $parameters);

	// make href identifier for caching
		$id = $alias_id.'?'.$parameters['q'];
		$address = '';
				
		// will have to add something spiffy to accomidate for no record_id but extra and visa versa
		if(array_key_exists($id, $instance->cache['href'])){
			// return cached
			// need to build out remaining q
			return $instance->cache['href'][$id].'#'.$fragment_id;
			// make smarter this if makes no sense
		} else {
			// look up and cache
			global $db;
			$db->bind('alias_id',$alias_id);
			$row = $db->row('SELECT `node_id`,`alias` FROM `node_alias` WHERE `alias_id` = :alias_id LIMIT 1;');
			$node_id = $row['node_id'];
			$alias = $row['alias'];

			// PAGE?q=2&sa=r123GFESFT
			if(isset($parameters['q'])){
				$parameters['q'] = $helper->render($parameters['q']);
				list(,,,$salt,$hash) = explode('$',crypt($node_id,'$6$rounds=5000$'.md5($parameters['q'].$instance->config['href_salt'].'$')));
				$sa = urlencode($salt.$hash);
				$instance->cache['href'][$id] = array(
					'alias' => $alias,
					'q' => $parameters['q'],
					'sa' => $sa,
				);
				$bool = false;
				$output = $alias;
				foreach($parameters as $key => $value){
					$output .= (($bool)?'&amp;':'?').$key.'='.$value;
					$bool = true;
				}
				$output .= '&amp;sa='.$sa.'#'.$fragment_id;
				return $output;
			} else {
				$instance->cache['href'][$id] = $alias;
				return $alias.$extra;
			}
		}
	}
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
