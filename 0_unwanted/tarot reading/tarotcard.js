var tarotcard = {
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
    /*.jcarouselAutoscroll()*/
        /*.on('mouseover',function(e){
            $(this).jcarouselAutoscroll('stop');
        }).on('mouseout',function(e){
            $(this).jcarouselAutoscroll('start');
        });*/

        $('.jcarousel-control-prev')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .jcarouselControl({
                target: '+=1'
            });
        
         $('.jcarousel-control-next').hover(function (){
            run_next = setInterval(function(){$('.jcarousel-control-next').click()},1000);
         },function (){
             clearInterval(run_next);
         });
         $('.jcarousel-control-prev').hover(function (){
            run_prev = setInterval(function(){$('.jcarousel-control-prev').click()},1000);
         },function (){
             clearInterval(run_prev);
         });      

        
    });
  },
  
  selectTarotCard:function(cardNumber, spreadType){
      
        $("#selCardText").show();
        $("#cardChosenClick_"+cardNumber).removeAttr('onclick');
        var cardImage = "";
      
        $.each(tarotListData, function(k, v) {
            
            if(v.key == cardNumber){
                cardImage = v.value;
            }
        });
        
        var counter = 1;
        for(var i=1;i<= spreadType;i++){
            if($("#selectedTarotSet_"+i).val()){
                counter = counter+1;
				
            }
        }        
		if(counter<=spreadType){
			$("#count").attr("value","Select "+(3-counter)+" more card");
			if(counter==1){
			$(".back-width").show();
			}
			if(counter==2){
				$("#selectedTarot_2").show();
			}
			if(counter==3){
				$("#selectedTarot_3").show();
				 
			}
		}
        if(counter > spreadType){return;}
        $("#selectedTarotSet_"+counter).val(cardNumber);
        $("#cardChosen_"+cardNumber).attr('src',cardImage);  
        $("#selectedTarot_"+counter).attr('src',cardImage);   
        
        if(counter == spreadType){tarotcard.showResult(spreadType);}
              
  },
  showResult:function(spreadType){      
      var cardNumbers = "";
      for(var i=1;i<= spreadType;i++){
          if(cardNumbers == ""){
            cardNumbers = $("#selectedTarotSet_"+i).val();
          }else{
            cardNumbers = cardNumbers + "," +$("#selectedTarotSet_"+i).val();  
          }
      }
      var url      = window.location.href + "?cards=" + cardNumbers +"&spread=" + spreadType; 
	 
	    $.ajax({
         url: "http://version.mahajyothis.net/tarotnew?cardNumbers[]="+cardNumbers
        }).done(function( data ) {
          $("#tarot").html(data);
        }); 
      $("#resultBtn").show();
	  $("#count").hide();
	  $(".gif-img").hide();
      $("#resultBtnHref").attr("href", url);
      //window.location.href = url;
  }

}