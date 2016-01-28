<!DOCTYPE html>
<html lang="en">
   <!--HeaderSection-->
    <head>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $lang['title']; ?></title>       
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
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
#enquiry_error{
    text-align: center;
    font-size: 15px;
    font-family: sans-serif;
}
div#flash-data {
      position: absolute;
    top: 8%;
    z-index: 999;
    margin-left: 35%;
    width: 35%;
    background-color: rgba(95, 185, 159, 0.7);
    color: #fff;
    height: 50px;
    text-align: center;
    border-radius: 10px;
    display: table;
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
<div id="flash-data" style="display: none;">
                     <p style='margin-top: 1.5%;' class="nl_message"></p>
                     </div>
       

        <!-- LOGO -->
        <div class="header">
            <h1>
                <img src="<?php echo base_url('assets/img/logo.png');?>" class="header-logo" alt="logo"/>
               <?php echo $lang['title']; ?>
            </h1>
        </div>
        <!-- /LOGO -->
        <!-- MAIN CONTENT SECTION -->
        <section id="content">
    <!-- SECTION -->
    <section class="clearfix section" id="start">
        <!-- SECTION TITLE -->
        <h3 class="block-title" ><?php echo $lang['welcome']; ?></h3>
        <!-- /SECTION TITLE -->
        <!-- SECTION TILES -->
        <div class="tile turquoise w2 h1 title-horizontalcenter icon-scaleuprotate360cw">
            <a class="link" href="#" target="_blank">
                <i class="fa fa-tasks icon-1x"></i>
                <p class="title"><?php echo $lang['features']; ?></p>
            </a>
        </div>
        <div class="tile orange w2 h1 icon-featurecw title-fadeout">
            <a data-scroll="scrollto"  href="#about" class="link">
                <i class="fa fa-user icon-1x"></i>
                <p class="title"><?php echo $lang['about']; ?></p>
            </a>
        </div>
        <div class="tile blue title-verticalcenter icon-flip w2 h1">
            <a class="link" data-scroll="scrollto"  href="#portfolio">
                <i class="fa fa-picture-o icon-1x"></i>
                <p class="title"><?php echo $lang['portfolio']; ?></p>
            </a>
        </div> 
        <div class="tile purple title-scaleup icon-scaledownrotate360cw w2 h1">
            <a class="link" data-scroll="scrollto"  href="#contactform">
                <i class="fa fa-envelope icon-1x"></i>
                <p class="title"><?php echo $lang['contact']; ?></p>
            </a>
        </div>
       
</section>
<!-- /SECTION --> 
            <!-- SECTION -->
            <section class="clearfix section" id="portfolio" data-option-key="filter">
                <!-- SECTION TITLE -->
                <h3 class="block-title"><?php echo $lang['info']; ?></h3>
                <!-- /SECTION TITLE -->

               <!-- SECTION TILES -->
    <div class="tile reveal-slide red title-indent icon-flip w2 h1">
        <div class="reveal white w2 h1">
            <div class="text">
                <p style=" font-size:14px">
                    <span class="text-medium"><?php echo $lang['vastu']; ?></span><br/>
                    Vastu
                </p>
            </div>
        </div>
        <a class="link" href="#">
         <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/vasthu1.png');?>" width="60" height="60"></center>
         <p class="title"><?php echo $lang['vastu']; ?></p>
     </a>
 </div>
                <div class="tile red imagetile tileshow w2 h1">
                    <div class="slide active">
                        <div class="caption red">
                            <a class="link" data-href="blog/post-1.html" href="#blogpost" data-lightbox="mlightboxblog">
                                <div class="title"><i class="fa fa-file-text icon-1x"></i></div>
                                <div class="caption-text twoline">
                                    <?php echo $lang['yoga']; ?>!
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
                                <?php echo $lang['yoga']; ?>!
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
                            <?php echo $lang['yoga']; ?>!
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
                                    <?php echo $lang['festival']; ?>!
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
                                 <?php echo $lang['festival']; ?>!
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
                             <?php echo $lang['festival']; ?>!
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
                        <span class="text-medium"><?php echo $lang['travel']; ?></span><br/>
                        Travel
                    </p>
                </div>
            </div>
            <a class="link" href="#">
                <i class="icon-youtube-play icon-1x"></i>
                <p class="title"><?php echo $lang['travel']; ?></p>
            </a>
        </div>
        <div class="tile red icon-fadeoutscaleup title-fade w1 h1">
            <a class="link" data-scroll="scrollto"  href="#articles">
                <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/fengshui.png');?>" width="60" height="60"></center>
                <p class="title"><?php echo $lang['fengi']; ?></p>
            </a>
        </div>
        <div class="tile red icon-fadeoutscaleup title-fade w1 h1">
            <a class="link" data-scroll="scrollto"  href="#articles">
                <center style="margin-top:15px;"><img src="<?php echo base_url('assets/img/ayurvedic.png');?>" width="80" height="80"></center>
                <p class="title"><?php echo $lang['ayur']; ?></p>
            </a>
        </div>
        <!-- /SECTION TILES -->
            </section>
            <!-- /SECTION -->
             <!-- SECTION -->
    <section class="clearfix section" id="about">
        <!-- SECTION TITLE -->
        <h3 class="block-title"><?php echo $lang['personalities']; ?></h3>
        <!-- /SECTION TITLE -->
        <!-- SECTION TILES -->
        <?php 

if($personalities){
			foreach($personalities as $key => $value){
			?>
			<div class="tile imagetile tileshow w2 pr opacity_ma">             
				 <img src="uploads/<?php if(!empty($value->photo)){echo $value->photo;}else{echo "profile.png";};?>" alt="" style="height:49%;width:60px;padding:12% 12% 0% 12%;float: left;" /> 
					<h4 class="name_mavr" title="<?php echo ucwords($value->perdataFullName); ?>"><?php 

$string = ucwords($value->perdataFullName);
 if (strlen($string) > 13) {
                    echo substr($string, 0, 13).'...';
}else{
echo $string;
}
 ?></h4> 
					<h5><?php echo ucwords($value->profProfession); ?></h5>       
				 <a href="<?php echo base_url().'basicprofile?uid='.$value->custID;?>"><button type="button" class="btn btn-warning custom"><?php echo $lang['view']; ?></button></a>
				<p class="network_bar"> 
					<span><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['likes']; ?>"><img src="assets/img/like.png"/ style="height: 12px"></a><?php echo $value->likes; ?></span>
					<span><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['circles']; ?>"><img src="assets/img/circle.png"/ style="height: 12px"></a><?php echo $value->circles; ?></span>
					<span><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['views']; ?>"><img src="assets/img/viewers.png"/ style="height: 12px"></a><?php echo $value->views; ?></span>
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
                <h3 class="block-title"><?php echo $lang['plugins']; ?></h3>
                <!-- /SECTION TITLE -->
                <!-- SECTION TILES --> 
                <div class="tile yellow icon-featurefade w1 h1">
                    <a class="link gemo" href="#" data-option-value=".photography" >
                     <center style="margin-top:15px;"><img src="<?php echo base_url('assets/img/diamondline.png');?>" width="80" height="60"></center>
                     <p class="title"><?php echo $lang['gemology']; ?></p>
                 </a>
             </div>
               <div class="tile green icon-featurefade w1 h1">
        <a class="link zodi" href="#" data-option-value=".video">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/horo.png');?>" width="80" height="80"></center>           
            <p class="title"><?php echo $lang['zodiac']; ?></p>
        </a>
    </div>
             <div class="tile blue icon-featurefade w1 h1">
                <a href="#numerology" data-lightbox="mlightboxvideo" class="link" 
                       data-src="<?php base_url();?>numerology" data-title="<?php echo $lang['numerology']; ?>" data-description="<?php echo $lang['mahajyothis']; ?>">
                 <center style="margin-top:15px;"><img src="<?php echo base_url('assets/img/white head.png');?>" width="80" height="60"></center>
                 <p class="title"><?php echo $lang['numerology']; ?></p>
             </a>
         </div>
           <div class="tile orange icon-featurefade w1 h1">
          <a href="#" class="link cal">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/calendar.png');?>" width="60" height="60"></center>
            <p class="title"><?php echo $lang['calendar']; ?></p>
          </a>
        </div>
     <!--<div class="tile purple icon-featurefade w1 h1">
        <a href="#" data-lightbox="mlightboxvideo" class="link"data-src="<?php base_url();?>reading" data-title="<?php echo $lang['taroet']; ?>" data-description="<?php echo $lang['mahajyothis']; ?>">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/tarot.png');?>" width="60" height="60"></center>
            
            <p class="title">Taroet Prediction</p>
        </a>
    </div>-->
       <div class="tile purple icon-featurefade w1 h1">
                    <a class="link tar" href="#" data-option-value=".video">
                        <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/tarot.png');?>" width="60" height="60"></center>
                        
                        <p class="title"><?php echo $lang['taroet']; ?></p>
                    </a>
                </div>
    <div class="tile red icon-featurefade w1 h1">
            <a href="#love" data-lightbox="mlightboxvideo" class="link" 
                       data-src="<?php base_url();?>lovemeter" data-title="<?php echo $lang['love']; ?>" data-description="<?php echo $lang['mahajyothis']; ?>">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/love.png');?>" width="60" height="60"></center>
            <p class="title"><?php echo $lang['love']; ?></p>
        </a>
    </div>
    <div class="tile turquoise icon-featurefade w1 h1">
            <a href="#friend" data-lightbox="mlightboxvideo" class="link" 
                       data-src="<?php base_url();?>friend" data-title="<?php echo $lang['friendship']; ?>" data-description="<?php echo $lang['mahajyothis']; ?>">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/frnd.png');?>" width="60" height="60"></center>
            <p class="title"><?php echo $lang['friendship']; ?></p>
        </a>
    </div>
    <div class="tile yellow icon-featurefade w1 h1">
            <a href="#charecter" data-lightbox="mlightboxvideo" class="link" 
                       data-src="<?php base_url();?>knowyourcharecter" data-title="<?php echo $lang['kyc']; ?>" data-description="<?php echo $lang['mahajyothis']; ?>">
            <center style="margin-top:15px;"> <img src="<?php echo base_url('assets/img/frnd.png');?>" width="60" height="60"></center>
            <p class="title"><?php echo $lang['kyc']; ?></p>
        </a>
    </div>
    <!-- /SECTION TILES -->
</section>
<!-- /SECTION -->
 <section class="clearfix section" id="services">
            <!-- SECTION TILES -->
             <h3 class="block-title"><?php echo $lang['blogs']; ?></h3>

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
           
             <h3 class="block-title"><?php echo $lang['articles']; ?></h3>
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
           <h3 class="block-title"><?php echo $lang['courses']; ?></h3>
		   
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
                <h3 class="block-title"><?php echo $lang['contact']; ?></h3>
                <!-- /SECTION TITLE -->
                <!-- SECTION TILES -->
                <div class="tile black htmltile w3 h4">
                    <div class="tilecontent">
                        <div class="content">
                            <div class="hide textcenter" id="messagesuccess">
                                <br/><br/><br/>
                                <h1><?php echo $lang['thank_you']; ?>! <a class="icon-envelope"></a></h1>
                                <br/><br/><br/>
                                <h3><?php echo $lang['message_sent']; ?>.</h3>
                                <br/><br/><br/><br/><br/>
                            </div>
                            <div id="messageload" class="hide textcenter">
                                <h3>Sending</h3><br/>
                                <img src="assets/img/preloader.gif" alt="..."/>                          </div>

                           <div id="contactme" class="form-dark" name="cform" >
                                <div class="row-fluid">
                                    <label><?php echo $lang['first']; ?> <span class="hide label-important firstname-missing pull-right"><?php echo $lang['fname_missing']; ?>!</span></label>
                                    <input id="efirstname" name="firstname" type="text" class="col-md-12" placeholder="<?php echo $lang['yfirst']; ?>">
                                </div>
                                <div class="row-fluid">
                                    <label><?php echo $lang['last']; ?> <span class="hide label-important lastname-missing pull-right"><?php echo $lang['lname_missing']; ?>!</span></label>
                                    <input id="elastname" name="lastname" type="text" class="col-md-12" placeholder="<?php echo $lang['ylast']; ?>">
                                </div>
                                <div class="row-fluid">
                                    <label><?php echo $lang['email']; ?> <span class="hide label-important email-missing pull-right"><?php echo $lang['email_missing']; ?>!</span></label>
                                    <input id="enquiry_email" name="email" type="text" class="col-md-12" placeholder="<?php echo $lang['yemail']; ?>">
                                </div>
                                <div class="row-fluid">
                                    <label><?php echo $lang['subject']; ?></label>
                                    <select id="subject" name="subject" class="col-md-12">
                                        <option value="service"><?php echo $lang['gcs']; ?></option>
                                        <option value="suggestions"><?php echo $lang['suggestions']; ?></option>
                                        <option value="product"><?php echo $lang['product']; ?></option>
                                    </select>
                                </div>

                                <div class="row-fluid">
                                    <label><?php echo $lang['message']; ?> <span class="hide label-important message-missing pull-right"><?php echo $lang['forgot_message']; ?>!</span></label>
                                    <textarea name="message" id="enquiry_message" class="input-xlarge col-md-12" rows="4"></textarea>
                                </div>
                                <div class="row-fluid">
                                    <button class="btn btn-primary btn-block pull-right send_enquiry"><?php echo $lang['send']; ?></button>
                                </div>
								<div id="enquiry_error" style='color;white'></div>
                            </div>
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

        <input type="search" placeholder="<?php echo $lang['search']; ?>......" name="search" class="searchbox-input home_search" autocomplete="off" onkeyup="buttonUp();" required>
        <input type="submit" class="searchbox-submit" value="Go">
        <span class="searchbox-icon"><i class="fa fa-search"></i></span>
		
    </form>
	<ul class="listing-styles">
	<span class="search_result"></span>
	</ul>
	<ul class = "nav nav-tabs nav-mahajyothis">


   <li class = "dropdown dropdown-mahajyothis">
      <a class = "dropdown-toggle" data-toggle = "dropdown" href = "#">
        <?php echo $lang['slanguage']; ?>
         <span class = "caret"></span>
      </a>
      <ul class = "dropdown-menu">
		<?php 
		$count = count($languageLabels);
		$i = 1;
		foreach($languageLabels as $key => $value){ 	?>
				<li><a href = "javascript:void(0)" class="language_selector" id="<?php echo $value->language; ?>"><?php echo $value->label; ?></a></li>
				<?php if($count != $i){ ?><li class = "divider"></li><?php } ?>
		<?php $i++; } ?>
           
      </ul>

   </li>
</ul>
 <div id="opensidebar">
         <?php 

        if($this->session->userdata('profile_data')){
          echo '<i class="logged_user"><img src='.base_url('uploads').'/'.$this->session->userdata['profile_data'][0]['photo'].'></i>';
          echo '<ul class="drop"><a href='.base_url().'user/'.$this->session->userdata['profile_data'][0]['custName'].'><li>'.$lang['profile'].'</li></a>
                <a href='.base_url().'Logout'.'><li>'.$lang['logout'].'</li></a></ul>';
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
                    <h2 class='mlightbox-title'><?php echo $lang['numerology']; ?></h2>
                    <p class="mlightbox-subtitle muted"><?php echo $lang['mahajyothis']; ?></p>
                </div>
                <ul class="mlist">
                    <li><a class="close-mlightbox" href="#"><i class="icon-arrow-left"></i><?php echo $lang['btmahajyothis']; ?></a></li>
                    <li></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-facebook-sign"></i><?php echo $lang['luof']; ?></a></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-twitter-sign"></i><?php echo $lang['fuot']; ?></a></li>
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
		        <h2 class='mlightbox-title'><?php echo $lang['calendar']; ?></h2>
		        <p class="glightbox-subtitle muted"><?php echo $lang['mahajyothis']; ?></p>
		      </div>
		      <ul class="glist">
		        <li><a class="close-clightbox" href="#"><i class="icon-arrow-left"></i><?php echo $lang['btmahajyothis']; ?></a></li>
		        <li></li>
		        <li><a target="_blank" href="http://facebook.com/"><i class="icon-facebook-sign"></i><?php echo $lang['luof']; ?></a></li>
		        <li><a target="_blank" href="https://twitter.com/intent/user?screen_name=grozavcom"><i class="icon-twitter-sign"></i><?php echo $lang['fuot']; ?></a></li>
		      </ul>
		    </section>
		  </section>
        
         <section class="glightbox" id="tarot-page" style="display:none">
            <section class="glightbox-content tar-content"  >
                
            </section>
            <section class="glightbox-details">
                <div class="glightbox-description">
                    <h2 class='mlightbox-title'><?php echo $lang['taroet']; ?></h2>
                    <p class="glightbox-subtitle muted"><?php echo $lang['mahajyothis']; ?></p>
                </div>
                <ul class="glist">
                    <li><a class="close-tlightbox" href="#"><i class="icon-arrow-left"></i> <?php echo $lang['btmahajyothis']; ?></a></li>
                    <li></li>
                    <li><a target="_blank" href="http://facebook.com/"><i class="icon-facebook-sign"></i><?php echo $lang['luof']; ?></a></li>
                    <li><a target="_blank" href="https://twitter.com/intent/user?screen_name=grozavcom"><i class="icon-twitter-sign"></i> <?php echo $lang['fuot']; ?></a></li>
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
                    <h2 class='mlightbox-title'><?php echo $lang['kyc']; ?></h2>
                    <p class="mlightbox-subtitle muted"><?php echo $lang['mahajyothis']; ?></p>
                </div>
                <ul class="mlist">
                    <li><a class="close-mlightbox" href="#"><i class="icon-arrow-left"></i> <?php echo $lang['btmahajyothis']; ?></a></li>
                    <li></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-facebook-sign"></i> <?php echo $lang['luof']; ?></a></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-twitter-sign"></i> <?php echo $lang['fuot']; ?></a></li>
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
                    <h2 class='mlightbox-title'><?php echo $lang['love']; ?></h2>
                    <p class="mlightbox-subtitle muted"><?php echo $lang['mahajyothis']; ?></p>
                </div>
                <ul class="mlist">
                    <li><a class="close-mlightbox" href="#"><i class="icon-arrow-left"></i> <?php echo $lang['btmahajyothis']; ?></a></li>
                    <li></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-facebook-sign"></i><?php echo $lang['luof']; ?></a></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-twitter-sign"></i><?php echo $lang['fuot']; ?></a></li>
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
                    <h2 class='mlightbox-title'><?php echo $lang['friendship']; ?></h2>
                    <p class="mlightbox-subtitle muted"><?php echo $lang['mahajyothis']; ?></p>
                </div>
                <ul class="mlist">
                    <li><a class="close-mlightbox" href="#"><i class="icon-arrow-left"></i> <?php echo $lang['btmahajyothis']; ?></a></li>
                    <li></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-facebook-sign"></i> <?php echo $lang['luof']; ?></a></li>
                    <li><a target="_blank" href="https://www.facebook.com/Mahajyothis?fref=ts"><i class="icon-twitter-sign"></i> <?php echo $lang['fuot']; ?></a></li>
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
                        <h2 class='mlightbox-title'><?php echo $lang['gemology']; ?></h2>
                        <p class="glightbox-subtitle muted"><?php echo $lang['mahajyothis']; ?></p>
                    </div>
                    <ul class="glist">
                        <li><a class="close-glightbox" href="#"><i class="icon-arrow-left"></i> <?php echo $lang['btmahajyothis']; ?></a></li>
                        <li></li>
                        <li><a target="_blank" href="http://facebook.com/"><i class="icon-facebook-sign"></i><?php echo $lang['luof']; ?></a></li>
                        <li><a target="_blank" href="https://twitter.com/intent/user?screen_name=grozavcom"><i class="icon-twitter-sign"></i> <?php echo $lang['fuot']; ?></a></li>
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
                            <h2 class='mlightbox-title'><?php echo $lang['zodiac']; ?></h2>
                            <p class="glightbox-subtitle muted"><?php echo $lang['mahajyothis']; ?></p>
                        </div>
                        <ul class="glist">
                            <li><a class="close-zlightbox" href="#"><i class="icon-arrow-left"></i> <?php echo $lang['btmahajyothis']; ?></a></li>
                            <li></li>
                            <li><a target="_blank" href="http://facebook.com/"><i class="icon-facebook-sign"></i> <?php echo $lang['luof']; ?></a></li>
                            <li><a target="_blank" href="https://twitter.com/intent/user?screen_name=grozavcom"><i class="icon-twitter-sign"></i> <?php echo $lang['fuot']; ?></a></li>
                        </ul>
                    </section>
                </section>
            <!-- ZODIAC ENDS-->   
<iframe width="560" height="315" src="<?php base_url();?>friend"></iframe>
	
	
      <!--Footer-->  
<nav class="navbar navbar-inverse navbar-fixed-bottom" style="background:rgba(0,0,0,0); margin-bottom:11px; margin-top:20px;">
        <section>
 <footer class="footer">
 <div class="col-xs-12 col-sm-7">   
            <ul>        
                    <li><img src="/assets/img/footer/twiter.png" alt="social icons"></li>
                    <li><img src="/assets/img/footer/in.png" alt="social icons"></li>
                    <li><img src="/assets/img/footer/google.png" alt="social icons"></li>
                    <li><img src="/assets/img/footer/facebook.png" alt="social icons"></li>
                    <li><label class="news-letter"><?php echo $lang['newsletter']; ?></label><input type="text" class="nl_email" placeholder="<?php echo $lang['enter_email_nl']; ?>"></li>
                    <li><input type="button" Value="<?php echo $lang['nl_subscribe']; ?>" class="btn nlSubscribe"></li>
            </ul>
   </div>
    <div class="col-xs-12 col-sm-4">
            <ul class="footer-menuss">    
               <li><?php echo $lang['abt_us']; ?></li>
                <li><?php echo $lang['terms']; ?> </li>
                <li><?php echo $lang['legal']; ?></li>
                <li><?php echo $lang['privacy']; ?></li>
                <li><?php echo $lang['feedback']; ?></li>
                <li>&#169; 2015 <?php echo $lang['mavr']; ?></li>
            </ul>
      </div>
        </footer>
        <!--/Footer-->
        
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
        var error_username = "<?php echo $lang['error_username']; ?>";
var error_password = "<?php echo $lang['error_password']; ?>";
var error_up = "<?php echo $lang['error_up']; ?>";
var uname_available = "<?php echo $lang['uname_available']; ?>";
var uname_exist = "<?php echo $lang['uname_exist']; ?>";
var error_email = "<?php echo $lang['error_email']; ?>";
var email_missmatch = "<?php echo $lang['email_missmatch']; ?>";
var password_limit = "<?php echo $lang['password_limit']; ?>";
var password_missmatch = "<?php echo $lang['password_missmatch']; ?>";
var email_exist = "<?php echo $lang['email_exist']; ?>";
var confirmation = "<?php echo $lang['confirmation']; ?>";
var error_photo = "<?php echo $lang['error_photo']; ?>";
var error_fname = "<?php echo $lang['error_fname']; ?>";
var error_lname = "<?php echo $lang['error_lname']; ?>";
var error_dob = "<?php echo $lang['error_dob']; ?>";
var error_zip = "<?php echo $lang['error_zip']; ?>";
var error_district = "<?php echo $lang['error_district']; ?>";
var error_city = "<?php echo $lang['error_city']; ?>";
var error_state = "<?php echo $lang['error_state']; ?>";
var error_country = "<?php echo $lang['error_country']; ?>";
var error_address = "<?php echo $lang['error_address']; ?>";
var error_qualification = "<?php echo $lang['error_qualification']; ?>";
var error_profession = "<?php echo $lang['error_profession']; ?>";
var error_industry = "<?php echo $lang['error_industry']; ?>";
var error_description = "<?php echo $lang['error_description']; ?>";
var hi = "<?php echo $lang['hi']; ?>";
var wrong_password = "<?php echo $lang['wrong_password']; ?>";
var verification_pending = "<?php echo $lang['verification_pending']; ?>";
var login_success = "<?php echo $lang['login_successful']; ?>";
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
        <script src="<?php echo base_url('assets/js/validate.js?ver=1.0');?>" type="text/javascript"></script> <!-- My Library -->
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
			$(document).on('click','button.send_enquiry',function(){
              $(this).removeClass('send_enquiry');
           var efirstname = $("#efirstname").val();
	   var elastname= $("#elastname").val();
	   var enquiry_email=$("#enquiry_email").val();
	   var emessage=$("#enquiry_message").val();
	   var subject=$("#subject").val();
	  
      if (efirstname== ''||elastname=='' || enquiry_email=='' ||emessage=='') {
        $("#enquiry_error").html("<?php echo $lang['error_contact']; ?>!");
      }
      else{
          $.ajax({
          url: "<?php base_url();?>contact",
		  type:"POST",
		  data:{firstname:efirstname,lastname:elastname,email:enquiry_email,message:emessage,subject:subject}
        }).done(function( data ) {
        $("#enquiry_error").html("<?php echo $lang['email_success']; ?>").fadeOut(5000);
        });   
      } 
  });	
		$(document).on('click','input.nlSubscribe',function(){
		var sub_email=$('.nl_email').val();
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

             if (!filter.test(sub_email)) {
                     $('.nl_email').focus();
return false;
}
		if(sub_email){
		$.ajax({
		url:"<?php echo base_url(); ?>home/newsletter",
		type:"POST",
		data:{sub_email:sub_email}
		}).done(function(data){
		if(data == 0) {
		 $('.nl_message').html("<?php echo $lang['nl_subscribed']; ?>");
		 }		
		else {
		$('.nl_message').html("<?php echo $lang['nl_email_error']; ?>");
				}
		$('div#flash-data').show().fadeOut(10000);
		});
		}
		else $('.nl_email').focus();
		});
		 });
		 
		 
		 
		<?php if(ISSET($_GET['doLogin'])){ ?>
			$('#signin').modal('toggle');
			 
            
		<?php } ?>
		
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
<script>
$(document).on('click','.language_selector',function(){ 
				var lang=$(this).attr('id');
if(lang){
					$.ajax({
          url: "<?php echo base_url();?>home/set_language",
		  type:"POST",
		  data:{lang:lang}

          }).done(function( data ) {
           location.reload();
		  });
}
		});
</script>
  <script type="text/javascript"> var base_url = "<?php echo base_url(); ?>"; 
  
  </script>



<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=42190767"></script>
    </body>
    <!--/bodysection-->


</html>