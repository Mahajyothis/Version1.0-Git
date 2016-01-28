<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
  <title><?php echo $lang['title']; ?></title>

  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="<?php echo $_POST['base'].'assets/css/Mahajyothis.css';?>" />
  <link rel="stylesheet" href="<?php echo $_POST['base'].'assets/css/style.css';?>" />

  <!-- Scripts are at the bottom of the page -->



  <!-- Scripts are at the bottom of the page -->
  <style type="text/css">
    .ui-widget-content {
      background: #B15568 !important;
    }
  </style>
</head>
<div class="container container-zod">
  <div class="col-md-7 col-zod-main" > 
  <center>
    <div class=" col-zod-inner">
      <h2 class="text-center" style="color:#FF7300"><strong><?php echo $lang['heading']; ?></strong></h2>
      <p><?php echo $lang['description']; ?></p>
      <form id="zform" class="zform" name="zform" method="post" >
        
         <select id="z_month" name="z_month" class="col-md-5">
         <?php 

            $mnth= array('zero','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
            for($i=1;$i<13;$i++){
              echo "<option value=". $i .">".$mnth[$i]."</option>";
            }

         ?>
         </select>
       
       <select id="z_date" name="z_date" class="col-md-5">
       <?php 
          for($i=1;$i<31;$i++){
              echo "<option value=".$i.">".$i."</option>";
          }
         ?>
       </select> 
       <center>
        <button type="submit" class="btn btn-mav btn-xs zod-submit"><?php echo $lang['submit']; ?></button>
       </center>
     
        <div class="col-md-12 zodiac-sign">
          
            <img class="zodi-img col-md-2" src="">
       
          <div class="col-md-7">
            <h4 class="zodi-head"><?php echo $lang['aquarius']; ?></h4>
            <p class="zodi-desc"><?php echo $lang['aquarius_desc']; ?></p>
          </div>
        </div>
      

  </form>
</div>
</center>
</div>

</div> 
 
</body>

</html>