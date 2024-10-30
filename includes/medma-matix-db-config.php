<?php 
/**
 * Create all table structures for the plugin
 *
 * @link       www.medma.in
 * @since      1.0.0
 *
 * @package    Matix
 * @subpackage Matix/includes
 */

/**
 * Create all table structures  for the plugin.
 *
 * @package    Matix
 * @subpackage Matix/includes
 * @author     Medma Technologies.
 */
 
 
function medma_mtx_my_plugin_create_db() {

	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'medma_my_analysis';

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		views smallint(5) NOT NULL,
		clicks smallint(5) NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";
	
	$product_views = $wpdb->prefix . 'medma_product_views';

	$product_views_sql = "CREATE TABLE $product_views (
		id mediumint(11) NOT NULL AUTO_INCREMENT,
		product_id mediumint(11)  NOT NULL,
		views mediumint(11)  NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	dbDelta( $product_views_sql );
} 

function medma_mtx_medma_popup_strip_analytics() {

	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'medma_analytics';

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time date DEFAULT '0000-00-00' NOT NULL,
		count_option smallint(5) NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	$table_name_1 = $wpdb->prefix . 'medma_notifications';

	$notify_table  = "CREATE TABLE $table_name_1 (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		text_color text NOT NULL,
		background text NOT NULL,
		border text NOT NULL,
		anchor_color text NOT NULL,
		dismissable mediumint(9) NOT NULL,
		status mediumint(9) NOT NULL,
		firebase_sdk text NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	dbDelta( $notify_table );
}

