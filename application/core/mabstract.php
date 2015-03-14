<?php

class mabstract extends MY_Model {
    public $_data;
    
    protected $_page_size;
    protected $_offset;

    function __construct() {
        parent::__construct();
    }

    public  function getTable(){
        return $this->_table;
    }
    function delete(){
        if(!empty($this->_data)){     
            $this->setValue('deleted',true);
            $this->save();
        }
        else{
           
        }
    }

    function counts($attributes){
        $this->db->from($this->getTable());

        foreach($attributes as $key => $value){
            $this->db->where($key, $value);
        }

        return $this->db->count_all_results();
    }
    
    function load($id){
         $this->db->select('*');
        $this->db->from($this->getTable());
        $this->db->where('id', $id);
        $this->db->where('deleted',0);
        
        $query = $this->db->get();
        if ($query && $row = $query->row()){            
            $this->setData((array)$row);
            return $this;
        }   
        else {
            return false;
        }
        
    }

    public function setPageSize($page_size)
    {
        $this->_page_size = $page_size;
        return $this;
    }

    public function setOffset($offset)
    {
        $this->_offset = $offset;
        return $this;
    }



    //--- Lấy tất cả dữ liệu
    function getAllData($offset = null, $page_size = null) {
        $this->_offset = $offset;
        $this->_page_size = $page_size;

        $this->db->select('*');
        $this->db->from($this->getTable());
        $this->db->where('deleted',0);
        if (isset($this->_offset) && isset($this->_page_size)) {
            $this->db->limit($this->_offset, $this->_page_size);
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
            if ($this->db->insert($this->_table, $data)){
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
            if ($this->db->update($this->getTable(), $data))
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
        if(!isset($this->_data )){

            $this->_data = array();
        }
        
        if(!isset($value))
            $this->_data = $key;
        else
            $this->_data[$key] = $value;

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
