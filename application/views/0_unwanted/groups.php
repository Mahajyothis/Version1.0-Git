<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>.:: Welcome to Groups ::.</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url('assets/dis/css/discussion.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/groups/css/heroic-features.css');?>" rel="stylesheet">
	
	</head>
	<body>
<div class="wrapper" id="loadslow" style="display:none;">
    <div class="box" >
        <div class="row">
            <div class="column col-sm-3" id="sidebar" style="background-color:#4285F4;">
               <a href="<?php echo base_url()."forum";?>"> <span style="padding-top:10px;padding-left:10px;"><img style="margin-top:30px;" src="<?php echo base_url('assets/groups/image/groups-128.png');?>" height="80px" /></span></a>
				 <ul class="nav">
                    <li class="active"><a href="#own-groups">Own groups</a>
                    </li>
                    <li><a href="#public-groups">Public groups</a>
                    </li>
                </ul>
                <ul class="nav hidden-xs" id="sidebar-footer">
                    <li>
                      <a href="#"><h3>Mahajyothis</h3></a>
                    </li>
                </ul>
            </div>
			
            <div class="column col-sm-9" id="main">
			
				<div class="padding">
				<?php 
				         if($this->session->userdata('logged_in')!=1)
						{
						    header("location:".base_url());
						}
				        $user = $this->session->userdata('profile_data');
						//echo $this->session->userdata['profile_data'][0]['custID'];
				//print_r($all);
				
				?>
				 <a style="cursor:pointer;" href="<?php echo base_url('user/'.$user[0]['custName']);?>"><span class="pull-right btn-success" style="background-color:#4285F4;padding-left:3px;padding-right:3px;color:#fff;">X</span></a>
                    <div class="full col-sm-9">
                     
                        <!-- content -->
                        
                        <div class="col-sm-12" id="own-groups">   
                          <div class="page-header text-muted"><span class="glyphicon glyphicon-star-empty" style="color:#4285F4;"></span>
                          Own Groups
						 
							  <a style="cursor:pointer;" data-toggle="modal" data-target="#exampleModalGroupCreate"><span class="pull-right btn-success" style="background-color:#fff;color:#4285F4;"><span class="glyphicon glyphicon-th" style="color:#4285F4;"></span> Create group</span></a>
						  
						
						  
                          </div> 
						  <?php if(($this->session->flashdata('flashmessage'))){
				 ?>
                        <div class="col-sm-12">
                         
                           
                      <div class="alert alert-success" role="alert" id="flashmsg">
                          <strong>Well done..!</strong>  <?php echo $this->session->flashdata('flashmessage');?>
                      </div>
                       
                        </div>
                      <?php } ?>
                        </div>
						
           <div class="row text-center">
		   
		     <?php  
							
							    if(empty($results_own))
                                {
	
								   echo "No data found...!";
								}
								else
								{
                                 
								foreach($results_own as $result)
						         {
						     ?>
		   
            <div class="col-md-3 col-sm-6 hero-feature" id="group_<?php echo $result->grp_id; ?>">
                <div class="thumbnail">
                    <img src="<?=base_url()."uploads/groups/banners/".$result->grp_cover;?>" style="height:110px;width:100%;" alt="">
                    	 <p>
						 
						 <img src="<?=base_url()."uploads/".$this->session->userdata['profile_data'][0]['photo'];?>" style="height:30px;width:30px;" class="img-circle" alt="">
						  <img src="<?=base_url()."uploads/groups/banners/profile.png";?>" style="height:30px;width:30px;" class="img-circle" alt="">
						   <img src="<?=base_url()."uploads/groups/banners/profile.png";?>" style="height:30px;width:30px;" class="img-circle" alt="">
						    <img src="<?=base_url()."uploads/groups/banners/profile.png";?>" style="height:30px;width:30px;" class="img-circle" alt="">
							 <img src="<?=base_url()."uploads/groups/banners/profile.png";?>" style="height:30px;width:30px;" class="img-circle" alt="">
						  </p>
					<div class="caption">
                        <h4><a href="<?php echo base_url().'groups/view/'.$this->custom_function->create_ViewUrl($result->grp_id,$result->grp_name); ?>"><?=$result->grp_name;?></a></h4>
                       
                        <p>
                          
							<span style="padding:5px;"><span style="color:#000;"class="glyphicon glyphicon-user"></span> 15  </span>
							
							<span style="padding:5px;"><span class="glyphicon glyphicon-thumbs-up"></span> 10</span>
                        </p>
						
						 
						<?php if($result->custID == $this->session->userdata['profile_data'][0]['custID']){ ?>
							 <div id="<?php echo $result->grp_id; ?>">
							 <a style="cursor:pointer;color:#4285F4;font-size:11px;" data-toggle="modal" data-target="#exampleModalGroupEdit" class="editData"><span class="glyphicon glyphicon-edit small"></span> Edit</a>
							&nbsp;
							<a style="cursor:pointer;color:red;font-size:11px;" href="#deleteConfirmation" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation"><span class="glyphicon glyphicon-trash small"></span> Delete</a>
							</div>
						<?php } ?>
						
                    </div>
                </div>
            </div>
			
			<?php } } ?>

         
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
				 
				 img#img_preview{width:100%;height:250px}
				 </style>
                               
        </div>
		 <div class="col-sm-12" id="public-groups">   
                          <div class="page-header text-muted"><span class="glyphicon glyphicon-globe" style="color:#4285F4;"></span>
                          Public Groups
				
						  
                          </div> 
					
                        </div>
						
						
						   <div class="row text-center">
		   
		     <?php  
							
							    if(empty($results_public))
                                {
								   
								   echo "No data found...!";
								}
								else
								{
                                 
								foreach($results_public as $result)
						         {
						     ?>
		   
            <div class="col-md-3 col-sm-6 hero-feature" id="group_<?php echo $result->grp_id; ?>">
                <div class="thumbnail">
                    <img src="<?=base_url()."uploads/groups/banners/".$result->grp_cover;?>" style="height:110px;width:100%;" alt="">
                    	 <p>
						 
						 <img style="height:30px;width:30px;" src="<?php echo ($result->photo && file_exists(UPLOADS.$result->photo)) ? base_url().UPLOADS.$result->photo : base_url().UPLOADS.'profile.png';?>" class="img-circle">
						  
						  </p>
					<div class="caption">
                        <h4><?=$result->grp_name;?></h4>
                       
                        <p>
                          
							<span style="padding:5px;"><span style="color:#000;"class="glyphicon glyphicon-user"></span> 1  </span>
							
							<span style="padding:5px;"><span class="glyphicon glyphicon-thumbs-up"></span> 0</span>
                        </p>
						
						 
						<?php if($result->custID == $this->session->userdata['profile_data'][0]['custID']){ ?>
							 <div id="<?php echo $result->grp_id; ?>">
							 <a style="cursor:pointer;color:#4285F4;font-size:11px;" data-toggle="modal" data-target="#exampleModalGroupEdit" class="editData"><span class="glyphicon glyphicon-edit"></span> Edit</a>
							&nbsp;
							<a href="#deleteConfirmation" style="cursor:pointer;color:red;font-size:11px;" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation"><span class="glyphicon glyphicon-trash"></span> Delete</a>
							</div>
						<?php }
                          else
						  {
						?>
						<p>
                            <a href="#" style="cursor:pointer;color:#4285F4;font-size:11px;"><span class="glyphicon glyphicon-plus"></span> Join</a> &nbsp;<a style="cursor:pointer;color:green;font-size:11px;" href="<?php echo base_url().'groups/view/'.$this->custom_function->create_ViewUrl($result->grp_id,$result->grp_name); ?>"> <span class="glyphicon glyphicon-send"></span> Visit</a>
                        </p>
						<?php 
						}
						?>
                    </div>
                </div>
            </div>
			
			<?php } } ?>

         
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
				 
				 img#img_preview{width:100%;height:250px}
				 </style>
                               
        </div>
		 <div class="row">
		 <ul class="pagination pull-right">
						
					<?php
				//	echo $links;
					
				 ?>  
				 </ul>
				 </div>
        <!-- /.row -->
                
                
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


<div class="modal fade" id="exampleModalGroupEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalGroupEdit">
  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="closeEdit" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit group</h4>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'groups/update';?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Group name:</label>
            <input type="text" required class="form-control" name="edit_groupTitle" id="EditgroupTitle">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Group Description:</label>
            <textarea class="form-control" name="edit_groupDes" id="EditgroupDes" required></textarea>
          </div>
		   <div class="form-group">
            <label for="message-text" class="control-label">Group Cover:</label>
			<div id="img_container"></div>
            <input type="file" class="form-control" name="edit_groupCover" id="EditgroupCover">
    

		 </div>
		  
		  
		    <div class="form-group">
            <label for="message-text" class="control-label">Privacy:</label>
            <select class="form-control"  name="edit_groupPrivacy" id="EditgroupPrivacy">
			<option value='1'>Public</option>
			<option value='2'>Private</option>
			</select>
          </div>
		<input type="hidden" id="EditGroupId" value="" name="edit_groupid" />
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		 <input type="submit" class="btn btn-primary" value="submit" />
      </div>
	      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModalGroupCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalGroupCreate">
  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Create new group</h4>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'groups/add';?>" enctype="multipart/form-data">
          <div class="form-group">
		   <input type="hidden" required class="form-control" name="userID" id="userID" value="<?php echo $user[0]['custID'];?>">
            <label for="recipient-name" class="control-label">Group name:</label>
            <input type="text" required class="form-control" name="groupTitle" id="groupTitle">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Group Description:</label>
            <textarea class="form-control" name="groupDes" id="groupDes" required></textarea>
          </div>
		   <div class="form-group">
            <label for="message-text" class="control-label">Group Cover:</label>
            <input type="file" required class="form-control" name="groupCover" id="groupCover" accept='image/*' />
    

		 </div>
		  
		  
		    <div class="form-group">
            <label for="message-text" class="control-label">Privacy:</label>
            <select class="form-control"  name="groupPrivacy" id="groupPrivacy">
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


<div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><h2>Delete Confirmation </h2>
      </div>
      <div class="modal-body">
       Do you want to delete this group ?
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



	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo base_url('assets/dis/js/bootstrap.min.js');?>"></script>
	
        <script>
$(document).ready(function(){
   
        $("#loadslow").fadeIn(600);
        $("#flashmsg").fadeOut(5000);
		
    $(document).on('click','.editData',function(e){
		var exampleModalGroupEdit = $('#exampleModalGroupEdit');
			var id = $(this).parent().attr('id');
			var dataString = 'getData=true'+'&id='+id;
				$.ajax({
					type: "POST",
					url: "groups/get_group_data",
					data: dataString,
					cache: false,
					success: function(data){
						if(data) {			
								exampleModalGroupEdit.find('#EditGroupId').val(data.grp_id);
								exampleModalGroupEdit.find('#EditgroupTitle').val(data.grp_name);
								exampleModalGroupEdit.find('#EditgroupDes').val(data.grp_description);
								exampleModalGroupEdit.find('#img_container').html('<img id="img_preview" src="<?= base_url()."uploads/groups/banners/";?>'+data.grp_cover+'" alt="'+data.grp_name+'"></img>');
								exampleModalGroupEdit.find('select option[value='+data.privacy+']').prop('selected', true); 
						}
						else alert('Some error occured. Please try again'); 
						
					}
				});
			
		});
		
		$(document).on('click','.deleteConfirmation',function(e){
			var id = $(this).parent().attr('id');
			//alert(id);
			$('#deleteConfirmBtn').parent().attr('id',id);
		});
		
		$(document).on('click','#deleteConfirmBtn',function(e){
			var point = $(this);
			var id = $(this).parent().attr('id');
			var dataString = 'id='+id;
			//alert(dataString);
				$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>groups/delete',
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data === 1) {
							$('#group_'+id).slideUp('slow',function(){
								$(this).remove();
								
							});
							point.parent().siblings('button').click();
							
						}
						else alert('Some error occured. Please try again'); 
						
					}
				});
			
		});
		
});

</script>


	</body>
</html>