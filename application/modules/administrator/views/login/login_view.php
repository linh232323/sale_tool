<!-- Main Content -->
<div class="content_wrap main_content_bg">
    <div class="content clearfix">
        <div class="col100">
            <h2>User Login</h2>

            <?php if (!empty($message)) { ?>
                <div id="message">
                    <?php echo $message; ?>
                </div>
            <?php } ?>

            <?php echo form_open(current_url(), 'class="parallel"'); ?>  	
            <fieldset class="w50 parallel_target">
                <legend>Registered Users</legend>
                <ul>
                    <li>
                        <label for="identity">Email or Username:</label>
                        <input type="text" id="identity" name="login_identity" value="<?php echo set_value('login_identity', 'admin@genuinetours.com.vn'); ?>" class="tooltip_parent"/>
                        
                    </li>
                    <li>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="login_password" value="<?php echo set_value('login_password', 'password123'); ?>"/>
                    </li>
                
                    <li>
                        <label for="remember_me">Remember Me:</label>
                        <input type="checkbox" id="remember_me" name="remember_me" value="1" <?php echo set_checkbox('remember_me', 1); ?>/>
                    </li>
                    <li>
                        <label for="submit">Login:</label>
                        <input type="submit" name="login_user" id="submit" value="Submit" class="link_button large"/>
                    </li>
                    
                </ul>
            </fieldset>

<?php echo form_close(); ?>
        </div>
    </div>
</div>	