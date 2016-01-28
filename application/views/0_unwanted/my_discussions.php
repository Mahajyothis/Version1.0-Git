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
<div class="wrapper" id="loadslow" style="display:none;">
    <div class="box">
        <div class="row">
            <!-- sidebar -->
            <div class="column col-sm-3" id="sidebar" style="background-color:#E67E22;">
                <a href="<?php echo base_url()."discussions";?>"><span style="padding-top:10px;padding-left:10px;"><img style="margin-top:30px;" src="<?php echo base_url('assets/dis/img/dis.png');?>" height="50px" /></span></a>
                <ul class="nav">
                    <li class="active"><a href="<?php echo base_url('discussions/my_discussions');?>">My Discussions</a>
                    </li>
                    <li><a href="<?php echo base_url('discussions/public_discussions');?>">Public Discussions</a>
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
				<?php 
				         if($this->session->userdata('logged_in')!=1)
						{
						    header("location:".base_url());
						}
				          $user = $this->session->userdata('profile_data');
				//print_r($all);
				
				?>
				 <a style="cursor:pointer;" href="<?php echo base_url('user/'.$user[0]['custName']);?>"><span class="pull-right btn-success" style="background-color:#E67E22;padding-left:3px;padding-right:3px;color:#fff;">X</span></a>
                    <div class="full col-sm-9">
                     
                        <!-- content -->
                        
                        <div class="col-sm-12" id="my-discussions">   
                          <div class="page-header text-muted"><span class="glyphicon glyphicon-comment" style="color:#E67E22;"></span><span style="color:#E67E22;">&nbsp;<?=$totalDis;?></span>
                          <?=$titleHead;?>
						 
							  <a style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal"><span class="pull-right btn-success" style="background-color:#fff;color:green;">+ Start Discussion</span></a>
						  
						
						  
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
							
								<?php if($dicussion->custID == $user[0]['custID']){?> 
								
								
							<a style="color:#0174DF;cursor:pointer;" data-toggle="modal" data-target="#exampleModaledit<?=$dicussion->id_dis;?>">
							<span style="float:right; margin: -37px 28px 2px 22px;" class="glyphicon glyphicon-edit"></span>
							</a>
							<a style="color:red;cursor:pointer;" data-toggle="modal" data-target="#exampleModal<?=$dicussion->id_dis;?>"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>
								
							
							
							<div class="modal fade" id="exampleModaledit<?=$dicussion->id_dis;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                           <div class="modal-dialog" role="document" style="z-index:9999;">
                           <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Discussion</h4>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'discussions/update/'.$dicussion->id_dis.'/'.$redirect_page;?>" enctype="multipart/form-data">
          <div class="form-group">
		   <input type="hidden" required class="form-control" name="userID" id="userID" value="<?php echo $user[0]['custID'];?>">
            <label for="recipient-name" class="control-label">Title:</label>
            <input type="text" required class="form-control" name="titleDis" value="<?=$dicussion->titleDis;?>" id="titleDis">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Description:</label>
            <textarea class="form-control" name="bodyDis" id="bodyDis" required><?=$dicussion->bodyDis;?></textarea>
          </div>
		  
		    <div class="form-group">
            <label for="message-text" class="control-label">Privacy:</label>
            <select class="form-control"  name="privacy" id="privacy">
			<option <?php if($dicussion->privacy == 1){echo 'selected';}?> value='1'>Public</option>
			<option <?php if($dicussion->privacy == 2){echo 'selected';}?> value='2'>Private</option>
			</select>
          </div>
    
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		 <input type="submit" class="btn btn-primary" value="submit" />
      </div>
	      </form>
    </div>
  </div>
</div>
							
                            <?php }
                                 else
								 {
								 ?>
								 	<a style="color:#808080;cursor:pointer;" data-toggle="modal" data-target="#hideDiscussion<?=$dicussion->id_dis;?>" href="#hideDiscussion<?=$dicussion->id_dis;?>"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-eye-close"></span></a>
										<div class="modal fade" id="hideDiscussion<?=$dicussion->id_dis;?>" tabindex="-1" role="dialog" aria-labelledby="hideDiscussion">
                       <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><h3>Hide conformation</h3>
      </div>
      <div class="modal-body">
       Do you want to hide?
      </div>
      <div class="modal-footer">
           
		<a href="<?=base_url().'discussions/update_visableStatus/'.$dicussion->id_dis.'/'.$redirect_page;?>" style="cursor:pointer;"><button type="button" class="btn btn-danger">Hide</button></a>
		 <button type="button" class="btn btn-default" data-dismiss="modal">No need.</button>
      </div>
	      </form>
    </div>
  </div>
</div>
								 <?php
                                   }
							?>
							
                            <p class="read-more"> 
							 <?php $string = $dicussion->bodyDis;;
if (strlen($string) > 30) {
$trimstring = substr($string, 0, 30). ' <a href="'.base_url().'discussions/view_discussion/'.$dicussion->id_dis.'-'.$dicussion->slug.'">readmore...</a>';
} else {
$trimstring = $string;
}
echo $trimstring;
//Output : Lorem Ipsum is simply dum [readmore...][1]
?>
							 
							 
							 </p>
							
							<h4>
								<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-comment"></span> 6</span>
						<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-thumbs-up"></span> 40</span>
								
										<span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-eye-open"></span> 56</span>
                            <small> <span class="small glyphicon glyphicon-time"></span> <?=date('d M Y H:i A',strtotime($dicussion->dDate));?></small>
							
							<small>
							
							<?php 
							  if($dicussion->privacy == 1)
							  {
							  ?>
							<a data-toggle="tooltip" data-placement="top" title="Public discussion"> <span class="small glyphicon glyphicon-globe"></span> public</a>
							<?php 
							  } 
							  else
							  {
							  ?>
							  <a data-toggle="tooltip" data-placement="top" title="Private discussion"> <span class="small glyphicon glyphicon-user"></span> Private</a>
							  <?php } ?>
							
							
							</small>
						
							</h4>
							
					<textarea class="form-control" style="border-radius:0px;background-color:#eee;color:#808008;" id="message-text"></textarea>
                          </div>
						
                          <div class="col-sm-2">
                            <div class="col-sm-12" style="text-align:center;margin-bottom:10px;"><a href="#"><img style="border:1px solid #ddd;" src="<?php echo ($dicussion->photo && file_exists(UPLOADS.$dicussion->photo)) ? base_url().UPLOADS.$dicussion->photo : base_url().UPLOADS.'profile.png';?>" class="img-circle"></a>
							</div>
							<div class="col-sm-12" style="text-align:center;font-weight:bold;"><?php echo $dicussion->custName;if($dicussion->custID == $user[0]['custID']){?> <span style="color:#31B404;" title="You" class="glyphicon glyphicon-ok-circle"></span><?php } ?></div>
                          </div> 
                        </div>
						    <div class="row divider">    
                           <div class="col-sm-12"><hr></div>
                        </div>
						<div class="modal fade" id="exampleModal<?=$dicussion->id_dis;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                       <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><h3>Delete conformation</h3>
      </div>
      <div class="modal-body">
       Do you want to delete?
      </div>
      <div class="modal-footer">
           
		<a href="<?=base_url().'discussions/delete/'.$dicussion->id_dis.'/'.$redirect_page;?>" style="cursor:pointer;"><button type="button" class="btn btn-danger">Delete</button></a>
		 <button type="button" class="btn btn-default" data-dismiss="modal">No need.</button>
      </div>
	      </form>
    </div>
  </div>
</div>
			

			<?php } ?>
						
						 <style>
				 .pagination strong
				 {
				    position: relative;
					float: left;
					padding: 6px 12px;
					margin-left: -1px;
					line-height: 1.42857143;
					color: #337ab7;
					text-decoration: none;
					background-color: #fff;
					border: 1px solid #ddd;
					
					
				 }
				 </style>
                  
                  
                     <ul class="pagination">
						
					<?php
					echo $links;
					
				 ?>  
				 </ul>
                    
                      
                      
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="z-index:9999;">
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
            <label for="message-text" class="control-label">Description:</label>
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
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		 <input type="submit" class="btn btn-primary" value="submit" />
      </div>
	      </form>
    </div>
  </div>
</div>



	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo base_url('assets/dis/js/bootstrap.min.js');?>"></script>
		<?php include_once('assets/js/autoload.php');?>
        <script>
$(document).ready(function(){
   
        $("#loadslow").fadeIn(600);
		
    $('[data-toggle="tooltip"]').tooltip();   


    
});
</script>


	</body>
</html>