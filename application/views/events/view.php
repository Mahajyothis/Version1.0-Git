<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
<title><?php echo $event->name; ?></title>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/events/view/overlay.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/events/view/style.css"/>
<link href="<?php echo base_url(); ?>assets/css/events/view/eventinner_style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/events/view/style-groups.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/events/view/style-grp-in.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/events/view/bootstrap-cols.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/events/view/fancy.css"/>
 <script src="<?php echo base_url(); ?>assets/js/events/view/jquery-1.11.3.min.js" type="text/javascript"></script>
<style>
.new_submit{
 width: 70px;
color:#000000;
    background: cadetblue;
}
a{
color:none!important;
hover:none!important;
}

.editComment,.deleteComment{
float:right;
}
.headder_evt_hd{
    margin-bottom: 20px;
}
.postContent{
    word-break: break-word;
    margin-right: 25px;
}
.join,.maybe,.joining{
color:#000000;
float: left;
    margin: 1%;
  padding:5px;
    border-radius: 8px;
    background: cadetblue;

}
.wrap-div{
    margin-left: 14%;
    text-align: justify;
    word-wrap: break-word;
}
.my-name{
    position:relative!important;
    margin-top: 22px;
    margin-left: 23px;
}
.event_profile,.event_profile_desc{
  margin-top: 14%;
    padding-left: 25px;
    border-right-width: 10px;
    padding-right: 25px;
}
.evnt_name_tit{
  top: 39px;
    left: 34px;
}
.joining-btn-evnt{
  float:left;
  width: 9%;
  background-color: #0A4958;
    padding: 22px;
}
.maybe-btn-evnt{
  float:left;
  width: 9%;
  background-color: #0A4958;
    padding: 22px;  
  margin-left:5%;
}
.headder_evt_hd{
  background-color:rgba(79, 179, 160, 0.56);;
      padding: 2%;
  }
.like_comments{
  background-color:rgba(4, 80, 69, 0.61);
  padding-left: 45%;
  }
div.content ul li.active{     
    background-color: rgba(65, 152, 143, 0.42);
    }
.user_comment1{
    width: 95%;
    background: transparent;
    color: white;
    }
    .pf-img-pst{
    height: 35px;
    width: 35px;
    border-radius: 50px;
    }
    .cmnt-area-bottm{
    min-height: 35px;
    background: rgba(24, 64, 53, 0.69);
    padding: 4%;
    }
   .header{
    margin-top: 0px;
    }
    .modal-footer{
    background-color:rgba(22,63,92,.9);
    border: none !important;
    }
    .first-block{
    background-color:rgba(22, 80, 82, 0.72);border-radius: 19px;position: relative;overflow: hidden;width: 513px;margin-top: 127.5px;
    }
    .pro_name{
    margin-top: 22px;margin-left: 217px;
    }
    .small{
    cursor: pointer; }
    .status_change_notification{
        text-align: center;
   
    width: 57%;
    position: relative;
    margin-left: 54%;
    height: 22px;
    padding: 5px;
    margin-bottom: -11px;
    font-weight: bold;
    font-size: 12px;
    }
</style>

</head>

<body>
<div class="header">
  <div class="event_header">
    <div class="event_back cornered">
      <a href="<?php echo base_url('events');?>" style="color:white"><span style="padding-left: -106px;margin-left: -50px;padding-top: 23px;"><img style="margin-top: 50px" src="/assets/img/events/view/BACK.png"> </span>
    </div>
    <div class="head123">
    </div>
  </div>
</div>
  
<!-- /LOGO -->
<!-- MAIN CONTENT SECTION -->
<section id="content">
<section class="clearfix section first-block" id="about">
<!-- SECTION TITLE -->
<h3 class="block-title my-name"><a> <?php echo $event->name; ?></a></h3>
<!-- /SECTION TITLE -->
<!-- SECTION TILES -->
<div class="tile black htmltile w3 h4" style="width: 513px">
  <div class="tilecontent">
    <div class="content">
      <div class="event_profile event_profile_desc">
        <div class="col-md-12" id="editDeleteDiv">
          <?php if($ownPage){ ?>
           <a class="glyphicon glyphicon-pencil editPencil" href="<?php echo base_url().'events/edit/'.$this->custom_function->create_ViewUrl($event->id,$event->name); ?>"><img src="<?php echo base_url().IMAGES;?>events/view/edit.png" /></a>
           <a href="#" data-toggle="modal" data-target="#deleteConfirmation" class="glyphicon glyphicon-trash deleteConfirmation"><img src="<?php echo base_url().IMAGES;?>events/view/trash.png" /></a>
           <?php } ?>
        </div>
        <div class="event_profile_img" style="padding-left: 0px;">    
            <a href="<?php echo ($event->banner && file_exists(EVENTS.$event->banner)) ? base_url().EVENTS.$event->banner : base_url().EVENTS.'default-event.png';?>" class="fancybox"><img src="<?php echo ($event->banner && file_exists(EVENTS.$event->banner)) ? base_url().EVENTS.$event->banner : base_url().EVENTS.'default-event.png';?>" alt="<?php echo $event->name; ?>"  style="width:41%;height:150px;float: left;" /></a>   
          <div class="pro_name">
            <h3 id="prodet"><span><?php echo $lang['created_by'];?>: </span><a href="<?php echo base_url().'user/'.$event->custName;?>"><?php echo ucwords($event->custName); ?></a></h3>
          <h6 class="event-info"><span><?php echo $lang['start_date'];?> : </span><?php echo date("m/d/y g:i A", strtotime($event->start_date)); ?> </h6>
          <?php if($event->end_date && $event->end_date != '0000-00-00 00:00:00'){ ?>
          <h6 class="event-info"><span><?php echo $lang['end_date'];?> : </span><?php echo date("m/d/y g:i A", strtotime($event->start_date)); ?></h6>
          <?php } ?>
          <h6 class="event-info"><span><?php echo $lang['venue'];?> : </span><?php echo $event->venue; ?></h6>
          <h6 class="event-info"><span><?php echo $lang['place'];?> : </span><?php echo $event->place; ?></h6>
          </div>
        </div>
        <span class="status_change_notification hide">Updated Successfully !!</span>
        <div class="buts" style="margin-top: 17px;">
        <span class="eventuser" id="<?php echo $event->custID; ?>">
           <?php 
        
          if($this->session->userdata['profile_data'][0]['custID'] != $event->custID) { 
         if($event_status->num_rows()>=1){
         
         $eventst=$event_status->result_array(); 
         ?>
       
<?php if($eventst[0]['status']==1){ ?>
<span class="joinings"> <select class="btn btn-info joining" id="<?php echo $event->id; ?>" style="float:right; color:#000000"> 
<option selected disabled><?=$lang['joined'];?></option>
<option value="MaybeJoin" title="May be join"><?=$lang['may_be'];?></option>
<option value="Declined" title="Declined"><?=$lang['declined'];?></option>
</select> </span>
<?php }if($eventst[0]['status']==2){ ?> 
<span class="maybes"> <select class="btn btn-info maybe" id="<?php echo $event->id; ?>" style="float:right; color:#000000">
<option value="Joined"><?=$lang['joined'];?></option>
<option selected disabled><?=$lang['may_be'];?></option>
<option value="Declined"><?=$lang['declined'];?></option>
 </select> </span><?php } ?>
         
         <?php  }else{ ?>
         
         <span id="join_status">
          <button type="button" class="btn btn-default join" id="<?php echo $event->id; ?>"><?php echo $lang['join'];?></button>
          
          
          <button type="button" class="btn btn-default maybe" id="<?php echo $event->id; ?>"><?php echo $lang['may_be'];?></button>
          
          </span>
          
         <?php }  } ?>
        
        </div>
       
        <div class="event_description" style="width: 443px;margin-top: 77px;">
          <p class="speech">
            <?php echo $event->description; ?>
          </p>
          <div id="post-tags">
        <p>
          <?php 
            if($event->eventCategoryNames){
              echo '<label>'.$lang['category'].': </label>';
              $eventCategoryNames = explode(',', $event->eventCategoryNames);
              foreach ($eventCategoryNames as $key => $value) {
                echo '<span>'.$value.'</span>';
              }
            }
          ?>
        </p>
      </div>
        </div>
        <div class="event_joined" style="margin-left:0px">
            <?php if($join_users){ ?>
          
          <div class="imds" style="border: 1px solid #398AB7;float: left;width:47%;">
      
          <?php foreach ($join_users as $key => $value) { ?>
            <img src="<?php echo ($value->photo && file_exists(UPLOADS.$value->photo)) ? base_url().UPLOADS.$value->photo : base_url().UPLOADS.'profile.png';?>" style="width:40px;height:40px; padding: 5px;" class="img" alt="<?php echo $value->perdataFullName; ?>" title="<?php echo $value->perdataFullName; ?>">
            
        <?php } ?> <a href="#">
            <h6 style="color:#29A1DD;text-align:right">View More!</h6>
            </a> </div><?php  } ?>
            
          
          
            <?php if($maybe_users){ ?>
            <div class="imds2" style="border: 1px solid #398AB7;width: 46%;float:left;margin-left:24px;">
          <?php foreach ($maybe_users as $key => $value) { ?>
            <img src="<?php echo ($value->photo && file_exists(UPLOADS.$value->photo)) ? base_url().UPLOADS.$value->photo : base_url().UPLOADS.'profile.png';?>" style="width:40px;height:40px;padding: 5px;" class="img" alt="<?php echo $value->perdataFullName; ?>" title="<?php echo $value->perdataFullName; ?>">
           
           
        <?php } ?>  <a href="#">
            <h6 style="color:#29A1DD;text-align:right">View More!</h6>
            </a></div><?php  } ?>
            
          
        </div>
      </div>
    </div>
  </div>
  <!-- /SECTION TILES -->
  </section>
  <!-- /SECTION -->
  <!--sample-->
  <section class="clearfix section" id="contactform" style="background-color:rgba(22, 80, 82, 0.72);border-radius: 19px;margin-right:50px">
  <!-- SECTION TITLE -->
  <h3 class="block-title"></h3>
  <!-- /SECTION TITLE -->
  <!-- SECTION TILES -->
  
        <?php 
            if(!empty($eventPosts)) {
              $i = 1;
              foreach($eventPosts as $result)
            { if($i == 1){ ?>
        <div class="tile black htmltile w3 h4">
    <div class="tilecontent">
      <div class="content">
        <ul class="listmnu">
          <li id="pst-dsply-mnu" class="active"><?php echo $lang['posts'];?></li>
          <li id="pst-img-mnu"><?php echo $lang['add_photo_video'];?></li>
        </ul>
        <div class="comment-area" style="transition:all 1s ease-in-out">
          <div id="pst-dsply-blck">
            <form id="event-post-form" method="post" action="<?php echo base_url(); ?>events/upload_status_image" enctype="multipart/form-data">
              <textarea class="commnt-txtara" id="write-something-cmnt" placeholder="<?php echo $lang['write_something'];?>"></textarea>
              <p class="required_error hide" style="color:#f00"><?php echo $lang['enter-some-text-to-continue'];?></p>
              <div class="uplad-file" id="up-fle">
                <label class="upload-label"><?php echo $lang['upload_image'];?> :</label> 
                <!-- <input id="uploadFile" placeholder="Choose File" disabled="disabled"/> -->               
                <input type="hidden" name="savedImagesName" id="savedImagesName" value=""/>               
                <div class="fileUpload btn btn-primary" style="background:url(<?php echo base_url();?>assets/img/events/view/ia.png);background-size: 100%;background-repeat: no-repeat;width: 78px">
                  <input id="uploadBtn" type="file" accept="image/*" class="upload" name="eventPostImage" style="width: 69px;"/>
                </div>
              </div>
              <div id="t-status-images-preview-wrapper"></div>
              <div class="submit-btnn-cls" style="margin-top: -46px;">
                <input type="button" value="<?php echo $lang['continue'];?>" id="submitPost" class="btn btn-danger submt-btn" style="margin-top: 42px;background-color: rgba(68, 167, 134, 0.52);margin-right: 0px;">
              </div>
            </form>
          </div>
          <div id="add-pst-vide">
          <form id="event-post-photo-form" method="post" action="<?php echo base_url(); ?>events/upload_status_image" enctype="multipart/form-data">
            <label class="upload-label"><?php echo $lang['upload_image'];?> :</label> 
            <!-- <input id="uploadFile" placeholder="Choose File" disabled="disabled"/> -->
            <input type="hidden" name="event_id" value="<?php echo $event->id;?>"/>
            <div class="fileUpload btn btn-primary" style="background:url(<?php echo base_url();?>assets/img/events/view/ia.png);background-size: 100%;background-repeat: no-repeat;width: 78px">
              <input id="uploadBtnPhoto" name="eventPostImagePhoto" type="file" accept="image/*" class="upload" style="width: 69px;"/>
            </div>
          </form>
          </div>
        </div>
        <div id="allPosts">
      <?php } 
            if($i != 1 && $i%5 === 1){ ?>
        <div class="tile black htmltile w3 h4">
        <div class="tilecontent">
          <div class="content">
            <ul class="listmnu">
            </ul>
        
      <?php }
            ?>
        
        <div class="eventPosts" id="singlePost_<?php echo $result->id;?>">
          <div class="pst-cntnts" style="height:100%">
          <div class="col-md-12 headder_evt_hd">
            <div class="img-cntnr thumbnail">
              <a href="<?php echo base_url().'user/'.$result->custName;?>"><img style='width: 50px;height: 50px; border-radius: 50px'  src="<?php echo ($result->photo && file_exists(UPLOADS.$result->photo)) ? base_url().UPLOADS.$result->photo : base_url().UPLOADS.'profile.png';?>" class="pf-img-pst" alt="<?php echo $result->custName; ?>"></a>
            </div>
            <div class="usr-pfle-nme">
              <h2><?php echo ucwords($result->perdataFullName); ?></h2>
              <p>
                <?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$result->created) ?>
              </p>
            </div>
            <?php if($this->session->userdata['profile_data'][0]['custID'] == $result->custID){ ?>
            <div class="userActionsDiv">
                                <p class="userActions" id="<?php echo $result->id;?>">
                                  
                                  <small><a href="javascript:void(0)"  data-toggle="modal" data-target="#editPostPopDivision" class="editData" title="EDIT POST"><span class="glyphicon glyphicon-edit"><img src="<?php echo base_url().IMAGES;?>events/view/edit.png" /></span></a></small>
                                  <small><a href="javascript:void(0)" data-toggle="modal" data-target="#postDeleteConfirmation" class="postDeleteConfirmation" title="DELETE POST"><span class="glyphicon glyphicon-trash"><img src="<?php echo base_url().IMAGES;?>events/view/trash.png" /></span></a></small>
                                </p>
                        </div>
                        </div>
                                <?php } ?>
                                <div class="col-md-12" style="margin-bottom: 0px;background-color:rgba(2, 24, 22, 0.49);">  
            <div class="pstdd-img thumbnail" style="border: none; padding: 0.111%;">
              <p class="postContent" style="text-align: justify;padding-right: 27px">
                                    <?php echo $result->description; ?>
                                  </p>
                                  
                                  <p class="postImage">
                  <?php if(!empty($result->file) && file_exists(EVENTS.'post/'.$result->file)) { ?>
                                        <a href="<?php echo base_url().EVENTS.'post/'.$result->file; ?>" class="fancybox"><img src="<?php echo base_url().EVENTS.'post/'.$result->file; ?>" class="img-responsive"  alt="<?php echo $result->file; ?>" /></a>
                              <?php } ?>
                              </p>
            </div>
            </div>
            <div class="col-md-12 like_comments">
            <span class="joinuser" id="<?php echo $result->custID; ?>" ></span>
            <div class="lke-cmnt">
            (<span id="user_likes<?php echo $result->id; ?>">
            <?php echo $result->total_likes;  ?> </span>)
                <?php
                 if(!empty($result->liked)){ 
                                 ?>
                 <span id="user_unlike<?php echo $result->id; ?>"> <span class="small" style="padding:3px;border-radius:3px;" ><span class="small fa fa-thumbs-up unlike" style="color:green;" id="<?php echo $result->id; ?>"> <?php echo $lang['unlike'];?></span> </span> </span>
                 
    <?php }else{ ?>
              <span id="user_like<?php echo $result->id; ?>">   <span class="small like" style="padding:3px;border-radius:3px;" id="<?php echo $result->id; ?>"  ><span class="small fa fa-thumbs-o-up"> <?php echo $lang['like'];?></span> </span></span>
                  

    <?php  } ?> 
                 
                 <span class="small" id="add_like<?php echo $result->id; ?>"></span>
              (<span id="recent_comment_count<?php echo $result->id;?>">
              
              <?php echo $result->total_comments;  ?> </span>)
              
           <span class="pst-cmntss cmnt-boxx" id="<?php echo $result->id;?>" style="cursor: pointer;"><i class="fa fa-comment" style="padding-right:5px;"></i><?php echo $lang['comments'];?></span>
            </div>
            </div>
          </div>
          
          <div id="recent_comment<?php echo $result->id;?>">
          <?php  if(!empty($result->comments)){
    foreach($result->comments as $row)
        {
            ?>
            <div id="subcomment_<?php echo $row['uaID'];?>">
          
          <div class="cmnt-area-bottm">
            <div class="thumbnail" style="float:left; border:none; padding:0">
              <img src="<?php echo ($row['photo'] && file_exists(UPLOADS.$row['photo'])) ? base_url().UPLOADS.$row['photo'] : base_url().UPLOADS.'profile.png';?>" class="pf-img-pst" alt="User Profile"/>
            </div>
            <div class="wrap-div"><span id="singlcomment_<?php echo $row['uaID'];?>"><?php echo $row['comment']; ?></span></div>
          </div>
          <?php
          if($this->session->userdata['profile_data'][0]['custID'] ==$row['custID'])
              {
              ?>
                  <a  class="editComment" data-commentid="<?php echo $row['uaID'];?>" href="javascript:void(0)" data-toggle="modal" data-commentonly="<?php echo $row['comment']; ?>"  data-target="#editComment"  ><span class="icn-spce-grp"><i class="fa fa-pencil-square-o" style="color:darkgreen"></i></span></a>

                  <a class="deleteComment" data-p="<?php echo $result->id;?>" data-comment="<?php echo $row['uaID'];?>" href="javascript:void(0)" data-toggle="modal"  data-target="#deleteComment" ><span class="icn-spce-grp"><i class="fa fa-trash-o" style="color:darkred"></i></span></a>

       <?php } ?>
        </div>    
    <?php } } ?>
          <!------------>
          <!--</div></div>-->
          <!------------>
          
          </div>
          <!-- -----------------ROhitDutta-------------------- -->
  
  <?php
  
  if($result->total_comments > 4)
  {
  ?>
  <a href="javascript:void(0)" class="view_more_event_comments old_comments<?php echo $result->id;?>" style="color: #388A7F; font-weight: bold;" data-posteventid="<?php echo $result->id;?>"><?php echo $lang['view-more-comments'];?></a>

  <?php
  }
  else
  {
  ?>
  
  <?php
  }
  ?>
  <a href="javascript:void(0)" class="view_more_event_comments old_comments1<?php echo $result->id;?>" style="color: #388A7F; font-weight: bold; display:none" data-posteventid="<?php echo $result->id;?>"><?=$lang['view-more-comments'];?></a>
  <input type="hidden" class="total_count_comment_default<?php echo $result->id;?>" value="<?php echo $result->total_comments;  ?>" />
  <input type="hidden" id="d_e_id" class="display_event_id"  value="<?php echo $result->id;?>" data-posteventid="<?php echo $result->id;?>"/>
   <!-- ---------------------------------------------- -->
         <div id="cmnt-area_<?php echo $result->id;?>" style="display:none;">
              
              <textarea id="user_comment<?php echo $result->id;?>" placeholder="<?=$lang['write-comment-here'];?>..." style="width:95%; background:transparent;color:#ffffff"></textarea>
              <button type="button" class="btn btn-danger pull-right comment" style="background-color: rgb(45, 106, 88);margin-bottom: 3%;width: 100px;height: 38px;" id="<?php echo $result->id;?>" ><?=$lang['comment'];?></button>
              </div>
      </div>
        <?php if($i === 5){  ?>
        </div>
        </div>
    </div>
  </div>
      
    <?php } if($i != 5 && $i%5 === 0){ ?>
    </div>
    </div>
  </div>
        
    <?php } 
        $i++; } } else{ ?>
          <div class="tile black htmltile w3 h4">
    <div class="tilecontent">
      <div class="content">
        <ul class="listmnu">
          <li id="pst-dsply-mnu" class="active"><?=$lang['posts'];?></li>
          <li id="pst-img-mnu"><?php echo $lang['add_photo_video'];?></li>
        </ul>
        <div class="comment-area" style="transition:all 1s ease-in-out">
          <div id="pst-dsply-blck">
            <form id="event-post-form" method="post" action="<?php echo base_url(); ?>events/upload_status_image" enctype="multipart/form-data">
              <textarea class="commnt-txtara" id="write-something-cmnt" placeholder="<?php echo $lang['write_something'];?>"></textarea>
              <p class="required_error hide" style="color:#f00"><?=$lang['enter-some-text-to-continue'];?></p>
              <div class="uplad-file" id="up-fle">
                <!-- <input id="uploadFile" placeholder="Choose File" disabled="disabled"/> --> 
                <label class="upload-label"><?=$lang['upload_image'];?>:</label>         
                <input type="hidden" name="savedImagesName" id="savedImagesName" value=""/>               
                <div class="fileUpload btn btn-primary" style="background:url(<?php echo base_url();?>assets/img/events/view/ia.png);background-size: 100%;background-repeat: no-repeat;width: 78px">
                  <input id="uploadBtn" type="file" class="upload" name="eventPostImage" style="width: 69px;"/>
                </div>
              </div>
              <div id="t-status-images-preview-wrapper"></div>
              <div class="submit-btnn-cls" style="margin-top: -46px;">
                <input type="button" value="<?=$lang['continue'];?>" id="submitPost" class="btn btn-danger submt-btn" style="margin-top: 42px;">
              </div>
            </form>
          </div>
          <div id="add-pst-vide">
          <form id="event-post-photo-form" method="post" action="<?php echo base_url(); ?>events/upload_status_image" enctype="multipart/form-data">
            <!-- <input id="uploadFile" placeholder="Choose File" disabled="disabled"/> -->
            <label class="upload-label"><?=$lang['upload_image'];?> :</label> 
            <input type="hidden" name="event_id" value="<?php echo $event->id;?>"/>
            <div class="fileUpload btn btn-primary" style="background:url(<?php echo base_url();?>assets/img/events/view/ia.png);background-size: 100%;background-repeat: no-repeat;width: 78px">
              <input id="uploadBtnPhoto" name="eventPostImagePhoto" type="file" class="upload" style="width: 69px;"/>
            </div>
          </form>
          </div>
        </div>
        <div id="allPosts">
        </div>
        </div>
    </div>
  </div>
        <?php } ?>
  
  <div id="hidden_new_post" class="hide">
  <div class="eventPosts">
          <div class="pst-cntnts" style="height:100%">
          <div class="col-md-12 headder_evt_hd" style="margin-bottom: 0px;">
            <div class="img-cntnr thumbnail">
              <a href="<?php echo base_url().'user/'.$this->session->userdata['profile_data'][0]['custName'];?>"><img style='width: 50px;height: 50px; border-radius: 50px' src="<?php echo ($this->session->userdata['profile_data'][0]['photo'] && file_exists(UPLOADS.$this->session->userdata['profile_data'][0]['photo'])) ? base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'] : base_url().UPLOADS.'profile.png';?>" class="pf-img-pst" alt="<?php echo $this->session->userdata['profile_data'][0]['photo']; ?>"></a>
            </div>
            <div class="usr-pfle-nme">
              <h2><?php echo ucwords($this->session->userdata['profile_data'][0]['perdataFullName']); ?></h2>
              <p>
                Just now
              </p>
            </div>
            <div class="userActionsDiv">
                                <p class="userActions" id="">
                                  
                                  <small><a href="javascript:void(0)"  data-toggle="modal" data-target="#editPostPopDivision" class="editData" title="EDIT POST"><span class="glyphicon glyphicon-edit"><img src="<?php echo base_url().IMAGES;?>events/view/edit.png" /></span></a></small>
                                  <small><a href="javascript:void(0)" data-toggle="modal" data-target="#postDeleteConfirmation" class="postDeleteConfirmation" title="DELETE POST"><span class="glyphicon glyphicon-trash"><img src="<?php echo base_url().IMAGES;?>events/view/trash.png" /></span></a></small>
                                </p>
                        </div>
                          </div>
                             <div class="col-md-12" style="margin-bottom: 0px;background-color:rgba(2, 24, 22, 0.49);"> 
            <div class="pstdd-img thumbnail" style="border: none; padding: 0.111%;">
              <p class="postContent">
                                    
                                  </p>                                  
                                  <p class="postImage">
                              </p>
            </div>
            </div>
            <div class="col-md-12 like_comments">
              <div class="lke-cmnt">
              <span class="user" >
              (<span class="new_user_likes" id="">0</span>) <span class="replace_like"><span  class="like"><i class="fa fa-thumbs-o-up" style="padding-right: 3px; padding-left: 3px; "> <?=$lang['like'];?></i></span></span>   <span class="pst-cmntss cmnt-boxx" ><i class="fa fa-comment" style="padding-right:5px"></i><?=$lang['comments'];?>(<span class="recent_count">0</span>)</span>
              </div>
            </div>
              <div class="recent_com" >
          </div>
          <div class="cmnt_area">
          <!-- -------------------------RohitDutta--dummy---------------- -->
  <input type="hidden" id="t_c_c" class="total_count_comment" value="0" />
  <input type="hidden" class="display_event_id"  value="" data-posteventid=""/>
<a href="javascript:void(0)" class="view_more_event_comments new_comments new_com" style="color: #388A7F; font-weight: bold; display:none" ><?=$lang['view-more-comments'];?></a>
          <!-- -------------------------------------------------------------- -->
              <textarea placeholder="<?=$lang['write-comment-here'];?>. . ." style="width:95%; background:rgba(0,0,0,0.7)" class="comnt-post" id=""></textarea>
              <button class="btn btn-danger pull-right comment" ><?=$lang['comment'];?></button>
            </div>
          </div>
          
        
        </div>
   
  <!-- /SECTION TILES -->
  </section>
  </section>

  <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="background-color:#163f5c;opacity:.8">
    <div class="modal-dialog" role="document" style="z-index:9999;">
     <div class="modal-content">
      <form action="<?php echo base_url().'events/delete'?>" method="post">
        <div class="modal-header" style="border-bottom:0">
          <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel"><h2><?=$lang['delete_confirmation'];?></h2>
        </div>
        <div class="modal-body">
         <?=$lang['do-you-really-want-to-delete-this-event'];?>
        </div>
        <div class="modal-footer" style="background-color:#163f5c;opacity:.8">
       <input type="hidden" id="event-id" name="event_id" value="<?php echo $event->id;?>">
      <a href="javascript:void(0)" id="">
        <button type="submit" class="btn btn-success" id="deleteConfirmBtn"><?=$lang['confirm'];?></button>
      </a>
       <button type="button" class="btn btn-danger" data-dismiss="modal"><?=$lang['cancel'];?></button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="postDeleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  style="background-color:rgba(22,63,92,.9)">
    <div class="modal-dialog" role="document" style="z-index:9999;">
     <div class="modal-content">
        <div class="modal-header" style="border-bottom:0">
          <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel"><h2><?=$lang['delete_confirmation'];?> </h2>
        </div>
        <div class="modal-body"> 
          <?=$lang['do_you_want_to_delete'];?>
        </div>
        <div class="modal-footer" style="background-color:rgba(22,63,92,.9)">
       <input type="hidden" id="event-id" name="event_id" value="<?php echo $event->id;?>">
      <a href="javascript:void(0)" id="">
        <button type="submit" class="btn btn-success" id="deletePostConfirmBtn"><?=$lang['confirm'];?></button>
      </a>
       <button type="button" class="btn btn-danger" data-dismiss="modal"><?=$lang['cancel'];?></button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editPostPopDivision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  style="background-color:rgba(22,63,92,.9)">
    <div class="modal-dialog" role="document" style="z-index:9999;">
     <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="exampleModalLabel"><?=$lang['edit-event-post'];?></h2>
      </div>
      <div class="modal-body" style="max-height:500px;">
      <form method="post" id="edit-ts-box-image-upload-form" action="<?php echo base_url(); ?>events/upload_status_image" enctype="multipart/form-data">
          <div class="form-group">
          <div id="edit-post-div">
      </div>      
        
            <div id="edit-t-status-images-preview-wrapper"></div> 
      <div class="uplad-file" id="up-fle">
        <!-- <input id="uploadFile" placeholder="Choose File" disabled="disabled"/> -->   
        <label class="upload-label"><?=$lang['upload_image'];?> :</label>             
        <input type="hidden" name="savedImagesName" id="savedImagesName" value=""/>               
        <div class="fileUpload btn btn-primary" style="background:url(<?php echo base_url();?>assets/img/events/view/ia.png);background-size: 100%;background-repeat: no-repeat;width: 78px">
          <input id="editUploadBtn" type="file" accept="image/*" class="upload" name="editEventPostImage" style="width: 69px;"/>
        </div>
        <input type="hidden" id="EditsavedImagesName" name="EditsavedImagesName" value="" />
        <input type="hidden" id="editPostType" name="editPostType" value="" />
      </div>

      <div id="t-status-images-preview-wrapper"></div>    
      
          </div>
 
    
      </div>
      <div class="modal-footer">
         <a href="javascript:void(0)" id="">
        <button type="submit" class="btn btn-success" id="editSavePost"><?=$lang['update'];?></button>
      </a>
       <button type="button" class="btn btn-danger" data-dismiss="modal" id="editcloseBtn"><?=$lang['cancel'];?></button>
          <input type="hidden" id="editPostId" value="" />
      </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /MAIN CONTENT SECTION -->
 
  <!-- jQuery Library -->
  <script src="<?php echo base_url(); ?>assets/js/events/view/jquery.isotope.min.js" type="text/javascript"></script>
  <!-- Isotope Layout Plugin -->
  <script src="<?php echo base_url(); ?>assets/js/events/view/jquery.mousewheel.js" type="text/javascript"></script>
  <!-- jQuery Mousewheel -->
  <script src="<?php echo base_url(); ?>assets/js/events/view/jquery.mCustomScrollbar.js" type="text/javascript"></script>
  <!-- malihu Scrollbar -->
  <script src="<?php echo base_url(); ?>assets/js/events/view/tileshow.js" type="text/javascript"></script>
  <!-- Mahajyothis Custom Tileshow Plugin -->
  <script src="<?php echo base_url(); ?>assets/js/events/view/script.js" type="text/javascript"></script>
  <!-- Mahajyothis Script -->
  <script src="<?php echo base_url(); ?>assets/js/events/view/overlay.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/events/view/fancy_box.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/jquery.form.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
  <?php include_once('assets/js/events/view/inner_script.php');?>
<?php include_once('assets/js/unlike/event_unlike.php');?>
<!----------------------- This Modal is for delete single comment----------------------------------------------->
<div class="modal fade" id="deleteComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="background-color:#163f5c;opacity:.8;">
    <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><h2><?=$lang['delete_confirmation'];?></h2>
            </div>
            <div class="modal-body" style="color: red"><h3>
                    <?=$lang['do_you_want_to_delete'];?>
                </h3></div>
            <div class="modal-footer">

                <a href="javascript:void(0)" class="ForDeleteComment" style="text-decoration: none;" id="" data-postid="">
                    <button type="button" class="btn btn-success btn-sm" id="del" data-dismiss="modal"><?php echo $lang['continue'];?></button>
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo $lang['cancel'];?></button>
            </div>
        </div>
    </div>
</div>


<!----------------------- This Modal is for edit single comment----------------------------------------------->
<div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="background-color:#163f5c;opacity:.8;">
    <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel" ><h2 style="color: red"><?=$lang['edit_comment'];?></h2>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="edit_s_c">
                    <input type="text" required class="form-control ForEditComment" name="edit_single_comment" id="edit_single_comment" value="">
                </form>
            </div>
            <div class="modal-footer">

                <a href="javascript:void(0)" class="for_comment_id" style="text-decoration: none;" id="">

                    <button type="button" class="btn btn-success btn-sm" id="editCommentBtn"><?php echo $lang['update'];?></button>
                </a>
                <button type="button" class="btn btn-danger btn-sm" id="cancelAtEditComment" data-dismiss="modal"><?php echo $lang['cancel'];?></button>
            </div>
        </div>
    </div>
</div>
<!-- ----------------------------------------------->
  </body>
 
  </html>