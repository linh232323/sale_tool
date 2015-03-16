<?php ?>
<div class="cruise">
    <input type="hidden" class="cruise-id" value="<?php if (isset($id)) echo $id; ?>" />
    <input type="hidden" class="cruise-from-id" value="<?php if (isset($from)) echo $from["id"]; ?>"/>
    <input type="hidden" class="cruise-to-id" value="<?php if (isset($to)) echo $to["id"]; ?>"/>

    <div class="alert alert-info">
        <i class="icon-plane"></i> <strong class="">From: <?php if (isset($from)) echo $from["name"]; ?> - To: <?php if (isset($to)) echo  $to["name"]; ?></strong> 
    </div>
    <div class="cruise-description well">
        <?php  if(isset($description))  echo $description;?>
    </div>
    <div class="cruise-services  well">
        <?php
        
        if (isset($services)) {
            foreach ($services as $service) {
                $this->load->view('order/items/servicetype', $service);
            }
        }
        ?>

    </div>
</div>