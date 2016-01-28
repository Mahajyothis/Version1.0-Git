<!DOCTYPE html>
<html lang="en">
	<!---head section--->
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
		<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="assets/css/mystyle1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
		<style>
	
	</style>
	</head>	
	<!---/head section--->
	<!--bodysection-->
	
	<body>		
	
	
	
        <div class="col-md-12 col-md-offset-13" id="reload">
           <div class="col-md-12">
         	 <img class="col-center-block" src="assets/img/couple.png"  width="40%" height="40%;">  
           </div>
	   <div id="general">	   
		<div id="output">
		   <div class="col-md-12 middle">
			<h1 class="fnt"><?php echo $lang['heading']; ?> ?</h1>
			<br>
		   </div>
		        <br>
			<br>
	<!--typeyourname-->
	<div class="col-md-6">
		<div class="col-md-12 para1">
						<h2 class="fnt1" ><?php echo $lang['y_name']; ?></h2>
						</div>
						<br>
						<div class="col-md-12">
						<input class="form-control" id="name1" maxlength="40" type="text">
						</div>
					</div>
					<!--/typeyourname-->
					<!--your partner name-->
				<div class="col-md-6">
					<div class="col-md-12 para2">
					<h2 class="fnt1"> <?php echo $lang['p_name']; ?></h2>
					</div>
					<div class="col-md-12">
					<input class="form-control" id="name2" maxlength="40" type="text">
					</div>
				</div>
				<!--/your partner name-->
				<div id="error" style="text-align: center;
    					color: white;
    					font-family: cursive;"></div>
					<div class="col-md-12">
					<button type="button" onclick="return lovemeter()"  class="btn btn-default col-center-block1"><?php echo $lang['submit']; ?></button>
                   			 </div>
					</div>
					
		</div></div>
		
	</body>
	<!---/body section--->
	<!---javascript actions--->
	 <script src="http://version.mahajyothis.net/assets/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script>
 function lovemeter() {
      var name1 = $("#name1").val();
	  var name2 = $("#name2").val();
	  
      if(name1!=''&& name2!=''){
        $.ajax({
          url: "<?php base_url();?>lovemeter/love_result?name1="+name1+"&& name2="+name2
        }).done(function( data ) {
        
          $("#general").html(data);
		   $("#error").html("");
		  return true;
        });   
        document.getElementById('button').style.display = "initial";
        
        
      } 
	  
	if(name1==''|| name2=='')
	  {
	   $("#error").html("<?php echo $lang['error_msg']; ?>!!");
	  }
    }
  
  </script>
  
     <script type="text/javascript">
          $(document).ready(function () {
           $("#button").click(function () {
           
             $('#reload').load('<?php base_url();?>lovemeter');
          });
          });
      </script>
  
  
  
  
  
  <!---/javascript actions--->
</html>