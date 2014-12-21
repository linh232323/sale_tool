<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container-fluid">
    <h1><?php echo $title; ?></h1>
    <?php if (isset($message)): ?>
        <div class="alert alert-error"><?php echo $message; ?></div>
    <?php endif; ?>
    <div>
        <form class="navbar-form form-horizontal" action="/index.php/administrator/servicesitem/save_service" method="post">
            <input type="hidden" name="id" class="form-control" value="<?php echo $id ?>" />
                        
            <div class="well">
                <div class="control-group">
                    <label for="customer-count" class="control-label">Name:</label>
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input type="text" name="service-name" class="form-control" value="<?php echo $title ?>" />
                        </div>

                    </div>
                </div>
                <div class="control-group">
                    <label for="location_a" class="control-label">Location From:</label>
                    <div class="controls">
                        <?php echo $location_a; ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="location_b" class="control-label">Location To:</label>
                    <div class="controls">
                        <?php echo $location_b; ?>
                    </div>
                </div>

            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit"   type="submit" class="btn btn-primary "><i class="icon-plus-sign icon-white"></i> Save</button>
                </div>
            </div>
        </form>

    </div>

    <div class="well">
        <table class="table">
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
                    <?php foreach ($data as $row): ?>            
                        <tr>                
                            <?php foreach ($headers as $key => $value): ?>            
                                <?php
                                if (!isset($row[$key])) {
                                    continue;
                                }
                                ?>
                                <td><?php
                                    switch ($row[$key]['type']) {
                                        case 'input':
                                            echo "<input id=\"{$key}\" name=\"{$key}\" type=\"text\" class=\"span12 {$key}\" value=\"" . $row[$key]['value'] . "\" />";
                                            break;
                                        case 'input-date':
                                            echo "<input id=\"{$key}\"  name=\"{$key}\" type=\"text\" class=\"datepicker span12 {$key}\" value=\"" . $row[$key]['value'] . "\" />";
                                            break;
                                        case 'select':
                                            echo $row[$key]['value'];
                                            break;
                                        default;
                                            echo "<span  id=\"{$key}\" name=\"{$key}\" type=\"text\" class=\"span12 {$key}\"  >{$row[$key]['value'] }</span>";
                                            break;
                                    };
                                    ?></td>
                            <?php endforeach; ?>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-success" onClick="saveItem($(this))" ><i class="icon-white icon-edit"></i></a>
                                    <a class="btn btn-danger"  ><i class="icon-white icon-trash"></i></a>                        
                                </div>
                            </td>
                            <?php ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="10">
                            <a href="/administrator/servicesitem/add_item?id=<?php echo $id;?>" type="submit" class="btn btn-primary "><i class="icon-plus-sign icon-white"></i> Add New</a>
                        </th>
                    </tr>

                </tfoot>
            </table>

    </div>
</div>
<script>
    $(document).ready(function () {
        $('table.table').dataTable();
    });
      
    function saveItem(obj) {
        var tr = $(obj.closest('tr'));
        
        $.ajax({
            type: "POST",
            url: "/index.php/administrator/servicesitem/save_item", //Relative or absolute path to response.php file
            data:   'id='                       + tr.find('.id').html() +
                    '&date_from='               + tr.find('.date_from').val() +
                    '&date_to='                 + tr.find('.date_to').val() +
                    "&level="                   + tr.find('.level').val() + 
                    '&price_percent='           + tr.find('.price_percent').val() +
                    "&price_net="               + tr.find('.price_net').val() + 
                    '&extra_net='               + tr.find('.extra_net').val() +
                    '&extra_percent='           + tr.find('.extra_percent').val() +
                    '&discount_max='            + tr.find('.discount_max').val(),
            success: function (data) {
                alert(data);
            }
        });
       

    }
</script>