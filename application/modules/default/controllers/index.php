<?php

<<<<<<< HEAD
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Index extends MY_Controller {
    public function index(){
        echo "a";
        redirect('/administrator/order/listing');
    }
}
=======
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
>>>>>>> 961a6a567bec5be5f1028aa32ae8d4b0b3f2d9e8
