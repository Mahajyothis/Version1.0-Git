<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Post extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->Common_model->checkLogin();

		$this->load->library('upload');
		$this->load->library('image_lib'); 

		$this->load->model('Post_model');
		$this->load->helper('form');
		$this->load->model('Language_model');
	}

	public function index($type=''){
			$data = array(
				'title' => 'Post',
				'page_name' => 'post',
				'type' => $type,

			);
           	$data['results']= $this->Post_model->get_data($type);
		
		       
        	$data['language'] = $this->Language_model->LangCompatible('post');
        	
		
		$this->load->view('post/post.php',$data);
	}

	public function create(){
		$results = 0;
		if ($this->input->is_ajax_request() && $this->input->post('doPost') && $this->input->post('postContent')) {
		   $results = $this->Post_model->createPost();
		   if($results){
		   		// ------ CREATE ACTIVITY LOG ------ //
				$this->log_array = array(
						'pid'		=> $results,
						'module'	=> 'Post',
						'action'	=> 'create',
						'table'		=> 'post',
						'comments'	=> ''
					);
				$this->Common_model->create_log($this->log_array);
				/// ------ CREATE ACTIVITY LOG ENDS HERE ------ //
			}
		   
		}
		echo $results;exit;
	}

	public function upload_status_image(){
		if(!empty($_FILES['statusImage']))	$up_res = $this->upload_image('statusImage',POSTS,true);
        elseif(!empty($_FILES['EditstatusImage'])) $up_res = $this->upload_image('EditstatusImage',POSTS,true);
        header("content-type:application/json");
		echo json_encode($up_res);exit;	
	}

	public function upload_image($field_name,$upload_path,$thumb=false){

		if($_FILES[$field_name]['error'] == 0){
			//upload and update the file
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png'; 
			$config['max_size'] = '1000'; 
			$config['max_width'] = '1024'; 
			$config['max_height'] = '850'; 
			$config['overwrite'] = false;
			$config['remove_spaces'] = true;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload($field_name))
			{
				$ret_data['img_error'] = $this->upload->display_errors('', '');
				return $ret_data;
			}
			elseif($thumb)
			{
				
				//Image Resizing
				$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;				
				$config['new_image'] = $this->upload->upload_path.'thumbs/'.$this->upload->file_name;
				$config['maintain_ratio'] = FALSE;
				$config['width'] = 270;
				$config['height'] = 250;

				$this->load->library('image_lib', $config);

				if ( ! $this->image_lib->resize()){
					$ret_data['img_error'] = $this->upload->display_errors('', '');
					$ret_data['img_error'] = $this->image_lib->display_errors('', '');
				}
				
			}
			if(!empty($ret_data)) return $ret_data;
			return $this->upload->file_name;
		}
	}

	public function delete_image(){
		$results = 0;
		if ($this->input->is_ajax_request() && $this->input->post('deleteStatusImage') && $this->input->post('image_name')) {
			$img = $this->input->post('image_name');
		   @unlink(POSTS.$img);
		   @unlink(POSTS.'thumbs/'.$img);
		   $results = 1;
		}
		echo $results;exit;
	}

	public function delete(){
		$results = 0;
		if ($this->input->is_ajax_request() && $this->input->post('deletePost') && $this->input->post('id')) {
		   $results = $this->Post_model->deletePost();
		   
		}
		echo $results;exit;
	}

	public function get_post(){
		$results = array();
		if ($this->input->is_ajax_request() && $this->input->post('getPost') && $this->input->post('id')) {
		   $results = $this->Post_model->getSinglePost($this->input->post('id'));
		   if(!file_exists(POSTS.$results->postImage)) $results->postImage = '';
		   
		}
		header("content-type:application/json");
		echo json_encode($results);exit;
	}
	
	public function update(){
		$results = 0;
		if ($this->input->is_ajax_request() && $this->input->post('doPost') && $this->input->post('postContent')) {
		   $results = $this->Post_model->updatePost($this->input->post('id'));
		   if($results){
		   		// ------ CREATE ACTIVITY LOG ------ //
				$this->log_array = array(
						'pid'		=> $this->input->post('id'),
						'module'	=> 'Post',
						'action'	=> 'update',
						'table'		=> 'post',
						'comments'	=> ''
					);
				$this->Common_model->create_log($this->log_array);
				/// ------ CREATE ACTIVITY LOG ENDS HERE ------ //
			}
		   
		}
		echo $results;exit;
	}

	
    public function recent_comments()
    {
    
        
        	$data['language'] = $this->Language_model->LangCompatible('post');
        
		$post_id=$this->input->get('id_post');
		
		
		$qwerty = "(SELECT pp.`photo` ,ua.`uaDescription`,cm.`custID`,cm.`custName`,ua.`uaID`,ua.`catID`,
				(SELECT count(*) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_LIKE' AND `custID`='".$this->session->userdata['profile_data'][0]['custID']."' ) AS liked,
				(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_LIKE' ) AS `total_likes`,
				(SELECT COUNT(`uaID`) FROM `useraction` WHERE `uaCategory`='POST' AND `catID`=ua.`uaID` AND `uaAction`='SUB_COMMENT' ) AS `total_comments` 
				FROM `useraction` ua 
			    LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
			    LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
			    WHERE ua.`uaCategory`='POST' AND ua.`catID`='$post_id' ORDER BY ua.`uaID` DESC  LIMIT 4)";
			 
			 
		$datas=$this->db->query($qwerty)->result();
		
		if(!empty($datas)){

			$sub_query="";
			foreach($datas as $sub_row){
				if($sub_query!="") $sub_query.= ' UNION ';
				
				$sub_query.="(SELECT pp.`photo` ,ua.`uaDescription`,cm.`custID`,cm.`custName`,ua.`uaID`,ua.`catID`,
				(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_SUB_LIKE' AND `custID`='".$this->session->userdata['profile_data'][0]['custID']."' ) AS sub_liked,
				(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_SUB_LIKE' ) AS `sub_total_likes`
				FROM `useraction` ua 
			    LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
			    LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
			    WHERE ua.`uaCategory`='POST' AND ua.`catID`='".$sub_row->uaID."' AND ua.`uaAction`='SUB_COMMENT' ORDER BY ua.`uaID` DESC LIMIT 2)
				";			
				
			}
		}

if(!empty($sub_query)) $post_sub_comments = $this->db->query($sub_query)->result();
		$i=0;
			foreach($datas as $comments){
					
					foreach($post_sub_comments  as $sub_comments){
						if($comments->uaID === $sub_comments->catID){
							$datas[$i]->sub_comments[] = array(
								'sub_comment'	=> $sub_comments->uaDescription,
								'sub_photo'	=> $sub_comments->photo,
								'sub_custID'	=> $sub_comments->custID,
								'sub_custName'	=> $sub_comments->custName,
								'sub_uaID'	=> $sub_comments->uaID,
								'sub_catID'	=> $sub_comments->catID,
								'sub_liked' => $sub_comments->sub_liked,
								'sub_total_likes' => $sub_comments->sub_total_likes
							);
						
						}

					}						
					$i++;	
				}				
		

      foreach($datas as $row){
          echo '<div id="subcomment_'.$row->uaID.'">';
     
           echo '<div id="d_c1" class="display_comm" id="margin"style="margin-left: 10.5%;margin-top:41px"><p><img  src="'.base_url().'uploads/';
     if(!empty($row->photo)){
     
     echo $row->photo;
     }else{
     echo "profile.png";
     }
     
     
    
    echo '" height="40px" width="40px" style="margin-left:5%;padding:0.5%;border:1px solid #ccc;border-radius: 3px"><b style="margin-left: 1%;border: 1px solid #ccc;padding: 1.1%;border-radius: 3px">'.$row->custName.'</b></p>
	  <br><p class="com-brk"><span class="comments_only"></span><span id="singlcomment_'.$row->uaID.'">'.$row->uaDescription.'</span></p>';

if($this->session->userdata['profile_data'][0]['custID'] == $row->custID)
          {
	                echo '<a style="color:#46b8da;cursor:pointer;" data-toggle="modal"  data-commentid="'.$row->uaID.'"  data-commentonly="'.$row->uaDescription.'" class="editComment" data-target="#editComment">
              <span style="float:right; margin: 0px 28px 2px 22px;" class="glyphicon glyphicon-edit"></span>
          </a>
	

          <a style="color:#FF8F00;cursor:pointer;" data-p='.$post_id.' data-comment="'.$row->uaID.'" class="deleteComment" data-toggle="modal" data-target="#deleteComment">
          <span style="float:right; margin: 0px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span>
          </a>';
          }
              
              echo '</div>
      <span class="user_sub'.$row->uaID.'" id="'.$row->custID.'">
      <div class="replay-bar">';
      
      
		if($row->liked){ 
                                 
                   echo '  <span  id="use_unlike'.$row->uaID.'"> <span id="'.$row->uaID.'" class="small fa fa-thumbs-up sub_user_unlike" style="color:green"> 
'.$data['language']['unlike'].'</span></span>   ';        
                                 
      }else{
      
     echo ' <span  id="use_like'.$row->uaID.'"> <span id="'.$row->uaID.'" class="small fa fa-thumbs-o-up  sub_user_like"> 
'.$data['language']['likes'].'</span> </span>';
      
     }
      
      
      
    echo ' (<span id="use_likes'.$row->uaID.'">
      
      
		
		'.$row->total_likes.'
      
      </span>)&nbsp &nbsp <span  id='.$row->uaID.' class="enter_sub_comment" style="cursor:pointer;">
'.$data['language']['comments'].'(<span id="recent_sub_comment_count'.$row->uaID.'">'.$row->total_comments.'  </span>)</span>

      <div id="recent_sub_comment'.$row->uaID.'">';
      if(!empty($row->sub_comments)){
      foreach($row->sub_comments as $sub_row){
     echo '<div id="subcomment_'.$sub_row['sub_uaID'].'">';
     echo '<span class="sub_user'.$sub_row['sub_uaID'].'" id="'.$sub_row['sub_custID'].'"></span>
 <div class="display_comm" id="margin"style="margin-left: 3%"><p style="margin-top: 3%" ><img  src="'.base_url().'uploads/';
     if(!empty($sub_row['sub_photo'])){
     
     echo $sub_row['sub_photo'];
     }else{
     echo "profile.png";
     }
     
     
    echo '" height="30px" width="30px" style="margin-left:5%;padding:0.5%;border:1px solid #ccc;border-radius: 3px"><b style="margin-left: 1%;border: 1px solid #ccc;padding: 0.6%;border-radius: 3px">'.$sub_row['sub_custName'].'</b><p id="singlcomment_'.$sub_row['sub_uaID'].'" class="com-brk">'.$sub_row['sub_comment'].'</p>';
                         echo '</p>';
                          if($this->session->userdata['profile_data'][0]['custID'] == $sub_row['sub_custID'])
     {
                         echo '<a style="color:#46b8da;cursor:pointer;" data-toggle="modal" data-commentonly="'.$sub_row['sub_comment'].'" data-commentid="'.$sub_row['sub_uaID'].'" class="editComment" data-target="#editComment">
         <span style="float:right; margin: 0px 28px 2px 22px;font-size:10px;"  class="glyphicon glyphicon-edit"></span>
     </a>
         <a style="color:#FF8F00;cursor:pointer;" class="deleteComment_sub" data-toggle="modal" data-subp="'.$sub_row['sub_catID'].'" data-comment='.$sub_row['sub_uaID'].' data-target="#deleteComment_sub">
            <span style="float:right; margin: 0px 5px 2px 22px;font-size:10px;" class="glyphicon glyphicon-trash"></span>
            </a>';
               }          
 			//echo '</div>';
			
    echo '</div>';
     if($sub_row['sub_liked']){ 
                               
                   echo ' <span id="user_sub_unlike'.$sub_row['sub_uaID'].'" style="margin-left:18%"><span class="fa fa-thumbs-up sub_sub_user_unlike" id="'.$sub_row['sub_uaID'].'" style="color:green"> 
'.$data['language']['unlike'].'</span></span> ';           
                                 
      }else{ 
      
    echo '<span id="user_sub_like'.$sub_row['sub_uaID'].'" style="margin-left:18%"><span class="fa fa-thumbs-o-up sub_sub_user_like" id="'.$sub_row['sub_uaID'].'"> 
'.$data['language']['likes'].'</span></span>';

      
     } 
     
 echo '(<span id="user_sub_likes'.$sub_row['sub_uaID'].'">
     '.$sub_row['sub_total_likes'].'
      
      </span>)</div>'; } }
//--------------rohitdutta------------------

echo "<p>";
if($row->total_comments > 2)
      {
      	echo "<a href='javascript:void(0)' id='view_com".$row->uaID."' class='view_more_post_sub_comments old_sub_comments' data-subpostpostid='".$row->uaID."' style='color: darkgreen; font-weight: bold;font-size:76%;'>
".$data['language']['view_more_comments']."</a><div id='loading_img_sub".$row->uaID."'></div>";
     	
      }
echo "</p>";
       //------------------------------------------
     echo '</div> <div class="navbar-form navbar-left" role="search">
      
   <div class="form-group sub_com'.$row->uaID.'" style="display:none;">   <input type="text" class="form-control" id="user_sub_comment'.$row->uaID.'"><button class="btn btn-default sub_comment" id="'.$row->uaID.'">'.$data['language']['submit'].'</button></div>
  </div>
  
   <br>
      </div></div>';
      
      
      //------------------------------------------
        }


		
	}	
		
		
   
		 public function recent_comment_count()
    {
		$forum_id=$this->input->get('id_post');
		
//$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`='$forum_id' AND `raAction`='COMMENT' ";
$comment_count="SELECT count(uaID) as total_comments FROM `useraction` WHERE `catID` = '$forum_id'  and `uaCategory`='POST' ";
$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
	echo $comment_row[0]['total_comments'];	
	
	}
	 public function recent_like_count()
    {
		$forum_id=$this->input->get('id_post');
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`='$forum_id' AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		echo $like_row[0]['total_likes'];
		
	}

        public function recent_sub_comments()
    {
    
        
        	$data['language'] = $this->Language_model->LangCompatible('post');
		
		$post_id=$this->input->get('id_post');
		$qwerty = "(SELECT pp.`photo` ,ua.`uaDescription`,cm.`custID`,cm.`custName`,ua.`uaID`,ua.`catID`,
				(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_SUB_LIKE' AND `custID`='".$this->session->userdata['profile_data'][0]['custID']."' ) AS sub_liked,
				(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_SUB_LIKE' ) AS `sub_total_likes`
				FROM `useraction` ua 
			    LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
			    LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
			    WHERE ua.`uaCategory`='POST' AND ua.`catID`='$post_id' AND ua.`uaAction`='SUB_COMMENT' ORDER BY ua.`uaID` DESC LIMIT 2)";
        
		$datas=$this->db->query($qwerty)->result();
		
       
       if(!empty($datas)){
      foreach($datas as $sub_row){
     
     echo '<span class="sub_user'.$sub_row->uaID.'" id="'.$sub_row->custID.'"></span>
 <div id="subcomment_'.$sub_row->uaID.'">

		 <div class="display_comm" id="margin"style="margin-left: 3%"><p style="margin-top: 3%"><img  src="'.base_url().'uploads/';
          if(!empty($sub_row->photo)){

              echo $sub_row->photo;
          }else{
              echo "profile.png";
          }


          echo '" height="30px" width="30px" style="margin-left:5%;padding:0.5%;border:1px solid #ccc;border-radius: 3px"><b style="margin-left: 1%;border: 1px solid #ccc;padding: 0.6%;border-radius: 3px">'.$sub_row->custName.'</b><p id="singlcomment_'.$sub_row->uaID.'" class="com-brk">'.$sub_row->uaDescription.'</p>';

          if($this->session->userdata['profile_data'][0]['custID'] == $sub_row->custID)
          {

              echo '<a style="color:#46b8da;cursor:pointer;" data-toggle="modal" data-commentid='.$sub_row->uaID.'  data-commentonly="'.$sub_row->uaDescription.'" class="editComment" data-target="#editComment">
            <span style="float:right; margin: 0px 28px 2px 22px;font-size:10px;" class="glyphicon glyphicon-edit"></span>
            </a>
            <a style="color:#FF8F00;cursor:pointer;" class="deleteComment_sub" data-toggle="modal" data-subp="'.$sub_row->catID.'" data-comment='.$sub_row->uaID.' data-target="#deleteComment_sub">
            <span style="float:right; margin: 0px 5px 2px 22px;font-size:10px;" class="glyphicon glyphicon-trash"></span>
            </a>';
          }
          else
          {

          }
          echo '</div>';


          if($sub_row->sub_liked){

              echo ' <span class="fa fa-thumbs-up sub_user_unlike" style="color:green"> '.$data['language']['unlike'].'</span> ';

          }else{

              echo '<span id="user_sub_like'.$sub_row->uaID.'" style="margin-left: 18%;"><span class="fa fa-thumbs-o-up sub_sub_user_like" id="'.$sub_row->uaID.'">'.$data['language']['likes'].'</span></span>';


          }

          echo '(<span id="user_sub_likes'.$sub_row->uaID.'">
		     '.$sub_row->sub_total_likes.'

		      </span>)';

          echo '</div>';

  	
 } 
 //--------------------------------RohitDutta------sub_comment---------------------

	

	
	$forum_id=$this->input->get('id_post');
		

$comment_count="SELECT COUNT(`uaID`) AS `total_comments` FROM `useraction` WHERE `uaCategory`='POST' AND `catID`='$forum_id' AND `uaAction`='SUB_COMMENT' ";
$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
		
	
	if($comment_row[0]['total_comments'] > 2)
	{
	
	echo "<a href='javascript:void(0)' id='view_com".$sub_row->uaID."' class='view_more_post_sub_comments old_sub_comments".$forum_id."' data-subpostpostid='".$forum_id."'  style='color: darkgreen; font-weight: bold;font-size:76%;'>
".$data['language']['view_more_comments']."</a><div id='loading_img_sub".$forum_id."'></div>";
	}
	
       //--------------------------------RohitDutta------------------------------
 }


	

        }


	
    
    	 public function recent_sub_comment_count()
    {
		$forum_id=$this->input->get('id_post');
		
//$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`='$forum_id' AND `raAction`='SUB_COMMENT' ";
$comment_count="SELECT COUNT(`uaID`) AS `total_comments` FROM `useraction` WHERE `uaCategory`='POST' AND `catID`='$forum_id' AND `uaAction`='SUB_COMMENT' ";
$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
	echo $comment_row[0]['total_comments'];	
	
	}
	
	 public function recent_sub_like_count()
    {
		$forum_id=$this->input->get('id_post');
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`='$forum_id' AND `raAction`='SUB_LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		echo $like_row[0]['total_likes'];
		
	}
	
	 public function recent_sub_sub_like_count()
    {
		$forum_id=$this->input->get('id_post');
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`='$forum_id' AND `raAction`='SUB_SUB_LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		echo $like_row[0]['total_likes'];
		
	}
	//-------------------------------RohitDutta-------------------------------
	
	public function display_sub_post_comments()
	{
$data['language'] = $this->Language_model->LangCompatible('post');
				
				
				$post_id=$this->input->get('id_post');
				$qwerty = "(SELECT pp.`photo` ,ua.`uaDescription`,cm.`custID`,cm.`custName`,ua.`uaID`,ua.`catID`,
						(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_SUB_LIKE' AND `custID`='".$this->session->userdata['profile_data'][0]['custID']."' ) AS sub_liked,
						(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_SUB_LIKE' ) AS `sub_total_likes`
						FROM `useraction` ua 
					    LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
					    LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
					    WHERE ua.`uaCategory`='POST' AND ua.`catID`='$post_id' AND ua.`uaAction`='SUB_COMMENT' ORDER BY ua.`uaID` DESC )";
		        
				$datas=$this->db->query($qwerty)->result();
				
		       
		       if(!empty($datas)){
		      foreach($datas as $sub_row){
		     
		     echo '<span class="sub_user'.$sub_row->uaID.'" id="'.$sub_row->custID.'"></span>

          <div id="subcomment_'.$sub_row->uaID.'">

		 <div class="display_comm" id="margin"style="margin-left: 3%"><p style="margin-top: 3%"><img  src="'.base_url().'uploads/';
		     if(!empty($sub_row->photo)){
		     
		     echo $sub_row->photo;
		     }else{
		     echo "profile.png";
		     }
		     
		     
		    echo '" height="30px" width="30px" style="margin-left:5%;padding:0.5%;border:1px solid #ccc;border-radius: 3px"><b style="margin-left: 1%;border: 1px solid #ccc;padding: 0.6%;border-radius: 3px">'.$sub_row->custName.'</b><p id="singlcomment_'.$sub_row->uaID.'" class="com-brk">'.$sub_row->uaDescription.'</p>';

           if($this->session->userdata['profile_data'][0]['custID'] == $sub_row->custID)
           {

            echo '<a style="color:#46b8da;cursor:pointer;" data-toggle="modal" data-commentid='.$sub_row->uaID.'  data-commentonly="'.$sub_row->uaDescription.'" class="editComment" data-target="#editComment">
            <span style="float:right; margin: 0px 28px 2px 22px;font-size:10px" class="glyphicon glyphicon-edit"></span>
            </a>
            <a style="color:#FF8F00;cursor:pointer;" class="deleteComment_sub" data-toggle="modal" data-subp="'.$sub_row->catID.'" data-comment='.$sub_row->uaID.' data-target="#deleteComment_sub">
            <span style="float:right; margin: 0px 5px 2px 22px;font-size:10px" class="glyphicon glyphicon-trash"></span>
            </a>';
           }
          else
           {

           }
		  echo '</div>';

		     
		     if($sub_row->sub_liked){ 
		                               
		                   echo ' <span id="user_sub_unlike'.$sub_row->uaID.'" style="margin-left:18%" ><span class="fa fa-thumbs-up sub_sub_user_unlike" id="'.$sub_row->uaID.'"  style="color:green;"> '.$data['language']['unlike'].'</span></span> ';           
		                                 
		      }else{ 
		      
		    echo '<span id="user_sub_like'.$sub_row->uaID.'" style="margin-left:18%;"><span class="fa fa-thumbs-o-up sub_sub_user_like" id="'.$sub_row->uaID.'"> 
'.$data['language']['likes'].'</span></span>';
		
		      
		     } 
		     
		 echo '(<span id="user_sub_likes'.$sub_row->uaID.'">
		     '.$sub_row->sub_total_likes.'
		      
		      </span>)';
		
		  echo '</div>';
		
		 }
		 

		  }
		 
	}
	public function null()
    	{
		
    	}
    	
	public function display_post_post_comments()
    	{
    	$data['language'] = $this->Language_model->LangCompatible('post');
	
    	$post_id=$this->input->get('id_post');
		
		
		$qwerty = "(SELECT pp.`photo` ,ua.`uaDescription`,cm.`custID`,cm.`custName`,ua.`uaID`,ua.`catID`,
				(SELECT count(*) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_LIKE' AND `custID`='".$this->session->userdata['profile_data'][0]['custID']."' ) AS liked,
				(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_LIKE' ) AS `total_likes`,
				(SELECT COUNT(`uaID`) FROM `useraction` WHERE `uaCategory`='POST' AND `catID`=ua.`uaID` AND `uaAction`='SUB_COMMENT' ) AS `total_comments` 
				FROM `useraction` ua 
			    LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
			    LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
			    WHERE ua.`uaCategory`='POST' AND ua.`catID`='$post_id' ORDER BY ua.`uaID` DESC)";
			 
			 
		$datas=$this->db->query($qwerty)->result();
		
		if(!empty($datas)){

			$sub_query="";
			foreach($datas as $sub_row){
				if($sub_query!="") $sub_query.= ' UNION ';
				
				$sub_query.="(SELECT pp.`photo` ,ua.`uaDescription`,cm.`custID`,cm.`custName`,ua.`uaID`,ua.`catID`,
				(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_SUB_LIKE' AND `custID`='".$this->session->userdata['profile_data'][0]['custID']."' ) AS sub_liked,
				(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_SUB_LIKE' ) AS `sub_total_likes`
				FROM `useraction` ua 
			    LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
			    LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
			    WHERE ua.`uaCategory`='POST' AND ua.`catID`='".$sub_row->uaID."' AND ua.`uaAction`='SUB_COMMENT' ORDER BY ua.`uaID` DESC LIMIT 2)
				";			
				
			}
		}

if(!empty($sub_query)) $post_sub_comments = $this->db->query($sub_query)->result();
		$i=0;
			foreach($datas as $comments){
					
					foreach($post_sub_comments  as $sub_comments){
						if($comments->uaID === $sub_comments->catID){
							$datas[$i]->sub_comments[] = array(
								'sub_comment'	=> $sub_comments->uaDescription,
								'sub_photo'	=> $sub_comments->photo,
								'sub_custID'	=> $sub_comments->custID,
								'sub_custName'	=> $sub_comments->custName,
								'sub_uaID'	=> $sub_comments->uaID,
								'sub_catID'	=> $sub_comments->catID,
								'sub_liked' => $sub_comments->sub_liked,
								'sub_total_likes' => $sub_comments->sub_total_likes
							);
						
						}

					}						
					$i++;	
				}				
		

      foreach($datas as $row){
          echo '<div id="subcomment_'.$row->uaID.'">';
     
           echo '<div id="d_c1" class="display_comm" id="margin"style="margin-left: 10.5%;margin-top:41px"><p><img  src="'.base_url().'uploads/';
     if(!empty($row->photo)){
     
     echo $row->photo;
     }else{
     echo "profile.png";
     }
     
     
    
    echo '" height="40px" width="40px" style="margin-left:5%;padding:0.5%;border:1px solid #ccc;border-radius: 3px"><b style="margin-left: 1%;border: 1px solid #ccc;padding: 1.1%;border-radius: 3px">'.$row->custName.'</b></p>
	  <br><p class="com-brk"><span class="comments_only"></span><span id="singlcomment_'.$row->uaID.'">'.$row->uaDescription.'</span></p>';
 if($this->session->userdata['profile_data'][0]['custID'] == $row->custID)
 {
	
	                echo '<a style="color:#46b8da;cursor:pointer;" data-toggle="modal"  data-commentid="'.$row->uaID.'"  data-commentonly="'.$row->uaDescription.'" class="editComment" data-target="#editComment">
              <span style="float:right; margin: 0px 28px 2px 22px;" class="glyphicon glyphicon-edit"></span>
          </a>


          <a style="color:#FF8F00;cursor:pointer;" data-p='.$post_id.' data-comment="'.$row->uaID.'" class="deleteComment" data-toggle="modal" data-target="#deleteComment">
              <span style="float:right; margin: 0px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>';
              }
              
              echo '</div>
      <span class="user_sub'.$row->uaID.'" id="'.$row->custID.'">
      <div class="replay-bar">';
      
      
		if($row->liked){ 
                                 
                   echo '  <span  id="use_unlike'.$row->uaID.'"> <span id="'.$row->uaID.'" class="small fa fa-thumbs-up sub_user_unlike" style="color:green"> '.$data['language']['unlike'].'</span></span>   ';        
                                 
      }else{
      
     echo ' <span  id="use_like'.$row->uaID.'"> <span id="'.$row->uaID.'" class="small fa fa-thumbs-o-up  sub_user_like"> '.$data['language']['likes'].'</span> </span>';
      
     }
      
      
      
    echo ' (<span id="use_likes'.$row->uaID.'">
      
      
		
		'.$row->total_likes.'
      
      </span>)&nbsp &nbsp <span  id='.$row->uaID.' class="enter_sub_comment" style="cursor:pointer;">
'.$data['language']['comments'].'(<span id="recent_sub_comment_count'.$row->uaID.'">'.$row->total_comments.'  </span>)</span>

      <div id="recent_sub_comment'.$row->uaID.'">';
      if(!empty($row->sub_comments)){
      foreach($row->sub_comments as $sub_row)
      {
     echo '<div id="subcomment_'.$sub_row['sub_uaID'].'">';
     echo '<span class="sub_user'.$sub_row['sub_uaID'].'" id="'.$sub_row['sub_custID'].'"></span>
 <div class="display_comm" id="margin"style="margin-left: 3%"><p style="margin-top: 3%" ><img  src="'.base_url().'uploads/';
     if(!empty($sub_row['sub_photo']))
     {
     
     	echo $sub_row['sub_photo'];
     }
     else
     {
     	echo "profile.png";
     }
     
     
    echo '" height="30px" width="30px" style="margin-left:5%;padding:0.5%;border:1px solid #ccc;border-radius: 3px"><b style="margin-left: 1%;border: 1px solid #ccc;padding: 0.6%;border-radius: 3px">'.$sub_row['sub_custName'].'</b><p id="singlcomment_'.$sub_row['sub_uaID'].'" class="com-brk">'.$sub_row['sub_comment'].'</p>';
                         echo '</p>';
                         if($this->session->userdata['profile_data'][0]['custID'] == $sub_row['sub_custID'])
     {
                         echo '<a style="color:#46b8da;cursor:pointer;" data-toggle="modal" data-commentonly="'.$sub_row['sub_comment'].'" data-commentid="'.$sub_row['sub_uaID'].'" class="editComment" data-target="#editComment">
         <span style="float:right; margin: 0px 28px 2px 22px;font-size:10px;"  class="glyphicon glyphicon-edit"></span>
     </a>
         <a style="color:#FF8F00;cursor:pointer;" class="deleteComment_sub" data-toggle="modal" data-subp="'.$sub_row['sub_catID'].'" data-comment='.$sub_row['sub_uaID'].' data-target="#deleteComment_sub">
            <span style="float:right; margin: 0px 5px 2px 22px;font-size:10px;" class="glyphicon glyphicon-trash"></span>
            </a>';
            }
                         
 			echo '</div>';
			
    //echo '</div>';
     if($sub_row['sub_liked']){ 
                               
                   echo ' <span id="user_sub_unlike'.$sub_row['sub_uaID'].'" style="margin-left:18%"><span class="fa fa-thumbs-up sub_sub_user_unlike" id="'.$sub_row['sub_uaID'].'" style="color:green"> 
'.$data['language']['unlike'].'</span></span> ';           
                                 
      }else{ 
      
    echo '<span id="user_sub_like'.$sub_row['sub_uaID'].'" style="margin-left:18%" ><span class="fa fa-thumbs-o-up sub_sub_user_like" id="'.$sub_row['sub_uaID'].'"> 
'.$data['language']['likes'].'</span></span>';

      
     } 
     
 echo '(<span id="user_sub_likes'.$sub_row['sub_uaID'].'">
     '.$sub_row['sub_total_likes'].'
      
      </span>)</div>'; } }
      
//--------------rohitdutta------------------
echo "<p>";
if($row->total_comments > 2)
      {
echo "<a href='javascript:void(0)' id='view_com".$row->uaID."' class='view_more_post_sub_comments old_sub_comments' data-subpostpostid='".$row->uaID."' style='color: darkgreen; font-weight: bold;font-size:76%;'>".$data['language']['view_more_comments']."</a><div id='loading_img_sub".$row->uaID."'></div>";
     	
      }
echo "</p>";
       //------------------------------------------
     echo '</div> <div class="navbar-form navbar-left" role="search">
      
   <div class="form-group sub_com'.$row->uaID.'" style="display:none;">   <input type="text" class="form-control" id="user_sub_comment'.$row->uaID.'"><button class="btn btn-default sub_comment" id="'.$row->uaID.'">
'.$data['language']['submit'].'</button></div>
  </div>
  
   <br>
     </div></div>';
      
      
      //------------------------------------------
        }
    	
	
	}


	public function delete_single_comment()
    	{	

        

        
        	$results = 0;
		if ($this->input->is_ajax_request() && $this->input->post('deleteComment') && $this->input->post('comment_id')) 
		{
		   $results = $this->Post_model->delete_single_forum_comment();
		   
		   
		}
		echo $results;exit;
		
		
		



    }
    public function edit_single_comment()
    {


        $comment_id = $this->input->post('comment_id');

        $comment_value = $this->input->post('comment_value');

        $results = $this->Post_model->update_single_forum_comment($comment_id,$comment_value);

        header("content-type:application/json");
        echo json_encode($results);exit;



    }


    public function get_single_comment()
    {


        $comment_id = $this->input->post('comment_id');



        $results = $this->Post_model->get_single_forum_comment($comment_id);

        header("content-type:application/json");
        echo json_encode($results);exit;



    }
	
	
        	
    
	
}	


?>