$('#click-register').on('click',function(){
      $('#register').modal('toggle');
      $('#signin').modal('toggle');

    }); 

                $('#click-forgot').on('click',function(){
      $('#forgot').modal('toggle');
      $('#signin').modal('toggle');

    }); 

    var type = window.location.hash.substr(1);
      
            if(type == 'continue_two'){            
               
                $('.load_page').html("");
                $('.load_page').load(base_url+'assets/includes/register2.php'); 
                $('.page-nav').children().eq(1).css("opacity","1").siblings().css("opacity",".20");
                $('#register').modal('show');              
               
                
            }    
         $(document).delegate('#dob','click',function(){
        
           $(this).datepicker({dateFormat:'yy-mm-dd',changeMonth:true,changeYear:true}).datepicker("show").val().next().css("visibility","hidden");
         
         });              




if(!window.location.hash){

  $('.page-nav').children().eq(0).css("opacity","1").siblings().css("opacity",".20");
}
//------------LOGIN FUNCTIONS-------------------//
$(document).delegate('.login_click','click',function(b){
  b.preventDefault();
  alert('heheheheheheh');
  var ck_name = /^[a-z ,.'-]+$/i;
  var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  var user = $('#username').val();
  var pass = $('#password').val();
  //alert(user);
  if(user == ''){
    $('.user').html('Username is empty / Not valid').fadeIn();
    $('#username').focus();
    return false;
  }
  else if(pass == ''){
    $('.pass').html('Password is empty / Not valid').fadeIn();
    $('#username').focus();
    return false;
  }
  else{

    $.post(base_url+'login',{uname:user,pword:pass},

      function(data){
        alert(data);
        if(data == 2){
          $('#msg_login').html('Username or password Incorrect, Try again').css("color","red");

        }
        else{


          window.location.href = base_url+"index.php/user/"+data;

        }

      });
  }



});




//-----------------------------USERNAME VALIDATION-------------------------------//

$(document).delegate('#uname','change',function() {
  var uname = $('#uname').val();
  $.post(base_url+'registration/check_username/'+uname,{chk_username:1},
    function(resp){
      alert(resp);

      if(resp == 4){

        $('#uname').next('.error_msg').html('<strong class="text-success">User name Available</strong>').fadeIn();


      }
      else if(resp == 3){
       $('#uname').next('.error_msg').html('User name Already Exsist, Please use another').fadeIn();
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
/*********************ENDS*******************************

$('.page-nav').children().eq(0).css("opacity","1").siblings().css("opacity",".20");
$(document).on('click','#nex',function() {

    var ck_uname = /^[A-Za-z0-9 ]{3,20}$/;
    var ck_name = /^[a-z ,.'-]+$/i;
    var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    var ck_username = /^[A-Za-z0-9_]{3,20}$/;
    var ck_password = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
    var ck_pin = /^[0-9]{6}$/;
    var page = $('#page').val();


    if(page == 'p1'){
      /*
      var uname = $('#username').val();
      var pass = $('#password').val();
      var cpass = $('#c_password').val();
      var email = $('#email').val();
      var cemail = $('#c_email').val();

      if(!ck_uname.test(uname) ){
        $('#username').next('.error_msg').html('Username is empty / Not valid').fadeIn();
        $('#username').focus();
        return false;
      }
      else if(!ck_email.test(email)){
        $('#email').next('.error_msg').html('Email is empty / Not valid').fadeIn();
        $('#email').focus();
        return false;
      } 
      else if((!ck_email.test(cemail)) && (email !== cemail)){
        $('#c_email').next('.error_msg').html('Entered Email Mismatch').fadeIn();
        $('#c_email').focus();
        return false;
      }   
      else if(!ck_password.test(pass)){
        $('#password').next('.error_msg').html('Please use mixture charectors(eg:_acdb132_)').fadeIn();
        $('#password').focus();
        return false;
      } 
      else if((!ck_password.test(cpass)) && (pass !== cpass)){
        $('#c_password').next('.error_msg').html('Entered password Mismatch').fadeIn();
        $('#c_password').focus();
        return false;
      } 
      
      else{

        

      }*/
      $('.load_page').load(base_url+'assets/includes/register2.php').hide().fadeIn('slow');
        $('.page-nav').children().eq(1).css("opacity","1").siblings().css("opacity",".20");
    }
    else if(page  == 'p2'){
      /*var pic     = $('#user_pic').val()
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



      if(pic == ''){
        $('#user_pic').next('.error_msg').html('Please Upload image').fadeIn();
        $('#user_pic').focus();
        return false;
      }
      else if(!ck_name.test(fname) ){
        $('#first_name').next('.error_msg').html('First name is empty / Not valid').fadeIn();
        $('#first_name').focus();
        return false;
      }
      else if(lname !== '' && !ck_name.test(lname) ){
        $('#last_name').next('.error_msg').html('Last name is empty / Not valid').fadeIn();
        $('#last_name').focus();
        return false;
      }
      else if(dob == '' ){
        $('#dob').next('.error_msg').html('Birth date should not be empty').fadeIn();
        $('#dob').focus();
        return false;
      }
      else if(pin == '' || !ck_pin.test(pin)){
        $('#postal_code').next('.error_msg').html('Please enter Valid zip code').fadeIn();
        $('#postal_code').focus();
        return false;
      }
      else if(district == '' || !ck_name.test(district)){
        $('#district').next('.error_msg').html('Please enter district').fadeIn();
        $('#district').focus();
        return false;
      }
      else if(city == '' || !ck_name.test(city)){
        $('#city').next('.error_msg').html('Please enter city').fadeIn();
        $('#city').focus();
        return false;
      }
      else if(state == '' || !ck_name.test(state)){
        $('#state').next('.error_msg').html('Please enter state').fadeIn();
        $('#state').focus();
        return false;
      }
      else if(country == '' || !ck_name.test(country)){
        $('#country').next('.error_msg').html('Please enter country').fadeIn();
        $('#country').focus();
        return false;
      }
      else if(address == ''){
        $('#address').next('.error_msg').html('Not Valid, PLease Enter your address').fadeIn();
        $('#address').focus();
        return false;
      }
      else{
       

      }   */
       $('.load_page').load(base_url+'assets/includes/register3.php').hide().fadeIn('slow');
        $('.page-nav').children().eq(2).css("opacity","1").siblings().css("opacity",".20");



    } 
    else if(page == 'p3'){/*
      var qualification = $('#qualification').val();
      var profession = $('#profession').val();
      var industry = $('#industry').val();
      var description = $('#description').val();


      if(qualification == ''){
        $('#qualification').next('.error_msg').html('Please select qualification').fadeIn();
        $('#qualification').focus();
        return false;
      }
      else if(profession == '' || !ck_name.test(profession)){
        $('#profession').next('.error_msg').html('Please select profession').fadeIn();
        $('#profession').focus();
        return false;
      }
      else if(industry == '' || !ck_name.test(industry)){
        $('#industry').next('.error_msg').html('Please select industry').fadeIn();
        $('#industry').focus();
        return false;
      }
      else if(description == '' || !ck_uname.test(description)){
        $('#description').next('.error_msg').html('Please select description').fadeIn();
        $('#description').focus();
        return false;
      }
      else{
     
      
      }*/
         $('.load_page').load(base_url+'assets/includes/register4.php').hide().fadeIn('slow');
        $('.page-nav').children().eq(3).css("opacity","1").siblings().css("opacity",".20");

        setTimeout(function(){
              $('#register').modal('hide');
        },2500);
    }  


  });
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




$(document).delegate('.form-control','keypress',function(e) {
  $(this).next().hide();
});
$('#qualification').delegate('change',function(){
    $(this).next().hide();

})




