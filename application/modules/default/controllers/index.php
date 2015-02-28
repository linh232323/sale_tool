<?php

class Index extends Default_Controller {

    private $_default_module = "default/";
    private $_sess_register = 'sess_register';

    function __construct() {
        parent::__construct();
    }

    public function index() {
        
        $this->my_layout->setPageTitle('User Home');
        $this->my_layout->view('/user/index', $this->app_data);
    }

}
