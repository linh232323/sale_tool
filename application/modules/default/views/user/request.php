<!-- Form-->
<div class="row-fluid">
    <form action="" method="post" class="form-horizontal" autocomplete="off" >
        <legend>User Register</legend>
        <div class="control-group">
            <label class="control-label" >Họ tên </label>
            <div class="controls">
                <input type="text" id="FirstName" placeholder="Họ" name="FirstName" value="<?php echo set_value('FirstName'); ?>" />                                    
                <input type="text" id="LastName" placeholder="Tên" name="LastName" value="<?php echo set_value('LastName'); ?>" />                                    
                <?php echo form_error('firstname'); ?>             <?php echo form_error('lastname'); ?>                     
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Email </label>
            <div class="controls">
                <input type="email" id="UserEmail" placeholder="Email@example.com" name="UserEmail" value="<?php echo set_value("UserEmail"); ?>" />
                <?php echo form_error('UserEmail'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Phone </label>
            <div class="controls">
                <input type="tel" placeholder="(xxx) xxx-xxxx" id="UserPhone" name="UserPhone" value="<?php echo set_value("UserPhone"); ?>" maxlength="15"/>
                <?php echo form_error('UserPhone'); ?> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Address </label>
            <div class="controls">
                <textarea class="span4" rows="5" placeholder="Address" id="UserAddress" name="UserAddress"><?php echo set_value("UserAddress"); ?></textarea>
                <?php echo form_error('UserAddress'); ?> 
            </div>
        </div>
        <div class="control-group">
            <label class="seclectbox">&nbsp;</label>
            <div class="controls">
                <select id="selectRequest" name="selectRequest">
                    <option value="">Request</option>
                    <option value="1">Yêu cầu</option>
                    <option value="2">Quảng cáo</option>
                    <option value="3">Liên kết</option>
                    <option value="4">Giá tour</option>
                    <?php echo form_error('selectRequest'); ?>   
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >&nbsp;</label>
            <div class="controls">
                <textarea class="span7" rows="10" placeholder="Content" id="Request" name="Request"><?php echo set_value("Request"); ?></textarea>
                <?php echo form_error('Request'); ?> 
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Sent a Request</button>            
        </div>
    </form>
</div>
<!-- End form -->