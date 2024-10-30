<?php
/**
 * The public specific functionality of the plugin.
 * 
 *
 * Defines the example hooks for how to
 * enqueue the public specific stylesheet and scripts.
 *
 * @since      1.0.0
 */

add_action('wp_head', 'medma_mtx_head_hello_world');
function medma_mtx_head_hello_world(){
	
	$medma_mtx_nonce = wp_create_nonce('medma_mtx_unique');
	echo "<input type='hidden' id='medma-mtx-nonce' value='{$medma_mtx_nonce}'> ";
	if( is_customize_preview() ){
		wp_enqueue_script( 'header-quills-js', plugins_url('js/quill.js', __FILE__ ));
	?>
		
		<div id="isCustomizer" data-customizer="1"></div>
	<?php
	} else { 
		wp_enqueue_style( 'header-quills-css', plugins_url('css/quill.snow.css', __FILE__ ));
		wp_enqueue_script( 'header-quills-js', plugins_url('js/quill.js', __FILE__ ));
	?>

		<div id="isCustomizer" data-customizer="0"></div>
		
	<?php }
	
	
	
	//wp_enqueue_script( 'jquery.min-script', plugins_url('js/jquery.min.js', __FILE__ ));
	
	$b = 2;
	$popup_height = get_theme_mod('medma_matix_sp_popup_height', 300);
	echo "<div><script>var popup_height = ".$popup_height.";</script><p id='header' style='display:none; text-align:center;font-size: 15px;font-weight: bold;margin-top:30px;color:#fff;'> </p></div>";
}

function medma_mtx_getUrlStrings($string, $start, $end){
	$string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

add_action('woocommerce_before_single_product', 'medma_mtx_update_product_view');

function medma_mtx_update_product_view(){
	global $product;
	$product_id = $product->get_id();

	global $wpdb;

	$result = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix .'medma_product_views WHERE product_id = ' . $product_id, OBJECT );
	$views = $result[0]->views;
	$row_id =  $result[0]->id;

	
	if(count($result) == 0)	{
		$wpdb->insert( 
			$wpdb->prefix.'medma_product_views', 
			array( 
				'product_id' => $product_id, 
				'views' => 1
			), 
			array( 
				'%d', 
				'%d'
			) 
		);
	}else {
		$table = $wpdb->prefix .'medma_product_views';
		$views += 1;
		$wpdb->query($wpdb->prepare("UPDATE $table SET views ='$views' WHERE id=$row_id "));
	}
}