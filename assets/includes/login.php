<?php
session_start();
//include('validation.php'); // Includes Login Script
/*session_start();
if(isset($_SESSION['login_user'])){
header("location:profile.php");
}*/
?>
<div class="modal fade" id="signin" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog signin-dialog">

    <!-- Modal content-->
    <div class="modal-content signin-content">
    <div class="modal-header signin-header">
        <button type="button" class="close" id="close" onClick="window.location.reload()" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="">LOGIN</h4>
      </div>
      <div class="modal-body signin-body">
	  <div id="availability" style="display:initial;"></div>
        <form class="form-signin col-sm-offset-2" id="form_clear"  action="profile.php" >

          <div class="input-group input-group-sm col-md-10">
            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control login-input" placeholder="USERNAME OR EMAIL" aria-describedby="sizing-addon1" id="username" required onkeydown="displaynone()">
          </div>

          <p>&nbsp;</p>

          <div class="input-group input-group-sm col-md-10">
            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control login-input" placeholder="PASSWORD" aria-describedby="sizing-addon1" id="password" required onkeydown="displaynone()">
          </div>

          <p>&nbsp;</p>
          <div class="form-group" >

            <a href="#" style="color:#FA8B1F" class="col-md-5"> Forget Password ?</a>
            <a href="#" style="color:#FA8B1F" class="col-md-5" id="click-register"> Create an Account </a>  
          </div>
          <p>&nbsp;</p>
          <button class="btn btn-md btn-mav col-md-4" type="submit" onclick="return verification()">LOGIN</button>
        </form>
      </div>
      
    </div>

  </div>
</div>
	
<script type="text/javascript">
	function verification() {
   document.getElementById('availability').style.display = "initial";
	
var verification = $("#verification").val();

if(verification == 0){
	
	return false;
}

return true;
	
	

}
function displaynone() {
   document.getElementById('availability').style.display = "none";
}
</script>

	
	
	
	
	
 	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
   <!-- <script src="js/bootstrap.min.js"></script>-->
	

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  
  <script>
  $(document).ready(function () {
    $("#password").keyup(function () {
      var username = $("#username").val();
	   var password = $("#password").val();
      if (username == '') {
        $("#availability").html("");
      }
      else{
        $.ajax({
          url: "login/validation.php?uname="+username+"&& pword="+password
        }).done(function( data ) {
          $("#availability").html(data);
        });   
      } 
    });
  });
  
  </script>
   <script>
  $(document).ready(function () {
    $("#username").keyup(function () {
      var username = $("#username").val();
	   var password = $("#password").val();
      if (username == '') {
        $("#availability").html("");
      }
      else{
        $.ajax({
          url: "login/validation.php?uname="+username+"&& pword="+password
        }).done(function( data ) {
          $("#availability").html(data);
        });   
      } 
    });
  });
  
  </script>
<script>
$(document).ready(function() 
{
    $('#close').on('click', function()
    {
        $("#form_clear").trigger("reset");
    });

    
});
</script>