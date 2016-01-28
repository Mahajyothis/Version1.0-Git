var frontend ={
 setModules:function(container,module_class){
       var $container = $('#'+container);
       $container.masonry({
            columnWidth: 320,
            transitionDuration: 0,
            itemSelector: '.'+module_class,
            isAnimated: false
        });
      },
  lazyimages:function(){
        $("img.lazy").lazy({
        bind:"event",    
        beforeLoad: function(element) {
           element.attr("src","/assets/images/frontend/lazy-image.jpg"); 
           element.removeClass("lazy"); 
        },
        onLoad: function(element) {
          element.addClass("loading"); 
        },
        afterLoad: function(element) { 
            //console.log(JSON.stringify(element));
            element.removeClass("loading").addClass("loaded"); 
        },
        onError: function(element) {
          
           //console.log("image loading error: " + element.attr("src"));
        }
    });
  },
  toggleCheckbox:function(id){
      if($("#"+id).is(':checked')){
          $("#"+id).removeAttr('checked');
      }else{
         $("#"+id).prop('checked',true);
      }
  },
  toggleKundli:function(id){
      try{
      swinger.scrollFocus('kundliHomeBox');
      }catch(e){}
      if(id == "togGunMilan"){
          $("#togJanamPatri").removeClass('selected');
          $("#togGunMilan").addClass('selected');
          $("#GunMilanContent").attr('style','display:block');
          $("#JanamPatriContent").attr('style','display:none');
      }else{
          $("#togGunMilan").removeClass('selected');
          $("#togJanamPatri").addClass('selected');
          $("#GunMilanContent").attr('style','display:none');
          $("#JanamPatriContent").attr('style','display:block');
      }
      try{
      frontend.setModules('astro-bodyContainer1','astroCommon-300'); } catch(e){}
  },
  bindCrousal:function(){
       $(function() {
        var jcarousel = $('.jcarousel');
          jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var width = jcarousel.innerWidth();
                if (width >= 600) {
                    width = width / 3;
                } else if (width >= 350) {
                    width = width / 2;
                }
                jcarousel.jcarousel('items').css('width', width + 'px');
            })
            .jcarousel({
                wrap: 'circular',
                animation: {
                    duration: 800,
                    specialEasing: {
                        width: "linear",
                        height: "easeIn"
                    },
                    complete: function() {
                    }
                }
            })
    .jcarouselAutoscroll()
    .on('mouseover',function(e){
        $(this).jcarouselAutoscroll('stop');
    }).on('mouseout',function(e){
        $(this).jcarouselAutoscroll('start');
    });

        $('.jcarousel-control-prev')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .jcarouselControl({
                target: '+=1'
            });

        /*$('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });*/
    });
  },
  setLoginRegistration:function(){
      $('#loginRegistrationDiv').mouseenter(function() {
         // alert("dfsfasd");
        divid = 1;
        hoverTimeout = setTimeout(function() {
            if (divid == 1) {
              //$('#signIn-pop').show();  
              $('#signIn-pop').slideDown('fast');
            }
        }, 300);
      });
      $('#loginRegistrationDiv').mouseleave(function(){
          divid = 0;
          $('#signIn-pop').slideUp('fast');
      });
      
  },toggleLoginResistration:function(open){
     if(open ==  undefined){
       open = 'registration';  
     }
     if(open == 'registration'){
        $('#signInDiv').hide();
        $('#signUpDiv').show();
     }else{
         
        $('#signInDiv').show();
        $('#signUpDiv').hide();
     } 
  },
  getLoveMeterData:function(){
      
      
      if(!frontend.validateBoyName()){frontend.setModules('astro-bodyContainer1','astroCommon-300');try{ $.placeholder.shim();}catch(e){}return false;}
      if(!frontend.validateGirlName()){frontend.setModules('astro-bodyContainer1','astroCommon-300');try{ $.placeholder.shim();}catch(e){}return false;}
      
      var reloadUrl = 'http://' + window.location.hostname + "/love-meter?your_name="+$("#boy_name").val()+"&partner_name="+$("#girl_name").val()+"&ref=homelovemeter";
      window.location.href = reloadUrl;
      return;
      
            objLove = new lovemeter();
            objLove.boy_name = $("#boy_name").val();
            objLove.girl_name = $("#girl_name").val();
            objLove.loadLoveCalculation();  
           
            $("#resetlovebtn").attr('onclick', "frontend.resetLoveMeterForm();");
            $("#resetlovebtn").removeClass('btn-grey');
            $("#resetlovebtn").addClass('btn-blue');
      
      frontend.setModules('astro-bodyContainer1','astroCommon-300');
      return false;
      
  },
  validateBoyName:function(){
      validation.removeMessage('boy_name');
      var returnVal = messages.errorMessageName('boy_name'); 
      return returnVal;
  },
  validateGirlName:function(){
      validation.removeMessage('girl_name');
      var returnVal = messages.errorMessagePartnerName('girl_name'); 
      return returnVal;
  },
  resetLoveMeterForm: function(){
       
        $("#lovemeterbtn").removeClass().addClass('btn-blue marginRL5');
        $("#lovemeterbtn").attr('onclick', 'frontend.getLoveMeterData();');
        $('input[name="boy_name"]').val('');
        $('input[name="girl_name"]').val('');
        $('#lovemetertext').html('');
        $('#lovemeterreset').show();
        
        $("#resetlovebtn").removeAttr("onclick");
        $("#resetlovebtn").removeClass('btn-blue');
        $("#resetlovebtn").addClass('btn-grey');
        
  },
  onChangeLoveMeterForm: function(){
       
        $("#lovemeterbtn").removeClass().addClass('btn-blue marginRL5');
        $("#lovemeterbtn").attr('onclick', 'frontend.getLoveMeterData();');
        
  },
  setPrediction:function(){
      objprehoroscope =  new prediction();
      var types = $('#horoscopetop li');
      $.each(types,function(key,val){
          var ptype = val.firstChild.id;
          if($('#'+ptype).hasClass('selected')){
             objprehoroscope.type = ptype;
             //$('#'+ptype).addClass('active');
          }else{
             //$('#'+ptype).addClass('inactive');
          }
      });
      objprehoroscope.category = $('#astrology').text();
      objprehoroscope.title = objprehoroscope.getTitleByCurrDate();
      /*
      if(objprehoroscope.title == undefined){ //to be checked
          objprehoroscope.title = "Aries";
      }*/
      objprehoroscope.loadPrediction();
      
      /*objprehoroscope1 =  new prediction();
      objprehoroscope1.category = "numerology";
      objprehoroscope1.title = "1";
      objprehoroscope1.type = "daily";
      
      objprehoroscope1.loadPrediction();*/
  },
  setSelectedPrediction:function(title,baseurl){
      swinger.scrollFocus("horoscopeAstroBox");
      //$('#predictiontext').attr('style','background: lavender;');
      //setTimeout(function(){
          //$('#predictiontext').removeAttr('style');
      //},2500);
      objPrediction = new prediction();
      objPrediction.title = title;
      objPrediction.type = $('a.active').text();
      objPrediction.category = $('a.horoTAB-selected').text().toLowerCase();
      objPrediction.setOnePrediction();
  },
  setCurrentType:function(type){
      swinger.scrollFocus("horoscopeAstroBox");
      if(type == "daily"){
            $('a#'+type).addClass('selected active');
            $('a#weekly').removeClass('selected active');
            $('a#monthly').removeClass('selected active');
            $('a#yearly').removeClass('selected active');
      }
      if(type == "weekly"){
            $('a#'+type).addClass('selected active');
            $('a#daily').removeClass('selected active');
            $('a#monthly').removeClass('selected active');
            $('a#yearly').removeClass('selected active');
      }
      if(type == "monthly"){
            $('a#'+type).addClass('selected active');
            $('a#weekly').removeClass('selected active');
            $('a#daily').removeClass('selected active');
            $('a#yearly').removeClass('selected active');
      }
      if(type == "yearly"){
            $('a#'+type).addClass('selected active');
            $('a#weekly').removeClass('selected active');
            $('a#monthly').removeClass('selected active');
            $('a#daily').removeClass('selected active');
      }
            
      objPrediction = new prediction();
      objPrediction.title = $("#horo_title").text().toLowerCase();
      objPrediction.type = type;
      objPrediction.category = $('a.horoTAB-selected').text().toLowerCase();
      objPrediction.setOnePrediction();
      
  },
  getYourNumber:function(){
      
      if(!validation.validateFullName('n_full_name')){
                    try{ $.placeholder.shim();}catch(e){}
                    return false;
                }
      if(!validation.validateDob('datepicker')){try{ $.placeholder.shim();}catch(e){}return false;}
      var full_name = $("#n_full_name").val();
      var dob = $("#datepicker").val();
      
            objNumber = new calculateNumber();
            objNumber.full_name = full_name;
            objNumber.dob = dob;
            objNumber.loadNumberCalculation();
      
       frontend.setModules('astro-bodyContainer1','astroCommon-300');
       return false;
      
  },
  changePredictionCategory:function(category){
      $('#tarot').removeClass();
      $('#astrology').removeClass();
      
      if(category == "astrology"){
          $('#astrology').addClass('horoTAB-selected');
          $('#tarot').addClass('horoTAB');
          
      }else if(category == "tarot"){
          $('#tarot').addClass('horoTAB-selected');
          $('#astrology').addClass('horoTAB');
      }
      $("div.horoscopeBlock").children('a').each(function(i,obj){
             if($(obj).attr("title") != undefined){ 
              title = $(obj).attr("title").toLowerCase();
              if(category == 'astrology'){
                 url = "/sun-sign/"+title+"/daily" ;
              }else{
                 url = "/tarot/sun-sign/"+title+"/daily" ;
                 
              }
              $(obj).attr('href',url); 
             }  
      });
      /*objPrediction = new prediction();
      objPrediction.title = $("#horo_title").text().toLowerCase();
      objPrediction.type = $('a.active').text();
      objPrediction.category = category;
      objPrediction.setOnePrediction();*/
  },
 changeNumerologyType:function(type){
     swinger.scrollFocus("numeroHomeBox");
     $('#numero_daily').removeClass();
     $('#numero_weekly').removeClass();
     $('#numero_monthly').removeClass();
     $('#numero_yearly').removeClass();
     $('#numero_'+type).addClass('typeactive selected'); 
     var number = 'default'; 
     for( var i = 1; i < 10; i++ ){ 
     var divId = 'number'+i;
     var divClass = 'number'+i+'-active';
    
     if ( $("#"+divId).hasClass(divClass) ) {
            number = i;
            }
     }
     frontend.setNumerologyPrediction(number);
     
 },
 setNumerologyPrediction:function(number){
      for( var i = 1; i < 10; i++ ){ //alert('#number'+i);
            $('#number'+i).removeClass();
            $('#number'+i).addClass('number'+i);
        }
     
     if(number!=="default"){
         swinger.scrollFocus("numeroHomeBox");
     }
     var curType = $('a.typeactive').text();
     var postData = 'type='+curType+'&number='+number;
     var requestUrl = "/get-numerology-prediction?nocache=true";
         $.ajax({
             type: "POST",
             dataType: "json",
             data: postData,
             beforeSend:function() {
                 $("#numerologyContent").html($("#loaderTemplate").html());
             },
             url: requestUrl,
             success:function(data){ 
                 if(data.status==='Success'){ 
                        $('#number'+data.data.title).removeClass('number'+data.data.title);
                        $('#number'+data.data.title).addClass('number'+data.data.title+'-active');
                        var template = $("#numerologyTemplate").html(); 
                        numerData = Mustache.render(template, data.data);
                        $("#numerologyContent").html(numerData);
                        frontend.setModules('astro-bodyContainer1','astroCommon-300');
                 }
                  
             }
         });
 },
 vastuTips:function(id){
     swinger.scrollFocus("vastuHomeBox");
     $('#vastutip').removeClass();
     $('#fengshuitip').removeClass();
     $('#colortip').removeClass();
     $('#vastutip_msg').hide();
     $('#fengshuitip_msg').hide();
     $('#colortip_msg').hide();
     
     $('#'+id).addClass('selected');
     $('#'+id+'_msg').show();
     frontend.setModules('astro-bodyContainer1','astroCommon-300');
 },
 tipOfTheDay:function(id){
     swinger.scrollFocus("vastuHomeBox");
     $('#vastutip').removeClass().addClass('tod-liIMG');
     $('#fengshuitip').removeClass().addClass('tod-liIMG');
     $('#colortip').removeClass().addClass('tod-liIMG');
     
     $('#'+id).removeClass().addClass('tod-liIMG-active');
     if(id == "vastutip"){
         $("#vastuData").show();
         $("#fenshuiData").hide();
         $("#colorData").hide();
     }else if(id == "fengshuitip"){
         $("#fenshuiData").show();
         $("#vastuData").hide();
         $("#colorData").hide();
     }else if(id == "colortip"){
         $("#colorData").show();
         $("#fenshuiData").hide();
         $("#vastuData").hide();
     }
     frontend.setModules('astro-bodyContainer1','astroCommon-300');
 },
 bindUploader:function(id){
         
         $('#' + id).fileupload({
         dataType: 'json',
         formData: {width: '75'},
         add: function(e, data) {    
            frontend.vaidatephoto(data);
         },
         progressall: function(e, data) { 
               /* var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .bar').css(
                        'width',
                        progress + '%'
                        );*/
            },
            maxFileSize: 5,
            previewSourceFileTypes: /^image\/(gif|jpeg|png)$/,
            loadImageFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            singleFileUploads: true,
            sequentialUploads: true,
            crossDomain: true,
            done: function(e, data) { 
                var obj = data.result;
                if (obj.status == 'Success') {
                    frontend.addPhoto( obj.thumbnail);
               }
            }
        });
     
 },
 addPhoto:function(thumbnail){
   $("#uploadedImage").attr('src',thumbnail);
 },
 vaidatephoto: function(data) {
        var goUpload = true; 
        
        var uploadFile = data.files[0]; 
        if (!(/\.(gif|jpg|jpeg|png)$/i).test(uploadFile.name)) {
            validation.showMessageTop("Only JPG, GIF, PNG formats allowed.",'failed');
            return;
        }
        if (uploadFile.size > 5000000) {
            validation.showMessageTop("File size is too large.",'failed');
            return;
        }
        if (goUpload == true) {
            //alert(JSON.stringify( data));
            //alert('1');
             data.submit();
        }
    },
    openloginwindow: function(url, w, h, onsignup, property) {
        var left = (screen.width / 2) - (w / 2);
        var top = (screen.height / 2) - (h / 2);
        /*if (onsignup) {
            globalAction.onSignup = '1';
        } else {
            globalAction.onSignup = '0';
        }
        $.cookie("itimes-property-access", property, {
            expires: '',
            path: '/',
            domain: '.itimes.com',
            secure: false
        }); */
        window.open(url, '_blank', 'width=' + w + ',height=' + h + ',top=' + top + ',left=' + left + ',scrollbars=yes');
        /*if (!onsignup) {
            popup.onClose();
        }*/
    },
    openLoginPop:function(){
        popup.init('/assets/template/frontend/login.tpl','pp_main');
        setTimeout(function(){
            try{ 
                commonJs.bindEnterKey('loginPopupForm','signInBtn');
                $.placeholder.shim();
                }catch(e){
                
            }},2000);
    },        
    eventCalenderText:function(){
        $("#eventCalendarHumanDate").eventCalendar({
                                    eventsjson: '/ajax/get-events?nocache=true',
                                    callback:"masonary",
                                    jsonDateFormat: '',
                                    pageName:'',
        });
       frontend.setModules('astro-bodyContainer1','astroCommon-300');  
    },
    saveSubscribe:function(fieldId,SuccessDiv){ 
     validation.removeMessage(fieldId);
     var emailid = $("#"+fieldId).val();
     
     var emailVal = validation.checkEmailFormat(emailid);
     validation.checkReturnValue(emailVal,"Please enter a valid email id.",fieldId);
      
     if(emailVal){
        var postData = 'email='+emailid;
        var requestUrl = "/save-subscribe?nocache=true";
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
                        //frontend.setModules('astro-bodyContainer1','astroCommon-300');
                     }else{ 
                        validation.checkReturnValue(false,data.message,fieldId); 
                     }
                 }
             });
     }
     
     //frontend.setModules('astro-bodyContainer1','astroCommon-300');
     return false;
    }, 
    
    validateCustomBabyFields:function(id){
        validation.removeMessage(id);
        if(id == "nc_city_name" || id == "location_city_name"){
            if($('#'+id).length>0){
                var cityVal = validation.validateEmpty(id);
                validation.checkReturnValue(cityVal,"Please enter your city of birth.",id);
                var cityVal = $("#"+id).val();
                $("#nc_location_city").val(cityVal);
                if(id == "location_city_name") $("#location_city").val(cityVal);
             }
         }else if(id == "nc_country_name" || id == "location_country_name"){
            if($('#'+id).length>0){
               var countryVal = validation.validateEmpty(id);
               validation.checkReturnValue(countryVal,"Please enter your country of birth.",id);
               validation.validateSelect(countryVal,id);
               var countryVal = $("#"+id).val();
               var countryTxt = $("#"+id+" option[value='"+countryVal+"']").text();
               $("#nc_location_countryId").val(countryVal);
               $("#nc_location_country").val(countryTxt);
               $("#nc_location_state").val(countryVal);
               if(id == "location_country_name"){
                    $("#location_countryId").val(countryVal);
                    $("#location_country").val(countryTxt);
                    $("#location_state").val(countryVal);
               }
            }
        }else if(id == "nc_latitude_name" || id == "location_latitude_name"){
            if($('#'+id).length>0){
               var latVal = validation.validateEmpty(id);
               validation.checkReturnValue(latVal,"Please enter your latitude.",id);
               var latVal = $("#"+id).val();
               $("#nc_location_latitude").val(latVal);
               if(id == "location_latitude_name"){
                    $("#location_latitude").val(latVal);
               }
           }
        }else if(id == "nc_longitude_name" || id == "location_longitude_name"){
            if($('#'+id).length>0){
               var longVal = validation.validateEmpty(id);
               validation.checkReturnValue(longVal,"Please enter your longitude.",id);
               var longVal = $("#"+id).val();
               $("#nc_location_longitude").val(longVal);
               if(id == "location_longitude_name"){
                    $("#location_longitude").val(longVal);
                }
            }
        }
        frontend.setModules('astro-bodyContainer1','astroCommon-300');
    },
    getNameCorrection:function(){
     
     if(!validation.validateDob('nc_dob')){frontend.setModules('astro-bodyContainer1','astroCommon-300');return false;}
     if(!validation.validateTime('nc_hour')){frontend.setModules('astro-bodyContainer1','astroCommon-300');return false;}
     if(!validation.validateMinute('nc_hour')){frontend.setModules('astro-bodyContainer1','astroCommon-300');return false;}
     if($('#nc_city_name').length>0){
         if($('#nc_city_name').length>0){
            var cityVal = validation.validateEmpty('nc_city_name');
            validation.checkReturnValue(cityVal,"Please enter your city of birth.",'nc_city_name');
            var cityVal = $("#nc_city_name").val();
            $("#nc_location_city").val(cityVal);
         }
         if($('#nc_country_name').length>0){
            var countryVal = validation.validateEmpty('nc_country_name');
            validation.checkReturnValue(countryVal,"Please enter your country of birth.",'nc_country_name');
            validation.validateSelect(countryVal,'nc_country_name');
            var countryVal = $("#nc_country_name").val();
            var countryTxt = $("#nc_country_name option[value='"+countryVal+"']").text();
            $("#nc_location_countryId").val(countryVal);
            $("#nc_location_country").val(countryTxt);
            $("#nc_location_state").val(countryVal);
         }
         if($('#nc_latitude_name').length>0){
            var latVal = validation.validateEmpty('nc_latitude_name');
            validation.checkReturnValue(latVal,"Please enter your latitude.",'nc_latitude_name');
            var latVal = $("#nc_latitude_name").val();
            $("#nc_location_latitude").val(latVal);
         }
         if($('#nc_longitude_name').length>0){
            var longVal = validation.validateEmpty('nc_longitude_name');
            validation.checkReturnValue(longVal,"Please enter your longitude.",'nc_longitude_name');
            var longVal = $("#nc_longitude_name").val();
            $("#nc_location_longitude").val(longVal);
         }
         
         if(typeof(cityVal)!="undefined" && typeof(countryVal)!="undefined" && typeof(latVal)!="undefined" && typeof(longVal)!="undefined"){
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
        }
     }else{
         if(!validation.validatePob('nc_location')){frontend.setModules('astro-bodyContainer1','astroCommon-300');return false;}
     }
     
                 
    var requestUrl = '/write-session/babyName?nocache=true';
    var postData = $("#nameCorrection").serialize();
    console.log(postData);
    $.ajax({
        url: requestUrl,
        type: "POST",
        dataType: 'json',
        data: postData,
        complete: function() {
        },
        success: function(response){
           window.location.href = '/baby-name?nocache=true'
        }
    });
          
     return false;
    },
    bindServiceImageUploader:function(id,urlToRedirect){
         
         $('#' + id).fileupload({
         dataType: 'json',
         formData: {width: '75'},
         add: function(e, data) {    
            frontend.vaidatephoto(data);
         },
         progressall: function(e, data) { 
              $("#"+id+"Loader").html( $("#loaderTemplate").html());
            },
            maxFileSize: 5,
            previewSourceFileTypes: /^image\/(gif|jpeg|png)$/,
            loadImageFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            singleFileUploads: true,
            sequentialUploads: true,
            crossDomain: true,
            done: function(e, data) { 
                var obj = data.result;
                if (obj.status == 'Success') {
                    frontend.addServicePhoto(obj.image.path, obj.thumbnail, obj.image.height, obj.image.width);
                    window.location.href = urlToRedirect;
                }
            }
        });
     
 },
 addServicePhoto:function(path, thumbnail, height,width){
       pictureJSON = new Object();
       pictureJSON.picture = path;
       pictureJSON.height = height;
       pictureJSON.width = width;
       pictureJSON.type = 'tmp';
       $("#picture").val(JSON.stringify(pictureJSON));
       $("#thumbnail").val(thumbnail);
    },
   sendSearch:function(id){
       
       switch(id){
          case 'keyword':
            errorId = "keywordError"; 
          break;
          case 'searchTouch':
            errorId = "searchTouchError"; 
          break;
          case 'searchMobile':
            errorId = "searchMobileError"; 
          break;
       }
       var validCharactersRegex = /^[a-zA-Z0-9 ]*$/;
       // !validCharactersRegex.test(keyword) || keyword.length < 3
       //alert($("#"+id).val());
       if($.trim($("#"+id).val()) == '' || !validCharactersRegex.test($("#"+id).val())){
           $("#"+errorId).show();
           this.hideSearchError(errorId);
           return false;
       }
       
       keyword = services.createSeoUrlTitle($("#"+id).val(),'service');
       location.href = "/services/"+keyword;
      
           
   },hideSearchError:function(id){
       setTimeout("$('#"+id+"').slideUp('slow');", 1000);
   },
   checkCompatibility:function(){
     swinger.scrollFocus('compatHomeBox');  
     if(!validation.validateSunSign('maleSunSign')){frontend.setModules('astro-bodyContainer1','astroCommon-300');return false;}
     if(!validation.validateSunSign('femaleSunSign')){frontend.setModules('astro-bodyContainer1','astroCommon-300');return false;}
     
     
            $("#compatibilityText").html($("#loaderTemplate").html());     
            var requestUrl = '/calculate-compatibility?nocache=true';
            var postData = $("#compatibility").serialize();
            $.ajax({
                url: requestUrl,
                type: "POST",
                dataType: 'json',
                data: postData,
                complete: function() {
                },
                success: function(response){
                 
                 if(response.status == "Success"){
                    
                    $("#compatibility_btn").removeAttr('onclick');
                    $("#compatibility_btn").removeClass('btn-blue');
                    $("#compatibility_btn").addClass('btn-grey');
                    var template = $("#compatibilityTemplate").html(); 
                    compatibilityData = Mustache.render(template, response.data);
                    $("#compatibilityText").html(compatibilityData);
                    frontend.setModules('astro-bodyContainer1','astroCommon-300');
                    try{ $.placeholder.shim();}catch(e){}
                    }else{
                      
                    }
                }
            });
    
     return false;
   },
   enableCompatibility:function(id,imgId){
            $("#compatibility_btn").attr('onclick', "frontend.checkCompatibility();");
            $("#"+id).parent('div').removeClass('txtfieldError');
            validation.removeMessage(id);
            $("#compatibility_btn").removeClass('btn-grey');
            $("#compatibility_btn").addClass('btn-blue');
            var sunsign = $("#"+id).val();
            $('div#'+imgId).find('img').attr('class','');
            $('div#'+imgId).find('img').addClass(sunsign+'Icon-smll1');
            $('div#'+imgId).find('img').attr('style','display:block');
   },
   openSearchBox:function(action){
	   if(action == 'open'){
		   $("#searchbtnmobile").attr('onclick', 'frontend.openSearchBox("close");');
		   $('#mobilesearch').show();
		   $("#bodycont").removeClass('topband-margin');
		   $("#bodycont").addClass('marginT100');
		  // $("#astroBody-bg").addClass('marginT93');
	   }else{
		   $("#searchbtnmobile").attr('onclick', 'frontend.openSearchBox("open");');
		   $('#mobilesearch').hide();
		   $("#bodycont").removeClass('marginT100');
		   $("#bodycont").addClass('topband-margin');
		 //  $("#astroBody-bg").removeClass('marginT93');
	   }
   },
   handleSelectExpert:function(aid){
       //alert("hfhfhfh"+aid);
       
       $(".peoplebox").children('a').each(function(a,b){
            if(this.id == aid){
                $("#"+this.id).addClass('selected active');
            }else{
                $("#"+this.id).removeClass('selected active');
            }
            
       });
   },
   validateQuestionForm:function(){
       /* Question textbox Validation */
       validation.removeMessage('ask_question');
       $("#errorMsg").hide();
       var questionChk = validation.validateEmpty('ask_question');
       validation.checkReturnValue(questionChk,"Please enter your question.",'ask_question');
       var expertSelect = false;
       var serviceId = '';
       /* Expert selection */
       if(questionChk){
            
            $(".peoplebox").children('a').each(function(a,b){
                if($("#"+this.id).hasClass("selected")){
                    expertSelect = true;
                    serviceId = this.id;
                }
            });
            
            if(!expertSelect){
                $("#errorMsg").show();
            }
            
       }else{
           return;
       }
       
       if(expertSelect && questionChk){
           
         var postData = 'question='+$("#ask_question").val();
         var requestUrl = "/write-session/askaquestion?nocache=true";
         $.ajax({
             type: "POST",
             dataType: "json",
             data: postData,
             beforeSend:function() {
                 
             },
             url: requestUrl,
             success:function(data){                 
                  /* Redirect to order detail page */  
                  window.location.href = $("#buyNowUrl_"+serviceId).val() +"?ref=askaquestion";
             }
         });
           
       }
       
   },
   updateCountdown:function(fieldId,textAreaId) {
       
    // 1000 is the max message length
    var remaining = 1000 - $('#'+fieldId).val().length;
    $('#'+textAreaId).text(remaining + ' characters remaining.');
    
    
   }
    
}