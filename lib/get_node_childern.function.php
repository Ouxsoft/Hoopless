<?php
function get_node_childern($parent_id = NULL, $state = 'active'){
  global $db;
  $db->bind('parent_id',$parent_id);
  $db->bind('state',$state);
  return $db->query(
    'SELECT `node`.`title`, `node_alias`.`alias` FROM `node`
    LEFT JOIN `node_alias` ON `node`.`node_id` = `node_alias`.`node_id`
    LEFT JOIN `node_permission` ON `node`.`node_id` = `node_permission`.`node_id`
    WHERE `parent_id` = :parent_id AND `node_permission`.`state` = :state
    ORDER BY `node`.`title` DESC'
  );
}
?>
