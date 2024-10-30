<?php

/**
 * The admin specific functionality of the plugin.
 * 
 * Defines the plugin menu name on admin
 * menu.
 *
 * @since    1.0.0
 */

add_action('admin_menu','medma_mtx_createMainMenu');
function medma_mtx_createMainMenu(){
	add_menu_page( __('Matix'), __('Matix') , 'medma_matix', 'medma-matix' );
}
