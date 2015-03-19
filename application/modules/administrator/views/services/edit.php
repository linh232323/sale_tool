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
    <div class="tabbable tabs-left">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab-general" data-toggle="tab">Cơ bản</a>
            </li>
            <li>
                <a href="#tab-slideshow" data-toggle="tab">Slideshow</a>
            </li>
            <li>
                <a href="#tab-price" data-toggle="tab">Giá</a>
            </li>
        </ul>
        <div class="tab-content well">
            <div class="tab-pane active" id="tab-general">
                <form class="navbar-form form-horizontal" action="/index.php/administrator/servicesitem/save_service" method="post">
                    <input type="hidden" id="id" name="service-data[id]" class="form-control" value="<?php echo $id ?>" />
                                
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
                        <label for="short-description" class="control-label">Mô ngắn gọn:</label>
                        <div class="controls">
                            <input id="short-description" type="text" name="service-data[short_description]" class="form-control" value="<?php $service_data->getData('description') ?>"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="description" class="control-label">Mô tả:</label>
                        <div class="controls">
                            <textarea id="description" type="text" name="service-data[description]" class="form-control ckeditor"><?php echo $service_data->getData('description') ?></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="program" class="control-label">Chuơng trình tour:</label>
                        <div class="controls">
                            <textarea id="program" type="text" name="service-data[program]" class="form-control ckeditor"><?php echo $service_data->getData('program') ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="appendix" class="control-label">Phụ lục:</label>
                        <div class="controls">
                            <textarea id="appendix" type="text" name="service-data[appendix]" class="form-control ckeditor" ><?php echo $service_data->getData('appendix') ?></textarea>
                        </div>
                    </div>
                  
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit"   type="submit" class="btn btn-primary "><i class="icon-plus-sign icon-white"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
             <div class="tab-pane" id="tab-slideshow">
                <div class="control-group">
                    <label for="thumbnail_url" class="control-label">Hình:</label>
                    <div class="controls">
                        <ul class="thumbnails slideshow-group">
                        <?php foreach($slideshows as $slideshow):?>
                          <li class="span2 slideshow-item">
                            <div class="thumbnail">
                              <img class="slideshow-img" 
                                    src="<?php if(!empty($slideshow->image_url)) 
                                                    echo $slideshow->image_url; 
                                                else 
                                                    echo "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADICAYAAABS39xVAAANUklEQVR4Xu3ch68URRwH8MUOoqgI1qjBErFhj93E/1wFrKACioAx9gZi7wXz3WQu+873gMMZcoOfTQh4b+93s5+Z983M7J7rjh8/fmJwECBAoAOBdQKrg17SRAIERgGBZSAQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYF1Do6BX3/9dbyqiy++eFi3bt2aV/jnn38Ov/3223D++ecPl1xyyUklcm7qpuaFF15YRS018yeff6qa+ewTJ06M7ax1TVUuQpGzKiCwzip32w87cODA8NVXXw1///337IM2bdo03HvvvSsC6aeffhr27ds35O9yJDSuvfbaYfv27Ssa+cUXXwxHjhwZg60cF1100bBt27bhxhtvPKML+vjjj4f3339/+OOPP2bvTxDedtttw3XXXTd7LQH1xhtvDN98880YVuW46qqrhh07doxBV45FrumMGu1NSyEgsJaiG/57I/KL/fXXX69a6LzzzhueeuqpIUGTMHv++eeHv/76a9VzE0J33nnn+LNvv/122LNnz4qwmL4pobFly5aFGv/ZZ58N77zzzprvueWWW8bgyvHaa68N33333arnbty4cXjsscfGny1yTQs11slLJyCwlq5LFm9QguX111+fvTHLpoTUzz//PHsts6d77rlnOHz48PDRRx/NXr/88svHmVYJsLzv6aefHpdor7zyyvDDDz+smNlMZzuXXnrp8Pjjj592gzNLevHFF4fff/999p4NGzasaGf5/B9//HEMy3KsX79+XApOr+m+++4btm7dutA1nXZjnbiUAgJrKbtlsUYlgBJEORIATzzxxPjvhFjCLEeC6dFHHx1eeuml2VLwyiuvHB566KEh4ZBwKsuuLAsTBAmXsrzMEjB/pp+VAMks5913350FXsIyQZLj0KFDK2ZIqfvqq6/OPicBmiDNzPDNN9+cvZ42ff7550NmYzkyM3zyySfHEN65c+dseXrNNdeMy93TvaYbbrhhMVhnL52AwFq6Llm8QZ9++ukYWAmQLOnKkmq6TLziiivGfZ9pCCUYElo5pr/0119//XD11VeP+1w5LrjggnFJmb8zE8uSsgTZAw88MLz33nsrZmIJpuydTUMwQZogK68lfJ599tlxHyq1XnjhhXEDPkeC8csvv5wF68033zzcfvvt48/efvvtMcxyZFmYazjda7rrrrsWx/WOpRIQWEvVHf+9MZklffDBB+PMarqnlRDIjOTll1+ezWQefvjhIUGW46233hqOHj06m41l5lNmbQmqLBMTLqk/neUkTLLvNA2NLCcz0yrLyQRpZn15LTcFciSwEor5WT43n1+OBx98cMgNhLJ0nAbWJ598Ms7oSpDm3Ox1ldnhya4pM0xH3wICq+/++1fr55d3OSGh8Nxzz42PJezevXvVX+4syY4dOzbWy+wogZUlXQmGkwVWZj+581fOn29UWU6u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" ?>"
                                    data-src="holder.js/300x200" 
                                    alt="">
                              <input type="hidden" class="slideshow-id" value="<?php echo $slideshow->id;?>"/>
                              <div class="action-group btn-group container-full">
                                    <button class="span6 btn btn-danger  slideshow-delete">
                                        <i class="icon-white icon-trash"></i>
                                    </button>
                                    <button class="span6 btn btn-success  slideshow-save" disabled="">
                                        <i class="icon-ok icon-white"></i>
                                    </button>
                                </div>
                            </div>
                          </li>

                        <?php endforeach;?>
                        </ul>
                         <div class="action-group btn-group ">
                           
                            <button class=" btn btn-success  slideshow-add">
                                <i class="icon-plus-sign icon-white"></i> 
                                Add new slideshow
                            </button>
                        </div>

                    </div>
                </div>
             </div>
             <div class="tab-pane" id="tab-price">
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
    </div>

       

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