<link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
<div class="modal fade" id="forgot" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog forgot-dialog">

    <!-- Modal content-->
    <div class="modal-content forgot-content">
    <div class="modal-header forgot-header">
        <button style="color: inherit; opacity: .9" type="button" class="close" id="close2"  data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style=""><?php echo $lang['forgot_password']; ?></h4>
      </div>
      <div class="modal-body forgot-body">
    <!---form action--->
        <form class="form-forgot col-sm-offset-2" id="form_clear2" method="post"  >
     <div id="emailerror" style="color:white;"></div>
          <div class="input-group input-group-sm col-md-10" style="margin-top: 1em">
     
            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
            <input type="email" class="form-control forgot-input" placeholder="<?php echo $lang['enter_email']; ?>" aria-describedby="sizing-addon1" id="forgotemail" name="forgotemail" required onkeydown="displaynone1()">
          </div>
      
          <p>&nbsp;</p>
          <button class="btn btn-sm btn-mav col-md-4 sent_forgot_password" type="button" onclick="return verification1()"><?php echo $lang['send']; ?></button>
        </form>
          <!---/form action--->
      </div>   
    </div>
  </div>
</div>
<!---/modal content--->
<!---java script--->
<script>
$(document).ready(function() 
{
    $('#close').on('click', function()
    {
        $("#form_clear").trigger("reset");
    });

    
});
</script>
<script type="text/javascript">
	function verification1() {
   document.getElementById('emailerror').style.display = "initial";
	var forgot=$("#forgotemail").val();
var verification = $("#verification3").val();
if(forgot == ''){


document.getElementById("emailerror").innerHTML = "<?php echo $lang['enter_email_id']; ?>";

}
re = /\S+@\S+\.\S+/;
if(!re.test(forgot)){
document.getElementById("emailerror").innerHTML = "<?php echo $lang['enter_valid_email']; ?>";

}
if(verification == 0 || verification == ''){
	
	return false;
}

return true;
	
	

}
function displaynone1() {
   document.getElementById('emailerror').style.display = "none";
}
</script>

	
	<script type="text/javascript"> 

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 

</script>	
<script>
$(document).ready(function() 
{
    $('#close2').on('click', function()
    {
        $("#form_clear2").trigger("reset");
    });   
});
</script>




<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
  
  <script>
  $(document).ready(function () {
    $(".sent_forgot_password").click(function () {
      var forgotemail= $("#forgotemail").val();
	
      if (forgotemail== '') {
        $("#emailerror").html("");
      }
      else{
       $.ajax({
          url: "<?php base_url();?>email?forgotemail="+forgotemail,
          dataType: "json"
        }).done(function(data) {
     if(data.password == 0) $("#emailerror").html('Email does not exist');
      else { $("#emailerror").html('Password is Sent to your Email');
       joomlaUpdatePassword(data.password,data.joomlaID);       
       }
        });      
      } 
    });
  });
  
  </script>
  <script>
  function joomlaUpdatePassword(data,joomlaID){

var dataString = 'joomlaUpdatePassword=true'+'&password='+data+'&joomlaID='+joomlaID;
$.ajax({
type: 'POST',
url: "http://blog.mahajyothis.net/update_profile.php",
crossDomain: true,
data: dataString,
dataType: 'json',
success: function(responseData, textStatus, jqXHR) {
}
});
}
</script>

  <!---/javascript--->