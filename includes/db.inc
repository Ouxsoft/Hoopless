<?php
class database {
	private $pdo;
	private $sQuery;
	private $settings;
	private $bConnected = false;
	private $log;
	private $parameters;
	private $connections;

	// connect to database
	public function set_active($database = 'default'){
		if(isset($this->connections[$database])){
			$this->settings = $this->connections[$database];
			$this->connect();
			$this->parameters = array();
		} else {
			echo 'Connection to '.$database.' failed.';
			die();
		}
	}

	// load databases' config
	public function __construct() {
		$this->connections = parse_ini_file('resources/config/database.conf',true);
		$this->set_active();
	}

	private function connect() {
		try {
			# connect and charset UTF8
			$this->pdo = new PDO(
				'mysql:dbname='.$this->settings['dbname'].';'.
				'host='.$this->settings['host'],
				 $this->settings['user'], 
				 $this->settings['password'], 
				 array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
			);

			# we can now log any exceptions on fatal error.
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			# disable emulation of prepared statements, use REAL prepared statements instead.
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

			# connection succeeded, set the boolean to true.
			$this->bConnected = true;
		} catch (PDOException $e) {
			# write into log
			echo $this->log_exception($e->getMessage());
			die();
		}
	}

 	public function close_connection() {
 		$this->pdo = null;
	}

	private function Init($query, $parameters = '') {
		if(!$this->bConnected) { $this->Connect(); }
		try {
			$this->sQuery = $this->pdo->prepare($query);
			$this->bindMore($parameters);
			if(!empty($this->parameters)) {
				foreach($this->parameters as $param) {
					$parameters = explode("\x7F",$param);
					if($parameters[1]==NULL){
						$this->sQuery->bindValue($parameters[0], null, PDO::PARAM_INT);
					} else {
						$this->sQuery->bindParam($parameters[0],$parameters[1]);
					}
				}
			}
			$this->succes = $this->sQuery->execute();
		} catch(PDOException $e) {
			echo $this->log_exception($e->getMessage(), $query );
			die();
		}
		$this->parameters = array();
	}

	public function bind($para, $value) {
		$this->parameters[sizeof($this->parameters)] = ':' . $para . "\x7F" . $value;
	}

	public function bindMore($parray) {
		if(empty($this->parameters) && is_array($parray)) {
			$columns = array_keys($parray);
			foreach($columns as $i => &$column)	{
				$this->bind($column, $parray[$column]);
			}
		}
	}

 	public function query($query,$params = null, $fetchmode = PDO::FETCH_ASSOC) {
		$query = trim($query);
		$this->Init($query,$params);
		$statement = strtolower(substr($query, 0 , 6));
		if ($statement === 'select') {
			return $this->sQuery->fetchAll($fetchmode);
		} elseif ( $statement === 'insert' ||  $statement === 'update' || $statement === 'delete' ) {
			return $this->sQuery->rowCount();
		} else {
			return NULL;
		}
	}

	public function lastInsertId() {
		return $this->pdo->lastInsertId();
	}

	public function column($query,$params = null) {
		$this->Init($query,$params);
		$Columns = $this->sQuery->fetchAll(PDO::FETCH_NUM);
		$column = null;
		foreach($Columns as $cells) {
			$column[] = $cells[0];
		}
		return $column;
	}

	public function row($query,$params = null,$fetchmode = PDO::FETCH_ASSOC) {
		$this->Init($query,$params);
		return $this->sQuery->fetch($fetchmode);
	}

	public function single($query,$params = null) {
		$this->Init($query,$params);
		return $this->sQuery->fetchColumn();
	}

	private function log_exception($message , $sql = "") {
		global $log;
		if(!empty($sql)) {
			$message .= PHP_EOL.'Raw SQL : '  . $sql;
		}
		$log->write($message);
		return 'Unhandled Exception.'.PHP_EOL.$message.PHP_EOL.' This error is further detailed in the system log.';
	}
}

?>
