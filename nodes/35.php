<?php
include('lib/alert.class.php');
// add version history
if($instance->verify()){
	$file = 'nodes/'.$record_id.'.php';
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

	$alert->get();

	echo '<div class="container background-white">';
	echo '<form method="post" id="edit" name="edit" enctype="multipart/form-data">';
	echo '<select>';
	foreach(array("WYSIWYG","PHP Code") as $key => $value) {
		echo '<option>'.$value.'</option>';
	}
	echo '</select>';
	echo '<div class="text-right">';
	echo '<button type="submit" name="submit" class="btn btn-default" form="edit" value="save"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Save</button>';
	echo '</div>';
	echo '<textarea style="min-height: 500px" name="content" wrap="soft">';
/*
	if ($f = fopen($file, 'r')) {
		do {
    	echo fgets($f);
		} while (!feof($f));
	}
	fclose($f);*/
	echo htmlspecialchars(file_get_contents($file));

	echo '</textarea>';
	echo '<input type="hidden" name="submit_check" value="1">';
	echo '</form>';
	echo '</div>';


	echo '<script language="javascript" type="text/javascript">
	tinyMCE.init({
	theme : "advanced",
	mode: "exact",
	elements : "elm1",
	theme_advanced_toolbar_location : "top",
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
	+ "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
	+ "bullist,numlist,outdent,indent",
	theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
	+"undo,redo,cleanup,code,separator,sub,sup,charmap",
	theme_advanced_buttons3 : "",
	height:"350px",
	width:"600px"
	}); ';
	echo '</script>';
	echo '<script src="'.SERVER.'/assets/tinymce/tinymce.min.js"></script>';
	echo '<script>tinymce.init({ selector:\'textarea\' });</script>';
}
