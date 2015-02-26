<?php

class Tour extends Default_Controller {

    static $_SERVICES_TYPE = 3;
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
        $this->app_data['headers'] = array(
            'id' => '#',
            'name' => 'Name',
        );

        $_services = $this->services->getAllByType(self :: $_SERVICES_TYPE);
        $this->app_data['services'] = array();
        foreach ($_services as $item) {
            $this->app_data['services'][] = array(
                'id' => $item->id,
                'name' => $item->name
            );
        }
        $this->my_layout->setPageTitle('User Home');
        $this->my_layout->view('/user/list', $this->app_data);
    }

}
