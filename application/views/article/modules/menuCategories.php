<div class="col-md-2 no-pad-clss admin-information">
		<div class="row">
			<div class="col-md-12 infrmatn">
				<div class="row mnu-contnt-art">
					<div class="col-md-12 " id="left-menu-container">
						<ul class="btn-mnus-clss">
						<li <?php if($category_type == '') echo 'class="active"'; ?>><img class="pics" src="<?php echo base_url().IMAGES;?>article/article.png"><a href="<?php echo base_url('article');?>"><?php echo $lang['menu_articles'];?></a></li>
						<li <?php if($category_type == 'latest') echo 'class="active"'; ?>><img class="pics" src="<?php echo base_url().IMAGES;?>article/latest.png"><a href="<?php echo base_url('article/latest');?>"><?php echo $lang['menu_latest'];?></a></li>
						<li <?php if($category_type == 'archived') echo 'class="active"'; ?>><img class="pics" src="<?php echo base_url().IMAGES;?>article/archieve.png"><a href="<?php echo base_url('article/archived');?>"><?php echo $lang['menu_archived'];?></a></li>
						<?php if($saved_articles){ ?>
						<li <?php if($category_type == 'draft') echo 'class="active"'; ?>><img class="pics" src="<?php echo base_url().IMAGES;?>article/article.png"><a href="<?php echo base_url('article/draft');?>"><?php echo $lang['menu_saved'];?></a></li>
						<?php } ?>
					</ul>
					<div id="menu-title"><?php echo $lang['top_cats'];?></div>
					<ul class="btn-mnus-clss">
						<?php 
/*$art_img = array(
'Astrology'=>'astrology.png',
'Ayurveda'=>'ayurveda.png',
'Fengi shui'=>'Fengi-Shui.png',
'Vedas'=>'vedas.png',
'Yoga'=>'yoga.png',
);*/
if($categories){ ?>							
							<?php foreach ($categories as $key => $value) { ?>
								<li <?php if($category_type == 'category' && $category_id == $value->id ) echo 'class="active"'; ?>><img class="pics" src="<?php echo base_url().IMAGES;?>article/<?php echo $value->icon; ?>"><a href="<?php echo base_url('article/category/'.$this->custom_function->create_ViewUrl($value->id,$value->name));?>"><?php echo ucwords($value->name);?></a></li>
						<?php 	}
						} ?>
					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>