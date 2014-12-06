<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_Auth {

    private $_ci;
    private $_sess_user   = 'sess_user';
    private $_cookie_user = 'user_login';
    public $isRememberMe = FALSE;
    public $identity     = "";
    public $credential   = "";
    public $isValid      = FALSE;
    public $error        = "";
    public $userInfo     = array();
    public $loginType          = 'Frontend';
    public $userLoginId        = 0;
    public $maxLoginAttempt    = 5; // Current Login Attempt
    public $curLoginAttempt    = 0;
    public $loginAttemptExceed = FALSE;
    public $loginFailBlockTime = 15; // 15 minutes;

    function __construct() {
        //parent::__construct();
        $this->_ci = & get_instance();
        $this->_ci->load->database();
        $this->_ci->load->library('encrypt', 'session');
        $this->_ci->load->model('muser');
        $this->_ci->load->model('muserlogin');
        $this->_ci->load->helper('cookie');
    }

    function setIdentity($input) {
        $this->identity = $input;
        return $this;
    }

    function setCredential($input) {
        $this->credential = $input;
        return $this;
    }

    function authenticate() {
        $this->isValid = FALSE;
        $email         = $this->identity;
        $pass          = $this->credential;

        // Check Login Attempt
        $this->loginAttemptCheck();
        if ($this->isExccedLoginAttempt()) {
            $this->error = 'Đăng nhập thất bại vượt quá số lần qui định vui lòng thử lại sau ' . $this->loginFailBlockTime . ' phút.';
            return FALSE;
        }

        $a_user = $this->_ci->muser->getInfoByEmail($email);
        if ($a_user) {
            $v_salt = $a_user->UserSalt;
            if (md5(trim($pass) . $v_salt) == $a_user->UserPasswd) {
                $this->userInfo = $a_user;

                // Reset Login Attempt Or Add Login Record
                if ($this->userLoginId) {
                    // Reset
                    $this->curLoginAttempt = 0;
                    $this->_updateLoginAttempt($this->userLoginId);
                }
                else {
                    // Add Login Record
                    $this->_addLoginRecord();
                }

                // Create User Session
                $this->_createUserSession();

                // Create User Cookie
                if ($this->isRememberMe) {
                    $this->_createUserLoginCookie();
                }

                // Update User Sesssion, IP, Last Login to database
                $this->_updateUserLastLogin();

                $this->isValid = TRUE;
                return TRUE;
            }
            else {

                $this->error = 'Thông tin đăng nhập không đúng.';
            }
        }
        else {

            $this->error = "Tài khoản không tồn tại.";
        }

        // Increase Login Attempt
        $this->curLoginAttempt++;

        // Update Login Attempt Or Add Login Record
        if ($this->userLoginId) {
            // Update
            $this->_updateLoginAttempt($this->userLoginId);
        }
        else {
            // Add Login Record
            $this->_addLoginRecord($email);
        }

        // Add More Error
        if ($this->isExccedLoginAttempt()) {
            $this->error .= ' Bạn đã đăng nhập thất bại vượt quá số lần qui định vui lòng thử lại sau ' . $this->loginFailBlockTime . ' phút.';
        }
        else {
            $this->error .= ' Bạn đã đăng nhập sai ' . $this->curLoginAttempt
                    . ' lần. Nếu bạn sai liên tiếp ' . $this->maxLoginAttempt
                    . ' lần. Bạn phải thử lại sau ' . $this->loginFailBlockTime . ' phút.';
        }
        return FALSE;
    }

    function getError() {
        return $this->error;
    }

    function loginFrontend() {
        $this->loginType = 'Frontend';
        return $this;
    }

    function loginBackend() {
        $this->loginType = 'Backend';
        return $this;
    }

    function loginAttemptCheck($ip_address = '') {
        if (!$ip_address) {
            $ip_address = $this->_ci->input->ip_address();
        }
        $a_login    = $this->_ci->muserlogin->getLastLoginByIpAddress($ip_address);
        if ($a_login) {

            // Check Last Login Time
            $last_login = strtotime($a_login->UserLoginDate);
            if ($last_login >= time() - $this->loginFailBlockTime * 60) {
                $this->userLoginId     = $a_login->UserLoginId;
                $this->curLoginAttempt = $a_login->UserLoginAttempt;
                return $this->isExccedLoginAttempt();
            }
            else {
                return TRUE;
            }
        }
        else {
            return TRUE;
        }
    }

    function isExccedLoginAttempt() {
        if ($this->curLoginAttempt >= $this->maxLoginAttempt)
            return TRUE;
        else
            return FALSE;
    }

    function isLogin() {
        // Check the User Session
        $a_user = $this->getUserSession();
        //print_r($a_user);
        if (!empty($a_user) && isset($a_user['UserId']) && isset($a_user['session_id'])) {
            $this->userInfo = $a_user;
            return TRUE;
        }
        else {
            // Check Cookie 
            $s_cookie = $this->_getUserLoginCookie();
            if ($s_cookie != '') {

                $a_user_cookie = json_decode($this->_ci->encrypt->decode($s_cookie), TRUE);
                debug($a_user_cookie);
                if (isset($a_user_cookie['userid']) && isset($a_user_cookie['passwd'])) {
                    // Check Login Info
                    $a_user = $this->_ci->muser->checkLogin($a_user_cookie['userid'], $a_user_cookie['passwd']);
                    if ($a_user) {
                        $this->_createUserSession(); // Create Session to mark as Login
                        $this->_createUserLoginCookie(); // Renew Cookie extend the expire time
                        $this->_updateUserLastLogin(); // Update new Login Time, Session Id
                        $this->userInfo = $this->getUserSession();
                        return TRUE;
                    }
                    else {
                        $this->userLogout(); // Destroy Bad Cookie;
                    }
                }
            }
            return FALSE;
        }
    }

    /**
     * Kiểm tra xem có phải login từ máy tính khác hay ko. TRUE => Đang Login từ máy khác.
     * @return boolean
     */
    function isMultipleLogin() {
        if ($this->isLogin()) {
            $a_user     = $this->getUserSession();
            $u          = $a_user['UserId'];
            $session_id = $a_user['session_id'];
            if ($this->_ci->muser->checkLoginSession($u, $session_id)) {
                return FALSE;
            }
        }
        return TRUE;
    }

    function setRememberMe($bool) {
        $this->isRememberMe = $bool;
        return $this;
    }

    function getUserSession() {
        return $this->_ci->session->userdata($this->_sess_user);
    }

    function userLogout() {
        // Destroy session and Cookie
        $this->_ci->session->unset_userdata($this->_sess_user);
        delete_cookie($this->_cookie_user);
    }

    function isAdmin() {
        if (isset($this->userInfo['UserType']) && $this->userInfo['UserType'] == 'ADMIN')
            return TRUE;
        else
            return FALSE;
    }

    function isBackend() {
        if (isset($this->userInfo['loginType']) && $this->userInfo['loginType'] == 'Backend')
            return TRUE;
        else
            return FALSE;
    }
    private function _addLoginRecord($email = '') {
        $a_user = $this->userInfo;
        if (empty($a_user)) {
            $userID   = 0;
            $username = 'Unknown';
        }
        else {
            $userID      = $a_user->UserId;
            $username    = $a_user->UserName;
        }
        $a_userlogin = array(
            'UserId'             => $userID,
            'UserName'           => $username,
            'UserLoginType'      => $this->loginType,
            'UserLoginIPAddress' => $this->_ci->input->ip_address(),
            'UserLoginAttempt'   => $this->curLoginAttempt,
            'UserLoginEmail'     => $email,
            'UserLoginDate'      => datetimeNow()
        );
        return
                $this->_ci->muserlogin->add($a_userlogin);
    }

    private function _updateLoginAttempt() {
        $a_userlogin = array(
            'UserLoginAttempt' => $this->curLoginAttempt,
            'UserLoginDate'    => datetimeNow()
        );
        return $this->_ci->muserlogin->update($a_userlogin, $this->userLoginId);
    }

    private function _createUserSession() {
        $a_userInfo = $this->userInfo;
        $a_user     = array(
            'UserId'        => $a_userInfo->UserId,
            'UserName'      => $a_userInfo->UserName,
            'UserEmail'     => $a_userInfo->UserEmail,
            'UserStatus'    => $a_userInfo->UserStatus,
            'UserType'      => $a_userInfo->UserType,
            'UserFullName'  => $a_userInfo->UserFullName,
            'UserIpAddress' => $this->_ci->input->ip_address(),
            'session_id'    => $this->_ci->session->userdata('session_id'), // Prevent Session Id change by CI
            'loginType'     => $this->loginType
        );
        $this->_ci->session->set_userdata($this->_sess_user, $a_user);

        return TRUE;
    }

    private function _createUserLoginCookie() {
        $a_user = array(
            'userid' => $this->userInfo->UserId,
            'passwd' => $this->userInfo->UserPasswd);

        $a_cookie = array(
            'name'   => $this->_cookie_user,
            'value'  => $this->_ci->encrypt->encode(json_encode($a_user)),
            'expire' => 7 * 24 * 60 * 60,
            //'domain' => '.some-domain.com',
            'path'   => '/',
                //'secure' => TRUE
        );
        $this->_ci->input->set_cookie($a_cookie);
    }

    private function _getUserLoginCookie() {
        return $this->_ci->input->cookie($this->_cookie_user);
    }

    private function _updateUserLastLogin() {
        $a_user = array(
            'UserLastIPAddress'  => $this->_ci->input->ip_address(),
            'UserLastLoginDate'  => datetimeNow(),
            'UserLoginSessionId' => $this->_ci->session->userdata('session_id'),
            'UserTotalLogin'     => $this->userInfo->UserTotalLogin + 1
        );
        return $this->_ci->muser->update($a_user, $this->userInfo->UserId);
    }

}