/* Text Message Script */
$(document).ready(function(){
    var SMSsendBtn = $('#doTextMessage');
    $(document).on('click','#doTextMessage',function(e){
        var reciepient = $('#t-reciepient').val();
        var message = $('#t-message').val();
        if(reciepient && message){
            SMSsendBtn.val(sending+'..');
            var dataString = 'doSend=true'+'&reciepient='+reciepient+'&message='+message;
            $.ajax({
                url: base_url+'business/send_text_msg',
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
    });
});

/* Text Message Script Ends */