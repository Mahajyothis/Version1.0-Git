<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Groups extends CI_Controller{

	function __construct(){
		parent::__construct();
        
		$this->load->model('Groups_model');
		$this->load->helper('form');
	    $this->load->library("pagination");
		$this->load->library('upload');
		$this->load->library('custom_function');
		$this->load->library('image_lib');
		
	$this->original_path = UPLOADS.'groups/banners';
    //$this->resized_path = realpath(APPPATH.'../uploads/resized');
    $this->thumbs_path = UPLOADS.'groups/thumbs';
	}

	public function index(){
            
		
            $data["results_own"] = $this->Groups_model->get_groups('own');
			
			
			
			$data["results_public"] = $this->Groups_model->get_groups('public');
			$data["network_groups"] = $this->Groups_model->get_networks_groups();
			$this->load->view('groups/groups',$data);
	}
	
	public function view($id)
	{
	   if($id == ""){
			redirect('404');
		}
       
	    $data['r'] = $this->uri->segment(3);
	   
		$url = explode('-',$id);
		$id = $url[0];
		$this->session->set_userdata('groupID',$id);
		$data['userData'] = $this->Groups_model->getOneGroupMember();
	    $data['results'] = $this->Groups_model->get_group_data($id);
		
		$data['members'] = $this->Groups_model->getGroupMembers();
		
		
		
		$data['posts'] = $this->Groups_model->get_posts();
		
	   $this->load->view('groups/view',$data);
	}
	
	
	public function view_public($id)
	{
	   if($id == ""){
			redirect('404');
		}
       
	    $data['r'] = $this->uri->segment(3);
	   
		$url = explode('-',$id);
		$id = $url[0];
		$this->session->set_userdata('groupID',$id);
		$data['userData'] = $this->Groups_model->getOneGroupMember();
	    $data['results'] = $this->Groups_model->get_group_data($id);
		
		$data['members'] = $this->Groups_model->getGroupMembers();
		
		
		
		$data['posts'] = $this->Groups_model->get_posts();
		
	   $this->load->view('view_public',$data);
	}
	
	
	public function add()
    {
            
			$config['upload_path'] = UPLOADS."groups/banners";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
			
			
         
		    $this->upload->initialize($config);
			$field_name = "groupCover";
            $this->upload->do_upload($field_name);
            $image_data = $this->upload->data();
	
			
			 $config = array(
             'source_image'      => $image_data['full_path'],
             'new_image'         => $this->thumbs_path,
             'maintain_ratio'    => true,
             'width'             => 200
           );

		   
    //here is the second thumbnail, notice the call for the initialize() function again
           
		    $this->image_lib->initialize($config);
            $this->image_lib->resize();
			  $this->image_lib->clear();
			
			
			if($this->upload->display_errors())
			{
			     $data['grp_cover']             = 'profile.png';
			}
			else
			{
			     $data['grp_cover']  =   $this->upload->data('file_name');
			}
            $data['custID']              = $this->input->post('userID');
            $data['grp_name']            = $this->input->post('groupTitle');
            $data['grp_description']     = $this->input->post('groupDes');
			$data['privacy']             = $this->input->post('groupPrivacy');

            
			$status = $this->Groups_model->create_group($data);
            if($status !=0)
			{
			   $this->session->set_flashdata('flashmessage', 'Group has been created.');
			}
			redirect(base_url() . 'groups', 'refresh');
	
         }
		
	
	public function update()
	{
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
	
		
	/* GROUP POSTING OPERATIONS  */
	
	public function doPost(){
		
		if($this->input->post('postApostContent')){
		   
		  $res = $this->Groups_model->createPost($this->input->post('postApostContent'));
		
		}
		
		return $res;
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
		
		return $res;
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
	        
		    $res = $this->Groups_model->doPostwithImage($this->upload->data('file_name'));
			
			
			redirect(base_url().'groups/view/'.$this->uri->segment(3));
	        
	}
	
	public function updatePostwithImage(){
		    
			
			
			$img = '';
		    if($_FILES['editStatusPhoto']['name']){
				$config['upload_path'] = UPLOADS."groups/posts";
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->upload->initialize($config);
				
				$field_name = "editStatusPhoto";
				$this->upload->do_upload($field_name);
				$img = $this->upload->data('file_name');
	        }
			else
			{
			   $img = NULL;
			}
		    $res = $this->Groups_model->updatePostwithImage($img);
			
			
			redirect(base_url().'groups/view/'.$this->uri->segment(3));
	        
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
				$vali="SELECT * FROM `group_invitation` WHERE `uID`='".$networks->uID."' AND `groupID`='".$this->session->userdata['groupID']."'";
				$r_val=$this->db->query($vali);
				if($r_val->num_rows() ==0){
						echo $networks->custName."\n";
				}
				else{
					echo "No User Found";
				}
						}
					function invitations(){
						$gid=$this->input->get('gid');
						$user_row = $this->session->userdata('profile_data');
						$name=$this->input->get('name');
						
						
						$uname="SELECT `custID` FROM `customermaster` WHERE `custName`='$name'";
						$result=$this->db->query($uname);
						$row=$result->result_array();
						
						$vali="SELECT * FROM `group_invitation` WHERE `uID`='".$row[0]['custID']."' AND `groupID`='$gid'";
				$r_val=$this->db->query($vali);
				if($r_val->num_rows() ==0){
						
						
						$invitation="INSERT INTO `group_invitation`(custID,uID,groupID)VALUES('".$user_row[0]['custID']."','".$row[0]['custID']."','$gid')";
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
    public function view_more_comments_based_on_status()
    {

        $datas['all_datas']=$this->Groups_model->get_more_comments();
        foreach($datas['all_datas'] as $all_comments)
        {

            echo "<div class='display_comm'><img src='/uploads/$all_comments->photo' height='25px' width='25px' style='margin:2%'>$all_comments->uaDescription</div>";
        }


    }
	
	
}	


?>
