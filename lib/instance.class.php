<?php
class instance {
	private $config;
	private $raw_request;
	private $href_cache = array();
	private $hash_cache = array();
	public $uri;
	public $website = array("theme" => "default");
	public $page = array();
	public $user = array("id" => null);
	public $support = array();

	private function href_hash($record_id, $page){
		$ui = "{$page}{$record_id}";
		if(array_key_exists($ui, $this->hash_cache)){
			return $this->hash_cache[$ui];
		} else {
			$string = urlencode(str_replace(".","",crypt($ui, '$1$r'.md5($record_id.$this->config["href_salt"]))));
			$this->hash_cache[$ui] = $string;
			return $string;
		}
	}
	public function verify($silent = false){
		if($this->href($this->page["current"]["link"],$_GET["q"]) == SERVER."/{$this->page["current"]["link"]}?q=".urlencode($_GET["q"])."&amp;a=".urlencode($_GET["a"])){
			global $record_id;
			$record_id = $_GET["q"];
			return true;
		} else {
			if($silent==false){
				echo "<h1><b>404 - Error</b>: Invalid Request.</h1>";
				echo "<p>The requested record could not be accessed. If you have received this message in error, feel free to <a href=\"{$this->href("contact.html")}\">contact</a> me for assistance.</p>";
			}
			return false;
		}
	}
	public function href($string = "", $record_id = null){
		$extension = null;
		if(substr($string, 0, 4) === "http") {return $string;}
		if(($record_id!=null)&&($string=="")){$string = $this->page["current"]["link"];}
		if(array_key_exists($string,$this->href_cache)&&($record_id==null)){
			// return cached href
			return $this->href_cache[$string.$record_id];
		} else {
			// determine absolute href
			$href = "";
			$path_parts = pathinfo($string);
			if (strpos($path_parts["extension"], '?') !== FALSE){
				$extension = substr($path_parts["extension"], 0, strpos($path_parts["extension"], "?"));
			}
			if (strpos($path_parts["extension"], '#') !== FALSE){
				$extension = substr($path_parts["extension"], 0, strpos($path_parts["extension"], "#"));
			}
			if($extension==null){
				$extension = $path_parts["extension"];
			}

			if(in_array($extension, array("html","xml","cvs","pdf"))){
				// page href
				$parts = explode("/",$string);
				if (strpos($string,SERVER) !== false) {
					$href = $string;
				} else {
					$href = SERVER."/{$string}";
				}
				if($record_id!=NULL){
					// add $_GET url security encode for record_id
					$href .= "?q={$record_id}&amp;a={$this->href_hash($record_id,$path_parts["filename"].".".$extension)}";
				}
			} else {
				// check if file exists in current theme, else use default theme
				if(!file_exists("resources/themes/{$this->website["theme"]}/{$string}")){
					$href = SERVER."/resources/themes/default/{$string}";
				} else {
					$href = SERVER."/resources/themes/{$this->website["theme"]}/{$string}";
				}
			}
			$this->href_cache[$string.$record_id] = $href;
			return $href;
		}
	}
	function __construct(){
		global $db;
		$this->config = parse_ini_file("resources/config/default.conf");
		date_default_timezone_set($this->config["timezone"]);
		define("SERVER",$this->config["server"]);
		$this->website = array(
			"name" => $this->config["name"],
			"abbreviation" => $this->config["abbreviation"],
			"theme" => $this->config["theme"],
			"email" => $this->config["email"],
		);

		if ($_SERVER["REMOTE_ADDR"]!=$this->config["debug_ip"]){
			error_reporting(0);
		} else {
			error_reporting(E_ALL);
		}

		$db = new database($this->config["host"], $this->config["user"], $this->config["password"], $this->config["dbname"]);
		// parse raw request to determine page requested
		if(isset($_GET["request"])){
			$this->raw_request = preg_split("/\//", substr($_GET["request"],1));
		} else {
			$this->raw_request[0] = "home.html";
		}
		$_extension = pathinfo(end($this->raw_request), PATHINFO_EXTENSION);
		// 	end(explode('.', end($this->raw_request)));
		$this->page["current"]["link"] = implode("/", $this->raw_request);
		$this->page["current"]["file"] = str_replace(".{$_extension}",".php", $this->page["current"]["link"]);

		// load page info based on page file name if available
		$db->bind("link",$this->page["current"]["link"]);
		$row = $db->row("SELECT `pages`.`id`, `pages`.`name`, `pages`.`standalone`, `pages`.`signin_required`, `pages`.`meta_description`, `page_permissions`.`state` FROM `pages` LEFT JOIN `page_permissions` ON `pages`.`id` = `page_permissions`.`page_id` WHERE `link` = :link LIMIT 1;");
		if($row!=NULL){
			$this->page["current"] = $row + $this->page["current"];
			// load breadcrumb
			$db->bind("page_id",$this->page["current"]["id"]);
			$this->page["breadcrumbs"] = $db->query("SELECT `T2`.`id`, `T2`.`link`, `T2`.`name` FROM (SELECT @r AS _id, (SELECT @r := `parent_id` FROM `pages` WHERE `id` = _id) AS `parent_id` , @l := @l +1 AS `lvl` FROM (SELECT @r := :page_id, @l :=0) vars, `pages` m WHERE @r <>0) `T1` JOIN `pages` `T2` ON T1._id = `T2`.`id` ORDER BY `T1`.`lvl` DESC LIMIT 10;");
		} else {
			if(strlen($this->page["current"]["link"])>0){
				$this->page["current"]["id"] = 0;
				$this->page["current"]["meta_description"] = "Page not found";
				$this->page["current"]["file"] = "page-not-found.php";
				$this->page["current"]["link"] = "page-not-found.html";
				$this->page["current"]["name"] = "Page Not Found";
				$this->page["current"]["standalone"] = false;
				$this->page["current"]["state"] = null;
				$this->page["breadcrumbs"] = array(array("id" => 1, "link" => "home.html", "name"=>"Home"), array("id"=>NULL, "link" => "page-not-found.html", "name"=>"Page Not Found"));
			} else {
				$this->page["current"]["id"] = 1;
				$this->page["current"]["meta_description"] = "Home page";
				$this->page["current"]["file"] = "home.php";
				$this->page["current"]["link"] = "home.html";
				$this->page["current"]["name"] = "Home";
				$this->page["current"]["standalone"] = false;
				$this->page["current"]["state"] = "active";
				$this->page["breadcrumbs"] = array(array("id" => 1, "link" => "home.html", "name"=>"Home"));
			}
		}

		// find out who user is
		$this->user_get();

		// determine if user has permission to access the current page
		$db->bind("user_id",$this->user["id"]);
		$db->bind("page_id",$this->page["current"]["id"]);
		$active = $db->single("SELECT `active` FROM `user_group_members` LEFT JOIN `user_group_permissions` ON `user_group_members`.`group_id` = `user_group_permissions`.`group_id` WHERE `user_id` = :user_id AND `page_id` = :page_id AND `user_group_permissions`.`permission` = 1 LIMIT 1;");
		if($active==1){
			$this->user["permission"] = true;
		} else {
			$this->user["permission"] = false;
		}

		// get uri
		$this->uri = $this->href($this->page["current"]["link"]);
		if(count($_GET)>1){
			$bool = false;
			foreach ($_GET as $key => $value) {
				if($key=="request"){continue;}
				if($bool){
					$this->uri .= "&";
				} else {
					$this->uri .= "?";
					$bool = true;
				}
				if(is_array($value)) {
					foreach($value as $key2 => $value2){
						if(is_array($value2)){continue;}
						$this->uri .= "{$key}[{$key2}]=".urldecode($value2);
					}
				} else {
					$this->uri .= $key."=".urldecode($value);
				}
			}
		}
	}
	public function window($type, $override = false){
		global $instance;
		if(($instance->page["current"]["standalone"]==1)&&($override==false)){
			return false;
		} else {
			switch ($type) {
				case "header": include("resources/themes/{$instance->website["theme"]}/header.php"); break;
				case "footer": include("resources/themes/{$instance->website["theme"]}/footer.php"); break;
			}
		}
	}
	private function user_get(){
		global $db;
		if(isset($_POST["user-sign-out"])&&($_POST["user-sign-out"]==1)){
			// sign out user if requested
			if(isset($_SESSION["account"]["id"])){
				// add sign off record, which invalidates token
				$db->bind("remote_address",$_SERVER["REMOTE_ADDR"]);
				$db->bind("user_id",$_SESSION["account"]["id"]);
				$db->query("UPDATE `user_authentication` SET `sign_out_time` = NOW() WHERE `remote_address` = :remote_address AND `user_id` = :user_id AND `sign_out_time` IS NULL LIMIT 1;");
				unset($_SESSION["account"]);
			}
			// destroy cookie
			unset($_COOKIE["site_nosense"]);
			@setcookie("site_nosense", null, -1, '/');
		}
		if (isset($_SESSION["account"]["id"])) {
			// check for session
			$this->user = $_SESSION["account"];
			return true;
		} elseif (isset($_COOKIE["site_nosense"])) {
			// check for sign-in token
			$db->bind("token",$_COOKIE["site_nosense"]);
			$db->bind("remote_address",$_SERVER["REMOTE_ADDR"]);
			$row = $db->row("SELECT  `users`.`id`, `users`.`username`, `users`.`dateformat`, `timeformat`, `users`.`timezone` FROM `user_authentication` LEFT JOIN `users` ON `user_authentication`.`user_id` = `users`.`id` WHERE `user_authentication`.`remote_address` = :remote_address AND `user_authentication`.`token` = :token AND `user_authentication`.`sign_out_time` IS NULL LIMIT 1;");
			if (count($row) > 0){
				$_SESSION["account"]["id"] = $row["id"];
				$_SESSION["account"]["username"] = $row["username"];
				$_SESSION["account"]["dateformat"] = $row["dateformat"];
				$_SESSION["account"]["timeformat"] = $row["timeformat"];
				$_SESSION["account"]["timezone"] = $row["timezone"];
				$this->user = $_SESSION["account"];
				return true;
			}
		} elseif (isset($_POST["authorization"])) {
			// check for sign-in
			// check in banned due to brute force attempts
			$db->bind("remote_address",$_SERVER['REMOTE_ADDR']);
			$failed_attempts = $db->single("SELECT COUNT(`id`) AS `failed_attempts` from `user_authentication` where `timestamp` > date_sub(now(), interval 3 minute) AND `authenticated` = 0 AND `remote_address` = :remote_address LIMIT 5;");
			if($failed_attempts>=5){
				global $brute_force_detected;
				$brute_force_detected = true;
			} else {
				// trying to sign-in salt and password for check
				// check if user exist
				$db->bind("email", $_POST["authorization"]["email"]);
				$row = $db->row("SELECT `id`, `username`, `dateformat`, `timeformat`, `timezone`, `salt`, `password` FROM `users` WHERE `email` = :email LIMIT 1;");
				if ($row==null){
					global $authorization_failure;
					$authorization_failure = true;
					// brute force protection
					$db->bind("remote_address",$_SERVER['REMOTE_ADDR']);
					$db->bind("user_id",null);
					$db->bind("authenticated",0);
					$db->query("INSERT INTO `user_authentication` (`id`, `remote_address`, `user_id`, `authenticated`, `timestamp`) VALUES (NULL, :remote_address, :user_id, :authenticated, CURRENT_TIMESTAMP)");
				} else {
					if($row["password"] == crypt($_POST["authorization"]["password"], "\$6\$50\${$row["salt"]}")){
						unset($row["salt"]);
						unset($row["password"]);
						$this->user = $row;
						$_SESSION["account"] = $row;
						$db->bind("remote_address", $_SERVER['REMOTE_ADDR']);
						$db->bind("user_id",$row["id"]);
						$db->bind("authenticated",1);
						if(isset($_POST["authorization"]["remember"])&&($_POST["authorization"]["remember"]=="true")){
							$db->bind("stay_signed_in",1);
							$token = crypt($_SERVER["HTTP_X_FORWARDED_FOR"].$_SERVER["REMOTE_ADDR"], '$1$r'.$this->salt(date("U")));
							setcookie("site_nosense", $token, time() + (86400 * 30), '/');
							$db->bind("token",$token);
						} else {
							$db->bind("token",null);
							$db->bind("stay_signed_in",0);
						}
						$db->query("INSERT INTO `user_authentication` (`id`, `remote_address`, `user_id`, `authenticated`, `sign_in_time`, `sign_out_time`, `stay_signed_in`, `token`, `timestamp`) VALUES (NULL, :remote_address, :user_id, :authenticated, NOW(), NULL, :stay_signed_in, :token, CURRENT_TIMESTAMP);");
						return true;
					} else {
						// show authorication failed and add brute force protection record
						global $authorization_failure;
						$authorization_failure = true;
						$db->bind("remote_address",$_SERVER['REMOTE_ADDR']);
						$db->bind("user_id",$row["id"]);
						$db->bind("authenticated",0);
						$db->query("INSERT INTO `user_authentication` (`id`, `remote_address`, `user_id`, `authenticated`, `timestamp`) VALUES (NULL, :remote_address, :user_id, :authenticated, CURRENT_TIMESTAMP)");
					}
				}
			}
		}
		return false;
	}
	public function user_page_access($page_id){
		// allows external checks whether users can access a page
		global $db;
		$db->bind("user_id",$this->user["id"]);
		$db->bind("page_id",$page_id);
		if($db->single("SELECT 1 FROM `user_group_members` LEFT JOIN `user_group_permissions` ON `user_group_members`.`group_id` = `user_group_permissions`.`group_id` WHERE `user_group_members`.`user_id` = :user_id AND `user_group_permissions`.`page_id` = :page_id AND `user_group_members`.`active` = 1 AND `user_group_permissions`.`permission` = 1 LIMIT 1;")==1){
			return true;
		} else {
			return false;
		}
	}
}

$instance = new instance();
?>
