<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
	}

	function login_validate(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$sql = "SELECT * FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) WHERE (cm.`custName`= '$user' OR e.`emailID`='$user') AND  am.`accPWD`='$pass' ";
		
		$query = $this->db->query($sql);
		 
		if($query->num_rows() == 1){
		
		
			$row = $query->result_array();
			$session_user = array('username'=>$user,'logged_in'=>TRUE);
			//$this->uri->segment(2) = $user;
			$this->session->set_userdata($session_user);
			return $row ;

		}	

		return false;
	}
}




?>