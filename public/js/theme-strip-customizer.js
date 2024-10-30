
/** 
 * STRIP CUSTOMIZER
 * */


( function( $ ) {
	
	wp.customize( 'medma_matix_sp_strip_status_display', function( value ) {
		value.bind( function( newval ) {
			if(newval == 'always'){
				$('#strip').css('display','block');
			}
			else{
				$('#strip').css('display','none');
			}
		} );
	} );
	
	
	wp.customize( 'medma_matix_sp_strip_position', function( value ) {
		value.bind( function( newval ) {
			if(newval == 'top'){
				$('#customize-control-medma_matix_sp_strip_textColour').css('visibility','hidden !important');
				$('#strip').css('top','0px');
				$('#strip').css('bottom','auto');
				$('.ql-toolbar.ql-snow').css('bottom','-50px');
			}
			else{
				$('#strip').css('bottom','0px');
				$('#strip').css('top','auto');
				$('.ql-toolbar.ql-snow').css('bottom','90px');
			}
		} );
	} );
	
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_strip_textColour', function( value ) {
		value.bind( function( newval ) {
			$('#strip-text').css('color',newval);
		} );
	} );
	
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_strip_stripColour', function( value ) {
		value.bind( function( newval ) {
			$('#strip').css('background-color',newval);
		} );
	} );
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_strip_buttonUrlActive', function( value ) {
		value.bind( function( newval ) {
			if(newval == 'enable'){
				$('#strip-button').css('display','inline');
			}else{
				$('#strip-button').css('display','none');
			}
		} );
	} );
	
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_strip_buttonBackColour', function( value ) {
		value.bind( function( newval ) {
			$('#strip-button').css('background-color',newval);
		} );
	} );
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_strip_buttonTextColour', function( value ) {
		value.bind( function( newval ) {
			$('#strip-button').css('color',newval);
		} );
	} );
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_strip_buttonTextContent', function( value ) {
		value.bind( function( newval ) {
			$('#strip-button').text(newval);
		} );
	} );
} )( jQuery );

( function( $ ) {
	wp.customize( 'medma_matix_sp_strip_close_icon_color', function( value ) {
		value.bind( function( newval ) {
			$('#strip-cancle').css('color',newval);
		} );
	} );
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_strip_buttonSize', function( value ) {
		value.bind( function( newval ) {
			if(newval == 'large'){
				$('#strip-button').css('font-size','23px');
				$('#strip-button').css('padding','10px');
			}
			else if(newval == 'medium'){
				$('#strip-button').css('font-size','17px');
				$('#strip-button').css('padding','10px');
			}
			else if(newval == 'small'){
				$('#strip-button').css('font-size','12px');
				$('#strip-button').css('padding','13px');
			}
			else if(newval == 'xsmall'){
				$('#strip-button').css('font-size','11px');
				$('#strip-button').css('padding','13px');
			}
			else{
				$('#strip-button').css('font-size','23px');
				$('#strip-button').css('padding','10px');
			}
		} );
	} );
} )( jQuery );


( function( $ ) {
	wp.customize( 'medma_matix_sp_strip_close_icon', function( value ) {
		value.bind( function( newval ) {
			if(newval == 'enable'){
				$('#strip-cancle').css('display','inline');
			}else{
				$('#strip-cancle').css('display','none');
			}
		} );
	} );
	
} )( jQuery );


/**
 * TEMPLATES CUSTOMIZER SCRIPTS
 * */
 
( function( $ ) {
	wp.customize( 'medma_matix_sp_strip_1_back_color', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-1').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_1_button_color', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-1 a').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_1_button_text', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-1 a').text( newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_1_button_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-1 a').css( 'color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_temp_button_status', function( value ) {
		value.bind( function( newval ) {
			if(newval == 'enable'){
				$('.strip-temp-1 a').css( 'display', 'inline' );
				$('.strip-temp-2 a').css( 'display', 'inline' );
				$('.strip-temp-3 a').css( 'display', 'inline' );
				$('.strip-temp-4 a').css( 'display', 'inline' );
			}else{
				$('.strip-temp-1 a').css( 'display', 'none' );
				$('.strip-temp-2 a').css( 'display', 'none' );
				$('.strip-temp-3 a').css( 'display', 'none' );
				$('.strip-temp-4 a').css( 'display', 'none' );
			}
		} );
	} );
	
	//~ wp.customize( 'medma_matix_sp_strip_temp_button_status', function( value ) {
		//~ value.bind( function( newval ) {
			//~ $('.strip-temp-1 a').css( 'color', newval );
		//~ } );
	//~ } );
	
	wp.customize( 'medma_matix_sp_strip_2_back_color', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-2').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_2_button_color', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-2 a').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_2_button_text', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-2 a').text( newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_2_button_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-2 a').css( 'color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_2_side_image', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-2-img').attr( 'src', newval );
		} );
	} );
	
	//
	wp.customize( 'medma_matix_sp_strip_3_back_color', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-3').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_3_button_color', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-3 a').css( 'border', '1px solid '+newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_3_button_text', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-3 a').text( newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_3_button_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-3 a').css( 'color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_3_side_image', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-3-img').attr( 'src', newval );
		} );
	} );
	
	//
	wp.customize( 'medma_matix_sp_strip_4_back_image', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-4').css( 'background-image', 'url("'+newval+'")' );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_4_button_color', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-4 a').css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_4_button_text', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-4 a').text( newval );
		} );
	} );
	
	wp.customize( 'medma_matix_sp_strip_4_button_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.strip-temp-4 a').css( 'color', newval );
		} );
	} );
	
} )( jQuery );
