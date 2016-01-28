<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class User_activity extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
	
		$pid = urldecode($this->input->post('pid'));
		$cat=urldecode($this->input->post('cat'));
		$ui=$this->input->post('uid');
		
		$cid=$this->input->post('cid');
		if(!empty($ui)){$uid=$ui;}if($ui==0){$uid=$cid;}
			$user_comment=preg_replace("/\n/", "<br />",trim($this->input->post('user_comment')));
			$act=$this->input->post('act');
			$status=$this->input->post('status');
			
		if($act=='SHARE'){
		$date=date("Y-m-d");
		$share_master="INSERT INTO `recentactivity`(raCategory,raAction,catID,custID,uID,raMessage,raPage,is_read,raDate)VALUES('$cat','$act','$pid','$cid','$uid','Shared','recentactivity',1,'$date')"; 
		$mas_share = $this->db->query($share_master);
		
	}	
		if($act=='JOINED' || $act=='Maybe Join'){
		
		$date=date("Y-m-d");
		$event_add="INSERT INTO `recentactivity`(raCategory,raAction,catID,custID,uID,raMessage,raPage,is_read,raDate)VALUES('$cat','$act','$pid','$cid','$uid','$act','recentactivity',1,'$date')"; 
	  	 $this->db->query($event_add);
		
		$data= array('eventID' => $pid, 'custID' => $cid, 'status' => $status);
		$this->db->insert('event_status', $data); 
		
	}	
		
			
	if($act=='COMMENT' || $act=='SUB_COMMENT' && $pid!='0'){
	
	$data= array('catID' => $pid, 'custID' => $cid, 'uID' => $uid,'uaCategory' => $cat, 'uaAction' => $act, 'uaDescription' => $user_comment);
	
	$this->db->insert('useraction', $data); 
	$comment_id = $this->db->insert_id();
	
	$this->log_array = array(
	'pid' => $pid,
	'module' => $cat,
	'action' => $act,
	'table' => 'recentactivity',
	'comments' => ''
	);
	$this->Common_model->create_log($this->log_array);
		
		$date=date("Y-m-d");
		$master="INSERT INTO `recentactivity`(raCategory,raAction,catID,custID,uID,raMessage,raPage,is_read,raDate)VALUES('$cat','$act','$pid','$cid','$uid','commented on','recentactivity',1,'$date')"; 
		
		$mas = $this->db->query($master);
		
		if($cat == 'ARTICLE' && $act == 'COMMENT') {
			echo $comment_id;exit;
		} 
		
		$select_comment="SELECT * FROM `useraction` ua 
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`catID`='$pid' ORDER BY ua.`uaID` DESC LIMIT 4
		";
		$select_com = $this->db->query($select_comment);
		
		 foreach ($select_com->result() as $comment_row)
         {
		echo "<div class='col-md-12 even chld-cls no-padding1 wrap-com' id='first0' style='margin-bottom:7px;width: 90%;height: auto;'>
							<div style='float: left;background-color: rgba(185, 214, 214, 0.48);border-radius: 8px 0 0 8px;'><div class='col-md-2 img-cls-pro'><span>
							
							";
							if(ISSET($comment_row->photo)){
								echo "<img src='../uploads/".$comment_row->photo."'  alt='User Profile' style='width:35px;height:35px;float: left;margin-bottom:7px;border-radius: 50px;margin-top: 6px;'/>";
							}
							else{
								echo "<img src='../uploads/profile.png'  alt='User Profile' style='width:35px;height:35px;float: left;margin-bottom:7px;border-radius: 50px;margin-top: 6px;'/>";
							}

			echo "</span></div></div>
			<p id='recents' >".$comment_row->uaDescription."</p>
			</div>";
        }	
	}
	
			
	if($act=='EVENTCOMMENT'){
	
	$data= array('catID' => $pid, 'custID' => $cid, 'uID' => $uid,'uaCategory' => $cat, 'uaAction' => $act, 'uaDescription' => $user_comment);
	
	$this->db->insert('useraction', $data); 
	
		$this->log_array = array(
		'pid' => $pid,
		'module' => $cat,
		'action' => $act,
		'table' => 'recentactivity',
		'comments' => ''
		);
	$this->Common_model->create_log($this->log_array);
	

		$date=date("Y-m-d");
		$master="INSERT INTO `recentactivity`(raCategory,raAction,catID,custID,uID,raMessage,raPage,is_read,raDate)VALUES('$cat','COMMENT','$pid','$cid','$uid','commented on','recentactivity',1,'$date')"; 
		
		$mas = $this->db->query($master);
		
		$select_comment="SELECT * FROM `useraction` ua 
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`catID`='$pid' ORDER BY ua.`uaID` DESC LIMIT 4
		";
		$select_com = $this->db->query($select_comment);
		
		 foreach ($select_com->result() as $comment_row)
  		 {echo "<div class='col-md-12 even chld-cls' id='first0' style='margin-bottom:7px;border: 1px solid green;background-color: rgba(36, 121, 36, 0.36);padding: 1%;width: 82%;'><span>";

		if(ISSET($comment_row->photo)){
				echo "<img src=/uploads/".$comment_row->photo." style='width: 7%;float: left;margin-bottom:7px;'>";
			}
			else{
				echo "<img src='/uploads/profile.png' width='6%' style='width: 7%;float: left;margin-bottom:7px;'>";
			}


				echo "</span>
                                        <span id='recents' style='margin-left: 7%'>$comment_row->uaDescription</span></div>";
		
		
   }
		
	}
		
}}
		

?>