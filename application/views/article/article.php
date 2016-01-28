<!Doctype html>
<html lang="en">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<meta name="viewport" content="width=device-width">
<?php require_once(CSS.'css.php'); ?>
<style>
.pics{
width: 25px;
margin: 8px;
}
</style>

</head>
<body>
<div class="col-md-12 no-pad-clss">
	<?php echo $menuIcons; ?>
	<?php echo $menuCategories; ?>	
	<div class="col-md-9 no-pad-clss art-bck">
		<div class="col-md-10 art-rhthead-bckclr no-pad-clss">
			<div class="col-md-12 art-bck-head no-pad-clss">
				<div class="col-md-4 pull-right margn-cls">
					<span class="usr-log-cls"> <span class="usr-nme"><a href="<?php echo base_url().'user/'.$this->session->userdata['profile_data'][0]['custName'];?>"><?php echo ucwords($this->session->userdata['profile_data'][0]['perdataFullName']); ?></a></span></span>
					<span>
					<a href="<?php echo base_url().'user/'.$this->session->userdata['profile_data'][0]['custName'];?>"><img src="<?php echo ($this->session->userdata['profile_data'][0]['photo'] && file_exists(UPLOADS.$this->session->userdata['profile_data'][0]['photo'])) ? base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'] : base_url().UPLOADS.'profile.png';?>" alt="<?php echo $this->session->userdata['profile_data'][0]['photo']; ?>" class="img-responsive img-circle img-height-cls"></a>
					</span>
				</div>
			</div>
		</div>
		<div class="site-wrapper">
			<section class="container">
			<div class="row">
				<div class="col-md-9 col-md-offset-1 post-top">
					<?php if($this->session->flashdata('flash_message')) { ?>
					<div class="alert alert-success fade in">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<?php echo $this->session->flashdata('flash_message'); ?>
					</div>
					<?php } ?>
					<?php if($results){ 
							foreach ($results as $key => $value) { ?> <article class="post">
					<header>
					<a href="<?php echo base_url().'article/view/'.$this->custom_function->create_ViewUrl($value->artID,$value->artTitle);?>"><img src="<?php echo ($value->artImage && file_exists(ARTICLES.$value->artImage)) ? base_url().ARTICLES.$value->artImage : base_url().ARTICLES.'Article-Default.jpg';?>" alt="<?php echo $value->artTitle; ?>" title="<?php echo $value->artTitle; ?>" ></a>
					<div class="post-meta">
						<ul>
							<li><button><i class="fa fa-calendar"></i></button>
							<div class="meta-content">
								<span><?php echo date("m/d/y g:i A", strtotime($value->artCreated)); ?></span>
							</div>
							</li>
							<li><button><i class="fa fa-folder-open"></i></button>
							<div class="meta-content">
								<span> <?php echo $lang['categories']; ?>: <?php echo $value->artCategory; ?></span>
							</div>
							</li>
							<li><button><i class="fa fa-user"></i></button>
							<div class="meta-content">
								<span><?php echo $lang['admin_post']; ?></span>
							</div>
							</li>
						</ul>
					</div>
					</header>
					<a href="<?php echo base_url().'article/view/'.$this->custom_function->create_ViewUrl($value->artID,$value->artTitle);?>">
					<h1><?php echo $value->artTitle; ?></h1>
					</a>
					<div class="post-content">
						<p>
							<?php echo $value->artSummary; ?>
						</p>
					</div>
					<a class="btn btn-md" href="<?php echo base_url().'article/view/'.$this->custom_function->create_ViewUrl($value->artID,$value->artTitle);?>"><?php echo $lang['read_more']; ?></a>
					</article>
					<?php 	}
					} else { ?>
						<div id="no-data"><?php echo $lang['no_records']; ?> !</div>
					<?php } ?>
				</div>
			</div>
			<ul class="pagination">
				<?php echo $pagination;?>
			</ul>
			</section>
			<?php echo $createArticlePopup;?>
		</div>
	</div>
</div>
<?php require_once(JS.'js.php'); ?>
</body>
</html>