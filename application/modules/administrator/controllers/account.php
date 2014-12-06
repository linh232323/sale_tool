<?php

class Account extends Admin_Controller {
    
    function __construct() {
        parent::__construct();
        
        $this->load->model("muser");        
    }

    function listing() {
        

        $this->app_data['headers'] = array(
            'id' => '#',
            'username' => 'Username',
            'name' => 'Name',         
            'amount' => 'Amount',
               
        );
        
        $_services = $this->muser->getAllData();
        $this->app_data['accounts'] = array();
        foreach($_services as $item){
            $this->app_data['accounts'][] = array(
                'id' => $item->id,
                'username' => $item->username,
                'name' => $item->name,
                'amount' => 0,
                
            );
        }
        
        $this->my_layout->view('/account/list', $this->app_data);
    }

    function create() {
        
    }

    function edit() {
        
    }

    function delete() {
        
    }

}
