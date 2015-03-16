<?php

class order_date extends mabstract {

    function __construct() {
        parent::__construct();
        $this->_table = 'order_date';
    }
    
    public function getOrderDateById($order_id){
       
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('order_id',$order_id);
        
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
}

?>
