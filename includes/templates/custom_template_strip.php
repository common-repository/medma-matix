<?php

/**
 * Defines custom template strip .
 *
 * Define the scripts for custom template
 * strip and define the inline text editor
 * for strip.
 *
 * @since    1.0.0
 */

	if(get_option( 'medma_matix_strip_con_cus' ) !== false){
		$content1 = get_option( 'medma_matix_strip_con_cus' );
	}else{
		$content1 = '<b>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b>';
	}
	
?>
<?php 
	wp_enqueue_style( 'cust-quills-css', plugins_url('../../public/css/quill.snow.css', __FILE__ ));

?>

	
<style>

<?php if($strip_position == 'top'){?>
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
</style>

	<div id="strip_toolbar1" class="strip-ql-snow">
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
	   
	   <select class="ql-align"></select>
	   <select class="ql-color"></select>
	   <button class="ql-clean"></button>
	   <span class="save-content" id="strip-save-content-1" style="display:none;">Saving...</span>
	   <span class="content-saved" id="strip-content-saved-1" style="display:none;">Saved</span>
	</div>
	

<div class="" id="strip_editor1" data-editor="1"><?php echo $content1;?></div>
	


<script>z
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
					medma_mtx_s_setContentValue('medma_matix_strip_con_cus',s_content,1);
				}, 3000);
			}
		  } else if (source == 'user') {
			  $('#strip-save-content-1').css('display','inline-block');
			  $('#strip-content-saved-1').css('display','none');
			if(s_checkAjax1 == ''){
				s_checkAjax1 = setTimeout(function(){ 
					var s_content = $('#strip_editor1').children().html();
					medma_mtx_s_setContentValue('medma_matix_strip_con_cus',s_content,1);
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
				console.log(data);
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	}(jQuery));
}

</script>
