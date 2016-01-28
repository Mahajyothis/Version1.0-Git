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
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/events/view/fancy.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
 <style>
  .comm_sec_1{
    margin-left: 17%;}
  .small{font-size:smaller}
   .postContent{
    font-size: 81%;
}
.small{
cursor:pointer;
}
.com-brk{
   /* white-space: pre-wrap;       CSS3   
   white-space: -moz-pre-wrap; /* Firefox */    
   white-space: -pre-wrap;     /* Opera <7 */   
   white-space: -o-pre-wrap;   /* Opera 7 */    
   word-wrap: break-word;      IE */
   margin-left: 15%;
   font-size: 88%;
   text-align:justify;
   margin-left: 5%;
}
  </style>

  </head>
   <?php   $user = $this->session->userdata('profile_data'); ?>
  <body>
<div class="wrapper">
    <div class="box">
        <div class="row">
     <div class="col-md-12 close-bar" style=""><a style="cursor:pointer;" href="<?php echo base_url('user/'.$user[0]['custName']);?>"> <i class="pull-right fa fa-home fa-3x;" style="color:#ffffff;padding:10px;font-size:27px;"></i></a></div>
            <!-- sidebar -->
    <div class="side-menus">
            <div class="column col-sm-2 side" id="sidebar1" style="height:100vh;padding-left:0px;padding-right:0px;">
                <ul class="nav">
        <li> </li>
                    <li class="active first1" style="color:white;padding: 11%"><?= $language['post'];?><span> <img src="<?php echo base_url(); ?>assets/img/post/post.png" style="width: 35px;margin-top: -11px;"  value="sidebar1"></span></li>               
          <li> <a class="no-padding" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat" id="new_post"><span class="btn-success">+ <?= $language['new_post'];?></span></a>
                    </li>
                    <li class="hoveffect"><a id="hoveffect" <?php if($type == 'own') echo 'class="pst_active_tabs"';?> href="<?php echo base_url('post/own');?>"><?= $language['my_posts'];?><span><img style="width: 25px;margin-top: -11px;float: right" src="<?php echo base_url(); ?>assets/img/post/my-post.png"></span></a></li>
                    <li class="hoveffect"><a id="hoveffect" <?php if($type == 'public') echo 'class="pst_active_tabs"';?> href="<?php echo base_url('post/public');?>"><?= $language['public_posts'];?><span><img style="width: 25px;margin-top: -11px;float: right" src="<?php echo base_url(); ?>assets/img/post/public-post.png"></span></a>
                    </li>
                    <li class="hoveffect"><a id="hoveffect" <?php if($type == 'private') echo 'class="pst_active_tabs"';?> href="<?php echo base_url('post/private');?>"><?= $language['private_posts'];?><span><img style="width: 25px;margin-top: -11px;float: right" src="<?php echo base_url(); ?>assets/img/post/private-post.png"></span></a></li>
           <li class="active first2"><a id="hoveffect" href="<?php echo base_url('post');?>"><i class="fa fa-refresh fa-spin fa-lg"></i></a></li>
                 
          
                </ul>
            </div>
    </div>     <!-- /sidebar-->
          
            <!-- main -->
            <div class="column col-sm-10" id="main" style="float:left;height: 100vh;" >
           
                        <div class="col-sm-4" id="my-discussions">   
                                     
                        </div>
      
        <div class="padding">
                      
                    <div class="full col-sm-10">
                    
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
                                <a href="<?php echo base_url().'user/'.$result->custName;?>"><img style="width:75px" src="<?php echo ($result->photo && file_exists(UPLOADS.$result->photo)) ? base_url().UPLOADS.$result->photo : base_url().UPLOADS.'profile.png';?>" class="img-square" alt="<?php echo $result->custName; ?>"></a>
                              </div>
                              <div class="col-sm-10">
                                <p class="userName">
                                  <a href="<?php echo base_url().'user/'.$result->custName;?>"><?php echo ucwords($result->custName); ?></a>
                                </p>
                                <p class="postTime" style="margin-bottom: 0px"><i>
                                  <?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$result->postCreated) ?></i>
                                </p>
                              </div>
                              <div class="col-sm-1">
                                
                                <p class="userActions" id="<?php echo $result->postId;?>">
                                  <small class="showPostType">
                                <?php if($result->postType == 1){ ?>
                                  <img src="<?php echo base_url().IMAGES;?>post/private.png" title="<?= $language['private_posts'];?>" alt="<?= $language['private_posts'];?>">
                                  <?php } ?>
                                  </small>
                                  <?php if($this->session->userdata['profile_data'][0]['custID'] == $result->custID){ ?>
                                  <small><a href="javascript:void(0)"  data-toggle="modal" data-target="#editPostPopDivision" class="editData" title="<?= $language['edit_post_hover'];?>"><span class="glyphicon glyphicon-edit"></span></a></small>
                                  <small><a href="javascript:void(0)" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation" title="<?= $language['delete_post_hover'];?>"><span class="glyphicon glyphicon-trash"></span></a></small>
                                  <?php } ?>
                                </p>
                                
                              </div>
                            </div>
                            <div class="col-sm-12 small-margin-top">
                              <div class="col-sm-8 no-padding " style="margin-left: 2%">
                                <p class="postContent">
                                  <?php echo $result->postContent; ?>
                                </p>
                                
                                <p class="postImage">
                                <?php if(!empty($result->postImage) && file_exists(POSTS.$result->postImage)) { ?>
                                  <a href="<?php echo base_url().POSTS.$result->postImage; ?>" class="fancybox"><img src="<?php echo base_url().POSTS.$result->postImage; ?>" alt="<?php echo $result->postImage; ?>" /></a>
                                  <?php } ?>
                                </p>
                                
                                <h5 style="margin-left:14%">
                                <span class="small" style="padding:3px;border-radius:3px;color: #11B0EC;" ><?= $language['comments'];?> <span class="small glyphicon glyphicon-comment"></span><span id="recent_comment_count<?php echo $result->postId;?>"> <?php echo $result->total_comments;  ?></span></span>
                                <span class="user<?php echo $result->postId; ?>" id="<?php echo $result->custID; ?>">
                <?php
               
    if($result->liked>0){ 
                                 ?>
                 <span  style="padding:3px;border-radius:3px;" id="user_unlike<?php echo $result->postId; ?>"  > <span  style="padding:3px;border-radius:3px;" ><span class="small fa fa-thumbs-up unlike" id="<?php echo $result->postId; ?>" style="color:green;"> <?php echo $language['unlike'];?></span></span> </span>
                 
                 
    <?php }else{ ?>
                 <span  style="padding:3px;border-radius:3px;" id="user_like<?php echo $result->postId; ?>"  ><span  class="small glyphicon glyphicon-thumbs-up user_like" id="<?php echo $result->postId; ?>">  <?= $language['likes'];?></span></span>
                   <?php  } ?> 
                 
                 (<span class="small" id="user_likes<?php echo $result->postId; ?>"><?php 
                 echo $result->total_likes;  ?></span>   )                             </small>
                                </h5>
               
                <!-- <i class="comm_sec_1"><?= $language['comments'];?>:</i>-->
                 <hr style="border-top: 2px solid #DCD4D4;margin-left:17%">
                <div class="com">
                  <div id="recent_comment<?php echo $result->postId;?>" class="display_comm1">
    <?php if(!empty($result->comments)){
      foreach($result->comments as $row){
                 ?>
                      <div id="subcomment_<?php echo $row['uaID'];?>">
            <div id='d_c1' class="display_comm" id="margin"style="margin-left: 10.5%;margin-top:41px"><p><img  src="<?php echo 
            ($row['photo'] && file_exists(UPLOADS.$row['photo'])) ? base_url().UPLOADS.$row['photo'] : base_url().UPLOADS.'profile.png';
          ?>" height="50px" width="50px" style="margin-left:5%;padding:0.5%;border:1px solid #ccc;border-radius: 3px"><b style="margin-left: 1%;border: 1px solid #ccc;padding: 1.1%;border-radius: 3px;"><?php echo $row['custName'];  ?></b>
                          <!--<a style="color:#46b8da;cursor:pointer;" data-toggle="modal" class="editDisc" data-target="#EditDiscussionmodel">
                             <span style="float:right; margin: 0px 28px 2px 22px;font-size:10px" class="glyphicon glyphicon-edit"></span>
                          </a>
                         <a style="color:#FF8F00;cursor:pointer;" class="DelDiscConfrm" data-toggle="modal" data-target="#DeleteDiscussionsModel">
                                <span style="float:right; margin: 0px 5px 2px 22px;font-size:10px" class="glyphicon glyphicon-trash"></span>
                         </a>--> </p>
	  <br><p class="com-brk"><span class='comments_only'></span><span id="singlcomment_<?php echo $row['uaID'];?>"><?php echo $row['comment'];?></span>

              <!-------------------------broto------------------------------->
          <?php
          if($this->session->userdata['profile_data'][0]['custID'] == $row['custID'])
          {
              ?>
	                  </p><a style="color:#46b8da;cursor:pointer;" data-toggle="modal" data-commentonly="<?php echo $row['comment']?>" data-commentid="<?php echo $row['uaID'];?>" class="editComment" data-target="#editComment">
                                <span style="float:right; margin: 0px 28px 2px 22px;"  class="glyphicon glyphicon-edit"></span>
                          </a>
                         <a style="color:#FF8F00;cursor:pointer;" data-p="<?php echo $result->postId;?>" data-comment="<?php echo $row['uaID'];?>" class="deleteComment" data-toggle="modal" data-target="#deleteComment">
                                <span style="float:right; margin: 0px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span>
                         </a>
          <?php
          }
          ?>

                 <!-----------broto----------->
            </div>
          <!-------------------------->
          <!-------------------------broto------------------------------->
      <span class="user_sub<?php echo $row['uaID'];?>" id="<?php echo $row['custID'];?>">
      <div class="replay-bar">
      <?php 
		if($row['sub_liked']){ 
                                 ?>
                     <span  id="use_unlike<?php echo $row['uaID'];?>"><span class='small fa fa-thumbs-up  sub_user_unlike' id="<?php echo $row['uaID'];?>" style='color:green'> <?= $language['unlike'];?></span></span>           
                                       <?php }else{ ?>
            <!-- rohitdutta-->
<input type="hidden" id="sub_inc_id<?php echo $row['uaID'];?>"  class="total_sub_comments<?php echo $row['uaID'];?>"   value="<?php echo $row['total_comments'];?>" >
      
<!-- rohitdutta-->
      <span  id="use_like<?php echo $row['uaID'];?>"> <span id="<?php echo $row['uaID'];?>" class='small fa fa-thumbs-o-up  sub_user_like'> <?= $language['likes'];?></span> </span>
      
      <?php } ?>
      (<span id="use_likes<?php echo $row['uaID'];?>">
      <?php		echo $row['total_likes']; ?>
            </span>)&nbsp &nbsp <span  id="<?php echo $row['uaID'];?>" class="enter_sub_comment" style='cursor:pointer;'><?= $language['comments'];?>(<span id="recent_sub_comment_count<?php echo $row['uaID'];?>"> 
            <?php 
	echo $row['total_comments'];	  ?>  </span>)</span>
	<!--      <p style="margin-bottom: 0px"><b style="color: #079891">Antony</b> Likes This.</p>-->
     
      <div id="recent_sub_comment<?php echo $row['uaID'];?>">
       <?php if(!empty($row['sub_comments'])){
      foreach($row['sub_comments'] as $sub_row){
      //print_r($sub_row)

           ?>
          <div id="subcomment_<?php echo $sub_row['sub_uaID'];?>">
            <span class="sub_user<?php echo $sub_row['sub_uaID'];?>" id="<?php echo $sub_row['sub_custID'];?>"></span>
 <div class="display_comm" id="margin"style="margin-left: 0%"><p style="margin-top: 3%"><img  src="<?php echo 
      
     ($sub_row['sub_photo'] && file_exists(UPLOADS.$sub_row['sub_photo'])) ? base_url().UPLOADS.$sub_row['sub_photo'] : base_url().UPLOADS.'profile.png';
      
      ?>" height="30px" width="30px" style="margin-left:5%;padding:0.5%;border:1px solid #ccc;border-radius: 3px"><b style="margin-left: 1%;border: 1px solid #ccc;padding: 0.6%;border-radius: 3px"><?php echo $sub_row['sub_custName'];  ?></b><p id="singlcomment_<?php echo $sub_row['sub_uaID'];?>" class="com-brk"><?php echo $sub_row['sub_comment'];?>
                        
      </p> <!-------------------------broto------------------------------->
     <?php
     if($this->session->userdata['profile_data'][0]['custID'] == $sub_row['sub_custID'])
     {
         ?>
         </p><a style="color:#46b8da;cursor:pointer;" data-toggle="modal" data-commentonly="<?php echo $sub_row['sub_comment']?>" data-commentid="<?php echo $sub_row['sub_uaID'];?>" class="editComment" data-target="#editComment">
         <span style="float:right; margin: 0px 28px 2px 22px;font-size:10px"  class="glyphicon glyphicon-edit"></span>
     </a>
         <a style="color:#FF8F00;cursor:pointer;" data-subp="<?php echo $row['uaID'];?>" data-p="<?php echo $result->postId;?>" data-comment="<?php echo $sub_row['sub_uaID'];?>" class="deleteComment_sub" data-toggle="modal" data-target="#deleteComment_sub">
             <span style="float:right; margin: 0px 5px 2px 22px;font-size:10px" class="glyphicon glyphicon-trash"></span>
         </a>
     <?php
     }
     else
     {
         ?>

     <?php
     }
     ?>
     <!-----------broto----------->
	<!--</div>	-->
     <!-------------------------->
      </div>
            <?php
       if($sub_row['sub_sub_liked']){ 
                                 ?>
                   <span id="user_sub_unlike<?php echo $sub_row['sub_uaID'];?>" style="margin-left: 18%;">  <span class='small  fa fa-thumbs-up sub_sub_user_unlike' style='color:green' id="<?php echo $sub_row['sub_uaID'];?>"> <?php echo $language['unlike'];?></span>   </span>         
                                
      <?php }else{ ?>
      
     <span id="user_sub_like<?php echo $sub_row['sub_uaID'];?>" style="margin-left: 18%;"><span class='small  fa fa-thumbs-o-up sub_sub_user_like' id="<?php echo $sub_row['sub_uaID'];?>"> <?php echo $language['likes'];?></span></span>

      
      <?php } ?>
     
  (<span id="user_sub_likes<?php echo $sub_row['sub_uaID'];?>">
      <?php
      echo $sub_row['sub_total_likes']; ?>
      
      </span>)</div><?php  } }?>	
      <!---------------------rohitdutta---defaultsub-------------------->
      
      <?php
	$count = $row['total_comments'];
      if($count > 2)
      {
      ?>
  <p><a href="javascript:void(0)" id="view_com<?php echo $row['uaID'];?>" class="view_more_post_sub_comments old_sub_comments" data-subpostpostid="<?php echo $row['uaID'];?>"  style="color: darkgreen; font-weight: bold;font-size:76%">
  <?= $language['view_more_comments'];?></a><div id="loading_img_sub<?php echo $row['uaID'];?>"></div></p>

      <?php
      }
      ?> 
      
      <!---------------------------------------------------------->
      </div> <div class="navbar-form navbar-left" role="search">
      
   <div class="form-group sub_com<?php echo $row['uaID'];?>" style="display:none;">   <input type="text" class="form-control" id="user_sub_comment<?php echo $row['uaID'];?>"><button class="btn btn-default sub_comment" id="<?php echo $row['uaID'];?>"><?= $language['submit'];?></button></div></div><br>
     
      
      
      </div>
          
      </div><?php
      //echo "<div class='display_comm' id='margin' style='border-bottom: 1px dashed'><img src='uploads/".$row->photo."' height='50px' width='50px' style='margin:5%'><b>".$row->uaDescription."</b></div>";

      
    }
    }
    else
    {
    ?>
    <span style="margin-left:18%; font-size: 85%;"><?= $language['no_comments_found'];?></span></a>
    <?php
    }
    ?>
          </div>          
                </div>  
    
                   <!---------------------------------Rohitdutta----------------------------------------------------->

                    
                    <?php 
                    
                    if($result->total_comments > 4)
                    {
                    ?>
		    <a href="javascript:void(0)" class="view_more_post_comments old_comments" data-postpostid="<?php echo $result->postId;?>"  style="color: darkgreen; font-weight: bold;    margin-left: 24%;font-size:76%"><?= $language['view_more_comments'];?></a><div style='margin-left: 24%;' id="loading_img<?php echo $result->postId;?>"></div>
		    <?php
		    }
		    ?>
		    <!--<input type="text" id="inc_id" class="increment_id" value="<?php //echo $result->total_comments;?>"/>-->
                    <a href="javascript:void(0)" class="view_more_post_comments new_comments" data-postpostid="<?php echo $result->postId;?>"  style="color: darkgreen; font-weight: bold; display:none;margin-left: 24%;font-size:76%"><?= $language['view_more_comments'];?></a><div style='margin-left: 24%;' id="loading_img<?php echo $result->postId;?>"></div>
                    <!----------------------------------------------------------------------------------------------------------->
                          
                                <textarea class="form-control comment-box"  style="width: 65%; height: 44px;" id="user_comment<?php echo $result->postId;?>"></textarea><button type="button" class="btn btn-info user_comment" id="<?php echo $result->postId;?>" style="margin-left: 73%;margin-top:2%;background-color: grey"><?= $language['submit'];?></button></span>
                              </div>
                              
                            </div>
                          </div><!-- 
                          <div class="row divider">
                            <div class="col-sm-12">
                              <hr>
                            </div>
                          </div> -->
                        </div>
           
            <?php } else{  ?>
              <div id="no-data-found"><?= $language['sorry_no_post_found'];?></div>
            <?php }   ?>
            </div>
                    </div><!-- /col-9 -->
          <div class="col-sm-2">
                     </div>
                </div><!-- /padding -->
              <div id="last_msg_loader" class="item photob_load_more_btn hide col-sm-10">
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
        <h4 class="modal-title" id="exampleModalLabel"><?= $language['post_new_status'];?></h4>
      </div>
      <div class="modal-body">
      <form method="post" id="ts-box-image-upload-form" action="<?php echo base_url(); ?>post/upload_status_image" enctype="multipart/form-data">
          <div class="form-group" id="postStatus">
            <label for="recipient-name" class="control-label"><?= $language['enter_your_post'];?>:</label>
            <div class="clr statusDiv">
            <textarea class="form-control" name="postContent" id="postContent" required></textarea>
            <input type="file" class="hide" id="uploadTimeLinePostImages" name="statusImage" />
            <input type="hidden" id="savedImagesName" name="savedImagesName" value="" />
            <label for="uploadTimeLinePostImages"><img class="clip_img" src="<?php echo base_url().IMAGES;?>post/timeline_clip_img.png" title="UPLOAD IMAGES"></label>
            </div>
            <p class="required_error hide">* <?= $language['blank_field'];?></p>
          </div>
          <div id="t-status-images-preview-wrapper">
            <div class="ts-wrap">
            </div>
          </div>       
        <div class="form-group clr">
            <label for="message-text" class="control-label"><?= $language['Privacy'];?>:</label>
            <select class="form-control" name="postType" id="postType">
              <option value ='0'><?= $language['public'];?></option>
              <option value ='1'><?= $language['private'];?></option>
             </select>
          </div>
    
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-success" id="submitPost" value="<?= $language['post'];?>" />
         <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeBtn"><?= $language['close'];?></button>
          
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
        <h4 class="modal-title" id="exampleModalLabel"><?= $language['edit_status'];?></h4>
      </div>
      <div class="modal-body">
      <form method="post" id="edit-ts-box-image-upload-form" action="<?php echo base_url(); ?>post/upload_status_image" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="control-label"><?= $language['post'];?> :</label>
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
            <label for="message-text" class="control-label"><?= $language['Privacy'];?>:</label>
            <select class="form-control" name="editPostType" id="editPostType">
              <option value ='0'><?= $language['public'];?></option>
              <option value ='1'><?= $language['private'];?></option>
             </select>
          </div>
    
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-success" id="editSavePost" value="<?= $language['save'];?>" />
         <button type="button" class="btn btn-danger" data-dismiss="modal" id="editcloseBtn"><?= $language['close'];?></button>
          
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
        <h4 class="modal-title" id="exampleModalLabel">
      </div>
      <div class="modal-body">
      <?= $language['delete_post'];?>
       
      </div>
      <div class="modal-footer">
           
    <a href="javascript:void(0)" id="">
      <button type="button" class="btn btn-danger" id="deleteConfirmBtn"><?= $language['confirm'];?></button>
    </a>
     <button type="button" class="btn btn-success" data-dismiss="modal"><?= $language['cancel'];?></button>
      </div>
    </div>
  </div>
</div>

<div id="hidden_new_post" class="hide">
<div class="singlePost ">
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
          <p class="userActions" id="">
            <small class="showPostType"></small>
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
          <span class="small" style="padding:3px;border-radius:3px;"><?= $language['comments'];?><span class="small glyphicon glyphicon-comment"></span><span class="recent_count"> 0</span></span>
           <span  class="new_liked_post" > <span class='fa fa-thumbs-o-up user_like'> <?= $language['likes'];?></span> </span>
          
          
          (<span class="new_user_likes">
        0 </span>)
          </small>
          </h4>
         
          <span class="user" style="margin-left:11.5%" >
          <?php echo $language['comments'];?><br>
          <div class="recent_com"></div>
          <!-------------Rohitduttadummy------------------------>
	  <input type="hidden" id="inc_id" class="increment_id" value=""/>
	<a href="javascript:void(0)" class="view_more_post_comments new_comments" data-postpostid=""  style="color: darkgreen; font-weight: bold; display:none;margin-left: 24%;"><?= $language['view_more_comments'];?></a>
	<div class="loading_img_sub" id="loading_img_sub"></div>
          <!----------------------------------------------------->
          <textarea class="form-control comment-box comnt-post"  style="width: 65%; height: 44px;" ></textarea><button type="button" class="btn btn-info user_comment"  style="margin-left: 73%;margin-top:2%;background-color: grey">
          <?= $language['submit'];?></button>
          
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
                  </div> <!-- script references -->
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.form.js');?>"></script>
  <script src="<?php echo base_url(); ?>assets/js/events/view/fancy_box.js" type="text/javascript"></script>
    <?php include_once('assets/js/post/script.php');?>
<?php include_once('assets/js/unlike/post_unlike.php');?>

<!-- ----------------Rohitdutta------delete comment----------->
<div class="modal fade" id="deleteComment_sub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">
            </div>
            <div class="modal-body" style="color: red"><h3>
                    <?= $language['delete_cmment'];?>
                </h3></div>
            <div class="modal-footer">

                <a href="javascript:void(0)" class="ForDeleteComment_sub" style="text-decoration: none;" id="" data-subpost="" data-sspo="">
                    <button type="button" class="btn btn-danger btn-sm" id="del_sub" data-dismiss="modal"><?= $language['confirm'];?></button>
                </a>
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal"><?= $language['cancel'];?></button>
            </div>
        </div>
    </div>
</div>




<!----------------------- This Modal is for delete single comment----------------------------------------------->
<div class="modal fade" id="deleteComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">
            </div>
            <div class="modal-body" style="color: red"><h3>
                    <?= $language['delete_cmment'];?>
                </h3></div>
            <div class="modal-footer">

                <a href="javascript:void(0)" class="ForDeleteComment" style="text-decoration: none;" id="" data-basepost="">
                    <button type="button" class="btn btn-danger btn-sm" id="del" data-dismiss="modal"><?= $language['confirm'];?></button>
                </a>
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal"><?= $language['cancel'];?></button>
            </div>
        </div>
    </div>
</div>


<!----------------------- This Modal is for edit single comment----------------------------------------------->
<div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel" ><h3><?= $language['edit_comment'];?></h3>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="edit_s_c">
                    <input type="text" required class="form-control ForEditComment" name="edit_single_comment" id="edit_single_comment" value="">
                </form>
            </div>
            <div class="modal-footer">

                <a href="javascript:void(0)" class="for_comment_id" style="text-decoration: none;" id="">

                    <button type="button" class="btn btn-danger btn-sm" id="editCommentBtn"><?= $language['submit'];?></button>
                </a>
                <button type="button" class="btn btn-success btn-sm" id="cancelAtEditComment" data-dismiss="modal"><?= $language['cancel'];?></button>
            </div>
        </div>
    </div>
</div>
<!-- ----------------------------------------------->
  </body>
  


</html>