<?php

class customer extends mabstract {

    function __construct() {
        parent::__construct();
        $this->_table = 'customer';
    }    
    
    public function getCustomerById($id){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('id', $id);
        
          $query = $this->db->get();
        if ($query)
            return $query->row();
        else
            return FALSE;           
    }
}

?>
