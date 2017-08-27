<?php
if(isset($_POST['contact'])){
	$page->render['contact'] = $_POST['contact'];
} else {
	$page->render['contact'] = array(
		'name' => null,
		'subject' => null,
		'email' => null,
		'message' => null
	);
}
if(isset($_SESSION['account']['username'])){
	$page->render['contact']['name'] = $_SESSION['account']['username'];
}

// handled post
if(isset($_POST['contact'])) {
	$error = false;

	if(strlen($page->render['contact']['name'])>0) {
		$page->render['contact']['name'] = trim($page->render['contact']['name']);
	} else {
		$page->alert('Provide a valid name.','warning','contact-name');
		$error = true;
	}

	if(strlen($page->render['contact']['subject'])>0) {
		$page->render['contact']['subject'] = trim($page->render['contact']['subject']);
	}

	if((strlen($page->render['contact']['email'])>0)&&(preg_match('/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i', $page->render['contact']['email']))) {
		$page->render['contact']['email'] = trim($page->render['contact']['email']);
	} else {
		$page->alert('Provide a valid email address.','warning','contact-email');
		$error = true;
	}

	if(strlen($page->render['contact']['message'])>10) {
		if(function_exists('stripslashes')) {
			$page->render['contact']['message'] = stripslashes(trim($page->render['contact']['message']));
		} else {
			$message = trim($page->render['contact']['message']);
		}
	} else {
		$page->alert('Provide a message longer than 10 charaters.','warning','contact-msg');
		$error = true;
	}

	if(!isset($_POST['norobot'])||(md5($_POST['norobot'])!=$_SESSION['code'])){
		$error = true;
		$page->alert('Incorrect security code supplied.','warning','contact-norobot');
	}

	if($error==false) {
		$headers = 'From: contact form <'.$page->render['contact']['email'].'>'.PHP_EOL;
		$headers .= 'Reply-To: <'.$page->render['contact']['email'].'>'.PHP_EOL;
		$headers .= 'MIME-Version: 1.0'.PHP_EOL;
		$headers .= 'Content-Type: text/html; charset=ISO-8859-1'.PHP_EOL;
		$message .= 'Name: '.$page->render['contact']['name'].'<br/>';
		$message .= 'Subject: '.$page->render['contact']['subject'].'<br/>';
		$message .= 'IP address: '.$_SERVER['REMOTE_ADDR'].'<br/><br/>';
		$message .= $page->render['contact']['message'].PHP_EOL;
		mail($page->website['email'], $page->render['contact']['subject'], '<html><body>'.$message.'</body></html>', $headers);
		$page->alert('Your message was successfully sent. I will be in contact with you shortly.','success');
		$page->render['contact']['subject'] = '';
		$page->render['contact']['message'] = '';
	}
}
?>
