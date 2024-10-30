<?php
	
/**
 * Defines template customizer view and frontend view.
 *
 * Used the customize setting options on twelve template,
 * add customer subscribe form on frontend template view
 * and define the example of inline text editor to edit text of 
 * templates and add style and scripts for inline text editor.
 *
 * @since    1.0.0
 */
	if(get_theme_mod( 'medma_matix_sp_12_background_img' ) !== false && get_theme_mod( 'medma_matix_sp_12_background_img' ) !== ''){
		$background_img = get_theme_mod( 'medma_matix_sp_12_background_img' );
	}else{
		$background_img = plugins_url('../img/temp12.jpg', __FILE__ );
	}
	
	if(get_theme_mod( 'medma_matix_sp_12_background_color' ) !== false){
		$background_color = get_theme_mod( 'medma_matix_sp_12_background_color' );
	}else{
		$background_color = '#58EF98';
	}
	
	if(get_option( 'medma_matix_temp12_con_1' ) !== false){
		$content1 = get_option( 'medma_matix_temp12_con_1' );
	}else{
		$content1 = "Amazing";
	}
	
	if(get_option( 'medma_matix_temp12_con_2' ) !== false){
		$content2 = get_option( 'medma_matix_temp12_con_2' );
	}else{
		$content2 = "Deals Everyday";
	}
	if(get_option( 'medma_matix_temp12_con_3' ) !== false){
		$content3 = get_option( 'medma_matix_temp12_con_3' );
	}else{
		$content3 = "Subscribe";
	}

 ?>
<?php 
	wp_enqueue_style( 'temp-12-quills-css', plugins_url('../../public/css/quill.snow.css', __FILE__ ));
?>


	
<style>
	
.subscriber-field
{
	width:80% !important;
	margin: 5px auto;
}
.ql-editor{
	height: auto !important;
}
.temp-12-subscribe{
	color: #000;
	font-weight: bold;
    letter-spacing: 0;
    text-transform: initial;
    font-size: 17px !important;
}
<?php if( !is_customize_preview() ){?>
	
	.ql-container.ql-snow {
		border: none !important;
	}
	
	#toolbar1, #toolbar2, #toolbar3, #toolbar4{
		display: none;
	}
	
	.ql-editor{
		padding: 0px;
		overflow: hidden;
		text-align: inherit;
	}
	.temp-12 .link-text {
		padding-top:0 !important;
	}
	  .temp-12-subscribe
		{
			padding-top: 0 !important;
		}
		
			.ql-container {
			height: auto !important;
		}
#popup
{
	overflow: hidden;
	/*height:360px;*/
}
<?php } else{ ?>
.ql-container {
    height: auto !important;
}
	.ql-toolbar{
		display: none;
		border-radius: 25px;
		background-color: #fff;
	}
	
	.ql-container.ql-snow {
		border: 1px dashed #ccc !important;
	}
	
	.save-temp{
		color: rgb(0, 114, 255);
	}
	
	.ql-toolbar.ql-snow {
		position: absolute;
		top: -60px;
	}

	.ql-editor{
		padding: 0px;
		overflow: hidden;
		text-align: inherit;
	}
	
	#popup {
		overflow: initial;
	}
	
	.save-content{
		font-weight: bold;
		font-size: 18px;
		margin-left: 18px;
		color: #EC1010;
	}
	
	.content-saved{
		font-weight: bold;
		font-size: 18px;
		margin-left: 18px;
		color: #0FC582;
	}
	.ql-container {
    box-sizing: border-box;
    font-family: sans-serif;
    font-size: 16px;
    height: auto;
    margin: 35px;
    position: relative;
}
/*
#popup
{
	height:100%;
}
*/
<?php }?>
</style>	
	
	
	<div class="temp-12" style="background-image: url('<?php echo $background_img;?>');">
		<div class="temp-12-main" style="background-color: <?php echo $background_color;?>;">
			<h3 class="temp-12-tag" id="editor1" data-editor="1" style="margin-bottom: 0px;"><?php echo $content1; ?></h3>
			<h4 class="temp-12-subtag" id="editor2" data-editor="2" style="margin-top: 0px;"><?php echo $content2; ?></h4>
			<h5 class="temp-12-subscribe" id="editor3" data-editor="3"><?php echo $content3; ?></h5>
			<div class="temp12_link link-text">	
				<?php if( is_customize_preview() ){?>
						<p class="temp12_link">+ Newsletter goes here.</p>
						<form style="display: none;" onsubmit="return false">
							First Name: <input type="text" id="first_name" name="first_name" />
							Last Name: <input type="text" id="last_name" name="last_name" />
							Email: <input type="text" id="customer_email" name="customer_email" />
							<input type="submit" value="Subscribe"/>
						</form>
					<?php } else{ ?>
						<form name="customer_details" id="customer_details" method="POST" onsubmit="return medma_mtx_form_validation('<?php echo admin_url( 'admin-ajax.php' ); ?>')" action="javascript:void(0);">
							<label id="subscribe-error" style="display: none;"></label>
							<input type="hidden" id="template-number" name="template_number" value="12"/>
							<input type="text" class="subscriber-field" id="first_name" name="first_name" required="true" placeholder="First Name"/>
							<input type="text" class="subscriber-field" id="last_name" name="last_name" required="true" placeholder="Last Name"/>
							<input type="email" class="subscriber-field" id="customer_email" name="customer_email" required="true" placeholder="Email"/>
							<input type="submit" value="Subscribe" id="subscribe-submit" name="subscribe_submit"/>
						</form>
					<?php }?>
			</div>
		</div>
	</div>

	 
	

	
	<div id="toolbar1">
	   <!-- Add font size dropdown -->
	   <select class="ql-size">
		  <option value="small"></option>
		  <!-- Note a missing, thus falsy value, is used to reset to default -->
		  <option selected></option>
		  <option value="large"></option>
		  <option value="huge"></option>
	   </select>
	  
	   <button class="ql-bold"></button>
	   <button class="ql-italic"></button>
	   <button class="ql-underline"></button>
	   <button class="ql-strike"></button>
	   
	   <!--select class="ql-align"></select-->
	   <select class="ql-color"></select>
	   <button class="ql-clean"></button>
	   <span class="save-content" id="save-content-1" style="display:none;">Saving...</span>
	   <span class="content-saved" id="content-saved-1" style="display:none;">Saved</span>
	</div>
	
	
	<div id="toolbar2">
	   <!-- Add font size dropdown -->
	   <select class="ql-size">
		  <option value="small"></option>
		  <!-- Note a missing, thus falsy value, is used to reset to default -->
		  <option selected></option>
		  <option value="large"></option>
		  <option value="huge"></option>
	   </select>
	  
	   <button class="ql-bold"></button>
	   <button class="ql-italic"></button>
	   <button class="ql-underline"></button>
	   <button class="ql-strike"></button>
	   
	   <!--select class="ql-align"></select-->
	   <select class="ql-color"></select>
	   <button class="ql-clean"></button>
	   <span class="save-content" id="save-content-2" style="display:none;">Saving...</span>
	   <span class="content-saved" id="content-saved-2" style="display:none;">Saved</span>
	</div>
	<div id="toolbar3">
	   <!-- Add font size dropdown -->
	   <select class="ql-size">
		  <option value="small"></option>
		  <!-- Note a missing, thus falsy value, is used to reset to default -->
		  <option selected></option>
		  <option value="large"></option>
		  <option value="huge"></option>
	   </select>
	  
	   <button class="ql-bold"></button>
	   <button class="ql-italic"></button>
	   <button class="ql-underline"></button>
	   <button class="ql-strike"></button>
	   
	   <!--select class="ql-align"></select-->
	   <select class="ql-color"></select>
	   <button class="ql-clean"></button>
	   <span class="save-content" id="save-content-3" style="display:none;">Saving...</span>
	   <span class="content-saved" id="content-saved-3" style="display:none;">Saved</span>
	</div>
	

	
	



<script>
	
var checkAjax1 = '';
var checkAjax2 = '';
var checkAjax3 = '';


(function ($) {
	var isCustomizer = $('#isCustomizer').attr('data-customizer');
	
		var quill1 = new Quill('#editor1', {
		   modules: {
			 toolbar: '#toolbar1'
		   },
		  theme: 'snow'
		});
	  var quill2 = new Quill('#editor2', {
		   modules: {
			 toolbar: '#toolbar2'
		   },
		  theme: 'snow'
		});
		
		var quill3 = new Quill('#editor3', {
		   modules: {
			 toolbar: '#toolbar3'
		   },
		  theme: 'snow'
		});
		
		
	if(isCustomizer == 1){   
	  
		quill1.formatLine(0, 1, 'align', 'left');
		quill2.formatLine(0, 1, 'align', 'center');
		quill3.formatLine(0, 1, 'align', 'center');
		
		quill1.on('text-change', function(delta, oldDelta, source) {
		  if (source == 'api') {
			if(checkAjax1 == ''){
				checkAjax1 = setTimeout(function(){ 
					var content = $('#editor1').children().html();
					medma_mtx_setContentValue('medma_matix_temp12_con_1',content,1);
				}, 3000);
			}
		  } else if (source == 'user') {
			  $('#save-content-1').css('display','inline-block');
			  $('#content-saved-1').css('display','none');
			if(checkAjax1 == ''){
				checkAjax1 = setTimeout(function(){ 
					var content = $('#editor1').children().html();
					medma_mtx_setContentValue('medma_matix_temp12_con_1',content,1);
				}, 3000);
			}
		  }
		});
		quill2.on('text-change', function(delta, oldDelta, source) {
		  if (source == 'api') {
			if(checkAjax2 == ''){
				checkAjax2 = setTimeout(function(){ 
					var content = $('#editor2').children().html();
					medma_mtx_setContentValue('medma_matix_temp12_con_2',content,2);
				}, 3000);
			}
		  } else if (source == 'user') {
			  $('#save-content-2').css('display','inline-block');
			  $('#content-saved-2').css('display','none');
			if(checkAjax2 == ''){
				checkAjax2 = setTimeout(function(){ 
					var content = $('#editor2').children().html();
					medma_mtx_setContentValue('medma_matix_temp12_con_2',content,2);
				}, 3000);
			}
		  }
		});
		
		quill3.on('text-change', function(delta, oldDelta, source) {
		  if (source == 'api') {
			if(checkAjax3 == ''){
				checkAjax3 = setTimeout(function(){ 
					var content = $('#editor3').children().html();
					medma_mtx_setContentValue('medma_matix_temp12_con_3',content,3);
				}, 3000);
			}
		  } else if (source == 'user') {
			  $('#save-content-3').css('display','inline-block');
			  $('#content-saved-3').css('display','none');
			if(checkAjax3 == ''){
				checkAjax3 = setTimeout(function(){ 
					var content = $('#editor3').children().html();
					medma_mtx_setContentValue('medma_matix_temp12_con_3',content,3);
				}, 3000);
			}
		  }
		});
		
		
		
		
		$(document).on('click','#editor1',function(){
			var editor = $(this).attr('data-editor');
			$('.ql-toolbar').css('display','none');
			$('#toolbar'+editor).css('display','block');
		});
		$(document).on('click','#editor2',function(){
			var editor = $(this).attr('data-editor');
			$('.ql-toolbar').css('display','none');
			$('#toolbar'+editor).css('display','block');
		});
		
		$(document).on('click','#editor3',function(){
			var editor = $(this).attr('data-editor');
			$('.ql-toolbar').css('display','none');
			$('#toolbar'+editor).css('display','block');
		});
		
		
		
	}else{
		quill1.enable(false);
		quill2.enable(false);
		quill3.enable(false);
		}
	
}(jQuery));



function medma_mtx_setContentValue(option,content,edit){
	(function ($) {
		var ajaxurl = $('#ajax_url').val();
		if(ajaxurl == ''){
			var ajaxurl = $('#ajax_url').attr('data-value');
		}
		$.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'insert_content_value',
				'option_name':option,
				'content':content
			},
			success:function(data) {
				//checkAjax+parseInt(edit) = '';
				window["checkAjax" + edit] = '';
				$('#save-content-'+edit).css('display','none');
				$('#content-saved-'+edit).css('display','inline-block');
				//console.log(data);
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	}(jQuery));
}

</script>
