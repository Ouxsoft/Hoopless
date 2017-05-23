<?php
include 'includes/get_node_childern.inc';
$instance->render['node_list'] = get_node_childern($instance->page['current']['node_id'],'active');
?>
