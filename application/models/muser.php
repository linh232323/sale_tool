<?php

class muser extends MY_Model {

    public $status = array(
        'ACTIVE'   => 'Đã kích hoạt',
        'DEACTIVE' => 'Chưa được kích hoạt',
        'LOCKED'   => 'Đã bị khóa'
    );

    public $type = array(
        'ADMIN'   => 'Admin',
        'MEMBER' => 'Thành viên'        
    );
    
    function __construct() {
        parent::__construct();
        $this->_table = 'w_customer';
    }

   

    /**
     * Lấy thông tin thông qua userid
     * @param Int $userid
     * @return boolean
     */
    function getInfo($userid = '') {
        if ($userid != '' && is_numeric($userid)) {
            $this->db->where('id', $userid);
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
    function getInfoByEmail($email) {
        $this->db->where('email', $email);
        $query = $this->db->get($this->_table);

        if ($query)
            return $query->row();
        else
            return FALSE;
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
            $this->db->where("id !=", $id);
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
            $db_query = "select id, UserStatus
                         from   $this->_table 
                         where  id = $userid
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
    function checkidAndKey($userid, $key) {
        if ($userid != '' && $key != '' && is_numeric($userid)) {

            $this->db->where('id', $userid);
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
     * @param Int $userid
     * @return boolean
     */
    function checkEmail($email = '', $userid = '') {

        if ($userid != '' && is_numeric($userid)) {  //use for update
            $this->db->where('UserName', $email);
            $this->db->where('id !=', $userid);
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
    function checkLogin($userid = '', $password = '') {
      
        $u     = $userid;
        //$p     = md5($password);
        $p     = $password;
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

    function checkLoginSession($userid = '', $session_id =''){
        $this->db->where('id', $userid);
        $this->db->where('session_id', $session_id);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() == 0) {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
    
    /**
     * Set request token để reset password
     * @param Int $userid
     * @param String $token (md5)
     * @return boolean
     */
    function setRequestToken($userid, $token){
        $a_info = array('UserRequestToken' => $token);
        return $this->update($a_info, $userid);
    }
}

?>
