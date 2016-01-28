var jsso = {
          openSSOPopup:function(env,ru){
              SSO_URL = this.getSsoUrl(env);
              CHANNEL = this.getChannel(env);
                var url= SSO_URL + "/identity/login?channel=" + CHANNEL;
                if(ru !=undefined){
                    url = url+"&ru="+encodeURIComponent(ru);
                }
                if( /iPhone|iPad|iPod|Opera Mini/i.test(navigator.userAgent) ) {
                        window.open(url,'_blank');
                } else {
                        var pop = window.open (url,"sigintwtfbln","scrollbars=1,width=850,height=780");
                        pop.moveTo(315,250);	
                }

        },
        callLogout:function(env){
                SSO_URL = this.getSsoUrl(env);
                CHANNEL = this.getChannel(env);
                var currentURL = window.location.href.split('#')[0];
                 if(env == 'development'){
                    var ru = "http://dev.astro.com/logout?nocache=true";
                 }else{
                      var ru = "http://www.astrospeak.com/logout?nocache=true";
                 }
                var finalURL = SSO_URL + "/identity/profile/logout/external?channel=" + CHANNEL + "&ru="+ encodeURI(ru)           ;
                window.location=finalURL;
        },        
        getSsoUrl:function(env){
           try{ 
            if(env == 'development'){
                SSO_URL = "http://jssostg.indiatimes.com/sso";
            }else{
               SSO_URL = "https://jsso.indiatimes.com/sso"; 
            }
           }catch(e){
               SSO_URL = "https://jsso.indiatimes.com/sso"; 
           }
            return SSO_URL;
        },
        getChannel:function(env){
            try{ 
            if(env == 'development'){
                return 'astrospeak-dev';
            }else{
               return 'astrospeak';
            }
           }catch(e){
               return 'astrospeak';
           }
        
        }
                
}