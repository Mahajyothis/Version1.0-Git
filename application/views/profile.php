<?php 
$theme = $this->session->userdata('theme');
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title><?php echo $lang['title']; ?></title>

    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style_one.css'); ?>" />
   <link href="<?php echo base_url().CSS;?>chat/chat.css" rel="stylesheet">
      <link href="<?php echo base_url().CSS;?>chat/screen.css" rel="stylesheet">

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
    padding-top: 17px;
    }



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
  color: <?php echo $theme[0]['color'].'!important';  ?>;
  //opacity: <?php echo $theme[0]['opacity'].'!important';  ?>;
 }
  .mCSB_scrollTools{
  background: <?php echo $theme[0]['bgColor'].'!important';  ?>;
  opacity: <?php echo $theme[0]['opacity'].'!important';  ?>;
 }
 .settings-header{
   border-bottom: 1px solid <?php echo $theme[0]['bgColor'].'!important';  ?>;
   color:<?php echo $theme[0]['bgColor'].'!important';  ?>;
    opacity: 8.5;
 }
 .save_button{
  background: <?php echo $theme[0]['bgColor'].'!important';  ?>;
 }
 .selected_themes{
  display:none;
 }
 
 </style>

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
   <a href="<?php echo base_url(); ?>" >     <h1>
         <img src="<?php echo base_url('assets/img/logo.png');?>" height="70" width="88" class="header-logo" alt=""/>
            <?php echo $lang['heading']; ?>
        </h1></a>
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
                      <font id='add_like' color='#EF580D'>(<?php echo $totallikes[0]['totallikes']; ?>)</font> <span class="txt1-lft-pad"><?php echo $lang['likes']; ?></span>
                        <span id='add_like'  style="color:#EF580D">(<?php  echo $totalcircles[0]['totalcircles'];   ?>)</span><span class="txt1-lft-pad"><?php echo $lang['circles']; ?></span>
                         <span id='add_circle'  style="color:#EF580D">(<?php  echo $totalviews[0]['totalviews'];   ?>)</span><span class="txt1-lft-pad"><?php echo $lang['views']; ?></span>
						 
						 <span class="txt1-lft-pad" style="color:green;">&nbsp;&nbsp;<span class="fa fa-circle"></span> Online</span>
						 
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
            </p>     <br/>

            <blockquote>

            </blockquote>

            <br/>

            <p>
               <?php  echo $login =$user_row[0]['profDesignation'];   ?>
           </p>  <br/><br/>

           <ul class="inline">
            <li class="transparent-hover"><a class="icon-facebook icon-2x" href="#"></a></li>
            <li class="transparent-hover"><a class="icon-twitter icon-2x" href="#"></a></li>
            <li class="transparent-hover"><a class="icon-pinterest icon-2x" href="#"></a></li>
            <li class="transparent-hover"><a class="icon-rss icon-2x" href="#"></a></li>
        </ul>
    </div>  
</div>


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
           <center><img src="http://version.mahajyothis.net/assets/img/form.png" width="50" height="50" style="margin-top:23%;"></center>
            <p class="title"><?php echo $lang['forum']; ?></p>
        </a>
    </div>

    <div class="tile yellow icon-featurefade w1 h1">
        <a class="link" href="<?php echo base_url();?>post/index" data-option-value=".photography">
            <!--<i class="fa fa-camera fasize"></i>-->
            <center><img src="http://version.mahajyothis.net/assets/img/post.png" width="50" height="50" style="margin-top:23%;"></center>
            <p class="title"><?php echo $lang['post']; ?></p>
        </a>
    </div>

    <div class="tile blue icon-featurefade w1 h1">
         <a class="link" href="<?php echo base_url();?>groups" data-option-value=".articles">
            <!---<i class="fa fa-laptop fasize"></i>-->
            <center><img src="http://version.mahajyothis.net/assets/img/group.png" width="50" height="50" style="margin-top:23%;"></center>
            <p class="title"><?php echo $lang['groups']; ?></p>
        </a>
    </div>

    <div class="tile purple icon-featurefade w1 h1">
  
        <a class="link" href="<?php echo base_url();?>networks" data-option-value=".articles">
            <!--<i class="fa fa-users fasize"></i>-->
            <center><img src="http://version.mahajyothis.net/assets/img/network.png" width="50" height="50" style="margin-top:23%;"></center>
            <p class="title"><?php echo $lang['networks']; ?></p>
        </a>
    </div>
  
  <div class="tile orange icon-featurefade w1 h1">
  
        <a class="link" href="<?php echo base_url();?>events" data-option-value=".articles">
            <!--<i class="fa fa-calendar-times-o fasize"></i>-->
            <center><img src="http://version.mahajyothis.net/assets/img/event.png" width="50" height="50" style="margin-top:23%;"></center>
            <p class="title"><?php echo $lang['events']; ?></p>
        </a>
    </div>
  <div class="tile green icon-featurefade w1 h1">
  
        <a class="link" href="<?php echo base_url();?>article" data-option-value=".articles">
            <!--<i class="fa fa-pencil-square-o fasize"></i>-->
            <center><img src="http://version.mahajyothis.net/assets/img/article.png" width="50" height="50" style="margin-top:23%;"></center>
            <p class="title"><?php echo $lang['articles']; ?></p>
        </a>
    </div>
    <div class="tile red icon-featurefade w1 h1">

        <a class="link" href="<?php echo base_url();?>discussions" data-option-value=".articles">
           <!-- <i class="fa fa-pencil-square-o fasize"></i>-->
           <center><img src="http://version.mahajyothis.net/assets/img/discussion.png" width="50" height="50" style="margin-top:23%;"></center>
            <p class="title"><?php echo $lang['discussions']; ?></p>
        </a>
    </div>
     <div class="tile blue1 icon-featurefade w1 h1">
        <a class="link" target="_self" href="<?php echo base_url(); ?>blog" data-option-value=".articles">
           <!-- <i class="icon-rss icon-4x"></i>-->
           <center><img src="http://version.mahajyothis.net/assets/img/blog.png" width="50" height="50" style="margin-top:23%;"></center>
            <p class="title"><?php echo $lang['blogs']; ?></p>
        </a>
    </div>    </section>
   <section class="clearfix section" >
   <h3 class="block-title block-recent-updates"><?php echo $lang['recent_updates']; ?></h3>
    <div class="tile black htmltile w3 h4" style="background:transparent;border:none;">
       
                <div class="tilecontent" style="margin-top: 23px">

 
                    <div class="content">
              <div class="pull-right">
                                <a class="icon-calendar icon-3x"></a>
                            </div>
            
                            
            <div class="block-hdnews">
<?php if($recent_query->num_rows() >= 1){ ?>
                <div class="list-wrpaaer" style="height:5000px;margin-top: -37px;">
                 <ul class="list-aggregate refresh" id="marquee-vertical" style="width:500px">
                  
        <?php 
        
        
           foreach ($recent_query->result() as $recent_row)
   {
     ?>
                  <li class="updte-clmn">


                  <a onclick="recent<?php echo $recent_row->raID;   ?>()" data-overlay-trigger="one<?php echo $recent_row->raID;   ?>" href="#!">

                   <div id="first0"><span><img src="
                   
                   <?php echo ($recent_row->photo && file_exists(UPLOADS.$recent_row->photo)) ? base_url().UPLOADS.$recent_row->photo : base_url().UPLOADS.'profile.png';?>
                   
                  " alt="User Profile" style="width: 10%;height:35px;float: left;margin-right: 16px;"/></span>
                <h4 id="recents"><?php  echo "You ".$recent_row->raMessage ."&nbsp". $recent_row->perdataFirstName."'s ".$recent_row->raCategory;  ?></h4>
              </div></a>    
                   </li>  
        <?php   }}else{ ?>
                  <b> 
          <?php echo $lang['no_activity']; ?>.         </b>
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
            <!-- /SECTION --> <!-- SECTION -->
            <section class="clearfix section" id="gallery">  <!-- SECTION TILES --> <!-- /SECTION TILES -->

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
                <h3 class="block-title"><?php echo $lang['notifications']; ?></h3>
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
              <div class="tile white title-scaleup imagetile w2 h1" >
                    <div class="card effect__random" data-id="1">
            <div class="card__front first">
                <div class="link_sam" href="#" data-option-value="*">
                  <i class="fa fa-user-plus fasize"></i>
                  <p class="title"><?php echo $lang['follow']; ?></p>
                </div>
              
            </div>
            <div class="card__back first">
              <span class="card__text followlive">
            <?php if($follow_notification->num_rows() >= 1){
                $follo_notification=$follow_notification->result_array();
                
              ?>
              <a onclick="recentfollow<?php echo $follo_notification['0']['custID']; ?>()" data-overlay-trigger="two<?php echo $follo_notification['0']['custID'];   ?>" href="#!">
                <div class="col-md-12 odd back_follow" id="first0"><span><img src="
                <?php echo ($follo_notification['0']['photo'] && file_exists(UPLOADS.$follo_notification['0']['photo'])) ? base_url().UPLOADS.$follo_notification['0']['photo'] : base_url().UPLOADS.'profile.png';?>" alt="User Profile" style="width: 18%;float: left;"/></span>
                <h4 id="recents"><?php echo $follo_notification['0']['custName'];   ?> Follows You</h4>
              </div></a>
                <div class="icon_section">
                  <a class="fa fa-user-plus"></a>             
                </div>
          <?php }else{  ?>
                
                <?php echo $lang['no_follow']; ?>.
                                
                <?php   }?>
              </span>
            </div>
      <!-- /card -->
        </div>
                </div>
        <?php if($follow_notification->num_rows() >= 1){
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
                  <p class="title"><?php echo $lang['n_like']; ?></p>
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
                    <img src=" <?php echo ($notification['0']['photo'] && file_exists(UPLOADS.$notification['0']['photo'])) ? base_url().UPLOADS.$notification['0']['photo'] : base_url().UPLOADS.'profile.png';?>" alt="User Profile" style="width: 18%;float: left;"/>
                  </span>
                  <h4 id="recents"><?php echo $notification['0']['custName']."&nbsp".$notification['0']['raMessage']." Your ".$notification['0']['raCategory'];   ?></h4>
                </div></div></a>
                <div class="icon_section">
                  <a class="fa fa-thumbs-o-up" id="ic1" style="transition: all 0.5s ease;"></a>             
                </div>
                
                <?php }else{  ?>
                
                <?php echo $lang['no_like']; ?>.
                                
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
    document.getElementById("aaalike<?php echo $notification['0']['raID']; ?>").innerHTML ="<iframe src='<?php echo base_url().$notification['0']['raPage']; ?>?pid=<?php echo $notification['0']['catID'];   ?>&cat=<?php echo $notification['0']['raCategory'];   ?>&act=<?php echo $notification['0']['raAction'];   ?>&uid=<?php echo $notification['0']['CustID'];   ?>&p=n' width='100%' height='100%' style='border: none;'></iframe>";
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
                  <p class="title"><?php echo $lang['comments']; ?></p>
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
                    <img src="<?php echo ($comm_notification['0']['photo'] && file_exists(UPLOADS.$comm_notification['0']['photo'])) ? base_url().UPLOADS.$comm_notification['0']['photo'] : base_url().UPLOADS.'profile.png';?>" alt="User Profile" style="width: 18%;float: left;"/>
                  </span>
                  <h4 id="recents"><?php echo $comm_notification['0']['custName']."&nbsp".$comm_notification['0']['raMessage']." Your ".$comm_notification['0']['raCategory'];   ?></h4>
                </div></div></a>
                <div class="icon_section">
                  <a class="fa fa-comments-o" id="ic1"></a>             
                </div>
                
                <?php }else{  ?>
                
                <?php echo $lang['no_comments']; ?>.
                                
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
                  <p class="title"><?php echo $lang['invitations']; ?></p>
              </div>
            </div>
            <div class="card__back third1">
              <span class="card__text">
              <?php   if($group_detail->num_rows()>=1){
            
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
       
      </div>
    
    </div>
     </div> 
        <div class="row" id="join_status">
       <div class="half-wdth-clss">
     <div class="btnn-pd-clss">
  <?php   if($invitations[0]['gistatus']!=1){   ?>
  <input type="hidden" value="1" id="status">
          <button class="btn btn-success btn-algn-clsss" onclick="joined_details()"><?php echo $lang['join']; ?></button>
  <?php  } ?>
    </div>
     </div> 
     <?php   if($invitations[0]['gistatus']!=1){   ?>
     <div class="half-wdth-clss">
      <div class="btnn-pd-clss">
    <input type="hidden" value="2" id="decline_status">
      <button class="btn btn-danger btn-algn-clsss" onclick="declined_details()"><?php echo $lang['decline']; ?></button>
    </div>
     </div> 
	 <script>
function joined_details(){
  
  var uid="<?php echo $invitations[0]['uID'];   ?>";
  var groupid="<?php echo $invitations[0]['groupID'];   ?>";
  var status=$("#status").val();
  
  $.ajax({
          url: "<?php echo base_url();?>groups/invitationupdate?uid="+uid+"&groupid="+groupid+"& status="+status
        }).done(function( data ) {
      

      $("#join_status").html("<div class='col-md-12' style='text-align:center' id='joined_status'>  <button class='btn btn-success btn-algn-clsss' >Joined</button> </div>");
      return true;
        }); 
  
}
</script> <script>
function declined_details(){
  
  var uid="<?php echo $invitations[0]['uID'];   ?>";
  var groupid="<?php echo $invitations[0]['groupID'];   ?>";
  var status=$("#decline_status").val();
  
  $.ajax({
          url: "<?php echo base_url();?>groups/invitationupdate?uid="+uid+"&groupid="+groupid+"& status="+status
        }).done(function( data ) {
      

      $("#join_status").html("<div class='col-md-12' style='text-align:center' id='joined_status'>  <button class='btn btn-danger btn-algn-clsss' >Declined</button>  </div>");
      return true;
        }); 
  
}
</script>
              
			  <?php }}else{  ?>
                
                <?php echo $lang['no_group']; ?>.
                                
                <?php   }?>
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
                  <p class="title"><?php echo $lang['share']; ?></p>
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
                    <img src="<?php echo ($shar_notification['0']['photo'] && file_exists(UPLOADS.$shar_notification['0']['photo'])) ? base_url().UPLOADS.$shar_notification['0']['photo'] : base_url().UPLOADS.'profile.png';?>" alt="User Profile" style="width: 18%;float: left;"/>
                  </span>
                  <h4 id="recents"><?php echo $shar_notification['0']['custName']."&nbsp".$shar_notification['0']['raMessage']." Your ".$shar_notification['0']['raCategory'];   ?></h4>
                </div></div></a>
                <div class="icon_section">
                  <a class="fa fa-comments-o" id="ic1"></a>             
                </div>
                
                <?php }else{  ?>
                
                <?php echo $lang['no_share']; ?>.
                                
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
                    <div class="card effect__random" data-id="8">
            <div class="card__front third1">
              <div class="link_sam" href="#" data-option-value="*">
                  <i class="fa fa-newspaper-o fasize"></i>
                  <p class="title"><?php echo $lang['course_invitations']; ?></p>
              </div>
            </div>
            <div class="card__back third1">
              <span class="card__text">
              <?php   if($course_detail->num_rows()>=1){
            
            $course_invitations=$course_detail->result_array(); ?>
              <a   href="http://edu.mahajyothis.net/course/view/<?php echo $course_invitations[0]['slug'].'/'.$course_invitations[0]['ecID']; ?>">
                <div class="col-md-12 even" id="first">
                  <div style="margin-top:20px"><span>
                    <img src="/uploads/<?php if(ISSET($course_invitations[0]['photo'])){echo $course_invitations[0]['photo'];   }else{ echo "profile.png"; } ?>" alt="User Profile" style="width: 18%;float: left;"/>
                  </span>
                    <h4 id="recents"><?php echo $course_invitations[0]['perdataFullName']; ?> Invited you to Join New Course</h4>
                </div></div></a>
                <div class="icon_section">
                  <a class="fa fa-newspaper-o" id="ic1"></a>              
                </div>
                
                <?php }else{  ?>
                
                <?php echo $lang['no_course']; ?>.
                                
                <?php   }?>
              </span>
            </div>
          </div><!-- /card -->
                </div>   
              
              
              
              
              
     <div class="tile blue title-scaleup imagetile w2 h1">
                    <div class="card effect__random" data-id="3">
            <div class="card__front third2">
              <div class="link_sam" href="#" data-option-value="*">
                  <i class="fa fa-comments-o fasize"></i>
                  <p class="title"><?php echo $lang['n_blogs']; ?></p>
              </div>
            </div>
            <div class="card__back third2">
              <span class="card__text">
              <?php 
              if($recent_blogs){
              ?>
              <a href="http://blog.mahajyothis.net/entry/<?php echo $recent_blogs->permalink;  ?>" target="_blank">
              
                <div class="col-md-12 odd back-color" id="first">
                  <div style="margin-top:20px"><span>
                  <?php if(!empty($recent_blogs->image)){
                  $obj = json_decode($recent_blogs->image); 
                  echo "<img src='".$obj->{'url'}."' style=   'height: 30px;
    width: 30px;'>";
                  } ?>
                  </span>
                  <h4 id="recents"><?php echo $recent_blogs->title;   ?></h4>
                  
                </div></div></a>
                <div class="icon_section">
                  <a class="fa fa-comments-o" id="ic1"></a>             
                </div>
           <?php   }
                else{  ?>
                
                <?php echo $lang['no_blogs']; ?>.
                                
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
                  <p class="title"><?php echo $lang['events']; ?></p>
              </div>
            </div>
            <div class="card__back fifth">
        <?php   if($event_alert->num_rows()>=1){
            
            $events=$event_alert->result_array(); ?>
              <span class="card__text">
            <a  href="<?php echo base_url().'events/view/'.$this->custom_function->create_ViewUrl($events[0]['id'],$events[0]['name']); ?>">    <div class="col-md-12 odd" id="first">
                  <span>
                    <img src="<?php echo ($events['0']['photo'] && file_exists(UPLOADS.$events['0']['photo'])) ? base_url().UPLOADS.$events['0']['photo'] : base_url().UPLOADS.'profile.png';?>" alt="User Profile" style="width: 18%;float: left;"/>
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
    
    <?php }else{
                
                echo $lang['no_recent_invitation'].".";
                
              } ?>        
  
       
        
                <!-- /SECTION TILES -->

            </section>
            <!-- /SECTION -->

        </section> 
        <!-- /MAIN CONTENT SECTION -->

       <!-- 
       BAR-->

<div id="opensidebar"><i class="icon-3x fasize">+</i>
  <?php 
	/*
        
          echo '<i class="logged_user"><img src='.base_url('uploads').'/'.$this->session->userdata['profile_data'][0]['photo'].'></i>';
          echo '<ul class="drop"><a href='.base_url().'user/'.$this->session->userdata['profile_data'][0]['custName'].'><li>'.$lang['profile'].'</li></a>
                <a href='.base_url().'Logout'.'><li>'.$lang['logout'].'</li></a></ul>';
    	*/
        ?>    

</div>


<section id="sidebar"  class="htmltile">
    <ul>
        <li></li>
      
<li><a href="<?=base_url();?>" ><i class="fa fa-home fasize"></i></a></li>
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
      /*****************EDIT DETAILS*******************/

    $(document).on('click','.pencil',function(){

      var inpId = $(this).parent().prev().find('input').attr('id');

      if(inpId == 'upasswd') {
        $('.cp').slideToggle(); $('#'+inpId).fadeIn();
        $('#'+inpId).attr('readonly',false).focus();
      }
      else if(inpId == 'uname'){
        $('#'+inpId).attr('readonly',false).focus();
      }

      $('.save').attr('id',inpId);

      //$(this).parent().prev().find('input').attr('readonly',false).focus().siblings().attr('readonly',true);

    });

    $(document).on('click','.save',function(){

      var ck_password = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
      var inpId = $(this).attr('id');
      var val = $('#'+inpId).attr('value');
      var cpass = $('#cupasswd').attr('value');
//alert(inpId);
      if(inpId == 'upasswd'){

           if(!ck_password.test(val)){
                alert('Please use mixture charectors(eg:_acdb132_)');
                $('#upasswd').focus();
                return false;
              } 
              else if(val !== cpass){
                alert('Entered password Mismatch');
                $('#upasswd').focus();
                return false;
              } 
              else{
              		$('.loader').fadeIn();
                 $.post(base_url+'EditProfile',{inpId : 'upasswd', inpValue : val},function(detail){
                  if(detail == 1){
                   $('.loader').fadeOut();
                   $('.user_msg').fadeIn(1500).fadeOut(1000); 
                  }
                 
                });
              }
      }
      else if(inpId == 'uname'){
$('.loader').fadeIn();
                 $.post(base_url+'EditProfile',{inpId : 'uname', inpValue : val},function(detail){
                  if(detail == 1){
                  $('.loader').fadeOut();
                   $('.user_msg').fadeIn(1500).fadeOut(1000); 
                  }
                 
                 });
      }
    

      
    });

/****************************IMAGE CHANGE*********************************/
      $(document).on('click','.edit-pic',function(){

      $('#profile_pic').click();
      var inpId = $(this).parent().next().attr('id');
      $('.save').attr({id: inpId, 'class':'update_pic'});
      
    });

      $(document).delegate('.update_pic','click',function(){
              $('form').submit();
      })

      $('form').submit(function(e){
        $('.loader').fadeIn();
          e.preventDefault();
        var formData = new FormData($(this)[0]);
          $.ajax({
            url: base_url+'EditProfile/edit_pic',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
              success: function (data) {
                  if(data){
                  $('.loader').fadeOut();
                     $('.user_msg').fadeIn(1500).fadeOut(1000); 
                  }
          },
              error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
          }
        });
              return false;
      });


    //*********************USERNAME CHECK***************************/
      $(document).delegate('#uname','keyup',function() {
        var uname = $('#uname').val();
        $.post(base_url+'registration/check_username/'+uname,{chk_username:1},
          function(resp){
           // alert(resp);

            if(resp != 4){

              $('#uname').next('.error_msg').html('<i>X</i>').fadeIn('slow');


            }
            else{
             $('#uname').next('.error_msg').html('<i class="fa fa-check" style="color:green;"></i>').fadeIn('slow');
     

           }

     });

  });

    //********************************************************************

    </script>
<?php include(JS.'chat/chat.php'); ?>
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
<script>
$(document).on('click','#lang_save_btn',function(){ 
				var lang=$(this).parent().siblings('#lang_sel_div').find('select option:selected').val();
if(lang){
					$.ajax({
          url: "<?php echo base_url();?>home/set_language",
		  type:"POST",
		  data:{lang:lang,store:1}

          }).done(function( data ) {
           location.reload();
		  });
}
		});
</script>
</html>