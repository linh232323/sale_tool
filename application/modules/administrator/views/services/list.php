

<h1><?php echo $title; ?></h1>
<?php if (isset($message)): ?>
    <div class="alert alert-error"><?php echo $message; ?></div>
<?php endif; ?>
<div class="alert alert-info">Price</div>
<table id="table_1"  class="table table-striped table-bordered dataTable no-footer">
    <thead>
        <tr>
            <?php foreach ($headers_price as $h): ?>
                <th><?php echo $h ?></th>
            <?php endforeach; ?>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($services_price as $key => $service): ?>

            <tr>
                <?php foreach ($service as $key => $item): ?>
                    <?php if (!isset($headers_price[$key])) continue; ?>
                    <td><?php echo $item; ?></td>
                <?php endforeach; ?>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-success"  href="/index.php/administrator/<?php echo $controller; ?>/edit?id=<?php echo $service['id']; ?>"><i class="icon-white icon-edit"></i></a>
                    </div>
                </td>
                <?php ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>


    </tfoot>
</table>
<br/>
<br/>
<br/>

<div class="alert alert-info">Services</div>
<table id="table_2" class="table table-striped table-bordered dataTable no-footer">
    <thead>
        <tr>
            <?php foreach ($headers as $h): ?>
                <th><?php echo $h ?></th>
            <?php endforeach; ?>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($services as $service): ?>
            <tr>
                <?php foreach ($service as $key => $item): ?>
                    <?php
                    if (!isset($headers[$key])) {
                        continue;
                    }
                    ?>
                    <td><span class="<?php echo $key;?>"><?php echo $item; ?></span></td>
                <?php endforeach; ?>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-success"  href="/administrator/<?php echo $controller; ?>/edit?id=<?php echo $service['id']; ?>"><i class="icon-white icon-edit"></i></a>
                         <a class="btn btn-danger" onClick="deleteService($(this))" ><i class="icon-white icon-trash"></i></a>
                    </div>
                </td>
                <?php ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="10">
                <a href="/adminstrator/servicesitem/add_service?id=<?php echo $services_type_id;?>" type="submit" class="btn btn-primary "><i class="icon-plus-sign icon-white"></i> Add New</a>
            </th>
        </tr>

    </tfoot>
</table>


<script>
    
    $(document).ready(function() {       
        $('table.table').dataTable();
    } );
    
    function deleteService(obj){
        var tr = $(obj.closest('tr'));
       
        $.ajax({
            type: "POST",
            url : "/index.php/administrator/servicesitem/delete_service", 
            data:   'id='                       + tr.find('.id').html(),
            success: function (data) {
             
                location.reload();
            }
        });
    }  
</script>