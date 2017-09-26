<?php
/* 
contains information related to the page that is used to identify the page and for rendering
*/
class page {
	public $node_id; // e.g. : 23
	public $address; // absolute, e.g. : https://example.com/use-cases/ge/ehs
	public $alias; // relative, e.g. : /use-cases/ge/ehs
    public $title; // e.g. : Environmental, Heath and Safety
	public $permission; // e.g. human-resources
	public $menu = array(); 

	public function __construct(string $value, array $load = array('metadata'), string $identifier = 'alias'){

        global $db;
		global $request;
		global $user;
		
		switch($identifier){
			case 'node_id':
				$db->bind('node_id',$value);		
				$row = $db->row('
					SELECT `node`.`node_id`,`node_alias`.`alias`, `node`.`title`,`node`.`template`, `user_permission`.`name` as `permission`
					FROM `node_alias`
					LEFT JOIN `node` ON `node_alias`.`node_id` = `node`.`node_id`
					LEFT JOIN `user_permission` ON `node`.`permission_id` = `user_permission`.`permission_id`
					WHERE `node`.`node_id` = :node_id
					LIMIT 1
				');
				break;
			case 'alias':
			case 'address':
				$db->bind('alias',$value);		
				$row = $db->row('
					SELECT `node`.`node_id`,`node_alias`.`alias`, `node`.`title`,`user_permission`.`name` as `permission`
					FROM `node_alias`
					LEFT JOIN `node` ON `node_alias`.`node_id` = `node`.`node_id`
					LEFT JOIN `user_permission` ON `node`.`permission_id` = `user_permission`.`permission_id`
					WHERE `node_alias`.`alias` = :alias
					LIMIT 1
				');
				break;
		}
		if(is_array($row)){
			$this->address = $row['alias'];
			$this->alias = $row['alias'];
			$this->node_id = $row['node_id'];
			$this->folder = 'nodes/'.$this->node_id.'/';
			$this->permission = $row['permission'];
			$this->title = $row['title'];
			$this->shortcut = str_replace('/','>',$this->alias);
			$this->files = array_diff(scandir($this->folder), array('..', '.'));
			
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