<?php

class Login extends Admin_Controller {

    function __construct() {
        parent::__construct();

        // To load the CI benchmark and memory usage profiler - set 1==1.
        if (1 == 2) {
            $sections = array(
                'benchmarks' => TRUE, 'memory_usage' => TRUE,
                'config' => FALSE, 'controller_info' => FALSE, 'get' => FALSE, 'post' => FALSE, 'queries' => FALSE,
                'uri_string' => FALSE, 'http_headers' => FALSE, 'session_data' => FALSE
            );
            $this->output->set_profiler_sections($sections);
            $this->output->enable_profiler(TRUE);
        }

        // Load required CI libraries and helpers.
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        // IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded! 
        // It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
        

        // Redirect users logged in via password (However, not 'Remember me' users, as they may wish to login properly).
        if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'auth/logout') {
            // Preserve any flashdata messages so they are passed to the redirect page.
            if ($this->session->flashdata('message')) {
                $this->session->keep_flashdata('message');
            }
            
            redirect($this->app_base_url . $this->app_module . "/order/listing");
        }

  
        $this->app_data['login_url'] = $this->app_base_url . $this->app_module . "/login";
    }

    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
    // flexi auth demo
    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
    /**
     * Many of the functions within this controller load a custom model called 'demo_auth_model' that has been created for the purposes of this demo.
     * The 'demo_auth_model' file is not part of the flexi auth library, it is included to demonstrate how some of the functions of flexi auth can be used.
     *
     * These demos show working examples of how to implement some (most) of the functions available from the flexi auth library.
     * This particular controller 'auth', is used as the main login page, user registration, and for forgotten password requests.
     * 
     * All demos are to be used as exactly that, a demonstation of what the library can do.
     * In a few cases, some of the examples may not be considered as 'Best practice' at implementing some features in a live environment.
     */
    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
    // Login / Registration
    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
    /**
     * index
     * Forwards to 'login'.
     */

    function index() {
        $this->login();
    }

    function login(){
        if($this->input->post('login_user')){
            $login = $this->flexi_auth->login(
                $this->input->post('login_identity'),
                $this->input->post('login_password'),
                $this->input->post('remember_me'));    

            redirect('administrator/hotel/listing');
        }

        $this->load->library('form_validation');
        // Set validation rules.
        $this->form_validation->set_rules('login_identity', 'Identity (Email / Login)', 'required');
        $this->form_validation->set_rules('login_password', 'Password', 'required');
        // If failed login attempts from users IP exceeds limit defined by config file, validate captcha.
        if ($this->flexi_auth->ip_login_attempts_exceeded()) {

        }
    }
}
