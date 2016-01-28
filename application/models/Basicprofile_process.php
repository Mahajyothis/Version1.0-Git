<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Basicprofile_process extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();	

		
	}
	
	public function getUserData()
	{
	

			$profile_row = $this->session->userdata('profile_data');
			$uid = $this->input->get('uid');
			$cid = $this->input->get('cid');
			$cat = $this->input->get('cat');
			$act = $this->input->get('act');
			$pid = $this->input->get('pid');
			$rid = $this->input->get('rid');
			
			
			if(ISSET($_GET['network'])){
				$sql = "SELECT *,(SELECT ciD FROM `userfollowing` WHERE `cID`='".$this->session->userdata['profile_data'][0]['custID']."' AND `custID`='$uid' ) AS followers,
						(SELECT uID FROM `recentactivity` WHERE `custID`='".$this->session->userdata['profile_data'][0]['custID']."' AND `raAction`='LIKE' AND `raCategory`='PROFILE' AND `uID`='$uid') AS liked,
						(SELECT COUNT(`uID`) AS `like` FROM `recentactivity` WHERE `uID`='$uid' AND `raAction`='LIKE' AND `raCategory`='PROFILE') AS likes 
						 FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) WHERE cm.`custID`= '$cid'  ";
				
			}else{
				if(!empty($this->session->userdata['profile_data'][0]['custID'])){
					
				
					$sql = "SELECT *,(SELECT ciD FROM `userfollowing` WHERE `cID`='".$this->session->userdata['profile_data'][0]['custID']."' AND `custID`='$uid' ) AS followers,
						(SELECT uID FROM `recentactivity` WHERE `custID`='".$this->session->userdata['profile_data'][0]['custID']."' AND `raAction`='LIKE' AND `raCategory`='PROFILE' AND `uID`='$uid') AS liked,
						(SELECT COUNT(`uID`) AS `like` FROM `recentactivity` WHERE `uID`='$uid' AND `raAction`='LIKE' AND `raCategory`='PROFILE') AS likes 
						
						FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) WHERE cm.`custID`= '$uid'  ";
				}
				else{
			$sql = "SELECT *,(SELECT COUNT(`uID`) AS `like` FROM `recentactivity` WHERE `uID`='$uid' AND `raAction`='LIKE' AND `raCategory`='PROFILE') AS likes  FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) WHERE cm.`custID`= '$uid'  ";
				}
			}
		
		
		$query = $this->db->query($sql);
		
		//$profile_row = $this->session->userdata('profile_data');
		if(ISSET($_GET['r'])){
			$status_update="UPDATE `recentactivity` SET `is_read`='0' WHERE `raCategory`='$cat' AND `raAction`='$act' AND `raID`='$rid' AND `catID`='$pid' AND `CustID`='".$profile_row['0']['custID']."'";
		$update_state = $this->db->query($status_update);
			
		}
		
		
		if(ISSET($_GET['f'])){
			
			$st_update="UPDATE `userfollowing` SET `ufNew`='0' WHERE `custID`='".$profile_row['0']['custID']."' AND `cID`='$uid'";
		$up_state = $this->db->query($st_update);
		
		}
		else{
		 $status_update="UPDATE `recentactivity` SET `is_read`='0' WHERE `raCategory`='$cat' AND `raAction`='$act' AND `catID`='$pid' AND `uID`='".$profile_row['0']['custID']."'";
		$update_state = $this->db->query($status_update);
		
		}
	 

			return $query->result_array();
			
			
			//$this->session->set_userdata('basicprofile_data',$row);

			//return $row ;

		
	}
	
	public function update_views(){
	$uid = $this->input->get('uid');
	if(!empty($this->session->userdata['profile_data'][0]['custID']))
	if($this->session->userdata['profile_data'][0]['custID'] != $uid){
	
		 $date=date("Y-m-d");
		 $datas=array(
		 	'custID' => $this->session->userdata['profile_data'][0]['custID'],
		 	'uID' => $uid,
		 	'tvDate' => $date
		
		 );
		 		 
		return  $this->db->insert('totalviews', $datas); 
		
		}
		
	}
	
	public function getUserDataBS($id){

		return $this->db->select("e.emailID")
			->from('customermaster cm')		
			->join('email e','e.custID=cm.custID','LEFT OUTER')->where('cm.custID',$id)->get()->row();
	
	}
	
	public function storeMails($to,$subject,$message){
		$ins_arr = array(
			'from'		=> $this->session->userdata['profile_data']['0']['emailID'],
			'to'		=> $to,
			'subject'	=> $subject,
			'message'	=> $message,
		);
		$this->db->insert('business_service_mails',$ins_arr);
	
	}
	
		function totalcircles(){
		$uid = $this->input->get('uid');
		$circles="SELECT COUNT(`ufid`) AS `totalcircles` FROM `userfollowing` WHERE `cID`='$uid' OR `custID`='$uid'";
		$t_circle=$this->db->query($circles);
		$total=$t_circle->result_array();
		return $total;
	}
	
}




?>