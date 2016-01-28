<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Loveanalysis extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		}
		public function index(){
		$na1=$this->input->get('name1');
                $na2=$this->input->get('name2');
//Convert Upper case Strings into lowercase strings
$name1=strtolower($na1);
$name2=strtolower($na2);
//Insert the inputs to the database for future reference
 $data = array(
                   'lmID'=>'',
   'name1' =>$name1 ,
   'name2' => $name2
);

$this->db->insert('lovemeter', $data); 

//Split the charecters 
$characters = str_split($name1);
$characters1 = str_split($name2);
//intialize the val
$val=0;
$val1=0;
//Get the Value for each charecter of user1
foreach($characters as $char){   

$a=array("1"=>"a","2"=>"b","3"=>"c","4"=>"d","5"=>"e","6"=>"f","7"=>"g","8"=>"h","9"=>"i","10"=>"j","11"=>"k","12"=>"l","13"=>"m","14"=>"n","15"=>"o","16"=>"p","17"=>"q","18"=>"r","19"=>"s","20"=>"t","21"=>"u","22"=>"v","23"=>"w","24"=>"x","25"=>"y","26"=>"z");

//Add the value for each charecter
$val += array_search($char,$a);


}
//Get the Value for each charecter of user2
foreach($characters1 as $char1){   

$b=array("1"=>"a","2"=>"b","3"=>"c","4"=>"d","5"=>"e","6"=>"f","7"=>"g","8"=>"h","9"=>"i","10"=>"j","11"=>"k","12"=>"l","13"=>"m","14"=>"n","15"=>"o","16"=>"p","17"=>"q","18"=>"r","19"=>"s","20"=>"t","21"=>"u","22"=>"v","23"=>"w","24"=>"x","25"=>"y","26"=>"z");


$val1 += array_search($char1,$b);


}
//Add the sum of two users value
$e=$val+$val1;
$length = strlen((string) $e);
//echo $length;
echo "
 <script type='text/javascript' src='assets/js/jquery-1.11.3.min.js'></script>
<script type='text/javascript'>
          $(document).ready(function () {
           $('#button').click(function () {
          
             $('#reload').load('".base_url()."lovemeter');
          });
          });
      </script>";
if($length==3){
//calculate and modify the value,if it is less than 999

if($e<500){
$f=round((($val+$val1)/10)+40);

//if it is less tha 500
$sel="SELECT *,".$f." as percentage FROM `LoveDescription` WHERE `lmID`='$f' ";
$query = $this->db->query($sel);
}
else{
$f=round(($val+$val1)/10);
//if it is greater than 500
$sel="SELECT *,".$f." as percentage FROM `LoveDescription` WHERE `lmID`='$f' ";
$query = $this->db->query($sel);	
}
}
elseif($length==4){
//if the length of the value is 4 i.e from 1000 t0 9999
$f=round((($val+$val1)/10)/10);
$sel="SELECT *,".$f." as percentage FROM `LoveDescription` WHERE `lmID`='$f' ";
$query = $this->db->query($sel);
}
elseif($length<=2){
$f=$val+$val1;
//if the length of the value is less than 2 digit i.e >100
$sel="SELECT *,".$f." as percentage FROM `LoveDescription` WHERE `lmID`='$f' ";
$query = $this->db->query($sel);
		
}

return $query->result_array();

}}
		