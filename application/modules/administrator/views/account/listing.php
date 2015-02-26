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
<table class="table table-striped table-bordered dataTable no-footer">
    <thead>
        <tr>
            <th>#</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user):
            ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                
                <td><?php echo $user['username'];?></td>  
                
                <td><?php echo $user['email']; ?></td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-success"  href="/index.php/administrator/account/edit?id=<?php echo $user['id']; ?>"><i class="icon-white icon-edit"></i></a>
                        <a class="btn btn-danger" href="/index.php/administrator/account/delete?id=<?php echo $user['id']; ?>"><i class="icon-white icon-trash"></i></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>    
</table>
    
    
<script>
    $(document).ready(function () {
        
        $('table').dataTable();
    });
</script>