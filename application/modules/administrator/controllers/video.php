<?php
class Video extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("muser"); 
        $this->load->helper(array('my_url'));
    }
       
    /**
     * List User
     */
    function index() {
        $this->my_layout->setLibJs(array('jquery-ui-1.9.1/bundle/ui/jquery.ui.core'));
        $a_users     = array();
        $v_total_row = $this->muser->totalRows();
        if($v_total_row){
            $this->load->library(array('pagination','my_pagination'));                                
            $config['base_url']    = base_url() . 'administrator/user/index/?';
            $config['total_rows']  = $v_total_row;            
            
            $this->my_pagination->initialize($config);            
            $this->app_data['user_paging'] = $this->my_pagination->createLinks();
            $a_users                       = $this->muser->getAllData($this->my_pagination->_per_page, $this->my_pagination->_off);
        }       
        
        $this->app_data['users'] = $a_users;
        $this->my_layout->view('list', $this->app_data);
    }

    /**
     * Add User
     */
    function add() {
        $error = FALSE;
        $this->app_data['user'] = $this->muser->mockItem();
        
        $this->form_validation->set_rules('UserFullName', 'Full name'   , 'required|min_length[6]');
        $this->form_validation->set_rules('UserName'    , 'Username'    , 'required|max_length[25]|callback_validUserName');
        $this->form_validation->set_rules('UserPasswd'  , 'Password'    , 'required');
        $this->form_validation->set_rules('UserEmail'   , 'Email'       , 'required|valid_email|callback_validEmail');
        $this->form_validation->set_rules('UserAddress' , 'Address'     , 'required');
        $this->form_validation->set_rules('UserPhone'   , 'Phone number', 'required|callback_validPhone');
        $this->form_validation->set_rules('UserNo'      , 'User No'     , 'required|exact_length[9]');
        $this->form_validation->set_rules('UserNoDate'  , 'User NoDate' , 'required');
        $this->form_validation->set_rules('UserNoPlace' , 'User NoPlace', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters('<span class="text-error">', '</span>');
            $this->my_layout->view('form', $this->app_data);
        }
        else {
            $v_salt = createRandomString(5);
            $a_insert_row = array(
                'UserFullName'   => $this->input->post('UserFullName'),
                'UserName'       => $this->input->post('UserName'),
                'UserSalt'       => $v_salt,
                'UserPasswd'     => md5($this->input->post('UserPasswd') . $v_salt),
                'UserEmail'      => $this->input->post('UserEmail'),
                'UserAddress'    => $this->input->post('UserAddress'),
                'UserPhone'      => $this->input->post('UserPhone'),
                'UserNo'         => $this->input->post('UserNo'),
                'UserNoDate'     => $this->input->post('UserNoDate'),
                'UserNoPlace'    => $this->input->post('UserNoPlace'),
                'UserCreateDate' => datetimeNow(),
                'UserUpdateDate' => datetimeNow(),
            );
            
            if(!$this->muser->add($a_insert_row)){
                $error = TRUE;
            }
            
            if(!$error){
                goBack();                
            }else{
                $this->app_data['message'] = 'Lỗi tạo dữ liệu';
                $this->my_layout->view('backend/elements/404',$this->app_data);
            }
        }
        
    }

    /**
     * Cập nhật User
     */
    function update() {
        $error       = FALSE;
        $a_user_info = array();
        $userid      = $this->uri->segment(4);
        
        if(!is_numeric($userid)){
            $error                     = TRUE;            
            $this->app_data['message'] = 'Đường dẫn không hợp lệ.';            
            $this->my_layout->view('backend/elements/404', $this->app_data);
            
        }else{
            $a_user_info = $this->muser->getInfo($userid);
            if (!empty($a_user_info)) {
                $this->app_data['user'] = $a_user_info;
            }
            else {
                $error                     = TRUE;
                $this->app_data['message'] = 'Thành viên không tồn tại.';
                $this->my_layout->view("backend/elements/404", $this->app_data);                
            }
        }
        
        if(!$error){            
            $this->form_validation->set_rules('UserFullName', 'Full name'   , 'required|min_length[6]');
            $this->form_validation->set_rules('UserName'    , 'User Name'   , 'required|max_length[25]|callback_validUserName');            
            $this->form_validation->set_rules('UserEmail'   , 'Email'       , 'required|valid_email|callback_validEmail');
            $this->form_validation->set_rules('UserAddress' , 'Address'     , 'required');
            $this->form_validation->set_rules('UserPhone'   , 'Phone number', 'required|callback_validPhone');
            $this->form_validation->set_rules('UserNo'      , 'User No'     , 'required|exact_length[9]');
            $this->form_validation->set_rules('UserNoDate'  , 'User NoDate' , 'required');
            $this->form_validation->set_rules('UserNoPlace' , 'User NoPlace', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_error_delimiters('<span class="text-error">', '</span>');
                $this->my_layout->view('form', $this->app_data);                
            }
            else {                
                $a_update_row = array(
                    'UserFullName'   => $this->input->post('UserFullName'),
                    'UserName'       => $this->input->post('UserName'),
                    'UserEmail'      => $this->input->post('UserEmail'),
                    'UserAddress'    => $this->input->post('UserAddress'),
                    'UserPhone'      => $this->input->post('UserPhone'),
                    'UserNo'         => $this->input->post('UserNo'),
                    'UserNoDate'     => $this->input->post('UserNoDate'),
                    'UserNoPlace'    => $this->input->post('UserNoPlace'),
                    'UserCreateDate' => datetimeNow(),
                    'UserUpdateDate' => datetimeNow(),
                );

                if($this->input->post('UserPasswd')!=''){
                    $v_salt                     = createRandomString(5);
                    $a_update_row['UserSalt']   = $v_salt;
                    $a_update_row['UserPasswd'] = md5($this->input->post('UserPasswd') . $v_salt);
                }
                
                if(!$this->muser->update($a_update_row,$userid)){
                    $error = TRUE;
                }
                
                if(!$error){
                    goBack();
                }else{
                    $this->app_data['message'] = 'Lỗi cập nhập dữ liệu';
                    $this->my_layout->view('backend/elements/404',$this->app_data);
                }
            }
        }
    }

    /**
     * Xóa User
     */
    function delete() {
        
        $error       = FALSE;
        $a_user_info = array();
        $userid      = $this->uri->segment(4);
        
        if(!is_numeric($userid)){
            $error                     = TRUE;
            $this->app_data['message'] = 'Đường dẫn không hợp lệ.';            
            $this->my_layout->view('backend/elements/404', $this->app_data);
            
        }else{
            $a_user_info = $this->muser->getInfo($userid);
            if (!empty($a_user_info)) {
                if($this->muser->delete($userid)){
                    redirect(base_url().'administrator/user');
                }
            }
            else {
                $error                     = TRUE;
                $this->app_data['message'] = 'Thành viên không tồn tại.';
                $this->my_layout->view('backend/elements/404', $this->app_data);                
            }
        }
    }

    function view(){
        $userid = $this->uri->segment(4);
        if(is_numeric($userid)){
            $user = $this->muser->getInfo($userid);
            if(!empty($user)){
                $this->app_data['user'] = $user;
                $this->my_layout->view("view",$this->app_data);
            }
            else{
                $this->app_data['message'] = 'Thành viên không tồn tại.';
                $this->my_layout->view('backend/elements/404', $this->app_data);    
            }
        }
    }
    /**
     * Thực thi 1 số chức năng khác
     */
    public function execute() {
        $action = '';
        $error = FALSE;
        if(isset($_REQUEST['action']) && $_REQUEST['action']!=''){
            $action = $_REQUEST['action'];
        }
        
        if($action=='delete'){
            $a_checkedid = array();
            if(isset($_REQUEST['checkedid']) && !empty($_REQUEST['checkedid'])){
                $a_checkedid = $_REQUEST['checkedid'];
                $v_checkedid = implode(',', $a_checkedid);
                if(!$this->muser->delete($v_checkedid)){
                    $error = TRUE;
                    $this->app_data['message'] = 'Lỗi trong quá trình xóa user.';
                    $this->my_layout->view('backend/elements/404', $this->app_data);  
                }
                else{
                     redirect(base_url().'administrator/user'); 
                }
            }     
            else{
                goBack();
            }
        }   
        else{
            goBack();
        }
    }

    /**
     * Kiểm tra thông tin user
     * @param String $username
     * @return boolean
     */
     function validUserName($username) {        
        $userid = $this->uri->segment(4);  
        if ($this->muser->checkUser($username, $userid) == TRUE) {
            return TRUE;            
        }
        else {
            $this->form_validation->set_message('validUserName', 'Tên đăng nhập đã được sử dụng. Vui lòng chọn tên khác.');
            return FALSE;
        }
    }

    /**
     * Kiểm tra thông tin email
     * @param String $email
     * @return boolean
     */
    public function validEmail($email) {
        $userid = $this->uri->segment(4);
        if ($this->muser->checkEmail($email, $userid) == TRUE) {
            return TRUE;
        }
        else {
            $this->form_validation->set_message('validEmail', 'Email này đạ được đăng kí. Vui lòng chọn email khác.');
            return FALSE;
        }
    }

    /**
     * Kiểm tra số điện thoại
     * @param   type $phone
     * @return  boolean
     * Số hợp lệ :
     * - 084.08.37610471 : true
     * - (084).(08).37610471 : true
     * - (084.08).7610471 : false
     */
    public function validPhone($phone) {
        $rule1 = '/^[0-9]{3}\.[0-9]{2}\.[0-9]{8}$/i';
        $rule2 = '/^\([0-9]{3}\)\.\([0-9]{2}\)\.[0-9]{8}$/i';
        if (preg_match($rule1, $phone) || preg_match($rule2, $phone)) {
            return TRUE;
        }
        else {
            $error = 'Số điện thoại không hợp lệ. Số hợp lệ là: 084.08.37610475 or (084).(08).37610475 or (084.08).7610475';
            $this->form_validation->set_message('validPhone', $error);
            return FALSE;
        }
    }

}