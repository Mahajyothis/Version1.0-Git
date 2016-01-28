<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Charecter_process extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		}
		public function index(){

		  $Name=$this->input->get('Uname');
                    $month=$this->input->get('birth');
		 //Seperate the month,date and day from calendar plugin
		 $time  = strtotime($month);
		$day   = date('d',$time);
		$month = date('m',$time);
		$year  = date('Y',$time);

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
		$selectd="SELECT `lndValue` FROM `luckynumber` WHERE `lnDate`='$day'";
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
		$selectan="SELECT kycDescription FROM `KnowYourCharecter` WHERE `kycID`='$lnum'";
		$queryan = $this->db->query($selectan);
			
		$rowan=$queryan ->result_array();
		 	 
		 //Result Diaplay part after clicking the submit button
		return $rowan;	 
		 }}