<?php

class services_price extends mabstract {

    function __construct() {
        parent::__construct();
        $this->_table = 'services_price';
    }
    function getAllPriceByServiceId( $service_id ,$off = '', $limit = '') {
        
        $this->db->select( );
        
        $this->db->from($this->_table);
        $this->db->where('service_id',$service_id);
        $this->db->where('deleted',0);
        $query = $this->db->get();        
        $data = $query->result();        
        return $data;
    }
    
    function getAllPriceLevel($service_type, $service_id, $from_date, $to_date, $off = '', $limit = '') {
        $this->db->select($this->_table.'.*');
        
        $this->db->from($this->_table);
        $this->db->where($this->_table.'.service_type_id', $service_type);
        $this->db->where('service_id', $service_id);        
        $this->db->where('date_from <=', $from_date);
        $this->db->where('date_to >=', $to_date);
        $this->db->where($this->_table.'.deleted',0);

        $query = $this->db->get();        
        $data = $query->result();
        //  echo $this->db->last_query();
        return $data;
    }
    function getById($id){
        
    }    
    function getAllByType($type_id,$from_date = null,$to_date = null){
        if($from_date == null || $to_date == null)
            $to_date = date("Y-m-d");

        $strQuery = "SELECT
                           *,
                           c1.name as service_name
                     FROM
                         (SELECT
                                 *,
                                 @rn:=CASE
                                     WHEN @var_service_id = service_id THEN @rn + 1
                                     ELSE 1
                                 END AS rn,
                                 @var_service_id:=service_id
                         FROM
                             (SELECT @var_service_id:=NULL, @rn:=0) vars, services_price
                             WHERE
                                service_id IN (
                                    SELECT service_id
                                    FROM services_price as s
                                    WHERE deleted = 0 AND
                                    s.service_type_id = {$type_id} AND
                                    (s.`date_to` >= \"{$to_date}\")
                                )
                         ORDER BY service_id , date_to DESC) as sub_table
                         INNER JOIN services c1 on c1.id=sub_table.service_id
                     WHERE
                         rn <= 5
                     ORDER BY service_id , date_to DESC";

        $query = $this->db->query($strQuery);
        $data = $query->result();        
        return $data;
    }
    function getPrice($service_type, $service_id, $service_level_id, $from_date, $to_date, $off = '', $limit = '') {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('service_type_id', $service_type);
        $this->db->where('service_id', $service_id);
        $this->db->where('service_level', $service_level_id);
        $this->db->where('date_from <=', $from_date);
        $this->db->where('date_to >=', $to_date);
        $this->db->where('deleted',0);
        
        if ($limit != '' && $off != '') {
            $this->db->limit($off, $limit);
        }
          $query = $this->db->get();
        if ($query)
            return $query->row();
        else
            return FALSE;
       
    }

    function getPrices($service_type, $service_id, $service_level_name, $from_date, $to_date, $off = '', $limit = '') {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('service_type_id', $service_type);
        $this->db->where('service_id', $service_id);
        $this->db->where('level_name', $service_level_name);
        $this->db->where('date_from <=', $from_date);
        $this->db->where('date_to >=', $to_date);
        $this->db->where('deleted',0);
        
        if ($limit != '' && $off != '') {
            $this->db->limit($off, $limit);
        }

        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
}

?>
