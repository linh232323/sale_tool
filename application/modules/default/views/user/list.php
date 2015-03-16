
<table id="table_2" class="table table-striped table-bordered dataTable no-footer">
    <thead>
        <tr>
            <?php foreach ($headers as $h): ?>
                <th><?php echo $h ?></th>                       
            <?php endforeach; ?>

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
                    <td><?php echo $item; ?></td>
                <?php endforeach; ?>

                <?php ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<script>
    $(document).ready(function () {
        $('table.table').dataTable();
    });
</script>