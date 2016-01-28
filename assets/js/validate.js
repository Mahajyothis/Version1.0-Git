$('#click-register').on('click',function(){
      $('#register').modal('toggle');
      $('#signin').modal('toggle');

    }); 

$('#click-forgot').on('click',function(){
      $('#forgot').modal('toggle');
      $('#signin').modal('toggle');

    }); 
//------------LOGGED USER-------------------//

$('.logged_user').on('click',function(){
  $('.drop').slideToggle();
})


   
//------------LOGIN FUNCTIONS-------------------//
$(document).delegate('.login-input','keypress',function(e){
if(e.which == 13) $('.login_click').click();
});

$(document).delegate('.login_click','click',function(b){
  b.preventDefault();
  var ck_name = /^[a-z ,.'-]+$/i;
  var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  var user = $('#username').val();
  var pass = $('#password').val();

  if(user == ''){
    $('.user').html(error_username).fadeIn();
    $('#username').focus();
    return false;
  }
  else if(pass == ''){
    $('.pass').html(error_password).fadeIn();
    $('#username').focus();
    return false;
  }
  else{
     
   $.ajax({  
    url:base_url+'login',
    type:'POST',
    data:{uname:user,pword:pass},
    dataType: "json"
     }).done(function(data){
        if(data == 2){
          $('#msg_login').html(error_up).css("color","white");

        }
        else if(data == 3){
          $('#msg_login').html('You have entered a wrong password' ).css("color","white");

        }
        else if(data == 4){
          $('#msg_login').html('Email Verification Pending' ).css("color","white");

        }
        else{
    $('#msg_login').html(hi+' '+data.FullName).css({"color":"yellowgreen","font-size":"12px"});
            setTimeout(function(){window.location.href ='user/'+data.custName;},2000);

        }

      });
  }



});


//-----------------------------USERNAME VALIDATION-------------------------------//

$(document).delegate('#uname','change',function() {
	$('#user_loader').fadeIn();
	
  var uname = $('#uname').val();
  $.post(base_url+'registration/check_username/'+uname,{chk_username:1},
    function(resp){
      
	$('#user_loader').fadeOut();
      if(resp == 4){

        $('#uname').next('.error_msg').html('<strong class="text-success">'+uname_available+'</strong>').fadeIn();


      }
      else{
       $('#uname').next('.error_msg').html(uname_exist).fadeIn();
       $('#uname').focus(); 

     }


   });

});

$(document).delegate('#user_image','change',function(){

  //f.preventDefault();

  readURL(this);  


  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#profile').attr('src', e.target.result);

      }

      reader.readAsDataURL(input.files[0]);
    }
  }



});
//-------------------------------VERIFY---------------------------//
    var typ = window.location.hash.substr(1);
    var type = typ.split('?id=')[0];
    var last_id = typ.split('?id=')[1];    
            
    sessionStorage.setItem('cust_id',last_id);
      
            if(type == 'continue_two'){            
               
                $('.load_page').html("");
                $('.load_page').load(base_url+'registration/register_secondpage',{base:base_url}); 
                $('.page-nav').children().eq(1).css("opacity","1").siblings().css("opacity",".20");
                $('#register').modal('show');    
                    

               
                
            }    
         $(document).delegate('#dob','click',function(){
        
           $(this).datepicker({ dateFormat:'yy-mm-dd', changeMonth:true, changeYear:true, yearRange: '-100y:c+nn'}).datepicker("show").val().next().css("visibility","hidden");
         
         });              




if(!window.location.hash){

  $('.page-nav').children().eq(0).css("opacity","1").siblings().css("opacity",".20");
}

//-----------------------------REGISTRATION--------------------------------//

$(document).delegate('#nex','click',function(c) {

      //c.preventDefault();
      var ck_uname = /^[A-Za-z0-9 ]{3,20}$/;
      var ck_name = /^[a-z ,.'-]+$/i;
      var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
      var ck_password = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
      var ck_pin = /^[0-9]{6}$/;

      var page = $('#page').val();


      if(page == 'p1'){

        var uname = $('#uname').val();
        var pass = $('#pword').val();
        var cpass = $('#c_password').val();
        var email = $('#r_email').val();
        var cemail = $('#c_email').val();

        if(!ck_uname.test(uname) ){

          $('#uname').next('.error_msg').html(error_username).fadeIn();
          $('#uname').focus();
          return false;
        }
        else if(!ck_email.test(email)){
          $('#r_email').next('.error_msg').html(error_email).fadeIn();
          $('#r_email').focus();
          return false;
        } 
        else if((!ck_email.test(cemail)) && (email !== cemail)){
          $('#c_email').next('.error_msg').html(email_missmatch).fadeIn();
          $('#c_email').focus();
          return false;
        }   
        else if(!ck_password.test(pass)){
          $('#pword').next('.error_msg').html(password_limit).fadeIn();
          $('#pword').focus();
          return false;
        } 
        else if((!ck_password.test(cpass)) || (pass !== cpass)){
          $('#c_password').next('.error_msg').html(password_missmatch).fadeIn();
          $('#c_password').focus();
          return false;
        } 

        else{

          $.post(base_url+'registration/register_user',{reg:1,uname:uname, email:email, password:pass},      function(response){
    //alert(response);
    
    if(response == 2){
      $('#r_email').next('.error_msg').html(email_exist).fadeIn();
      $('#r_email').focus();  

    }
    else{
      $('.load_page').html('<h3 class="text-success text-center">'+confirmation+'</h3>');
      //alert(response);
      joomlaRegistration(uname,email,pass);
      setTimeout(function(){
        $('#register').modal('hide');

      },2500);


    }


  });

        }

      }

      else if(page  == 'p2'){

       var last_id = sessionStorage.getItem('cust_id');
       //alert(last_id);
        var user_image = $('#user_image').val();
        var fname   = $('#first_name').val();
        var lname   = $('#last_name').val();
        var dob     = $('#dob').val();
        var pin     = $('#postal_code').val();
        var intrest = $('#intrest').val();
        var city    = $('#city').val();
        var district= $('#district').val();
        var state   = $('#state').val();
        var country = $('#country').val();
        var Address = $('#address').val();

 //alert(user_image);
  $('#cust_id').val(last_id);

if(user_image == ''){
  $('#user_image').next('.error_msg').html(error_photo).fadeIn();
  $('#user_image').focus();
  return false;
}
else if(!ck_name.test(fname) ){
  $('#first_name').next('.error_msg').html(error_fname).fadeIn();
  $('#first_name').focus();
  return false;
}
else if(lname !== '' && !ck_name.test(lname) ){
  $('#last_name').next('.error_msg').html(error_lname).fadeIn();
  $('#last_name').focus();
  return false;
}
else if(dob == '' ){
  $('#dob').next('.error_msg').html(error_dob).fadeIn();
  $('#dob').focus();
  return false;
}
else if(pin == '' || !ck_pin.test(pin)){
  $('#postal_code').next('.error_msg').html(error_zip).fadeIn();
  $('#postal_code').focus();
  return false;
}
else if(district == '' || !ck_name.test(district)){
  $('#district').next('.error_msg').html(error_district).fadeIn();
  $('#district').focus();
  return false;
}
else if(city == '' || !ck_name.test(city)){
  $('#city').next('.error_msg').html(error_city).fadeIn();
  $('#city').focus();
  return false;
}
else if(state == '' || !ck_name.test(state)){
  $('#state').next('.error_msg').html(error_state).fadeIn();
  $('#state').focus();
  return false;
}
else if(country == '' || !ck_name.test(country)){
  $('#country').next('.error_msg').html(error_country).fadeIn();
  $('#country').focus();
  return false;
}
else if(address == ''){
  $('#address').next('.error_msg').html(error_address).fadeIn();
  $('#address').focus();
  return false;
}
else{
      /*$.post(base_url+'registration/register_user',{
        reg:2,
        last_id:last_id,
        user_image:user_image, 
        fname:fname, 
        lname:lname,
        dob:dob,
        pin:pin,
        intrest:intrest,
        city:city,
        district:district,
        state:state,
        country:country,
        Address:Address
      },

      function(response){
      //alert(response);
       if(response == 1){
       
      }
    });*/
  $('#cust_id').attr('value',last_id);
  $('#register_2').submit();
  $("#hidden_upload").load(function() {
    $('.load_page').load(base_url+'registration/register_thirdpage').hide().fadeIn('slow');
    $('.page-nav').children().eq(2).css("opacity","1").siblings().css("opacity",".20");
  });

}   

} 

else if(page == 'p3'){
  var last_id = sessionStorage.getItem('cust_id');
  var qualification = $('#qualification').val();
  var profession = $('#profession').val();
  var industry = $('#industry').val();
  var description = $('#description').val();


  if(qualification == ''){
    $('#qualification').next('.error_msg').html(error_qualification).fadeIn();
    $('#qualification').focus();
    return false;
  }
  else if(profession == '' || !ck_name.test(profession)){
    $('#profession').next('.error_msg').html(error_profession).fadeIn();
    $('#profession').focus();
    return false;
  }
  else if(industry == '' || !ck_name.test(industry)){
    $('#industry').next('.error_msg').html(error_industry).fadeIn();
    $('#industry').focus();
    return false;
  }
  else if(description == '' || !ck_name.test(description)){
    $('#description').next('.error_msg').html(error_description).fadeIn();
    $('#description').focus();
    return false;
  }
  else{
    $.post(base_url+'registration/register_user',{
      reg:3,
      cust_id:last_id, 
      qualification:qualification, 
      profession:profession, 
      industry:industry, 
      description:description},

      function(response){

       if(response == 1){
        $('.load_page').load(base_url+'registration/register_finalpage').hide().fadeIn('slow');
        $('.page-nav').children().eq(3).css("opacity","1").siblings().css("opacity",".20");
         setTimeout(function(){window.location.href = base_url;},1000);
      }

    });

  }

}  


});

//---------------------JOOMLA REGISTRATION-------------------------------------------//
function joomlaRegistration(user,email,password){
	var dataString = 'joomlaRegistration=true'+'&user='+user+'&email='+email+'&password='+password;
			/*$.ajax({
				type: "POST",
				url: "http://blog.mahajyothis.net/index.php/component/users/?task=registration.register",
				data: dataString,
				cache: false,
				success: function(data){
				//alert(data);
					var joomlaID = parseInt(data);
					if(joomlaID){
						updateJoomlaID(joomlaID);
					}
				}
			});*/
			$.ajax({
			    type: 'POST',
			    url: "http://blog.mahajyothis.net/index.php/component/users/?task=registration.register",
			    crossDomain: true,
			    data: dataString,
			    dataType: 'json',
			    success: function(responseData, textStatus, jqXHR) {
			        var joomlaID = parseInt(responseData);
					if(joomlaID){
						updateJoomlaID(joomlaID);
					}
			    }
			});
}

function updateJoomlaID(joomlaID){
	var dataString = 'updateJoomlaID=true'+'&id='+joomlaID;
			$.ajax({
				type: "POST",
				url: base_url+"joomla",
				data: dataString,
				cache: false,
				success: function(data){
					
				}
			});
}
//---------------------JOOMLA REGISTRATION ENDS -------------------------------------------//
//---------------------ZODIAC SIGN -------------------------------------------//

  $(document).delegate('.zod-submit','click',function(e){

      e.preventDefault();
      
      var month = $('#z_month').val();
      var date = $('#z_date').val();

      $.post(base_url+'index.php/zodiac',{

          month:month,
          date:date

      },function(zodi){           
          //alert(zodi);
          $('.zodi-img').attr('src',base_url+'assets/img/zodiac/'+zodi+'.png');
          $('.zodi-head').html(zodi);
          $('.zodi-desc').html('description comes heredescription comes heredescription comes here');
               
        });
  });


//-------------------------------ERROR HIDE----------------------------------------//
  $(document).delegate('.form-control','keypress',function(e) {
    $(this).next().hide();
    $('.user').hide();
    $('.pass').hide();
  });
  $('#qualification').delegate('change',function(){
    $(this).next().hide();

  });
/*********************gemo error hide***************/
 
  