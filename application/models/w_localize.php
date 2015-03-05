<?php
class w_localize extends mabstract{
	public $_table = "w_localize";

	private static $_cacheText;

	public function __constructor(){
		$this->load->library('session');

		
	}

	public function getText($text , $field , $store = null){
		if($store == null){

		}
		if(!is_array(self :: $_cacheText))
		{
			self :: $_cacheText = array();
		}

		if(!is_array(self :: $_cacheText[$store])){
			self :: $_cacheText[$store] = array();
		}

		if(!is_array(self :: $_cacheText[$store][$field])){
			self :: $_cacheText[$store][$field] = array();
		}

		if(!empty(self :: $_cacheText[$store][$field][$text])){
			self :: $_cacheText[$store][$field][$text] = $this->load($text , $field , $store);

			if(self :: $_cacheText[$store][$field][$text] === false){
				self :: $_cacheText[$store][$field][$text] = $text;
			}
		}

		return self :: $_cacheText[$store][$field][$text];
	}

	public function save($text,$field,$store){
		$value = $this->load();

		$this->setData('value',$text);
        $this->setData('field',$field);
        $this->setData('store',$store);

		if($value === false)
		{
	        return $this->add($this->_data);
		}
		else
		{
			return $this->update($this->_data,$this->_data['id']);
		}
        
    }

	function load($text,$field,$store){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('value', $text);
        $this->db->where('field',$field);
        $this->db->where('store_code',$store);
        
        $query = $this->db->get();
        if ($query && $row = $query->row()){            
            $this->setData((array)$row);
            return $this;
        }   
        else {
            return false;
        }
        
    }
}
?>