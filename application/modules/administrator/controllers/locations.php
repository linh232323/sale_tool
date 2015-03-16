<?php

class Locations extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("location");
    }

    function listing() {

        $this->app_data['title'] = 'Location';
        $this->app_data['controller'] = 'locations';

        $this->app_data['headers'] = array(
            'id' => '#',
            'name' => 'Name',
        );

        $_services = $this->location->getAllData();
        $this->app_data['locations'] = array();
        foreach ($_services as $item) {
            $this->app_data['locations'][] = array(
                'id' => $item->id,
                'name' => $item->name
            );
        }

        $this->my_layout->view('/location/list', $this->app_data);
    }

    function create() {
        $locationModel = $this->location;
        $locationModel->setValue('id',null);
        $locationModel->setValue('name','Correct me');
        
        $id = $locationModel->save();
        redirect('/index.php/administrator/locations/edit?id='.$id, 'refresh');

    }
    function edit() {
        
        $id = $this->input->get('id');
        $name = $this->input->get('name');
        $description = null;//$this->input->get('description');
        
        $locationModel = $this->location->load($id);
        $save = false;
        if(isset($name) && !empty($name)){
            $locationModel->setValue('name',$name);
            $save = true;
        }
        
        if(isset($description)){
            $locationModel->setValue('description',$description);
            $save = true;
        }
        
        if($save){
            $locationModel->save();
            $this->app_data['message'] = 'Saved !!!';
        }
        $this->app_data['title'] = 'Location #'.$id;
        $this->app_data['id'] = $id;
        $this->app_data['name'] = $locationModel->getData()['name'];
        //$this->app_data['description'] = $locationModel->getData()['description'];
        
         $this->my_layout->view('/location/edit', $this->app_data);
    }

    function delete() {
        
    }

}
