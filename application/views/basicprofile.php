<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title><?php echo $lang['title']; ?></title>
        
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
        <meta property="og:url"           content="http://www.version.mahajyothis.net" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Mahajyothis" />
    <meta property="og:description"   content="Mahajyothis" />
    <meta property="og:image"         content="http://version.mahajyothis.in/assets/img/logo.png" />

        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/mystyle_search.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style_basic.css'); ?>" />
        <link href="<?php echo base_url().CSS;?>business_services/style.css" rel="stylesheet">
        <link href="<?php echo base_url().CSS;?>chat/chat.css" rel="stylesheet">
        <link href="<?php echo base_url().CSS;?>chat/screen.css" rel="stylesheet">
        <!-- Scripts are at the bottom of the page -->
        <script>
function goBack() {
    window.history.back();
}
</script>

    </head>
    <?php 
//print_r($this->session->userdata('profile_data'));
   
        //$user_row = $this->session->userdata('basicprofile_data');
       $profile_row = $this->session->userdata('profile_data'); 
        ?>
    <body>

        <!-- BACKGROUND 
        <img src="assets/img/background-1.jpg" class="background" alt="" />-->
        <!-- /BACKGROUND -->

        <!-- LOGO -->
        <div class="header">
            <h1 class="whte-txts">
                <img src="assets/img/logo.png" height="64" width="70" class="header-logo" alt=""/>
                <?php echo $lang['heading']; ?>
               
            </h1>
            
        </div>
         <div style="float:right;margin-right: 11%;
    margin-top: 4%;"> <a href="#" onclick="goBack()"><img src="<?php echo base_url('assets/grouppage/img/back-arrw.png');?>"></a></div>
        <!-- /LOGO -->
        <!-- MAIN CONTENT SECTION -->
        <section id="content">
         
            <section class="clearfix section" id="about">
            
 <!-- SECTION TITLE -->
              <?php if(!empty($this->session->userdata['profile_data'][0]['custID'])) if($profile_row[0]['custID'] != $_GET['uid']){ ?>
                <!--<div class="social" style="position: relative;z-index: 9;margin-top: 1.3%;cursor:pointer">
                 <!-- Facebook Message -->
                 <img src="<?php echo base_url().IMAGES; ?>fb.jpg" width="34" height="34" title="<?php echo $lang['send_facebook']; ?>" onclick="facebook_send_message('100001430970901');"><br>
                 <!-- Skype -->
                 <a href="#myModalSkpye" id="skypeBtn" title="<?php echo $lang['whatsapp_message']; ?>" class="modelPopup" data-toggle="modal"><img src="<?php echo base_url().IMAGES; ?>skyp.jpg" width="34" height="34" id="skype_img" title="<?php echo $lang['skype']; ?>"></a><br>       
                 <!-- Tweet -->
                 <a id="twitter-share-button" href="https://twitter.com/intent/tweet?text=" title="<?php echo $lang['tweet']; ?>"><img src="<?php echo base_url().IMAGES; ?>twtr.jpg" width="34" height="34"></a><br>
                 <!-- Whatsapp -->
                 <a href="#myModal" id="whatsAppBtn" title="<?php echo $lang['send_facebook']; ?>" class="modelPopup" data-toggle="modal"><img src="<?php echo base_url().IMAGES; ?>watsup.jpg" width="34" height="34"></a><br>
                 <!-- Hangout -->          
                 <a href="#myModalHangout" id="hangoutBtn" title="<?php echo $lang['google_hangout']; ?>" class="modelPopup" data-toggle="modal"><img src="<?php echo base_url().IMAGES; ?>hangout.jpg" width="34" height="34"></a><br>   
                 <a href="#myModalEmail" id="emailBtn" title="<?php echo $lang['email']; ?>" class="modelPopup" data-toggle="modal"><img src="<?php echo base_url().IMAGES; ?>email_bs.png" width="34" height="34"></a><br>    
                 <a href="#myModalTextSMS" id="textSMSBtn" title="<?php echo $lang['text_message']; ?>" class="modelPopup" data-toggle="modal"><img src="<?php echo base_url().IMAGES; ?>msg.jpg" width="34" height="34"></a><br>  
                 <a href="javascript:void(0)" onclick="javascript:chatWith('<?php echo $user_row[0]['custID'];  ?>','<?php echo $user_row[0]['perdataFirstName'];  ?>')" id="textSMSBtn" title="<?php echo $lang['chat_with'].' '.$user_row[0]['perdataFirstName'];  ?>"  ><img src="<?php echo base_url().IMAGES; ?>msg.jpg" width="34" height="34"></a>
                                  <br>
                 </div><?php } ?>
                <!-- /SECTION TITLE -->

                           <div class="tile imagetile imagetile-scaleup w2 h2"  style="margin-left:40px; margin-top:0%;">
                                   <div class="lsc-count">
                                       <div class="lsc-count-in">
                                               <?php echo "(<font id='add_like' color='#EF580D'>".$user_row[0]['likes']."</font>)"; ?><span class="txt1-lft-pad"><?php echo $lang['likes']; ?></span>
                                              <span id='add_like'  style="color:#EF580D">(<?php  echo $totalcircles[0]['totalcircles'];  ?>)</span><span class="txt1-lft-pad"><?php echo $lang['circles']; ?></span>
						<?php if($user_row[0]['is_online'] == 1)
						{?>
                                                <span class="txt1-lft-pad pfle-online"><span class="fa fa-circle"></span> Online</span>
						<?php }
						else {
						 ?>						
						<span class="txt1-lft-pad pfle-offline"><span class="fa fa-circle"></span> Offline</span>
						<?php } ?>



                                       </div>
                                   </div>
                <a class="link" href="#">

     <img src='<?php if(isset($user_row[0]['photo'])){echo base_url('uploads').'/'.$user_row[0]['photo'];}else{echo base_url('uploads').'/profile.png';} ?>' /></a>
</div>
<?php if(!empty($profile_row[0]['custID'])){ 

if($profile_row[0]['custID'] != $_GET['uid']){ 
?>

<div class="profile_interact">

<?php if(!empty($user_row[0]['liked'])){
  ?>          
            <span id="prof_unlike"><a href="#" onclick="profile_unlike()"><button class="btn cust-btn-pfle btn-warning unlike"  style="color:#000000;    background-color: #f5a932 !important;"><?php echo $lang['unlike']; ?><span style="padding-left: 15px;"><i class="fa fa-thumbs-up"></i></span></button></a></span>

            <?php }else{    ?>      
                               
            <span id="prof_like"><a href="#" onclick="profile_like()" ><button class="btn cust-btn-pfle btn-warning"  style="color:#000000;background-color: #f5a932 !important;"><?php echo $lang['like']; ?><span style="padding-left: 15px;"><i class="fa fa-thumbs-up"></i></span></button></a></span>
                    
                <?php  }  ?>    
                    
<?php
if(!empty($user_row[0]['followers'])){
  ?>
                    
                <a href="#"  id="following"><button class="btn cust-btn-pfle btn-warning"  style="    background-color: #f5a932 !important; color:#000000"><?php echo $lang['following']; ?><span style="padding-left: 15px;"><img src="/assets/img/user-flwng-icn.png"></span></button> </a>
                    
<?php }else{    ?>
                    
                <span id="status_change"><a  href="#" onClick="follow_profile()"  > <button class="btn cust-btn-pfle btn-warning" style=" color:#000000;background-color:#f0ad4e !important;"><?php echo $lang['follow']; ?><span style="padding-left: 15px;"><i class="fa fa-user-plus" ></i></span></button>  </a>    </span>
                    
<?php  }  ?>

                </div>
<?php } }?>
<div class="tile black htmltile w3 h4" style="background:rgba(12, 12, 12, 0.6)!important;"; >
    <div class="tilecontent">
        <div class="content">
            <div class="pull-right">
                <a class="icon-pencil icon-3x"></a>
            </div>
            <h3>
            
          
            
            
            <?php echo $user_row[0]['perdataFirstName'] ."&nbsp;"  .$user_row[0]['perdataLastName']; ?></h3>
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
    </div>

            </section>
            <!-- /SECTION -->

            <!-- SECTION -->
            <section class="clearfix section" id="portfolio" data-option-key="filter">

                <!-- SECTION TITLE -->
                <h3 class="block-title"></h3>
                <!-- /SECTION TITLE -->

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
                <h3 class="block-title">Recent Activities</h3>
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
                <div class="tile white title-scaleup imagetile w2 h1">
                    <div class="caption white">
                        <a class="link" data-href="blog/post-1.html" href="#blogpost" data-lightbox="mlightboxblog">
                            <div class="title"><i class="icon-file-text icon-2x"></i></div>
                            <div class="caption-text twoline">
                                Strapslide is the new big thing in Bootstrap Development!
                            </div>
                        </a>
                    </div>
                    <img src="assets/img/blogpost-1.jpg" alt="" />
                </div>
                <div class="tile red title-scaleup imagetile w2 h1">
                    <div class="caption red">
                        <a class="link" data-href="blog/post-2.html" href="#blogpost" data-lightbox="mlightboxblog">
                            <div class="title"><i class="icon-file-text icon-2x"></i></div>
                            <div class="caption-text">
                                You'll simply love Mahajyothis!
                            </div>
                        </a>
                    </div>
                    <img src="assets/img/blogpost-2.jpg" alt="" />
                </div>
                <div class="tile brown title-scaleup imagetile w2 h1">
                    <div class="caption brown">
                        <a class="link" data-href="blog/post-3.html" href="#blogpost" data-lightbox="mlightboxblog">
                            <div class="title"><i class="icon-file-text icon-2x"></i></div>
                            <div class="caption-text">
                                Amazing Blog Title
                            </div>
                        </a>
                    </div>
                    <img src="assets/img/blogpost-3.jpg" alt="" />
                </div>
                <div class="tile turquoise title-scaleup imagetile w2 h1">
                    <div class="caption turquoise">
                        <a class="link" data-href="blog/post-3.html" href="#blogpost" data-lightbox="mlightboxblog">
                            <div class="title"><i class="icon-file-text icon-2x"></i></div>
                            <div class="caption-text">
                                Lorem Ipsum Dolor
                            </div>
                        </a>
                    </div>
                    <img src="assets/img/blogpost-4.jpg" alt="" />
                </div>
                <div class="tile yellow title-scaleup imagetile w2 h1">
                    <div class="caption yellow">
                        <a class="link" data-href="blog/post-3.html" href="#blogpost" data-lightbox="mlightboxblog">
                            <div class="title"><i class="icon-file-text icon-2x"></i></div>
                            <div class="caption-text">
                                Custom slideshow and lightbox
                            </div>
                        </a>
                    </div>
                    <img src="assets/img/blogpost-5.jpg" alt="" />
                </div>
                <div class="tile blue title-scaleup imagetile w2 h1">
                    <div class="caption blue">
                        <a class="link" data-href="blog/post-3.html" href="#blogpost" data-lightbox="mlightboxblog">
                            <div class="title"><i class="icon-file-text icon-2x"></i></div>
                            <div class="caption-text twoline">
                                Windows 8 directly in your browser
                            </div>
                        </a>
                    </div>
                    <img src="assets/img/blogpost-6.jpg" alt="" />
                </div>
                <!-- /SECTION TILES -->

            </section>
            <!-- /SECTION -->

        </section> 
        <!-- /MAIN CONTENT SECTION -->

        <!-- PRELOADER -->
        <section class="mlightbox" id="loader">
            <a href="#">
                <img src="assets/img/preloader.gif" alt="Loading.."/>
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

        <!-- Modal HTML FOR WHATSAPP -->
            <!-- Modal HTML FOR WHATSAPP -->
            <div id="myModal" class="modal fade">
                <div class="modal-dialog wapp-dialog">
                    <div class="modal-content">
                        <div class="modal-header wapp-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <iframe src="<?php echo base_url('business/whatsapp/');?>"></iframe>    
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal HTML FOR WHATSAPP Ends -->

        <!-- Modal HTML FOR Hangout -->
            <!-- Modal HTML FOR Hangout -->
            <div id="myModalHangout" class="modal fade">
                <div class="modal-dialog wapp-dialog">
                    <div class="modal-content">
                        <div class="modal-header wapp-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <iframe id="hangoutFrame" src="<?php echo base_url('business/hangout');?>"></iframe>    
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal HTML FOR Hangout Ends -->

        <!-- Modal HTML FOR Skype -->
            <!-- Modal HTML FOR Hangout -->
            <div id="myModalSkpye" class="modal fade">
                <div class="modal-dialog wapp-dialog">
                    <div class="modal-content">
                        <div class="modal-header wapp-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <iframe id="skypeFrame" src="<?php echo base_url('business/skype');?>"></iframe>    
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal HTML FOR Skype Ends -->

        <!-- Modal HTML FOR Text Message-->
            <!-- Modal HTML FOR Hangout -->
            <div id="myModalTextSMS" class="modal fade">
                <div class="modal-dialog wapp-dialog">
                    <div class="modal-content">
                        <div class="modal-header wapp-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body" id="modal-body-text-message">
                            <iframe id="textSMSFrame" src="<?php echo base_url('business/textmessage');?>"></iframe>    
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal HTML FOR Text Message Ends -->
        <!-- Modal HTML FOR Email -->
            <div id="myModalEmail" class="modal fade">
                <div class="modal-dialog wapp-dialog">
                    <div class="modal-content">
                        <div class="modal-header wapp-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body" id="modal-body-email-message">
                            <iframe id="emailFrame" src="<?php echo base_url('business/email/'.$user_row[0]['custID']);?>"></iframe>    
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal HTML FOR Email Ends -->

        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> <!-- jQuery Library -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
        <script src="js/respond.min.js" type="text/javascript"></script> <!-- Responsive Library -->
        <script src="js/jquery.isotope.min.js" type="text/javascript"></script> <!-- Isotope Layout Plugin -->
        <script src="js/jquery.mousewheel.js" type="text/javascript"></script> <!-- jQuery Mousewheel -->
        <script src="js/jquery.mCustomScrollbar.js" type="text/javascript"></script> <!-- malihu Scrollbar -->
        <script src="js/tileshow.js" type="text/javascript"></script> <!-- Mahajyothis Custom Tileshow Plugin -->
        <script src="js/mlightbox.js" type="text/javascript"></script> <!-- Mahajyothis Custom Lightbox Plugin -->
        <script src="js/jquery.fitVids.js" type="text/javascript"></script> <!-- jQuery fitVids Plugin -->
        <script src="js/lockscreen.js" type="text/javascript"></script> <!-- Mahajyothis Lockscreen -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script> <!-- Bootstrap Library -->
     <?php include(JS.'chat/chat.php'); ?>
       
        <script src="js/script.js" type="text/javascript"></script> <!-- Mahajyothis Script -->
        
        <!-- Business Service Scripts -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
    <script type="text/javascript" src="<?php echo base_url().JS;?>business_services/script.js"></script>
    <!-- Business Service Scripts Ends-->
    
<script>
function profile_like(){

    var cid="<?php  echo $profile_row[0]['custID'];   ?>";
    var pid="<?php  echo $user_row[0]['custID'];   ?>";
    var cat="PROFILE";
    var act="LIKE";
    var page="basicprofile";
    var likes=parseInt($("#add_like").html())+1;
    $.ajax({
          url: "<?php echo base_url();?>like?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page
        }).done(function( data ) {
          $("#add_like").html(likes);
           $("#prof_like").html('<span id="prof_unlike"><a href="#" onclick="profile_unlike()"><button class="btn cust-btn-pfle btn-warning unlike"  style="color:#000000;    background-color: #f5a932 !important;"><?php echo $lang['unlike']; ?><span style="padding-left: 15px;"><i class="fa fa-thumbs-up"></i></span></button></a></span>');
          return true;
        }); 
    
}
</script>
<script>
function profile_unlike(){

    var cid="<?php  echo $profile_row[0]['custID'];   ?>";
    var pid="<?php  echo $user_row[0]['custID'];   ?>";
    var cat="PROFILE";
    var act="LIKE";
    var page="basicprofile";
     var likes=parseInt($("#add_like").html())-1;
  
    $.ajax({
          url: "<?php echo base_url();?>like/unlike?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page
        }).done(function( data ) {
        $("#add_like").html(likes);
           $("#prof_unlike").html('<span id="prof_like"><a href="#" onclick="profile_like()"><button class="btn cust-btn-pfle btn-warning like"  style="color:#000000;    background-color: #f5a932 !important;"><?php echo $lang['like']; ?><span style="padding-left: 15px;"><i class="fa fa-thumbs-up"></i></span></button></a></span>');
          return true;
        }); 
    
}
</script>



<script>
 function follow_profile() {
    var cid=<?php  echo $profile_row[0]['custID'];   ?>;
    var pid=<?php  echo $user_row[0]['custID'];   ?>;

        $.ajax({
          url: "<?php base_url();?>following?uid="+pid+" && cuid="+cid
        }).done(function( data ) {
          
           $("#status_change").html('<a href="#"  id="following"><button class="btn cust-btn-pfle btn-warning"  style="background-color: #f5a932 !important; color:#000000"><?php echo $lang['following']; ?><span style="padding-left: 15px;"><img src="/assets/img/user-flwng-icn.png"></span></button> </a>');
          return true;
        });   
      
    }
  
  </script>
    </body>
</html>