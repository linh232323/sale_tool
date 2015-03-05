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
        $this->app_data['title'] = 'Hotel';
        $this->app_data['controller'] = 'room';
        $_services = $this->services->getAllByType(self :: $_SERVICES_TYPE);
        $this->app_data['services'] = array();
        foreach ($_services as $key => $item) {
            
        }
        $total_books = $key;
        $perpage = 5;
        $this->load->library('pagination');
        $config['total_rows'] = $total_books;
        $config['per_page'] = $perpage;
        $config['uri_segment'] = 4;
        $config['next_link'] = 'Next »';
        $config['prev_link'] = '« Prev';
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['base_url'] = base_url() . 'default/hotel/index/';
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        $offset = ($this->uri->segment(4) == '') ? 0 : $this->uri->segment(4);
        $this->app_data['bookList'] = $this->services->getLimitByType(self :: $_SERVICES_TYPE, $perpage, $offset);
        $this->app_data['pagination'] = $pagination;
        $this->my_layout->setPageTitle('User Home');
        $this->my_layout->view('/user/hotel', $this->app_data);
    }

}
