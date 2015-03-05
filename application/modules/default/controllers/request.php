<?php

class Request extends Default_Controller {

    private $_default_module = "default/";
    private $_sess_register = 'sess_register';

    function __construct() {
        parent::__construct();
        $this->load->model("muser");
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('my_auth');
        $this->form_validation->CI = & $this;
    }

    public function index() {
        $this->form_validation->set_rules("name", "Name", "trim|required");
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("street", "Street", "trim|required");
        $this->form_validation->set_rules("area_phone", "Area phone", "trim|required|min_length[3]|integer");
        $this->form_validation->set_rules("phone", "Phone", "trim|required|min_length[7]");
        $this->form_validation->set_rules("selectRequest", "Request", "trim|required");
        $this->form_validation->set_rules("Request", "Content", "trim|required");
        $this->form_validation->set_message('required', 'Please enter %s.');
        $this->form_validation->set_message('integer', '%s must contain an integer.');
        $this->form_validation->set_message('min_length', '%s must be at least %s characters in length.');
        $this->form_validation->set_message('max_length', '%s can not exceed %s characters in length.');
        $this->form_validation->set_message('valid_email', '%s must contain a valid email address.');
        $this->form_validation->set_message('email_exists', '%s not exist.');

        if ($this->form_validation->run()) {
            $data = array("name" => $this->input->post("name"),
                "email" => $this->input->post("email"),
                "street" => $this->input->post("street"),
                "area_phone" => $this->input->post("area_phone"),
                "phone" => $this->input->post("phone"),
                "request" => $this->input->post("selectRequest"),
                "content" => $this->input->post("Request")
            );
            //$this->Request_Models->insert($data);
            //redirect(base_url("index"));
        }
        $this->my_layout->setPageTitle('User Home');
        $this->my_layout->view('/user/request', $this->app_data);
    }

}
