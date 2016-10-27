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

// experience
echo "<div class=\"container background-white\">";
echo "<h2 class=\"center\">Experiences</h2>";
echo "<h3>Education</h3>";
echo "<hr/>";

echo "<div class=\"row\">";
echo "<div class=\"col-md-4\"><h4>Castleton University</h4>2012</div>";
echo "<div class=\"col-md-8\"><h4>Bachelor of Science in Computer Information Systems/Business</h4>";
echo "<div class=\"experience-details\">";
echo "<span class=\"glyphicon glyphicon-map-marker\"></span>Castleton, Vermont USA";
echo "</div>";
echo "</div>";
echo "</div>";

echo "<div class=\"row\">";
echo "<div class=\"col-md-4\"><h4><abbr title=\"Community College of Vermont\">CCV</abbr></h4>2009</div>";
echo "<div class=\"col-md-8\"><h4>Associate of Science Degree, Computer Systems Management</h4>";
echo "<div class=\"experience-details\">";
echo "<span class=\"glyphicon glyphicon-map-marker\"></span>Newport, Vermont USA";
echo "</div>";
echo "</div>";
echo "</div>";

echo "<div class=\"row\">";
echo "<div class=\"col-md-4\"><h4>Cisco Systems Networking Academy</h4>2005</div>";
echo "<div class=\"col-md-8\"><h4>Fundamentals of Web Design</h4>";
echo "<div class=\"experience-details\">";
echo "<span class=\"glyphicon glyphicon-map-marker\"></span>Lyndon Center, Vermont USA";
echo "</div>";
echo "</div>";
echo "</div>";

echo "<h3>Careers</h3>";
echo "<hr/>";

echo "<div class=\"row\">";
echo "<div class=\"col-md-4\"><h4>JNH Environmental Service, Inc.</h4>2012 to Present</div>";
echo "<div class=\"col-md-8\"><h4>Lead Developer</h4>";
echo "<p>As a senior at JNH I lead a team in the development of systems that protect the health and safety of employees and the environment, such as the <a href=\"https://jnhes.com/demo/home.html\" target=\"_blank\">EHS Compliance Center&trade;</a></p>";
echo "<div class=\"experience-details\">";
echo "<span class=\"glyphicon glyphicon-map-marker\"></span>Rutland and Brandon, Vermont USA | <span class=\"glyphicon glyphicon-link\"></span> <a href=\"https://jnhes.com\" target=\"_blank\">https://jnhes.com</a>";
echo "</div>";
echo "</div>";
echo "</div>";


echo "<div class=\"row\">";
echo "<div class=\"col-md-4\"><h4>JNH Environmental Service, Inc.</h4>2011 to 2012</div>";
echo "<div class=\"col-md-8\"><h4>Intern - Web Developer</h4>";
echo "<p>As an intern at JNH I worked on the company's web site and learning the company's numerous services.</a></p>";
echo "<div class=\"experience-details\">";
echo "<span class=\"glyphicon glyphicon-map-marker\"></span>Pittsford, Vermont USA | <span class=\"glyphicon glyphicon-link\"></span> <a href=\"https://jnhes.com\" target=\"_blank\">https://jnhes.com</a>";
echo "</div>";
echo "</div>";
echo "</div>";


echo "<div class=\"row\">";
echo "<div class=\"col-md-4\"><h4>Questech&reg; Corporation</h4>2006 to 2011</div>";
echo "<div class=\"col-md-8\"><h4>Programmer Operator</h4>";
echo "<p>Designed and developed web based documentation system for robots.<p>";
echo "<div class=\"experience-details\">";
echo "<span class=\"glyphicon glyphicon-map-marker\"></span>Rutland, Vermont | <span class=\"glyphicon glyphicon-link\"></span> <a href=\"http://questech.com\" target=\"_blank\">http://questech.com</a>";
echo "</div>";
echo "</div>";
echo "</div>";

echo "<div class=\"row\">";
echo "<div class=\"col-md-4\"><h4>Small Startup Studio</h4>2004 to 2006</div>";
echo "<div class=\"col-md-8\"><h4>Web Developer</h4>";
echo "<p>Designed and developed online development platform to enable game developers to collaborate.</p>";
echo "<div class=\"experience-details\">";
echo "<span class=\"glyphicon glyphicon-map-marker\"></span>Online";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";

// abilities

echo "<div class=\"container background-white\">";
echo "<h2 class=\"center\">Abilities</h2>";
echo "<h3>Skills</h3>";
echo "<hr/>";
echo "<div class=\"row\">";
$results = $db->query("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Web skills' ORDER BY `score` DESC, `name`");
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

echo "<h3>Tools</h3>";
echo "<hr/>";
echo "<div class=\"row\">";
$results = $db->query("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Web tools' ORDER BY `score` DESC, `name`");
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
echo "<br/>";
echo "<div class=\"text-center\"><p><i>This site is built on a custom made PHP framework.</i></p><button type=\"button\" class=\"btn btn-primary btn-lg\" onclick=\"window.open('https://github.com/mrheroux/hxcms')\">See project on Github <span class=\"glyphicon glyphicon-menu-right\"></span></button></div>";

echo "<h3>Languages</h3>";
echo "<hr/>";
echo "<div class=\"row\">";
$results = $db->query("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Languages' ORDER BY `score` DESC, `name`");
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
echo "</div>";


// awards
echo "<div class=\"container background-white\">";
echo "<h2 class=\"center\">Awards</h2>";

echo "<div class=\"row\">";
echo "<div class=\"col-md-4\"><h4>SkillsUSA </h4>2005</div>";
echo "<div class=\"col-md-8\"><h4>Computer Programming</h4>";
echo "<p>Programmed a banking system within the allowed time to win 2nd place in SkillsUSA State of Vermont competition for computer programming.</p>";
echo "<div class=\"experience-details\">";
echo "<span class=\"glyphicon glyphicon-map-marker\"></span>Burlington, Vermont";
echo "</div>";
echo "</div>";
echo "</div>";


echo "<div class=\"row\">";
echo "<div class=\"col-md-4\"><h4>American Computer Science League </h4>2003 to 2004</div>";
echo "<div class=\"col-md-8\"><h4>Computer Programming</h4>";
echo "<p>Programmed several applications over the course of the year to win 1st place in American Computer Science League competition.</p>";
echo "<div class=\"experience-details\">";
echo "<span class=\"glyphicon glyphicon-map-marker\"></span>Lyndon, Vermont";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";

// projects
echo "<div class=\"container background-white\">";
echo "<h2 class=\"center\">Projects</h2>";
echo "<p>Presented below are some of the websites and web systems I have designed and developed. Some of the information has been censored due to active contractual agreements.</p>";

echo "<div class=\"row\">";
$db->bind("category","web");
$results = $db->query("SELECT CONCAT(IF(`title` IS NULL, 'N/A', CONCAT('<b>',`title`,'</b>')), IF(`media` IS NULL, '', CONCAT(' - ',`media`)),' ',`year`) AS `title`, `href`,`thumbnail` FROM `portfolio` WHERE `category` = :category ORDER BY `year` DESC, `id` ASC");
foreach ($results as $row){
	echo "<div class=\"col-xs-3\">";
	echo "<div class=\"thumbnail\"><a href=\"".portfolio_href("images", $row["href"])."\" alt=\"{$row["title"]}\" data-toggle=\"lightbox\" data-gallery=\"multiimages\" data-title=\"{$row["title"]}\"><img src=\"".portfolio_href("thumbnails", $row["thumbnail"])."\" style=\"\"/></a></div>";
	echo "</div>";
}
echo "</div>";
echo "</div>";

?>
