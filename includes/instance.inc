<?php
//namespace main;

// extend instance_controller
// pass extent to mustache
// define types in function including classes
// self::

// instance :: controls the web request
class instance {
	public $config; 
	public $raw_request;
	public $website = array('theme' => 'default');
	public $page = array('breadcrumbs' => array(),'action' => 'view');
	public $menu = array();
	public $permalink = array();
	public $alerts = array('types' => array('success','info','warning','danger'));
	public $render;
	public $cache = array('href' => array());
	public $uri;

	public function parse_request(){
		global $db;
		$actions = array(
			'view', // default
			'edit',
			'revision',
			'blame',
			'aliases',
			'explore'
		);
		// parse raw request to determine page requested
		if(isset($_GET['request'])){
			$this->raw_request = preg_split('/\//', substr($_GET['request'],1));
			$alias = '/'.implode('/', $this->raw_request);
			foreach($actions as $action){
				if (preg_match('/\b\/'.$action.'$/', $alias)){
					$this->page['action'] = $action;
					$alias = preg_replace('/\b\/'.$action.'$/', '', $alias);
					break;
				} 	
			}
		} else {
			$this->raw_request[0] = '/';
			$this->page['action'] = $actions[0];
			$alias = '/';
		}

		// separate page instance request into own class
		$this->page['current']['alias'] = $alias;

		// load basic page data
		$db->bind('alias',$alias);		
		$row = $db->row('
			SELECT `node`.`node_id`, `node`.`title`,`node`.`page_heading`, `node`.`template`, `node`.`meta_description`, `user_permission`.`name` as `permission`
			FROM `node_alias`
			LEFT JOIN `node` ON `node_alias`.`node_id` = `node`.`node_id`
			LEFT JOIN `user_permission` ON `node`.`permission_id` = `user_permission`.`permission_id`
			WHERE `node_alias`.`alias` = :alias
			LIMIT 1
		');
		if(!is_array($row)){
			$this->page = array(
				'current' => array(
					'node_id' => 0,
					'page_heading' => 'Page Not Found',
					'title' => 'Page Not Found',
					'template' => 'default',
					'permission' => NULL,
					'alias' => 'page-not-found',
					'meta_description' => 'Page not found',
				),
				'breadcrumbs' => array(
					array('node_id' => 1, 'alias' => '/', 'title'=>'Home'),
					array('node_id' => 0, 'alias' => 'page-not-found', 'title'=>'Page Not Found')
				),
			);			
		} else {
			$this->page['current'] += $row;

			// load breadcrumb
			$db->bind('node_id',$this->page['current']['node_id']);
			$db->bind('node_id2',$this->page['current']['node_id']);
			$this->page['breadcrumbs'] = $db->query('
				SELECT `T2`.`title`, `node_alias`.`alias`, IF(`T2`.`node_id` = :node_id2, \'true\', NULL) AS `active`
				FROM (
					SELECT @r AS _id, (
					SELECT @r := `parent_id` FROM `node` WHERE `node_id` = _id
				) AS `parent_id`, @l := @l +1 AS `lvl` 
				FROM (
					SELECT @r := :node_id, @l :=0) vars, `node` WHERE @r <>0
				) `T1`
				JOIN `node` `T2` ON T1._id = `T2`.`node_id`
				LEFT JOIN `node_alias` ON `T2`.`node_id` = `node_alias`.`node_id` 
				ORDER BY `T1`.`lvl` DESC LIMIT 10;
			');
			$this->page['depth']  = count($this->page['breadcrumbs']);

			// remove breadcrumb on home page
			if($this->page['depth'] <=1){
				$this->page['breadcrumbs'] = NULL;
			}
		}

		$this->page['current']['shortcut'] = str_replace('/','>',$alias);
		//var_dump($this->page['current']);
		$this->page['current']['folder'] = 'nodes/'.$this->page['current']['node_id'].'/';
	}

	// get config file
	public function get_config(string $file){
		return parse_ini_file('resources/config/'.$file.'.conf');	
	}

	// constuct
	public function __construct(){
		global $db;
		global $user;

		$this->config = $this->get_config('default');
		date_default_timezone_set($this->config['timezone']);

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
		$this->parse_request();
		$this->get_uri();
	}

	// add to alert array
	public function alert(string $string, string $type = 'info', string $category = 'main'){
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
	public function build_tree(array $elements, int $parent_id = 0) {
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
	public function build_menu(array $array, int $level) {
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

	public function verify(bool $silent = false){
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
				echo '<p>The requested record could not be accessed. If you have received this message in error, feel free to <a href="/contact">contact</a> me for assistance.</p>';
				echo '</div>';
			}
			return false;
		}
	}

	private function load_permalinks(){
		// optimize - no reason to query twice
		global $db;
		$results = $db->query('SELECT `node_id`, `alias` FROM `node_alias`');
		foreach($results as $row){
			$this->permalink[$row['node_id']] = $row['alias'];
		}
	}
	
	public function get_uri() {
		// get uri
		$this->uri = $this->page['current']['alias'];
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