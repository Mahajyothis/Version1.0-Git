<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Mahajyothis viewprofile</title>
        
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		
     
   <link rel="stylesheet" href="<?php echo base_url('assets/css/style_basic.css'); ?>" />

        <!-- Scripts are at the bottom of the page -->

    </head>
	<?php 
//print_r($this->session->userdata('profile_data'));
   
        $user_row = $this->session->userdata('basicprofile_data');
        $profile_row = $this->session->userdata('profile_data'); 
        ?>
    <body>

        <!-- BACKGROUND -->
        <img src="assets/img/background-1.jpg" class="background" alt="" />
        <!-- /BACKGROUND -->

        <!-- LOGO -->
        <div class="header">
            <h1>
                <img src="assets/img/logo.png" height="64" width="70" class="header-logo" alt=""/>
                MAHAJYOTHIS
            </h1>
        </div>
        <!-- /LOGO -->

        <!-- MAIN CONTENT SECTION -->
        <section id="content">

            
            <section class="clearfix section" id="about">

                <!-- SECTION TITLE -->
                <h3 class="block-title"></h3>
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
                           <div class="tile imagetile imagetile-scaleup w2 h2">
                <a class="link" href="#">

	 <img src='<?php if(isset($user_row[0]['photo'])){echo base_url('uploads').'/'.$user_row[0]['photo'];}else{echo base_url('uploads').'/profile.png';} ?>' />


</a>



</div>
<div class="profile_interact">

<?php $followed="SELECT * FROM `recentactivity` WHERE `uID`=".$user_row[0]['custID']." AND `raAction`='LIKE' AND `raCategory`='PROFILE' AND `custID`=".$profile_row[0]['custID']."";

$query = $this->db->query($followed);

$like="SELECT COUNT(`uID`) AS `like` FROM `recentactivity` WHERE `uID`=".$user_row[0]['custID']." AND `raAction`='LIKE' AND `raCategory`='PROFILE'";
$query_like = $this->db->query($like);
$val=$query_like->result_array();

if($query->num_rows() == 1){
  ?>


			<?php echo "<font id='add_like' color='white'>(".$val[0]['like'].")</font>"; ?>
			<a class="btn btn-primary" href="#"><i class="fa fa-thumbs-up"></i> Liked</a>

			<?php }else{    ?>		
					
			<?php echo "<font id='add_like' color='white'>(".$val[0]['like'].")</font>";  ?>	
			<span id="prof_like"><a class="btn btn-primary" href="#" onclick="profile_like()" ><i class="fa fa-thumbs-up"></i> Like</a></span>
					
				<?php  }  ?>	
					
<?php $followed="SELECT * FROM `userfollowing` WHERE `cID`=".$profile_row[0]['custID']." AND `custID`=".$user_row[0]['custID']."";

$query = $this->db->query($followed);


if($query->num_rows() == 1){
  ?>
					
				<a class="btn btn-primary" href="#"  id="following"><i class="fa fa-user fa-fw"></i> following</a>
					
<?php }else{    ?>
					
				<span id="status_change"><a class="btn btn-primary" href="#" onclick="follow_profile()"  ><i class="fa fa-user fa-fw"></i> follow</a>	</span>
					
<?php  }  ?>
					
				</div>
<div class="tile black htmltile w3 h4" style="background:red !important"; >
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

        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> <!-- jQuery Library -->
        <script src="js/respond.min.js" type="text/javascript"></script> <!-- Responsive Library -->
        <script src="js/jquery.isotope.min.js" type="text/javascript"></script> <!-- Isotope Layout Plugin -->
        <script src="js/jquery.mousewheel.js" type="text/javascript"></script> <!-- jQuery Mousewheel -->
        <script src="js/jquery.mCustomScrollbar.js" type="text/javascript"></script> <!-- malihu Scrollbar -->
        <script src="js/tileshow.js" type="text/javascript"></script> <!-- Mahajyothis Custom Tileshow Plugin -->
        <script src="js/mlightbox.js" type="text/javascript"></script> <!-- Mahajyothis Custom Lightbox Plugin -->
        <script src="js/jquery.fitVids.js" type="text/javascript"></script> <!-- jQuery fitVids Plugin -->
        <script src="js/lockscreen.js" type="text/javascript"></script> <!-- Mahajyothis Lockscreen -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script> <!-- Bootstrap Library -->

        <script src="js/script.js" type="text/javascript"></script> <!-- Mahajyothis Script -->
<script>
function profile_like(){
	var cid=<?php  echo $profile_row[0]['custID'];   ?>;
	var pid=<?php  echo $user_row[0]['custID'];   ?>;
	var cat="PROFILE";
	var act="LIKE";
	var page="basicprofile";
	
	$.ajax({
          url: "<?php echo base_url();?>like?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page
        }).done(function( data ) {
        $("#add_like").html("<?php echo "(".($val[0]['like']+1).")";  ?>");
		   $("#prof_like").load("../liked.html");
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
          
		   $("#status_change").load("../following.html");
		  return true;
        });   
      
    }
  
  </script>
    </body>
</html>