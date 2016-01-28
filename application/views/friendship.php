<!DOCTYPE html>
<html lang="en">
     <!---headsection--->
	<head>
		<meta charset='utf-8' />
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
		<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="assets/css/mystyle12.css" rel="stylesheet" type="text/css">
        <title><?php echo $lang['title']; ?></title>
		   <link rel="stylesheet" type="text/css" href="assets/css/jquery.jqGauges.css">
		   <script type='text/javascript' src='assets/js/jquery-1.11.3.min.js'>
			<script src="assets/js/jquery-1.5.1.min.js" type="text/javascript"></script>
			<script src="assets/js/jquery.jqGauges.min.js" type="text/javascript"></script>
			<!--[if IE]><script lang="javascript" type="text/javascript" src="assets/js/excanvas.js"></script><![endif]-->
			<script src="assets/js/friendship-meter.js" type="text/javascript"></script>
   
	</head>	
	<!---/headsection--->
	<!---bodysection--->
	<body>
			<!---container section--->
		<div class="container main-dv-wdth" id="reload">			
        <div class="col-md-12 col-md-offset-13">
                           <div class="col-md-12">
                          <img class="col-center-block" src="assets/img/img-1.png" alt="Love Calc" height="50%" width="50%">  
                           </div>						   
			<div id="output">		
			   <div class="col-md-12 middle ">
				<h1 class="fnt"><?php echo $lang['heading']; ?> ?</h1>
					<br>
				</div>
					<br>
					<br>
                    <div class="col-md-12">
                    <img src="assets/img/img 3.png" class="friendship-meter-image" height="100%" width="100%" />
    		<!---type your name--->
		<div class="col-md-3">				
		<div class="col-md-12 field-one your-name">
                        <br>
                        <br>
                        <br>
                        <span class="labl"><?php echo $lang['y_name']; ?></span>
				<input class="form-control  btn-brdr" id="name1" type="text">
					</div>
					 </div>
					 <!---/type your name--->
                    <div class="col-md-6">
			<div class="col-md-12">
                          <div style="text-align:center" id="general" class="img-responsive mrgn-cntr-cls">
                       		<div>
        <div id="jqRadialGauge" class="ui-jqradialgauge">
        <canvas class="friendship-meter-box"></canvas>
        <div class="ui-jqradialgauge-tooltip friendship-meter-inner-box">
        <b>Element: range</b> <br>Start Value: 10<br>End Value: 100</div>
        <canvas class="friendship-meter-box-two"></canvas></div>
    	</div>
                                </div>
				  </div>
				    </div>
				    <!---type your friend name--->
				<div class="col-md-3">
					<div class="col-md-12 field-two your-friend-name">
                      				<br> <br> <br>
                      <span class="labl"><?php echo $lang['f_name']; ?></span>
					<input class="form-control btn-brdr" id="name2" type="text">
					 </div>
					  </div>
				           </div>
			                    </div>
			                     <!---/type your friend name--->
		<div id="error"></div>
			<div class="col-md-12 error-warnings">
			  <span class="check"> <button class="btn btn-warnings" onclick="friendship()"><?php echo $lang['submit']; ?> !!</button></span>
			</div>
		</div>
	   </div>		
	</body>
	<!---/bodysection--->
<!---javascript--->

<script>
 function friendship() {
      var name1 = $("#name1").val();
	  var name2 = $("#name2").val();	
      if(name1!=''&& name2!=''){
        $.ajax({
          url: "<?php base_url();?>friend/friendship_result?name1="+name1+"&& name2="+name2
        }).done(function( data ) {
          $("#general").html(data);
		   $("#error").html("");
		   $(".check").html('<button class="btn btn-warnings checkable" ><?php echo $lang['check_again']; ?></button>');
		   
		  return true;
        });   
      } 	  
	if(name1==''|| name2=='')
	  {
	   $("#error").html("<?php echo $lang['error_message']; ?>");
	  }
    }
  
  </script>
  
  <script>
  $(document).ready(function(){
  $(document).on('click','button.checkable',function(){
	 $("#name1").val('');
	 $("#name2").val('');
	 $("#result").html('');
	 $(".check").html('<button class="btn btn-warnings" onclick="friendship()"><?php echo $lang['submit']; ?> !!</button>');
  });
    });
  
  
  </script>
    
			    
<!----/javascript--->	
</html>