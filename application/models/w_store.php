<?php
class w_store{
	public function __constructor(){
		$this->load->library('session');
	}

	public function getCurrentStore(){
		$store_code = $this->session->userdata('store_code');

		if(!$store_code){
			$store_code = $this->getOptions()[0]["code"];
			$this->session->set_userdata('store_code',$store_code);
		}

		return $store_code;
	}
	public function getOptions(){
		
		return array(
			"vi" => array(
				"code" 	=> "vi",
				"id" 	=> 1,
				"title"	=> "Tiếng Việt"
			),
			"en" => array(
				"code"  => "en",
				"id"	=> 2,
				"title"	=> "English"
			)
		);
	}
}
?>