<?php
class eav_model extends mabstract{
	protected $_attributes;

	public function __construct(){
		$this->_attributes = array();
		$this->setAttributeCodes();
		parent::__construct();
	}

	
	public function addAttributeCode($attribute_code){
		if(!is_array($this->_attributes))
			$this->_attributes = array();

		$this->_attributes[] = $attribute_code;
	}
	public  function setAttributeCodes(){
		if(!is_array($this->_attributes))
			$this->_attributes = array();

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

        $values = array();
		foreach($this->_attributes as $attribute_code){

			$value = $this->getData($attribute_code);

			$values[] = "({$entity_id} , '{$store_code}' , '{$attribute_code}' , '{$value}')";
			
		}

		$sql = 	"INSERT INTO `{$eav_table}`  (entity_id,store_code,attribute_code,value) VALUES " . implode(" , ",$values).
				" ON DUPLICATE KEY UPDATE `value` = VALUES(`value`)";

		$query = $this->db->query($sql);
	}

	public function load($id){
		$this->beforeLoad();

		parent::load($id);
		
		$this->loadAttributes();
		
		$this->afterLoad();

		return $this;
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
        		WHERE 	`entity_id` = " . $entity_id . " 
        			AND `store_code` = '{$store_code}'
        			AND `attribute_code` IN ('".implode("','", $this->_attributes)."')";

		$query = $this->db->query($sql);

        $data = (array)$query->result();

        foreach($data as $row){
        	if(isset($row->value))
        		$this->setData($row->attribute_code , $row->value);

        }


	}	
}
?>
