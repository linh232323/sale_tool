<?php ?>
<div class="cruise-services-type">
    <div class="span12 alert alert-danger"><i class=" icon-th-list"></i> <strong><?php echo $title; ?></strong></div>
    <div class="cruise-services-type-items">
        <input type="hidden" value="<?php echo $services_type ?>" class="services-type"/>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>                    
                    <th>Name</th>
                    <th>Quanlity</th>
                    <th>Price</th>
                    <th># Price</th>
                    <th>Extra</th>
                    <th># Extra</th>
                    <th>Max discount</th>
                    <th>Discount %</th>
                    <th>Total</th>
                </tr>

            </thead>
            <?php
            
            if (isset($service_items)) {
                foreach ($service_items as $item) {                                               
                    $this->load->view('order/items/serviceitems', $item);
                }
            }
            ?>                       
            <tfooter>
                <a type="button" class="btn-add-services-item btn btn-success" onclick="addServicesItem($(this))"><i class="icon-plus-sign icon-white "></i> Add</a>
            </tfooter>
        </table>
    </div>
</div>

