<table id="table_2" class="table table-striped table-bordered dataTable no-footer">
    <thead>
        <tr>

            <th> </th>        <th>Hotel</th>                     


        </tr>
    </thead>
    <tbody>
        <?php foreach ($services as $service): ?>            
            <tr>                
                <td >
                    ImgImgImgImgImgImgImgImg
                </td>
                <td>
        <legend>
            <?php echo $service['name']; ?>
        </legend>
        <div>
            <?php echo $service['description']; ?>
        </div>
        <div class="btn-group">
            <a class="btn btn-success"  href="<?php echo $app_base_url."default/".$controller."/index/".$service['id'];?>"><i class="icon-white icon-edit"></i></a>
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