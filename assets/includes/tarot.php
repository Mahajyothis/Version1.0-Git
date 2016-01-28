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
        <h3 class="text-left"><img width="200" height="100" style="background-color:inherit; border:0px;" src="assets/img/tarot/tarot-logo.png"></h3>
        <span class="glyphicon glyphicon-circle-arrow-left left"></span>
        <ul class="cards-ul">
<?php 
   $cards= array('0'=>'31','1'=>'10','2'=>'11','3'=>'12','4'=>'13','5'=>'14','6'=>'15','7'=>'16','8'=>'17','9'=>'18','10'=>'19','11'=>'20','12'=>'21','13'=>'22','14'=>'23','15'=>'24','16'=>'25','17'=>'26','18'=>'27','19'=>'28','20'=>'29','21'=>'30');
    
   uksort($cards, function() { return rand() > rand(); });


    foreach($cards as $k => $i){
    echo "<li class=".'cards-li'." id=".$i." value=".'http://version.mahajyothis.net/assets/img/tarot/cards/'.$k.'.png'.">    </li>";
  }

?>
</ul>   
<span class="glyphicon glyphicon-circle-arrow-right right"></span>
<div class="tar-arrow-div">
  <img class="tar-arrow-img" src="assets/img/arrow.gif">
  <span class="tar-arrow-text">select 3 Cards</span>
</div>

<ul class="tarot-select">
  <li class="select-img" id=""></li>   
  <li class="select-img" id=""></li>   
  <li class="select-img" id=""></li>   
</ul>
</form>
<button class="btn btn-tar">SHOW RESULT</button>

</div>
</center>
<div class="tarot-info"> 
    <div class="info 1-info">
      <img src="">
      <div class="t-info-1">
        <h2> Know About Your Love & Relationship </h2>
        <h3>Positive traits</h3>
        <p class="tp-1"></p>
        <h3>Negetive traits</h3>
        <p  class="tp-2"> </p>
      </div>
    </div>
    <div class="info 2-info">
         <img src="">
      <div class="t-info-2">
        <h2>Know About Your Finance & Career</h2>
        <h3>Finance</h3>
        <p  class="tp-3"> </p>
        <h3>Carrier</h3>
        <p  class="tp-4"> </p>
      </div>
    </div>
    <div class="info 3-info">
         <img src="">
      <div class="t-info-3">
        <h2>  Your Future Enhancement  </h2>
        <h3>Future</h3>
        <p  class="tp-5"> </p>
      </div>
    </div>
</div>

</div> 

</body>

</html>