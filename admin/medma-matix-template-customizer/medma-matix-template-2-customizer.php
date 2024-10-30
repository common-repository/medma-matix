<?php  

/**
 * Begins Customize Strip Templates.
 *
 * Set the settings for all templates like change template 
 * background, change text color, button color etc. 
 * Add to scripts for hide and show templates settings 
 * according to templates view.
 *
 * @since    1.0.0
 */
  

/**
 * Customize first strip template.
 *
 * Set the setting for first strip template to 
 * change background color, button color,
 * button text and side image.
 *
 * @since    1.0.0
 */
 
 
	 $wp_customize->add_section( 
		'mytheme_template_2', 
		array(
			'title'       => __( 'Template Settings', 'mytheme' ),
			'priority'    => 100,
			'capability'  => 'edit_theme_options',
			'description' => __('Change template options here.', 'mytheme'), 
		) 
	);
	
	
	 
	$wp_customize->add_setting( 'medma_matix_sp_strip_1_back_color',
		array(
			'default' => '#DB6D2C',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_1_back_color',
		array(
			'label'    => __( 'Background Color', 'mytheme' ), 
			'section'  => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_1_back_color',
			'priority' => 10
		) 
	));
	
	$wp_customize->add_setting( 'medma_matix_sp_strip_1_button_color',
		array(
			'default' => '#403C3C',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_1_button_color',
		array(
			'label'    => __( 'Button Color', 'mytheme' ), 
			'section'  => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_1_button_color',
			'priority' => 10
		) 
	));
	
	$wp_customize->add_setting('medma_matix_sp_strip_1_button_text',
		array(
		'default' => 'Apply Coupon',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_1_button_text',
		array(
			'label' => 'Button Text',
			'section' => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_1_button_text',
			'type' => 'text',
		)
	);
	
	$wp_customize->add_setting( 'medma_matix_sp_strip_1_button_text_color',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_1_button_text_color',
		array(
			'label'    => __( 'Button Text Color', 'mytheme' ), 
			'section'  => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_1_button_text_color',
			'priority' => 10
		) 
	));
	
	
	
	
/**
 * Customize second strip template.
 *
 * Set the setting for first strip template to change
 * side image, change background color, button color,
 * button text and button text color .
 *
 * @since    1.0.0
 */
	 
	 $wp_customize->add_setting('medma_matix_sp_strip_2_side_image',
		array(
		'default' => plugins_url( '../templates/image/Black-Friday.png', __FILE__ ) ,
		'transport' => 'postMessage')
	);
	
	
	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'medma_matix_sp_strip_2_side_image',
           array(
               'label'      => __( 'Upload a Side Image', 'mytheme_template_2' ),
               'section'    => 'mytheme_template_2',
               'settings'   => 'medma_matix_sp_strip_2_side_image',
               'context'    => 'Side Image' 
           )
       )
   );
	 
	 $wp_customize->add_setting( 'medma_matix_sp_strip_2_back_color',
		array(
			'default' => '#000',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_2_back_color',
		array(
			'label'    => __( 'Background Color', 'mytheme' ), 
			'section'  => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_2_back_color',
			'priority' => 10
		) 
	));
	
	$wp_customize->add_setting( 'medma_matix_sp_strip_2_button_color',
		array(
			'default' => '#7CC12C',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_2_button_color',
		array(
			'label'    => __( 'Button Color', 'mytheme' ), 
			'section'  => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_2_button_color',
			'priority' => 10
		) 
	));
	
	$wp_customize->add_setting('medma_matix_sp_strip_2_button_text',
		array(
		'default' => 'GRAB THE DISCOUNT',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_2_button_text',
		array(
			'label' => 'Button Text',
			'section' => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_2_button_text',
			'type' => 'text',
		)
	);
	
	$wp_customize->add_setting( 'medma_matix_sp_strip_2_button_text_color',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_2_button_text_color',
		array(
			'label'    => __( 'Button Text Color', 'mytheme' ), 
			'section'  => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_2_button_text_color',
			'priority' => 10
		) 
	));
	
	
/**
 * Customize third strip template.
 *
 * Set the setting for third strip template to change
 * side image, background color, button color,
 * and button text color .
 *
 * @since    1.0.0
 */	
	
	 $wp_customize->add_setting('medma_matix_sp_strip_3_side_image',
		array(
		'default' => plugins_url( '../templates/image/SALE.png', __FILE__ ) ,
		'transport' => 'postMessage')
	);
	
	
	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'medma_matix_sp_strip_3_side_image',
           array(
               'label'      => __( 'Upload a Side Image', 'mytheme_template_2' ),
               'section'    => 'mytheme_template_2',
               'settings'   => 'medma_matix_sp_strip_3_side_image',
               'context'    => 'Side Image' 
           )
       )
   );
	 
	 $wp_customize->add_setting( 'medma_matix_sp_strip_3_back_color',
		array(
			'default' => '#000',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_3_back_color',
		array(
			'label'    => __( 'Background Color', 'mytheme' ), 
			'section'  => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_3_back_color',
			'priority' => 10
		) 
	));
	
	$wp_customize->add_setting( 'medma_matix_sp_strip_3_button_color',
		array(
			'default' => '#FF5E00',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_3_button_color',
		array(
			'label'    => __( 'Button Color', 'mytheme' ), 
			'section'  => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_3_button_color',
			'priority' => 10
		) 
	));
	
	$wp_customize->add_setting('medma_matix_sp_strip_3_button_text',
		array(
		'default' => 'SHOP NOW',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_3_button_text',
		array(
			'label' => 'Button Text',
			'section' => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_3_button_text',
			'type' => 'text',
		)
	);
	
	$wp_customize->add_setting( 'medma_matix_sp_strip_3_button_text_color',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_3_button_text_color',
		array(
			'label'    => __( 'Button Text Color', 'mytheme' ), 
			'section'  => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_3_button_text_color',
			'priority' => 10
		) 
	));
	
	
	
/**
 * Customize fourth strip template.
 *
 * Set the setting for fourth strip template to change
 * background image, button color, button text,
 * and button text color .
 *
 * @since    1.0.0
 */	
	 
	 $wp_customize->add_setting('medma_matix_sp_strip_4_back_image',
		array(
		'default' => plugins_url( '../../includes/img/red-sequin-background.jpg', __FILE__ ) ,
		'transport' => 'postMessage')
	);
	
	
	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'medma_matix_sp_strip_4_back_image',
           array(
               'label'      => __( 'Upload a Background Image', 'mytheme_template_2' ),
               'section'    => 'mytheme_template_2',
               'settings'   => 'medma_matix_sp_strip_4_back_image',
               'context'    => 'Background Image' 
           )
       )
   );
	
	$wp_customize->add_setting( 'medma_matix_sp_strip_4_button_color',
		array(
			'default' => '#FF9900',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_4_button_color',
		array(
			'label'    => __( 'Button Color', 'mytheme' ), 
			'section'  => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_4_button_color',
			'priority' => 10
		) 
	));
	
	$wp_customize->add_setting('medma_matix_sp_strip_4_button_text',
		array(
		'default' => 'SHOP NOW',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_4_button_text',
		array(
			'label' => 'Button Text',
			'section' => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_4_button_text',
			'type' => 'text',
		)
	);
	
	$wp_customize->add_setting( 'medma_matix_sp_strip_4_button_text_color',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_strip_4_button_text_color',
		array(
			'label'    => __( 'Button Text Color', 'mytheme' ), 
			'section'  => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_4_button_text_color',
			'priority' => 10
		) 
	));
	
/**
 * Customize strip button staus.
 *
 * Set the setting for enable/disable
 * strip button and set template numbers.
 *
 * @since    1.0.0
 */
	 
	$wp_customize->add_setting('medma_matix_sp_strip_temp_button_status',
		array(
			'default' => 'enable',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_strip_status',
		array(
			'label' => 'Template Button Status',
			'section' => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_strip_temp_button_status',
			'type' => 'radio',
			'choices' => array(
				'enable' => 'Enable',
				'disable' => 'Disable',
			),
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_mod_strip_template_number',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_mod_strip_template_number',
		array(
			'section' => 'mytheme_template_2',
			'settings' => 'medma_matix_sp_mod_strip_template_number',
			'type' => 'hidden'
		)
	);





function medma_mtx_my_strip_customizer_script(){
	$strip_message = get_option('medma_matix_sp_strip_message');
?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {

			/* Hiding/showing top bar style dropdown */
			var topbar_style = $( '.customize-control' );
			//topbar_style.hide();
			var strip_msg = '<?php echo $strip_message;?>';
			if(strip_msg == 'template'){
				$('#customize-control-medma_matix_sp_strip_buttonUrlActive').hide();
				$('#customize-control-medma_matix_sp_strip_buttonTextColour').hide();
				$('#customize-control-medma_matix_sp_strip_buttonBackColour').hide();
				$('#customize-control-medma_matix_sp_strip_buttonTextContent').hide();
				$('#customize-control-medma_matix_sp_strip_buttonSize').hide();
				$('#customize-control-medma_matix_sp_strip_textColour').hide();
				$('#customize-control-medma_matix_sp_strip_stripColour').hide();
			}
			
			$('#customize-control-medma_matix_sp_strip_1_back_color').hide();
			$('#customize-control-medma_matix_sp_strip_1_button_color').hide();
			$('#customize-control-medma_matix_sp_strip_1_button_text').hide();
			$('#customize-control-medma_matix_sp_strip_1_button_text_color').hide();
			
			$('#customize-control-medma_matix_sp_strip_2_back_color').hide();
			$('#customize-control-medma_matix_sp_strip_2_button_color').hide();
			$('#customize-control-medma_matix_sp_strip_2_button_text').hide();
			$('#customize-control-medma_matix_sp_strip_2_button_text_color').hide();
			$('#customize-control-medma_matix_sp_strip_2_side_image').hide();
			
			$('#customize-control-medma_matix_sp_strip_3_back_color').hide();
			$('#customize-control-medma_matix_sp_strip_3_button_color').hide();
			$('#customize-control-medma_matix_sp_strip_3_button_text').hide();
			$('#customize-control-medma_matix_sp_strip_3_button_text_color').hide();
			$('#customize-control-medma_matix_sp_strip_3_side_image').hide();
			
			$('#customize-control-medma_matix_sp_strip_4_back_image').hide();
			$('#customize-control-medma_matix_sp_strip_4_button_color').hide();
			$('#customize-control-medma_matix_sp_strip_4_button_text').hide();
			$('#customize-control-medma_matix_sp_strip_4_button_text_color').hide();
			
			var template_no = $('#customize-control-medma_matix_sp_mod_strip_template_number input').val();
			if(template_no == ''){
				template_no = 1;
				$('#customize-control-medma_matix_sp_mod_strip_template_number input').val('1');
			}
			//alert(template_no);
			if(template_no == 1){
				$('#customize-control-medma_matix_sp_strip_1_back_color').show();
				$('#customize-control-medma_matix_sp_strip_1_button_color').show();
				$('#customize-control-medma_matix_sp_strip_1_button_text').show();
				$('#customize-control-medma_matix_sp_strip_1_button_text_color').show();
			}
			else if(template_no == 2){
				$('#customize-control-medma_matix_sp_strip_2_back_color').show();
				$('#customize-control-medma_matix_sp_strip_2_button_color').show();
				$('#customize-control-medma_matix_sp_strip_2_button_text').show();
				$('#customize-control-medma_matix_sp_strip_2_button_text_color').show();
				$('#customize-control-medma_matix_sp_strip_2_side_image').show();
			}
			else if(template_no == 3){
				$('#customize-control-medma_matix_sp_strip_3_back_color').show();
				$('#customize-control-medma_matix_sp_strip_3_button_color').show();
				$('#customize-control-medma_matix_sp_strip_3_button_text').show();
				$('#customize-control-medma_matix_sp_strip_3_button_text_color').show();
				$('#customize-control-medma_matix_sp_strip_3_side_image').show();
			}
			else if(template_no == 4){
				$('#customize-control-medma_matix_sp_strip_4_back_image').show();
				$('#customize-control-medma_matix_sp_strip_4_button_color').show();
				$('#customize-control-medma_matix_sp_strip_4_button_text').show();
				$('#customize-control-medma_matix_sp_strip_4_button_text_color').show();
			}
			
		});
	</script>
<?php
}

	
