d<!doctype html>
<html lang="en">
   <!--HeaderSection-->
    <head>
<?php
if($_SERVER['REQUEST_URI']=='/?' || $_SERVER['REQUEST_URI']=='/'||$_SERVER['REQUEST_URI']=='?'||$_SERVER['REQUEST_URI']=='/index.php/registration'||$_SERVER['REQUEST_URI']=='/index.php' ||$_SERVER['REQUEST_URI']=='/user' ||$_SERVER['REQUEST_URI']=='/logout'){
echo "<section class='mlightbox' id='lockscreen'>
            <div id='lockscreen-content'>
                <img src='assets/img/logo.png' height='109' width='140' id='locklogo'  alt='Mahajyothis'/>
                <br/><br/>
                <img src='assets/img/preloader.gif' id='lockloader'  alt='Loading..'/>
            </div>
        </section>";
}

?>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mahajyothis viewprofile</title>       
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/Mahajyothis.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/style3.css" />
        <link rel="stylesheet" href="assets/css/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/panl-style.css">
        <!-- Scripts are at the bottom of the page -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
                <img src="<?php echo base_url('assets/img/logo.png');?>" height="64" width="70" class="header-logo" alt=""/>
                MAHAJYOTHIS
            </h1>
        </div>
        <!-- /LOGO -->
        <!-- MAIN CONTENT SECTION -->
        <section id="content">
    <!-- SECTION -->
    <section class="clearfix section" id="start">
        <!-- SECTION TITLE -->
        <h3 class="block-title" style="color:#FFF; font-size:24px;">Welcome</h3>
        <!-- /SECTION TITLE -->
        <!-- SECTION TILES -->
        <div class="tile turquoise w2 h1 title-horizontalcenter icon-scaleuprotate360cw">
            <a class="link" href="#" target="_blank">
                <i class="icon-tasks icon-1x"></i>
                <p class="title">My Features</p>
            </a>
        </div>
        <div class="tile orange w2 h1 icon-featurecw title-fadeout">
            <a data-scroll="scrollto"  href="#about" class="link">
                <i class="icon-user icon-1x"></i>
                <p class="title">About</p>
            </a>
        </div>
        <div class="tile blue title-verticalcenter icon-flip w2 h1">
            <a class="link" data-scroll="scrollto"  href="#portfolio">
                <i class="icon-picture icon-1x"></i>
                <p class="title">My Portfolio</p>
            </a>
        </div> 
        <div class="tile purple title-scaleup icon-scaledownrotate360cw w2 h1">
            <a class="link" data-scroll="scrollto"  href="#contactform">
                <i class="icon-envelope icon-1x"></i>
                <p class="title">Contact</p>
            </a>
        </div>
        <div class="tile green icon-featurefade title-indent w1 h1">
            <a class="link" href="#">
                <i class="icon-cloud-download icon-1x"></i>
                <!-- <p class="title">Buy Template</p>-->
            </a>
        </div>
        <div class="tile blue icon-flip title-fadeout w1 h1">
            <a class="link" data-scroll="scrollto"  href="#services">
                <i class="icon-pencil icon-1x"></i>
                <!--<p class="title">Our Services</p>-->
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
        <i class="icon-signal icon-1x"></i>
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
        <p class="title"><i class="icon-arrow-right icon-1x"></i></p>
    </a>
</div>
<div class="tile red imagetile tileshow w2 h1">
    <div class="slide active">
        <div class="caption red">
            <a class="link" data-href="blog/post-1.html" href="#blogpost" data-lightbox="mlightboxblog">
                <div class="title"><i class="icon-file-text icon-1x"></i></div>
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
                <div class="title"><i class="icon-file-text icon-1x"></i></div>
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
                <div class="title"><i class="icon-file-text icon-1x"></i></div>
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
        <i class="icon-file-text icon-1x"></i>
        <p class="title">Blog</p>
    </a>
</div>
<div class="tile blue icon-fadeoutscaleup title-fade w1 h1">
    <a class="link" data-scroll="scrollto"  href="#articles">
        <i class="icon-file-text icon-1x"></i>
        <p class="title">Blog</p>
    </a>
</div>
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
                                <div class="title"><i class="icon-file-text icon-1x"></i></div>
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
                                <div class="title"><i class="icon-file-text icon-1x"></i></div>
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
                            <div class="title"><i class="icon-file-text icon-1x"></i></div>
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
        <h3 class="block-title" style="color:#FFF; font-size:24px;">Personalities</h3>
        <!-- /SECTION TITLE -->
        <!-- SECTION TILES -->
        <div class="tile imagetile tileshow w2 pr">
            <div class="slide active">
                <img src="<?php echo base_url('assets/img/profile.jpg');?>" alt="" />
            </div>
            <div class="slide">
                <img src="<?php echo base_url('assets/img/profile.jpg');?>" alt="" />
            </div>
            <div class="slide">
                <img src="<?php echo base_url('assets/img/profile.jpg');?>" alt="" />
            </div>
                   <!-- <a class="link" href="#">
                        <img src="img/profile.jpg" alt="User Profile" />
                    </a>-->
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
                </div>                
            </section>
            <!-- /SECTION -->
            <!-- SECTION -->
            <section class="clearfix section" id="portfolio" data-option-key="filter">
                <!-- SECTION TITLE -->
                <h3 class="block-title" style="color:#FFF; font-size:24px;">Plugins</h3>
                <!-- /SECTION TITLE -->
                <!-- SECTION TILES -->
                <div class="tile turquoise icon-featurefade w1 h1">
                    <a class="link" href="#" data-option-value="*">
                        <center style="margin-top:10px;"> <img src="<?php echo base_url('assets/img/horo.png');?>" width="80" height="80"></center>
                        <p class="title">Horescope</p>
                    </a>
                </div>
                <div class="tile yellow icon-featurefade w1 h1">
                    <a class="link gemo" href="#" data-option-value=".photography" >
                     <center style="margin-top:15px;"><img src="<?php echo base_url('assets/img/diamondline.png');?>" width="80" height="60"></center>
                     <p class="title">Gemology</p>
                 </a>
             </div>
               <div class="tile purple icon-featurefade w1 h1">
        <a class="link zodi" href="#" data-option-value=".video">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/tarot.png');?>" width="60" height="60"></center>           
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
            <a href="#calendar" data-lightbox="mlightboxvideo" class="link" 
                       data-src="<?php base_url();?>calendar" data-title="Calendar" data-description="by Mahajyothis">
             <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/calendar.png');?>" width="60" height="60"></center>
             <p class="title">Calender</p>
         </a>
     </div>
     <div class="tile purple icon-featurefade w1 h1">
        <a href="#tarot" data-lightbox="mlightboxvideo" class="link" 
                       data-src="<?php base_url();?>tarotreading" data-title="Tarot" data-description="by Mahajyothis">
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
    <div class="tile red icon-featurefade w1 h1">
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
    <div class="tile red icon-featurefade w1 h1">
                   <label for="r1">
                        <div class="slider">
                            <p class="title">Article</p>
                        </div>
                    </label>
    </div>
    <!-- /SECTION TILES -->
</section>
<!-- /SECTION -->
 <section class="clearfix section" id="services">
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
                                <div class="title"><i class="icon-file-text icon-1x"></i></div>
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
                                <div class="title"><i class="icon-file-text icon-1x"></i></div>
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
                            <div class="title"><i class="icon-file-text icon-1x"></i></div>
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
        <p class="title">Blog</p>
    </a>
</div>
<div class="tile red icon-fadeoutscaleup title-fade w1 h1">
    <a class="link" data-scroll="scrollto"  href="#articles">
        <center style="margin-top:15px;"><img src="<?php echo base_url('assets/img/ayurvedic.png');?>" width="80" height="80"></center>
        <p class="title">Blog</p>
    </a>
</div>
<div class="tile red icon-fadeoutscaleup title-fade w1 h1">
    <a class="link" data-scroll="scrollto"  href="#articles">
        <center style="margin-top:15px;"><img src="<?php echo base_url('assets/img/ayurvedic.png');?>" width="80" height="80"></center>
        <p class="title">Ayur Veda</p>
    </a>
</div>
<!-- /SECTION TILES -->
<div class="tile imagetile tileshow w2 pr">
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
                </div>
            </section>
             <section class="clearfix section" id="services">
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
                                <div class="title"><i class="icon-file-text icon-1x"></i></div>
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
                                <div class="title"><i class="icon-file-text icon-1x"></i></div>
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
                            <div class="title"><i class="icon-file-text icon-1x"></i></div>
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
        <p class="title">Blog</p>
    </a>
</div>
<div class="tile red icon-fadeoutscaleup title-fade w1 h1">
    <a class="link" data-scroll="scrollto"  href="#articles">
        <center style="margin-top:15px;"><img src="<?php echo base_url('assets/img/ayurvedic.png');?>" width="80" height="80"></center>
        <p class="title">Blog</p>
    </a>
</div>
<div class="tile red icon-fadeoutscaleup title-fade w1 h1">
    <a class="link" data-scroll="scrollto"  href="#articles">
        <center style="margin-top:15px;"><img src="<?php echo base_url('assets/img/ayurvedic.png');?>" width="80" height="80"></center>
        <p class="title">Ayur Veda</p>
    </a>
</div>
<!-- /SECTION TILES -->
<div class="tile imagetile tileshow w2 pr">
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
                </div>
            </section>
            <!-- SECTION -->
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
        <!-- SIDEBAR -->
        <div id="opensidebar"><i data-toggle="modal" data-target="#signin" class="icon-user icon-3x"></i></div>
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
        <!-- CALENDARLIGHTBOX -->
        <section class="mlightbox" id="calendar">
            <section class="mlightbox-content">
                <div class="fitvideo">
                    <iframe width="560" height="315" src="<?php base_url();?>calendar"></iframe>
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
        <!-- /CALENDAR LIGHTBOX -->
        <!--TAROTLIGHTBOX -->
        <section class="mlightbox" id="tarot">
            <section class="mlightbox-content">
                <div class="fitvideo">
                    <iframe width="560" height="315" src="<?php base_url();?>tarotreading"></iframe>
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
        <!-- /TAROT LIGHTBOX -->
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
                <section class="glightbox-content">
                    <?php $this->load->view('gemology'); ?>
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
                    <section class="glightbox-content">
                        <?php $this->load->view('zodiac'); ?>
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
  			<?php $this->load->view('article'); ?>    
      <!--Footer-->  
<nav class="navbar navbar-inverse navbar-fixed-bottom" style="background:rgba(0,0,0,0); margin-bottom:11px; margin-top:20px;">
        <section>
 <footer class="footer">
 <div class="col-xs-12 col-sm-4">   
          <ul style="text-align:center">        
    <!--<li style="color:#AA3E03">Bibin</li>-->
    <li style="color:#AA3E03"><i class="icon-flag icon-1x"></i></li>
    <li style="color:#AA3E03"> <i class="icon-cog icon-1x" ></i></li>
    <li style="color:#AA3E03"> <i class="icon-tint icon-1x" ></i></li>
    <li style="color:#AA3E03"> <i class="icon-search icon-1x" ></i></li>
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
        </section>-->       
        <!-- /BLOG LIGHTBOX -->
    <script type="text/javascript">
          var base_url = "<?php echo base_url(); ?>";
    </script>
       <script src="<?php echo base_url('assets/js/jquery-latest.min.js');?>" type="text/javascript"></script><!-- jQuery Library -->
        <script src="<?php echo base_url('assets/js/respond.min.js');?>" type="text/javascript"></script> <!-- Responsive Library -->
        <script src="<?php echo base_url('assets/js/jquery.isotope.min.js');?>" type="text/javascript"></script> <!-- Isotope Layout Plugin -->
        <script src="<?php echo base_url('assets/js/jquery.mousewheel.js');?>" type="text/javascript"></script> <!-- jQuery Mousewheel -->
        <script src="<?php echo base_url('assets/js/jquery.mCustomScrollbar.js');?>" type="text/javascript"></script> <!-- malihu Scrollbar -->
        <script src="<?php echo base_url('assets/js/tileshow.js');?>" type="text/javascript"></script> <!-- Mahajyothis Custom Tileshow Plugin -->
        <script src="<?php echo base_url('assets/js/mlightbox.js');?>" type="text/javascript"></script> <!-- Mahajyothis Custom Lightbox Plugin -->
        <script src="<?php echo base_url('assets/js/jquery.fitVids.js');?>" type="text/javascript"></script> <!-- jQuery fitVids Plugin -->
        <script src="<?php echo base_url('assets/js/lockscreen.js');?>" type="text/javascript"></script> <!-- Mahajyothis Lockscreen -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script> <!-- Bootstrap Library -->
        <script src="<?php echo base_url('assets/js/validate.js');?>" type="text/javascript"></script> <!-- My Library -->
        <script src="<?php echo base_url('assets/js/jquery-ui-datepicker.js');?>"></script>
        <script src="<?php echo base_url('assets/js/script.js');?>" type="text/javascript"></script> <!-- Mahajyothis Script -->
         <?php
if(isset($_GET['sec'] ) && isset($_GET['uid'])){
	$security=$_GET['sec'];
	$secur=base64_decode($security);
	$uid=$_GET['uid'];
	
	 $con=mysqli_connect("localhost","mavrf","102238066","mavrf");
	$update="UPDATE `customermaster` cm LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) SET cm.`custStatus`='15' WHERE e.`emailID`='$secur'";
	$query=mysqli_query($con,$update);
	
	
}

if(isset($_GET['security']) && isset($_GET['uid']))
{

$id=$_GET['uid'];
$_SESSION['cust']=$id;
    $security=$_GET['security'];    
    $con=mysqli_connect("localhost","mavrf","102238066","mavrf");
    $query = "SELECT e.`custID` FROM `email` e LEFT JOIN `customermaster`cm ON(cm.`custID`=e.`custID`) WHERE e.`custID` = '".$_SESSION['cust']."' && e.`security`='$security' && cm.`custStatus`='10'";
$result = mysqli_query($con, $query);

    if(mysqli_num_rows($result)==1){ 
    
    $update=mysqli_query($con,"UPDATE `customermaster` SET `custStatus`='15' WHERE `custID`=".$_SESSION['cust']."");
    
    echo    "<script type='text/javascript'>
            $('#register').modal('toggle');
             closeOnEscape: false,
$( '#register').unbind( 'click' );               
$('.page-nav').children().eq(1).c
ss('opacity',1).siblings().css('opacity','0.20');
    </script>";
    }
    else{
        echo "<script type='text/javascript'>
        $('#click-register').on('click',function(){
            $('#register').modal('toggle');
            $('#signin').modal('toggle');

        }); 
        $('#click-forgot').on('click',function(){
            $('#forgot').modal('toggle');
            $('#signin').modal('toggle');
        }); 
    </script>";
    }   

}   
else
{
    echo "<script type='text/javascript'>
        $('#click-register').on('click',function(){
            $('#register').modal('toggle');
            $('#signin').modal('toggle');
        }); 
        $('#click-forgot').on('click',function(){
            $('#forgot').modal('toggle');
            $('#signin').modal('toggle');
        }); 
    </script>";   
}
    ?>
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
<script type="text/javascript">
    function rings(){
       var pos = $('.center-gem').position(),
       radiusSat = $('.sat1').width() * 1,
       radius = $('.center-gem').width() * 1,
       cx = pos.left + radius,
       cy = pos.top + radius,
       x, y, angle = 0, angles = [],
       spc = 360 / 8,
       deg2rad = Math.PI / 180,
       i = 0;

       for(;i < 9; i++) {
        angles.push(angle);
        angle += spc;
        }
/// space out radius
        radius += (radiusSat + 10);
         loop();        
function loop() {
    for(var i = 0; i < angles.length; i++) {

        angle = angles[i];
        x = cx + radius * Math.cos(angle * deg2rad);
        y = cy + radius * Math.sin(angle * deg2rad);

        $('.sat' + i).css({left:x - radiusSat, top:y - radiusSat});
        angles[i] = angles[i] + 1;
        if (angles[i] > 360) angles[i] = 0; 
    }   

    window.requestAnimationFrame(loop);}
}
/*$('.circle-container a img').click(function(){
   //var clickImg = $(this).attr('src');
    //$('#lucky-ring').attr('src',clickImg);
})*/

$(document).delegate('.circle-container a','mouseover',function(){
    var ele = $('.circle-container');  
 for(var i = 0; i < 9; i++) {

    ele.children().eq(i).removeClass('sat'+i);
 }
});
$(document).delegate('.circle-container a','mouseleave',function(){
    var ele = $('.circle-container');  
 for(var i = 0; i < 9; i++) {
    ele.children().eq(i).addClass('sat'+i);
 }
});

//------------------ARTICLE TOGGLE--------------------------------//



//--------------------GEMOLOGY TOGGLE---------------------------//
$('.gemo').on('click',function(){
    rings();
      $('#gemology-page').fadeIn('slow');
});
$('.close-glightbox').on('click',function(){    
    $('#gemology-page').fadeOut('slow');
    document.getElementById("gform").reset();
    $('.gfirst').show();
    $('.gsecond').hide();

});
//------------------ZODIAC TOGGLE--------------------------------//
$('.zodi').on('click',function(){
     $('#zodiac-page').fadeIn('slow');
});
$('.close-zlightbox').on('click',function(){
    $('#zodiac-page').fadeOut('slow');
     document.getElementById("zform").reset();
        $('.zodi-img').attr('src',base_url+'assets/img/horo.png');
          $('.zodi-head').html('Your sign');
          $('.zodi-desc').html('description comes here');
});
//--------------------------------------------------------------//
$(document).delegate('#gdob','change',function(){  
});
</script>
<script type="text/javascript">
  $(document).delegate('.gem-submit','click',function(e){     
      e.preventDefault();
         var ck_name = /^[a-z ,.'-]+$/i;
      var name = $('#g_name').val();
      var dob = $('#g_dob').val();    
        if((!ck_name.test(name)) || (name == '')) {
          $('#g_name').next().css("visibility","visible");
          $('#g_name').focus();
          return false;
        }
        else if(dob == '' ){
          $('#g_dob').next().css("visibility","visible");
          $('#g_dob').focus();
          return false;
        }
        else{
                 $.post(base_url+'index.php/gemology',{
          name:name,
          dob:dob
      },function(gemo){                   
            $('.desc').text(gemo[0].Description);
            $('.lucky-num').text(gemo[0].gID);
            $('.lucky-ring').attr('src',base_url+'assets/img/gemology/'+gemo[0].gID+'.png');
            $('.gfirst').hide();
            $('.gsecond').fadeIn();                
            },'json');
        }
  });
   $(document).delegate('#g_name','keypress',function(e) {
    $(this).next().css("visibility","hidden");   
  }); 
  $(document).delegate('#g_dob','click',function(e) {
    $(this).next().css("visibility","hidden");   
  });
</script>
<script type="text/javascript">
    var i =0;
    setInterval(function(){
        i++
         $("div.col-nine:eq("+i+")").slideDown(1500).siblings().slideUp(1500);     
        if(i == 5) i=0;
    },3000);  
  $('div.col-nine').mouseover(function(){
    $(this).removeClass('slid');
  });
</script>

    </body>
    <!--/bodysection-->
</html>