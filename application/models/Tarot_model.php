<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tarot_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	
	}

		
	function tarot($picked) {

 		//$picked = $picked.'.jpg';			
 		

		
		 $sql1 = "SELECT * FROM `tarotreading`  WHERE trValue = '$picked[0]'";		
			$query1 = $this->db->query($sql1);
			$row1 = $query1->result_array();

		 $sql2 = "SELECT * FROM `tarotreading`  WHERE trValue = '$picked[1]'";		
			$query2 = $this->db->query($sql2);
			$row2 = $query2->result_array();

		 $sql3 = "SELECT * FROM `tarotreading`  WHERE trValue = '$picked[2]'";		
			$query3 = $this->db->query($sql3);
			$row3 = $query3->result_array();
		

		
		
		print_r(json_encode(array('one' =>$row1, 'two' =>$row2, 'three' =>$row3)));
			  
	} 	

	   	
}




?>