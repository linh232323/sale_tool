<html>
    <head>
        <meta charset="utf-8">
        <title>Bootstrap, from Twitter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Default JS -->
        <?php
        if (!empty($app_a_default_js)) {
            foreach ($app_a_default_js as $item) {
                ?>
                <script type="text/javascript" src="<?php echo $app_base_url; ?>asset/public/js/<?php echo $item; ?>.js"></script>
                <?php
            }
        }
        ?>

        <!-- Front end JS -->
        <?php
        if (!empty($app_a_frontend_js)) {
            foreach ($app_a_frontend_js as $item) {
                ?>
                <script type="text/javascript" src="<?php echo $app_base_url; ?>asset/frontend/js/<?php echo $item; ?>.js"></script>
                <?php
            }
        }
        ?>   

        <!-- Bootstrap -->        
        <script type="text/javascript" src="<?php echo $app_base_url; ?>bootstrap/js/bootstrap.min.js"></script>                    
        <link href="<?php echo $app_base_url; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" >       
        <link href="<?php echo $app_base_url; ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" > 

        <!-- Default CSS -->
        <?php
        if (!empty($app_a_default_css)) {
            foreach ($app_a_default_css as $item) {
                ?>
                <link href="<?php echo $app_base_url; ?>asset/public/css/<?php echo $item; ?>.css" rel="stylesheet" >
                <?php
            }
        }
        ?>

        <!-- Front end CSS -->    
        <?php
        if (!empty($app_a_frontend_css)) {
            foreach ($app_a_frontend_css as $item) {
                ?>
                <link href="<?php echo $app_base_url; ?>asset/frontend/css/<?php echo $item; ?>.css" rel="stylesheet" >
                <?php
            }
        }
        ?>

    </head>
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Home</a>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                            Logged in as <a href="#" class="navbar-link">Username</a>
                        </p>
                        <ul class="nav">
                        <?php
                           foreach ($menu as $m) {
                            
                               if ($m->getData('parent_id') == 0) {

                                   foreach ($menu as $sm) {
                                       if ($sm->getData('parent_id') == $m->getData('id')) {
                                           $s_menu = "<li class='active'>";
                                       }
                                   }

                                   if (($m->getData('link') == $this->uri->segment(2)) && ($m->getData('link') != "index")) {
                                       echo "<li class='active'>";
                                       echo "<a href =" . $app_base_url . "default/" . $m->getData('link') . ">".$m->getData('name')."</a>";
                                       echo '</li>';
                                   } else {
                                       if (isset($s_menu) && $sm->getData('parent_id') == $m->getData('id')) {
                                           echo '<li class = "dropdown">';
                                           echo '<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">';
                                           echo $m->getData('name');
                                           echo '<b class = "caret"></b></a>';
                                           echo '<ul class = "dropdown-menu">';
                                           foreach ($menu as $s_m) {
                                               if ($s_m->getData('parent_id') == $m->getData('id')) {

                                                   echo "<li>";
                                                   echo "<a href =" . $app_base_url . "default/" . $s_m->getData('link') . ">". $s_m->getData('name') . "</a>";
                                                   echo "</li>";
                                               }
                                           }
                                           echo '</ul>';
                                       } else {
                                           echo "<li>";
                                           echo "<a href =" . $app_base_url . "default/" . $m->getData('link') . ">" . $m->getData('name') . "</a>";
                                           echo '</li>';
                                       }
                                   }
                               }
                           }
                            ?>

                        </ul>

                        <form class="navbar-form pull-right">
                            <input class="span2" type="text" placeholder="Email">
                            <input class="span2" type="password" placeholder="Password">
                            <button type="submit" class="btn">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
                            //<?php
//                            foreach ($menu as $m) {
//                                if ($m['parent_id'] == 0) {
//
//                                    foreach ($menu as $sm) {
//                                        if ($sm['parent_id'] == $m->getData('id')) {
//                                            $s_menu = "<li class='active'>";
//                                        }
//                                    }
//
//                                    if (($m->getData('link') == $this->uri->segment(2)) && ($m->getData('link') != "index")) {
//                                        echo "<li class='active'>";
//                                        echo "<a href =" . $app_base_url . "default/" . $m->getData('link') . ">$m[title]</a>";
//                                        echo '</li>';
//                                    } else {
//                                        if (isset($s_menu) && $sm['parent_id'] == $m->getData('id')) {
//                                            echo '<li class = "nav-header">';
//                                            echo "$m[title]";
//
//                                            echo '<ul>';
//                                            foreach ($menu as $s_m) {
//                                                if ($s_m['parent_id'] == $m->getData('id')) {
//
//                                                    echo "<li>";
//                                                    echo "<a href =" . $app_base_url . "default/" . $s_m->getData('link') . ">$s_m[title]</a>";
//                                                    echo "</li>";
//                                                }
//                                            }
//                                            echo '</ul>';
//                                        } else {
//                                            echo "<li>";
//                                            echo "<a href =" . $app_base_url . "default/" . $m->getData('link') . ">$m[title]</a>";
//                                            echo '</li>';
//                                        }
//                                    }
//                                }
//                            }
//                            ?>
                    </div>
                </div>
                <div class="span10">
                    <div class="row-fluid">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a> <span class="divider">/</span></li>
                            <li><a href="#">Library</a> <span class="divider">/</span></li>
                            <li class="active">Data</li>
                        </ul>
                    </div>
                    <?php echo $app_content_for_layout; ?>
                </div>
            </div>              
        </div>
        <div class="footer">
            <div class="share">
                <span class="share-on" id="share-on">Share on : </span> 
                <span class="share-facebook" id="share-facebook"><a href="#"><img src="../../../asset/public/images/icon/share-facebook.png" width="40"></a></span>
                <span class="share-google" id="share-google"><a href="#"><img src="../../../asset/public/images/icon/share-google.png" width="40"></a></span>
            </div>
            <div class="imgbottom" id="imgbottom"><img src="../../../asset/public/images/icon/bottom.png"></div>
            <div class="copyright" id="copyright">Copyright © </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    var user_view = {
        doAction: function () {
            alert("Submit button!");
        },
        submitForm: function (elm, action) {
            var $this = $(elm);
            $this.parents("form").select("#action").val(action);
            $this.parents("form").submit();
        }
    }
</script>
