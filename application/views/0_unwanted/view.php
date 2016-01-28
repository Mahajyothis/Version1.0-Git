<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?=$results->grp_name;?></title>
		<meta name="generator" content="Bootply" >
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<link href="<?php echo base_url('assets/group_rakesh/css/styles.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/group_rakesh/css/jquery-ui.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/jquery.autocomplete.css');?>" rel="stylesheet">
		
	</head>
	<body>
 

<div class="container">
  <div class="col-md-12 back" style="background-image:url(<?php echo base_url().'uploads/groups/banners/'.$results->grp_cover;?>) !important;">
  
	<div class="col-md-12 navigate">
	<!--navigations-->
		<div class="col-md-6 navigation1" style="width: 45%;">
			<div class="col-md-12">
				<h4 style="margin-top: 5px;color:white">
                <?=$results->grp_name;?></h4>
		    </div>	
			
			<div class="col-md-12">
				<h6 style="margin-top: 0px;color:#15CA15;">
<?php if($results->privacy ==1)echo "Public";else{echo "Private";}?> Group</h6>
		    </div>				
		</div>
		
		<div class="col-md-2 navigation1" style="text-align: center;padding: 1%;">
			<div class="dropdown">
				  <button class="btn btn-default transperantb dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Joined
					<span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li><a href="#">Separated link</a></li>
				  </ul>
			</div>
		</div>	
		
		<div class="col-md-2 navigation1" style="text-align: center;padding: 1%;">
			<div class="dropdown">
				  <button class="btn btn-default transperantb dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<span class="caret"></span>  Share
				  </button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li><a href="#">Separated link</a></li>
				  </ul>
			</div>
		
		</div>
		
		<div class="col-md-2 navigation1" style="text-align: center;padding: 1%;">
			<div class="dropdown">
				  <button class="btn btn-default transperantb dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<span class="caret"></span>  Notifications
				  </button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li><a href="#">Separated link</a></li>
				  </ul>
			</div>
		
		</div>
	<!--navigations-->		
	</div>
<!--/navigations-->
  </div>
<!--/back class-->  



 
    <div class="col-lg-6 left">
		<div class="col-md-12 navigations2">
		
			
			<div class="col-md-4">
				<button type="button" class="btn btn-default sty" id="post">Post</button>
			</div>
			
			<div class="col-md-4">
				<button type="button" class="btn btn-default sty" id="events">Events</button>
			</div>
			
			<div class="col-md-4">
				<button type="button" class="btn btn-default sty" id="photos">Photos</button>
			</div>

			
		
		</div>
		
		<div class="col-md-12 postsection" id="post-hide">
		<div class="well" style="margin-top:15px;"> 
             <form class="form-horizontal" role="form">
              <h4>What's New</h4>
               <div class="form-group" style="padding:14px;">
                <textarea class="form-control" name="postApostBox" id="postApostBox" placeholder="Update your status"></textarea>
              </div>
           
              <input type="submit" class="btn btn-success pull-right" value="Post" style="width:auto;" id="postApost" /> 
			  <ul class="list-inline"><li><a href="#">&nbsp;</a></li></ul> 
            </form>
        </div>
		
		</div>
		
			<div class="col-md-12 postsection" id="event" style="display:none;">
		<div class="well"  style="margin-top:15px;"> 
             <form class="form-horizontal" role="form">
             
               <div class="form-group"  style="padding:5px;">
			   <span class="glyphicon glyphicon-bullhorn"></span> Event Title:
                <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Event title">
				</div>
				   <div class="form-group"  style="padding:5px;">
               <span class="glyphicon glyphicon-map-marker" /></span> Location:
				  <input type="text" class="form-control" id="eventLocation" name="eventLocation" placeholder="location" > 
              </div> 
			  
			  <div class="form-group"  style="padding:5px;">
                <span class="glyphicon glyphicon-calendar"></span> Event Date: 
			<input type="text" id="eventDate" name="eventDate" placeholder="Event date"  class="form-control eventDate">
              </div>
				 <div class="form-group"  style="padding:5px;">
                <textarea class="form-control" name="eventDes" id="eventDes" placeholder="Tell about event..."></textarea>
              </div>
				
		
           
              <input type="submit" class="btn btn-success pull-right" value="Invite" style="width:auto;" id="postAevent" /> 
			  <ul class="list-inline"><li><a href="#">&nbsp;</a></li></ul> 
            </form>
        </div>
		
		</div>
		
		<div class="col-md-12 postsection" id="photo-hide" style="display:none;">
		<div class="well" style="margin-top:15px;"> 
             <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url().'groups/doPostwithImage/'.$r;?>" role="form">
              <h4>What's New</h4>
               <div class="form-group" style="padding:14px;">
               <input type="file" name="uploadPhoto" id="uploadPhoto" required>
			   
              </div>
           <div class="form-group" style="padding:14px;">
                <textarea class="form-control" name="postTextinImage" id="postTextinImage" required placeholder="What you want to say..!"></textarea>
              </div>
           
              <input type="submit" class="btn btn-success pull-right" value="Post" style="width:auto;" id="postApostwithImage" /> 
			  <ul class="list-inline"><li><a href="#">&nbsp;</a></li></ul> 
            </form>
        </div>
		
		</div>
		
		<div id="allPosting" class="col-md-12 postsection">
		 <?php  
							
							    if(empty($posts))
                                {
								   
								   echo "No posts found...!";
								}
								else
								{
                                 //print_r($posts);
								foreach($posts as $post)
						         {
						     ?>
		
		<div class="singlePost" id="singlePost_<?php echo $post->id;?>" style="background-color:#eee;padding:5px;border:0px dashed yellow;overflow:hidden;">
		<div class="col-md-12 prodetails">
			<div class="col-md-2 proimg">
				<img src="<?php echo base_url().UPLOADS.$post->photo;?>" style="width: 50px;height: 50px;">
			</div>
			<div class="col-md-10 proimg1">
									<?php if($post->custID == $this->session->userdata['profile_data'][0]['custID']){ ?>
			<span class="userAction" id="<?php echo $post->id;?>">
				
			 <p class="userActions pull-right" id="<?php echo $post->id;?>">
							<?php
								switch($post->postType){
									case 1 : $class = 'editData';
											 $data_target = 'exampleModalGroupEdit';
											break;								
									case 2 : $class = 'editDataEvent';
											$data_target = 'editEvent';
											break;
									case 3 : $class = 'editDataPhotoPost';
											$data_target = 'exampleModalEditPhoto';
											break;
								}
							?>
                                  <small><a href="#deleteConfirmation" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a></small>
                                  <small><a href="#<?php echo $data_target;?>" data-toggle="modal" data-target="#<?php echo $data_target;?>" class="<?php echo $class; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a></small>
                                </p>
			</span><?php } ?>
				<h5 style="margin-bottom: 0px;line-height: 0;"><?php echo $post->custName;?></h5><br>
				<h6 style="margin-top: 0px;"><?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$post->doDate);?></h6>
			</div>
		</div>
		    <?php if($post->postType ==2) {  ?>
			<div class="col-md-12 imgsection" style="background-image:url(<?php echo base_url('uploads/events/'.rand(1,10).'.jpg');?>);color:#fff;padding:10px;padding-bottom:30px;text-align:center;">
		    <h2 class="postContent"><?php echo $post->eventTitle;?> </h2>
			<span><?php echo $post->postContent;?></span>
		    <h4 class="postContent"><span class="glyphicon glyphicon-time"></span> <?php echo $post->eventDate;?> </h4>
		    <h4 class="postContent"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $post->eventLocation;?> </h4>
			
		</div>
		  <?php } else { ?>
		<div class="col-md-12 imgsection">
			<p class="postContent"><?php echo $post->postContent;?> </p>
		</div> 
		<?php } ?>
		<?php if($post->postType ==3) {  ?>
		<div class="col-md-12 imgsection">
			<img src="<?php echo base_url('uploads/groups/posts').'/'.$post->postImage;?>" style="width: 100%;">
		</div>
		<?php } ?>
		
		
	 
		
		
		<div class="col-md-12 activity">			
			<div class="col-md-2">
				<p>Like</p>
			</div>
			<div class="col-md-10">
				<p>Comments</p>
			</div>
		</div>
	   </div> 
	   <?php 
	      }
         }
   ?>
	   
    </div>
	
	<div id="last_msg_loader" class="item photob_load_more_btn hide col-sm-12">
		<img src="<?php echo base_url().IMAGES;?>ajax-auto-loader.gif" align="absmiddle" alt="Loading..."></img>
    </div>
	
	
    </div>
    <div class="col-lg-6 right">
	
      <div class="col-md-12 serch">
			<div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" placeholder="Search...." />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
	  </div>
	  
	  <div class="col-md-12 members">
		<h4>Members</h4>
		<div class="form-group">
		  <input type="text" class="form-control" id="mahajyothis_search" name="q">
		</div>
		<button id="invitebutton" onclick="invitation()" style="display:none;">Invite</button><span id="sent_information"></span>
		<marquee behaviour="alternate">
		<div class="col-md-12">
			<img src="<?php echo base_url('assets/group_rakesh/img/b.jpg');?>" style="width: 50px;">
		
		
			<img src="<?php echo base_url('assets/group_rakesh/img/b.jpg');?>" style="width: 50px;">
		
		
			<img src="<?php echo base_url('assets/group_rakesh/img/b.jpg');?>" style="width: 50px;">
		
		
			<img src="<?php echo base_url('assets/group_rakesh/img/b.jpg');?>" style="width: 50px;">
		
		
			<img src="<?php echo base_url('assets/group_rakesh/img/b.jpg');?>" style="width: 50px;">
		
			<img src="<?php echo base_url('assets/group_rakesh/img/b.jpg');?>" style="width: 50px;">
		</div>	
		</marquee>
		
		<hr id="hori">
		
		<p id="para1"><?=$results->grp_description;?></p>	
<hr>		
	  </div>
	  
	   <div class="col-md-12 members">
	   <a href="<?php echo base_url().'groups';?>" <button type="button" class="btn btn-warning">Create Group</button></a><br /><br />
		<p id="para1">Mahajyothis groups are a great way to share photos, post comments, and hold discussions around a common theme.</p>	
	   
	   </div>
	  
	  
    </div>
  
</div> 

<div class="modal fade" id="exampleModalGroupEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalGroupEdit">

  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Status</h4>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Post :</label>
            <textarea class="form-control" name="editPostContent" id="editPostContent" required></textarea>
            <p class="required_error hide">* Please fill this field</p>
          </div>
      
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal" id="editcloseBtn">Close</button>
          <input type="submit" class="btn btn-primary" id="editSavePost" value="Save" />
          <input type="hidden" id="editPostId" value="" />
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="editEvent">

  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Event</h4>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
           <div class="form-group"  style="padding:5px;">
			   <span class="glyphicon glyphicon-bullhorn"></span> Event Title:
                <input type="text" class="form-control" id="eventTitleEdit" name="eventTitleEdit" placeholder="Event title">
				</div>
				   <div class="form-group"  style="padding:5px;">
               <span class="glyphicon glyphicon-map-marker" /></span> Location:
				  <input type="text" class="form-control" id="eventLocationEdit" name="eventLocationEdit" placeholder="location" > 
              </div> 
			  
			  <div class="form-group"  style="padding:5px;">
                <span class="glyphicon glyphicon-calendar"></span> Event Date: 
			<input type="text" id="eventDateEdit" name="eventDateEdit" placeholder="Event date"  class="form-control eventDate">
              </div>
				 <div class="form-group"  style="padding:5px;">
                <textarea class="form-control" name="eventDesEdit" id="eventDesEdit" placeholder="Tell about event..."></textarea>
              </div>
      
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal" id="editcloseBtn">Close</button>
          <input type="submit" class="btn btn-primary" id="eventEditsubmit" value="Save" />
          <input type="hidden" id="eventPostId" value="" />
      </div>
        </form>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModalEditPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditPhoto">

  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Status</h4>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'groups/updatePostwithImage/'.$r;?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Post :</label>
            <textarea class="form-control" name="editPhotoContent" id="editPhotoContent" required></textarea>
            <p class="required_error hide">* Please fill this field</p>
          </div>
		  <div class="form-group">
            <label for="message-text" class="control-label">Image:</label>
			<div id="img_container"></div>
            <input type="file" class="form-control" name="editStatusPhoto" id="editStatusPhoto">
			<input type="hidden" id="editStatusPhotoId" name="editStatusPhotoId" value="" />
		 </div>
		  <div class="modal-footer">
			 <button type="button" class="btn btn-default" data-dismiss="modal" id="editcloseBtn">Close</button>
			  <input type="submit" class="btn btn-primary" id="" value="Save" />
			  
		  </div>
        </form>      
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><h2>Delete Confirmation </h2>
      </div>
      <div class="modal-body">
       Do you want to delete this group ?
      </div>
      <div class="modal-footer">
           
    <a href="javascript:void(0)" id="">
      <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Confirm</button>
    </a>
     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

               
                    
<!-- /container -->
	<!-- script references -->
	
	

	
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	     <?php include_once('assets/group_rakesh/js/groups.php');?>
		 <script src="<?php echo base_url('assets/dis/js/bootstrap.min.js');?>"></script>
		 <script src="<?php echo base_url('assets/group_rakesh/js/jquery-ui.js');?>"></script>
		 <script src="<?php echo base_url('assets/group_rakesh/js/script.js');?>"></script>
		 <script src="<?php echo base_url('assets/js/jquery.autocomplete.js');?>"></script>
		 <script>


     $(document).ready(function () {

  $("#mahajyothis_search").autocomplete("<?php echo base_url()?>groups/groupmembers", {

        selectFirst: true
  });
 });

</script>
<!--<script>
$(document).ready(function(){
		
	$("#mahajyothis_search").change(function(){
		var name=$(".memberresult").val();
		alert(name)
		$("#mahajyothis_search").val('');
	$(".ac_results").hide();
});
	
});

</script>-->
<script>
$(document).ready(function(){
		
	$("#mahajyothis_search").change(function(){
		$("#invitebutton").show();
		$("#sent_information").hide();
		
});
	
});
</script>
<script>
function invitation(){
	var name=$("#mahajyothis_search").val();
	var groupID=<?php echo $this->session->userdata['groupID']; ?>;
	
	if(name!=''){
		
			$.ajax({
          url: "<?php echo base_url();?>groups/invitations?name="+name+"&gid="+groupID
        }).done(function( data ) {
			
       $("#invitebutton").hide();
		$("#mahajyothis_search").val('');
		$("#sent_information").html("<font color='navy'>"+name+" </font><font color='green'>has been added...</font>").show();
		  return true;
        }); 
		
		
		
		
		
		
	}
}

</script>
		 <script>
	$(document).ready(function(){
		
	$("#post").click(function(){
        $("#post-hide").fadeIn();
		$("#event").hide();
		 $("#photo-hide").hide();
    });
    $("#events").click(function(){
        $("#event").fadeIn();
		$("#post-hide").hide();
		 $("#photo-hide").hide();
    });
	$("#photos").click(function(){
	     $("#photo-hide").fadeIn();
        $("#event").hide();
		$("#post-hide").hide();
		
		
    });
    
})
	</script>
		 <div class="col-md-12 footer1">		 
			<h5>Mahajyothis &copy; 2015</h5>
		 </div>
	</body>
</html>