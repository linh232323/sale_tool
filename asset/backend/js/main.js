$(document).ready(function(){

	$(".image-selector").click(function () {
        var finder = new CKFinder();

        var image = $(this);
        finder.selectActionFunction = function (fileUrl) {
            image.val(fileUrl);
        };
        finder.popup();
    });

    $(".slideshow_item").click(function () {
        var finder = new CKFinder();

        var image = $(this);
        finder.selectActionFunction = function (fileUrl) {
            image.attr("src",fileUrl);

            image.parent().find('slideshow_save').removeAttr('disabled');
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
    		"administrator/slideshow/update",
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

    	if(save_btn.attr('disabled') == 'disabled'){
    		return;
    	}

    	var parent = $(this).parent();

    	var slideshow_id = delete_btn.closest('.slideshow-item').find('.slideshow-id').val();

    	$.post(
    		"administrator/slideshow/delete",
		    {
		        slideshow_id: slideshow_id
		    },
		    function(data, status){
		    	delete_btn.closest('.slideshow-group').remove(parent);
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
    		"administrator/slideshow/add",
		    {
		        service_id: service_id
		    },
		    function(data, status){
		    	var html ='' ;
		    	parent.closest('.slideshow-group').append(html);
		    }
		);

    });
	
})