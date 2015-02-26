<?php

class menu extends mabstract {

    function __construct() {
        parent::__construct();
        $this->_table = 'w_localize';
        $this->_table1 = 'w_menu_item';
        $this->_table2 = 'w_menu';
        $this->_table3 = 'w_attribute';
        $this->_table4 = 'store';
    }

    public function getMenuValue() {
        $this->db->select();
        $this->db->from('w_localize');
        $this->db->where('store_id = 1');
        $this->db->join('w_menu_item', 'w_menu_item.id = w_localize.entity_id');
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>
