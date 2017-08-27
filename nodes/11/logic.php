<?php
header('Content-type: text/xml');

// build site map array of active nodes that exactly exists
$results = $db->query('
  SELECT `node`.`node_id`, `node_alias`.`alias`,`node`.`change_freq`,`node`.`priority`
  FROM `node`
  LEFT JOIN `node_alias` ON `node`.`node_id` = `node_alias`.`node_id`
  WHERE `node`.`permission_id` IS NULL;
');

$page->render['sitemap'] = array();

foreach($results as $row){
  $file = $page->folder.'view.mustache';
  if(!file_exists($file)){
    continue;
  }
  $page->render['sitemap'][] = array(
    'loc' => $row['alias'],
    'lastmod' => date('c', filemtime($file)),
    'changefreq' => $row['change_freq'],
    'priority' => $row['priority']
  );
}
?>
