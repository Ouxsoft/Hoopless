<?php
/*
Instance
Used to manage the request
*/
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
	public $raw_request;

	public $website = array(
		'theme' => 'default'
	);
	public $page = array(
		'breadcrumbs' => array(),
		'action' => 'view',
	);
	public $menu = array();
	public $permalink = array();
	public $alerts = array(
		'types' => array('success','info','warning','danger')
	);
	public $render;

	// TODO: kill these
	private $href_cache = array(); // for link caching
	public $cache = array(
		'href' => array(),
	);
	private $hash_cache = array();
	public $uri;

	// add to alert array
	function alert($string, $type = 'info', $category = 'main'){
		// add text
		if(isset($this->alerts[$category]['value'])){
			$this->alerts[$category]['value'] .= ' '.$string;
		} else {
			$this->alerts[$category]['value'] = $string;
		}
		// add type
		if(isset($this->alerts[$category]['type'])){
			$a = array_search($this->alerts[$category]['type'], $this->alerts['types']);
			$b = array_search($type, $this->alerts['types']);
			if($a < $b){
				$this->alerts[$category]['type'] = $type;
			}
		} else {
			$this->alerts[$category]['type'] = $type;
		}
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
		global $user;

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
			//if($this->page['current']['alias']==(substr($this->page['current']['alias'], -5) == '/edit')) {
			if (preg_match('/\b\/edit$/', $this->page['current']['alias'])){
				$this->page['action'] = 'edit';
				$this->page['current']['alias'] = preg_replace('/\b\/edit$/', '', $this->page['current']['alias']);
			}
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
		
		// check access level of user current request
		if($this->page['current']['state'] == 'active'){
			if (($instance->page['current']['signin_required']==1)&&(!isset($instance->user['id']))){
			} else {
				$this->user['permission'] = true;
			}
		} else if ($instance->page['current']['state'] == 'protected') {
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
			}
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
	}
}

?>
