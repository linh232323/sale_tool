<?php

class Index extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }
    function index(){
         $this->my_layout->view('/index', $this->app_data);
    }

}
