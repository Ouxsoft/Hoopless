<?php
echo "<div class=\"container instructions\">Select from the below snippets.</div>";

echo "<div class=\"container background-white\">";
echo "<div class=\"list-group\">";

$results = $db->query("SELECT `name`, `link`  FROM `pages` LEFT JOIN `page_permissions` ON `pages`.`id` = `page_permissions`.`page_id` WHERE `parent_id` = 17 AND `page_permissions`.`state` = 'active' ORDER BY `name` DESC;");
foreach($results as $row){
	echo "<a class=\"list-group-item\" href=\"{$row["link"]}\">{$row["name"]}</a>";
}

echo "</div>";
/*
echo "Page: ";
echo "<div class=\"btn-group\" role=\"group\" aria-label=\"page\">";
echo "<button type=\"button\" class=\"btn btn-default\">1</button>";
echo "</div>";
*/

echo "</div>";
?>
