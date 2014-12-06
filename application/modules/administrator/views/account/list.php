<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php if (isset($message)): ?>
    <div class="alert alert-error"><?php echo $message; ?></div>
<?php endif; ?>
<div class="alert alert-info">Account</div>
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
        <?php foreach ($accounts as $account): ?>            
            <tr>                
                <?php foreach ($account as $key => $item): ?>            
                    <?php
                    if (!isset($headers[$key])) {
                        continue;
                    }
                    ?>
                    <td><?php echo $item; ?></td>
                <?php endforeach; ?>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-success"  href="/index.php/administrator/$account/edit?id=<?php echo $account['id']; ?>"><i class="icon-white icon-edit"></i></a>
                        <a class="btn btn-danger"  href="/index.php/administrator/$account/delete?id=<?php echo $account['id']; ?>"><i class="icon-white icon-trash"></i></a>                        
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