<?php

class Default_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->my_layout->setPageTitle("SALE TOOL User Manager");
        $this->load->library(array("email", "session", "my_auth", 'pagination'));
        $this->load->helper(array('my_pagination'));
        $this->my_layout->setLayout("layout/backend_demo", $this->app_data);
//        $this->load->model("menu");
//        $data = $this->menu->getMenuValue();
//        foreach ($data as $key => $value) {
//            if ($value['attribute_id'] == 2) {
//                $link = $value['value'];
//                $menu[] = array('link' => $link, 'title' => $name, 'parent_id' => $parent_id, 'id' => $id);
//                //$name[1] = array('link' => $value['value']);
//            }
//            if ($value['attribute_id'] == 1) {
//                $name = $value['value'];
//                $parent_id = $value['parent_id'];
//                $id = $value['entity_id'];
//            }
//        }
//        $this->app_data['menu'] = $menu;
    }

}
