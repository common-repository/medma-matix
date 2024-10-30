<?php 

/**
 * The admin specific functionality to view templates.
 * 
 *
 * Defines the plugin name, version, and set templates preview
 * and enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Matix
 * @subpackage Matix/admin
 * @author     Medma Technologies.
 * @since      1.0.0
 */
 
class Medma_Matix_Admin_Templates {

/**
 * The version of this plugin.
 *
 * @since    1.0.0
 * @access   private
 * @var      string $version The current version of this plugin.
 */
	const VERSION = '1.0';

	
	protected $plugin_slug = 'medma_matix_admin_templates';


	protected static $instance = null;


	
	public function __construct() {
		
		//$this->template_number = get_option( 'medma_matix_sp_template_number' );
		$this->template_number = get_theme_mod( 'medma_matix_sp_mod_template_number' );
		$this->strip_template_number = get_theme_mod( 'medma_matix_sp_mod_strip_template_number' );
		
		if ( is_admin() ) {
			
			
			$current_url = admin_url('admin.php')."?page=medma_matix_admin_popup";
					
			
			
			add_action('wp_ajax_refresh_template', array( $this, 'medma_mtx_refreshTemplate'));
			add_action('wp_ajax_nopriv_refresh_template', array( $this, 'medma_mtx_refreshTemplate'));
			
			add_action('wp_ajax_strip_refresh_template', array( $this, 'medma_mtx_stripRefreshTemplate'));
			add_action('wp_ajax_nopriv_strip_refresh_template', array( $this, 'medma_mtx_stripRefreshTemplate'));
			
			add_action('wp_ajax_insert_template_strip', array( $this, 'medma_mtx_insertStripTemplate'));
			add_action('wp_ajax_nopriv_insert_template_strip', array( $this, 'medma_mtx_insertStripTemplate'));
			wp_enqueue_style( 'wp-color-picker' );
			
			wp_enqueue_style( 'my-template-css', plugins_url('../public/css/my-template.css', __FILE__ ));
			add_action( 'admin_menu', array( $this, 'medma_mtx_plugin_admin_menu' ) );
			
			wp_enqueue_script( 'my-template-script', plugins_url('../public/js/my-template-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
			
			add_action('wp_ajax_insert_template_popup', array( $this, 'medma_mtx_insertTemplate'));
			add_action('wp_ajax_nopriv_insert_template_popup', array( $this, 'medma_mtx_insertTemplate'));
			
			
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
		add_submenu_page( 'medma-matix', __( 'Templates' ), __( 'Templates' ), 8,'medma_matix_admin_templates', array( $this, 'medma_mtx_menu_options' ) );
	}
	
	
	public function medma_mtx_menu_options() {
		if ( ! current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		if ( $this->template_number !== false ) {
			update_option( 'medma_matix_sp_template_number', $_POST['template_number'] );
		} else {
			add_option( 'medma_matix_sp_template_number', $_POST['template_number'], null, 'no' );
		}
		
		
		?>
		<div class="wrap" style=" margin:10px; padding:35px;">
			
			<?php $current_url = admin_url('admin.php')."?page=medma_matix_admin_popup"; ?>
			<?php $current_url_s = admin_url('admin.php')."?page=medma_matix_admin_strip"; ?>
			<input type='hidden' id='ajaxUrl' value='<?php echo admin_url( 'admin-ajax.php' );?>'>
			<input type='hidden' id='rediect_url' value='<?php echo $current_url;?>'>
			<input type='hidden' id='rediect_url_s' value='<?php echo $current_url_s;?>'>
			
			<input type="hidden" value="<?php echo $this->template_number;?>" name="template_number">
			
			<ul class="template-ul">
				
				<h2 class="bottom-line"><?php _e( 'Popup Templates', 'templates' );?></h2>
				<?php 
				for($i=1; $i<=16; $i++){?>
				
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
						}
						
						.main-li-<?php echo $i;?>:hover .overlay-<?php echo $i;?>{ 
						  height:     100%;
						}
						
						.main-li-<?php echo $i;?>{
							background-image: url(<?php echo esc_url( plugins_url( 'templates/image/template'.$i.'.png', __FILE__ ) ); ?>);
							background-size: cover;	
						}
						
					</style>
					
					<?php $current_url_temp = admin_url('customize.php')."?url=custom_popup_strip&action=edit_templates&temp_no=".$i; ?>
					
					<li class="main-li-<?php echo $i;?>">
						<?php if($this->template_number == $i){ ?>
							<span class="selected-template"><i class="fa fa-check" aria-hidden="true"></i></span>
						<?php } ?>
						
						<div class="overlay-<?php echo $i;?> overlay-div">
							<?php if($this->template_number == $i){ ?>
								<span class="selected-template selected-template-overlay"><i class="fa fa-check" aria-hidden="true"></i></span>
							<?php } ?>
							<h2>First Order Discount</h2>
							<i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw" id="spin_<?php echo $i;?>" aria-hidden="true" style="color:#0072FF; display:none;"></i>
							<div class="overlay-edit">
								<a href="javascript:void(0);" class="save_edit_cls" data-ajax="<?php echo admin_url( 'admin-ajax.php' );?>" data-temp-no="<?php echo $i;?>" data-link="<?php echo $current_url_temp;?>">Select</a>
								<a href="javascript:void(0);" class="onclick_preview_popup" data-img-url="<?php echo plugins_url('templates/image', __FILE__ )?>" data-popup="<?php echo $i;?>">Preview</a>
								<a href="javascript:void(0);" class="refesh_cls" data-ajax="<?php echo admin_url( 'admin-ajax.php' );?>" data-temp-no="<?php echo $i;?>">Refresh</a>
							</div>
						</div>
					</li>
				<?php } ?>
			</ul>
				<ul class="strip-template-ul" id="temp_strip_ul" style="display:<?php echo $show_template;?>;">
					<h2 class="bottom-line"><?php _e( 'Strip Templates', 'templates' );?></h2>
					<?php for($i=1; $i<=4; $i++){?>
					
						<style>
							.overlay-strip-<?php echo $i;?>{
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
							
							.main-li-strip-<?php echo $i;?>:hover .overlay-strip-<?php echo $i;?>{ 
							  height:     100%;
							}
							
							#strip-cancle{
								display: none;
							}
							
							.main-li-strip-<?php echo $i;?>{
								background-image: url(<?php echo esc_url( plugins_url( 'templates/image/strip_template'.$i.'.png', __FILE__ ) ); ?>);
								background-size: cover;	
							}
							
						</style>
						
						<li class="main-li-strip-<?php echo $i;?>">
							<?php
								
								$current_url_strip = admin_url('customize.php')."?url=custom_popup_strip&action=edit_strip_templates&temp_no=".$i;
							?>
						
							
							
							<?php if($this->strip_template_number == $i){
								$show_check = "block";
							}else{
								$show_check = "none";	
							}?>
							
							<!--span class="selected-temp" style="display:<?php echo $show_check;?>;"><i class="fa fa-check-square-o" aria-hidden="true"></i></span-->
							<?php if($this->strip_template_number == $i){ ?>
								<span class="selected-template"><i class="fa fa-check" aria-hidden="true"></i></span>
							<?php } ?>
							
							<div class="overlay-strip-<?php echo $i;?> overlay-div">
								<?php if($this->strip_template_number == $i){ ?>
									<span class="selected-template selected-template-overlay"><i class="fa fa-check" aria-hidden="true"></i></span>
								<?php } ?>
								<div class="overlay-edit">
									<a href="javascript:void(0);" class="strip_save_edit_cls" data-ajax="<?php echo admin_url( 'admin-ajax.php' );?>" data-temp-no="<?php echo $i;?>" data-link="<?php echo $current_url_strip;?>">Select</a>
									<a href="javascript:void(0);" class="onclick_preview_strip" data-img-url="<?php echo plugins_url('templates/image', __FILE__ )?>" data-ajax="<?php echo admin_url( 'admin-ajax.php' );?>" data-temp-no="<?php echo $i;?>">Preview</a>
									<a href="javascript:void(0);" class="strip_refesh_cls" data-ajax="<?php echo admin_url( 'admin-ajax.php' );?>" data-temp-no="<?php echo $i;?>">Refresh</a>
									<i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw" id="strip_spin_<?php echo $i;?>" aria-hidden="true" style="color:#0072FF; display:none;"></i>
								</div>
							</div>
						</li>
					<?php } ?>
				</ul>
		</div>
		
		<!-- The Modal -->
		<div id="myModal-temp" class="modal-temp">
			<style>
				.temp-preview{
					display:none;
				}
			</style>
		  <!-- Modal content -->
		  <div class="modal-content-temp" style="background-size:cover;">
			<span class="close-temp"><i class='fa fa-times-circle-o' aria-hidden='true' style='background-color: #ffffff;border-radius: 50%;padding: 0px 3px;'></i></span><!--&times;-->
			
		  </div>

		</div>
		
		<!-- The Modal -->
		<div id="myModal-strip-temp" class="modal-temp">
			<style>
				.temp-preview{
					display:none;
				}
			</style>
		  <!-- Modal content -->
		  <div class="modal-content-strip-temp">
			<span class="close-temp-strip"><i class='fa fa-times-circle' aria-hidden='true' style='color: #fff;'></i></span><!--&times;-->
			
		  </div>

		</div>
				



		<?php 
	}
	
/**
 * Function for insert strip templates.
 *
 * Used to insert strip template numbers
 * into database
 * 
 * @since    1.0.0
 *
 */		
	public function medma_mtx_insertStripTemplate(){
		$temp_no = sanitize_text_field($_POST['temp_no']);
		
		$this->popup_or_strip = get_option( 'medma_matix_sp_popup_or_strip' );
	
		
		if ( $this->popup_or_strip !== false ) {
			update_option( 'medma_matix_sp_popup_or_strip', 'strip' );
		} else {
			add_option( 'medma_matix_sp_popup_or_strip', 'strip', null, 'no' );
		}
		
		set_theme_mod( 'medma_matix_sp_strip_message', 'template' );
		set_theme_mod( 'medma_matix_sp_mod_strip_template_number', $temp_no );
		
		wp_die();
	}
	
/**
 * Function for insert templates.
 *
 * Used to insert template numbers
 * into database
 * 
 * @since    1.0.0
 *
 */	
 
	public function medma_mtx_insertTemplate(){
		$temp_no = sanitize_text_field($_POST['temp_no']);
		$this->popup_or_strip = get_option( 'medma_matix_sp_popup_or_strip' );
		
		
		if ( $this->popup_or_strip !== false ) {
			update_option( 'medma_matix_sp_popup_or_strip', 'popup' );
		} else {
			add_option( 'medma_matix_sp_popup_or_strip', 'popup', null, 'no' );
		}
		
		set_theme_mod( 'medma_matix_sp_popup_content_option', 'template' );
		set_theme_mod( 'medma_matix_sp_mod_template_number', $temp_no );
		
		wp_die();
			
	}
	
/**
 * Function for refresh templates.
 *
 * Used to refresh template by
 * post template numbers.
 * 
 * @since    1.0.0
 *
 */	
	public function medma_mtx_refreshTemplate(){
		$temp_no = sanitize_text_field($_POST['temp_no']);
		
		if($temp_no == 1){
			remove_theme_mod( 'medma_matix_sp_1_background_img' );
			remove_theme_mod( 'medma_matix_sp_1_button_color' );
			remove_theme_mod( 'medma_matix_sp_1_button_text' );
			remove_theme_mod( 'medma_matix_sp_1_button_text_color' );
			delete_option( 'medma_matix_temp1_con_1' );
			delete_option( 'medma_matix_temp1_con_2' );
			delete_option( 'medma_matix_temp1_con_3' );
		}
		else if($temp_no == 2){
			remove_theme_mod( 'medma_matix_sp_2_button_color' );
			remove_theme_mod( 'medma_matix_sp_2_button_text' );
			remove_theme_mod( 'medma_matix_sp_2_text_color' );
			delete_option( 'medma_matix_temp2_con_1' );
			delete_option( 'medma_matix_temp2_con_2' );
			delete_option( 'medma_matix_temp2_con_3' );
			delete_option( 'medma_matix_temp2_con_4' );
		}
		else if($temp_no == 3){
			remove_theme_mod( 'medma_matix_sp_3_button_color' );
			remove_theme_mod( 'medma_matix_sp_3_button_text' );
			remove_theme_mod( 'medma_matix_sp_3_text_color' );
			remove_theme_mod( 'medma_matix_sp_3_background_img' );
			remove_theme_mod( 'medma_matix_sp_3_opacity' );
			delete_option( 'medma_matix_temp3_con_1' );
			delete_option( 'medma_matix_temp3_con_2' );
			delete_option( 'medma_matix_temp3_con_3' );
			delete_option( 'medma_matix_temp3_con_4' );
		}
		else if($temp_no == 4){
			remove_theme_mod( 'medma_matix_sp_4_background_img' );
			remove_theme_mod( 'medma_matix_sp_4_button_color' );
			remove_theme_mod( 'medma_matix_sp_4_button_text' );
			remove_theme_mod( 'medma_matix_sp_4_text_color' );
			delete_option( 'medma_matix_temp4_con_1' );
			delete_option( 'medma_matix_temp4_con_2' );
			delete_option( 'medma_matix_temp4_con_3' );
		}
		else if($temp_no == 5){
			remove_theme_mod( 'medma_matix_sp_5_background_img' );
			remove_theme_mod( 'medma_matix_sp_5_button_border_color' );
			remove_theme_mod( 'medma_matix_sp_5_button_text' );
			remove_theme_mod( 'medma_matix_sp_5_text_color' );
			delete_option( 'medma_matix_temp5_con_1' );
			delete_option( 'medma_matix_temp5_con_2' );
			delete_option( 'medma_matix_temp5_con_3' );
			delete_option( 'medma_matix_temp5_con_4' );
		}
		else if($temp_no == 6){
			remove_theme_mod( 'medma_matix_sp_6_background_img' );
			remove_theme_mod( 'medma_matix_sp_6_button_color' );
			remove_theme_mod( 'medma_matix_sp_6_button_text' );
			remove_theme_mod( 'medma_matix_sp_6_text_color' );
			delete_option( 'medma_matix_temp6_con_1' );
			delete_option( 'medma_matix_temp6_con_2' );
			delete_option( 'medma_matix_temp6_con_3' );
			delete_option( 'medma_matix_temp6_con_4' );
		}
		else if($temp_no == 7){
			remove_theme_mod( 'medma_matix_sp_7_background_img' );
			delete_option( 'medma_matix_temp7_con_1' );
			delete_option( 'medma_matix_temp7_con_2' );
			delete_option( 'medma_matix_temp7_con_3' );
			
		}
		else if($temp_no == 8){
			remove_theme_mod( 'medma_matix_sp_8_button_color1' );
			remove_theme_mod( 'medma_matix_sp_8_button_color2' );
			remove_theme_mod( 'medma_matix_sp_8_button_text1' );
			remove_theme_mod( 'medma_matix_sp_8_button_text2' );
			remove_theme_mod( 'medma_matix_sp_8_text_color' );
			remove_theme_mod( 'medma_matix_sp_8_background_img' );
			remove_theme_mod( 'medma_matix_sp_8_button_link1' );
			remove_theme_mod( 'medma_matix_sp_8_button_link2' );
			delete_option( 'medma_matix_temp8_con_1' );
			delete_option( 'medma_matix_temp8_con_2' );
			delete_option( 'medma_matix_temp8_con_3' );
		}
		else if($temp_no == 9){
			remove_theme_mod( 'medma_matix_sp_9_background_img' );
			delete_option( 'medma_matix_temp9_con_1' );
			delete_option( 'medma_matix_temp9_con_2' );
		}
		else if($temp_no == 10){
			remove_theme_mod( 'medma_matix_sp_10_background_img' );
			delete_option( 'medma_matix_temp10_con_1' );
			delete_option( 'medma_matix_temp10_con_2' );
			
			
		}
		else if($temp_no == 11){
			remove_theme_mod( 'medma_matix_sp_11_background_img' );
			remove_theme_mod( 'medma_matix_sp_11_background_color' );
			delete_option( 'medma_matix_temp11_con_1' );
			delete_option( 'medma_matix_temp11_con_2' );
		}
		else if($temp_no == 12){
			remove_theme_mod( 'medma_matix_sp_12_background_img' );
			remove_theme_mod( 'medma_matix_sp_12_background_color' );
			delete_option( 'medma_matix_temp12_con_1' );
			delete_option( 'medma_matix_temp12_con_2' );
			delete_option( 'medma_matix_temp12_con_3' );
			
		}
		else if($temp_no == 13){
			remove_theme_mod( 'medma_matix_sp_13_background_img' );
			//remove_theme_mod( 'medma_matix_sp_13_background_color' );
			delete_option( 'medma_matix_temp13_con_1' );
			delete_option( 'medma_matix_temp13_con_2' );
			
			
		}
		else if($temp_no == 14){
			remove_theme_mod( 'medma_matix_sp_14_background_img' );
			remove_theme_mod( 'medma_matix_sp_14_background_color' );
			delete_option( 'medma_matix_temp14_con_1' );
			delete_option( 'medma_matix_temp14_con_2' );
			delete_option( 'medma_matix_temp14_con_3' );
			
		}
		else if($temp_no == 15){
			remove_theme_mod( 'medma_matix_sp_15_background_img' );
			delete_option( 'medma_matix_temp15_con_1' );
			delete_option( 'medma_matix_temp15_con_2' );
		}
		else if($temp_no == 16){
			remove_theme_mod( 'medma_matix_sp_16_background_img' );
			remove_theme_mod( 'medma_matix_sp_16_background_color' );
			delete_option( 'medma_matix_temp16_con_1' );
			delete_option( 'medma_matix_temp16_con_2' );
			
			
		}
		wp_die();
			
	}
	
/**
 * Function for refresh strip templates.
 *
 * Used to refresh strip template by
 * post template numbers.
 * 
 * @since    1.0.0
 *
 */
	public function medma_mtx_stripRefreshTemplate(){
		$temp_no = sanitize_text_field($_POST['temp_no']);
		
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
	
}
