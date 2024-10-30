<?php 

/**
 * The admin specific notification functionality of the plugin.
 * 
 *
 * Defines the send notifications through firebase and set 
 * the seeting for notification like enable/disable notification
 * and change the notification view.
 *
 * @package    Matix
 * @subpackage Matix/admin
 * @author     Medma Technologies.
 * @since      1.0.0
 */



add_action( 'admin_post_save_notification_design', 'medma_mtx_save_notif_design' );


function medma_mtx_save_notif_design() {

	
	if(current_user_can(current_user_can('editor') || current_user_can('administrator'))) {
		
		if(!empty(sanitize_text_field($_POST['bg']))) {

			global $wpdb;
			$table = $wpdb->prefix."medma_notifications";
			$retrieve_data = $wpdb->get_results( "SELECT * FROM $table" );

			 $bg =  sanitize_text_field($_POST['bg']);
			 $tx_color = sanitize_text_field($_POST['text-color']);
			 $dismissable = sanitize_text_field($_POST['dismissable']);
			 $border = sanitize_text_field($_POST['border']);
			 $anc_color = sanitize_text_field($_POST['anc-color']);
			 $status = sanitize_text_field($_POST['status']);
			 $firebase_sdk = sanitize_text_field($_POST['firebase_sdk']);

			 if(count($retrieve_data) == 1) {
			     foreach ($retrieve_data as $data) {
			         $id = $data->id;
			            
			     }
			     $wpdb->query($wpdb->prepare("UPDATE $table SET background='$bg',
			                                                    text_color='$tx_color',
			                                                    dismissable='$dismissable',
			                                                    border='$border',
			                                                    anchor_color='$anc_color',
			                                                    status='$status',
			                                                    firebase_sdk='$firebase_sdk'
			                                  WHERE id=$id"));
			 }
			 else{
			     $data = array(
			                 'background' => sanitize_text_field($_POST['bg']),
			                 'text_color'    => sanitize_text_field($_POST['text-color']),
			                 'dismissable' => sanitize_text_field($_POST['dismissable']),
			                 'border' => sanitize_text_field($_POST['border']),
			                 'anchor_color' =>sanitize_text_field( $_POST['anc-color']),
			                 'status' => sanitize_text_field($_POST['status']),
			                 'firebase_sdk' => sanitize_text_field($_POST['firebase_sdk'])
			             );
			     $format = array(
			                 '%s',
			                 '%s',
			                 '%d',
			                 '%s',
			                 '%s',
			                 '%d',
			                 '%s'
			             );
			     $success=$wpdb->insert( $table, $data , $format);
			        
			}

		}
	} /*----- cuurent user authorization ----*/

	$redirect_to = wp_get_referer();

	wp_redirect( $redirect_to );
}


class Medma_Matix_Admin_Notifications {
	
/**
 * The version of this plugin.
 *
 * @since    1.0.0
 * @access   private
 * @var      string $version The current version of this plugin.
 */
	const VERSION = '1.0';

	
	protected $plugin_slug = 'medma_matix_admin_notifications';


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
		add_submenu_page( 'medma-matix', __( 'Notifications' ), __( 'Notifications' ), 8,'medma_matix_admin_notifications', array( $this, 'medma_mtx_menu_options' ) );
	}
	
	
	public function medma_mtx_menu_options() {
		if ( ! current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		?>
	<?php 
	wp_enqueue_style( 'bootstrap-min-css', plugins_url( '../public/css/bootstrap/bootstrap.min.css', __FILE__ ));

	wp_enqueue_style( 'bootstrap-theme-css', plugins_url( '../public/css/bootstrap/bootstrap-theme.min.css', __FILE__ ));


 	wp_enqueue_script( 'bootstrap-min-js', plugins_url('../public/js/bootstrap.min.js', __FILE__ ) );
 	
 	wp_enqueue_script( 'js-color', plugins_url('../public/js/jscolor.min.js', __FILE__ ) );

 	wp_enqueue_script( 'js-notification', plugins_url('js/admin_notification.js', __FILE__ ) );

	wp_enqueue_style( 'notification-css', plugins_url( 'css/admin_notification.css', __FILE__ ));

	?>
		
		<?php 
			global $wpdb;
			$table = $wpdb->prefix."medma_notifications";
			$r_data = $wpdb->get_results( "SELECT * FROM $table" );
			
			$_bg = $r_data[0]->background;
			$_txcolor = $r_data[0]->text_color;
			$_ancolor = $r_data[0]->anchor_color;
			$_border = $r_data[0]->border;
			$_dismiss = $r_data[0]->dismissable;
			$_status = $r_data[0]->status;
			$_firebase_sdk = $r_data[0]->firebase_sdk;
		?>
		<div class="container">
			<h1>Customize Notifications</h1>
			<div class="divider"></div>
			<form action="<?php echo admin_url( 'admin-post.php') ?>" method="post">
			<?php wp_nonce_field( 'medma-mtx-notification-design' ); ?>
			<input type="hidden" name="action" value="save_notification_design">
			<div class="col-sm-6 medma-sidebar">
				<div class="col-sm-12">
				<label for="" class="col-sm-4">Enable Notification </label>
				<select name="status" id="enable-disable-notification">
					<option value="0" <?php echo ($_status == 0)? 'selected':'' ?>>No</option>
					<option value="1" <?php echo ($_status == 1)? 'selected':'' ?>>Yes</option>
				</select>
				</div>
				<div class="col-sm-12 firebase_sdk-wrapper medma-hidden">
				<label for="" class="col-sm-4">Paste Your Firebase Sdk</label>
					<textarea name="firebase_sdk" id="" cols="30" rows="10"><?php echo $_firebase_sdk ?></textarea>	

					<div class="col-sm-offset-4" style="margin-top: 10px">
					<a href="#" id="show-steps">Click here to know how to get your firebase sdk</a>
					</div>
				</div>
				<div class="col-sm-12">
				<label for="" class="col-sm-4">Background </label>
				<input type="text" name="bg" id="bg" class="jscolor {hash:true}" value="<?php echo $_bg ?>">
				</div>
				<div class="col-sm-12">
				<label for="" class="col-sm-4">Text Color </label><input type="text" name="text-color" id="text-color" class="jscolor {hash:true}" value="<?php echo $_txcolor ?>">
				</div>
				<div class="col-sm-12">
				<label for="" class="col-sm-4">Anchor Color</label><input type="text" name="anc-color" id="anc-color" class="jscolor {hash:true}" value="<?php echo $_ancolor ?>">
				</div>
				<div class="col-sm-12">
				<label for="" class="col-sm-4">Border</label><input type="text" name="border" id="border" placeholder="eg: 1px solid red" value="<?php echo $_border ?>">
				</div>
				<div class="col-sm-12">
				<label for="" class="col-sm-4">Dismissable </label>
				<select name="dismissable" id="dismissable">
					
					<option value="1" <?php echo ($_dismiss==1)? "selected":"" ?> >Yes</option>
					<option value="0" <?php echo ($_dismiss==0)? "selected":"" ?> >No</option>
				</select>
				</div>
				<div class="col-sm-12" style="text-align: center;margin-top: 50px;">
					<button type="submit" class="button button-primary" style="width:100px">Save</button>
				</div>
				</form>
			</div>
			<div class="memda-main col-sm-6">
				
				<div class="medma-toast" style='<?php echo "background:$_bg; color:$_txcolor;border:$_border" ?>' >
				<span class="turn-off <?php echo ($_dismiss == 0)? "medma-hidden":"" ?>">Turn Off</span>
				<span class="toast-close <?php echo ($_dismiss == 0)? "medma-hidden":"" ?>">x</span>
				A Customer Just Added <a class="url" href="#">UCB T-Shirt</a>
				</div>
			</div>
		</div>	

<div class="medma-steps medma-hidden">
	<div class="steps-wrapper">
		<span class="close-steps">X</span>
		<p><b>Step 1)</b> Login to your google account.</p>
		<p><b>Step 2)</b> Go to http://console.firebase.google.com/</p>
		<p><b>Step 3)</b> Click on Add a new project and fill details</p>
		<img width="600px" src="<?php echo plugin_dir_url( __FILE__ ) ?>../includes/img/add_project.png" alt=""><br>
		<p><b>Step 4)</b> Click on "Add Firebase to your web app"</p>
		<img width="600px" src="<?php echo plugin_dir_url( __FILE__ ) ?>../includes/img/add_firebase_to_web.png" alt=""><br>

		<p><b>Step 5)</b> Copy the marked content and paste it in above textbox.</p>
		<img width="600px" src="<?php echo plugin_dir_url( __FILE__ ) ?>../includes/img/firebase_config.png" alt=""><br>
		<p><b>Step 6)</b> Go to Authentication then click on "SIGN-IN METHOD" tab.</p>
		<img width="600px" src="<?php echo plugin_dir_url( __FILE__ ) ?>../includes/img/auth_domain.png" alt=""><br>
		
		<p><b>Step 7)</b>Under Sign-in providers, enable signin for Anonymous users.</p>
		<img width="600px" src="<?php echo plugin_dir_url( __FILE__ ) ?>../includes/img/anonymous.png" alt=""><br>

		<p><b>Step 8)</b> Click on "Add Domain" Button.</p>
		<img width="600px" src="<?php echo plugin_dir_url( __FILE__ ) ?>../includes/img/add_domain.png" alt=""><br>

		<p><b>Step 9)</b> Enter your store url and click on "Add" Button.</p>
	</div>
</div>

<?php
	}
}
