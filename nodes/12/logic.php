<?php
//nihil sub sole novum
function results_score($query){
	global $db;
	$results = $db->query($query);
	$array = array();
	foreach($results as $row){
		$sub_array = array();
		$sub_array['title'] = $row['title'];
		for($i = 0; $i<5; $i++){
			if($row['score']>=$i){
				$sub_array['score'][] = ' filled';
			} else {
				$sub_array['score'][] = '';
			}
		}
		$array[] = $sub_array;
	}
	return $array;
}

$instance->render['skills'] = results_score("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Web skills' ORDER BY `score` DESC, `name`"); 

$instance->render['tools'] = results_score("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Web tools' ORDER BY `score` DESC, `name`");

$instance->render['languages'] = results_score("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Languages' ORDER BY `score` DESC, `name`");

$db->bind("category","web");
$instance->render['portfolio'] = $db->query("SELECT CONCAT(IF(`title` IS NULL, 'N/A', CONCAT('<b>',`title`,'</b>')), IF(`media` IS NULL, '', CONCAT(' - ',`media`)),' ',`year`) AS `title`, `href`,`thumbnail` FROM `portfolio` WHERE `category` = :category ORDER BY `year` DESC, `id` ASC");
?>