<?php
class w_store{
	public function getCurrentStore(){

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