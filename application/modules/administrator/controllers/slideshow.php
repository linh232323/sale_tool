<?php
class slideshow extends Admin_Controller{
	public function __construct(){
		$this->load->model("w_slideshows");
	}
	function add(){
		$this->my_layout->setLayout("layout/json", $this->app_data);

        $this->app_data['json_data'] = array();

        $this->input->post('w_service_id');

        $this->w_slideshows->setData('service_id','w_service_id');

        $this->w_slideshows->save();

        $this->app_data['json_data']['slideshow'] = $this->w_slideshows->getData(); 
    }

    function update(){
    	$this->my_layout->setLayout("layout/json", $this->app_data);

    	$this->app_data['json_data'] = array();

        $slideshow_id = $this->input->post('w_slideshow_id');

        $url = $this->input->post('url');

        $this->w_slideshows->load($slideshow_id);

        $this->w_slideshows->setData('image_url');


        $this->w_slideshows->save();

        $this->app_data['json_data']['slideshow'] = $this->w_slideshows->getData(); 
    }
    function delete(){
     	$this->my_layout->setLayout("layout/json", $this->app_data);

     	$this->app_data['json_data'] = array();

        $slideshow_id = $this->input->post('w_slideshow_id');

        $this->w_slideshows->setData('id',$slideshow_id);

        $this->w_slideshows->delete();

        $this->app_data['json_data']['result'] = true; 
    }
}
?>