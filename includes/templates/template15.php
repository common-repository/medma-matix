<?php
	
/**
 * Defines template customizer view and frontend view.
 *
 * Used the customize setting options on fifteenth template,
 * add customer subscribe form on frontend template view
 * and define the example of inline text editor to edit text of 
 * templates and add style and scripts for inline text editor.
 *
 * @since    1.0.0
 */
	
	if(get_theme_mod( 'medma_matix_sp_15_background_img' ) !== false && get_theme_mod( 'medma_matix_sp_15_background_img' ) !== ''){
		$background_img = get_theme_mod( 'medma_matix_sp_15_background_img' );
	}else{
		$background_img = plugins_url('../img/temp15.jpg', __FILE__ );
	}
	
	
	
	if(get_option( 'medma_matix_temp15_con_1' ) !== false){
		$content1 = get_option( 'medma_matix_temp15_con_1' );
	}else{
		$content1 = "Explore and Do More";
	}
	
	if(get_option( 'medma_matix_temp15_con_2' ) !== false){
		$content2 = get_option( 'medma_matix_temp15_con_2' );
	}else{
		$content2 = "Subscribe to our Newsletter";
	}
	

 ?>

<?php 
	wp_enqueue_style( 'temp-15-quills-css', plugins_url('../../public/css/quill.snow.css', __FILE__ ));
?>


	
<style>
	.ql-editor .ql-align-center {
    text-align: left;
}
	#editor2
	{
		font-size: 15px;
		font-family: monospace;
		color: #000;
		padding: 20px 0px;
	}
	#customer_details{margin-top: 35px;}
	
	
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
		text-align: left !important;
		height: auto !important;
	}
	.ql-container {
    box-sizing: border-box;
    font-family: sans-serif;
   /* height: 16%;*/
   height: auto !important;
    position: relative;
    text-align:left;
}
	.ql-container {
		    height: 24% !important;
	}
	.temp-15-main
	{
	 height: 100%;
	}
	.link-text
	{
		margin-top: -37px;
	}
<?php } else{ ?>
.ql-container {
		   /* height: 24% !important;*/
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
		height: auto !important;
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
   /* height: 16%;*/
   height: auto !important;
    position: relative;
    text-align:left;
}

<?php }?>
.subscriber-field
{
	width:80% !important;
	margin: 5px 0px;
}
/*
#subscribe-submit
{
	margin-left: 25%;
}
*/
</style>	
	
	
	<div class="temp-15" style="background-image: url('<?php echo $background_img;?>');">
	  <div class="temp-15-main">
		<div class="temp-15-tag" id="editor1" data-editor="1">
		 <?php echo  $content1; ?>
		</div>
		<div class="temp-15-subtag" id="editor2" data-editor="2"><?php echo  $content2; ?>
		</div>
		<div class="link-text">	
			<?php if( is_customize_preview() ){?>
				<h3 class="temp15_link">+ Newsletter goes here.</h3>
				<form style="display: none;" onsubmit="return false">
					First Name: <input type="text" id="first_name" name="first_name" />
					Last Name: <input type="text" id="last_name" name="last_name" />
					Email: <input type="text" id="customer_email" name="customer_email" />
					<input type="submit" value="Subscribe"/>
				</form>
			<?php } else{ ?>
				<form name="customer_details" id="customer_details" method="POST" onsubmit="return medma_mtx_form_validation('<?php echo admin_url( 'admin-ajax.php' ); ?>')" action="javascript:void(0);">
					<label id="subscribe-error" style="display: none;"></label>
					<input type="hidden" id="template-number" name="template_number" value="15"/>
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
	
	

	
	



<script>
	
var checkAjax1 = '';
var checkAjax2 = '';



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
		
		
		
		
	if(isCustomizer == 1){   
	  
		quill1.formatLine(0, 1, 'align', 'left');
		quill2.formatLine(0, 1, 'align', 'center');
	
		
		quill1.on('text-change', function(delta, oldDelta, source) {
		  if (source == 'api') {
			if(checkAjax1 == ''){
				checkAjax1 = setTimeout(function(){ 
					var content = $('#editor1').children().html();
					medma_mtx_setContentValue('medma_matix_temp15_con_1',content,1);
				}, 3000);
			}
		  } else if (source == 'user') {
			  $('#save-content-1').css('display','inline-block');
			  $('#content-saved-1').css('display','none');
			if(checkAjax1 == ''){
				checkAjax1 = setTimeout(function(){ 
					var content = $('#editor1').children().html();
					medma_mtx_setContentValue('medma_matix_temp15_con_1',content,1);
				}, 3000);
			}
		  }
		});
		quill2.on('text-change', function(delta, oldDelta, source) {
		  if (source == 'api') {
			if(checkAjax2 == ''){
				checkAjax2 = setTimeout(function(){ 
					var content = $('#editor2').children().html();
					medma_mtx_setContentValue('medma_matix_temp15_con_2',content,2);
				}, 3000);
			}
		  } else if (source == 'user') {
			  $('#save-content-2').css('display','inline-block');
			  $('#content-saved-2').css('display','none');
			if(checkAjax2 == ''){
				checkAjax2 = setTimeout(function(){ 
					var content = $('#editor2').children().html();
					medma_mtx_setContentValue('medma_matix_temp15_con_2',content,2);
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
		
		
		
		
		
	}else{
		quill1.enable(false);
		quill2.enable(false);
		
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
