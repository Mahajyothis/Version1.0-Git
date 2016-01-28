$(document).ready(function(){
	 $("#right-inner").hide();
	  $("#right-inner2").hide();
	   $("#right-section1").hide();
    $("#ver-mnu-1").click(function(){
        $("#right-section").toggle();
		  $("#right-section1").hide();
    });
	 $("#ver-mnu-2").click(function(){
        $("#right-section1").toggle();
		  $("#right-section").hide();
    });
	 
	  $("#ver-sm-1").click(function(){
        $("#right-section").toggle();
		  $("#right-section1").hide();
    });
	 $("#ver-sm-2").click(function(){
        $("#right-section1").toggle();
		  $("#right-section").hide();
    });
	 $("#inner-btn1").click(function(){
        $("#right-inner").toggle("slide");
		
    });
	$("#inner-btn11").click(function(){ss
        $("#right-inner2").toggle("slide");
		 
    });

			
			 $("#mble-menu").click(function(){
				 

		$('.left-btn-block').hide();
				 $('.left-btn-block1').show();
				 
			 $("#right-inner").css('width','71%');
					
			});
			
			 $("#mble-menu1").click(function(){
				 
				  $('.left-btn-block').show();
				    $('.left-btn-block1').hide();
					 $("#right-inner").css('width','58.3%');
				 	});
			
			if ($(window).width()<991){
			$('.left-btn-block1').show();
		/*	$('.left-btn-block1').css('width','auto');*/
		  
		  $('.left-btn-block').hide()
		   /*$("#mble-menu1").click(function(){
				 

		$('.left-btn-block1').hide();
				 $('.left-btn-block').show();
				  $('#mble-menu1').css('padding-top','10px');
				   $('.normal-width-rhgt').css('width','50%');
				 
					
			});*/
			}
if ($(window).width()<767){
	 $("#right-of-right").css('width','93%');
	 $("#mble-menu").click(function(){
				 

		$('.left-btn-block').hide();
				 $('.left-btn-block1').show();
				 
			 $("#right-of-right").css('width','93%');
					
			});
			
			 $("#mble-menu1").click(function(){
				 
				  $('.left-btn-block').show();
				    $('.left-btn-block1').hide();
					 $("#right-of-right").css('width','60%');
				 	});
					
					
	 $("#inner-btn1").click(function(){
        $("#right-inner").show();
		
		
    });
	 $(".mnu-pddng1").click(function(){
        $("#right-of-right").hide();
		
		
    });
	 $("#bck-btn").click(function(){
        $("#right-of-right").show();
		 $("#right-inner").hide();
		
    });

	}
//menu slide for mobile ends
});