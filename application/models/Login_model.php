<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
	}

	function login_validate(){
		$user = $this->input->post('uname');
		$pass = $this->input->post('pword');

		$sql = "SELECT cm.*,am.accTYpe,am.accPWD,am.accDesc,am.theme,am.site_language as language,e.emailID,e.emailProvider,e.emailVerifyStatus,pp.photo,pfd.profQualification,pfd.profProfession,pfd.profIndustry,pfd.profDesignation,pd.perdataDOB,pd.perdataFirstName,pd.perdataLastName,CONCAT(pd.perdataFirstName,' ',pd.perdataLastName) as perdataFullName,pd.perdataGender,pd.perdataInterests,pd.perdataAboutMe,pd.perdataProfPict,ad.addrLine1,ad.addrArea,ad.addrPost,ad.addrRoad,ad.addrCity,ad.addrDistrict,ad.addrState,ad.addrCountry,ad.addrPostCode FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) WHERE (cm.`custName`= '$user' OR e.`emailID`='$user') ";
		
		$query = $this->db->query($sql);
		 
		if($query->num_rows() == 1){
		
		$val=$query->result_array();
		
		if(password_verify($pass,$val[0]['accPWD'])){ 
				
		if($val[0]['custStatus']==15){
                  $ip=$_SERVER['REMOTE_ADDR'];
                  $now=mktime(date('h')+5,date('i')+30,date('s'));
                  $time=date('h:i:s A',$now);
                  $date=date("Y-m-d");
                  $sql="INSERT INTO `accesslog`(custID,logDate,logInTime,ipdataRecID)VALUES('".$val[0]['custID']."','$date','$time','$ip')";
		  $this->db->query($sql);
		  
		  $sql_online ="update customermaster SET is_online='1',last_online = '".$this->config->item('global_datetime')."' where custID ='".$val[0]['custID']."'";
		 $this->db->query($sql_online);

			$row = $query->result_array();
			$session_user = array('username'=>$user,'logged_in'=>TRUE);
			unset($row[0]['accPWD']);
			//$this->uri->segment(2) = $user;
			$this->session->set_userdata($session_user);
			$this->session->set_userdata('profile_data',$row);
		$this->session->set_userdata('language',$row[0]['language']);
		//---------------THEME--------------

		$tsql = "SELECT * FROM `theme` WHERE themeId = ".$row[0]['theme']."";
		$Tquery = $this->db->query($tsql);
		$theme=$Tquery->result_array();
		
		$this->session->unset_userdata('theme',$theme);
		$this->session->set_userdata('theme',$theme);
		//---------------------------------------
		$data=array(
		'custName' => $row[0]['custName']  ,
		'FullName' => $row[0]['perdataFullName']
		);
			echo json_encode($data);
			exit;
			}
		return 4 ;	//Email Verification Pending
}		return 3 ; 	//Wrong Password
		}	
	 	return 2; 	//Wrong Username
		}
	
	function likenotifications(){
		
		$user_row = $this->session->userdata('profile_data');
		$sel="SELECT * FROM `recentactivity` ra
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ra.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		LEFT JOIN `personaldata` pd ON(pd.`custID` = ra.`uID`)
		WHERE ra.`uID`='".$user_row['0']['custID']."' AND ra.`raAction`='LIKE' AND ra.`is_read`='1' AND ra.`custID`!=".$user_row['0']['custID']." AND ra.`raCategory`!='EVENT' AND ra.`raCategory`!='GROUP' AND ra.`raAction`!='SUB_LIKE' AND                        ra.`raAction`!='SUB_SUB_LIKE' ORDER BY ra.`raID` DESC  ";
		$noti_query = $this->db->query($sel);

		return $noti_query;
	}
	function follownotifications(){
		
		$user_row = $this->session->userdata('profile_data');
		$f_sel="SELECT * FROM `userfollowing` uf
		LEFT JOIN `customermaster` cm ON(cm.`custID`=uf.`cID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE uf.`custID`=".$user_row['0']['custID']." AND uf.`ufNew`='1' ORDER BY uf.`ufid` DESC    ";
		$f_query = $this->db->query($f_sel);

		
		return $f_query;
	}
	
		function commentnotifications(){
		
		$user_row = $this->session->userdata('profile_data');
		$c_sel="SELECT * FROM `recentactivity` ra
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ra.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ra.`uID`=".$user_row['0']['custID']." AND ra.`raAction`='COMMENT' AND ra.`custID`!=".$user_row['0']['custID']." AND ra.`is_read`='1' AND ra.`raCategory`!='EVENT' AND ra.`raCategory`!='GROUP' AND ra.`raAction`!='SUB_COMMENT'      							ORDER BY ra.`raID` DESC    ";
		$c_query = $this->db->query($c_sel);

		return $c_query;
	}
	
	function sharenotifications(){
		
		$user_row = $this->session->userdata('profile_data');
		$s_sel="SELECT * FROM `recentactivity` ra
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ra.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ra.`uID`=".$user_row['0']['custID']." AND ra.`raAction`='SHARE' AND ra.`is_read`='1' ORDER BY ra.`raID` DESC    ";
		$s_query = $this->db->query($s_sel);

		return $s_query;
	}
	function recentactivity(){
		$user_row = $this->session->userdata('profile_data');
		$recent="SELECT * FROM `recentactivity` ra
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ra.`uID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = ra.`uID`)
		LEFT JOIN `personaldata` pd ON(pd.`custID` = ra.`uID`)
		WHERE ra.`custID`=".$user_row['0']['custID']." AND ra.`is_read`='1' AND ra.`uID`!=".$user_row['0']['custID']." AND ra.`raCategory`!='EVENT' AND ra.`raCategory`!='GROUP' AND ra.`raAction`!='SUB_COMMENT' AND ra.`raAction`!='SUB_LIKE' 																																																AND ra.`raAction`!='SUB_SUB_LIKE' ORDER BY ra.`raID` DESC";
		 $recent_query = $this->db->query($recent);
		
		return $recent_query;
	}
	function totallikes(){
		$user_row = $this->session->userdata('profile_data');
		$like="SELECT COUNT(`uID`) AS `totallikes` FROM `recentactivity` WHERE `uID`=".$user_row[0]['custID']." AND `raAction`='LIKE' AND `raCategory`='PROFILE'";
		$total_like = $this->db->query($like);
		$val=$total_like->result_array();
		
		return $val;
	}
	function totalcircles(){
		$user_row = $this->session->userdata('profile_data');
		$circles="SELECT COUNT(`ufid`) AS `totalcircles` FROM `userfollowing` WHERE `cID`=".$user_row[0]['custID']." OR `custID`=".$user_row[0]['custID']."";
		$t_circle=$this->db->query($circles);
		$total=$t_circle->result_array();
		return $total;
	}
	function totalviews(){
		$user_row = $this->session->userdata('profile_data');
		$views="SELECT COUNT(*) AS `totalviews` FROM `totalviews` WHERE `uID`=".$user_row[0]['custID']."";
		$t_views=$this->db->query($views);
		$total_views=$t_views->result_array();
		return $total_views;
	}
	function invitations(){
		$user_row = $this->session->userdata('profile_data');
		$invi="SELECT * FROM `group_invitation` gi 
		LEFT JOIN `customermaster` cm ON(cm.`custID`=gi.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID`=cm.`custID`)
		LEFT JOIN `mahagroups` m ON (m.`grp_id`=gi.`groupID`) WHERE gi.`uID`='".$user_row[0]['custID']."' AND gi.`gistatus`='0'";
		
		
		$result=$this->db->query($invi);
		
		return $result;
	}
	function course_invitations(){
		$user_row = $this->session->userdata('profile_data');
		$invi="SELECT CONCAT(pd.perdataFirstName,' ',pd.perdataLastName) as perdataFullName,pp.photo,ec.slug,ec.ecID FROM `eduCourseInvitation` eci 
		LEFT JOIN `customermaster` cm ON(cm.`custID`=eci.`eciSenderID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID`=cm.`custID`)
		LEFT JOIN `personaldata` pd ON(pd.`custID`=cm.`custID`)
		LEFT JOIN `eduCourse` ec ON (ec.`ecID`=eci.`eciCID`) WHERE eci.`eciReceiverID`='".$user_row[0]['custID']."' AND eci.`eciStatus`='0'";
		
		$result=$this->db->query($invi);
		
		return $result;
	}
	
	function event_alert(){
		$user_row = $this->session->userdata('profile_data');
		$event="SELECT * FROM `userfollowing` uf
		 LEFT JOIN `events` e  ON (e.`custID`=uf.`custID`)
		LEFT JOIN `customermaster` cm ON(cm.`custID`=e.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID`=cm.`custID`)
		WHERE (uf.`cID`='".$user_row[0]['custID']."' AND e.`id` NOT IN (SELECT `eventID` FROM `event_status` WHERE `eventID`=e.`id` AND `custID`='".$user_row[0]['custID']."' ) AND e.`custID` !='".$user_row[0]['custID']."' )  ORDER BY e.`id` DESC LIMIT 1";
		$result=$this->db->query($event);
		return $result;
	}
		
	function blog_notification(){
			
		$results  = array();		
		$joomla=$this->db->query('SELECT joomlaID FROM `customermaster` WHERE `custID` IN (SELECT custID FROM `userfollowing` WHERE `cID`='.$this->session->userdata['profile_data'][0]['custID'].') AND joomlaID != ""')->result();
		$joomlaids=array();
		foreach($joomla as $joomlaid)
		 	$joomlaids[] = $joomlaid->joomlaID;
		if($joomlaids){
			$CI = &get_instance();
			$this->db2 = $CI->load->database('blog', TRUE);
			$results = $this->db2->select('image,title,permalink')->from(BLOG_DB_PREFIX.'_easyblog_post ')->where_in('created_by',$joomlaids)->order_by('id','DESC')->limit(1)->get()->row();
		}
		return $results;
	}
	
	
	
	
}




?>