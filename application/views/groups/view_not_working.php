<!doctype html>
<html lang="en">
    <head>  
       
        <meta charset="utf-8" />
        <title><?php echo $results->grp_name;?></title>
        
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
 <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		  
		  <script src="http://malsup.github.com/jquery.form.js"></script> 
			
         <script src="<?php echo base_url('assets/grouppage/group-page-innr/js/jquery.isotope.min.js');?>" type="text/javascript"></script> <!-- jQuery Library -->
		 
         <script src="<?php echo base_url('assets/grouppage/group-page-innr/js/jquery.mousewheel.js');?>" type="text/javascript"></script> <!-- jQuery Library -->
		 
         <script src="<?php echo base_url('assets/grouppage/group-page-innr/js/tileshow.js');?>" type="text/javascript"></script> <!-- jQuery Library -->
	 <script src="<?php echo base_url('assets/grouppage/group-page-innr/js/script.js');?>" type="text/javascript"></script> <!-- jQuery Library -->
         
		 <script src="<?php echo base_url('assets/grouppage/group-page-innr/js/overlay.js');?>" type="text/javascript"></script> <!-- jQuery Library -->
         
		  <script src="<?php echo base_url('assets/grouppage/group-page-innr/js/jquery.mCustomScrollbar.js');?>" type="text/javascript"></script>
		  
		 <script src="<?php echo base_url('assets/grouppage/group-page-innr/js/bootstrap.min.js');?>" type="text/javascript"></script>
  
        <link href="<?php echo base_url('assets/grouppage/css/overlay.css');?>" rel="stylesheet">
		
		<link href="<?php echo base_url('assets/grouppage/css/style.css');?>" rel="stylesheet">
		
		<link href="<?php echo base_url('assets/grouppage/css/style-groups.css');?>" rel="stylesheet">
		
        <link href="<?php echo base_url('assets/grouppage/css/bootstrap-cols.css');?>" rel="stylesheet">
		
        <link href="<?php echo base_url('assets/grouppage/group-page-innr/css/style-grp-in.css');?>" rel="stylesheet">
		
		<link href="<?php echo base_url('assets/group_rakesh/css/jquery-ui.css');?>" rel="stylesheet">
		
		<link href="<?php echo base_url('assets/grouppage/facy-box/fancy.css');?>" rel="stylesheet">
		
		<script src="<?php echo base_url('assets/grouppage/facy-box/fancy_box.js');?>" type="text/javascript"></script>

       <style>
       .psts-lft-scrl .mCSB_container{ top:0 !important}
	   .ac_results li{
		   z-index:9999;
		   color:white;
		 background-color: #DA4F49;
		 padding:3%;
		 width:100%
	   }
	   .ac_results li:hover{ cursor:pointer}
	   .ac_results{    z-index: 999999;
       width: 361px !important;}
	.mCSB_horizontal > .mCSB_container{ margin-top: -80px;/* margin-left: -93px; */}
	   .form-dark textarea, .form-dark input[type="text"], .form-dark input[type="password"], .form-dark input[type="datetime"], .form-dark input[type="datetime-local"], .form-dark input[type="date"], .form-dark input[type="month"], .form-dark input[type="time"], .form-dark input[type="week"], .form-dark input[type="number"], .form-dark input[type="email"], .form-dark input[type="url"], .form-dark input[type="search"], .form-dark input[type="tel"], .form-dark input[type="color"], .form-dark .uneditable-input{background: rgba(8, 1, 1, 0.32) none repeat scroll 0% 0%;}
	   .pf-img-pst{
	   	width: 35px;
    		height: 35px;
    		border-radius: 50px;
	   }
	   .cmnt-area-bottm{
	   	
   		 background: rgba(24, 64, 53, 0.69);
   		 padding: 8%;
   		margin-bottom: -3px !important;
   		margin-top: 3px;
	   }
	   .small{
	   cursor:pointer;
	   }
	   .group_comment{
 word-spacing: initial;
}
	   </style>
    </head>
	
    <body>
	    
		<!--  DATA WE NEEDED -->
		   <?php 
                    $countData = count($userData);
                    $Countmembers =  count($members);
                    $CountRequests =  count($userJoinRequests);
            ?>

        <div class="header">
           <div class="icn-bck-clsss">
										<a href="<?php echo base_url('groups'); ?>"><img src="<?=base_url("assets/grouppage/img/back-arrw.png");?>" style="margin-top: 4px;"></a>
									<span style="font-size: 28px;padding: 12px;vertical-align: top;"><?php echo $results->grp_name; ?></span>
    
	    <?php
	   if($this->session->userdata['profile_data'][0]['custID'] == $results->custID && $CountRequests != 0)
		{ ?>
	    <a data-overlay-trigger="userRequestInfo" id="GetRequestsList" href="#!" style="position: fixed;
left: 87%;top:2%;"><span class="rht-tp-icn_2" style="font-size:15px;"> <i class="fa fa-bell fa-1x"></i> <span id="RequestsCountOrginal"><?php echo $CountRequests;?></span></span>
	</a>
	
		
	
	<?php } ?>
	<?php
	if($this->session->userdata['profile_data'][0]['custID'] == $results->custID)
									{ ?>
	<a data-overlay-trigger="UsersManagement" id="GetListMembers" href="#!" style="position: fixed;
left: 90%;top:2%;"> <span class="rht-tp-icn_2" style="font-size:15px;"> <i class="fa fa-users fa-1x"></i> <span id="MembersCountOrginal"><?php echo $Countmembers;?></span></span>
	</a>
	<?php } ?>
	

								</div>
        </div>
        <!-- /LOGO -->

        <!-- MAIN CONTENT SECTION -->
		
        <section id="content">
        
            
            <section class="clearfix section" id="about">
           
                <!-- SECTION TITLE -->
				
                <h3 class="block-title"></h3>
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
             

                <div class="tile black htmltile w3 h4" style="width: 350px !important;">
                    <div class="tilecontent">
					
                        <div class="content">
						
						<div class="thumbnail prfl-img-cls" >
								<img src="<?=base_url()."uploads/groups/banners/".$results->grp_cover;?>" class="pf-img" alt="User Profile" />
								
										<div class="joind-clsss">
											  <?php if($this->session->userdata['profile_data'][0]['custID'] == $results->custID)
	              
				                               {
				                                 ?> <span class="slct-bck-clr">
												<?= $lang['admin'];?>
											   </span>
				  <?php }  else
				        {
					
				        foreach($userData as $statusUser);
				        ?>
				    <?php if($countData != 0 && $statusUser->gistatus == 1)
				   {?>
				     

	                                      <p class="slct-bck-clr" id="<?php echo $statusUser->giID; ?>" style="text-align:center;padding-top:5px;">
											
											<a href="#" class='LeaveGroup'><?= $lang['leave_group'];?></a>
											</p>
						
				 <?php }
				       else if($countData != 0 && $statusUser->gistatus == 3)
					   {
				   ?>
        
		  <p class="slct-bck-clr" style="text-align:center;padding-top:5px;" id="<?php echo $statusUser->giID; ?>">
				      
					  
					  <i class="fa fa-exclamation-circle"></i> Pending <small>|</small> <a href="#" class='LeaveGroup'><?= $lang['cancel'];?></a>
					
				   
				
				  </p>
				  <?php } 
				  else
					   {
				   ?>
        
		  <p class="slct-bck-clr" style="text-align:center;padding-top:5px;">
				      <a href="#"  id="JoinGroupIcon">
					  
					  + Join group
					
				     </a>
				
				  </p>
				  <?php }
				        }
				  ?>
											  
											  
										</div>	
								
						</div>
                  </div>
				  
				  <div class="detls-sec-grp">
				  
                           <p style="padding-right:23px;font-size:12px;line-height:18px;padding-left:20px;padding-top: 3px;font-weight:bold">
										<?php echo $results->grp_description; ?>
										
										 
									</p>
									
						</div>
						<div class="col-md-12 group_section" style="background-color:#081c1a;padding-top:10px;padding-bottom:-2px;margin-top: -3px;">
									
									    <div class="col-md-4 "><i class="fa fa-user "></i>
										<p style="padding-left:19px;margin-top: -14px;color: #40a293;">Admin <span style="font-style:italic;"><?php echo ucwords($results->custName); ?></span> </p>
										</div>
										<div class="col-md-4 "><i class="fa fa-clock-o"></i>
										<p style="padding-left:19px;margin-top: -14px;color: #40a293;"><?php echo date('M y',strtotime($results->doDate));?></p>
										</div>
									
									</div>
                <div class="members-lst-cls">
								<div class="membrs-count">
									<p style=" color: #fff;padding-left: 18px;margin-top:2px;padding-bottom: 11px;font-weight:bold">(<?php echo $Countmembers+1;?>) <?= $lang['members'];?></p>
							<?php		if($this->session->userdata['profile_data'][0]['custID'] == $results->custID)
									{ ?>
											<div class="input-grps" style="padding-bottom:3px;margin-top: -6px;">
												  <span class="input-grps-icnn" id="sizing-addon1" style="  padding-bottom: 15px;padding-top: 14px;background: rgba(18, 15, 15, 0.33) none repeat scroll 0% 0%;color:#359587;">+</span>
												  <span class="groupid" id="<?php echo $results->grp_id; ?>"></span>
												    <span class="admin" id="<?php echo $results->custID; ?>"></span>
												  <input type="text" class="input-grps-rght mahajyothis_search" placeholder="<?= $lang['add_members'];?>" style="padding-bottom: 1px;padding-top: 5px;  background: rgba(18, 15, 15, 0.33) none repeat scroll 0% 0%;border:none;  padding-bottom: 10px;padding-top: 10px;">
												  
											</div>
											<span class="search_result"></span>
											<div id="sent_information" style='text-align:center;'></div>
									<?php } ?>
									</div>
							</div>
						</div>
						
                    </div>
					
                </div>
				
                <!-- /SECTION TILES -->
          
            </section>
			
            <?php if(($this->session->userdata['profile_data'][0]['custID'] == $results->custID) || ($countData != 0 && $statusUser->gistatus == 1))
				   {?>
          <section class="clearfix section" id="DatamakingArea">

                <!-- SECTION TITLE -->
                <h3 class="block-title" style="margin-top:26px; !important;font-weight: bold;"><?= $lang['update_what_you_like_now'];?></h3>
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
                <div class="tile black htmltile w3 h4 psts-lft-scrl" style="margin-top:35px; !important; ">
                    <div class="tilecontent">
                        <div class="content">

						
						<ul class="listmnu">
							<li id="pst-dsply-mnu" style="background-color:#688781;"><?= $lang['posts'];?></li>
							<li id="pst-even-mnu" style="background-color:#1f3e36;"><?= $lang['events'];?></li>
							<li id="pst-img-mnu"><?= $lang['add_photo'];?></li>
							
						</ul>
						
						<div class="comment-area" style="transition:all 1s ease-in-out;">
							<div id="pst-dsply-blck">
							 <form class="form-horizontal" role="form">
							<textarea class="commnt-txtara" name="postApostBox" id="postApostBox" placeholder="<?= $lang['update_your_status'];?>"></textarea>
							
									<div class="submit-btnn-cls" style="">
									<div style="color:red;padding: 5%;float:left;display:none;" id="StatusError"><?= $lang['write_something'];?></div>
									<input type="submit" value="<?= $lang['post'];?>" id="postApost" class="btn btn-danger submt-btn" style="background-color: #359587;">
									</div>
									</form>
							</div>			 
								</div>													
		
								<div id="event-frmm" style="background: rgba(32, 30, 30, 0.6) none repeat scroll 0% 0%;padding: 5%;">
								
							
								
								
                            <form id="eventPostingFORM" class="form-dark" name="">
                                <div class="row-fluid"  style="margin-top:15px;">
                                    <label><?= $lang['event_title'];?> </label>
                                    <input type="text" class="span12" id="eventTitle" name="eventTitle" placeholder="<?= $lang['event_title'];?>">
                                </div>
								
								<div class="row-fluid"  >
                                    <label><?= $lang['location'];?></label>
                                   
									<input type="text" class="span12" id="eventLocation" name="eventLocation" placeholder="<?= $lang['event_location'];?>" /> 
                                </div>
                               
							   <div class="row-fluid"  >
                                    <label><?= $lang['event_date'];?></label>
                                   
									<input type="text" class="span12 eventDate" id="eventDate" name="eventDate" placeholder="<?= $lang['event_date'];?>" /> 
                                </div>
							   
							   
							   <div class="row-fluid"  >
                                    <label><?= $lang['event_description'];?></label>
                                    <textarea class="span12" name="eventDes" id="eventDes" placeholder="<?= $lang['tell_about_event'];?>"></textarea>
                                </div>
                                <div class="row-fluid">
                                    <div style="color:red;padding: 5%;float:left;display:none;" id="StatusErrorEvent"><?= $lang['all_fields_required'];?></div>
                                    <input type="submit"  value='<?= $lang['create'];?>' id="postAevent" class="btn btn-danger submt-btn" style="background-color: #359587;"/>
                                </div>
                            </form>
							</div>
							<div id="add-pst-vide">
							 <form class="form-horizontal" id="imageUploadwithStaus" method="post" enctype="multipart/form-data" action="<?php echo base_url().'groups/doPostwithImage/'.$r;?>" role="form">
							   
							    <div class="row-fluid">
								  <label>Upload photo</label>
								    <div id="img_container" style='padding:3px;display:none;'></div>
							   <input type="file" class="span12" name="uploadPhoto" id="uploadPhoto" accept='image/*' required>
									  
									</div>  
									  <div class="row-fluid">
							 
							 <textarea class="commnt-txtara" name="postTextinImage" id="postTextinImage" required placeholder="<?= $lang['all_fields_required'];?>" style="width: 92%;margin-left:5px;height: 49px;"></textarea>
							</div>
							
							
							
                                  <div class="row-fluid" style="text-align:center;display:none;" id="loaderIMG">
                                    
									
									<img style="height:25px;" src="https://wordhub.com/static/img/loading.gif">
									 
									</div>
									 <div style="color:red;padding: 5%;float:left;display:none;" id="StatusErrorPhotoStatus"><?= $lang['all_fields_required'];?></div>
									<input type="submit"  value="<?= $lang['post'];?>" id="doPostandUploadImage" class="btn btn-danger submt-btn" /> 
									</form>
                                
							</div>
						
				<?php if(empty($posts))
                                {
								   ?>
								   	<div class="nopostfound">
									<?php
								   echo $lang['all_fields_required']."</div>";
								   
								
								}
								
								?>
								</div>
	</div>
		                  
                        </div>
						
                    </div>
                </div>
                <!-- /SECTION TILES -->

            </section>
			<?php } ?>
			              
						<section class="clearfix section isotope recentPostsSection" id="postBlock" style="position: relative; overflow: hidden; width: 318px; margin-top: 84px;">
						
						<div class="tile black htmltile w3 h4 isotope-item mCustomScrollbar _mCS_4" style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 24px, 0px);"><div class="mCustomScrollBox mCS-light-thick" id="mCSB_4" style="position:relative; height:100%; overflow:hidden; max-width:100%;"><div class="mCSB_container" style="position: relative; top: 0px;"><div class="tilecontent"><div class="content">							

						<div id="AllnewPosts">
						
						</div>
				
                        </div></div></div></div></div>
                                     </section>  
						  
					     <?php  
							
							    if(empty($posts))
                                {
								   
								   echo "";
								}
								else
								{
                                 //print_r($posts);
								$i = 0;
								
								$header_content = "<section class='clearfix section' id='postBlock'><div class='tile black htmltile w3 h4'><div class='tilecontent'><div class='content'>";
								 $footer_content = "</div></div></div>
                                     </section>";
								foreach($posts as $post)
						         {
								    
									
									if($i == 2 || $i == 0 )
									 {
									     echo $header_content;
										 $i = 0;
									 }
								 
								 
								
								
						     ?>
							 <div class="pst-cntnts " style="height:100%;  background-color: #0c231d;" id="singlePost_<?php echo $post->id;?>">
							<div class="group_text" style="background-color:#0f372f; height: 72px;margin-top:10px;">
							<div class="img-cntnr thumbnail"   style="margin-top: 10px;">
							
								<img src="<?php echo base_url().UPLOADS.$post->photo;?>" class="img-circle" alt="User Profile" width="50" height="50">
						</div>
							<div class="usr-pfle-nme">
							<div class="pst-nmes-clss" style="margin-top: 7px;font-weight:bold">
								<h3 style="font-size: 15px !important;font-weight:bold"><?php echo $post->perdataFirstName." ".$post->perdataLastName;?></h3>
								<p><?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$post->doDate);?></p>
							</div>
						
							<?php if($post->custID == $this->session->userdata['profile_data'][0]['custID'] || $this->session->userdata['profile_data'][0]['custID'] == $results->custID){ ?>
			
							<div class="userActions pst-editdel-clss" id="<?php echo $post->id;?>">
							
							<?php
								switch($post->postType){
									case 1 : $class = 'editData';
											 $data_target = 'editStatusInGroupsInner';
											break;								
									case 2 : $class = 'editDataEvent';
											$data_target = 'editEventSection';
											break;
									case 3 : $class = 'editDataPhotoPost';
											$data_target = 'editStatusWithPhoto';
											break;
								}
							?>
							
							
								<a data-overlay-trigger="<?php echo $data_target;?>" class="<?php echo $class;?>" href="#!"><span class="icn-spce-grp"><i class="fa fa-pencil-square-o" style="color:#fff"></i></span></a>
								
								<a href='#' class="Del_post" data-overlay-trigger="forDelete"><span  class="icn-spce-grp"><i class="fa fa-trash-o" style="color:#fff"></i></span></a>
							</div>
							<?php } ?>
							
							
							
							
														</div>
														</div>
														
													
                               	<?php if($post->postType ==2) {  ?>
			                <div class="col-md-12" style="background-image:url(<?php echo base_url('uploads/events/'.rand(1,10).'.jpg');?>);color:#fff;padding:10px;padding-bottom:30px;text-align:center;">
		                          <h2 class="PostedEventtitle"><?php echo $post->eventTitle;?> </h2>
			                      <p class="PostedEventContent" style="padding:4px"><?php echo $post->postContent;?></p>
		                          <h3 class="PostedEventDate"><i class="fa fa-calendar-times-o"></i> <?php echo $post->eventDate;?> </h3>
		                          <h4 class="PostedEventLocation" style="font-size:14px"><i class="fa fa-map-marker"></i> <?php echo $post->eventLocation;?> </h4>
			                     </div>
		  <?php } 
		   if($post->postType == 1) { ?>
		     <div class="col-md-11" style="float:none">
			  <p class="postContent" style="clear: both;"><?php echo $post->postContent;?> </p>
		</div> 
		<?php } ?>
						  
                           <?php if($post->postType ==3) {  ?>
						    <p style="padding: 10px;clear: both;" class="postContent">
							<?php echo $post->postContent;?>
							</p>
		   <div class="pstdd-img thumbnail" style="border: none;
padding: 0.111%;overflow: hidden;max-height:400px;padding:0 3% 0 3%">
			<a href="#facyme_<?php echo $post->id;?>" class="fancybox"><img src="<?php echo base_url('uploads/groups/fancy_show').'/'.$post->postImage;?>" class="img-responsive" style="width: 100%;" /></a>
		</div>
		
		  <div id="facyme_<?php echo $post->id;?>" style="display:none">
                                     <img src="<?php echo base_url('uploads/groups/fancy_show').'/'.$post->postImage;?>">
                            </div>
		<?php } ?>													
														
					 <?php if(($this->session->userdata['profile_data'][0]['custID'] == $results->custID) || ($countData != 0 && $statusUser->gistatus == 1))
				   {?>									
														
						   <div class="row" style="margin:0 auto">
								 
                           		<div class="col-md-12 " style="background: rgba(8, 28, 26, 0.92) none repeat scroll 0% 0%;margin: 0px auto;">
									<div class="lke-cmnt" style="margin-left: 38%;padding: 8px;margin-bottom: 0px;">
								<span class="user<?php echo $post->id; ?>" id="<?php echo $post->custID; ?>"></span>
								
							 (<span id="user_likes<?php echo $post->id; ?>">
            <?php echo $post->total_likes;  ?> </span>)
 <?php    if(!empty($post->liked)){ 
                                 ?>
                <span id="user_unlike<?php echo $post->id; ?>"> <span class="small unlike" id="<?php echo $post->id; ?>" style="padding:3px;border-radius:3px;" ><span class="small fa fa-thumbs-up" style="color:green;"> <?= $lang['unlike'];?></span> </span> </span>
                 
                 
    <?php }else{ ?>
               <span id="user_like<?php echo $post->id; ?>">  <span class="small like" style="padding:3px;border-radius:3px;" id="<?php echo $post->id; ?>" ><span class="small fa fa-thumbs-o-up"> <?= $lang['like'];?></span> </span></span> <?php  } ?> 

  (<span id="recent_comment_count<?php echo $post->id;?>">
              
              <?php echo $post->total_comments;  ?> </span>)
              
	<span class="pst-cmntss cmnt-boxx" id="<?php echo $post->id;?>" style="cursor: pointer;"><i class="fa fa-comment" style="padding-right:5px;"></i><?= $lang['comment'];?></span>
						  </div>
						  </div>
						  </div>
						  <div class="com" id="comments3" style="margin-top: -32px;">
						  <div class="coment_display">
	
						    <div id="recent_comment<?php echo $post->id;?>">
          <?php if(ISSET($post->comments)){
    foreach($post->comments as $row)
        {
            ?>
            <div id="subcomment_<?php echo $row['uaID'];?>">
            
          
          <div class="cmnt-area-bottm" style="display: inline-block;width: 100%;height: auto;padding: 5%;">
            <div class="thumbnail" style="float: left;
border: medium none;
padding: 0px 4% 0px 0px;
margin: 0px;">
              <img src="<?php echo ($row['photo'] && file_exists(UPLOADS.$row['photo'])) ? base_url().UPLOADS.$row['photo'] : base_url().UPLOADS.'profile.png';?>" class="pf-img-pst" alt="User Profile"/>
            </div><div class="comment-details"><span style='font-size: 12px !important;font-weight:bold'><?php echo $row['perdataFirstName']." ".$row['perdataLastName']; ?></span>
            <span style='padding-left: 2%;color: rgb(234, 222, 222);'><span id="singlcomment_<?php echo $row['uaID'];?>" class="group_comment"><?php echo $row['comment']; ?></span></span></div>
                            <!-------------------------->
                        </div>
            <!-------------------------broto------------------------------->
                                <?php
                                if($this->session->userdata['profile_data'][0]['custID'] == $row['custID'])
                                {
                                    ?>


                                    <a  class="editComment" data-commentid="<?php echo $row['uaID'];?>" href="javascript:void(0)" data-toggle="modal" data-commentonly="<?php echo $row['comment']?>"  data-target="#editComment"  ><span class="icn-spce-grp"><i class="fa fa-pencil-square-o" style="color:darkgreen"></i></span></a>

                                    <a class="deleteComment" data-p="<?php echo $post->id;?>" data-comment="<?php echo $row['uaID'];?>" href="javascript:void(0)" data-toggle="modal"  data-target="#deleteComment" ><span class="icn-spce-grp"><i class="fa fa-trash-o" style="color:darkred"></i></span></a>


                                <?php
                                }
                                else
                                {
                                    ?>

                                <?php
                                }
                                ?>
                               
                            


                   

          
    <?php  } }?>
               <!--------------------------------------------------------------------->
                   <!--</div>-->
                <!--</div>-->

            </div>
          </div>
           <!---------------Rohitdutta------------------------------------------------------------------------------------------------------->
            
	    
            <input type="hidden" class="get_post_id" value="<?php echo $post->id;?>">

            <input type="hidden" class="display_total_recent_comments<?php echo $post->id;?>" value="<?php echo $post->total_comments;?>">
            <?php
            $total_recent_count = $post->total_comments;

            if($total_recent_count > 4)
            {

            ?>
                <a href="javascript:void(0)" id="new_view_comments" class="new_view_comments old_view<?php echo $post->id;?>" style="color: #359587; font-weight: bold"><?= $lang['view_more_comments'];?></a>

            <?php
            }
            else
            {
            ?>

            <?php
            }
            ?>
             <a href="javascript:void(0)" id="new_view_comments" class="new_view<?php echo $post->id;?>" style="color: #359587; font-weight: bold; display:none"><?= $lang['view_more_comments'];?></a>
            <!---------------Rohitdutta------------------------------------------------------------------------------------------------------->
        </div>
						  
						  <div id="cmnt-area_<?php echo $post->id;?>" style="display:none;">
						  
						  <textarea id="user_comment<?php echo $post->id;?>" placeholder="<?= $lang['comment_here'];?>" style="width:95%; background:transparent"></textarea>
              <button class="btn btn-danger pull-right comment" style="background-color: rgb(45, 106, 88);margin-bottom: 3%;width: 100px;height: 38px;margin-top:4%;" id="<?php echo $post->id;?>" ><?= $lang['submit'];?></button>
						  </div>
						  
						  
	
	</div>
			 	 
<?php } ?>
						 
</div><?php $i++; 

if($i == 2)
									 {
									     echo $footer_content;
										
									 }
} }?>
                        
                     

					
        </section> 
   

	<div class="overlay" id="userRequestInfo">
      <div class="modal1" style="width: 40%;padding: 1%;box-shadow: 0px 4px 15px 2px rgba(19, 21, 24, 0.4);overflow-y: auto;position:relative; margin:0 auto">
	<div class="simp-cls" style="position:absolute;top:0">  <a href="#!"  onclick="$('.overlay#userRequestInfo').trigger('hide');return false;" >x</a></div>
         
               
					 <h3 class="block-title" style="margin-top: 15px;
margin-left: 9px;">Group Join Requests</h3>
                            <div id="ALLREQS">
							 
						</div>	
						
                        <div class="col-md-12" style="padding:5px;text-align:center;color:red;display:none;" id="noMoreRequests">No more Requests found...!</div>
                   
                <!-- /SECTION TILES -->

      
      </div>
    </div>
	
	<div class="overlay" id="UsersManagement">
      <div class="modal1" style="width: 40%;padding: 1%;box-shadow: 0px 4px 15px 2px rgba(19, 21, 24, 0.4);overflow-y: auto;position:relative; margin:0 auto">
	<div class="simp-cls" style="position:absolute;top:0">  <a href="#!"  onclick="$('.overlay#UsersManagement').trigger('hide');return false;" >x</a></div>
         

                
					 <h3 class="block-title" style="margin-top: 15px;
margin-left: 9px;"><?= $lang['group_members'];?></h3>
                            
						
						<div id="ALLMEMS">
						

                         </div>						
                       
                  
<div class="col-md-12" style="padding:5px;text-align:center;color:red;display:none;" id="noMoremembersFound">No more members found...!</div>		  
                <!-- /SECTION TILES -->
      </div>
    </div>
	
	
	<div class="overlay" id="editStatusInGroupsInner">
      <div class="modal1" style=" width: 30%;height:25%;padding: 1%;box-shadow: 0px 4px 15px 2px rgba(19, 21, 24, 0.4);">
	<div class="simp-cls" style="position:absolute;top:0">  <a href="#!"  onclick="$('.overlay#editStatusInGroupsInner').trigger('hide');return false;" >x</a></div>
         
                       <h3 class="block-title" style="margin-top: 15px;margin-left: 9px;"><?= $lang['edit_status'];?></h3>
                           
						   <form id="contactme" class="form-dark" name="cform" method="post" action="">
                               
								<div class="row-fluid"  >
                                     <textarea class="span12" name="editPostContent" id="editPostContent"></textarea>
                                </div>
                            
                                <div class="row-fluid">
								    
                                   
								   <button onclick="$('.overlay#editStatusInGroupsInner').trigger('hide');return false;" id="CloseMeatEDIT" class="btn btn-danger submt-btn"><?= $lang['close'];?></button>
								   
								   <button type="submit" id="editSavePost" class="btn btn-success submt-btn"><?= $lang['update'];?></button>
									 <input type="hidden" id="editPostId" value="" />
                                </div>
                            </form>
                       
                    </div>
                </div>
                <!-- /SECTION TILES -->    
	<div class="overlay" id="editStatusWithPhoto">
      <div class="modal1" style="width: 28%;height:55%;padding: 1%;box-shadow: 0px 4px 15px 2px rgba(19, 21, 24, 0.4);">
	<div class="simp-cls" style="position:absolute;top:0">  <a href="#!"  onclick="$('.overlay#editStatusWithPhoto').trigger('hide');return false;" >x</a></div>
         
					 <h3 class="block-title" style="margin-top: -7px;margin-left: 9px;margin-bottom: 19px;">Edit Status with Photo</h3>
                           <form method="post" class="form-dark" action="<?php echo base_url().'groups/updatePostwithImage';?>" enctype="multipart/form-data" id="EditimageUploadwithStaus">
                               
								<div class="row-fluid">
                                    
                                    <textarea class="span12" name="editPhotoContent" id="editPhotoContent"></textarea>
                                </div>
								<div class="row-fluid">
                            <div id="img_container1"></div>
							 <label>Change Image </label>
                             
							 <input type="file" class="form-control" name="editStatusPhoto" id="editStatusPhoto">
			                 <input type="hidden" id="editStatusPhotoId" name="editStatusPhotoId" value="" />
							
							</div>
							
                                <div class="row-fluid">
								    
                                  <div class="row-fluid" style="text-align:center;display:none;" id="loaderIMG11">
                                    
									
									<img style="height:25px;" src="https://wordhub.com/static/img/loading.gif">
									 
									</div>
                                   
								   <button onclick="$('.overlay#editStatusWithPhoto').trigger('hide');return false;" id="cls_edit_updat_img_with_status" class="btn btn-danger submt-btn"><?= $lang['close'];?></button>
								   
								   <input type="submit" value="<?= $lang['update'];?>" class="btn btn-success submt-btn" id="editDataPhotoPostClick" />
									 <input type="hidden" id="editPostId" value="" />
                                </div>
                            </form>
                       
                    </div>
                </div>
                <!-- /SECTION TILES -->
		<div class="overlay" id="editEventSection">
      <div class="modal1" style="width: 30%;height:55%;padding: 1%;box-shadow: 0px 4px 15px 2px rgba(19, 21, 24, 0.4);">
	<div class="simp-cls" style="position:absolute;top:0">  <a href="#!"  onclick="$('.overlay#editEventSection').trigger('hide');return false;" >x</a></div>
         

                <!-- SECTION TITLE -->
               
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
                
					 <h3 class="block-title" style="margin-top: 15px;
margin-left: 9px;">Edit Event</h3>
                            <form id="contactme" class="form-dark" name="cform" method="post" action="">
                               
								 <div class="row-fluid"  style="margin-top:15px;">
                                    <label><?= $lang['event_title'];?> </label>
                                    <input type="text" class="span12" id="eventTitleEdit" name="eventTitleEdit" placeholder="<?= $lang['event_title'];?>">
                                </div>
								
								<div class="row-fluid"  >
                                    <label><?= $lang['location'];?></label>
                                   
									<input type="text" class="span12" id="eventLocationEdit" name="eventLocationEdit" placeholder="<?= $lang['event_location'];?>" /> 
                                </div>
                               
							   <div class="row-fluid"  >
                                    <label><?= $lang['event_date'];?></label>
                                   
									<input type="text" class="span12 eventDate" id="eventDateEdit" name="eventDateEdit" placeholder="<?= $lang['event_date'];?>" /> 
                                </div>
							   <div class="row-fluid"  >
                                    <label><?= $lang['event_description'];?></label>
                                    <textarea class="span12" name="eventDesEdit" id="eventDesEdit" placeholder="<?= $lang['tell_about_event'];?>"></textarea>
                                </div>
                            
                                <div class="row-fluid">
								    
                                   
								   <button onclick="$('.overlay#editEventSection').trigger('hide');return false;" id="closeMeatEventedit" class="btn btn-danger submt-btn"><?= $lang['close'];?></button>
								   
								   <button type="submit" id="eventEditsubmit" class="btn btn-success submt-btn"><?= $lang['update'];?></button>
									  <input type="hidden" id="eventPostId" value="" />
                                </div>
                            </form>
                       
                    </div>
                </div>
                <!-- /SECTION TILES -->


	<div class="overlay" id="forDelete">
      <div class="modal1" style="background:rgba(0,0,0,0.9); width: 14%;height: 20%;padding: 2%;box-shadow: 0px 4px 15px 2px rgba(19, 21, 24, 0.4);">
	<div class="simp-cls" style="position:absolute;top:0">  <a href="#!"  onclick="$('.overlay#forDelete').trigger('hide');return false;" >x</a></div>
         

                
               

                <!-- SECTION TILES -->
              
					<h3 class="block-title" style=""><?= $lang['delete_confirmation'];?></h3>
					<p style="margin:20px"><?= $lang['delete_post'];?></p>
                  
					<div class="row-fluid" id="">
                                    <input type="submit"  value="<?= $lang['yes'];?>" class="btn btn-success btn-delete-ys" id="deleteConfirmBtn" />
									<input onclick="$('.overlay#forDelete').trigger('hide');return false;" type="submit" id="NoDelete"  value="<?= $lang['no'];?>"  class="btn btn-danger btn-delete-ys" /> 
                                </div>
      
      </div>
    </div>
	
	
		<script>
// var url = window.URL || window.webkitURL; // alternate use

function readImage(file,nameElement) {
    var input = $('#'+nameElement);
    var reader = new FileReader();
    var image  = new Image();
  
    reader.readAsDataURL(file);  
    reader.onload = function(_file) {
        image.src    = _file.target.result;              // url.createObjectURL(file);
        image.onload = function() {
            var w = this.width,
                h = this.height,
                t = file.type,                           // ext only: // file.type.split('/')[1],
                n = file.name,
                s = ~~(file.size/1024);
				//alert(s);
				
				if(s > 2048)
				{
				  alert('The file is too large');
				  input.replaceWith(input.val('').clone(true));
				  return false;
				}
		       if(nameElement == 'uploadPhoto')
			   {
                    $( "#img_container" ).empty();
			        $('#img_container').fadeIn(400).append('<img height="100" src="'+ this.src +'">');
			   }
			   else if(nameElement == 'editStatusPhoto')
			   {
			        $( "#img_container1" ).empty();
			        $('#img_container1').fadeIn(400).append('<img height="100" src="'+ this.src +'">');
			   }
        };
           image.onerror= function() {
            alert('Invalid file type: '+ file.type);
         };      
    };
    
}
$("#uploadPhoto").change(function (e) {
    if(this.disabled) return alert('File upload not supported!');
    var F = this.files;
    if(F && F[0]) for(var i=0; i<F.length; i++) readImage( F[i],'uploadPhoto' );
});

$("#editStatusPhoto").change(function (e) {
    if(this.disabled) return alert('File upload not supported!');
    var F = this.files;
    if(F && F[0]) for(var i=0; i<F.length; i++) readImage( F[i],'editStatusPhoto' );
});

</script>
	
	
 <script>
  $(document).ready(function(){
    $("body").hide(0).delay(0).slideDown(600)
    });
 
      $(document).ready(function() {
        $('.overlay').overlay();
      });
    </script>
<script>
$(document).ready(function() {

 $('#cmnt-area').hide();
  $('#up-fle').hide();
   $('#add-pst-vide').hide();
    $('#event-frmm').hide();

  $('#cmnt-boxx').css('cursor','pointer');
    $('#cmnt-boxx').click(function() {
        $('#cmnt-area').slideToggle();
    });
	
    $('#pst-even-mnu').click(function() {
         $('#add-pst-vide').hide();
		  $('#pst-dsply-blck').hide();
    $('#event-frmm').show();
    });
	 $('#pst-dsply-mnu').click(function() {
         $('#add-pst-vide').hide();
		  $('#pst-dsply-blck').show();
    $('#event-frmm').hide();
    });
	 $('#pst-img-mnu').click(function() {
         $('#add-pst-vide').show();
		  $('#pst-dsply-blck').hide();
    $('#event-frmm').hide();
    });
	
	
	 $('#write-something-cmnt').click(function() {
       
		$('#up-fle').show();
		
    });
	

	
});
</script>
<script>
$(document).ready(function() {
  $("a.fancybox").fancybox()
});
</script>
	     <?php include_once('assets/group_rakesh/js/groups.php');?>
		 <script src="<?php echo base_url('assets/group_rakesh/js/jquery-ui.js');?>"></script>
		 <script src="<?php echo base_url('assets/group_rakesh/js/script.js');?>"></script>
		 
		 
		 
		 <!--  ALL DUMMY BLOCKS FOR NEW DATA CREATION -->
		                       
							<!--  ############ STATUS  ###########  -->
		  
						<div id="new_hidden" class="hide"> 
                     
						<div class="pst-cntnts new_post" style="height:100%;background-color: #0c231d; margin-bottom: 22px;" id="">
							<div class="group_text" style="background-color:#0f372f; height: 72px;margin-top:10px;">
							<div class="img-cntnr thumbnail" style="margin-top: 10px;">
							
								<img src="<?php echo base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'];?>" class="img-circle" alt="User Profile" width="50" height="50">
						</div>
							<div class="usr-pfle-nme">
							<div class="pst-nmes-clss" style="margin-top: 7px;">
								<h3 style="font-size: 15px !important;">
								<?php echo $this->session->userdata['profile_data'][0]['perdataFirstName']." ".$this->session->userdata['profile_data'][0]['perdataLastName'];?>
								</h3>
								<p><?= $lang['few_seconds_ago'];?></p>
							</div>
						
										
							<div class="userActions pst-editdel-clss" id="">
								<a data-overlay-trigger="editStatusInGroupsInner" class="editData" href="#"><span class="icn-spce-grp"><i class="fa fa-pencil-square-o" style="color:#fff"></i></span></a>
								
								<a href="#" class="Del_post" data-overlay-trigger="forDelete"><span class="icn-spce-grp"><i class="fa fa-trash-o" style="color:#fff"></i></span></a>
							
</div>
														</div>
														</div>
														
													
                               			     <div class="col-md-11">
			  <p class="postContent" style="clear: both;">Hello world </p>
		</div>
						   <div class="row" style="margin:0 auto">
								 
                           		<div class="col-md-12 " style="background: rgba(8, 28, 26, 0.92) none repeat scroll 0% 0%;margin: 0px auto;margin-bottom:2%">
									<div class="lke-cmnt" style="margin-left: 38%;padding: 8px;margin-bottom: 0px;">
								
								
							 (<span class="user_likes" >
            0 </span>)
              <span class="user_liked" >  <span class="small like" style="padding:3px;border-radius:3px;" ><span class="small fa fa-thumbs-o-up"> <?= $lang['like'];?></span> </span></span>
          
  (<span class="recent_comment_count" >0</span>)
              
	<span class="pst-cmntss cmnt-boxx" style="cursor: pointer;"><i class="fa fa-comment" style="padding-right:5px;"></i><?= $lang['comment'];?></span>
						  </div>
						  </div>
						  </div>
						  <div class="com" id="comments3" style="margin-top: 0px;">
						  <div class="coment_display">
	
						    <div class="recent_comment">
                    
          </div>
            
          
        </div>
        <!---------------Rohitdutta--------------------DUMMY BLOCKS POST---------------------------------------------------------------->

	
         <input type="hidden" class="get_post_id" value="">

         <input type="hidden"  id="display_total_recent_comments" value="0">
         
         <a href="javascript:void(0)" id="new_view_comments_dummy_post" class="d_p"  style="color: #359587; font-weight: bold; display:none"><?= $lang['view_more_comments'];?></a>


         <!---------------Rohitdutta--------------------DUMMY BLOCKS POST--------------------------------------------------------------------->
						  
						  <div class="cmnt-area"  style="display:none;">
						  
						  <textarea class="user_comment" placeholder="<?= $lang['comment_here'];?>" style="width:95%; background:transparent"></textarea>
              <button class="btn btn-danger pull-right comment" style="background-color: rgb(45, 106, 88);margin-bottom: 3%;width: 100px;height: 38px;margin-top:4%;"><?= $lang['submit'];?></button>
						  </div>
						  
						  
	
	</div>
	
	
						 
</div>
		 
		 
	</div>	 
		 
		<!--  ############ STATUS ENDED HERE  ###########  --> 
		 
		 <!--  ############ EVENT ###########  -->
		 
		 	<div id="new_event_hidden" class="hide"> 
		 <div class="pst-cntnts new_event" style="height:100%;  background-color: #0c231d;" id="">
							<div class="group_text" style="background-color:#0f372f; height: 72px;margin-top:10px;">
							<div class="img-cntnr thumbnail" style="margin-top: 10px;">
							
								<img src="<?php echo base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'];?>" class="img-circle" alt="User Profile" width="50" height="50">
						</div>
							<div class="usr-pfle-nme">
							<div class="pst-nmes-clss" style="margin-top: 7px;">
								<h3 style="font-size: 15px !important;">
								<?php echo $this->session->userdata['profile_data'][0]['perdataFirstName']." ".$this->session->userdata['profile_data'][0]['perdataLastName'];?>
								</h3>
								<p><?= $lang['few_seconds_ago'];?></p>
							</div>
						
										
							<div class="userActions pst-editdel-clss" id="">
							
														
							
								<a data-overlay-trigger="editEventSection" class="editDataEvent" href="#"><span class="icn-spce-grp"><i class="fa fa-pencil-square-o" style="color:#fff"></i></span></a>
								
								<a href="#" class="Del_post" data-overlay-trigger="forDelete"><span class="icn-spce-grp"><i class="fa fa-trash-o" style="color:#fff"></i></span></a>
							
</div>
														
							
							
							
														</div>
														</div>
														
													
                               				                <div class="col-md-12 imageBackgrounds" style="background-image:url(http://satish.mahajyothis.net.local/uploads/events/6.jpg);color:#fff;padding:10px;padding-bottom:30px;text-align:center;">
		                              
    							  <h2 class="PostedEventtitle"></h2>
			                      <p class="PostedEventContent" style="padding:4px"></p>
		                          <h3 class="PostedEventDate"></h3>
		                          <h4 class="PostedEventLocation" style="font-size:14px"></h4>
			                     </div>
		  						  
                           													
														
					 									
														
						   <div class="row" style="margin:0 auto">
								 
                           		<div class="col-md-12 " style="background: rgba(8, 28, 26, 0.92) none repeat scroll 0% 0%;margin: 0px auto;">
									<div class="lke-cmnt" style="margin-left: 38%;padding: 8px;margin-bottom: 0px;">
								
								
							  (<span class="user_likes" >
            0 </span>)
              <span class="user_liked" >  <span class="small like" style="padding:3px;border-radius:3px;" ><span class="small fa fa-thumbs-o-up"> <?= $lang['like'];?></span> </span></span>
          
  (<span class="recent_comment_count" >0</span>)
              
	<span class="pst-cmntss cmnt-boxx" style="cursor: pointer;"><i class="fa fa-comment" style="padding-right:5px;"></i><?= $lang['comment'];?></span>
						  </div>
						  </div>
						  </div>
						  <div class="com" id="comments3" style="margin-top: -32px;">
						  <div class="coment_display">
	
						    <div class="recent_comment">
                    
          </div>
            <!---------------Rohitdutta--------------------DUMMY BLOCKS EVENT---------------------------------------------------------------->
		

               <input type="hidden" class="get_post_id" value="">

                <input type="hidden"  id="display_total_recent_comments" value="0">
		
                
		<a href="javascript:void(0)" id="new_view_comments_dummy_post" class="d_p"  style="color: #359587; font-weight: bold; display:none"><?= $lang['view_more_comments'];?></a>

            <!---------------Rohitdutta--------------------DUMMY BLOCKS EVENT--------------------------------------------------------------------->
          
        </div>
						  
						  <div class="cmnt-area"  style="display:none;">
						  
						  <textarea class="user_comment" placeholder="<?= $lang['comment_here'];?>" style="width:95%; background:transparent"></textarea>
              <button class="btn btn-danger pull-right comment" style="background-color: rgb(45, 106, 88);margin-bottom: 3%;width: 100px;height: 38px;margin-top:4%;"><?= $lang['submit'];?></button>
						  </div>
						  
						  
	
	</div>
	
				 
		 	 
						 
</div>
	</div>	 
		 
	 <!--  ############ EVENT ENDED HERE ###########  -->	 
		 
		 
		  <!--  ############ POST WITH IMAGE DUMMY ###########  -->	 
<div id="new_img_status_hidden" class="hide"> 
<div class="pst-cntnts new_status_with_img" style="height:100%;  background-color: #0c231d;" id="">
<div class="group_text" style="background-color:#0f372f; height: 72px;margin-top:10px;">
					<div class="img-cntnr thumbnail" style="margin-top: 10px;">
						<img src="<?php echo base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'];?>" class="img-circle" alt="User Profile" width="50" height="50">
					</div>
                    <div class="usr-pfle-nme">
							<div class="pst-nmes-clss" style="margin-top: 7px;">
									<h3 style="font-size: 15px !important;">
					<?php echo $this->session->userdata['profile_data'][0]['perdataFirstName']." ".$this->session->userdata['profile_data'][0]['perdataLastName'];?>
									</h3>
									<p>Few seconds ago</p>
								
							</div>
								
							<div class="userActions" id="">
							
								<a data-overlay-trigger="editStatusWithPhoto" class="editDataPhotoPost" href="#!"><span class="icn-spce-grp"><i class="fa fa-pencil-square-o" style="color:#fff"></i></span></a>
										
								<a href="#" class="Del_post" data-overlay-trigger="forDelete"><span class="icn-spce-grp"><i class="fa fa-trash-o" style="color:#fff"></i></span></a>
							
							</div>
					</div>
					</div>
						<p style="padding: 10px;clear: both;" class="postContent"></p>
		                
						<div class="pstdd-img thumbnail" style="border: none;
padding: 0.111%;overflow: hidden;max-height: 305px;padding:0 3% 0 3%;">
			<a href="#facyme_45" class="fancybox">
			
			<img src="http://satish.mahajyothis.net.local/uploads/groups/fancy_show/tags7.jpg" class="img-responsive" style="width: 100%;">
			
			</a>
		</div>
		
		                   <div id="facyme_45" style="display: none;" class="showMeUPIMG">
                                     <img src="http://satish.mahajyothis.net.local/uploads/groups/fancy_show/tags7.jpg">
                            </div>
		
					  		
							
						   <div class="row" style="margin:0 auto">
								 
                           		<div class="col-md-12 " style="background: rgba(8, 28, 26, 0.92) none repeat scroll 0% 0%;margin: 0px auto;">
									<div class="lke-cmnt" style="margin-left: 38%;padding: 8px;margin-bottom: 0px;">
								
								
							  (<span class="user_likes" >
            0 </span>)
           <span class="user_liked" >  <span class="small like" style="padding:3px;border-radius:3px;" ><span class="small fa fa-thumbs-o-up"> <?= $lang['like'];?></span> </span></span>
          
  (<span class="recent_comment_count" >0</span>)
              
	<span class="pst-cmntss cmnt-boxx" style="cursor: pointer;"><i class="fa fa-comment" style="padding-right:5px;"></i><?= $lang['comment'];?></span>
						  </div>
						  </div>
						  </div>
						  <div class="com" id="comments3" style="margin-top: -32px;">
						  <div class="coment_display">
	
						    <div class="recent_comment">
                    
          </div>
          
<!---------------Rohitdutta--------------------DUMMY BLOCKS IMAGE ---------------------------------------------------------------->


                              <input type="hidden" class="get_post_id" value="">

                              <input type="hidden"  id="display_total_recent_comments" value="0">

		<a href="javascript:void(0)" id="new_view_comments_dummy_post" class="d_p"  style="color: #359587; font-weight: bold; display:none"><?= $lang['view_more_comments'];?></a>
                              


<!---------------Rohitdutta--------------------DUMMY BLOCKS IMAGE--------------------------------------------------------------------->       
        </div>
						  
						  <div class="cmnt-area"  style="display:none;">
						  
						  <textarea class="user_comment" placeholder="<?= $lang['comment_here'];?>" style="width:95%; background:transparent"></textarea>
              <button class="btn btn-danger pull-right comment" style="background-color: rgb(45, 106, 88);margin-bottom: 3%;width: 100px;height: 38px;margin-top:4%;"><?= $lang['submit'];?></button>
						  </div>
						  
						  
						  
	
	</div>
				 
</div>
</div>	

<!-- ----------------Rohitdutta------delete comment----------->
<div class="modal hide" id="myModal1">
  <div class="modal-header">
    
   
  </div>
  <div class="modal-body">
      <textarea id="textareaID"></textarea>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal"><?= $lang['close'];?></a>
    <a href="#" class="btn btn-primary"><?= $lang['save'];?></a>
  </div>
</div><!----------------------- This Modal is for delete single comment----------------------------------------------->
<div class="modal fade" id="deleteComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">
            </div>
            <div class="modal-body" style="color: red"><h2>
                    <?= $lang['delete_comment'];?>
                </h2></div>
            <div class="modal-footer">

                <a href="javascript:void(0)" class="ForDeleteComment" style="text-decoration: none;" id="" data-postid="">
                    <button type="button" class="btn btn-danger btn-sm" id="del" data-dismiss="modal"><?= $lang['confirm'];?></button>
                </a>
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal"><?= $lang['cancel'];?></button>
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
                <h4 class="modal-title" id="exampleModalLabel" ><h2 style="color: red"><?= $lang['edit_comment'];?> </h2>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="edit_s_c">
                    <input type="text" required class="form-control ForEditComment" name="edit_single_comment" id="edit_single_comment" value="">
                </form>
            </div>
            <div class="modal-footer">

                <a href="javascript:void(0)" class="for_comment_id" style="text-decoration: none;" id="">

                    <button type="button" class="btn btn-danger btn-sm" id="editCommentBtn"><?= $lang['submit'];?></button>
                </a>
                <button type="button" class="btn btn-success btn-sm" id="cancelAtEditComment" data-dismiss="modal"><?= $lang['cancel'];?></button>
            </div>
        </div>
    </div>
</div>
<!-- ----------------------------------------------->	 
<?php include_once(JS.'groups/script.php'); ?>
<?php include_once(JS.'unlike/group_unlike.php'); ?>
    </body>
</html>