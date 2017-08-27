<?php
// log : retains record for system admin
class log {
	private $path = 'logs/';
	public $alerts = array('types' => array('success','info','warning','danger'));
	
	public function __construct() {}

	public function write($message) {
		$date = new DateTime();
		$log = $this->path.$date->format('Y-m-d').'.txt';
		if(is_dir($this->path)) {
			if(!file_exists($log)) {
				$fh  = fopen($log, "a+") or die('Fatal Error !');
				$logcontent = 'Time : ' . $date->format('H:i:s')."\r\n{$message}\r\n";
				fwrite($fh, $logcontent);
				fclose($fh);
			} else {
				$this->edit($log,$date, $message);
			}
		} else {
			if(mkdir($this->path,0777) === true){
				$this->write($message);
			}
		}
	}
	private function edit($log,$date,$message) {
		$logcontent = 'Time : '.$date->format('H:i:s').PHP_EOL.$message.PHP_EOL.PHP_EOL;
		$logcontent = $logcontent . file_get_contents($log);
		file_put_contents($log, $logcontent);
	}

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
}