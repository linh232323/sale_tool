<?php

class muserlogin extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->_table = 'userlogin';
    }

    //--- Lấy tất cả dữ liệu
    function getAllData($off = '', $limit = '') {
        $this->db->select('*');
        $this->db->from($this->_table);
        if ($limit != '' && $off != '') {
            $this->db->limit($off, $limit);
        }
        $this->db->order_by('username', 'asc');
        $query = $this->db->get();
        $data  = $query->result();
        return $data;
    }

    /**
     * Lấy thông tin thông qua id
     * @param Int $id
     * @return boolean
     */
    function getInfo($id = '') {
        if ($id != '' && is_numeric($id)) {
            $this->db->where('id', $id);
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
    function getLastLoginByIpAddress($ip_address) {
        $this->db->where('ipaddress', $ip_address);
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row();
        else
            return FALSE;
    }

    /**
     * Tổng số record
     * @return Int
     */
    function totalRows() {
        return $this->db->count_all($this->_table);
    }

    /**
     * Thêm mới user
     * @param Array $data
     * @return boolean
     */
    function add($data = array()) {
        if (!empty($data)) {
            if ($this->db->insert($this->_table, $data))
                return TRUE;
            else
                return FALSE;
        }
        else {
            return FALSE;
        }
    }

    /**
     * Xóa user 
     * @param Int $id
     */
    function delete($id = '') {
        if ($id != '') {
            $this->db->where_in('id', $id);
            if ($this->db->delete($this->_table)) {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
        else {
            return FALSE;
        }
    }

    /**
     * Cập nhật thông tin userlogin
     * @param Array $data
     * @param Int $id
     * @return boolean
     */
    function update($data = array(), $id = '') {
        if (!empty($data) && $id != '' && is_numeric($id)) {
            $this->db->where('id', $id);
            if ($this->db->update($this->_table, $data))
                return TRUE;
            else
                return FALSE;
        }
        else {
            return FALSE;
        }
    }

    /**
     * Kiểm tra thông tin username hợp lệ
     * @param String $username
     * @param Int $id
     * @return boolean
     */
    function checkUser($username = '', $id = '') {
        if ($id != '' && is_numeric($id)) { //for update             
            $this->db->where("username", $username);
            $this->db->where("id !=", $id);
            $query = $this->db->get($this->_table);
        }
        else { //for add
            $this->db->where("username", $username);
            $query = $this->db->get($this->_table);
        }

        if ($query->num_rows() != 0) {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    /**
     * Kiểm tra đã kích hoạt hay chưa 
     * @param Int $id
     * @return boolean
     */
    function checkActived($id = '') {
        if ($id != '' && is_numeric($id)) {
            $db_query = "select id, status
                         from   $this->_table 
                         where  id = $id
                         limit  0,1";
            $query    = $this->db->query($db_query);

            if ($query->num_rows() > 0) {
                $info = $query->row();
                if ($info['status'] == 'ACTIVE')
                    return TRUE;
                else
                    return FALSE;
            }
            else {
                return FALSE;
            }
        }
        else {
            return FALSE;
        }
    }

    /**
     *  Kiểm tra thông tin user và key
     * @param Int $id
     * @param String $key
     * @return boolean
     */
    function checkidAndKey($id, $key) {
        if ($id != '' && $key != '' && is_numeric($id)) {

            $this->db->where('id', $id);
            $this->db->where('md5(usersalt)', $key);
            $query = $this->db->get($this->_table);
            if ($query->num_rows() != 0) {

                return $query->row();
            }
            else {
                return FALSE;
            }
        }
        else {
            return FALSE;
        }
    }

    /**
     * 
     * @param String $email
     * @param Int $id
     * @return boolean
     */
    function checkEmail($email = '', $id = '') {

        if ($id != '' && is_numeric($id)) {  //use for update
            $this->db->where('username', $email);
            $this->db->where('id !=', $id);
            $query = $this->db->get($this->_table);
        }
        else {   //user for add
            $this->db->where('email', $email);
            $query = $this->db->get($this->_table);
        }

        if ($query->num_rows() != 0) {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    /**
     * Kiểm tra username & mật khẩu
     * @param String $username
     * @param String $password
     * @return boolean
     */
    function checkLogin($id = '', $password = '') {
        $u     = $id;
        $p     = md5($password);
        $this->db->where('id', $u);
        $this->db->where('password', $p);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() == 0) {
            return FALSE;
        }
        else {
            return $query->row();
        }
    }

}

?>
