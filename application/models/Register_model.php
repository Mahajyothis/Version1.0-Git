<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Register_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		

	}
	public function chk_user($user){
		$this->db->where('custName', $user);
		$query = $this->db->get('customermaster');
		if($query->num_rows() > 0 ){
			return 3;
		}
			return 4;
	}

	public function register_one(){

		$username = $_POST['uname'];
		$email =  $_POST['email'];
		$en_pass=  $_POST['password'];
		$crypt_options = array(
		'cost' => 12
		);
		$password = password_hash($en_pass, PASSWORD_BCRYPT,$crypt_options);
		$this->db->where('emailID', $email);
		$query = $this->db->get('email');
		
		if( $query->num_rows() > 0 ){ 
		
		echo 2; 		
		
		} 
		else { 
		function generateUniqueToken($number)
				{
				   $arr = array('a', 'b', 'c', 'd', 'e', 'f',
				                'g', 'h', 'i', 'j', 'k', 'l',
				                'm', 'n', 'o', 'p', 'r', 's',
				                't', 'u', 'v', 'x', 'y', 'z',
				                'A', 'B', 'C', 'D', 'E', 'F',
				                'G', 'H', 'I', 'J', 'K', 'L',
				                'M', 'N', 'O', 'P', 'R', 'S',
				                'T', 'U', 'V', 'X', 'Y', 'Z',
				                '1', '2', '3', '4', '5', '6',
				                '7', '8', '9', '0');
				   $token = "";
				   for ($i = 0; $i < $number; $i++) {
				       $index = rand(0, count($arr) - 1);
				       $token .= $arr[$index];
				   }
				       return $token;
				}
		
		$verificationCode = generateUniqueToken(20); 
		
		$sql_1 = "INSERT INTO `customermaster`(`custName`, `custStatus`,`joomlaPWD`) VALUES(" .$this->db->escape($username).",'10','$en_pass' )";
		$this->db->query($sql_1);
		$custId = $this->db->insert_id();
		
		// coockie for joomla blog
  		setcookie('uid4joomla', $custId, time() + 86400, "/");
  		
		$sql_2 = "INSERT INTO `email`(`custID`, `emailID`,`security`) VALUES(".$custId.",".$this->db->escape($email).",".$this->db->escape($verificationCode).")";
		$this->db->query($sql_2);

		$sql_3 = "INSERT INTO `accessmaster`(`custID`, `accPWD`, `theme`) VALUES( ".$custId.",".$this->db->escape($password).",1)";
		$this->db->query($sql_3);			

			
		echo ($this->db->affected_rows());
		
		/************MAIL *************************/
					
			
			
			  
			  $link = base_url()."home/verify/".$verificationCode."/".$custId."#continue_two?id=".$custId; 
			$message="<!DOCTYPE html>
			 			 <html>
						<head>
							<title>MAHAJYOTHIS Mail</title>
						</head><body>
							<div class='container1' style=' height:700px; margin:0 auto; width:640px; float:none; margin-top:80px; ' >
							
							<div  class='header'  style='height:150px; width:640px;  background-image: url(http://www.mahajyothis.net/assets/img/email.png);  '>
							<br>
							
							<p><font style='color:#ffffff;font-size:19px;font-family:calibri;'> Action Required: </font></p>
							<p> <font style='color:#ffffff ;font-size:23px; font-family:calibri;'><b> Please verify your e-mail address</b></font></p>
							</div>
							<div style='content'>
							<br>
							<p style='font-size:18px;font-family:calibri;'><b> Dear Valued Mahajyothis.net customer,</b></p>
							
							<p style='font-size:18px;font-family:calibri;'> We noticed that you have to verify your e-mail address. </p>
							<p style='font-size:18px;font-family:calibri;'> Your Account details&#58;&#45;</p>
							<p style='font-size:18px;font-family:calibri;'><b> Email:</b>".$email."<p>
							<p style='font-size:18px;font-family:calibri;'> <b>Password:</b>".$en_pass."<p>
							<p style='font-size:18px;font-family:calibri;'>To do so please click the button below. You will not be allowed to log in to your Mahajyothis account. we are verifying the ownership of this e-mail address.<p>
							<p style='font-size:18px;font-family:calibri;'> Without timely verification you can't fully manage your domain and we will be required to put any hosted content on hold.</p>
							<a href=".$link."><button style='background-color: peru;
							    height: 55px;
							    margin-left: 34%;'> <font style='color:#ffffff'>verify your e-mail address</font></button></a>
							<p style='font-size:18px;font-family:calibri;'> Thanks for being a Mahajyothis.net customer</p>
						<br>
							<p style='font-size:18px;font-family:calibri;'> Sincerly,</p>
							<p style='font-size:18px;font-family:calibri;'> <b>Mahajyothis Limited</b></p>
							<p style='font-size:13px;font-family:calibri;'> Enlightining the inheritance of india</p>
							 
							</div>
							<div  id='bottomcolorsection'style='background:#8A8A8A; height:20px; width:640px;'>
							</div>
							 </div>
							
							
								    
							</body></html>";
			
			
			$this->load->library('email');
			    	$config['protocol'] = 'sendmail';
			        $config['mailpath'] = '/usr/sbin/sendmail';
			        $config['charset'] = 'iso-8859-1';
			        $config['wordwrap'] = TRUE;
			        $config['mailtype'] = 'html';
			
			        $this->email->initialize($config);
		
			$this->email->from('mahajyothis@gmail.com', 'MAHAJYOTHIS');
			$this->email->to($email);
			$this->email->cc('another@another-example.com');
			$this->email->bcc('them@their-example.com');
			
			$this->email->subject('MAHAJYOHTIS VERIFICATION');
			$this->email->message($message);
			
			$this->email->send();
			
			//echo $this->email->print_debugger();
				
		}		
		
		
	}

	public function register_two(){
	          
                //print_r($_POST);
                $u_id = $this->input->post('cust_id');
                 $filepath = $_SERVER['DOCUMENT_ROOT']."/uploads/";
                  $thumb_filepath = $_SERVER['DOCUMENT_ROOT']."/uploads/thumb/";
		 $name = $u_id.'_'.$_FILES['user_image']['name'];
		 $size = $_FILES['user_image']['size'];
		 $photo_type = $_FILES['user_image']['type'];
		
		/*$tmp = $_FILES['user_image']['tmp_name'];
		if (move_uploaded_file($tmp, $filepath . $name)) {
			echo "uploaded".$_SERVER['DOCUMENT_ROOT'];
		}
		else{
			echo "not_uploaded";
		}		
*/

    $upload_image = $filepath .basename($_FILES['user_image']['name']);
      $upload_thumb_image = $thumb_filepath .basename($_FILES['user_image']['name']);
   
    $thumbnail = $filepath .'small_' .$name;
    $actual = $filepath .$name;

    $newwidth = "200"; 
    $newheight = "200";

    if(move_uploaded_file($_FILES['user_image']['tmp_name'], $upload_image )) 
    {
     
        exec('convert '.$upload_image .' -resize '.$newwidth.'x'.$newheight.'^ '.$thumbnail);
        rename($upload_image , $actual);
       
    }


		
		$pic = $name;
		$fname = $this->input->post('first_name');
		$lname = $this->input->post('last_name');
		$dob = $this->input->post('dob');
	        $gender = $this->input->post('gender');
		$pin = $this->input->post('postal_code');
		$intrest = $this->input->post('intrest');
		$city = $this->input->post('city');
		$district = $this->input->post('district');
		$state = $this->input->post('state');
		$country = $this->input->post('country');
		$Address = $this->input->post('address');

		$sql_11 = "INSERT INTO `personaldata`(perdataID, custID, perdataDOB, perdataFirstName, perdataLastName,perdataGender,perdataInterests,PerdataProfPict)
				VALUES(NULL,'".$u_id."','".$dob."','".$fname."','".$lname."','".$gender."','".$intrest."','".$pic."')";
		$this->db->query($sql_11);
		
		$sql_12 = "INSERT INTO `personalphoto`(`photoID`, `custID`, `photo`) VALUES (NULL,'".$u_id."','".$pic."')";
		$this->db->query($sql_12);
		

		$sql_22 = "INSERT INTO `address`(addID, custID, addrLine1, addrCity, addrDistrict, addrState, addrCountry, addrPostCode) 
					VALUES (NULL,'".$u_id."','".$Address."','".$city."','".$district."','".$state."','".$country."','".$pin."')";
		$this->db->query($sql_22);

		echo ($this->db->affected_rows());
		
		
	}
	public function register_three(){
		$last_id = $_POST['cust_id'];
		$qualification = $_POST['qualification'];
		$profession = $_POST['profession'];
		$industry = $_POST['industry'];
		$description = $_POST['description'];

		$sql_4 = "INSERT INTO `profdata`(profID,custID, profQualification, profProfession, profIndustry, profDesignation) VALUES 	(NULL,'".$last_id."','".$qualification."','".$profession."','".$industry."','".$description."')";
		$this->db->query($sql_4);
		$error = $this->db->error();
		echo ($this->db->affected_rows()); 
	}
	public function get_categories(){
		return $this->db->select('name,id')->from('category')->get()->result();
	
	}
}




?>