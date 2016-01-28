function lovemeter() {
  this.boy_name;
  this.girl_name;
  this.loadLoveCalculation = loadLoveCalculation;
  function loadLoveCalculation(){
      
      if($.trim(this.boy_name) == '' || $.trim(this.girl_name) == '' ){
          return;
      }
      var url = "/get-lovecalculation?nocache=true";
      var postData = 'boy_name='+this.boy_name+'&girl_name='+this.girl_name;
      
      $.ajax({
            url:url,
            type: 'POST',
            data: postData,
            success: function(data) {
                
                 if(data.message==="success"){ 
                        $('#lovemeterreset').hide();
                        var template = $("#lovemeterTemplate").html(); 
                        lovemeterTpl = Mustache.render(template, data.data);
                        $("#lovemetertext").html(lovemeterTpl);
                        $("#lovemeterbtn").removeClass().addClass('btn-grey marginRL5');
                        $("#lovemeterbtn").removeAttr("onclick");
                        
                 }else{
                       console.log(data);
                 }
            }
      });
      
  }
  
}
function calculateNumber() {
  this.full_name;
  this.dob;
  this.loadNumberCalculation = loadNumberCalculation;
  function loadNumberCalculation(){
      
      var url = "/get-yournumber?nocache=true";
      var postData = 'full_name='+this.full_name+'&dob='+this.dob;
      
      $.ajax({
            url:url,
            type: 'POST',
            data: postData,
            success: function(data) {
                
                 if(data.message==="Success"){ 
                     window.location.href = data.url;
                 }else{
                     window.location.href = data.url;
                 }
            }
      });
      
  }
  
}
var tarot = {
    card1:1,
    card2:2,
    card3:1,
    card4:4,
    card5:5,
    cardsArr:new Array(),
    randomCard:'',
 getRandom:function(min,max){
     randomNO = jQuery.Random(min,max);
     if($.inArray(randomNO,this.cardsArr) >= 0){ 
        this.getRandom(min,max);
     }else{
         this.cardsArr.push(randomNO);
         this.randomCard = randomNO;
    }
 },    
 getcards:function(){
    if($.cookie("t_cards") == undefined){
    this.getRandom(1,78);
    tarot.card1 = this.randomCard;
    this.getRandom(1,78);
    tarot.card2 = this.randomCard;
    this.getRandom(1,78);
    tarot.card3 = this.randomCard;
    this.getRandom(1,78);
    tarot.card4 = this.randomCard;
    this.getRandom(1,78);
    tarot.card5 = this.randomCard;
     cards = new Object();  
     cards.card1 = tarot.card1;
     cards.card2 = tarot.card2;
     cards.card3 = tarot.card3;
     cards.card4 = tarot.card4;
     cards.card5 = tarot.card5;
       //alert(JSON.stringify(tarot));
     $.cookie("t_cards", JSON.stringify(cards),{ expires: 1,path:'/'});
    }else{
        cards = eval("("+$.cookie("t_cards")+")");
        tarot.card1 =  cards.card1;
        tarot.card2 =  cards.card2;
        tarot.card3 =  cards.card3;
        tarot.card4 =  cards.card4;
        tarot.card5 =  cards.card5;
       }
  },
  getDetails:function(card){
    swinger.scrollFocus("tarotCardBox");
    var card_number = 1; 
    var cardImgName = 'tarot_card';
    switch(card) {
        case 'card1':
           card_number = tarot.card1;
           cardImgName = 'tarot_card';
        break; 
        case 'card2':
           card_number = tarot.card2;
           cardImgName = 'tarot_card1';
        break;
        case 'card3':
           card_number = tarot.card3;
           cardImgName = 'tarot_card2';
        break;
        case 'card4':
           card_number = tarot.card4;
           cardImgName = 'tarot_card3';
        break;
        case 'card5':
           card_number = tarot.card5;
           cardImgName = 'tarot_card4';
        break;
    }
    
      var url = "/get-cardpredition?nocache=true";
      postData = 'card_number='+card_number;
      
      $.ajax({
            url:url,
            type: 'POST',
            data: postData,
            beforeSend: function(xhr) {
                $("#tmpTarotemplate").html($("#loaderTemplate").html());
            },
            success: function(data) {
               
                 if(data.status == "Success"){ 
                     data.data.tarotCardSelected = cardImgName;
                     var template = $("#cardTemplate").html(); 
                     carddetail = Mustache.render(template, data.data);
                     $("#tmpTarotemplate").html(carddetail);
                     $('#seled_card_txt').hide();
                     frontend.setModules('astro-bodyContainer1','astroCommon-300'); 
                      
                 }else{ 
                      alert(data.data);
                 }
            }
      });
    
    
  },
  getTaroCardDetail:function(card){
    
    var card_number = 1; 
   
    $("#seletedCardArea").html($("#loaderTemplate").html());
        switch(card) {
            case 'card1':
               card_number = tarot.card1;
            break; 
            case 'card2':
               card_number = tarot.card2;
            break;
            case 'card3':
               card_number = tarot.card3;
            break;
            case 'card4':
               card_number = tarot.card4;
            break;
            case 'card5':
               card_number = tarot.card5;
            break;
        }
    var selectedCardId = "selected_"+card;
    $( '[id^="selected_"]' ).each(function(){
         if(this.id != selectedCardId){
             $("#"+this.id).removeClass("tarotCardDetail-select"); 
             $("#"+this.id).html("<img src='/assets/images/frontend/tarot_disable.gif' />"); 
             }
         $("#"+this.id).removeAttr("onclick");
    });
    $("#"+selectedCardId).addClass("tarotCardDetail-select");
      
      var url = "/get-cardpredition?nocache=true";
      postData = 'card_number='+card_number;
      
      $.ajax({
            url:url,
            type: 'POST',
            data: postData,
            success: function(response) {
                 
                 if(response.status == "Success"){ 
                     
                     var template = $("#seletedCardView").html(); 
                     carddetail = Mustache.render(template, response.data);
                     $("#seletedCardArea").html(carddetail);
                     $("#resetBtn").show(); 
                     
                     $('html, body').animate({
                        scrollTop: $("#seletedCardArea").offset().top+150
                     }, 400);
                     
                 }else{ 
                      alert(response.data);
                 }
            }
      });
    
    
  },
  resetTaroCards:function(){
      
      var template = $("#resetcardTemplate").html(); 
      carddetail = Mustache.render(template);
      $("#tmpTarotemplate").html(carddetail);
      $('#seled_card_txt').show();
      tarot.getcards();
      frontend.setModules('astro-bodyContainer1','astroCommon-300'); 
                     
  },
  resetTaroCardDetail: function(){
      
      var i = 1;
      $( '[id^="selected_"]' ).each(function(){
         
         $("#"+this.id).removeClass("tarotCardDetail-select"); 
         $("#"+this.id).html("<img src='/assets/images/frontend/tarot"+i+".gif' />");
         $("#"+this.id).attr('onclick', "tarot.getTaroCardDetail( 'card"+i+"' );");
         i++;
         
      });
      $("#resetBtn").hide(); 
      $("#seletedCardArea").html('');
      $("html, body").animate({ scrollTop: 0 }, "slow"); 
  }
};
jQuery.Random = function(m,n) {
      m = parseInt(m);
      n = parseInt(n);
      return Math.floor( Math.random() * (n - m + 1) ) + m;
}
var services = {
 
  openDetailView:function(id){
   
    var listId = "list_view_"+id;
    var detailId = "detail_view_"+id;
    var detailHtml = $.trim($("#"+detailId).html());
    
    
    $( 'div[id^="detail_view_"]' ).each(function() {
        
         if(this.id != detailId){
              
              var displayView = $('#'+this.id).css('display');
              if(displayView != 'none'){
                 $("#"+this.id).hide(); 
              }
              var tmpId = this.id.replace("detail", "list");
              var displayList = $('#'+tmpId).css('display');
              if(displayList == 'none'){
                  $("#"+tmpId).show();
              }
              
         }
         
        });
    $("#"+listId).hide();
    $("#"+detailId).show();

    $('html, body').animate({
        scrollTop: $("#"+detailId).offset().top - 100
    }, 400);
    
    if(detailHtml == ''){
            
            $("#"+detailId).html($("#loaderTemplate").html());
            var requestUrl = "/view-service?nocache=true";
            var postData = {serviceId: id};
            $.ajax({
                url: requestUrl,
                type: "POST",
                //dataType: 'json',
                data: postData,
                complete: function() {
                },
                success: function(response){
                   if (response != '0'){
                        
                        var template = $("#serviceListDetail").html();
                        detailView = Mustache.render(template, response);
                        $("#"+detailId).html(detailView);
                        
                        
                    }else{
                        
                    }
                }
            });  
       
    }
    
    },
    searchKeyword:function(formActionName,type){
       
        var keyword = $("#searchkeyword").val();
        var validCharactersRegex = /^[a-zA-Z0-9 ]*$/;
        
        var redirectUrl = '';
        
        if(keyword == ''){
            validation.showMessageTop('Please enter a valid search keyword.','failed');
            return false;
        }else if(!validCharactersRegex.test(keyword)){
            validation.showMessageTop('Please enter a valid search keyword.','failed');   
            return false;
        }else if(keyword.length < 3){
            validation.showMessageTop('Minimum 3 characters required','failed');
            return false;
        }
        
        keyword = services.createSeoUrlTitle(keyword,type);
        switch(type){
        case 'service':
           var priceFrom = $("#price_from").val();
           var priceTo = $("#price_to").val();
           if(keyword.length>0){
           redirectUrl = formActionName +'/'+ keyword + services.createPriceUrl(priceFrom,priceTo);
           }else{
           redirectUrl = formActionName +'/services' + services.createPriceUrl(priceFrom,priceTo);    
           }
           break; 
        case 'expert':
           redirectUrl = formActionName +'/'+ keyword;
        break;
        case 'article':
           redirectUrl = formActionName +'/'+ keyword;
        break;
        case 'service404':
           redirectUrl = formActionName +'/'+ keyword;
        break;
        }
       
        window.location.href = redirectUrl;
        
    },
    searchByFilter:function(url){
        var astrologerValue = $("#astrologerList").val();
        var sortingValue = $("#sortingList").val();
        services.showSpinner();
        if(astrologerValue){
            var redirectUrl = url+"?astrologer="+astrologerValue;
            if(sortingValue){
                var redirectUrl = redirectUrl+"&sort="+sortingValue;
            }
        }else{
            if(sortingValue){
            var redirectUrl = url+"?sort="+sortingValue;
            }
        }
        setTimeout(function(){ 
                        window.location.href = redirectUrl;
                   },5);
        
    },
    searchByCategory:function(){
        services.showSpinner();
        var redirectUrl = $("#categorySearch").val();
        
        setTimeout(function(){ 
                        window.location.href = redirectUrl;
                   },5);
        
    },
    searchByExperts:function(){
        services.showSpinner();
        var redirectUrl = $("#astrologerList").val();
        
        setTimeout(function(){ 
                        window.location.href = redirectUrl;
                   },5);
        
    },
    submitFormOnChangeOfRange:function(url){
        
        var priceFrom = $("#price_from").val();
        var priceTo = $("#price_to").val();
        var keyword = $("#searchkeyword").val();
        keyword = services.createSeoUrlTitle(keyword,'service');
        var redirectUrl = url ;
        
        if($.trim(keyword).length>3){
            redirectUrl = redirectUrl + "/" + keyword + services.createPriceUrl(priceFrom,priceTo);
        }else{
            redirectUrl = redirectUrl + '/' + 'services'+services.createPriceUrl(priceFrom,priceTo);
        }
        
        var astrologerValue = $("#astrologerList").val();
        var sortingValue = $("#sortingList").val();
        services.showSpinner();
        if(astrologerValue){
            var redirectUrl = redirectUrl+"?astrologer="+astrologerValue;
            if(sortingValue){
                var redirectUrl = redirectUrl+"&sort="+sortingValue;
            }
        }else{
            if(sortingValue){
            var redirectUrl = redirectUrl+"?sort="+sortingValue;
            }
        }
        
        setTimeout(function(){ 
                        window.location.href = redirectUrl;
                   },5);
        
        
    },
    
    urlTitle:function(text) {
    text = text.replace(/^\s+|\s+$/g, "");     
    var characters = [' ', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '+', '=', '_', '{', '}', '[', ']', '|', '/', '<', '>', ',', '.', '?', '--']; 

    for (var i = 0; i < characters.length; i++) {
         var char = String(characters[i]);
         text = text.replace(new RegExp("\\" + char, "g"), '-');
    }
    text = text.toLowerCase();
    return text;
    },
    wordsToBeRemoved:function(s) {
    var words = ['from', 'to', 'services', 'articles', 'experts'];
    var re = new RegExp('\\b(' + words.join('|') + ')\\b', 'g');
    return (s || '').replace(re, '').replace(/[ ]{2,}/, ' ');
    },
    createSeoUrlTitle:function(keyword,type){
        
        var urlKeyword = services.wordsToBeRemoved(keyword);
        urlKeyword = services.urlTitle(urlKeyword);
        if(urlKeyword.length==0) return '';
        switch(type){
        case 'service':
           urlKeyword = urlKeyword+"-services";
        break; 
        case 'expert':
           urlKeyword = urlKeyword+"-experts";
        break;
        case 'article':
           urlKeyword = urlKeyword+"-articles";
        break;
        case 'service404':
           urlKeyword = urlKeyword+"-services";
        break;
        }
        
        return urlKeyword;
    },
    createPriceUrl:function(fromPrice,toPrice){
        
        if(fromPrice.length >0 && toPrice.length >0){
            return '-from-'+fromPrice+'-to-'+toPrice;
        }
        return "";
        
    },
    bindEnterKey:function(fieldId,btnName){
     
        $("#"+fieldId).keypress(function (e) {
            var key = window.event ? e.keyCode : e.which;
            if (key == '13') {
             $('#'+btnName).click();
            }
        });
    },
    showSpinner:function(){
         
        $("#pp_divoverlay").show();
        $("#pp_main").html('<div class="txtCenter" ><img src="/assets/images/frontend/spinner.GIF" /></div>');
        popup.onResize('pp_main');
        $("#pp_main").show();
    },
    redirectByUrl:function(fieldId){
        services.showSpinner();
        var redirectUrl = $("#"+fieldId).val();
        
        setTimeout(function(){ 
                        window.location.href = redirectUrl;
                   },5);
        
    },
    
};
var lazyLoadList = {
  zeroResult:'',
  loadList:function(url,templateName,callbackaction,divId){
     
        lazyLoadList.zeroResult = false;
        $(document).endlessScroll({
            //pagesToKeep: 10,
            fireOnce: false,
            bottomPixels:400,
            callback: lazyLoadList.getlist,
            ajaxUrl: url,
            templateName: templateName,
            divIdToUpdate: divId,
            ceaseFireOnEmpty:true,
            fireDelay:2000,
            ceaseFire: function(i, p) {
                return lazyLoadList.zeroResult;
            }, 
            intervalFrequency: 20
        });
    },
   getlist:function(fireSequence, pageSequence, scrollDirection, ajaxUrl, templateName, divIdToUpdate){

        if (pageSequence > 1) {
            trackingUrl = ajaxUrl.replace('/ajax','');          
            trackingUrl = trackingUrl + pageSequence;
            commonJs.trackPage(trackingUrl,'');
            $("#spinner").html($("#loaderTemplate").html());
            
            var requestUrl = ajaxUrl + pageSequence + "?nocache=true";
            var postData = $("form").serialize();
              $.ajax({
                url: requestUrl,
                type: "POST",
                dataType: 'json',
                data: postData,
                async:false,
                complete: function() {
                },
                success: function(response){
                   if (response != '0'){
                        var template = $("#"+templateName).html();
                        detailView = Mustache.render(template, response.data);
                        $("#"+divIdToUpdate).append(detailView);
                        $("#spinner").html('');
                        try{ frontend.lazyimages();}catch(e){}
                    }else{
                        $("#spinner").html('');
                        lazyLoadList.zeroResult = true;
                    }
                }
            });
            
            
         }
     }  
 
};

var prashnavali = {
    
    prashnavaliPrediction: function(){
       
    $('#prashnavali').click(function(e) {
    var offset = $(this).offset();
    scHeight = $(document).scrollTop();
    Xcordinate= e.clientX - offset.left;
    Ycordinate= e.clientY+scHeight - offset.top;
    location.href = "/prashnavali/"+parseInt(Xcordinate)+"-"+parseInt(Ycordinate)+"/result";
    });
 
    }
}
var calendarPage = {
    
    bindCalendar: function(){
       
    $("#eventCalendarHumanDate").eventCalendar({
                                    eventsjson: '/ajax/get-events?nocache=true',
                                    jsonDateFormat: ''  
                            });
 
    }
}

 var rangeSlider = {
    
    priceSlider: function(minPrice, maxPrice , selectedMin, selectedMax, url){
  
    $( "#slider-range" ).slider({
      range: true,
      min: minPrice,
      max: maxPrice,
      step: 1,
      values: [ selectedMin, selectedMax ],
      slide: function( event, ui ){
         $("#minSelected").html(ui.values[ 0 ]);
         $("#maxSelected").html(ui.values[ 1 ])
      },
      stop: function( event, ui ) {
          
        $("#price_from").val(ui.values[ 0 ]);
        $("#price_to").val(ui.values[ 1 ]);
        
      },
      change: function( event, ui ) {
          
          $("#price_from").val(ui.values[ 0 ]);
          $("#price_to").val(ui.values[ 1 ]);
          services.submitFormOnChangeOfRange(url);
      }
     
      
    });
    
    /*$( "#amount" ).val( "Rs. " + $( "#slider-range" ).slider( "values", 0 ) +
      " - Rs. " + $( "#slider-range" ).slider( "values", 1 ));
    */
    $("#minSelected").html($( "#slider-range" ).slider( "values", 0 ));
    $("#seperatorArea").show();
    $("#maxSelected").html($( "#slider-range" ).slider( "values", 1 ));
    }
}
var puja = {
 
  openDetailView:function(id){
    
    var listId = "pujalink_"+id;
    var detailId = "pujalinkdetail_"+id;
    $( 'div[id^="pujalink_"]' ).each(function() {
        
         if(this.id != listId){
              
              var tmpId = this.id.replace("pujalink", "pujalinkdetail");
              $("#"+tmpId).hide();
              $("#"+this.id).show();
         }
         
        });
     
    $("#"+detailId).show();
    $("#"+listId).hide();
    swinger.scrollFocus("pujaHomeBox");
    frontend.setModules('astro-bodyContainer1','astroCommon-300'); 
    },
   /* toggleArrow:function(name){
        $('a > img.arrowtoggle').removeClass('openLinkTAB-arrow');
        $("#arrow"+name).addClass("openLinkTAB-arrow");
    } */
    
    
};

var swinger = {
    scrollFocus:function(id){
        if($(window).scrollTop() != parseInt($("#"+id).offset().top,10)-101){
            $('html, body').animate({
                scrollTop: parseInt($("#"+id).offset().top,10) - 100
            }, 900);
        }
    },
    scrollFocusOffers:function(id){
        if($(window).scrollTop() != parseInt($("#"+id).offset().top,10)-111){
            $('html, body').animate({
                scrollTop: parseInt($("#"+id).offset().top,10) - 110
            }, 900);
        }
    }
}