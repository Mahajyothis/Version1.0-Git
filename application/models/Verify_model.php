<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Verify_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	
	}

	function userEmail_verification($code,$uid){

		$data = "UPDATE customermaster cm JOIN email em ON cm.custID = em.custID SET cm.custStatus = '15' WHERE em.security ='$code' && cm.custID ='$uid'";

		$this->db->query($data);
		
	          return $this->db->affected_rows();  
	}
}




?>