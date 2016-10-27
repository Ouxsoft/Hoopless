<?php
//nihil sub sole novum

function portfolio_href($type, $string){
	// get href for portfolio resources or href provided
	if(substr($string, 0, 4) === 'http'){
		return($string);
	} else {
		return SERVER.'/assets/portfolio/'.$type.'/'.$string;
	}
}

// experiences
echo '<div class="container background-white">';
echo '<h2 class="center">Experiences</h2>';
echo '<h3>Careers</h3>';

echo '<div class="row">';
echo '<div class="col-md-4"><h4>JNH Environmental Service, Inc.</h4>2012 to Present</div>';
echo '<div class="col-md-8"><h4>Lead Developer</h4>';
echo '<p>Design web content, promotion items, and updated company\'s logo.</p>';
echo '<div class="experience-details">';
echo '<span class="glyphicon glyphicon-map-marker"></span>Rutland and Brandon, Vermont USA | <span class="glyphicon glyphicon-link"></span> <a href="https://jnhes.com">https://jnhes.com</a>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="row">';
echo '<div class="col-md-4"><h4>Small Startup Studio</h4>2004 to 2006</div>';
echo '<div class="col-md-8"><h4>Web Developer</h4>';
echo '<p>Designed and developed online development platform to enable game developers to collaborate. Designed in game content.</p>';
echo '<div class="experience-details">';
echo '<span class="glyphicon glyphicon-map-marker"></span>Online';
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="row">';
echo '<div class="col-md-4"><h4>Lyndon Institute (Independent Publication)</h4>2012 to Present</div>';
echo '<div class="col-md-8"><h4>Layout Editor</h4>';
echo '<p>Arranged and balanced content for reoccurring publication using primarily Adobe® Illustrator.</p>';
echo '<div class="experience-details">';
echo '<span class="glyphicon glyphicon-map-marker"></span>Lyndon Center, Vermont';
echo '</div>';
echo '</div>';
echo '</div>';

echo '</div>';

//echo '<p>I have always like drawing and admire the works of Alex Grey (who I've enjoyed watching paint at CoSM) and Kentaro Miura.</p>';

// abilities
echo '<div class="container background-white">';
echo '<h2 class="center">Abilities</h2>';

// skills
$results = $db->query("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Art skills' ORDER BY `score` DESC, `name`");
if(count($results)>0){
	echo '<h3>Skills</h3>';
	echo '<hr/>';
	echo '<div class="row">';
	foreach($results as $row) {
		echo '<div class="col-md-6">';
		echo '<ul class="no-bullets">';
		echo '<li>';
		echo '<span class="ability-title">'.$row["title"].'</span>';
		echo '<span class="ability-score">';
		for($i = 1; $i<=5; $i++){
			echo '<span class="glyphicon glyphicon-star'.(($i<=$row["score"])?' filled':'').'"></span>';
		}
		echo '</span>';
		echo '</li>';
		echo '</ul>';
		echo '</div>';
	}
	echo '</div>';
}

// tools
$results = $db->query("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Art tools' ORDER BY `score` DESC, `name`");
if(count($results)>0){
	echo '<h3>Tools</h3>';
	echo '<hr/>';
	echo '<div class="row">';
	foreach($results as $row) {
		echo '<div class="col-md-6">';
		echo '<ul class="no-bullets">';
		echo '<li>';
		echo '<span class="ability-title">'.$row["title"].'</span>';
		echo '<span class="ability-score">';
		for($i = 1; $i<=5; $i++){
			echo '<span class="glyphicon glyphicon-star'.(($i<=$row['score'])?' filled':'').'"></span>';
		}
		echo '</span>';
		echo '</li>';
		echo '</ul>';
		echo '</div>';
	}
	echo '</div>';
}
echo '</div>';

echo '<div class="container background-white">';
echo '<h2 class="center">Awards</h2>';

echo '<div class="row">';
echo '<div class="col-md-4"><h4>Statewide Art Competition</h4>2005</div>';
echo '<div class="col-md-8"><h4>Senator James M. Jeffords Award</h4>';
echo '<p>Painted to win Senator James M. Jeffords award for statewide art competition.</p>';
echo '<div class="experience-details">';
echo '<span class="glyphicon glyphicon-map-marker"></span>Montpelier, Vermont';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

// projects
echo '<div class="container background-white">';
$db->bind('category','art');
$results = $db->query("SELECT CONCAT(IF(`title` IS NULL, 'N/A', CONCAT('<b>',`title`,'</b>')), IF(`media` IS NULL, '', CONCAT(' - ',`media`)),' ',`year`) AS `title`, `href`,`thumbnail` FROM `portfolio` WHERE `category` = :category ORDER BY `year` DESC, `id` ASC");
if(count($results)>0){
	echo '<h2 class="center">Projects</h2>';
	echo '<p>Presented below are various art works I have made using Zbrush, Photoshop, Illustrator, Sketchup, acrylics, watercolors, pen/ink, and even <em>mspaint</em>.</p>';
	echo '<div class="row">';
	foreach ($results as $row){
		echo '<div class="col-xs-3">';
		echo '<div class="thumbnail"><a href="'.portfolio_href('images', $row['href']).'" alt="'.$row['title'].'" data-toggle="lightbox" data-gallery="multiimages" data-title="'.$row["title"].'"><img src="'.portfolio_href('thumbnails', $row['thumbnail']).'" alt="Project"/></a></div>';
		echo '</div>';
	}
	echo '</div>';
}
echo '</div>';
?>
