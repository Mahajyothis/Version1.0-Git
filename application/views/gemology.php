<?php  $base_url = $_POST['base'];  ?>
  <style type="text/css">
    .ui-widget-content {
      background: #B15568 !important;
    }
  </style>
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
<div class="container container-gem">
  <div class="row-gem">
   <div class="col-md-9" > 
    <div class='circle-container'>
      <a href='#' class='center-gem'><img src='<?php echo $base_url.'assets/img/gemology/6.png';?>' title="RUBY"></a>
      
      <a href='#' class='sat1 circle deg45'><img src='<?php echo $base_url.'assets/img/gemology/3.png';?>'></a>
      <a href='#' class='sat2 circle deg90'><img src='<?php echo $base_url.'assets/img/gemology/5.png';?>'></a>
      <a href='#' class='sat3 circle deg135'><img src='<?php echo $base_url.'assets/img/gemology/4.png';?>'></a>
      <a href='#' class='sat4 circle deg180'><img src='<?php echo $base_url.'assets/img/gemology/1.png';?>'></a>
      <a href='#' class='sat5 circle deg225'><img src='<?php echo $base_url.'assets/img/gemology/9.png';?>'></a>
      <a href='#' class='sat6 circle deg270'><img src='<?php echo $base_url.'assets/img/gemology/8.png';?>'></a>
      <a href='#' class='sat7 circle deg315'><img src='<?php echo $base_url.'assets/img/gemology/7.png';?>'></a>
      <a href='#' class='sat8 circle deg360'><img src='<?php echo $base_url.'assets/img/gemology/2.png';?>'></a>

    </div>
  </div>

  <div class="col-md-3 col-gem">
    <h3><strong><?php echo $lang['title']; ?></strong></h3>
    <form id="gform" class="form" name="gform" method="post" action="">
      <div class="form-group" >
        <label class="col-md-12"><?php echo $lang['name']; ?></label>
        <input id="g_name" name="g_name" type="text" class="col-md-12" placeholder="<?php echo $lang['name']; ?>" >
         <p style="color:red;visibility:hidden;display: initial; position: static;" ><?php echo $lang['error_name']; ?></p> 
     </div>
          
      <div class="form-group">  
       <label class="col-md-12"><?php echo $lang['dob']; ?></label>                  
       <input id="g_dob" name="g_dob" type="text" class="col-md-12" placeholder="<?php echo $lang['dob']; ?>" onclick=" ">
         <p style="color:red;visibility:hidden;display: inline-block" ><?php echo $lang['dob_empty']; ?></p> 
     </div>      

     <div class="form-group">
       <label class="label"><?php echo $lang['age']; ?></label>
       <input id="g_age" name="g_age" type="text" class="col-md-12" placeholder="<?php echo $lang['your_age']; ?>" disabled="disabled">
     </div>
     <p>&nbsp;</p>
     
     <div class="row-fluid">
      <button type="submit" class="btn btn-gem btn-xs pull-right gem-submit"><?php echo $lang['submit']; ?></button>
    </div>
  </form>
  
</div>
</div>

<div class="row row2" >
  <div class="col-md-12 gfirst" style="display:block">
    <div class="col-md-3 col-three">
      <img src="<?php echo $base_url.'assets/img/ring.png';?>" class="" />
      <p class="">
       <?php echo $lang['description_gem']; ?>.
      </p>
    </div>
    <div class="col-md-8 desc_slide">

      <div class="col-md-10 col-nine slid pre-scrollable" style="display:block">
        <b><?php echo $lang['choose_gemstone']; ?>?</b>
        <div class="col-md-2">
          <img src="<?php echo $base_url.'assets/img/gemology/2.png'; ?>"> 
        </div>
        <div class="col-md-8">
          <p><?php echo $lang['gem_slide1']; ?>. 
          </p>
        </div>
      </div>

      <div class="col-md-10 col-nine slid pre-scrollable" style="display:none">
        <b><?php echo $lang['eng_rings']; ?>?</b>
        <div class="col-md-2">
          <img src="<?php echo $base_url.'assets/img/gemology/3.png'; ?>"> 
        </div>
        <div class="col-md-8">
          <p><?php echo $lang['gem_slide2']; ?>. 
          </p>
        </div>
      </div>

      <div class="col-md-10 col-nine slid pre-scrollable" style="display:none">
        <b><?php echo $lang['diamond_eng']; ?></b>
        <div class="col-md-2">
          <img src="<?php echo $base_url.'assets/img/gemology/4.png'; ?>"> 
        </div>
        <div class="col-md-8">
          <p><?php echo $lang['gem_slide3']; ?>. 
          </p>
        </div>
      </div>
      <div class="col-md-10 col-nine slid pre-scrollable" style="display:none">
        <b><?php echo $lang['gem_worm']; ?>? </b>
        <div class="col-md-2">
        <img src="<?php echo $base_url.'assets/img/gemology/5.png'; ?>"> 
        </div>
        <div class="col-md-8">
          <p><?php echo $lang['gem_slide4']; ?>.
          </p>
        </div>
      </div>


      <div class="col-md-10 col-nine slid" style="display:none">
        <b><?php echo $lang['planets_numbers']; ?></b>
        <div class="col-md-2">
          <img src="<?php echo $base_url.'assets/img/gemology/9.png'; ?>"> 
        </div>
        <div class="col-md-8">
          <p><?php echo $lang['gem_slide5']; ?>. 
          </p>
        </div>
      </div>


    </div>

  </div>
  <div class="col-md-12 gsecond" style="display:none">
    <div class="col-md-3 gem-op-left">
     <div class="col-md-12"><i class="lucky-num">5</i><span><?php echo $lang['lucky_number']; ?></span></div>
     <div class="col-md-12"><img class="lucky-ring"  src="<?php echo $base_url.'assets/img/gemology/8.png';?>" ><span><?php echo $lang['lucky_stone']; ?></span></div>
     
   </div>
   <div class="col-md-8 gem-op-right">
     <div class="col-md-12">
      <h3 class="text-left"><?php echo $lang['description']; ?></h3>
      <p class="desc"> </p>

    </div>
  </div>
</div>

</div>     
</div>     

<script type="text/javascript">
  function rings(){
 var pos = $('.center-gem').position(),
 radiusSat = $('.sat1').width() * 1,
 radius = $('.center-gem').width() * 1,
 cx = pos.left + radius,
 cy = pos.top + radius,
 x, y, angle = 0, angles = [],
 spc = 360 / 8,
 deg2rad = Math.PI / 180,
 i = 0;

 for(;i < 9; i++) {
  angles.push(angle);
  angle += spc;
}

/// space out radius
radius += (radiusSat + 10);
loop();        

  function loop() {


    for(var i = 0; i < angles.length; i++) {

      angle = angles[i];

      x = cx + radius * Math.cos(angle * deg2rad);
      y = cy + radius * Math.sin(angle * deg2rad);

      $('.sat' + i).css({left:x - radiusSat, top:y - radiusSat});

      angles[i] = angles[i] + 1;
      if (angles[i] > 360) angles[i] = 0; 


    }   

  window.requestAnimationFrame(loop);


}

}

$('#g_dob').datepicker({
  dateFormat:'yy-mm-dd',
  changeMonth:true,
  changeYear:true,
  yearRange:'-40:5-',
  onSelect : function(){
    $('#g_dob').val(this.value);                  

    function calculateAge(birthday) {
      var now = new Date();
      var past = new Date(birthday);
      var nowYear = now.getFullYear();
      var pastYear = past.getFullYear();
      var age = nowYear - pastYear;

      return age;
    };

    $('#g_age').val(calculateAge(this.value));
  }
});
</script>