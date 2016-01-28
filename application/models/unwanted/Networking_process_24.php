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
		$langquery="SELECT * FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
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
		$langquery="SELECT * FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
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
	
		$fg_circles="SELECT COUNT(`ufid`) AS `totalfollowings` FROM `userfollowing` WHERE `cID`=".$user_row[0]['custID']."";
		$fg_circle=$this->db->query($fg_circles);
		$fg_total=$fg_circle->result_array();
		return $fg_total;
	}
	function totalfollowers(){
			$user_row = $this->session->userdata('profile_data');
	
		$fr_circles="SELECT COUNT(`ufid`) AS `totalfollowers` FROM `userfollowing` WHERE `custID`=".$user_row[0]['custID']."";
		$fr_circle=$this->db->query($fr_circles);
		$fr_total=$fr_circle->result_array();
		return $fr_total;
	}
	function people_you_may_now()
    {
		/*
        $user_row = $this->session->userdata('profile_data');

	    $al="SELECT * FROM `userfollowing` WHERE `cID`=".$user_row[0]['custID']."";
	    $exiting=$this->db->query($al);
	    foreach($exiting->result() as $new){
		$fr_circles="SELECT * FROM `customermaster` cm 
		LEFT JOIN `userfollowing` uf ON(uf.`cID`=cm.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID`=cm.`custID`)
		WHERE uf.`custID`=".$new->custID." AND cm.`custID`!=".$user_row[0]['custID']."";
		$fr_circle=$this->db->query($fr_circles);
		
		return $fr_circle;
		*/
	//}
        $query = $this->db->query("select
                                    cust.custID, cust.custName,
                                    pp.photoID, pp.photo
                                    from
                                    customermaster cust
                                    JOIN
                                    personalphoto pp
                                    on pp.custID=cust.custID");
        return $query->result();
		
	}
    public function total_groups()
    {
        $user_row = $this->session->userdata('profile_data');


        $query = $this->db->query("select
                                    mg.grp_name
                                    FROM
                                    `userfollowing` uf
                                    left join group_invitation gi ON gi.custID = uf.custID
                                    left join mahagroups mg ON(uf.cID=gi.uID) WHERE uf.cID=".$user_row['0']['custID']);
        return $query->result();
    }
	
}




?>