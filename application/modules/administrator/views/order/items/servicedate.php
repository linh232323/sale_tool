<?php ?>

<div class="tour-date container-fluid">
    <input type="hidden" class="tour-date-id" value="<?php if (isset($id)) echo $id; ?>"/>
    <input type="hidden" class="tour-date-name" value="<?php if (isset($date)) echo date('Y/m/d', strtotime($date)); ?>"/>
    <div class="row alert alert-success">
        <i class="icon-calendar"></i> 
        <span>Day #<?php if (isset($number)) echo$number; ?> - <?php if (isset($date)) echo date('Y/m/d', strtotime($date)); ?> </span>
    </div>    
    <div class="well add-cruise row">
        <div class="cruise-group  span12">
            <label for="from-cruise" class="col-sm-3 control-label">From location:</label>
            <div class="col-sm-6">
                <input type="text" class="from-cruise form-control span6" />                
                <input type="hidden" class="from-cruise-id" />
            </div>

            <label for="to-cruise" class="col-sm-2 control-label">To location:</label>
            <div class="col-sm-6">
                <input type="text" class="to-cruise form-control span6" />                
                <input type="hidden" class="to-cruise-id" />
            </div>            
            <label for="cruise-description" class="col-sm-2 control-label">Description:</label>
            <div class="col-sm-6">                
                <textarea  class="cruise-description span6"></textarea>
            </div>  
            <button type="button" class="btn btn-primary button-cruise-add" onclick="addCruises($(this))"><i class="icon-white icon-plus-sign"></i> Add</button>
        </div>
    </div>   
    <div class="cruise-list row well">
        <?php
        if (isset($cruises)) {

            foreach ($cruises as $cruise) {
                $this->load->view('items/servicecruise', $cruise);
            }
        }
        ?>
    </div>

</div>