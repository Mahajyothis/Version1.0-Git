<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/post/post.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/events/view/fancy.css"/>
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  
  </head>
  <body>
<div class="wrapper">
    <div class="box">
        <div class="row">
            <!-- sidebar -->
            <div class="column col-sm-2" id="sidebar">
                <ul class="nav">				
                    <li class="active first1"><a href="<?php echo base_url('post');?>">Posts<i class="fa fa-bars" style="float: right"></i></a></li>					
					<li> <a data-toggle="modal" data-target="#exampleModal" data-whatever="@fat" id="new_post"><span class="btn-success">+ New Post</span></a>
                    </li>
                    <li class="active hoveffect"><a href="<?php echo base_url('post/own');?>">My Posts</a></li>
                    <li class="hoveffect"><a href="<?php echo base_url('post/public');?>">Public Posts</a>
                    </li>
                    <li class="hoveffect"><a href="<?php echo base_url('post/private');?>">Private Posts</a>
                    </li>
					
                </ul>
            </div>
            <!-- /sidebar -->
          
            <!-- main -->
      <?php   $user = $this->session->userdata('profile_data'); ?>
            <div class="column col-sm-10" id="main">
            <a style="cursor:pointer;" href="<?php echo base_url('user/'.$user[0]['custName']);?>"><span class="pull-right btn-success" id="closeBtnRight">X</span></a>
                        <div class="col-sm-12" id="my-discussions">   
                                     
                        </div>
      
        <div class="padding">
                      <div class="col-sm-2">
                     </div>
                    <div class="full col-sm-8">
                    
                        <!-- content -->
                        
                      <div id="allPosts">
                        <?php 
            if(!empty($results)) foreach($results as $result)
            {
            ?>
                    <div class="singlePost" id="singlePost_<?php echo $result->postId;?>">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="col-sm-1">
                                <a href="<?php echo base_url().'user/'.$result->custName;?>"><img src="<?php echo ($result->photo && file_exists(UPLOADS.$result->photo)) ? base_url().UPLOADS.$result->photo : base_url().UPLOADS.'profile.png';?>" class="img-square" alt="<?php echo $result->custName; ?>"></a>
                              </div>
                              <div class="col-sm-10">
                                <p class="userName">
                                  <a href="<?php echo base_url().'user/'.$result->custName;?>"><?php echo ucwords($result->custName); ?></a>
                                </p>
                                <p class="postTime">
                                  <?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$result->postCreated) ?>
                                </p>
                              </div>
                              <div class="col-sm-1">
                                <?php if($this->session->userdata['profile_data'][0]['custID'] == $result->custID){ ?>
                                <p class="userActions" id="<?php echo $result->postId;?>">
                                  
                                  <small><a href="javascript:void(0)"  data-toggle="modal" data-target="#editPostPopDivision" class="editData" title="EDIT POST"><span class="glyphicon glyphicon-edit"></span></a></small>
                                  <small><a href="javascript:void(0)" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation" title="DELETE POST"><span class="glyphicon glyphicon-trash"></span></a></small>
                                </p>
                                <?php } ?>
                              </div>
                            </div>
                            <div class="col-sm-12 small-margin-top">
                              <div class="col-sm-8 no-padding ">
                                <p class="postContent">
                                  <?php echo $result->postContent; ?>
                                </p>
                                
                                <p class="postImage">
                                <?php if(!empty($result->postImage) && file_exists(POSTS.$result->postImage)) { ?>
                                  <a href="<?php echo POSTS.$result->postImage; ?>" class="fancybox"><img src="<?php echo POSTS.$result->postImage; ?>" alt="<?php echo $result->postImage; ?>" /></a>
                                  <?php } ?>
                                </p>
                                
                                <h4>
                                <span class="small" style="padding:3px;border-radius:3px;" ><span class="small glyphicon glyphicon-comment"></span> <?php

								
									$cat="POST";
		
		
		$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='".$result->postId."' AND `raAction`='COMMENT' ";
		$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();


								echo $comment_row[0]['total_comments'];  ?></span>
								<?php
								$cat="POST";
		
		 $profile_row = $this->session->userdata('profile_data');
		
		$likeed="SELECT * FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='".$result->postId."' AND `raAction`='LIKE' AND `custID`='".$profile_row['0']['custID']."' ";
		$liked_process = $this->db->query($likeed);
		if($liked_process->num_rows() >= 1){ 
                                 ?>
								 <span class="small" style="padding:3px;border-radius:3px;" ><span class="small fa fa-thumbs-up" style="color:green;"></span> </span> 
								 
								 
		<?php }else{ ?>
								 <span class="small" style="padding:3px;border-radius:3px;" id="user_like<?php echo $result->postId; ?>"  onclick="user_like<?php echo $result->postId;?>()"><span class="small glyphicon glyphicon-thumbs-up"></span> </span>
								 	

		<?php  } ?>	
								 
								 <span class="small" id="add_like<?php echo $result->postId; ?>"><?php 
								 $cat="POST";
		
		
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='".$result->postId."' AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		echo $like_row[0]['total_likes'];  ?></span>
								 
                                <span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-eye-open"></span> 0</span>
                                </small>
                                </h4>
								
								<div class="com">
								<p id="com1">Comments</p>
								<?php $select_comment="SELECT * FROM `useraction` ua 
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='POST' AND ua.`catID`='".$result->postId."' ORDER BY ua.`uaID` DESC LIMIT 4
		";
		$select_com = $this->db->query($select_comment);
		foreach($select_com->result() as $row)
        {
            ?>

            <div class="display_comm" id="margin" style=''><p><img src="/uploads/<?php 
			
			if(ISSET($row->photo)){
				echo $row->photo;
			}
			else{
				echo "profile.png";
			}
			
			
			
			
			?>" height="25px" width="25px" style="margin-left:5%"><b><?php echo $row->uaDescription;?></b></div>
        <?php
			//echo "<div class='display_comm' id='margin' style='border-bottom: 1px dashed'><img src='/uploads/".$row->photo."' height='25px' width='25px' style='margin:5%'><b>".$row->uaDescription."</b></div>";
			
		}
		
		
		
		
		?>
                                    <p class="d_c"></p>
		
		
		
		
							</div>


                                  <!--------------------------------------------------------------------------------------------------->

                                  <a href="javascript:void(0)" class="view_more_post_comments" style="color: darkgreen; font-weight: bold">view more comments</a>

                                  <input type="hidden" id="get_postid" class="get_postid" value="<?php echo $result->postId;?>">
                                  <input type="hidden"  class="increment_number" value="4">
                                  <!--------------------------------------------------------------------------------------------------->
                                <textarea class="form-control comment-box" id="user_comment<?php echo $result->postId;?>"></textarea><button type="button" class="btn btn-info" onclick="submit_comment<?php echo $result->postId;?>()"style="margin-left: 111%;margin-top:2%;">submit</button></span>
                              </div>
                              <div class="col-sm-4">
                              </div>
                            </div>
                          </div><!-- 
                          <div class="row divider">
                            <div class="col-sm-12">
                              <hr>
                            </div>
                          </div> -->
                        </div>
           
			<script>

function user_like<?php echo $result->postId;?>(){
	
	var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
	var pid="<?php echo $result->custID; ?>";
	var cat="POST";
	var act="LIKE";
	var page="recentactivity";
	var catid="<?php echo $result->postId; ?>";
	$.ajax({
          url: "<?php echo base_url();?>like?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid
        }).done(function( data ) {
			
			 // $("#add_like<?php echo $result->postId; ?>").html("<?php echo "(".($total_likes['0']['total_likes']+1).")";  ?>");
    $("#user_like<?php echo $result->postId; ?>").html("<span class='small fa fa-thumbs-up ' style='color:green'></span>");
	location.reload();
		  return true;
        }); 
	
}

	</script>
			
			<!--<script>
 function submit_comment<?php /*echo $result->postId;*/?>()
 {
	
	var comment_user = $("#user_comment<?php /*echo $result->postId;*/?>").val()
	if(comment_user == "")
	{
		$("#user_comment<?php /*echo $result->postId;*/?>").focus();
		
	}
	else
	{
	var user_comment = $("#user_comment<?php /*echo $result->postId;*/?>").val();
	var uid = "<?php /*echo $result->custID; */?>";
	var cid = "<?php /*echo $this->session->userdata['profile_data'][0]['custID'];  */?>";
	var pid="<?php /*echo $result->postId; */?>";
    var cat="POST";
	
	var act="COMMENT";
	
      if(user_comment!=''){
        $.ajax({
          url: "<?php /*echo base_url();*/?>activity?user_comment="+user_comment+"&uid="+uid+"&cid="+cid+"&pid="+pid+"&cat="+cat+"&act="+act
        }).done(function( data ) {
	location.reload();
	 $("#user_comment<?php /*echo $result->postId;*/?>").val('');
		  return true;
        });   
      } 
	  
	
    }
 }
  
  </script>-->
                <script>
                    function submit_comment<?php echo $result->postId;?>()
                    {

                        var comment_user = $("#user_comment<?php echo $result->postId;?>").val()
                        if(comment_user == "")
                        {
                            $("#user_comment<?php echo $result->postId;?>").focus();

                        }
                        else
                        {
                            var user_comment = $("#user_comment<?php echo $result->postId;?>").val();
                            var uid = "<?php echo $result->custID; ?>";
                            var cid = "<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
                            var pid="<?php echo $result->postId; ?>";
                            var cat="POST";


                            var act="COMMENT";
                            //-------------------------------------------------
                            var curr = $(this);
                            //-------------------------------------------------
                            if(user_comment!=''){
                                $.ajax({
                                    url: "<?php echo base_url();?>activity?user_comment="+user_comment+"&uid="+uid+"&cid="+cid+"&pid="+pid+"&cat="+cat+"&act="+act
                                }).done(function( data ) {
                                    location.reload();
                                    $("#user_comment<?php echo $result->postId;?>").val('');
                                    //-------------------------------------------------
                                    curr.siblings('.increment_number').val("4")
                                    //-------------------------------------------------
                                    return true;
                                });
                            }


                        }
                    }

                </script>
	
			
			
            
            <?php } else{  ?>
              <div id="no-data-found">Sorry, No events found !</div>
            <?php }   ?>
            </div>
                    </div><!-- /col-9 -->
          <div class="col-sm-2">
                     </div>
                </div><!-- /padding -->
              <div id="last_msg_loader" class="item photob_load_more_btn hide col-sm-12">
                <img src="<?php echo base_url().IMAGES;?>ajax-auto-loader.gif" align="absmiddle" alt="Loading..."></img>
              </div>
            </div>
            <!-- /main -->
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Post New Status</h4>
      </div>
      <div class="modal-body">
      <form method="post" id="ts-box-image-upload-form" action="<?php echo base_url(); ?>post/upload_status_image" enctype="multipart/form-data">
          <div class="form-group" id="postStatus">
            <label for="recipient-name" class="control-label">Enter your Post :</label>
            <div class="clr statusDiv">
            <textarea class="form-control" name="postContent" id="postContent" required></textarea>
            <input type="file" class="hide" id="uploadTimeLinePostImages" name="statusImage" />
            <input type="hidden" id="savedImagesName" name="savedImagesName" value="" />
            <label for="uploadTimeLinePostImages"><img class="clip_img" src="<?php echo base_url().IMAGES;?>post/timeline_clip_img.png" title="UPLOAD IMAGES"></label>
            </div>
            <p class="required_error hide">* Please fill this field</p>
          </div>
          <div id="t-status-images-preview-wrapper">
            <div class="ts-wrap">
            </div>
          </div>       
        <div class="form-group clr">
            <label for="message-text" class="control-label">Privacy:</label>
            <select class="form-control" name="postType" id="postType">
              <option value ='0'>Public</option>
              <option value ='1'>Private</option>
             </select>
          </div>
    
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeBtn">Close</button>
          <input type="submit" class="btn btn-success" id="submitPost" value="Post" />
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editPostPopDivision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Status</h4>
      </div>
      <div class="modal-body">
      <form method="post" id="edit-ts-box-image-upload-form" action="<?php echo base_url(); ?>post/upload_status_image" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Post :</label>
            <div class="clr statusDiv">
            <textarea class="form-control" name="editPostContent" id="editPostContent" required></textarea>
            <input type="file" class="hide" id="EdituploadTimeLinePostImages" name="EditstatusImage" />
            <input type="hidden" id="EditsavedImagesName" name="EditsavedImagesName" value="" />
            <label for="EdituploadTimeLinePostImages"><img class="clip_img" src="<?php echo base_url().IMAGES;?>post/timeline_clip_img.png" title="UPLOAD IMAGES"></label>
            </div>
            <p class="required_error hide">* Please fill this field</p>
          </div>

          <div id="edit-t-status-images-preview-wrapper">
            
          </div>  
      
        <div class="form-group">
            <label for="message-text" class="control-label">Privacy:</label>
            <select class="form-control" name="editPostType" id="editPostType">
              <option value ='0'>Public</option>
              <option value ='1'>Private</option>
             </select>
          </div>
    
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal" id="editcloseBtn">Close</button>
          <input type="submit" class="btn btn-success" id="editSavePost" value="Save" />
          <input type="hidden" id="editPostId" value="" />
      </div>
        </form>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content modal-content-delete">
      <div class="modal-header modal-header-delete">
        <button type="button" class="close close-delete" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><h2>Delete Confirmation </h2>
      </div>
      <div class="modal-body">
       Do you want to delete this post ?
      </div>
      <div class="modal-footer">
           
    <a href="javascript:void(0)" id="">
      <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Confirm</button>
    </a>
     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div id="hidden_new_post" class="hide">
<div class="singlePost">
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-1">
          <a href="<?php echo base_url().'user/'.$this->session->userdata['profile_data'][0]['custName'];?>"><img src="<?php echo ($this->session->userdata['profile_data'][0]['photo'] && file_exists(UPLOADS.$this->session->userdata['profile_data'][0]['photo'])) ? base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'] : base_url().UPLOADS.'profile.png';?>" alt="<?php echo $this->session->userdata['profile_data'][0]['photo']; ?>" class="img-square"></a>
        </div>
        <div class="col-sm-10">
          <p class="userName">
            <a href="<?php echo base_url().'user/'.$this->session->userdata['profile_data'][0]['custName'];?>"><?php echo $this->session->userdata['profile_data'][0]['custName'];?></a>
          </p>
          <p class="postTime">
            Just Now
          </p>
        </div>
        <div class="col-sm-1">
          <p class="userActions" id="<?php echo $result->postId;?>">

            <small><a href="javascript:void(0)"  data-toggle="modal" data-target="#editPostPopDivision" class="editData" title="EDIT POST"><span class="glyphicon glyphicon-edit"></span></a></small>
            <small><a href="javascript:void(0)" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation" title="DELETE POST"><span class="glyphicon glyphicon-trash"></span></a></small>
          </p>
        </div>
      </div>
      <div class="col-sm-12 small-margin-top">
        <div class="col-sm-10 no-padding ">
          <p class="postContent">
          </p>
          <p class="postImage">
          </p>
          <h4>
          <span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-comment"></span> 0</span>
          <span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-thumbs-up"></span> 0</span>
          <span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-eye-open"></span> 0</span>
          </small>
          </h4>
          <textarea class="form-control comment-box" id="message-text"></textarea>
        </div>
        <div class="col-sm-2">
        </div>
      </div>
    </div>
    <div class="row divider">
      <div class="col-sm-12">
        <hr>
      </div>
    </div>
  </div>
                  </div>


  <!-- script references -->
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.form.js');?>"></script>
  <script src="<?php echo base_url(); ?>assets/js/events/view/fancy_box.js" type="text/javascript"></script>
    <?php include_once('assets/js/post/script.php');?>



  </body>
  <script>


      $(document).ready(function()
      {
          $(".view_more_post_comments").click(function()

          {
              var curr = $(this);
              var postid = $(this).siblings('input.get_postid').val();
              var limits = "limits";
              //var inc = $(".increment_number").val();
              var inc = $(this).siblings("input.increment_number").val();
              $.ajax
              ({
                  url: "<?php echo base_url();?>Post/display_comments?limits="+limits+"&& postid="+postid+"&& inc="+inc
              }).done(function( data ) {


                  curr.siblings('.com').find('.display_comm').hide()
                  curr.siblings('.com').find('.d_c').html(data)




              });


          });
      });
  </script>

  <script>
      $(document).ready(function(){
          $(".view_more_post_comments").click(function(){
              var $n = $(this).siblings(".increment_number");
              $n.val(Number($n.val())+4);
          });
      });
  </script>
</html>