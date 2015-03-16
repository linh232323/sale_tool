<?php
class w_service_type{
	public function getOptions(){
		return array(
			"hotel" => array(
				"title" 	=> "Hotel",
				"id" 		=> 1
			),
			"restaurent" => array(
				"title" 	=> "Restaurent",
				"id" 		=> 2
			),
			"tour" => array(
				"title" 	=> "Tour",
				"id" 		=> 3
			),
			"transport" => array(
				"title" 	=> "Transport",
				"id" 		=> 4
			),
			"insurance" => array(
				"title" 	=> "insurance",
				"id" 		=> 5
			)
		);
	}
}
?>