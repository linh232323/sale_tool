<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Controller.php";

class MY_Controller extends MX_Controller {
    
    public $app_data = array();
    public $app_controller = null;
    public $app_action     = null;
    public $app_base_url   = '';
    public $app_admin_url  = '';
    public $app_module     = '';
    function __construct() {

        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','my_string','my_datetime','url'));        
        $this->load->library(array('my_layout','session'));

        

        $this->my_layout->setDefaultJs(array('jquery-1.8.2.min', 'jquery.livequery.min', 'qho.src','dataTable.boostrap','bootstrap-datepicker','app')); // asset/public/css
        $this->my_layout->setDefaultCss(array('style','dataTable.boostrap','datepicker')); // asset/public/css
        $this->my_layout->setPageTitle("SALE Administrator");
        $this->my_layout->setLayout("layout/backend_default", $this->app_data);

        $this->app_controller             = $this->router->class;
        $this->app_action                 = $this->router->method;
        $this->app_base_url               = base_url();
        $this->app_admin_url              = $this->config->item('admin_url');
        $this->app_module                 = $this->router->fetch_module();
        $this->app_data['app_base_url']   = base_url();
        $this->app_data['app_admin_url']  = $this->app_admin_url;
        $this->app_data['app_controller'] = $this->app_controller;
        $this->app_data['app_action']     = $this->app_action;
        $this->app_data['app_module']     = $this->app_module;
        $this->app_data['app_base_url']   = $this->app_base_url;
    }
    
        
}