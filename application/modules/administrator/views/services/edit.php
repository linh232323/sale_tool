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
            <input type="hidden" id="id" name="service-data[id]" class="form-control" value="<?php echo $id ?>" />
                        
            <div class="well">
                <div class="control-group">
                    <label for="customer-count" class="control-label">Tên:</label>
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input type="text" name="service-data[name]" class="form-control" value="<?php echo $title ?>" />
                        </div>

                    </div>
                </div>
                <div class="control-group">
                    <label for="thumbnail_url" class="control-label">Hình đại diện:</label>
                    <div class="controls">
                        <input id="thumbnail_url" type="text" name="service-data[thumbnail_url]" class="form-control image-selector" value="<?php echo $service_data->getData('thumbnail_url') ?>" />
                    </div>
                </div>
                
                <div class="control-group">
                    <label for="location_a" class="control-label">Từ:</label>
                    <div class="controls">
                        <?php echo $location_a; ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="location_b" class="control-label">Đến:</label>
                    <div class="controls">
                        <?php echo $location_b; ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="description" class="control-label">Mô tả:</label>
                    <div class="controls">
                        <textarea id="description" type="text" name="service-data[description]" class="form-control ckeditor"><?php echo $service_data->getData('description') ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label for="appendix" class="control-label">Phụ lục:</label>
                    <div class="controls">
                        <textarea id="appendix" type="text" name="service-data[appendix]" class="form-control ckeditor" ><?php echo $service_data->getData('appendix') ?></textarea>
                    </div>
                </div>
               <div class="control-group">
                    <label for="thumbnail_url" class="control-label">Hình:</label>
                    <div class="controls">
                        <div class="row-fluid slideshow-group">
                            <div class="span2 slideshow-item">
                                <div class="slideshow-img-group">
                                    <img class="slideshow-img" src=""/>
                                </div>
                                <input type="hidden" class="slideshow-id" value=""/>
                                <div class="action-group btn-group">
                                    <button class="span6 btn btn-danger  slideshow-delete">
                                        <i class="icon-white icon-trash"></i>
                                    </button>
                                    <button class="span6 btn btn-success  slideshow-update">
                                        <i class="icon-ok icon-white"></i>
                                    </button>
                                </div>
                                
                            </div>
                            <div class="span1">
                                <button class="btn btn-primary slideshow-add">
                                <i class="icon-plus-sign icon-white"></i>
                                 Add
                            </button>
                            </div>
                        </div>
                       
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
                                        case 'input-readonly':
                                            echo "<input readonly=readonly id=\"{$key}\" name=\"{$key}\" type=\"text\" class=\"span12 {$key}\" value=\"" . $row[$key]['value'] . "\" />";
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
                                    <a class="btn btn-success" onClick="saveItem($(this))" ><i class="icon-white icon-ok"></i></a>
                                    <a class="btn btn-danger" onClick="deleteItem($(this))" ><i class="icon-white icon-trash"></i></a>
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
        //$('table.table').dataTable();
        
         $('.price_net, .price_percent').change(function(){
            var net = parseInt( $.find('.price_net').val());
            var percent = parseInt( $.find('.price_percent').val());
            
            var gross = net * (100 + percent) / 100;
            $(this).closet('tr').find('.price_gross').val(gross);
        });
        
        $('.extra_net, .extra_percent').change(function(){
            var net = parseInt( $.find('.extra_net').val());
            var percent = parseInt( $.find('.extra_percent').val());
            
            var gross = net * (100 + percent) / 100;
            $(this).closet('tr').find('.extra_gross').val(gross);
        });
        
    });
    function deleteItem(obj){
        var tr = $(obj.closest('tr'));
       
        $.ajax({
            type: "POST",
            url: "/index.php/administrator/servicesitem/delete_item", //Relative or absolute path to response.php file
            data:   'id='                       + tr.find('.id').html(),
            success: function (data) {
               location.reload();
            }
        });
    }  
      
    function saveItem(obj) {
        var tr = $(obj.closest('tr'));
        
        $.ajax({
            type: "POST",
            url: "/index.php/administrator/servicesitem/save_item", //Relative or absolute path to response.php file
            data:   'id='                       + tr.find('.id').html() +
                    '&date_from='               + tr.find('.date_from').val() +
                    '&date_to='                 + tr.find('.date_to').val() +
                    "&level_name="              + tr.find('.level_name').val() +
                    '&price_percent='           + tr.find('.price_percent').val() +
                    "&price_net="               + tr.find('.price_net').val() + 
                    '&extra_net='               + tr.find('.extra_net').val() +
                    '&extra_percent='           + tr.find('.extra_percent').val() +
                    '&discount_max='            + tr.find('.discount_max').val(),
            success: function (data) {
               location.reload();
            }
        });
    }


</script>