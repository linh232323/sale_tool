<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="orders">
    <input type="hidden" class="order-id" value="<?php if (isset($id)) echo $id; ?>"/>
    <div id="tour-info" class="container-fluid well">
        <label class="col-sm-2 control-label">Name: <?php if (isset($name)) echo $name; ?></label>
        <label class="col-sm-2 control-label">Address: <?php if (isset($address)) echo $address; ?></label>
        <label class="col-sm-2 control-label">Identify: <?php if (isset($identify)) echo $identify; ?></label>
        <label class="col-sm-2 control-label">Phone: <?php if (isset($phone)) echo $phone; ?></label>

    </div>

    <div id="tour-info" class="container-fluid well">
        <div class="form-group span4">
            <label for="customer-count" class="col-sm-2 control-label"># of Customer:</label>
            <div class="col-sm-10">
                <input type="number" readonly id="customer-count" class="form-control span12" value="<?php if (isset($number_customer)) echo $number_customer; ?>"/>
            </div>
        </div>
        <div class="form-group span4">
            <label for="from-date" class="col-sm-2 control-label">From Date:</label>
            <div class="col-sm-10">
                <input type="text" readonly id="from-date" class="form-control span12" value="<?php if (isset($from_date)) echo date('Y/m/d',strtotime ($from_date)); ?>"/>
            </div>
        </div>
        <div class="form-group span4">
            <label for="to-date" class="col-sm-2 control-label ">To Date:</label>
            <div class="col-sm-10">
                <input type="text" readonly id="to-date" class="form-control span12" value="<?php if (isset($to_date)) echo date('Y/m/d',strtotime ($to_date)) ?>"/>
            </div>
        </div>

    </div>
    <div class="container-fluid well">
        <div class="order-status">
            Status <a class="btn btn-success" href="#"> Complete</a>
        </div>
        <?php printButton(); ?>
    </div>
    <div id="tour-detail" class="container-fluid">
        <div class="row">
            <?php
            if (isset($dates)) {
                foreach ($dates as $date) {
                    $this->load->view('items/servicedate', $date);
                }
            }
            ?>
        </div>
    </div>
    <div class="container-fluid well">
        <?php printButton(); ?>
    </div>
</div>
<script>
    $(document).ready(function () {

        $('.services-price-number, .services-extra-number, .services-discount').change(function () {
            calculateTotalItem($(this));
        });

        $('.to-cruise').each(function () {
            var $this = $(this);

            $this.typeahead({
                source: function (query, process) {
                    var target = $this;
                    $.ajax({
                        url: '/index.php/administrator/ajax/getLocation',
                        type: 'POST',
                        dataType: 'JSON',
                        data: 'query=' + query,
                        success: function (data) {
                            labels = [];
                            mapped = {};

                            $.each(data, function (i, item) {
                                mapped[item.name] = item;
                                labels.push(item.name);
                            });

                            process(labels);
                        }
                    });
                },
                updater: function (item)
                {
                    var target = $this;
                    target.closest('.cruise-group').find('.to-cruise-id').val(mapped[item].id);
                    return mapped[item].name;

                }
            });
        });

        $('.from-cruise').each(function () {
            var $this = $(this);

            $this.typeahead({
                source: function (query, process) {
                    var target = $this;
                    $.ajax({
                        url: '/index.php/administrator/ajax/getLocation',
                        type: 'POST',
                        dataType: 'JSON',
                        data: 'query=' + query,
                        success: function (data) {
                            labels = [];
                            mapped = {};

                            $.each(data, function (i, item) {
                                mapped[item.name] = item;
                                labels.push(item.name);
                            });

                            process(labels);
                        }
                    });
                },
                updater: function (item)
                {
                    var target = $this;
                    target.closest('.cruise-group').find('.from-cruise-id').val(mapped[item].id);
                    return mapped[item].name;

                }
            });
        });


        $('.services-level').each(function () {
            var $this = $(this);

            $this.typeahead({
                source: function (query, process) {
                    var target = $this;
                    var type = target.closest('.cruise-services-type-items').find('.services-type').val();
                    var service_id = target.closest('.services-items-form').find('.services-id').val();
                    var cruise_id = target.closest('.cruise').find('.cruise-id').val();
                    var cruise_to_id = target.closest('.cruise').find('.cruise-to-id').val();
                    var cruise_from_id = target.closest('.cruise').find('.cruise-from-id').val();
                    var date_from = target.closest('.tour-date').find('.tour-date-name').val();

                    $.ajax({
                        url: '/index.php/administrator/ajax/getServicePrice',
                        type: 'POST',
                        dataType: 'JSON',
                        data: 'query=' + query +
                        '&service_type_id=' + type +
                        '&service_id=' + service_id +
                        '&cruise_id=' + cruise_id +
                        '&cruise_to_id=' + cruise_to_id +
                        '&cruise_from_id=' + cruise_from_id +
                        '&date_from=' + date_from,
                        success: function (data) {
                            labels = [];
                            mapped = {};

                            $.each(data, function (i, item) {
                                mapped[item.name] = item;
                                labels.push(item.name);
                            });

                            process(labels);
                        }
                    });
                },
                updater: function (item) {
                    var data = mapped[item];
                    var target = $this;
                    target.closest('.services-items-form').find('.services-level-id').val(data.level_id);
                    target.closest('.services-items-form').find('.services-price').val(data.price);
                    target.closest('.services-items-form').find('.services-extra').val(data.extra);
                    target.closest('.services-items-form').find('.services-max-discount').val(data.max_discount);
                    calculateTotalItem(target);
                    return data.name;
                }
            });
        });
        $('.services-name').each(function () {
            var $this = $(this);

            $this.typeahead({
                source: function (query, process) {
                    var target = $this;
                    var type = target.closest('.cruise-services-type-items').find('.services-type').val();
                    var from = target.closest('.cruise').find('.cruise-from-id').val();
                    var to = target.closest('.cruise').find('.cruise-to-id').val();
                    $.ajax({
                        url: '/index.php/administrator/ajax/getServiceName',
                        type: 'POST',
                        dataType: 'JSON',
                        data: 'query=' + query +
                                '&type=' + type +
                                '&from_id=' + from +
                                '&to_id=' + to,
                        success: function (data) {
                            labels = [];
                            mapped = {};

                            $.each(data, function (i, item) {
                                mapped[item.name] = item;
                                labels.push(item.name);
                            });

                            process(labels);
                        }
                    });
                },
                updater: function (item) {
                    var data = mapped[item];
                    var target = $this;
                    target.closest('.services-items-form').find('.services-id').val(data.id);

                    target.closest('.services-items-form').find('.services-price').val(0);
                    target.closest('.services-items-form').find('.services-extra').val(0);
                    target.closest('.services-items-form').find('.services-max-discount').val(0);
                    calculateTotalItem(target);
                    return data.name;
                }
            });
        });


    });
    function saveServicesItem(obj) {
        var tbody = $(obj.closest('.services-items-form'));
        var parent = $(obj.closest('.cruise-services-type-items'));
        var tour_date = $(obj.closest('.tour-date'));
        var id = tbody.find('.services-item-id').val();        
        calculateTotalItem(obj);
        calculateTotalItems();
        $.ajax({
            type: "POST",
            url: "/index.php/administrator/ajax/saveServicesItem", //Relative or absolute path to response.php file
            data:
                    'id=' + id +
                    '&service_type_id=' + parent.find('.services-type').val() +
                    '&from_date=' + tour_date.find('.tour-date-name').val() +
                    '&to_date=' + tour_date.find('.tour-date-name').val() +
                    '&service_id=' + tbody.find('.services-id').val() +
                    '&service_level_id=' + tbody.find('.services-level-id').val() +
                    '&price_number=' + tbody.find('.services-price-number').val() +
                    '&extra_number=' + tbody.find('.services-extra-number').val() +
                    '&discount=' + tbody.find('.services-discount').val() +                    
                    '&total=' + tbody.find('.services-total').val() +                    
                    '&is_custom=' + tbody.find('.services-item-is-custom').val() +                    
                    '&description=' + tbody.find('.services-description').val(),
            success: function (data) {
                alert(data);
            }
        });


    }

    function resetPrice(obj) {
        var tbody = $(obj.closest('.services-items-form'));
        tbody.find('.services-price').val(0);
        tbody.find('.services-extra').val(0);

        calculateTotalItem(obj);
        calculateTotalItems();
    }

    function deleteServicesItem(obj) {
        var tbody = obj.closest('.services-items-form');
        var services_id = tbody.find('.services-id');


        tbody.remove();
        calculateTotalItems();
    }

    function addServicesItem(obj) {
        var service_type_id = obj.closest('.cruise-services-type').find('.services-type').val();
        var order_id = obj.closest('.orders').find('.order-id').val();
        var order_date_id = obj.closest('.tour-date').find('.tour-date-id').val();
        var order_cruise_id = obj.closest('.cruise').find('.cruise-id').val();
        var table = obj.closest('.cruise-services-type-items').find('table');

        $.ajax({
            type: "POST",
            url: "/index.php/administrator/ajax/addServicesItem", //Relative or absolute path to response.php file
            data: 'service_type_id=' + service_type_id +
                    '&order_id=' + order_id +
                    '&order_date_id=' + order_date_id +
                    '&order_cruise_id=' + order_cruise_id,
            success: function (data) {
                table.append(data);
            }
        });
    }

    function addCruises(obj) {
        var date_id = obj.closest('.tour-date').find('.tour-date-id').val();
        var cruises_obj = obj.closest('.tour-date').find('.cruise-list');
        var from_name = obj.closest('.add-cruise').find('.from-cruise').val();
        var to_name = obj.closest('.add-cruise').find('.to-cruise').val();
        var from_id = obj.closest('.add-cruise').find('.from-cruise-id').val();
        var to_id = obj.closest('.add-cruise').find('.to-cruise-id').val();
        var order_id = obj.closest('.orders').find('.order-id').val();
        var order_description = obj.closest('.add-cruise').find('.cruise-description').val();
        if (date_id === null || from_name === '' | from_id === '' || to_name === '' || to_id === '')
        {
            alert('You must select cruise');
            return;
        }
        $.ajax({
            type: "POST",
            url: "/index.php/administrator/ajax/addCruises", //Relative or absolute path to response.php file
            data:   'date_id=' + date_id +
                    '&order_id=' + order_id +
                    '&description=' + order_description +
                    "&from_name=" + from_name + '&to_name=' + to_name +
                    "&from_id=" + from_id + '&to_id=' + to_id,
            success: function (data) {
                cruises_obj.append(data);
            }
        });
    }
    function addServiceType(obj) {
        obj.append('<div class="cruise-services-type-items"></div>');
        obj.find('#cruise-services-type-items')
    }

    function selectServiceItems(parent, name, id) {
        name = typeof name !== 'undefined' ? name : '';
        id = typeof id !== 'undefined' ? id : 0;
        var crtContent = parent.val();
        if (crtContent !== "") {
            parent.html("");
        }

        var append = '<input class="services-name" value="' + name + '"/>' +
                '<input type="hidden" class="service-item-id" value="' + id + '" />' +
                '<input id="services-level" />' +
                '<input id="hidden" class="service-level-id" />' +
                '<span id="service-price"></span>' +
                '<input id="services-price-number" />' +
                '<span id="service-extra"></span>' +
                '<input id="services-extra-number" />' +
                '<input id="services-discount" />' +
                '<span id="total"></span>' +
                '<input id="services-description" />' +
                '<a href="#" class="services-delete"></a>' +
                '<a href="#" class="services-save"></a>';
        parrent.append(append);
    }
    function calculateTotalItems() {

    }
    function calculateTotalItem(obj) {
        var tbody = $(obj.closest('.services-items-form'));
        var is_custom = tbody.find('.services-item-is-custom').val();
        if(is_custom  != 1){
            var price = tbody.find('.services-price').val();
            var extra = tbody.find('.services-extra').val();
            var price_number = tbody.find('.services-price-number').val();
            var extra_number = tbody.find('.services-extra-number').val();
            var discount = tbody.find('.services-discount').val();

            var total = (price * price_number + extra * extra_number) * (100 - discount) / 100;

            tbody.find('.services-total').val(total);
        }
        


    }
</script>
<?php

function printButton() {
    ?>

    <div class="btn-toolbar">
        <div class="btn-group">
            <a class="btn btn-danger" href="#"><i class="icon-remove icon-white"></i> Cancel</a>
            <a class="btn btn-primary" href="#"><i class="icon-wrench icon-white"></i> Save</a>
            <a class="btn btn-warning" href="#"><i class="icon-ok icon-white"></i> Submit</a>              
            <a class="btn btn-success" href="#"><i class="icon-ok icon-white"></i> Complete</a>

        </div>
    </div>

    <?php
}
?>