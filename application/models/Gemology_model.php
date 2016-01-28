<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gemology_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
	}

	function get_gemology(){
	
		$name = $this->input->post('name');
		$dob = $this->input->post('dob');
           //Seperate the date,month,year from input
		$d = explode("-", $dob);

		$num = array(0,1,2,3,4,5,6,7,8,9,1,2);

		$n =9;
		$dyy = fmod($d[0],$n);
		$dd1 = fmod($d[2],$n);
		$dd = ($dd1 == 0)? "9":$dd1;
		$dm1 = ltrim($d[1],'0')-1;
		$dm = $num[$dm1];
		
		$dy = 8-$dyy;
		//echo ($dd.'+'.$dm.'-'.$dy);
		//Calculate the total value with corresponding date,month and year values
		$luck =($dd+$dm)-$dy;

		if($luck <= 0) {
			$lucky = (9+$luck);
		}
		else if($luck > 9)  {
			$lucky = ($luck-9);
		}		
		else {
			$lucky = $luck;
		}

		// echo $lucky;
		//Select the descripton and stones based on lucky number
		$sql = "SELECT * FROM `gemology` WHERE gID = '$lucky'";
		
		$query = $this->db->query($sql);
		$row1 = $query->result_array();
		$row = json_encode($row1);
		//print the value
		print_r($row);
	}
}




?>