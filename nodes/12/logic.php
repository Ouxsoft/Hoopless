<?php
//nihil sub sole novum
function parse_stars($json) {
	foreach($json as $row){
		$sub_array = array(
			'title' => $row['title'],
			'score' => array(),
		);
		$count = 0;
		do {
			if ($row['score'] > 2) {
				$sub_array['score'][] = 'star';
			} else if ($row['score'] == 1) {
				$sub_array['score'][] = 'star_half';
			} else {
				$sub_array['score'][] = 'star_border';
			} 
			$row['score'] = $row['score'] - 2;
			$count = $count + 2;
		} while ($count < 10);
		$array[] = $sub_array;
	}
	return $array;	
}

$json_file = file_get_contents('nodes/' . $instance->page['current']['node_id']. '/data.json');
$instance->render['data'] = json_decode($json_file, true);
$instance->render['data']['skills'] = parse_stars($instance->render['data']['skills']);
$instance->render['data']['tools'] = parse_stars($instance->render['data']['tools']);
$instance->render['data']['languages'] = parse_stars($instance->render['data']['languages']);
?>