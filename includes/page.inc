<?php
class page {
	public $node_id; // e.g. : 23
	public $address; // absolute, e.g. : https://example.com/use-cases/ge/ehs
	public $alias; // relative, e.g. : /use-cases/ge/ehs
    public $title; // e.g. : Environmental, Heath and Safety
	public $permission; // e.g. human-resources
	public $menu = array(); 
	public $render; 
	public $config; 
        
	public function __construct($identifier = NULL){
        global $db;
		global $request;
		global $user;
		
		// TODO: consider inheritance
		// set renderable user info
		@$this->user['full_name'] = $user->full_name;

		if($identifier == NULL){
			$identifier = $request->page_address;
			$this->config = $request->config;
		}

        // lookup up bare necessities
		if (is_int($identifier)){
			// based on node_id
			$db->bind('node_id',$identifier);		
			$row = $db->row('
				SELECT `node`.`node_id`,`node_alias`.`alias`, `node`.`title`,`node`.`template`, `user_permission`.`name` as `permission`
				FROM `node_alias`
				LEFT JOIN `node` ON `node_alias`.`node_id` = `node`.`node_id`
				LEFT JOIN `user_permission` ON `node`.`permission_id` = `user_permission`.`permission_id`
				WHERE `node`.`node_id` = :node_id
				LIMIT 1
			');
		} else if (is_string($identifier)) {
			// based on node_alias
			$db->bind('alias',$identifier);		
			$row = $db->row('
				SELECT `node`.`node_id`,`node_alias`.`alias`, `node`.`title`,`user_permission`.`name` as `permission`
				FROM `node_alias`
				LEFT JOIN `node` ON `node_alias`.`node_id` = `node`.`node_id`
				LEFT JOIN `user_permission` ON `node`.`permission_id` = `user_permission`.`permission_id`
				WHERE `node_alias`.`alias` = :alias
				LIMIT 1
			');
        }
		if(is_array($row)){
			$this->node_id = $row['node_id'];
			$this->alias = $row['alias'];
			$this->address = $row['alias'];
			$this->action = 'view';
			$this->permission = $row['permission'];
			$this->title = $row['title'];

            // if current page determine & load additional information 
            if($this->alias == $request->page_address){
				$this->shortcut = str_replace('/','>',$this->alias);
                $this->folder = 'nodes/'.$this->node_id.'/';
                $this->files = array_diff(scandir($this->folder), array('..', '.'));
                $db->bind('node_id',$this->node_id);
                $row = $db->row('
                    SELECT `template`,`heading`,`meta_description` FROM `node` WHERE `node_id` = :node_id LIMIT 1;
                ');
    		    if(is_array($row)){
		    	    $this->template = $row['template'];
					$this->heading = $row['heading'];
					$this->meta_description = $row['meta_description'];

			        // action = 'view';
                    // uri
				}
				
				// load breadcrumb
				$db->bind('node_id_1',$this->node_id);
				$db->bind('node_id_2',$this->node_id);
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
				$this->depth  = count($this->breadcrumb);

				// remove breadcrumb on home page
				if($this->depth <=1){
					$this->breadcrumb = NULL;
				}

				
            }
            // self::$cache[] = $this;
            // somehow use self::cache? for static class members
            // public static $cache = array();    
        } else {
			// page not found;
			$this->node_id = 0;
			$this->title = 'Page Not Found';
			$this->template = 'default';
			$this->permission = NULL;
			$this->meta_description = 'Page not found';
        }    
	}

	// build tree from parent child relationship
	public function build_tree(array $elements, int $parent_id = 0) {
		$branch = array();
		foreach ($elements as $element) {
			if ($element['parent_id'] == $parent_id) {
				$children = $this->build_tree($elements, $element['id']);
				if ($children) {
					$element['children'] = $children;
				}
				$branch[] = $element;
			}
		}
		return $branch;
	}

	// build menu array from an db array
	public function build_menu(array $array, int $level = 0) {
		global $request;

		$menu = array();
		foreach($array as $value) {
			$item = array();
			if($value['alias']==$request->page_address){
				$item['active'] = true;
			}
			if(@$value['class']!=NULL){
				$item['class'] = $value['class'];
			}
			$item['title'] = $value['title'];
			$item['id'] = $value['id'];
			if(@is_array($value['children'])){
				$item['submenu'] = true;
				$item['children'] = $this->build_menu($value['children'], $level+1);
			} else {
				$item['submenu'] = false;				
				$item['alias'] = $value['alias'];
			}
			$menu[] = $item;
		}
		return $menu;
	}
}