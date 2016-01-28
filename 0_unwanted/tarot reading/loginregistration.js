var login = {
    validateLogin:function(){
      var email =    $("#loginEmail").val();
      var password = $("#loginPassword").val();
      var remember = $("#loginRemember").prop('checked');
       if(validation.validateEmpty("loginEmail") === false){
           validation.showMessage("Please enter a valid email id.",'loginEmail');
           return false;
       }else{
           validation.removeMessage('loginEmail');
       }
       /*if(validation.checkEmailFormat(email) ===  false){
           validation.showMessage("Please enter a valid email id.",'loginEmail');
           return false;
       }else{
           validation.removeMessage('loginEmail');
       }*/
       if(validation.validateEmpty("loginPassword") === false){
           validation.showMessage("Please enter your password.",'loginPassword');
           return false;
       }else{
           validation.removeMessage('loginPassword');
       }
       //alert(remember);
       if(remember === true){
          try{
              $.cookie("REM_ID", email,{ expires: 1,path:'/'});
              $.cookie("REM_PASS",password,{ expires: 1,path:'/'});
          }catch(e){}
       }
       login.doLogin(email,password);
    },
    validateExpert:function(){
        var username =    $("#loginUsername").val();
        var password = $("#loginPassword").val();
        var rememberme = $('#rememberme').is(':checked') ? "True" : "False";
        var serverhost = $("#serverhost").val();
         if(validation.validateEmpty("loginUsername") === false){
             validation.showMessage("Please enter username.",'loginUsername');
             return false;
         }else{
             validation.removeMessage('loginUsername');
         }
         if(validation.validateEmpty("loginPassword") === false){
             validation.showMessage("Please enter your password.",'loginPassword');
             return false;
         }else{
             validation.removeMessage('loginPassword');
         }
       
        login.doExpertLogin(username,password,rememberme,serverhost);
    },
    bindEnter:function(formId,btnName){
        $("#"+formId+" input").keypress(function (e) {
            var key = window.event ? e.keyCode : e.which;
            if (key=='13') {
             $('#'+btnName).click();
            }
        });
    },
    doExpertLogin:function(username,password,rememberme,serverhost){
        $.ajax({
            url:'/expert-login?nocache=true',
            type:'post',
            dataType:'json',
            data:"username="+username+"&password="+password+"&remember="+rememberme,
            beforeSend:function(){
              
            },
            success:function(data){
              if(data.message == 'success'){
                if(username == "admin"){
                    location.href = serverhost;
                }else if(data.role == 2){  
                    location.href = serverhost+'/user/expert';
                }else if(data.role == 3){
                    location.href = serverhost+'/user/vendor';
                }else{
                    location.href = serverhost;
                }
              }else{
                validation.showMessage("Invalid Credentials",'errorLogin');  
                return false;
              }
            }
        })
    },
    doLogin:function(email,password){
        $.ajax({
            url:'/login/astro?nocache=true',
            type:'post',
            dataType:'json',
            data:"email="+email+"&password="+password,
            beforeSend:function(){
                $('#signInBtn').addClass('bckgrnd-grey');
                $('#signInBtn').text('Signing In..');
            },
            success:function(data){
              if(data.status == 'success'){
                location.href = location.href;
              }else{
                 try{
                $.cookie("REM_ID", '',{ expires: 1,path:'/'});
                $.cookie("REM_PASS",'',{ expires: 1,path:'/'});
                }catch(e){}  
                validation.showMessage("Please enter a valid email id and password.",'errorLogin');  
                $('#signInBtn').removeClass('bckgrnd-grey');
                $('#signInBtn').text('Sign In');
                return false;
              }
            }
        })
    },
    sendForgetActivation:function(){
        var email = $('#loginPassEmail').val();
        if(validation.validateEmpty("loginPassEmail") == false){
            validation.showMessage('Please enter a valid email id.','loginPassEmail');
            return false;
        }else{
            validation.removeMessage('loginPassEmail');
        }
        if(validation.checkEmailFormat(email) ==  false){
           validation.showMessage("Please enter a valid email id.",'loginPassEmail');
           return false;
        }else{
           validation.removeMessage('loginPassEmail');
        }
        login.sendActivationLink(email);
    },
    sendActivationLink:function(email){
        
        $.ajax({
            url:'/forget-password?nocache=true',
            type:'post',
            dataType:'json',
            data:"email="+email,
            beforeSend:function(){
              
            },
            success:function(data){ 
              if(data.success == true){
                  $('span#setEmail').html(email);
                  $('#forgetPassTpl').attr('style','display:none');
                  $('#activationTpl').attr('style','display:block');
              }else{
                  validation.showMessage("Reset password mail cannot be sent. Please try again later",'loginPassEmail');  
                  return false;
              }
            },
            async:false
        })
    },
    checkPasswords:function(){
        var password = $('#changePassword').val();
        var cpassword = $('#confirmchangePassword').val();
        if(validation.validateEmpty("changePassword") === false){
            validation.showMessage('Please enter a valid password','changePassword');
            return false;
        }else{
            validation.removeMessage('changePassword');
        }
        if(validation.validateEmpty("confirmchangePassword") === false){
            validation.showMessage('Please enter a valid password','confirmchangePassword');
            return false;
        }else{
            validation.removeMessage('confirmchangePassword');
        }
        if(password != cpassword){
            validation.showMessage('Password does not match. Please try again','changePasswords');
            return false;
        }else{
            validation.removeMessage('changePasswords');
        }
        login.changePassword(password,cpassword);
    },
    checkActPasswords:function(email,authcode){
        var password = $('#changePassword').val();
        var cpassword = $('#confirmchangePassword').val();
        if(validation.validateEmpty("changePassword") === false){
            validation.showMessage('Please enter a valid password','changePassword');
            return false;
        }else{
            validation.removeMessage('changePassword');
        }
        if(validation.validateEmpty("confirmchangePassword") === false){
            validation.showMessage('Please enter a valid password','confirmchangePassword');
            return false;
        }else{
            validation.removeMessage('confirmchangePassword');
        }
        if(password != cpassword){
            validation.showMessage('Password does not match. Please try again','changePasswords');
            return false;
        }else{
            validation.removeMessage('changePasswords');
        }
        login.changeActPassword(password,cpassword,email,authcode);
    },
    changeActPassword:function(password,cpassword,email,authcode){
        $('#checkPassBtn').addClass('bckgrnd-grey');
        $('#checkPassBtn').text('Please wait..');
        $.ajax({
            url:'/change-password/'+authcode+'?email='+email+'&nocache=true',
            type:'post',
            dataType:'json',
            data:"password="+password+"&cpassword="+cpassword,
            beforeSend:function(){
                
            },
            success:function(data){ 
              if(data.success == true){
                validation.showMessage("Password changed succesfully",'changePasswords','success');  
                setTimeout(function() {
                     location.href = '/';
                }, 3000);
              }else{
                validation.showMessage("Password does not match. Please try again",'changePasswords');  
                $('#checkPassBtn').removeClass('bckgrnd-grey');
                $('#checkPassBtn').text('Update');
                return false;
              }
            },
            async:false
        })
    },
    changePassword:function(password,cpassword){
        $('#checkPassBtn').addClass('bckgrnd-grey');
        $('#checkPassBtn').text('Please wait..');
        $.ajax({
            url:'/change-password?nocache=true',
            type:'post',
            dataType:'json',
            data:"password="+password+"&cpassword="+cpassword,
            beforeSend:function(){
                
            },
            success:function(data){ 
              if(data.success == true){
                validation.showMessage("Password changed succesfully",'changePasswords','success');  
                setTimeout(function() {
                     location.href = '/';
                }, 3000);
              }else{
                validation.showMessage("Password does not match. Please try again",'changePasswords');  
                $('#checkPassBtn').removeClass('bckgrnd-grey');
                $('#checkPassBtn').text('Update');
                return false;
              }
            },
            async:false
        })
    }
}
var registration = {
    validateRegistration:function(){
        var email =    $("#regEmail").val();
        var name = $("#regName").val();
        var dob = $("#regDob").val();
        var gender = $("#regGender").val();
        if(validation.validateEmpty("regEmail") === false){
           validation.showMessage("Please enter a valid email id.",'regEmail');
           return false;
       }else{
           validation.removeMessage('regEmail');
       }
       if(validation.checkEmailFormat(email) ===  false){
           validation.showMessage("Please enter a valid email id.",'regEmail');
           return false;
       }else{
           validation.removeMessage('regEmail');
       }
       if(validation.validateEmpty("regName") === false){
           validation.showMessage("Please enter your name.",'regName');
           return false;
       }else{
           validation.removeMessage('regName');
       }
       if(validation.validateEmpty("regDob") === false){
           validation.showMessage("Please select your date of birth.",'regDob');
           return false;
       }else{
           validation.removeMessage('regDob');
       }
       if(validation.validateEmpty("regGender") === false){
           validation.showMessage("Please select your gender.",'regGender');
           $("#regGender").parent('div').addClass('txtfieldError');
           return false;
       }else{
           validation.removeMessage('regGender');
       }
       $('#regBtn').removeAttr('onclick');
       registration.doSignUp();
    },
    doSignUp:function(){
        $('#regBtn').addClass('bckgrnd-grey');
        $('#regBtn').text('Please wait..');
        $('#registerUserForm').submit();
    },
    autoFocus:function(){
        
    },
    verifyEmail:function(email,id){
        if(email == undefined || email == ""){
           return;
        }
        
        if(validation.checkEmailFormat(email) ===  false){
           validation.showMessage("Please enter a valid email id.",id);
           return false;
        }else{
            
            $.ajax({
                url:'/login/validation?nocache=true',
                type:'GET',
                dataType:'json',
                data:"email="+email,
                beforeSend:function(){

                },
                success:function(data){
                  //console.log(data);
                  if(data.status == 'new-register'){
                      if(id == 'loginPassEmail'){
                          validation.showMessage("This email id is not registered with us.",id);
                          return false;
                      }else{
                          validation.removeMessage(id);
                          $("#regBtn").attr('onclick','registration.validateRegistration();');
                          $("#regBtn").removeClass('buyNow-btngrey');
                          $("#regBtn").removeAttr('style');
                      }
                  }else{
                       if(id == 'loginPassEmail'){
                           //
                       }else{
                           validation.showMessage("Sorry! This Email is already Registered.",id);
                           $("#regBtn").addClass('buyNow-btngrey');
                           $("#regBtn").attr('style','cursor:default;');
                           $("#regBtn").removeAttr('onclick');
                           return false;
                       }
                  }
                  $("#regBtn").attr('onclick','registration.validateRegistration();');
                }
            })
        }
    }
}