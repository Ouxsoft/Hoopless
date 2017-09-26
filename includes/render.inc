<?php
/*
a class containing data that is passed to Mustache render
*/

class render {

	public $alerts = array('types' => array('success','info','warning','danger'));

	function __construct(){
        global $db;
        global $request;
		global $page;
		global $CFG;

		$this->config = $CFG;

		// user data
		@$this->user['full_name'] = $user->full_name;
		
		// page data

        // load template info
        $db->bind('node_id',$page->node_id);
        $row = $db->row('
            SELECT `template`,`heading`,`meta_description` FROM `node` WHERE `node_id` = :node_id LIMIT 1;
        ');
	    if(is_array($row)){
    	    $this->template = $row['template'];
			$this->heading = $row['heading'];
			$this->meta_description = $row['meta_description'];
		}
				
		// load breadcrumb
		$db->bind('node_id_1',$page->node_id);
		$db->bind('node_id_2',$page->node_id);
		$this->breadcrumb = $db->query('
			SELECT `T2`.`title`, `node_alias`.`alias`, IF(`T2`.`node_id` = :node_id_1, \'true\', NULL) AS `active`
			FROM (
				SELECT @r AS _id, (
				SELECT @r := `parent_id` FROM `node` WHERE `node_id` = _id
			) AS `parent_id`, @l := @l +1 AS `lvl` 
			FROM (
				SELECT @r := :node_id_2, @l :=0) vars, `node` WHERE @r <>0
			) `T1`
			JOIN `node` `T2` ON T1._id = `T2`.`node_id`
			LEFT JOIN `node_alias` ON `T2`.`node_id` = `node_alias`.`node_id` 
			ORDER BY `T1`.`lvl` DESC LIMIT 10;
		');
		$this->depth = count($this->breadcrumb);

		// remove breadcrumb on home page
		if($this->depth <=1){
			$this->breadcrumb = NULL;
		}	
	}

	public function alert(string $string, string $type = 'info', string $category = 'main'){
		// add text
		if(isset($this->alerts[$category]['value'])){
			$this->alerts[$category]['value'] .= ' '.$string;
		} else {
			$this->alerts[$category]['value'] = $string;
		}
		// add type
		if(isset($this->alerts[$category]['type'])){
			$a = array_search($this->alerts[$category]['type'], $this->alerts['types']);
			$b = array_search($type, $this->alerts['types']);
			if($a < $b){
				$this->alerts[$category]['type'] = $type;
			}
		} else {
			$this->alerts[$category]['type'] = $type;
		}
	}

}
?>