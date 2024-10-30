<?php
	if(get_option( 'medma_matix_sp_popup_content' ) !== false){
		$content = get_option( 'medma_matix_sp_popup_content' );
	}else{
		$content = '';
	}
	
	
	
 
?>
<?php 
	wp_enqueue_style( 'cust-quills-css', plugins_url('../../public/css/quill.snow.css', __FILE__ ));

?>
	
<style>
	
	.ql-editor{
		padding: 0px;
		overflow: hidden;
		text-align: inherit;
	}
	
	#editor{
		text-align: inherit;
	}
	
	.ql-editor .ql-align-center{
		text-align: inherit;
	}
	
<?php if( !is_customize_preview() ){?>
	
	.ql-container.ql-snow {
		border: none !important;
	}
	
	#toolbar1, #toolbar2, #toolbar3, #toolbar4{
		display: none;
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
		top: -80px;
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

	<div class="" id="editor"><?php echo $content;?></div>
		
	
	<div id="toolbar">
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
	   <select class="ql-background"></select>
	   <button class="ql-clean"></button>
	   <button class="ql-image"></button>
	   <span class="save-content" id="save-content" style="display:none;">Saving...</span>
	   <span class="content-saved" id="content-saved" style="display:none;">Saved</span>
	</div>
	
	





<script>
	
var checkAjax = '';
	
(function ($) {
	
	var isCustomizer = $('#isCustomizer').attr('data-customizer');
	
		var quill = new Quill('#editor', {
		   modules: {
			 toolbar: '#toolbar'
		   },
		  theme: 'snow'
		});
	  
		
	if(isCustomizer == 1){

	   quill.on('text-change', function(delta, oldDelta, source) {
		  if (source == 'api') {
			if(checkAjax == ''){
				checkAjax = setTimeout(function(){ 
					var content = $('#editor').children().html();
					medma_mtx_setContentValue('medma_matix_sp_popup_content',content);
				}, 3000);
			}
		  } else if (source == 'user') {
			  $('#save-content').css('display','inline-block');
			  $('#content-saved').css('display','none');
			  
			if(checkAjax == ''){
				checkAjax = setTimeout(function(){ 
					var content = $('#editor').children().html();
					medma_mtx_setContentValue('medma_matix_sp_popup_content',content);
				}, 3000);
			}
		  }
		});
		
		

	  
		quill.formatLine(0, 1, 'align', 'center');

		$(document).on('click','#editor',function(){
			$('.ql-toolbar').css('display','none');
			$('#toolbar').css('display','block');
		});
		
		
	
	}else{
		quill.enable(false);	
		$('#toolbar').css('display', 'none');
	}
}(jQuery));


function medma_mtx_setContentValue(option,content){
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
				checkAjax = '';
				$('#save-content').css('display','none');
				$('#content-saved').css('display','inline-block');
				//console.log(data);
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		});
	}(jQuery));
}

</script>


