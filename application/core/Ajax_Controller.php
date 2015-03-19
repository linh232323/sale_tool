<?php
class Ajax_Controller  extends MY_Controller {
	function __construct() {
		parent::__construct();
		
		$this->load->library(array('my_layout', 'session'));

		$this->my_layout->setLayout("layout/json", $this->app_data);
	}
}
?>