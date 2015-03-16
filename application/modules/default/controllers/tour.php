<?php

class Tour extends Default_Controller {

    static $_SERVICES_TYPE = 3;

    function __construct() {
        parent::__construct();
        $this->load->model("services");
        $this->load->model("w_tour");
        $this->load->model('w_slideshows');
        $this->load->library('pagination');
    }

    public function search() {
        
       $this->app_data['title'] = 'Tour';

        $perpage = 5;      

        $offset = ($this->uri->segment(4) == '') ? 1 : $this->uri->segment(4);
       
        $tours =  $this
                        ->w_tour
                        ->setPageSize($perpage)
                        ->setOffset(($offset - 1) * $perpage)
                        ->getItems(self :: $_SERVICES_TYPE);

        $this->app_data['tours'] = $tours;

        $config['total_rows'] = $this->w_tour->counts(array(
            "service_type_id" => 1,
            "deleted" => 0
        ));

        $config['per_page']             = $perpage;
        $config['uri_segment']          = 4;
        $config['next_link']            = self :: $localization->getText('Next »','general');
        $config['prev_link']            = self :: $localization->getText('« Prev','general');
        $config['num_links']            = 2;
        $config['use_page_numbers']     = TRUE;
        $config['base_url']             = base_url() . 'default/tour/search/';

        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
       

        $this->app_data['pagination'] = $pagination;
        $this->my_layout->setPageTitle('Hotels');
        $this->my_layout->view('/tour/search', $this->app_data);
    }

    public function index(){
        $this->search();
    }

    public function detail($idr = 1){
        $this->my_layout->addFrontendJs('jssor')
                        ->addFrontendJs('jssor.slider'); 

        $service = $this->services->load($idr);
       
        $this->app_data['id'] = $idr;
        $this->app_data['tour'] = $service;
        $this->app_data['slideshows'] = $this->w_slideshows->getItems($service->getData('id'));
        $this->my_layout->setPageTitle('Hotel');

        $this->my_layout->view('/tour/detail', $this->app_data);
    }

}
