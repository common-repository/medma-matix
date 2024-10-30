<?php

/**
 * The admin specific functionality to customize templates.
 * 
 *
 * Includes all templates customizer files and enqueue the 
 * admin-specific JavaScript and add actions and filters.
 *
 * @since    1.0.0
 */

add_action('customize_register', 'medma_mtx_theme_footer_customizer', 50);
function medma_mtx_theme_footer_customizer($wp_customize){

	if(!session_id()) {
		session_start();
	}
    
	$url_param = $_GET['action'];
	$parameterUrl = $_GET['url'];
	$temp_no = $_GET['temp_no'];
	include('sidebar-customizer/medma-matix-sidebar-popup-customizer.php');
	include('sidebar-customizer/medma-matix-sidebar-strip-customizer.php');
	include('medma-matix-template-customizer/medma-matix-template-1-customizer.php');
	include('medma-matix-template-customizer/medma-matix-template-2-customizer.php');
	
	
	if($parameterUrl == 'custom_popup_strip'){
	  $wp_customize->remove_section( 'title_tagline');
	  $wp_customize->remove_section( 'themes');
	  $wp_customize->remove_section( 'colors');
	  $wp_customize->remove_section( 'header_image');
	  $wp_customize->remove_section( 'background_image');
	  $wp_customize->remove_panel( 'nav_menus');
	  $wp_customize->remove_panel( 'widgets');
	  $wp_customize->remove_section( 'static_front_page');
	  $wp_customize->remove_section( 'custom_css');
	  
		if($url_param == 'edit_templates'){
			$wp_customize->remove_section( 'mytheme_strip_activeStatus');
			$wp_customize->remove_section( 'mytheme_strip_button_activeStatus');
			$wp_customize->remove_section( 'mytheme_template_2');
		}
		
		if($url_param == 'edit_strip_templates'){
			$wp_customize->remove_section( 'mytheme_popup_content_options');
			$wp_customize->remove_section( 'mytheme_popup_position_options');
			$wp_customize->remove_section( 'mytheme_popup_options');
			$wp_customize->remove_section( 'mytheme_popup_url');
			$wp_customize->remove_section( 'mytheme_template_1');
		}
		
		if($temp_no == '0'){
			
		}
	}
	
	if(strpos($parameterUrl, get_home_url()) !== false){
		$wp_customize->remove_section( 'mytheme_strip_activeStatus');
		$wp_customize->remove_section( 'mytheme_strip_button_activeStatus');
		$wp_customize->remove_section( 'mytheme_template_2');
		$wp_customize->remove_section( 'mytheme_popup_content_options');
		$wp_customize->remove_section( 'mytheme_popup_position_options');
		$wp_customize->remove_section( 'mytheme_popup_options');
		$wp_customize->remove_section( 'mytheme_popup_url');
		$wp_customize->remove_section( 'mytheme_template_1');
	}
		  
		

  
}
add_action( 'customize_preview_init' , 'medma_mtx_my_customizer_preview' );
function medma_mtx_my_customizer_preview() {
	wp_enqueue_script( 'my_theme_popup_customizer', plugins_url('../public/js/theme-customizer.js', __FILE__ ),	array(  'jquery', 'customize-preview' ),'', true);
	wp_enqueue_script( 'my_theme_strip_customizer', plugins_url('../public/js/theme-strip-customizer.js', __FILE__ ),	array(  'jquery', 'customize-preview' ),'', true);
}
add_filter( 'woocommerce_add_cart_item_data', 'medma_mtx_addedToCart',10,2 );
	
	function medma_mtx_addedToCart($cart_item_data,$productId){
		if(!session_id()) {
			session_start();
		}
	    $_SESSION['prod_id'] = $productId;
	
		$product = wc_get_product( $productId );
	  
	    $_SESSION['product_id'] = $productId;
	    $_SESSION['just_added'] = 1;
	   add_action('wp_footer', 'medma_mtx_add_this_script_footer',10,2);
	   
	}
