$(document).ready(function(){

	$(".image-selector").click(function () {
        var finder = new CKFinder();

        var image = $(this);
        finder.selectActionFunction = function (fileUrl) {
            image.val(fileUrl);
        };
        finder.popup();
    });

    $(".slideshow-img").click(function () {
        var finder = new CKFinder();

        var image = $(this);
        finder.selectActionFunction = function (fileUrl) {
            image.attr("src",fileUrl);

            image.parent().find('.slideshow-save').removeAttr('disabled');
        };
        finder.popup();
    });

    $(".slideshow-save").click(function () {
    	var save_btn = $(this);

    	if(save_btn.attr('disabled') == 'disabled'){
    		return;
    	}

    	var parent = $(this).parent();

    	
    	var slideshow_id = save_btn.closest('.slideshow-item').find('.slideshow-id').val();

    	var image_url = save_btn.closest('.slideshow-item').find('.slideshow-img').attr('src');

    	
    	$.post(
    		"/administrator/slideshow/update",
		    {
		        slideshow_id: slideshow_id,
		        image_url: image_url
		    },
		    function(data, status){
		      	save_btn.attr('disabled','disabled');
		    }
		);

    });

    $(".slideshow-delete").click(function () {
    	var delete_btn = $(this);

    	if(delete_btn.attr('disabled') == 'disabled'){
    		return;
    	}

    	var parent = delete_btn.closest(".slideshow-item");

    	var slideshow_id = delete_btn.closest('.slideshow-item').find('.slideshow-id').val();

    	$.post(
    		"/administrator/slideshow/delete",
		    {
		        slideshow_id: slideshow_id
		    },
		    function(data, status){
		    	parent.remove();
		    }
		);

    });

    $(".slideshow-add").click(function () {
    	var save_btn = $(this);

    	if(save_btn.attr('disabled') == 'disabled'){
    		return;
    	}

    	var service_id = $("#id").val();

    	
    	$.post(
    		"/administrator/slideshow/add",
		    {
		        service_id: service_id
		    },
		    function(data, status){
                var json = $.parseJSON(data);
		    	var html ='' ;

                html += '<li class="span2 slideshow-item"> ';
                html += '           <div class="thumbnail">';
                html += '              <img class="slideshow-img" ';
                html += '                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADICAYAAABS39xVAAANUklEQVR4Xu3ch68URRwH8MUOoqgI1qjBErFhj93E/1wFrKACioAx9gZi7wXz3WQu+873gMMZcoOfTQh4b+93s5+Z983M7J7rjh8/fmJwECBAoAOBdQKrg17SRAIERgGBZSAQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYFlDBAg0I2AwOqmqzSUAAGBZQwQINCNgMDqpqs0lAABgWUMECDQjYDA6qarNJQAAYF1Do6BX3/9dbyqiy++eFi3bt2aV/jnn38Ov/3223D++ecPl1xyyUklcm7qpuaFF15YRS018yeff6qa+ewTJ06M7ax1TVUuQpGzKiCwzip32w87cODA8NVXXw1///337IM2bdo03HvvvSsC6aeffhr27ds35O9yJDSuvfbaYfv27Ssa+cUXXwxHjhwZg60cF1100bBt27bhxhtvPKML+vjjj4f3339/+OOPP2bvTxDedtttw3XXXTd7LQH1xhtvDN98880YVuW46qqrhh07doxBV45FrumMGu1NSyEgsJaiG/57I/KL/fXXX69a6LzzzhueeuqpIUGTMHv++eeHv/76a9VzE0J33nnn+LNvv/122LNnz4qwmL4pobFly5aFGv/ZZ58N77zzzprvueWWW8bgyvHaa68N33333arnbty4cXjsscfGny1yTQs11slLJyCwlq5LFm9QguX111+fvTHLpoTUzz//PHsts6d77rlnOHz48PDRRx/NXr/88svHmVYJsLzv6aefHpdor7zyyvDDDz+smNlMZzuXXnrp8Pjjj592gzNLevHFF4fff/999p4NGzasaGf5/B9//HEMy3KsX79+XApOr+m+++4btm7dutA1nXZjnbiUAgJrKbtlsUYlgBJEORIATzzxxPjvhFjCLEeC6dFHHx1eeuml2VLwyiuvHB566KEh4ZBwKsuuLAsTBAmXsrzMEjB/pp+VAMks5913350FXsIyQZLj0KFDK2ZIqfvqq6/OPicBmiDNzPDNN9+cvZ42ff7550NmYzkyM3zyySfHEN65c+dseXrNNdeMy93TvaYbbrhhMVhnL52AwFq6Llm8QZ9++ukYWAmQLOnKkmq6TLziiivGfZ9pCCUYElo5pr/0119//XD11VeP+1w5LrjggnFJmb8zE8uSsgTZAw88MLz33nsrZmIJpuydTUMwQZogK68lfJ599tlxHyq1XnjhhXEDPkeC8csvv5wF68033zzcfvvt48/efvvtMcxyZFmYazjda7rrrrsWx/WOpRIQWEvVHf+9MZklffDBB+PMarqnlRDIjOTll1+ezWQefvjhIUGW46233hqOHj06m41l5lNmbQmqLBMTLqk/neUkTLLvNA2NLCcz0yrLyQRpZn15LTcFciSwEor5WT43n1+OBx98cMgNhLJ0nAbWJ598Ms7oSpDm3Ox1ldnhya4pM0xH3wICq+/++1fr55d3OSGh8Nxzz42PJezevXvVX+4syY4dOzbWy+wogZUlXQmGkwVWZj+581fOn29UWU6u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"'; 
                html += '                    data-src="holder.js/300x200" ';
                html += '                    alt="">';
                html += '              <input type="hidden" class="slideshow-id" value="'+ json.id +'"/>';
                html += '              <div class="action-group btn-group container-full">';
                html += '                    <button class="span6 btn btn-danger  slideshow-delete">';
                html += '                        <i class="icon-white icon-trash"></i>';
                html += '                    </button>';
                html += '                    <button class="span6 btn btn-success  slideshow-save">';
                html += '                        <i class="icon-ok icon-white"></i>';
                html += '                    </button>';
                html += '                </div>';
                html += '            </div>';
                html += '          </li>';

		    	save_btn.closest('#tab-slideshow').find('.slideshow-group').append(html);
		    }
		);

    });
	
})