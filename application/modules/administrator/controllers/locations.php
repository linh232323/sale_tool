<?php

class Locations extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("location");
    }

    function listing() {

        $this->app_data['title'] = 'Location';
        $this->app_data['controller'] = 'location';

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
        
    }

    function edit() {
        
    }

    function delete() {
        
    }

}
