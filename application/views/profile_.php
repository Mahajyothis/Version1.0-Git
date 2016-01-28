<?php 
$theme = $this->session->userdata('theme');
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Mahajyothis viewprofile</title>

    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style_one.css'); ?>" />


  <link rel="stylesheet" href="../assets/css/overlay.css">
    <!-- Scripts are at the bottom of the page -->
 <style>
 .lsc-count {
    background: rgba(0,0,0,0.8);
    z-index: 999999;
    position: absolute;
    width: 100%;
    bottom: 0;
       height: 54px;
}
.lsc-count-in{    padding-left:63px;
    padding-right: 11px;
    padding-top: 17px;}
 .icon
 {
 margin-top:2%;
 }
 .updte-clmn{
  background-color: <?php echo $theme[0]['bgColor'].'!important';  ?>;
  opacity: <?php echo $theme[0]['opacity'].'!important';  ?>;
 }
 .imagetile-scaleup{
  background: <?php echo $theme[0]['bgColor'].'!important';  ?>;
  opacity: <?php echo $theme[0]['opacity'].'!important';  ?>;
 }
  .mCSB_scrollTools{
  background: <?php echo $theme[0]['bgColor'].'!important';  ?>;
  opacity: <?php echo $theme[0]['opacity'].'!important';  ?>;
 }
 .settings-header{
 	 background: <?php echo $theme[0]['bgColor'].'!important';  ?>;
  	opacity: 8.5;
 }
 .save_button{
 	background: <?php echo $theme[0]['bgColor'].'!important';  ?>;
 }
 .selected_themes{
 	display:none;
 }
 
 </style>
<script>
        setInterval(function () { display_c();
follow();		}, 99000);
        function display_c()
            {

   var cid=$("#cid").val();
	
            	$.ajax({
          url: "<?php echo base_url();?>login/recentactivityonload?cid="+cid
        }).done(function( data ) {
       
		   $(".refresh2").html(data);
		  return true;
        }); 
		
		
            }
			function follow(){
				var cid=$("#cid").val();
				
				$.ajax({
          url: "<?php echo base_url();?>login/followlive?cid="+cid
        }).done(function( data ) {
     
		   $(".followlive").html(data);
		  return true;
        }); 

				
			}
    </script>
</head>
<?php
$user_row = $this->session->userdata('profile_data');

?>

<body onload="display_c()">

 <div class="loader"><img src="<?php echo base_url('assets/img/loader.gif'); ?>"></div>       
    
<input type="hidden" value="<?php echo $user_row['0']['custID'];  ?>" id="cid">

    <!-- BACKGROUND -->
     <img src="<?php echo base_url('assets/theme/'.$theme[0]['mainBgImage'].''); ?>" class="background" alt="view_backgroundimage" />
    <!-- /BACKGROUND -->

    <!-- LOGO -->
    <div class="header">
        <h1>
            <img src="<?php echo base_url('assets/img/logo.png');?>" height="70" width="88" class="header-logo" alt=""/>
            MAHAJYOTHIS
        </h1>
    </div>
    <!-- /LOGO -->

    <!-- MAIN CONTENT SECTION -->
    <section id="content">


        <section class="clearfix section" id="about">

            <!-- SECTION TITLE -->
            <h3 class="block-title">
           
            </h3>
            
            <!-- /SECTION TITLE -->

            <!-- SECTION TILES -->
            <div class="tile imagetile imagetile-scaleup w2 h2" style="margin-left:40px;">
					<div class="lsc-count">
									   <div class="lsc-count-in">
										  <font id='add_like' color='#EF580D'>(<?php echo $totallikes[0]['totallikes']; ?>)</font> <span class="txt1-lft-pad">Likes</span>
											  <span id='add_like'  style="color:#EF580D">(<?php  echo $totalcircles[0]['totalcircles'];   ?>)</span><span class="txt1-lft-pad">Circles</span>
											   <span id='add_circle'  style="color:#EF580D">(<?php  echo ($totalviews[0]['totalviews']/2);   ?>)</span><span class="txt1-lft-pad">Views</span>
									   </div>
								   </div>
                <a class="link" href="#">

	 <img src='<?php if(isset($user_row[0]['photo'])){echo base_url('uploads').'/'.$user_row[0]['photo'];}else{echo base_url('uploads').'/profile.png';} ?>' />


</a>



</div>

<div class="tile imagetile imagetile-scaleup w2 h2" style="margin-left:40px;">
	<div class="content" style="margin-left:7%;margin-top:2%;">
            <div class="pull-right">
                <a class="icon-pencil icon-3x"></a>
            </div>
            <h3><?php echo $user_row[0]['perdataFirstName'] ."&nbsp;"  .$user_row[0]['perdataLastName']; ?></h3>
            <h4 class="muted"><?php echo $user_row[0]['profProfession'];  ?></h4>
            <br/>

            <div class="row-fluid">
                <div class="span12">
                    <address>
                        <strong><?php echo $login =$user_row[0]['addrDistrict'];  ?>,</strong><br>
                        <?php echo $login =$user_row[0]['addrState'];  ?>, <br>
                        <?php echo $login =$user_row[0]['addrCountry']." ,".$login =$user_row[0]['addrPostCode'];  ?> <br><br/>
                        <abbr title="Birth">DOB:</abbr> <?php  echo $login =$user_row[0]['perdataDOB'];   ?><br/>
                        <a href="mailto:<?php  echo $login =$user_row[0]['emailID'];   ?>"><?php  echo $login =$user_row[0]['emailID'];   ?></a>
                    </address>
                </div>
            </div>

            <p>
                <?php  echo $login =$user_row[0]['perdataAboutMe'];   ?>
            </p>



            <br/>

            <blockquote>

            </blockquote>

            <br/>

            <p>
               <?php  echo $login =$user_row[0]['profDesignation'];   ?>
           </p>


           <br/><br/>

           <ul class="inline">
            <li class="transparent-hover"><a class="icon-facebook icon-2x" href="#"></a></li>
            <li class="transparent-hover"><a class="icon-twitter icon-2x" href="#"></a></li>
            <li class="transparent-hover"><a class="icon-pinterest icon-2x" href="#"></a></li>
            <li class="transparent-hover"><a class="icon-rss icon-2x" href="#"></a></li>
        </ul>
    </div>			
            


</div>

<!--<div class="tile black htmltile w3 h4" style="border: 0px; position: absolute; left: 0px; top: 0px; transform: translate3d(136px, 24px, 0px); background:rgba(12, 12, 12, 0.3) !important;box-shadow: 0px;margin-top: 8px;margin-right: 8px;margin-bottom: 8px;margin-left: 8px;" >
    <div class="tilecontent">
        <div class="content">
            <div class="pull-right">
                <a class="icon-pencil icon-3x"></a>
            </div>
            <h3><?php echo $user_row[0]['perdataFirstName'] ."&nbsp;"  .$user_row[0]['perdataLastName']; ?></h3>
            <h4 class="muted"><?php echo $user_row[0]['profProfession'];  ?></h4>
            <br/>

            <div class="row-fluid">
                <div class="span12">
                    <address>
                        <strong><?php echo $login =$user_row[0]['addrDistrict'];  ?>,</strong><br>
                        <?php echo $login =$user_row[0]['addrState'];  ?>, <br>
                        <?php echo $login =$user_row[0]['addrCountry']." ,".$login =$user_row[0]['addrPostCode'];  ?> <br><br/>
                        <abbr title="Birth">DOB:</abbr> <?php  echo $login =$user_row[0]['perdataDOB'];   ?><br/>
                        <a href="mailto:<?php  echo $login =$user_row[0]['emailID'];   ?>"><?php  echo $login =$user_row[0]['emailID'];   ?></a>
                    </address>
                </div>
            </div>

            <p>
                <?php  echo $login =$user_row[0]['perdataAboutMe'];   ?>
            </p>



            <br/>

            <blockquote>

            </blockquote>

            <br/>

            <p>
               <?php  echo $login =$user_row[0]['profDesignation'];   ?>
           </p>


           <br/><br/>

           <ul class="inline">
            <li class="transparent-hover"><a class="icon-facebook icon-2x" href="#"></a></li>
            <li class="transparent-hover"><a class="icon-twitter icon-2x" href="#"></a></li>
            <li class="transparent-hover"><a class="icon-pinterest icon-2x" href="#"></a></li>
            <li class="transparent-hover"><a class="icon-rss icon-2x" href="#"></a></li>
        </ul>
    </div>
</div>
</div>-->
<!-- /SECTION TILES -->

</section>
<!-- /SECTION -->

<!-- SECTION -->
<section class="clearfix section" id="portfolio" data-option-key="filter">

    <!-- SECTION TITLE -->
    <h3 class="block-title"></h3>
    <!-- /SECTION TITLE -->

    <!-- SECTION TILES -->
    <div class="tile turquoise icon-featurefade w1 h1">
        <a class="link" href="<?php echo base_url();?>forum" data-option-value="*">
            <!--<i class="fa fa-list fasize"></i>-->
           <center><img src="http://version.mahajyothis.net/assets/img/form.png" width="60" height="60" style="margin-top:16%;"></center>
            <p class="title">Forum</p>
        </a>
    </div>

    <div class="tile yellow icon-featurefade w1 h1">
        <a class="link" href="<?php echo base_url();?>post/index" data-option-value=".photography">
            <!--<i class="fa fa-camera fasize"></i>-->
            <center><img src="http://version.mahajyothis.net/assets/img/post.png" width="60" height="60" style="margin-top:16%;"></center>
            <p class="title">Post</p>
        </a>
    </div>

    <div class="tile blue icon-featurefade w1 h1">
         <a class="link" href="<?php echo base_url();?>groups" data-option-value=".articles">
            <!---<i class="fa fa-laptop fasize"></i>-->
            <center><img src="http://version.mahajyothis.net/assets/img/group.png" width="60" height="60" style="margin-top:16%;"></center>
            <p class="title">Groups</p>
        </a>
    </div>

    <div class="tile purple icon-featurefade w1 h1">
	
        <a class="link" href="<?php echo base_url();?>networks" data-option-value=".articles">
            <!--<i class="fa fa-users fasize"></i>-->
            <center><img src="http://version.mahajyothis.net/assets/img/network.png" width="60" height="60" style="margin-top:16%;"></center>
            <p class="title">Networks</p>
        </a>
    </div>
	
	<div class="tile orange icon-featurefade w1 h1">
	
        <a class="link" href="<?php echo base_url();?>events" data-option-value=".articles">
            <!--<i class="fa fa-calendar-times-o fasize"></i>-->
            <center><img src="http://version.mahajyothis.net/assets/img/event.png" width="60" height="60" style="margin-top:16%;"></center>
            <p class="title">Events</p>
        </a>
    </div>
	<div class="tile green icon-featurefade w1 h1">
	
        <a class="link" href="<?php echo base_url();?>article" data-option-value=".articles">
            <!--<i class="fa fa-pencil-square-o fasize"></i>-->
            <center><img src="http://version.mahajyothis.net/assets/img/article.png" width="60" height="60" style="margin-top:16%;"></center>
            <p class="title">Articles</p>
        </a>
    </div>
    <div class="tile red icon-featurefade w1 h1">

        <a class="link" href="<?php echo base_url();?>discussions" data-option-value=".articles">
           <!-- <i class="fa fa-pencil-square-o fasize"></i>-->
           <center><img src="http://version.mahajyothis.net/assets/img/discussion.png" width="60" height="60" style="margin-top:16%;"></center>
            <p class="title">Discussions</p>
        </a>
    </div>
     <div class="tile blue1 icon-featurefade w1 h1">
        <a class="link" target="_self" href="<?php echo base_url(); ?>blog" data-option-value=".articles">
           <!-- <i class="icon-rss icon-4x"></i>-->
           <center><img src="http://version.mahajyothis.net/assets/img/blog.png" width="60" height="60" style="margin-top:16%;"></center>
            <p class="title">Blogs</p>
        </a>
    </div>


               
                </section>
   <section class="clearfix section" >
   <h3 class="block-title block-recent-updates">Recent Updates</h3>
    <div class="tile black htmltile w3 h4" style="background:transparent;border:none;">
			 
                <div class="tilecontent" style="margin-top: 23px">

 
                    <div class="content">
							<div class="pull-right">
                                <a class="icon-calendar icon-3x"></a>
                            </div>
						
                            
						<div class="block-hdnews">

							  <div class="list-wrpaaer" style="height:5000px">
								 <ul class="list-aggregate refresh" id="marquee-vertical" style="width:500px">
								  
				<?php 
				
				if($recent_query->num_rows() >= 1){
				   foreach ($recent_query->result() as $recent_row)
   {
	   ?>
								  <li class="updte-clmn">


								  <a onclick="recent<?php echo $recent_row->raID;   ?>()" data-overlay-trigger="one<?php echo $recent_row->raID;   ?>" href="#!">

									 <div id="first0"><span><img src="../uploads/<?php if(ISSET($recent_row->photo)){ echo $recent_row->photo; } else{ echo "profile.png"; } ?>" alt="User Profile" style="width: 10%;height:35px;float: left;margin-right: 16px;"/></span>
								<h4 id="recents"><?php  echo "You ".$recent_row->raMessage ."&nbsp". $recent_row->custName."'s ".$recent_row->raCategory;  ?></h4>
							</div></a>
							
												
								   </li>
							 
								   
								   
								   
				<?php   }}else{ ?>
								   
					You have No Recent Activity.			   
				<?php  } ?>

								 </ul>
							  </div><!-- list-wrpaaer -->

						</div> <!-- block-hdnews -->

						</div>
                    </div>
                </div>
            </div>
		
           <?php foreach ($recent_query->result() as $recent_row)
   {  ?>
			 <div class="overlay" id="one<?php echo $recent_row->raID;   ?>" >
      <div class="modal1">
	<div class="simp-cls"  data-overlay-trigger="one" onclick="$('#one<?php echo $recent_row->raID;   ?>').trigger('hide');return false;"> <a href="#!"   >x</a> </div>
	<div id="aaa<?php echo $recent_row->raID;   ?>" style="height:100%;"></div>
	<script>
	function recent<?php echo $recent_row->raID; ?>(){
		document.getElementById("aaa<?php echo $recent_row->raID;   ?>").innerHTML ="<iframe src='<?php echo base_url().$recent_row->raPage; ?>?pid=<?php echo $recent_row->catID;   ?>&cat=<?php echo $recent_row->raCategory;   ?>&act=<?php echo $recent_row->raAction;   ?>&uid=<?php echo $recent_row->uID;   ?>&rid=<?php echo $recent_row->raID;   ?>&r=e' width='100%' height='100%' style='border: none;'></iframe>";
	}
     </script>
      </div>
    </div>	   
   <?php } ?>
 
            </section>
            <!-- /SECTION -->
			
			
			

            <!-- SECTION -->
            <section class="clearfix section" id="gallery">
                
                
                <!-- SECTION TILES -->
                


                <!-- /SECTION TILES -->

            </section> 
            <!-- /SECTION -->

          
            <!-- SECTION -->
            <section class="clearfix section" id="gallery">
                
                
                <!-- SECTION TILES -->
                


                <!-- /SECTION TILES -->

            </section> 
            <!-- /SECTION -->

             <!-- SECTION -->
           <section class="clearfix section" id="articles">

                <!-- SECTION TITLE -->
                <h3 class="block-title">Notifications</h3>
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
              <div class="tile white title-scaleup imagetile w2 h1" >
                    <div class="card effect__random" data-id="1">
						<div class="card__front first">
								<div class="link_sam" href="#" data-option-value="*">
									<i class="fa fa-user-plus fasize"></i>
									<p class="title">Follow</p>
								</div>
							
						</div>
						<div class="card__back first">
							<span class="card__text followlive">
						<?php	if($follow_notification->num_rows() >= 1){
								$follo_notification=$follow_notification->result_array();
								
							?>
							<a onclick="recentfollow<?php echo $follo_notification['0']['custID']; ?>()" data-overlay-trigger="two<?php echo $follo_notification['0']['custID'];   ?>" href="#!">
								<div class="col-md-12 odd back_follow" id="first0"><span><img src="../uploads/<?php if(ISSET($follo_notification['0']['photo'])){ echo $follo_notification['0']['photo']; } else{ echo "profile.png"; } ?>" alt="User Profile" style="width: 18%;float: left;"/></span>
								<h4 id="recents"><?php echo $follo_notification['0']['custName'];   ?> Follows You</h4>
							</div></a>
								<div class="icon_section">
									<a class="fa fa-user-plus"></a>							
								</div>
					<?php }else{  ?>
								
								You Have No Follow Notifications Recently.
																
								<?php   }?>
							</span>
						</div>
			<!-- /card -->
				</div>
                </div>
				<?php	if($follow_notification->num_rows() >= 1){
								$follo_notification=$follow_notification->result_array();
								
							?>
				
				 <div class="overlay" id="two<?php echo $follo_notification['0']['custID']; ?>" >
      <div class="modal1">
	<div class="simp-cls"  data-overlay-trigger="two" onclick="$('#two<?php echo $follo_notification['0']['custID'];   ?>').trigger('hide');return false;"> <a href="#!"   >x</a> </div>
	
	<div id="aaafollow<?php echo $follo_notification['0']['custID'];   ?>" style="height:100%;"></div>
	<script>
	function recentfollow<?php echo $follo_notification['0']['custID']; ?>(){
		document.getElementById("aaafollow<?php echo $follo_notification['0']['custID']; ?>").innerHTML ="<iframe src='<?php echo base_url(); ?>basicprofile?uid=<?php echo $follo_notification['0']['custID'];   ?>&f=n' width='100%' height='100%' style='border: none;'></iframe>";
	}
     </script>
	
      </div>
    </div>	   
	
				<?php  }  ?>
				
				
               <div class="tile red title-scaleup imagetile w2 h1">
                    <div class="card effect__random" data-id="2">
						<div class="card__front second">
							<div class="link_sam">
									<i class="fa fa-thumbs-o-up fasize"></i>
									<p class="title">Like</p>
							</div>
						</div>
						<div class="card__back second">
							<span class="card__text">
							<?php 
							if($like_notification->num_rows() >= 1){
								$notification=$like_notification->result_array();
								
							?>
							<a onclick="recentlike<?php echo $notification['0']['raID']; ?>()" data-overlay-trigger="three<?php echo $notification['0']['raCategory'];   ?><?php echo $notification['0']['raAction'];   ?><?php echo $notification['0']['raID'];   ?>" href="#!">
								
							
								<div class="col-md-12 even back_like" id="first0">
									<div style="margin-top:20px"><span>
										<img src="../uploads/<?php if(ISSET($notification['0']['photo'])){ echo $notification['0']['photo']; } else{ echo "profile.png"; } ?>" alt="User Profile" style="width: 18%;float: left;"/>
									</span>
									<h4 id="recents"><?php echo $notification['0']['custName']."&nbsp".$notification['0']['raMessage']." Your ".$notification['0']['raCategory'];   ?></h4>
								</div></div></a>
								<div class="icon_section">
									<a class="fa fa-thumbs-o-up" id="ic1" style="transition: all 0.5s ease;"></a>							
								</div>
								
								<?php }else{  ?>
								
								You Have No like Notifications Recently.
																
								<?php   }?>
							</span>
						</div>
					</div><!-- /card -->
                </div>
				<?php   if($like_notification->num_rows() >= 1){ ?>
				<div class="overlay" id="three<?php echo $notification['0']['raCategory'];   ?><?php echo $notification['0']['raAction'];   ?><?php echo $notification['0']['raID'];   ?>" >
      <div class="modal1">
	<div class="simp-cls"  data-overlay-trigger="three" onclick="$('#three<?php echo $notification['0']['raCategory'];   ?><?php echo $notification['0']['raAction'];   ?><?php echo $notification['0']['raID'];   ?>').trigger('hide');return false;"> <a href="#!"   >x</a> </div>
	
	
	<div id="aaalike<?php echo $notification['0']['raID']; ?>" style="height:100%;"></div>
	<script>
	function recentlike<?php echo $notification['0']['raID']; ?>(){
		document.getElementById("aaalike<?php echo $notification['0']['raID']; ?>").innerHTML ="<iframe src='<?php echo base_url().$notification['0']['raPage']; ?>?pid=<?php echo $notification['0']['catID'];   ?>&cat=<?php echo $notification['0']['raCategory'];   ?>&act=<?php echo $notification['0']['raAction'];   ?>&uid=<?php echo $notification['0']['custID'];   ?>&p=n' width='100%' height='100%' style='border: none;'></iframe>";
	}
     </script>
	
      </div>
    </div>	   
				<?php  } ?>
		
                <div class="tile blue title-scaleup imagetile w2 h1">
                    <div class="card effect__random" data-id="3">
						<div class="card__front third">
							<div class="link_sam" href="#" data-option-value="*">
									<i class="fa fa-comments-o fasize"></i>
									<p class="title">Comments</p>
							</div>
						</div>
						<div class="card__back third">
							<span class="card__text">
							<?php 
							if($comment_notification->num_rows() >= 1){
								$comm_notification=$comment_notification->result_array();
								
							?>
							<a onclick="recentcomment<?php echo $comm_notification['0']['raID']; ?>()" data-overlay-trigger="four<?php echo $comm_notification['0']['raCategory'];   ?><?php echo $comm_notification['0']['raAction'];   ?><?php echo $comm_notification['0']['raID'];   ?>" href="#!">
							
							
							
								<div class="col-md-12 odd back_comment" id="first">
									<div style="margin-top:20px"><span>
										<img src="../uploads/<?php if(ISSET($comm_notification['0']['photo'])){ echo $comm_notification['0']['photo']; } else{ echo "profile.png"; } ?>" alt="User Profile" style="width: 18%;float: left;"/>
									</span>
									<h4 id="recents"><?php echo $comm_notification['0']['custName']."&nbsp".$comm_notification['0']['raMessage']." Your ".$comm_notification['0']['raCategory'];   ?></h4>
								</div></div></a>
								<div class="icon_section">
									<a class="fa fa-comments-o" id="ic1"></a>							
								</div>
								
								<?php }else{  ?>
								
								You Have No Comment Notifications Recently.
																
								<?php   }?>
							</span>
						</div>
					</div><!-- /card -->
                </div>
				
				
				<!--comments-->
				<div class="tile blue title-scaleup imagetile w2 h1">
                    <div class="card effect__random" data-id="4">
						<div class="card__front third1">
							<div class="link_sam" href="#" data-option-value="*">
									<i class="fa fa-newspaper-o fasize"></i>
									<p class="title">Invitations</p>
							</div>
						</div>
						<div class="card__back third1">
							<span class="card__text">
							<?php		if($group_detail->num_rows()>=1){
						
						$invitations=$group_detail->result_array(); ?>
							<a  data-overlay-trigger="eight" href="#!">
							
							
							
								<div class="col-md-12 even" id="first">
									<div style="margin-top:20px"><span>
										<img src="/uploads/<?php if(ISSET($invitations[0]['photo'])){echo $invitations[0]['photo'];   }else{ echo "profile.png"; } ?>" alt="User Profile" style="width: 18%;float: left;"/>
									</span>
										<h4 id="recents"><?php echo $invitations[0]['custName']; ?> Invited you to Join New Group</h4>
								</div></div></a>
								<div class="icon_section">
									<a class="fa fa-newspaper-o" id="ic1"></a>							
								</div>
								
								<?php }else{  ?>
								
								You Have No Invitation Notifications Recently.
																
								<?php   }?>
							</span>
						</div>
					</div><!-- /card -->
                </div>
				<div class="overlay" id="eight">
      <div class="modal2">
	<div class="simp-cls">  <a href="#!"  onclick="$('.overlay#eight').trigger('hide');return false;">x</a></div>
	
       <div class="col-md-12 nopad-cls-popup overflw-cls-img">
		
		<img src="/uploads/groups/banners/<?php echo $invitations[0]['grp_cover']; ?>"  width="100%">
		
		<div class="img-ovrly">
			<div class="half-wdth-clss">
				<h3 class="img-overly-txt"><?php echo $invitations[0]['grp_name']; ?></h3>
			</div>
			<div class="half-wdth-clss">
				<h5 class="img-overly-txt1">Members (<span class="grp-cnt-clss">50</span>)</h5>
			</div>
		
		</div>
	   </div>	
				<div class="row" id="join_status">
       <div class="half-wdth-clss">
	   <div class="btnn-pd-clss">
	<?php   if($invitations[0]['gistatus']!=1){   ?>
	<input type="hidden" value="1" id="status">
					<button class="btn btn-success btn-algn-clsss" onclick="joined_details()">Join</button>
	<?php  } ?>

				
				
		</div>
	   </div> 
		
	  
	   <?php   if($invitations[0]['gistatus']!=1){   ?>
	   <div class="half-wdth-clss">
	    <div class="btnn-pd-clss">
		<input type="hidden" value="2" id="decline_status">
			<button class="btn btn-danger btn-algn-clsss" onclick="declined_details()">Decline</button>
		</div>
	   </div>	
      </div></div>
    </div>
				<!--/commentsetc-->
				
				<?php if($comment_notification->num_rows() >= 1){   ?>
			<div class="overlay" id="four<?php echo $comm_notification['0']['raCategory'];   ?><?php echo $comm_notification['0']['raAction'];   ?><?php echo $comm_notification['0']['raID'];   ?>" >
      <div class="modal1">
	<div class="simp-cls"  data-overlay-trigger="four" onclick="$('#four<?php echo $comm_notification['0']['raCategory'];   ?><?php echo $comm_notification['0']['raAction'];   ?><?php echo $comm_notification['0']['raID'];   ?>').trigger('hide');return false;"> <a href="#!"   >x</a> </div>
	
	<div id="aaacomment<?php echo $comm_notification['0']['raID']; ?>" style="height:100%;"></div>
	<script>
	function recentcomment<?php echo $comm_notification['0']['raID']; ?>(){
		document.getElementById("aaacomment<?php echo $comm_notification['0']['raID']; ?>").innerHTML ="<iframe src='<?php echo base_url().$comm_notification['0']['raPage']; ?>?pid=<?php echo $comm_notification['0']['catID'];   ?>&cat=<?php echo $comm_notification['0']['raCategory'];   ?>&act=<?php echo $comm_notification['0']['raAction'];   ?>&uid=<?php echo $comm_notification['0']['custID'];   ?>&p=n' width='100%' height='100%' style='border: none;'></iframe>";
	}
     </script>

      </div>
    </div>	   	
				
				<?php  }  ?>
				
                <div class="tile green title-scaleup imagetile w2 h1">
                    <div class="card effect__random" data-id="5">
						<div class="card__front fourth">
							<div class="link_sam" href="#" data-option-value="*">
									<i class="fa fa-share-square-o fasize"></i>
									<p class="title">Share</p>
							</div>
						</div>
						<div class="card__back fourth">
							<span class="card__text">
							
							
							<?php 
							if($share_notification->num_rows() >= 1){
								$shar_notification=$share_notification->result_array();
								
							?>
							<a onclick="recentshare<?php echo $shar_notification['0']['raID']; ?>()" data-overlay-trigger="five<?php echo $shar_notification['0']['raCategory'];   ?><?php echo $shar_notification['0']['raAction'];   ?><?php echo $shar_notification['0']['raID'];   ?>" href="#!">
							
							
							
							
							
								<div class="col-md-12 odd" id="first">
									<div style="margin-top:20px"><span>
										<img src="../uploads/<?php if(ISSET($shar_notification['0']['photo'])){ echo $shar_notification['0']['photo']; } else{ echo "profile.png"; } ?>" alt="User Profile" style="width: 18%;float: left;"/>
									</span>
									<h4 id="recents"><?php echo $shar_notification['0']['custName']."&nbsp".$shar_notification['0']['raMessage']." Your ".$shar_notification['0']['raCategory'];   ?></h4>
								</div></div></a>
								<div class="icon_section">
									<a class="fa fa-comments-o" id="ic1"></a>							
								</div>
								
								<?php }else{  ?>
								
								You Have No Share Notifications Recently.
																
								<?php   }?>
							</span>
						</div>
					</div><!-- /card -->
                </div>
				
							<?php 
							if($share_notification->num_rows() >= 1){ ?>
				<div class="overlay" id="five<?php echo $shar_notification['0']['raCategory'];   ?><?php echo $shar_notification['0']['raAction'];   ?><?php echo $shar_notification['0']['raID'];   ?>" >
      <div class="modal1">
	<div class="simp-cls"  data-overlay-trigger="five" onclick="$('#five<?php echo $shar_notification['0']['raCategory'];   ?><?php echo $shar_notification['0']['raAction'];   ?><?php echo $shar_notification['0']['raID'];   ?>').trigger('hide');return false;"> <a href="#!"   >x</a> </div>
	
	<div id="aaashare<?php echo $shar_notification['0']['raID']; ?>" style="height:100%;"></div>
	<script>
	function recentshare<?php echo $shar_notification['0']['raID']; ?>(){
		document.getElementById("aaashare<?php echo $shar_notification['0']['raID']; ?>").innerHTML ="<iframe src='<?php echo base_url().$shar_notification['0']['raPage']; ?>?pid=<?php echo $shar_notification['0']['catID'];   ?>&cat=<?php echo $shar_notification['0']['raCategory'];   ?>&act=<?php echo $shar_notification['0']['raAction'];   ?>&uid=<?php echo $shar_notification['0']['custID'];   ?>&p=n' width='100%' height='100%' style='border: none;'></iframe>";
	}
     </script>
	
	
	
      
     
      </div>
    </div>	   	
				
							<?php   }  ?>
				
				
				
		 <div class="tile blue title-scaleup imagetile w2 h1">
                    <div class="card effect__random" data-id="3">
						<div class="card__front third2">
							<div class="link_sam" href="#" data-option-value="*">
									<i class="fa fa-comments-o fasize"></i>
									<p class="title">Blogs</p>
							</div>
						</div>
						<div class="card__back third2">
							<span class="card__text">
							<?php 
							if($recent_blog->num_rows() >= 1){
							
							
							
							
							
							
								foreach($recent_blog->result() as $recent){
								
								
								
								
								
								
								$con=mysqli_connect("localhost","i1377917_jos1","L&tm8PaEjM02((1","i1377917_jos1");
		$sel="SELECT * FROM `jos_easyblog_post` WHERE `created_by`='".$recent->joomlaID."'   AND `is_new`=0 ORDER BY `id` DESC LIMIT 1";
	$blog=mysqli_query($con,$sel);
	$recent_blogs=mysqli_fetch_assoc($blog);
							
						if(mysqli_num_rows($blog)  >= 1){	
								
							?>
							<a href="http://blog.mahajyothis.net/entry/<?php echo $recent_blogs['permalink'];   ?>" onclick="blog_update()" target="_blank">
							
							
							
								<div class="col-md-12 odd back-color" id="first">
									<div style="margin-top:20px"><span>
									<?php	if(!empty($recent_blogs['image'])){
									$obj = json_decode($recent_blogs['image']); 
									echo "<img src='".$obj->{'url'}."' style=   'height: 30px;
    width: 30px;'>";
									} ?>
									</span>
									<h4 id="recents"><?php echo $recent_blogs['title'];   ?></h4>
									
									
									
									
								</div></div></a>
								<div class="icon_section">
									<a class="fa fa-comments-o" id="ic1"></a>							
								</div>
								<script>
								function blog_update(){
var blog_id=<?php echo $recent_blogs['id'];   ?>;
var cid=<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>;
$.ajax({
          url: "<?php echo base_url();?>blog/status_update?blog_id="+blog_id+"&& cid="+cid
        }).done(function( data ) {
		
        }); 
}
								
								</script>
								<?php }}
								}else{  ?>
								
								You Have No Blog Notifications Recently.
																
								<?php   }?>
							</span>
						</div>
					</div><!-- /card -->
                </div>		
				
				
				
				
					
             <div class="tile orange title-scaleup imagetile w2 h1">
                    <div class="card effect__random" data-id="6">
						<div class="card__front fifth">
							<div class="link_sam" href="#" data-option-value="*">
									<i class="fa fa-calendar-times-o fasize" id="ic1"></i>
									<p class="title">Events</p>
							</div>
						</div>
						<div class="card__back fifth">
				<?php		if($event_alert->num_rows()>=1){
						
						$events=$event_alert->result_array(); ?>
							<span class="card__text">
						<a  href="<?php echo base_url().'events/view/'.$this->custom_function->create_ViewUrl($events[0]['id'],$events[0]['name']); ?>">		<div class="col-md-12 odd" id="first">
									<span>
										<img src="/uploads/<?php if(ISSET($events[0]['phot'])){echo $events[0]['photo']; }else{echo "profile.png"; } ?>" alt="User Profile" style="width: 18%;float: left;"/>
									</span>
										<h4 id="recents"><?php echo $events[0]['custName']; ?> Created New Event.</h4>
								</div></a>
								<div class="icon_section">
									<a class="fa fa-calendar-times-o icon-3x" id="ic1"></a>							
								</div>
							</span>
							
				
						</div>
					</div><!-- /card -->
                </div>
			<?php  }else{
					echo "You have no recent Events in your network";
				} ?>
				
				
				
             <!--<div class="tile orange title-scaleup imagetile w2 h1">
                    <div class="card effect__random" data-id="7">
						<div class="card__front fifth">
							<div class="link_sam" href="#" data-option-value="*">
									<i class="fa fa-reply-all fasize" id="ic1"></i>
									<p class="title">Invitations</p>
							</div>
						</div>
						<div class="card__back fifth">
				<?php		if($group_detail->num_rows()>=1){
						
						$invitations=$group_detail->result_array(); ?>
							<span class="card__text">
						<a data-overlay-trigger="eight" href="#!">		<div class="col-md-12 odd" id="first">
									<span>
										<img src="/uploads/<?php echo $invitations[0]['photo']; ?>" alt="User Profile" style="width: 18%;float: left;"/>
									</span>
										<h4 id="recents"><?php echo $invitations[0]['custName']; ?> Invited you to Join New Group</h4>
								</div></a>
								<div class="icon_section">
									<a class="fa fa-reply-all icon-3x" id="ic1"></a>							
								</div>
							</span>
							
				
						</div>
					</div>
                </div>-->
                
				
    
	  
	  
	   <?php }else{  ?>		
				
			<div class="col-md-12" style="text-align:center" id="joined_status"> 
			<button class="btn btn-success btn-algn-clsss" >Joined</button>
		</div>
	
	
	
	
	
	<?php } ?>
	
	<script>
function joined_details(){
	
	var uid="<?php echo $invitations[0]['uID'];   ?>";
	var groupid="<?php echo $invitations[0]['groupID'];   ?>";
	var status=$("#status").val();
	
	$.ajax({
          url: "<?php echo base_url();?>groups/invitationupdate?uid="+uid+"&groupid="+groupid+"& status="+status
        }).done(function( data ) {
			

      $("#join_status").html("<div class='col-md-12' style='text-align:center' id='joined_status'> 	<button class='btn btn-success btn-algn-clsss' >Joined</button>	</div>");
		  return true;
        }); 
	
}



</script>


	<script>
function declined_details(){
	
	var uid="<?php echo $invitations[0]['uID'];   ?>";
	var groupid="<?php echo $invitations[0]['groupID'];   ?>";
	var status=$("#decline_status").val();
	
	$.ajax({
          url: "<?php echo base_url();?>groups/invitationupdate?uid="+uid+"&groupid="+groupid+"& status="+status
        }).done(function( data ) {
			

      $("#join_status").html("<div class='col-md-12' style='text-align:center' id='joined_status'> 	<button class='btn btn-danger btn-algn-clsss' >Declined</button>	</div>");
		  return true;
        }); 
	
}



</script>
	
							<?php }else{
								
								echo "You have no recent invitation.";
								
							} ?>							
				
                <!-- /SECTION TILES -->

            </section>
            <!-- /SECTION -->

        </section> 
        <!-- /MAIN CONTENT SECTION -->

       <!-- 
       BAR -->
<div id="opensidebar"><i class="icon-3x fasize">+</i></div>
<section id="sidebar"  class="htmltile">
    <ul>
        <li></li>
      
<li><a data-scroll="scrollto"  href="#" ><?php if(isset($user_row[0]['photo'])){echo "<img src='".base_url('uploads')."/".$user_row[0]['photo']."' style='border-radius: 100%;
  width: 49px;
  height: 49px;
'>";}else{echo "<img src='../uploads/profile.png' style='border-radius: 100%;
  width: 49px;
  height: 49px;
'>";}?></a></li>
<li><a data-scroll="scrollto"  href="#" ><i class="fa fa-cog fasize icon-set"></i></a></li>

<li><a href="<?php echo base_url(); ?>Logout" ><i class="fa fa-power-off fasize"></i></a></li>
</ul>
</section>
<?php $this->load->view('settings'); ?>
<!-- /SIDEBAR -->

<!-- PRELOADER -->
<section class="mlightbox" id="loader">
    <a href="#">
        <img src="<?php echo base_url('assets/img/preloader.gif');?>" alt="Loading.."/>
    </a>
</section>
<!-- /PRELOADER -->

<!-- GALLERY LIGHTBOX -->
<section class="mlightbox" id="galleryimage">
    <section class="mlightbox-content">
        <img src="#"  alt=""/>
    </section>
    <section class="mlightbox-details">
        <div class="mlightbox-description">
            <h2 class='mlightbox-title'>Mahajyothis</h2>
            <p class="mlightbox-subtitle muted">by Grozav</p>
        </div>
        <ul class="mlist">
            <li><a class="close-mlightbox" href="#"><i class="icon-arrow-left"></i> Back to Mahajyothis</a></li>
            <li></li>
            <li><a target="_blank" href="http://facebook.com/grozavcom"><i class="icon-facebook-sign"></i> Like us on Facebook</a></li>
            <li><a target="_blank" href="https://twitter.com/intent/user?screen_name=grozavcom"><i class="icon-twitter-sign"></i> Follow us on Twitter</a></li>
        </ul>
    </section>
</section>
<!-- /GALLERY LIGHTBOX -->

<!-- VIDEO LIGHTBOX -->
<section class="mlightbox" id="galleryvideo">
    <section class="mlightbox-content">
        <div class="fitvideo">
            <iframe width="560" height="315" src="http://www.youtube.com/embed/VbDZmbx474k?modestbranding=1"></iframe>
        </div>
    </section>
    <section class="mlightbox-details">
        <div class="mlightbox-description">
            <h2 class='mlightbox-title'>Mahajyothis</h2>
            <p class="mlightbox-subtitle muted">by Grozav</p>
        </div>
        <ul class="mlist">
            <li><a class="close-mlightbox" href="#"><i class="icon-arrow-left"></i> Back to Mahajyothis</a></li>
            <li></li>
            <li><a target="_blank" href="http://facebook.com/grozavcom"><i class="icon-facebook-sign"></i> Like us on Facebook</a></li>
            <li><a target="_blank" href="https://twitter.com/intent/user?screen_name=grozavcom"><i class="icon-twitter-sign"></i> Follow us on Twitter</a></li>
        </ul>
    </section>
</section>
<!-- /VIDEO LIGHTBOX -->

<!-- BLOG LIGHTBOX -->
<section class="mlightbox" id="blogpost">
    <section class="blogpost-content">
    </section>
    <section class="blogpost-details">
    </section>
</section>
<!-- /BLOG LIGHTBOX -->




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.marquee.js"></script>
<script type="text/javascript" src="../js/overlay.js"></script>





<script type="text/javascript">
  
  $(function(){


  $('#marquee-vertical').marquee();  
  $('#marquee-horizontal').marquee({direction:'horizontal', delay:0, timing:50});  

});

</script>
 <script>
      $(document).ready(function() {
        $('.overlay').overlay();
      });
    </script>

<script src="<?php echo base_url('assets/js/respond.min.js');?>" type="text/javascript"></script> <!-- Responsive Library -->
<script src="<?php echo base_url('assets/js/jquery.isotope.min.js');?>" type="text/javascript"></script> <!-- Isotope Layout Plugin -->
<script src="<?php echo base_url('assets/js/jquery.mousewheel.js');?>" type="text/javascript"></script> <!-- jQuery Mousewheel -->
<script src="<?php echo base_url('assets/js/jquery.mCustomScrollbar.js');?>" type="text/javascript"></script> <!-- malihu Scrollbar -->
<script src="<?php echo base_url('assets/js/tileshow.js');?>" type="text/javascript"></script> <!-- Mahajyothis Custom Tileshow Plugin -->
<script src="<?php echo base_url('assets/js/mlightbox.js');?>" type="text/javascript"></script> <!-- Mahajyothis Custom Lightbox Plugin -->
<script src="<?php echo base_url('assets/js/jquery.fitVids.js');?>" type="text/javascript"></script> <!-- jQuery fitVids Plugin -->
<script src="<?php echo base_url('assets/js/lockscreen.js');?>" type="text/javascript"></script> <!-- Mahajyothis Lockscreen -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script> <!-- Bootstrap Library -->

<script src="<?php echo base_url('assets/js/script.js');?>" type="text/javascript"></script> <!-- Mahajyothis Script -->
 <script type="text/javascript">
        $('.icon-set').on('click',function(){
            $('.settings-page').animate({right: '9em'},800,'linear'); 
        });
        $('.settings-header').on('click',function(){
                   
                    $('.settings-page').animate({right: '-82%'},800,'linear'); 
        })
    </script>
    <script type="text/javascript">
            $(document).on('click','.edit-icon',function(){

                $(this).parent().next().slideToggle().parent().siblings().find('.edit-details').slideUp();
            });             
    </script>
      <script type="text/javascript">

             var base_url = "<?php echo base_url(); ?>";
      var cid=<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>;
      
      $('#<?php echo $theme[0]["themeId"];  ?>').prev().show();
      var pre = $('#<?php echo $theme[0]["themeId"];  ?>').attr('src');
 	$('#preview').attr('src',pre);
    $('.select-theme img').on('click', function(){
	
      var tId = $(this).attr('id');
      var src = $(this).attr('src');
      
      $('#preview').attr('src',src);
      $('.save_button').attr('id',tId);      
      });
	
    $('.save_button').on('click',function (){
     
      var tId = $(this).attr('id');
    if(tId == ''){
      alert('Select a Theme');
    }
    else{
   	$('.loader').fadeIn();
        $.post(base_url+'Theme',{themeId: tId, custID: cid}, function(respond){
        if(respond == 1){
          setTimeout(function(){
            window.location.reload(); 
            $('.loader').fadeOut();
          },1500);
          
        }
        else{

        }
      });
    }

    });
    $('.cancel_button').on('click',function(){
    	$('.save_button').attr('id','');
    
    })

  

    /*==== Open  SIDEBAR ====*/
         
    $('#opensidebar i').hover(function() {

        $('#sidebar').show(0).animate({'right': '0px'});

    });
    $('#sidebar').mouseleave(function() {
            var rightPos = $('.settings-page').css('right');
            //alert(rightPos);
        if(rightPos < '-768px'){
            $('#sidebar').animate({'right': '-120px'}, function() {      
                    $(this).css({'display': 'none'});
                });
        }
        else{
             
              $('#sidebar').animate({'right': '0px'}, function() {      
            });
        }
       
    });

    </script>

</body>
<script>
function popupCenter(url, title, w, h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} 
</script>
<script>
function popupCenter(url, title, w, h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} 
</script>
<script>

(function() {

  // cache vars
  var cards = document.querySelectorAll(".card.effect__random");
  var timeMin = 1;
  var timeMax = 3;
  var timeouts = [];

  // loop through cards
  for ( var i = 0, len = cards.length; i < len; i++ ) {
    var card = cards[i];
    var cardID = card.getAttribute("data-id");
    var id = "timeoutID" + cardID;
    var time = randomNum( timeMin, timeMax ) * 2000;
    cardsTimeout( id, time, card );
  }

  // timeout listener
  function cardsTimeout( id, time, card ) {
    if (id in timeouts) {
      clearTimeout(timeouts[id]);
    }
    timeouts[id] = setTimeout( function() {
      var c = card.classList;
      var newTime = randomNum( timeMin, timeMax ) * 6000;
      c.contains("flipped") === true ? c.remove("flipped") : c.add("flipped");
      cardsTimeout( id, newTime, card );
    }, time );
  }

  // random number generator given min and max
  function randomNum( min, max ) {
    return Math.random() * (max - min) + min;
  }

})();
</script>
</html>