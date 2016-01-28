<!DOCTYPE html>
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
	<meta charset="UTF-8" />
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title><?php echo $lang['title']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
	<meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
	<meta name="author" content="Codrops" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/search/jquery.mCustomScrollbar.css" />
	<link href="<?php echo base_url(); ?>assets/css/search/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/search/font-awesome.min.css" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/search/search.css" />
	
	<style>
	.featured-image img {
		width:100px;
		height: 100px;
	}
	
	</style>
	</head>
<body>

	<!-- Header brand logo -->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">

		  <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/search/mahajyothis.png" class="img-responsive"  width="170" alt=""/></a>
		 <?php if($this->session->userdata['profile_data'][0]['custName']) { ?>
               <a class="navbar-brand page-scroll" href="<?php echo base_url().'user/'.$this->session->userdata['profile_data'][0]['custName']; ?>" style=" float: right;"><button class="btn btn-warning" style=" margin-top: 10%;">My Profile</button></a> 
		<?php } ?>
	  </div>
	</nav> 
	
	<!--page middle -->
	<div class="row page-middle">
	
		<section class="col-md-2 sidebar">
			
			<a  href="#category" class="btn btn-default togglebutton" data-toggle="collapse"><i class="fa fa-bars"></i> </a>
		
			<div id="category" class="category collapse in">
			
				<h2 class="category-heading text-center"><?php echo $lang['category']; ?></h2>
			
				<div class="sideb-category">
				
					<div class="row">
					<div class="cat-group col-lg-12 col-md-12 col-sm-3 col-xs-3">
							
							<div class="cat-width1 tip-bottom"  data-toggle="tooltip" data-original-title="<?php echo $lang['all']; ?>"><a href="<?php echo base_url(); ?>searching/allsearch?cat=all&q=<?php echo $this->input->get('q'); ?>"><span class="cat-icon"><img src="<?php echo base_url(); ?>assets/img/search/posts.png" class="img-responsive"  alt="users"></span><span class="cat-n"><?php echo $lang['all']; ?></span></a></div><div class="cat-hover cat-hover-bck1"></div>
							
						</div>
						<div class="cat-group col-lg-12 col-md-12 col-sm-3 col-xs-3">
							
							<div class="cat-width tip-bottom"  data-toggle="tooltip" data-original-title="<?php echo $lang['users']; ?>"><a href="<?php echo base_url(); ?>searching?cat=user&q=<?php echo $this->input->get('q'); ?>"><span class="cat-icon"><img src="<?php echo base_url(); ?>assets/img/search/users.png" class="img-responsive"  alt="users"></span><span class="cat-n"><?php echo $lang['users']; ?></span></a></div><div class="cat-hover cat-hover-bck"></div>
						
						</div>
						
						
						
						<div class="cat-group col-lg-12 col-md-12 col-sm-3 col-xs-3">

							<div class="cat-width2 tip-bottom" data-toggle="tooltip" data-original-title="<?php echo $lang['discussions']; ?>"><a href="<?php echo base_url(); ?>searching?cat=discussion&q=<?php echo $this->input->get('q'); ?>" ><span class="cat-icon"><img src="<?php echo base_url(); ?>assets/img/search/discution.png" class="img-responsive"  alt="users"></span><span class="cat-n"><?php echo $lang['discussions']; ?></span></a></div><div class="cat-hover cat-hover-bck2"></div>
							
						</div>
						
						<div class="cat-group col-lg-12 col-md-12 col-sm-3 col-xs-3">

							<div class="cat-width3 tip-bottom"  data-toggle="tooltip" data-original-title="<?php echo $lang['forum']; ?>"><a href="<?php echo base_url(); ?>searching?cat=forum&q=<?php echo $this->input->get('q'); ?>"><span class="cat-icon"><img src="<?php echo base_url(); ?>assets/img/search/forum.png" class="img-responsive"  alt="users"></span><span class="cat-n"><?php echo $lang['forum']; ?></span></a></div><div class="cat-hover cat-hover-bck3"></div>
							
						</div>
						
						<div class="cat-group col-lg-12 col-md-12 col-sm-3 col-xs-3">

							<div class="cat-width4 tip-bottom" data-toggle="tooltip" data-original-title="<?php echo $lang['events']; ?>"><a href="<?php echo base_url(); ?>searching?cat=events&q=<?php echo $this->input->get('q'); ?>" ><i class="fa fa-calendar"></i><span class="cat-n"><?php echo $lang['events']; ?></span></a></div><div class="cat-hover cat-hover-bck4"></div>
							
						</div>
						
						<div class="cat-group col-lg-12 col-md-12 col-sm-3 col-xs-3">

							<div class="cat-width5 tip-bottom"  data-toggle="tooltip" data-original-title="<?php echo $lang['articles']; ?>"><a href="<?php echo base_url(); ?>searching?cat=Article&q=<?php echo $this->input->get('q'); ?>"><i class="fa fa-file-text-o"></i><span class="cat-n"><?php echo $lang['articles']; ?></span></a></div><div class="cat-hover cat-hover-bck5"></div>
							
						</div>
						
						<div class="cat-group col-lg-12 col-md-12 col-sm-3 col-xs-3">

							<div class="cat-width6 tip-bottom" data-toggle="tooltip" data-original-title="<?php echo $lang['blogs']; ?>"><a href="<?php echo base_url(); ?>searching/blogs?cat=blogs&q=<?php echo $this->input->get('q'); ?>"><span class="cat-icon"><img src="<?php echo base_url(); ?>assets/img/search/blogs.png" class="img-responsive"  alt="users"></span><span class="cat-n"><?php echo $lang['blogs']; ?></span></a></div><div class="cat-hover cat-hover-bck6"></div>
							
						</div>
						
						<div class="cat-group col-lg-12 col-md-12 col-sm-3 col-xs-3">

							<div class="cat-width7 tip-bottom" data-toggle="tooltip" data-original-title="<?php echo $lang['groups']; ?>"><a href="<?php echo base_url(); ?>searching?cat=group&q=<?php echo $this->input->get('q'); ?>" ><span class="cat-icon"><img src="<?php echo base_url(); ?>assets/img/search/groups.png" class="img-responsive"  alt="users"></span><span class="cat-n"><?php echo $lang['groups']; ?></span></a></div><div class="cat-hover cat-hover-bck7"></div>
							
						</div>
						
					</div>
				
					
				</div>
				
			</div>
		
		</section>
		
		<!-- Search & results section-->
		<section class="col-md-10 page-content">
		
			<!-- Search form -->
			<div class="row search-row">
				<div class="col-md-12">
					<div class="search-container">
						<form action="/search.html" class="search pull-right">
							
							<button type="submit"><a href="#"><span class=""><i class="fa fa-search"></i></span>				
							</a></button>
							<input type="text" class="home_search" placeholder="<?php echo $lang['search_here']; ?>" required="" title="<?php echo $lang['pls_fill_field']; ?>">
							
							<ul class="listing-styles" style="display: block;">
							 <span class="search_result"></span>
							</ul>
						</form>
					</div>
				</div>
			</div>
			
			<!--Result section -->
			<div class="row result">
			
				<div class="col-md-12">
				
				<?php
				 switch ($this->input->get('cat')) {
   				 case "all":
					 echo $lang['search_for'].' '.$this->input->get('q').' in '.ucwords($lang['all']);
					 break;
				case "user":
					echo $lang['search_for'].' '.$this->input->get('q').' in '.ucwords($lang['users']);
					break;
				case "discussion":
					echo $lang['search_for'].' '.$this->input->get('q').' in '.ucwords($lang['discussions']);
					break;
				case "forum":
					echo $lang['search_for'].' '.$this->input->get('q').' in '.ucwords($lang['forum']);
					break;	
				case "events":
					echo $lang['search_for'].' '.$this->input->get('q').' in '.ucwords($lang['events']);
					break;	
				case "Article":
					echo $lang['search_for'].' '.$this->input->get('q').' in '.ucwords($lang['articles']);
					break;	
				case "blogs":
					echo $lang['search_for'].' '.$this->input->get('q').' in '.ucwords($lang['blogs']);
					break;
				case "group":
					echo $lang['search_for'].' '.$this->input->get('q').' in '.ucwords($lang['groups']);
					break;	
					default:			
					} ?>
					
				</div>
			
			</div>
			
			
			<div id="horizon-scroll" class="">
			
				<section class="clearfix section" >
				
				
				<?php  if($this->input->get('cat')=='all')  {
			
				foreach($result1->result() as $row){
	
				 ?>
					
				<div class=" tile">
						
						<div class="row bolg-results">
							<div class="featured-image"><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($row->photo)){ echo $row->photo; }else{ echo "profile.png";}  ?>" class="img-responsive img-thumbnail" width="100" height="100" alt alt="featured image"></div>
									<div class="blog-content">
									<h1 class="blog-heading"><?php echo $row->Title; ?></h1>
									<p><?php if(strlen($row->description) > 30) echo substr($row->description, 0,30).'...'; else echo $row->description; ?></p>
									</div><div class="read-more"><a class="show-more" href="<?php echo base_url().'basicprofile?uid='.$row->ID;?>"><?php echo $lang['show_more']; ?></a>
								</div></div></div>
				<?php }
				foreach($result2->result() as $row){
				 ?>	<div class=" tile"><div class="row bolg-results">	
				 <div class="featured-image"><img src="<?php echo base_url(); ?>uploads/Article/<?php if(!empty($row->photo)){echo $row->photo;}else{echo "default_Article.jpg";} ?>" class="img-responsive img-thumbnail" width="100" height="100" alt="featured image"></div>
								<div class="blog-content">
								
									<h1 class="blog-heading"><?php echo $row->Title; ?></h1>
									<p><?php if(strlen($row->description) > 30) echo substr($row->description, 0,30).'...'; else echo $row->description; ?></p>
									
								</div>
								<div class="read-more">
							<a class="show-more" href="<?php echo base_url().'Article/view/'.$this->custom_function->create_ViewUrl($row->ID,$row->Title);?>"><?php echo $lang['show_more']; ?></a>
								</div>
								</div>
					</div>
			<?php }
				while($row=mysqli_fetch_assoc($result3)){
					 ?>
						<div class=" tile">
											<div class="row bolg-results">
											<div class="featured-image">
											   <?php	if(!empty($row['photo'])){ $obj = json_decode($row['photo']); 
									echo "<img src='".$obj->{'url'}."'  class='img-responsive img-thumbnail' width='100' height='100'  alt='featured image'>";}
									else{
									echo "<img src='".base_url()."uploads/blog/default_blog.jpg' class='img-responsive img-thumbnail' width='100' height='100'  alt='featured image'>";
									}
									?>
								</div>				<div class="blog-content">
																	<h1 class="blog-heading"><?php echo $row['Title'];   ?></h1>
															</div>
								
								<div class="read-more">
								<a class="show-more" href="http://blog.mahajyothis.net/entry/<?php echo $row['link'];   ?>"><?php echo $lang['show_more']; ?></a>
								</div>
								</div>
						
					</div>
				<?php }
				foreach($result4->result() as $row){
					 ?>
					<div class=" tile">
						<div class="row bolg-results">
								<div class="featured-image"><img  src="<?php echo base_url(); ?>uploads/discussion/<?php if(!empty($row->photo)){echo $row->photo;}else{echo "default_discussion.jpg";} ?>" class="img-responsive img-thumbnail" width='100' height='100' alt="featured image"></div>
								
								<div class="blog-content">
								
									<h1 class="blog-heading"><?php echo $row->Title;   ?></h1>
									</div>
								
								<div class="read-more">
							<a class="show-more" href="<?php echo base_url().'discussions/view/'.$this->custom_function->create_ViewUrl($row->ID,$row->Title);?>"><?php echo $lang['show_more']; ?></a>
								</div>	</div></div>
				<?php }
				foreach($result5->result() as $row){
					 ?>
					<div class=" tile">
						<div class="row bolg-results">
							<div class="featured-image"><img src="<?php echo base_url(); ?>uploads/forum/<?php if(!empty($row->photo)){echo $row->photo;}else{echo "default_forum.jpg";} ?>" class="img-responsive img-thumbnail"  width='100' height='100' alt="featured image"></div>
								<div class="blog-content">
								    	<h1 class="blog-heading"><?php echo $row->Title;   ?></h1>
											</div>
											<div class="read-more">
								<a class="show-more" href="<?php echo base_url().'forum/search?search='.$row->Title;?>"><?php echo $lang['show_more']; ?></a>
								</div>
							</div>
						</div>
				<?php }
				foreach($result6->result() as $row){
					 ?>
					<div class=" tile">
						<div class="row bolg-results">
						     <div class="featured-image"><img src="<?php echo base_url(); ?>uploads/groups/banners/<?php if(!empty($row->photo)){echo $row->photo;}else{echo "default_group.jpg";} ?>" class="img-responsive img-thumbnail" width='100' height='100'  alt="featured image"></div>
											<div class="blog-content">
													<h1 class="blog-heading"><?php echo $row->Title;   ?></h1>
										</div>
										<div class="read-more">
								<a class="show-more" href="<?php echo base_url().'groups/view/'.$this->custom_function->create_ViewUrl($row->ID,$row->Title);?>"><?php echo $lang['show_more']; ?></a>
								</div>	
						</div>
						
					</div>
				<?php }
				foreach($result7->result() as $row){
				 ?>
								<div class=" tile">
						<div class="row bolg-results">
							<div class="featured-image"><img src="<?php echo base_url(); ?>uploads/events/<?php if(!empty($row->photo)){echo $row->photo;}else{echo "default_even.png";} ?>" width='100' height='100' class="img-responsive img-thumbnail"  alt="featured image"></div>
								<div class="blog-content">
								<h1 class="blog-heading"><?php echo $row->Title;   ?></h1>
								</div>
								<div class="read-more">
							<a class="show-more" href="<?php echo base_url().'events/view/'.$this->custom_function->create_ViewUrl($row->ID,$row->Title);?>"><?php echo $lang['show_more']; ?></a>
						</div>
						</div>
						
					</div>
				
				<?php }} if($this->input->get('cat')=='blogs')  {
			
				while($row=mysqli_fetch_assoc($result)){
	
				 ?>
				
				<div class=" tile">
						
						<div class="bolg-results">
							
							
							
								<div class="featured-image">
								
								
								   <?php	if(!empty($row['photo'])){ $obj = json_decode($row['photo']); 
									echo "<img src='".$obj->{'url'}."'  class='img-responsive img-thumbnail'  alt='featured image'>";}
									?>
								
								
								</div>
								
								<div class="blog-content">
								
									<h1 class="blog-heading"><?php echo $row['Title'];   ?></h1>
									
									
								</div>
								
								<div class="read-more">
							
									<a class="show-more" href="http://blog.mahajyothis.net/entry/<?php echo $row['link'];   ?>"><?php echo $lang['show_more']; ?></a>
								</div>
								
							
							
						</div>
						
					</div>
					
			<?php }}if($this->input->get('cat')!='blogs' && $this->input->get('cat')!='all') { foreach($result->result() as $row){ 
			?>
					<div class="tile">
					
						<div class="bolg-results">
							
							
							
							<?php	if($this->input->get('cat')=='user'){ ?>
							
							<div class="featured-image"><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($row->photo)){ echo $row->photo; }else{ echo "profile.png";}  ?>" class="img-responsive img-thumbnail"  alt="featured image"></div>
							
							<?php	}if($this->input->get('cat')=='group'){ ?>
							
								<div class="featured-image"><img src="<?php echo base_url(); ?>uploads/groups/banners/<?php if(!empty($row->photo)){echo $row->photo;}else{echo "default_group.jpg";} ?>" class="img-responsive img-thumbnail"  alt="featured image"></div>
							
							<?php } if($this->input->get('cat')!='user' AND $this->input->get('cat')!='group')  { ?>
							
								<div class="featured-image"><img src="<?php echo base_url(); ?>uploads/<?php echo $this->input->get('cat');   ?>/<?php if(!empty($row->photo)){echo $row->photo;}else{echo "default_".$this->input->get('cat').".jpg";} ?>" class="img-responsive img-thumbnail"  alt="featured image"></div>
								
						
								
									<?php } ?>	
								
								<div class="blog-content">
								
									<h1 class="blog-heading"><?php echo $row->Title; ?></h1>
									<?php if(strlen($row->description) > 30) echo substr($row->description, 0,30).'...'; else echo $row->description; ?>
									
								</div>
								
							
								<div class="read-more">
							
							
						<?php	if($this->input->get('cat')=='user'){ ?>
								
								<a class="show-more" href="<?php echo base_url().'basicprofile?uid='.$row->ID;?>"><?php echo $lang['show_more']; ?></a>
								
								
								
							<?php } if($this->input->get('cat')=='forum'){ ?>	
								
								<a class="show-more" href="<?php echo base_url().'forum/search?search='.$row->Title;?>"><?php echo $lang['show_more']; ?></a>
								
								
							<?php } if($this->input->get('cat')=='discussion'){ ?>	
								
								<a class="show-more" href="<?php echo base_url().'discussions/view/'.$this->custom_function->create_ViewUrl($row->ID,$row->Title);?>"><?php echo $lang['show_more']; ?></a>
								<?php } if($this->input->get('cat')=='group'){ ?>	
								
								<a class="show-more" href="<?php echo base_url().'groups/view/'.$this->custom_function->create_ViewUrl($row->ID,$row->Title);?>"><?php echo $lang['show_more']; ?></a>
								<?php
							}if($this->input->get('cat')!='user' AND $this->input->get('cat')!='discussion' AND $this->input->get('cat')!='group' AND $this->input->get('cat')!='forum') { ?>
									<a class="show-more" href="<?php echo base_url().$this->input->get('cat').'/view/'.$this->custom_function->create_ViewUrl($row->ID,$row->Title);?>"><?php echo $lang['show_more']; ?></a>
									
							<?php } ?>
									
								</div>
								
							
							
						</div>
						
					</div>
			<?php } }?>
			
			
					
				</section>

			</div>
			
		</section>
		
	</div>
	

	<!--page middle -->
	<footer class="footer">
	
		<section class="container">
	
			<section class="col-md-3">
			
				<div class="text-center">
				
					<span class="footer-icons"><a href="#"><i class="fa fa-flag"></i></a><a href="#"><i class="fa fa-cog"></i></a><a href="#"><i class="fa fa-tint"></i></a><a href="#"><i class="fa fa-search"></i></a></span>
				
				</div>
				
			</section>
		
			<section class="col-md-9 text-center">
			
				<nav class="navbar navbar-inverse navbar-fixed-bottom" style="background:rgba(0,0,0,0);">
				
					  <div class="navbar-header pull-right">
						<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button
					</div>
				
					<div id="navbarCollapse" class="collapse navbar-collapse pull-right">
						<ul class="nav navbar-nav">
						
							<li><a href="#"><?php echo $lang['about']; ?></a></li>
							<li><a href="#"><?php echo $lang['terms']; ?></a></li>
							<li><a href="#"><?php echo $lang['legal']; ?></a></li>
							<li><a href="#"><?php echo $lang['privacy']; ?></a></li>
							<li><a href="#"><?php echo $lang['feedback']; ?></a></li>
							<li><a href="#">2015 <?php echo $lang['mavr']; ?>.</a></li>
						</ul>
					</div>
					
				</nav>
			
			</section>
			
		</section>
		
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/search/bootstrap.min.js" type="text/javascript"></script> <!-- Bootstrap.min jQuery -->
	<script src="<?php echo base_url(); ?>assets/js/search/jquery.isotope.min.js" type="text/javascript"></script> <!-- Isotope Layout Plugin -->
	<script src="<?php echo base_url(); ?>assets/js/search/jquery.mousewheel.js" type="text/javascript"></script> <!-- jQuery Mousewheel -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/search/jquery.mCustomScrollbar.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/search/script.js" type="text/javascript"></script>
	 <script src="<?php echo base_url(); ?>assets/js/search/tileshow.js" type="text/javascript"></script> <!-- Mahajyothis Custom Tileshow Plugin -->
	
	<script type="text/javascript">
		$(document).ready(function(){
			$(".tip-bottom").tooltip({
				placement : 'bottom'
			});
		});
	</script>
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
				  $(document).on('click','body',function(){
				  $(".search_result").html('');
				  });
		 });
		</script>
	
	<script>

	function loopl(){
		$('.mCSB_container').animate({ "left": "+=100px" }, "800", 'linear', loopl  );
	}        
	function loopr(){
		$('.mCSB_container').animate({ "left": "-=100px" }, "800", 'linear', loopr  );
	}
	function stop(){
		$('.mCSB_container').stop();
	}
	$( "#left" ).hover(loopl, stop);
	$( "#right" ).hover(loopr, stop);

	</script>
	
	
</body>
</html>