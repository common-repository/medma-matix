

(function ($) {
	var ajaxurl = $('#ajaxUrl').val();
	if(ajaxurl == ''){
		var ajaxurl = $('#ajax_url').attr('data-value');
	}

	
	$(document).on('click','.onclick_preview_popup',function(){
	    var temp_no = $(this).attr('data-popup');
	    var modal = document.getElementById('myModal-temp');
	    var img_url = $(this).attr('data-img-url');
	    //$('#template_'+temp_no).css('display','block');
	    $('.modal-content-temp').css('background-image','url("'+img_url+'/template'+temp_no+'.png")');
	    modal.style.display = "block";
    });
    
    $(document).on('click','.onclick_preview_strip',function(){
	    var temp_no = $(this).attr('data-temp-no');
	    var modal = document.getElementById('myModal-strip-temp');
	    var img_url = $(this).attr('data-img-url');
	    $('.modal-content-strip-temp').css('background-image','url("'+img_url+'/strip_template'+temp_no+'.png")');
	    modal.style.display = "block";
    });
  
    $(document).on('click','.onclick_select_popup',function(){
	    var temp_no = $(this).attr('data-popup');
	    //alert(ajaxurl);
	    $.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'insert_template',
				'temp_no':temp_no
			},
			success:function(data) {
				var redirect_url = $('#rediect_url').val();
				//alert(redirect_url);
				window.location.href = redirect_url;
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
    });
    
    $(document).on('click','.onclick_select_strip',function(){
	    var temp_no = $(this).attr('data-temp-no');
	    //alert(ajaxurl);
	    $.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'insert_template_s',
				'temp_no':temp_no
			},
			success:function(data) {
				var redirect_url = $('#rediect_url_s').val();
				//alert(redirect_url);
				window.location.href = redirect_url;
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
    });
}(jQuery));


(function ($) {
	var span = document.getElementsByClassName("close-temp")[0];
	var modal = document.getElementById('myModal-temp');
	var modal_p = document.getElementById('custom-modal');
	// When the user clicks on <span> (x), close the modal
	if(span != undefined){
		span.onclick = function() {
			$('.temp-preview').css('display','none');
			if(modal !== null){
				modal.style.display = "none";
			}
			if(modal_p !== null){
				modal_p.style.display = "none";
			}
		}
	}

	// When the user clicks anywhere outside of the modal, close it
	$( window ).onclick = function(event) {
		if (event.target == modal) {
			$('.temp-preview').css('display','none');
			modal.style.display = "none";
		}
	}
	
	var span_s = document.getElementsByClassName("close-temp-strip")[0];
	var modal_s = document.getElementById('myModal-strip-temp');
	// When the user clicks on <span> (x), close the modal
	if(span_s != undefined){
		span_s.onclick = function() {
			$('.temp-preview').css('display','none');
			if(modal_s !== null){
				modal_s.style.display = "none";
			}
		}
	}
}(jQuery));




(function ($) {
	$(document).on('click','.save_edit_cls',function(){
		var link = $(this).attr('data-link');
		var temp_no = $(this).attr('data-temp-no');
		var ajaxurl = $(this).attr('data-ajax');
		$('input[name="template_number"]').val(temp_no);
		$('#customize_temp_'+temp_no).css('display','block');
		//alert(temp_no);
		$.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'insert_template_popup',
				'temp_no':temp_no
			},
			success:function(data) {
				window.location.href = link;
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	});
	
	$(document).on('click','.refesh_cls',function(){
		var temp_no = $(this).attr('data-temp-no');
		var ajaxurl = $(this).attr('data-ajax');
		$('#spin_'+temp_no).css('display','inline-block');
		$.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'refresh_template',
				'temp_no':temp_no
			},
			success:function(data) {
				$('#spin_'+temp_no).css('display','none');
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	});
	
	$(document).on('change', 'input[name="temp1_header_color"]', function() {
	    var color = $(this).val();
	    $('.temp-1-head').css('background-color','#'+color);
	});
	
	$(document).on('change', 'input[name="temp1_strip_color"]', function() {
	    var color = $(this).val();
	    $('.temp-1-strip').css('background-color','#'+color);
	});

	
}(jQuery));


(function ($) {
	$(document).on('click','.strip_save_edit_cls',function(){
		var link = $(this).attr('data-link');
		var temp_no = $(this).attr('data-temp-no');
		var ajaxurl = $(this).attr('data-ajax');
		$('input[name="template_number"]').val(temp_no);
		
		$.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'insert_template_strip',
				'temp_no':temp_no
			},
			success:function(data) {
				window.location.href = link;
				//~ var modal = document.getElementById('custom-modal');
				//~ $('#template_'+temp_no).css('display','block');
				//~ modal.style.display = "block";
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	});
	
	$(document).on('click','.strip_refesh_cls',function(){
		var temp_no = $(this).attr('data-temp-no');
		var ajaxurl = $(this).attr('data-ajax');
		$('#strip_spin_'+temp_no).css('display','inline-block');
		$.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'strip_refresh_template',
				'temp_no':temp_no
			},
			success:function(data) {
				$('#strip_spin_'+temp_no).css('display','none');
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	});
	
	
}(jQuery));





