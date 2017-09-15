<?php
// check if string is json
function is_json($string) {
	try {
		json_decode($string);
 		return (json_last_error() == JSON_ERROR_NONE);
	} catch (Exception $e) {
		return false;
	}
}

$node_dir = 'nodes/'.$page->node_id.'/';
if(isset($_GET['file'])){
	$file = basename($_GET['file']);
	$file_path = $node_dir.'/'.$file;
	if(file_exists($file_path)){
		$ext = pathinfo($file_path, PATHINFO_EXTENSION);
		switch ($ext){
			case 'php':
				// TODO : save file
				$page->editor['code'] = true;
				break;
			case 'json':
				$page->editor['json'] = true;
				// save json
				if(isset($_REQUEST['JSON']) && is_json($_REQUEST['JSON'])){
					file_put_contents($file_path, $_REQUEST['JSON']);
				}
				break;
			case 'mustache':
				$page->editor['view'] = true;
				break;
		}
		// load file
		if(isset($file)){
			$page->render['contents'] = file_get_contents($file_path);	
		}	
	}
} else {
	$file = NULL;
}
$node_files =  array_slice(scandir($node_dir),2);
$page->render['node_files'] = '';
foreach($node_files as $node_file){
	$page->render['node_files'] .= '<option'.(($file==$node_file)?' selected':'').'>'.$node_file.'</option>';	
}

/*
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
*/

/*
// decode json file
if(isset($_GET['resume'])){
	$data_file = preg_replace("/[^A-Za-z0-9 -]/", '', $_GET['resume']);
} else {
	$data_file = 'default';
}
*/

?>
