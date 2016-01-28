function headermenu(category,subcategory) {
   if(subcategory === undefined){
      subcategory = ''; 
   } 
   this.category = category;
   this.subcategory = subcategory;
   this.loadmenu = loadmenu; //method
   this.htmlloaded = false;
   this.addMenu = addMenu; //method 
   function loadmenu(){
      if(this.htmlloaded === true){
           return false;
      }
      this.addMenu();
      this.htmlloaded = true;
   }
   function addMenu(data){ 
         switch(this.category){
           case 'astrology':
               $("#astrology_menu").html($("#astromenuTemplate").html());
               submenu.loadSubMenu('astro','expert');
               submenu.loadSubMenu('astro','advise');
               submenu.loadSubMenu('astro','article');
               submenu.loadSubMenu('astro','nadi');
               submenu.loadSubMenu('astro','bhrigu');
           break;
           case 'numerology':
                $("#numerology_menu").html($("#numerologymenuTemplate").html());
                submenu.loadSubMenu('numerology','expert');
                submenu.loadSubMenu('numerology','advise');
                submenu.loadSubMenu('numerology','article');
          break;
          case 'vastu':
               $("#vastu_menu").html($("#vastumenuTemplate").html());
                submenu.loadSubMenu('vastu','expert');
                submenu.loadSubMenu('vastu','advise');
                submenu.loadSubMenu('vastu','article');
          break;
          case 'tarot':
                $("#tarot_menu").html($("#tarotmenuTemplate").html());
                submenu.loadSubMenu('tarot','expert');
                submenu.loadSubMenu('tarot','advise');
                submenu.loadSubMenu('tarot','article');
          break;
          case 'more':
             //alert("this is for test")
             $("#more_menu").html($("#moremenuTemplate").html());
               
          break;
          
      }
    
    }
}
var submenu = {
   showsubmenu:function(category,category_subtab){
       $("div[id^='"+category+"_sub']").each(function(i,obj){
           //alert(obj.id);
           $(obj).hide();
       });
       $("li[id^='li_"+category+"_sub']").each(function(i1,obj1){
         
           $(obj1).removeClass('colA-activeTAB');
       });
       $("#li_"+category_subtab).addClass('colA-activeTAB');
       $("#"+category_subtab).show();
   },
    loadSubMenu:function(category,subcategory){
      
       $.ajax({
           url:'/ajax/get-menudata',
           dataType:'json',
           category:category,
           subcategory:subcategory,
           data:'category='+category+"&subcategory="+subcategory,
           type:'get',
           beforeSend:submenu.addLoader,
           success:submenu.fillData
       });
   },
   addLoader:function(){
       template = $("#menuloader").html();
        switch(this.category){
        case 'astro':
         switch(this.subcategory)
          {
            case 'expert':
                $("#astro_sub_tab1").html(template);
             break;
            case 'advise':
               $("#astro_sub_tab2").html(template);
            break;
            case 'article':
               $("#astro_sub_tab3").html(template);
            break;
           }  
           break;
           case 'numerology':
           switch(this.subcategory)
           {
               case 'expert':
                  $("#numerology_sub_tab1").html(template);
                break;
                case 'advise':
                  $("#numerology_sub_tab2").html(template);
                break;
                case 'article':
                 $("#numerology_sub_tab3").html(template);
                break;
           }  
          break;
          case 'vastu':
          switch(this.subcategory)
          {
                 case 'expert':
                  $("#vastu_sub_tab1").html(template);
                break;
                case 'advise':
                  $("#vastu_sub_tab2").html(template);
                break;
                case 'article':
                  $("#vastu_sub_tab3").html(template);
                 break;
          }  
          break;
          case 'tarot':
          switch(this.subcategory)
          {
                case 'expert':
                   $("#tarot_sub_tab1").html(template);
                 break;
                case 'advise':
                  $("#tarot_sub_tab2").html(template);
                break;
                case 'article':
                  $("#tarot_sub_tab3").html(template);
                break;
          }  
          break;
      }
    }
   ,        
   fillData:function(data){ 
      //return;
      switch(this.category){
        case 'astro':
         switch(this.subcategory)
          {
            case 'expert':
               template = $("#menuExpert").html();
               $("#astro_sub_tab1").html(Mustache.render(template, data));
               $("#astro_sub_tab1").append('<a href="/indian-astrologers/astrology-experts" class="navLink-more"></a>');
            break;
            case 'advise':
               template = $("#menuExpert").html();
               $("#astro_sub_tab2").html(Mustache.render(template, data));
               $("#astro_sub_tab2").append('<a href="/services/astrology-advice-services" class="navLink-more"></a>');
            break;
            case 'article':
               template = $("#menuExpert").html();
               $("#astro_sub_tab3").html(Mustache.render(template, data));
               $("#astro_sub_tab3").append('<a href="/articles/astrology-articles" class="navLink-more"></a>');
            break;
            /* case 'bhrigu':
               template = $("#menuExpert").html();
               $("#astro_sub_tab4").html(Mustache.render(template, data));
               $("#astro_sub_tab4").append('<a href="/services/bhrigu-services" class="navLink-more"></a>');
            break;
            case 'nadi':
               template = $("#menuExpert").html();
               $("#astro_sub_tab5").html(Mustache.render(template, data));
               $("#astro_sub_tab5").append('<a href="/services/nadi-services" class="navLink-more"></a>');
            break;
            */
           }  
           break;
           case 'numerology':
           switch(this.subcategory)
           {
               case 'expert':
                  template = $("#menuExpert").html();
                  $("#numerology_sub_tab1").html(Mustache.render(template, data));
                  $("#numerology_sub_tab1").append('<a href="/indian-astrologers/numerology-experts" class="navLink-more"></a>');
                break;
                case 'advise':
                  template = $("#menuExpert").html();
                  $("#numerology_sub_tab2").html(Mustache.render(template, data));
                  $("#numerology_sub_tab2").append('<a href="/services/numerology-services" class="navLink-more"></a>');
                break;
                case 'article':
                  template = $("#menuExpert").html();
                  $("#numerology_sub_tab3").html(Mustache.render(template, data));
                  $("#numerology_sub_tab3").append('<a href="/articles/numerology-articles" class="navLink-more"></a>');
                break;
           }  
          break;
          case 'vastu':
          switch(this.subcategory)
          {
                 case 'expert':
                  template = $("#menuExpert").html();
                  $("#vastu_sub_tab1").html(Mustache.render(template, data));
                  $("#vastu_sub_tab1").append('<a href="/indian-astrologers/vastu-experts" class="navLink-more"></a>');
                break;
                case 'advise':
                  template = $("#menuExpert").html();
                  $("#vastu_sub_tab2").html(Mustache.render(template, data));
                  $("#vastu_sub_tab2").append('<a href="/services/vastu-services" class="navLink-more"></a>');
                break;
                case 'article':
                  template = $("#menuExpert").html();
                  $("#vastu_sub_tab3").html(Mustache.render(template, data));
                  $("#vastu_sub_tab3").append('<a href="/articles/vastu-services" class="navLink-more"></a>');
                break;
          }  
          break;
          case 'tarot':
          switch(this.subcategory)
          {
                case 'expert':
                  template = $("#menuExpert").html();
                  $("#tarot_sub_tab1").html(Mustache.render(template, data));
                  $("#tarot_sub_tab1").append('<a href="/indian-astrologers/tarot-experts" class="navLink-more"></a>');
                break;
                case 'advise':
                  template = $("#menuExpert").html();
                  $("#tarot_sub_tab2").html(Mustache.render(template, data));
                  $("#tarot_sub_tab2").append('<a href="/services/tarot-services" class="navLink-more"></a>');
                break;
                case 'article':
                  template = $("#menuExpert").html();
                  $("#tarot_sub_tab3").html(Mustache.render(template, data));
                  $("#tarot_sub_tab3").append('<a href="/articles/tarot-articles" class="navLink-more"></a>');
                break;
          }  
          break;
      }
    }
           
}

var arrangeMenu = {
   resetMenu:function(){
       menuWidth = ($(".topMenu").width());
       tabwidth = 100;
       $(".topMenu").children('li').each(function(a,b){
            if(this.id != 'moreLink'){  
                tabwidth+=$(this).width();
                
                if(tabwidth > menuWidth){
                  
                    $(this).hide();
                    $(this).next('div').hide();
                    
                    
                    if($('#morelinkdiv').length){
                        if($("#morelinkdiv").html() == ''){
                        var moreMainMenuHtml = '<div class="w150border" style="border-right: 1px solid #b9b9b9;"><div class="font20">Main Menu</div><div class="moreLinks" id="moreDisppearLinks"></div></div>';   
                        $("#morelinkdiv").html(moreMainMenuHtml);   
                        }
                        if($("#" + this.id+'_a>').length == 0) {
                           var hrefHtml = '<div id='+this.id+'_a>'+$("#"+this.id).html()+'</div>';
                           $("#moreDisppearLinks").prepend(hrefHtml);
                           if($(this).attr("id")!= undefined){
                               if($("#"+this.id+" a").hasClass("NAVselected")){
                                   $("li#moreLink > a").addClass("NAVselected");
                                   $("li#moreLink > a").children('div').addClass('navLinks-arrow-selected');
                               }
                           }
                        }
                    }
                     
               }else{
                   
                   $(this).show();
                   $(this).next('div').show();
                   if(this.id != ""){
                        if($("#"+this.id+" a").hasClass("NAVselected")){
                            $("li#moreLink > a").removeClass("NAVselected");
                            $("li#moreLink > a").children('div').removeClass('navLinks-arrow-selected');
                        }
                    }
                   $("#"+this.id+"_a").remove();
                    
                   if($('#moreDisppearLinks').length && $("#moreDisppearLinks").html()==''){
                       $("#morelinkdiv").html('');
                       
                   }
                   
               }
               
               
               
            } 
       });
    
   }
}
var selectJs = {
    
    dropDownRequired:function(){
          $('select.styled').customSelect();
          $('select.styled').show();
    }
}
var commonAutoComplete = {
  bindAutoComplete:function(id,url,callback,topsearch){
     if(topsearch == undefined){
          topsearch = '';
          pos = {};
          loaderId = '';
      }else{
         var errorId = '';
         switch(topsearch)
         {
          case 'topsearch':   
             pos = {of:'#mobileView-headerHide'};
             loaderId = "websearchloader";
             errorId = "keywordError"; 
          break;
          case 'topsearchtouch':
            pos = {of:'#searchTouchCon'};
            loaderId = "tabsearchloader";
            errorId = "searchTouchError"; 
          break;
          case 'topsearchmobile':   
              pos = {of:'#searchMobileCon'};
              loaderId = "mobilesearchloader";
              errorId = "searchMobileError"; 
          break;
         }
            
      }
      
      $( "#"+id ).autocomplete({
           
       source: function( request, response ) {
         if(url.indexOf('/get-location' )>=0){
            
             if($("#"+id+"_conId").val() != undefined && $("#"+id+"_conId").val() != ''){
                url="/get-location?country="+$("#"+id+"_conId").val();
             }
          }
           $.post( url, {
            keyword:  request.term
          }, response );
        },
       search: function() {
         
         var keywordValue = $("#"+id).val();
            
            if($.trim($("#"+id).val()) != ''){
                
                var validCharactersRegex = /^[a-zA-Z0-9 ]*$/;
                
                if($.trim($("#"+id).val()) == '' || !(validCharactersRegex.test(keywordValue))){
                   
                     $("#"+id).val('');  
                     $("#"+errorId).show();
                     this.hideSearchError(errorId);
                     $("#"+id).val('');
                     return;
                }
            }  
         
         options = $( "#"+id ).autocomplete( "option" );
         //alert(options.loaderId);
         if(options.loaderId != '' ){
         $("#"+options.loaderId).show();}else{
          $(this).addClass("input-loader");
         }
       }, 
       open: function() {
       options = $( "#"+id ).autocomplete( "option" );
        //$(this).removeClass("showLoading");
        if(options.loaderId != '' ){
            $("#"+options.loaderId).hide();
        }else{
             $(this).removeClass("input-loader");
        }
      },response:function( event, ui){
           $(".noPlaceFound").remove();
           if(ui.content.length  == 0){
              //if(this.id == 'location' ) 
              if(this.id == 'nc_location'){
                 top1 = $(this).height()+11;
                 $(this).after(" <div class=\"searchPOP1 noPlaceFound\" style=\"width:99%;position:absolute;top:"+top1+"px;\"><span>No Result found<span><br><span><a id=\"addPlace\" href=\"javascript:void(0)\" onclick=\"commonAutoComplete.addPlace()\">Add Your Place</a></span></div>");
              }else if(this.id == 'femalelocation'){
                 top1 = $(this).height()+11;
                 $(this).after(" <div class=\"searchPOP1 noPlaceFound\" style=\"width:99%;position:absolute;top:"+top1+"px;\"><span>No Result found<span><br><span><a id=\"addPlace\" href=\"javascript:void(0)\" onclick=\"commonAutoComplete.addFemaleGunMilanPlace()\">Add Your Place</a></span></div>"); 
              }else if(this.id == 'location'){
                 top1 = $(this).height()+11;
                 $(this).after(" <div class=\"searchPOP1 noPlaceFound\" style=\"width:99%;position:absolute;top:"+top1+"px;\"><span>No Result found<span><br><span><a id=\"addPlace\" href=\"javascript:void(0)\" onclick=\"commonAutoComplete.addMaleGunMilanPlace()\">Add Your Place</a></span></div>");  
              }else{
                 top1 = $(this).height()+20;
                 $(this).after(" <div class=\"searchPOP1 noPlaceFound\" style=\"width:99%;position:absolute;top:"+top1+"px;\"><span>No Result found<span><br></div>");
                 setTimeout(function(){  $(".noPlaceFound").remove(); },3000);
              }
              //setTimeout(function(){  $(".noPlaceFound").remove(); },3000);
              $(this).val('');
           }else{
               $(".noPlaceFound").remove();  
           }
           $(this).removeClass("input-loader");
           //$(this).val('');
      },
      minLength: 3,
      topsearch:topsearch,
      select: callback,
      position:pos,
      loaderId:loaderId,
      focus:function(){},
      close:function(){
            if(topsearch == 'topsearch'){
             $(this).val('');
            } 
              
       },
     });
     //alert(topsearch);
     commonAutoComplete.custumAutocompleteRender();

    },
    addPlace:function(){
        $.ajax({
           url:'/get-country?nocache=true',
           dataType: 'json',
           success: function(response) {
               var template = $("#placeOfBirthTemplate").html();
               if(typeof(response.data)!="undefined" && response.data!=""){
                    pobData = Mustache.render(template, response.data);
                    $("#pobPlace").before(pobData);
                    $('select.styleds').customSelect();
                    $('select.styleds').show();
                    $("#pobPlace").attr("style","display:none;");
                    $(".noPlaceFound").remove();
                    frontend.setModules('astro-bodyContainer1','astroCommon-300');
               }
           }
        }); 
    },
    addFemaleGunMilanPlace:function(){
        $.ajax({
           url:'/get-country?nocache=true',
           dataType: 'json',
           success: function(response) {
               var template = $("#placeOfBirthFemaleTemplate").html();
               if(typeof(response.data)!="undefined" && response.data!=""){
                    pobData = Mustache.render(template, response.data);
                    $("#femalelocationMain").before(pobData);
                    $('select.styled.styledss').customSelect();
                    $('select.styled.styledss').show();
                    $("#femalelocationMain").attr("style","display:none;");
                    $(".noPlaceFound").remove();
               }
           }
        }); 
    },
    addMaleGunMilanPlace:function(){
        $.ajax({
           url:'/get-country?nocache=true',
           dataType: 'json',
           success: function(response) {
               var template = $("#placeOfBirthMaleTemplate").html();
               if(typeof(response.data)!="undefined" && response.data!=""){
                    pobData = Mustache.render(template, response.data);
                    $("#locationMain").before(pobData);
                    $('select.styled.styleds').customSelect();
                    $('select.styled.styleds').show();
                    $("#locationMain").attr("style","display:none;");
                    if($("#locationCountry").length>0){
                        $("#locationCountry").attr("style","display:none;");
                    } 
                    $(".noPlaceFound").remove();
                    $("#msglocation_country_name").hide();
               }
           }
        }); 
    },
    custumAutocompleteRender: function() {
        $.ui.autocomplete.prototype._renderItem = function(ul, item) {
        if(this.options.topsearch != ''){
           switch(this.options.topsearch){  
            case 'topsearch':   
                $(ul).addClass("searchPOP");
            break;
            case 'topsearchtouch':
                  $(ul).addClass("searchPOPMobile");
            break;
            case 'topsearchmobile':   
                $(ul).addClass("searchPOPMobile");
            break;
           }
           
           html = "<a href="+item.url+" class=\"\">"+item.value+"</a>";
        }else{
             html = "<a href=\"javascript:void(0);\" class=\"\">"+item.value+"</a>";
        } 
        
       
        return $("<li id='result_" + item.id + "'></li>")
                    .data("item.autocomplete", item)
                    .append(html)
                    .appendTo(ul);
        };
       /*$.ui.autocomplete.prototype. _renderMenu =function( ul, items ) {
          if(this.options.topsearch != ''){
            $(ul).addClass("searchPOP");
           } 
           var that = this;
           $.each( items, function( index, item ) {
              that._renderItem( ul, item );
           });
       }*/
             
    },
    handleSearchClick:function(event,ui){ 
        window.location.href = ui.item.url; 
    }
    
}
var headerPop = {
    mainHeaderPop:function(){
        this.bindHidePop();
        this.stopPropogation();
        this.bindExpendPop();
    },
    bindHidePop:function(){ 
      $('html').click(function() {
            $(".openPopMenuDiv").each(function(i,obj){
                $(obj).hide();
            });
      });
    }, 
    stopPropogation:function()
    {
            $(".openPopMenu").each(function(i,obj)
            {  
                $(obj).click(function(event){
                  event.stopPropagation();
                 });
               }
             );
            $(".openPopMenuDiv").each(function(i,obj)
            { 
               $(obj).click(function(event){
                 event.stopPropagation();
                });
            }
        );    
            
    },
    bindExpendPop:function(){
        $(".openPopMenu").each(function(i,obj){
            $(obj).click(function(){
                menuDiv = $(this).attr('id')+'Menu';
               // alert($("#"+menuDiv).length);
                if($("#"+menuDiv).length < 0){
                   return; 
                }else{
                   if($("#"+menuDiv).is(':visible') === false){
                       $(".openPopMenuDiv").each(function(i,obj){
                            $(obj).hide();
                        }); 
                      $("#"+menuDiv).show();
                      // alert(menuDiv);
                   }else{
                       $("#"+menuDiv).hide();
                   } 
                }
            });
                       
        });
    }
  }
   

