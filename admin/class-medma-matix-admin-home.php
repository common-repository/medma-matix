<?php 

/**
 * The admin specific functionality of the plugin.
 * 
 *
 * Defines the plugin name, version, and 
 * admin-specific stylesheet and JavaScript.
 *
 * @package    Matix
 * @subpackage Matix/admin
 * @author     Medma Technologies.
 * @since      1.0.0
 */


class Medma_Matix_Admin_Home {
	
/**
 * The version of this plugin.
 *
 * @since    1.0.0
 * @access   private
 * @var      string $version The current version of this plugin.
 */
	const VERSION = '1.0';

	
	protected $plugin_slug = 'medma_matix_admin_home';


	protected static $instance = null;

	public function __construct() {
		
		if ( is_admin() ) {
			
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'my-style-css', plugins_url('../public/css/my-style.css', __FILE__ ));
			add_action( 'admin_menu', array( $this, 'medma_mtx_plugin_admin_menu' ) );
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
	add_submenu_page( 'medma-matix', __( 'Home Page' ), __( 'Home Page' ), 8,'medma_home', array( $this, 'medma_mtx_menu_options' ) );
}


public function medma_mtx_menu_options() {
	if ( ! current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	?>
		
<?php 
	wp_enqueue_style( 'boot-min', plugins_url('../public/css/bootstrap/bootstrap.min.css', __FILE__ ));
	wp_enqueue_style( 'boot-theme-min', plugins_url('../public/css/bootstrap/bootstrap-theme.min.css', __FILE__ ));
	wp_enqueue_style( 'font-awesome', plugins_url('../public/css/font-awesome_4.1.0/css/font-awesome.min.css', __FILE__ ));
 	wp_enqueue_script( 'bootstrap-min-js', plugins_url('../public/js/bootstrap/bootstrap.min.js', __FILE__ ) );

 	wp_enqueue_style( 'admin-home-style', plugins_url('../admin/css/admin_home.css', __FILE__ ));
 	wp_enqueue_script( 'admin-home-script', plugins_url('../admin/js/admin_home_script.js', __FILE__ ) );

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
		
			<div class="col-md-8">
				<div class="row">
					<h1 id="company">
						<p id="ext_name">[Extension Name]</p>  
					</h1>
				</div>
				<div class="row">
					<span id="ext_version">Version <span id="ver_text">1.0.0</span></span>
					
				</div>
				
				<p id="ext_desc">This is a wordpress popup builder module which adds analytics dashboard to your woocommerce store.</p>
			</div>
			<div class="col-md-4">
				<div class="header_box">
					<h2 class="news_heading">Latest News</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tabs">
				<ul class="tab-links">
					<li class="active"><a href="#about_tab">About</a></li>
					<li><a href="#offers_tab">Special Offers </a></li>
					<li><a href="#pay_tab">Paid Extensions</a></li>
					<li><a href="#free_tab">Free Extensions</a></li>
				</ul>
				<div class="tab-content">
					<div id="about_tab" class="tab active">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-4 about-block">
											<p style="text-align:center;"><i class="fa fa-rocket icon" aria-hidden="true"></i><br/></p>
											<p style="text-align:center;"><a href="" id="demo_link"/>Demo</a></p>
										</div>												
										<div class="col-md-4 about-block">
											<p style="text-align:center;"><i class="fa fa-file-video-o icon" aria-hidden="true"></i><br/></p>
											<p style="text-align:center;"><a href="" id="video_demo_link"/>Video Demo</a></p>
										</div>
										<div class="col-md-4 about-block">
											<p style="text-align:center;"><i class="fa fa-book icon" aria-hidden="true"></i><br/></p>
											<p style="text-align:center;"><a href="" id="manual_link"/>Manual</a></p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 about-block">
											<p style="text-align:center;"><i class="fa fa-ticket icon" aria-hidden="true"></i><br/></p>
											<p style="text-align:center;"><a href="" id="support_tick_link"/>Create Support Ticket</a></p>
										</div>
										<div class="col-md-6 about-block">
											<p style="text-align:center;"><i class="fa fa-question-circle icon" aria-hidden="true"></i><br/></p>
											<p style="text-align:center;"><a href="" id="knowl_link"/>KnowledgeBase</a></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="extension-block">
										<img src="<?php echo plugins_url('../includes/img/medma_matix_wp.png', __FILE__ ); ?>" alt="logo" id="ext_logo"/>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="pay_tab" class="tab">
						<div class="row pay_text_row">
						</div>
					</div>
					<div id="free_tab" class="tab">
						<div class="row free_text_row">
						</div>
					</div>
					<div id="offers_tab" class="tab">
						<div class="row offers_text_row">
						</div>
					</div>							
				</div>
				<div class="col-md-12 copyright">
					Copyright <?php echo date('Y');?> <a href="" id="company_url">Medma Infomatix</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	}
}

