<?php

class Ajax extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->my_layout = null;
        $this->load->model("location");
        $this->load->model("services_type");
        $this->load->model("services_price");
        $this->load->model("services_level");
        $this->load->model("services");
        $this->load->model("order_cruises");
        $this->load->model("order_items");
    }
    protected function _addServicesItem($order_id,$order_date_id,$order_cruise_id,$service_type_id,$is_custom = 0) {
        $order_item_model = $this->order_items;
        $service_item = array(
            'order_id' => $order_id,
            'order_date_id' => $order_date_id,
            'service_type_id' => $service_type_id,
            'order_cruise_id' => $order_cruise_id,
            'is_custom' => $is_custom
                
        );
        $order_item_model->setData($service_item);
        $order_item_id = $order_item_model->save();

        $item = array(
            'id' => $order_item_id,
            'services_item' => $service_item
        );
        
        return $item;
    }
    function addServicesItem() {
        $order_id = $this->input->post('order_id', TRUE);
        $order_date_id = $this->input->post('order_date_id', TRUE);
        $order_cruise_id = $this->input->post('order_cruise_id', TRUE);
        $service_type_id = $this->input->post('service_type_id', TRUE);

        $item = $this->_addServicesItem($order_id,$order_date_id,$order_cruise_id,$service_type_id);
        
        $this->load->view('order/items/serviceitems', $item);
    }

    function addServiceType() {
        
    }

    function addCruises() {

        $_from_id = $this->input->post('from_id', TRUE);
        $_from_name = $this->input->post('from_name', TRUE);
        $_to_id = $this->input->post('to_id', TRUE);
        $_to_name = $this->input->post('to_name', TRUE);
        $_date_id = $this->input->post('date_id', TRUE);
        $_order_id = $this->input->post('order_id', TRUE);
        $_description = $this->input->post('description', TRUE);
        $all_services_type = $this->services_type->getAllData();
        $_service_type = array();
        

        $order_cruise_model = $this->order_cruises;
        $order_cruise_model->setData(array(
            'id' => null,
            'from_location_id' => $_from_id,
            'to_location_id' => $_to_id,
            'order_date_id' => $_date_id,
            'description' => $_description
                
        ));
        $order_cruise_id = $order_cruise_model->save();
        
        foreach ($all_services_type as $service_type) {                                                
            $_service_items = array();
            $_service_items[] = $this->_addServicesItem($_order_id,$_date_id,$order_cruise_id,$service_type->id,1);
            

            $_service_type[] = array(
                'title' => $service_type->description,
                'services_type' => $service_type->id,
                'service_items' => $_service_items
            );
        }
        
        $cruise = array(
            'id' => $order_cruise_id,
            'description' => $_description,
            'from' => array(
                'id' => $_from_id,
                'name' => $_from_name
            ),
            'to' => array(
                "id" => $_to_id,
                'name' => $_to_name
            ),
            'services' => $_service_type
        );
        $this->load->view('order/items/servicecruise', $cruise);
    }

    function addServiceCruise() {
        
    }

    function getServiceName() {
        $result = array();

        $_service_type = $this->input->post('type', TRUE);
        $_from = $this->input->post('from_id', TRUE);
        $_to = $this->input->post('to_id', TRUE);

        $_services = $this->services->getServicesByLocation($_service_type, $_from, $_to);

        foreach ($_services as $item) {
            $result[] = array(
                'id' => $item->id,
                'name' => $item->name
            );
        }

        echo json_encode($result);
    }

    function getLocation() {
        $result = $this->location->getAllData();
        echo json_encode($result);
    }

    function getServicePrice() {
        $result = array();

        $_service_id = $this->input->post('service_id', TRUE);
        $_service_type = $this->input->post('service_type_id', TRUE);
        $_from = $_to = $this->input->post('date_from', TRUE);

        $_services_prices = $this->services_price->getAllPriceLevel($_service_type, $_service_id, $_from, $_to);

        foreach ($_services_prices as $item) {
            $result[] = array(
                'id' => $item->id,
                'level_id' => $item->level_id,
                'name' => $item->level_name,
                'price' => $item->price,
                'extra' => $item->extra,
                'max_discount' => $item->discount_max
            );
        };

        echo json_encode($result);
    }

    function saveServicesItem() {
        $morder_items = $this->order_items;
        $morder_items->load($this->input->post('id', TRUE));
        
        $key = array(
            'service_id',
            'service_level_id',
            'price_number',
            'extra_number',
            'discount',
            'description',
            'total',
            'check_in_date',
            'check_out_date');

        foreach ($key as $k) {
            if (isset($_POST[$k])) {
                $morder_items->setValue($k, $this->input->post($k, TRUE));
            }
        }

        if($_POST['is_custom'] == 1){
            $morder_items->setValue('total', $_POST['total']);
        }
        else{
            $_service_type = $this->input->post('service_type_id', TRUE);
            $_service_id = $this->input->post('service_id', TRUE);
            $_service_level_id = $this->input->post('service_level_id', TRUE);
            $_discount = $this->input->post('discount', TRUE);
            $_from = $this->input->post('from_date', TRUE);
            $_to = $this->input->post('to_date', TRUE);

            $services_price = $this->services_price->getPrice($_service_type, $_service_id, $_service_level_id, $_from, $_to);

            $morder_items->setValue('discount', min(max(0, $_discount), $services_price->discount_max));
            $morder_items->setValue('price_gross', $services_price->price_net * (100 + $services_price->price_percent)/ 100);
            $morder_items->setValue('extra_gross', $services_price->extra_net * (100 + $services_price->extra_percent) / 100);

            $total = ($services_price->price_net * (100 + $services_price->price_percent) * $morder_items->getData()['price_number'] +
                    $services_price->extra_net * (100 + $services_price->extra_percent) * $morder_items->getData()['extra_number']) * (100 - $_discount) / 100 / 100;
            $morder_items->setValue('total', $total);
        }
        if ($morder_items->save())
            echo "Saved successfully" ;
        else
            echo "Savde fail";
    }

}
