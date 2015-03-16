<table id="table_2" class="table table-striped table-hover table-condensed dataTable no-footer">
    <thead>
        <tr>

            

        </tr>
    </thead>
    <tbody>
        <?php foreach ($tours as $tour): ?>            
            <tr>                
                <td class="img-polaroid">
                    <img src="<?php echo $tour->getData('thumbnail_url');?>" alt="<?php echo $tour->getData('name')?>"/>
                </td>
                <td>
        <legend>
            <?php echo $tour->getData('name'); ?>
        </legend>
        <div>
            <?php echo $tour->getData('description') ; ?>
        </div>
        <div class="btn-group pull-right">
            <a class="btn btn-large btn-primary" href="<?php echo $app_base_url . "default/tour/detail/" . $tour->getData('id'); ?>"><i class="icon-check icon-white"></i>  Book </a>
        </div>

    </td>  
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<div class="pull-right">
    <?php echo $pagination; ?>
</div>