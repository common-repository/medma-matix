<?php

/**
 * Defines template customizer view and frontend view.
 *
 * Used the customize setting options on fourth templates
 * and define the example of inline text editor to edit text of 
 * templates and add style and scripts for inline text editor.
 *
 * @since    1.0.0
 */
 
	if(get_theme_mod( 'medma_matix_sp_4_background_img' ) !== false && get_theme_mod( 'medma_matix_sp_4_background_img' ) !== ''){
		$background_img = get_theme_mod( 'medma_matix_sp_4_background_img' );
	}else{
		$background_img = plugins_url('../img/cinema.png', __FILE__ );
	}
	
	if(get_theme_mod( 'medma_matix_sp_4_button_color' ) !== false){
		$button_color = get_theme_mod( 'medma_matix_sp_4_button_color' );
	}else{
		$button_color = 'orange';
	}
	
	if(get_theme_mod( 'medma_matix_sp_4_button_text' ) !== false && get_theme_mod( 'medma_matix_sp_4_button_text' ) !== ''){
		$button_text = get_theme_mod( 'medma_matix_sp_4_button_text' );
	}else{
		$button_text = 'SHOP NOW';
	}
	
	if(get_theme_mod( 'medma_matix_sp_4_text_color' ) !== false && get_theme_mod( 'medma_matix_sp_4_text_color' ) !== ''){
		$button_text_color = get_theme_mod( 'medma_matix_sp_4_text_color' );
	}else{
		$button_text_color = '#ffffff';
	}
	
	if(get_theme_mod( 'medma_matix_sp_4_button_link' ) !== false && get_theme_mod( 'medma_matix_sp_4_button_link' ) !== ''){
		$button_link = get_theme_mod( 'medma_matix_sp_4_button_link' );
	}else{
		$button_link = 'javascript:void(0);';
	}
	
	if(get_option( 'medma_matix_temp4_con_1' ) !== false){
		$content1 = get_option( 'medma_matix_temp4_con_1' );
	}else{
		$content1 = "It's Show Time...";
	}
	
	if(get_option( 'medma_matix_temp4_con_2' ) !== false){
		$content2 = get_option( 'medma_matix_temp4_con_2' );
	}else{
		$content2 = "Get <span>2 FREE</span> Movie Tickets!";
	}
	
	if(get_option( 'medma_matix_temp4_con_3' ) !== false){
		$content3 = get_option( 'medma_matix_temp4_con_3' );
	}else{
		$content3 = "ON PURCHASE ABOVE <span>$500</span>";
	}
 ?>

<style>
	.col-md-12, .col-md-6{
		padding-right: 0px;
		padding-left: 0px;
	}
	p {
		margin: 0;
	}
</style>

<?php 
	wp_enqueue_style( 'temp-4-quills-css', plugins_url('../../public/css/quill.snow.css', __FILE__ ));
?>


	
<style>
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
	
<?php } else{ ?>
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
<?php }?>
</style>	
	
	
	
	<div class="temp-4-main" style="background-image: url('<?php echo $background_img;?>');">
		<div class="temp-4-inner">
			<div class="temp-4-side-ul">
				<div class="temp-4-ul-div-1" id="editor1" data-editor="1"><?php echo $content1;?></div>
				<div class="temp-4-ul-div-2" id="editor2" data-editor="2"><?php echo $content2;?></div>
				<div class="temp-4-ul-div-3" id="editor3" data-editor="3"><?php echo $content3;?></div>
				<div class="temp-4-ul-div-4">
					<a href="<?php echo $button_link;?>" target="_blank" style="background-color:<?php echo $button_color?>;color:<?php echo $button_text_color?>;">
						<?php echo $button_text;?>
					</a>
				</div>
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
		quill2.formatLine(0, 1, 'align', 'left');
		quill3.formatLine(0, 1, 'align', 'left');
	  
		quill1.on('text-change', function(delta, oldDelta, source) {
		  if (source == 'api') {
			if(checkAjax1 == ''){
				checkAjax1 = setTimeout(function(){ 
					var content = $('#editor1').children().html();
					medma_mtx_setContentValue('medma_matix_temp4_con_1',content,1);
				}, 3000);
			}
		  } else if (source == 'user') {
			  $('#save-content-1').css('display','inline-block');
			  $('#content-saved-1').css('display','none');
			if(checkAjax1 == ''){
				checkAjax1 = setTimeout(function(){ 
					var content = $('#editor1').children().html();
					medma_mtx_setContentValue('medma_matix_temp4_con_1',content,1);
				}, 3000);
			}
		  }
		});
		
		quill2.on('text-change', function(delta, oldDelta, source) {
		  if (source == 'api') {
			if(checkAjax2 == ''){
				checkAjax2 = setTimeout(function(){ 
					var content = $('#editor2').children().html();
					medma_mtx_setContentValue('medma_matix_temp4_con_2',content,2);
				}, 3000);
			}
		  } else if (source == 'user') {
			  $('#save-content-2').css('display','inline-block');
			  $('#content-saved-2').css('display','none');
			if(checkAjax2 == ''){
				checkAjax2 = setTimeout(function(){ 
					var content = $('#editor2').children().html();
					medma_mtx_setContentValue('medma_matix_temp4_con_2',content,2);
				}, 3000);
			}
		  }
		});
		
		quill3.on('text-change', function(delta, oldDelta, source) {
		  if (source == 'api') {
			if(checkAjax3 == ''){
				checkAjax3 = setTimeout(function(){ 
					var content = $('#editor3').children().html();
					medma_mtx_setContentValue('medma_matix_temp4_con_3',content,3);
				}, 3000);
			}
		  } else if (source == 'user') {
			  $('#save-content-3').css('display','inline-block');
			  $('#content-saved-3').css('display','none');
			if(checkAjax3 == ''){
				checkAjax3 = setTimeout(function(){ 
					var content = $('#editor3').children().html();
					medma_mtx_setContentValue('medma_matix_temp4_con_3',content,3);
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