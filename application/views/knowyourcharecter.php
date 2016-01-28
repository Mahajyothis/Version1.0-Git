<!DOCTYPE html>
<html lang="en">

<!---headsection--->
	<head>
	 <!---Google Analytics--->
      <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67272037-1', 'auto');
  ga('send', 'pageview');
</script>
 <!---/Google Analytics--->
		<meta charset='utf-8' />
     <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
        <title><?php echo $lang['title']; ?></title>
		<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">		
		<link href="assets/css/mystyle13.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
       <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />  
   
    <link rel="stylesheet" href="assets/css/runnable.css" />
<style>	
@media (min-width:768px) and (max-width:950px){
body{ width:79%}
.container{ width:80% !important}
}
.ip-field-height{height:3.8em}

	
.btn-clr-cls1{
	color:#fff;
	  background-color: #731F19; background-image: -webkit-gradient(linear, left top, left bottom, from(#731F19), to(#8A2929));
 background-image: -webkit-linear-gradient(top, #731F19, #8A2929);
 background-image: -moz-linear-gradient(top, #731F19, #8A2929);
 background-image: -ms-linear-gradient(top, #731F19, #8A2929);
 background-image: -o-linear-gradient(top, #731F19, #8A2929);
 background-image: linear-gradient(to bottom, #731F19, #8A2929);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#731F19, endColorstr=#8A2929);
	}
@media (max-width:460px){
.refresh-txt{ display:none}
}
</style>
	</head>
	<!---/headsection--->
	<!---bodysection--->
	
	<div id="general">
	<body>
	
	<div class="container">			
        <div class="col-md-12 col-md-offset-13" >
	  <div class="col-md-12">
	   
	    <img class="col-center-block1 img-responsive img-wdth-cls" src="assets/img/find your chrctr img 1.png" alt="know your character"  width=62%>			
							</div>
							<div class="col-md-12" id="secbak">
							<fieldset>
								<!--FirstName-->
								<div class="col-md-12">							
								<div class="col-md-3" id="side" >	
									<span><?php echo $lang['name']; ?></span>						
								</div>
								<div class="col-md-9" style="padding-left: 5px;">											
								   <input class="form-control" id="Uname" type="text" name="fname" placeholder="<?php echo $lang['type_name']; ?>">
								</div>
								</div>
								<!--/FirstName-->
								<!--Dateofbirth-->
								<div class="col-md-12">
								<div class="col-md-3" id="side">	
								   <span><?php echo $lang['dob']; ?></span>						
								</div>
								<div class="col-md-9" style="padding-left: 5px;">
								  
								  <input class="form-control" id="datepicker" type="text" placeholder="<?php echo $lang['select_dob']; ?>">
									
								</div>
								</div>
								<!---/Dateofbirth-->
								<!--Gender-->
								<div class="col-md-12">
								<div class="col-md-3" id="side">	
									<span><?php echo $lang['gender']; ?></span>						
								</div>
								<div class="col-md-9" style="padding-left: 5px; padding-top:1.3%; text-align:left">											
								
								  <label><input type="radio"  name="optradio" style="width: 25px;height: 25px;" required><span class="radio-txt"><?php echo $lang['male']; ?></span></label>

								  <label><input type="radio" name="optradio" style="width: 25px;height: 25px;" required> <span class="radio-txt"><?php echo $lang['female']; ?></span></label>
								
								</div>
								</div>
								<!--/Gender-->
								<!--Hobbies-->
								<div class="col-md-12">
								<div class="col-md-3" id="side">	
									<span><?php echo $lang['hobbies']; ?></span>						
								</div>
								<div class="col-md-9" style="padding-left: 5px;">											
									<select class="form-control" id="hobbie">
                                                 				<option><?php echo $lang['gaming']; ?></option>
                                                 				<option><?php echo $lang['sports']; ?></option>
                                                 				<option><?php echo $lang['arts']; ?></option>
                                                 				<option><?php echo $lang['cooking']; ?></option>
                                                 				<option><?php echo $lang['watching_tv']; ?></option>
                                                			</select>
								</div>
								</div>
								<!--/Hobbies-->
								<!--Favoritefood-->
								<div class="col-md-12">
								<div class="col-md-3" id="side">	
									<span><?php echo $lang['fav_food']; ?></span>						
								</div>
								<div class="col-md-9" style="padding-left: 5px;">											
									<input class="form-control" id="inputdefault" type="text" placeholder="<?php echo $lang['type_fav_food']; ?>">
								</div>
								</div>
								<!--/Favoritefood-->
								<!--Friendslist-->
								<div class="col-md-12">
									<div class="col-md-3" id="side">	
										<span><?php echo $lang['fnd_list']; ?></span>						
									</div>
									<div class="col-md-6" style="padding-left: 5px;">											
										<input class="form-control ip-field-height" id="friendlist" type="text" placeholder="<?php echo $lang['type_fnd_list']; ?>">
									</div>
									<!--/Friendslist-->
									<!--submitbutton-->
									<div class="col-md-3">	
										<button onclick="Chareterknow()" value="submit" class="btn btn-default col-center-block2" style="padding-right:15%; padding-left:15%;color:#fff; background: #A51D1A;
    border: 2px solid #5b0300;
    box-shadow: 0 0 2px 2px #F26021"><?php echo $lang['submit']; ?></button>						
									</div>
								</div>
								</fieldset>
							<div id="error" style="color:navy;text-align:center;"></div>
								
							</div>
						
		</div>
	</div>		
	</body></div>
	<!-- Load jQuery JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
  
    <!-- Load jQuery UI Main JS  -->
    <script src="assets/js/jquery-ui.js"></script>    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="assets/js/dpscript.js"></script>    
	<!---javascript actions--->
<script>
 function Chareterknow() {
 
      var Uname = $("#Uname").val();
	  var birth=$("#datepicker").val();
	 var hobbie=$("#hobbie").val();
	 var friend=$("#friendlist").val();
	
      if(Uname!=''&& birth!='' && hobbie!='' && friend!=''){
        $.ajax({
          url: "<?php base_url();?>knowyourcharecter/charecter_result?Uname="+Uname+"&& birth="+birth
        }).done(function( data ) {
          $("#general").html(data);
		   $("#error").html("");
		 
        });   
        document.getElementById('button').style.display = "initial";
      } 
	  
	if(Uname==''|| birth==''|| hobbie==''|| friend=='')
	  {
	   $("#error").html("<?php echo $lang['error_msg']; ?>");
	  }
    }
  
  </script>
  
<!---/javascript actions--->
	
	
	
	</div>
	<!---/bodysection--->
	 

</html>