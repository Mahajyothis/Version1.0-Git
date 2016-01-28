<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(JS.'bootstrap.min.js'); ?>"></script>
<script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>

<?php 

 if(isset($page_name)){
 
	switch($page_name){
		case 'articles':
		case 'article_view':
		case 'article_edit':
			echo '
				<script type="text/javascript" src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
				<script type="text/javascript" src="'.base_url().JS.'events/jquery.tokenize.js"></script>
				<script type="text/javascript" src="'.base_url().JS.'jquery-ui.min.js"></script>
				<script type="text/javascript" src="'.base_url().JS.'crop/jquery.picture.cut.js"></script>
				<script type="text/javascript" src="'.base_url().JS.'crop/call.js"></script>
				<script type="text/javascript" src="'.base_url().JS.'article/main_page.js"></script>
				<script type="text/javascript" src="'.base_url().JS.'article/captcha.js"></script>
				';
				include_once(JS.'article/script.php');
		break;
		
		
		case 'forum':
			echo '
			
				
				';
				
				include_once(JS.'forum/script.php');
		break;
		
		
	}
}