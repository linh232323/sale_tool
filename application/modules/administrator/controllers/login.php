<?php

class Login extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("muser");
        $this->load->helper(array('my_url'));

        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;

        // Get Flash Data 
        $this->app_data['flash_message'] = $this->session->flashdata('sess_user_message');

        // Set Url
        $this->app_admin_url = $this->app_base_url . $this->app_module . '/'; // Tạm thời, vì chưa config cái này
    }

    function index() {

        $this->my_layout->setPageTitle('Administrator Login');
        // Check isLogin or Not
        if ($this->my_auth->isLogin()) {
            // Is Admin, And Login Type is Backend
            if (($this->my_auth->isAdmin() || $this->my_auth->isMember()) && $this->my_auth->isBackend())
                redirect($this->app_admin_url . 'order/listing');
        }

        // Link
        // Remember Me
        $this->app_data['is_remember'] = FALSE;
        if ($this->input->post('RememberMe') == 'yes') {
            $this->app_data['is_remember'] = TRUE;
        }
        // Tien hành đang nhập
        $email = $this->input->post('email');
        $passwd = $this->input->post('password');
        $this->my_auth->setIdentity($email)
                ->setCredential($passwd)
                ->setRememberMe($this->app_data['is_remember'])
                ->loginBackend();
        if ($this->my_auth->authenticate()) {
            // Login Successfully -> create session, set cookie if need
            $this->session->set_flashdata('sess_user_message', 'Bạn đã đăng nhập thành công.');
            redirect($this->app_admin_url . 'order/listing');
        } else {
            $this->app_data['error'] = $this->my_auth->getError();
        }

        $this->my_layout->view('/login/login_form', $this->app_data);
    }

}
