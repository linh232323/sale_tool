<?php
class Logout extends Admin_Controller {
    
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
       $this->my_auth->userLogout();
       redirect($this->app_data['login_url']);
    }

}