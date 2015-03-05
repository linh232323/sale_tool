<?php
class eav_model extends mabstract{

	protected $_attributes = array(

	);
	public function getEAVTable(){
		return 'w_eav_' . strtolower(get_class($this));
	}

	public function saveAttributes($entity_id, $store_code = null){
		if($store_code == null){
			$w_store = new w_store();
			$store_code = $w_store->getCurrentStore();
		}
	}

	public function save(){

		
		
	}

	public function load($id){
		$this->beforeLoad();

		parent::load($id);

		$this->loadAttributes();

		$this->afterLoad();
	}

	public function beforeLoad(){

	}

	public function afterLoad(){

	}

	public function loadAttributes($entity_id = null,$store_code = null){
		if($entity_id == null){
			$entity_id = $this->getData('id');
		}

		if($store_code == null){
			$w_store = new w_store();
			$store_code = $w_store->getCurrentStore();
		}

        $eav_table = $this->getEAVTable());

        $sql = "SELECT * FROM {$eav_table} 
        		WHERE 	entity_id = {$entity_id} 
        			AND store_code = '{$store_code}'
        			AND attribute_code IN ('".implode(",", $this->_attributes)."')";

		$this->db->query($sql);

        $query = $this->db->get();

        $data = (array)$query->result();

        foreach($data as $row){
        	$this->setData($row['attribute_code'] , $row['value'])
        }
	}	
}
?>
