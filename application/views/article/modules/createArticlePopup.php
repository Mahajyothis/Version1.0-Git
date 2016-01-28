<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content" style="background:rgba(10, 56, 88, 0.9)">
						<div class="modal-header" style="padding:16px 50px;">
							<button type="button" class="close" data-dismiss="modal" style="color: #fff" ;>&times;</button>
							<h4 style="color: #fff;"><span class="glyphicon"></span><?php echo $lang['publish_article']; ?></h4>
						</div>
						<div class="modal-body" style="padding:40px 50px;height: 550px;overflow-y: scroll;">
							<!-- form start -->
							<form role="form" id="EventAddForm" method="post" action="<?php echo base_url(); ?>
								article/publish" enctype="multipart/form-data">
								<div class="form-group">
									<p id="Validation_Error">
									</p>
								</div>
								<div class="form-group">
									<label style="color: #fff" ; for="artTitle"><span class="glyphicon"></span> <?php echo $lang['title']; ?>: <span class="mandatoryFields">*</span></label>
									<input class="details form-control required" id="artTitle" name="artTitle" value="<?php echo $this->input->post('artTitle');?>" placeholder="<?php echo $lang['enter_title']; ?>" required></input>
								</div>
								<div class="form-group">
									<label style="color: #fff" ; for="tokenize"><span class="glyphicon"></span> <?php echo $lang['category']; ?>: <span class="mandatoryFields">*</span></label>
									<select id="tokenize" multiple="multiple" name="artCategory[]" class="tokenize-sample form-control" required>
										<?php 
											$selectedCategories = $this->input->post('artCategory'); if($categories){ foreach ($categories as $key => $value) { ?>
											<option <?php if(!empty($selectedcategories) && in_array($value->id, $selectedCategories)) echo 'selected="selected"'; ?> value="<?php echo $value->id;?>"><?php echo ucwords($value->name);?></option>
										<?php } 
											} ?>
									</select>
								</div>
								<div class="form-group">
									<label style="color: #fff" ; for="summary-details"><span class="glyphicon"></span> <?php echo $lang['summary']; ?>: <span class="mandatoryFields">*</span></label>
									<textarea id="summary-details" name="artSummary" class="form-control required" required><?php echo $this->input->post('artSummary');?></textarea>
									<p id="chars_left">
										<span>450</span> <?php echo $lang['character_limit']; ?>
									</p>
								</div>
								<div class="form-group">
									<label style="color: #fff" ; for="tagName"><span class="glyphicon"></span> <?php echo $lang['keywords']; ?>: ( <?php echo $lang['seperate']; ?> ) <span class="mandatoryFields">*</span></label>
									<textarea id="tagName" name="tagName" class="form-control required" required><?php echo $this->input->post('tagName');?></textarea>
								</div>
								<div class="form-group">
									<label style="color: #fff" ; for="article-details"><span class="glyphicon"></span> <?php echo $lang['article_body']; ?>: <span class="mandatoryFields">*</span></label>
									<textarea id="article-details" name="artDesc" class="form-control article-details"><?php echo $this->input->post('artDesc');?></textarea>
								</div>
								<div class="form-group" style="color:#fff;">
									<label style="color: #fff" ;><span syle="color:#fff" ; class="glyphicon"></span> <?php echo $lang['upload_image']; ?>: <span class="mandatoryFields">*</span></label>
									<div id="chooseImage">
										<?php echo $lang['choose_image']; ?>
									</div>
									<p id="fileinfo">
										<?php echo $lang['image_specification']; ?>
									</p>
									<p id="fileErrorinfo">
									</p>
								</div>
								<div class="form-group" style="color:#fff;">
									<label style="color: #fff" ;><span syle="color:#fff" ; class="glyphicon"></span> <?php echo $lang['status']; ?>: <span class="mandatoryFields">*</span></label>
									<input type="radio" name="artStatus" value="1" checked> <?php echo $lang['publish']; ?> <input type="radio" name="artStatus" value="0"> <?php echo $lang['un_publish']; ?>
								</div>
								<div class="form-group" style="color:#fff;">
									<label style="color: #fff" ;><span syle="color:#fff" ; class="glyphicon"></span> <?php echo $lang['captcha']; ?>: <span class="mandatoryFields">*</span></label>
									<input type="text" name="captcha" id="captcha" class="details form-control required" autocomplete="off" required />

									<div>
										<img id="captcha_code" src="<?php echo base_url();?>article/get_captcha" />
										<button type="button" id="refreshCaptcha" style="background-color:#8B8B8B;border:0;padding:7px 10px;color:#FFF;float:left;"><?php echo $lang['refresh_captcha']; ?></button>
									</div>
								</div>
								<input type="button" name="doPublish" value="<?php echo $lang['publish']; ?>" class="btn btn-success saveArticle"/>
								<input type="button" name="doSaveDraft" value="<?php echo $lang['save_draft']; ?>" class="btn btn-success saveArticle"/>
							</form>
							<!--  end -->
						</div>
					</div>
				</div>
			</div>