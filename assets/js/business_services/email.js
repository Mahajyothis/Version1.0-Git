/* Text Message Script */
$(document).ready(function(){
    var SMSsendBtn = $('#doEmail');
    $(document).on('click','#doEmail',function(e){
        var reciepient = $('#t-reciepient').val();
        var subject= $('#t-subject').val();
        var message = $('#t-message').val();
        if(subject || (subject == '' && confirm(no_suject+' ?'))){
		if(reciepient && message){
	            SMSsendBtn.val(sending+'..');
	            var dataString = 'doSend=true'+'&reciepient='+reciepient+'&message='+message+'&subject='+subject;
	            $.ajax({
	                url: base_url+'business/send_email',
	                type: 'POST',
	                data: dataString,
	                cache: false,
	                success: function (data) {                
	                    SMSsendBtn.val(send);
	                    $('.alert-success').removeClass('hide');
	                },
	                error: function (jqXHR, textStatus, errorThrown) {
	                    // Handle errors here
	                    console.log('ERRORS: ' + textStatus);
	                    // STOP LOADING SPINNER
	                    SMSsendBtn.val(send);
	                }
	            });
	        }
	        else{
	            alert(aff_fields+'!');
	        }
	}
	else return false;
        
    });
});

/* Text Message Script Ends */