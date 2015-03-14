<?php
class eav_model extends mabstract{
	protected $_attributes;

	public function __construct(){
		$this->_attributes = array();
		$this->setAttributeCodes();
		parent::__construct();
	}

	

	public  function setAttributeCodes(){
	}

	public function getTable(){
		$this->_table = strtolower(get_class($this));
		return $this->_table;
	}

	public function getEAVTable(){
		
		return 'w_eav_' . strtolower(get_class($this));
	}

	public function save(){

		parent::save();

		$this->saveAttributes();
	}

	public function saveAttributes($entity_id = null,$store_code = null){
		if($entity_id == null){
			$entity_id = $this->getData('id');
		}

		if($store_code == null){
			$CI =& get_instance();
	        $CI->load->model('w_store');
	        $store_code = $CI->w_store->getCurrentStore();

		}

        $eav_table = $this->getEAVTable();

		foreach(self :: $_attributes as $attribute_code){
			$value = $this->getData($attribute_code);

			$sql = 	"SELECT IF( EXISTS(SELECT * FROM {$eav_table} WHERE `store_code` =  {$store_code} AND entity_id = {$entity_id} AND attribute_code = {$attribute}), 
        				INSERT INTO {$eav_table} (entity_id,store_code,attribute_code,value) VALUES({$entity_id},{$store_code},{$attribute_code},{$value}),
        				UPDATE {$eav_table} SET value={$value} WHERE store_code='{$store_code}' AND entity_id={$entity_id} AND attribute_code={$key})";

			$query = $this->db->query($sql);
		}
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
			$CI =& get_instance();
	        $CI->load->model('w_store');
	        $store_code = $CI->w_store->getCurrentStore();
		}

        $eav_table = $this->getEAVTable();

        $sql = " 
        		SELECT * FROM `" . $eav_table ."`
        		WHERE 	entity_id = " . $entity_id . " 
        			AND store_code = '{$store_code}'
        			AND attribute_code IN ('".implode("','", $this->_attributes)."')";

		$query = $this->db->query($sql);

        $data = (array)$query->result();

        foreach($data as $row){
        	
        	$this->setData($row->attribute_code , $row->value);

        }


	}	
}
?>
