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
            <label class="control-label" >Username </label>
            <div class="controls">
                <input type="text" id="UserName" placeholder="Tên hiển thị trên website" name="UserName" value="<?php echo set_value('UserName'); ?>" />                                    
                <?php echo form_error('UserName'); ?>
                <br class="clearfix"/>
                <em class="muted">Thông tin đăng nhập của user</em>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Mật khẩu </label>
            <div class="controls">
                <input type="password" id="UserPasswd" placeholder="Mật khẩu" name="UserPasswd" value="<?php echo set_value("UserPasswd"); ?>" />
                <?php echo form_error('UserPasswd'); ?>                
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Xác nhận mật khẩu </label>
            <div class="controls">
                <input type="password" id="UserPasswd2" placeholder="Nhập lại mật khẩu" name="UserPasswd2" value="<?php echo set_value("UserPasswd2"); ?>" />
                <?php echo form_error('UserPasswd2'); ?>                
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
            <label class="control-label">ID Card </label>
            <div class="controls">
                <input type="text" id="IdentifyNumber" placeholder="ID Card" name="IdentifyNumber" value="<?php echo set_value("IdentifyNumber"); ?>" />
                <?php echo form_error('IdentifyNumber'); ?>
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
        <!---
        <div class="control-group">
            <label class="control-label" >User No</label>
            <div class="controls">
                <input type="text" placeholder="User No" id="UserNo" class="span3" name="UserNo" value="<?php echo set_value("UserNo"); ?>"           />
                <input type="text" placeholder="User No Date (2012-11-10)" id="UserNoDate" class="span3" name="UserNoDate" value="<?php echo set_value("UserNoDate"); ?>"   />
                <input type="text" placeholder="User No Place" id="UserNoPlace" class="span3" name="UserNoPlace"  value="<?php echo set_value("UserNoPlace"); ?>" />                
                <div class="clearfix"></div>           
            </div>
        <?php if (form_error('UserNo') || form_error('UserNoDate') || form_error('UserNoPlace')): ?>
                    <div class="controls">
                        <span class="span3"><?php echo form_error('UserNo'); ?> </span>
                        <span class="span3"><?php echo form_error('UserNoDate'); ?></span>
                        <span class="span3"><?php echo form_error('UserNoPlace'); ?></span>  
                    </div>
        <?php endif ?>
        </div>--->
        <div class="control-group">
            <label class="control-label">Mã bảo vệ</label>
            <div class="controls">
                <?php echo $captchaImage; ?>
                <br />
                <em class="muted">Phân biệt chữ hoa và chữ thường</em>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">&nbsp;</label>
            <div class="controls">
                <input type="text" id="captchaText" placeholder="Nhập mã bảo vệ" name="CaptchaText" value="" />
                <?php echo form_error('CaptchaText'); ?>                
            </div>
        </div>
        <div class="control-group">

            <div class="controls">
                <label class="checkbox"> 
                    <input type="checkbox" id="PolicyAgree" name="PolicyAgree" value="agree" >
                    Tôi đồng ý với các <a href="#">điều khoản</a> của website.
                </label>

                <?php echo form_error('PolicyAgree'); ?>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Đăng ký</button>            
        </div>
    </form>
</div>
<!-- End form -->