<?php

/**
 * Defines strip customizer view and frontend view.
 *
 * Used the customize setting options on first strip template
 * and define the example of inline text editor to edit text of 
 * templates and add style and scripts for inline text editor.
 *
 * @since    1.0.0
 */
	
	if(get_theme_mod( 'medma_matix_sp_strip_temp_button_status' ) !== false){
		$button_status = get_theme_mod( 'medma_matix_sp_strip_temp_button_status' );
	}else{
		$button_status = 'enable';
	}
	
	$strip_position = get_theme_mod( 'medma_matix_sp_strip_position' );
	$strip_close_icon = get_theme_mod( 'medma_matix_sp_strip_close_icon' );
	
	if(get_theme_mod( 'medma_matix_sp_strip_close_icon_color' ) !== false){
		$strip_close_icon_color = get_theme_mod( 'medma_matix_sp_strip_close_icon_color' );
	}else{
		$strip_close_icon_color = '#000';
	}
	
	if($strip_close_icon == 'disable'){
		$close_icon = "<span class='strip-cancle' id='strip-cancle' style='color:".$strip_close_icon_color.";display:none;'><i class='fa fa-times-circle fa-2x' aria-hidden='true'></i></span>";
	}
	else{
		$close_icon = "<span class='strip-cancle' id='strip-cancle' style='color:".$strip_close_icon_color.";'><i class='fa fa-times-circle fa-2x' aria-hidden='true'></i></span>";
	}
	
	if($button_status == 'enable'){
		$btn_sts = 'inline';
	}else{
		$btn_sts = 'none';
	}
	
	if(get_theme_mod( 'medma_matix_sp_strip_1_back_color' ) !== false){
		$back_color = get_theme_mod( 'medma_matix_sp_strip_1_back_color' );
	}else{
		$back_color = '#DB6D2C';
	}
	
	if(get_theme_mod( 'medma_matix_sp_strip_1_button_color' ) !== false){
		$button_color = get_theme_mod( 'medma_matix_sp_strip_1_button_color' );
	}else{
		$button_color = '#403C3C';
	}
	
	if(get_theme_mod( 'medma_matix_sp_strip_1_button_text' ) !== false){
		$button_text = get_theme_mod( 'medma_matix_sp_strip_1_button_text' );
	}else{
		$button_text = 'Apply Coupons';
	}
	
	if(get_theme_mod( 'medma_matix_sp_strip_1_button_text_color' ) !== false){
		$button_text_color = get_theme_mod( 'medma_matix_sp_strip_1_button_text_color' );
	}else{
		$button_text_color = '#ffffff';
	}
	
	if(get_option( 'medma_matix_strip1_con_1' ) !== false){
		$content1 = get_option( 'medma_matix_strip1_con_1' );
	}else{
		$content1 = '<b>$25 off</b> when you complete your order today.';
	}
	
?>
<?php 
	
?>

	
<style>

<?if($strip_position == 'top'){?>
	#strip_toolbar1 {
		bottom: -50px;
	}
<?php }else {?>
	#strip_toolbar1 {
		bottom: 90px;
	}
<?php } ?>
	
<?php if( !is_customize_preview() ){?>
	
	.ql-container.ql-snow {
		border: none !important;
	}
	
	#strip_toolbar1{
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
	
	#strip_toolbar1 {
		position: absolute;
		top: auto;
	}

	.ql-editor{
		padding: 0px;
		overflow: hidden;
		text-align: inherit;
	}
	
	#strip {
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

	#strip_editor1{
		font-family: "Comic Sans MS", "Comic Sans", cursive;
		font-size: 18px;
	}
	
	p{
		display: inline;
	}
	
	img{
		vertical-align: middle;
	}
</style>

	<div id="strip_toolbar1" class="strip-ql-snow">
	   <select class="ql-size">
		  <option value="small"></option>
		  <option selected></option>
		  <option value="large"></option>
		  <option value="huge"></option>
	   </select>
	  
	   <button class="ql-bold"></button>
	   <button class="ql-italic"></button>
	   <button class="ql-underline"></button>
	   <button class="ql-strike"></button>
	   
	   <select class="ql-align"></select>
	   <select class="ql-color"></select>
	   <button class="ql-clean"></button>
	   <span class="save-content" id="strip-save-content-1" style="display:none;">Saving...</span>
	   <span class="content-saved" id="strip-content-saved-1" style="display:none;">Saved</span>
	</div>
	

<div class="strip-temp-1" style="background-color:<?php echo $back_color;?>;">
	<div class="strip-temp-1-order" id="strip_editor1" data-editor="1"><?php echo $content1;?></div>
	<a href="javascript:void(0);" id="strip-template-button" style="display:<?php echo $btn_sts;?>;background-color:<?php echo $button_color;?>;color:<?php echo $button_text_color;?>;"><?php echo $button_text;?></a> 
	<?php echo $close_icon;?>
</div>


<script>
	
var s_checkAjax1 = '';
	
(function ($) {
	
	var isCustomizer = $('#isCustomizer').attr('data-customizer');
		var s_quill1 = new Quill('#strip_editor1', {
		   modules: {
			 toolbar: '#strip_toolbar1'
		   },
		  theme: 'snow'
		});
	  
		
	if(isCustomizer == 1){

	    s_quill1.on('text-change', function(delta, oldDelta, source) {
		  if (source == 'api') {
			if(s_checkAjax1 == ''){
				s_checkAjax1 = setTimeout(function(){ 
					var s_content = $('#strip_editor1').children().html();
					medma_mtx_s_setContentValue('medma_matix_strip1_con_1',s_content,1);
				}, 3000);
			}
		  } else if (source == 'user') {
			  $('#strip-save-content-1').css('display','inline-block');
			  $('#strip-content-saved-1').css('display','none');
			if(s_checkAjax1 == ''){
				s_checkAjax1 = setTimeout(function(){ 
					var s_content = $('#strip_editor1').children().html();
					medma_mtx_s_setContentValue('medma_matix_strip1_con_1',s_content,1);
				}, 3000);
			}
		  }
		});
	  
		s_quill1.formatLine(0, 1, 'align', 'center');
	  

		$(document).on('click','#strip_editor1',function(){
			var editor = $(this).attr('data-editor');
			$('.ql-toolbar').css('display','none');
			$('#strip_toolbar'+editor).css('display','block');
		});
		
	
	}else{
		s_quill1.enable(false);	
	}
}(jQuery));


function medma_mtx_s_setContentValue(option,content,edit){
	(function ($) {
		var ajaxurl = $('#ajax_url').val();
		if(ajaxurl == ''){
			var ajaxurl = $('#ajax_url').attr('data-value');
		}
		//console.log(content);
		$.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'insert_content_value',
				'option_name':option,
				'content':content
			},
			success:function(data) {
				window["s_checkAjax" + edit] = '';
				$('#strip-save-content-'+edit).css('display','none');
				$('#strip-content-saved-'+edit).css('display','inline-block');
				//console.log(data);
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	}(jQuery));
}

</script>
