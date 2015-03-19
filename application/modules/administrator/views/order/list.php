<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php if (isset($message)): ?>
    <div class="alert alert-error"><?php echo $message; ?></div>
<?php endif; ?>
<table class="table table-striped table-bordered dataTable no-footer">
    <thead>
        <tr>
            <th>#</th>
            <th>Tên Khách hàng</th>
            <th># Khách hàng</th>
<!--            <th>From Date</th>
            <th>To Date</th>-->
            <th>Tổng hoá đơn</th>
            <th>Nhân viên</th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order):
            ?>
            <tr>
                <td><?php echo $order->id; ?></td>
                <td><?php echo $order->customer_name; ?></td>
                <td><?php echo $order->customer_count;?></td>                
                <td><?php echo $order->total; ?></td>
                <td><?php echo $order->employee_name;?></td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-success"  href="/administrator/order/place?id=<?php echo $order->id; ?>"><i class="icon-white icon-edit"></i></a>
                        <a class="btn btn-danger" href="/administrator/order/delete?id=<?php echo $order->id; ?>"><i class="icon-white icon-trash"></i></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>    
</table>
    
    
<script>
    $(document).ready(function () {
        
        $('table').dataTable();
    });
</script>