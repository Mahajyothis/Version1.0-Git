//------------------ARTICLE TOGGLE--------------------------------//


//------------------ZODIAC TOGGLE--------------------------------//

$('.zodi').on('click',function(){

 $('.zod-content').load(base_url+'zodiac/zodiac_view',{base:base_url});
 $('#zodiac-page').fadeIn('slow');
});

$('.close-zlightbox').on('click',function(){

  $('#zodiac-page').fadeOut('slow');

});




//--------------------GEMOLOGY TOGGLE---------------------------//


$(document).delegate('.circle-container a','mouseover',function(){
  var ele = $('.circle-container');
  
  for(var i = 0; i < 9; i++) {

    ele.children().eq(i).removeClass('sat'+i);

  }


});
$(document).delegate('.circle-container a','mouseleave',function(){
  var ele = $('.circle-container');

  for(var i = 0; i < 9; i++) {

    ele.children().eq(i).addClass('sat'+i);

  }


});
$('.gemo').on('click',function(e){
  e.preventDefault();
   $('.gem-content').load(base_url+'gemology/gemology_view',{base: base_url});
  	rings();
  $('#gemology-page').fadeIn('slow');
  window.history.pushState('Object', 'Title', 'gemology');
});

$('.close-glightbox').on('click',function(){

  $('#gemology-page').fadeOut('slow');

});


$(document).delegate('#gdob','change',function(){

});


$(document).delegate('.gem-submit','click',function(e){

  e.preventDefault();
  var ck_name = /^[a-z ,.'-]+$/i;
  var name = $('#g_name').val();
  var dob = $('#g_dob').val();


  if((!ck_name.test(name)) || (name == '')) {

    $('#g_name').next().css("visibility","visible");
    $('#g_name').focus();
    return false;
  }
  else if(dob == '' ){
    $('#g_dob').next().css("visibility","visible");
    $('#g_dob').focus();
    return false;
  }
  else{
   $.post(base_url+'index.php/gemology',{

    name:name,
    dob:dob

  },function(gemo){           

    $('.desc').text(gemo[0].Description);
    $('.lucky-num').text(gemo[0].gID);
    $('.lucky-ring').attr('src',base_url+'assets/img/gemology/'+gemo[0].gID+'.png');
    $('.gfirst').hide();
    $('.gsecond').fadeIn();

  },'json');
 }

 
});

$(document).delegate('#g_name','keypress',function(e) {
  $(this).next().css("visibility","hidden");

}); 
$(document).delegate('#g_dob','click',function(e) {
  $(this).next().css("visibility","hidden");

});

var i =0;
setInterval(function(){
  i++
  $("div.col-nine:eq("+i+")").slideDown(1500).siblings().slideUp(1500);

  if(i == 5) i=0;
},3000);

$('div.col-nine').mouseover(function(){
  $(this).removeClass('slid');
});
//------------------TAROT TOGGLE--------------------------------//

$(document).delegate('.tar','click',function(){
  c = 0;
 $('.tar-content').load(base_url+'tarotreading',{base:base_url});
 $('#tarot-page').fadeIn('slow');
});

$('.close-tlightbox').on('click',function(){

  $('#tarot-page').fadeOut('slow');

});

//-----------------------------TAROT------------------------------------------/
var c = 0;
$(document).delegate('.cards-li','click',function(){
  if(c != 3){
      var img = $(this).attr('value');
  
      var data = $(this).attr('id');
      
      $(this).css({"background":"url("+img+")","background-position": "center",
        "background-size":" contain","background-repeat": "no-repeat"}).fadeIn();
      var $elie = $(this), degree = 520, timer;

      $('.tarot-select').children().eq(c).attr('id',data).css({"background":"url("+img+")","background-position": "center",
        "background-size":"contain","background-repeat": "no-repeat","visibility":"visible"});

      var show = (c == 2)?  'Done ! See Result':'Select '+ (2-c) + ' more cards';
      $('.tar-arrow-text').html(show);
      
      (c == 2)? $('.btn-tar').fadeIn('slow') : '';
      rotate();
  }
  else 
  {

      return false;
  }



  
  function rotate() {

    $elie.css({ '-moz-transform': 'rotateY(' + degree + 'deg)', '-ms-transform': 'rotateY(0' + degree + 'deg)',
      '-webkit-transform': 'rotateY(' + degree + 'deg)', 'transform': 'rotateY(' + degree + 'deg)','transition': '1s', 
      'transform-style': 'preserve-3d'});  

  }

  c++;


});
var anim = 50;
$(document).delegate('.left','click',function(){
  anim = anim+100;
  $('.cards-ul').children().animate({left:anim+'px',transition: '0.8s'},200);
}); 
$(document).delegate('.right','click',function(){
  anim = anim-100;
  $('.cards-ul').children().animate({left:anim+'px',transition: '0.8s'},200);
});

  //FUNCTION TAROT RESULT**********
  var tarImg = [];
  $(document).delegate('.btn-tar','click',function(){
    $('.select-img').each(function(i){
      tarImg[i] = $(this).attr('id');

    });
     // alert(tarImg);
     $.post(base_url+'tarot',{tarImg : tarImg },function(tarotData){


      $('.tarot-info').fadeIn().focus();

      $('.tp-1').html(tarotData['one'][0].rlPositive);
      $('.tp-2').html(tarotData['one'][0].rlNegative);
      $('div.1-info').find('img').attr('src',base_url+'assets/img/tarot/cards/'+tarotData['one'][0].trImage);

      $('.tp-3').html(tarotData['two'][0].fcFinance);
      $('.tp-4').html(tarotData['two'][0].fcCarrier);
      $('div.2-info').find('img').attr('src',base_url+'assets/img/tarot/cards/'+tarotData['two'][0].trImage);


      $('.tp-5').html(tarotData['three'][0].trFuture);
      $('div.3-info').find('img').attr('src',base_url+'assets/img/tarot/cards/'+tarotData['three'][0].trImage);

    },'json');


   });
   
   
  /*******************CALENDER****************************/

	$(document).delegate('.cal','click',function(){
	  c = 0;
	 $('.cal-content').load(base_url+'calendar',{base:base_url});
	 $('#calendar-page').fadeIn('slow');
	});
	
	$('.close-clightbox').on('click',function(){
	
	  $('#calendar-page').fadeOut('slow');
	
	});