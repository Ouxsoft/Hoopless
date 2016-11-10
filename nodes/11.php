<?php
header("Content-type: text/xml");

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
$results = $db->query('SELECT `link`,`change_freq`,`priority` FROM `pages`;');
foreach($results as $row){
  echo '<url>';
  echo '<loc>'.$instance->href($row['link']).'</loc>';
  // get lastmod if file exists
  $row['link'] = 'pages/'.substr_replace($row['link'], 'php', strrpos($row['link'], '.') +1);
  if(file_exists($row['link'])){
    echo '<lastmod>'.date('c', filemtime($row['link'])).'</lastmod>';
  }
  echo '<changefreq>'.$row['change_freq'].'</changefreq>';
  echo '<priority>'.$row['priority'].'</priority>';
  echo '</url>';
}
echo '</urlset>';
?>
