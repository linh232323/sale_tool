<?php
class w_slideshows extends mabstract{
	public  function getTable(){
		$this->_table = strtolower(get_class($this));
        return $this->_table;
    }

    public function delete(){
    	$this->db->delete($this->getTable(), array('id' => $this->getData('id'))); 
    }

    public function getItems($service_id){
    	$this->db->select('*');
        $this->db->from($this->getTable());
        $this->db->where('service_id',$service_id);
        $query = $this->db->get();
        return $query->result();
    }
}
?>