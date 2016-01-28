<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Groups extends CI_Controller{

	function __construct(){
		parent::__construct();
        if(!$this->session->userdata('profile_data')) redirect('');
		$this->load->model('Groups_model');
		$this->load->helper('form');
	    $this->load->library("pagination");
		$this->load->library('upload');
		$this->load->library('custom_function');
		$this->load->library('image_lib');
		$this->Common_model->checkLogin();
	$this->original_path = UPLOADS.'groups/banners';
    //$this->resized_path = realpath(APPPATH.'../uploads/resized');
    $this->thumbs_path = UPLOADS.'groups/thumbs';
    $this->fancy_show = UPLOADS.'groups/fancy_show';
    $this->load->model('networking_process');
    $this->load->model('Language_model');
	}

	public function index(){
            
		$page_name = 'groups';
        
        	$data['lang'] = $this->Language_model->LangCompatible($page_name); 
        	
        	$data['title'] = $data['lang']['groups']; 
        	
            	$data["results_own"] = $this->Groups_model->get_groups('own');
            	
		$users = array();
		$actGRP = array();
		$groups= array();
		
		$data['following'] = $this->networking_process->networkfollowlist();
		
		$user = $data['following']->result();
		
		$activeGROUPS = $this->Groups_model->getMyActiveGroups(); 
		
		foreach($activeGROUPS as $activeGROUP)
       		 { 
          		$actGRP[] = $activeGROUP->groupID;	 
	    	}
		
		
		if(count($user) != 0)
	   	 {
   	    
		         foreach($user as $client)
		         { 
		           $users[] = $client->custID;	 
			 } 	
 
          		 $groups = $this->Groups_model->getSuggestGroups($users,$actGRP);
		}
		
			$data["results_public"] = $groups;
			$data["network_groups"] = $this->Groups_model->get_networks_groups();
			if(MOBILE_SITE) {
			$data['logo_login_part'] = $this->load->view('modules/logo-login',$data,TRUE);
		$this->load->view('modules/header',$data);
		$this->load->view('groups/groups',$data);
		$this->load->view('modules/footer',$data);
	}
	else $this->load->view('groups/groups',$data);
			
			
	}
	
	public function view($id)
	{
	   $page_name = 'groups';
        
        	$data['lang'] = $this->Language_model->LangCompatible($page_name);   
        	
	   if($id == ""){
			redirect('404');
		}
       
	    $data['r'] = $this->uri->segment(3);
	   
	    // print_r($this->uri->segment(3));
		 
	   
		$url = explode('-',$id);
		$id = $url[0];
		 
		 
		 
		$groupInfo = $this->Groups_model->get_group_data($id);
	  
	     
		$this->session->set_userdata('groupID',$id);
		
		$this->session->set_userdata('groupInfo',$groupInfo);
		
		
		/* Create activity log */
		$this->log_array = array(
		'pid'	=> $id,
		'module'	=> 'Groups',
		'action'	=> 'view',
		'table'	=> 'mahagroups',
		'comments'	=> ''
		);
		$this->Common_model->create_log($this->log_array);
		$data['userData'] = $this->Groups_model->getOneGroupMember();
		
		//getRequests 
		
		$data['userJoinRequests'] = $this->Groups_model->getRequests();
		$data['results'] = $this->Groups_model->get_group_data($id);
	  
		$data['members'] = $this->Groups_model->getGroupMembers();
	
		$data['posts'] = $this->Groups_model->get_posts();
		
		//print_r($data['posts']);exit;
		
	    $this->load->view('groups/view',$data);
	}
	
		public function update_publish_state()
	{
		if($this->input->post('id')){
			
			
			$q = $this->Groups_model->update_group_publish_state();
			
			if($q) echo 1;
		
		
		}
		else
		echo 0;
		
		
	}
	
	
	
	
	
	
	public function add()
    {
            
                $grpName = trim($this->input->post('groupTitle'));
            
		$config['upload_path'] = UPLOADS."groups/banners";
            	$config['allowed_types'] = 'gif|jpg|png|jpeg';
            	
            	
            	
            	$config['file_name'] = rand(1,10000).'-'.url_title($grpName,'-',true);
            	
		$this->upload->initialize($config);
			
			$field_name = "groupCover";
			
            $this->upload->do_upload($field_name);
			
                  $image_data = $this->upload->data();
	        
			
			if($this->upload->display_errors())
			{
			     $data['grp_cover']             = 'groups_def.png';
			}
			else
			{
			     $data['grp_cover']  =   $this->upload->data('file_name');
			}
                        
                        $data['custID']              = $this->input->post('userID');
                        $data['grp_name']            = $grpName;
                        $data['grp_description']     = trim($this->input->post('groupDes'));
			$data['privacy']             = $this->input->post('groupPrivacy');
			$data['join']             = $this->input->post('joinRadio');
			$data['postRes']             = $this->input->post('postRadio');
			$data['status']             = $this->input->post('PublishRadio');
                        $data['doDate']   = date("Y-m-d H:i:s");
            
			$status = $this->Groups_model->create_group($data);
			
			 /* Create activity log */
		$this->log_array = array(
		'pid'	=> $status,
		'module'	=> 'Groups',
		'action'	=> 'Create Group',
		'table'	=> 'mahagroups',
		'comments'	=> ''
		);
		$this->Common_model->create_log($this->log_array);
		
		 /* Create activity log */
			
			
                         if($status !=0)
			{
			   $this->session->set_flashdata('flashmessage', 'Group has been created.');
			}
			redirect(base_url() . 'groups', 'refresh');
         }
		
	
	public function update()
	{
		
		 /* Create activity log */
		$this->log_array = array(
		'pid'	=> $this->input->post('edit_groupid'),
		'module'	=> 'Groups',
		'action'	=> 'Update Group',
		'table'	=> 'mahagroups',
		'comments'	=> ''
		);
		$this->Common_model->create_log($this->log_array);
		
		 /* Create activity log */
		
		if($this->input->post('edit_groupid')){
			$this->Groups_model->update_group();
		}
		
		
		redirect('groups');
		
	}
	
	public function delete()
	{
		if($this->input->post('id')){
			$q = $this->Groups_model->delete($this->input->post('id'));
			if($q) echo 1;
		}
		else echo 0;
		exit;
		
	}
	public function get_group_data(){
		$res = array();
		if($this->input->post('getData') && $this->input->post('id')){
			$res = $this->Groups_model->get_group_data($this->input->post('id'));
		}
		header("content-type:application/json");
		echo json_encode($res);exit;
		
	}
	
	
	public function GetGroupMembers(){
		$res = array();
		if(true){
			$res = $this->Groups_model->getGroupMembers();
		}
		header("content-type:application/json");
		echo json_encode($res);exit;
		
	}
	
	public function GetGroupUserJoinRequests(){
		$res = array();
		if(true){
			$res = $this->Groups_model->getRequests();
		}
		header("content-type:application/json");
		echo json_encode($res);exit;
		
	}
	

	
	/* GROUP POSTING OPERATIONS  */
	
	public function doPost(){
	
	
		if($this->input->post('postApostContent')){
		   
		  $res = $this->Groups_model->createPost($this->input->post('postApostContent'));
		
		}
		
		 /* Create activity log */
		$this->log_array = array(
		'pid'	=> $res,
		'module'	=> 'Groups',
		'action'	=> 'Create new status in group',
		'table'	=> 'mahagroups_data',
		'comments'	=> ''
		);
		$this->Common_model->create_log($this->log_array);
		
		 /* Create activity log */
		
		echo $res;
	}
	
	public function delete_post()
	{
		if($this->input->post('id')){
			$q = $this->Groups_model->delete_post_group($this->input->post('id'));
			if($q) echo 1;
		}
		else echo 0;
		exit;
		
	}
	
	
	public function get_group_post_data(){
		$res = array();
		if($this->input->post('getData') && $this->input->post('id')){
			$res = $this->Groups_model->get_group_post_data($this->input->post('id'));
		}
		header("content-type:application/json");
		echo json_encode($res);exit;
		
	}
	
	public function update_post_data()
	{
		if($this->input->post('id') && $this->input->post('postContent')){
		
			echo $this->Groups_model->update_post_data($this->input->post('id'));
		
		}
		
		
		//redirect('groups');
		
	}
	
	/* EVENT POSTING */
	
	public function doEvent(){
		
		  $res = $this->Groups_model->doEvent();
		
		echo $res;
		
		 /* Create activity log */
		$this->log_array = array(
		'pid'	=> $res,
		'module'	=> 'Groups',
		'action'	=> 'Create new event in group',
		'table'	=> 'mahagroups_data',
		'comments'	=> ''
		);
		$this->Common_model->create_log($this->log_array);
		
		 /* Create activity log */
	}
	
	public function update_event_data()
	{
		if($this->input->post('id')){
		
			echo $this->Groups_model->update_event_data($this->input->post('id'));
		
		}
	}
	
	
		/* POST WITH PHOTO POSTING */
	
	public function doPostwithImage(){
		   
		    $config['upload_path'] = UPLOADS."groups/posts";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->upload->initialize($config);
			
			$field_name = "uploadPhoto";
            $this->upload->do_upload($field_name);
			 $image_data = $this->upload->data();
			 //print_r($this->upload->display_errors());exit;
			  /*   ############# RESIZED IMAGES ########## */
		     $config = array(
             'source_image'      => $image_data['full_path'],
             'image_library'      => 'gd2',
             'new_image'         => $this->fancy_show,
             'maintain_ratio'    => true,
             'width'             => 600
           );
	
		    $this->image_lib->initialize($config);
            $this->image_lib->resize();
			$this->image_lib->clear(); 
			
			 /*   ############# THUMBS GENERATION ########## */
		     $config = array(
             'source_image'      => $image_data['full_path'],
             'image_library'      => 'gd2',
             'new_image'         => $this->thumbs_path,
             'maintain_ratio'    => true,
             'width'             => 150
           );
	
		    $this->image_lib->initialize($config);
            $this->image_lib->resize();
			$this->image_lib->clear(); 
			
			$org_img = $this->upload->data('file_name');
			
			$res_id = $this->Groups_model->doPostwithImage($org_img);
	        
		    if($res_id != 0)
			
			{ 
			
			  /* Create activity log */
		$this->log_array = array(
		'pid'	=> $res_id,
		'module'	=> 'Groups',
		'action'	=> 'Create new status with image in group',
		'table'	=> 'mahagroups_data',
		'comments'	=> ''
		);
		$this->Common_model->create_log($this->log_array);
		
		 /* Create activity log */
			
			      header("content-type:application/json");
		    echo json_encode(array('id'=>$res_id,'img'=>$org_img));exit;	
			}}
	
	public function updatePostwithImage(){
		    
			
			
			$img = '';
		    if(!empty($_FILES['editStatusPhoto']['name'])){
				$config['upload_path'] = UPLOADS."groups/posts";
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->upload->initialize($config);
				
				$field_name = "editStatusPhoto";
				$this->upload->do_upload($field_name);
				$image_data = $this->upload->data();
				$img  = $this->upload->data('file_name');
				
			  $config = array(
             'source_image'      => $image_data['full_path'],
             'image_library'      => 'gd2',
             'new_image'         => $this->fancy_show,
             'maintain_ratio'    => true,
             'width'             => 600
               );
	
		    $this->image_lib->initialize($config);
            $this->image_lib->resize();
			$this->image_lib->clear(); 
			
			 /*   ############# THUMBS GENERATION ########## */
		     $config = array(
             'source_image'      => $image_data['full_path'],
             'image_library'      => 'gd2',
             'new_image'         => $this->thumbs_path,
             'maintain_ratio'    => true,
             'width'             => 150
             );
	
		    $this->image_lib->initialize($config);
            $this->image_lib->resize();
			$this->image_lib->clear(); 
			
	        }
			else
			{
			   $img = NULL;
			}
			
		    $res = $this->Groups_model->updatePostwithImage($img);
			
			
			 if($res != 0)
			
			{ 
			      header("content-type:application/json");
		         echo json_encode(array('results'=>$res,'img'=>$img));exit;	
			}
			
			//redirect(base_url().'groups/view/'.$this->uri->segment(3));
	        
	}
	
	
	public function autoload(){
		$result_posts = array();
		 $show_div = '';
		if( $this->input->post('getPosts') && $this->input->post('last_id')){
				$results = $this->Groups_model->get_posts(4,$this->input->post('last_id'));
			
				
				if($results){
					foreach ($results as $key => $post) {
						$userActions = '';
						$profile_photo = 'profile.png';
						
								switch($post->postType){
									case 1 : $class = 'editData';
											 $data_target = 'exampleModalGroupEdit';
											 $show_div = '<div class="col-md-12 imgsection">
		<p class="postContent">
'. $post->postContent.'
		</p>
	</div>';
											break;								
									case 2 : $class = 'editDataEvent';
											$data_target = 'editEvent';
											$show_div = '<div class="col-md-12 imgsection" style="background-image:url('. base_url('uploads/events/'.rand(1,10).'.jpg').'
		);color:#fff;padding:10px;padding-bottom:30px;text-align:center;">
		<h2 class="postContent">'. $post->eventTitle.' </h2>
		<span>'. $post->postContent.'</span>
		<h4 class="postContent"><span class="glyphicon glyphicon-time"></span>'. $post->eventDate.' </h4>
		<h4 class="postContent"><span class="glyphicon glyphicon-map-marker"></span>'. $post->eventLocation.' </h4>
	</div>';
											break;
									case 3 : $class = 'editDataPhotoPost';
											$data_target = 'exampleModalEditPhoto';
											$show_div = '<div class="col-md-12 imgsection">
		<p class="postContent">
'. $post->postContent.'
		</p>
	</div><div class="col-md-12 imgsection">
		<img src="'. base_url('uploads/groups/posts').'/'.$post->postImage.'" style="width: 100%;">
	</div>';
											break;
								}
								
                                $userActions = '<span class="userAction" id="'. $post->id.'">
									<p class="userActions pull-right" id="'. $post->
										id.'"><small><a href="#deleteConfirmation" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a></small>
										<small><a href="#'. $data_target.'" data-toggle="modal" data-target="#'. $data_target.'
										" class="'. $class.'
										"><span class="glyphicon glyphicon-edit"></span> Edit</a></small>
									</p>
									</span>';
                           
                           if($post->photo && file_exists(UPLOADS.$post->photo)) $profile_photo = $post->photo;

						$result_posts[] = '<div class="singlePost" id="singlePost_'. $post->id.'" style="background-color:#eee;padding:5px;border:0px dashed yellow;overflow:hidden;">
	<div class="col-md-12 prodetails">
		<div class="col-md-2 proimg">
			<img src="'. base_url().UPLOADS.$post->photo.'" style="width: 50px;height: 50px;">
		</div>
		<div class="col-md-10 proimg1">
			'.$userActions.'
			<h5 style="margin-bottom: 0px;line-height: 0;">'. $post->custName.'</h5>
			<br>
			<h6 style="margin-top: 0px;">'. $this->custom_function->get_notification_time($this->config->item('global_datetime'),$post->doDate).'</h6>
		</div>
	</div>
	'.$show_div.'
	<div class="col-md-12 activity">
		<div class="col-md-2">
			<p>
				Like
			</p>
		</div>
		<div class="col-md-10">
			<p>
				Comments
			</p>
		</div>
	</div>
</div>';
					}
					
				}
			}
			header("content-type:application/json");
			echo json_encode($result_posts);exit;
	}
	
	                  /* ################## GROUP MEMBERS MANAGEMENT ################# */
					  
                        function makeAMemberInGroup()
				         {
					
				     	 // echo $this->Groups_model->checkExistingMember();exit;
							if($this->Groups_model->checkExistingMember() == 0)
							{
								$res = $this->Groups_model->makeAMemberInGroup();
								if($res == 0)
								{
                                      echo 0;
								} 
								else
								{
								    echo $res;
								}
							}
							else
							{
							   echo 'all ready existing user...';
							}
			          }
					
					       function leaveGroup()
				           {
					               
								  $res = $this->Groups_model->memberLeaveGroup($this->input->post('id'));
				     	      
							      echo $res;      
							
			              }
						
						  function AdminRequestAccept()
						  {
						     $res = $this->Groups_model->RequestAccept();
				     	      
							      echo $res;   
		                   
						  }
                       
					   function groupmembers(){
		
		$q=$_GET['q'];
$user_row = $this->session->userdata('profile_data');
	//$my_data=mysql_real_escape_string($q);
			$my_data=str_replace("'", "", $q);		
						/*** query the database ***/
						
						$result = "SELECT * FROM `userfollowing` uf
						LEFT JOIN `customermaster` cm ON(cm.`custID`=uf.`custID` )
						LEFT JOIN `personalphoto` pp ON (pp.`custID`=cm.`custID`)
						LEFT JOIN `group_invitation` gi ON (gi.`uID`=cm.`custID`)
						WHERE (cm.`custName` LIKE '%$my_data%'  AND uf.`cID`=".$user_row[0]['custID']."   )ORDER BY cm.`custName` ASC";
						// $result = DB::getInstance()->query("SELECT pc, id_citites FROM citites");
$members=$this->db->query($result);
						/*** loop over the results ***/
						$count= 0;
						
						foreach($members->result() as $networks)
				$valid="SELECT * FROM `group_invitation` WHERE `uID`='".$networks->uID."' AND `groupID`='".$this->session->userdata['groupID']."'";
				if(ISSET($valid)){
				if($this->db->query($valid)->num_rows() ==0){
						echo $networks->custName."\n";
				}}
				else{
					echo "No User Found";
				}
						}
					function invitations(){
						$gid=$this->input->get('groupid');
						$user_row = $this->session->userdata('profile_data');
						$uid=$this->input->get('uid');
						
						
						$vali="SELECT * FROM `group_invitation` WHERE `uID`='$uid' AND `groupID`='$gid'";
				$r_val=$this->db->query($vali);
				if($r_val->num_rows() ==0){
						
						
						$invitation="INSERT INTO `group_invitation`(custID,uID,groupID)VALUES('".$user_row[0]['custID']."','$uid','$gid')";
						$this->db->query($invitation);
				}
					}	
		
	function invitationupdate(){
		$uid=$this->input->get('uid');
		$status=$this->input->get('status');
		$groupid=$this->input->get('groupid');
		
		
		$update="UPDATE `group_invitation` SET `gistatus`='$status' WHERE `uID`='$uid' AND `groupID`='$groupid'";
		$this->db->query($update);
		
	}
    public function view_more_groups_comments()
    {

        $datas['all_datas']=$this->Groups_model->get_more_comments();
        foreach($datas['all_datas'] as $all_comments)
        {

            echo "<div class='coment_display' style='margin:5%'><img src='/uploads/$all_comments->photo' style='width:30px;float:left'><p style ='color: white' style='margin-left:12%'>$all_comments->uaDescription</p></div>";

        }


    }
    /*
public function recent_comments()
    {
		$forum_id=$this->input->get('id_post');
		
		
		$qwerty = "SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='GROUP' AND ua.`catID`='$forum_id' ORDER BY ua.`uaID` DESC LIMIT 4 ";
        
		$datas=$this->db->query($qwerty);
		
       
        foreach($datas->result() as $all)
        {

            echo "<div class='coment_display' style='padding: 3%;background-color: rgba(24, 64, 53, 0.69);height: auto;display: inline-block;width: 100%;' ><p>";
			
			if(ISSET($all->photo)){
				echo "<img src='/uploads/".$all->photo."' style='width: 30px;height: 30px;float: left;border-radius: 50px;margin-right: 9px;'>";
			}
			else{
				echo "<img src='/uploads/profile.png' style='width: 30px;height: 30px;float: left;border-radius: 50px;margin-right: 9px;'>";
			}
			
						
	echo "<div class='comment-details'><span style='font-size: 12px !important;font-weight:bold'>".$all->perdataFirstName.' '.$all->perdataLastName."</span><b style='padding-left: 2%;color:rgb(234, 222, 222);'>".$all->uaDescription."</b></div></div>";
        } }
        */
        public function recent_comments()
    {
		$forum_id=$this->input->get('id_post');
		
		
		$qwerty = "SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='GROUP' AND ua.`catID`='$forum_id' ORDER BY ua.`uaID` DESC LIMIT 4 ";
        
		$datas=$this->db->query($qwerty);
		
       
        foreach($datas->result() as $all)
        {

            echo '<div id="subcomment_'.$all->uaID.'">';
            echo "<div class='coment_display' style='padding: 3%;background-color: rgba(24, 64, 53, 0.69);height: auto;display: inline-block;width: 100%;' ><p>";
			
			if(ISSET($all->photo)){
				echo "<img src='/uploads/".$all->photo."' style='width: 30px;height: 30px;float: left;border-radius: 50px;margin-right: 9px;'>";
			}
			else{
				echo "<img src='/uploads/profile.png' style='width: 30px;height: 30px;float: left;border-radius: 50px;margin-right: 9px;'>";
			}
			
						
	echo "<div class='comment-details'><span style='font-size: 12px !important;font-weight:bold'>".$all->perdataFirstName.' '.$all->perdataLastName."</span><b style='padding-left: 2%;color:rgb(234, 222, 222);'><span id='singlcomment_".$all->uaID."'>".$all->uaDescription."</span></b>
	</div>";

                  if($this->session->userdata['profile_data'][0]['custID'] == $all->custID)
                  {



                      echo '<a  class="editComment" data-commentid="'.$all->uaID.'" href="javascript:void(0)" data-toggle="modal" data-commentonly="'.$all->uaDescription.'"  data-target="#editComment"  ><span class="icn-spce-grp"><i class="fa fa-pencil-square-o" style="color:darkgreen"></i></span></a>';

                      echo '<a class="deleteComment" data-p="'.$forum_id.'" data-comment="'.$all->uaID.'" href="javascript:void(0)" data-toggle="modal"  data-target="#deleteComment" ><span class="icn-spce-grp"><i class="fa fa-trash-o" style="color:darkred"></i></span></a>';



                  }
                  else
                  {



                  }

	echo "</div></div>";
        } }
		 public function recent_comment_count()
    {
		$forum_id=$this->input->get('id_post');
		
//$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='GROUP' AND `catID`='$forum_id' AND `raAction`='COMMENT' ";
$comment_count="SELECT COUNT(`uaID`) AS `total_comments` FROM `useraction` WHERE `uaCategory`='GROUP' AND `catID`='$forum_id'";
$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
	echo $comment_row[0]['total_comments'];	
	
	}
	 public function recent_like_count()
    {
		$forum_id=$this->input->get('id_post');
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='GROUP' AND `catID`='$forum_id' AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		echo $like_row[0]['total_likes'];
		
	}
public function recent_comments_event()
    {
		$forum_id=$this->input->get('id_event');
		
		
		$qwerty = "SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='EVENT' AND ua.`catID`='$forum_id' ORDER BY ua.`uaID` DESC limit 4";
        
		$datas=$this->db->query($qwerty);
		
       
		        foreach($datas->result() as $all)
		        {
		                echo '<div id="subcomment_'.$all->uaID.'">';
						echo "<div class='cmnt-area-bottm'>
						<div class='thumbnail' style='float:left; border:none; padding:0'>";
						
						
						if(ISSET($all->photo)){
						
						echo "<img src='/uploads/".$all->photo."' class='pf-img-pst' alt='User Profile'/>";
							
						}else{	
							echo "	<img src='/uploads/profile.png' class='pf-img-pst' alt='User Profile'/>";
							}
						echo "</div>
						<span id='singlcomment_".$all->uaID."' style='margin-left: 3%;'>".$all->uaDescription."</span>";

              if($this->session->userdata['profile_data'][0]['custID'] ==$all->custID)
              {



                  echo '<a  class="editComment" data-commentid="'.$all->uaID.'" href="javascript:void(0)" data-toggle="modal" data-commentonly="'.$all->uaDescription.'"  data-target="#editComment"  ><span class="icn-spce-grp"><i class="fa fa-pencil-square-o" style="color:darkgreen"></i></span></a>';

                  echo '<a class="deleteComment" data-p="'.$forum_id.'" data-comment="'.$all->uaID.'" href="javascript:void(0)" data-toggle="modal"  data-target="#deleteComment" ><span class="icn-spce-grp"><i class="fa fa-trash-o" style="color:darkred"></i></span></a>';



              }
            else
            {



            }

					echo "</div></div>";
         
        }
    }
		 public function recent_comment_count_event()
    {
		$forum_id=$this->input->get('id_event');
		
//$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='EVENT' AND `catID`='$forum_id' AND `raAction`='COMMENT' ";
$comment_count="SELECT COUNT(`uaID`) AS `total_comments` FROM `useraction` WHERE `uaCategory`='EVENT' AND `catID`='$forum_id'";
$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
	echo $comment_row[0]['total_comments'];	
	
	}
	 public function recent_like_count_event()
    {
		$forum_id=$this->input->get('id_event');
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='EVENT' AND `catID`='$forum_id' AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		echo $like_row[0]['total_likes'];
		
	}	
	
        public function display_all_comments()
    {
    $post_id = $this->input->get("post_id");
        $data['all_data']=$this->Groups_model->display_all_comments_m();
        foreach($data['all_data'] as $all)
        {
            echo '<div id="subcomment_'.$all->uaID.'">';
            echo "
            <div  style='padding: 3%;background-color: rgba(24, 64, 53, 0.69);height: auto;display: inline-block;width: 100%;margin-bottom:0' ><p>";

            if(ISSET($all->photo)){
                echo "<img src='/uploads/".$all->photo."' style='width: 30px;height: 30px;float: left;border-radius: 50px;margin-right: 9px;'>";
            }
            else{
                echo "<img src='/uploads/profile.png' style='width: 30px;height: 30px;float: left;border-radius: 50px;margin-right: 9px;'>";
            }

            echo "<div class='comment-details'><span style='font-size: 12.5px !important;font-weight:bold'>".$all->perdataFirstName.' '.$all->perdataLastName."</span><b style='padding-left: 2%;color: rgb(234, 222, 222);'><span id='singlcomment_".$all->uaID."'>".$all->uaDescription."</span></b></div>";

            if($this->session->userdata['profile_data'][0]['custID'] == $all->custID)
            {



                echo '<a  class="editComment" data-commentid="'.$all->uaID.'" href="javascript:void(0)" data-toggle="modal" data-commentonly="'.$all->uaDescription.'"  data-target="#editComment"  ><span class="icn-spce-grp"><i class="fa fa-pencil-square-o" style="color:darkgreen"></i></span></a>';

                echo '<a class="deleteComment" data-p="'.$post_id.'" data-comment="'.$all->uaID.'" href="javascript:void(0)" data-toggle="modal"  data-target="#deleteComment" ><span class="icn-spce-grp"><i class="fa fa-trash-o" style="color:darkred"></i></span></a>';



            }
            else
            {



            }
            echo "</div></div>";
        } }
    public function null()
    {
    }
    public function delete_single_comment()
    {

        $comment_id = $this->input->post('comment_id');

        $this->Groups_model->delete_single_forum_comment($comment_id);



    }
    public function edit_single_comment()
    {


        $comment_id = $this->input->post('comment_id');

        $comment_value = $this->input->post('comment_value');

        $results = $this->Groups_model->update_single_forum_comment($comment_id,$comment_value);

        header("content-type:application/json");
        echo json_encode($results);exit;



    }


    public function get_single_comment()
    {


        $comment_id = $this->input->post('comment_id');



        $results = $this->Groups_model->get_single_forum_comment($comment_id);

        header("content-type:application/json");
        echo json_encode($results);exit;



    }
    //-------------------------------------------------------------------------------------
	
	
	
	
}	


?>