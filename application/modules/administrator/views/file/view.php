<!-- Form-->
<div class="row-fluid">
    <img src="http://placehold.it/140x140" class="img-polaroid">
    <br class="clearfix" />
    <legend>User Infomation</legend>
    <dl class="dl-horizontal">
        <dt>id:</dt>
        <dd><?php echo $user->id;?></dd>
        
        <dt>User Full Name:</dt>
        <dd><?php echo $user->name;?></dd>
        
        <dt>username:</dt>
        <dd><?php echo $user->username;?></dd>
        
        <dt>Email:</dt>
        <dd><a href="mailto:<?php echo $user->email;?>"><?php echo $user->email;?></a></dd>
               
    </dl>
</div>
<!-- End form -->