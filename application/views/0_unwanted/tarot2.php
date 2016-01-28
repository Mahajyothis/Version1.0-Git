<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <title>Mahajyothis viewprofile</title>
  
  <style type="text/css">
    .ui-widget-content {
      background: #B15568 !important;
    }
  </style>
</head>
<div class="container container-tar">
  <div class="col-tar-main" > 
    <center>



      <form id="tform" class="tform" name="tform" method="post" >       
        <h3 class="text-left">Tarot card reader</h3>
        <span class="glyphicon glyphicon-circle-arrow-left left"></span>
        <ul class="cards-ul">
<?php 
  $cards= array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25');
  shuffle($cards);
  foreach($cards as $i){
    echo "<li class=".'cards-li'." id=".'tcard1'.">
                <img src=".base_url('assets/img/tarot/cards').'/'.$i.'.png'.">
          </li>";
  }

?>

</ul>   
<span class="glyphicon glyphicon-circle-arrow-right right"></span>
<ul class="tarot-select">
  <li class="select-img" ><img src=""></li>   
  <li class="select-img" ><img src=""> </li>
  <li class="select-img" ><img src=""> </li>      
</ul>


</form>
</div>
</center>
</div> 
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> <!-- jQuery Library -->

<script type="text/javascript">
  var c = 0;
  $(document).delegate('.cards-li','click',function(){
  
    var img = $(this).find('img').attr('src');
 
  $(this).css({"background":"url("+img+")","background-position": "center",
    "background-size":" contain","background-repeat": "no-repeat"}).fadeIn();
  var $elie = $(this), degree = 520, timer;

  $('.tarot-select').children().eq(c).css({"background":"url("+img+")","background-position": "center",
    "background-size":"contain","background-repeat": "no-repeat","visibility":"visible"});
  rotate();

  function rotate() {

    $elie.css({ '-moz-transform': 'rotateY(' + degree + 'deg)','transition': '0.6s', 
      'transform-style': 'preserve-3d'});  
  }
 
  c++;
  if(c > 2) c = 0;
   
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
</script>

</body>

</html>