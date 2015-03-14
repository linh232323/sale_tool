<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container-fluid">
    <h1><?php echo $hotel->getData('name'); ?></h1>
    <?php if (isset($message)): ?>
        <div class="alert alert-error"><?php echo $message; ?></div>
    <?php endif; ?>



    <script type="text/javascript">
        var currentImage;
        var currentIndex = -1;
        var interval;
        function showImage(index) {
            if (index < $('#bigPic img').length) {
                var indexImage = $('#bigPic img')[index]
                if (currentImage) {
                    if (currentImage != indexImage) {
                        $(currentImage).css('z-index', 2);
                        clearTimeout(myTimer);
                        $(currentImage).fadeOut(250, function () {
                            myTimer = setTimeout("showNext()", 3000);
                            $(this).css({'display': 'none', 'z-index': 1})
                        });
                    }
                }
                $(indexImage).css({'display': 'block', 'opacity': 1});
                currentImage = indexImage;
                currentIndex = index;
                $('#thumbs li').removeClass('active');
                $($('#thumbs li')[index]).addClass('active');
            }
        }

        function showNext() {
            var len = $('#bigPic img').length;
            var next = currentIndex < (len - 1) ? currentIndex + 1 : 0;
            showImage(next);
        }

        var myTimer;

        $(document).ready(function () {
            myTimer = setTimeout("showNext()", 3000);
            showNext(); //loads first image
            $('#thumbs li').bind('click', function (e) {
                var count = $(this).attr('rel');
                showImage(parseInt(count) - 1);
            });
        });


    </script>	
    <div id="room" class="wrapper">
        <div class="content-news">
            <div id='wrapper'>
                <div id='body'>
                    <div id="bigPic">
                        <img src="../../../../../asset/public/images/imgs/1.jpg" alt="" />
                        <img src="../../../../../asset/public/images/imgs/2.jpg" alt="" />
                        <img src="../../../../../asset/public/images/imgs/3.jpg" alt="" />
                        <img src="../../../../../asset/public/images/imgs/4.jpg" alt="" />
                        <img src="../../../../../asset/public/images/imgs/5.jpg" alt="" />
                        <img src="../../../../../asset/public/images/imgs/6.jpg" alt="" />
                        <img src="../../../../../asset/public/images/imgs/7.jpg" alt="" />
                        <img src="../../../../../asset/public/images/imgs/8.jpg" alt="" />
                    </div>


                    <ul id="thumbs">
                        <li class='active' rel='1'><img src="../../../../../asset/public/images/imgs/1_thumb.jpg" alt="" /></li>
                        <li rel='2'><img src="../../../../../asset/public/images/imgs/3_thumb.jpg" alt="" /></li>
                        <li rel='3'><img src="../../../../../asset/public/images/imgs/4_thumb.jpg" alt="" /></li>
                        <li rel='4'><img src="../../../../../asset/public/images/imgs/5_thumb.jpg" alt="" /></li>
                        <li rel='5'><img src="../../../../../asset/public/images/imgs/6_thumb.jpg" alt="" /></li>
                        <li rel='6'><img src="../../../../../asset/public/images/imgs/7_thumb.jpg" alt="" /></li>
                        <li rel='7'><img src="../../../../../asset/public/images/imgs/8_thumb.jpg" alt="" /></li>
                        <li rel='8'><img src="../../../../../asset/public/images/imgs/9_thumb.jpg" alt="" /></li>
                    </ul>

                </div>
                <div class='clearfix'></div>
            </div>
        </div> 
    </div>

    <div class="description">
         <?php echo $hotel->getData('description');?>
    </div>

    <div class="tabbable"> <!-- Only required for left/right tabs -->
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-program" data-toggle="tab"><?php echo $localization->getText('Program','hotel'); ?></a></li>
        <li><a href="#tab-appendix" data-toggle="tab"><?php echo $localization->getText('Appendix','hotel'); ?></a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab-program">
           <?php echo $hotel->getData('program');?>
        </div>
        <div class="tab-pane" id="tab-appendix">
            <?php echo $hotel->getData('appendix');?>
        </div>
      </div>
    </div>


   


</div>
</div>
<script>
    $(document).ready(function () {
        $('table.table').dataTable();
    });

    
</script>