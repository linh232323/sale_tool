<table id="table_2" class="table table-striped table-hover table-condensed dataTable no-footer">
    <thead>
        <tr>

            

        </tr>
    </thead>
    <tbody>
        <?php foreach ($hotels as $hotel): ?>            
            <tr>                
                <td class="img-polaroid">
                    <img style="max-height:150px;max-width:300px" data-src="holder.js/300x200"  src="<?php echo $hotel->getData('thumbnail_url');?>" alt="<?php echo $hotel->getData('name')?>"/>
                </td>
                <td>
        <legend>
            <?php echo $hotel->getData('name'); ?>
        </legend>
        <div>
            <?php echo $hotel->getData('short_description') ; ?>
        </div>
        <div class="btn-group pull-right">
            <a class="btn btn-large btn-primary" href="<?php echo $app_base_url . "default/hotel/detail/" . $hotel->getData('id'); ?>"><i class="icon-check icon-white"></i>  Book </a>
        </div>

    </td>  
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<div class="pull-right">
    <?php echo $pagination; ?>
</div>