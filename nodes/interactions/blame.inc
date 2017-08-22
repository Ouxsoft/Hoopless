<?php

$node_dir = 'nodes/' . $instance->page['current']['node_id']. '/';
$node_files =  array_slice(scandir($node_dir),2);
echo '<h1>Node Editor #'.$instance->page['current']['node_id'].'</h1>';
echo '<form method="GET">';
echo 'File: <select name="file" onchange="this.form.submit()">';
foreach($node_files as $value){
    $file = $instance->page['current']['folder'].$node_files;
    echo $file;
    /*
    $command = 'git blame '.$file;
    $results =  shell_exec($command);

    echo '<pre>';
    echo htmlspecialchars($results,  ENT_XHTML, 'UTF-8');
    echo '</pre>';
    */
}
?>