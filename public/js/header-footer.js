
var popup_exists = 0;
var ajaxurl = jQuery('#ajax_url').val();
if(ajaxurl == ''){
	var ajaxurl = $('#ajax_url').attr('data-value');
}

var isCustomizer = jQuery('#isCustomizer').attr('data-customizer');
//~ var test_field = jQuery('#test_field').val();
//~ console.log(test_field);
//POPUP
var popup_show_status = jQuery('#popup').attr('data-referer');
var clickStatus = 0;
var hoverStatus = 0;
var inactiveStatus = 0;
var thirdpageStatus = 0;
//alert(popup_show_status);

if(isCustomizer == 1){
	var url_param = jQuery("#customize-strip-or-popup").text();
	if(url_param != ''){
		if(url_param == 'strip'){
			jQuery('#modal-back').css("display","none");
			jQuery('#cancle').css("display","none");
		}
	}
}

if(popup_show_status == 'click'){
	
	var element = jQuery('#status_element').attr('data-element');
	var elementName =  jQuery('#status_element').attr('data-element-name');
	
	if(element == 'class'){
		(function ($) {
			$(document).on('click','.'+elementName,function(){
				clickStatus++;
				medma_mtx_onloadPopupWindow();
			});
		}(jQuery));
	}else{
		(function ($) {
			$(document).on('click','#'+elementName,function(){
				clickStatus++;
				medma_mtx_onloadPopupWindow();
			});
		}(jQuery));
	}
	
	
}
else if(popup_show_status == 'hover'){
	
	
	var element = jQuery('#status_element').attr('data-element');
	var elementName =  jQuery('#status_element').attr('data-element-name');
	
	if(element == 'class'){
		(function ($) {
			$(document).on('hover','.'+elementName,function(){
				hoverStatus++;
				medma_mtx_onloadPopupWindow();
			});
		}(jQuery));
	}else{
		(function ($) {
			$(document).on('hover','#'+elementName,function(){
				hoverStatus++;
				medma_mtx_onloadPopupWindow();
			});
		}(jQuery));
	}
	
}
else if(popup_show_status == 'inactive'){
	var inactive_time = jQuery('#popup_inactive_time').attr('data-inactive');
	
	var IDLE_TIMEOUT = parseInt(inactive_time)*60; //seconds
	var _idleSecondsCounter = 0;
	document.onclick = function() {
		_idleSecondsCounter = 0;
	};
	document.onmousemove = function() {
		_idleSecondsCounter = 0;
	};
	document.onkeypress = function() {
		_idleSecondsCounter = 0;
	};
	window.setInterval(medma_mtx_CheckIdleTime, 1000);
	
	function medma_mtx_CheckIdleTime() {
		_idleSecondsCounter++;
		if (_idleSecondsCounter >= IDLE_TIMEOUT) {
			//alert("Time expired!");
			inactiveStatus++;
			medma_mtx_onloadPopupWindow();
		}
	}
}
else if(popup_show_status == 'thirdpage'){
	var third_page = jQuery('#popup_thirdpage').attr('data-thirdpage');
	var url_count = jQuery('#popup_thirdpage').attr('data-count');
	var third_cookie = medma_mtx_getCookie('check_url');
	if(third_cookie == ''){
		if(url_count == third_page){
			medma_mtx_setCookieThirdPage(url_count);
			thirdpageStatus++;
			medma_mtx_onloadPopupWindow();
		}
	}
	
	
}

function medma_mtx_setCookieThirdPage(cname) {
	var date = new Date();
	date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
	var expires = date.toUTCString();
	document.cookie = "check_url="+cname+"expires="+expires;
}
//~ function medma_mtx_setCookieThirdPage(cname) {
	//~ 
	//~ var page_number = medma_mtx_getCookie('pageCount');
	//~ 
	//~ var old_arr = medma_mtx_getCookie('third_url');
	//~ console.log(old_arr);
	//~ var count = 0;
	//~ var arr = [];
	//~ if(old_arr == ''){
		//~ arr.push( cname );
		//~ count++;
	//~ }
	//~ else{
		//~ var str_array = old_arr.split(',');
		//~ for(var i = 0; i < str_array.length; i++) {
			//~ if(str_array[i] != cname){
				//~ arr.push( str_array[i] );
				//~ count++;
			//~ }
		//~ }
		//~ arr.push( cname );
		//~ count++;
	//~ }
	//~ 
	//~ var date = new Date();
	//~ date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
	//~ var expires = date.toUTCString();
	//~ document.cookie = "third_url="+arr;
	//~ document.cookie = "pageCount="+count;
	//~ 
//~ }

//STRIP
var strip_show_status = jQuery('#strip').attr('data-referer');
var stripclickStatus = 0;
var striphoverStatus = 0;

if(strip_show_status == 'click'){
	
	var stripelement = jQuery('#strip_status_element').attr('data-element');
	var stripelementName =  jQuery('#strip_status_element').attr('data-element-name');
	if(stripelement == 'class'){
		(function ($) {
			$(document).on('click','.'+stripelementName,function(){
				stripclickStatus++;
				medma_mtx_strip_window();
				popupStripVisibilityCount();
			});
		}(jQuery));
	}else{
		(function ($) {
			$(document).on('click','#'+stripelementName,function(){
				striphoverStatus++;
				medma_mtx_strip_window();
				popupStripVisibilityCount();
			});
		}(jQuery));
	}	
}
else if(strip_show_status == 'hover'){
	
	var stripelement = jQuery('#strip_status_element').attr('data-element');
	var stripelementName =  jQuery('#strip_status_element').attr('data-element-name');
	
	if(stripelement == 'class'){
		(function ($) {
			$(document).on('hover','.'+stripelementName,function(){
				striphoverStatus++;
				medma_mtx_strip_window();
				popupStripVisibilityCount();
			});
		}(jQuery));
	}else{
		(function ($) {
			$(document).on('hover','#'+stripelementName,function(){
				striphoverStatus++;
				medma_mtx_strip_window();
				popupStripVisibilityCount();
			});
		}(jQuery));
	}
	
}


//DOCUMENT ONLOAD FUNCTION
(function ($) {
  $(function () {
	  //alert('color');
    $('#header').css('background-color','grey');
   // alert(popup_height);
    //$('#header').html(a);
    
/******************************************************MEDMA POPUP***********************************************************************/

	medma_mtx_onloadPopupWindow(); 
    
	
/****************************************************************MEDMA STRIP************************************************************/
	
	medma_mtx_strip_window();
	// Get the modal
	var modal = document.getElementById('myModal');
	var span = document.getElementsByClassName("close")[0];
	if(span !== undefined)
	{
		span.onclick = function() {
			modal.style.display = "none";
		}
	}

	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	
	
/***************************************************************POPUP VIEW AND STRIP VIEW AND COUNT*************************************************/

	
	
});
}(jQuery));


function medma_mtx_popupVisibilityCount(){
	//console.log(ajaxurl)
	(function ($) {
	
	var popup_vis = $('#popup').is(":visible");
	var nonce = $('#medma-mtx-nonce').val();
	if(popup_vis === true){
		$.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'count_popup_vis',
				'nonce': nonce
			},
			success:function(data) {
//				console.log(data);
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	}
	
	}(jQuery));
}

(function ($) {
  $(document).on('click','#strip-button',function(){
	 
	var urlopen = $(this).attr('data-urlOpen');
	var seturl = $(this).attr('data-url');
	var nonce = $('#medma-mtx-nonce').val();
	if(isCustomizer == 0){
		medma_mtx_setStripCookie(1);
		medma_mtx_setAlwaysStripCookie(1);
		
		$.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'count_strip_button_click',
				'nonce' : nonce
			},
			success:function(data) {
				console.log(data);
				if(urlopen == 'newWindow'){
					window.open(seturl,'_blank');
				}else if(urlopen == 'sameWindow'){
					window.open(seturl,'_self');
				}else{
					$('#myModal').show();
				}
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	}
 });
}(jQuery));

function medma_mtx_stripVisibilityCount(){
	(function ($) {
	
	var strip_vis = $('#strip').is(":visible");
    var nonce = $('#medma-mtx-nonce').val();
	
	if(strip_vis === true){
		$.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'count_strip_vis',
				'nonce': nonce
			},
			success:function(data) {
//				console.log(data);
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	}
	
	
	}(jQuery));
}


function medma_mtx_onloadPopupWindow(){
	(function ($) {
		var time = $('#popup').attr('data-time');
		var customTime = $('#popup').attr('data-customTime');
		
		if(isCustomizer == 0){
			var current_count = medma_mtx_getCookie('popup_time');
			if(isNaN(current_count)){
				var count_add = 1;
			}else{
				var count_add = parseInt(current_count);
			}
			var latest_count = parseInt(count_add)+1;
			medma_mtx_setPopupCookieVisiting(latest_count);
			
			if(time == 'none'){
				medma_mtx_popup_window();
			}else if(time == 'custom'){
				setTimeout(function () {medma_mtx_popup_window()}, parseInt(customTime)*1000);
			}
		}else{
			medma_mtx_popup_window();
		}
	}(jQuery));
}
		
function medma_mtx_strip_window(){
	(function ($) {
		
		var current_count = medma_mtx_getCookie('strip_time');
		
		if(isNaN(current_count)){
			var count_add = 1;
		}else{
			var count_add = parseInt(current_count);
		}
		var latest_count = parseInt(count_add)+1;
		medma_mtx_setStripCookieVisiting(latest_count);
	
		var btn_size = $('#strip-button').attr('data-size');
		if(btn_size == 'large'){
			$('#strip-button').css('font-size','23px');
		}else if(btn_size == 'medium'){ 
			$('#strip-button').css('font-size','17px');
		}else if(btn_size == 'small'){
			$('#strip-button').css('font-size','12px');
			$('#strip-button').css('padding','13px');
		}else{
			$('#strip-button').css('font-size','11px');
			$('#strip-button').css('padding','13px');
		}
		
		var btn_active = $('#strip-button').attr('data-button-active');
		if(btn_active == 'disable'){
			$('#strip-button').css('display','none');
		}else{
			$('#strip-button').css('display','inline');
		}
		
		var strip_exist = 0;
		var strip_display = $('#strip').attr('data-display');
		
		if(strip_display == 1){
			
			$('#strip').css('display','block');
			
			var strip_active = $('#strip').attr('data-referer');
			if(strip_active == 'always'){
				var s_al_cookie = medma_mtx_getCookie('alwaysStrip');
				if(s_al_cookie !== ''){
					$('#strip').css('display','none');
				}
				else{
					$('#strip').css('display','block');
				}
			}
			else if(strip_active == 'never'){
				$('#strip').css('display','none');
			}
			else if(strip_active == 'secondtime'){
				var vis_time = $('#strip_status_visiting').attr('data-visiting');
				var s_cookie = medma_mtx_getCookie('strip_time');
				if(s_cookie !== vis_time){
					$('#strip').css('display','none');
				}
				else{
					$('#strip').css('display','block');
				}
			}
			else if(strip_active == 'facebook'){
				var s_al_cookie = medma_mtx_getCookie('alwaysStrip');
				if(s_al_cookie !== ''){
					$('#strip').css('display','none');
				}
				else{
					$('#strip').css('display','block');
				}
			}
			else if(strip_active == 'google'){
				var s_al_cookie = medma_mtx_getCookie('alwaysStrip');
				if(s_al_cookie !== ''){
					$('#strip').css('display','none');
				}
				else{
					$('#strip').css('display','block');
				}
			}
			else if(strip_active == 'twitter'){
				var s_al_cookie = medma_mtx_getCookie('alwaysStrip');
				if(s_al_cookie !== ''){
					$('#strip').css('display','none');
				}
				else{
					$('#strip').css('display','block');
				}
			}
			else if(strip_active == 'instagram'){
				var s_al_cookie = medma_mtx_getCookie('alwaysStrip');
				if(s_al_cookie !== ''){
					$('#strip').css('display','none');
				}
				else{
					$('#strip').css('display','block');
				}
			}
			else if(strip_active == 'click'){
				if(stripclickStatus !== 0 ){
					var s_al_cookie = medma_mtx_getCookie('alwaysStrip');
					if(s_al_cookie !== ''){
						$('#strip').css('display','none');
					}
					else{
						$('#strip').css('display','block');
					}
				}else{
					$('#strip').css('display','none');
				}
			}
			else if(strip_active == 'hover'){
				if(striphoverStatus !== 0 ){
					var s_al_cookie = medma_mtx_getCookie('alwaysStrip');
					if(s_al_cookie !== ''){
						$('#strip').css('display','none');
					}
					else{
						$('#strip').css('display','block');
					}
				}else{
					$('#strip').css('display','none');
				}
			}
		}
		
		var strip_height = $('#strip').height();
		var scrollTop     = $(window).scrollTop();
		var vis = $('#strip').is(":visible");
		var position = $('#strip').attr('data-position');
		
		var strip_display = $('#strip').attr('data-message');
		if(strip_display == "custom"){
			var add_on = 20;
		}else{
			var add_on = 0;
		}
		
		if(vis == true && position == 'top'){
			if(scrollTop == 0){
				$('#wpadminbar').css('top',parseInt(strip_height)+parseInt(add_on));
				$('body').css('margin-top',parseInt(strip_height)+parseInt(add_on));
			}
		}
		else if(vis == true && position == 'bottom'){
			$('body').css('margin-bottom',parseInt(strip_height)+parseInt(add_on));
		}
		
		if(isCustomizer == 0){
			setTimeout(function () {medma_mtx_stripVisibilityCount()}, 500);
		}else{
			$('#strip').css('display','block');
		}
		
	}(jQuery));
}



function medma_mtx_popup_window(){

	//console.log('cusomizer'+isCustomizer);

	(function ($) {
		
		var display = $('#popup').attr('data-display');
		var position = $('#popup').attr('data-position');
		var urlopen = $('#popup').attr('data-urlopen');
		var seturl = $('#popup').attr('data-seturl');
		var slide = $('#popup').attr('data-slide');
		var slideout = $('#popup').attr('data-slideout');
		var time = $('#popup').attr('data-time');
		var fadein = $('#popup').attr('data-fadein');
		var status = $('#popup').attr('data-referer');
		var width = $('#popup').attr('data-width');
		var content = $('#popup').attr('data-content');
		var cookie = medma_mtx_getCookie('popup');

	  
		//medma_mtx_setPopupWindowOnScreen();
		
		var div_text = $('#popup').text();
		
		if(div_text == 'Contact Form[contact-form-7 id="60" title="Contact form 1"]'){
			var html = "<span style='font-size:18px;' >Contact form plugin is not installed.<a href='https://wordpress.org/plugins/contact-form-7/' target='false'>Click here to install plugin.</a></span>";
			$('#popup').html(html);
		}
		
		//~ if(position == 'center'){
			//~ var window_height = $( window ).height();
			//~ 
			//~ if($('#popup').attr('data-content') == 'template'){
				//~ popup_height = $('#popup').height();
			//~ }
			//~ //popup height is coming from index.php page
			//~ var popup_top = (parseInt(window_height) - parseInt(popup_height))/2;
			//~ alert(popup_top);
			//~ var cancle_top = parseInt(popup_top) - 30;
			//~ if(window_height > popup_height){
				//~ $('#popup').css('top',popup_top+'px');
				//~ $('#cancle').css('top',cancle_top+'px');
			//~ }else{
				//~ $('#popup').css('top','9%');
				//~ $('#cancle').css('top','4.5%');
			//~ }
		//~ }else{
			//~ $('#popup').css('top','13%');
			//~ $('#cancle').css('top','8.5%');
		//~ }
		
		if(slide == 'left'){
			$('#popup').addClass('fadeInLeft animated');
		}else if(slide == 'right'){
			$('#popup').addClass('fadeInRight animated');
		}else if(slide == 'top'){
			$('#popup').addClass('fadeInDown animated');
		}else if(slide == 'bottom'){
			$('#popup').addClass('fadeInUp animated');
		}
		
		var pathname = window.location.pathname; // Returns path only
		var url      = window.location.href;
		//alert(pathname);
		var lastUrl = pathname.split("/")[3];
		var url_exist = 0;
		//alert(display);
		if(display == 1){
			$('#modal-back').addClass('popup-in');
			$('#modal-back').removeClass('popup-not');
			$('#popup').addClass('popup-in');
			$('#popup').removeClass('popup-not');
			url_exist++;
		}
		//alert(url_exist);
		if(url_exist != 0){
			if(fadein == 'none'){
				medma_mtx_statusShowPopup(status,1000);
				$('.animated').css('animation-duration', '1s');
				//$('#cancle').removeClass('popup-not');
				
			}else if(fadein == 'slow'){
				medma_mtx_statusShowPopup(status,2000);
				$('.animated').css('animation-duration', '2s');
				//$('#cancle').removeClass('popup-not');
				
			}else{
				medma_mtx_statusShowPopup(status,500);
				$('.animated').css('animation-duration', '.5s');
				//$('#cancle').removeClass('popup-not');
			}
		}
		
		if(content == 'image'){
			//~ $('#wp-popup_image_content-editor-container').css('display','none');
			//~ $('.wp-editor-tabs').css('display','none');
			medma_mtx_nivo_slider(); 
		}
	
		if(isCustomizer == 0){
			setTimeout(function () {medma_mtx_popupVisibilityCount()}, 500);
		}
		
		medma_mtx_setPopupWindowOnScreen();
		
	}(jQuery));
}	


function medma_mtx_nivo_slider(){
	(function ($) {
		var img_count = $('#slider').attr('data-count-img');
		var img_url = $('#slider').html();
		var arr  = img_url.split('<img');
		var arr_len = parseInt(arr.length)-1;
//		console.log(img_count);
		if(img_count == arr_len){
			setTimeout(function () {
				$('#slider').nivoSlider({
					effect : 'fade'
				});
			}, 1000);
		}else{
			medma_mtx_nivo_slider();
		}
	}(jQuery));
}


function medma_mtx_setPopupWindowOnScreen(){
	(function ($) {
		
		var width = $('#popup').attr('data-width');
		var position = $('#popup').attr('data-position');
		//Set popup margin from left and its width
		var screen_width = $(window).width();
		var left_align = (parseInt(screen_width)-parseInt(width))/2;
		var c_left_align =  (parseInt(left_align)+parseInt(width))-15;
		
		if(screen_width <= 786){
			$('#popup').css('width','94%');
			$('#popup').css('left','3%');
			$('#cancle').css('left','93.5%');
		}
		else{
			if(position == 'left'){
				var c_left_align =  parseInt(width)-15;
				$('#popup').css('width',width+'px');
				$('#popup').css('left','0%');
				$('#cancle').css('left',c_left_align+'px');
			}
			else if(position == 'right'){
				var c_left_align =  parseInt(width)-15;
				$('#popup').css('width',width+'px');
				$('#popup').css('right','0%');
				$('#cancle').css('right',c_left_align+'px');
			}
			else{
				$('#popup').css('width',width+'px');
				$('#popup').css('left',left_align+'px');
				$('#cancle').css('left',c_left_align+'px');
			}
		}
		
		if(position == 'center'){
			var window_height = $( window ).height();
			
			if($('#popup').attr('data-content') == 'template' || $('#popup').attr('data-content') == 'video'){
				popup_height = $('#popup').height();
			}
			//popup height is coming from index.php page
			var popup_top = (parseInt(window_height) - parseInt(popup_height))/2;
			//alert(popup_top);
			var cancle_top = parseInt(popup_top) - 30;
			if(window_height > popup_height){
				$('#popup').css('top',popup_top+'px');
				$('#cancle').css('top',cancle_top+'px');
			}else{
				$('#popup').css('top','9%');
				$('#cancle').css('top','4.5%');
			}
		}else{
			$('#popup').css('top','13%');
			$('#cancle').css('top','8.5%');
		}
		
	}(jQuery));
}


(function ($) {
	$( window ).resize(function() {
	  medma_mtx_setPopupWindowOnScreen();
	});
	
}(jQuery));

		
function medma_mtx_statusShowPopup(status,time){
	(function ($) {
		var cookie = medma_mtx_getCookie('popup');
		var always_cookie = medma_mtx_getCookie('alwaysPopup');
		//alert(status);
		if(status == 'always'){
			if(always_cookie !== ''){
				$('#modal-back').addClass('popup-not');
				$('#modal-back').removeClass('popup-in');
				$('#popup').removeClass('popup-in');
				$('#popup').addClass('popup-not');
				$('#cancle').addClass('popup-not')
			}
			else{
				$('#modal-back').addClass('popup-in');
				$('#modal-back').removeClass('popup-not');
				$('#popup').addClass('popup-in');
				$('#popup').removeClass('popup-not');	
				setTimeout(function () {$('#cancle').addClass('popup-in')}, time);
				setTimeout(function () {$('#cancle').removeClass('popup-not')}, time);
				popup_exists++;
			}
		}
		else if(status == 'never'){
			$('#modal-back').addClass('popup-not');
			$('#modal-back').removeClass('popup-in');
			$('#popup').removeClass('popup-in');
			$('#popup').addClass('popup-not');
		}
		else if(status == 'secondtime'){
			var count_cookie = medma_mtx_getCookie('popup_time');
			//alert(cookie);
			var popup_show_time = $('#popup_status_visiting').attr('data-visiting');
			if(count_cookie !== popup_show_time){
				$('#modal-back').addClass('popup-not');
				$('#modal-back').removeClass('popup-in');
				$('#popup').removeClass('popup-in');
				$('#popup').addClass('popup-not');
				$('#cancle').addClass('popup-not')
			}
			else{
				$('#modal-back').addClass('popup-in');
				$('#modal-back').removeClass('popup-not');
				$('#popup').addClass('popup-in');
				$('#popup').removeClass('popup-not');	
				setTimeout(function () {$('#cancle').addClass('popup-in')}, time);
				setTimeout(function () {$('#cancle').removeClass('popup-not')}, time);
				popup_exists++;
			}
		}else if(status == 'facebook'){
			if(always_cookie !== ''){
				$('#modal-back').addClass('popup-not');
				$('#modal-back').removeClass('popup-in');
				$('#popup').removeClass('popup-in');
				$('#popup').addClass('popup-not');
				$('#cancle').addClass('popup-not')
			}
			else{
				$('#modal-back').addClass('popup-in');
				$('#modal-back').removeClass('popup-not');
				$('#popup').addClass('popup-in');
				$('#popup').removeClass('popup-not');	
				setTimeout(function () {$('#cancle').addClass('popup-in')}, time);
				setTimeout(function () {$('#cancle').removeClass('popup-not')}, time);
				popup_exists++;
			}
		}
		else if(status == 'google'){
			if(always_cookie !== ''){
				$('#modal-back').addClass('popup-not');
				$('#modal-back').removeClass('popup-in');
				$('#popup').removeClass('popup-in');
				$('#popup').addClass('popup-not');
				$('#cancle').addClass('popup-not')
			}
			else{
				$('#modal-back').addClass('popup-in');
				$('#modal-back').removeClass('popup-not');
				$('#popup').addClass('popup-in');
				$('#popup').removeClass('popup-not');	
				setTimeout(function () {$('#cancle').addClass('popup-in')}, time);
				setTimeout(function () {$('#cancle').removeClass('popup-not')}, time);
				popup_exists++;
			}
		}
		else if(status == 'twitter'){
			if(always_cookie !== ''){
				$('#modal-back').addClass('popup-not');
				$('#modal-back').removeClass('popup-in');
				$('#popup').removeClass('popup-in');
				$('#popup').addClass('popup-not');
				$('#cancle').addClass('popup-not')
			}
			else{
				$('#modal-back').addClass('popup-in');
				$('#modal-back').removeClass('popup-not');
				$('#popup').addClass('popup-in');
				$('#popup').removeClass('popup-not');	
				setTimeout(function () {$('#cancle').addClass('popup-in')}, time);
				setTimeout(function () {$('#cancle').removeClass('popup-not')}, time);
				popup_exists++;
			}
		}
		else if(status == 'instagram'){
			if(always_cookie !== ''){
				$('#modal-back').addClass('popup-not');
				$('#modal-back').removeClass('popup-in');
				$('#popup').removeClass('popup-in');
				$('#popup').addClass('popup-not');
				$('#cancle').addClass('popup-not')
			}
			else{
				$('#modal-back').addClass('popup-in');
				$('#modal-back').removeClass('popup-not');
				$('#popup').addClass('popup-in');
				$('#popup').removeClass('popup-not');	
				setTimeout(function () {$('#cancle').addClass('popup-in')}, time);
				setTimeout(function () {$('#cancle').removeClass('popup-not')}, time);
				popup_exists++;
			}
		}
		else if(status == 'click'){
			if(clickStatus != 0){
				if(always_cookie !== ''){
					$('#modal-back').addClass('popup-not');
					$('#modal-back').removeClass('popup-in');
					$('#popup').removeClass('popup-in');
					$('#popup').addClass('popup-not');
					$('#cancle').addClass('popup-not')
				}
				else{
					$('#modal-back').addClass('popup-in');
					$('#modal-back').removeClass('popup-not');
					$('#popup').addClass('popup-in');
					$('#popup').removeClass('popup-not');	
					setTimeout(function () {$('#cancle').addClass('popup-in')}, time);
					setTimeout(function () {$('#cancle').removeClass('popup-not')}, time);
					popup_exists++;
				}
			}else{
				$('#modal-back').addClass('popup-not');
				$('#modal-back').removeClass('popup-in');
				$('#popup').removeClass('popup-in');
				$('#popup').addClass('popup-not');
			}
		}
		else if(status == 'hover'){
			if(hoverStatus != 0){
				if(always_cookie !== ''){
					$('#modal-back').addClass('popup-not');
					$('#modal-back').removeClass('popup-in');
					$('#popup').removeClass('popup-in');
					$('#popup').addClass('popup-not');
					$('#cancle').addClass('popup-not')
				}
				else{
					$('#modal-back').addClass('popup-in');
					$('#modal-back').removeClass('popup-not');
					$('#popup').addClass('popup-in');
					$('#popup').removeClass('popup-not');	
					setTimeout(function () {$('#cancle').addClass('popup-in')}, time);
					setTimeout(function () {$('#cancle').removeClass('popup-not')}, time);
					popup_exists++;
				}
			}else{
				$('#modal-back').addClass('popup-not');
				$('#modal-back').removeClass('popup-in');
				$('#popup').removeClass('popup-in');
				$('#popup').addClass('popup-not');
			}
		}
		else if(status == 'scroll'){
			//alert(always_cookie);
			if(always_cookie !== ''){
				$('#modal-back').addClass('popup-not');
				$('#modal-back').removeClass('popup-in');
				$('#popup').removeClass('popup-in');
				$('#popup').addClass('popup-not');
				$('#cancle').addClass('popup-not');
			}
			else{
				$('#modal-back').addClass('popup-not');
				$('#modal-back').removeClass('popup-in');
				$('#popup').addClass('scroll-popup');
				$('#popup').attr('data-time-sec',time);
				$('#popup').removeClass('popup-in');
				$('#popup').addClass('popup-not');
				$('#cancle').addClass('popup-not');
				popup_exists++;
			}	
		}
		else if(status == 'inactive'){
			if(inactiveStatus != 0){
				if(always_cookie !== ''){
					$('#modal-back').addClass('popup-not');
					$('#modal-back').removeClass('popup-in');
					$('#popup').removeClass('popup-in');
					$('#popup').addClass('popup-not');
					$('#cancle').addClass('popup-not')
				}
				else{
					$('#modal-back').addClass('popup-in');
					$('#modal-back').removeClass('popup-not');
					$('#popup').addClass('popup-in');
					$('#popup').removeClass('popup-not');	
					setTimeout(function () {$('#cancle').addClass('popup-in')}, time);
					setTimeout(function () {$('#cancle').removeClass('popup-not')}, time);
					popup_exists++;
				}
			}else{
				$('#modal-back').addClass('popup-not');
				$('#modal-back').removeClass('popup-in');
				$('#popup').removeClass('popup-in');
				$('#popup').addClass('popup-not');
			}
		}
		else if(status == 'thirdpage'){
			if(thirdpageStatus != 0){
				if(always_cookie !== ''){
					$('#modal-back').addClass('popup-not');
					$('#modal-back').removeClass('popup-in');
					$('#popup').removeClass('popup-in');
					$('#popup').addClass('popup-not');
					$('#cancle').addClass('popup-not')
				}
				else{
					$('#modal-back').addClass('popup-in');
					$('#modal-back').removeClass('popup-not');
					$('#popup').addClass('popup-in');
					$('#popup').removeClass('popup-not');	
					setTimeout(function () {$('#cancle').addClass('popup-in')}, time);
					setTimeout(function () {$('#cancle').removeClass('popup-not')}, time);
					popup_exists++;
				}
			}else{
				$('#modal-back').addClass('popup-not');
				$('#modal-back').removeClass('popup-in');
				$('#popup').removeClass('popup-in');
				$('#popup').addClass('popup-not');
			}
		}
		
		//alert(isCustomizer);
		if(isCustomizer == 1){
			$('#modal-back').addClass('popup-in');
			$('#modal-back').removeClass('popup-not');
			$('#popup').addClass('popup-in');
			$('#popup').removeClass('popup-not');	
			setTimeout(function () {$('#cancle').addClass('popup-in')}, time);
			setTimeout(function () {$('#cancle').removeClass('popup-not')}, time);
			popup_exists++;
		}
		
		
	}(jQuery));
}	

(function ($) {
	$( window ).scroll(function() {
	  var scrollTop = $(window).scrollTop();
	  var strip_height = $('#strip').height();
	  var vis = $('#strip').is(":visible");
	  var position = $('#strip').attr('data-position');
	  
	  var strip_display = $('#strip').attr('data-message');
		if(strip_display == "custom"){
			var add_on = 20;
		}else{
			var add_on = 0;
		}
		
	  if(vis == true && position == 'top'){
		if(scrollTop == 0){
			$('#wpadminbar').css('top',parseInt(strip_height)+parseInt(add_on));
			$('body').css('margin-top',parseInt(strip_height)+parseInt(add_on));
		}else{
			$('#wpadminbar').css('top',0);
		}
	  }else if(vis == true && position == 'bottom'){
		$('body').css('margin-bottom',parseInt(strip_height)+parseInt(add_on));
	  }
	  
	  var pop_status = $('#popup').hasClass( "scroll-popup" );
	
	 // alert(pop_status);
	  if(pop_status == true){
		    var time = $('#popup').attr( "data-time-sec" );
		    $('#modal-back').addClass('popup-in');
			$('#modal-back').removeClass('popup-not');
			$('#popup').addClass('popup-in');
			$('#popup').removeClass('popup-not');
			setTimeout(function () {$('#cancle').addClass('popup-in')}, time);
			setTimeout(function () {$('#cancle').removeClass('popup-not')}, time);
	  }
	  
	 // alert(isCustomizer);
	});
	
}(jQuery));

 
(function ($) {
	$(document).on('mouseleave','html',function(){
		var time = $('#popup').attr('data-time');
			if(time == 'lastminute'){
				// console.log('out');
				//~ $('#popup').removeClass('popup-not fadeOutLeft fadeOutRight fadeOutUp fadeOutDown fadeOut animated');
				//~ $('#popup').addClass('popup-in');
					//~ 
				//~ setTimeout(function () {$('#cancle').addClass('popup-in')}, 1000);
				//~ setTimeout(function () {$('#cancle').removeClass('popup-not fadeOutLeft fadeOutRight fadeOutUp fadeOutDown fadeOut animated')}, 1000);
				$('#popup').removeClass('popup-not fadeOutLeft fadeOutRight fadeOutUp fadeOutDown fadeOut animated');
				$('#modal-back').removeClass('popup-not');
				$('#cancle').removeClass('fadeOutLeft fadeOutRight fadeOutUp fadeOutDown fadeOut animated');
				medma_mtx_popup_window();
				//$('#cancle').removeClass('popup-not');
			}
	});
}(jQuery));


(function ($) {
  $(document).on('click','#strip-cancle',function(){
	 if(isCustomizer == 0){
		 medma_mtx_setStripCookie(1);
		 medma_mtx_setAlwaysStripCookie(1);
	 }
	 $('#strip').css('display','none');
	 $('#wpadminbar').css('top',0);
	 $('body').css('margin-top',0);
  });
}(jQuery));




(function ($) {
  $(document).on('click','#strip-template-button',function(){
  	
	var urlopen = $('#strip-temp-btn').attr('data-urlOpen');
	var seturl = $('#strip-temp-btn').attr('data-url');
    
    var nonce = $('#medma-mtx-nonce').val();

	if(isCustomizer == 0){
		medma_mtx_setStripCookie(1);
		medma_mtx_setAlwaysStripCookie(1);
		 
		$.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'count_strip_button_click',
				'nonce': nonce
			},
			success:function(data) {
				console.log(data);
				if(urlopen == 'newWindow'){
					window.open(seturl,'_blank');
				}else if(urlopen == 'sameWindow'){
					window.open(seturl,'_self');
				}else{
					$('#myModal').show();
				}
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	}
 });
}(jQuery));

function medma_mtx_setStripCookie(cname) {
    var date = new Date();
	date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
	var expires = date.toUTCString();
	document.cookie = "strip="+cname+";expires=" + expires;
}

function medma_mtx_setStripCookieVisiting(cname) {
	//alert(cname);
    var date = new Date();
	date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
	var expires = date.toUTCString();
	document.cookie = "strip_time="+cname+";expires=" + expires;
}

function medma_mtx_setAlwaysStripCookie(cname) {
    var date = new Date();
	date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
	var expires = date.toUTCString();
	document.cookie = "alwaysStrip="+cname+";expires=" + expires;
}


(function ($) {
  $(document).on('click','#popup',function(){
	  
	
	
	/*****************************************AJAX FOR POPUP CLICK COUNT*******************************/
	var urlopen = $(this).attr('data-urlopen');
	var seturl = $(this).attr('data-seturl');
	var nonce = $('#medma-mtx-nonce').val();

	if(urlopen !== '' && seturl !== '' && isCustomizer == 0){
		
		$.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'count_popup_click',
				'nonce': nonce
			},
			success:function(data) {
				console.log(data);
				if(urlopen == 'newwindow'){
					window.open(seturl,'_blank');
				}else{
					window.open(seturl,'_self');
				}
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
		
	}
	
	
 });
}(jQuery));


(function ($) {
  $(document).on('click','#cancle',function(){
	if(isCustomizer == 0){  
		medma_mtx_setCookie(1);
		medma_mtx_setAlwaysCookie(1);
		var slideout = $('#popup').attr('data-slideout');
		$('#popup').removeClass('fadeInLeft animated');
		$('#popup').removeClass('fadeInRight animated');
		$('#popup').removeClass('fadeInDown animated');
		$('#popup').removeClass('fadeInUp animated');
		
		$('#cancle').removeClass('fadeInLeft animated');
		$('#cancle').removeClass('fadeInRight animated');
		$('#cancle').removeClass('fadeInDown animated');
		$('#cancle').removeClass('fadeInUp animated');
		
		if(slideout == 'left'){
			$('#popup').addClass('fadeOutLeft animated');
			$('#cancle').addClass('fadeOutLeft animated');
		}
		else if(slideout == 'right'){
			$('#popup').addClass('fadeOutRight animated');
			$('#cancle').addClass('fadeOutRight animated');
		}
		else if(slideout == 'top'){
			$('#popup').addClass('fadeOutUp animated');
			$('#cancle').addClass('fadeOutUp animated');
		}
		else if(slideout == 'bottom'){
			$('#popup').addClass('fadeOutDown animated');
			$('#cancle').addClass('fadeOutDown animated');
		}
		else{
			$('#popup').addClass('fadeOut animated');
			$('#cancle').addClass('fadeOut animated');
		}
		
		$('#cancle').removeClass('popup-in');
		$('#cancle').addClass('popup-not');
		
		var fadein = $('#popup').attr('data-fadein');
		if(fadein == 'none'){
			setTimeout(function () {
				$('#modal-back').removeClass('popup-in');
				$('#modal-back').addClass('popup-not');
			}, 1000);
		}
		else if(fadein == 'slow'){
			setTimeout(function () {
				$('#modal-back').removeClass('popup-in');
				$('#modal-back').addClass('popup-not');
			}, 2000);
		}
		else if(fadein == 'fast'){
			setTimeout(function () {
				$('#modal-back').removeClass('popup-in');
				$('#modal-back').addClass('popup-not');
			}, 500);
		}
	}
	
 });
}(jQuery));


function medma_mtx_setCookie(cname) {
    var date = new Date();
	date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
	var expires = date.toUTCString();
	document.cookie = "popup="+cname+";expires=" + expires;
}

function medma_mtx_setAlwaysCookie(cname) {
    var date = new Date();
	date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
	var expires = date.toUTCString();
	document.cookie = "alwaysPopup="+cname+";expires=" + expires;
}

function medma_mtx_setPopupCookieVisiting(cname) {
    var date = new Date();
	date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
	var expires = date.toUTCString();
	document.cookie = "popup_time="+cname+";expires=" + expires;
}

function medma_mtx_getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i = 0; i <ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length,c.length);
		}
	}
	return "";
}


var full_url      = window.location.href;     // Returns full URL
//alert(full_url);
var str = "edit_strip_templates";
if(full_url.indexOf(str) != -1){
    alert(str2 + " found");
}

