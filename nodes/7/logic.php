<?php
if($instance->user['brute_force_detected']==true){
	echo 'brute force detected';
} else {
}
print_r($instance->user['authorization_failure']);
?>
