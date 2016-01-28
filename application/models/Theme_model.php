<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Theme_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
	}

	function set_theme(){
		$tid = $this->input->post('themeId');
		$cid = $this->input->post('custID');

		$sql = "UPDATE `accessmaster` SET `theme` =  '$tid' WHERE  `custID`='$cid' ";
		
		$query = $this->db->query($sql);
	//---------------THEME--------------

		$tsql = "SELECT * FROM `theme` WHERE themeId = ".$tid."";
		$Tquery = $this->db->query($tsql);
		$theme=$Tquery->result_array();
		
		$this->session->unset_userdata('theme',$theme);
		$this->session->set_userdata('theme',$theme);

		 
		return $this->db->affected_rows();


	}
}




?>