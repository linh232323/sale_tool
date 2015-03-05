<?php

class Room extends Default_Controller {

    static $_SERVICES_TYPE = 1;
    private $_default_module = "default/";
    private $_sess_register = 'sess_register';

    function __construct() {
        parent::__construct();
        $this->load->model("menu");
        $this->load->model("services_type");
        $this->load->model("services_level");
        $this->load->model("services_price");
        $this->load->helper('selection_helper');
        $this->load->model("services");
        $this->load->model("location");
    }

    public function index($idr =1) {
        $data = $this->menu->getMenuValue();
        foreach ($data as $key => $value) {
            if ($value['attribute_id'] == 2) {
                $link = $value['value'];
                $menu[] = array('link' => $link, 'title' => $name, 'parent_id' => $parent_id, 'id' => $id);
                //$name[1] = array('link' => $value['value']);
            }
            if ($value['attribute_id'] == 1) {
                $name = $value['value'];
                $parent_id = $value['parent_id'];
                $id = $value['entity_id'];
            }
        }
        $this->app_data['menu'] = $menu;
        $data = array();
        $headers = array(
            'id' => '#',
            'service_level' => 'Quanlity',
            'description' => 'Description',
            'date_from' => 'From Date',
            'date_to' => 'Date To',
            'price_net' => 'Price Net',
            'price_percent' => 'Price %',
            'price_gross' => 'Price Gross',
            'extra_net' => 'Extra Net',
            'extra_percent' => 'Extra %',
            'extra_gross' => 'Extra Gross',
            'discount_max' => 'Discount Max'
        );
        $this->app_data['aa1'] = $services_items = $this->services_price->getAllPriceByServiceId($idr);
        $level_model = $this->services_level->getAllData();
        foreach ($services_items as $item) {
            $d = array();
            foreach ((array) $item as $k => $v) {
                switch ($k) {
                    case 'id':
                        $type = 'none';
                        break;
                    case 'date_from':
                    case 'date_to':
                        $type = 'input-date';
                        break;
                    default :
                        $type = 'input';
                        break;
                }

                $d[$k] = array(
                    'type' => $type,
                    'value' => $v
                );
                $d['service_level'] = array(
                    'type' => $type,
                    'value' => $this->services_level->getServicesName($item->service_level)
                );
            }
            $data[] = $d;
        }

        $serviceModel = $this->services->load($idr);
        $location_model = $this->location->getAllData();
        $this->app_data['headers'] = $headers;
        $this->app_data['data'] = $data;
        $this->app_data['id'] = $idr;
        $this->app_data['title'] = $serviceModel->getData()['name'];
        $this->app_data['type'] = $serviceModel->getData()['service_type_id'];
        $serviceModel->getData()['location_id_a'];
        foreach ($location_model as $key => $value) {
            if ($value->id == $serviceModel->getData()['location_id_a']) {
                $location_a = $value->name;
            }
            if ($value->id == $serviceModel->getData()['location_id_b']) {
                $location_b = $value->name;
            } else {
                $location_b = "";
            }
        }
        $this->app_data['location_a'] = $location_a;
        $this->app_data['location_b'] = $location_b;
        $this->my_layout->setPageTitle('User Home');
        $this->my_layout->view('/user/room', $this->app_data);
    }

}
