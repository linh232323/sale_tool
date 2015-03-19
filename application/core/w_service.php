<?php
class w_service extends eav_model{
	public function getTable(){
		$this->_table = 'services';
		return $this->_table;
	}

	public function setAttributeCodes(){

		parent::setAttributeCodes();
		
		$this->_attributes[] ='name';

		$this->_attributes[] ='thumbnail_url';

		$this->_attributes[] ='short_description';

		$this->_attributes[] ='description';

		$this->_attributes[] ='appendix';

		$this->_attributes[] ='program';
	}

	public function getEAVTable(){
		
		return 'w_eav_' . 'services';
	}

	public function getItems($service_type_id){
		$result = array();


		$this->db->select('*');
        $this->db->from($this->getTable());
        $this->db->where('service_type_id', $service_type_id);
        $this->db->where('deleted',0);
         if (!empty($this->_page_size) || !empty($this->_offset)) {
         
            $this->db->limit( $this->_page_size, $this->_offset);
        }         
        $query = $this->db->get();


        $services = $query->result();

		foreach($services as $data){
			$class = get_class($this);
			$service  = new $class;
			$service->load($data->id);
			$id = $service->getData('id');
			
			if(isset($id))
				$result[] = $service;
		}

		return $result;
	}
}
?>