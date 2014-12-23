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
        $query = $this->db->get();        
        $data = $query->result();        
        return $data;
    }
    
    function getAllPriceLevel($service_type, $service_id, $from_date, $to_date, $off = '', $limit = '') {
        $this->db->select($this->_table.'.id' . ' as id' );
        $this->db->select('services_level.id as level_id' );
        $this->db->select('services_level.name as level_name');
        $this->db->select($this->_table.'.price_gross' . ' as price ');
        $this->db->select($this->_table.'.extra_gross' . ' as extra');
        $this->db->select($this->_table.'.discount_max' . ' as discount_max' );
        
        $this->db->from($this->_table);
        $this->db->where($this->_table.'.service_type_id', $service_type);
        $this->db->where('service_id', $service_id);        
        $this->db->where('date_from <=', $from_date);
        $this->db->where('date_to >=', $to_date);
        $this->db->join('services_level', 'services_level.id = services_price.service_level');
        
        $query = $this->db->get();        
        $data = $query->result();        
        return $data;
    }
    function getById($id){
        
    }    
    function getAllByType($type_id,$from_date = null,$to_date = null){
        /*$this->db->select($this->_table.'.id' . ' as id' );
        $this->db->select('services_level.id as level_id' );
        $this->db->select('services_level.name as level_name');
        $this->db->select('services.id as service_id' );
        $this->db->select('services.name as service_name');
        $this->db->select($this->_table.'.price_gross' . ' as price_gross ');
        $this->db->select($this->_table.'.extra_gross' . ' as extra_gross');
        $this->db->select($this->_table.'.price_net' . ' as price_net');
        $this->db->select($this->_table.'.extra_net' . ' as extra_net');
        $this->db->select($this->_table.'.price_percent' . ' as price_percent');
        $this->db->select($this->_table.'.extra_percent' . ' as extra_percent');
        $this->db->select($this->_table.'.discount_max' . ' as discount_max' );
        $this->db->select($this->_table.'.date_from' . ' as date_from');
        $this->db->select($this->_table.'.date_to' . ' as date_to');
        
        $this->db->from($this->_table);
        
        $this->db->where($this->_table.'.service_type_id', $type_id);        
        $this->db->where('date_from >=', $from_date,false);
        $this->db->or_where('date_to <=', $to_date,false);
        $this->db->join('services_level', 'services_level.id = services_price.service_level');
        $this->db->join('services', 'services.id = services_price.service_id');
        $query = $this->db->get(); */
        $to_date = date("Y-m-d");
        $strQuery = "SELECT
                           *,
                           c1.name as service_name,
                           c2.name as level_name
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
                                    WHERE s.service_type_id = {$type_id} AND
                                    (s.`date_to` >= \"{$to_date}\")
                                )
                         ORDER BY service_id , date_to DESC) as sub_table
                         INNER JOIN services c1 on c1.id=sub_table.service_id
                         INNER JOIN services_level c2 on c2.id=sub_table.service_level
                     WHERE
                         rn <= 5
                     ORDER BY service_id , date_to DESC";
        echo $strQuery;
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
        
        if ($limit != '' && $off != '') {
            $this->db->limit($off, $limit);
        }
          $query = $this->db->get();
        if ($query)
            return $query->row();
        else
            return FALSE;
       
    }

    function getPrices($service_type, $service_id, $service_level_id, $from_date, $to_date, $off = '', $limit = '') {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('service_type_id', $service_type);
        $this->db->where('service_id', $service_id);
        $this->db->where('service_level', $service_level_id);
        $this->db->where('date_from <=', $from_date);
        $this->db->where('date_to >=', $to_date);

        if ($limit != '' && $off != '') {
            $this->db->limit($off, $limit);
        }

        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
}

?>
