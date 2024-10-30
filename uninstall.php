<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

function medma_mtx_delete_plugin() {
	global $wpdb;
	
	/*
	 * Drop all created custom tables
	 * */
	$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}medma_my_analysis" );
	$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}medma_product_views" );
	$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}medma_analytics" );
	$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}medma_notifications" );
	
	/*
	 * Delete Customizer Options
	 * 
	 * Popup Options
	 * */
	//~ remove_theme_mod( 'medma_matix_sp_popup_height' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_position' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_slideFrom' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_slideOutFrom' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_fadeIn' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_width' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_height' );
	//~ remove_theme_mod( 'medma_matix_sp_border_activeStatus' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_borderColor' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_borderWidth' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_image_count' );
	//~ remove_theme_mod( 'medma_matix_sp_mod_template_number' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_video_content' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_video_content' );
	//~ remove_theme_mod( 'medma_matix_sp_inactive_time' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_status_element_name' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_status_element' );
	//~ remove_theme_mod( 'medma_matix_sp_thirdpage' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_status_visiting' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_status' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_time' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_customTime' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_displayOnPage' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_position' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_urlOpenWindow' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_setUrl' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_slideFrom' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_slideOutFrom' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_fadeIn' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_height' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_width' );
	//~ remove_theme_mod( 'medma_matix_sp_border_activeStatus' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_borderWidth' );
	//~ remove_theme_mod( 'medma_matix_sp_popup_borderColor' );
	//~ 
	//~ /*
	 //~ * All image slide show options
	 //~ * */
	//~ for($img = 1; $img <= 20; $img++){
		//~ remove_theme_mod('medma_matix_sp_'.$img.'_image_url')
	//~ }
	//~ 
	//~ /*
	 //~ * Strip Options
	 //~ * */
	//~ remove_theme_mod( 'medma_matix_sp_strip_message' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_position' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_textColour' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_stripColour' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_buttonTextColour' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_buttonBackColour' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_buttonTextContent' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_buttonUrl' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_buttonSize' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_buttonUrlOpen' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_status_display' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_close_icon' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_buttonUrlActive' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_close_icon_color' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_displayOnPage' );
	//~ remove_theme_mod( 'medma_matix_sp_mod_strip_template_number' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_displayOnPage' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_temp_button_status' );
	//~ 
	//~ /*
	 //~ * Subscribe option of template
	 //~ * */
	//~ for($i = 1; $i <= 16; $i++){
		//~ remove_theme_mod( 'medma_matix_sp_'.$i.'_newsletter_mail' );
	//~ }
	//~ 
	//~ /*
	 //~ * Subscription form options
	 //~ * */
	//~ remove_theme_mod( 'medma_matix_sp_mail_chimp_list_id' );
	//~ remove_theme_mod( 'medma_matix_sp_mail_chimp_api_key' );
	//~ remove_theme_mod( 'medma_matix_sp_mail_chimp_data_center' );
	//~ remove_theme_mod( 'medma_matix_sp_mad_mimi_username' );
	//~ remove_theme_mod( 'medma_matix_sp_mad_mimi_api_key' );
	//~ remove_theme_mod( 'medma_matix_sp_mad_mimi_list_name' );
	//~ remove_theme_mod( 'medma_matix_sp_campaign_list_id' );
	//~ remove_theme_mod( 'medma_matix_sp_campaign_api_key' );
	//~ remove_theme_mod( 'medma_matix_sp_constant_contact_list_id' );
	//~ remove_theme_mod( 'medma_matix_sp_constant_contact_auth' );
	//~ remove_theme_mod( 'medma_matix_sp_sendy_url' );
	//~ remove_theme_mod( 'medma_matix_sp_get_response_campaign_id' );
	//~ remove_theme_mod( 'medma_matix_sp_get_response_api_key' );
	//~ remove_theme_mod( 'medma_matix_sp_icontact_api_id' );
	//~ remove_theme_mod( 'medma_matix_sp_icontact_username' );
	//~ remove_theme_mod( 'medma_matix_sp_icontact_api_pwd' );
	//~ remove_theme_mod( 'medma_matix_sp_icontact_api_version' );
	//~ remove_theme_mod( 'medma_matix_sp_icontact_api_url' );
	//~ remove_theme_mod( 'medma_matix_sp_icontact_list_id' );
	//~ remove_theme_mod( 'medma_matix_sp_active_account_name' );
	//~ remove_theme_mod( 'medma_matix_sp_active_api_key' );
	//~ remove_theme_mod( 'medma_matix_sp_active_list_id' );
	//~ 
	//~ /*
	 //~ * All strip options
	 //~ * */
	//~ remove_theme_mod( 'medma_matix_sp_strip_1_back_color' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_1_button_color' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_1_button_text' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_1_button_text_color' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_4_back_image' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_4_button_color' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_4_button_text' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_4_button_text_color' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_2_back_color' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_2_button_color' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_2_button_text' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_2_button_text_color' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_2_side_image' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_3_back_color' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_3_button_color' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_3_button_text' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_3_button_text_color' );
	//~ remove_theme_mod( 'medma_matix_sp_strip_3_side_image' );
	//~ 
	//~ /*
	 //~ * All popup options
	 //~ * */
	//~ remove_theme_mod( 'medma_matix_sp_10_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_10_link_background_color' );
	//~ remove_theme_mod( 'medma_matix_sp_4_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_4_button_color' );
	//~ remove_theme_mod( 'medma_matix_sp_4_button_text' );
	//~ remove_theme_mod( 'medma_matix_sp_4_text_color' );
	//~ remove_theme_mod( 'medma_matix_sp_4_button_link' );
	//~ remove_theme_mod( 'medma_matix_sp_15_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_14_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_14_background_color' );
	//~ remove_theme_mod( 'medma_matix_sp_8_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_8_button_color1' );
	//~ remove_theme_mod( 'medma_matix_sp_8_button_text1' );
	//~ remove_theme_mod( 'medma_matix_sp_8_button_color2' );
	//~ remove_theme_mod( 'medma_matix_sp_8_button_text2' );
	//~ remove_theme_mod( 'medma_matix_sp_8_text_color' );
	//~ remove_theme_mod( 'medma_matix_sp_8_button_link1' );
	//~ remove_theme_mod( 'medma_matix_sp_8_button_link2' );
	//~ remove_theme_mod( 'medma_matix_sp_3_button_color' );
	//~ remove_theme_mod( 'medma_matix_sp_3_button_text' );
	//~ remove_theme_mod( 'medma_matix_sp_3_text_color' );
	//~ remove_theme_mod( 'medma_matix_sp_3_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_3_opacity' );
	//~ remove_theme_mod( 'medma_matix_sp_3_button_link' );
	//~ remove_theme_mod( 'medma_matix_sp_13_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_2_button_color' );
	//~ remove_theme_mod( 'medma_matix_sp_2_button_text' );
	//~ remove_theme_mod( 'medma_matix_sp_2_text_color' );
	//~ remove_theme_mod( 'medma_matix_sp_2_button_link' );
	//~ remove_theme_mod( 'medma_matix_sp_9_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_9_button_color' );
	//~ remove_theme_mod( 'medma_matix_sp_11_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_11_background_color' );
	//~ remove_theme_mod( 'medma_matix_sp_1_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_1_button_color' );
	//~ remove_theme_mod( 'medma_matix_sp_1_button_text' );
	//~ remove_theme_mod( 'medma_matix_sp_1_button_text_color' );
	//~ remove_theme_mod( 'medma_matix_sp_1_button_link' );
	//~ remove_theme_mod( 'medma_matix_sp_12_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_12_background_color' );
	//~ remove_theme_mod( 'medma_matix_sp_5_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_5_button_border_color' );
	//~ remove_theme_mod( 'medma_matix_sp_5_button_text' );
	//~ remove_theme_mod( 'medma_matix_sp_5_text_color' );
	//~ remove_theme_mod( 'medma_matix_sp_5_button_link' );
	//~ remove_theme_mod( 'medma_matix_sp_7_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_16_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_16_background_color' );
	//~ remove_theme_mod( 'medma_matix_sp_6_background_img' );
	//~ remove_theme_mod( 'medma_matix_sp_6_button_color' );
	//~ remove_theme_mod( 'medma_matix_sp_6_button_text' );
	//~ remove_theme_mod( 'medma_matix_sp_6_text_color' );
	//~ remove_theme_mod( 'medma_matix_sp_6_button_link' );
	
	/*
	 * Delete Options
	 * */
	$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE 'medma_matix_%';" );
	
	//~ delete_option( 'medma_matix_sp_template_number' );
	//~ delete_option( 'medma_matix_sp_popup_content' );
	//~ delete_option( 'medma_matix_sp_popup_or_strip' );
	//~ delete_option( 'medma_matix_sp_popup_count_vis' );
	//~ delete_option( 'medma_matix_sp_popup_count_click' );
	//~ delete_option( 'medma_matix_sp_popup_content' );
	//~ 
	//~ delete_option( 'medma_matix_sp_strip_template_number' );
	//~ delete_option( 'medma_matix_sp_strip_details' );
	//~ delete_option( 'medma_matix_sp_strip_status_visiting' );
	//~ delete_option( 'medma_matix_sp_strip_status_element' );
	//~ delete_option( 'medma_matix_sp_strip_status_element_name' );
	//~ delete_option( 'medma_matix_sp_strip_count_vis' );
	//~ delete_option( 'medma_matix_sp_strip_button_click' );
	//~ 
	//~ delete_option( 'medma_matix_temp7_con_1' );
	//~ delete_option( 'medma_matix_temp7_con_2' );
	//~ delete_option( 'medma_matix_temp7_con_3' );
	//~ delete_option( 'medma_matix_temp16_con_1' );
	//~ delete_option( 'medma_matix_temp16_con_2' );
	//~ delete_option( 'medma_matix_temp6_con_1' );
	//~ delete_option( 'medma_matix_temp6_con_2' );
	//~ delete_option( 'medma_matix_temp6_con_3' );
	//~ delete_option( 'medma_matix_temp6_con_4' );
	//~ delete_option( 'medma_matix_temp10_con_1' );
	//~ delete_option( 'medma_matix_temp10_con_2' );
	//~ delete_option( 'medma_matix_temp4_con_1' );
	//~ delete_option( 'medma_matix_temp4_con_2' );
	//~ delete_option( 'medma_matix_temp4_con_3' );
	//~ delete_option( 'medma_matix_temp15_con_1' );
	//~ delete_option( 'medma_matix_temp15_con_2' );
	//~ delete_option( 'medma_matix_temp14_con_1' );
	//~ delete_option( 'medma_matix_temp14_con_2' );
	//~ delete_option( 'medma_matix_temp14_con_3' );
	//~ delete_option( 'medma_matix_temp8_con_1' );
	//~ delete_option( 'medma_matix_temp8_con_2' );
	//~ delete_option( 'medma_matix_temp8_con_3' );
	//~ delete_option( 'medma_matix_temp3_con_1' );
	//~ delete_option( 'medma_matix_temp3_con_2' );
	//~ delete_option( 'medma_matix_temp3_con_3' );
	//~ delete_option( 'medma_matix_temp3_con_4' );
	//~ delete_option( 'medma_matix_temp13_con_1' );
	//~ delete_option( 'medma_matix_temp13_con_2' );
	//~ delete_option( 'medma_matix_temp2_con_1' );
	//~ delete_option( 'medma_matix_temp2_con_2' );
	//~ delete_option( 'medma_matix_temp2_con_3' );
	//~ delete_option( 'medma_matix_temp2_con_4' );
	//~ delete_option( 'medma_matix_temp9_con_1' );
	//~ delete_option( 'medma_matix_temp9_con_2' );
	//~ delete_option( 'medma_matix_temp11_con_1' );
	//~ delete_option( 'medma_matix_temp11_con_2' );
	//~ delete_option( 'medma_matix_temp1_con_1' );
	//~ delete_option( 'medma_matix_temp1_con_2' );
	//~ delete_option( 'medma_matix_temp1_con_3' );
	//~ delete_option( 'medma_matix_temp12_con_1' );
	//~ delete_option( 'medma_matix_temp12_con_2' );
	//~ delete_option( 'medma_matix_temp12_con_3' );
	//~ delete_option( 'medma_matix_temp5_con_1' );
	//~ delete_option( 'medma_matix_temp5_con_2' );
	//~ delete_option( 'medma_matix_temp5_con_3' );
	//~ delete_option( 'medma_matix_temp5_con_4' );
	//~ 
	//~ delete_option( 'medma_matix_strip_con_cus' );
	//~ delete_option( 'medma_matix_strip2_con_1' );
	//~ delete_option( 'medma_matix_strip3_con_1' );
	//~ delete_option( 'medma_matix_strip3_con_2' );
	//~ delete_option( 'medma_matix_strip4_con_1' );
	//~ delete_option( 'medma_matix_strip1_con_1' );
	
}

medma_mtx_delete_plugin();
