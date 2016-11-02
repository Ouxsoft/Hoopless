<?php
function buildTree(array $elements, $parent_id = 0) {
	$branch = array();
	foreach ($elements as $element) {
		if ($element['parent_id'] == $parent_id) {
			$children = buildTree($elements, $element['id']);
			if ($children) {
				$element['children'] = $children;
			}
			$branch[] = $element;
		}
	}
	return $branch;
}
?>