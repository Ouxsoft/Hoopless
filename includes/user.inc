<?php
// user :: controls client info
class user {
    public $id;
    public $fullname;
    public $dateformat;
    public $timeformat;
    public $timezone;
    private $permission = array();
    public $auth = array(
		'failure' => NULL, // was a sign-in failure detected
		'banned' => NULL, // is remote address banned from sign-in form
		'tries' => array(
			'email' => '', // the email address used to sign in
			'max' => 5, // max amount of failed tries in 30 minutes
			'current' => 0, // the current amount of failed tries
			'remainder' => 0, // the remainder of tries before banned equals true
		)
	);

    function __construct(){
        $this->get_metadata();
        $this->get_permission();
    }

    function get_permission() {
        if($this->id==NULL) {
            return false;
        } else {
            global $db;
            // load user permissions and user group permissions
            $db->bind('user_id_1',$this->id);
            $db->bind('user_id_2',$this->id);
            $results = $db->query('
				SELECT `name` FROM (
					SELECT `permission_id`
						FROM `user_has_permission`
						WHERE `user_id` = :user_id_1
						AND `end_date` IS NULL
					UNION
					SELECT `permission_id` FROM `user_group_has_member` 
						LEFT JOIN `user_group_has_permission` ON `user_group_has_member`.`group_id` = `user_group_has_permission`.`group_id`
						WHERE `user_id` = :user_id_2
						AND `user_group_has_permission`.`end_date` IS NULL
						AND `user_group_has_member`.`end_date` IS NULL    
				) AS `permissions`
				LEFT JOIN `user_permission` ON `permissions`.`permission_id` = `user_permission`.`permission_id`
			 	WHERE `user_permission`.`end_date` IS NULL
            ');
            foreach($results as $row){
                $this->permission[] = $row['permission'];
            }
            return true;    
        }
    }

    function get_metadata() {
		global $db;
		if(isset($_POST['user-sign-out'])&&($_POST['user-sign-out']==1)){
			// sign out user if requested
			if(isset($_SESSION['user']['id'])){
				// add sign off record, which invalidates token
				$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
				$db->bind('user_id',$_SESSION['user']['id']);
				$db->query('
                    UPDATE `user_authentication` SET `sign_out_time` = NOW()
					WHERE `remote_address` = :remote_address 
                    AND `user_id` = :user_id 
                    AND `sign_out_time` IS NULL
                    LIMIT 1;
                ');
				unset($_SESSION['user']);
			}
			// destroy cookie
			unset($_COOKIE['site_nosense']);
			@setcookie('site_nosense', null, -1, '/');
		}
		if (isset($_SESSION['user']['id'])) {
            // check for session
            $this->id = $_SESSION['user']['id'];
            $this->fullname = $_SESSION['user']['full_name'];
            $this->dateformat = $_SESSION['user']['dateformat'];
            $this->timeformat = $_SESSION['user']['timeformat'];
            $this->timezone = $_SESSION['user']['timezone'];
            return true;
		} elseif (isset($_COOKIE['site_nosense'])) {
			// check for sign-in token
			$db->bind('token',$_COOKIE['site_nosense']);
			$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
			$row = $db->row('
                SELECT  `user`.`user_id`, `user`.`full_name`, `user`.`dateformat`, `timeformat`, `user`.`timezone`
                FROM `user_authentication`
				LEFT JOIN `user` ON `user_authentication`.`user_id` = `user`.`user_id`
				WHERE `user_authentication`.`remote_address` = :remote_address
				AND `user_authentication`.`token` = :token
				AND `user_authentication`.`sign_out_time` IS NULL
                LIMIT 1;
            ');
			if (count($row) > 0){
				$this->id = $_SESSION['user']['id'] = $row['user_id'];
				$this->fullname = $_SESSION['user']['full_name'] = $row['full_name'];
				$this->dateformat = $_SESSION['user']['dateformat'] = $row['dateformat'];
				$this->timeformat = $_SESSION['user']['timeformat'] = $row['timeformat'];
				$this->timezone = $_SESSION['user']['timezone'] = $row['timezone'];
				return true;
			}
		} elseif (isset($_POST['sign_in'])) {
			$this->auth['tries']['email'] = $_POST['sign_in']['email'];
			// check for sign-in
			// check in banned due to brute force tries
			$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
			$this->auth['tries']['current'] = $db->single('
                SELECT COUNT(`id`)
				FROM `user_authentication`
				WHERE `timestamp` > date_sub(now(), INTERVAL 30 MINUTE) 
                AND `authenticated` = 0 
                AND `remote_address` = :remote_address
                LIMIT 5;
            ');
			if(is_numeric($this->auth['tries']['current'])){
				$this->auth['tries']['remainder'] = $this->auth['tries']['max'] - $this->auth['tries']['current'];
			} else {
				$this->auth['tries']['remainder'] = 0;
			}
			if($this->auth['tries']['remainder']<=0){
				$this->auth['banned'] = true;
			} else {
				// trying to sign-in salt and password for check
				// check if user exist
				$db->bind('email', $this->auth['tries']['email']);
				$row = $db->row('
                    SELECT `user_id`, `full_name`, `dateformat`, `timeformat`, `timezone`, `salt`, `password` 
                    FROM `user` 
                    WHERE `email` = :email 
                    LIMIT 1;
                ');
				if ($row==null){
					$this->auth['failure'] = true;
					// brute force protection
					$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
					$db->bind('user_id',null);
					$db->bind('authenticated',0);
					$db->query('
                        INSERT INTO `user_authentication` (`id`, `remote_address`, `user_id`, `authenticated`, `timestamp`) VALUES (NULL, :remote_address, :user_id, :authenticated, CURRENT_TIMESTAMP)
                    ');
				} else {
					if($row['password'] == crypt($_POST['sign_in']['password'], '$6$50$'.$row['salt'])){
						unset($row['salt']);
						unset($row['password']);                   
                        $this->id = $_SESSION['user']['id'] = $row['user_id'];
                        $this->fullname = $_SESSION['user']['full_name'] = $row['full_name'];
                        $this->dateformat = $_SESSION['user']['dateformat'] = $row['dateformat'];
                        $this->timeformat = $_SESSION['user']['timeformat'] = $row['timeformat'];
                        $this->timezone = $_SESSION['user']['timezone'] = $row['timezone'];

						$db->bind('remote_address', $_SERVER['REMOTE_ADDR']);
						$db->bind('user_id',$this->id);
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
						$db->query('
                            INSERT INTO `user_authentication` (`id`, `remote_address`, `user_id`, `authenticated`, `sign_in_time`, `sign_out_time`, `stay_signed_in`, `token`, `timestamp`)
                            VALUES (NULL, :remote_address, :user_id, :authenticated, NOW(), NULL, :stay_signed_in, :token, CURRENT_TIMESTAMP);
                        ');
						return true;
					} else {
						// show authorication failed and add brute force protection record
						$this->auth['failure'] = true;
						$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
						$db->bind('user_id',$row['user_id']);
						$db->bind('authenticated',0);
						$db->query('
                            INSERT INTO `user_authentication` (`id`, `remote_address`, `user_id`, `authenticated`, `timestamp`) VALUES (NULL, :remote_address, :user_id, :authenticated, CURRENT_TIMESTAMP)
                        ');
					}
				}
            }
        }
        return false;
	}

	// check if user has permissions to access something
    // $user->access('human-resources')
    function has_permission($permission){
		if($permission==NULL){
			return true;
		} else if(in_array($permission, $this->permission)){
            return true;
        } else {
            return false;
        }
	}
	
	// check if user sign in
	function signed_in(){
		if($this->id==NULL){
			return false;
		} else {
			return true;
		}
	}
}