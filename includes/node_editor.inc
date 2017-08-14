<?php
$node_dir = 'nodes/' . $instance->page['current']['node_id']. '/';
$node_files =  array_slice(scandir($node_dir),2);
echo '<h1>Node Editor #'.$instance->page['current']['node_id'].'</h1>';
echo '<form method="GET">';
echo 'File: <select name="file" onchange="this.form.submit()">';
foreach($node_files as $value){
	echo '<option>'.$value.'</option>';
}
echo '</select>';
echo '</form>';

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

function is_json($string) {
	try {
		json_decode($string);
 		return (json_last_error() == JSON_ERROR_NONE);
	} catch (Exception $e) {
		return false;
	}
}

// decode json file
if(isset($_GET['resume'])){
	$data_file = preg_replace("/[^A-Za-z0-9 -]/", '', $_GET['resume']);
} else {
	$data_file = 'default';
}

if(is_json($_REQUEST['JSON'])){
	file_put_contents('nodes/' . $instance->page['current']['node_id']. '/'. $data_file .'.json', $_REQUEST['JSON']);
}

$json_file = file_get_contents('nodes/' . $instance->page['current']['node_id']. '/'. $data_file .'.json');

?>
<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

  <link href="/assets/jsoneditor/jsoneditor.min.css" rel="stylesheet" type="text/css">
  <script src="/assets/jsoneditor/jsoneditor.min.js"></script>

  <style type="text/css">
    body {
      font: 10.5pt arial;
      color: #4d4d4d;
      line-height: 150%;
      width: auto;
    }
    code {
      background-color: #f5f5f5;
    }
    #jsoneditor {
      width: 100%;
      height: auto;
    }
  </style>
</head>
<body>
  <input type="button" value="Save" onclick="javascript:post('<?php
  echo $_GET['request'];//['alias'].'/edit'; ?>', {JSON: editor.getText()});"/>

<div id="jsoneditor"></div>

<script>
  var container, options, json, editor;
  container = document.getElementById('jsoneditor');
  options = {
    mode: 'tree',
    modes: ['code', 'form', 'text', 'tree', 'view'], // allowed modes
    onError: function (err) {
      alert(err.toString());
    }
  };
  json = <?php echo $json_file;?>;
  editor = new JSONEditor(container, options, json);
	editor.expandAll()


	function post(path, params, method) {
	method = method || "post"; // Set method to post by default if not specified.

	// The rest of this code assumes you are not using a library.
	// It can be made less wordy if you use one.
	var form = document.createElement("form");
	form.setAttribute("method", method);
	form.setAttribute("action", path);

	for(var key in params) {
			if(params.hasOwnProperty(key)) {
					var hiddenField = document.createElement("input");
					hiddenField.setAttribute("type", "hidden");
					hiddenField.setAttribute("name", key);
					hiddenField.setAttribute("value", params[key]);

					form.appendChild(hiddenField);
			 }
	}

	document.body.appendChild(form);
	form.submit();
}
</script>
</body>
</html>
