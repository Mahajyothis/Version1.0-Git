<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Networking_process extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
	
	}
	function networkfollowlist(){
		$user_row = $this->session->userdata('profile_data');
		$langquery="SELECT pd.`perdataFirstName`,pd.`perdataLastName`,cm.`is_online`,pfd.`profQualification`,ad.`addrState`,cm.`custID`,pp.`photo`,ufg.`cID` FROM `customermaster` cm 
							
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`)
				LEFT JOIN `userfollowing` as ufg ON(ufg.`custID`=cm.`custID`)
				WHERE ufg.`cID`=".$user_row[0]['custID']."  AND cm.`custID`!=".$user_row[0]['custID']."  "; 
				
$langresult= $this->db->query($langquery);
return $langresult;
			
	}
	function networkfollowerlist(){
		$user_row = $this->session->userdata('profile_data');
		$langquery="SELECT pd.`perdataFirstName`,pd.`perdataLastName`,cm.`is_online`,pfd.`profQualification`,ad.`addrState`,cm.`custID`,pp.`photo`,ufg.`cID` FROM `customermaster` cm 
				 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`)
				LEFT JOIN `userfollowing` as ufg ON(ufg.`cID`=cm.`custID`)
				WHERE ufg.`custID`=".$user_row[0]['custID']." AND cm.`custID`!=".$user_row[0]['custID']."  "; 
				
$langresult= $this->db->query($langquery);
return $langresult;
		
	}
	function totalcircles(){
			$user_row = $this->session->userdata('profile_data');
	
		$tcircles="SELECT COUNT(`ufid`) AS `totalnetworks` FROM `userfollowing` WHERE `cID`=".$user_row[0]['custID']." OR `custID`=".$user_row[0]['custID']."";
		$tc_circle=$this->db->query($tcircles);
		$t_total=$tc_circle->result_array();
		return $t_total;
	}
	function totalfollowings(){
			$user_row = $this->session->userdata('profile_data');
	
		$fg_circles="SELECT COUNT(`ufid`) AS `totalfollowings` FROM `userfollowing` WHERE `cID`=".$user_row[0]['custID']." AND `custID`!=".$user_row[0]['custID']." ";
		$fg_circle=$this->db->query($fg_circles);
		$fg_total=$fg_circle->result_array();
		return $fg_total;
	}
	function totalfollowers(){
			$session_user = $this->session->userdata['profile_data'][0]['custID'];
	
		$fr_circles="SELECT COUNT(`ufid`) AS `totalfollowers` FROM `userfollowing` WHERE `custID`=".$session_user ." AND `cID`!=".$session_user ." ";
		$fr_circle=$this->db->query($fr_circles);
		$fr_total=$fr_circle->result_array();
		return $fr_total;
	}
	function people_you_may_now()
    {
		$session_user = $this->session->userdata['profile_data'][0]['custID'];
		return $this->db->query('
				SELECT cm.`custID`,cm.`custName`,pd.`perdataFirstName`,pd.`perdataLastName`,pp.`photo`
				FROM `customermaster` cm
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`)
				WHERE cm.`custID` IN 
				(
					SELECT  uf2.`custID` FROM `userfollowing` uf2 WHERE uf2.`cID` IN 
					(
						SELECT  uf1.`custID` FROM `userfollowing` uf1 WHERE uf1.`cID` = '.$session_user.' 
						UNION 
						SELECT  uf4.`cID` as custID FROM `userfollowing` uf4 WHERE uf4.`custID` = '.$session_user.' 
					)
					
				)
				AND cm.`custID` NOT IN (SELECT  uf3.`custID` FROM `userfollowing` uf3 WHERE uf3.`cID` = '.$session_user.' )
				AND cm.`custID` != '.$session_user.' LIMIT 5')->result();
	}
    public function total_groups()
    {
        $user_row = $this->session->userdata('profile_data');


        $query = $this->db->query("select
                                    mg.grp_name
                                    FROM
                                    `userfollowing` uf
                                    left join group_invitation gi ON gi.custID = uf.custID
                                    left join mahagroups mg ON(uf.cID=gi.uID) WHERE uf.cID=".$user_row['0']['custID']." limit 5");
        return $query->result();
    }
    public function network_result(){
    $user_row = $this->session->userdata('profile_data');
		   $user = $this->input->get('keyword');
	  $u = explode(" ", $user);
	  if(!empty($u[1])){
				$langquery="SELECT * FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
			   	LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) WHERE (pd.`perdataFirstName` LIKE '%$u[0]%' OR pd.`perdataLastName` LIKE '%$u[1]%') AND pd.`custID`!='0' AND cm.`custID`!='".$user_row[0]['custID']."'"; 
				
				}
				else{
				$langquery="SELECT * FROM `customermaster` cm 
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