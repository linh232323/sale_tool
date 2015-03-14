<?php

class Default_Controller extends MY_Controller {
	protected static $localization;

	protected static $menu;

    public function __construct() {
        parent::__construct();
        $this->load->model("w_localize");
        $this->load->model("w_menu_item");

        $this->my_layout->setPageTitle("SALE TOOL User Manager");
        $this->load->library(array("email", "session", "my_auth", 'pagination'));
        $this->load->helper(array('my_pagination'));

        self :: $localization = $this->w_localize;

        $this->app_data['localization'] = self :: $localization;

        $this->my_layout->setLayout("layout/frontend", $this->app_data);

        self :: $menu  = $this->w_menu_item->getItems(1);
        
        $this->app_data['menu'] = self :: $menu ;
    }

}
