<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Setting_process extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 
		 
		if(isset($_GET['Uname'])){
		
		$Uname=$_GET['Uname'];
		$custID=$_GET['custID'];
		$update="UPDATE `customermaster` SET `custName`='$Uname' WHERE `custID`='$custID'";
		
		$query = $this->db->query($update);
		
		$_SESSION['profile_data'][0]['custName'] = $Uname;
		}
		if(isset($_GET['email'])){
		$email=$_GET['email'];
		$custID=$_GET['custID'];
		$update="UPDATE `email` SET `emailID`='$email' WHERE `custID`='$custID'";
		$updatestatus="UPDATE `customermaster` SET `custStatus`='10' WHERE `custID`='$custID'";
		$query = $this->db->query($update);
		$querystatus = $this->db->query($updatestatus);
		$_SESSION['profile_data'][0]['emailID'] = $email;
		$Eemail=base64_encode($email);
		$config = array(
                
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    ); 
              $this->load->library('email',$config);
              $this->email->from('info@mahajyothis.in', 'Mahajyothis');
              $this->email->to($email);
              $this->email->subject('Email RESET FROM MAHAJYOTHIS');
              $this->email->message('<div class="container" style="margin:0 auto;width: 640px;margin-top:100px;">
				<div class="head" style="width:640px; height:150px;background-image: url(http://www.version.mahajyothis.in/assets/img/forgot.png);">
				<h3 id="first" style="color:white;margin-left:20px;padding:0;font-family: arial;font-size: 18px;padding-top: 22px;">Action required:</h3>
				<h1 id="second" style="color:white;	margin-left:20px;padding:0;	font-family: arial;	font-size: 24px;">Please verify your email address .</h1>
				</div>
					<p id="para" style="color:#676767;margin-top:12px;padding-left:20px;font-family: arial;	line-height: 24px;">					
					Dear user,<br></p>
					<p id="para" style="color:#676767;margin-top:12px;padding-left:20px;font-family: arial;	line-height: 24px;">					
					You recently requested a Email Change.<br>
					<br>
					
					To change your Mahajyothis Email, click here or paste the following <br> 
					 linkinto your browser:<a href="http://www.version.mahajyothis.in?sec='.$Eemail.'&&uid='.$custID.'">http://www.version.mahajyothis.in?sec='.$Eemail.'&&uid='.$custID.'</a>
					<br>
					The link will expire in 24 hours, so be sure to use it right away.<br>					
					
					Thanks for using,
					</p>
					<h2 id="tit" style="margin-top:12px;padding-left:20px;"><b>Mahajyothis ltd<b><h2>
					<h6 id="under" style="font-size: 9px;margin-top: -25px;">Enlightening by the inheritance of india<h6>
					<div class="footer" style="height:30px;	background-color:#8A8A8A;margin-top:-19px;"></div>
			</div>			' );

              $this->email->send();
		
		
		
		
		
		
		
		
		
		
		}
		if(isset($_GET['password'])){
		
		$password=$_GET['password'];
		$custID=$_GET['custID'];
		$update="UPDATE `accessmaster` SET `accPWD`='$password' WHERE `custID`='$custID'";
		
		$query = $this->db->query($update);
		
		
		
		
		}
		if (isset($_POST['submitbtn2'])) {
		$Uname=$_POST['Uname'];
		$id=$_POST['custID'];
		$filepath = "uploads/";
		$file_formats = array("jpg", "png", "gif", "bmp");
		
	$photo_type=$id;
	 $name = $_FILES['photo2']['name']; // filename to get file's extension
	 $size = $_FILES['photo2']['size'];
	 
	 if (strlen($name)) {
	 	$extension = substr($name, strrpos($name, '.')+1);
	 	if (in_array($extension, $file_formats)) { // check it if it's a valid format or not
	 		if ($size < (2048 * 1024)) { // check it if it's bigger than 2 mb or no
	 			/*$imagename = md5(uniqid() . time()) . "." . $extension;*/
	 			$imagename=$photo_type.'_'.$name;
			//$insert=mysqli_query($con,"INSERT INTO `personalphoto` (custID,photo)VALUES('$id','$imagename')");
			$tmp = $_FILES['photo2']['tmp_name'];
			
			  $upload_image = $filepath .basename($_FILES['photo2']['name']);
			 
    $thumbnail = $filepath .'small_' .$imagename;
    $actual = $filepath .$imagename;

    $newwidth = "200"; 
    $newheight = "200";
			
 				if(move_uploaded_file($_FILES['photo2']['tmp_name'], $upload_image )) 
    {
     
        exec('convert '.$upload_image .' -resize '.$newwidth.'x'.$newheight.'^ '.$thumbnail);
        rename($upload_image , $actual);
        
 				$select="SELECT * FROM `personalphoto` WHERE `custID`='$id'";
 				$in= $this->db->query($select);
 				
 				if($in->num_rows() == 1){
 				
 				$update="UPDATE `personalphoto` SET `photo`='$imagename' WHERE `custID`='$id'";
		
		$query = $this->db->query($update);
 				
 				}
 				else{
 				$insert="INSERT INTO `personalphoto`(custID,photo)VALUES('$id','$imagename')";
 				
 				$query = $this->db->query($insert);
 				}
 				$_SESSION['profile_data'][0]['photo'] = $imagename;
 				redirect("http://blog.mahajyothis.net/update_profile.php?username=$Uname&updateAvatar=$imagename&joomlaID=".$this->session->userdata['profile_data'][0]['joomlaID']);
 				redirect('user/'.$Uname,'refresh');
 				
 				
 					//echo '<img class="preview" alt="" src="'.$filepath.'/'. $imagename .'" />';
 				} else {
 					//echo "Could not move the file.";
 				}
 		} else {
 			//echo "Your image size is bigger than 2MB.";
 		}
 	} else {
 			//echo "Invalid file format.";
 	}
 } else {
 	//echo "Please select image..!";
 }
 //exit();
}
		
		
		
		
		
		 
		 }}