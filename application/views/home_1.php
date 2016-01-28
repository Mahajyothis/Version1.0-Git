<!DOCTYPE html>
<html lang="en">
   <!--HeaderSection-->
    <head>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mahajyothis viewprofile</title>       
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/Mahajyothis.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/keyframes.css');?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/layout.css');?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('assets/blog/css/bootstrap_common.css');?>" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Scripts are at the bottom of the page -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
     <link rel="stylesheet" href="<?php echo base_url('assets/css/search-bar.css');?>" type="text/css">
     <style>
     .custom{
        padding: 1px 20px!important;
        margin-top:4%;
     border-radius:0px!important;
     background:rgb(242,166,18);
     }
     .name_mavr{
     color:rgb(242,166,18);
     margin-top:8%;
     }
     .network_bar{
     color:rgb(19,221,234);
     padding-left: 11%;
     }
     .opacity_ma{
     }
     </style>
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
              
   
    </head>    
   <!--/Headersection-->   
   <!--bodysection-->
    <body style=" -webkit-box-sizing: inherit; -moz-box-sizing: inherit;  box-sizing: inherit; !important">
        <ul class="cb-slideshow">
            <li><span>Image 01</span></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
            <li><span>Image 04</span></li>
            <li><span>Image 05</span></li>
            <li><span>Image 06</span></li>
        </ul>
       
        <!-- LOGO -->
        <div class="header">
            <h1>
                <img src="<?php echo base_url('assets/img/logo.png');?>" class="header-logo" alt="logo"/>
                MAHAJYOTHIS
            </h1>
        </div>
        <!-- /LOGO -->
        <!-- MAIN CONTENT SECTION -->
        <section id="content">
    <!-- SECTION -->
    <section class="clearfix section" id="start">
        <!-- SECTION TITLE -->
        <h3 class="block-title" >Welcome</h3>
        <!-- /SECTION TITLE -->
        <!-- SECTION TILES -->
        <div class="tile turquoise w2 h1 title-horizontalcenter icon-scaleuprotate360cw">
            <a class="link" href="#" target="_blank">
                <i class="fa fa-tasks icon-1x"></i>
                <p class="title">My Features</p>
            </a>
        </div>
        <div class="tile orange w2 h1 icon-featurecw title-fadeout">
            <a data-scroll="scrollto"  href="#about" class="link">
                <i class="fa fa-user icon-1x"></i>
                <p class="title">About</p>
            </a>
        </div>
        <div class="tile blue title-verticalcenter icon-flip w2 h1">
            <a class="link" data-scroll="scrollto"  href="#portfolio">
                <i class="fa fa-picture-o icon-1x"></i>
                <p class="title">My Portfolio</p>
            </a>
        </div> 
        <div class="tile purple title-scaleup icon-scaledownrotate360cw w2 h1">
            <a class="link" data-scroll="scrollto"  href="#contactform">
                <i class="fa fa-envelope icon-1x"></i>
                <p class="title">Contact</p>
            </a>
        </div>
        <!--<div class="tile green icon-featurefade title-indent w1 h1">
            <a class="link" href="#">
                <i class="fa fa-cloud-download icon-1x"></i>
                
            </a>
        </div>
        <div class="tile blue icon-flip title-fadeout w1 h1">
            <a class="link" data-scroll="scrollto"  href="#services">
                <i class="fa fa-pencil icon-1x"></i>
                
            </a>
        </div>
        <div class="tile imagetile title-indent tileshow w2 h1">
            <div class="slide active">
                <a href="#galleryimage" data-lightbox="mlightboximage" class="link" 
                data-src="<?php echo base_url('assets/img/01_preview.jpg');?>" data-title="Generic" data-description="by PierreBorodin">
                <img src="<?php echo base_url('assets/img/01_thumbnail.jpg');?>" alt="" />
                <p class="title">Latest Work</p>
            </a>
        </div>
        <div class="slide">
            <a href="#galleryimage" data-lightbox="mlightboximage" class="link" 
            data-src="<?php echo base_url('assets/img/02_preview.jpg');?>" data-title="Solana" data-description="by abcgomel">
            <img src="<?php echo base_url('assets/img/02_thumbnail.jpg');?>" alt="" />
            <p class="title">Latest Work</p>
        </a>
    </div>
    <div class="slide">
        <a href="#galleryimage" data-lightbox="mlightboximage" class="link" 
        data-src="<?php echo base_url('assets/img/03_preview.jpg');?>" data-title="Top of the world" data-description="Amazing photomanipulation">
        <img src="<?php echo base_url('assets/img/03_thumbnail.jpg');?>" alt="" />
        <p class="title">Latest Work</p>
    </a>
</div>
</div>
<div class="tile yellow icon-fadeoutscaleup title-fade w1 h1">
    <a class="link" data-scroll="scrollto"  href="#articles">
        <i class="fa fa-signal icon-1x"></i>
        <p class="title">Latest News</p>
    </a>
</div>
<div class="tile title-fade icon-featureccw w2 h1">
    <a class="link" target="_blank" href="http://codecanyon.net/user/grozavcom">
        <div class="text">
            <p class="text-medium">
                View More
            </p>
            <p style=" font-size:14px">
                Quality stuff from us
            </p>
        </div>
        <p class="sub">2</p>
        <p class="title"><i class="fa fa-arrow-right icon-1x"></i></p>
    </a>
</div>
<div class="tile red imagetile tileshow w2 h1">
    <div class="slide active">
        <div class="caption red">
            <a class="link" data-href="blog/post-1.html" href="#blogpost" data-lightbox="mlightboxblog">
                <div class="title"><i class="fa fa-file-text icon-1x"></i></div>
                <div class="caption-text twoline">
                    Strapslide is the new big thing !
                </div>
            </a>
        </div>
        <img src="<?php echo base_url('assets/img/blog1.jpg');?>" alt="" />
    </div>
    <div class="slide">
        <div class="caption red">
            <a class="link" data-href="blog/post-2.html" href="#blogpost" data-lightbox="mlightboxblog">
                <div class="title"><i class="fa fa-file-text icon-1x"></i></div>
                <div class="caption-text">
                    You'll simply love 
                </div>
            </a>
        </div>
        <img src="<?php echo base_url('assets/img/blog2.jpg');?>" alt="" />
    </div>
    <div class="slide">
        <div class="caption red">
            <a class="link" data-href="blog/post-3.html" href="#blogpost" data-lightbox="mlightboxblog">
                <div class="title"><i class="fa fa-file-text icon-1x"></i></div>
                <div class="caption-text">
                    The most amazing UI
                </div>
            </a>
        </div>
        <img src="<?php echo base_url('assets/img/blogpost-3.jpg');?>" alt="" />
    </div>
</div>
<div class="tile red icon-fadeoutscaleup title-fade w1 h1">
    <a class="link" data-scroll="scrollto"  href="#articles">
        <i class="fa fa-file-text icon-1x"></i>
        <p class="title">Blog</p>
    </a>
</div>
<div class="tile blue icon-fadeoutscaleup title-fade w1 h1">
    <a class="link" data-scroll="scrollto"  href="#articles">
        <i class="fa fa-file-text icon-1x"></i>
        <p class="title">Blog</p>
    </a>
</div>-->
<!-- /SECTION TILES -->
</section>
<!-- /SECTION --> 
            <!-- SECTION -->
            <section class="clearfix section" id="portfolio" data-option-key="filter">
                <!-- SECTION TITLE -->
                <h3 class="block-title">Information Pages</h3>
                <!-- /SECTION TITLE -->

               <!-- SECTION TILES -->
    <div class="tile reveal-slide red title-indent icon-flip w2 h1">
        <div class="reveal white w2 h1">
            <div class="text">
                <p style=" font-size:14px">
                    <span class="text-medium">Vastu shastara</span><br/>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                </p>
            </div>
        </div>
        <a class="link" href="#">
         <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/vasthu1.png');?>" width="60" height="60"></center>
         <p class="title">Vastu shastara</p>
     </a>
 </div>
                <div class="tile red imagetile tileshow w2 h1">
                    <div class="slide active">
                        <div class="caption red">
                            <a class="link" data-href="blog/post-1.html" href="#blogpost" data-lightbox="mlightboxblog">
                                <div class="title"><i class="fa fa-file-text icon-1x"></i></div>
                                <div class="caption-text twoline">
                                    Yoga!
                                </div>
                            </a>
                        </div>
                        <img src="<?php echo base_url('assets/img/blog1.jpg');?>" alt="" />
                    </div>
                    <div class="slide">
                        <div class="caption red">
                            <a class="link" data-href="blog/post-2.html" href="#blogpost" data-lightbox="mlightboxblog">
                                <div class="title"><i class="fa fa-file-text icon-1x"></i></div>
                                <div class="caption-text">
                                 Yoga!
                             </div>
                         </a>
                     </div>
                     <img src="<?php echo base_url('assets/img/blog2.jpg');?>" alt="" />
                 </div>
                 <div class="slide">
                    <div class="caption red">
                        <a class="link" data-href="blog/post-3.html" href="#blogpost" data-lightbox="mlightboxblog">
                            <div class="title"><i class="fa fa-file-text icon-1x"></i></div>
                            <div class="caption-text">
                             Yoga!
                         </div>
                     </a>
                 </div>
                 <img src="<?php echo base_url('assets/img/blogpost-3.jpg');?>" alt="" />
             </div>
         </div>
                <div class="tile red imagetile tileshow w2 h1">
                    <div class="slide active">
                        <div class="caption purple">
                            <a class="link" data-href="blog/post-1.html" href="#blogpost" data-lightbox="mlightboxblog">
                                <div class="title"><i class="icon-file-text icon-1x"></i></div>
                                <div class="caption-text twoline">
                                    Festival!
                                </div>
                            </a>
                        </div>
                        <img src="<?php echo base_url('assets/img/blog1.jpg');?>" alt="" />
                    </div>
                    <div class="slide">
                        <div class="caption purple">
                            <a class="link" data-href="blog/post-2.html" href="#blogpost" data-lightbox="mlightboxblog">
                                <div class="title"><i class="icon-file-text icon-1x"></i></div>
                                <div class="caption-text">
                                 Festival!
                             </div>
                         </a>
                     </div>
                     <img src="<?php echo base_url('assets/img/blog2.jpg');?>" alt="" />
                 </div>
                 <div class="slide">
                    <div class="caption purple">
                        <a class="link" data-href="blog/post-3.html" href="#blogpost" data-lightbox="mlightboxblog">
                            <div class="title"><i class="icon-file-text icon-1x"></i></div>
                            <div class="caption-text">
                             Festival!
                         </div>
                     </a>
                 </div>
                 <img src="<?php echo base_url('assets/img/blogpost-3.jpg');?>" alt="" />
             </div>
         </div>
         <div class="tile reveal-slide transparent title-indent icon-flip w2 h1">
            <div class="reveal white w2 h1">
                <div class="text">
                    <p style=" font-size:14px">
                        <span class="text-medium">Travel</span><br/>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </p>
                </div>
            </div>
            <a class="link" href="#">
                <i class="icon-youtube-play icon-1x"></i>
                <p class="title">Travel</p>
            </a>
        </div>
        <div class="tile red icon-fadeoutscaleup title-fade w1 h1">
            <a class="link" data-scroll="scrollto"  href="#articles">
                <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/fengshui.png');?>" width="60" height="60"></center>
                <p class="title">Fengi shui</p>
            </a>
        </div>
        <div class="tile red icon-fadeoutscaleup title-fade w1 h1">
            <a class="link" data-scroll="scrollto"  href="#articles">
                <center style="margin-top:15px;"><img src="<?php echo base_url('assets/img/ayurvedic.png');?>" width="80" height="80"></center>
                <p class="title">Ayur Veda</p>
            </a>
        </div>
        <!-- /SECTION TILES -->
            </section>
            <!-- /SECTIO -->
             <!-- SECTION -->
    <section class="clearfix section" id="about">
        <!-- SECTION TITLE -->
        <h3 class="block-title">Personalities</h3>
        <!-- /SECTION TITLE -->
        <!-- SECTION TILES -->
        <?php if($personalities){
			foreach($personalities as $key => $value){
			?>
			<div class="tile imagetile tileshow w2 pr opacity_ma">             
				 <img src="uploads/<?php if(!empty($value->photo)){echo $value->photo;}else{echo "profile.png";};?>" alt="" style="height:49%;width:60px;padding:12% 12% 0% 12%;float: left;" /> 
					<h4 class="name_mavr"><?php echo ucwords($value->perdataFullName); ?></h4> 
					<h5><?php echo ucwords($value->profProfession); ?></h5>       
				 <a href="<?php echo base_url().'basicprofile?uid='.$value->custID;?>"><button type="button" class="btn btn-warning custom">View</button></a>
				<p class="network_bar"> 
					<span><a href="#" data-toggle="tooltip" data-placement="top" title="likes"><img src="assets/img/like.png"/ style="height: 12px"></a><?php echo $value->likes; ?></span>
					<span><a href="#" data-toggle="tooltip" data-placement="top" title="circles"><img src="assets/img/circle.png"/ style="height: 12px"></a><?php echo $value->circles; ?></span>
					<span><a href="#" data-toggle="tooltip" data-placement="top" title="views"><img src="assets/img/viewers.png"/ style="height: 12px"></a><?php echo $value->views; ?></span>
				</p>
			</div>
		<?php } } ?>
        
        
               <!-- <div class="tile imagetile tileshow w1 pr1">
                    <div class="slide active">
                        <img src="<?php echo base_url('assets/img/profile.jpg');?>" alt="" />
                    </div>
                    <div class="slide">
                        <img src="<?php echo base_url('assets/img/profile.jpg');?>" alt="" />
                    </div>
                    <div class="slide">
                        <img src="<?php echo base_url('assets/img/profile.jpg');?>" alt="" />
                    </div>                 
                </div>
                <div class="tile imagetile tileshow w1 pr1">
                    <div class="slide active">
                        <img src="<?php echo base_url('assets/img/profile.jpg');?>" alt="" />
                    </div>
                    <div class="slide">
                        <img src="<?php echo base_url('assets/img/profile.jpg');?>" alt="" />
                    </div>
                    <div class="slide">
                        <img src="<?php echo base_url('assets/img/profile.jpg');?>" alt="" />
                    </div>                  
                </div>  -->              
            </section>
            <!-- /SECTION -->
            <!-- SECTION -->
            <section class="clearfix section" id="portfolio" data-option-key="filter">
                <!-- SECTION TITLE -->
                <h3 class="block-title">Plugins</h3>
                <!-- /SECTION TITLE -->
                <!-- SECTION TILES --> 
                <div class="tile yellow icon-featurefade w1 h1">
                    <a class="link gemo" href="#" data-option-value=".photography" >
                     <center style="margin-top:15px;"><img src="<?php echo base_url('assets/img/diamondline.png');?>" width="80" height="60"></center>
                     <p class="title">Gemology</p>
                 </a>
             </div>
               <div class="tile green icon-featurefade w1 h1">
        <a class="link zodi" href="#" data-option-value=".video">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/horo.png');?>" width="80" height="80"></center>           
            <p class="title">zodiac</p>
        </a>
    </div>
             <div class="tile blue icon-featurefade w1 h1">
                <a href="#numerology" data-lightbox="mlightboxvideo" class="link" 
                       data-src="<?php base_url();?>numerology" data-title="Numerology" data-description="by Mahajyothis">
                 <center style="margin-top:15px;"><img src="<?php echo base_url('assets/img/white head.png');?>" width="80" height="60"></center>
                 <p class="title">Numerology</p>
             </a>
         </div>
           <div class="tile orange icon-featurefade w1 h1">
          <a href="#" class="link cal">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/calendar.png');?>" width="60" height="60"></center>
            <p class="title">Calender</p>
          </a>
        </div>
     <!--<div class="tile purple icon-featurefade w1 h1">
        <a href="#" data-lightbox="mlightboxvideo" class="link"data-src="<?php base_url();?>reading" data-title="Tarot" data-description="by Mahajyothis">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/tarot.png');?>" width="60" height="60"></center>
            
            <p class="title">Taroet Prediction</p>
        </a>
    </div>-->
       <div class="tile purple icon-featurefade w1 h1">
                    <a class="link tar" href="#" data-option-value=".video">
                        <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/tarot.png');?>" width="60" height="60"></center>
                        
                        <p class="title">Taroet Prediction</p>
                    </a>
                </div>
    <div class="tile red icon-featurefade w1 h1">
            <a href="#love" data-lightbox="mlightboxvideo" class="link" 
                       data-src="<?php base_url();?>lovemeter" data-title="Love Meter" data-description="by Mahajyothis">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/love.png');?>" width="60" height="60"></center>
            <p class="title">Love Calculator</p>
        </a>
    </div>
    <div class="tile turquoise icon-featurefade w1 h1">
            <a href="#friend" data-lightbox="mlightboxvideo" class="link" 
                       data-src="<?php base_url();?>friend" data-title="Friendship Meter" data-description="by Mahajyothis">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/frnd.png');?>" width="60" height="60"></center>
            <p class="title">Friendship Meter</p>
        </a>
    </div>
    <div class="tile yellow icon-featurefade w1 h1">
            <a href="#charecter" data-lightbox="mlightboxvideo" class="link" 
                       data-src="<?php base_url();?>knowyourcharecter" data-title="Know Your Character" data-description="by Mahajyothis">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/frnd.png');?>" width="60" height="60"></center>
            <p class="title">Know Your Charecter</p>
        </a>
    </div>
    <!-- /SECTION TILES -->
</section>
<!-- /SECTION -->
 <section class="clearfix section" id="services">
            <!-- SECTION TILES -->
             <h3 class="block-title">Recent Blogs</h3>

<?php foreach($recentblogs as $recent_blogs){
	?>


            
            
            <div class="tile red imagetile tileshow w2 h1">
                    <div class=" active">
                        <div class="caption red">
                            <a class="link" href="http://blog.mahajyothis.net/entry/<?php echo $recent_blogs->permalink;   ?>" target="_blank" style="    text-decoration: none;">
                                <div class="title"><i class="icon-file-text icon-1x"></i></div>
                                <div class="caption-text twoline">
                                    <?php echo $recent_blogs->title; ?>
                                </div>
                            </a>
                        </div>
                   
                    <?php	$obj = json_decode($recent_blogs->image); 
									echo "<img src='".$obj->{'url'}."' >";
									?>
                    </div>
                    
         </div>
            
            <?php } ?>
 </section>
             <section class="clearfix section" id="services">
            <!-- SECTION TILES -->
           
             <h3 class="block-title">Recent Articles</h3>
            <?php if($recentarticles){
			foreach($recentarticles as $key => $value){
			?>
			<a class="link" href="<?php echo base_url().'article/view/'.$this->custom_function->create_ViewUrl($value->artID,$value->artTitle);?>">
			<div class="tile reveal-slide red title-indent icon-flip w2 h1">
				<div class="reveal white w2 h1">
					<div class="text">
						<p style=" font-size:14px">
							<span class="text-medium"><?php echo $value->artTitle; ?></span><br/>
							<?php echo $value->artSummary; ?>
						</p>
					</div>
				</div>
				<a class="link" href="<?php echo base_url().'article/view/'.$this->custom_function->create_ViewUrl($value->artID,$value->artTitle);?>">
					<center style="margin-top:15px;"> <img src="<?php echo ($value->artImage && file_exists(ARTICLES.$value->artImage)) ? base_url().ARTICLES.$value->artImage : base_url().ARTICLES.'Article-Default.jpg';?>" alt="<?php echo $value->artTitle; ?>" title="<?php echo $value->artTitle; ?>" ></center>
					<p class="title"><?php echo $value->artTitle; ?></p>
			</div>
			</a>
			<?php } } ?>  
         

     </section>
            <!-- SECTION -->
            
            <section class="clearfix section" id="services">
            <!-- SECTION TILES -->
           <h3 class="block-title">Recent Courses</h3>
		   
            <?php $path='http://edu.mahajyothis.net/uploads/course/CoverImage/';
			if($recentcourses){
			foreach($recentcourses as $key => $value){
			?>
			<a class="link" <?php if(!empty($this->session->userdata['profile_data'][0]['custID'])){ ?> href="<?php echo 'http://edu.mahajyothis.net/course/view/'.$value->ecTitle.'/'.$value->ecID;?>" <?php } else { ?> data-toggle="modal" data-target="#signin" <?php } ?> >
			<div class="tile reveal-slide red title-indent icon-flip w2 h1">
				<div class="reveal white w2 h1">
					<div class="text">
						<p style=" font-size:14px">
							<span class="text-medium"><?php echo $value->ecTitle; ?></span><br/>
							<?php echo $value->ecDescription; ?>
						</p>
					</div>
				</div>
				<a class="link" <?php if(!empty($this->session->userdata['profile_data'][0]['custID'])){ ?> href="<?php echo 'http://edu.mahajyothis.net/course/view/'.$value->ecTitle.'/'.$value->ecID;?>" <?php } else { ?> data-toggle="modal" data-target="#signin" <?php } ?> >
					<center style="margin-top:15px;"> <img src="<?php echo ($value->ecImage && ISSET($value->ecImage)) ? $path.$value->ecImage : base_url().ARTICLES.'Article-Default.jpg';?>" alt="<?php echo $value->ecTitle; ?>" title="<?php echo $value->ecTitle; ?>" ></center>
					<p class="title"><?php echo $value->ecTitle; ?></p>
			</div>
			</a>
			<?php } } ?>  
          </section>
		 
		 
            
            
            
         <!-- SECTION -->
            <section class="clearfix section" id="contactform">
                <!-- SECTION TITLE -->
                <h3 class="block-title">Contact</h3>
                <!-- /SECTION TITLE -->
                <!-- SECTION TILES -->
                <div class="tile black htmltile w3 h4">
                    <div class="tilecontent">
                        <div class="content">
                            <div class="hide textcenter" id="messagesuccess">
                                <br/><br/><br/>
                                <h1>Thank you! <a class="icon-envelope"></a></h1>
                                <br/><br/><br/>
                                <h3>Your message has been sent.</h3>
                                <br/><br/><br/><br/><br/>
                            </div>
                            <div id="messageload" class="hide textcenter">
                                <h3>Sending</h3><br/>
                                <img src="assets/img/preloader.gif" alt="..."/>                          </div>

                            <form id="contactme" class="form-dark" name="cform" method="post" action="http://Mahajyothis.grozav.com/mail.php">
                                <div class="row-fluid">
                                    <label>First Name <span class="hide label-important firstname-missing pull-right">First name is missing!</span></label>
                                    <input id="firstname" name="firstname" type="text" class="col-md-12" placeholder="Your First Name">
                                </div>
                                <div class="row-fluid">
                                    <label>Last Name <span class="hide label-important lastname-missing pull-right">Last name is missing!</span></label>
                                    <input id="lastname" name="lastname" type="text" class="col-md-12" placeholder="Your Last Name">
                                </div>
                                <div class="row-fluid">
                                    <label>Email Address <span class="hide label-important email-missing pull-right">Email is missing or incorrect!</span></label>
                                    <input id="email" name="email" type="text" class="col-md-12" placeholder="Your email address">
                                </div>
                                <div class="row-fluid">
                                    <label>Subject</label>
                                    <select id="subject" name="subject" class="col-md-12">
                                        <option value="service">General Customer Service</option>
                                        <option value="suggestions">Suggestions</option>
                                        <option value="product">Product Support</option>
                                    </select>
                                </div>

                                <div class="row-fluid">
                                    <label>Message <span class="hide label-important message-missing pull-right">You forgot to enter a message!</span></label>
                                    <textarea name="message" id="message" class="input-xlarge col-md-12" rows="4"></textarea>
                                </div>
                                <div class="row-fluid">
                                    <button type="submit" class="btn btn-primary btn-block pull-right">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /SECTION TILES -->
            </section>
            <!-- /SECTION -->        
        </section> 
        <!-- /MAIN CONTENT SECTION -->
      <div class="search-bar-home">
    <form class="searchbox" style="clear:both">
        <input type="search" placeholder="Search......" name="search" class="searchbox-input home_search" onkeyup="buttonUp();" required>
        <input type="submit" class="searchbox-submit" value="Go">
        <span class="searchbox-icon"><i class="fa fa-search"></i></span>
		
    </form>
	<ul class="listing-styles">
	<span class="search_result"></span>
	</ul>
	<ul class = "nav nav-tabs nav-mahajyothis">


   <li class = "dropdown dropdown-mahajyothis">
      <a class = "dropdown-toggle" data-toggle = "dropdown" href = "#">
        Select Language
         <span class = "caret"></span>
      </a>

      <ul class = "dropdown-menu">
         <li><a href = "#">Malayalam</a></li>
            <li class = "divider"></li>
         <li><a href = "#">English</a></li>
            <li class = "divider"></li>
         <li><a href = "#">Tamil</a></li>
            <li class = "divider"></li>
         <li><a href = "#">Hindi</a></li>
      </ul>

   </li>
</ul>
 <div id="opensidebar">
         <?php 

        if($this->session->userdata('profile_data')){
          echo '<i class="logged_user"><img src='.base_url('uploads').'/'.$this->session->userdata['profile_data'][0]['photo'].'></i>';
          echo '<ul class="drop"><a href='.base_url().'user/'.$this->session->userdata['profile_data'][0]['custName'].'><li>view profile</li></a>
                <a href='.base_url().'Logout'.'><li>logout</li></a></ul>';
          } 
          else echo '<i data-toggle="modal" data-target="#signin" class="fa fa-user icon-4x" style="font-size: 34px;" ></i>'; ?>        
        
        </div>
	</div>
        <!-- SIDEBAR -->         
       
       <?php $this->load->view('login'); ?>
       <?php $this->load->view('register'); ?>
       <?php $this->load->view('forgot_password'); ?>       
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
        <!-- NUMEROLOGY LIGHTBOX -->
        <section class="mlightbox" id="numerology">
            <section class="mlightbox-content">
                <div class="fitvideo">
                    <iframe src="<?php base_url();?>numerology"></iframe>
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
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-facebook-sign"></i> Like us on Facebook</a></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-twitter-sign"></i> Follow us on Twitter</a></li>
                </ul>
            </section>
        </section>
        <!-- /NUMEROLOGY LIGHTBOX -->       
        <!-- CLALENDAR LIGHTBOX -->
		   <section class="glightbox" id="calendar-page" style="display:none">
		    <section class="glightbox-content cal-content">
		      
		    </section>
		    <section class="glightbox-details">
		      <div class="glightbox-description">
		        <h2 class='mlightbox-title'>Mahajyothis</h2>
		        <p class="glightbox-subtitle muted">by Sudheep</p>
		      </div>
		      <ul class="glist">
		        <li><a class="close-clightbox" href="#"><i class="icon-arrow-left"></i> Back to Mahajyothis</a></li>
		        <li></li>
		        <li><a target="_blank" href="http://facebook.com/"><i class="icon-facebook-sign"></i> Like us on Facebook</a></li>
		        <li><a target="_blank" href="https://twitter.com/intent/user?screen_name=grozavcom"><i class="icon-twitter-sign"></i> Follow us on Twitter</a></li>
		      </ul>
		    </section>
		  </section>
        <!-- /CALENDAR LIGHTBOX -->
        <!--TAROTLIGHTBOX -->
        <!--section class="mlightbox" id="tarot">
            <section class="mlightbox-content tar-content">
           
            </section>
            <section class="mlightbox-details">
                <div class="mlightbox-description">
                    <h2 class='mlightbox-title'>Mahajyothis</h2>
                    <p class="mlightbox-subtitle muted">by Grozav</p>
                </div>
                <ul class="mlist">
                    <li><a class="close-mlightbox" href="#"><i class="icon-arrow-left"></i> Back to Mahajyothis</a></li>
                    <li></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-facebook-sign"></i> Like us on Facebook</a></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-twitter-sign"></i> Follow us on Twitter</a></li>
                </ul>
            </section>
        </section-->
         <section class="glightbox" id="tarot-page" style="display:none">
            <section class="glightbox-content tar-content"  >
                
            </section>
            <section class="glightbox-details">
                <div class="glightbox-description">
                    <h2 class='mlightbox-title'>Mahajyothis</h2>
                    <p class="glightbox-subtitle muted">by Coder</p>
                </div>
                <ul class="glist">
                    <li><a class="close-tlightbox" href="#"><i class="icon-arrow-left"></i> Back to Mahajyothis</a></li>
                    <li></li>
                    <li><a target="_blank" href="http://facebook.com/"><i class="icon-facebook-sign"></i> Like us on Facebook</a></li>
                    <li><a target="_blank" href="https://twitter.com/intent/user?screen_name=grozavcom"><i class="icon-twitter-sign"></i> Follow us on Twitter</a></li>
                </ul>
            </section>
        </section>
        <!-- /know LIGHTBOX -->
        <!--CHARECTER LIGHTBOX -->
        <section class="mlightbox" id="charecter">
            <section class="mlightbox-content">
                <div class="fitvideo">
                    <iframe width="560" height="315" src="<?php base_url();?>knowyourcharecter"></iframe>
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
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-facebook-sign"></i> Like us on Facebook</a></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-twitter-sign"></i> Follow us on Twitter</a></li>
                </ul>
            </section>
        </section>
        <!-- /CHARECTER LIGHTBOX -->
        <!--LOVE LIGHTBOX -->
        <section class="mlightbox" id="love">
            <section class="mlightbox-content">
                <div class="fitvideo">
                    <iframe width="560" height="315" src="<?php base_url();?>lovemeter"></iframe>
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
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-facebook-sign"></i> Like us on Facebook</a></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-twitter-sign"></i> Follow us on Twitter</a></li>
                </ul>
				
				
            </section>
        </section>
        <!-- /LOVELIGHTBOX -->
         <!--FRIEND LIGHTBOX -->
        <section class="mlightbox" id="friend">
            <section class="mlightbox-content">
                <div class="fitvideo">
                    <iframe width="560" height="315" src="<?php base_url();?>friend"></iframe>
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
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-facebook-sign"></i> Like us on Facebook</a></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-twitter-sign"></i> Follow us on Twitter</a></li>
                </ul>
				
            </section>
        </section>
        <!-- /FRIEND LIGHTBOX -->                
        <!-- GEMOLOGY LIGHTBOX -->    
            <section class="glightbox" id="gemology-page" style="display:none">
                <section class="glightbox-content gem-content">
                    
                </section>
                <section class="glightbox-details">
                    <div class="glightbox-description">
                        <h2 class='mlightbox-title'>Mahajyothis</h2>
                        <p class="glightbox-subtitle muted">by Sudheep</p>
                    </div>
                    <ul class="glist">
                        <li><a class="close-glightbox" href="#"><i class="icon-arrow-left"></i> Back to Mahajyothis</a></li>
                        <li></li>
                        <li><a target="_blank" href="http://facebook.com/"><i class="icon-facebook-sign"></i> Like us on Facebook</a></li>
                        <li><a target="_blank" href="https://twitter.com/intent/user?screen_name=grozavcom"><i class="icon-twitter-sign"></i> Follow us on Twitter</a></li>
                    </ul>
                </section>
            </section>
        <!-- GEMOLOGY ENDS-->
 <!-- ZODIAC LIGHTBOX -->   
                <section class="glightbox" id="zodiac-page" style="display:none">
                    <section class="glightbox-content zod-content">
                        
                    </section>
                    <section class="glightbox-details">
                        <div class="glightbox-description">
                            <h2 class='mlightbox-title'>Mahajyothis</h2>
                            <p class="glightbox-subtitle muted">by Sudheep</p>
                        </div>
                        <ul class="glist">
                            <li><a class="close-zlightbox" href="#"><i class="icon-arrow-left"></i> Back to Mahajyothis</a></li>
                            <li></li>
                            <li><a target="_blank" href="http://facebook.com/"><i class="icon-facebook-sign"></i> Like us on Facebook</a></li>
                            <li><a target="_blank" href="https://twitter.com/intent/user?screen_name=grozavcom"><i class="icon-twitter-sign"></i> Follow us on Twitter</a></li>
                        </ul>
                    </section>
                </section>
            <!-- ZODIAC ENDS-->   
<iframe width="560" height="315" src="<?php base_url();?>friend"></iframe>
	
	
      <!--Footer-->  
<nav class="navbar navbar-inverse navbar-fixed-bottom" style="background:rgba(0,0,0,0); margin-bottom:11px; margin-top:20px;">
        <section>
 <footer class="footer">
 <div class="col-xs-12 col-sm-4">   
          <ul style="text-align:center">        
    <!--<li style="color:#AA3E03">Bibin</li>-->
    <li style="color:#AA3E03"><i class="fa fa-flag icon-1x"></i></li>
    <li style="color:#AA3E03"> <i class="fa fa-cog icon-1x" ></i></li>
    <li style="color:#AA3E03"> <i class="fa fa-tint icon-1x" ></i></li>
    <li style="color:#AA3E03"> <i class="fa fa-search icon-1x" ></i></li>
    </ul>
   </div>
    <div class="col-xs-12 col-sm-7">
            <ul style="text-align:center;padding-right: 11px;">    
               <li>About Us </li>
                <li>Terms </li>
                <li>Legal</li>
                <li>Privacy</li>
                <li>Feedback</li>
                <li>&#169; 2015 Mahajyothis Astro and vedic Research Pvt Ltd</li>
            </ul>
      </div>
        </footer>
        <!--/Footer-->
        <style>
        .footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  background:rgba(0,0,0,0.8);
  padding:1%
        }
        .footer ul li{ display:inline}
        .footer ul li{padding: 7px; font-size:100%}
        /*.footer ul{padding: 14px;   margin-left: 6.8%;}*/
        </style>
</section>
</nav>
        <!-- BLOG LIGHTBOX -->
        <section class="mlightbox" id="blogpost">
            <section class="blogpost-content">
            </section>
            <section class="blogpost-details">
            </section>
        </section>     
        <!-- /BLOG LIGHTBOX -->
    <script type="text/javascript">
          var base_url = "<?php echo base_url(); ?>";
    </script>
    
   	 <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> <!-- jQuery Library -->
   	 <script src="<?php echo base_url('assets/js/search-bar.js');?>" type="text/javascript"></script> <!-- search bar -->
        <script src="<?php echo base_url('assets/js/respond.min.js');?>" type="text/javascript"></script> <!-- Responsive Library -->
        <script src="<?php echo base_url('assets/js/jquery.isotope.min.js');?>" type="text/javascript"></script> <!-- Isotope Layout Plugin -->
        <script src="<?php echo base_url('assets/js/jquery.mousewheel.js');?>" type="text/javascript"></script> <!-- jQuery Mousewheel -->
        <script src="<?php echo base_url('assets/js/jquery.mCustomScrollbar.js');?>" type="text/javascript"></script> <!-- malihu Scrollbar -->
        <script src="<?php echo base_url('assets/js/tileshow.js');?>" type="text/javascript"></script> <!-- Mahajyothis Custom Tileshow Plugin -->
        <script src="<?php echo base_url('assets/js/mlightbox.js');?>" type="text/javascript"></script> <!-- Mahajyothis Custom Lightbox Plugin -->
        <script src="<?php echo base_url('assets/js/jquery.fitVids.js');?>" type="text/javascript"></script> <!-- jQuery fitVids Plugin -->
        <!--script src="<?php echo base_url('assets/js/lockscreen.js');?>" type="text/javascript"></script--> <!-- Mahajyothis Lockscreen -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script> <!-- Bootstrap Library -->
        <script src="<?php echo base_url('assets/js/validate.js');?>" type="text/javascript"></script> <!-- My Library -->
        <script src="<?php echo base_url('assets/js/jquery-ui-datepicker.js');?>"></script>
        <script src="<?php echo base_url('assets/js/script.js');?>" type="text/javascript"></script> <!-- Mahajyothis Script -->
          <script src="<?php echo base_url('assets/js/plugins.js');?>" type="text/javascript"></script>
 
          
          
       <script>
			$(document).ready(function () {
				$(document).on('keyup','.home_search',function(){
				 
				 var keyword=$(this).val();
				
							$.ajax({
          url: "<?php echo base_url();?>searching/search_results?keyword="+keyword
        }).done(function( data ) {
		 $(".search_result").html(data);
		  return true;
        }); 
				  });
		 });
		</script>
  <script type="text/javascript"> 
        $('#g_dob').datepicker({
                            dateFormat:'yy-mm-dd',
                            changeMonth:true,
                            changeYear:true,
                            yearRange:'-40:5-',
            onSelect : function(){
                $('#g_dob').val(this.value);                  
         function calculateAge(birthday) {
            var now = new Date();
            var past = new Date(birthday);
            var nowYear = now.getFullYear();
            var pastYear = past.getFullYear();
            var age = nowYear - pastYear;
            return age;
            };
            $('#g_age').val(calculateAge(this.value));
            }
        });
</script>
  <script type="text/javascript"> var base_url = "<?php echo base_url(); ?>"; </script>

<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=42190767"></script>
    </body>
    <!--/bodysection-->
</html>