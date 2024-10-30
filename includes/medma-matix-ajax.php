<?php

/**
 * Register all actions and filters.
 * 
 *
 * Defines all actions for counting popup
 * visibility, popup clicks and strip button
 * clicks.
 *
 * @since      1.0.0
 */


/**
 * Defines function to count popup visibility.
 *
 * Used to count popup visibility and store
 * into database.
 * 
 * @since    1.0.0
 * 
 */	
function medma_mtx_countPopupVisibility(){
	
	check_ajax_referer( 'medma_mtx_unique', 'nonce' );

	$popup_count_vis = get_option( 'medma_matix_sp_popup_count_vis' );
	
	if ( $popup_count_vis !== false ) {
		$popup_count_vis++;
		update_option( 'medma_matix_sp_popup_count_vis', $popup_count_vis);
	} else {
		add_option( 'medma_matix_sp_popup_count_vis', 1, null, 'no' );
	}
	
	echo $popup_count_vis;
	
	global $wpdb;
	$time = current_time( 'mysql' );
	
	$wpdb->insert( 
		$wpdb->prefix.'medma_analytics', 
		array( 
			'time' => $time, 
			'count_option' => 1
		), 
		array( 
			'%s', 
			'%d', 
			'%d',
			'%d',
		) 
	);
		
	wp_die();

}

/**
 * Defines function to count popup click.
 *
 * Used to count popup click and store
 * into database.
 * 
 * @since    1.0.0
 * 
 */	
function medma_mtx_countPopupClick(){
	
	check_ajax_referer( 'medma_mtx_unique', 'nonce' );

	$popup_count_click = get_option( 'medma_matix_sp_popup_count_click' );
		
	if ( $popup_count_click !== false ) {
		$popup_count_click++;
		update_option( 'medma_matix_sp_popup_count_click', $popup_count_click);
	} else {
		add_option( 'medma_matix_sp_popup_count_click', 1, null, 'no' );
	}
	
	echo $popup_count_click;
	
	global $wpdb;
	$time = current_time( 'mysql' );
	
	$wpdb->insert( 
		$wpdb->prefix.'medma_analytics', 
		array( 
			'time' => $time, 
			'count_option' => 2
		), 
		array( 
			'%s', 
			'%d', 
			'%d',
			'%d',
		) 
	);
		
	wp_die();

}

/**
 * Defines function to count strip visibility.
 *
 * Used to count strip visibility and store
 * into database.
 * 
 * @since    1.0.0
 * 
 */
function medma_mtx_countStripVisibility(){
	
	check_ajax_referer( 'medma_mtx_unique', 'nonce' );
	
	$strip_count_vis = get_option( 'medma_matix_sp_strip_count_vis' );
	
	if ( $strip_count_vis !== false ) {
		$strip_count_vis++;
		update_option( 'medma_matix_sp_strip_count_vis', $strip_count_vis);
	} else {
		add_option( 'medma_matix_sp_strip_count_vis', 1, null, 'no' );
	}
	
	echo $strip_count_vis;
	
	
		
	wp_die();
 
}
/**
 * Defines function to count strip button click.
 *
 * Used to count strip button click and store
 * into database.
 * 
 * @since    1.0.0
 * 
 */
function medma_mtx_countStripButtonClick(){
	
	check_ajax_referer( 'medma_mtx_unique', 'nonce' );

	$strip_button_click = get_option( 'medma_matix_sp_strip_button_click' );
	if ( $strip_button_click !== false ) {
		$strip_button_click++;
		update_option( 'medma_matix_sp_strip_button_click', $strip_button_click);
	} else {
		add_option( 'medma_matix_sp_strip_button_click', 1, null, 'no' );
	}
	
	global $wpdb;
	$time = current_time( 'mysql' );
	
	$wpdb->insert( 
		$wpdb->prefix.'medma_analytics', 
		array( 
			'time' => $time, 
			'count_option' => 3
		), 
		array( 
			'%s', 
			'%d', 
			'%d',
			'%d',
		) 
	);
		
	echo $strip_button_click;
	
	wp_die();

}
if( !is_customize_preview() ){

	/****************************** STRIP COUNT VISIBILITY ***************************/
	add_action('wp_ajax_count_strip_vis', 'medma_mtx_countStripVisibility');
	add_action('wp_ajax_nopriv_count_strip_vis', 'medma_mtx_countStripVisibility');


	/****************************** POPUP COUNT VISIBILITY ***************************/
	add_action('wp_ajax_count_popup_vis', 'medma_mtx_countPopupVisibility');
	add_action('wp_ajax_nopriv_count_popup_vis', 'medma_mtx_countPopupVisibility');


	/****************************** POPUP COUNT  CLICK ***************************/
	add_action('wp_ajax_count_popup_click', 'medma_mtx_countPopupClick');
	add_action('wp_ajax_nopriv_count_popup_click', 'medma_mtx_countPopupClick');


	/****************************** STRIP BUTTON CLICK ***************************/
	add_action('wp_ajax_count_strip_button_click', 'medma_mtx_countStripButtonClick');
	add_action('wp_ajax_nopriv_count_strip_button_click', 'medma_mtx_countStripButtonClick');

}
add_action('wp_ajax_insert_image_url', 'medma_mtx_insertImageUrl');
add_action('wp_ajax_nopriv_insert_image_url', 'medma_mtx_insertImageUrl');


function medma_mtx_insertImageUrl(){
	$html = stripslashes($_POST['html']);
	set_theme_mod( 'medma_matix_sp_popup_image_url', $html );
	wp_die();
}
add_action('wp_ajax_insert_content_value', 'medma_mtx_insertContentValue');
add_action('wp_ajax_nopriv_insert_content_value', 'medma_mtx_insertContentValue');
	
function medma_mtx_insertContentValue(){
	$option_name = sanitize_text_field($_POST['option_name']);
	$content = stripslashes($_POST['content']);
	
	$option_content = get_option( $option_name );
	
	
	if ( $option_content !== false ) {
		update_option( $option_name, $content );
	} else {
		add_option( $option_name, $content, null, 'no' );
	}
			
	wp_die();
}
