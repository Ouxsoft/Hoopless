<?php
function get_node_childern($parent_id = NULL){
  global $db;
  $db->bind('parent_id',$parent_id);
  return $db->query('
    SELECT `node`.`title`, `node_alias`.`alias` FROM `node`
    LEFT JOIN `node_alias` ON `node`.`node_id` = `node_alias`.`node_id`
    WHERE `parent_id` = :parent_id
    ORDER BY `node`.`title` DESC
  ');
}
?>
