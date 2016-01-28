<link rel="stylesheet" href="<?php echo base_url('assets/css/style-settings.css'); ?>" />
<div class="settings-page" style="display:block">
	<div class="settings-header"> <h2 class="text-center setting_titless">Customize</h2> <i class="fa fa-times fa-2x close-iconn"></i></div>
	<div class="settings-inner">
	

 <div class="container">
  <div class="left-section">
  <h3 class="settings_headings">Edit</h3>
  <div class="profile_description">
  <div class="profile">
  <p class="prf">Profile pictures</p>
  </div>
  <div class="txt_img">
	<img src="<?php echo base_url('uploads/'.$this->session->userdata['profile_data'][0]['photo'].''); ?>" class="img">
  </div>
  <div class="icon">
  <i class="fa fa-pencil-square-o fa fa-2x edit-pic" id="font_icon"></i>
  </div>
  
  </div>

 
  
  <div class="usr_section">
      <div class="usr_name">
         <p class="usr_txt">User Name</p>
      </div>
  
      <div class="usr_search">
          <input type="text" id="search" placeholder="********************************" value="<?php echo $this->session->userdata['profile_data'][0]['custName'];?>">
      </div>
  <div class="usr_icon">
	<i class="fa fa-pencil-square-o pencil" id="edit" ></i>
  </div>
 <div class="button">
	 <input type="button" class="cancel" value="cancel"></input>
 </div>
 </div>
  <div class="password_section">
  <div class="password_name">
  <p class="paswrd_txt">Password</p>
  </div>
  
  <div class="paswrd_search"> 
  <input type="text" id="search" placeholder="********************************" value="">
  </div>
  <div class="paswrd_icon">
	<i class="fa fa-pencil-square-o pencil" id="edit" ></i>
  </div>
  <div class="button">
	 <input type="button" class="save" value="save"></input>
  </div>
  </div>
  
   <div class="password_section">
  <div class="password_name confirm-password-clr">
  <p class="paswrd_txt">Conform Password</p>
  </div>
  
  <div class="paswrd_search confirm-password-clr"> 
  <input type="text" id="search" placeholder="********************************" value="">
  </div>
  <div class="paswrd_icon confirm-password-clr">
	<i class="fa fa-pencil-square-o pencil" id="edit" ></i>
  </div>
  <div class="button confirm-password-clr">
	 <input type="button" class="save" value="save"></input>
  </div>
  </div>
  
  </div>
  
  
  <div class="right-section">
  
    <div id="scroll" class="select-theme">
   <h3 class="settings_headings">Select a theme</h3>
	 <div class="image_section"> 
	  <div class="selected_themes"><i class="fa fa-check center-block"></i></div>
	 <img src="<?php echo base_url('assets/theme/theme6.jpg'); ?>" class="img1" id="1">
     </div>
	 <div class="image_section1">
	 <div class="selected_themes"><i class="fa fa-check center-block"></i></div>
	 <img src="<?php echo base_url('assets/theme/theme5.jpg'); ?>" class="img1" id="2">
	 </div>
	 <div class="image_section">
	 <div class="selected_themes"><i class="fa fa-check center-block"></i></div>
	 <img src="<?php echo base_url('assets/theme/theme1.jpg'); ?>" class="img1" id="3">
     </div>
	 <div class="image_section1">
	 <div class="selected_themes"><i class="fa fa-check center-block"></i></div>
	 <img src="<?php echo base_url('assets/theme/theme2.jpg'); ?>" class="img1" id="4">
	 </div>
	 <div class="image_section">
	 <div class="selected_themes"><i class="fa fa-check center-block"></i></div>
	 <img src="<?php echo base_url('assets/theme/theme3.jpg'); ?>" class="img1" id="5">
     </div>
	 <div class="image_section1"> 
	 <div class="selected_themes"><i class="fa fa-check center-block"></i></div>
	 <img src="<?php echo base_url('assets/theme/theme4.jpg'); ?>" class="img1" id="6">
	 </div>


   </div>
   <p class="preview_paddng-cls">Preview</p><img  class="preview_paddng-cls" id="preview" src="" width="100px;">
  <div class="but_tons">
	 <button type="button" class="save_button">Save</button>
     <button type="button" class="cancel_button">Cancel</button>
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





        
       