var popup={
    url:"",
    height:"",
    width:"",
    data : "",
    init:function(url,e){
       this.url = url;
       this.width= this.clientWidth();
       this.height = this.clientHeight();
       this.loadContent(url,e);
       },
    
    onError:function(a){
    },
    bindEscapeKey:function(){
        $(document).keyup(function(e){
            if (e.keyCode == 27) {
               /*toset */
               if($("#facebookAutoLogin").length > 0){
                 $.cookie('fb_auto_denied','1', {
                    secure: false,
                    expires: 1
                    }); 
                 popup.onClose();   
               }else{
                popup.onClose();
               }
            }
        });
    },
    clientWidth:function(){
        return this.filterResult (
            window.innerWidth ? window.innerWidth : 0,
            document.documentElement ? document.documentElement.clientWidth : 0,
            document.body ? document.body.clientWidth : 0
           );
    },
    clientHeight:function(){
        if (window.innerHeight) {
            theHeight=window.innerHeight;
        }
        else if (document.documentElement && document.documentElement.clientHeight) {
            theHeight=document.documentElement.clientHeight;
        }
        else if (document.body) {
            theHeight=document.body.clientHeight;
        }
        return theHeight;
    },
    scrollLeft:function(){
        return this.filterResult(
            window.pageXOffset ? window.pageXOffset : 0,
            document.documentElement ? document.documentElement.scrollLeft : 0,
            document.body ? document.body.scrollLeft : 0

            );
    },
    scrollTop:function(){
        return this.filterResult (
            window.pageYOffset ? window.pageYOffset : 0,
            document.documentElement ? document.documentElement.scrollTop : 0,
            document.body ? document.body.scrollTop : 0
            );
    },
    filterResult:function(n_win, n_docel, n_body){
        var n_result = n_win ? n_win : 0;
        if (n_docel && (!n_result || (n_result > n_docel)))
            n_result = n_docel;
        return n_body && (!n_result || (n_result > n_body)) ? n_body : n_result;
    },
    loadContent:function(url,e){
          if(url != '' && url != undefined){
             $type = (popup.data == '')? "GET":"POST";
             $.ajax({
                url:url,
                type:$type,
                data:popup.data,
                dataType:'html',
                cache: false,
               beforeSend:function(){
                    $("#pp_divoverlay").show();
                    $("#"+e).html('<div class="txtCenter" ><img src="/assets/images/frontend/pre_loader.gif" /></div>');
                    popup.onResize(e);
                    $("#"+e).show();
                },
                success:function(data){
                    $("#pp_divoverlay").show();
                    $("#"+e).html('');
                    $("#"+e).hide();
                    $("#"+e).html(data);
                    popup.onResize(e);
                    $("#"+e).show();
                   
                }
            });
        }else{
            $("#pp_divoverlay").show();
            popup.onResize(e);
            $("#"+e).show();
        }
    },
    
    onClose:function(cookieId){
        if(cookieId != undefined && cookieId == 'sp_akasha'){
            $.cookie('sp_pop','1', {
            secure: false,
            expires: ''
            }); 
        }
        $("#pp_loading").hide();
        $("#pp_main").empty();
        $("#pp_main").hide();
        $("#pp_divoverlay").hide();
        		
    },
   
    onResize:function(e){
		
        this.width= this.clientWidth();
        this.height = this.clientHeight();
        var divH = $("#"+e).height();
        var divW = $("#"+e).width();
        var left = (popup.width - divW)/2;
        var top = (popup.height - divH)/2;
        $("#"+e).css('left',left);
        $("#"+e).css('top',top);
	}
}
