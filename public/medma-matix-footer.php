<?php 

/**
 * The public specific functionality of the plugin.
 * 
 *
 * Defines the example hooks for how to
 * enqueue the public specific stylesheet and scripts
 * and define popup, strip, and firebase notifications .
 *
 * @since      1.0.0
 */



wp_enqueue_style( 'animate-css', plugins_url('css/animate.css', __FILE__ ));
wp_enqueue_style( 'nivo-slider-css', plugins_url('css/nivo-slider.css', __FILE__ ));
wp_enqueue_style( 'slider-style-css', plugins_url('css/slider-style.css', __FILE__ ));

add_action('wp_footer', 'medma_mtx_foot_popup_strip');

function medma_mtx_foot_popup_strip()
{
	
	//Sidebar Popup Customizer php
	
	echo "<div id='popupPosition' value='".get_theme_mod('medma_matix_sp_popup_position')."' style='display:none;'></div>";
	echo "<div id='popupSlideFrom' value='".get_theme_mod('medma_matix_sp_popup_slideFrom')."' style='display:none;'></div>";
	echo "<div id='popupSlideOutFrom' value='".get_theme_mod('medma_matix_sp_popup_slideOutFrom')."' style='display:none;'></div>";
	echo "<div id='popupFadeIn' value='".get_theme_mod('medma_matix_sp_popup_fadeIn')."' style='display:none;'></div>";
	echo "<div id='popupWidth' value='".get_theme_mod('medma_matix_sp_popup_width')."' style='display:none;'></div>";
	echo "<div id='popupHeight' value='".get_theme_mod('medma_matix_sp_popup_height')."' style='display:none;'></div>";
	echo "<div id='popBorderStatus' value='".get_theme_mod('medma_matix_sp_border_activeStatus')."' style='display:none;'></div>";
	echo "<div id='popColor' value='".get_theme_mod('medma_matix_sp_popup_borderColor', '#000000')."' style='display:none;'></div>";
	echo "<div id='popWidth' value='".get_theme_mod('medma_matix_sp_popup_borderWidth')."' style='display:none;'></div>";
	echo "<div id='popImageCount' value='".get_theme_mod('medma_matix_sp_popup_image_count')."' style='display:none;'></div>";
	
	if ( class_exists( 'WooCommerce' ) ) { 
		?><div id="class_woocommerce" value="1"></div><?php
	}else{
		?><div id="class_woocommerce" value="0"></div><?php
	}
	
	//Template 1 customizer
	echo "<div id='template_no' style='display:none;' data-template='".get_option( 'medma_matix_sp_template_number' )."'></div>";
	
	//Template 2 customizer
	echo "<div id='strip_template_no' style='display:none;' data-template='".get_option( 'medma_matix_sp_strip_template_number' )."'></div>";
	
	
	/*******************************************POPUP************************************************/
	
	
	$referer = $_SERVER['HTTP_REFERER'];
	
	$popup_content = stripslashes(get_option( 'medma_matix_sp_popup_content' ));
	$popup_or_strip = get_option( 'medma_matix_sp_popup_or_strip' );
	
	//$popup_image_url = stripslashes(get_theme_mod( 'medma_matix_sp_popup_image_url' ));
	$popup_template_number = get_theme_mod( 'medma_matix_sp_mod_template_number', 1 );
	$popup_video_content = stripslashes(get_theme_mod( 'medma_matix_sp_popup_video_content' ));
	$popup_content_option = get_theme_mod( 'medma_matix_sp_popup_content_option', 'nopopup' );
	$popup_inactive_time = get_theme_mod( 'medma_matix_sp_inactive_time', 1 );
	$popup_status_element_name = get_theme_mod( 'medma_matix_sp_popup_status_element_name'  );
	$popup_status_element = get_theme_mod( 'medma_matix_sp_popup_status_element', 'class' );
	$popup_thirdpage = get_theme_mod( 'medma_matix_sp_thirdpage', 1 );
	$popup_status_visiting = get_theme_mod( 'medma_matix_sp_popup_status_visiting', 2 );
	$popup_status = get_theme_mod( 'medma_matix_sp_popup_status', 'always'  );
	$popup_time = get_theme_mod( 'medma_matix_sp_popup_time', 'none' );
	$popup_customtime = get_theme_mod( 'medma_matix_sp_popup_customTime', 2 );
	$popup_displayOnPage = get_theme_mod( 'medma_matix_sp_popup_displayOnPage', 'allpage' );
	$popup_position = get_theme_mod( 'medma_matix_sp_popup_position', 'topcenter' );
	$popup_urlOpenWindow = get_theme_mod( 'medma_matix_sp_popup_urlOpenWindow', 'newwindow' );
	$popup_setUrl = get_theme_mod( 'medma_matix_sp_popup_setUrl', 'http://www.medma.in/popup-plugin-for-wordpress/' );
	$popup_slideFrom = get_theme_mod( 'medma_matix_sp_popup_slideFrom', 'left' );
	$popup_slideOutFrom = get_theme_mod( 'medma_matix_sp_popup_slideOutFrom', 'left' );
	$popup_fadeIn = get_theme_mod( 'medma_matix_sp_popup_fadeIn', 'none' );
	$popup_height = get_theme_mod('medma_matix_sp_popup_height', 300);
	$popup_width = get_theme_mod('medma_matix_sp_popup_width', 450);
	$border_activeStatus = get_theme_mod('medma_matix_sp_border_activeStatus', 'enable');
	$popup_borderWidth = get_theme_mod('medma_matix_sp_popup_borderWidth', 1);
	$popup_borderColor = get_theme_mod('medma_matix_sp_popup_borderColor', '#000000');
	echo "<div id='customize-strip-or-popup' style='display:none;'>".$popup_or_strip."</div>";
	
	$popup_image_url = '';
	for($img = 1; $img <= 20; $img++){
		if(get_theme_mod('medma_matix_sp_'.$img.'_image_url') == ''){
			
		}else{
			$popup_image_url = $popup_image_url.'<img src="'.get_theme_mod('medma_matix_sp_'.$img.'_image_url').'" alt="" width="'.$popup_width.'">';	
		}
	}
	
	if ( class_exists( 'WooCommerce' ) ) { 
		$popup_displayOnPage = get_theme_mod( 'medma_matix_sp_popup_displayOnPage' );
	}else{
		$popup_displayOnPage = "allpage";
	}
	
	$popup_image_url_count = count(explode('<img', $popup_image_url))-1;
	

	
	if($border_activeStatus == 'enable'){
		$borderWidth = $popup_borderWidth;
		$borderColor = $popup_borderColor;
	}else{
		$borderWidth = 0;
		$borderColor = '#fff';
	}
	
	if($popup_status == 'facebook'){
		if (strpos($referer, 'facebook') !== false) {
			$showPage = 'facebook';
		}else{
			$showPage = 'never';
		}
	}else if($popup_status == 'google'){
		if (strpos($referer, 'google') !== false) {
			$showPage = 'google';
		}else{
			$showPage = 'never';
		}
	}else if($popup_status == 'instagram'){
		if (strpos($referer, 'instagram') !== false) {
			$showPage = 'instagram';
		}else{
			$showPage = 'never';
		}
	}else if($popup_status == 'twitter'){
		if (strpos($referer, 'twitter') !== false) {
			$showPage = 'twitter';
		}else{
			$showPage = 'never';
		}
	}
	else if($popup_status == 'always'){
		$showPage = 'always';
	}
	else if($popup_status == 'never'){
		$showPage = 'never';
	}
	else if($popup_status == 'click'){
		$showPage = 'click';
		echo "<div id='status_element' style='display:none;' data-element='".$popup_status_element."' data-element-name='".$popup_status_element_name."'></div>";
	}
	else if($popup_status == 'hover'){
		$showPage = 'hover';
		echo "<div id='status_element' style='display:none;' data-element='".$popup_status_element."' data-element-name='".$popup_status_element_name."'></div>";
	}
	else if($popup_status == 'scroll'){
		$showPage = 'scroll';
	}
	else if($popup_status == 'inactive'){
		$showPage = 'inactive';
		echo "<div id='popup_inactive_time' style='display:none;' data-inactive='".$popup_inactive_time."'></div>";
	}
	else if($popup_status == 'thirdpage'){
		
		$current_url = $_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'];
		if (strpos($current_url, 'undefined') == false) {
			//echo 'true';
		
			$all_url = $_SESSION['url'];
			$count = 0;
			$arr = '';
			if(empty($all_url)){
				$arr = $arr.''.$current_url;
				$count++;
			}
			else{
				$old_arr = explode(",", $all_url);
				for($i=0; $i < count($old_arr); $i++){
					if($old_arr[$i] !== $current_url && $old_arr[$i] != '' && $old_arr[$i] != 'undefined'){
						$arr = $arr.','.$old_arr[$i];
						$count++;
					}
				}
				$arr = $arr.','.$current_url;
				$count++;
			}
			$_SESSION['url'] = $arr;
			$_SESSION['count'] = $count;
		}
		
		$showPage = 'thirdpage';
		echo "<div id='popup_thirdpage' style='display:none;' data-thirdpage='".$popup_thirdpage."' data-count='".$_SESSION['count']."'></div>";
	}
	else {
		$showPage = 'secondtime';
		echo "<div id='popup_status_visiting' style='display:none;' data-visiting='".$popup_status_visiting."'></div>";
	}
	
	$show_popup_page = 0;
	//Popup Display On Page
	if($popup_displayOnPage == 'category'){
		if(is_product_category())
			$show_popup_page = 1;
	}
	else if($popup_displayOnPage == 'shop'){
		if(is_shop())
			$show_popup_page = 1;
	}
	else if($popup_displayOnPage == 'product'){
		if(is_product())
			$show_popup_page = 1;
	}
	else if($popup_displayOnPage == 'cart'){
		if(is_cart())
			$show_popup_page = 1;
	}
	else if($popup_displayOnPage == 'checkout'){
		if(is_checkout())
			if(is_order_received_page())
				$show_popup_page = 0;
			else
				$show_popup_page = 1;
	}
	else if($popup_displayOnPage == 'successpage'){
		if(is_order_received_page())
			$show_popup_page = 1;
	}
	else{
		$show_popup_page = 1;
	}
	
	if( is_customize_preview() ){
		$show_popup_page = 1;
	}
	
	if ( class_exists( 'WooCommerce' ) ) { 
   

    global $wpdb;
	$table = $wpdb->prefix."medma_notifications";
	
	$retrieve_data = $wpdb->get_results( "SELECT * FROM $table" );
	if(count($retrieve_data)) {
		foreach ($retrieve_data as $data) {
			$bg = $data->background;
			$tx_color = $data->text_color;
			$dismissable = $data->dismissable;
			$border = $data->border;
			$anc_color = $data->anchor_color;
			$status = $data->status;
			$firebase_sdk = $data->firebase_sdk;
		}
		?>
		<style>
			.turn-off-notification{
				background: <?php echo $bg ?>;
				color: <?php echo $tx_color ?>;
				border: <?php echo  $border ?>;
			}
			.medma-toast > a{
				color: <?php echo $anc_color ?> !important;
			}

		</style>
		<?php
	}


    ?>

		<input  id="ajax_url" type="hidden" value="<?php echo admin_url( 'admin-ajax.php' ) ?>">

	<div id="medma-notification">
	  <div class="turn-off-notification checkboxes-and-radios medma-hidden">
	    <input type="checkbox" id="turn-off" checked="" class="medma-hidden">
	    <label for="turn-off" class='<?php echo ($dismissable==0)?"medma-hidden":"" ?>'><span class="notifik">Turn Off</span></label>
	    <span class="close-note <?php echo ($dismissable==0)?'medma-hidden':'' ?>">x</span>
	    <div id="medma-note" class="medma-hidden"></div>
	  </div>
	</div>
    <?php
    $page = "";
    $product_name = "";
    

    if(is_product()){
	   
	    global $product;
	 
	    $product_name = $product->post->post_title;
	    $url_key = $product->post->post_name;

	   $page = "product_description";
	}
	?>
	<?php 

	wp_enqueue_script( 'firebase-js', plugins_url('js/firebase.js',__FILE__) ,array(),'', false	);
	?>
	

	<script type="text/javascript" defer>
	
	jQuery(document).ready(function($){

		$('body').on( 'added_to_cart', function(t,r,d,o){
			var arr = o[0].search.split("=");
			var product_url = $("[data-product_id='"+arr[1]+"']").prev().attr('href');
			var product_name = $("[data-product_id='"+arr[1]+"']").prev().find('h3').html();
			
			var user = ['A user', 'A customer', 'Someone'];
			var name = user[Math.floor(Math.random() * user.length)];

			var eventMssg = "<div class='medma-toast'>" +name + " just added <a href="+ product_url +">" + product_name + "</a> to his cart.</div>";
			medma_mtx_setEvent(eventMssg);
			$(".turn-off-notification").css('margin-left','-180px');
			 
    });
	

	function medma_mtx_setEvent(eventMssg){
		var date = Date.now();
		
		var eventName = "add to cart";
		var encoded_base = btoa(window.location.host);
		
		firebase.database().ref(encoded_base+'/events/' + date).set({
			event: eventName,
			mssg:  eventMssg
		});

	}


	var just_added = '<?php echo $_SESSION["just_added"] ?>';
	var turn_off_val = jQuery("#turn-off").prop('checked');
	var status = '<?php echo $status ?>';

	<?php if($status) { echo $firebase_sdk;  ?>
	
	if(status) {
		firebase.initializeApp(config);
	}
	var defaultDatabase = firebase.database();
	firebase.auth().signInAnonymously().catch(function(error) {
		var errorCode = error.code;
		var errorMessage = error.message;
		console.log(errorCode + " - "+ errorMessage);
	});
	
	
	medma_mtx_autoEnableDisable();
		window.setTimeout(function() { 
	      	jQuery('#medma-note').removeClass('medma-hidden');
	  		jQuery(".turn-off-notification").removeClass('medma-hidden');
	  		jQuery('#medma-note').html('');
	  		jQuery('.turn-off-notification').css('opacity','0');
        }, 15000);

        function medma_mtx_toaster(){

		
		}
		var user = ['A user', 'A customer', 'Someone'];
		var user_name = user[Math.floor(Math.random() * user.length)];
		var base_url = window.location.host; 
		var encoded_base = btoa(base_url); /* convert it into base64 because firebase doesn't accept hostname as node */
		
		var product_name = '<?php echo $product_name ?>';
		var url_key = '<?php echo $url_key ?>';
		

		var pageViewRef = firebase.database().ref(encoded_base+"/cur_page_visitors/"+url_key);
		var userPageRef = pageViewRef.push();
		// console.log("session" + "<?php echo $_SESSION['just_added'] ?>");
		if("<?php echo $_SESSION['just_added'] ?>" == 0) {
			<?php  $_SESSION['just_added'] = 0 ?>
			var presencePageReff = firebase.database().ref(".info/connected");
			presencePageReff.on("value", function(snap) {
				if (snap.val()) {
					// Remove ourselves when we disconnect.
					userPageRef.onDisconnect().remove();
					userPageRef.set({
						mssg: "<div class='medma-toast'>"+ user_name +" just started viewing <a href='"+location+"'>"+product_name+"</a></div>"
					});
				}
			});
		}
		
		/*==================GET DATA + CHILD ADDED + PAGE VIEW ========================*/
		var page_ref = firebase.database().ref(encoded_base+"/cur_page_visitors");

		page_ref.on('child_added', function(snapshot){
			var x = snapshot.val();
			var key = snapshot.key;
			var theChild = firebase.database().ref(encoded_base+"/cur_page_visitors/"+key);
			theChild.on("child_added", function (snapshot) {
			var values = snapshot.val();
			// console.log(values.mssg);
			var mssg = values.mssg;
			// console.log("<?php echo $_SESSION['just_added'] ?>");
			

				if((medma_mtx_getCookie('notification-status') == 'checked') ||  (turn_off_val ))
				{
					// document.getElementById('medma-note').innerHTML = values.mssg;
					jQuery("#medma-note").append(mssg);
					// console.log(mssg);
					mssg = "";
					jQuery(".turn-off-notification").css('opacity','1');
					jQuery('#medma-note div:last-child').delay(5000).fadeOut(200 , function(){
						jQuery(".turn-off-notification").css('opacity','0');
					});
					jQuery(".turn-off-notification").css('margin-left','150px');
					// $(".turn-off-notification").css('opacity','1').delay(5000);

				}
			
				medma_mtx_toaster();
			});
		});
		/*==================================================================*/

		/*---------------------GET DATA + CHILD ADDED - ADD TO CART ------------------*/
		var ref = firebase.database().ref(encoded_base+"/events");
		ref.limitToLast(1).on("child_added", function(snapshot) {
		var newPost = snapshot.val();
		var mssg = newPost.mssg;

		if((medma_mtx_getCookie('notification-status') == 'checked') ||  (turn_off_val ))
		{
			jQuery("#medma-note").append(mssg);
			mssg = "";
			jQuery(".turn-off-notification").css('opacity','1');
			jQuery('#medma-note div:last-child').delay(5000).fadeOut(200 , function(){
				$(".turn-off-notification").css('opacity','0');
			});
			jQuery(".turn-off-notification").css('margin-left','150px');
		}

		medma_mtx_toaster();
		
		});
		<?php } ?>
		}); /*---- DOM Ready -----*/
		/*==================================================================*/
		
		function medma_mtx_setCookie(name, value, days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			var expires = "; expires=" + date.toGMTString();
		} else var expires = "";
			document.cookie = name + "=" + value + expires + "; path=/";
		}

		function medma_mtx_getCookie(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') c = c.substring(1, c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
			}
			return null;
		}

		function medma_mtx_autoEnableDisable() {
			var status = medma_mtx_getCookie('notification-status');
			// console.log(status);
			if (status == 'checked') {
				jQuery("#turn-off").prop('checked',true);
				jQuery('.notifik').html('Turn Off');
				jQuery('#medma-note').css('display','block');
			}else if(status == 'unchecked') {
				jQuery("#turn-off").prop('checked',false);
				jQuery('#medma-note').css('display','none');
				jQuery('.notifik').html('Turn On');
			}else{
				jQuery("#turn-off").prop('checked',true);
				jQuery('.notifik').html('Turn Off');
				jQuery('#medma-note').css('display','block');
			}
		}
		jQuery('#turn-off').click(function(){
			// console.log( medma_mtx_getCookie('notification-status'));
			if(jQuery(this).prop('checked')){
				medma_mtx_setCookie('notification-status', 'checked', 30);
				jQuery('#medma-note').css('display','block');
				jQuery('.notifik').html('Turn Off');
			}else {
				jQuery('#medma-note').css('display','none');
				medma_mtx_setCookie('notification-status', 'unchecked', 30);
				jQuery('.notifik').html('Turn On');
			}
		});
		jQuery('.cart').submit(function(){
			
		});
		
	</script>
	<?php
	}
	
  
	if($popup_content_option == 'nopopup'){}else{
		echo "<div id='cancle' class='popup-not'><i class='fa fa-times-circle-o' aria-hidden='true' style='padding: 0px 3px;background-color: #ffffff;border-radius: 50%;'></i></div>";
		echo "<div class='modal-popup popup-not' id='modal-back'>";
			if($popup_content_option == 'image'){
				echo "<div id='popup' class='popup-not' data-border-width='".$borderWidth."' data-content='".$popup_content_option."' data-height='".$popup_height."' style='height:".$popup_height."px; border: ".$borderWidth."px solid ".$borderColor.";' data-width='".$popup_width."' data-referer='".$showPage."' data-display='".$show_popup_page."' data-position='".$popup_position."' data-urlopen='".$popup_urlOpenWindow."' data-seturl='".$popup_setUrl."' data-slide='".$popup_slideFrom."' data-slideout='".$popup_slideOutFrom."' data-time='".$popup_time."' data-customTime='".$popup_customtime."' data-fadein='".$popup_fadeIn."' data-status='".$popup_status."'>";
					
						$image_height = $popup_height - (2*$borderWidth);
						?>
						<style>
							#popup{overflow:initial;}
							.nivoSlider img{max-height:<?php echo $image_height;?>px;}
						</style>
						<?php
						
					echo "<div id='wrapper'><div class='slider-wrapper theme-default'><div id='slider' class='nivoSlider' data-count-img='".$popup_image_url_count."'>".$popup_image_url."</div></div></div>";
				echo "</div>"; 
			} 
			else if($popup_content_option == 'video'){
				echo "<div id='popup' data-content='".$popup_content_option."' class='popup-not' data-height='".$popup_height."' style='width:".$popup_width."px; height:auto; border: ".$borderWidth."px solid ".$borderColor.";' data-width='".$popup_width."' data-referer='".$showPage."' data-display='".$show_popup_page."' data-position='".$popup_position."' data-urlopen='' data-seturl='' data-slide='".$popup_slideFrom."' data-slideout='".$popup_slideOutFrom."' data-time='".$popup_time."' data-customTime='".$popup_customtime."' data-fadein='".$popup_fadeIn."' data-status='".$popup_status."'></div><script>jQuery('#popup').html('".$popup_video_content."');</script>"; 
			}
			else if($popup_content_option == 'form'){
				echo "<div id='popup' class='popup-not' data-content='".$popup_content_option."' data-height='".$popup_height."' style='width:".$popup_width."px; height:".$popup_height."px; border: ".$borderWidth."px solid ".$borderColor.";' data-width='".$popup_width."' data-referer='".$showPage."' data-display='".$show_popup_page."' data-position='".$popup_position."' data-urlopen='' data-seturl='' data-slide='".$popup_slideFrom."' data-slideout='".$popup_slideOutFrom."' data-time='".$popup_time."' data-customTime='".$popup_customtime."' data-fadein='".$popup_fadeIn."' data-status='".$popup_status."'>"; 
					echo "<span id='contact-heading'>Contact Form</span>";
					echo do_shortcode( '[contact-form-7 id="60" title="Contact form 1"]' );
				echo "</div>"; 
			}  
			else if($popup_content_option == 'template'){
				if($popup_template_number == ''){
					$popup_template_number = 1;
				}
				echo "<div id='popup' class='popup-not' data-content='".$popup_content_option."' data-height='".$popup_height."' style='width:".$popup_width."px; border: ".$borderWidth."px solid ".$borderColor.";' data-width='".$popup_width."' data-referer='".$showPage."' data-display='".$show_popup_page."' data-position='".$popup_position."' data-urlopen='' data-seturl='' data-slide='".$popup_slideFrom."' data-slideout='".$popup_slideOutFrom."' data-time='".$popup_time."' data-customTime='".$popup_customtime."' data-fadein='".$popup_fadeIn."' data-status='".$popup_status."'><span id='content'>";
					include (plugin_dir_path( __FILE__ ) . '../includes/templates/template'.$popup_template_number.'.php');
				echo "</span></div>"; 
			}
			else{
				echo "<div id='popup' class='popup-not' data-content='".$popup_content_option."' data-height='".$popup_height."' style='width:".$popup_width."px; height:".$popup_height."px; border: ".$borderWidth."px solid ".$borderColor.";' data-width='".$popup_width."' data-referer='".$showPage."' data-display='".$show_popup_page."' data-position='".$popup_position."' data-urlopen='".$popup_urlOpenWindow."' data-seturl='".$popup_setUrl."' data-slide='".$popup_slideFrom."' data-slideout='".$popup_slideOutFrom."' data-time='".$popup_time."' data-customTime='".$popup_customtime."' data-fadein='".$popup_fadeIn."' data-status='".$popup_status."'><span id='content'>";
					include (plugin_dir_path( __FILE__ ) . '../includes/medma-matix-custom-template.php');
				echo "</span></div>"; 
			}
		echo "</div>";
	}
/*************************************************** STRIP *******************************************/
	
	$strip_message = get_theme_mod( 'medma_matix_sp_strip_message', 'custom' );
	$strip_position = get_theme_mod( 'medma_matix_sp_strip_position', 'bottom' );//get_option( 'sp_strip_position' );
	$strip_textColour = get_theme_mod( 'medma_matix_sp_strip_textColour', '#fff' );//get_option( 'sp_strip_textColour' );
	$strip_stripColour = get_theme_mod( 'medma_matix_sp_strip_stripColour', '#000' );//get_option( 'sp_strip_stripColour' );
	$strip_buttonTextColour = get_theme_mod( 'medma_matix_sp_strip_buttonTextColour', '#000' );//get_option( 'sp_strip_buttonTextColour' );
	$strip_buttonBackColour = get_theme_mod( 'medma_matix_sp_strip_buttonBackColour', '#fff' );//get_option( 'sp_strip_buttonBackColour' );
	$strip_buttonTextContent = get_theme_mod( 'medma_matix_sp_strip_buttonTextContent', 'CLICK' );//get_option( 'sp_strip_buttonTextContent' );
	$strip_buttonUrl = get_theme_mod( 'medma_matix_sp_strip_buttonUrl', 'https://google.com' );//get_option( 'sp_strip_buttonUrl' );
	$strip_buttonSize = get_theme_mod( 'medma_matix_sp_strip_buttonSize', 'medium' );//get_option( 'sp_strip_buttonSize' );
	$strip_buttonUrlOpen = get_theme_mod( 'medma_matix_sp_strip_buttonUrlOpen', 'newWindow' );//get_option( 'sp_strip_buttonUrlOpen' );
	$strip_status = get_theme_mod( 'medma_matix_sp_strip_status_display', 'always' );//get_option( 'sp_strip_status' );
	$strip_close_icon = get_theme_mod( 'medma_matix_sp_strip_close_icon', 'enable' );//get_option( 'sp_strip_close_icon' );
	$strip_buttonUrlActive = get_theme_mod( 'medma_matix_sp_strip_buttonUrlActive', 'enable' );//get_option( 'sp_strip_buttonUrlActive' );
	$strip_close_icon_color = get_theme_mod( 'medma_matix_sp_strip_close_icon_color', '#fff' );
	$strip_display = get_theme_mod( 'medma_matix_sp_strip_displayOnPage', 'allpage' );
	$strip_temp_no = get_theme_mod( 'medma_matix_sp_mod_strip_template_number' );
	
	$strip_details = stripslashes(get_option( 'medma_matix_sp_strip_details' ));
	$strip_status_visiting = get_option( 'medma_matix_sp_strip_status_visiting' );
	$strip_status_element = get_option( 'medma_matix_sp_strip_status_element' );
	$strip_status_element_name = get_option( 'medma_matix_sp_strip_status_element_name' );
	
	
	
	if ( class_exists( 'WooCommerce' ) ) { 
		$strip_display = get_theme_mod( 'medma_matix_sp_strip_displayOnPage' );
	}else{
		$strip_display = "allpage";
	}

	
	if($strip_close_icon == 'disable'){
		$close_icon = "<span class='strip-cancle' id='strip-cancle' style='color:".$strip_close_icon_color.";display:none;'><i class='fa fa-times-circle fa-2x' aria-hidden='true'></i></span>";
	}
	else{
		$close_icon = "<span class='strip-cancle' id='strip-cancle' style='color:".$strip_close_icon_color.";'><i class='fa fa-times-circle fa-2x' aria-hidden='true'></i></span>";
	}
	//Strip Status
	if($strip_status == 'facebook'){
		if (strpos($referer, 'facebook') !== false) {
			$showStrip = 'facebook';
		}else{
			$showStrip = 'never';
		}
	}
	else if($strip_status == 'google'){
		if (strpos($referer, 'google') !== false) {
			$showStrip = 'google';
		}else{
			$showStrip = 'never';
		}
	}
	else if($strip_status == 'instagram'){
		if (strpos($referer, 'instagram') !== false) {
			$showStrip = 'instagram';
		}else{
			$showStrip = 'never';
		}
	}
	else if($strip_status == 'twitter'){
		if (strpos($referer, 'twitter') !== false) {
			$showStrip = 'twitter';
		}else{
			$showStrip = 'never';
		}
	}
	else if($strip_status == 'always'){
		$showStrip = 'always';
	}
	else if($strip_status == 'never'){
		$showStrip = 'never';
	}
	else if($strip_status == 'click'){
		$showStrip = 'click';
		echo "<div id='strip_status_element' style='display:none;' data-element='".$strip_status_element."' data-element-name='".$strip_status_element_name."'></div>";
	}
	else if($strip_status == 'hover'){
		$showStrip = 'hover';
		echo "<div id='strip_status_element' style='display:none;' data-element='".$strip_status_element."' data-element-name='".$strip_status_element_name."'></div>";
	}
	else {
		$showStrip = 'secondtime';
		echo "<div id='strip_status_visiting' style='display:none;' data-visiting='".$strip_status_visiting."'></div>";
	}
	

	

	$show_page = 0;
	//Strip Display On Page
	if($strip_display == 'category'){
		if(is_product_category())
			$show_page = 1;
	}
	else if($strip_display == 'shop'){
		if(is_shop())
			$show_page = 1;
	}
	else if($strip_display == 'product'){
		if(is_product())
			$show_page = 1;
	}
	else if($strip_display == 'cart'){
		if(is_cart())
			$show_page = 1;
	}
	else if($strip_display == 'checkout'){
		if(is_checkout())
			if(is_order_received_page())
				$show_page = 0;
			else
				$show_page = 1;
	}
	else if($strip_display == 'successpage'){
		if(is_order_received_page())
			$show_page = 1;
	}
	else{
		$show_page = 1;
	}
	

	
	
	$button = "<span id='strip-button' data-url='".$strip_buttonUrl."' data-urlOpen='".$strip_buttonUrlOpen."' data-size='".$strip_buttonSize."' data-button-active='".$strip_buttonUrlActive."' style='background-color:".$strip_buttonBackColour.";margin-left: 15px;color:".$strip_buttonTextColour.";'>".$strip_buttonTextContent."</span>";
	
	
	if($strip_position == 'top'){
		$s_pos = "top:0;";
		
	}else{
		$s_pos = "bottom:0;";
		
	}
	
	
	if($strip_message == 'nostrip'){}else{
		if($strip_message == 'custom'){
			echo "<div id='strip' data-message='".$strip_message."' data-referer='".$showStrip."' data-display='".$show_page."' data-position='".$strip_position."' data-status='".$strip_status."' style='".$s_pos.";background-color:".$strip_stripColour.";'><div id='strip-text' style='display: inline-flex;color:".$strip_textColour.";'>";
			include (plugin_dir_path( __FILE__ ) . '../includes/templates/custom_template_strip.php');
			echo $button."</div>".$close_icon."</div>";
		}
		else{
			if($strip_temp_no == ''){
				$strip_temp_no = 1;
			}
			echo "<div id='strip-temp-btn' style='display:none;' data-url='".$strip_buttonUrl."' data-urlOpen='".$strip_buttonUrlOpen."'></div>";
			echo "<div id='strip' data-message='".$strip_message."' data-referer='".$showStrip."' data-display='".$show_page."' data-position='".$strip_position."' data-status='".$strip_status."' style='".$s_pos.";padding: 0px !important;'>";
				include (plugin_dir_path( __FILE__ ) . '../includes/templates/strip_template'.$strip_temp_no.'.php');
			echo "</div>";
		}
	}
	
	
	echo '<div id="myModal" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<span class="close">&times;</span>
				<iframe src="'.$strip_buttonUrl.'" style="zoom:0.60" width="99.6%" height="500" frameborder="0"></iframe>
			</div>
		</div>'; 
	
	?>
	<script>jQuery.noConflict();</script>
	<script type="text/javascript">

		if(typeof jQuery == 'undefined'){
			<?php wp_enqueue_script( 'jquery.min-script', 'https://code.jquery.com/jquery-1.12.4.min.js'); ?>
	    }

	</script>
	<?php
	//wp_enqueue_script( 'jquery.min-script', 'https://code.jquery.com/jquery-1.12.4.min.js');
	wp_enqueue_script(array('jquery', 'editor', 'thickbox', 'media-upload'));
	wp_enqueue_script( 'bootstrap-min-script', plugins_url('js/bootstrap.min.js', __FILE__ ));
	wp_enqueue_script( 'jquery.nivo.slider-script', plugins_url('js/jquery.nivo.slider.js', __FILE__ ));
	wp_enqueue_script( 'my-template-script', plugins_url('js/my-template-script.js', __FILE__ ) );
	wp_enqueue_script( 'my-script', plugins_url('js/my-script.js', __FILE__ ) );
	wp_enqueue_script( 'header-footer-script', plugins_url('js/header-footer.js', __FILE__ ));
	
}
function medma_mtx_add_this_script_footer(){
		
	$product = wc_get_product( $_SESSION['product_id'] );
	?>
		
		<script type="text/javascript">
		jQuery(document).ready(function() {
		
		var user = ['A user', 'A customer', 'Someone'];
		var name = user[Math.floor(Math.random() * user.length)];
		var product_name = '<?php echo $product->post->post_title ?>';
		var product_url = window.location;
		var eventMssg = "<div class='medma-toast'>" +name + " just added <a href='"+product_url+"'>" + product_name + "</a> to his cart.</div>";
		var eventName = "add to cart";
		var encoded_base = btoa(window.location.host);
		var date = Date.now();
		
		firebase.database().ref(encoded_base+'/events/' + date).set({
				event: eventName,
				mssg:  eventMssg
		});
			

	});
		</script>
	<?php
}
