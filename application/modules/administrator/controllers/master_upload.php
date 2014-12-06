<?php

class Master_upload extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("mfile");
        $this->load->model("muser");
        $this->load->model("mmaster_upload");
        $this->load->helper(array('my_url'));
        $this->my_layout->setPageTitle('QHO File Manager');
        //$this->my_layout->setLibJs(array('uploadify-v3.1/jquery.uploadify-3.1.min.js'));
        //$this->my_layout->setLibCss(array('uploadify-v3.1/uploadify.css'));
    }

    /**
     * List Files
     */
    function index() {
        $a_files = array();
        $v_total_row = $this->mmaster_upload->totalRows();

        if ($v_total_row) {
            $this->load->library(array('pagination', 'my_pagination'));
            $config['base_url']   = base_url() . 'administrator/file/index/?';
            $config['total_rows'] = $v_total_row;

            $this->my_pagination->initialize($config);
            $this->app_data['file_paging'] = $this->my_pagination->createLinks();
            $a_files                       = $this->mmaster_upload->getAllData($this->my_pagination->_per_page, $this->my_pagination->_off);
        }
        $a_tables                      = $this->mmaster_upload->listTable();

        $this->app_data['files']  = $a_files;
        $this->app_data['tables'] = $a_tables;
        $this->my_layout->view('master_upload/list', $this->app_data);
    }
    
    function add() {
        $error = FALSE;
        $this->app_data['file'] = $this->mfile->mockItem();
        
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
            $this->my_layout->view('master_upload/form', $this->app_data);
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

    function test() {
        echo is_uploaded_file($this->config->item('upload_file_path') . 'qhotraining_tbl_answer/20121121/Desert.jpg');
    }

}