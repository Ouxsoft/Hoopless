<?php
//nihil sub sole novum

function portfolio_href($type, $string){
	// get href for portfolio resources or href provided
	if(substr($string, 0, 4) === "http"){
		return($string);
	} else {
		return SERVER."/resources/portfolio/{$type}/{$string}";
	}
}


// introduction


echo "<h1 class=\"container center\">Robotics Development</h1>";

echo "<div class=\"container alert alert-info\" role=\"alert\"><b>Fun fact</b>: Did you know my grandfather, the late <b>Norman Heroux</b>, invented the <em>first</em> successful industrial robot? <a href=\"https://en.wikipedia.org/wiki/Industrial_robot\"><span class=\"glyphicon glyphicon-link\"></span> Read more</a>.</div>";

echo "<div class=\"container background-white\">";
echo "<h2 class=\"center\">Experiences</h2>";
echo "<h3>Careers</h3>";

echo "<div class=\"row\">";
echo "<div class=\"col-md-4\"><h4>Questech&reg; Corporation</h4>2006 to 2011</div>";
echo "<div class=\"col-md-8\"><h4>Programmer Operator</h4>";
echo "<p>Developed software applications for Fanuc RJ32 robots and operated robots.</a></p>";
echo "<div class=\"experience-details\">";
echo "<span class=\"glyphicon glyphicon-map-marker\"></span>Rutland, Vermont USA | <span class=\"glyphicon glyphicon-link\"></span> <a href=\"http://questech.com/\">http://questech.com/</a>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";

// abilities
echo "<div class=\"container background-white\">";
echo "<h2 class=\"center\">Abilities</h2>";

// skills
$results = $db->query("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Robotic skills' ORDER BY `score` DESC, `name`");
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
$results = $db->query("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Robotic tools' ORDER BY `score` DESC, `name`");
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



// projects
echo "<div class=\"container background-white\">";

$db->bind("category","robot");
$results = $db->query("SELECT CONCAT(IF(`title` IS NULL, 'N/A', CONCAT('<b>',`title`,'</b>')), IF(`media` IS NULL, '', CONCAT(' - ',`media`)),' ',`year`) AS `title`, `href`,`thumbnail` FROM `portfolio` WHERE `category` = :category ORDER BY `year` DESC, `id` ASC");
if(count($results)>0){
	echo "<h2 class=\"center\">Projects</h2>";
	echo "<p>Presented below are discussions and images of systems I have designed for robots. </p>";
	echo "<div class=\"row\">";
	foreach ($results as $row){
		echo "<div class=\"col-xs-3\">";
		echo "<div class=\"thumbnail\"><a href=\"".portfolio_href("img", $row["href"])."\" alt=\"{$row["title"]}\" data-toggle=\"lightbox\" data-gallery=\"multiimages\" data-title=\"{$row["title"]}\"><img src=\"".portfolio_href("thumbnail", $row["thumbnail"])."\" style=\"\"/></a></div>";
		echo "</div>";
	}
	echo "</div>";
}
echo "</div>";
?>