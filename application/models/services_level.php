<?php

class services_level extends mabstract {

    function __construct() {
        parent::__construct();
        $this->_table = 'services_level';
    }

    function getServicesName($_service_level) {
        $this->db->select('name');
        $this->db->from($this->_table);
        $this->db->where('id', $_service_level);
        $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key => $value)
        foreach ($value as $k => $v)
        return $v;
    }

}

?>
