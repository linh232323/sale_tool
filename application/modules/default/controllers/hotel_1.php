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
            'description' => 'Description'
        );

        $_services = $this->services->getAllByType(self :: $_SERVICES_TYPE);
        $this->app_data['services'] = array();
        foreach ($_services as $key => $item) {
            
        }
        $total_books = $key;
        $perpage = 5;
        $this->load->library('pagination');
        $config['total_rows'] = $total_books;
        $config['per_page'] = $perpage;
        $config['next_link'] = 'Next »';
        $config['prev_link'] = '« Prev';
        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';
        $config['num_links'] = 5;
        $config['cur_tag_open'] = '';
        $config['cur_tag_close'] = '';
        echo $config['base_url'] = base_url() . 'default/hotel/index';
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();
        $pagination = $this->pagination->create_links();
        $offset = ($this->uri->segment(4) == '') ? 0 : $this->uri->segment(4);
        $this->app_data['bookList'] = $this->services->getLimitByType(self :: $_SERVICES_TYPE, $perpage, $offset);
        $this->app_data['pagination'] = $pagination;
        $this->my_layout->setPageTitle('User Home');
        print_r($pagination);
        $this->my_layout->view('/user/hotel', $this->app_data);
    }

}
