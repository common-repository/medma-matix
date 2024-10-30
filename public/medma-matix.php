<?php

/**
 * The public specific functionality of the plugin.
 * 
 *
 * Defines the example hooks for how to
 * enqueue the public specific stylesheet.
 *
 * @since      1.0.0
 */

add_action('admin_enqueue_scripts', function()
{
    wp_enqueue_media();
});

    wp_enqueue_style( 'custom-theme-css', plugins_url('css/custom-wp-toolbar-link.css', __FILE__ ));
	wp_enqueue_style( 'custom-css', plugins_url('css/custom.css', __FILE__ ));
	wp_enqueue_style( 'medma-notification', plugins_url('css/medma-notification.css', __FILE__ ));
	wp_enqueue_style( 'my-template-css', plugins_url('css/my-template.css', __FILE__ ));
	wp_enqueue_style( 'font-awesome-css', plugins_url('css/font-awesome_4.1.0/css/font-awesome.min.css', __FILE__ ));
