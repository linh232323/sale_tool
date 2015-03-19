<?php

class mabstract extends MY_Model {
    public $_data;
    public $_cols;

    function __construct() {
        parent::__construct();
    }

    public  function getTable(){
        return $this->_table;
    }
    
    public function delete(){
        if(!empty($this->_data)){     
            $this->setValue('deleted',true);
            $this->save();
        }
        else{
           
        }
    }

    public function counts($attributes){
        $this->db->from($this->getTable());

        foreach($attributes as $key => $value){
            $this->db->where($key, $value);
        }

        return $this->db->count_all_results();
    }
    
    public function load($id){
        $this->db->select('*');
        $this->db->from($this->getTable());
        $this->db->where('id', $id);
        $this->db->where('deleted',0);
        
        $query = $this->db->get();
        $this->_cols = array();
        if ($query && $row = $query->row()){
            foreach($row as $key => $value){
                $this->setData($key,$value);
                $this->_cols[] = $key;
            }
            return $this;
        }   
        else {
            return false;
        }
    }

   

    //--- Lấy tất cả dữ liệu
    function getAllData() {

        $this->db->select('*');
        $this->db->from($this->getTable());
        $this->db->where('deleted',0);
         if (!empty($this->_page_size) || !empty($this->_offset)) {
         
            $this->db->limit( $this->_page_size, $this->_offset);
        }         
        $query = $this->db->get();


        $data = $query->result();

        return $data;
    }

   

    /**
     * Tổng số record
     * @return Int
     */
    function totalRows() {
        return $this->db->count_all($this->getTable());
    }

    /**
     * Thêm mới user
     * @param Array $data
     * @return boolean
     */
    function add($data = array()) {
        if (!empty($data)) {
            if ($this->db->insert($this->getTable(), $data)){
                $id = $this->db->insert_id(); 
                $this->_data['id'] = $id;
                return $id;
            }
            else
                return FALSE;
        }
        else {
            return FALSE;
        }
    }

    
    /**
     * Cập nhật thông tin user
     * @param Array $data
     * @param Int $userid
     * @return boolean
     */
    function update($data = array(), $id = '') {
        if (!empty($data) && $id != '' && is_numeric($id)) {
            $this->db->where('id', $id);
            $update = array();
            foreach($data as $key => $value){

                if(!in_array($key,$this->_cols)){
                    continue;
                } 

                $update[$key] = $value;
    
            }

            if ($this->db->update($this->getTable(), $update))
                return $id;
            else
                return FALSE;
        }
        else {
            return FALSE;
        }
    }
    
    public function save(){
        if(isset($this->_data['id']))
            return $this->update($this->_data,$this->_data['id']);
        else
            return $this->add($this->_data);
    }
    
    public function setData($key, $value = null){
        if(!is_array($this->_data )){
            $this->_data = array();
        }

        if(!isset($value) && is_array($key) ){
            foreach($key as $k => $v){
                $this->setValue($k,$v);   
            }
        } else if (isset($value)){
            $this->_data[$key] = $value;
        }

        return $this;

    }
    
    public function getData($key = null){
        if($key == null)
            return $this->_data;
        
        if(isset($this->_data[$key]))
            return $this->_data[$key];
        else
            return null;
    }
    
    public function setValue($key, $value){
        if(!isset($this->_data ))
            $this->_data = array();
        
        $this->_data[$key] = $value;
    }
}

?>
