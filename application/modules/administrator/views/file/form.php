<!-- Form-->
<div class="row-fluid">
    <form action="" method="post" class="form-horizontal" >
        <legend>Username</legend>
        <div class="control-group">            
            <div class="controls">                
                <input type="hidden" id="id" name="id" value="<?php echo $user->id;?>" />
                <?php echo form_error('UserFullName'); ?>                                
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >User Name</label>
            <div class="controls">
                <input type="text" id="username" placeholder="User Name" name="username" value="<?php echo set_value('username',$user->username);?>" />                                    
                <?php echo form_error('username'); ?>
                <br class="clearfix"/>
                <em class="muted">Thông tin đăng nhập của user</em>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Password</label>
            <div class="controls">
                <input type="password" id="password" placeholder="Password" name="password" value="<?php echo set_value("password");?>" />
                <?php echo form_error('password'); ?>                
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
                <input type="email" id="email" placeholder="Email" name="email" value="<?php echo set_value("email",$user->email);?>" />
                <?php echo form_error('email'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Phone</label>
            <div class="controls">
                <input type="tel" placeholder="Phone" id="phone" name="phone" value="<?php echo set_value("phone",$user->phone);?>" />
                <?php echo form_error('phone'); ?> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Gender</label>
            <div class="controls">
                
                <?php echo form_error('UserGender'); ?> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Address</label>
            <div class="controls">
                <textarea class="span4" rows="5" placeholder="Address" id="address" name="address"><?php echo set_value("address",$user->address);?></textarea>
                <?php echo form_error('address'); ?> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >User No</label>
            <div class="controls">
                <input type="text" placeholder="User No" id="UserNo" class="span3" name="UserNo" value="<?php echo set_value("UserNo", $user->UserNo); ?>"           />
                <input type="text" placeholder="User No Date (2012-11-10)" id="UserNoDate" class="span3" name="UserNoDate" value="<?php echo set_value("UserNoDate", $user->UserNoDate); ?>"   />
                <input type="text" placeholder="User No Place" id="UserNoPlace" class="span3" name="UserNoPlace"  value="<?php echo set_value("UserNoPlace", $user->UserNoPlace); ?>" />                
                <div class="clearfix"></div>           
            </div>
            <div class="controls">
                <span class="span3"><?php echo form_error('UserNo'); ?> </span>
                <span class="span3"><?php echo form_error('UserNoDate'); ?></span>
                <span class="span3"><?php echo form_error('UserNoPlace'); ?></span>  
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?php echo $app_action=='add' ? 'Save' : 'Update';?></button>
            <a class="btn" href="<?php echo $app_base_url."administrator/user/";?> ">Cancel</a>
        </div>
    </form>
</div>
<!-- End form -->