<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Recentactivity_process extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
	}
	
 function recent()
	{
		$pid = urldecode($this->input->get('pid'));
		$cat=urldecode($this->input->get('cat'));
		$act=$this->input->get('act');
		$profile_row = $this->session->userdata('profile_data');
	
	if($cat=='POST'){
		$sql = "SELECT cm.`custName`,pp.`photo`,p.`postUpdated` as `pDate`,`Title`,p.`postContent` as `Description` FROM `post` p
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = p.`custID`)
				LEFT JOIN `customermaster` cm ON(cm.`custID` = p.`custID`)
				WHERE  p.`postId`=".$pid."";
	}
		
		if($cat=='FORUM'){
		$sql = "SELECT cm.`custName`,pp.`photo`,mf.`dDate` as `pDate`,mf.`titleQue` as `Title`,mf.`bodyQue` as `Description` FROM `mahaforum` mf
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = mf.`custID`)
				LEFT JOIN `customermaster` cm ON(cm.`custID` = mf.`custID`)
				WHERE  mf.`id_que`=".$pid."";
	}
	if($cat=='ARTICLE'){
		$sql = "SELECT cm.`custName`,pp.`photo`,a.`artCreated` as `pDate`,a.`artTitle` as `Title`,a.`artDesc` as `Description` FROM `article` a
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = a.`artCustID`)
				LEFT JOIN `customermaster` cm ON(cm.`custID` = a.`artCustID`)
				WHERE  a.`artID`=".$pid."";
	}
	if($cat=='DISCUSSION'){
		$sql = "SELECT cm.`custName`,pp.`photo`,mf.`dDate` as `pDate`,mf.`titleDis` as `Title`,mf.`bodyDis` as `Description` FROM `discussions` mf
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = mf.`custID`)
				LEFT JOIN `customermaster` cm ON(cm.`custID` = mf.`custID`)
				WHERE  mf.`id_dis`=".$pid."";
	}
	
	
	
		if(ISSET($_GET['p'])){
		$st_update="UPDATE `recentactivity` SET `is_read`='0' WHERE `raCategory`='$cat' AND `raAction`='$act' AND `catID`='$pid' AND `uID`='".$profile_row['0']['custID']."'";
		$up_state = $this->db->query($st_update);
		
		}
		else{
		
		$status_update="UPDATE `recentactivity` SET `is_read`='0' WHERE `raCategory`='$cat' AND `raAction`='$act' AND `catID`='$pid' AND `CustID`='".$profile_row['0']['custID']."'";
		$update_state = $this->db->query($status_update);
		}
		$query = $this->db->query($sql);
		if($query->num_rows() == 1){
		$row = $query->result_array();
		return $row ;

		}	

		return false;
	}
	function user_comments(){
	$pid = urldecode($this->input->get('pid'));
	
		$select_comment="SELECT * FROM `useraction` ua 
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`catID`='$pid' ORDER BY ua.`uaID` DESC LIMIT 4
		";
		$select_com = $this->db->query($select_comment);
	
	return $select_com;
}
	function user_likes(){
		$pid = urldecode($this->input->get('pid'));
		$cat=urldecode($this->input->get('cat'));
		$like_count="SELECT COUNT(`catID`) AS `user_like` FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='$pid' AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		return $like_row;
	}
	function total_share(){
		$pid = urldecode($this->input->get('pid'));
		$cat=urldecode($this->input->get('cat'));
		
		$share_count="SELECT COUNT(`catID`) AS `total_share` FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='$pid' AND `raAction`='SHARE' ";
		$shareed = $this->db->query($share_count);
		$share_row=$shareed->result_array();
		
		return $share_row;
	}
	function total_comments(){
		$pid = urldecode($this->input->get('pid'));
		$cat=urldecode($this->input->get('cat'));
		$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='$pid' AND `raAction`='COMMENT' ";
		$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
		
		return $comment_row;
	}
	
	
	function liked(){
		$pid = urldecode($this->input->get('pid'));
		$cat=urldecode($this->input->get('cat'));
		$cid=urldecode($this->input->get('cid'));
		 $profile_row = $this->session->userdata('profile_data');
		
		$likeed="SELECT * FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='$pid' AND `raAction`='LIKE' AND `custID`='".$profile_row['0']['custID']."' ";
		$liked_process = $this->db->query($likeed);
		
		
		return $liked_process;
	}
	function shared(){
		$pid = urldecode($this->input->get('pid'));
		$cat=urldecode($this->input->get('cat'));
		$cid=urldecode($this->input->get('cid'));
		 $profile_row = $this->session->userdata('profile_data');
		
		$shared="SELECT * FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='$pid' AND `raAction`='SHARE' AND `custID`='".$profile_row['0']['custID']."' ";
		$shared_process = $this->db->query($shared);
		
		
		return $shared_process;
	}
	
	
	
	
	
}




?>