<?php

class muserlogin extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->_table = 'qhotraining_tbl_userlogin';
    }

    //--- Lấy tất cả dữ liệu
    function getAllData($off = '', $limit = '') {
        $this->db->select('*');
        $this->db->from($this->_table);
        if ($limit != '' && $off != '') {
            $this->db->limit($off, $limit);
        }
        $this->db->order_by('UserName', 'asc');
        $query = $this->db->get();
        $data  = $query->result();
        return $data;
    }

    /**
     * Lấy thông tin thông qua userid
     * @param Int $userid
     * @return boolean
     */
    function getInfo($userid = '') {
        if ($userid != '' && is_numeric($userid)) {
            $this->db->where('UserId', $userid);
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
        $this->db->where('UserLoginIPAddress', $ip_address);
        $this->db->order_by('UserLoginId','desc');
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
     * @param Int $userid
     */
    function delete($userid = '') {
        if ($userid != '') {
            $this->db->where_in('UserId', $userid);
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
            $this->db->where('UserLoginId', $id);
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
     * @param Int $userid
     * @return boolean
     */
    function checkUser($username = '', $userid = '') {
        if ($userid != '' && is_numeric($userid)) { //for update             
            $this->db->where("UserName", $username);
            $this->db->where("UserId !=", $id);
            $query = $this->db->get($this->_table);
        }
        else { //for add
            $this->db->where("UserName", $username);
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
     * @param Int $userid
     * @return boolean
     */
    function checkActived($userid = '') {
        if ($userid != '' && is_numeric($userid)) {
            $db_query = "select UserId, UserStatus
                         from   $this->_table 
                         where  UserId = $userid
                         limit  0,1";
            $query    = $this->db->query($db_query);

            if ($query->num_rows() > 0) {
                $info = $query->row();
                if ($info['UserStatus'] == 'ACTIVE')
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
     * @param Int $userid
     * @param String $key
     * @return boolean
     */
    function checkUserIdAndKey($userid, $key) {
        if ($userid != '' && $key != '' && is_numeric($userid)) {

            $this->db->where('UserId', $userid);
            $this->db->where('md5(UserSalt)', $key);
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
     * @param Int $userid
     * @return boolean
     */
    function checkEmail($email = '', $userid = '') {

        if ($userid != '' && is_numeric($userid)) {  //use for update
            $this->db->where('UserName', $email);
            $this->db->where('UserId !=', $userid);
            $query = $this->db->get($this->_table);
        }
        else {   //user for add
            $this->db->where('UserEmail', $email);
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
    function checkLogin($userid = '', $password = '') {
        $u     = $userid;
        $p     = md5($password);
        $this->db->where('UserId', $u);
        $this->db->where('UserPasswd', $p);
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
