<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>.:: Welcome to Forum ::.</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
		 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		   <!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		   <![endif]-->
			<link href="<?php echo base_url('assets/forum/css/styles.css');?>" rel="stylesheet">
			<link href="<?php echo base_url('assets/forum/css/forum.css');?>" rel="stylesheet">
		
	</head>
	<body>
<div class="wrapper" id="loadslow" style="display:none;">
    <div class="box">
        <div class="row">
            <!-- sidebar -->
            <div class="column col-sm-3" id="sidebar" style="background-color:#5FB404;">
               <a href="<?php echo base_url()."forum";?>"> <span style="padding-top:10px;padding-left:10px;"><img style="margin-top:30px;" src="<?php echo base_url('assets/forum/images/logoImg.png');?>" height="80px" /></span></a>
				 <ul class="nav">
                    <li class="active"><a href="#featured">Recent Threads</a>
                    </li>
                    <li><a href="#stories">Top Threads</a>
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
						
				//print_r($this->session->userdata('logged_in'));
                      $user = $this->session->userdata('profile_data');
				?>
				 <a style="cursor:pointer;" href="<?php echo base_url('user/'.$user[0]['custName']);?>"><span class="pull-right btn-success" style="background-color:#5FB404;padding-left:3px;padding-right:3px;color:#fff;">X</span></a>
				<div class="col-sm-12" id="featured"> 
				
                          <div class="page-header text-muted">
                          Recent Threads
						   <a style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"><span class="pull-right btn-success" style="background-color:#fff;color:green;">+ Ask Question</span></a>
						  
                          </div> 
                        </div>
                    <div class="full col-sm-9">
                      
                        <!-- content -->
                          <div id="allQuestions">
                            <?php  
							
							    if(empty($results))
                                {
								   
								   echo "No data found...!";
								}
								else
								{
                                 
								foreach($results as $result)
						         {
						     ?>
                           <div class="singleQestion" id="singleQestion_<?php echo $result->id_que;?>">
                            <div class="row">   
                              <div class="panel panel-default">
                              <div class="panel-heading">Question #<span id="Question_id"><?php echo $result->id_que;?></span>
						      <?php if($this->session->userdata['profile_data'][0]['custID'] == $result->custID){ ?>
						     
							
							
							
							
							 <span class="userActions" id="<?php echo $result->id_que;?>">
                                  <small><a href="#deleteConfirmation" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation"> <span style="float:right; margin: 0px 0px 0px 11px;color:red;" class="glyphicon glyphicon-trash"></span></a></small>
                                  
								  <small><a href="#editQUestion<?php echo $result->id_que;?>"  data-toggle="modal" data-target="#editQUestion<?php echo $result->id_que;?>" class="editData"><span style="float:right;" class="glyphicon glyphicon-edit"> </span></a></small>
                                </span>
						    
							<?php }
							else
                            {
							?>
							 <a style="color:#808080;cursor:pointer;" data-toggle="modal" title="hide" data-target="#hideQuestion<?=$result->id_que;?>" href="#hideQuestion<?=$result->id_que;?>"><span style="float:right; margin: 0px 0px 0px 11px;" class="glyphicon glyphicon-eye-close"></span></a>
							 <div class="modal fade" id="hideQuestion<?=$result->id_que;?>" tabindex="-1" role="dialog" aria-labelledby="hideDiscussion">
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
           
		<a href="<?=base_url().'forum/update_visableStatus/'.$result->id_que;?>" style="cursor:pointer;"><button type="button" class="btn btn-danger">Hide</button></a>
		 <button type="button" class="btn btn-default" data-dismiss="modal">No need.</button>
      </div>
	      </form>
    </div>
  </div>
</div>
							<?php }  ?>
						</div>
                         <div class="panel-body">
  						<div class="col-sm-2">
                            <a href="#" class="pull-right"><img src="<?php echo ($result->photo && file_exists(UPLOADS.$result->photo)) ? base_url().UPLOADS.$result->photo : base_url().UPLOADS.'profile.png';?>" class="img-circle"></a>
						</div> 
                          <div class="col-sm-10">
                            <h3>
							<a class="dicussion-title-a" href="<?php echo base_url().'forum/read_thread/'.$result->id_que.'-'.$result->slug;?>"><?php echo $result->titleQue;?></a></h3>
							
							<small>Asked by <a href="#"><i><?php echo $result->custName;?></i></a> on <?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$result->dDate);?></small>
                            
							<p style="margin-top:5px;" id="QueContent">
							<?php echo $result->bodyQue;?>
							</p>
                           
						   <span class="label label-success"><span class="glyphicon glyphicon-repeat"></span> 


<?php 
								 $cat="FORUM";
		
		
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='".$result->id_que."' AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		echo $like_row[0]['total_likes'];  ?>


						   Likes</span> <span class="label label-info"><span class="glyphicon glyphicon-comment"></span> 

<?php

								
									$cat="FORUM";
		
		
		$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='".$result->id_que."' AND `raAction`='COMMENT' ";
		$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();


								echo $comment_row[0]['total_comments'];  ?>



						   Replies</span> 
                           </div>
						  
						  </div>
						  
						  </div>
                          
                        </div>
                        </div>
						
						
  <div class="modal fade" id="editQUestion<?php echo $result->id_que;?>" tabindex="-1" role="dialog" aria-labelledby="editQUestion<?php echo $result->id_que;?>">
  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Update Question</h4>
      </div>
      <div class="modal-body">
       <form method="post" action="<?php echo base_url().'forum/update/'.$result->id_que;?>" enctype="multipart/form-data">
          <div class="form-group" id="QueTitle">
       <input type="hidden" required class="form-control" name="userID" id="userID" value="<?php echo $user[0]['custID'];?>">
            <label for="recipient-name" class="control-label">Question:</label>
            <input type="text" required class="form-control" name="titleDis" id="titleDis" value="<?php echo $result->titleQue;?>">
          </div>
          <div class="form-group" id="QueDes">
            <label for="message-text" class="control-label">Description:</label>
            <textarea class="form-control" name="bodyDis" id="bodyDis" required><?php echo $result->bodyQue;?></textarea>
			
          </div>
         
		 <div class="form-group">
            <label for="message-text" class="control-label">Privacy:</label>
            <select class="form-control"  name="privacy" id="privacy">
			<option <?php if($result->privacy == 1){echo 'selected';}?> value='1'>Public</option>
			<option <?php if($result->privacy == 2){echo 'selected';}?> value='2'>Private</option>
			</select>
          </div>
    
      </div>
      <div class="modal-footer">
	  <span class="required_error hide pull-left" style="color:red;">* Please kindly fill all fields.</span>
         <button type="button" class="btn btn-default" id='closeBtn' data-dismiss="modal">Close</button>
     <input type="submit" class="btn btn-primary" value="Update"  />
      </div>
        </form>
		 
    </div>
  </div>
</div>
						
						<?php } } ?>
						
						
                       
                  
                        
                 </div>
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
                                <ul class="pagination pull-right">
						
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
                              <p><a href="http://www.insigneinc.com/" target="_blank" class="pull-right">Copyright &copy; <?php echo date('Y');?> - Insigne Inc. </a>
                          </p>
						  </div>
                        </div>
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
        </div>
    </div>
</div>

<div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><h2>Delete Confirmation </h2>
      </div>
      <div class="modal-body">
       Do you want to delete this post ?
      </div>
      <div class="modal-footer">
           
    <a href="javascript:void(0)" id="">
      <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Confirm</button>
    </a>
     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Ask Question</h4>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
          <div class="form-group">
       <input type="hidden" required class="form-control" name="userIDQue" id="userIDQue" value="<?php echo $user[0]['custID'];?>">
            <label for="recipient-name" class="control-label">Question:</label>
            <input type="text" required class="form-control" name="titleQue" id="titleQue">
          </div>
          <div class="form-group" id="QueDes">
            <label for="message-text" class="control-label">Description:</label>
            <textarea class="form-control" name="bodyQue" id="bodyQue" required></textarea>
			
          </div>
      
        <div class="form-group">
            <label for="message-text" class="control-label">Privacy:</label>
            <select class="form-control"  name="privacyQue" id="privacyQue">
      <option value='1'>Public</option>
      <option value='2'>Private</option>
      </select>
	  
          </div>
    
      </div>
      <div class="modal-footer">
	  <span class="required_error hide pull-left" style="color:red;">* Please kindly fill all fields.</span>
         <button type="button" class="btn btn-default" id='closeBtnCreate' data-dismiss="modal">Close</button>
     <input type="submit" class="btn btn-primary" value="submit" id="submitQuestion" />
      </div>
        </form>
		 
    </div>
  </div>
</div>

  

	<!-- script references -->
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo base_url('assets/forum/js/bootstrap.min.js');?>"></script>
        <?php include_once('assets/forum/js/forum.php');?>
		   <script>
$(document).ready(function(){
   
        $("#loadslow").fadeIn(600);
    
});
</script>
	</body>
</html>