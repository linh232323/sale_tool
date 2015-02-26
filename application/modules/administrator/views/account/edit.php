<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php if (isset($message)): 
foreach($message as $m){
    ?>
    <div class="alert alert-error"><?php echo $m; ?></div>
<?php
}
    
 endif; ?>
<div class="alert alert-info">Thay đổi password</div>
<form class="navbar-form form-horizontal" action="" method="post">
    <div class="span11 offset1">

        <div class="row well">
           
            <div class="control-group">
                <label for="old_password" class="control-label">Mật khẩu hiện tại:</label>
                <div class="controls">
                    <input type="text"  name="old_password" class="form-control"/>
                </div>
            </div>
            <div class="control-group">
                <label for="new_password" class="control-label">Mật khẩu mới:</label>
                <div class="controls">
                    <input type="password"  name="new_password" class="form-control"/>
                </div>
            </div>

        </div>
        <div class="row">
            <button type="submit"   type="submit" class="btn btn-primary "><i class="icon-ok icon-white"></i> Thay đổi</button>
        </div>
    </div>
</form>
