<?php
session_start();
$id=$_SESSION['custID'];
$file_formats = array("jpg", "png", "gif", "bmp");

$filepath = "C:/wamp/www/new/images/profile/";

 $con=mysqli_connect("localhost","mavrf","102238066","mavrf");
if ($_POST['submitbtn1']=="Upload") {
$photo_type=$id;
 $name = $_FILES['photo1']['name']; // filename to get file's extension
 $size = $_FILES['photo1']['size'];
 
 if (strlen($name)) {
 	$extension = substr($name, strrpos($name, '.')+1);
 	if (in_array($extension, $file_formats)) { // check it if it's a valid format or not
 		if ($size < (2048 * 1024)) { // check it if it's bigger than 2 mb or no
 			/*$imagename = md5(uniqid() . time()) . "." . $extension;*/
 			$imagename=$photo_type.'_'.$name;
			$insert=mysqli_query($con,"INSERT INTO `personalphoto` (custID,photo)VALUES('$id','$imagename')");
			$tmp = $_FILES['photo1']['tmp_name'];
 				if (move_uploaded_file($tmp, $filepath . $imagename)) {
 					echo '<img class="preview" alt="" src="'.$filepath.'/'. $imagename .'" />';
 				} else {
 					echo "Could not move the file.";
 				}
 		} else {
 			echo "Your image size is bigger than 2MB.";
 		}
 	} else {
 			echo "Invalid file format.";
 	}
 } else {
 	echo "Please select image..!";
 }
 exit();
}
?>