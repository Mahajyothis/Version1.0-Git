 <link href="<?php echo base_url(CSS.'bootstrap.min.css');?>" rel="stylesheet">
<?php 

 if(isset($page_name)){
 
	switch($page_name){
		case 'articles':
		case 'article_view':
			echo '
				
				<link href="'.base_url().CSS.'article/font-awesome.min.css" rel="stylesheet">
				<link href="'.base_url().CSS.'article/art-in-style.css" rel="stylesheet">
				<link href="'.base_url().CSS.'events/jquery.tokenize.css" rel="stylesheet">
			';
		break;
		case 'article_edit':
			echo '
				<link href="'.base_url().CSS.'bootstrap.min.css" rel="stylesheet">
				<link href="'.base_url().CSS.'article/article.css" rel="stylesheet">
				<link href="'.base_url().CSS.'events/jquery.tokenize.css" rel="stylesheet">
			';
		break;
	}
	
}

