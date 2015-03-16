<?php

class Levels extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("services_level");
    }

    function listing() {

        $this->app_data['title'] = 'Quanlity';
        $this->app_data['controller'] = 'levels';

        $this->app_data['headers'] = array(
            'id' => '#',
            'name' => 'Name',
        );

        $_services = $this->services_level->getAllData();
        $this->app_data['services_level'] = array();
        foreach ($_services as $item) {
            $this->app_data['services_level'][] = array(
                'id' => $item->id,
                'name' => $item->name
            );
        }

        $this->my_layout->view('/levels/list', $this->app_data);
    }

    function create() {
        $servicesLevelModel = $this->services_level;
        $servicesLevelModel->setValue('id',null);
        $servicesLevelModel->setValue('name','Correct me');
        
        $id = $servicesLevelModel->save();
        redirect('/index.php/administrator/levels/edit?id='.$id, 'refresh');

    }
    function edit() {
        
        $id = $this->input->get('id');
        $name = $this->input->get('name');
        
        $servicesLevelModel = $this->services_level->load($id);
        $save = false;
        if(isset($name) && !empty($name)){
            $servicesLevelModel->setValue('name',$name);
            $save = true;
        }
        
        if($save){
            $locationModel->save();
            $this->app_data['message'] = 'Saved !!!';
        }
        $this->app_data['title'] = 'Location #'.$id;
        $this->app_data['id'] = $id;
        $this->app_data['name'] = $locationModel->getData()['name'];
        
         $this->my_layout->view('/levels/edit', $this->app_data);
    }

    function delete() {
        
    }

}
