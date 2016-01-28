<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Numerology_process extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		}
		public function numerology_result(){
		 //Get the inputs by using ajax
                    $year=$this->input->get('year');
                    $month=$this->input->get('month');
                    $date=$this->input->get('date');
                  $name=$this->input->get('Uname');
//Select the corresponding value for the year
                    $select="SELECT `lnyValue` FROM `luckynumber` WHERE `lnYear`='$year'";
                    $query = $this->db->query($select);
                  
                if($query->num_rows() == 1){
		$val=$query->result_array();
		
		$year1=$val['0']['lnyValue'];
		}
		 //Select the corresponding value for the month
              $selectm="SELECT `lnmValue` FROM `luckynumber` WHERE `lnMonth`='$month'";
               $querym = $this->db->query($selectm);
                 if($querym->num_rows() == 1){
		$val=$querym->result_array();
		
		$month1=$val['0']['lnmValue'];
		}
		 //Select the corresponding value for the day
$selectd="SELECT `lndValue` FROM `luckynumber` WHERE `lnDate`='$date'";
 $queryd = $this->db->query($selectd);
 if($queryd->num_rows() == 1){
		$val=$queryd->result_array();
		
		$date1=$val['0']['lndValue'];
		}
//Add and Subtract the values getting from database using year,month and date
$answer=$date1+$month1-$year1;
//Select the lucky number for the given output from the calculation
$selectans="SELECT `lnaValue` FROM `luckynumber` WHERE `lnAnswer`='$answer'";
$queryans = $this->db->query($selectans);
 if($queryans ->num_rows() == 1){
		$val=$queryans ->result_array();
		
		$lnum=$val['0']['lnaValue'];
		}
		

//Select the character description from database by using the lucky number
$selectan="SELECT * FROM `numerology` WHERE `Number`='$lnum'";
$queryan = $this->db->query($selectan)->result_array();
	
	//Print the numerology result based on the lucky number
    
     
     return $queryan;
    
 }
	


//$result=$month+$date-$year;


//echo $result;


		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 }