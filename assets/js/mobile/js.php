<script src="<?php echo base_url().MOBILE_JS;?>jquery.min.js"></script>
<script src="<?php echo base_url().MOBILE_JS;?>bootstrap.min.js"></script>
<script>
var base_url = '<?php echo base_url();?>';
</script>
<?php 

 if(isset($page_name)){
 
	switch($page_name){
		case 'articles':
		case 'article_view':
		case 'article_edit':
?>
<script>
$(document).on('change','.article-filter',function(e){
		var href = $(this).val();
		if(href) location.href = href;
	});
</script>
<?php
			echo '
				<script type="text/javascript" src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
				<script type="text/javascript" src="'.base_url().JS.'events/jquery.tokenize.js"></script>
				<script type="text/javascript" src="'.base_url().JS.'jquery-ui.min.js"></script>
				<script type="text/javascript" src="'.base_url().JS.'crop/jquery.picture.cut.js"></script>
				<script type="text/javascript" src="'.base_url().JS.'crop/call.js"></script>
				<script type="text/javascript" src="'.base_url().JS.'article/main_page.js"></script>
				<script type="text/javascript" src="'.base_url().JS.'article/captcha.js"></script>
				';
				include_once('../version1/'.JS.'article/script.php');

		break;
		
	}
}