<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container-fluid">
    <h1><?php echo $title; ?></h1>
    <?php if (isset($message)): ?>
        <div class="alert alert-error"><?php echo $message; ?></div>
    <?php endif; ?>

    <?php echo $location_a; ?>

    <?php echo $location_b; ?>

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

    <table class="table">
        <table id="table_2" class="table table-striped table-bordered dataTable no-footer">
            <thead>
                <tr>
                    <?php foreach ($headers as $h): ?>
                        <th><?php echo $h ?></th>                       
                    <?php endforeach; ?>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>            
                    <tr>                
                        <?php foreach ($headers as $key => $value): ?>            
                            <?php
                            if (!isset($row[$key])) {
                                continue;
                            }
                            ?>
                            <td><?php
                                switch ($row[$key]['type']) {
                                    case 'input':
                                        echo $row[$key]['value'];
                                        break;
                                    case 'input-date':
                                        echo $row[$key]['value'];
                                        break;
                                    case 'select':
                                        echo $row[$key]['value'];
                                        break;
                                    default;
                                        echo $row[$key]['value'];
                                        break;
                                };
                                ?></td>
                        <?php endforeach; ?>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" onClick="book($(this))" ><i class="icon-white icon-edit"></i></a>                     
                            </div>
                        </td>
                        <?php ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

</div>
</div>
<script>
    $(document).ready(function () {
        $('table.table').dataTable();
    });

    function saveItem(obj) {
        var tr = $(obj.closest('tr'));

        $.ajax({
            type: "POST",
            url: "/index.php/administrator/servicesitem/save_item", //Relative or absolute path to response.php file
            data: 'id=' + tr.find('.id').html() +
                    '&date_from=' + tr.find('.date_from').val() +
                    '&date_to=' + tr.find('.date_to').val() +
                    "&level=" + tr.find('.level').val() +
                    '&price_percent=' + tr.find('.price_percent').val() +
                    "&price_net=" + tr.find('.price_net').val() +
                    '&extra_net=' + tr.find('.extra_net').val() +
                    '&extra_percent=' + tr.find('.extra_percent').val() +
                    '&discount_max=' + tr.find('.discount_max').val(),
            success: function (data) {
                alert(data);
            }
        });


    }
</script>