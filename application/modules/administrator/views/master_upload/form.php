<!-- Form-->
<div class="row-fluid">
    <form action="" method="post" class="form-horizontal" >
        <legend>Table Name</legend>
        <div class="control-group">
            <label class="control-label" >User FullName</label>
            <div class="controls">
                <input type="text" id="MasterUploadTableName" placeholder="Table Name" name="MasterUploadTableName" value="<?php echo set_value('MasterUploadTableName',$files->MasterUploadTableName);?>" />
                <input type="hidden" id="UserId" name="UserId" value="<?php echo $user->UserId;?>" />
                <?php echo form_error('MasterUploadTableName'); ?>                                
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Max File</label>
            <div class="controls">
                <input type="text" id="MaxFileUpload" placeholder="Max File Upload" name="MaxFileUpload" value="<?php echo set_value('MaxFileUpload',$file->MaxFileUpload);?>" />                                    
                <?php echo form_error('MaxFileUpload'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Password</label>
            <div class="controls">
                <input type="password" id="UserPasswd" placeholder="Password" name="UserPasswd" value="<?php echo set_value("UserPasswd");?>" />
                <?php echo form_error('UserPasswd'); ?>                
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
                <input type="email" id="UserEmail" placeholder="Email" name="UserEmail" value="<?php echo set_value("UserEmail",$user->UserEmail);?>" />
                <?php echo form_error('UserEmail'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Phone</label>
            <div class="controls">
                <input type="tel" placeholder="Phone" id="UserPhone" name="UserPhone" value="<?php echo set_value("UserPhone",$user->UserPhone);?>" />
                <?php echo form_error('UserPhone'); ?> 
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
                <textarea class="span4" rows="5" placeholder="Address" id="UserAddress" name="UserAddress"><?php echo set_value("UserAddress",$user->UserAddress);?></textarea>
                <?php echo form_error('UserAddress'); ?> 
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