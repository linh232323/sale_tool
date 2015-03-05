<?php

class Default_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->my_layout->setPageTitle("SALE TOOL User Manager");
        $this->load->library(array("email", "session", "my_auth"));
        $this->load->helper(array('my_pagination'));
        $this->my_layout->setLayout("layout/backend_demo", $this->app_data);
    }

}
