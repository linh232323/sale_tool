<?php

class Servicesitem extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("services_type");
        $this->load->model("services_level");
        $this->load->model("services_price");
        
        $this->load->model("services");
        $this->load->model("location");
        $this->load->helper('selection_helper');
    }

    function edit() {
        $id = $this->input->get('id');
        $data = array();
        $headers = array(
            'id' => '#',
            'level_name' => 'Loai',
            
            'date_from' => 'Từ',
            'date_to' => 'Đến',
            'price_net' => 'Giá Net',
            'price_percent' => 'Giá %',
            'price_gross' => 'Giá Gross',
            'extra_net' => 'Phụ thu Net',
            'extra_percent' => 'Phụ thu %',
            'extra_gross' => 'Phụ thu Gross',
            'discount_max' => 'Giảm giá'
        );
        $services_items = $this->services_price->getAllPriceByServiceId($id);
        $level_model = $this->services_level->getAllData();
        foreach ($services_items as $item) {
            $d = array();
            foreach((array)$item as $k => $v){
                switch ($k){
                    case 'id':
                        $type = 'none';
                        break;
                    case 'date_from':
                    case 'date_to':
                        $type = 'input-date';
                        break;
                    case 'price_gross':
                    case 'extra_gross':
                        $type = 'input-readonly';
                        break;
                    default :
                        $type = 'input';
                        break;
                }
                        
                $d[$k] = array(
                 
                    'type' => $type,
                    'value' => $v
                );
            }

            $data[] =$d;
        }
        
        $serviceModel = $this->services->load($id);
        $location_model = $this->location->getAllData();
        
        $this->app_data['headers'] = $headers;
        $this->app_data['data'] = $data;
        $this->app_data['id'] = $id;
        $this->app_data['title'] = $serviceModel->getData()['name'];
        $this->app_data['type'] = $serviceModel->getData()['service_type_id'];
        
        

        $this->app_data['location_a'] = toSelection($location_model, $serviceModel->getData()['location_id_a'], 'location location_a' , 'location_a' , 'location_a');

        $this->app_data['location_b'] = toSelection($location_model, $serviceModel->getData()['location_id_b'], 'location location_b' , 'location_b' , 'location_b');

        $this->my_layout->view('/services/edit', $this->app_data);
    }
    
    function save_service(){
        $id = $this->input->post('id',true);
        
        $location_a = $this->input->post('location_a',true);
        
        $location_b = $this->input->post('location_b',true);
        
        
        $name = $this->input->post('service-name',true);
        
        
        $this->services->load($id);
        
        $this->services->setValue('name',$name);
        
        $this->services->setValue('location_id_a', $location_a);
        
        $this->services->setValue('location_id_b', $location_b);
        
        $this->services->save();
        redirect('/index.php/administrator/servicesitem/edit?id='.$id, 'refresh');

    }
    function add_item(){
        $id = $this->input->get('id');
        
        $serviceModel = $this->services->load($id);
        
        $this->services_price->setValue('id',null);
        
        $this->services_price->setValue('service_id',$id);

        $this->services_price->setValue('date_from',date('Y-m-d'));

        $this->services_price->setValue('date_to',date('Y-m-d'));

        $this->services_price->setValue('service_type_id',$serviceModel->getData()['service_type_id']);
        $this->services_price->save();
        redirect('/index.php/administrator/servicesitem/edit?id='.$id, 'refresh');

    }
    function save_item(){
        $id = $this->input->post('id');

        $level_name = $this->input->post('level_name');

        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $discount_max = $this->input->post('discount_max');
        $price_net = $this->input->post('price_net');
        $price_percent = $this->input->post('price_percent');
        $price_gross = $price_net * (100 +  $price_percent)/ 100;

        $extra_net = $this->input->post('extra_net');
        $extra_percent = $this->input->post('extra_percent');
        $extra_gross = $extra_net * (100 + $extra_percent ) / 100;

        $this->services_price->setValue('id',$id);
        $this->services_price->setValue('level_name',$level_name);
        $this->services_price->setValue('date_from',$date_from);
        $this->services_price->setValue('date_to',$date_to);
        $this->services_price->setValue('discount_max',$discount_max);
        $this->services_price->setValue('price_net',$price_net);
        $this->services_price->setValue('price_percent',$price_percent);

        $this->services_price->setValue('price_gross',$price_gross);
        $this->services_price->setValue('extra_net',$extra_net);
        $this->services_price->setValue('extra_percent',$extra_percent);
        $this->services_price->setValue('extra_gross',$extra_gross);

        $this->services_price->save();

    }
    
    function add_service(){
        $type_id = $this->input->get('id');
        $this->services->setValue('service_type_id',$type_id);
        $this->services->setValue('name','None');
        $this->services->setValue('location_id_a',1);
        $this->services->setValue('location_id_a',2);
        $this->services->save();
        $id = $this->services->getData()['id'];
        redirect('/index.php/administrator/servicesitem/edit?id='.$id, 'refresh');

    }


    function delete_item(){
        $item_id = $this->input->post('id');
        
        $this->services_price->load($item_id);
        $this->services_price->delete();
    }

    function delete_service(){
        $id = $this->input->post('id');
        $this->services->load($id);
      
        $this->services->delete();
    }
}
