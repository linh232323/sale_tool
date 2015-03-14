<?php
class w_service extends eav_model{
	public function getTable(){
		$this->_table = 'services';
		return $this->_table;
	}

	public function getEAVTable(){
		
		return 'w_eav_' . 'services';
	}

	public function getItems(){
		$all_data = parent::getAllData();

		$result = array();

		foreach($all_data as $data){
			$service  = new w_hotel;
			$service->load($data->id);
			$id = $service->getData('id');
			
			if(isset($id))
				$result[] = $service;
		}

		return $result;
	}
}
?>