<link rel="stylesheet" href="<?php echo base_url('assets/css/style-settings.css'); ?>" />
<style type="text/css">
	.user_msg{
	    background-color: #000000;
	    border-radius: 5px;
	    box-shadow: 0 0 8px 5px #808080;
	    display: none;
	    left: 59%;
	    opacity: 0.8;
	    padding: 5px;
	    position: fixed;
	    top: 48%;
	}
</style>
<div class="settings-page" style="display:block">
<div class="user_msg"><img src="<?php echo base_url('assets/img/done.png'); ?>"></div>

	<div class="settings-header"> <h2 class="text-center"><?php echo $lang['customize']; ?></h2><i class="fa fa-times fa-2x close-iconn"></i></div>
	<div class="settings-inner">
		
		<div class="container">
			<div class="left-section">
				<h3 class="settings_headings"><?php echo $lang['edit']; ?></h3>
				<form name='form' id='pform' >
				<div class="profile_description">
					<div class="profile">
						<p class="prf"><?php echo $lang['profile_picture']; ?></p>
					</div>
					<div class="txt_img">
						<img src="<?php echo base_url('uploads/'.$this->session->userdata['profile_data'][0]['photo'].''); ?>" class="img">
					</div>
					<div class="icon">
						<i class="fa fa-pencil-square-o fa fa-2x edit-pic" id="font_icon"></i>
					</div>
					<input type="file" name="profile_pic" id="profile_pic" style="display:none">
				</div>
				<input type='submit' id='subform' style='display:none'>
				</form>
				<div class="usr_section">
					<div class="usr_name">
						<p class="usr_txt"><?php echo $lang['u_name']; ?></p>
					</div>
					
					<div class="usr_search">
						<input type="text" class="ifieldss" id="uname" placeholder="**************************" value="<?php echo $this->session->userdata['profile_data'][0]['custName'];?>" readonly>
						<span class="error_msg"></span>
					</div>
					
					<div class="usr_icon">
						<i class="fa fa-pencil-square-o pencil" id="edit" ></i>
					</div>
					<div class="button">
						<input type="button" class="cancel" value="<?php echo $lang['cancel']; ?>"></input>
					</div>
				</div>
				<div class="password_section">
					<div class="password_name">
						<p class="paswrd_txt"><?php echo $lang['password']; ?></p>
					</div>
					
					<div class="paswrd_search">
						<input type="text" class="ifieldss" id="upasswd" placeholder="**************************" value="" readonly>
					</div>
					<div class="paswrd_icon">
						<i class="fa fa-pencil-square-o pencil" id="edit" ></i>
					</div>
					 <div class="button">
						 <input type="button" class="save" value="<?php echo $lang['save']; ?>"></input>
					  </div>
				</div>
				<div class="password_section cp" style='display:none'>
					  <div class="password_name confirm-password-clr">
					  <p class="paswrd_txt"><?php echo $lang['c_password']; ?></p>
					  </div>
  
					  <div class="paswrd_search confirm-password-clr"> 
					  <input type="text" class="ifieldss" id="cupasswd" placeholder="********************************" value="">
					  </div>
				</div>
				<div class="usr_section" id="lang_section">
					<div class="usr_name lang_label_color">
						<p class="usr_txt"><?php echo $lang['lang_selection']; ?></p>
					</div>
					
					<div class="usr_search lang_label_color lang_label_width" id="lang_sel_div">
						<select name="u">
							<option value=""><?php echo $lang['lang_sel_default']; ?></option>
							<?php 
							foreach($languageLabels as $key => $value){ 	?>
								<option value="<?php echo $value->language; ?>" <?php if($this->session->userdata['language'] == $value->language) echo 'selected';?>><?php echo $value->label; ?></option>
							<?php } ?>
						</select>
					</div>					
					<div class="button">
						 <input type="button" class="save" id="lang_save_btn" value="<?php echo $lang['save']; ?>"></input>
					  </div>
				</div>
			</div>
			<div class="right-section">
				
				<div id="scroll" class="select-theme">
					<h3 class="settings_headings"><?php echo $lang['select_theme']; ?></h3>
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
				<p class="preview_paddng-cls"><?php echo $lang['preview']; ?></p><img  class="preview_paddng-cls" id="preview" src="" width="100px;">
				<div class="but_tons">
					<input type="hidden"  id="save_id" value="">
					<button type="button" class="save_button" ><?php echo $lang['save']; ?></button>
					<button type="button" class="cancel_button"><?php echo $lang['cancel']; ?></button>
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
document.getElementById("Unameerror").innerHTML = "<?php echo $lang['choose_another_uname']; ?>";
return false;
}


if(Uname!=''){
$.ajax({
url: "<?php echo base_url();?>settings?Uname="+Uname+"&& custID="+custID
}).done(function( data) {

joomlaUpdateUsername(Uname);
$("#Unameerror").html("<?php echo $lang['success']; ?>");
return true;

});
}

if(Uname=='')
{
$("#Unameerror").html("<?php echo $lang['error_message']; ?>");
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
$("#passerror").html("<?php echo $lang['success']; ?>");
return true;
});
}

if(password=='')
{
$("#passerror").html("<?php echo $lang['error_message']; ?>");
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
document.getElementById("emailerror").innerHTML = "<?php echo $lang['email_error']; ?>";
return false;
}



if(email!=''){
$.ajax({
url: "<?php echo base_url();?>settings?email="+email+"&& custID="+custID
}).done(function( data) {
joomlaUpdateEmail(email);
$("#emailerror").html("<?php echo $lang['success']; ?>");
return true;
});
}

if(email=='')
{
$("#emailerror").html("<?php echo $lang['error_message']; ?>");
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
			
			document.getElementById("uploaded1").innerHTML = "<?php echo $lang['photo_error']; ?>";
			document.getElementById("submitbtn2").style.display = "none";
			}
			
			
			

} else {
alert("This browser does not support HTML5.");
}





}
</script>