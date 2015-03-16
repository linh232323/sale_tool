<?php

class order_cruises extends mabstract {

    function __construct() {
        parent::__construct();
        $this->_table = 'order_cruises';
    }
    
    public function getOrderCruisesByDate($date_id){
        $this->db->select($this->_table.'.id' . ' as id' );
        $this->db->select($this->_table.'.from_location_id' . ' as from_id' );
        $this->db->select($this->_table.'.to_location_id' . ' as to_id' );
        $this->db->select($this->_table.'.description' . ' as description' );
        $this->db->select('locA.name' . ' as from_name' );
        $this->db->select('locB.name' . ' as to_name' );
       
        $this->db->from($this->_table);        
        $this->db->where('order_date_id',$date_id);
        $this->db->join('location as locA', $this->_table.'.from_location_id = locA.id');
        $this->db->join('location as locB', $this->_table.'.to_location_id = locB.id');
        
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
}

?>
