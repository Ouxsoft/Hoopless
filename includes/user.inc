<?php
// user :: controls client info
// TODO : Consider retired
class user {
    public $id;
    public $fullname;
    public $dateformat;
    public $timeformat;
    public $timezone;
   	public $permission = array();
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
        $this->load();
        $this->load_permission();
    }

    function load_permission() {
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
                $this->permission[] = $row['name'];
			}
            return true;
        }
    }

	function get_token(){
		// change token strength and db based on security desired
		// include these
		// $this->id;
		// $_SERVER['REMOTE_ADDR'];
		// $token = crypt($_SERVER['HTTP_X_FORWARDED_FOR'].$_SERVER['REMOTE_ADDR'], '$1$r'.$this->salt(date('U')));
		
		return random_bytes(255);
	}

	function check_hash($password, $salt, $hash){
		// TODO: customize
		if($hash == crypt($password, '$6$50$'.$salt)){
			return true;
		} else {
			return false;
		}
	}

	function set_metadata($data = NULL){
		if (isset($data['user_id'])){
			// set user meta data
			$this->id = $data['user_id'];
			$this->full_name = $data['full_name'];
			$this->dateformat = $data['dateformat'];
			$this->timeformat = $data['timeformat'];
			$this->timezone = $data['timezone'];
			return true;
		} else {
			// set user meta data
			$this->id = NULL;
			$this->full_name = NULL;
			$this->dateformat = NULL;
			$this->timeformat = NULL;
			$this->timezone = NULL;
			return false;
		}
	}

    function load() {
		global $db;

		// check if user signed in and who user is
		if (isset($_COOKIE['site_nosense'])) {
			// TODO: come up with something cleaver technically token should be renewed on page load for non-remember tokens

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
			if ($this->set_metadata($row)==false){
				// destroy cookie
				unset($_COOKIE['site_nosense']);
				@setcookie('site_nosense', null, -1, '/');
			}
		}

		// check if sign out requested
		if(isset($_POST['user-sign-out'])&&($_POST['user-sign-out']==1)){
			// sign out user if requested
			if(isset($this->id)){
				// add sign off record, which invalidates token
				$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
				$db->bind('user_id',$this->id);
				$db->query('
                    UPDATE `user_authentication` SET `sign_out_time` = NOW()
					WHERE `remote_address` = :remote_address 
                    AND `user_id` = :user_id 
                    AND `sign_out_time` IS NULL
                    LIMIT 1;
				');
				$this->set_metadata();
			}
			// destroy cookie
			unset($_COOKIE['site_nosense']);
			@setcookie('site_nosense', null, -1, '/');
		}

		// check for sign-in
		if (isset($_POST['sign_in'])) {
			$this->auth['tries']['email'] = $_POST['sign_in']['email'];
			
			// check in banned due to brute force tries
			$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
			$this->auth['tries']['current'] = $db->single('
                SELECT COUNT(`ua_id`)
				FROM `user_authentication`
				WHERE `timestamp` > date_sub(now(), INTERVAL 30 MINUTE) 
                AND `authenticated` = 0 
                AND `remote_address` = :remote_address
                LIMIT 5;
			');
			if(is_numeric($this->auth['tries']['current'])){
				$this->auth['tries']['remainder'] = $this->auth['tries']['max'] - $this->auth['tries']['current'];
				// if no tries remaining ban user
				if($this->auth['tries']['remainder']<=0){
					$this->auth['banned'] = true;
					return false;
				}	
			} else {
				$this->auth['tries']['remainder'] = 0;
			}
			
			// check if user exist
			$db->bind('email', $this->auth['tries']['email']);
			$row = $db->row('
                SELECT `user_id`, `full_name`, `dateformat`, `timeformat`, `timezone`, `salt`, `password` AS `hash` 
                FROM `user` 
                WHERE `email` = :email 
                LIMIT 1;
			');
			
			// if user does not exist insert record of failed attempt 
			if (!isset($row['user_id'])||($row['user_id']==null)){
				// brute force protection
				$this->auth['failure'] = true;
				$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
				$db->bind('user_id',null);
				$db->bind('authenticated',0);
				$db->query('
                   INSERT INTO `user_authentication` (`id`, `remote_address`, `user_id`, `authenticated`, `timestamp`) VALUES (NULL, :remote_address, :user_id, :authenticated, CURRENT_TIMESTAMP)
				');
				return false;
			// trying to sign-in salt and password for check
			} else if($this->check_hash($_POST['sign_in']['password'],$row['salt'],$row['hash'])){
				// set user data
				$this->set_metadata($row);
				
				// add login record
				$token = $this->get_token();
				$db->bind('remote_address', $_SERVER['REMOTE_ADDR']);
				$db->bind('user_id',$this->id);
				$db->bind('authenticated',1);
				$db->bind('token',$token);
				if(isset($_POST['sign_in']['remember'])&&($_POST['sign_in']['remember']=='true')){
					$db->bind('stay_signed_in',1);
					setcookie('site_nosense', $token, time() + (86400 * 30), '/');
				} else {
					$db->bind('stay_signed_in',0);
					setcookie('site_nosense', $token, time() + (86400 * 30), '/');
				}						
				$db->query('
					INSERT INTO `user_authentication` (`ua_id`, `remote_address`, `user_id`, `authenticated`, `sign_in_time`, `sign_out_time`, `stay_signed_in`, `token`, `timestamp`)
                    VALUES (NULL, :remote_address, :user_id, :authenticated, NOW(), NULL, :stay_signed_in,:token, CURRENT_TIMESTAMP);
				');

				return true;
			// show authentication failed and add brute force protection record
			} else {
				$this->auth['failure'] = true;
				$db->bind('remote_address',$_SERVER['REMOTE_ADDR']);
				$db->bind('user_id',$row['user_id']);
				$db->bind('authenticated',0);
				$db->query('
					INSERT INTO `user_authentication` (`id`, `remote_address`, `user_id`, `authenticated`, `timestamp`) VALUES (NULL, :remote_address, :user_id, :authenticated, CURRENT_TIMESTAMP)
                ');
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