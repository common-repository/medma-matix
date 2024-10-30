<?php 

/**
 * Begins sidebar Customizer strips.
 *
 * Set the customize options for strips like change strips 
 * positions, strips button color, strips text color,
 * strips background color , strips button text contents, 
 * strips display status etc. Add to scripts 
 * for customize strips settings 
 * 
 * @since    1.0.0
 */
 
    $wp_customize->add_section( 
		'mytheme_strip_activeStatus', 
		array(
			'title'       => __( 'Strip Settings', 'mytheme' ),
			'priority'    => 100,
			'capability'  => 'edit_theme_options',
			'description' => __('Change strip options here.', 'mytheme'), 
		) 
    );
    
    $wp_customize->add_setting('medma_matix_sp_strip_message',
		array(
			'default' => 'nostrip',
			'transport' => 'refresh'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_message',
		array(
			'label' => 'Strip Status',
			'section' => 'mytheme_strip_activeStatus',
			'settings' => 'medma_matix_sp_strip_message',
			'type' => 'select',
			'choices' => array(
				'nostrip' => 'No Strip',
				'custom' => 'Custom',
				'template' => 'Template',
			),
			'description' => 'On selecting option template, you would be redirect to select template page.',
		)
	);
    
    $wp_customize->add_setting('medma_matix_sp_strip_status_display',
		array(
			'default' => 'always',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_status_display',
		array(
			'label' => 'Strip Status',
			'section' => 'mytheme_strip_activeStatus',
			'settings' => 'medma_matix_sp_strip_status_display',
			'type' => 'radio',
			'choices' => array(
				'always' => 'Enable',
				'never' => 'Disable',
			),
		)
	);
   
     $wp_customize->add_setting('medma_matix_sp_strip_displayOnPage',
		array(
			'default' => 'allpage',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_displayOnPage',
		array(
			'label' => 'Show On',
			'section' => 'mytheme_strip_activeStatus',
			'settings' => 'medma_matix_sp_strip_displayOnPage',
			'type' => 'select',
			'choices' => array(
				'allpage' => 'All Page',
				'category' => 'Product Category Page',
				'shop' => 'Shop Page',
				'product' => 'Product Page',
				'cart' => 'Cart Page',
				'checkout' => 'Checkout Page',
				'successpage' => 'Checkout Success Page',
			),
		)
	);
	 
    
    
	
	
	
	
	$wp_customize->add_setting('medma_matix_sp_strip_position',
		array(
			'default' => 'bottom',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_position',
		array(
			'label' => 'Strip Position',
			'section' => 'mytheme_strip_activeStatus',
			'settings' => 'medma_matix_sp_strip_position',
			'type' => 'radio',
			'choices' => array(
				'top' => 'Top',
				'bottom' => 'Bottom',
			),
		)
	);
	
	
	
	
	
	$wp_customize->add_setting( 'medma_matix_sp_strip_stripColour',
		array(
			'default' => '#000',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_stripColour',
		array(
			'label'    => __( 'Strip Background Color', 'mytheme' ), 
			'section'  => 'mytheme_strip_activeStatus',
			'settings' => 'medma_matix_sp_strip_stripColour',
			'priority' => 10
		) 
	));
	
	

 
    $wp_customize->add_section( 
		'mytheme_strip_button_activeStatus', 
		array(
			'title'       => __( 'Strip Button Settings', 'mytheme' ),
			'priority'    => 100,
			'capability'  => 'edit_theme_options',
			'description' => __('Change strip button options here.', 'mytheme'), 
		) 
    );
	 
	 
	$wp_customize->add_setting('medma_matix_sp_strip_buttonUrlActive',
		array(
			'default' => 'enable',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_buttonUrlActive',
		array(
			'label' => 'Strip Button Status',
			'section' => 'mytheme_strip_button_activeStatus',
			'settings' => 'medma_matix_sp_strip_buttonUrlActive',
			'type' => 'radio',
			'choices' => array(
				'enable' => 'Enable',
				'disable' => 'Disable',
			),
		)
	);
	
	
	$wp_customize->add_setting( 'medma_matix_sp_strip_buttonTextColour',
		array(
			'default' => '#000',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_buttonTextColour',
		array(
			'label'    => __( 'Button Text Color', 'mytheme' ), 
			'section'  => 'mytheme_strip_button_activeStatus',
			'settings' => 'medma_matix_sp_strip_buttonTextColour',
			'priority' => 10
		) 
	));
	
	
	$wp_customize->add_setting( 'medma_matix_sp_strip_buttonBackColour',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_buttonBackColour',
		array(
			'label'    => __( 'Button Background Color', 'mytheme' ), 
			'section'  => 'mytheme_strip_button_activeStatus',
			'settings' => 'medma_matix_sp_strip_buttonBackColour',
			'priority' => 10
		) 
	));
	
	
	$wp_customize->add_setting('medma_matix_sp_strip_buttonTextContent',
		array(
		'default' => 'CLICK',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_buttonTextContent',
		array(
			'label' => 'Button Text',
			'section' => 'mytheme_strip_button_activeStatus',
			'settings' => 'medma_matix_sp_strip_buttonTextContent',
			'type' => 'text',
		)
	);
	
	
	$wp_customize->add_setting('medma_matix_sp_strip_buttonUrl',
		array(
		'default' => 'http://www.medma.in/popup-plugin-for-wordpress/',
		'transport' => 'postMessage',
		'sanitize_callback' => 'medma_mtx_validate_strip_url')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_buttonUrl',
		array(
			'label' => 'Button URL',
			'section' => 'mytheme_strip_button_activeStatus',
			'settings' => 'medma_matix_sp_strip_buttonUrl',
			'type' => 'text',
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_strip_buttonSize',
		array(
			'default' => 'large',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_buttonSize',
		array(
			'label' => 'Button Size',
			'section' => 'mytheme_strip_button_activeStatus',
			'settings' => 'medma_matix_sp_strip_buttonSize',
			'type' => 'select',
			'choices' => array(
				'large' => 'Large',
				'medium' => 'Medium',
				'small' => 'Small',
				'xsmall' => 'X-Small',
			),
		)
	);
	
	
	$wp_customize->add_setting('medma_matix_sp_strip_buttonUrlOpen',
		array(
			'default' => 'newWindow',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_buttonUrlOpen',
		array(
			'label' => 'Open Button Url In',
			'section' => 'mytheme_strip_button_activeStatus',
			'settings' => 'medma_matix_sp_strip_buttonUrlOpen',
			'type' => 'select',
			'choices' => array(
				'newWindow' => 'New Window',
				'sameWindow' => 'Same Window',
				'popupWindow' => 'Popup Window',
			),
		)
	);
	
	
	$wp_customize->add_setting('medma_matix_sp_strip_close_icon',
		array(
			'default' => 'enable',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_close_icon',
		array(
			'label' => 'Close Icon',
			'section' => 'mytheme_strip_button_activeStatus',
			'settings' => 'medma_matix_sp_strip_close_icon',
			'type' => 'radio',
			'choices' => array(
				'enable' => 'Enable',
				'disable' => 'Disable',
			),
		)
	);
	
	$wp_customize->add_setting( 'medma_matix_sp_strip_close_icon_color',
		array(
			'default' => '#fff',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_close_icon_color',
		array(
			'label'    => __( 'Close Icon Color', 'mytheme' ), 
			'section'  => 'mytheme_strip_button_activeStatus',
			'settings' => 'medma_matix_sp_strip_close_icon_color',
			'priority' => 10
		) 
	));
	
	 




function medma_mtx_validate_strip_url($input){
	if (preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$input)){
		return $input;
	}else{
		return get_theme_mod( 'medma_matix_sp_strip_buttonUrl' );
	}
	
}



function medma_mtx_strip_custom_customizer(){
?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {

		

			var topbar_style = $( '.customize-control' );
			
			if(!$('#accordion-section-mytheme_popup_position_options').is(':visible'))
			{
				$(".modal-popup").css("display", "none");
			}
			
			
			var close_icon_status = $('input[type=radio][name=_customize-radio-medma_matix_sp_strip_close_icon]').attr('checked');
			if(close_icon_status == undefined || close_icon_status == 'false'){
				$('#customize-control-medma_matix_sp_strip_close_icon_color').hide();
			}
			else {
				$('#customize-control-medma_matix_sp_strip_close_icon_color').show();
			}
			
			 $('input[type=radio][name=_customize-radio-medma_matix_sp_strip_close_icon]').change(function() {
				if (this.value == 'enable') {
					$('#customize-control-medma_matix_sp_strip_close_icon_color').show();
				}
				else {
					$('#customize-control-medma_matix_sp_strip_close_icon_color').hide();
				}
			});
			
			
			var button_status = $('input[type=radio][name=_customize-radio-medma_matix_sp_strip_buttonUrlActive]').attr('checked');
			if(button_status == undefined || button_status == 'false'){
				$('#customize-control-medma_matix_sp_strip_buttonTextColour').hide();
				$('#customize-control-medma_matix_sp_strip_buttonBackColour').hide();
				$('#customize-control-medma_matix_sp_strip_buttonTextContent').hide();
				$('#customize-control-medma_matix_sp_strip_buttonUrl').hide();
				$('#customize-control-medma_matix_sp_strip_buttonSize').hide();
				$('#customize-control-medma_matix_sp_strip_buttonUrlOpen').hide();
			}
			else {
				$('#customize-control-medma_matix_sp_strip_buttonTextColour').show();
				$('#customize-control-medma_matix_sp_strip_buttonBackColour').show();
				$('#customize-control-medma_matix_sp_strip_buttonTextContent').show();
				$('#customize-control-medma_matix_sp_strip_buttonUrl').show();
				$('#customize-control-medma_matix_sp_strip_buttonSize').show();
				$('#customize-control-medma_matix_sp_strip_buttonUrlOpen').show();
			}
			
			$('input[type=radio][name=_customize-radio-medma_matix_sp_strip_buttonUrlActive]').change(function() {
				if (this.value == 'enable') {
					$('#customize-control-medma_matix_sp_strip_buttonTextColour').show();
					$('#customize-control-medma_matix_sp_strip_buttonBackColour').show();
					$('#customize-control-medma_matix_sp_strip_buttonTextContent').show();
					$('#customize-control-medma_matix_sp_strip_buttonUrl').show();
					$('#customize-control-medma_matix_sp_strip_buttonSize').show();
					$('#customize-control-medma_matix_sp_strip_buttonUrlOpen').show();
				}
				else {
					$('#customize-control-medma_matix_sp_strip_buttonTextColour').hide();
					$('#customize-control-medma_matix_sp_strip_buttonBackColour').hide();
					$('#customize-control-medma_matix_sp_strip_buttonTextContent').hide();
					$('#customize-control-medma_matix_sp_strip_buttonUrl').hide();
					$('#customize-control-medma_matix_sp_strip_buttonSize').hide();
					$('#customize-control-medma_matix_sp_strip_buttonUrlOpen').hide();
				}
			});
			
			var strip_content_option = $('#customize-control-medma_matix_sp_strip_message select').val();
			if(strip_content_option == 'template'){
				$('#customize-control-medma_matix_sp_strip_buttonUrlActive').hide();
				$('#customize-control-medma_matix_sp_strip_buttonTextColour').hide();
				$('#customize-control-medma_matix_sp_strip_buttonBackColour').hide();
				$('#customize-control-medma_matix_sp_strip_buttonTextContent').hide();
				$('#customize-control-medma_matix_sp_strip_buttonSize').hide();
			}else{
				$('#customize-control-medma_matix_sp_strip_buttonUrlActive').show();
				$('#customize-control-medma_matix_sp_strip_buttonTextColour').show();
				$('#customize-control-medma_matix_sp_strip_buttonBackColour').show();
				$('#customize-control-medma_matix_sp_strip_buttonTextContent').show();
				$('#customize-control-medma_matix_sp_strip_buttonSize').show();
			}
			
			$('#customize-control-medma_matix_sp_strip_message select').change(function() {
				if(this.value == 'template'){
					$('#customize-control-medma_matix_sp_strip_buttonUrlActive').hide();
					$('#customize-control-medma_matix_sp_strip_buttonTextColour').hide();
					$('#customize-control-medma_matix_sp_strip_buttonBackColour').hide();
					$('#customize-control-medma_matix_sp_strip_buttonTextContent').hide();
					$('#customize-control-medma_matix_sp_strip_buttonSize').hide();
					
					//this.value = popup_content_option;
					var admin_url = '<?php echo admin_url( 'admin.php?page=medma_matix_admin_templates', '' );?>';
					window.location.href = admin_url;
				}
				else{
					$('#customize-control-medma_matix_sp_strip_buttonUrlActive').show();
					$('#customize-control-medma_matix_sp_strip_buttonTextColour').show();
					$('#customize-control-medma_matix_sp_strip_buttonBackColour').show();
					$('#customize-control-medma_matix_sp_strip_buttonTextContent').show();
					$('#customize-control-medma_matix_sp_strip_buttonSize').show();
				}
			});
		});
	</script>
<?php
}


add_action( 'customize_controls_print_footer_scripts', 'medma_mtx_strip_custom_customizer' );
