<?php

class order_items extends mabstract {

    function __construct() {
        parent::__construct();
        $this->_table = 'order_items';
    }
    
    public function getOrderItemsByCruises($service_type_id,$cruise_id){
        $this->db->select('*');        
        $this->db->from($this->_table);        
        $this->db->where('order_cruise_id',$cruise_id);
        $this->db->where('service_type_id',$service_type_id);
        
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    public function getByOrderId($order_id){
        $this->db->select('*');        
        $this->db->from($this->_table);        
        $this->db->where('order_id',$order_id);
        
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
}

?>
