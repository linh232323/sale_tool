<!-- Form-->
<div class="row-fluid">
    <form action="" method="post" class="form-horizontal" >
        <legend>Username</legend>
        <div class="control-group">
            <label class="control-label" >User FullName</label>
            <div class="controls">
                <input type="text" id="name" placeholder="User Full Name" name="name" value="<?php echo set_value('name',$user->name);?>" />                                    
                <input type="hidden" id="UserId" name="UserId" value="<?php echo $user->UserId;?>" />
                <?php echo form_error('name'); ?>                                
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
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?php echo $app_action=='add' ? 'Save' : 'Update';?></button>
            <a class="btn" href="<?php echo $app_base_url."administrator/user/";?> ">Cancel</a>
        </div>
    </form>
</div>
<!-- End form -->