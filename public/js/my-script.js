
var ajaxurl = jQuery('#ajaxUrl').val();
//alert(ajaxurl);

(function ($) {
  $(function () {
	  //alert('color');
	  
	  
    //$('.wp-strip-color').wpColorPicker();
    //~ $('.wp-template-color').wpColorPicker({
			//~ onChange: function (hsb, hex, rgb) {
				//~ alert(hsb);
			//~ }
		//~ });
   $('#jquery-datepicker-from').datepicker();
    $('#jquery-datepicker-to').datepicker();
    
    var option1 = jQuery('#popup_content_option').val();
	
	if(option1 == 'image'){
		jQuery('#wp-popup_image_content-editor-container').css('display','none');
		jQuery('.wp-editor-tabs').css('display','none');
	}
	
	var option2 = jQuery('#popup_content_option').val();
	
	if(option2 == 'custom'){
		jQuery('#custom_editor').css('display','');
	}
	
	if(option2 == 'custom' || option2 == 'image'){
		jQuery('.url-open').css('display','');
	}
	
	var option3 = jQuery('#popup_time').val();
	
	if(option3 == 'custom'){
		jQuery('#custom').css('display','');
	}
  });
}(jQuery));


(function ($) {
  $(document).on('click','#popup_submit',function(){
	var return_val;
	//alert(jQuery('#popup_image_url').val());
	
	var check_woo = $('#check-woocomerce').attr('data-woocommerce');
	if(check_woo == 'false'){
		$('select[name="strip_displayOnPage"]').val('allpage');
	}
	
	var popup_content = $('select[name="popup_content_option"]').val();
	//alert(popup_content);
	//~ if(popup_content == 'custom' || popup_content == 'image'){
		//~ 
		//~ var url = $('input[name="popup_setUrl"]').val();
		//~ var urlregex = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
	//~ 
		//~ if(urlregex.test(url) == false){
			//~ $('input[name="popup_setUrl"]').css('border','1px solid #D93636');
			//~ //$('input[name="popup_setUrl"]').next().css('display','block');
			//~ return_val = 0;
		//~ }
		//~ else{
			//~ $('input[name="popup_setUrl"]').css('border','1px solid #ddd');
			//~ //$('input[name="popup_setUrl"]').next().css('display','none');
		//~ }
		//~ 
	//~ }else 
	if(popup_content == 'video'){
		var popup_video = $('textarea[name="popup_video_content"]').val();
		if(popup_video == ''){
			$('textarea[name="popup_video_content"]').css('border','1px solid #D93636');
			//$('textarea[name="popup_video_content"]').next().css('display','block');
			return_val = 0;
		}
		else{
			$('textarea[name="popup_video_content"]').css('border','1px solid #ddd');
			//$('textarea[name="popup_video_content"]').next().css('display','none');
		}
	}
	//alert(urlregex.test(url));
	
	//~ var popup_width = $('input[name="popup_width"]').val();
	//~ if(popup_width == '' || popup_width == 0){
		//~ $('input[name="popup_width"]').css('border','1px solid #D93636');
		//~ //$('input[name="popup_width"]').next().css('display','block');
		//~ return_val = 0;
	//~ }
	//~ else{
		//~ $('input[name="popup_width"]').css('border','1px solid #ddd');
		//~ //$('input[name="popup_width"]').next().css('display','none');
	//~ }
	//~ 
	//~ var popup_height = $('input[name="popup_height"]').val();
	//~ if(popup_height == '' ||  popup_height == 0){
		//~ $('input[name="popup_height"]').css('border','1px solid #D93636');
		//~ //$('input[name="popup_height"]').next().css('display','block');
		//~ return_val = 0;
	//~ }
	//~ else{
		//~ $('input[name="popup_height"]').css('border','1px solid #ddd');
		//~ //$('input[name="popup_height"]').next().css('display','none');
	//~ }
	//~ 
	//~ var popup_border = $('select[name="border_activeStatus"]').val();
	//~ if(popup_border == 'enable'){
		//~ var popup_border_width = $('input[name="popup_borderWidth"]').val();
		//~ if(popup_border_width == ''){
			//~ $('input[name="popup_borderWidth"]').css('border','1px solid #D93636');
			//~ //$('input[name="popup_borderWidth"]').next().css('display','block');
			//~ return_val = 0;
		//~ }
		//~ else{
			//~ $('input[name="popup_borderWidth"]').css('border','1px solid #ddd');
			//~ //$('input[name="popup_borderWidth"]').next().css('display','none');
		//~ }
	//~ }
	
	var popup_time = $('select[name="popup_time"]').val();
	
	if(popup_time == 'custom'){
		var popup_customTime = $('input[name="popup_customTime"]').val();
		if(popup_customTime == ''){
			$('input[name="popup_customTime"]').css('border','1px solid #D93636');
			//$('input[name="popup_customTime"]').next().css('display','block');
			return_val = 0;
		}
		else{
			$('input[name="popup_customTime"]').css('border','1px solid #ddd');
			//$('input[name="popup_customTime"]').next().css('display','none');
		}
	}
	
	var popup_status = $('select[name="popup_status"]').val();
	if(popup_status == 'secondtime'){
		var times = $('input[name="popup_status_visiting"]').val();
		if(times == ''){
			$('input[name="popup_status_visiting"]').css('border','1px solid #D93636');
			return_val = 0;
		}else{
			if(/^\d+$/.test(times)){
				$('input[name="popup_status_visiting"]').css('border','1px solid #ddd');
				$('input[name="popup_status_visiting"]').next().css('display','none');
			}
			else{
				$('input[name="popup_status_visiting"]').css('border','1px solid #D93636');
				$('input[name="popup_status_visiting"]').next().css('display','block');
				return_val = 0;
			}
			
		}
	}
	else if(popup_status == 'click' || popup_status == 'hover'){
		var element = $('input[name="popup_status_element_name"]').val();
		if(element == ''){
			$('input[name="popup_status_element_name"]').css('border','1px solid #D93636');
			return_val = 0;
		}else{
			$('input[name="popup_status_element_name"]').css('border','1px solid #ddd');
		}
	}
	else if(popup_status == 'inactive'){
		var time = $('input[name="inactive_time"]').val();
		if(time == ''){
			$('input[name="inactive_time"]').css('border','1px solid #D93636');
			return_val = 0;
		}else{
			$('input[name="inactive_time"]').css('border','1px solid #ddd');
		}
	}
	else if(popup_status == 'thirdpage'){
		var page = $('input[name="thirdpage"]').val();
		if(page == ''){
			$('input[name="thirdpage"]').css('border','1px solid #D93636');
			return_val = 0;
		}else{
			$('input[name="thirdpage"]').css('border','1px solid #ddd');
		}
	}
	
	
	if(return_val == 0){
		return false;
	}else{
		return true;
	}
	
 });
}(jQuery));


(function ($) {
  $(document).on('click','#strip_submit',function(){
	var return_val;
	
	var check_woo = $('#check-woocomerce').attr('data-woocommerce');
	if(check_woo == 'false'){
		$('select[name="strip_displayOnPage"]').val('allpage');
	}
	
	var strip_enable = $('select[name="strip_buttonUrlActive"]').val();
	if(strip_enable == 'enable'){
		
		var url = $('input[name="strip_buttonUrl"]').val();
		var urlregex = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
		
		if(urlregex.test(url) == false){
			$('input[name="strip_buttonUrl"]').css('border','1px solid #D93636');
			//$('input[name="strip_buttonUrl"]').next().css('display','block');
			return_val = 0;
		}else{
			$('input[name="strip_buttonUrl"]').css('border','1px solid #ddd');
			//$('input[name="strip_buttonUrl"]').next().css('display','none');
		}
	
	
		var strip_text = $('input[name="strip_buttonTextContent"]').val();
		if(strip_text == ''){
			$('input[name="strip_buttonTextContent"]').css('border','1px solid #D93636');
			//$('input[name="strip_buttonTextContent"]').next().css('display','block');
			return_val = 0;
		}
		else{
			$('input[name="strip_buttonTextContent"]').css('border','1px solid #ddd');
			//$('input[name="strip_buttonTextContent"]').next().css('display','none');
		}
	}
	
	if(return_val == 0){
		return false;
	}else{
		return true;
	}
	
 });
}(jQuery));

(function ($) {
	$(document).on('change','#popup_status',function(){
		var status = $('#popup_status').val();
		if(status == 'click' || status == 'hover'){
			$('#element').css('display','');
			$('#element-name').css('display','');
			$('#status-visiting').css('display','none');
			$('#inactive-time').css('display','none');
			$('#third-time').css('display','none');
		}
		else if(status == 'secondtime'){
			$('#status-visiting').css('display','');
			$('#element').css('display','none');
			$('#element-name').css('display','none');
			$('#inactive-time').css('display','none');
			$('#third-time').css('display','none');
		}
		else if(status == 'inactive'){
			$('#status-visiting').css('display','none');
			$('#element').css('display','none');
			$('#element-name').css('display','none');
			$('#inactive-time').css('display','');
			$('#third-time').css('display','none');
		}
		else if(status == 'thirdpage'){
			$('#status-visiting').css('display','none');
			$('#element').css('display','none');
			$('#element-name').css('display','none');
			$('#inactive-time').css('display','none');
			$('#third-time').css('display','');
		}
		else{
			$('#element').css('display','none');
			$('#element-name').css('display','none');
			$('#status-visiting').css('display','none');
			$('#inactive-time').css('display','none');
			$('#third-time').css('display','none');
		}
	});
}(jQuery));


(function ($) {
	$(document).on('change','#strip_buttonUrlActive',function(){
		var status = $('#strip_buttonUrlActive').val();
		if(status == 'enable'){
			$('.stripButtonStaus').css('display','table-row');
		}else{
			$('.stripButtonStaus').css('display','none');
		}
	});
}(jQuery));


(function ($) {
	$(document).on('change','#strip_status',function(){
		var status = $('#strip_status').val();
		if(status == 'click' || status == 'hover'){
			$('#element').css('display','');
			$('#element-name').css('display','');
			$('#status-visiting').css('display','none');
			
		}
		else if(status == 'secondtime'){
			$('#element').css('display','none');
			$('#element-name').css('display','none');
			$('#status-visiting').css('display','');
		}
		else{
			$('#element').css('display','none');
			$('#element-name').css('display','none');
			$('#status-visiting').css('display','none');
		}
	});
}(jQuery));


(function ($) {
	$(document).on('change','#popup_time',function(){
		var time = $('#popup_time').val();
		if(time == 'custom'){
			$('#custom').css('display','');
		}else{
			$('#custom').css('display','none');
		}
	});
}(jQuery));


(function ($) {
	$(document).on('change','#popup_content_option',function(){
		var option = $('#popup_content_option').val();
		$('#select_edit_row').css('display','');
		if(option == 'custom'){
			$('#custom_editor').css('display','');
			$('#image_editor').css('display','none');
			$('#video_editor').css('display','none');
			$('#temp_popup_ul').css('display','none');
			
			$('.url-open').css('display','');
		}else if(option == 'image'){
			$('#image_editor').show();
			$('#wp-popup_image_content-editor-container').css('display','none');
			$('.wp-editor-tabs').css('display','none');
			$('#custom_editor').css('display','none');
			$('#video_editor').css('display','none');
			$('#temp_popup_ul').css('display','none');
			
			$('.url-open').css('display','');
		}else if(option == 'video'){
			$('#custom_editor').css('display','none');
			$('#image_editor').css('display','none');
			$('#video_editor').show();
			$('#temp_popup_ul').css('display','none');
			
			$('.url-open').css('display','none');
		}else if(option == 'template'){
			$('#custom_editor').css('display','none');
			$('#image_editor').css('display','none');
			$('#video_editor').css('display','none');
			$('#temp_popup_ul').show();
			$('#select_edit_row').css('display','none');
			
			$('.url-open').css('display','none');
		}else{
			$('#custom_editor').css('display','none');
			$('#image_editor').css('display','none');
			$('#video_editor').css('display','none');
			$('#temp_popup_ul').css('display','none');
			
			$('.url-open').css('display','none');
		}
	});
	
	$(document).on('click','#save_option_type',function(){
		var ajaxurl = $(this).attr('data-ajax');
		var link = $(this).attr('data-link');
		var option1_val = $('select[name=popup_content_option]').val();
		var option1 = 'medma_matix_sp_popup_content_option';
		if(option1_val == 'image'){
			var option2 = 'medma_matix_sp_popup_image_url';
			var option2_val = $('textarea[name=popup_image_url]').text();
		}
		else if(option1_val == 'form'){
			var option2 = '';
			var option2_val = '';
		}
		else  if(option1_val == 'video'){
			var option2 = 'medma_matix_sp_popup_video_content';
			var option2_val = $('textarea[name=popup_video_content]').text();
		}
		else if(option1_val == 'custom'){
			var option2 = 'medma_matix_sp_popup_content';
			var option2_val = $("#popup_content_ifr").contents().find("body").html();
		}
		
		
		$.ajax({
			method: "GET",
			url: ajaxurl,
			data: {
				'action':'insert_popup_content',
				'option1':option1,
				'option1_val':option1_val,
				'option2':option2,
				'option2_val':option2_val
			},
			success:function(data) {
				//console.log(data);
				window.location.href = link;
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
			
			
	});
}(jQuery));

(function ($) {
	$(document).on('change','#border_activeStatus',function(){
		var option = $('#border_activeStatus').val();
		if(option == 'enable'){
			$('#border_enable').css('display','table-row');
		}else{
			$('#border_enable').css('display','none');
		}
	});
}(jQuery));

(function ($) {
	$(document).on('change','#strip_message',function(){
		var option = $('#strip_message').val();
		if(option == 'custom'){
			$('#custom_text_strip').css('display','');
			$('#temp_strip_ul').css('display','none');
			$('#strip_save_edit').css('display','');
		}else{
			$('#custom_text_strip').css('display','none');
			$('#temp_strip_ul').css('display','');
			$('#strip_save_edit').css('display','none');
		}
	});
}(jQuery));

(function ($) {
  $(document).on('click','.insert-media',function(){ 
		var data_editor = $(this).attr('data-editor');
		//alert(data_editor);
		if(data_editor == 'popup_image_content'){
			jQuery('#wsp_media_button').click(function() {
			 formfield = jQuery('#wsp_media').attr('name');
			 tb_show('', 'media-upload.php?TB_iframe=true&amp;tab=library');
			 return false;
			});
			
			window.send_to_editor = function(html) {
				
				medma_mtx_insertImageUrl(html);
				jQuery('#popup_image_url').attr('data-url', html);
				
				//var imgurlar = html.match(/<img[^>]+src=\"([^\"]+)\"/);
				//console.log(html);
				//var imgurl = imgurlar[2];
				//html is returning only title of the media
				//jQuery('textarea[name=popup_image_url]').text(html);
				//jQuery('#insert_post').val(1);
				//image
				//~ if( imgurl.length ){
				   //~ jQuery('#wsp_media').val(imgurl);
				//~ }
				//~ //other types of files
				//~ else{
					//~ var fileurl = jQuery(html);
					//~ //alert(fileurl);
				//~ }
			}
		}
  });
  
    function medma_mtx_insertImageUrl(html){
	   
	    var src = window.frameElement.src;
	   // console.log($('#customize-preview iframe').contentWindow.document);
	    //console.log(window.frameElement.src);
	    // alert($('#customize-preview iframe').attr('title'));
	    $.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'insert_image_url',
				'html':html
			},
			success:function(data) {
				console.log(data);
				window.frameElement.src = src;
				//location.reload();
				//$('#customize-preview iframe').attr('src', src);
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	}
}(jQuery));




(function ($) {
	$(document).on('click','#strip_save_option_type',function(){
		var ajaxurl = $(this).attr('data-ajax');
		var link = $(this).attr('data-link');
		var option1_val = $('select[name=strip_message]').val();
		var option1 = 'medma_matix_sp_strip_message';
		
		if(option1_val == 'custom'){
			var option2 = 'medma_matix_sp_strip_details';
			var option2_val = $("#strip_details_ifr").contents().find("body").html();
		}
		
		
		$.ajax({
			method: "GET",
			url: ajaxurl,
			data: {
				'action':'insert_strip_content',
				'option1':option1,
				'option1_val':option1_val,
				'option2':option2,
				'option2_val':option2_val
			},
			success:function(data) {
				console.log(data);
				window.location.href = link;
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
			
			
	});
}(jQuery));



jQuery('.tabs .tab-links a').on('click', function(e)  {
	var currentAttrValue = jQuery(this).attr('href');
	jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
	jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
	e.preventDefault();
 });


function medma_mtx_form_validation(ajaxurl){
	(function ($) {
		$('#subscribe-submit').attr('disabled', 'true');
		var form_data = $('#customer_details').serialize();
		$.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'subscribe_customer',
				'form_data':form_data
			},
			success:function(data) {
				console.log(data);
				if(data == 1){
					$('#cancle').trigger('click');
				}else if(data == 0){
					$('#subscribe-error').text('Something Went Wrong! May Your Mail Id Already Exists.');
					$('#subscribe-error').css('display','block');
				}else if(data == 2){
					$('#subscribe-error').text('Something Went Wrong! Please Try Again Later.');
					$('#subscribe-error').css('display','block');
				}
				$('#subscribe-submit').removeAttr('disabled');
				//window.location.href = link;
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	}(jQuery));
}

(function ($) {
  $(document).on('click','#search-analytics',function(){
	    $('.analytic-btn').removeClass('btn-primary');
		$(this).addClass('btn-primary');
	    var ajaxurl = $('#ajaxUrl').val();
		var from_date = $("input[name=entry_from_date]").val();
		var to_date = $("input[name=entry_to_date]").val();
		//alert(from_date+"******"+to_date);
		if(from_date == ''){
			$("input[name=entry_from_date]").css('border','1px solid #ff0000');
		}
		
		if(to_date == ''){
			$("input[name=entry_to_date]").css('border','1px solid #ff0000');
		}
		
		if(from_date !== '' && to_date !== ''){
			$("input[name=entry_from_date]").css('border','1px solid #ddd');
			$("input[name=entry_to_date]").css('border','1px solid #ddd');
			//alert(ajaxurl);
			$.ajax({
				method: "GET",
				url: ajaxurl,
				data: {
					'action':'popup_analytics',
					'from_date':from_date,
					'to_date':to_date
				},
				success:function(data) {
					var result = JSON.parse(data);
					console.log(result);
					$('#popup-view').text(result.countPopupView);
					$('#popup-click').text(result.countPopupClick);
					$('#strip-click').text(result.countStripClick);
					$('#total-order').text(result.total_sales);
					$('#total-items-sold').text(result.items_sold);
					$('#total-revenue').find('span').text(result.total_revenue);
					$('#average-order-value').find('span').text(result.average_order_value);
					dynamicChart(result.graph.total_sales, result.graph.items_sold, result.graph.total_revenue, result.graph.text, result.graph.days);
				},
				error: function(errorThrown){
					console.log(errorThrown);
				}
			});
		}
		
  });
}(jQuery));
