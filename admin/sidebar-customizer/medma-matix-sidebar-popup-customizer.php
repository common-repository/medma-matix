<?php  

/**
 * Begins sidebar Customizer popup.
 *
 * Set the customize options for popup like change popup 
 * positions, popup fadeIn/fadeOut, popup border width,
 * popup width and hieght, popup visiting time, popup 
 * enable/disable, popup status etc. Add to scripts for 
 * customize popup settings 
 * 
 * @since    1.0.0
 */
  


	

 	
	$wp_customize->add_section( 
		'mytheme_popup_content_options', 
		array(
			'title'       => __( 'Popup Content', 'mytheme' ),
			'priority'    => 100,
			'capability'  => 'edit_theme_options',
			'description' => __('Change popup content options here.', 'mytheme'), 
		) 
    );
    
    
    $wp_customize->add_setting('medma_matix_sp_popup_content_option',
		array(
			'default' => 'nopopup',
			'transport' => 'refresh'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_content_option',
		array(
			'label' => 'Popup Content',
			'section' => 'mytheme_popup_content_options',
			'settings' => 'medma_matix_sp_popup_content_option',
			'type' => 'select',
			'choices' => array(
				'nopopup' => 'No Popup',
				'custom' => 'Custom',
				'form' => 'Contact Form',
				'image' => 'Slide Show Of Image',
				'video' => 'Upload Video',
				'template' => 'Template',
			),
			'description' => 'On selecting option template, you would be redirect to select template page.',
		)
	);
	
    $wp_customize->add_setting( 'medma_matix_sp_popup_video_content', array(
	    'default' => '<iframe src="https://player.vimeo.com/video/211551365" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
	    'transport' => 'refresh'
	) );

	$wp_customize->add_control( 'medma_matix_sp_popup_video_content', array(
	    'type' => 'textarea',
	    'section' => 'mytheme_popup_content_options', // // Add a default or your own section
	    'label' => __( 'Video Iframe src' ),
	) );
	
	
	
	$wp_customize->add_setting('medma_matix_sp_popup_image_count',
		array(
		'default' => '0',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_image_count',
		array(
			'section' => 'mytheme_popup_content_options',
			'settings' => 'medma_matix_sp_popup_image_count',
			'type' => 'hidden',
		)
	);
	
/**
 * Upload 20 images
 */
	$imgArray = array();
	$j=1;
	for($img = 1; $img <= 20; $img++){
		if(get_theme_mod('medma_matix_sp_'.$img.'_image_url') == ''){
			
		}else{
			$imgArray[$j] = get_theme_mod('medma_matix_sp_'.$img.'_image_url');
			$j++;	
		}
		remove_theme_mod( 'medma_matix_sp_'.$img.'_image_url' );
		
	}
	
	for($k = 1; $k <= 20; $k++){
		if (array_key_exists($k, $imgArray)) {
			set_theme_mod( 'medma_matix_sp_'.$k.'_image_url', $imgArray[$k] );
		}
	}
	
	for($i = 1; $i <= 20; $i++){
		$wp_customize->add_setting('medma_matix_sp_'.$i.'_image_url',
			array(
			'default' => '',
			'transport' => 'refresh')
		);
		
		
		$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'medma_matix_sp_'.$i.'_image_url',
			   array(
				   'label'      => __( 'Upload a Image', 'mytheme_popup_content_options' ),
				   'section'    => 'mytheme_popup_content_options',
				   'settings'   => 'medma_matix_sp_'.$i.'_image_url',
				   'context'    => 'Image' 
			   )
		   )
		);
	}
	
  
	
	$wp_customize->add_control( 'add_image_button_id', array(
		'type' => 'button',
		'settings' => array(), 
		'priority' => 10,
		'section' => 'mytheme_popup_content_options',
		'input_attrs' => array(
			'value' => __( 'Add Image', 'textdomain' ), 
			'class' => 'button button-primary', 
		),
	) );
	
	
    $wp_customize->add_section( 
		'mytheme_popup_position_options', 
		array(
			'title'       => __( 'Popup Position Settings', 'mytheme' ),
			'priority'    => 100,
			'capability'  => 'edit_theme_options',
			'description' => __('Change popup position options here.', 'mytheme'), 
		) 
    );
    
    $wp_customize->add_setting('medma_matix_sp_popup_position',
		array(
			'default' => 'topcenter',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_position',
		array(
			'label' => 'Position of Popup',
			'section' => 'mytheme_popup_position_options',
			'settings' => 'medma_matix_sp_popup_position',
			'type' => 'select',
			'choices' => array(
				'topcenter' => 'Top Center',
				'center' => 'Center',
				'left' => 'Left',
				'right' => 'Right',
			),
		)
	);
    
    
     $wp_customize->add_setting('medma_matix_sp_popup_slideFrom',
		array(
			'default' => 'left',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_slideFrom',
		array(
			'label' => 'Popup Slide In',
			'section' => 'mytheme_popup_position_options',
			'settings' => 'medma_matix_sp_popup_slideFrom',
			'type' => 'select',
			'choices' => array(
				'left' => 'Left',
				'right' => 'Right',
				'top' => 'Top',
				'bottom' => 'Bottom',
				'none' => 'None',
			),
		)
	);
	
	
	 $wp_customize->add_setting('medma_matix_sp_popup_slideOutFrom',
		array(
			'default' => 'left',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_slideOutFrom',
		array(
			'label' => 'Popup Slide Out',
			'section' => 'mytheme_popup_position_options',
			'settings' => 'medma_matix_sp_popup_slideOutFrom',
			'type' => 'select',
			'choices' => array(
				'left' => 'Left',
				'right' => 'Right',
				'top' => 'Top',
				'bottom' => 'Bottom',
				'none' => 'None',
			),
		)
	);
	
	
	
	 $wp_customize->add_setting('medma_matix_sp_popup_fadeIn',
		array(
			'default' => 'none',
			'transport' => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_fadeIn',
		array(
			'label' => 'Popup Fade In',
			'section' => 'mytheme_popup_position_options',
			'settings' => 'medma_matix_sp_popup_fadeIn',
			'type' => 'radio',
			'choices' => array(
				'slow' => 'Slow',
				'fast' => 'Fast',
				'none' => 'None',
			),
		)
	);
	
    
    
  $wp_customize->add_section( 
		'mytheme_popup_options', 
		array(
			'title'       => __( 'Popup Configurations', 'mytheme' ),
			'priority'    => 100,
			'capability'  => 'edit_theme_options',
			'description' => __('Change popup options here.', 'mytheme'), 
		) 
    );
    
    
    $wp_customize->add_setting('medma_matix_sp_popup_width',
		array(
		'default' => '450',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_width',
		array(
			'label' => 'Popup Width',
			'section' => 'mytheme_popup_options',
			'settings' => 'medma_matix_sp_popup_width',
			'type' => 'number',
		)
	);
	
	
    
  
		$wp_customize->add_setting('medma_matix_sp_popup_height',
			array(
			'default' => '300',
			'transport' => 'postMessage')
		);
		
		$wp_customize->add_control(
			'medma_matix_sp_popup_height',
			array(
				'label' => 'Popup Height',
				'section' => 'mytheme_popup_options',
				'settings' => 'medma_matix_sp_popup_height',
				'type' => 'number',
			)
		);
	
	


	$wp_customize->add_setting(
		'medma_matix_sp_border_activeStatus',
		array(
			'default' => 'enable',
			'transport' => 'postMessage',
		)
	);
	 
	$wp_customize->add_control(
		'medma_matix_sp_border_activeStatus',
		array(
			'type' => 'radio',
			'label' => 'Popup Border Active Status',
			'section' => 'mytheme_popup_options',
			'choices' => array(
				'enable' => 'Enable',
				'disable' => 'Disable',
			),
		)
	);
	
	
	
	$wp_customize->add_setting( 'medma_matix_sp_popup_borderColor',
		array(
			'default' => '#000',
			'transport' => 'postMessage'
		)
	);  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'medma_matix_sp_popup_borderColor',
		array(
			'label'    => __( 'Popup Border Color', 'mytheme' ), 
			'section'  => 'mytheme_popup_options',
			'settings' => 'medma_matix_sp_popup_borderColor',
			'priority' => 10
		) 
	));
	
	
	$wp_customize->add_setting('medma_matix_sp_popup_borderWidth',
		array(
		'default' => '1',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_borderWidth',
		array(
			'label' => 'Popup Border Width',
			'section' => 'mytheme_popup_options',
			'settings' => 'medma_matix_sp_popup_borderWidth',
			'type' => 'number',
		)
	);
	
	
	$wp_customize->add_section( 
		'mytheme_popup_url', 
		array(
			'title'       => __( 'Popup Custom Settings', 'popupurl' ),
			'priority'    => 100,
			'capability'  => 'edit_theme_options',
			'description' => __('Change popup options here.', 'mytheme'), 
		) 
    );
    
    $wp_customize->add_setting('medma_matix_sp_popup_status',
		array(
			'default' => 'always',
			'transport' => 'postMessage'
			
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_status',
		array(
			'label' => 'Display Page',
			'section' => 'mytheme_popup_url',
			'settings' => 'medma_matix_sp_popup_status',
			'type' => 'select',
			'choices' => array(
				'always' => 'Always',
				'never' => 'Never',
				'secondtime' => 'If user is visisting[X] times in a day',
				'thirdpage' => 'If user is landing on [X] page on the site',
				'facebook' => 'If user is coming from facebook',
				'google' => 'If user is coming from google',
				'instagram' => 'If user is coming from instagram',
				'twitter' => 'If user is coming from twitter',
				'click' => 'If user clicks any element on page',
				'hover' => 'If user hover element on page',
				'scroll' => 'After User scrolls mouse',
				'inactive' => 'If User is inactive for [x] minute',
			),
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_popup_status_visiting',
		array(
		'default' => '2',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_status_visiting',
		array(
			'label' => 'Times',
			'section' => 'mytheme_popup_url',
			'settings' => 'medma_matix_sp_popup_status_visiting',
			'type' => 'number',
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_thirdpage',
		array(
		'default' => '1',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_thirdpage',
		array(
			'label' => 'No. of Page',
			'section' => 'mytheme_popup_url',
			'settings' => 'medma_matix_sp_thirdpage',
			'type' => 'number',
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_popup_status_element',
		array(
			'default' => 'class',
			'transport' => 'postMessage'
			
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_status_element',
		array(
			'label' => 'Element',
			'section' => 'mytheme_popup_url',
			'settings' => 'medma_matix_sp_popup_status_element',
			'type' => 'select',
			'choices' => array(
				'class' => 'Class',
				'id' => 'Id',
			),
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_popup_status_element_name',
		array(
		'default' => '',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_status_element_name',
		array(
			'label' => 'Element Name',
			'section' => 'mytheme_popup_url',
			'settings' => 'medma_matix_sp_popup_status_element_name',
			'type' => 'text',
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_inactive_time',
		array(
		'default' => '1',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_inactive_time',
		array(
			'label' => 'Time [in minutes]',
			'section' => 'mytheme_popup_url',
			'settings' => 'medma_matix_sp_inactive_time',
			'type' => 'number',
		)
	);
    
    $wp_customize->add_setting('medma_matix_sp_popup_displayOnPage',
		array(
			'default' => 'allpage',
			'transport' => 'postMessage'
			
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_displayOnPage',
		array(
			'label' => 'Show On',
			'section' => 'mytheme_popup_url',
			'settings' => 'medma_matix_sp_popup_displayOnPage',
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
	
	 $wp_customize->add_setting('medma_matix_sp_popup_time',
		array(
			'default' => 'none',
			'transport' => 'postMessage'
			
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_time',
		array(
			'label' => 'Popup Timing',
			'section' => 'mytheme_popup_url',
			'settings' => 'medma_matix_sp_popup_time',
			'id' => 'medma_matix_sp_popup_time',
			'type' => 'select',
			'choices' => array(
				'none' => 'Welcome',
				'lastminute' => 'Last Minute',
				'custom' => 'After [X] Seconds',
			),
		)
	);
	
	$wp_customize->add_setting('medma_matix_sp_popup_customTime',
		array(
		'default' => '2',
		'transport' => 'postMessage')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_customTime',
		array(
			'label' => 'Seconds',
			'section' => 'mytheme_popup_url',
			'settings' => 'medma_matix_sp_popup_customTime',
			'type' => 'number',
		)
	);
    
    
    $wp_customize->add_setting('medma_matix_sp_popup_setUrl',
		array(
		'default' => 'http://www.medma.in/popup-plugin-for-wordpress/',
		'transport' => 'postMessage',
		'sanitize_callback' => 'medma_mtx_validate_popup_url')
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_setUrl',
		array(
			'label' => 'Popup Content Url',
			'section' => 'mytheme_popup_url',
			'settings' => 'medma_matix_sp_popup_setUrl',
			'type' => 'text',
		)
	);
	
	
	$wp_customize->add_setting('medma_matix_sp_popup_urlOpenWindow',
		array(
			'default' => 'newwindow',
			'transport' => 'postMessage'
			
		)
	);
	
	$wp_customize->add_control(
		'medma_matix_sp_popup_urlOpenWindow',
		array(
			'label' => 'Open Popup Url In',
			'section' => 'mytheme_popup_url',
			'settings' => 'medma_matix_sp_popup_urlOpenWindow',
			'type' => 'select',
			'choices' => array(
				'samewindow' => 'Same Window',
				'newwindow' => 'New Window',
			),
		)
	);
	

function medma_mtx_validate_popup_url($input){
	if (preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$input)){
		return $input;
	}else{
		return get_theme_mod( 'medma_matix_sp_popup_setUrl' );
	}
	
}




function medma_mtx_popup_custom_customizer(){
?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			
			
			
			
			var topbar_style = $( '.customize-control' );
			
			
			var class_woocommerce = $('#class_woocommerce').attr("value");
			if(class_woocommerce == 0){
				$('#customize-control-medma_matix_sp_popup_displayOnPage select').val("allpage");
				$('#customize-control-medma_matix_sp_popup_displayOnPage select').attr("disabled", "disabled");
			}
			
			
			$('#customize-control-medma_matix_sp_popup_time select').change(function() {
				if (this.value == 'custom') {
					$('#customize-control-medma_matix_sp_popup_customTime').show();
				}
				else {
					$('#customize-control-medma_matix_sp_popup_customTime').hide();
				}
			});
			
			var popup_time_custom = $('#customize-control-medma_matix_sp_popup_time select').val();
			if (popup_time_custom == 'custom') {
				$('#customize-control-medma_matix_sp_popup_customTime').show();
			}
			else {
				$('#customize-control-medma_matix_sp_popup_customTime').hide();
			}
			
			$('#customize-control-medma_matix_sp_popup_status_visiting').hide();
			$('#customize-control-medma_matix_sp_thirdpage').hide();
			$('#customize-control-medma_matix_sp_popup_status_element').hide();
			$('#customize-control-medma_matix_sp_popup_status_element_name').hide();
			$('#customize-control-medma_matix_sp_inactive_time').hide();
			
			var popup_status = $('#customize-control-medma_matix_sp_popup_status select').val();
			if(popup_status == 'secondtime'){
				$('#customize-control-medma_matix_sp_popup_status_visiting').show();
			}
			else if(popup_status == 'thirdpage'){
				$('#customize-control-medma_matix_sp_thirdpage').show();
			}
			else if(popup_status == 'click' || popup_status == 'hover'){
				$('#customize-control-medma_matix_sp_popup_status_element').show();
				$('#customize-control-medma_matix_sp_popup_status_element_name').show();
			}
			else if(popup_status == 'inactive'){
				$('#customize-control-medma_matix_sp_inactive_time').show();
			}
			
			$('#customize-control-medma_matix_sp_popup_status select').change(function() {
				if(this.value == 'secondtime'){
					$('#customize-control-medma_matix_sp_popup_status_visiting').show();
					
					$('#customize-control-medma_matix_sp_thirdpage').hide();
					$('#customize-control-medma_matix_sp_popup_status_element').hide();
					$('#customize-control-medma_matix_sp_popup_status_element_name').hide();
					$('#customize-control-medma_matix_sp_inactive_time').hide();
				}
				else if(this.value == 'thirdpage'){
					$('#customize-control-medma_matix_sp_thirdpage').show();
					
					$('#customize-control-medma_matix_sp_popup_status_visiting').hide();
					$('#customize-control-medma_matix_sp_popup_status_element').hide();
					$('#customize-control-medma_matix_sp_popup_status_element_name').hide();
					$('#customize-control-medma_matix_sp_inactive_time').hide();
				}
				else if(this.value == 'click' || this.value == 'hover'){
					$('#customize-control-medma_matix_sp_popup_status_element').show();
					$('#customize-control-medma_matix_sp_popup_status_element_name').show();
					
					$('#customize-control-medma_matix_sp_popup_status_visiting').hide();
					$('#customize-control-medma_matix_sp_thirdpage').hide();
					$('#customize-control-medma_matix_sp_inactive_time').hide();
				}
				else if(this.value == 'inactive'){
					$('#customize-control-medma_matix_sp_inactive_time').show();
					
					$('#customize-control-medma_matix_sp_popup_status_visiting').hide();
					$('#customize-control-medma_matix_sp_thirdpage').hide();
					$('#customize-control-medma_matix_sp_popup_status_element').hide();
					$('#customize-control-medma_matix_sp_popup_status_element_name').hide();
				}
				else{
					$('#customize-control-medma_matix_sp_popup_status_visiting').hide();
					$('#customize-control-medma_matix_sp_thirdpage').hide();
					$('#customize-control-medma_matix_sp_popup_status_element').hide();
					$('#customize-control-medma_matix_sp_popup_status_element_name').hide();
					$('#customize-control-medma_matix_sp_inactive_time').hide();
				}
			});
			
			var popup_content_option = $('#customize-control-medma_matix_sp_popup_content_option select').val();
			if(popup_content_option == 'video'){
				$('#customize-control-medma_matix_sp_popup_video_content').show();
				$('#customize-control-add_image_button_id').hide();
				$('#customize-control-medma_matix_sp_popup_height').hide();
				for(var img = 1; img <= 20; img++){
					$('#customize-control-medma_matix_sp_'+img+'_image_url').hide();
				}
			}
			else if(popup_content_option == 'template'){
				$('#customize-control-medma_matix_sp_popup_video_content').hide();
				$('#customize-control-add_image_button_id').hide();
				$('#customize-control-medma_matix_sp_popup_height').hide();
				for(var img = 1; img <= 20; img++){
					$('#customize-control-medma_matix_sp_'+img+'_image_url').hide();
				}
			}
			else if(popup_content_option == 'image'){
				$('#customize-control-medma_matix_sp_popup_video_content').hide();
				$('#customize-control-add_image_button_id').show();
				$('#customize-control-medma_matix_sp_popup_height').show();
				for(var img = 1; img <= 20; img++){
					if($('#customize-control-medma_matix_sp_'+img+'_image_url').find('img').length > 0){
						$('#customize-control-medma_matix_sp_'+img+'_image_url').show();
					}
				}
			}
			else{
				$('#customize-control-medma_matix_sp_popup_height').show();
				$('#customize-control-medma_matix_sp_popup_video_content').hide();
				$('#customize-control-add_image_button_id').hide();
				for(var img = 1; img <= 20; img++){
					$('#customize-control-medma_matix_sp_'+img+'_image_url').hide();
				}
			}
			
			$('#customize-control-medma_matix_sp_popup_content_option select').change(function() {
				if(this.value == 'video'){
					$('#customize-control-medma_matix_sp_popup_video_content').show();
					$('#customize-control-medma_matix_sp_popup_height').hide();
					$('#customize-control-add_image_button_id').hide();
					for(var img = 1; img <= 20; img++){
						$('#customize-control-medma_matix_sp_'+img+'_image_url').hide();
					}
				}
				else if(this.value == 'template'){
					$('#customize-control-medma_matix_sp_popup_video_content').hide();
					$('#customize-control-medma_matix_sp_popup_height').hide();
					$('#customize-control-add_image_button_id').hide();
					for(var img = 1; img <= 20; img++){
						$('#customize-control-medma_matix_sp_'+img+'_image_url').hide();
					}
					
					//this.value = popup_content_option;
					var admin_url = '<?php echo admin_url( 'admin.php?page=medma_matix_admin_templates', '' );?>';
					window.location.href = admin_url;
				}
				else if(this.value == 'image'){
					$('#customize-control-medma_matix_sp_popup_video_content').hide();
					$('#customize-control-add_image_button_id').show();
					$('#customize-control-medma_matix_sp_popup_height').show();
					for(var img = 1; img <= 20; img++){
						if($('#customize-control-medma_matix_sp_'+img+'_image_url').find('img').length > 0){
							$('#customize-control-medma_matix_sp_'+img+'_image_url').show();
						}
					}
				}
				else{
					$('#customize-control-medma_matix_sp_popup_height').show();
					$('#customize-control-medma_matix_sp_popup_video_content').hide();
					$('#customize-control-add_image_button_id').hide();
					for(var img = 1; img <= 20; img++){
						$('#customize-control-medma_matix_sp_'+img+'_image_url').hide();
					}
				}
			});
			
			for(var img = 1; img <= 20; img++){
				$('#customize-control-medma_matix_sp_'+img+'_image_url').hide();
			}
			
			var img_count = 0;
			for(var img = 1; img <= 20; img++){
				if($('#customize-control-medma_matix_sp_'+img+'_image_url').find('img').length > 0){
					if(popup_content_option == 'image'){
						$('#customize-control-medma_matix_sp_'+img+'_image_url').show();
					}
					img_count++;
				}
			}
			
			//$('#_customize-input-medma_matix_sp_popup_image_count').val(img_count);
			//$('#_customize-input-add_image_button_id').click(function() {
			
			$('#customize-control-medma_matix_sp_popup_image_count').find('input').val(img_count);
			$('#customize-control-add_image_button_id').find('input').click(function() {
				
				//var popImageCount = $('#_customize-input-medma_matix_sp_popup_image_count').val();
				var popImageCount = $('#customize-control-medma_matix_sp_popup_image_count').find('input').val();
				if(popImageCount < 20){
					var count = parseInt(popImageCount)+1;
					$('#customize-control-medma_matix_sp_'+count+'_image_url').show();
					//$('#_customize-input-sp_popup_image_count').val(count);
					$('#customize-control-medma_matix_sp_popup_image_count').find('input').val(count);
				}else{
					alert("Maximum 20 images are allowed.");
				}
				
			});	
		});
	</script>
<?php
}

add_action( 'customize_controls_print_footer_scripts', 'medma_mtx_popup_custom_customizer' );
