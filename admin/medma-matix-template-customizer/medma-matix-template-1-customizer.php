<?php  

/**
 * Begins Customize Templates.
 *
 * Set the settings for all templates like change template 
 * background, change text color, button color etc. 
 * Add to scripts for hide and show templates settings 
 * according to templates view.
 *
 * @since    1.0.0
 */
 
 

/**
 * Customize first template.
 *
 * Set the setting for first template to 
 * change background image, button color,
 * button text and button link.
 *
 * @since    1.0.0
 */
 
	$wp_customize->add_section( 
		'mytheme_template_1', 
		array(
			'title'       => __( 'Template Settings', 'mytheme' ),
			'priority'    => 100,
			'capability'  => 'edit_theme_options',
			'description' => __('Change template options here.', 'mytheme'), 
		) 
	);
	 
	$wp_customize->add_setting('medma_matix_sp_1_background_img',
		array(
		'default' => plugins_url('../../includes/img/last_temp.png', __FILE__ ),
		'transport' => 'postMessage')
	);
	
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_1_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_1_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
	
	
	$wp_customize->add_setting( 'medma_matix_sp_1_button_color',
		array(
			'default' => '#DC4A29',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_1_button_color',
		array(
			'label'    => __( 'Button Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_1_button_color',
			'priority' => 10
		) 
	));
	
	
	$wp_customize->add_setting('medma_matix_sp_1_button_text',
		array(
		'default' => 'DOWNLOAD FREEE GUIDE',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_1_button_text',
		array(
			'label' => 'Button Text',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_1_button_text',
			'type' => 'text',
		)
	);
	
	
	$wp_customize->add_setting( 'medma_matix_sp_1_button_text_color',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_1_button_text_color',
		array(
			'label'    => __( 'Button Text Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_1_button_text_color',
			'priority' => 10
		) 
	));
	
	$wp_customize->add_setting('medma_matix_sp_1_button_link',
		array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'medma_mtx_validate_button_url')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_1_button_link',
		array(
			'label' => 'Button Link',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_1_button_link',
			'type' => 'text',
			'description' => 'Give url with http:// or https://',
		)
	);


/**
 * Customize second template.
 *
 * Set the setting for second template to 
 * change button color, button text, text color,
 * and button link.
 *
 * @since    1.0.0
 */
	
	 
	 $wp_customize->add_setting( 'medma_matix_sp_2_button_color',
		array(
			'default' => '#FB0169',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_2_button_color',
		array(
			'label'    => __( 'Button Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_2_button_color',
			'priority' => 10
		) 
	));


	$wp_customize->add_setting('medma_matix_sp_2_button_text',
		array(
		'default' => 'SHOP NOW',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_2_button_text',
		array(
			'label' => 'Button Text',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_2_button_text',
			'type' => 'text',
		)
	);
	
	$wp_customize->add_setting( 'medma_matix_sp_2_text_color',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_2_text_color',
		array(
			'label'    => __( 'Text Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_2_text_color',
			'priority' => 10
		) 
	));
	
	$wp_customize->add_setting('medma_matix_sp_2_button_link',
		array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'medma_mtx_validate_button_url')
	);

	$wp_customize->add_control(
		'medma_matix_sp_2_button_link',
		array(
			'label' => 'Button Link',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_2_button_link',
			'type' => 'text',
			'description' => 'Give url with http:// or https://',
		)
	);
	
	
	
/**
 * Customize third template.
 *
 * Set the setting for third template to 
 * change button color, button text, text color,
 * background image, background opacity and button link.
 *
 * @since    1.0.0
 */	
	
	$wp_customize->add_setting( 'medma_matix_sp_3_button_color',
		array(
			'default' => '#DA0101',
			'transport' => 'postMessage'
		)
	);  

	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_3_button_color',
		array(
			'label'    => __( 'Button Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_3_button_color',
			'priority' => 10
		) 
	));
		
	$wp_customize->add_setting('medma_matix_sp_3_button_text',
		array(
		'default' => 'SHOP NOW',
		'transport' => 'postMessage')
	);

	$wp_customize->add_control(
		'medma_matix_sp_3_button_text',
		array(
			'label' => 'Button Text',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_3_button_text',
			'type' => 'text',
		)
	);
		
	$wp_customize->add_setting( 'medma_matix_sp_3_text_color',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage'
		)
	);  

	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_3_text_color',
		array(
			'label'    => __( 'Button Text Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_3_text_color',
			'priority' => 10
		) 
	));
		
	$wp_customize->add_setting('medma_matix_sp_3_background_img',
		array(
		'default' => plugins_url('../../includes/img/359318-bigthumbnail.jpg', __FILE__ ),
		'transport' => 'postMessage')
	);
		
		
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_3_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_3_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
	   
	$wp_customize->add_setting( 'medma_matix_sp_3_opacity', array(
	  'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'medma_matix_sp_3_opacity', array(
	  'type' => 'range',
	  'priority' => 10,
	  'section' => 'mytheme_template_1',
	  'label' => __( 'Background Opacity', 'mytheme_template_1' ),
	  'input_attrs' => array(
		  'min' => 0,
		  'max' => 1,
		  'step' => 0.1,
	  ),
	) );

	$wp_customize->add_setting('medma_matix_sp_3_button_link',
		array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'medma_mtx_validate_button_url')
	);

	$wp_customize->add_control(
		'medma_matix_sp_3_button_link',
		array(
			'label' => 'Button Link',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_3_button_link',
			'type' => 'text',
			'description' => 'Give url with http:// or https://',
		)
	);
	
/**
 * Customize fourth template.
 *
 * Set the setting for fourth template to 
 * change background image, button color, 
 * button text color, text color, button
 * text and button link.
 *
 * @since    1.0.0
 */		
	 
	$wp_customize->add_setting('medma_matix_sp_4_background_img',
		array(
		'default' => plugins_url('../../includes/img/cinema.png', __FILE__ ),
		'transport' => 'postMessage')
	);
		
		
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_4_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_4_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
		
	$wp_customize->add_setting( 'medma_matix_sp_4_button_color',
		array(
			'default' => 'orange',
			'transport' => 'postMessage'
		)
	);  

	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_4_button_color',
		array(
			'label'    => __( 'Button Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_4_button_color',
			'priority' => 10
		) 
	));
		
	$wp_customize->add_setting('medma_matix_sp_4_button_text',
		array(
		'default' => 'SHOP NOW',
		'transport' => 'postMessage')
	);

	$wp_customize->add_control(
		'medma_matix_sp_4_button_text',
		array(
			'label' => 'Button Text',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_4_button_text',
			'type' => 'text',
		)
	);
		
	$wp_customize->add_setting( 'medma_matix_sp_4_text_color',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage'
		)
	);  

	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_4_text_color',
		array(
			'label'    => __( 'Button Text Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_4_text_color',
			'priority' => 10
		) 
	));
		
	$wp_customize->add_setting('medma_matix_sp_4_button_link',
		array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'medma_mtx_validate_button_url')
	);
		
	$wp_customize->add_control(
		'medma_matix_sp_4_button_link',
		array(
			'label' => 'Button Link',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_4_button_link',
			'type' => 'text',
			'description' => 'Give url with http:// or https://',
		)
	);
 
/**
 * Customize fifth template.
 *
 * Set the setting for fifth template to 
 * change background image, button color, 
 * text color, button text and button link.
 *
 * @since    1.0.0
 */	   
  
	$wp_customize->add_setting('medma_matix_sp_5_background_img',
		array(
		'default' => plugins_url('../../includes/img/Dots_.jpg', __FILE__ ),
		'transport' => 'postMessage')
	);
		
		
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_5_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_5_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
	   
	$wp_customize->add_setting( 'medma_matix_sp_5_button_border_color',
		array(
			'default' => '#FF5E00',
			'transport' => 'postMessage'
		)
	);  
		
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_5_button_border_color',
		array(
			'label'    => __( 'Button Border Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_5_button_border_color',
			'priority' => 10
		) 
	));
		
	$wp_customize->add_setting('medma_matix_sp_5_button_text',
		array(
		'default' => 'SHOP NOW',
		'transport' => 'postMessage')
	);
		
	$wp_customize->add_control(
		'medma_matix_sp_5_button_text',
		array(
			'label' => 'Button Text',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_5_button_text',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting( 'medma_matix_sp_5_text_color',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage'
		)
	);  
		
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_5_text_color',
		array(
			'label'    => __( 'Button Text Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_5_text_color',
			'priority' => 10
		) 
	));

	$wp_customize->add_setting('medma_matix_sp_5_button_link',
		array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'medma_mtx_validate_button_url')
	);
		
	$wp_customize->add_control(
		'medma_matix_sp_5_button_link',
		array(
			'label' => 'Button Link',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_5_button_link',
			'type' => 'text',
			'description' => 'Give url with http:// or https://',
		)
	);
	

/**
 * Customize sixth template.
 *
 * Set the setting for sixth template to 
 * change background image, button color, 
 * text color, button text and button link.
 *
 * @since    1.0.0
 */

	$wp_customize->add_setting('medma_matix_sp_6_background_img',
		array(
		'default' => plugins_url('../../includes/img/side_burger_image.png', __FILE__ ),
		'transport' => 'postMessage')
	);


	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_6_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_6_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
   
	$wp_customize->add_setting( 'medma_matix_sp_6_button_color',
		array(
			'default' => 'orange',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_6_button_color',
		array(
			'label'    => __( 'Button Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_6_button_color',
			'priority' => 10
		) 
	));

	$wp_customize->add_setting('medma_matix_sp_6_button_text',
		array(
		'default' => 'ORDER NOW',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_6_button_text',
		array(
			'label' => 'Button Text',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_6_button_text',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting( 'medma_matix_sp_6_text_color',
		array(
			'default' => '#f8f8e3',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_6_text_color',
		array(
			'label'    => __( 'Button Text Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_6_text_color',
			'priority' => 10
		) 
	));
	
	$wp_customize->add_setting('medma_matix_sp_6_button_link',
		array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'medma_mtx_validate_button_url')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_6_button_link',
		array(
			'label' => 'Button Link',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_6_button_link',
			'type' => 'text',
			'description' => 'Give url with http:// or https://',
		)
	);

	$wp_customize->add_setting('medma_matix_sp_mod_template_number',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_mod_template_number',
		array(
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_mod_template_number',
			'type' => 'hidden',
		)
	);
	

/**
 * Customize seventh template.
 *
 * Set the setting for seventh template to 
 * change background image and add newsletter
 * subscribe setting.
 *
 * @since    1.0.0
 */
	
	$wp_customize->add_setting('medma_matix_sp_7_background_img',
		array(
		'default' => plugins_url('../../includes/img/temp7.png', __FILE__ ),
		'transport' => 'postMessage')
	);


	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_7_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_7_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
   
	

	$wp_customize->add_setting('medma_matix_sp_7_newsletter_mail',
		array(
			'default' => 'mail_chimp',
			'transport' => 'postMessage',
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_7_newsletter_mail',
		array(
			'label' => 'Newsletter Subscribe',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_7_newsletter_mail',
			'type' => 'select',
			'choices' => array(
				'mail_chimp' => 'Mail Chimp',
				'mad_mimi' => 'Mad Mimi',
				'campaign_monitor' => 'Campaign Monitor',
				'constant_contact' => 'Constant Contact',
				'sendy' => 'Sendy',
				'get_response' => 'Get Response',
				'icontact' => 'iContact',
				'active_campaign' => 'Active Campaign',
			),
			'priority' => 12
		)
	);
		
/**
 * Customize eighth template.
 *
 * Set the setting for eighth template to 
 * change background image,buttons color,
 * buttons text and button link.
 *
 * @since    1.0.0
 */	 
 
	 $wp_customize->add_setting('medma_matix_sp_8_background_img',
		array(
		'default' => plugins_url('../../includes/img/temp8.png', __FILE__ ),
		'transport' => 'postMessage')
	);
		
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_8_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_8_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
	 
	 
	 
	 
	 $wp_customize->add_setting( 'medma_matix_sp_8_button_color1',
		array(
			'default' => '#FB0169',
			'transport' => 'postMessage'
		)
	);  

	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_8_button_color1',
		array(
			'label'    => __( 'Google Play Button Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_8_button_color1',
			'priority' => 10
		) 
	));
	
	$wp_customize->add_setting( 'medma_matix_sp_8_button_color2',
		array(
			'default' => '#FB0169',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_8_button_color2',
		array(
			'label'    => __( 'App Store Button Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_8_button_color2',
			'priority' => 10
		) 
	));


	$wp_customize->add_setting('medma_matix_sp_8_button_text1',
		array(
		'default' => 'SHOP NOW',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_8_button_text1',
		array(
			'label' => 'Google Play Button Text',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_8_button_text1',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting('medma_matix_sp_8_button_text2',
		array(
		'default' => 'SHOP NOW',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_8_button_text2',
		array(
			'label' => 'App Store Button Text',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_8_button_text2',
			'type' => 'text',
		)
	);
	
	
	
	$wp_customize->add_setting( 'medma_matix_sp_8_text_color',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_8_text_color',
		array(
			'label'    => __( 'Text Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_8_text_color',
			'priority' => 10
		) 
	));

	$wp_customize->add_setting('medma_matix_sp_8_button_link',
		array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'medma_mtx_validate_button_url')
	);

	$wp_customize->add_control(
		'medma_matix_sp_8_button_link',
		array(
			'label' => 'Button Link',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_8_button_link',
			'type' => 'text',
			'description' => 'Give url with http:// or https://',
		)
	);
	

/**
 * Customize ninth template.
 *
 * Set the setting for ninth template to 
 * change background image, button color and 
 * add newsletter subscribe setting.
 *
 * @since    1.0.0
 */

	$wp_customize->add_setting('medma_matix_sp_9_background_img',
		array(
		'default' => plugins_url('../../includes/img/temp9.png', __FILE__ ),
		'transport' => 'postMessage')
	);


	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_9_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_9_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
	 
	
	 $wp_customize->add_setting( 'medma_matix_sp_9_button_color',
		array(
			'default' => '#FB0169',
			'transport' => 'postMessage'
		)
	);  

	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_9_button_color',
		array(
			'label'    => __( 'Button Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_9_button_color',
			'priority' => 10
		) 
	));
	
	
	
	
	$wp_customize->add_setting('medma_matix_sp_9_newsletter_mail',
		array(
			'default' => 'mail_chimp',
			'transport' => 'postMessage',
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_9_newsletter_mail',
		array(
			'label' => 'Newsletter Subscribe',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_9_newsletter_mail',
			'type' => 'select',
			'choices' => array(
				'mail_chimp' => 'Mail Chimp',
				'mad_mimi' => 'Mad Mimi',
				'campaign_monitor' => 'Campaign Monitor',
				'constant_contact' => 'Constant Contact',
				'sendy' => 'Sendy',
				'get_response' => 'Get Response',
				'icontact' => 'iContact',
				'active_campaign' => 'Active Campaign',
			),
			'priority' => 12
		)
	);

/**
 * Customize tenth template.
 *
 * Set the setting for tenth template to 
 * change background image, link color 
 * and add newsletter subscribe setting.
 *
 * @since    1.0.0
 */
 
	$wp_customize->add_setting('medma_matix_sp_10_background_img',
		array(
		'default' => plugins_url('../../includes/img/temp10.png', __FILE__ ),
		'transport' => 'postMessage')
	);
	
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_10_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_10_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
	 
	
	$wp_customize->add_setting( 'medma_matix_sp_10_link_background_color',
		array(
			'default' => '#FB0169',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_10_link_background_color',
		array(
			'label'    => __( 'Link Background Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_10_link_background_color',
			'priority' => 10
		) 
	));
	
	
	
	$wp_customize->add_setting('medma_matix_sp_10_newsletter_mail',
		array(
			'default' => 'mail_chimp',
			'transport' => 'postMessage',
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_10_newsletter_mail',
		array(
			'label' => 'Newsletter Subscribe',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_10_newsletter_mail',
			'type' => 'select',
			'choices' => array(
				'mail_chimp' => 'Mail Chimp',
				'mad_mimi' => 'Mad Mimi',
				'campaign_monitor' => 'Campaign Monitor',
				'constant_contact' => 'Constant Contact',
				'sendy' => 'Sendy',
				'get_response' => 'Get Response',
				'icontact' => 'iContact',
				'active_campaign' => 'Active Campaign',
			),
			'priority' => 12
		)
	);

/**
 * Customize eleventh template.
 *
 * Set the setting for eleventh template to 
 * change background image, background color and 
 * add newsletter subscribe setting.
 *
 * @since    1.0.0
 */

	$wp_customize->add_setting( 'medma_matix_sp_11_background_color',
		array(
			'default' => '#fff',
			'transport' => 'postMessage'
		)
	);  
		
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_11_background_color',
		array(
			'label'    => __( 'Background Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_11_background_color',
			'priority' => 10
		) 
	));
	$wp_customize->add_setting('medma_matix_sp_11_background_img',
		array(
		'default' => plugins_url('../../includes/img/temp11.jpg', __FILE__ ),
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_11_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_11_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
	
	$wp_customize->add_setting('medma_matix_sp_11_newsletter_mail',
		array(
			'default' => 'mail_chimp',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control(
		'medma_matix_sp_11_newsletter_mail',
		array(
			'label' => 'Newsletter Subscribe',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_11_newsletter_mail',
			'type' => 'select',
			'choices' => array(
				'mail_chimp' => 'Mail Chimp',
				'mad_mimi' => 'Mad Mimi',
				'campaign_monitor' => 'Campaign Monitor',
				'constant_contact' => 'Constant Contact',
				'sendy' => 'Sendy',
				'get_response' => 'Get Response',
				'icontact' => 'iContact',
				'active_campaign' => 'Active Campaign',
			),
			'priority' => 12
		)
	);


/**
 * Customize twelve template.
 *
 * Set the setting for twelve template to 
 * change background color, background image and 
 * add newsletter subscribe setting.
 *
 * @since    1.0.0
 */

 $wp_customize->add_setting( 'medma_matix_sp_12_background_color',
		array(
			'default' => '#58EF98',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_12_background_color',
		array(
			'label'    => __( 'Background Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_12_background_color',
			'priority' => 10
		) 
	));
 $wp_customize->add_setting('medma_matix_sp_12_background_img',
		array(
		'default' => plugins_url('../../includes/img/temp12.jpg', __FILE__ ),
		'transport' => 'postMessage')
	);
	
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_12_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_12_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
	
	
	$wp_customize->add_setting('medma_matix_sp_12_newsletter_mail',
		array(
			'default' => 'mail_chimp',
			'transport' => 'postMessage',
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_12_newsletter_mail',
		array(
			'label' => 'Newsletter Subscribe',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_12_newsletter_mail',
			'type' => 'select',
			'choices' => array(
				'mail_chimp' => 'Mail Chimp',
				'mad_mimi' => 'Mad Mimi',
				'campaign_monitor' => 'Campaign Monitor',
				'constant_contact' => 'Constant Contact',
				'sendy' => 'Sendy',
				'get_response' => 'Get Response',
				'icontact' => 'iContact',
				'active_campaign' => 'Active Campaign',
			),
			'priority' => 12
		)
	);
	
/**
 * Customize thirteenth template.
 *
 * Set the setting for thirteenth template to 
 * change background color, background image and 
 * add newsletter subscribe setting.
 *
 * @since    1.0.0
 */

 //~ $wp_customize->add_setting( 'medma_matix_sp_13_background_color',
		//~ array(
			//~ 'default' => '#222222',
			//~ 'transport' => 'postMessage'
		//~ )
	//~ );  
	//~ 
	//~ $wp_customize->add_control( new WP_Customize_Color_Control( 
		//~ $wp_customize, 
		//~ 'medma_matix_sp_13_background_color',
		//~ array(
			//~ 'label'    => __( 'Background Color', 'mytheme' ), 
			//~ 'section'  => 'mytheme_template_1',
			//~ 'settings' => 'medma_matix_sp_13_background_color',
			//~ 'priority' => 10
		//~ ) 
	//~ ));
 $wp_customize->add_setting('medma_matix_sp_13_background_img',
		array(
		'default' => plugins_url('../../includes/img/temp13.png', __FILE__ ),
		'transport' => 'postMessage')
	);
	
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_13_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_13_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
	
	$wp_customize->add_setting('medma_matix_sp_13_newsletter_mail',
		array(
			'default' => 'mail_chimp',
			'transport' => 'postMessage',
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_13_newsletter_mail',
		array(
			'label' => 'Newsletter Subscribe',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_13_newsletter_mail',
			'type' => 'select',
			'choices' => array(
				'mail_chimp' => 'Mail Chimp',
				'mad_mimi' => 'Mad Mimi',
				'campaign_monitor' => 'Campaign Monitor',
				'constant_contact' => 'Constant Contact',
				'sendy' => 'Sendy',
				'get_response' => 'Get Response',
				'icontact' => 'iContact',
				'active_campaign' => 'Active Campaign',
			),
			'priority' => 12
		)
	);
	
/**
 * Customize fourteenth template.
 *
 * Set the setting for fourteenth template to 
 * change background color, background image and 
 * add newsletter subscribe setting.
 *
 * @since    1.0.0
 */

 $wp_customize->add_setting( 'medma_matix_sp_14_background_color',
		array(
			'default' => '#E95D5C',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_14_background_color',
		array(
			'label'    => __( 'Background Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_14_background_color',
			'priority' => 10
		) 
	));
 $wp_customize->add_setting('medma_matix_sp_14_background_img',
		array(
		'default' => plugins_url('../../includes/img/temp14.jpg', __FILE__ ),
		'transport' => 'postMessage')
	);
	
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_14_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_14_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
	
	$wp_customize->add_setting('medma_matix_sp_14_newsletter_mail',
		array(
			'default' => 'mail_chimp',
			'transport' => 'postMessage',
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_14_newsletter_mail',
		array(
			'label' => 'Newsletter Subscribe',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_14_newsletter_mail',
			'type' => 'select',
			'choices' => array(
				'mail_chimp' => 'Mail Chimp',
				'mad_mimi' => 'Mad Mimi',
				'campaign_monitor' => 'Campaign Monitor',
				'constant_contact' => 'Constant Contact',
				'sendy' => 'Sendy',
				'get_response' => 'Get Response',
				'icontact' => 'iContact',
				'active_campaign' => 'Active Campaign',
			),
			'priority' => 12
		)
	);
	
/**
 * Customize fifteenth template.
 *
 * Set the setting for fifteenth template to 
 * change background color, background image and 
 * add newsletter subscribe setting.
 *
 * @since    1.0.0
 */
 
	$wp_customize->add_setting('medma_matix_sp_15_background_img',
		array(
		'default' => plugins_url('../../includes/img/temp15.jpg', __FILE__ ),
		'transport' => 'postMessage')
	);
	
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_15_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_15_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
	
	 
	
	$wp_customize->add_setting('medma_matix_sp_15_newsletter_mail',
		array(
			'default' => 'mail_chimp',
			'transport' => 'postMessage',
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_15_newsletter_mail',
		array(
			'label' => 'Newsletter Subscribe',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_15_newsletter_mail',
			'type' => 'select',
			'choices' => array(
				'mail_chimp' => 'Mail Chimp',
				'mad_mimi' => 'Mad Mimi',
				'campaign_monitor' => 'Campaign Monitor',
				'constant_contact' => 'Constant Contact',
				'sendy' => 'Sendy',
				'get_response' => 'Get Response',
				'icontact' => 'iContact',
				'active_campaign' => 'Active Campaign',
			),
			'priority' => 12
		)
	);
	
	
/**
 * Customize sixteenth template.
 *
 * Set the setting for sixteenth template to 
 * change background image, background color 
 * and add newsletter subscribe setting.
 *
 * @since    1.0.0
 */
 
	$wp_customize->add_setting('medma_matix_sp_16_background_img',
		array(
		'default' => plugins_url('../../includes/img/temp16.jpg', __FILE__ ),
		'transport' => 'postMessage')
	);
	
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'medma_matix_sp_16_background_img',
		   array(
			   'label'      => __( 'Upload a background Image', 'mytheme_template_1' ),
			   'section'    => 'mytheme_template_1',
			   'settings'   => 'medma_matix_sp_16_background_img',
			   'context'    => 'Backgrounnd Image' 
		   )
	   )
	);
	
	 $wp_customize->add_setting( 'medma_matix_sp_16_background_color',
		array(
			'default' => '#ffdb64',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_16_background_color',
		array(
			'label'    => __( 'Background Color', 'mytheme' ), 
			'section'  => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_16_background_color',
			'priority' => 10
		) 
	));
	
	
	 
	
	

	
	$wp_customize->add_setting('medma_matix_sp_16_newsletter_mail',
		array(
			'default' => 'mail_chimp',
			'transport' => 'postMessage',
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_16_newsletter_mail',
		array(
			'label' => 'Newsletter Subscribe',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_16_newsletter_mail',
			'type' => 'select',
			'choices' => array(
				'mail_chimp' => 'Mail Chimp',
				'mad_mimi' => 'Mad Mimi',
				'campaign_monitor' => 'Campaign Monitor',
				'constant_contact' => 'Constant Contact',
				'sendy' => 'Sendy',
				'get_response' => 'Get Response',
				'icontact' => 'iContact',
				'active_campaign' => 'Active Campaign',
			),
			'priority' => 12
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_mail_chimp_list_id',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_mail_chimp_list_id',
		array(
			'label' => 'List Id',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_mail_chimp_list_id',
			'type' => 'text',
			'priority' => 13
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_mail_chimp_api_key',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_mail_chimp_api_key',
		array(
			'label' => 'API Key',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_mail_chimp_api_key',
			'type' => 'text',
			'priority' => 14
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_mail_chimp_data_center',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_mail_chimp_data_center',
		array(
			'label' => 'Data Center number',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_mail_chimp_data_center',
			'type' => 'text',
			'priority' => 15
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_mad_mimi_username',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_mad_mimi_username',
		array(
			'label' => 'Username',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_mad_mimi_username',
			'type' => 'text',
			'priority' => 13
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_mad_mimi_api_key',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_mad_mimi_api_key',
		array(
			'label' => 'API Key',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_mad_mimi_api_key',
			'type' => 'text',
			'priority' => 14
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_mad_mimi_list_name',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_mad_mimi_list_name',
		array(
			'label' => 'List Name',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_mad_mimi_list_name',
			'type' => 'text',
			'priority' => 15
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_campaign_list_id',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_campaign_list_id',
		array(
			'label' => 'List Id',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_campaign_list_id',
			'type' => 'text',
			'priority' => 13
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_campaign_api_key',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_campaign_api_key',
		array(
			'label' => 'API Key',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_campaign_api_key',
			'type' => 'text',
			'priority' => 14
		)
	);

	$wp_customize->add_setting('medma_matix_sp_sendy_url',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_sendy_url',
		array(
			'label' => 'Sendy URL',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_sendy_url',
			'type' => 'text',
			'priority' => 13
		)
	);	
	
	$wp_customize->add_setting('medma_matix_sp_get_response_campaign_id',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_get_response_campaign_id',
		array(
			'label' => 'Campaign Id',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_get_response_campaign_id',
			'type' => 'text',
			'priority' => 13
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_get_response_api_key',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_get_response_api_key',
		array(
			'label' => 'API Key',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_get_response_api_key',
			'type' => 'text',
			'priority' => 14
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_icontact_api_id',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_icontact_api_id',
		array(
			'label' => 'APP Id',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_icontact_api_id',
			'type' => 'text',
			'priority' => 13
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_icontact_username',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_icontact_username',
		array(
			'label' => 'Username',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_icontact_username',
			'type' => 'text',
			'priority' => 14
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_icontact_api_pwd',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_icontact_api_pwd',
		array(
			'label' => 'API Password',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_icontact_api_pwd',
			'type' => 'text',
			'priority' => 15
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_icontact_api_version',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_icontact_api_version',
		array(
			'label' => 'API Version',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_icontact_api_version',
			'type' => 'text',
			'priority' => 16
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_icontact_api_url',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_icontact_api_url',
		array(
			'label' => 'API URL',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_icontact_api_url',
			'type' => 'text',
			'priority' => 17
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_icontact_list_id',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_icontact_list_id',
		array(
			'label' => 'List Id',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_icontact_list_id',
			'type' => 'text',
			'priority' => 18
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_active_list_id',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_active_list_id',
		array(
			'label' => 'List Id',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_active_list_id',
			'type' => 'text',
			'priority' => 13
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_active_api_key',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_active_api_key',
		array(
			'label' => 'API Key',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_active_api_key',
			'type' => 'text',
			'priority' => 14
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_active_account_name',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_active_account_name',
		array(
			'label' => 'Account Name',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_active_account_name',
			'type' => 'text',
			'priority' => 15
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_constant_contact_list_id',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_constant_contact_list_id',
		array(
			'label' => 'List Id',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_constant_contact_list_id',
			'type' => 'text',
			'priority' => 13
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_constant_contact_auth',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_constant_contact_auth',
		array(
			'label' => 'Authentication Key',
			'section' => 'mytheme_template_1',
			'settings' => 'medma_matix_sp_constant_contact_auth',
			'type' => 'text',
			'priority' => 14
		)
	);

	
function medma_mtx_my_customizer_script(){
	$strip_message = get_option('medma_matix_sp_strip_message');
?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {

			var topbar_style = $( '.customize-control' );
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
			
			var strip_template_no = $('#customize-control-medma_matix_sp_mod_strip_template_number input').val();
			if(strip_template_no !== undefined){
				if(strip_template_no == 1){
					$('#customize-control-medma_matix_sp_strip_1_back_color').show();
					$('#customize-control-medma_matix_sp_strip_1_button_color').show();
					$('#customize-control-medma_matix_sp_strip_1_button_text').show();
					$('#customize-control-medma_matix_sp_strip_1_button_text_color').show();
				}
				else if(strip_template_no == 2){
					$('#customize-control-medma_matix_sp_strip_2_back_color').show();
					$('#customize-control-medma_matix_sp_strip_2_button_color').show();
					$('#customize-control-medma_matix_sp_strip_2_button_text').show();
					$('#customize-control-medma_matix_sp_strip_2_button_text_color').show();
					$('#customize-control-medma_matix_sp_strip_2_side_image').show();
				}
				else if(strip_template_no == 3){
					$('#customize-control-medma_matix_sp_strip_3_back_color').show();
					$('#customize-control-medma_matix_sp_strip_3_button_color').show();
					$('#customize-control-medma_matix_sp_strip_3_button_text').show();
					$('#customize-control-medma_matix_sp_strip_3_button_text_color').show();
					$('#customize-control-medma_matix_sp_strip_3_side_image').show();
				}
				else if(strip_template_no == 4){
					$('#customize-control-medma_matix_sp_strip_4_back_image').show();
					$('#customize-control-medma_matix_sp_strip_4_button_color').show();
					$('#customize-control-medma_matix_sp_strip_4_button_text').show();
					$('#customize-control-medma_matix_sp_strip_4_button_text_color').show();
				}
			}
			
			$('#customize-control-medma_matix_sp_1_background_img').hide();
			$('#customize-control-medma_matix_sp_1_button_color').hide();
			$('#customize-control-medma_matix_sp_1_button_text').hide();
			$('#customize-control-medma_matix_sp_1_button_text_color').hide();
			$('#customize-control-medma_matix_sp_1_button_link').hide();
			
			$('#customize-control-medma_matix_sp_2_button_color').hide();
			$('#customize-control-medma_matix_sp_2_button_text').hide();
			$('#customize-control-medma_matix_sp_2_text_color').hide();
			$('#customize-control-medma_matix_sp_2_button_link').hide();
			
			$('#customize-control-medma_matix_sp_3_button_color').hide();
			$('#customize-control-medma_matix_sp_3_button_text').hide();
			$('#customize-control-medma_matix_sp_3_text_color').hide();
			$('#customize-control-medma_matix_sp_3_background_img').hide();
			$('#customize-control-medma_matix_sp_3_opacity').hide();
			$('#customize-control-medma_matix_sp_3_button_link').hide();
			
			$('#customize-control-medma_matix_sp_4_button_color').hide();
			$('#customize-control-medma_matix_sp_4_button_text').hide();
			$('#customize-control-medma_matix_sp_4_text_color').hide();
			$('#customize-control-medma_matix_sp_4_background_img').hide();
			$('#customize-control-medma_matix_sp_4_button_link').hide();
			
			$('#customize-control-medma_matix_sp_5_button_border_color').hide();
			$('#customize-control-medma_matix_sp_5_button_text').hide();
			$('#customize-control-medma_matix_sp_5_text_color').hide();
			$('#customize-control-medma_matix_sp_5_background_img').hide();
			$('#customize-control-medma_matix_sp_5_button_link').hide();
			
			$('#customize-control-medma_matix_sp_6_button_color').hide();
			$('#customize-control-medma_matix_sp_6_button_text').hide();
			$('#customize-control-medma_matix_sp_6_text_color').hide();
			$('#customize-control-medma_matix_sp_6_background_img').hide();
			$('#customize-control-medma_matix_sp_6_button_link').hide();
			
			
			$('#customize-control-medma_matix_sp_7_background_img').hide();
			$('#customize-control-medma_matix_sp_7_newsletter_mail').hide();
			
			
			
			$('#customize-control-medma_matix_sp_8_button_color1').hide();
			$('#customize-control-medma_matix_sp_8_button_color2').hide();
			$('#customize-control-medma_matix_sp_8_button_text1').hide();
			$('#customize-control-medma_matix_sp_8_button_text2').hide();
			$('#customize-control-medma_matix_sp_8_text_color').hide();
			$('#customize-control-medma_matix_sp_8_background_img').hide();
			$('#customize-control-medma_matix_sp_8_button_link').hide();
			
			$('#customize-control-medma_matix_sp_9_button_color').hide();
			$('#customize-control-medma_matix_sp_9_background_img').hide();
			$('#customize-control-medma_matix_sp_9_newsletter_mail').hide();
			
			$('#customize-control-medma_matix_sp_10_background_img').hide();
			$('#customize-control-medma_matix_sp_10_link_background_color').hide();
			$('#customize-control-medma_matix_sp_10_newsletter_mail').hide();
			
			
			$('#customize-control-medma_matix_sp_11_background_img').hide();
			$('#customize-control-medma_matix_sp_11_background_color').hide();
			$('#customize-control-medma_matix_sp_11_newsletter_mail').hide();
			
			$('#customize-control-medma_matix_sp_12_background_img').hide();
			$('#customize-control-medma_matix_sp_12_background_color').hide();
			$('#customize-control-medma_matix_sp_12_newsletter_mail').hide();
			
			
			$('#customize-control-medma_matix_sp_13_background_img').hide();
			//$('#customize-control-medma_matix_sp_13_background_color').hide();
			$('#customize-control-medma_matix_sp_13_newsletter_mail').hide();
			
			
			$('#customize-control-medma_matix_sp_14_background_img').hide();
			$('#customize-control-medma_matix_sp_14_background_color').hide();
			$('#customize-control-medma_matix_sp_14_newsletter_mail').hide();
			
			$('#customize-control-medma_matix_sp_15_background_img').hide();
			$('#customize-control-medma_matix_sp_15_newsletter_mail').hide();
			
			$('#customize-control-medma_matix_sp_16_background_img').hide();
			$('#customize-control-medma_matix_sp_16_background_color').hide();
			$('#customize-control-medma_matix_sp_16_newsletter_mail').hide();
			
			var template_no = $('#customize-control-medma_matix_sp_mod_template_number input').val();
			if(template_no == ''){
				template_no = 1;
				$('#customize-control-medma_matix_sp_mod_strip_template_number input').val('1');
			}
			var mail_select = '';
			if(template_no == 1){
				$('#customize-control-medma_matix_sp_1_background_img').show();
				$('#customize-control-medma_matix_sp_1_button_color').show();
				$('#customize-control-medma_matix_sp_1_button_text').show();
				$('#customize-control-medma_matix_sp_1_button_text_color').show();
				$('#customize-control-medma_matix_sp_1_button_link').show();
				mail_select = '';
			}
			else if(template_no == 2){
				$('#customize-control-medma_matix_sp_2_button_color').show();
				$('#customize-control-medma_matix_sp_2_button_text').show();
				$('#customize-control-medma_matix_sp_2_text_color').show();
				$('#customize-control-medma_matix_sp_2_button_link').show();
				mail_select = '';
			}
			else if(template_no == 3){
				$('#customize-control-medma_matix_sp_3_button_color').show();
				$('#customize-control-medma_matix_sp_3_button_text').show();
				$('#customize-control-medma_matix_sp_3_text_color').show();
				$('#customize-control-medma_matix_sp_3_opacity').show();
				$('#customize-control-medma_matix_sp_3_background_img').show();
				$('#customize-control-medma_matix_sp_3_button_link').show();
				mail_select = '';
			}
			else if(template_no == 4){
				$('#customize-control-medma_matix_sp_4_button_color').show();
				$('#customize-control-medma_matix_sp_4_button_text').show();
				$('#customize-control-medma_matix_sp_4_text_color').show();
				$('#customize-control-medma_matix_sp_4_background_img').show();
				$('#customize-control-medma_matix_sp_4_button_link').show();
				mail_select = '';
			}
			else if(template_no == 5){
				$('#customize-control-medma_matix_sp_5_button_border_color').show();
				$('#customize-control-medma_matix_sp_5_button_text').show();
				$('#customize-control-medma_matix_sp_5_text_color').show();
				$('#customize-control-medma_matix_sp_5_background_img').show();
				$('#customize-control-medma_matix_sp_5_button_link').show();
				mail_select = '';
			}
			else if(template_no == 6){
				$('#customize-control-medma_matix_sp_6_button_color').show();
				$('#customize-control-medma_matix_sp_6_button_text').show();
				$('#customize-control-medma_matix_sp_6_text_color').show();
				$('#customize-control-medma_matix_sp_6_background_img').show();
				$('#customize-control-medma_matix_sp_6_button_link').show();
				mail_select = '';
			}
			else if(template_no == 7){
				$('#customize-control-medma_matix_sp_7_background_img').show();
				$('#customize-control-medma_matix_sp_7_newsletter_mail').show();
				mail_select = $('#customize-control-medma_matix_sp_7_newsletter_mail');
			}
			else if(template_no == 8){
				$('#customize-control-medma_matix_sp_8_button_color1').show();
				$('#customize-control-medma_matix_sp_8_button_color2').show();
				$('#customize-control-medma_matix_sp_8_button_text1').show();
				$('#customize-control-medma_matix_sp_8_button_text2').show();
				$('#customize-control-medma_matix_sp_8_text_color').show();
				$('#customize-control-medma_matix_sp_8_background_img').show();
				$('#customize-control-medma_matix_sp_8_button_link').show();
				mail_select = '';
			}
			else if(template_no == 9){
				$('#customize-control-medma_matix_sp_9_button_color').show();
				$('#customize-control-medma_matix_sp_9_background_img').show();
				$('#customize-control-medma_matix_sp_9_newsletter_mail').show();
				mail_select = $('#customize-control-medma_matix_sp_9_newsletter_mail');
			}
			else if(template_no == 10){
				$('#customize-control-medma_matix_sp_10_link_background_color').show();
				$('#customize-control-medma_matix_sp_10_background_img').show();
				$('#customize-control-medma_matix_sp_10_newsletter_mail').show();
				mail_select = $('#customize-control-medma_matix_sp_10_newsletter_mail');
			}
			else if(template_no == 11){
				$('#customize-control-medma_matix_sp_11_background_img').show();
				$('#customize-control-medma_matix_sp_11_background_color').show();
				$('#customize-control-medma_matix_sp_11_newsletter_mail').show();
				mail_select = $('#customize-control-medma_matix_sp_11_newsletter_mail');
			}
			else if(template_no == 12){
				$('#customize-control-medma_matix_sp_12_background_img').show();
				$('#customize-control-medma_matix_sp_12_background_color').show();
				$('#customize-control-medma_matix_sp_12_newsletter_mail').show();
				mail_select = $('#customize-control-medma_matix_sp_12_newsletter_mail');
			}
			else if(template_no == 13){
				$('#customize-control-medma_matix_sp_13_background_img').show();
				//$('#customize-control-medma_matix_sp_13_background_color').show();
				$('#customize-control-medma_matix_sp_13_newsletter_mail').show();
				mail_select = $('#customize-control-medma_matix_sp_13_newsletter_mail');
			}
			else if(template_no == 14){
				$('#customize-control-medma_matix_sp_14_background_img').show();
				$('#customize-control-medma_matix_sp_14_background_color').show();
				$('#customize-control-medma_matix_sp_14_newsletter_mail').show();
				mail_select = $('#customize-control-medma_matix_sp_14_newsletter_mail');
			}
			else if(template_no == 15){
				$('#customize-control-medma_matix_sp_15_background_img').show();
				$('#customize-control-medma_matix_sp_15_newsletter_mail').show();
				mail_select = $('#customize-control-medma_matix_sp_15_newsletter_mail');
			}
			else if(template_no == 16){
				$('#customize-control-medma_matix_sp_16_background_img').show();
				$('#customize-control-medma_matix_sp_16_background_color').show();
				$('#customize-control-medma_matix_sp_16_newsletter_mail').show();
				mail_select = $('#customize-control-medma_matix_sp_16_newsletter_mail');
			}
			var border_status = $('input[type=radio][name=_customize-radio-medma_matix_sp_border_activeStatus]').attr('checked');
			if(border_status == undefined || border_status == 'false'){
				$('#customize-control-medma_matix_sp_popup_borderColor').hide();
				$('#customize-control-medma_matix_sp_popup_borderWidth').hide();
			}
			else {
				$('#customize-control-medma_matix_sp_popup_borderColor').show();
				$('#customize-control-medma_matix_sp_popup_borderWidth').show();
			}
			
			$('input[type=radio][name=_customize-radio-medma_matix_sp_border_activeStatus]').change(function() {
				if (this.value == 'enable') {
					$('#customize-control-medma_matix_sp_popup_borderColor').show();
					$('#customize-control-medma_matix_sp_popup_borderWidth').show();
				}
				else {
					$('#customize-control-medma_matix_sp_popup_borderColor').hide();
					$('#customize-control-medma_matix_sp_popup_borderWidth').hide();
				}
			});
			
			$('#customize-control-medma_matix_sp_mail_chimp_list_id').hide();
			$('#customize-control-medma_matix_sp_mail_chimp_api_key').hide();
			$('#customize-control-medma_matix_sp_mail_chimp_data_center').hide();
			$('#customize-control-medma_matix_sp_mad_mimi_username').hide();
			$('#customize-control-medma_matix_sp_mad_mimi_api_key').hide();
			$('#customize-control-medma_matix_sp_mad_mimi_list_name').hide();
			$('#customize-control-medma_matix_sp_campaign_list_id').hide();
			$('#customize-control-medma_matix_sp_campaign_api_key').hide();
			$('#customize-control-medma_matix_sp_sendy_url').hide();
			$('#customize-control-medma_matix_sp_get_response_campaign_id').hide();
			$('#customize-control-medma_matix_sp_get_response_api_key').hide();
			$('#customize-control-medma_matix_sp_icontact_api_id').hide();
			$('#customize-control-medma_matix_sp_icontact_username').hide();
			$('#customize-control-medma_matix_sp_icontact_api_pwd').hide();
			$('#customize-control-medma_matix_sp_icontact_api_version').hide();
			$('#customize-control-medma_matix_sp_icontact_api_url').hide();
			$('#customize-control-medma_matix_sp_icontact_list_id').hide();
			$('#customize-control-medma_matix_sp_active_list_id').hide();
			$('#customize-control-medma_matix_sp_active_api_key').hide();
			$('#customize-control-medma_matix_sp_active_account_name').hide();
			$('#customize-control-medma_matix_sp_constant_contact_list_id').hide();
			$('#customize-control-medma_matix_sp_constant_contact_auth').hide();
			
			
			if(mail_select != ''){
				var mail_status = mail_select.find('select').val();
				if(mail_status == 'mail_chimp'){
					$('#customize-control-medma_matix_sp_mail_chimp_list_id').show();
					$('#customize-control-medma_matix_sp_mail_chimp_api_key').show();
					$('#customize-control-medma_matix_sp_mail_chimp_data_center').show();
				}
				else if(mail_status == 'mad_mimi'){
					$('#customize-control-medma_matix_sp_mad_mimi_username').show();
					$('#customize-control-medma_matix_sp_mad_mimi_api_key').show();
					$('#customize-control-medma_matix_sp_mad_mimi_list_name').show();
				}
				else if(mail_status == 'campaign_monitor'){
					$('#customize-control-medma_matix_sp_campaign_list_id').show();
					$('#customize-control-medma_matix_sp_campaign_api_key').show();
				}
				else if(mail_status == 'sendy'){
					$('#customize-control-medma_matix_sp_sendy_url').show();
				}
				else if(mail_status == 'get_response'){
					$('#customize-control-medma_matix_sp_get_response_campaign_id').show();
					$('#customize-control-medma_matix_sp_get_response_api_key').show();
				}
				else if(mail_status == 'icontact'){
					$('#customize-control-medma_matix_sp_icontact_api_id').show();
					$('#customize-control-medma_matix_sp_icontact_username').show();
					$('#customize-control-medma_matix_sp_icontact_api_pwd').show();
					$('#customize-control-medma_matix_sp_icontact_api_version').show();
					$('#customize-control-medma_matix_sp_icontact_api_url').show();
					$('#customize-control-medma_matix_sp_icontact_list_id').show();
				}
				else if(mail_status == 'active_campaign'){
					$('#customize-control-medma_matix_sp_active_list_id').show();
					$('#customize-control-medma_matix_sp_active_api_key').show();
					$('#customize-control-medma_matix_sp_active_account_name').show();
				}
				else if(mail_status == 'constant_contact'){
					$('#customize-control-medma_matix_sp_constant_contact_list_id').show();
					$('#customize-control-medma_matix_sp_constant_contact_auth').show();
				}
			}
			
			if(mail_select !== ''){
				
				mail_select.find('select').change(function() {
					
					$('#customize-control-medma_matix_sp_mail_chimp_list_id').hide();
					$('#customize-control-medma_matix_sp_mail_chimp_api_key').hide();
					$('#customize-control-medma_matix_sp_mail_chimp_data_center').hide();
					$('#customize-control-medma_matix_sp_mad_mimi_username').hide();
					$('#customize-control-medma_matix_sp_mad_mimi_api_key').hide();
					$('#customize-control-medma_matix_sp_mad_mimi_list_name').hide();
					$('#customize-control-medma_matix_sp_campaign_list_id').hide();
					$('#customize-control-medma_matix_sp_campaign_api_key').hide();
					$('#customize-control-medma_matix_sp_sendy_url').hide();
					$('#customize-control-medma_matix_sp_get_response_campaign_id').hide();
					$('#customize-control-medma_matix_sp_get_response_api_key').hide();
					$('#customize-control-medma_matix_sp_icontact_api_id').hide();
					$('#customize-control-medma_matix_sp_icontact_username').hide();
					$('#customize-control-medma_matix_sp_icontact_api_pwd').hide();
					$('#customize-control-medma_matix_sp_icontact_api_version').hide();
					$('#customize-control-medma_matix_sp_icontact_api_url').hide();
					$('#customize-control-medma_matix_sp_icontact_list_id').hide();
					$('#customize-control-medma_matix_sp_active_list_id').hide();
					$('#customize-control-medma_matix_sp_active_api_key').hide();
					$('#customize-control-medma_matix_sp_active_account_name').hide();
					$('#customize-control-medma_matix_sp_constant_contact_list_id').hide();
					$('#customize-control-medma_matix_sp_constant_contact_auth').hide();
				
					if(this.value == 'mail_chimp'){
						$('#customize-control-medma_matix_sp_mail_chimp_list_id').show();
						$('#customize-control-medma_matix_sp_mail_chimp_api_key').show();
						$('#customize-control-medma_matix_sp_mail_chimp_data_center').show();
					}
					else if(this.value == 'mad_mimi'){
						$('#customize-control-medma_matix_sp_mad_mimi_username').show();
						$('#customize-control-medma_matix_sp_mad_mimi_api_key').show();
						$('#customize-control-medma_matix_sp_mad_mimi_list_name').show();
					}
					else if(this.value == 'campaign_monitor'){
						$('#customize-control-medma_matix_sp_campaign_list_id').show();
						$('#customize-control-medma_matix_sp_campaign_api_key').show();
					}
					else if(this.value == 'sendy'){
						$('#customize-control-medma_matix_sp_sendy_url').show();
					}
					else if(this.value == 'get_response'){
						$('#customize-control-medma_matix_sp_get_response_campaign_id').show();
						$('#customize-control-medma_matix_sp_get_response_api_key').show();
					}
					else if(this.value == 'icontact'){
						$('#customize-control-medma_matix_sp_icontact_api_id').show();
						$('#customize-control-medma_matix_sp_icontact_username').show();
						$('#customize-control-medma_matix_sp_icontact_api_pwd').show();
						$('#customize-control-medma_matix_sp_icontact_api_version').show();
						$('#customize-control-medma_matix_sp_icontact_api_url').show();
						$('#customize-control-medma_matix_sp_icontact_list_id').show();
					}
					else if(this.value == 'active_campaign'){
						$('#customize-control-medma_matix_sp_active_list_id').show();
						$('#customize-control-medma_matix_sp_active_api_key').show();
						$('#customize-control-medma_matix_sp_active_account_name').show();
					}
					else if(this.value == 'constant_contact'){
						$('#customize-control-medma_matix_sp_constant_contact_list_id').show();
						$('#customize-control-medma_matix_sp_constant_contact_auth').show();
					}
				});
			}
		});
	</script>
<?php
}

add_action( 'customize_controls_print_footer_scripts', 'medma_mtx_my_customizer_script' );
	

function medma_mtx_validate_button_url($input){
	if (preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$input)){
		return $input;
	}else{
		return '';
	}
	
}
	
