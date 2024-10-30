<?php 

/**
 * The admin specific product analysis functionality of the plugin.
 * 
 *
 * Defines all the analysis of products sales
 * report as today, weekly, monthly,
 * yearly or custom dates and show in the form 
 * of graph.
 *
 * @package    Matix
 * @subpackage Matix/admin
 * @author     Medma Technologies.
 * @since      1.0.0
 */
 
class Medma_Matix_Admin_Analytics {
	
/**
 * The version of this plugin.
 *
 * @since    1.0.0
 * @access   private
 * @var      string $version The current version of this plugin.
 */
	const VERSION = '1.0';

	
	protected $plugin_slug = 'medma_matix_admin_analytics';


	protected static $instance = null;

	
	protected $menu_active;

		
	protected $menu_content;

	
	protected $show_on_homepage;	


	protected $show_on_posts;

	
	protected $show_on_pages;

/**
 * Initialize the class and construct for plugin
 *
 */
	public function __construct() {

		define( 'ROOT', plugin_dir_url( __FILE__ ) );
 

		$this->popup_count_visibility = get_option( 'medma_matix_sp_popup_count_vis' );
		$this->popup_count_click = get_option( 'medma_matix_sp_popup_count_click' );
		$this->strip_count_visibility = stripslashes(get_option( 'medma_matix_sp_strip_count_vis' ));
		$this->strip_button_count = get_option( 'medma_matix_sp_strip_button_click' );
		
		global $wpdb;
		$this->popup_view = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix .'medma_analytics WHERE count_option = 1', OBJECT );
		$this->popup_view_count = count($this->popup_view);
		
		$this->popup_click = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix .'medma_analytics WHERE count_option = 2', OBJECT );
		$this->popup_click_count = count($this->popup_click);
		
		$this->strip_click = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix .'medma_analytics WHERE count_option = 3', OBJECT );
		$this->strip_click_count = count($this->strip_click);
		
		$end_date = current_time( 'mysql' );
		
		$this->order_totals = $this->medma_mtx_get_total_orders('1970-01-01 00:00:00', $end_date);
		$this->items_sold = $this->medma_mtx_get_items_sold('1970-01-01 00:00:00', $end_date);
		$this->total_revenue = $this->medma_mtx_get_total_revenue('1970-01-01 00:00:00', $end_date);
		$this->average_order_value = $this->medma_mtx_get_average_order_value('1970-01-01 00:00:00', $end_date);
		
		$this->last_five_products = $this->medma_mtx_get_last_five_products();
		$this->star_product = $this->medma_mtx_get_star_product();
		$this->reprice_product = $this->medma_mtx_get_reprice_product();
		$this->potential_product = $this->medma_mtx_get_potential_product();
		$this->rethink_product = $this->medma_mtx_get_rethink_product();
		
		if ( is_admin() ) {
		
			add_action( 'admin_menu', array( $this, 'medma_mtx_plugin_admin_menu' ) );
			wp_enqueue_script( 'my-script-handle', plugins_url('../public/js/my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
			
			add_action('wp_ajax_popup_analytics', array( $this, 'medma_mtx_get_popupAnalyticsValue'));
			add_action('wp_ajax_nopriv_popup_analytics', array( $this, 'medma_mtx_get_popupAnalyticsValue'));
			
			add_action('wp_ajax_medma_mtx_get_analytics', array( $this, 'medma_mtx_get_analytics'));
			add_action('wp_ajax_nopriv_medma_mtx_get_analytics', array( $this, 'medma_mtx_get_analytics'));
			
			
		}
		
	}
	

	public function medma_mtx_dynamicChart () {
		
		$show_medma_menu=false;
		
			
			if($this->show_on_homepage!=1 && $this->show_on_posts!=1 && $this->show_on_pages!=1 )
			{
				$show_medma_menu=true;
					
			}
			else
			{				
				if( $this->show_on_homepage==1 && is_front_page() )
				{
					$show_medma_menu=true;					
				}
				if( $this->show_on_posts==1 && ( is_single() || is_home() || is_archive() ) )
				{
					$show_medma_menu=true;	
				}
				if( $this->show_on_pages==1 && is_page() )
				{
					$show_medma_menu=true;
				}
			}
	
			if($show_medma_menu)
			{
				add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
				add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
				add_filter( 'wp_footer', array( $this, 'get_medma_menu' ) );
				add_action( 'wp_footer', array( $this, 'footer_scripts' ) );
			
			
			}
		
	}

/**
 * Return an instance of this class.
 * 
 * @return object A single instance of this class.
 * 
 */	
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
	
	
	public function medma_mtx_plugin_admin_menu() {
		
		add_submenu_page( 'medma-matix', __( 'Analytics' ), __( 'Analytics' ), 8, 'medma_matix_admin_analytics' , array( $this, 'medma_mtx_menu_options' ) );
	}
	 
	
	public function medma_mtx_menu_options() {
		
		wp_enqueue_style( 'jquery-ui-datepicker-style' , plugins_url( '/css/jquery-ui.css', __FILE__ ));

		wp_enqueue_script( 'jquery-ui-datepicker' );
		
		wp_register_script( 'bootstrap-min-js', plugins_url( '/js/bootstrap.min.js', __FILE__ ) );
		
		wp_enqueue_script( 'bootstrap-min-js' );

		wp_enqueue_style( 'bootstrap-min-css' , plugins_url( '/css/bootstrap.min.css', __FILE__ ));

		wp_enqueue_style( 'bootstrap-theme-min-css' , plugins_url( '/css/bootstrap-theme.min.css', __FILE__ ));

		?>
		
		
		
		<?php 
		if ( ! current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		echo "<input type='hidden' value='".admin_url( 'admin-ajax.php' )."' id='ajaxUrl'>";
		
	?>
	
		<div class="wrap" style=" margin:10px; padding:35px;">
			<h2 class="bottom-line"><?php _e( 'Medma Analytics', 'medma_analytics' );?></h2>
				<?php if ( class_exists( 'WooCommerce' ) ) { ?>
					<div class="col-md-12" style="border-bottom: 1px solid #CAC3B4;">
						<div class="tabs">
							<ul class="tab-links">
								<li class="active"><a href="#last_item">Last 5 item sold</a></li>
								<li><a href="#star_product">Star Products</a></li>
								<li><a href="#rethink_product">Re-think Products</a></li>
								<li><a href="#potential_product">Potential Products</a></li>
								<li><a href="#reprice_product">Re-price Products</a></li>
							</ul>
							<div class="tab-content">
								<?php end($this->last_five_products);?>
								<div id="last_item" class="tab active" data-attr='<?php echo json_encode($this->last_five_products);?>'  data-count='<?php echo key($this->last_five_products);?>'>
								<style>
									#last_item_chart{
										width: 100% !important;
										height: 500px !important;
									}
								</style>
									<canvas id="last_item_chart"></canvas>
								</div>
								
								<?php end($this->star_product);?>
								<div id="star_product" class="tab" data-attr='<?php echo json_encode($this->star_product);?>'  data-count='<?php echo key($this->star_product);?>'>
									<style>
										#star_product_chart{
											width: 100% !important;
											height: 500px !important;
										}
									</style>
									<canvas id="star_product_chart"></canvas>

								</div>

								
								<?php end($this->rethink_product);?>
								<div id="rethink_product" class="tab" data-attr='<?php echo json_encode($this->rethink_product);?>'  data-count='<?php echo key($this->rethink_product);?>'>
									<style>
										#rethink_product_chart{
											width: 100% !important;
											height: 500px !important;
										}
									</style>
									<canvas id="rethink_product_chart"></canvas>
								</div>
								
								<?php end($this->potential_product);?>
								<div id="potential_product" class="tab" data-attr='<?php echo json_encode($this->potential_product);?>'  data-count='<?php echo key($this->potential_product);?>'>
									<style>
										#potential_product_chart{
											width: 100% !important;
											height: 500px !important;
										}
									</style>
									<canvas id="potential_product_chart"></canvas>
								</div>
								
								<?php end($this->reprice_product);?>
								<div id="reprice_product" class="tab" data-attr='<?php echo json_encode($this->reprice_product);?>'  data-count='<?php echo key($this->reprice_product);?>'>
									<style>
										#reprice_product_chart{
											width: 100% !important;
											height: 500px !important;
										}
									</style>
									<canvas id="reprice_product_chart"></canvas>
								</div>	
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="search-div">
					<label class="search-label-input">From:</label>
					<input class="search-label-input jquery-datepicker" id="jquery-datepicker-from" type="text" name="entry_from_date" value="">
					<label class="search-label-input">To:</label>
					<input class="search-label-input jquery-datepicker" id="jquery-datepicker-to" type="text" name="entry_to_date" value="">
					<input type="button" class="search-label-input" id="search-analytics" value="Search">
				</div>
				<?php if ( class_exists( 'WooCommerce' ) ) { ?>
				<ul class="woo-analytics-ul">
					<li>
						<h3 class="" style="margin-top: 60px;padding-bottom: 7px;"><?php _e( 'Total Order', 'total-order' );?></h3>
						<div>
							<span class="popup-value analytics-value" id="total-order"><?php echo $this->order_totals;?></span>
						</div>
					</li>
					
					<li>
						<h3 class="" style="margin-top: 60px;padding-bottom: 7px;"><?php _e( 'Total items sold', 'total-items-sold' );?></h3>
						<div>
							<span class="analytics-value" id="total-items-sold"><?php echo $this->items_sold;?></span>
						</div>
					</li>
					
					<li>
						<h3 class="" style="margin-top: 60px;padding-bottom: 7px;"><?php _e( 'Total Revenue', 'total-revenue' );?></h3>
						<div>
							<span class="analytics-value" id="total-revenue"><?php echo get_woocommerce_currency_symbol(); ?><span><?php echo $this->total_revenue;?></span></span>
						</div>
					</li>
					
					<li>
						<h3 class="" style="margin-top: 60px;padding-bottom: 7px;"><?php _e( 'Average Order Value', 'average-order-value' );?></h3>
						<div>
							<span class="analytics-value" id="average-order-value"><?php echo get_woocommerce_currency_symbol(); ?>
							<span><?php
								if($this->average_order_value) {
							 		echo $this->average_order_value; 
							 	}else{
							 		echo "0";
							 	}
							 ?></span></span>
						</div>
					</li>
				</ul>
				
				<div class="button-div">
					<button class="btn btn-md btn-primary analytic-btn" data-id="today-analytics">Today</button>
					<button class="btn btn-md analytic-btn" data-id="weekly-analytics">Weekly</button>
					<button class="btn btn-md analytic-btn" data-id="monthly-analytics">Monthly</button>
					<button class="btn btn-md analytic-btn" data-id="yearly-analytics">Yearly</button>
				</div>
				<?php } ?>
				<style>
					#container{
						width: 100% !important;
						height: 500px !important;
					}
				</style>
				<div class="container-wrapper">
				</div>	
				<ul style="float:left;">
					<li style="float:left;">
						<h3 class="bottom-line" style="margin-top: 60px;width: 400px;padding-bottom: 7px;"><?php _e( 'Popup Analytics', 'popup-analytics' );?></h3>
						<div>
							<div class="popup-analytics">
								<span class="popup-view-clk">Views</span>
									</br></br>
								<span class="popup-value" id="popup-view"><?php echo $this->popup_view_count;?></span>
							</div>
							
							<div class="popup-analytics">
								<span class="popup-view-clk">Clicks</span>
									</br></br>
								<span class="popup-value" id="popup-click"><?php echo $this->popup_click_count;?></span>
							</div>
						</div>
					</li>
					
					<li style="float:left;margin-left: 100px;">
						<h3 class="bottom-line" style="margin-top: 60px;width: 400px;padding-bottom: 7px;"><?php _e( 'Strip Analytics', 'popup-analytics' );?></h3>
						<div>
							<div class="popup-analytics" style="    margin-left: 160px;">
								<span class="popup-view-clk">Clicks</span>
									</br></br>
								<span class="popup-value" id="strip-click"><?php echo $this->strip_click_count;?></span>
							</div>
						</div>
					</li>
				</ul>
				
				<script>
				(function ($) {
					$(function () {
						$('#jquery-datepicker-from').datepicker({ dateFormat: 'yy-mm-dd' ,maxDate: '0',onSelect: function(dateStr) {         
																							$("#jquery-datepicker-to").val(dateStr);
																							$("#jquery-datepicker-to").datepicker("option",{ minDate: new Date(dateStr)})
																						}});
						$('#jquery-datepicker-to').datepicker({ dateFormat: 'yy-mm-dd' });
					});
				}(jQuery));
				</script>
			<?php $plugin_basename = plugin_basename( plugin_dir_path( __FILE__ ) ); ?>
		</div>
		<?php
		if ( class_exists( 'WooCommerce' ) ) { 
			wp_enqueue_script( 'chart-min', plugins_url('../public/js/chart.min.js', __FILE__ ) );
			wp_enqueue_script( 'my-chart-script', plugins_url('../public/js/chart-script.js', __FILE__ ));
		}
	}
	
/**
 * Function for get all orders details.
 *
 * Used for get total order of products by filter
 * start date and end dates.
 * 
 * @since    1.0.0
 * 
 * @param      date $start_date The start date for filtering.
 * @param      date $end_date The end date for filtering.
 * 
 * Return all filter product orders
 */	
	public function medma_mtx_get_total_orders($start_date, $end_date) {
		global $wpdb;
		
		
		$order_total = $wpdb->get_results("SELECT COUNT(*) as total_order FROM ".$wpdb->prefix."posts WHERE ".$wpdb->prefix."posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
											AND ".$wpdb->prefix."posts.post_date >= '" . $start_date  . "'
											AND ".$wpdb->prefix."posts.post_date <= '" . $end_date . "'");
		return absint( $order_total[0]->total_order);
	}

/**
 * Function for get total sold items.
 *
 * Used for get total sold items by filter
 * start date and end dates.
 * 
 * @since    1.0.0
 * 
 * @param      date $start_date The start date for filtering.
 * @param      date $end_date The end date for filtering.
 * 
 * Return all filter sold products.
 */		
	public function medma_mtx_get_items_sold($start_date, $end_date) {
		global $wpdb;
		$order_item_ids = $wpdb->get_results("SELECT ".$wpdb->prefix."posts.id, ".$wpdb->prefix."woocommerce_order_items.order_item_id
										FROM ".$wpdb->prefix."posts
										LEFT JOIN ".$wpdb->prefix."woocommerce_order_items
										ON ".$wpdb->prefix."posts.ID=".$wpdb->prefix."woocommerce_order_items.order_id
										WHERE ".$wpdb->prefix."posts.post_type = 'shop_order'
										AND ".$wpdb->prefix."posts.post_status IN ( '" . implode( "','", array( 'wc-completed' ) ) . "' )
										AND ".$wpdb->prefix."posts.post_date >= '" . $start_date  . "'
										AND ".$wpdb->prefix."posts.post_date <= '" . $end_date . "'");
		$order_totals = array();
		$order_total = 0;
		foreach($order_item_ids as $order_item_id){
			$order_totals = $wpdb->get_results("SELECT ".$wpdb->prefix."woocommerce_order_itemmeta.meta_value
												FROM ".$wpdb->prefix."woocommerce_order_itemmeta
												WHERE ".$wpdb->prefix."woocommerce_order_itemmeta.meta_key = '_qty'
												AND ".$wpdb->prefix."woocommerce_order_itemmeta.order_item_id = ".$order_item_id->order_item_id);
												
			$order_total = $order_total+$order_totals[0]->meta_value;
		}								
		
		return absint( $order_total);
	}

/**
 * Function for get total revenue of products.
 *
 * Used for get total revenue of items by filter
 * start date and end dates.
 * 
 * @since    1.0.0
 * 
 * @param      date $start_date The start date for filtering.
 * @param      date $end_date The end date for filtering.
 * 
 * Return all filter revenues.
 */	
 	
	public function medma_mtx_get_total_revenue($start_date, $end_date) {
		
		global $wpdb;
		$order_item_ids = $wpdb->get_results("SELECT ".$wpdb->prefix."posts.id, ".$wpdb->prefix."woocommerce_order_items.order_item_id
										FROM ".$wpdb->prefix."posts
										LEFT JOIN ".$wpdb->prefix."woocommerce_order_items
										ON ".$wpdb->prefix."posts.ID=".$wpdb->prefix."woocommerce_order_items.order_id
										WHERE ".$wpdb->prefix."posts.post_type = 'shop_order'
										AND ".$wpdb->prefix."posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
										AND ".$wpdb->prefix."posts.post_date >= '" . $start_date  . "'
										AND ".$wpdb->prefix."posts.post_date <= '" . $end_date . "'");
		$order_totals = array();
		$order_total = 0;
		foreach($order_item_ids as $order_item_id){
			$order_totals = $wpdb->get_row("SELECT ".$wpdb->prefix."woocommerce_order_itemmeta.meta_value
												FROM ".$wpdb->prefix."woocommerce_order_itemmeta
												WHERE ".$wpdb->prefix."woocommerce_order_itemmeta.meta_key = '_line_total'
												AND ".$wpdb->prefix."woocommerce_order_itemmeta.order_item_id = ".$order_item_id->order_item_id);
			
			if(count($order_totals)) {		
				$order_total = $order_total+$order_totals->meta_value;
			}
			// print_r($order_totals);exit();
		}								
		
		return $order_total;
		
	}

/**
 * Function for get all average order products details.
 *
 * Used for get total revenue of items by filter
 * start date and end dates.
 * 
 * @since    1.0.0
 * 
 * @param      date $start_date The start date for filtering.
 * @param      date $end_date The end date for filtering.
 * 
 * Return all average order product details.
 */		
	public function medma_mtx_get_average_order_value($start_date, $end_date) {
		if($this->medma_mtx_get_total_orders($start_date, $end_date)>0)
		{
			$value = $this->medma_mtx_get_total_revenue($start_date, $end_date)/$this->medma_mtx_get_total_orders($start_date, $end_date);
			return round($value, 2);
		}
		else
		{
			return false;
		}
	}
	

	public function medma_mtx_get_last_five_products(){
		
		global $wpdb;
		$order_item_ids = $wpdb->get_results("SELECT ".$wpdb->prefix."posts.id,".$wpdb->prefix."posts.post_date, ".$wpdb->prefix."woocommerce_order_items.order_item_id, ".$wpdb->prefix."woocommerce_order_items.order_item_name
										FROM ".$wpdb->prefix."posts
										LEFT JOIN ".$wpdb->prefix."woocommerce_order_items
										ON ".$wpdb->prefix."posts.ID=".$wpdb->prefix."woocommerce_order_items.order_id
										WHERE ".$wpdb->prefix."posts.post_type = 'shop_order'
										AND ".$wpdb->prefix."posts.post_status IN ( '" . implode( "','", array( 'wc-completed', 'wc-processing', 'wc-on-hold' ) ) . "' )
										ORDER BY ".$wpdb->prefix."posts.id DESC LIMIT 5");
					
		$order_totals = array();
		$order_total = 0;
		foreach($order_item_ids as $order_item_id){
			$price = $wpdb->get_results("SELECT ".$wpdb->prefix."woocommerce_order_itemmeta.meta_value
										FROM ".$wpdb->prefix."woocommerce_order_itemmeta
										WHERE ".$wpdb->prefix."woocommerce_order_itemmeta.meta_key = '_line_total'
										AND ".$wpdb->prefix."woocommerce_order_itemmeta.order_item_id = ".$order_item_id->order_item_id);
			
			// echo count($price);
			if(count($price)) {
				$order_totals[$order_total]['order_item_name'] = $order_item_id->order_item_name;									
				$order_totals[$order_total]['post_date'] = $order_item_id->post_date;									
				$order_totals[$order_total]['meta_value'] = $price[0]->meta_value;
				$order_total++;			
			}						
		}				
		
		return $order_totals;
	}
	
	public function medma_mtx_all_products_ratio(){
		global $wpdb;
		$results = $wpdb->get_results("SELECT p.post_title as product, pm.meta_value as total_sales FROM {$wpdb->posts} AS p LEFT JOIN {$wpdb->postmeta} AS pm ON (p.ID = pm.post_id AND pm.meta_key LIKE 'total_sales') WHERE p.post_type LIKE 'product' AND p.post_status LIKE 'publish' ORDER BY pm.meta_value", 'ARRAY_A');
		
		foreach($results as $key => $result){
			$product = get_page_by_title( $result['product'], OBJECT, 'product' );
			$product_view = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix .'medma_product_views WHERE (product_id = '.$product->ID.')', OBJECT );
			// echo "string".$product->ID;
			// print_r($product_view);
			if(count($product_view) == 0){
				$results[$key]['views'] = 0;
			}else{
				$results[$key]['views'] = $product_view[0]->views;
			}
			
			if($results[$key]['total_sales'] == 0){
				$results[$key]['ratio'] = 0;
			}else{
				$results[$key]['ratio'] = $results[$key]['views']/$results[$key]['total_sales'];
			}
		}
		return $results;
	}
	
	public function medma_mtx_get_star_product(){
		$results = $this->medma_mtx_all_products_ratio();
		
		
		foreach ($results as $key=>$Rsult) {
			if($Rsult['ratio'] !== 0){
				$min=$Rsult['ratio'];
				break;
			}
		}
		$i = 0;
		$product_title = array();
		foreach ($results as $key=>$Rsult) {
			if($Rsult['ratio'] !== 0){
				
				if($Rsult['ratio'] < $min){
					$min = $Rsult['ratio'];
					$product_title = array();
					$product_title[0]['title'] = $Rsult['product'];
					$product_title[0]['total_sales'] = $Rsult['total_sales'];
					$product_title[0]['views'] = $Rsult['views'];
				}else if($Rsult['ratio'] == $min){
					$i = $i+1;
					$product_title[$i]['title'] = $Rsult['product'];
					$product_title[$i]['total_sales'] = $Rsult['total_sales'];
					$product_title[$i]['views'] = $Rsult['views'];
				}
			}
			
			
		}
		
		return $product_title;
	}
	
	public function medma_mtx_get_reprice_product(){
		
		$results = $this->medma_mtx_all_products_ratio();
		
		$max=-1;
		$i = 0;
		foreach ($results as $key=>$Rsult) {
			
			if($Rsult['ratio'] > $max){
				$max = $Rsult['ratio'];
				$product_title = array();
				$product_title[0]['title'] = $Rsult['product'];
				$product_title[0]['total_sales'] = $Rsult['total_sales'];
				$product_title[0]['views'] = $Rsult['views'];
			}else if($Rsult['ratio'] == $max){
				$i = $i+1;
				$product_title[$i]['title'] = $Rsult['product'];
				$product_title[$i]['total_sales'] = $Rsult['total_sales'];
				$product_title[$i]['views'] = $Rsult['views'];
			}
			
			
		}
		
		return $product_title;
	}
	
	public function medma_mtx_get_potential_product(){
		global $wpdb;
		$results = $this->medma_mtx_all_products_ratio();
	
		$max = $second = 0;
		$maxKey = $secondKey = null;
		$anotherSecond = array();
		foreach($results as $key => $Rsult) {
			if($Rsult['ratio'] !== 0){
				if($Rsult['ratio'] > $max) {
					$second = $max;
					$secondKey = $maxKey;
					$max = $Rsult['ratio'];
					$maxKey = $key;
				} elseif($Rsult['ratio'] > $second) {
					$second = $Rsult['ratio'];
					$secondKey = $key;
				} elseif($Rsult['ratio'] == $second) {
					$anotherSecond[] = $key;
				}
			}
		}
		
		
		
		$product_title = array();
		$i = 0;
		if($secondKey !== null){
			$product_title[$i]['title'] = $results[$secondKey]['product'];
			$product_title[$i]['total_sales'] = $results[$secondKey]['total_sales'];
			$product_title[$i]['views'] = $results[$secondKey]['views'];
		}
		
		if(count($anotherSecond) !== 0){
			foreach($anotherSecond as $another){
				$i = $i+1;
				$product_title[$i]['title'] = $results[$another]['product'];
				$product_title[$i]['total_sales'] = $results[$another]['total_sales'];
				$product_title[$i]['views'] = $results[$another]['views'];
			}
		}
		
	
		
		return $product_title;
	}
	
/**
 * Function to get re-think products.
 *
 * Used to get all re-think produncts details
 * 
 * @since    1.0.0
 * 
 * Return re-think product title.
 */	
 
	public function medma_mtx_get_rethink_product(){
		global $wpdb;
		$results = $this->medma_mtx_all_products_ratio();
		//$min_view = min(array_map('views', $results));
		$min_arr = array_map(function($element) {
  return $element['views'];
}, $results);
		$min_view = (empty($min_arr)) ? [] : min($min_arr);
		$new_results = array();
		for($i = 0; $i < 10; $i++){
			if (array_key_exists($i, $results)) {
				$diff = $results[$i]['views']-$min_view;
				$new_results[$i]['product'] = $results[$i]['product'];
				$new_results[$i]['total_sales'] = $results[$i]['total_sales'];
				$new_results[$i]['views'] = $results[$i]['views'];
				$new_results[$i]['diff'] = $diff;
			}
		}

		$j = 0;
		foreach ($new_results as $key=>$Rsult) {
				//if($Rsult['diff'] < $min){
					if($Rsult['diff'] < $min_view){
					$min_view = $Rsult['diff'];
					$product_title = array();
					$product_title[0]['title'] = $Rsult['product'];
					$product_title[0]['total_sales'] = $Rsult['total_sales'];
					$product_title[0]['views'] = $Rsult['views'];
					$product_title[0]['diff'] = $Rsult['diff'];
				}
				//else if($Rsult['diff'] == $min){
					else if($Rsult['diff'] == $min_view){
					$j = $j+1;
					$product_title[$j]['title'] = $Rsult['product'];
					$product_title[$j]['total_sales'] = $Rsult['total_sales'];
					$product_title[$j]['views'] = $Rsult['views'];
					$product_title[$j]['diff'] = $Rsult['diff'];
				}
		}
	
		return $product_title;
		
	}
/**
 * Function for analysis of popup or strip.
 *
 * Used to count view and clicks of popup 
 * and strip.
 * 
 * @since    1.0.0
 * 
 */		
	public function medma_mtx_get_popupAnalyticsValue(){
		$result = array();
		global $wpdb;
		$fromDate =  $_GET['from_date'];
		$toDate =  $_GET['to_date'];
		
		$popup_view = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix .'medma_analytics WHERE (count_option = 1 and time >="'.$fromDate.'" and time <="'.$toDate.'")', OBJECT );
		$popup_view_count = count($popup_view);
		
		$popup_click = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix .'medma_analytics WHERE (count_option = 2 and time >="'.$fromDate.' and time <='.$toDate.'")', OBJECT );
		$popup_click_count = count($popup_click);
		
		$strip_click = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix .'medma_analytics WHERE (count_option = 3 and time >="'.$fromDate.'" and time <="'.$toDate.'")', OBJECT );
		$strip_click_count = count($strip_click);
		
		$result['countPopupView'] = $popup_view_count;
		$result['countPopupClick'] = $popup_click_count;
		$result['countStripClick'] = $strip_click_count;
		
		$begin = new DateTime($fromDate);
		$end = new DateTime($toDate);

		$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
		$dateArray = array();
		
		foreach($daterange as $dates){
			$dateArray[] = $dates->format("Y-m-d");
		}
		$dateArray[] = $toDate;
		
		$days = array();
		$total_sales = array();
		$items_sold = array();
		$total_revenue = array();
		foreach($dateArray as $date){
			$total_sales[] = $this->medma_mtx_get_total_orders($date.' 00:00:00', $date.' 23:59:59');
			$items_sold[] = $this->medma_mtx_get_items_sold($date.' 00:00:00', $date.' 23:59:59');
			$total_revenue[] = $this->medma_mtx_get_total_revenue($date.' 00:00:00', $date.' 23:59:59');
			$days[] = $date;
		}
		
		$result['graph']['total_sales'] = $total_sales;
		$result['graph']['items_sold'] = $items_sold;
		$result['graph']['total_revenue'] = $total_revenue;
		$result['graph']['days'] = $days;
		$result['graph']['text'] = "Woo-commerce Analytics";
			
		$result['total_sales'] = $this->medma_mtx_get_total_orders($fromDate.' 00:00:00', $toDate.' 23:59:59');
		$result['items_sold'] = $this->medma_mtx_get_items_sold($fromDate.' 00:00:00', $toDate.' 23:59:59');
		$result['total_revenue'] = $this->medma_mtx_get_total_revenue($fromDate.' 00:00:00', $toDate.' 23:59:59');
		$result['average_order_value'] = $this->medma_mtx_get_average_order_value($fromDate.' 00:00:00', $toDate.' 23:59:59');
		
		wp_die(json_encode($result));
	}
	
/**
 * Function for analysis of orders.
 *
 * Used to current date, weekly, monthly
 * yearly analysis of orders
 * 
 * @since    1.0.0
 */	
 
	public function medma_mtx_get_analytics(){
		$result = array();
		global $wpdb;
		$type =  sanitize_text_field($_POST['type']);
		if($type == 'today-analytics'){
			$date = explode(' ', current_time( 'mysql' ));
			
			$total_sales[0] = $this->medma_mtx_get_total_orders($date[0].' 00:00:00', $date[0].' 23:59:59');
			$items_sold[0] = $this->medma_mtx_get_items_sold($date[0].' 00:00:00', $date[0].' 23:59:59');
			$total_revenue[0] = $this->medma_mtx_get_total_revenue($date[0].' 00:00:00', $date[0].' 23:59:59');
			$days[0] = "Today";
			
			$result['total_sales'] = $total_sales;
			$result['items_sold'] = $items_sold;
			$result['total_revenue'] = $total_revenue;
			$result['days'] = $days;
			$result['text'] = "Today's Woo-commerce Analytics";
		}
		else if($type == 'weekly-analytics'){
			$dateArray = $this->medma_mtx_getLastNDays(7);
			$days = array();
			$total_sales = array();
			$items_sold = array();
			$total_revenue = array();
		
			foreach($dateArray as $date){
				$total_sales[] = $this->medma_mtx_get_total_orders($date['date'].' 00:00:00', $date['date'].' 23:59:59');
				$items_sold[] = $this->medma_mtx_get_items_sold($date['date'].' 00:00:00', $date['date'].' 23:59:59');
				$total_revenue[] = $this->medma_mtx_get_total_revenue($date['date'].' 00:00:00', $date['date'].' 23:59:59');
				$days[] = $date['day'];
			}
			$result['total_sales'] = $total_sales;
			$result['items_sold'] = $items_sold;
			$result['total_revenue'] = $total_revenue;
			$result['days'] = $days;
			$result['text'] = "Weekly Woo-commerce Analytics";
			
		}
		else if($type == 'monthly-analytics'){
			$dateArray = $this->medma_mtx_getLastNDays(30);
			$days = array();
			$total_sales = array();
			$items_sold = array();
			$total_revenue = array();
			foreach($dateArray as $date){
				$total_sales[] = $this->medma_mtx_get_total_orders($date['date'].' 00:00:00', $date['date'].' 23:59:59');
				$items_sold[] = $this->medma_mtx_get_items_sold($date['date'].' 00:00:00', $date['date'].' 23:59:59');
				$total_revenue[] = $this->medma_mtx_get_total_revenue($date['date'].' 00:00:00', $date['date'].' 23:59:59');
				$days[] = $date['date'];
			}
			$result['total_sales'] = $total_sales;
			$result['items_sold'] = $items_sold;
			$result['total_revenue'] = $total_revenue;
			$result['days'] = $days;
			$result['text'] = "Monthly Woo-commerce Analytics";
			
		}
		else if($type == 'yearly-analytics'){

			$dateArray = $this->medma_mtx_getLastNDays(365);
			$res = $this->medma_mtx_rent_range($dateArray[0]['date'], $dateArray[364]['date']);
			
			$days = array();
			$total_sales = array();
			$items_sold = array();
			$total_revenue = array();
			for($i = 0; $i < 12; $i++){
				$total_sales[] = $this->medma_mtx_get_total_orders($res['start_dates'][$i].' 00:00:00', $res['end_dates'][$i].' 23:59:59');
				$items_sold[] = $this->medma_mtx_get_items_sold($res['start_dates'][$i].' 00:00:00', $res['end_dates'][$i].' 23:59:59');
				$total_revenue[] = $this->medma_mtx_get_total_revenue($res['start_dates'][$i].' 00:00:00', $res['end_dates'][$i].' 23:59:59');
				$days[] = date("F", strtotime($res['start_dates'][$i])); 
			}
			
			$result['total_sales'] = $total_sales;
			$result['items_sold'] = $items_sold;
			$result['total_revenue'] = $total_revenue;
			$result['days'] = $days;
			$result['text'] = "Yearly Woo-commerce Analytics";
		
		}
		wp_die(json_encode($result));
	}
	
	function medma_mtx_rent_range($start_date, $end_date)
	{
		$start_date = date("Y-m-d", strtotime($start_date));
		$end_date   = date("Y-m-d", strtotime($end_date));
		$start = strtotime($start_date);
		$end = strtotime($end_date);

		$month = $start;
		$months[] = date('Y-m', $start);
		while($month < $end) {
		  $month = strtotime("+1 month", $month);
		  $months[] = date('Y-m', $month);
		}

		foreach($months as $mon)
		{
			$mon_arr = explode( "-", $mon);
			$y = $mon_arr[0];
			$m = $mon_arr[1];
			$start_dates_arr[] = date("Y-m-d", strtotime($m.'/01/'.$y.' 00:00:00'));
			$end_dates_arr[] = date("Y-m-d", strtotime('-1 minute', strtotime('+1 month',strtotime($m.'/01/'.$y.' 00:00:00'))));
		}

		
		array_shift($start_dates_arr);
		array_pop($start_dates_arr);
		array_unshift($start_dates_arr, $start_date);

	
		array_pop($end_dates_arr);
		array_pop($end_dates_arr);
		array_push($end_dates_arr, $end_date);

		$result['start_dates'] = $start_dates_arr;
		$result['end_dates'] = $end_dates_arr;
		return $result;
	}

/**
 * Function for get last days.
 *
 * Used for get last day from given date array.
 * 
 * @since    1.0.0
 * 
 * @param      Int $days The number for finding days.
 * Return reverse date array.
 */
	public function medma_mtx_getLastNDays($days){
		$m = date("m");
		$de = date("d");
		$y = date("Y");
		$dateArray = array();
		for($i = 0; $i <= $days-1; $i++){
			$dateArray[$i]['date'] = date("Y-m-d", mktime(0,0,0,$m,($de-$i),$y));
			$dateArray[$i]['day'] = date("D", strtotime($dateArray[$i]['date']));
		}
		return array_reverse($dateArray);
	}
}
