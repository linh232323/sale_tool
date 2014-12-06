<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php if (isset($services_item)): ?>
    <tbody class="services-items-form " id="form-<?php echo $id; ?>">
        <tr>
            <td rowspan="2">
                <h3><?php echo $id; ?></h3>
                <input type="hidden" class="services-item-id" value="<?php if (isset($id)) echo $id; ?>"/>
                <input type="hidden" class="services-item-is-custom" value="<?php if (isset($services_item['is_custom'])) echo $services_item['is_custom']; ?>"/>
            </td>
            
            <td style="<?php if (isset($services_item['is_custom'])&& $services_item['is_custom'] == 1) echo 'display:none;';?>">
                <input class="services-name span12" type="text" value="<?php if (isset($services_item['service_name'])) echo $services_item['service_name']; ?>"/>
                <input type="hidden" class="services-id" value="<?php if (isset($services_item['service_id'])) echo $services_item['service_id']; ?>"/>
            </td>
            <td style="<?php if (isset($services_item['is_custom'])&& $services_item['is_custom'] == 1) echo 'display:none;';?>">
                <input type="text" class="services-level span12" type="text" value="<?php if (isset($services_item['level_name'])) echo $services_item['level_name']; ?>"/>
                <input type="hidden" class="services-level-id" value="<?php if (isset($services_item['level_id'])) echo $services_item['level_id']; ?>" />
            </td>
            <td style="<?php if (isset($services_item['is_custom'])&& $services_item['is_custom'] == 1) echo 'display:none;';?>">
                <input readonly type="text"  class="services-price span12" value="<?php if (isset($services_item['price_gross'])) echo $services_item['price_gross']; ?>"/>
            </td>
            <td style="<?php if (isset($services_item['is_custom'])&& $services_item['is_custom'] == 1) echo 'display:none;';?>">
                <input type="number" class="services-price-number span12" value="<?php if (isset($services_item['price_number'])) echo $services_item['price_number']; ?>" />
            </td>
            <td style="<?php if (isset($services_item['is_custom'])&& $services_item['is_custom'] == 1) echo 'display:none;';?>">
                <input readonly type="text" class="services-extra span12" value="<?php if (isset($services_item['extra_gross'])) echo $services_item['extra_gross']; ?>">
            </td>
            <td style="<?php if (isset($services_item['is_custom'])&& $services_item['is_custom'] == 1) echo 'display:none;';?>">
                <input type="number" class="services-extra-number span12" value="<?php if (isset($services_item['extra_number'])) echo $services_item['extra_number']; ?>"/>
            </td>
            <td style="<?php if (isset($services_item['is_custom'])&& $services_item['is_custom'] == 1) echo 'display:none;';?>">
                <input readonly type="number" class="services-max-discount span12" value="<?php if (isset($services_item['max_discount'])) echo $services_item['max_discount']; ?>"/>
            </td>
            <td style="<?php if (isset($services_item['is_custom'])&& $services_item['is_custom'] == 1) echo 'display:none;';?>">
                <input type="number" class="services-discount span12" value="<?php if (isset($services_item['discount'])) echo $services_item['discount']; ?>"/>
            </td>
            <td <?php if (isset($services_item['is_custom'])&& $services_item['is_custom'] == 1) echo "colspan='10'"?>>
                <input <?php if (isset($services_item['is_custom'])&& !$services_item['is_custom']) echo 'readonly'?> type="number" class="services-total span12" value="<?php if (isset($services_item['total'])) echo $services_item['total']; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="8">
                <input class="services-description span12" value="<?php if (isset($services_item['level_id'])) echo $services_item['description']; ?>">
            </td>
            <td colspan="2">
                <a type="button" onclick="saveServicesItem($(this));" class="btn btn-primary span6 services-items-save" id="save-<?php echo $id; ?>"><i class=" icon-white icon-ok "></i></a>
                <a type="button" onclick="deleteServicesItem($(this));" class="btn btn-danger span6 services-items-del" id="del-<?php echo $id; ?>"><i class=" icon-white icon-trash"></i></a>
            </td>
        </tr>
    </tbody>
<?php endif; ?>