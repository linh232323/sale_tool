<?php ?>
<div class="cruise-services-type">
    <div class="span12 alert alert-danger"><i class=" icon-th-list"></i> <strong><?php echo $title; ?></strong></div>
    <div class="cruise-services-type-items">
        <input type="hidden" value="<?php echo $services_type ?>" class="services-type"/>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>                    
                    <th>Tên D.Vụ</th>
                    <th>Chất luợng</th>
                    <th>Đơn giá</th>
                    <th>Số nguời</th>
                    <th>Đ.giá Phụ thu</th>
                    <th>Số Phụ thu</th>
                    <th>Giảm tối đa</th>
                    <th>Giảm giá %</th>
                    <th>Tổng</th>
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

