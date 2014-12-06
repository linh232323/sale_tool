<?php

class Order extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("customer");
        $this->load->model("services_type");
        $this->load->model("services_level");
        $this->load->model("services");
        
        $this->load->model("orders");
        $this->load->model("order_cruises");
        $this->load->model("order_date");
        $this->load->model("order_items");
        
    }

    function place() {
        $this->my_layout->setLibJs(array('underscore/underscore-min'));
        $this->my_layout->setPageTitle('Place Order');

        $all_services_type = $this->services_type->getAllData();                                
        
        $dates = array();
        
        $order_date = $this->order_date->getOrderDateById($this->input->get('id'));
        
        
        $count = 0;
        foreach($order_date as $date){            
            $count ++;            
            $order_cruise = $this->order_cruises->getOrderCruisesByDate($date->id);
            $cruises = array();
            
            foreach($order_cruise as $cruise){
                $_services_type = $this->services_type->getAllData();                                
                $_service_type = array();
                foreach ($_services_type as $service_type) {
                    $_service_items = array();
                    $_services_items = $this->order_items->getOrderItemsByCruises($service_type->id,$cruise->id);
                    foreach($_services_items as $item){
                        $service_level = $this->services_level->load($item->service_level_id);
                        $service = $this->services->load($item->service_id);
                        $_service_items[] = array(
                                'id' => $item->id,
                                'services_item' => array(
                                    'service_id' => $item->service_id,
                                    'service_name' => $service ? $service->getData()['name'] : '',
                                    'level_id' => $item->service_level_id,
                                    'level_name' => $service_level ? $service_level->getData()['name'] : '',
                                    'price_gross' => $item->price_gross,
                                    'is_custom' => $item->is_custom,
                                    'extra_gross' => $item->extra_gross,
                                    'price_number' => $item->price_number,
                                    'extra_number' => $item->price_number,
                                    'discount' => $item->discount,
                                    'max_discount' => $item->max_discount,
                                    'description' => $item->description,
                                    'total' => $item->total,
                                ),
                            );
                    }                   
                    $_service_type[] = array(
                        'title' => $service_type->description,
                        'services_type' => $service_type->id,
                        'service_items' => $_service_items
                    );
                }  
                
                $cruises[] = array(
                    'id' => $cruise->id,
                    'from' =>  array(
                        'id' => $cruise->from_id,
                        'name' => $cruise->from_name 
                    ),
                    'to' => array(
                        'id' => $cruise->to_id,
                        'name' => $cruise->to_name
                    ),
                    'services' => $_service_type,
                    'description' => $cruise->description
                );
            }
            
            $dates[] = array(
                "id" => $date->id,
                "number" => $count,
                "date" => $date->from_date,
                'cruises' => $cruises
            );
        }
        
        
        $order_model =  $this->orders->getOrderById($this->input->get('id'));        
        $customer_model = $this->customer->getCustomerById($order_model->customer_id);
        
       
        
        $this->app_data['dates'] = $dates;
        $this->app_data['id'] = $this->input->get('id');
        $this->app_data['name'] = $customer_model->name;
        $this->app_data['address'] = $customer_model->address;
        $this->app_data['email'] = $customer_model->email;
        $this->app_data['phone'] = $customer_model->phone;
        $this->app_data['identify'] = $customer_model->identify;

        $this->app_data['number_customer'] = $order_model->customer_count;
        $this->app_data['from_date'] = $order_date[0]->from_date;
        $this->app_data['to_date'] =  $order_date[count($order_date) - 1]->from_date;


        $this->my_layout->view('/order/place', $this->app_data);
    }

    function create() {
        $this->my_layout->setLibJs(array('underscore/underscore-min'));
        $this->my_layout->setPageTitle('Create New Order');
        $this->my_layout->view('/order/create', $this->app_data);
        
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $name = $this->input->post('customer-name');
            $identify = $this->input->post('customer-identify');
            $address = $this->input->post('customer-address');
            $phone = $this->input->post('customer-phone');
            $email = $this->input->post('customer-email');
            
            $dFrom = strtotime($this->input->post('from-date'));
            $dTo = strtotime($this->input->post('to-date'));
            $number = $this->input->post('customer-count');
             
            $customer_model = $this->customer;
           
            $customer_model->setData(array(
                'name' => $name,
                'identify' => $identify,
                'address' => $address,
                'phone' => $phone,
                'email' => $email
            ));
            
            $customer_id = $customer_model->save();
            $order_model =  $this->orders;
            $order_model->setData(array(
                'customer_id' => $customer_id,
                'created_by' => 1,
                'created_date' => date ('Y/m/d'),
                'order_status' => 0,
                'customer_count' => $number
            ));
            
            $order_id = $order_model->save();
            
            $datediff = floor(($dTo - $dFrom)/(60*60*24));
            
            $order_date = $this->order_date;
         
            for($i = 0 ; $i < $datediff; $i ++){
                $order_date->setData(array(
                    'id' => null,
                    'order_id' => $order_id,
                    'from_date' => date('Y/m/d',$i * 60 * 60 * 24 + $dFrom),
                    'to_date' => date('Y/m/d',$i * 60 * 60 * 24 + $dFrom),
                ));
                
                $order_date->save();
            
            }
            redirect('/index.php/administrator/order/place?id='.$order_id);
        }
    }

    function listing() {
        $this->my_layout->setLibJs(array('underscore/underscore-min'));
        $this->my_layout->setPageTitle('Create New Order');
        $_orders = $this->orders->listAllOrders();
        $data = array();
        foreach($_orders as $order){
            $_order_total = 0;
            $_order_items = $this->order_items->getByOrderId($order->id);
            foreach($_order_items as $item){
                $_order_total += $item->total;
            }
            $order->total = $_order_total;
            $data[] = $order;
        }
        $this->app_data['orders'] = $data;
       
        $this->my_layout->view('/order/list', $this->app_data);
    }

}
