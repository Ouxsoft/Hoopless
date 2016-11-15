<?php
header("Content-type: text/xml");

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
// only include active nodes that actually exist
$results = $db->query('SELECT `node`.`node_id`, `node_alias`.`alias`,`node`.`change_freq`,`node`.`priority` FROM `node` LEFT JOIN `node_alias` ON `node`.`node_id` = `node_alias`.`node_id` LEFT JOIN `node_permission` ON `node`.`node_id` = `node_permission`.`node_id` WHERE `node_permission`.`state` = \'active\';');
foreach($results as $row){
  if(file_exists('nodes/'.$row['node_id'].'.php')){
	  echo '<url>';
	  echo '<loc>'.$instance->href($row['alias']).'</loc>';
	  echo '<lastmod>'.date('c', filemtime('nodes/'.$row['node_id'].'.php')).'</lastmod>';
	  echo '<changefreq>'.$row['change_freq'].'</changefreq>';
	  echo '<priority>'.$row['priority'].'</priority>';
	  echo '</url>';
  }
}
echo '</urlset>';
?>
