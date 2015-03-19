<?php
class slideshow extends Ajax_Controller{
	public function __construct(){
		$this->load->model("w_slideshows");
	}
	function add(){
		$this->app_data['json_data'] = array();

        $w_service_id = $this->input->post('service_id');

        $this->w_slideshows->setData('service_id',$w_service_id);

        $this->w_slideshows->save();

        echo json_encode($this->w_slideshows->getData()); 
    }

    function update(){
    	$this->app_data['json_data'] = array();

        $slideshow_id = $this->input->post('slideshow_id');

        $url = $this->input->post('image_url');

        $this->w_slideshows->load($slideshow_id);

        $this->w_slideshows->setData('image_url',$url);


        $this->w_slideshows->save();

        $this->app_data['json_data']['slideshow'] = $this->w_slideshows->getData(); 
    }
    function delete(){
     	$this->app_data['json_data'] = array();

        $slideshow_id = $this->input->post('slideshow_id');

        $this->w_slideshows->setData('id',$slideshow_id);

        $this->w_slideshows->delete();

        $this->app_data['json_data']['result'] = true; 
    }
}
?>