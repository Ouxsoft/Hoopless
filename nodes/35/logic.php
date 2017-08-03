<?php

// add version history
if($instance->verify()){
	$file = 'nodes/'.$record_id.'/view.mustache';
	if(!file_exists($file)){
		echo 'File does not exists';
		die();
	}
	$allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img><li><ol><ul><span><div><br><ins><del>';
	if ($_POST['submit_check']){
		$alert->add('success','Node updated');
		$fp = fopen($file, 'w') or die(print_r(error_get_last(),true));
		$data = htmlspecialchars_decode($_POST['content']); //strip_tags(stripslashes($_POST["content"]),$allowedTags);
		fwrite($fp, $data) or die(print_r(error_get_last(),true));
		fclose($fp);
	}
	// replace with mustache call build alert into class
	//$alert->get();

	$instance->render['file'] = htmlspecialchars(file_get_contents($file));
}
