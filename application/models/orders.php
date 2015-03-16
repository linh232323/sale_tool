<?php

class orders extends mabstract {

    function __construct() {
        parent::__construct();
        $this->_table = 'orders';
    }    
    
    public function getOrderById($id){
        
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('id', $id);
        
          $query = $this->db->get();
        if ($query)
            return $query->row();
        else
            return FALSE;           
    }
    
    public function listAllOrders(){
        $this->db->select($this->_table.'.id' . ' as id' );
        $this->db->select($this->_table.'.total' . ' as total' );
        $this->db->select($this->_table.'.customer_count' . ' as customer_count' );
        $this->db->select('user_accounts.uacc_username' . ' as employee_name' );
        $this->db->select('customer.name' . ' as customer_name' );
       
        $this->db->from($this->_table);        
        
        $this->db->join('user_accounts ', $this->_table.'.created_by = user_accounts.uacc_id');
        $this->db->join('customer ', $this->_table.'.customer_id = customer.id');
        
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
}

?>
