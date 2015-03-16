<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1><?php echo $title; ?></h1>
<?php if (isset($message)): ?>
    <div class="alert alert-error"><?php echo $message; ?></div>
<?php endif; ?>

<div class="alert alert-info">Location</div>
<table class="table table-striped table-bordered dataTable no-footer">
    <thead>
        <tr>
            <?php foreach ($headers as $h): ?>
                <th><?php echo $h ?></th>                       
            <?php endforeach; ?>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($locations as $loc): ?>            
            <tr>                
                <?php foreach ($loc as $key => $item): ?>            
                    <?php
                    if (!isset($headers[$key])) {
                        continue;
                    }
                    ?>
                    <td><?php echo $item; ?></td>
                <?php endforeach; ?>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-success"  href="/index.php/administrator/<?php echo $controller; ?>/edit?id=<?php echo $loc['id']; ?>"><i class="icon-white icon-edit"></i></a>
                        <a class="btn btn-danger"  href="/index.php/administrator/<?php echo $controller; ?>/delete?id=<?php echo $loc['id']; ?>"><i class="icon-white icon-trash"></i></a>                        
                    </div>
                </td>
                <?php ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="10">
                <button type="submit" class="btn btn-primary "><i class="icon-plus-sign icon-white"></i> Add New</button>
            </th>
        </tr>

    </tfoot>
</table>


<script>
    $(document).ready(function () {
        $('table').dataTable();
    });
</script>