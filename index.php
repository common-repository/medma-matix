<?php

/**
 * The plugin index file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              
 * @since             1.0.0
 * @package           Matix
 * @wordpress-plugin
 * Plugin Name:       Matix
 * Plugin URI:        http://www.medma.in/
 * Description:       Matix adds informative Analytics dashboard to your store. Apart from displaying the statistic of your Popups and Deal Bars, it provides actionable insight to store owners based on sales and conversion.
 * Version:           1.0.0
 * Author:            Medma Technologies
 * Text Domain:       matix
 */


 // If this file is called directly, abort.

ini_set('error_reporting', E_ALL);
ini_set('display_errors',1);

if ( ! defined( 'WPINC' ) ) {
	die;
}
session_start();
	
/**
 * Including all plugin Admin Files
 */

require_once plugin_dir_path( __FILE__ ) . 'admin/class-medma-matix-admin-analytics.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/class-medma-matix-admin-home.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/medma-matix-admin-menu.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/class-medma-matix-admin-notifications.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/class-medma-matix-admin-popup.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/class-medma-matix-admin-strip.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/class-medma-matix-admin-templates.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/medma-matix-theme-footer-customizer.php';



/**
 * Including all plugin public Files
 */

require_once plugin_dir_path( __FILE__ ) . 'public/medma-matix.php';
require_once plugin_dir_path( __FILE__ ) . 'public/medma-matix-footer.php';
require_once plugin_dir_path( __FILE__ ) . 'public/medma-matix-header.php';


/**
 * Add Actions added when plugin loaded
 */

add_action( 'plugins_loaded', array( 'Medma_Matix_Admin_Home', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'Medma_Matix_Admin_Analytics', 'get_instance' ) );	
add_action( 'plugins_loaded', array( 'Medma_Matix_Admin_Popup', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'Medma_Matix_Admin_Strip', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'Medma_Matix_Admin_Templates', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'Medma_Matix_Admin_Notifications', 'get_instance' ) );



/**
 * Including plugin webhook file to create tables
 */
register_activation_hook(__FILE__,'medma_mtx_medma_popup_strip_analytics');
register_activation_hook(__FILE__,'medma_mtx_my_plugin_create_db');

/**
 * Including all plugin include Files
 */
include ('includes/medma-matix-db-config.php');
include ('includes/medma-matix-ajax.php');
include ('includes/medma-matix-customer-mail.php');
