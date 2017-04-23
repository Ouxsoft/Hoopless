<?php
include('lib/get_node_childern.function.php');
$instance->render['node_list'] = get_node_childern($instance->page['current']['node_id'],'active');
?>
