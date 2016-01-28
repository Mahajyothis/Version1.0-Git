var validation = {
  validateEmpty:function(id){
   var value = $.trim($("#"+id).val()); 
   if($.trim(value) == ''){ 
      return false;
    }else{ 
      return true;
    }
  },
  validateLimit:function(arr,minLimit,maxLimit){
    var len=arr.length;
    if(len < minLimit){
      return false;
    }
    if(len > maxLimit){
      return false;
    }
    return true;
  },
 checkEmailFormat: function(email) {
        email = $.trim(email);
        var regX = /^([a-zA-Z])([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]))+(\.)([a-zA-Z0-9\.]{2,10})$/;
        var regSpecial = /([a-zA-Z0-9])(\@)([a-zA-Z0-9])/g;
        if (!regX.test(email)) {
            return false;
        }
        if (!regSpecial.test(email)) {
            return false;
        }
        return true;
    },
   showMessage:function(message,id,type){
       switch(type){  
       case  'success':
            $("#msg"+id).addClass("formSuccessMsg").removeClass('formErrorMsg');
            $('#msg'+id).text(message);
       break;      
       case  'warning':
           
       break; 
       default:
           //alert($("#"+id).parent('div')); 
           $("#"+id).addClass("txtfieldError");
           $("#msg"+id).addClass("formErrorMsg").removeClass('formSuccessMsg');
           $('#msg'+id).text(message);
       }     
       
       
   },
   removeMessage:function(id){
      $("#"+id).removeClass("txtfieldError");;
      $('#msg'+id).text('');
   },
   validateName:function(id){
       /*
       *  any character of: 'a' to 'z', 'A' to 'Z',
       *  ' ' (0 or more times (matching the most
       *  amount possible))
       *  length minimum 3
       */
      var name = $('#'+id).val(); 
      var validCharactersRegex = /^[a-zA-Z ]*$/;
      if(validation.validateEmpty(id) && validCharactersRegex.test(name) && validation.checkLength(name,3)){
        return true;
      }
      return false;
        
   },
   checkLength:function(val,len){
      
      if(val.length >= len){
          return true;
      }
      return false;
       
   },
   validateSelect:function(res, id){
     if(res == false){
         $("#"+id).parent('div').addClass('txtfieldError');
     }else{
         $("#"+id).parent('div').removeClass('txtfieldError');
     }
   },
   checkReturnValue: function(value,message,id){
       if(!value){
           validation.showMessage(message,id,'failed'); 
       }else{
         //  validation.removeMessage(id);
       }
   },
   validatePlaceOfBirth: function(fieldId){
       
       if($("#"+fieldId).val().length>0 && $("#"+fieldId+"_city").val().length>0 && $("#"+fieldId+"_latitude").val().length>0 && $("#"+fieldId+"_longitude").val().length>0){
           return true;
       }
      return false; 
   },
   showMessageTop:function(message,type){ 
       switch(type){  
       case  'success':
           $("#messageType").removeClass().addClass("successMsg");;
           $("#crossType").removeClass().addClass("successCls");
           $("#iconType").removeClass().addClass("successIcon");
           $('#messageText').text(message);
       break;      
       case  'warning':
           $("#messageType").removeClass().addClass("warningMsg");;
           $("#crossType").removeClass().addClass("warningCls");
           $("#iconType").removeClass().addClass("warningIcon");
           $('#messageText').text(message);
          break; 
       default:
           $("#messageType").removeClass().addClass("errorMsg");;
           $("#crossType").removeClass().addClass("errorCls");
           $("#iconType").removeClass().addClass("errorIcon");
           $('#messageText').text(message);
       }     
       
       var CenterDivID = $('#confirmPop');
       CenterDivID.css("top", "0px");
       CenterDivID.css("left", Math.max(0, (($(window).width() - CenterDivID.outerWidth()) / 2) + $(window).scrollLeft()) + "px");
       CenterDivID.slideDown('slow');
       
       setTimeout("$('#confirmPop').hide('slow');", 10000);
       
   },
   bindOnChange:function(){
        $(":input").change(function() {
            validation.removeMessage(this.id);
        });
        $("select").change(function() {
            validation.removeMessage(this.id);
            $("#"+this.id).parent('div').removeClass('txtfieldError');
        });
        
    },
    validateFullName:function(id){
         validation.removeMessage(id);
         var valName = validation.validateName(id);
         validation.checkReturnValue(valName,"Please enter full name.",id);
         return valName;
    },
    validateProfileName:function(id){
         validation.removeMessage(id);
         var valName = validation.validateName(id);
         validation.checkReturnValue(valName,"Please specify your profile name.",id);
         return valName;
    },
    validateDob:function(id){
        validation.removeMessage(id);
        var valDobField = validation.validateEmpty(id);
        validation.checkReturnValue(valDobField,"Please select your date of birth.",id);
        return valDobField;
    },
    validateTime:function(id){
        validation.removeMessage(id);
        var valTimeHour = validation.validateEmpty(id);
        validation.checkReturnValue(valTimeHour,"Please select hours.",id);
        validation.validateSelect(valTimeHour,id);
        return (valTimeHour);
    },
    validateMinute:function(id){
        validation.removeMessage(id);
        var valTimeMin = validation.validateEmpty(id+'_minute');
        validation.checkReturnValue(valTimeMin,"Please select minutes.",id);
        validation.validateSelect(valTimeMin,id+'_minute');
        return (valTimeMin);
    },
    validateCountry:function(id){
        validation.removeMessage(id);
        var valCountry = validation.validateEmpty(id);
        validation.checkReturnValue(valCountry,"Please select country.",id);
        validation.validateSelect(valCountry,id);
        return (valCountry);
    },
    validatePob:function(id){
        validation.removeMessage(id);
        var valLocation = validation.validatePlaceOfBirth(id);
        validation.checkReturnValue(valLocation,"Please select place of birth.",id);
        return valLocation;
    },
    validateCustomPob:function(type){
        validation.removeMessage(type+'_city_name');
        validation.removeMessage(type+'_country_name');
        validation.removeMessage(type+'_latitude_name');
        validation.removeMessage(type+'_longitude_name');
        if($('#'+type+'_city_name').length>0){
            var cityVal = validation.validateEmpty(type+'_city_name');
            validation.checkReturnValue(cityVal,"Please enter your city of birth.",type+'_city_name');
            if(!cityVal){
                return false;
            }
            var cityVal = $("#"+type+"_city_name").val();
            $("#"+type+"_city").val(cityVal);
         }
         if($('#'+type+'_country_name').length>0){
            var countryVal = validation.validateEmpty(type+'_country_name');
            validation.checkReturnValue(countryVal,"Please enter your country of birth.",type+'_country_name');
            validation.validateSelect(countryVal,type+'_country_name');
            if(!countryVal){
                return false;
            }
            var countryVal = $("#"+type+"_country_name").val();
            var countryTxt = $("#"+type+"_country_name option[value='"+countryVal+"']").text();
            
            $("#"+type+"_countryId").val(countryVal);
            $("#"+type+"_country").val(countryTxt);
            $("#"+type+"_state").val(countryVal);
         }
         if($('#'+type+'_latitude_name').length>0){
            var latVal = validation.validateEmpty(type+'_latitude_name');
            validation.checkReturnValue(latVal,"Please enter your latitude.",type+'_latitude_name');
            if(!latVal){
                return false;
            }
            var latVal = $("#"+type+"_latitude_name").val();
            $("#"+type+"_latitude").val(latVal);
         }
         if($('#'+type+'_longitude_name').length>0){
            var longVal = validation.validateEmpty(type+'_longitude_name');
            validation.checkReturnValue(longVal,"Please enter your longitude.",type+'_longitude_name');
            if(!longVal){
                return false;
            }
            var longVal = $("#"+type+"_longitude_name").val();
            $("#"+type+"_longitude").val(longVal);
         }
         return true;
    },
    validateGender:function(id){
        validation.removeMessage(id);
        var valGender = validation.validateEmpty(id);
        validation.checkReturnValue(valGender,"Please select your gender.",id);
        validation.validateSelect(valGender,id);
        return valGender;
    },  
    validateSunSign:function(id){
        validation.removeMessage(id);
        var valSunSign = validation.validateEmpty(id);
        validation.validateSelect(valSunSign,id);
        validation.checkReturnValue(valSunSign,"Please select sun sign.",id);
        return valSunSign;
    }, 
    validateEmailId:function(id){
         validation.removeMessage(id);
         var valEmail = validation.checkEmailFormat($("#"+id).val());
         validation.checkReturnValue(valEmail,"Please enter a valid email id.",id);
        
         return valEmail;
    },
    validateMobileNumber:function(id){
         validation.removeMessage(id);
         var valMobile = validation.validateMobile(id);
         validation.checkReturnValue(valMobile,"Please enter a valid mobile number.",id);
         return valMobile;
    },
    validateMobile:function(id){
            var mobile = $("#"+id).val();
            if(validation.validateEmpty(id) === false){
                return false;
            }else if(!mobile.match(/^[\d\-+]+$/)){
                return false;
            }else if(mobile.length < 5 || mobile.length > 20){
                return false;
            }
            return true;
   },
   validateQueryData:function(id){
         validation.removeMessage(id);
         var valQuery = validation.validateEmpty(id);
         validation.checkReturnValue(valQuery,"Please enter your query.",id);
         return valQuery;
    }
}