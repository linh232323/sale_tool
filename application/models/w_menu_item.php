<?php 
class w_menu_item extends eav_model{
	public function getOptions(){
		return array(
			'top-menu' => array(
				'title'=> ' Top Menu',
				'id' => 1
			),
		);
	}
	public function setAttributeCodes(){
		$this->_attributes[] = 'name';
		$this->_attributes[] = 'link';
		
	}
	public function getItems($menu_id){
		$all_data = parent::getAllData();

		$result = array();

		foreach($all_data as $data){
			$menu  = new w_menu_item;
			$menu->load($data->id);
			if($menu->getData('menu_id') != $menu_id)
				continue;

			$result[] = $menu;
		}

		
		return $result;
	}
}
?>