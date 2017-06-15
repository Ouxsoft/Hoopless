<?php
require('includes/alert.inc');

//namespace main;

// extend instance_controller
// pass extent to mustache
// define types in function including classes
// function(int $int)
// function(int ... )
// function(link )
// self::

class instance_controller {
	public $config; // 
	private $raw_request;
	private $href_cache = array(); // for link caching
	public $cache = array(
		'href' => array(),
	);
	private $hash_cache = array();

	public $uri;
	public $user = array(
		'id' => null,
		'sign-in' => array(
			'failure' => NULL, // was a sign-in failure detected
			'banned' => NULL, // is remote address banned from sign-in form
			'tries' => array(
				'email' => '', // the email address used to sign in
				'max' => 5, // max amount of failed tries in 30 minutes
				'current' => 0, // the current amount of failed tries
				'remainder' => 0, // the remainder of tries before banned equals true
			),
		),
	);
	public $website = array(
		'theme' => 'default'
	);
	public $page = array();
	public $breadcrumbs = array();
	public $menu = array();
	public $support = array();
	public $year;
	
	// output /nodes/xx/logic.php variables are stored here
	public $render;
	public $permalink = array();
	
	// controls user alerts
	public $alert;
	
	// parse permalink
	public function parse_p1ermalink($string) {
		return $string;
	}

	// build tree from parent child relationship
	function build_tree($elements, $parent_id = 0) {
		$branch = array();
		foreach ($elements as $element) {
			if ($element['parent_id'] == $parent_id) {
				$children = $this->build_tree($elements, $element['id']);
				if ($children) {
					$element['children'] = $children;
				}
				$branch[] = $element;
			}
		}
		return $branch;
	}
	
	
	// build menu array from an db array
	public function build_menu($array, $level) {
		$menu = array();
		foreach($array as $value) {
			$item = array();
			if($value['alias']==$this->page['current']['alias']){
				$item['active'] = true;
			}
			if($value['class']!=NULL){
				$item['class'] = $value['class'];
			}
			$item['title'] = $value['title'];
			$item['id'] = $value['id'];
			if(is_array($value['children'])){
				$item['children'] = $this->build_menu($value['children'], $level+1);
			} else {
				$item['alias'] = $value['alias'];
			}
			$menu[] = $item;
		}

		return $menu;
	}

	// build href hash cache
	// TODO: UPDATE TO NEW LAYOUT
	private function href_hash($record_id, $page = NULL){
		if($page==NULL){
			$page = $this->page['current']['alias'];
		}
		$ui = $page.$record_id;
		if(array_key_exists($ui, $this->hash_cache)){
			return $this->hash_cache[$ui];
		} else {
			$string = urlencode(str_replace('.','',crypt($ui, '$1$r'.md5($record_id.$this->config['href_salt']))));
			$this->hash_cache[$ui] = $string;
			return $string;
		}
	}

	public function help($string){
		return $string;
	}

	public function verify($silent = false){
		list(,,,$salt,$hash) = explode('$',crypt($this->page['current']['node_id'], '$6$rounds=5000$'.md5($_GET['q'].$this->config['href_salt'].'$')));
		$sa = $salt.$hash;
		if($sa==$_GET['sa']){
			global $record_id;
			$record_id = $_GET['q'];
			return true;
		} else {
			if($silent==false){
				echo '<div class="container background-white">';
				echo '<h2><b>404 - Error</b>: Invalid Request.</h2>';
				echo '<p>The requested record could not be accessed. If you have received this message in error, feel free to <a href="'.$this->href("contact").'">contact</a> me for assistance.</p>';
				echo '</div>';
			}
			return false;
		}
	}

	// used to build href
	// TODO: RETIRE DUE TO MUSTACHE IMPLEMENTATION
	public function href($string = '', $record_id = null){
		$extension = null;
		if(substr($string, 0, 4) === 'http') {
			return $string;
		}
		if(($record_id!=null)&&($string=='')){
			$string = $this->page['current']['alias'];
		}
		if(array_key_exists($string,$this->href_cache)&&($record_id==null)){
			// return cached href
			return $this->href_cache[$string.$record_id];
		} else {
			// determine absolute href
			$href = '';
			$path_parts = pathinfo($string);
			if (strpos($path_parts['extension'], '?') !== FALSE){
				$extension = substr($path_parts['extension'], 0, strpos($path_parts['extension'], '?'));
			}
			if (strpos($path_parts['extension'], '#') !== FALSE){
				$extension = substr($path_parts['extension'], 0, strpos($path_parts['extension'], '#'));
			}
			if($extension==null){
				$extension = $path_parts['extension'];
			}

			if(in_array($extension, array('html','xml','cvs','pdf'))){
				// page href
				$parts = explode('/',$string);
				if (strpos($string,SERVER) !== false) {
					$href = $string;
				} else {
					$href = SERVER.'/'.$string;
				}
				if($record_id!=NULL){
					// add $_GET url security encode for record_id
					$href .= '?q='.$record_id.'&amp;a='.$this->href_hash($record_id,$path_parts['filename'].'.'.$extension);
				}
			} else {
				// check if file exists in current theme, else use default theme
				if(!file_exists('resources/themes/'.$this->website['theme'].'/'.$string)){
					$href = SERVER.'/resources/themes/'.$this->website['theme'].'/'.$string;
				} else {
					$href = SERVER.'/resources/themes/'.$this->website['theme'].'/'.$string;
				}
			}
			$this->href_cache[$string.$record_id] = $href;
			return $href;
		}
	}
	
	function load_permalinks(){
		// optimize - no reason to query twice 
		global $db;
		$results = $db->query('SELECT `node_id`, `alias` FROM `node_alias`');
		foreach($results as $row){
			$this->permalink[$row['node_id']] = $row['alias'];
		}
	}

	// CONSTUCT
	function __construct(){
		global $db;		
		
		// set request time
		$this->date = array(
			'year' => date('Y'),
		);

		// load local server config
		$this->config = parse_ini_file('resources/config/default.conf');

		date_default_timezone_set($this->config['timezone']);
		define('SERVER',$this->config['server']);
		$this->website = array(
			'title' => $this->config['title'],
			'abbreviation' => $this->config['abbreviation'],
			'theme' => $this->config['theme'],
			'email' => $this->config['email'],
			'server' => $this->config['server'],
		);

		// establish primary database connection
		$db = new database(
			$this->config['host'],
			$this->config['user'],
			$this->config['password'],
			$this->config['dbname']
		);

		$this->load_permalinks();

		// parse raw request to determine page requested
		if(isset($_GET['request'])){
			$this->raw_request = preg_split('/\//', substr($_GET['request'],1));
			$this->page['current']['alias'] = '/'.implode('/', $this->raw_request);
			$db->bind('alias',$this->page['current']['alias']);
		} else {
			$this->raw_request[0] = '/';
			$this->page['current']['alias'] = '/';
			$db->bind('alias',$this->page['current']['alias']);
		}

		// load basic page data
		$results = $db->query(
			'SELECT `node`.`node_id`, `node`.`title`,`node`.`page_heading`, `node`.`standalone`, `node`.`signin_required`, `node`.`meta_description`, `node_permission`.`state`
			FROM `node_alias`
			LEFT JOIN `node` ON `node_alias`.`node_id` = `node`.`node_id`
			LEFT JOIN `node_permission` ON `node`.`node_id` = `node_permission`.`node_id`
			WHERE `node_alias`.`alias` = :alias LIMIT 1'
		);
		if(count($results)==0){
			$this->page = array(
				'current' => array(
					'node_id' => 0,
					'page_heading' => 'Page Not Found',
					'title' => 'Page Not Found',
					'standalone' => FALSE,
					'state' => 'active',
					'alias' => 'page-not-found',
					'meta_description' => 'Page not found',
				),
				'breadcrumbs' => array(
					array('node_id' => 1, 'alias' => '/', 'title'=>'Home'),
					array('node_id'=>0, 'alias' => 'page-not-found', 'title'=>'Page Not Found')
				),
			);
		} else {
			foreach($results as $row){
				$this->page['current'] = $row;
			}

			// load breadcrumb
			$db->bind('node_id',$this->page['current']['node_id']);
			$db->bind('node_id2',$this->page['current']['node_id']);
			$this->page['breadcrumbs'] = $db->query(
				'SELECT `T2`.`title`, `node_alias`.`alias`, IF(`T2`.`node_id` = :node_id2, \'true\', NULL) AS `active`
				FROM (SELECT @r AS _id, (SELECT @r := `parent_id` FROM `node` WHERE `node_id` = _id) AS `parent_id` , @l := @l +1 AS `lvl` FROM (SELECT @r := :node_id, @l :=0) vars, `node` WHERE @r <>0) `T1`
				JOIN `node` `T2` ON T1._id = `T2`.`node_id`
				LEFT JOIN `node_alias` ON `T2`.`node_id` = `node_alias`.`node_id` ORDER BY `T1`.`lvl` DESC LIMIT 10;'
			);
			$this->page['depth']  = count($this->page['breadcrumbs']);

			// remove breadcrumb on home page
			if($this->page['depth'] <=1){
				$this->page['breadcrumbs'] = NULL;
			}
		}

		// enable user alerts
		$this->alert = new user_alert;

		// find out who user is
		$this->user_get();

		// determine if user has permission to access the current page
		$db->bind('user_id',$this->user['id']);
		$db->bind('page_id',$this->page['current']['node_id']);
		$active = $db->single(
			'SELECT `active`
			FROM `user_group_members`
			LEFT JOIN `user_group_permissions` ON `user_group_members`.`group_id` = `user_group_permissions`.`group_id`
			WHERE `user_id` = :user_id AND `page_id` = :page_id AND `user_group_permissions`.`permission` = 1
			LIMIT 1;'
		);
		if($active==1){
			$this->user['permission'] = true;
		} else {
			$this->user['permission'] = false;
		}

		// get uri
		$this->uri = $this->href($this->page['current']['alias']);
		if(count($_GET)>1){
			$bool = false;
			foreach ($_GET as $key => $value) {
				if($key=='request'){continue;}
				if($bool){
					$this->uri .= '&';
				} else {
					$this->uri .= '?';
					$bool = true;
				}
				if(is_array($value)) {
					foreach($value as $key2 => $value2){
						if(is_array($value2)){continue;}
						$this->uri .= $key.'['.$key2.']='.urldecode($value2);
					}
				} else {
					$this->uri .= $key.'='.urldecode($value);
				}
			}
		}

		// load navigation menu
		$results = $db->query(
			'SELECT `menu_item`.`node_id` AS `id`,`menu_item`.`parent_id`,IF(`menu_item`.`title` IS NULL,`node`.`title`, `menu_item`.`title`) AS `title`, `node_alias`.`alias`
			FROM `menu`
			LEFT JOIN `menu_item` ON `menu`.`menu_id` = `menu_item`.`menu_id`
			LEFT JOIN `node` ON `menu_item`.`node_id` = `node`.`node_id`
			LEFT JOIN `node_alias` ON `menu_item`.`node_id` = `node_alias`.`node_id`
			WHERE `menu`.`title` = \'top-menu\'
			ORDER BY `menu_item`.`item_id` ASC'
		);
		$this->menu['navigation'] = $this->build_menu($this->build_tree($results),0);
	}

	private function user_get(){
		global $db;
		if(isset($_POST['user-sign-out'])&&($_POST['user-sign-out']==1)){
			// sign out user if requested
			if(isset($_SESSION['account']['user_id'])){
				// add sign off record, which invalidates token
				$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
				$db->bind('user_id',$_SESSION['account']['user_id']);
				$db->query(
					'UPDATE `user_authentication` SET `sign_out_time` = NOW()
					WHERE `remote_address` = :remote_address AND `user_id` = :user_id AND `sign_out_time` IS NULL
					LIMIT 1;'
				);
				unset($_SESSION['account']);
			}
			// destroy cookie
			unset($_COOKIE['site_nosense']);
			@setcookie('site_nosense', null, -1, '/');
		}
		if (isset($_SESSION['account']['user_id'])) {
			// check for session
			$this->user = $_SESSION['account'];
			return true;
		} elseif (isset($_COOKIE['site_nosense'])) {
			// check for sign-in token
			$db->bind('token',$_COOKIE['site_nosense']);
			$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
			$row = $db->row(
				'SELECT  `users`.`user_id`, `users`.`full_name`, `users`.`dateformat`, `timeformat`, `users`.`timezone` FROM `user_authentication`
				LEFT JOIN `users` ON `user_authentication`.`user_id` = `users`.`user_id`
				WHERE `user_authentication`.`remote_address` = :remote_address
				AND `user_authentication`.`token` = :token
				AND `user_authentication`.`sign_out_time` IS NULL
				LIMIT 1;'
			);
			if (count($row) > 0){
				$_SESSION['account']['user_id'] = $row['user_id'];
				$_SESSION['account']['full_name'] = $row['full_name'];
				$_SESSION['account']['dateformat'] = $row['dateformat'];
				$_SESSION['account']['timeformat'] = $row['timeformat'];
				$_SESSION['account']['timezone'] = $row['timezone'];
				$this->user = $_SESSION['account'];
				return true;
			}
		} elseif (isset($_POST['sign_in'])) {
			$this->user['sign-in']['tries']['email'] = $_POST['sign_in']['email'];
			// check for sign-in
			// check in banned due to brute force tries
			$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
			$this->user['sign-in']['tries']['current'] = $db->single(
				'SELECT COUNT(`id`)
				FROM `user_authentication`
				WHERE `timestamp` > date_sub(now(), INTERVAL 30 MINUTE) AND `authenticated` = 0 AND `remote_address` = :remote_address
				LIMIT 5;'
			);
			if(is_numeric($this->user['sign-in']['tries']['current'])){
				$this->user['sign-in']['tries']['remainder'] = $this->user['sign-in']['tries']['max'] - $this->user['sign-in']['tries']['current'];
			} else {
				$this->user['sign-in']['tries']['remainder'] = 0;
			}
			if($this->user['sign-in']['tries']['remainder']<=0){
				$this->user['sign-in']['banned'] = true;
			} else {
				// trying to sign-in salt and password for check
				// check if user exist
				$db->bind('email', $this->user['sign-in']['tries']['email']);
				$row = $db->row(
					'SELECT `user_id`, `full_name`, `dateformat`, `timeformat`, `timezone`, `salt`, `password` FROM `users` WHERE `email` = :email LIMIT 1;'
				);
				if ($row==null){
					$this->user['sign-in']['failure'] = true;
					// brute force protection
					$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
					$db->bind('user_id',null);
					$db->bind('authenticated',0);
					$db->query(
						'INSERT INTO `user_authentication` (`id`, `remote_address`, `user_id`, `authenticated`, `timestamp`) VALUES (NULL, :remote_address, :user_id, :authenticated, CURRENT_TIMESTAMP)'
					);
				} else {
					if($row['password'] == crypt($_POST['sign_in']['password'], '$6$50$'.$row['salt'])){
						unset($row['salt']);
						unset($row['password']);
						$this->user = $row;
						$_SESSION['account'] = $row;
						$db->bind('remote_address', $_SERVER['REMOTE_ADDR']);
						$db->bind('user_id',$row['user_id']);
						$db->bind('authenticated',1);
						if(isset($_POST['sign_in']['remember'])&&($_POST['sign_in']['remember']=="true")){
							$db->bind("stay_signed_in",1);
							$token = crypt($_SERVER['HTTP_X_FORWARDED_FOR'].$_SERVER['REMOTE_ADDR'], '$1$r'.$this->salt(date("U")));
							setcookie('site_nosense', $token, time() + (86400 * 30), '/');
							$db->bind('token',$token);
						} else {
							$db->bind('token',null);
							$db->bind('stay_signed_in',0);
						}
						$db->query(
							'INSERT INTO `user_authentication` (`id`, `remote_address`, `user_id`, `authenticated`, `sign_in_time`, `sign_out_time`, `stay_signed_in`, `token`, `timestamp`)
							VALUES (NULL, :remote_address, :user_id, :authenticated, NOW(), NULL, :stay_signed_in, :token, CURRENT_TIMESTAMP);'
						);
						return true;
					} else {
						// show authorication failed and add brute force protection record
						$this->user['sign-in']['failure'] = true;
						$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
						$db->bind('user_id',$row['user_id']);
						$db->bind('authenticated',0);
						$db->query(
							'INSERT INTO `user_authentication` (`id`, `remote_address`, `user_id`, `authenticated`, `timestamp`) VALUES (NULL, :remote_address, :user_id, :authenticated, CURRENT_TIMESTAMP)'
						);
					}
				}
			}
		}
		return false;
	}

	public function user_page_access($page_id){
		// allows external checks whether users can access a page
		global $db;
		$db->bind("user_id",$this->user['id']);
		$db->bind("page_id",$page_id);
		if($db->single(
			'SELECT 1 FROM `user_group_members` LEFT JOIN `user_group_permissions` ON `user_group_members`.`group_id` = `user_group_permissions`.`group_id` WHERE `user_group_members`.`user_id` = :user_id AND `user_group_permissions`.`page_id` = :page_id AND `user_group_members`.`active` = 1 AND `user_group_permissions`.`permission` = 1 LIMIT 1;'
			)	==1
		){
			return true;
		} else {
			return false;
		}
	}
}

$instance = new instance_controller();
?>
