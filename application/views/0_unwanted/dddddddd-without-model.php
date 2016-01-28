<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>.:: Welcome to Discussions ::.</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url('assets/dis/css/discussion.css');?>" rel="stylesheet">
	
	</head>
	<body>
<div class="wrapper">
    <div class="box">
        <div class="row">
            <!-- sidebar -->
            <div class="column col-sm-3" id="sidebar" style="background-color:#4285F4;">
                <a class="logo" href="#">D</a>
                <ul class="nav">
                    <li class="active"><a href="#my-discussions">My Discussions</a>
                    </li>
                    <li><a href="#public-discussions">Public Discussions</a>
                    </li>
                </ul>
                <ul class="nav hidden-xs" id="sidebar-footer">
                    <li>
                      <a href="#"><h3>Mahajyothis</h3></a>
                    </li>
                </ul>
            </div>
            <!-- /sidebar -->
          
            <!-- main -->
			
            <div class="column col-sm-9" id="main">
			
				<div class="padding">
				<?php $user = $this->session->userdata('profile_data');
				//print_r($user[0]['photo']);
				?>
				 <a style="cursor:pointer;" href="<?php echo base_url('user/'.$user[0]['custName']);?>"><span class="pull-right btn-success" style="background-color:red;padding-left:3px;padding-right:3px;color:#fff;">X</span></a>
                    <div class="full col-sm-9">
                      
                        <!-- content -->
                        
                        <div class="col-sm-12" id="my-discussions">   
                          <div class="page-header text-muted">
                          My Discussions
						 
						  <a style="cursor:pointer;" id="newDis" ><span class="pull-right btn-success" style="background-color:#fff;color:green;">+ New Discussion</span></a>
						  
						  
                          </div> 
						 
                        </div>
							<div class="row" id="createNew" style="display:none;">
						     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Start New Discussion</h4>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'discussions/add';?>" enctype="multipart/form-data">
          <div class="form-group">
		   <input type="hidden" required class="form-control" name="userID" id="userID" value="<?php echo $user[0]['custID'];?>">
            <label for="recipient-name" class="control-label">Title:</label>
            <input type="text" required class="form-control" name="titleDis" id="titleDis">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" name="bodyDis" id="bodyDis" required></textarea>
          </div>
		  
		    <div class="form-group">
            <label for="message-text" class="control-label">Privacy:</label>
            <select class="form-control"  name="privacy" id="privacy">
			<option value='1'>Public</option>
			<option value='2'>Private</option>
			</select>
          </div>
    
      </div>
      <div class="modal-footer">
     
		 <input type="submit" class="btn btn-primary" value="submit" />
      </div>
	      </form>
    </div>
	   <div class="row divider">    
                           <div class="col-sm-12"><hr></div>
                        </div>
                        
						</div>
						
                        <?php 
						if($all) foreach($all as $dicussion)
						{
						?>
                        <!--/top story-->
						
					
						
                        <div class="row"> 
						
                          <div class="col-sm-10">
                            <h3><?=$dicussion->titleDis;?></h3>
                            <p class="read-more">
							<?=$dicussion->bodyDis;?> </p>
							
							<h4>
								<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-pencil"></span> 6</span>
						<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-thumbs-up"></span> 40</span>
								
										<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-eye-open"></span> 56</span>
                            <small> <span class="small glyphicon glyphicon-time"></span> <?=date('d M Y H:i A',$dicussion->dDate);?></small>
                            </h4>
							
					<textarea class="form-control" id="message-text"></textarea>
                          </div>
						  
                          <div class="col-sm-2">
                            <a href="#" class="pull-right"><img src="http://api.randomuser.me/portraits/thumb/men/86.jpg" class="img-circle"></a>
                          </div> 
                        </div>
						    <div class="row divider">    
                           <div class="col-sm-12"><hr></div>
                        </div>
						
						<?php } ?>
						
						    <div class="row">    
                          <div class="col-sm-10">
                            <h3>Who to make more friends?</h3>
                            <p class="read-more">
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
							
							<h4>
								<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-pencil"></span> 6</span>
						<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-thumbs-up"></span> 40</span>
								
										<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-eye-open"></span> 56</span>
                            <small> <span class="small glyphicon glyphicon-time"></span> 1 hour ago</small>
                            </h4>
							<textarea class="form-control" id="message-text"></textarea>
					
                          </div>
						  
                          <div class="col-sm-2">
                            <a href="#" class="pull-right"><img src="http://api.randomuser.me/portraits/thumb/men/19.jpg" class="img-circle"></a>
                          </div> 
                        </div>
                        
                        <div class="col-sm-12" id="public-discussions">  
                          <div class="page-header text-muted divider">
                          Public Discussions
                          </div>
                        </div>
                        
                        
                        <!--/stories-->
                        <div class="row">    
                          <div class="col-sm-10">
                            <h3>Dramatically Raise the Value of Any Piece of Content</h3>
                            <p class="read-more">
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
							
							<h4>
								<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-pencil"></span> 6</span>
						<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-thumbs-up"></span> 40</span>
								
										<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-eye-open"></span> 56</span>
                            <small> <span class="small glyphicon glyphicon-time"></span> 1 hour ago</small>
                            </h4>
							<textarea class="form-control" id="message-text"></textarea>
                          </div>
                          <div class="col-sm-2">
                            <a href="#" class="pull-right"><img src="http://mahajyothis.net.local/uploads/10__my%20photo.jpg" class="img-circle"></a>
                          </div> 
                        </div>
                        
                        <div class="row divider">    
                           <div class="col-sm-12"><hr></div>
                        </div>
                        
                    
                        <div class="row">    
                          <div class="col-sm-10">
                            <h3>Google has changed logo..wow</h3>
                            <p class="read-more">
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
							
							<h4>
								<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-pencil"></span> 6</span>
						<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-thumbs-up"></span> 40</span>
								
										<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-eye-open"></span> 56</span>
                            <small> <span class="small glyphicon glyphicon-time"></span> 1 hour ago</small>
                            </h4>
							<textarea class="form-control" id="message-text"></textarea>
                          </div>
                          <div class="col-sm-2">
                            <a href="#" class="pull-right"><img src="http://api.randomuser.me/portraits/thumb/men/86.jpg" class="img-circle"></a>
                          </div> 
                        </div>
                        
                        <div class="row divider">    
                           <div class="col-sm-12"><hr></div>
                        </div>
                        
                  
                    
                     
                   
                        
                        <div class="col-sm-12">
                          <div class="page-header text-muted divider">
                            Up Next
                          </div>
                        </div>
                      
                    
                      
                      
                        <div class="col-sm-12">
                          <div class="page-header text-muted divider">
                            Connect with Us
                          </div>
                        </div>
                      
                        <div class="row">
                          <div class="col-sm-6">
                            <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
                          </div>
                        </div>
                        
                        <hr>
                      
                        <div class="row" id="footer">    
                          <div class="col-sm-6">
                            
                          </div>
                          <div class="col-sm-6">
                            <p>
                            <a href="http://www.insigneinc.com/" target="_blank" class="pull-right">Copyright &copy; <?php echo date('Y');?> - Insigne Inc. </a>
                            </p>
                          </div>
                        </div>
                      
                      <hr>
                      
                   
                      
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
        </div>
    </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo base_url('assets/dis/js/bootstrap.min.js');?>"></script>
	<script>
$(document).ready(function(){
    $("#newDis").click(function(){
        $("#createNew").fadeIn('slow');
    });
	$("#close").click(function(){
        $("#createNew").fadeOut('slow');
    });
});
</script>
<script type="text/javascript" src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
<script>
   CKEDITOR.replace( 'bodyDis' );
</script>

	</body>
</html>