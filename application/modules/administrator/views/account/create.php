<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
if (isset($message)):
    foreach ($message as $m) {
        ?>
        <div class="alert alert-error"><?php echo $m; ?></div>
        <?php
    }

endif;
?>
        
        <?php
if (isset($messageSuccess)):
    foreach ($messageSuccess as $m) {
        ?>
        <div class="alert alert-success"><?php echo $m; ?></div>
        <?php
    }

endif;
?>
<div class="alert alert-info">Tạo mới Account</div>

<form class="navbar-form form-horizontal" action="" method="post">
    <div class="span11 offset1">

        <div class="row well">
            <div class="control-group">
                <label for="email" class="control-label">Email:</label>
                <div class="controls">
                    <input type="text"  name="email" class="form-control"/>
                </div>
            </div>
            <div class="control-group">
                <label for="username" class="control-label">Username:</label>
                <div class="controls">
                    <input type="text"  name="username" class="form-control"/>
                </div>
            </div>
            <div class="control-group">
                <label for="password" class="control-label">Password:</label>
                <div class="controls">
                    <input type="password"  name="password" class="form-control"/>
                </div>
            </div>

        </div>
        <div class="row">
            <button type="submit"   type="submit" class="btn btn-primary "><i class="icon-plus-sign icon-white"></i> Thêm mới</button>
        </div>
    </div>
</form>

