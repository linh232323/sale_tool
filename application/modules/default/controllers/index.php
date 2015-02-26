<?php

class Index extends Default_Controller {

    private $_default_module = "default/";
    private $_sess_register = 'sess_register';

    function __construct() {
        parent::__construct();
        $this->load->model("menu");
        $this->my_layout->setLayout("layout/backend_demo_1", $this->app_data);
    }

    public function index() {
        $data = $this->menu->getMenuValue();
        foreach ($data as $key => $value) {
            if ($value['attribute_id'] == 2) {
                $link = $value['value'];
                $menu[]= array('link'=> $link,'title'=>$name , 'parent_id' =>$parent_id , 'id' => $id);
                //$name[1] = array('link' => $value['value']);
            }
            if ($value['attribute_id'] == 1) {
                $name =$value['value'];
                $parent_id = $value['parent_id'];
                $id = $value['entity_id'];
            }
            
            
        }
        $this->app_data['menu']=$menu;
        $this->my_layout->setPageTitle('User Home');
        $this->my_layout->view('/user/index', $this->app_data);
    }

}
