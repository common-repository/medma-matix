

( function( $ ) {
	wp.customize( 'medma_matix_sp_popup_content_option', function( value ) {
		value.bind( function( newval ) {
			//alert(newval);
		} );
	} );
	
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_popup_image_count', function( value ) {
		value.bind( function( newval ) {
			$('#popImageCount').attr( 'value', newval );
		} );
	} );
	
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_border_activeStatus', function( value ) {
		value.bind( function( newval ) {
			var popColor = $('#popColor').attr( 'value' );
			var popWidth = $('#popWidth').attr( 'value' );
			if(newval == 'enable'){
				$('#popup').css( 'border', popWidth+'px solid'+popColor );
			}
			else{
				$('#popup').css( 'border', 'none' );
			}
			$('#popBorderStatus').attr( 'value', newval );
		} );
	} );
	
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_popup_borderColor', function( value ) {
		value.bind( function( newval ) {
			var borderStatus = $('#popBorderStatus').attr( 'value' );
			var popWidth = $('#popWidth').attr( 'value' );
			if(borderStatus == 'disable'){
				$('#popup').css( 'border', 'none' );
			}else{
				$('#popup').css( 'border', popWidth+'px solid'+newval );
			}
			$('#popColor').attr( 'value', newval );
		} );
	} );
	
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_popup_borderWidth', function( value ) {
		value.bind( function( newval ) {
			var borderStatus = $('#popBorderStatus').attr( 'value' );
			var popColor = $('#popColor').attr( 'value' );
			if(borderStatus == 'disable'){
				$('#popup').css( 'border', 'none' );
			}else{
				$('#popup').css( 'border', newval+'px solid '+popColor );
			}
			$('#popWidth').attr( 'value', newval );
		} );
	} );
	
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_popup_width', function( value ) {
		value.bind( function( newval ) {
			$('#popupWidth').attr( 'value', newval );
			popupCustomization();
		} );
	} );
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_popup_height', function( value ) {
		value.bind( function( newval ) {
			$('#popupHeight').attr( 'value', newval );
			popupCustomization();
		} );
	} );
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_popup_position', function( value ) {
		value.bind( function( newval ) {
			$('#popupPosition').attr( 'value', newval );
			popupCustomization();
		} );
	} );
} )( jQuery );


function popupCustomization(){
	( function( $ ) {
		var content = $('#popup').attr('data-content');
		var width = $('#popupWidth').attr( 'value' );
		var height = $('#popupHeight').attr( 'value' );
		var position = $('#popupPosition').attr( 'value' );
		var screen_width = $(window).width();
		var left_align = (parseInt(screen_width)-parseInt(width))/2;
		var c_left_align =  (parseInt(left_align)+parseInt(width))-15;
		//alert(height);
		//~ if(height == 0){
			//~ popupCustomization();
		//~ }else{
			if($('#popup').attr('data-content') == 'image'){
				var border = $('#popup').attr('data-border-width');
				var img_height = parseInt(height)-(2*parseInt(border));
				$('.nivoSlider img').css('max-height', img_height+'px');
			}
			
			$('#popup').css( 'width', width+'px' );
			if(content == 'template' || content == 'video'){
				$('#popup').css( 'height', 'auto' );
			}else{
				$('#popup').css( 'height', height+'px' );
			}
			
			if(position == 'center'){
				var window_height = $( window ).height();
				if($('#popup').attr('data-content') == 'template' || $('#popup').attr('data-content') == 'video'){
					height = $('#popup').height();
				}
				var popup_top = (parseInt(window_height) - parseInt(height))/2;
				var cancle_top = parseInt(popup_top) - 30;
				if(window_height > height){
					$('#popup').css('top',popup_top+'px');
					$('#cancle').css('top',cancle_top+'px');
				}else{
					$('#popup').css('top','9%');
					$('#cancle').css('top','4.5%');
				}
				$('#popup').css('left',left_align+'px');
				$('#cancle').css('left',c_left_align+'px');
				//~ $('#popup').css('top','18%');
				//~ $('#cancle').css('top','13.5%');
				//~ $('#popup').css('left',left_align+'px');
				//~ $('#cancle').css('left',c_left_align+'px');
			}
			else if(position == 'left'){
				$('#popup').css('top','13%');
				$('#cancle').css('top','8.5%');
				var c_left_align =  parseInt(width)-15;
				$('#popup').css('left','0%');
				$('#cancle').css('left',c_left_align+'px');
			}
			else if(position == 'right'){
				$('#popup').css('top','13%');
				$('#cancle').css('top','8.5%');
				var c_left_align =  parseInt(width)-15;
				$('#popup').css('left','auto');
				$('#cancle').css('left','auto');
				$('#popup').css('right','0%');
				$('#cancle').css('right',c_left_align+'px');
			}
			else{
				$('#popup').css('top','13%');
				$('#cancle').css('top','8.5%');
				$('#popup').css('left',left_align+'px');
				$('#cancle').css('left',c_left_align+'px');
			}
		//}
			
	} )( jQuery );
}


( function( $ ) {
	wp.customize( 'medma_matix_sp_popup_slideFrom', function( value ) {
		value.bind( function( newval ) {
			$('#popupSlideFrom').attr( 'value', newval );
			$('#cancle').removeClass('popup-in');
			$('#cancle').addClass('popup-not');
			$('#popup').removeClass();
			var fadein = $('#popupFadeIn').attr( 'value' );
			
			if(fadein == 'none'){
				$('#popup').css('animation-duration', '1s');
				medma_mtx_popupSlideInCustomization();
				setTimeout(function () {$('#cancle').addClass('popup-in')}, 1000);
				
			}else if(fadein == 'slow'){
				$('#popup').css('animation-duration', '2s');
				medma_mtx_popupSlideInCustomization();
				setTimeout(function () {$('#cancle').addClass('popup-in')}, 2000);
				
			}else{
				$('#popup').css('animation-duration', '.5s');
				medma_mtx_popupSlideInCustomization();
				setTimeout(function () {$('#cancle').addClass('popup-in')}, 500);
			}
			
		} );
	} );
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_popup_slideOutFrom', function( value ) {
		value.bind( function( newval ) {
			$('#popupSlideOutFrom').attr( 'value', newval );
			$('#cancle').removeClass();
			$('#popup').removeClass();
			var fadein = $('#popupFadeIn').attr( 'value' );
			
			if(fadein == 'none'){
				$('#popup').css('animation-duration', '1s');
				medma_mtx_popupSlideOutCustomization();
				setTimeout(function () {$('#popup').removeClass();$('#popup').addClass('popup-in')}, 1300);
				setTimeout(function () {$('#cancle').removeClass();$('#cancle').addClass('popup-in')}, 1300);
				
			}else if(fadein == 'slow'){
				$('#popup').css('animation-duration', '2s');
				medma_mtx_popupSlideOutCustomization();
				setTimeout(function () {$('#popup').removeClass();$('#popup').addClass('popup-in')}, 2300);
				setTimeout(function () {$('#cancle').removeClass();$('#cancle').addClass('popup-in')}, 2300);
				
			}else{
				$('#popup').css('animation-duration', '.5s');
				medma_mtx_popupSlideOutCustomization();
				setTimeout(function () {$('#popup').removeClass();$('#popup').addClass('popup-in')}, 800);
				setTimeout(function () {$('#cancle').removeClass();$('#cancle').addClass('popup-in')}, 800);
			}
			
			
		} );
	} );
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_popup_fadeIn', function( value ) {
		value.bind( function( newval ) {
			$('#popupFadeIn').attr( 'value', newval );
		} );
	} );
} )( jQuery );


function medma_mtx_popupSlideOutCustomization(){
	( function( $ ) {
		var slideout = $('#popupSlideOutFrom').attr( 'value' );
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
		
		$('#cancle').addClass('popup-not');
		
	} )( jQuery );
}


function medma_mtx_popupSlideInCustomization(){
	( function( $ ) {
		var pop_from = $('#popupSlideFrom').attr( 'value' );
		if(pop_from == 'left'){
			$('#popup').addClass('fadeInLeft animated');
		}else if(pop_from == 'right'){
			$('#popup').addClass('fadeInRight animated');
		}else if(pop_from == 'top'){
			$('#popup').addClass('fadeInDown animated');
		}else if(pop_from == 'bottom'){
			$('#popup').addClass('fadeInUp animated');
		}else{
			$('#popup').addClass('fadeIn animated');
		}
	} )( jQuery );
}



/**
 * TEMPLATES CUSTOMIZER SCRIPTS
 * */
 
( function( $ ) {
	
	wp.customize( 'medma_matix_sp_1_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-11-main').css('background-image', 'url(' + newval + ')');
		} );
	} );
	
	wp.customize( 'medma_matix_sp_1_button_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-11-main a').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_1_button_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-11-main a').css( 'color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_1_button_text', function( value ) {
		value.bind( function( newval ) {
			$('.temp-11-main a').text( newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_2_button_text', function( value ) {
		value.bind( function( newval ) {
			$('.temp-2-shop a').text( newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_2_button_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-2-shop').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_2_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-2-shop a').css( 'color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_3_button_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-3-shop').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_3_button_text', function( value ) {
		value.bind( function( newval ) {
			$('.temp-3-shop').text( newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_3_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-3-shop').css( 'color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_3_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-3-main').css('background-image', 'url(' + newval + ')');
		} );
	} );
	
	wp.customize( 'medma_matix_sp_3_opacity', function( value ) {
		value.bind( function( newval ) {
			$('.over-main-div').css('background-color', 'rgba(0, 0, 0, ' + newval + ')');
		} );
	} );
	
	wp.customize( 'medma_matix_sp_4_button_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-4-ul-div-4 a').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_4_button_text', function( value ) {
		value.bind( function( newval ) {
			$('.temp-4-ul-div-4 a').text( newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_4_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-4-ul-div-4 a').css( 'color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_4_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-4-main').css('background-image', 'url(' + newval + ')');
		} );
	} );
	
	wp.customize( 'medma_matix_sp_5_button_border_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-5-shop').css( 'border', '2px solid '+newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_5_button_text', function( value ) {
		value.bind( function( newval ) {
			$('.temp-5-shop').text( newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_5_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-5-shop').css( 'color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_5_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-5-main').css('background-image', 'url(' + newval + ')');
		} );
	} );
	
	wp.customize( 'medma_matix_sp_6_button_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-6-order').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_6_button_text', function( value ) {
		value.bind( function( newval ) {
			$('.temp-6-order').text( newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_6_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-6-order').css( 'color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_6_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-6-main').css('background-image', 'url(' + newval + ')');
		} );
	} );
	
	/*********************Template 7 **********/
	wp.customize( 'medma_matix_sp_7_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.product-branding').css('background-image', 'url(' + newval + ')');
		} );
	} );
	
	/*********************Template 8 **********/
	wp.customize( 'medma_matix_sp_8_button_color1', function( value ) {
		value.bind( function( newval ) {
			$('.temp-3-order1').css( 'background-color', newval );
		} );
	} );
	wp.customize( 'medma_matix_sp_8_button_color2', function( value ) {
		value.bind( function( newval ) {
			$('.temp-3-order2').css( 'background-color', newval );
		} );
	} );
	wp.customize( 'medma_matix_sp_8_button_text1', function( value ) {
		value.bind( function( newval ) {
			$('.temp-3-order1').text( newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_8_button_text2', function( value ) {
		value.bind( function( newval ) {
			$('.temp-3-order2').text( newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_8_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-3-order1').css( 'color', newval );
		} );
	} );
	wp.customize( 'medma_matix_sp_8_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-3-order2').css( 'color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_8_button_link1', function( value ) {
		value.bind( function( newval ) {
			$('.temp-3-order1').attr( 'href', newval );
		} );
	} );
	wp.customize( 'medma_matix_sp_8_button_link2', function( value ) {
		value.bind( function( newval ) {
			$('.temp-3-order2').attr( 'href', newval );
		} );
	} );
	wp.customize( 'medma_matix_sp_8_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-8-main').css('background-image', 'url(' + newval + ')');
		} );
	} );
		/*********************Template 9 **********/
	
	wp.customize( 'medma_matix_sp_9_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-9-main').css('background-image', 'url(' + newval + ')');
		} );
	} );
	wp.customize( 'medma_matix_sp_9_button_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp9_link').css( 'background-color', newval );
		} );
	} );
	/*********************Template 10 **********/
	wp.customize( 'medma_matix_sp_10_link_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.newsletter-here').css( 'background-color', newval );
		} );
	} );
	
	
	wp.customize( 'medma_matix_sp_10_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-10').css('background-image', 'url(' + newval + ')');
		} );
	} );
	
	
	/*********************Template 11 **********/
	wp.customize( 'medma_matix_sp_11_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-11').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_11_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-11-img').css('background-image', 'url(' + newval + ')');
		} );
	} );
	/*********************Template 12 **********/
	wp.customize( 'medma_matix_sp_12_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-12-main').css( 'background-color', newval );
		} );
	} );
	
	
	
	wp.customize( 'medma_matix_sp_12_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-12').css('background-image', 'url(' + newval + ')');
		} );
	} );
	/*********************Template 13**********/
	//~ wp.customize( 'medma_matix_sp_13_background_color', function( value ) {
		//~ value.bind( function( newval ) {
			//~ $('.temp-13').css( 'background-color', newval );
		//~ } );
	//~ } );
	
	wp.customize( 'medma_matix_sp_13_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-13').css('background-image', 'url(' + newval + ')');
		} );
	} );
	
	/*********************Template 14**********/
	wp.customize( 'medma_matix_sp_14_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-14-main').css( 'background-color', newval );
		} );
	} );
	
	
	wp.customize( 'medma_matix_sp_14_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-14').css('background-image', 'url(' + newval + ')');
		} );
	} );
	/*********************Template 15**********/
	wp.customize( 'medma_matix_sp_16_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-16-link').css( 'background-color', newval );
		} );
	} );
	
	
	
	wp.customize( 'medma_matix_sp_15_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-15').css('background-image', 'url(' + newval + ')');
		} );
	} );
	/*********************Template 16**********/
	wp.customize( 'medma_matix_sp_16_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.temp-16-link').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_16_background_img', function( value ) {
		value.bind( function( newval ) {
			$('.temp-16').css('background-image', 'url(' + newval + ')');
		} );
	} );
} )( jQuery );


 
