<?php

class services extends mabstract {

    function __construct() {
        parent::__construct();
        $this->_table = 'services';
    }
    function getAllByType($_service_type_id){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('service_type_id',$_service_type_id);   
        $this->db->where('deleted',0);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    function getLimitByType($_service_type_id,$perpage, $offset){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->limit($perpage, $offset);
        $this->db->where('service_type_id',$_service_type_id);   
        $this->db->where('deleted',0);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    function getServicesByLocation($_service_type_id,$loc_a_id = null,$loc_b_id = null){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('service_type_id',$_service_type_id);   
        
        $this->db->where("(`location_id_a` = $loc_a_id OR `location_id_a` = $loc_b_id)");    
        $this->db->where('deleted',0);
        
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
}

?>
