<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Profile extends  Admin_Controller{
    public function _construct(){
        $this->load->model("flexi_auth_model");
    }
    public function add(){
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        
        $this->flexi_auth_model->insert_user($email,$username,$password);
    }
    
    public function edit(){
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
    }
    
    public function listProfiles(){
        
    }
}