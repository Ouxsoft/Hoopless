<?php
// namespace main;

// request :: controls the web request
class request {
	public $raw_request;
	public $website = array('theme' => 'default');
	public $permalink = array();
	public $cache = array('href' => array());
	public $uri;
	public $page_address;
	public $action;

	public function parse(){
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
					$this->action = $action;
					$alias = preg_replace('/\b\/'.$action.'$/', '', $alias);
					break;
				} 	
			}
		} else {
			$this->raw_request[0] = '/';
			$this->action = $actions[0];
			$alias = '/';
		}

		// separate page instance request into own class
		$this->page['current']['alias'] = $alias;
		$this->page_address = $alias;
	}


	// constuct
	public function __construct(){
		global $db;
		global $user;

		// establish primary database connection

		$this->load_permalinks();
		$this->parse();
		$this->get_uri();
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