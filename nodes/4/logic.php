<?php
if(isset($_POST['contact'])){
	$instance->render['contact'] = $_POST['contact'];
} else {
	$instance->render['contact'] = array(
		'name' => null,
		'subject' => null,
		'email' => null,
		'message' => null
	);
}
if(isset($_SESSION['account']['username'])){
	$instance->render['contact']['name'] = $_SESSION['account']['username'];
}

// handled post
if(isset($_POST['contact'])) {
	$error = false;

	if(strlen($instance->render['contact']['name'])>0) {
		$instance->render['contact']['name'] = trim($instance->render['contact']['name']);
	} else {
		$instance->alert->add('warning','Provide a valid name'); $error = true;
	}

	if(strlen($instance->render['contact']['subject'])>0) {
		$instance->render['contact']['subject'] = trim($instance->render['contact']['subject']);
	}

	if((strlen($instance->render['contact']['email'])>0)&&(preg_match('/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i', $instance->render['contact']['email']))) {
		$instance->render['contact']['email'] = trim($instance->render['contact']['email']);
	} else {
		$instance->alert->add('warning','Provide a valid email address');
		$error = true;
	}

	if(strlen($instance->render['contact']['message'])>10) {
		if(function_exists('stripslashes')) {
			$instance->render['contact']['message'] = stripslashes(trim($instance->render['contact']['message']));
		} else {
			$message = trim($instance->render['contact']['message']);
		}
	} else {
		$instance->alert->add('warning','Provide a message longer than 10 charaters');
		$error = true;
	}

	if(!isset($_POST['norobot'])||(md5($_POST['norobot'])!=$_SESSION['code'])){
		$error = true;
		$instance->alert->add('warning','Incorrect security code supplied');
	}

	if($error==false) {
		$headers = 'From: contact form <'.$instance->render['contact']['email'].'>'.PHP_EOL;
		$headers .= 'Reply-To: <'.$instance->render['contact']['email'].'>'.PHP_EOL;
		$headers .= 'MIME-Version: 1.0'.PHP_EOL;
		$headers .= 'Content-Type: text/html; charset=ISO-8859-1'.PHP_EOL;
		$message .= 'Name: '.$instance->render['contact']['name'].'<br/>';
		$message .= 'Subject: '.$instance->render['contact']['subject'].'<br/>';
		$message .= 'IP address: '.$_SERVER['REMOTE_ADDR'].'<br/><br/>';
		$message .= $instance->render['contact']['message'].PHP_EOL;
		mail($instance->website['email'], $instance->render['contact']['subject'], '<html><body>'.$message.'</body></html>', $headers);
		$instance->alert->add('success','Your message was successfully sent. I will be in contact with you shortly');
		$instance->render['contact']['subject'] = '';
		$instance->render['contact']['message'] = '';
	}
}
?>
