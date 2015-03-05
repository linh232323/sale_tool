<?php

class Hotel extends Default_Controller {

    static $_SERVICES_TYPE = 1;
    private $_default_module = "default/";
    private $_sess_register = 'sess_register';

    function __construct() {
        parent::__construct();
        $this->load->model("menu");
        $this->load->model("services");
        $this->load->model("services_price");
        
    }

    public function index() {
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
        $services_price = array();
        $headers_price = array();
        $services = array();
        $this->app_data['title'] = 'Hotel';
        $this->app_data['controller'] = 'room';
        $this->app_data['headers_price'] = array(
            'id' => '#',
            'name' => 'Name',
            'from' => 'From',
            'to' => 'To',
            'price_net' => 'Price',
            'price_percent' => 'Price (%)',
            'price_gross' => 'Price (Gross)',
            'extra_net' => 'Extra',
            'extra_percent' => 'Extra (%)',
            'extra_gross' => 'Extra (Gross)',
            'discount_max' => 'Max discount (%)',
        );
        $_services_price = $this->services_price->getAllByType(self :: $_SERVICES_TYPE, '2014-10-02', '2014-12-30');
        $this->app_data['services_price'] = array();
        foreach ($_services_price as $item) {
            $this->app_data['services_price'][] = array(
                'id' => $item->id,
                'name' => $item->service_name,
                'from' => $item->date_from,
                'to' => $item->date_to,
                'price_net' => $item->price_net,
                'price_percent' => $item->price_percent,
                'price_gross' => $item->price_gross,
                'extra_net' => $item->extra_net,
                'extra_percent' => $item->extra_percent,
                'extra_gross' => $item->extra_gross,
                'discount_max' => $item->discount_max,
            );
        }

        $this->app_data['headers'] = array(
            'id' => 'Img',
            'name' => 'Name',
            'description' =>'Description'
        );

        $_services = $this->services->getAllByType(self :: $_SERVICES_TYPE);
        $this->app_data['services'] = array();
        foreach ($_services as $item) {
            $this->app_data['services'][] = array(
                'id' => $item->id,
                'name' => $item->name,
                'description' => $item->description
            );
        }

        $this->my_layout->setPageTitle('User Home');
        $this->my_layout->view('/user/hotel', $this->app_data);
    }

}
