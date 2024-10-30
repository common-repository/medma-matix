<?php 

/**
 * The admin specific functionality of the plugin.
 * 
 *
 * Defines the plugin name, version, and examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Matix
 * @subpackage Matix/admin
 * @author     Medma Technologies.
 * @since      1.0.0
 */

class Medma_Matix_Admin_Popup {
/**
 * The version of this plugin.
 *
 * @since    1.0.0
 * @access   private
 * @var      string $version The current version of this plugin.
 */
	const VERSION = '1.0';

	
	protected $plugin_slug = 'medma_matix_admin_popup';


	protected static $instance = null;

	
	protected $menu_active;

		
	protected $menu_content;

	
	protected $show_on_homepage;	


	protected $show_on_posts;

	
	protected $show_on_pages;

	
	public function __construct() {
		$this->popup_content = stripslashes(get_option( 'medma_matix_sp_popup_content' ));
		$this->popup_content_option = get_option( 'medma_matix_sp_popup_content_option' );
		$this->popup_image_url = get_option( 'medma_matix_sp_popup_image_url' );
		$this->popup_video_content = get_option( 'medma_matix_sp_popup_video_content' );
		
		
		if ( is_admin() ) {
		
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'my-style-css', plugins_url('../public/css/my-style.css', __FILE__ ));
			
			add_action('wp_ajax_insert_popup_content', array( $this, 'insertPopupContent'));
			add_action('wp_ajax_nopriv_insert_popup_content', array( $this, 'insertPopupContent'));
			
			add_action( 'admin_menu', array( $this, 'plugin_admin_menu' ) );
			
		} else {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'my-style-css', plugins_url('../public/css/my-style.css', __FILE__ ));
			
			add_action( 'wp', array( $this, 'medma_mtx_load_medma_menu' ) );
		}
	}
	
	
	
	public function medma_mtx_load_medma_menu () {
		
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
	
	
	public function plugin_admin_menu() {
		add_submenu_page( 'medma-matix', __( 'Popups' ), __( 'Popups' ), 8,'medma_matix_admin_popup', array( $this, 'medma_mtx_menu_options' ) );
	}
	
	
	public function medma_mtx_menu_options() {
		
		if ( ! current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		$this->popup_or_strip = get_option( 'medma_matix_sp_popup_or_strip' );
		if ( $this->popup_or_strip !== false ) {
			update_option( 'medma_matix_sp_popup_or_strip', 'popup' );
		} else {
			add_option( 'medma_matix_sp_popup_or_strip', 'popup', null, 'no' );
		}
		
		$this->content_option = get_theme_mod( 'medma_matix_sp_popup_content_option' );
		if($this->content_option == 'template'){
			$this->popup_template_number = get_theme_mod( 'medma_matix_sp_mod_template_number' );
			$temp_no = $this->popup_template_number;
		}else{
			$temp_no = 0;
		}
		$this->href = esc_url( admin_url( 'customize.php' )).'?url=custom_popup_strip&action=edit_templates&temp_no='.$temp_no;
		$referal = $_SERVER["HTTP_REFERER"];

		if (strpos($referal, 'customize.php') !== false) {
			?>
		
			<script>
				window.location.href = "<?php echo esc_url( admin_url());?>"
			</script>
			
			<?php 
		}else{
			?>
			
			<script>
				window.location.href = "<?php echo $this->href;?>"
			</script>
			
			<?php 
		}
		exit;
	}
	
}
