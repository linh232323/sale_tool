<?php

class Servicesitem extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("services_type");
        $this->load->model("services_level");
        $this->load->model("services_item");
        
        $this->load->helper('selection_helper');
    }
    
    function edit(){
        
        $id = $this->input->get('id');
        
        services_items = array();
        $data = array();
        
        
        $headers = array(
                        'id' => '#',
                         'level' => 'Quanlity',
                         'price_net' => 'Price Net' ,
                         'price_percent' => 'Price %',
                         'price_gross' => 'Price Gross',
                         
                         
                         'extra_net' => 'Extra Net' ,
                         'extra_percent' => 'Extra %',
                         'extra_gross' => 'Extra Gross',
                         
                         'discount_max' => 'Discount Max'
                        
        );
        
        foreach($services_items as $item){
            $data[]= array(
                'id' => $item->id,
                           
                'level' => toSelection($level_model,$item->level_id,'level','level'),
                'price_net' =>  $item->price_net,
                'price_percent' => $item->price_percent,
                'price_gross' => $item->price_gross,
                           
                'extra_net' =>  $item->extra_net,
                'extra_percent' => $item->extra_percent,
                'extra_gross' => $item->extra_gross,
                           
                'discount_max' => $item->discount_max
            );
        }
        
        $this->app_data['headers'] = $headers;
        $this->app_data['data'] =  $data;
        $this->app_data['type'] = $type_id;
        $this->app_data['id'] = $id;
        $this->app_data['name'] = $name;
        
        $this->app_data['location_a']  = toSelection($location_model,$location_a_id,'location_a','location location_a');
        
        $this->app_data['location_b']  = toSelection($location_model,$location_b_id,'location_b','location location_b');
        
        $this->my_layout->view('/services/edit', $this->app_data);
    }
}
