<?php

class location extends mabstract {

    function __construct() {
        parent::__construct();
        $this->_table = 'location';
    }

    /**
     * Lấy thông tin thông qua userid
     * @param Int $userid
     * @return boolean
     */
    function getLocationById($loc_id = '') {
        if ($loc_id != '' && is_numeric($loc_id)) {
            $this->db->where('id', $loc_id);
            $query = $this->db->get($this->_table);

            if ($query)
                return $query->row();
            else
                return FALSE;
        }
        else {
            return FALSE;
        }
    }

    /**
     * Lấy thông tin thông qua email
     * @param String $email
     * @return boolean
     */
    function getLocationByName($name) {
        $this->db->where('name', $name);
        $query = $this->db->get($this->_table);

        if ($query)
            return $query->row();
        else
            return FALSE;
    }

}

?>
