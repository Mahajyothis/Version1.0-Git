<body class="plugin">
   	<div class="main-div">
    	  <div class="container-fluid">
        <?php echo $logo_login_part; ?>
            <div class="row search-bar">
            	<div class="col-xs-7 no-r-pad">
                	<div class="input-group input-group-sm">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
                      </span>
                    </div><!-- /input-group -->
                </div>
                <div class="col-xs-5 no-l-pad">
                	<div class="input-group-sm">
                    	<select class="form-control">
                        	<option>Select Language</option>
                        </select>
                    </div>
                </div>
            </div> 
            <div class="content-one">
            	<div class="row menu-box text-center">
                	<div class="col-xs-6 no-r-pad">
                    	<ul class="nav nav-pills nav-stacked">
                          <li role="presentation"  class="active"><a href="home-welcome.html">Welcome</a></li>
                          <li role="presentation"><a href="home-personalities.html">Personalities</a></li>
                          <li role="presentation"><a href="#">Recent Blogs</a></li>
                          <li role="presentation"><a href="#">Recent Courses</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 no-l-pad">
                    	<ul class="nav nav-pills nav-stacked">
                          <li role="presentation"><a href="home-information.html">Information Page</a></li>
                          <li role="presentation"><a href="home-plugin.html">Plugins</a></li>
                          <li role="presentation"><a href="article.html">Recent Articles</a></li>
                          <li role="presentation"><a href="home-contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main-content text-center welcome">
            	<div class="row text-center">
                	<div class="col-xs-12 feature">
                    	<a href="#" class="light-green"><p><span class="pull-left icon"><i class="fa fa-th-list fa-lg"></i></span>My Feature</p></a>
                    </div>
                </div> 
                <div class="row text-center">
                	<div class="col-xs-12 feature">
                    	<a href="#" class="yellow"><p><span class="pull-left icon"><i class="fa fa-user fa-lg"></i></span>About</p></a>
                    </div>
                </div>
                <div class="row text-center">
                	<div class="col-xs-12 feature">
                    	<a href="#" class="purple"><p><span class="pull-left icon"><i class="fa fa-folder-open fa-lg"></i></span>My Portfolio</p></a>
                    </div>
                </div>
                <div class="row text-center">
                	<div class="col-xs-12 feature">
                    	<a href="#" class="light-blue"><p><span class="pull-left icon"><i class="fa fa-phone fa-lg"></i></span>Contact</p></a>
                    </div>
                </div>           	               	
            </div><!--main-content-->
          </div><!--container-fluid-->
    </div><!--plugin-->
 </body>
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url().JS.'validate.js'; ?>"></script>