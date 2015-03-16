<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Account extends Admin_Controller {
    
    function __construct() {
        parent::__construct();
        
       $this->load->model("flexi_auth_model"); 
    }

    function listing() {
        
        $users = $this->flexi_auth_model->getAllData();
        
        foreach($users as $user){
            $this->app_data['users'][] = array(
                'id' => $user->uacc_id,
                'username' => $user->uacc_username,
                'email' => $user->uacc_email
            );
      
        }
        
        $this->my_layout->view('/account/listing', $this->app_data);
    }

    function create() {
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        if(isset($email) && isset($username) && isset($password)){
            $result = $this->flexi_auth_model->insert_user($email,$username,$password);
            
            if($result){
                $message[] = "Thêm user thành công";
            }
        }
        
        $this->app_data['messageSuccess'] = $message;
        
         $this->my_layout->view('/account/create', $this->app_data);
    }

    function edit() {
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        
        $message  = array();
        if(isset($old_password) && isset($new_password)){
            $identity = $this->flexi_auth->get_user_identity();
            $result = $this->flexi_auth_model->change_password($identity,$old_password,$new_password);
            
            if($result){
                $message[] = "Thay đổi password thành công";
            }
        }
        
        $this->app_data['message'] = $message;
        
        $this->my_layout->view('/account/edit', $this->app_data);
    }

    function delete() {
         $this->my_layout->view('/account/delete', $this->app_data);
    }

}
