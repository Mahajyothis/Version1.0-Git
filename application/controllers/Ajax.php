<?php
class Ajax extends CI_Controller {
//CONSTRUCTOR
	public function __construct()
	{
		parent::__construct();
		$this->load->library('custom_function');
		$this->load->model('Language_model');
	}
	
	// TIMELINE POSTS AUTOLOAD
	public function status_autoload()
	{
		$page_name = 'Post';
        
        	$data['lang'] = $this->Language_model->LangCompatible($page_name);  
        	
        	
		$result_posts = array();
		if( $this->input->post('getPosts') && $this->input->post('last_id')){
			$this->load->model('Post_model');
				$results = $this->Post_model->get_data($this->input->post('type'),$this->input->post('last_id'));
				if($results){
					foreach ($results as $key => $value) {
            // Initialization of vairables
						$userActions = $postImage = $private_post = $postComments = '' ;
						$view_more_comments='';  
						$view_more_sub_comments='';
						$edit_delete='';
						$edit_delete_sub = '';
            $userLike = '<span style="padding:3px;border-radius:3px;" id="user_like'.$value->postId.'" ><span class="small glyphicon glyphicon-thumbs-up user_like" id="'.$value->postId.'"> '.$data['lang']['likes'].'</span>';

						$profile_photo = 'profile.png';
            if($value->postType == 1){
              $private_post = '<img src="'.base_url().IMAGES.'post/private.png" title="'.$data['lang']['private_post'].'" alt="Private Post">';
            } 
						if($this->session->userdata['profile_data'][0]['custID'] == $value->custID){ 
                                $userActions = '
                                <small><a href="javascript:void(0)"  data-toggle="modal" data-target="#editPostPopDivision" class="editData"><span class="glyphicon glyphicon-edit"></span></a></small>
                                  <small><a href="javascript:void(0)" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation"><span class="glyphicon glyphicon-trash"></span></a></small>
                                  
                                ';
                            }
                           if($value->photo && file_exists(UPLOADS.$value->photo)) $profile_photo = $value->photo;
            if(!empty($value->postImage) && file_exists(POSTS.$value->postImage)) { 
                                $postImage = '<p class="postImage">
                                  <a href="'.base_url().POSTS.$value->postImage.'" class="fancybox"><img src="'.base_url().POSTS.$value->postImage.'" alt="'.$value->postImage.'" /></a>
                                </p>';
                } 

            // Check user liked this post
            if($value->liked) $userLike = '<span style="padding:3px;border-radius:3px;" id="user_unlike'.$value->postId.'" ><span style="padding:3px;border-radius:3px;"><span id="'.$value->postId.'"  class="small fa fa-thumbs-up user_unlike" style="color:green;"> '.$data['lang']['unlike'].'</span></span>';

            // Proces user comments
            if(!empty($value->comments)){ 
              $postComments = '';
              foreach($value->comments as $row){
		$edit_delete = '';
		if($this->session->userdata['profile_data'][0]['custID'] == $row['custID'])
		{
		$edit_delete = '
		<a style="color:#46b8da;cursor:pointer;" data-toggle="modal"  data-commentid="'.$row['uaID'].'"  data-commentonly="'.$row['comment'].'" class="editComment" data-target="#editComment">
              <span style="float:right; margin: 0px 28px 2px 22px;" class="glyphicon glyphicon-edit"></span>
          </a>


          <a style="color:#FF8F00;cursor:pointer;" data-p="'.$value->postId.'" data-comment="'.$row['uaID'].'" class="deleteComment" data-toggle="modal" data-target="#deleteComment">
              <span style="float:right; margin: 0px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>
		
		';
		}
		
                $userCommentLike = '<span  id="use_like'.$row['uaID'].'"> <span id="'.$row['uaID'].'" class="small fa fa-thumbs-o-up sub_user_like"> '.$data['lang']['likes'].'</span></span>';
                $comAvatar = ($row['photo'] && file_exists(UPLOADS.$row['photo'])) ? base_url().UPLOADS.$row['photo'] : base_url().UPLOADS.'profile.png';
                if($row['sub_liked']) $userCommentLike = '<span  id="use_like'.$row['uaID'].'"><span class="small fa fa-thumbs-up sub_user_unlike" id="'.$row['uaID'].'" style="color:green"> '.$data['lang']['unlike'].'</span></span>';
                $postComments .= '
                              <div id="subcomment_'.$row['uaID'].'">
                              <div id="d_c1" class="display_comm" id="margin"style="margin-left: 3%;margin-top:41px">
                              <p>
                                <a href="'.base_url().'user/'.$row['custName'].'">
                                  <img src="'.$comAvatar.'" alt="'.$row['custName'].'" height="25px" width="25px" style="margin-left:5%" />
                                  <b style="margin-left: 6%">'.ucwords($row['custName']).'</b><br>
                                        </a>
                              </p>
                              <p style="margin-left: 15%;"><span class="comments_only"></span><span id="singlcomment_'.$row['uaID'].'">'.$row['comment'].'</span></p>'.$edit_delete.'
                              
                              
                              
             </div>               
                              
                              
                              <span class="user_sub'.$row['uaID'].'" id="'.$row['custID'].'">                        
                              <div class="replay-bar">
                                '.$userCommentLike.'
                                (<span id="use_likes'.$row['uaID'].'">'.$row['total_likes'].'</span>)&nbsp &nbsp 
                                <span  id="'.$row['uaID'].'" class="enter_sub_comment" style="cursor:pointer;">'.$data['lang']['comments'].'(<span id="recent_sub_comment_count'.$row['uaID'].'">'.$row['total_comments'].'</span>)</span>
                                <div id="recent_sub_comment'.$row['uaID'].'">
                              ';

                // Subcomments
                if(!empty($row['sub_comments'])){
                  $subComments = '';
                  foreach($row['sub_comments'] as $sub_row){
                  $edit_delete_sub = '';
                  if($this->session->userdata['profile_data'][0]['custID'] == $sub_row['sub_custID'])
                  {
                   $edit_delete_sub = '
                   <a style="color:#46b8da;cursor:pointer;" data-toggle="modal" data-commentonly="'.$sub_row['sub_comment'].'" data-commentid="'.$sub_row['sub_uaID'].'" class="editComment" data-target="#editComment">
         <span style="float:right; margin: 0px 28px 2px 22px;font-size:10px;"  class="glyphicon glyphicon-edit"></span>
     </a>
         <a style="color:#FF8F00;cursor:pointer;" class="deleteComment_sub" data-toggle="modal" data-subp="'.$sub_row['sub_catID'].'" data-comment='.$sub_row['sub_uaID'].' data-target="#deleteComment_sub">
            <span style="float:right; margin: 0px 5px 2px 22px;font-size:10px;" class="glyphicon glyphicon-trash"></span>
            </a>
                   ';
                  }
                    $userSubCommentLike = '<span id="user_sub_like'.$sub_row['sub_uaID'].'" style="margin-left: 18%;"><span class="fa fa-thumbs-o-up sub_sub_user_like" id="'.$sub_row['sub_uaID'].'"> '.$data['lang']['likes'].'</span></span>';
                    
                    
                    
                    if($sub_row['sub_sub_liked']) $userSubCommentLike = '<span id="user_sub_unlike'.$sub_row['sub_uaID'].'" style="margin-left: 18%;"><span class="small fa fa-thumbs-up sub_sub_user_unlike" id="'.$sub_row['sub_uaID'].'" style="color:green"> '.$data['lang']['unlike'].'</span></span>';
                    $subAvatar = ($sub_row['sub_photo'] && file_exists(UPLOADS.$sub_row['sub_photo'])) ? base_url().UPLOADS.$sub_row['sub_photo'] : base_url().UPLOADS.'profile.png';
                    $subComments .= '<div id="subcomment_'.$sub_row['sub_uaID'].'"><span class="sub_user'.$sub_row['sub_uaID'].'" id="'.$sub_row['sub_custID'].'"></span>
                                    <div class="display_comm" id="margin"style="margin-left: 3%">
                                      <p>
                                        <a href="'.base_url().'user/'.$sub_row['sub_custName'].'">
                                          <img src="'.$subAvatar.'" alt="'.$sub_row['sub_custName'].'" height="25px" width="25px" style="margin-left:5%" />
                                          <b style="margin-left: 3%;margin-bottom: 0px;">'.ucwords($sub_row['sub_custName']).'</b>
                                        </a>
                                      </p>
                                      <p id="singlcomment_'.$sub_row['sub_uaID'].'" style="margin-left: 15%;">'.$sub_row['sub_comment'].'</p>'.$edit_delete_sub.'
                                      
                                      
                                    </div>
                                    '.$userSubCommentLike.'
                                    (<span id="user_sub_likes'.$sub_row['sub_uaID'].'">'.$sub_row['sub_total_likes'].'</span>)</div>';
                                    
                                   
                                    
                                  
                  }
                 
                  $postComments .= $subComments;
                   }
                  
                  
                  $view_more_sub_comments='';
                  $count = $row['total_comments'];
                  if($count > 2)
                  {
$view_more_sub_comments ='<a href="javascript:void(0)" id="view_com'.$row['uaID'].'" class="view_more_post_sub_comments old_sub_comments" data-subpostpostid="'.$row['uaID'].'"  style="color: darkgreen; font-weight: bold;font-size:76%;">
  '.$data['lang']['view_more_comments'].'</a>';
  
  
                  }
                  
                  
                  
                  
                
                $postComments .= '<p>'.$view_more_sub_comments.'</p>
                              </div>     
                              
                              <div class="navbar-form navbar-left" role="search">      
                                 <div class="form-group sub_com'.$row['uaID'].'" style="display:none;">
                                  <input type="text" class="form-control" id="user_sub_comment'.$row['uaID'].'" />
                                  <button class="btn btn-default sub_comment" id="'.$row['uaID'].'">'.$data['lang']['submit'].'</button>
                                 </div>
                              </div>
                              <br>
                            </div>
                          </div>
                          ';

              }
              
              
              $view_more_comments = '';
             
              if($value->total_comments > 4)
              {
              	
              		$view_more_comments = '<a href="javascript:void(0)" class="view_more_post_comments old_comments" data-postpostid="'.$value->postId.'"  style="color: darkgreen; font-weight: bold;font-size:76%;margin-left: 24%;">'.$data['lang']['view_more_comments'].'</a>';
              	
              }
              
              
            }

						$result_posts[] = '<div class="singlePost" id="singlePost_'.$value->postId.'">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="col-sm-1">
                                <a href="'.base_url().'user/'.$value->custName.'"><img src="'. base_url().UPLOADS.$profile_photo.'" class="img-square" alt="'.$value->custName.'" class="img-square"></a>
                              </div>
                              <div class="col-sm-10">
                                <p class="userName">
                                  <a href="'.base_url().'user/'.$value->custName.'">'.ucwords($value->custName).'</a>
                                </p>
                                <p class="postTime">
                                  '.$this->custom_function->get_notification_time($this->config->item('global_datetime'),$value->postCreated).'
                                </p>
                              </div>
                              <div class="col-sm-1">
                                <p class="userActions" id="'.$value->postId.'">
                                <small class="showPostType">'.$private_post.'</small>
                                '.$userActions.'
                                </p>
                              </div>
                            </div>
                            <div class="col-sm-12 small-margin-top">
                              <div class="col-sm-8 no-padding ">
                                <p class="postContent">
                                  '.$value->postContent.$postImage.'
                                </p>
                                <h5>
                                  <span class="small" style="padding:3px;border-radius:3px;color: #11B0EC;">                          
                                    '.$data['lang']['comments'].' 
                                    <span class="small glyphicon glyphicon-comment"></span><span id="recent_comment_count'.$value->postId.'"> '.$value->total_comments.'</span>
                                  </span>
                                  <span class="user'.$value->postId.'" id="'.$value->custID.'">'.$userLike.'
                                  </span>
                                   (<span class="small" id="user_likes'.$value->postId.'">'.$value->total_likes.'</span> )
                                </h5>
                                <i class="comm_sec_1">'.$data['lang']['comments'].':</i>
                                <hr style="border-top: 2px solid #DCD4D4;margin-left:17%">
                                <div class="com">
                                  <div id="recent_comment'.$value->postId.'" class="display_comm1">
                                  '.$postComments.'
                                  </div>
                                </div>
                                '.$view_more_comments.'
			<a href="javascript:void(0)" class="view_more_post_comments new_comments" data-postpostid="'.$value->postId.'"  style="color: darkgreen; font-weight: bold;margin-left: 24%;font-size:76%; display:none">'.$data['lang']['view_more_comments'].'</a>
                              <input type="hidden" id="get_postid" class="get_postid" value="'.$value->postId.'" />
                                
                                <input type="hidden" id="values"  class="increment_number1"  />
                                <textarea class="form-control comment-box"  style="width: 65%; height: 44px;" id="user_comment'.$value->postId.'"></textarea>
                                <button type="button" class="btn btn-info user_comment" id="'.$value->postId.'" style="margin-left: 73%;margin-top:2%;background-color: grey">'.$data['lang']['submit'].'</button>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>';
					}
					
				}
			}
			header("content-type:application/json");
			echo json_encode($result_posts);exit;
	}
}
/* End of file */