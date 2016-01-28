<link href="<?php echo base_url().MOBILE_CSS;?>bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url().MOBILE_CSS;?>bootstrap-theme.min.css" rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->     
      <link rel="stylesheet" type="text/css" href="<?php echo base_url().MOBILE_CSS;?>font-awesome.min.css" />         
      <link rel="stylesheet" type="text/css" href="<?php echo base_url().MOBILE_CSS;?>style.css">
<?php 

 if(isset($page_name)){
 
	switch($page_name){
		case 'maha_home': ?>
		<style>
			html,body{height:100%;}
		</style>
		<?php break;
		case 'articles':
		case 'article_view':
			echo '
				<link href="'.base_url().CSS.'article/art-in-style.css" rel="stylesheet">
				<link href="'.base_url().CSS.'events/jquery.tokenize.css" rel="stylesheet">
				<link href="'.base_url().MOBILE_CSS.'article.css" rel="stylesheet">
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