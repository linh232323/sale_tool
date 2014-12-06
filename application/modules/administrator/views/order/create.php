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
<form class="navbar-form form-horizontal" action="/index.php/administrator/order/create" method="post">
    <div class="span11 offset1">
        <div id="customer-info" class="row well">            
            <div class="control-group">
                <label for="customer-count" class="control-label">Name:</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" name="customer-name" class="form-control "/>
                    </div>

                </div>
            </div>

            <div class="control-group">
                <label for="customer-name" class="control-label">Phone:</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-tasks"></i></span>
                        <input type="text" name="customer-phone" class="form-control"/>    
                    </div>
                    
                </div>
            </div>
            <div class="control-group">
                <label for="customer-address" class="control-label">Address:</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-tasks"></i></span>
                        <input type="text" name="customer-address" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label for="customer-email" class="control-label">Email:</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input type="text" name="customer-email" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class=control-group">
                <label for="customer-identify" class="control-label">Identify:</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-tasks"></i></span>
                        <input type="text" name="customer-identify" class="form-control"/>
                    </div>
                </div>
            </div>
            
        </div>
        <div id="tour-info" class="row well">
            <div class="control-group">
                <label for="customer-count" class="control-label"># of Customer:</label>
                <div class="controls">
                    <input type="number" name="customer-count" class="form-control span6"/>
                </div>
            </div>
            <div class="control-group">
                <label for="from-date" class="control-label">From Date:</label>
                <div class="controls">
                    <input type="date"  name="from-date" class="form-control span6"/>
                </div>
            </div>
            <div class="control-group">
                <label for="to-date" class="control-label">To Date:</label>
                <div class="controls">
                    <input type="date"  name="to-date" class="form-control"/>
                </div>
            </div>

        </div>
        <div class="row">
            <button type="submit"   type="submit" class="btn btn-primary "><i class="icon-plus-sign icon-white"></i> Add New Order</button>
        </div>
    </div>
</form>