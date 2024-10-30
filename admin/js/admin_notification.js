$(document).ready(function(){

	if($("#enable-disable-notification").val() == 1){
		$(".firebase_sdk-wrapper").removeClass('medma-hidden');
	}else{
		$(".firebase_sdk-wrapper").addClass('medma-hidden');

	}

	$('#bg').change(function(){
		var bg = $(this).val();
		$(".medma-toast").css('background',bg);
	});

	$('#text-color').change(function(){
		var tx_color = $(this).val();
		$(".medma-toast").css('color',tx_color);
	});

	$('#anc-color').change(function(){
		var tx_color = $(this).val();
		// console.log(tx_color);
		$(".url").css('color',tx_color);
	});
	$("#border").bind('change keyup',function(){
		var bor = $(this).val();
		$(".medma-toast").css('border', bor);
	});
	$("#dismissable").change(function(){
		var val = $(this).val();
		// console.log(val);
		if(val == 1){
			
			$('.turn-off').removeClass('medma-hidden');
			$('.close').removeClass('medma-hidden');
		}else{
			
			$('.turn-off').addClass('medma-hidden');
			$('.close').addClass('medma-hidden');
		}
	});

	$("#enable-disable-notification").change(function(){
		var val = $(this).val();
		if(val == 1){
			$(".firebase_sdk-wrapper").removeClass('medma-hidden');
		}else{
			$(".firebase_sdk-wrapper").addClass('medma-hidden');

		}
	});
	$("#show-steps").click(function(){
		$(".medma-steps").removeClass('medma-hidden');
	});
	$(".close-steps").click(function(){
		$(".medma-steps").addClass('medma-hidden');
	});
});
