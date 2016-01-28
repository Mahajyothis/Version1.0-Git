var misc = {
    expendCollapseBlock:function(divId,obj){
       if($("#"+divId).is(':visible') === true){
            $("#"+divId).slideUp();
            $(obj).removeClass('collaspeIcon1').addClass('collaspeIcon');
        }else{
            $("#"+divId).slideDown();
            $(obj).removeClass('collaspeIcon').addClass('collaspeIcon1');
        }
    },
    babyNameValidation:function(url,templateName, resultDiv){
     
     var requestUrl = url+'?nocache=true'; 
     validation.removeMessage('nc_dob');
     validation.removeMessage('nc_hour');
     validation.removeMessage('nc_location');
     
     validation.removeMessage('nc_city');
     // validation.removeMessage('nc_country');
     validation.removeMessage('nc_latitude');
     validation.removeMessage('nc_longitude');
     validation.removeMessage('nc_location_conId');
     
     var dobVal = validation.validateEmpty('nc_dob');
     var hourVal = validation.validateEmpty('nc_hour');
     var minVal = validation.validateEmpty('nc_min');
     var ncLocationConId = validation.validateEmpty('nc_location_conId');
     //var secVal = validation.validateEmpty('nc_second');
     
     if($('#nc_city_name').length>0){
        var cityVal = validation.validateEmpty('nc_city_name');
        validation.checkReturnValue(cityVal,"Please enter your city of birth.",'nc_city');
        var cityVal = $("#nc_city_name").val();
        $("#nc_location_city").val(cityVal);
        if(!cityVal){return false;}
     }
     if($('#nc_country_name').length>0){
        var countryVal = validation.validateEmpty('nc_country_name');
        validation.checkReturnValue(countryVal,"Please enter your country of birth.",'nc_country');
        var countryVal = $("#nc_country_name").val();
        var countryTxt = $("#nc_country_name option[value='"+countryVal+"']").text();
        $("#nc_location_countryId").val(countryVal);
        $("#nc_location_country").val(countryTxt);
        $("#nc_location_state").val(countryVal);
     }
     if($('#nc_latitude_name').length>0){
        var latVal = validation.validateEmpty('nc_latitude_name');
        validation.checkReturnValue(latVal,"Please enter your latitude.",'nc_latitude');
        var latVal = $("#nc_latitude_name").val();
        $("#nc_location_latitude").val(latVal);
        if(!latVal){return false;}
     }
     if($('#nc_longitude_name').length>0){
        var longVal = validation.validateEmpty('nc_longitude_name');
        validation.checkReturnValue(longVal,"Please enter your longitude.",'nc_longitude');
        var longVal = $("#nc_longitude_name").val();
        $("#nc_location_longitude").val(longVal);
        if(!longVal){return false;}
     }
     
     var locationVal = validation.validateEmpty('nc_location_latitude');
     
     validation.checkReturnValue(dobVal,"Please select your date of birth.",'nc_dob');
     //validation.checkReturnValue(secVal,"Please select seconds.",'nc_hour');
     validation.checkReturnValue(minVal,"Please select minutes.",'nc_hour');
     validation.checkReturnValue(hourVal,"Please select hours.",'nc_hour');
     validation.checkReturnValue(ncLocationConId,"Please select country.",'nc_location_conId');
     validation.validateSelect(hourVal,'nc_hour');
     validation.validateSelect(minVal,'nc_min');
     validation.validateSelect(ncLocationConId,'nc_location_conId');
     //validation.validateSelect(secVal,'nc_second');
     if(typeof(longVal)=="undefined" || longVal == false){
        validation.checkReturnValue(locationVal,"Please select your place of birth.",'nc_location');
     }
     
     /*if(typeof(cityVal)!="undefined" && typeof(countryVal)!="undefined" && typeof(latVal)!="undefined" && typeof(longVal)!="undefined"){
         var postData = $("#nameCorrection").serialize();
         $.ajax({
                url: "/push-location?nocache=true",
                type: "POST",
                dataType: 'json',
                data: postData,
                complete: function() {
                },
                success: function(response){
                   
                }
            });
     }*/
     misc.enableModifyButton();
     if(dobVal && hourVal && minVal && locationVal){
        $("#spinnerArea").html($("#loaderTemplate").html());
        $("#spinnerArea").show();
        
        var postData = $("#nameCorrection").serialize();
            $.ajax({
                url: requestUrl,
                type: "POST",
                dataType: 'json',
                data: postData,
                complete: function() {
                },
                success: function(response){
                    $("#spinnerArea").html('');
                    if(response.status == "Success"){
                        $("#nc_btn").removeClass("btn-blue").addClass("btn-grey");
                        $("#disableBtn").show();
                        $("#enableBtn").hide();
                        $("#nc_btn").html('Modify');
                        var template = $("#"+templateName).html();
                        babyName = Mustache.render(template, response.data); 
                        $("#"+resultDiv).html(babyName);
                        $("#"+resultDiv).show();
                    }else{
                        $("#"+resultDiv).html('');
                        validation.showMessageTop(response.message,response.status);
                    }
                }
            });
     }
     
     return false;
    },
   enableModifyButton: function(methodName){ 
         
         $( "#nameCorrection input, select" ).focus(function() {
         $("#nc_btn").removeClass("btn-grey").addClass("btn-blue");
         
         $("#enableBtn").show();
         $("#disableBtn").hide();
         
        });
        
   },
   saveKundli:function(fieldId,type){
     validation.removeMessage(fieldId);
     var valKundliName = validation.validateEmpty(fieldId);
     validation.checkReturnValue(valKundliName,"Please enter horoscope name",fieldId);   
     
     if(valKundliName){  
     var postData = $("form").serialize();   
     $.ajax({
             type: "POST",
             dataType: "json",
             data: postData,
             url: '/save-kundli?nocache=true',
             success:function(response){
                validation.showMessageTop(response.message,response.status);
                if(response.status=='success'){
                    $("#btn_btmkundli_name").removeClass().addClass('btn-grey marginRL5');
                    $("#btn_kundli_name").removeClass().addClass('btn-grey marginRL5');
                    $("#btn_btmkundli_name").removeAttr("onclick");
                    $("#btn_kundli_name").removeAttr("onclick");
                }
             }
         });  
     }
     return;
   },
   openSaveForm:function(currentId, targetId){
       $("#"+currentId).hide();
       $("#"+targetId).show();
       
   },
   detailPrediction:function (val){
      var listId = "liPre_"+val;
      var detailId = "preDiv_"+val;
      
      $( '[id^="liPre_"]' ).each(function() {
        
         if(this.id != listId){
             
             var tmpId = this.id.replace("liPre_", "preDiv_"); 
             $("#"+tmpId).hide();
             $("#"+this.id).removeClass();
             
         }
         
        });
     
      $("#"+listId).addClass('selected');
      $("#"+detailId).show();
       
    },
    openReadMore:function(targetDivId, sourceDivId){
     
     $("#"+sourceDivId).hide();
     $("#"+targetDivId).show();
     $("html, body").animate({ scrollTop: 0 }, "slow"); 
     },
     printHtml:function(sourceHtmlDivId, targetDivId){
       
        opener = window.opener.document;
        var htmlVal = $(opener).find("#"+sourceHtmlDivId).html();
        $("#"+targetDivId).html(htmlVal);
        window.print();
    
     },
     sendAjaxFromUrl:function(fullUrl){
         
        var postData = '';
        $.ajax({
                url: fullUrl,
                type: "POST",
                dataType: 'json',
                data: postData,
                complete: function() {
                },
                success: function(response){
                   
                }
            });
    },
     checkExpertUrl:function(fullUrl){
        
        var postData = '';
        $.ajax({
                url: fullUrl,
                type: "POST",
                dataType: 'json',
                data: postData,
                complete: function() {
                },
                success: function(response){
                   
                   if(response.status == 'success'){
                       $("#noLink").hide();
                       $("#expertLink").show();
                   }
                }
            });
    },
    saveContactForm:function(url){
      if(!validation.validateFullName('full_name')){return false;}
      if(!validation.validateEmailId('emailid')){return false;}
      if(!validation.validateMobileNumber('mobile_number')){return false;}
      if(!validation.validateQueryData('query')){return false;}
      $("#loaderAreaMantra").html($("#loaderTemplate").html()); 
      $("#tantra_btn").hide();
        var postData = $("form").serialize();   
        $.ajax({
                type: "POST",
                dataType: "json",
                data: postData,
                url: url,
                success:function(response){
                   
                   if(response.status=='Success'){
                       //validation.showMessageTop(response.message,'success');
                       $("#mantraFormDiv").hide();
                       $("#loaderAreaMantra").html(''); 
                       
                       $("#successMantraFormMsg").text(response.message);
                       $("#successMantraFormDiv").show();
                       //$("#tantra_btn").removeClass().addClass('btn-grey marginRL5');
                      // $("#tantra_btn").removeAttr("onclick");                       
                   }
                }
            });  
     
     return;
    },
    resetContactForm:function(){
        $("#full_name").val('');
        $("#emailid").val('');
        $("#mobile_number").val('');
        $("#query").val('');
        $("#mantraFormDiv").show();
        $("#tantra_btn").show();
         $("#successMantraFormDiv").hide();
    },
    saveUnsubscribe:function(fieldId,SuccessDiv){ 
     validation.removeMessage(fieldId);
     var emailid = $("#"+fieldId).val();
     
     var emailVal = validation.checkEmailFormat(emailid);
     validation.checkReturnValue(emailVal,"Please enter a valid email id.",fieldId);
      
     if(emailVal){
        var postData = $("form").serialize(); 
        var requestUrl = "/save-unsubscribe?nocache=true";
             $.ajax({
                 type: "POST",
                 dataType: "json",
                 data: postData,
                 beforeSend:function() {
                 },
                 url: requestUrl,
                 success:function(data){ 
                     if(data.status == "Success"){
                        $("#txtBox"+fieldId).hide();
                        $("#"+SuccessDiv+"Text").text(data.message); 
                        $("#"+SuccessDiv).show(); 
                        frontend.setModules('astro-bodyContainer1','astroCommon-300');
                     }else{ 
                        if(data.message == "Email already exists."){
                           validation.checkReturnValue(false,"You have already unsubscribed",fieldId); 
                        }else{
                           validation.checkReturnValue(false,data.message,fieldId); 
                        }
                         
                     }
                     $("html, body").animate({ scrollTop: 0 }, "slow"); 
                 }
             });
     }
     return false;
    },
    popArray:new Array(),
    showExpertPop:function(expertId,serviceId){
   // console.log(this.popArray);    
   // console.log($.inArray(serviceId,this.popArray));
      if($.inArray(serviceId,this.popArray) >= 0){
            // console.log($.inArray(serviceId,this.popArray));
          return;
      }  
      if(expertId == undefined || expertId == ''){
           return;
      }   
     
      this.loadExpertData(expertId,serviceId);
       if($.inArray(serviceId,misc.popArray) < 0){
        misc.popArray.push(serviceId);
       }  
    },
    loadExpertData:function(expertId,serviceId){

         $.ajax({
                 type: "POST",
                 dataType: "json",
                 data: "expertId="+expertId+"&serviceId="+serviceId,
                 beforeSend:function() {
                     
                    
                 },
                 url:'/ajax/getExpertData',
                 success:function(data){
                    if($.inArray(serviceId,misc.popArray) < 0){
                        misc.popArray.push(serviceId);
                     } 
                     template = '<div style="height:100px;overflow:hidden;"><img src="{{thumbnail}}" width="100"/></div><div style="margin-left:10px"><span>{{name}}</span><br>{{speciality}} Expert<br>{{#experiance}}{{experiance}} Years of experience<br>{{/experiance}} <div style="width:100px;float:left"><a href="{{url}}" target="_blank" style="padding:0px 2px 0 2px;font-size:12px" class="buyNow-btnBlue">View Profile</a></div></div>';
                     $("#expertPop_"+expertId+"_"+serviceId).html(Mustache.render(template, data));
                   }
             });

    },
    changeLocationCountry:function(locaionfid,countryValue){
       try{ 
        $("#"+locaionfid+"_country").val('');
        $("#"+locaionfid+"_latitude").val('');
        $("#"+locaionfid+"_longitude").val('');
        $("#"+locaionfid+"_city").val('');
        $("#"+locaionfid+"_state").val('');
        
       $("#"+locaionfid).val('');
       
       if(countryValue == ''){
          $("#"+locaionfid).attr('disabled',true); 
           
       }else{
           $("#"+locaionfid).attr('disabled',false);
       } 
       }catch(e){} 

    },
    
    moonSignValidation:function(){
     
     if(!validation.validateDob('nc_dob')){frontend.setModules('astro-bodyContainer1','astroCommon-300');return false;}
     if(!validation.validateTime('nc_hour')){frontend.setModules('astro-bodyContainer1','astroCommon-300');return false;}
     if(!validation.validateMinute('nc_hour')){frontend.setModules('astro-bodyContainer1','astroCommon-300');return false;}
     
     if($('#nc_city_name').length>0){
           if(!validation.validateCustomPob('nc')){frontend.setModules('astro-bodyContainer1','astroCommon-300');return false;} 
        }else{
           if(!validation.validatePob('nc_location')){frontend.setModules('astro-bodyContainer1','astroCommon-300');return false;} 
     }
     
     $("#nc_btn").removeClass("btn-blue").addClass("btn-grey");
     $("#nc_btn").removeAttr('onclick');
     $("#spinnerArea").show("slow");
     $("#spinnerArea").html($("#loaderTemplate").html());
     
     
        var requestUrl = '/calculateMoonSign?nocache=true';
        var postData = $("#calculateMoonSign").serialize();
            $.ajax({
                url: requestUrl,
                type: "POST",
                dataType: 'json',
                data: postData,
                complete: function() {
                },
                success: function(response){
                    
                    var template = $("#moonRashiTemplate").html(); 
                    moonRashiData = Mustache.render(template, response.data);
                    $("#resultArea").html(moonRashiData); 
                    $("#spinnerArea").hide();
                    $("#moonsignForm").hide();
                    $("#resultArea").show();                     
                   
                }
            });
     
     return false;

    },
    openMoonSignForm:function(){
        $("#moonsignForm").show();
        $("select.styled").next('span').remove(); //to remove pre loaded custom select
        //$("select.styled").customSelect('destroy');
        $("select.styled").customSelect();
        
    },
    getUserImage:function(ssoId){
      $.ajax({
                url: '/get-userPic?ssoid='+ssoId,
                type: "POST",
                dataType: 'json',
                data: '',
                complete: function() {
                },
                success: function(response){
                  if(!response.thumb == ''){
                     thumbnail = response.thumb;
                   $("#postLoginUser").html('<img style="border-top-left-radius:3px;border-bottom-left-radius:3px;" src="'+thumbnail+'" width="30"/>');
                   $("#postLoginUserMobile").children('img').attr('src',thumbnail);
                   $("#postLoginUserMobile").children('img').attr('width','40px');
                  }  
                }
    });
    }    ,
   loadExpertInfo:function(expertId){

         $.ajax({
                 type: "POST",
                 dataType: "json",
                 data: "expertId="+expertId+"&type=detail",
                 beforeSend:function() {
                     
                    
                 },
                 url:'/ajax/getExpertData',
                 success:function(response){
                    var template = $("#expertTemplate").html();
                    expertView = Mustache.render(template, response);
                    $("#expertInfo").html(expertView);
                }
             });

    },  

}
var commonJs = {
    
    bindEnterKey:function(fieldId,btnName){
     
        $("#"+fieldId).keypress(function (e) {
            var key = window.event ? e.keyCode : e.which;
            if (key == '13') {
             $('#'+btnName).click();
            }
        });
    },
    bindEnter:function(formId,btnName){
        $("#"+formId+" input").keypress(function (e) {
            var key = window.event ? e.keyCode : e.which;
            if (key=='13') {
             $('#'+btnName).click();
            }
        });
    },
  trackPage:function(url,pageTitle){
   comurl = url;
   url=url.replace('http://www.astrospeak.com/',''); // for live
   url=url.replace('http://ww.astrospeak.com/',''); // for live
   url=url.replace('http://local.astrospeak.com/',''); //for staging 
   url=url.replace('http://dev.astro.com/',''); //for local 
   try{ga('send','pageview',url);
     //  console.log(url);
   }catch(e){ alert(e);}
   COMSCORE.beacon({c1:"2",c2:"6036484",c4:comurl});try{ console.log(comurl); _cc2815.bcp();}catch(e){}
 },
 bindOnBlur:function(){
        
        $('div.validateChange > input, select').on("blur",function() {
           if($("#"+this.id).val()=="" || $("#"+this.id).val()=="undefined"){
               return;
           } 
           commonJs.handleOnBlurCalls(this.id);
        });
    },
    handleOnBlurCalls:function(caseId){
        //alert(caseId);
      switch(caseId) {
        case 'full_name':
        case 'full_name_0':
        case 'full_name_1':
        case 'full_name_2':
        case 'full_name_3':
        case 'full_name_4':
        case 'n_full_name':
           validation.validateFullName(caseId);
        break; 
        case 'full_name_female':
           validation.validateFullName(caseId);
        break; 
        case 'dob_field':
        case 'dob_field_0':
        case 'dob_field_1':
        case 'dob_field_2':
        case 'dob_field_3':
        case 'dob_field_4':
        case 'nc_dob':
        case 'datepicker':
           validation.validateDob(caseId);
        break;
        case 'dob_field_female':
           validation.validateDob(caseId);
        break;
        case 'time':
           validation.validateTime('time');
        break;
        case 'time_minute':
           validation.validateMinute('time');
        break;
        case 'female':
           validation.validateTime('female');
        break;
        case 'female_minute':
           validation.validateMinute('female');
        break;
        case 'nc_hour':
        validation.validateTime('nc_hour');
        break;
        case 'nc_hour_minute':
        validation.validateMinute('nc_hour');
        break;
        case 'location':
        case 'femalelocation':
        case 'nc_location':
           validation.validatePob(caseId);
        break;
        case 'gender':
        case 'gender_0':
        case 'gender_1':
        case 'gender_2':
        case 'gender_3':
        case 'gender_4':
           validation.validateGender(caseId);
        break;
        case 'title_0':
        case 'title_1':
        case 'title_2':
        case 'title_3':
        case 'title_4':
           validation.validateProfileName(caseId);
        break;
        case 'boy_name':
         frontend.validateBoyName(); 
        break; 
        case 'girl_name':
         frontend.validateGirlName();   
        break; 
        case 'nc_city_name':
        case 'nc_country_name':
        case 'nc_latitude_name':
        case 'nc_longitude_name':
        case 'location_city_name':
        case 'location_country_name':
        case 'location_latitude_name':
        case 'location_longitude_name':
            frontend.validateCustomBabyFields(caseId);
        break;
        case 'mobile_number':
            validation.validateMobileNumber(caseId);
        break;
        case 'emailid':
            validation.validateEmailId(caseId);
        break;
        case 'query':
            validation.validateQueryData(caseId);
        break;
        }  
      
    }
}

var calenderPicker = {
    getCalendar:function(fieldId,selectDefaultDate){
       // alert('qqq');
        var year = new Date().getFullYear(); 
        $('#'+fieldId).datepicker({
            yearRange:(year - 70) + ':' + year,
            maxDate: new Date(),
            defaultDate:selectDefaultDate,
            dateFormat: 'dd/mm/yy',
            changeYear:true,
            changeMonth:true,
            onSelect: function(dateText, inst){
                var divId = $('#'+fieldId).parent('div').attr('id');
                $("#"+divId+" > label.placeholder").attr('style','left: 0px; top: 0px; width: 258px; text-align: left; color: #888; text-transform: none; line-height: 16px; overflow: hidden; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-family: "robotoregular"; font-size: 12px; font-style: normal; font-weight: 400; float: none; display: inline; white-space: nowrap; position: absolute; z-index: -1; cursor: text; background-color: transparent;');
                $('#'+fieldId).val(dateText);
                commonJs.handleOnBlurCalls(fieldId);
            }
        });
    },
    
    bindTimePicker: function(fieldId,dateFormat){
  
    $('#'+fieldId).timepicker({
        changeYear: true,
        changeMonth:true,
        addSliderAccess: true,
        sliderAccessArgs: { touchonly:false },
        timeFormat: dateFormat});
 
    },
    dateCalenderPanchang:function(fieldId,selectDefaultDate){
        var year = new Date().getFullYear();  
        $('#'+fieldId).datepicker({
            yearRange:(year - 1) + ':' + (year+1),
            defaultDate:selectDefaultDate,
            dateFormat: 'dd/mm/yy',
            changeYear:true,
            changeMonth:true,
            onSelect: function(dateText, inst){
                var divId = $('#'+fieldId).parent('div').attr('id');
                $("#"+divId+" > label.placeholder").attr('style','left: 0px; top: 0px; width: 258px; text-align: left; color: #888; text-transform: none; line-height: 16px; overflow: hidden; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-family: "robotoregular"; font-size: 12px; font-style: normal; font-weight: 400; float: none; display: inline; white-space: nowrap; position: absolute; z-index: -1; cursor: text; background-color: transparent;');
                $('#'+fieldId).val(dateText);
                panchang.getPanchangData(fieldId);
            }
        });
    }
}

var calendarEvent = {
    loadEvents:function(timestamp){
        $.ajax({
             type: "POST",
             dataType: "json",
             data: 'timestamp='+timestamp+"&fromdetail=1",
             beforeSend:function() {
                   $("#eventsBlock").html($("#loaderTemp").html());
             },
             url: '/ajax/get-events?nocache=true',
             success:function(data){
                var template = $("#eventBlockTemp").html(); 
                eventsData = Mustache.render(template,data);
                $("#eventsBlock").html(eventsData);
             }
         });
        
    }
}
var basicImageSlider = {
    
    loadImageSlider:function(){
        
        $('.sp').first().addClass('active');
        $('.sp').hide();    
        $('.active').show();

        $('#button-next').click(function(){

        $('.active').removeClass('active').addClass('oldActive');    
        
            if ( $('.oldActive').is(':last-child')) {
            $('.sp').first().addClass('active');
            }else{
            
            $('.oldActive').next().addClass('active');
            }
        $('.oldActive').removeClass('oldActive');
        $('.sp').fadeOut();
        $('.active').fadeIn();


        });
    
        $('#button-previous').click(function(){
            $('.active').removeClass('active').addClass('oldActive');    
                   if ( $('.oldActive').is(':first-child')) {
                $('.sp').last().addClass('active');
                }
                   else{
            $('.oldActive').prev().addClass('active');
                   }
            $('.oldActive').removeClass('oldActive');
            $('.sp').fadeOut();
            $('.active').fadeIn();
            });

        
    }
}

var loveMeter = {
    
    calculateLoveCompatibility:function(){
      
      validation.removeMessage('boy_name');
      validation.removeMessage('girl_name');
     
      var valBoyName = validation.validateName('boy_name');
      var valGirlName = validation.validateName('girl_name');
      validation.checkReturnValue(valGirlName,"Please specify partner name",'girl_name');
      validation.checkReturnValue(valBoyName,"Please specify your name",'boy_name');
      
      if(valBoyName && valGirlName){ 
            $("#lovemeterreset").hide();
            $("#lovemetertext").html($("#loaderTemplate").html());
            $("#lovemetertext").show();
            $("#resetLoveMeter").show();
            $("#resetLoveMeter").removeClass().addClass('btn-blue marginRL5');
            $("#resetLoveMeter").attr('onclick', 'loveMeter.resetLoveMeterForm();');
            
            objLove = new lovemeter();
            objLove.boy_name = $("#boy_name").val();
            objLove.girl_name = $("#girl_name").val();
            objLove.loadLoveCalculation();      
      }
      return false;
      
    },
    resetLoveMeterForm: function(){
        $("#lovemeterbtn").removeClass().addClass('btn-blue marginRL5');
        $("#lovemeterbtn").attr('onclick', 'loveMeter.calculateLoveCompatibility();');
        $('input[name="boy_name"]').val('');
        $('input[name="girl_name"]').val('');
        $('#lovemetertext').html('');
        $('#lovemetertext').hide();
        $('#lovemeterreset').show();  
    },
    calculateLovePercentage:function(){
        
      validation.removeMessage('your_name');
      validation.removeMessage('partner_name');
     
      var valYourName = validation.validateName('your_name');
      var valPartnerName = validation.validateName('partner_name');
      validation.checkReturnValue(valPartnerName ,"Please enter your partner's name",'partner_name');
      validation.checkReturnValue(valYourName ,"Please enter your name",'your_name');
      
      if(valYourName && valPartnerName){
          var reloadUrl = 'http://' + window.location.hostname + window.location.pathname +"?your_name="+$("#your_name").val()+"&partner_name="+$("#partner_name").val();
          window.location.href = reloadUrl;
      }
    },
    showLoveMeterResult:function(){
        
        $("#valuesImg").attr("src", "/assets/images/frontend/lovemeter/meter.gif");
        setTimeout(function() {
            $("#valuesImg").attr("src", "/assets/images/frontend/lovemeter/meter1.png");
            $("#valueText").text('Analysed Core values');
            $("#valuesImg2").attr("src", "/assets/images/frontend/lovemeter/meter.gif");
            $("#valuesImgTickBlk").hide();
            $("#valuesImgTick").show();
        }, 1000);
        setTimeout(function() {
            $("#valuesImg2").attr("src", "/assets/images/frontend/lovemeter/meter1.png");
            $("#valueText2").text('Analysed Common qualities');
            $("#valuesImg3").attr("src", "/assets/images/frontend/lovemeter/meter.gif");
            $("#valuesImgTick2Blk").hide();
            $("#valuesImg2Tick").show();
        }, 2000);
        setTimeout(function() {
            $("#valuesImg3").attr("src", "/assets/images/frontend/lovemeter/meter1.png");
            $("#valueText3").text('Analysed Common goals');
            $("#valuesImg4").attr("src", "/assets/images/frontend/lovemeter/meter.gif");
            $("#valuesImgTick3Blk").hide();
            $("#valuesImg3Tick").show();
        }, 3000);
        setTimeout(function() {
            $("#valuesImg4").attr("src", "/assets/images/frontend/lovemeter/meter1.png");
            $("#valueText4").text('Analysed Attachment style');
            $("#valuesImg5").attr("src", "/assets/images/frontend/lovemeter/meter.gif");
            $("#valuesImgTick4Blk").hide();
            $("#valuesImg4Tick").show();
        }, 4000);
        
        
        setTimeout(function() {
            $("#valuesImg5").attr("src", "/assets/images/frontend/lovemeter/meter1.png");
            $("#valueText5").text('Analysed Intimacy quotient');
            $("#valuesImgTick5Blk").hide();
            $("#valuesImg5Tick").show();
            $("#resultLoveMeter").show();
            swinger.scrollFocusOffers('resultLoveMeter');
            $("#calculateAgainBtn").show();
        }, 5000);
       
        
    }
    
}
var numerolgyPrediction = {
    
    viewNumberPrediction:function(typeValue){
        
        var typeClicked = "liPre_" + typeValue;
       
        $( '[id^="liPre_"]' ).each(function() {
        
         if(this.id != typeClicked){
              
              $("#"+this.id).removeClass();
              var tmpId = this.id.replace("liPre_", "number_prediction_");
              $("#"+tmpId).hide();
              
         }
         $("#"+typeClicked).addClass('selected');
         $("#number_prediction_"+typeValue).show();
        });
        
    }
    
}

var persistanceLogin = {
    indiatimesSso:function(env){
        if($.cookie("itimes-login-id") == undefined){
            astrologinid = null;
        }else{
            astrologinid = $.cookie("itimes-login-id"); 
        }
        if($.cookie("astro-logout") == undefined){
           astrologout = null;
        }else{
           astrologout = $.cookie("astro-logout"); 
        }
        if (astrologout != null || astrologinid != null){
            return false;
        }
        if(env == 'development'){
          var crossDomainUrl = "http://jssostg.indiatimes.com/sso/crossdomain/getTicket?callback=?&version=v1";
        }else{
          var crossDomainUrl = "http://jsso.indiatimes.com/sso/crossdomain/getTicket?callback=?&version=v1"; 
        }
        var data = {};
        $.getJSON(crossDomainUrl, data).done(function(response) {
             if (response.status == "true") {
                var reqUrl = '/sso/login?ticketId=' + response.ticketId+"&crossDomainAuto=1";
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    data: {},
                    url: reqUrl,
                    async: false,
                    beforeSend: function() {
                        popup.init('/assets/template/frontend/loginmessage.tpl','pp_main');
                    },
                    success: function(response) {
                     setTimeout(function(){popup.onClose()}, 500); 
                     try{
                         if(response.status == 'success'){
                             location.href = location.href;
                         }
                     }catch(e){}  
                    }
                });
                 setTimeout(function(){popup.onClose()}, 500);
            }
        });
    }
      
}
var panchang = {
    getPanchangMonth:function(timeStamp,monthTxt){
         $("#headingText").text(monthTxt+" Panchang");
         
         $("#panchangBlock").html($("#menuloader").html());
         $.ajax({
                url: "/panchang-month/"+timeStamp+"?nocache=true",
                type: "GET",
                dataType: 'json',
                complete: function() {
                },
                success: function(response){
                    
                        if(response.status == 'Success'){
                            var template = $("#panchangTemplate").html(); 
                            panchangData = Mustache.render(template, response.data);
                            $("#panchangBlock").html(panchangData);
                        }else{
                            
                            $("#panchangBlock").html($("#noResultPanchangTemplate").html());
                            $("#noResultMsg1").text(monthTxt+" Panchang");
                            $("#noResultMsg2").text(monthTxt+" Panchang");
                        }
                }
            });
    },
    getPanchangData:function(fieldId){
        
        var dateTxt = $('#'+fieldId).val(); 
        dateTxt=dateTxt.split("/");
        var newDate=dateTxt[1]+"/"+dateTxt[0]+"/"+dateTxt[2];
        var dateTimeStamp = new Date(newDate).getTime();
        dateTimeStamp = Math.floor(dateTimeStamp/1000);
        $("#panchangDataDiv").html($("#loaderSpin").html()); 
        $.ajax({
                url: "/panchang-data/"+dateTimeStamp+"?nocache=true",
                type: "GET",
                dataType: 'json',
                complete: function() {
                },
                success: function(response){
                    
                  var selectedDate = $('#'+fieldId).val();
                  $('#'+fieldId).datepicker('option','dateFormat','d M yy');
                  $("#panchangHeadingTxt").text($('#'+fieldId).val()+" Panchang");
                  $('#'+fieldId).datepicker('option','dateFormat','dd/mm/yy');
                  $('#'+fieldId).val(selectedDate); 
                  
                        if(response.status == 'Success'){
                            var template = $("#panchangTileTemplate").html();
                            panchangData = Mustache.render(template, response.data);
                            $("#panchangDataDiv").html(panchangData);
                            
                        }else{
                            
                            $("#panchangDataDiv").html('<div class="fullDIV borderBTTM"><div class="w280-2col"><div class="formErrorMsg">We are updating Panchang for '+$("#panchangHeadingTxt").text()+'. Please try later.</div></div></div>');
                        }
                  
                  frontend.setModules('astro-bodyContainer1','astroCommon-300');
                  swinger.scrollFocus("panchangHomeBox");
                }
            });
        
       
      
    }
}
