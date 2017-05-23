<?php
include 'includes/alert.inc';

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
	echo '<textarea name="content" wrap="soft">'.htmlspecialchars(file_get_contents($file)).'</textarea>';
	echo '<input type="hidden" name="submit_check" value="1">';
	echo '</form>';
	echo '</div>';
	echo '<script src="'.SERVER.'/assets/tinymce/tinymce.min.js"></script>';
	echo '<script>';
	echo 'tinymce.init({ ';
	echo 'protect: [ ';
	echo '/<\?php[\s\S]*?\?>/g ';
	echo '], ';
	echo 'selector: \'textarea\', ';
	echo 'height: 500, ';
	echo 'theme: \'modern\', ';
	echo 'plugins: [ ';
	echo '\'advlist autolink lists link image charmap print preview hr anchor pagebreak\', \'searchreplace wordcount visualblocks visualchars code fullscreen\', \'insertdatetime media nonbreaking save table contextmenu directionality\', \'template paste textcolor colorpicker textpattern imagetools codesample\' ';
	echo '], ';
	echo 'toolbar1: \'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image\', ';
	echo 'toolbar2: \'print preview media | forecolor backcolor emoticons | codesample\', ';
	echo 'image_advtab: true, ';
	echo 'templates: [ ';
	echo '{ title: \'Test template 1\', content: \'Test 1\' }, ';
	echo '{ title: \'Test template 2\', content: \'Test 2\' } ';
	echo '], ';
//	echo 'content_css: [ ';
//	echo '\'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i\', ';
//	echo '\'//www.tinymce.com/css/codepen.min.css\' ';
//	echo '] ';
	echo '}); ';
	echo '</script>';
}
