<body class="article-page">
   	<div class="main-div">
    	  <div class="container-fluid">
		  <?php echo $logo_login_part; ?>
            <div class="row article-add">
            	<form>
                	<div class="col-xs-4 no-r-pad form-group">
						<select class="form-control btn-no-rad article-filter">
							<option <?php if($category_type == '') echo 'selected'; ?> value = "<?php echo $this->config->item('mobile_url').'article'?>"><?php echo $lang['menu_articles'];?></option>
							<option <?php if($category_type == 'latest') echo 'selected'; ?> value = "<?php echo $this->config->item('mobile_url').'article/latest'?>"><?php echo $lang['menu_latest'];?></option>
							<option <?php if($category_type == 'archived') echo 'selected'; ?> value = "<?php echo $this->config->item('mobile_url').'article/archived'?>"><?php echo $lang['menu_archived'];?></option>
							<?php if($saved_articles){ ?>							
							<option <?php if($category_type == 'draft') echo 'selected'; ?> value = "<?php echo $this->config->item('mobile_url').'article/draft'?>"><?php echo $lang['menu_latest'];?></option>
							<?php } ?>
						</select>
					</div>
                    <div class="col-xs-5 no-r-pad no-l-pad form-group">
						<select class="form-control  btn-no-rad  article-filter">						
							<option value=""><?php echo $lang['top_cats'];?></option>
							<?php if($categories){ ?>							
							<?php foreach ($categories as $key => $value) { ?>
								<option <?php if($category_type == 'category' && $category_id == $value->id ) echo 'selected'; ?> value="<?php echo $this->config->item('mobile_url').'article/category/'.$this->custom_function->create_ViewUrl($value->id,$value->name);?>"><?php echo ucwords($value->name);?></option>
						<?php 	}
						} ?>
						</select>
					</div>
                    <div class="col-xs-3 no-l-pad form-group"><button type="button" data-toggle="modal" data-target="#article-modal" class="btn btn-orange btn-no-rad form-control orange-bg white btn-xs"><?php echo $lang['add_article']; ?></button></div>
                </form>                
            </div>
			<?php if($results){ 
							foreach ($results as $key => $value) { ?>
            <div class="row article-box art-box">            	
                	<div class="col-xs-12">
                    	<h5 class="white"><strong><?php echo $value->artTitle; ?></strong></h5>
                    </div>                        	
            	<div class="col-xs-7 no-r-pad article-pic">
                	<img src="<?php echo ($value->artImage && file_exists(ARTICLES.$value->artImage)) ? base_url().ARTICLES.$value->artImage : base_url().ARTICLES.'Article-Default.jpg';?>" alt="<?php echo $value->artTitle; ?>" title="<?php echo $value->artTitle; ?>" class="img-responsive img-center"/>
                </div>    
                <div class="col-xs-5 no-l-pad soc article-social art-soc">
                	<div class="social-box text-center">
                    	<ul class="list-unstyled">                                                
                          <li><button class="btn btn-sm orange-bg btn-no-rad"><i class="fa fa-calendar"></i>&nbsp;<span><?php echo date("m/d/y g:i A", strtotime($value->artCreated)); ?></span></button></li>
                          <li><button class="btn btn-sm btn-no-rad orange-bg"><i class="fa fa-folder-open"></i>&nbsp;<span><?php echo $lang['categories']; ?>: <?php echo $value->artCategory; ?></span></button></li>
                           <li><button class="btn btn-sm orange-bg btn-no-rad"><i class="fa fa-user"></i>&nbsp;<span><?php echo $lang['admin_post']; ?></span></button></li>                          
                        </ul>
                    </div>
                </div>   
                <div class="col-xs-12 white art-data text-justify">
                	<p><?php echo $value->artSummary; ?></p>
                    <a href="<?php echo $this->config->item('mobile_url').'article/view/'.$this->custom_function->create_ViewUrl($value->artID,$value->artTitle);?>" class="btn btn-group btn-xs art-g-btn btn-no-rad white"><?php echo $lang['read_more']; ?></a>
                    <div class="art-line"></div>
                </div>         
            </div><!--profile-box-->    
				<?php 	}
					} else { ?>
						<div id="no-data"><?php echo $lang['no_records']; ?> !</div>
					<?php } ?>
          </div><!--container-fluid-->
		  <!--Pagination starts-->
		  <ul class="pagination">
				<?php echo $pagination;?>
			</ul>
			<!--Pagination ends here-->
    </div><!--plugin--> 
<!--article-modal-->       	
<div class="modal fade" id="article-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content article-model-bg">
      <div class="modal-header article-head-bg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title white" id="myModalLabel"><?php echo $lang['publish_article']; ?></h4>
      </div>
      <div class="modal-body white">
      	<form role="form" id="EventAddForm" method="post" action="<?php echo base_url(); ?>article/publish" enctype="multipart/form-data">
        <div class="row">
			<div class="form-group">
				<p id="Validation_Error"></p>
			</div>
        	<div class="col-xs-12">
            	<label for="artTitle"><?php echo $lang['title']; ?> <span class="mandatoryFields">*</span></label>
            	<div class="form-group">
					<input class="details form-control required" id="artTitle" name="artTitle" value="<?php echo $this->input->post('artTitle');?>" placeholder="<?php echo $lang['enter_title']; ?>" required></input>
            	</div>                                                                      	
                <label for="tokenize"><?php echo $lang['category']; ?><span class="mandatoryFields">*</span></label>
            	<div class="form-group">
            		<select id="tokenize" multiple="multiple" name="artCategory[]" class="tokenize-sample form-control" required>
						<?php 
							$selectedCategories = $this->input->post('artCategory'); if($categories){ foreach ($categories as $key => $value) { ?>
							<option <?php if(!empty($selectedcategories) && in_array($value->id, $selectedCategories)) echo 'selected="selected"'; ?> value="<?php echo $value->id;?>"><?php echo ucwords($value->name);?></option>
						<?php } 
							} ?>
					</select>
            	</div>
                <label for="summary-details"><?php echo $lang['summary']; ?><span class="mandatoryFields">*</span></label>
            	<div class="form-group">
            		<textarea id="summary-details" name="artSummary" class="form-control required" required><?php echo $this->input->post('artSummary');?></textarea>
					<p id="chars_left">
						<span>450</span> <?php echo $lang['character_limit']; ?>
					</p>
            	</div>
                <label for="tagName"><?php echo $lang['keywords']; ?> ( <?php echo $lang['seperate']; ?> ) <span class="mandatoryFields">*</span></label>
            	<div class="form-group">					
					<textarea id="tagName" name="tagName" class="form-control required" required><?php echo $this->input->post('tagName');?></textarea>
            	</div>
				<label for="article-details"><?php echo $lang['article_body']; ?><span class="mandatoryFields">*</span></label>
            	<div class="form-group">
            		<textarea id="article-details" name="artDesc" class="form-control article-details"><?php echo $this->input->post('artDesc');?></textarea>
            	</div>
				<label><?php echo $lang['upload_image']; ?><span class="mandatoryFields">*</span></label>
				<label><?php echo $lang['upload_image']; ?><span class="mandatoryFields">*</span></label>
            	<div class="form-group">
            		<span class="file-input btn btn-sm btn-no-rad btn-cam-file btn-file text-center">
                        <i class="fa fa-camera fa-2x"></i><br>Choose File<input type="file" multiple="">
                    </span>
					<div id="chooseImage">
						<?php echo $lang['choose_image']; ?>
					</div>
					<p id="fileinfo">
						<?php echo $lang['image_specification']; ?>
					</p>
					<p id="fileErrorinfo">
					</p>
            	</div>
				<label><?php echo $lang['status']; ?><span class="mandatoryFields">*</span></label>
            	<div class="form-group">
            		<label class="radio-inline art-radio"><input type="radio" name="artStatus" value="1" checked><?php echo $lang['publish']; ?></label>
                    <label class="radio-inline art-radio"><input type="radio" name="artStatus" value="0" ><?php echo $lang['un_publish']; ?></label>
            	</div>
                <div class="row">
                	<div class="col-xs-12">
                    	<label><?php echo $lang['captcha']; ?><span class="mandatoryFields">*</span></label>
                    </div>
                	<div class="col-xs-6">                    	
                        <div class="form-group">
							<input type="text" name="captcha" id="captcha" class="details form-control required" autocomplete="off" required />							
                        </div>
                    </div>
                    <div class="col-xs-6 text-right">
						<img id="captcha_code" src="<?php echo base_url();?>article/get_captcha" />
                    	<button type="button" class="btn btn-sm cap-btn" id="refreshCaptcha"><img src="<?php echo base_url().MOBILE_IMAGES ?>captcha-img.png"></button>                    	
                    </div>
                </div>                                               
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer"> 
      <button type="button" name="doSaveDraft" class="btn btn-no-rad btn-sm mo-btn mo-can-btn white saveArticle"><?php echo $lang['save_draft']; ?></button>        
        <button type="button" name="doPublish" class="btn btn-no-rad article-head-bg white btn-sm mo-btn saveArticle"><?php echo $lang['publish']; ?></button>
      </div>
    </div>
  </div>
</div>

