<?php
//nihil sub sole novum

function portfolio_href($type, $string){
	// get href for portfolio resources or href provided
	if(substr($string, 0, 4) === "http"){
		return($string);
	} else {
		return SERVER.'/assets/portfolio/'.$type.'/'.$string;
	}
}



echo '<div class="col-md-12 mb-2 bg-1">';

echo "<h2 class=\"center\">Experiences</h2>";
echo "<h3>Careers</h3>";

echo "<div class=\"row\">";
echo "<div class=\"col-md-4\"><h4>Small Startup Studio (Game Designer)</h4>2004 to 2006</div>";
echo "<div class=\"col-md-8\"><h4>Web Developer / Game Developer</h4>";
echo "<p>Programmed 2D isometric game engine for Portable Sony PlayStation® primarily using Lua.
Programmed visual level editor in C# and .NET for quick and efficient level design.</a></p>";
echo "<div class=\"experience-details\">";
echo "<span class=\"glyphicon glyphicon-map-marker\"></span>Online</a>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
// abilities

echo '<div class="col-md-12 mb-2 bg-1">';
echo "<h2 class=\"center\">Abilities</h2>";

// skills
$results = $db->query("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Game skills' ORDER BY `score` DESC, `name`");
if(count($results)>0){
	echo "<h3>Skills</h3>";
	echo "<hr/>";
	echo "<div class=\"row\">";
	foreach($results as $row) {
		echo "<div class=\"col-md-6\">";
		echo "<ul class=\"no-bullets\">";
		echo "<li>";
		echo "<span class=\"ability-title\">{$row["title"]}</span>";
		echo "<span class=\"ability-score\">";
		for($i = 1; $i<=5; $i++){
			echo "<span class=\"glyphicon glyphicon-star".(($i<=$row["score"])?" filled":"")."\"></span>";
		}
		echo "</span>";
		echo "</li>";
		echo "</div>";
	}
	echo "</div>";
}

// tools
$results = $db->query("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Game tools' ORDER BY `score` DESC, `name`");
if(count($results)>0){
	echo "<h3>Tools</h3>";
	echo "<hr/>";
	echo "<div class=\"row\">";
	foreach($results as $row) {
		echo "<div class=\"col-md-6\">";
		echo "<ul class=\"no-bullets\">";
		echo "<li>";
		echo "<span class=\"ability-title\">{$row["title"]}</span>";
		echo "<span class=\"ability-score\">";
		for($i = 1; $i<=5; $i++){
			echo "<span class=\"glyphicon glyphicon-star".(($i<=$row["score"])?" filled":"")."\"></span>";
		}
		echo "</span>";
		echo "</li>";
		echo "</div>";
	}
	echo "</div>";
}
echo "</div>";


echo '<div class="col-md-12 mb-2 bg-1">';
// projects
$db->bind("category","game");
$results = $db->query("SELECT CONCAT(IF(`title` IS NULL, 'N/A', CONCAT('<b>',`title`,'</b>')), IF(`media` IS NULL, '', CONCAT(' - ',`media`)),' ',`year`) AS `title`, `href`,`thumbnail` FROM `portfolio` WHERE `category` = :category ORDER BY `year` DESC, `id` ASC");
if(count($results)>0){
	echo "<h2 class=\"center\">Projects</h2>";
	echo "<p>Presented below are images of game engines, level editors, and game resources I have developed.</p>";
	// issue with closing div
	echo "<div class=\"row\">";
	foreach ($results as $row){
		echo "<div class=\"col-xs-3\">";
		echo "<div class=\"thumbnail\"><a href=\"".portfolio_href("images", $row["href"])."\" alt=\"{$row["title"]}\" data-toggle=\"lightbox\" data-gallery=\"multiimages\" data-title=\"{$row["title"]}\"><img src=\"".portfolio_href("thumbnails", $row["thumbnail"])."\" style=\"\"/></a></div>";
		echo "</div>";
	}
	echo "</div>";
}

echo "</div>";
?>
