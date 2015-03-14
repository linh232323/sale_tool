<?php 
class w_hotel extends w_service{

	public function setAttributeCodes(){
		$this->_attributes[] ='name';

		$this->_attributes[] ='thumbnail_url';

		$this->_attributes[] ='description';

		$this->_attributes[] ='appendix';

		$this->_attributes[] ='program';
	}

	
}
?>