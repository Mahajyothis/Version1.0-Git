$(document).ready(function(){

	$(document).on('click','input.saveArticle',function(e){
			var captcha_validation = false;
			var required_flag = 0;
			e.preventDefault();
			// Check category selected
	        if(!$('#tokenize').val()){
	          $(this).focus();
	          required_flag = 1;
	        }
	        if(!required_flag) {
				$('.required').each(function(){
		            if(($(this).val() == '') && !required_flag){         
		                required_flag = 1;
		                $(this).focus();
		                return false;
		            }
		        });
			}
	        if(!required_flag) {
	        	//checkCaptcha();
	        	checkCaptcha(function(result) {
				    $('form#EventAddForm').submit();
				});
	        	
	        	/*if(captcha_validation === true){
	            	$('form#EventAddForm').submit();
	          }*/
	        }
	});

	function checkCaptcha(callback){
		$.ajax({
			url: base_url+"captcha/check",
			data:'captcha='+$("#captcha").val(),
			type: "POST",
			dataType: "json",
			async: false,
			success:function(data){
				if(parseInt(data) === 1) {
		            //captcha_validation = true;
		            callback(true);		          
		        }
		        else $("#captcha").focus();
			},
			error:function (){
				$("#captcha").focus();
			}
			});
	}

	$("#captcha_code").attr('src',base_url+'captcha/get_captcha');

	$(document).on('click','#refreshCaptcha',function(e){
		$("#captcha_code").attr('src',base_url+'captcha/get_captcha');
	});
});