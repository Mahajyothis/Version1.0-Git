<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Following_process extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
	
	
		$uID = $this->input->get('uid');
		$custID = $this->input->get('cuid');
		$status = $this->input->get('status');
		if(ISSET($status)){
			if(ISSET($un)){
				$unfollow="DELETE FROM `userfollowing` WHERE `cID`='$custID' AND `custID`='$uID'";
		 $this->db->query($unfollow);
				
			}
			else{
		$unfollow="DELETE FROM `userfollowing` WHERE `cID`='$custID' AND `custID`='$uID'";
		 $this->db->query($unfollow);
			}
		 
		 
		
		}
		else
		{
$date=date("Y-m-d");

$follow_validate="SELECT * FROM `userfollowing` WHERE `custID`='$uID' AND `cID`='$custID'";
$f_validate=$this->db->query($follow_validate);
if($f_validate->num_rows() == 0){

		$following="INSERT INTO `userfollowing`(cID,custID,ufNew,ufDate)VALUES('$custID','$uID',1,'$date')";
		  $this->db->query($following);
		echo "Following";
		$follower="INSERT INTO `userfollowus`(cID,custID,ufNew,ufDate)VALUES('$custID','$uID',1,'$date')";
		  $this->db->query($follower);
}
else{
	echo "Already Following";
}
		}

		
}
}



?>