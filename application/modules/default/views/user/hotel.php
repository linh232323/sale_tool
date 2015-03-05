<table id="table_2" class="table table-striped table-hover table-condensed dataTable no-footer">
    <thead>
        <tr>

            <th> </th>        <th>Hotel</th>                     


        </tr>
    </thead>
    <tbody>
        <?php foreach ($services as $service): ?>            
            <tr>                
                <td class="img-polaroid">
                    ImgImgImgImgImgImgImgImg
                </td>
                <td>
        <legend>
            <?php echo $service['name']; ?>
        </legend>
        <div>
            <?php echo $service['description']; ?>
        </div>
        <div class="btn-group pull-right">
            <a class="btn btn-large btn-primary" href="<?php echo $app_base_url."default/".$controller."/index/".$service['id'];?>"><i class="icon-check icon-white"></i>  Book </a>
        </div>
    </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<script>
    $(document).ready(function () {
        $('table.table').dataTable();
    });
</script>