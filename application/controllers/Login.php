<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
           
	}

	public function index(){

		$this->load->model('login_model');
		$result = $this->login_model->login_validate();

		//$data['user_row'] = $result;
		//$logged_username =$this->session->userdata('profile_data');
		// Redirect to selected page
		if($this->session->userdata('red_url')) {
			$result = $this->session->userdata('red_url');
			$this->session->unset_userdata('red_url');
		}
		else if(!($result == 3 || $result == 2 || $result == 4 )) $result = base_url().'user/'.$result; 
		echo $result;		
	}
	
	
	public function logged_user(){
	
	 $this->Common_model->checkLogin();
	 $this->load->model('Language_model');
        $page='maha_profile';
	$this->load->model('login_model');
	$data=array();
	$data['profile_data']=$this->session->userdata('profile_data');
	$data['like_notification'] = $this->login_model->likenotifications();
	$data['follow_notification'] = $this->login_model->follownotifications();
	$data['comment_notification'] = $this->login_model->commentnotifications();
	$data['share_notification'] = $this->login_model->sharenotifications();
	$data['recent_query'] = $this->login_model->recentactivity();
	$data['totallikes'] = $this->login_model->totallikes();
	$data['totalcircles'] = $this->login_model->totalcircles();
	$data['totalviews'] = $this->login_model->totalviews();
	$data['group_detail'] = $this->login_model->invitations();
	$data['course_detail'] = $this->login_model->course_invitations();
	$data['event_alert'] = $this->login_model->event_alert();
	$data['recent_blogs'] = $this->login_model->blog_notification();
	$data['lang'] = $this->Language_model->LangCompatible($page);
$data['languageLabels'] = $this->Language_model->getLanguageLabels()->result();
		$this->load->view('profile',$data);
			
			
			
			
	}
	
	function recentactivityonload(){
		
		$cid=$this->input->get('cid');
		$recent="SELECT * FROM `recentactivity` ra

LEFT JOIN `customermaster` cm ON(cm.`custID`=ra.`uID`)
LEFT JOIN `personalphoto` pp ON(pp.`custID` = ra.`uID`)
 WHERE ra.`custID`='$cid' AND ra.`is_read`='1'";
 $recent_query = $this->db->query($recent);
 		
				if($recent_query->num_rows() >= 1){
				   foreach ($recent_query->result() as $recent_row)
   {
	
								 	echo "<li class='updte-clmn' style='height:30px !important;'>
							<a onclick=popupCenter('".base_url().$recent_row->raPage."?pid=".$recent_row->catID."&cat=".$recent_row->raCategory."&act=".$recent_row->raAction."&uid=".$recent_row->uID."','myPop1',450,450); href='javascript:void(0);'> <div  id='first0' ><span>";
							
							
							if(ISSET($recent_row->photo)){ echo "<img src='../uploads/".$recent_row->photo."' alt='User Profile' style='width: 13%;float: left;margin-right: 16px'/>"; } else{ echo "<img src='../uploads/profile.png' alt='User Profile' style='width: 13%;float: left;margin-right: 16px'/>"; }
							
							echo "  
								</span>
								<h4 id='rece  nts' style='margin-left:10px !important;'> You ".$recent_row->raMessage ."&nbsp". $recent_row->custName."'s ". $recent_row->raCategory."</h4>
							</div></a>
							
												
								   </li>";
								   
   }}else{ 
							   
					 echo "You have No Recent Activity.";			   
				  }
				  echo "<script type='text/javascript'>
  
  $(function(){


  $('#marquee-vertical').marquee();  
  $('#marquee-horizontal').marquee({direction:'horizontal', delay:0, timing:50});  

});

</script>";
 
	}
//	onclick=popupCenter('".$recent_row->raPage."?pid=".$recent_row->catID."&cat=".$recent_row->raCategory."&act=".$recent_row->raAction."&uid=".$recent_row->uID." , 'myPop1',450,450);
//	onclick=popupCenter('".$recent_row->raPage."','myPop1',450,450);

function followlive(){
	$cid=$this->input->get('cid');
	
$f_sel="SELECT * FROM `userfollowing` uf
		LEFT JOIN `customermaster` cm ON(cm.`custID`=uf.`cID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
WHERE uf.`custID`='$cid' AND uf.`ufNew`='1' ORDER BY uf.`ufid` DESC    ";
$follow_notification = $this->db->query($f_sel);
if($follow_notification->num_rows() >= 1){
								$follo_notification=$follow_notification->result_array();
								
							
							
					echo "<a onclick=popupCenter('".base_url()."basicprofile?uid=".$follo_notification['0']['custID']."&f=n','myPop1',450,450); href='javascript:void(0);'><div class='col-md-12 odd' id='first0'><span><img src='../uploads/";
					if(ISSET($follo_notification['0']['photo'])){ echo $follo_notification['0']['photo']; } else{ echo "profile.png"; }
					
					
					
					echo "' alt='User Profile' style='width: 10%;float: left;'/></span>
								<h4 id='recents'>".$follo_notification['0']['custName']."Follows You</h4>
							</div></a>
								<div class='icon_section'>
									<a class='fa fa-user-plus icon-3x '></a>							
								</div>";
					 }else{  
								
								echo "You Have No Follow Notifications Recently.";
						
																
					 }
					 
	
}



}	


?>