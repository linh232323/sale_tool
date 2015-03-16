<!-- Form-->
<div class="row-fluid">
    <img src="http://placehold.it/140x140" class="img-polaroid">
    <br class="clearfix" />
    <legend>User Infomation</legend>
    <dl class="dl-horizontal">
        <dt>UserId:</dt>
        <dd><?php echo $user->UserId;?></dd>
        
        <dt>User Full Name:</dt>
        <dd><?php echo $user->UserFullName;?></dd>
        
        <dt>UserName:</dt>
        <dd><?php echo $user->UserName;?></dd>
        
        <dt>Email:</dt>
        <dd><a href="mailto:<?php echo $user->UserEmail;?>"><?php echo $user->UserEmail;?></a></dd>
        
        <dt>Phone:</dt>
        <dd><?php echo $user->UserPhone;?></dd>
        
        <dt>Address:</dt>
        <dd><?php echo $user->UserAddress;?></dd>
        
        <dt>User No:</dt>
        <dd><?php echo $user->UserNo;?></dd>
        
        <dt>User No Date:</dt>
        <dd><?php echo $user->UserNoDate;?></dd> 
        
        <dt>User No Place:</dt>
        <dd><?php echo $user->UserNoPlace;?></dd>
    </dl>
</div>
<!-- End form -->