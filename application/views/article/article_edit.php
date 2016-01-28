<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title; ?></title>
<?php require_once(CSS.'css.php'); ?>
</head>
<body>
<div class="col-md-12" id="pageCloseBtn">
		<a href="<?php echo base_url('article/view/'.$this->custom_function->create_ViewUrl($result->artID,$result->artTitle));?>"><img src="<?php echo base_url().IMAGES; ?>article/delete.png" class="close-section"></a>
	</div>
<div class="container">
	<div class="col-md-2">
	</div>
	<div class="col-md-8 post">
	
	<form method="post" enctype="multipart/form-data">
		<div class="col-md-12 publish">
			<center>
			<p class="publish-info">
				<?php echo $lang['edit_article']; ?>
			</p>
			</center>
		</div>
		<?php if($this->session->flashdata('success')){ ?>			
			<div class="col-md-12 alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong><?php echo $lang['congrats']; ?>!</strong> <?php echo $this->session->flashdata('success');?>
			</div>
		<?php } ?>
    	<?php if(validation_errors()){ ?>
			<div class="col-md-12 alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <?php echo $lang['error_message']; ?> !
			</div>
    	<?php } ?>
		<div class="col-md-12 title">
			<div class="col-md-4">
				<p class="title-info">
					<?php echo $lang['title']; ?>:<span>*</span>
				</p>
			</div>
			<div class="col-md-8">
				<input class="details" name="artTitle" value="<?php echo $result->artTitle; ?>" required></input>
			</div>
		</div>
		<div class="col-md-12 title">
			<div class="col-md-4">
				<p class="title-info">
					<?php echo $lang['category']; ?>:<span>*</span>
				</p>
			</div>
			<div class="col-md-8">
				<select id="tokenize" multiple="multiple" name="artCategory[]" class="tokenize-sample" required>
					<?php 
					$selectedCategories = explode(',',$result->artCategory);
					if($categories){
						foreach ($categories as $key => $value) { ?>
							<option <?php if(in_array($value->id, $selectedCategories)) echo 'selected="selected"'; ?> value="<?php echo $value->id;?>"><?php echo ucwords($value->name);?></option>
						<?php } 
					} ?>
				    
				</select>
			</div>
		</div>
		<div class="col-md-12 summary">
			<div class="col-md-4">
				<p class="title-info">
					<?php echo $lang['summary']; ?>:<span>*</span>
				</p>
			</div>
			<div class="col-md-8">
				<textarea id="summary-details" name="artSummary" required><?php echo $result->artSummary; ?></textarea>
				<p id="chars_left">
					<span>450</span> <?php echo $lang['character_limit']; ?>
				</p>
			</div>
		</div>
		<div class="col-md-12 keywords">
			<div class="col-md-4">
				<p class="title-info">
					<?php echo $lang['keywords']; ?>:<span>*</span>
				</p>
				<p class="commas">
					( <?php echo $lang['seperate']; ?> )
				</p>
			</div>
			<div class="col-md-8">
				<textarea class="keywords-details" name="tagName" required><?php echo $result->artTags; ?></textarea>
			</div>
		</div>
		<div class="col-md-12 Article-Body">
			<div class="col-md-4">
				<p class="title-info">
					<?php echo $lang['article_body']; ?>:<span>*</span>
				</p>
			</div>
			<div class="col-md-8">
				<textarea class="article-details" name="artDesc" required><?php echo $result->artDesc; ?></textarea>
			</div>
		</div>
		<div class="col-md-12 upload">
			<div class="col-md-4">
				<p class="title-info">
					<?php echo $lang['upload_image']; ?>:
				</p>
			</div>
			<div class="col-md-8">
				<?php if($result->artImage && file_exists(ARTICLES.$result->artImage)){ ?>
					<img id="article_img" src="<?php echo base_url().ARTICLES.$result->artImage; ?>" alt="<?php echo $result->artTitle; ?>" />
				<?php } ?>
				<!-- <label for="artImage"  id="chooseFile">Choose an image</label>
				<input type="file" class="upload-details hide required" id="artImage" name="artImage">
	            <p id="fileinfo">Image size should be between 450x300 and 950X400 px</p>
	            <p id="fileErrorinfo"><?php if(!empty($up_res['img_error'])) echo $up_res['img_error'];?></p> -->
	            <div id="chooseImage" class="chooseFile"><?php echo $lang['choose_image']; ?></div>
	            <p id="fileinfo"><?php echo $lang['image_specification']; ?></p>
	            <p id="fileErrorinfo"><?php if(!empty($up_res['img_error'])) echo $up_res['img_error'];?></p>
			</div>
		</div>
		<div class="col-md-12 status">
			<div class="col-md-4">
				<p class="title-info">
					<?php echo $lang['status']; ?>:<span>*</span>
				</p>
			</div>
			<div class="col-md-8">
				<select value="status" name="artStatus" required>
					<option value="1" <?php if($result->artStatus == 1) echo 'selected="selected"'; ?>><?php echo $lang['publish']; ?></option>
					<option value="0" <?php if($result->artStatus == 0) echo 'selected="selected"'; ?>><?php echo $lang['un_publish']; ?></option>
				</select>
			</div>
		</div>
		<div class="col-md-12 submit">
			<div class="col-md-4">
			</div>
			<div class="col-md-6">
				<input type="submit" name="doPublish" value="<?php echo $lang['save']; ?>" class="btn btn-success"></button>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</form>
	</div>
</div>
<div class="col-md-2">
</div>
<?php require_once(JS.'js.php'); ?>
</body>
</html>