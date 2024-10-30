<?php 

/**
 * The admin specific functionality of the plugin.
 * 
 *
 * Defines the plugin name, version, and examples for how to
 * get options, add options, update options for strip popup 
 * and enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Matix
 * @subpackage Matix/admin
 * @author     Medma Technologies.
 * @since      1.0.0
 */

class Medma_Matix_Admin_Strip {

/**
 * The version of this plugin.
 *
 * @since    1.0.0
 * @access   private
 * @var      string $version The current version of this plugin.
 */
 
	const VERSION = '1.0';

	
	protected $plugin_slug = 'medma_matix_admin_strip';


	protected static $instance = null;

	
	protected $menu_active;

		
	protected $menu_content;

	
	protected $show_on_homepage;	


	protected $show_on_posts;

	
	protected $show_on_pages;

	
	public function __construct() {
		
		$this->strip_displayOnPage = get_option( 'medma_matix_sp_strip_displayOnPage' );
		$this->strip_position = get_option( 'medma_matix_sp_strip_position' );
		$this->strip_details = stripslashes(get_option( 'medma_matix_sp_strip_details' ));
		$this->strip_textColour = get_option( 'medma_matix_sp_strip_textColour' );
		$this->strip_stripColour = get_option( 'medma_matix_sp_strip_stripColour' );
		$this->strip_buttonTextColour = get_option( 'medma_matix_sp_strip_buttonTextColour' );
		$this->strip_buttonBackColour = get_option( 'medma_matix_sp_strip_buttonBackColour' );
		$this->strip_buttonTextContent = get_option( 'medma_matix_sp_strip_buttonTextContent' );
		$this->strip_buttonUrl = get_option( 'medma_matix_sp_strip_buttonUrl' );
		$this->strip_buttonSize = get_option( 'medma_matix_sp_strip_buttonSize' );
		$this->strip_buttonUrlOpen = get_option( 'medma_matix_sp_strip_buttonUrlOpen' );
		$this->strip_buttonUrlActive = get_option( 'medma_matix_sp_strip_buttonUrlActive' );
		$this->strip_status = get_option( 'medma_matix_sp_strip_status' );
		$this->strip_status_visiting = get_option( 'medma_matix_sp_strip_status_visiting' );
		$this->strip_status_element = get_option( 'medma_matix_sp_strip_status_element' );
		$this->strip_status_element_name = get_option( 'medma_matix_sp_strip_status_element_name' );
		$this->strip_close_icon = get_option( 'medma_matix_sp_strip_close_icon' );
		$this->strip_message = get_option( 'medma_matix_sp_strip_message' );
		$this->strip_template_number = get_option( 'medma_matix_sp_strip_template_number' );
		
		if ( is_admin() ) {
			
			add_action('wp_ajax_insert_strip_content', array( $this, 'medma_mtx_insertStripContent'));
			add_action('wp_ajax_nopriv_insert_strip_content', array( $this, 'medma_mtx_insertStripContent'));
			
			
			
			add_action('wp_ajax_strip_refresh_template', array( $this, 'medma_mtx_stripRefreshTemplate'));
			add_action('wp_ajax_nopriv_strip_refresh_template', array( $this, 'medma_mtx_stripRefreshTemplate'));
			
			
			add_action( 'admin_menu', array( $this, 'medma_mtx_plugin_admin_menu' ) );
			

			wp_enqueue_style( 'wp-color-picker' );	
			
			wp_enqueue_script( 'my-template-script', plugins_url('../public/js/my-template-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
			
		} else {
			
			wp_enqueue_style( 'wp-color-picker' );
			
			add_action( 'wp', array( $this, 'medma_mtx_load_medma_menu' ) );
		}
	}

	
	public function medma_mtx_load_medma_menu () {
		
		wp_register_script( 'quills-js', plugins_url( '/js/quill.js', __FILE__ ) );
		wp_enqueue_script( 'quills-js' );
		wp_enqueue_style( 'quills-css', plugins_url('../public/css/quill.snow.css', __FILE__ ));


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
		add_submenu_page( 'medma-matix', __( 'Strips' ), __( 'Strips' ), 8, 'medma_matix_admin_strip' , array( $this, 'medma_mtx_menu_options' ) );
	}
	
	
	public function medma_mtx_menu_options() {
		if ( ! current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		$this->popup_or_strip = get_option( 'medma_matix_sp_popup_or_strip' );
		if ( $this->popup_or_strip !== false ) {
			update_option( 'medma_matix_sp_popup_or_strip', 'strip' );
		} else {
			add_option( 'medma_matix_sp_popup_or_strip', 'strip', null, 'no' );
		}
		
		$this->content_option = get_theme_mod( 'medma_matix_sp_strip_message' );
		if($this->content_option == 'template'){
			$this->strip_template_number = get_theme_mod( 'medma_matix_sp_mod_strip_template_number' );
			$temp_no = $this->strip_template_number;
		}else{
			$temp_no = 0;
		}
		$this->href = esc_url( admin_url( 'customize.php' )).'?url=custom_popup_strip&action=edit_strip_templates&temp_no='.$temp_no;
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
		
		
		if ( ! empty( sanitize_text_field($_POST) ) && check_admin_referer( 'medma_strip', 'save_medma_strip' ) ) {
			
			if ( $this->strip_position !== false ) {
				update_option( 'medma_matix_sp_strip_displayOnPage', sanitize_text_field($_POST['strip_displayOnPage'] ));
			} else {
				add_option( 'medma_matix_sp_strip_displayOnPage', sanitize_text_field($_POST['strip_displayOnPage']), null, 'no' );
			}
			
			//1 add or update Medma strip position
			if ( $this->strip_position !== false ) {
				update_option( 'medma_matix_sp_strip_position', sanitize_text_field($_POST['strip_position']) );
			} else {
				add_option( 'medma_matix_sp_strip_position', sanitize_text_field($_POST['strip_position']), null, 'no' );
			}
			
			//2 add or update Medma strip details
			if ( $this->strip_details !== false ) {
				update_option( 'medma_matix_sp_strip_details', sanitize_text_field($_POST['strip_details']) );
			} else {
				add_option( 'medma_matix_sp_strip_details', sanitize_text_field($_POST['strip_details']), null, 'no' );
			}
			
			//3 add or update Medma strip text colour
			if ( $this->strip_textColour !== false ) {
				update_option( 'medma_matix_sp_strip_textColour', sanitize_text_field($_POST['strip_textColour']) );
			} else {
				add_option( 'medma_matix_sp_strip_textColour', sanitize_text_field($_POST['strip_textColour']), null, 'no' );
			}
			
			//4 add or update Medma strip colour
			if ( $this->strip_stripColour !== false ) {
				update_option( 'medma_matix_sp_strip_stripColour', sanitize_text_field($_POST['strip_stripColour']) );
			} else {
				add_option( 'medma_matix_sp_strip_stripColour', sanitize_text_field($_POST['strip_stripColour']), null, 'no' );
			}
			
			//5 add or update Medma button text colour
			if ( $this->strip_buttonTextColour !== false ) {
				update_option( 'medma_matix_sp_strip_buttonTextColour', sanitize_text_field($_POST['strip_buttonTextColour']) );
			} else {
				add_option( 'medma_matix_sp_strip_buttonTextColour', sanitize_text_field($_POST['strip_buttonTextColour']), null, 'no' );
			}
			
			//6 add or update Medma strip button url
			if ( $this->strip_buttonBackColour !== false ) {
				update_option( 'medma_matix_sp_strip_buttonBackColour', $_POST['strip_buttonBackColour'] );
			} else {
				add_option( 'medma_matix_sp_strip_buttonBackColour', $_POST['strip_buttonBackColour'], null, 'no' );
			}
			
			
			//7 add or update Medma strip button size
			if ( $this->strip_buttonTextContent !== false ) {
				update_option( 'medma_matix_sp_strip_buttonTextContent', $_POST['strip_buttonTextContent'] );
			} else {
				add_option( 'medma_matix_sp_strip_buttonTextContent', $_POST['strip_buttonTextContent'], null, 'no' );
			}
			
			
			//8 add or update Medma strip button url open
			if ( $this->strip_buttonUrl !== false ) {
				update_option( 'medma_matix_sp_strip_buttonUrl', $_POST['strip_buttonUrl'] );
			} else {
				add_option( 'medma_matix_sp_strip_buttonUrl', $_POST['strip_buttonUrl'], null, 'no' );
			}
			
			//9 add or update Medma strip button active
			if ( $this->strip_buttonSize !== false ) {
				update_option( 'medma_matix_sp_strip_buttonSize', $_POST['strip_buttonSize'] );
			} else {
				add_option( 'medma_matix_sp_strip_buttonSize', $_POST['strip_buttonSize'], null, 'no' );
			}
			
			//10 add or update Medma strip status
			if ( $this->strip_buttonUrlOpen !== false ) {
				update_option( 'medma_matix_sp_strip_buttonUrlOpen', $_POST['strip_buttonUrlOpen'] );
			} else {
				add_option( 'medma_matix_sp_strip_buttonUrlOpen', $_POST['strip_buttonUrlOpen'], null, 'no' );
			}
			
			//11 add or update Medma strip status
			if ( $this->strip_buttonUrlActive !== false ) {
				update_option( 'medma_matix_sp_strip_buttonUrlActive', $_POST['strip_buttonUrlActive'] );
			} else {
				add_option( 'medma_matix_sp_strip_buttonUrlActive', $_POST['strip_buttonUrlActive'], null, 'no' );
			}
			
			//12 add or update Medma strip status
			if ( $this->strip_status !== false ) {
				update_option( 'medma_matix_sp_strip_status', $_POST['strip_status'] );
			} else {
				add_option( 'medma_matix_sp_strip_status', $_POST['strip_status'], null, 'no' );
			}
			
			if ( $this->strip_status_visiting !== false ) {
				update_option( 'medma_matix_sp_strip_status_visiting', $_POST['strip_status_visiting'] );
			} else {
				add_option( 'medma_matix_sp_strip_status_visiting', $_POST['strip_status_visiting'], null, 'no' );
			}
			
			if ( $this->strip_status_element !== false ) {
				update_option( 'medma_matix_sp_strip_status_element', $_POST['strip_status_element'] );
			} else {
				add_option( 'medma_matix_sp_strip_status_element', $_POST['strip_status_element'], null, 'no' );
			}
			
			if ( $this->strip_status_element_name !== false ) {
				update_option( 'medma_matix_sp_strip_status_element_name', $_POST['strip_status_element_name'] );
			} else {
				add_option( 'medma_matix_sp_strip_status_element_name', $_POST['strip_status_element_name'], null, 'no' );
			}
			
			if ( $this->strip_close_icon !== false ) {
				update_option( 'medma_matix_sp_strip_close_icon', $_POST['strip_close_icon'] );
			} else {
				add_option( 'medma_matix_sp_strip_close_icon', $_POST['strip_close_icon'], null, 'no' );
			}
			
			if ( $this->strip_message !== false ) {
				update_option( 'medma_matix_sp_strip_message', $_POST['strip_message'] );
			} else {
				add_option( 'medma_matix_sp_strip_message', $_POST['strip_message'], null, 'no' );
			}
			
			wp_redirect( admin_url( 'admin.php?page='.$_GET['page'].'&updated=1' ) );
		}
		?>
		<div class="wrap" style=" margin:10px; padding:35px;">
			<h2 class="bottom-line"><?php _e( 'Medma Strip', 'medma-strip' );?></h2>
			
			<?php
			if ( !class_exists( 'WooCommerce' ) ) { ?>
			
				<div style="display:none;" data-woocommerce="false" id="check-woocomerce"></div>
			<?php } else{ ?>
				<div style="display:none;" data-woocommerce="true" id="check-woocomerce"></div>
			<?php } ?>
			
			<form method="post" action="<?php echo esc_url( admin_url( 'admin.php?page='.$_GET['page'].'&noheader=true' ) ); ?>" enctype="multipart/form-data">
				<?php wp_nonce_field( 'medma_strip', 'save_medma_strip' ); ?>
				<div class="medma_strip_form">
					<table class="form-table" width="100%">
						
						<tr>
							<th scope="row">Strip Message</th>
							<td colspan="3">
							<select name="strip_message" id="strip_message">
								<?php foreach ( $this->medma_mtx_get_strip_message() as $key => $value ): ?>
									<option value="<?php esc_attr_e( $key ); ?>"<?php esc_attr_e( $key == $this->strip_message ? ' selected="selected"' : '' ); ?>><?php esc_attr_e( $value ); ?></option>
								<?php endforeach;?>
							</select>
							</td>
							
						</tr>
						<?if($this->strip_message == 'custom' || $this->strip_message == false){
							$show_custom = "";
							$show_template = "none";
						}else{
							$show_custom = "none";
							$show_template = "block";
						}?>	
						<tr id="custom_text_strip" style="display:<?php echo $show_custom;?>;">
							<th scope="row"></th>
							<td colspan="3">
							</td>
						</tr>
						<tr id="strip_save_edit" style="display:<?php echo $show_custom;?>;">
							<th scope="row"></th>
							<td colspan="3">
								<a href="javascript:void(0);" class="button" id="strip_save_option_type" data-ajax="<?php echo admin_url( 'admin-ajax.php' );?>" data-link="<?php echo admin_url('customize.php');?>?url=custom_popup_strip&action=edit_strip_templates&temp_no=0">Save and Edit Popup Content</a>
							</td>
						</tr>
					
					</table>
					<input type="hidden" name="strip_template_number" id="strip_template_number" value="<?php echo $this->strip_template_number; ?>">
					<ul class="strip-template-ul" id="temp_strip_ul" style="display:<?php echo $show_template;?>;">
						<?php for($i=1; $i<=4; $i++){?>
						
							<style>
								.overlay-<?php echo $i;?>{
								  position:   absolute;
								  width:      100%;
								  height:     0%;
								  overflow:   hidden;
								  transition: all 1s cubic-bezier(0, 1, 0.5, 1);
								  box-shadow: inset 0 0 0 1px #ccc;
								  background: rgba(0,0,0,0.8); /* Don't use opacity but rgba on bg */
								  top: 0px;
								  display:inline;
								}
								
								.main-li-<?php echo $i;?>:hover .overlay-<?php echo $i;?>{ 
								  height:     100%;
								}
								
								.main-li-<?php echo $i;?>{
									background-image: url(<?php echo esc_url( plugins_url( 'templates/image/strip_template'.$i.'.png', __FILE__ ) ); ?>);
								    background-size: cover;	
								}>
								
							</style>
							
							<li class="main-li-<?php echo $i;?>">
								<?php
									
									$current_url = admin_url('customize.php')."?url=custom_popup_strip&action=edit_strip_templates&temp_no=".$i;
								?>
							
								
								<?php if($this->strip_template_number == $i){
									$show_check = "block";
								}else{
									$show_check = "none";	
								}?>
								<span class="selected-temp" style="display:<?php echo $show_check;?>;"><i class="fa fa-check-square-o" aria-hidden="true"></i></span>
								<div class="overlay-<?php echo $i;?> overlay-div">
									<div class="overlay-edit">
										<a href="javascript:void(0);" class="strip_save_edit_cls" data-ajax="<?php echo admin_url( 'admin-ajax.php' );?>" data-temp-no="<?php echo $i;?>" data-link="<?php echo $current_url;?>">Save &amp; Edit</a>
										<a href="javascript:void(0);" class="" data-ajax="<?php echo admin_url( 'admin-ajax.php' );?>" data-temp-no="<?php echo $i;?>">Refresh</a>
										
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
					
					<p class="submit">
						<input type="submit" id="strip_submit" name="Submit" class="button-primary" value="<?php esc_attr_e( 'Submit' ) ?>" />
					</p>
				</div>
			</form>
			<?php
			$plugin_basename = plugin_basename( plugin_dir_path( __FILE__ ) );
			?>
			
		</div>
		<?php
	}	
	
	public function medma_mtx_insertStripContent(){
		$option1 = $_GET['option1'];
		$option1_val = $_GET['option1_val'];
		$option2 = $_GET['option2'];
		$option2_val = $_GET['option2_val'];
		
		
		$this->option_1 = get_option( $option1 );
		
		if ( $this->option_1 !== false ) {
			update_option( $option1, $option1_val );
		} else {
			add_option( $option1, $option1_val, null, 'no' );
		}
		
		if($option2 != ''){
			
			$this->option_2 = get_option( $option2 );
		
			if ( $this->option_2 !== false ) {
				update_option( $option2, $option2_val );
			} else {
				add_option( $option2, $option2_val, null, 'no' );
			}
		}
		
		wp_die();
	}
	
	public function medma_mtx_stripRefreshTemplate(){
		$temp_no = $_POST['temp_no'];
		
		if($temp_no == 1){
			remove_theme_mod( 'medma_matix_sp_strip_1_back_color' );
			remove_theme_mod( 'medma_matix_sp_strip_1_button_color' );
			remove_theme_mod( 'medma_matix_sp_strip_1_button_text' );
			remove_theme_mod( 'medma_matix_sp_strip_1_button_text_color' );
			delete_option( 'medma_matix_strip1_con_1' );
		}
		else if($temp_no == 2){
			remove_theme_mod( 'medma_matix_sp_strip_2_back_color' );
			remove_theme_mod( 'medma_matix_sp_strip_2_button_color' );
			remove_theme_mod( 'medma_matix_sp_strip_2_button_text' );
			remove_theme_mod( 'medma_matix_sp_strip_2_button_text_color' );
			remove_theme_mod( 'medma_matix_sp_strip_2_side_image' );
			delete_option( 'medma_matix_strip2_con_1' );
		}
		else if($temp_no == 3){
			remove_theme_mod( 'medma_matix_sp_strip_3_back_color' );
			remove_theme_mod( 'medma_matix_sp_strip_3_button_color' );
			remove_theme_mod( 'medma_matix_sp_strip_3_button_text' );
			remove_theme_mod( 'medma_matix_sp_strip_3_button_text_color' );
			remove_theme_mod( 'medma_matix_sp_strip_3_side_image' );
			delete_option( 'medma_matix_strip3_con_1' );
			delete_option( 'medma_matix_strip3_con_2' );
		}
		else if($temp_no == 4){
			remove_theme_mod( 'medma_matix_sp_strip_4_back_image' );
			remove_theme_mod( 'medma_matix_sp_strip_4_button_color' );
			remove_theme_mod( 'medma_matix_sp_strip_4_button_text' );
			remove_theme_mod( 'medma_matix_sp_strip_4_button_text_color' );
			delete_option( 'medma_matix_strip4_con_1' );
		}
		
		wp_die();
			
	}
	
	
	
	public function medma_mtx_get_strip_status_element() {
		return array(
				'id' => 'Id',
				'class' => 'Class',			
			);
	}
	
	public function medma_mtx_get_strip_message() {
		return array(
				'custom' => 'Custom',
				'template' => 'Template',			
			);
	}
	
	public function get_strip_displayOnPage() {
		return array(
				'allpage' => 'All Page',
				'category' => 'Product Category Page',
				'shop' => 'Shop Page',
				'product' => 'Product Page',
				'cart' => 'Cart Page',
				'checkout' => 'Checkout Page',
				'successpage' => 'Checkout Success Page',
							
			);
	}
	
	
	public function medma_mtx_get_strip_position() {
		return array(
				'top' => 'Top',
				'bottom' => 'Bottom',			
			);
	}
	
	public function medma_mtx_get_strip_buttonSize() {
		return array(
				'large' => 'Large',
				'medium' => 'Medium',
				'small' => 'Small',
				'xsmall' => 'X-Small',			
			);
	}
	
	public function medma_mtx_get_strip_buttonUrlOpen() {
		return array(
				'newWindow' => 'New Window',
				'sameWindow' => 'Same Window',	
				'popupWindow' => 'Popup Window',		
			);
	}
	
	public function medma_mtx_get_strip_activeStatus() {
		return array(
				'disable' => 'Disable',	
				'enable' => 'Enable',
			);
	}
	
	public function medma_mtx_get_strip_status() {
		return array(
				'always' => 'Enable',
				'never' => 'Disable',
				
			);
	}
	
}
