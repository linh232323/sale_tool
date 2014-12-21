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
<form class="navbar-form form-horizontal" action="/index.php/administrator/locations/edit" method="get">
    <div class="span11 offset1">
        <input type="hidden" name="id"  value="<?php echo $id;?>"/>
        <div id="customer-info" class="row well">            
            <div class="control-group">
                <label for="name" class="control-label">Name:</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" name="name" class="form-control" value="<?php echo $name;?>"/>
                    </div>

                </div>
            </div>

        </div>
       
        <div class="row">
            <button type="submit"   type="submit" class="btn btn-primary "><i class="icon-plus-sign icon-white"></i> Save</button>
        </div>
    </div>
</form>