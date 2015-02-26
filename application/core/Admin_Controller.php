<?php

class Admin_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth = new stdClass;
        
        $this->my_layout->setPageTitle("SALE TOOL");
        $this->load->library(array("email", "session","flexi_auth_lite", "flexi_auth"));
        $this->load->helper(array('my_pagination'));

        if ($this->app_action == 'add' || $this->app_action == 'update') {
            $this->load->library('form_validation');
            $this->form_validation->CI = & $this;
        }

        /* Authenticate */
        // If not Login
        $this->app_data['login_url'] = $this->app_base_url . $this->app_module . "/login";

        if ($this->app_controller != 'login') {
            $this->load->library('flexi_auth');
            // Check user is logged in as an admin.
            // For security, admin users should always sign in via Password rather than 'Remember me'.
            if (!$this->flexi_auth->is_logged_in_via_password() || !$this->flexi_auth->is_admin()) {
                // Set a custom error message.
                $this->flexi_auth->set_error_message('You must login as an admin to access this area.', TRUE);
                $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
                redirect($this->app_data['login_url']);
            }
        }
        /* End Authenticate */
    }

}
