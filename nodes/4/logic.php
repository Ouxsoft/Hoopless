<?php
if(isset($_POST['contact'])){
	$render->contact = $_POST['contact'];
} else {
	$render->contact = array(
		'name' => null,
		'subject' => null,
		'email' => null,
		'message' => null
	);
}
if(isset($_SESSION['account']['username'])){
	$render->contact['name'] = $_SESSION['account']['username'];
}

// handled post
if(isset($_POST['contact'])) {
	$error = false;

	if(strlen($render->contact['name'])>0) {
		$render->contact['name'] = trim($render->contact['name']);
	} else {
		$render->alert('Provide a valid name.','warning','contact-name');
		$error = true;
	}

	if(strlen($render->contact['subject'])>0) {
		$render->contact['subject'] = trim($render->contact['subject']);
	}

	if((strlen($render->contact['email'])>0)&&(preg_match('/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i', $render->contact['email']))) {
		$render->contact['email'] = trim($render->contact['email']);
	} else {
		$render->alert('Provide a valid email address.','warning','contact-email');
		$error = true;
	}

	if(strlen($render->contact['message'])>10) {
		if(function_exists('stripslashes')) {
			$render->contact['message'] = stripslashes(trim($render->contact['message']));
		} else {
			$message = trim($render->contact['message']);
		}
	} else {
		$render->alert('Provide a message longer than 10 charaters.','warning','contact-msg');
		$error = true;
	}

	if(!isset($_POST['norobot'])||(md5($_POST['norobot'])!=$_SESSION['code'])){
		$error = true;
		$render->alert('Incorrect security code supplied.','warning','contact-norobot');
	}

	if($error==false) {
		$headers = 'From: contact form <'.$render->contact['email'].'>'.PHP_EOL;
		$headers .= 'Reply-To: <'.$render->contact['email'].'>'.PHP_EOL;
		$headers .= 'MIME-Version: 1.0'.PHP_EOL;
		$headers .= 'Content-Type: text/html; charset=ISO-8859-1'.PHP_EOL;
		$message .= 'Name: '.$render->contact['name'].'<br/>';
		$message .= 'Subject: '.$render->contact['subject'].'<br/>';
		$message .= 'IP address: '.$_SERVER['REMOTE_ADDR'].'<br/><br/>';
		$message .= $render->contact['message'].PHP_EOL;
		mail($page->website['email'], $render->contact['subject'], '<html><body>'.$message.'</body></html>', $headers);
		$page->alert('Your message was successfully sent. I will be in contact with you shortly.','success');
		$render->contact['subject'] = '';
		$render->contact['message'] = '';
	}
}
?>
