/* Whatsapp Script */
var processing = false;
var WhatsappSendBtn = $('#doWhatsappMsg');
$(document).ready(function(){
    var limit = 5;
    var curr = $(this);
    $(document).on('change','.w-files',function(e){
        processing = true;
        $(this).siblings('.w-files').val('');
        var curr = $(this);
        if (parseInt($(this).get(0).files.length) > limit){
            alert(file_limit+" "+limit+" "+files);
            $(this).val('');
            processing = false;
        }
        else{
            curr.siblings('label').append('<img src="'+images+'loading.gif" />');
            $("form#WhatsappMsg").ajaxForm({ 
                dataType: "json",
                success : function (response) {                      
                    curr.val('');
                    if(response){                            
                        if(response) {
                            
                        }
                        else{
                            alert(something_wrong);
                        }
                        
                    }
                    processing = false;
                    curr.siblings('label').find('img').remove();
                }
            }).submit();
        }
    });
  
    /*$(document).on('click','#myModal',function(e){
        $('.alert-success').addClass('hide');
        $('#w-reciepient').val('');
        $('#w-message').val('');
    });*/

    $(document).on('click','.btn-cancel',function(e){
        $('button.close').click();
    });

    $(document).on('click','#doWhatsappMsg',function(e){
        if(processing) alert(be_patient);
        else {
            WhatsappSendBtn.val(sending+'...');
            send_whatsapp_msg();
        }
    });

    function send_whatsapp_msg() {
        var reciepient = $('#w-reciepient').val();
        var message = $('#w-message').val();
        var location = $('#w-location').val();
        var latitude = $('#w-latitude').val();
        var longitude = $('#w-longitude').val();
        var dataString = 'doSend=true'+'&reciepient='+reciepient+'&message='+message+'&location='+location+'&latitude='+latitude+'&longitude='+longitude;
        $.ajax({
            url: base_url+'business/send_whatsapp_msg',
            type: 'POST',
            data: dataString,
            cache: false,
            success: function (data) {                
                WhatsappSendBtn.val(send);
                $('.alert-success').removeClass('hide');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
                WhatsappSendBtn.val(send);
            }
        });
    }
    /* Location script */
    $(document).on('click','#select-location',function(){
    		if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(showPosition);
	    } else { 
	        x.innerHTML = geocoder_failed;
	    }
    	});
	
	function showPosition(position) {
		$('#w-latitude').val(position.coords.latitude);
		$('#w-longitude').val(position.coords.longitude);
		//ser(position.coords.latitude),position.coords.longitude);
		//alert(http://maps.googleapis.com/maps/api/geocode/json?latlng=40.714224,-73.961452);
	}
	/*function ser(){
		var geocoder;
		geocoder = new google.maps.Geocoder();
		var latlng = new google.maps.LatLng(latitude, longitude);
		
		geocoder.geocode(
		    {'latLng': latlng}, 
		    function(results, status) {
		        if (status == google.maps.GeocoderStatus.OK) {
		                if (results[0]) {
		                    var add= results[0].formatted_address ;
		                    var  value=add.split(",");
		
		                    count=value.length;
		                    country=value[count-1];
		                    state=value[count-2];
		                    city=value[count-3];
		                    alert(city_name+": " + city);
		                }
		                else  {
		                    alert(address_not_found);
		                }
		        }
		         else {
		            alert(geocoder_failed+": " + status);
		        }
		    }
		);
	}*/
	/* Location script ends */
});

/* Whatsapp Script Ends */