<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zodiac_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	
	}

		function zodiac($birthdate) {
 
			   $zodiac = ""; 
			         //Seperate the date and month fro the input
			   list ($month, $day) = explode ("-", $birthdate); 
			         //Check the zodiac sign using the date and month
			   	   if ( ( $month == 3 && $day > 20 ) || ( $month == 4 && $day < 20 ) ) { $zodiac = "Aries"; } 
			   elseif ( ( $month == 4 && $day > 19 ) || ( $month == 5 && $day < 21 ) ) { $zodiac = "Taurus"; } 
			   elseif ( ( $month == 5 && $day > 20 ) || ( $month == 6 && $day < 21 ) ) { $zodiac = "Gemini"; } 
			   elseif ( ( $month == 6 && $day > 20 ) || ( $month == 7 && $day < 23 ) ) { $zodiac = "Cancer"; } 
			   elseif ( ( $month == 7 && $day > 22 ) || ( $month == 8 && $day < 23 ) ) { $zodiac = "Leo"; } 
			   elseif ( ( $month == 8 && $day > 22 ) || ( $month == 9 && $day < 23 ) ) { $zodiac = "Virgo"; } 
			   elseif ( ( $month == 9 && $day > 22 ) || ( $month == 10 && $day < 23 ) ) { $zodiac = "Libra"; } 
			   elseif ( ( $month == 10 && $day > 22 ) || ( $month == 11 && $day < 22 ) ) { $zodiac = "Scorpio"; } 
			   elseif ( ( $month == 11 && $day > 21 ) || ( $month == 12 && $day < 22 ) ) { $zodiac = "Sagittarius"; } 
			   elseif ( ( $month == 12 && $day > 21 ) || ( $month == 1 && $day < 20 ) ) { $zodiac = "Capricorn"; } 
			   elseif ( ( $month == 1 && $day > 19 ) || ( $month == 2 && $day < 19 ) ) { $zodiac = "Aquarius"; } 
			   elseif ( ( $month == 2 && $day > 18 ) || ( $month == 3 && $day < 21 ) ) { $zodiac = "Pisces"; } 
			 //Sent the output to view page
			  		return (lcfirst($zodiac)); 
			} 	

	    /*	$sql = "SELECT * FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) WHERE (cm.`custName`= '$user' OR e.`emailID`='$user') AND  am.`accPWD`='$pass'";
		// echo $sql;
		$query = $this->db->query($sql);
		
		if($query->num_rows() == 1){
			$row = $query->result_array();
			$session_user = array('username'=>$user,'logged_in'=>TRUE);
			unset($row[0]['accPWD']);
			//$this->uri->segment(2) = $user;
			$this->session->set_userdata($session_user);
			$this->session->set_userdata('profile_data',$row);

			return $row[0]['custName']; 

		}	
		else{
			return 2;                                                                                                                                                                                                                
		}*/

		
	
}




?>