<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Search_process extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
		
			
			}
			function searchresult(){
				
	   $user_row = $this->session->userdata('profile_data');
	   
	   	   $user = $this->input->post('keyword');
	  $u = explode(" ", $user);
	  if(!empty($u[1])){
				$langquery="SELECT *,(SELECT custID  FROM `userfollowing` WHERE `custID`=cm.`custID` AND `cID`=".$user_row['0']['custID']."  ) AS following FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
			   
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) WHERE (pd.`perdataFirstName` LIKE '%$u[0]%' OR pd.`perdataLastName` LIKE '%$u[1]%') AND pd.`custID`!='0' AND cm.`custID`!='".$user_row[0]['custID']."'"; 
				
				}
				else{
				$langquery="SELECT *,(SELECT custID FROM `userfollowing` WHERE `custID`=cm.`custID` AND `cID`=".$user_row['0']['custID']."  ) AS following FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
			   
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) WHERE (pd.`perdataFirstName` LIKE '%$u[0]%' OR pd.`perdataLastName` LIKE '%$u[0]%') AND pd.`custID`!='0' AND cm.`custID`!='".$user_row[0]['custID']."'"; 
				
				}
				
$langresult= $this->db->query($langquery);
return $langresult;
				
			}

		
}




?>