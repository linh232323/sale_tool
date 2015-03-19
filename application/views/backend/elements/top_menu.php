<?php
$a_top_menu = array(
    array(
        'name' => 'Orders',
        'url'  => '/administrator/order/create',
        'submenu' => array(
            array(
                'name' => 'Thêm',
                'url'  => '/administrator/order/create'
            ),
            array(
                'name' => 'Danh sách',
                'url'  => '/administrator/order/listing'
            )
        )
    ),
    array(
        'name' => 'Khách sạn',
        'url'  => '/administrator/hotel/listing',
        'submenu' => array(
            array(
                'name' =>'Thêm',
                'url'  => '/administrator/servicesitem/add_service?id=1'
            ),
            array(
                'name' => 'Danh sách',
                'url'  => 'administrator/hotel/listing'
            )
        )
    ),
    array(
        'name' => 'Nhà hàng',
        'url'  => '/administrator/restaurent/listing',
        'submenu' => array(
            array(
                'name' => 'Thêm',
                'url'  => '/administrator/servicesitem/add_service?id=2'
            ),
            array(
                'name' => 'Danh sách',
                'url'  => '/administrator/restaurent/listing'
            )
        )
    ),
    array(
        'name' => 'Địa điểm tour',
        'url'  => '/administrator/tour/listing',
        'submenu' => array(
            array(
                'name' => 'Thêm',
                'url'  => '/administrator/servicesitem/add_service?id=3'
            ),
            array(
                'name' => 'Danh sách',
                'url'  => '/administrator/tour/listing'
            )
        )
    ),
    array(
        'name' => 'Phuơng tiện',
        'url'  => '/administrator/transportation/listing',
        'submenu' => array(
            array(
                'name' => 'Thêm',
                'url'  => '/administrator/servicesitem/add_service?id=4'
            ),
            array(
                'name' => 'Danh sách',
                'url'  => '/administrator/transportation/listing'
            )
        )
    ),
    array(
        'name' => 'Bảo hiểm',
        'url'  => '/administrator/insurance/listing',
        'submenu' => array(
            array(
                'name' => 'Thêm',
                'url'  => '/administrator/servicesitem/add_service?id=5'
            ),
            array(
                'name' => 'Danh sách',
                'url'  => '/administrator/insurance/listing'
            )
        )
    ),
    array(
        'name' => 'Account',
        'url'  => '/account/listing',
        'submenu' => array(
            array(
                'name' => 'New',
                'url'  => '/administrator/account/create'
            ),
            array(
                'name' => 'List',
                'url'  => '/administrator/account/listing'
            )
        )
    ),
    array(
        'name' => 'Địa điểm',
        'url'  => '/administrator/locations/listing',
        'submenu' => array(
            array(
                'name' => 'Thêm',
                'url'  => '/administrator/locations/create'
            ),
            array(
                'name' => 'Danh sách',
                'url'  => '/administrator/locations/listing'
            )
        )
    ),
    array(
        'name' => 'Thống kê',
        'url'  => 'report'
    )
);
?>
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<a class="brand" href="<?php echo $app_admin_url . '/user'; ?>">SALE</a>
<div class="nav-collapse collapse">                        
    <ul class="nav">
        <li class="active"><a href="#">Home</a></li>
        <?php
        if (!empty($a_top_menu)) {
            foreach ($a_top_menu as $menu) {
                if (isset($menu['submenu']) && !empty($menu['submenu'])) {
                    echo '<li class="dropdown">';
                    echo '<a href="' . $menu['url'] . '" class="dropdown-toggle" data-toggle="dropdown">' . $menu['name'] . ' <b class="caret"></b></a>';
                    echo ' <ul class="dropdown-menu">';
                    foreach ($menu['submenu'] as $submenu) {
                        echo "<li><a href='" . $submenu['url'] . "'>" . $submenu['name'] . "</a></li>";
                    }
                    echo '</ul>';
                    echo '</li>';
                }
                else {
                    echo "<li><a href='" . $menu['url'] . "'>" . $menu['name'] . "</a></li>";
                }
            }
        }
        ?>
       <!--<li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
            </ul>
        </li>-->
    </ul>
</div>
