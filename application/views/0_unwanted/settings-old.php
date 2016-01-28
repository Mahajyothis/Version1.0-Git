<div class="settings-page" style="display:block">
	<div class="settings-header"> <h2 class="text-center">SETTINGS </h2></div>
	<div class="settings-inner">
	<div class="settings-tab">
		<img src="<?php echo base_url('assets/img/settings.png'); ?>"></li>
	</div>
<?php 
//print_r($this->session->userdata('profile_data'));
   
        $user_row = $this->session->userdata('profile_data');
       
        ?>

	<div class="details">
		<div class="group">
			<div class="show-details">
				<label>Username </label>	<span><?php echo $user_row['0']['custName']; ?></span><i class="edit-icon"></i>
			</div>
			<div class="edit-details">
				<!--<p><label>old username</label> <input type="text" name="username" id="username"></p>-->
				<p><label>new username</label> <input type="text" name="username" id="newUname" onkeyup="Unamecheck()"></p>
				<div id="Unavailable" style="text-align:center;"></div>
				<button onclick="return Uname()">Save</button><p id="Unameerror"  style="text-align:center;"></p>
			</div>
		</div>

		<div class="group">
			<div class="show-details">
				<label>Email</label> <span><?php echo $user_row['0']['emailID']; ?></span><i class="edit-icon"></i>
			</div>
			<div class="edit-details">
				<!--<p><label>Old Email</label> <input type="password" name="passwd" id="passwd"></p>-->
				<p><label>New Email</label> <input type="text" name="passwd" id="newEmail" onkeyup="Emailcheck()"></p>
				<p id="Eavailable" style="text-align:center;"></p>
				<button onclick="return email()">Save</button><p id="emailerror" style="text-align:center;"></p>
			</div>
		</div>

		<div class="group">
			<div class="show-details">
				<label>Password</label> <span>***************</span><i class="edit-icon"></i>
			</div>
			<div class="edit-details">
				<!--<p><label>Old Password</label> <input type="password" name="passwd" id="passwd"></p>-->
				<p><label>New Password</label> <input type="password" name="passwd" id="password"></p>
				<button onclick="return password()">Save</button><p id="passerror" style="text-align:center;"></p>
			</div>
		</div>

		<div class="group">
			<div class="show-details">
				<label>profile picture</label>  <span>image here</span><i class="edit-icon"></i>
			</div>
			<div class="edit-details">
			 <form class="uploadform" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>settings">
			<input type="hidden" name="custID" value="<?php echo $user_row['0']['custID']; ?>">
			<input type="hidden" name="Uname" value="<?php echo $user_row['0']['custName']; ?>">
				<input class="btn btn-mav btn-file" type="file" name="photo2" id="user_pic" onchange="readURL(this);" style="display: -webkit-inline-box;clear:both;">
	
		<input type="submit" value="Upload" onclick="button_change1()" name="submitbtn2" id="submitbtn2" style="width: 70px;height:30px;cursor: pointer;display: none;color:navy;    clear: both;
    margin-right: 30%;
    margin-top: 3%;">
		<br>
		<div id="uploaded1" style="height:30px;color:white;"></div>
                       </form>
				
				
			</div>
		</div>

		
	</div>
</div>
</div>
</div>




<script>
function Unamecheck(){
 var Uname = $("#newUname").val();
 
      if (Uname == '') {
        $("#Unavailable").html("");
      }
	 
      else{
        $.ajax({
          url: "<?php echo base_url();?>classes/validation.php?uname="+Uname
        }).done(function( data ) {
       
          $("#Unavailable").html(data);
        });   
      } 



}


</script>

<script>
function Emailcheck(){
 var email = $("#newEmail").val();
 
      if (email == '') {
        $("#Eavailable").html("");
      }
	 
      else{
        $.ajax({
          url: "<?php echo base_url();?>classes/email_validation.php?email="+email
        }).done(function( data ) {
       
          $("#Eavailable").html(data);
        });   
      } 



}


</script>

<script>
 function Uname() {

	  var Uname= $("#newUname").val();
	   var custID=<?php echo $user_row['0']['custID']; ?>;
	   var verification=$("#verification1").val();
	   
	   
	   if(verification == 1){
		 document.getElementById("Unameerror").innerHTML = "Please Choose another username";
		  return false;
	  }
	   
	   
      if(Uname!=''){
        $.ajax({
          url: "<?php echo base_url();?>settings?Uname="+Uname+"&& custID="+custID
        }).done(function( data) {
          
			joomlaUpdateUsername(Uname);
		   $("#Unameerror").html("Updated Successfully");
		   return true;
		  
        });   
      } 
	  
	if(Uname=='')
	  {
	   $("#Unameerror").html("Please Fill up the Above Field");
	   return false;
	  }
    }
	
	
function joomlaUpdateUsername(Uname){
	var joomlaID = '<?php echo $this->session->userdata['profile_data'][0]['joomlaID'];?>';
	var dataString = 'joomlaUpdateUsername=true'+'&Uname='+Uname+'&joomlaID='+joomlaID;
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

function joomlaUpdateEmail(email){
	var joomlaID = '<?php echo $this->session->userdata['profile_data'][0]['joomlaID'];?>';
	var dataString = 'joomlaUpdateEmail=true'+'&email='+email+'&joomlaID='+joomlaID;
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

function joomlaUpdatePassword(password){
	var joomlaID = '<?php echo $this->session->userdata['profile_data'][0]['joomlaID'];?>';
	var dataString = 'joomlaUpdatePassword=true'+'&password='+password+'&joomlaID='+joomlaID;
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
  
<script>
 function password() {
    var newpass
	  var password= $("#password").val();
	    var custID=<?php echo $user_row['0']['custID']; ?>;
	    
      if(password!=''){
        $.ajax({
          url: "<?php echo base_url();?>settings?password="+password+"&& custID="+custID
        }).done(function( data) {
          joomlaUpdatePassword(password);          
		   $("#passerror").html("Updated Successfully");
		  return true;
        });   
      } 
	  
	if(password=='')
	  {
	   $("#passerror").html("Please Fill up the Above Field");
	   return false;
	  }
	  
    }
  
  </script>
  
<script>
 function email() {
    
	  var email= $("#newEmail").val();
	    var custID=<?php echo $user_row['0']['custID']; ?>;
	    var verification1=$("#verification2").val();
	     if(verification1 == 1){
		 document.getElementById("emailerror").innerHTML = "Please choose another Email id";
		  return false;
	  }
	    
	    
	    
      if(email!=''){
        $.ajax({
          url: "<?php echo base_url();?>settings?email="+email+"&& custID="+custID
        }).done(function( data) {
			joomlaUpdateEmail(email);
		   $("#emailerror").html("Updated Successfully");
		 return true; 
        });   
      } 
	  
	if(email=='')
	  {
	   $("#emailerror").html("Please Fill up the Above Field");
	   return false;
	  }
    }
  
  </script>
  
       
<script>
function readURL() {

        var user_pic = document.getElementById("user_pic");
        if (typeof (user_pic.files) != "undefined") {
            var size = parseFloat(user_pic.files[0].size / 1024).toFixed(2);
			if(size<100){
			document.getElementById("submitbtn2").style.display = "initial";
			document.getElementById("uploaded1").innerHTML = "";
			
			}
			else{
			
			document.getElementById("uploaded1").innerHTML = "Please Choose Photo less than 100Kb.";
			document.getElementById("submitbtn2").style.display = "none";
			}
			
			
			
            
        } else {
            alert("This browser does not support HTML5.");
        }
        
            
        
        
        
    }


</script>





<script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.form.js"></script>
        
       