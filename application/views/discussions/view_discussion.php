<?php
if($results) foreach($results as $result);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
		<meta charset="utf-8">
		<title><?php echo $result->titleDis;?></title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
				<link href="<?php echo base_url('assets/dis/Inner/css/styles.css');?>" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
            <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
            <script src="https://code.jquery.com/jquery-1.7.2.js"></script>
		<![endif]-->
	<style>
          .pro-disc-1{
             width: 45px;
             height: 45px;
             border: 1px solid #CABFBF;
             padding: 3px;
             border-radius: 5px;
             float: left;
            }
          .custname-disc-1{
             margin-left: 5%;
             border:1px solid #ccc;
             padding:10px;
             border-radius: 5px;
             width:40%;
             white-space: pre-wrap;      /* CSS3 */   
   white-space: -moz-pre-wrap; /* Firefox */    
   white-space: -pre-wrap;     /* Opera <7 */   
   white-space: -o-pre-wrap;   /* Opera 7 */    
   word-wrap: break-word;      /* IE */
            }
           .txt-area-disc{
             border-radius:0px;
             background-color:#eee;
             color:#808008;
             margin-top: 12px;
             margin-bottom: 28px;
             width: 92%;
             border-radius:5px;
            }
        </style>	
	
</head>

    <body>
<div class="wrapper">

    <div class="box" style="padding-left: 15px;padding-right: 15px;">
        <div class="row">
            <!-- sidebar -->
             <div class="column col-sm-2" id="sidebar" >
                <a href="<?php echo base_url()."discussions";?>"><span style="padding-top:10px;padding-left:10px;"><img style="margin-top:30px;" src="<?php echo base_url('assets/dis/img/dis.png');?>" height="50px" /></span></a>
                <ul class="nav">
                    <li class="active"><a href="<?php echo base_url('discussions/own');?>"><?php echo $lang['my-discussions'];?></a>
                    </li>
                    <li><a href="<?php echo base_url('discussions/public_discussions');?>"><?php echo $lang['public-discussions'];?></a>
                    </li>
                </ul>
               
            </div>
		   
            <!-- /sidebar --> <!-- main -->
            <div class="column col-sm-10" id="main">
                <div class="padding">
				<div class="row">
        <div class="col-md-4 col-md-offset-3">
           <form class="form-search form-inline" action="<?php echo base_url().'discussions/search';?>" method="get">
        <div class="input-group">
            <input type="text" class="form-control search-query" name="search" id="search" placeholder="<?php echo $lang['search-discussion'];?>..." / style="width: 300px"> <span class="input-group-btn">
            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
            </span>

        </div>
    </form>
        </div>
		
            <a style="cursor:pointer;" href="<?php echo base_url('user/'.$this->session->userdata['profile_data'][0]['custName']);?>"><i class="pull-right fa fa-home fa-2x" style="color: #60A2D8"></i></a>       
    </div> 
                    <div class="full col-sm-9">
                    
        
                    
                    
                    <!-- content -->
                        <div class="col-sm-12" id="featured">   
                          <div class="page-header text-muted">
                          <a style="text-decoration:none" class="dicussion-title-a" href="<?php echo base_url()."discussions/";?>"><span class="glyphicon glyphicon-chevron-left"></span> <?php echo $lang['back_to_discussions'];?></a>
                          </div> 
                        </div> <!--/top story-->
                        <div class="row">    
                         <div class="col-sm-12"><img src="<?php echo ($result->photo && file_exists(UPLOADS.$result->photo)) ? base_url().UPLOADS.$result->photo : base_url().UPLOADS.'profile.png';?>" class="img-thumbnail" alt="Cinque Terre" width="150" height="150"></div>
							</div>
							<div class="col-sm-12"> 
                              <h4><?php echo $result->perdataFirstName." ".$result->perdataLastName;?></h4>
							</div>
					<div class="col-sm-12">
					<div class="row">
					         <h3><?php echo $result->titleDis;?></h3>
                             <p class="readings" >
							 <?php echo $result->bodyDis;?>
							 
							 <?php  if($total_views->num_rows() <1){
                                
                             $views=$this->db->query("insert into views values('','DISCUSSION','".$result->id_dis."','".$this->session->userdata['profile_data'][0]['custID']."')");


}?>
							 </p>
                             </div>
							 <div class="col-sm-12">
							 
							 		 <?php
                                 
                                
                                 if($liked->num_rows() >= 1)
                                 {
                                 ?>

                                <span class="unliking<?php echo $result->id_dis;   ?>" style="margin-right:0.3%"  >  <span class="label label-success"><span class="like_count1<?php echo $result->id_dis;   ?>"> <?php echo $total_likes[0]['total_likes']; ?></span> <span class="glyphicon glyphicon-thumbs-up"></span><a href="#" class="unlike" id="<?php echo $result->id_dis ; ?>"> <?php echo $lang['unlike'];?> </a></span></span>
                                 <?php
                                 }
                                 else
                                 {
                                 ?>
                              <span class="liking<?php echo $result->id_dis;   ?>">   <span id="display_discussion_like" class="label label-success"><span class="like_count<?php echo $result->id_dis;  ?>"> <?php echo $total_likes[0]['total_likes']; ?> </span><span class="glyphicon glyphicon-thumbs-up"></span><a href="#" class="like" id="<?php echo $result->id_dis ; ?>"> <?php echo $lang['like'];?></a></span></span>
                                 <?php
                                 }
                                 ?>
							 
							 
							 
                            <!--<span class="label label-info"><span  class="glyphicon glyphicon-comment" ></span><span class="incc"> <?php //echo $result->total_comments; ?></span> <?php //echo $lang['comments'];?></span>-->
                            
		<span class="label label-info">
			<span  class="glyphicon glyphicon-comment" ></span>
			<span class="incc"> <?php echo $result->total_comments; ?></span>
			 
			<?php echo $lang['comments'];?>
		</span>
							
		<span class="label label-danger"><span class="glyphicon glyphicon-time"></span>  <?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$result->dDate);?></span>
                                
<span class="user" id="<?php echo $result->custID; ?>" ></span>
							</div>
							<div class="col-sm-12">
							 <br>
                            <p class="comment"><b><?php echo $lang['comments'];?>:</b></p>
	                       </div>
						   <div class="col-sm-12">
                            <p class="idea"><?php echo $lang['tell_us_what_u_think'];?></p>

                           <!--comment-->
                             
                               <div class="recent_comment">
                               <?php
                               if($comments->num_rows()>0){
                               foreach($comments->result() as $row)
                               {
                               ?>
                               
                               
                                   <div id="singlecomment_<?php echo $row->uaID;?>">
                                   <div class="display_comment" id="margin"><p style="margin:14px 15px 4px;font-size: 13px;"><img class="pro-disc-1" src="<?php echo ($row->photo && file_exists(UPLOADS.$row->photo)) ? base_url().UPLOADS.$row->photo : base_url().UPLOADS.'profile.png';?>"> <div class="custname-disc-1"><p id="update_com_<?php echo $row->uaID;?>"><?php echo $row->uaDescription;?></p></div>
                                        <span>
                                        <?php
                                        $id = explode("-",$this->uri->segment(3));
                                        
                                        //if(($this->session->userdata['profile_data'][0]['custID'] == $result->custID) || ($this->session->userdata['profile_data'][0]['custID'] == $row->custID))
					 if($this->session->userdata['profile_data'][0]['custID'] == $row->custID)
					 {
					 ?>
                                        <a href="javascript:void(0);" style="color:#46b8da;cursor:pointer;" data-commentidedit="<?php echo $row->uaID;?>" data-comment="<?php echo $row->uaDescription;?>" data-toggle="modal" class="editComment" data-target="#editComment">
                                        <span style="float:right; margin: -37px 28px 2px 22px;" class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        
<a href="javascript:void(0);" style="color:#FF8F00;cursor:pointer;" data-d="<?php echo $id[0];?>" data-commentid="<?php echo $row->uaID;?>" class="deleteComment" data-toggle="modal" data-target="#deleteComment"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>
					<?php
					}
					else if($this->session->userdata['profile_data'][0]['custID'] == $result->custID)
					{
					?>
					<!--<a href="javascript:void(0);" style="color:#FF8F00;cursor:pointer;" data-d="<?php //echo $id[0];?>" data-commentid="<?php //echo $row->uaID;?>" class="deleteComment2" data-toggle="modal" data-target="#deleteComment2"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>-->
					
					
<a href="javascript:void(0);" style="color:#FF8F00;cursor:pointer;" data-d="<?php echo $id[0];?>" data-commentid="<?php echo $row->uaID;?>" class="deleteComment2" data-toggle="modal" data-target="#deleteComment2"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>
					<?php
					}
					?>

                                        </span>
                                        
                                   </div>
                                   </div>

                               <?php
                               }}
                               ?>
                               </div>
                               <!----------------------------RohitDutta----------------------------------------->
                                <div class="d_c"></div>
                                </div>
                               <a href="javascript:void(0);"  class="view_more_discussion_comments" style="color: darkgreen; font-weight: bold;  margin-left: 32px; display: none"><?=$lang['view-more-comments'];?></a>
                               <div id="loading_img" style='margin-left: 27px;'></div>
                               <input class="five_value" type="text" value="<?php echo $total_discussion_comments;?>" style="display:none">
                               <!-------------------------------------------------------------------------------->
						    <div class="col-md-12">
						    <div class="col-sm-6">	
					<textarea class="form-control txt-area-disc" id="user_comment"></textarea>

					
	                       </div>
						   <div class="col-md-2 submit" style="margin-top:20px;">

                           <button type="button" class="btn btn-info comment" id="<?php echo $result->id_dis; ?>"><?php echo $lang['comment'];?></button>
						   </div>
                            </div>
                            </div>
                           </div>
						    </div>
                 </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
        </div>
    </div>
</div>






<!----------------------- This Modal is for delete single discussion comment----------------------------------------------->
<!-- Modal -->
  <div class="modal fade" id="deleteComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="z-index:9999;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><h2><?php echo $lang['delete_confirmation'];?></h2>
        </div>
        <div class="modal-body">
          <div class="modal-body">
                <?php echo $lang['do_you_want_to_delete'];?>
            </div>
        </div>
        <div class="modal-footer">
          <a href="javascript:void(0)" class="ForDeleteComment" style="text-decoration: none;" id="" data-dis="">
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" id="deleteCommentBtn"><?php echo $lang['yes'];?></button>
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo $lang['no'];?></button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  
  <div class="modal fade" id="deleteComment2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="z-index:9999;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><h2><?php echo $lang['delete_confirmation'];?></h2>
        </div>
        <div class="modal-body">
          <div class="modal-body">
                <?php echo $lang['do_you_want_to_delete'];?>
            </div>
        </div>
        <div class="modal-footer">
          <a href="javascript:void(0)" class="ForDeleteComment2" style="text-decoration: none;" id="" data-dis="">
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" id="deleteCommentBtn2"><?php echo $lang['yes'];?></button>
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo $lang['no'];?></button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  <!----------------------- This Modal is for edit single discussion comment----------------------------------------------->
<div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><h2><?php echo $lang['edit_comment'];?></h2>
            </div>
            <div class="modal-body">
               <form method="post" enctype="multipart/form-data" id="edit_s_c">
               <input type="text" required class="form-control ForEditComment" name="edit_single_comment" id="edit_single_comment" value="">
               </form>
            </div>
            <div class="modal-footer">

                <a href="javascript:void(0)" class="for_comment_id" style="text-decoration: none;" id="">
                
                    <button type="button" class="btn  btn-success btn-sm" id="editCommentBtn"><?php echo $lang['update'];?></button>
                </a>
                <button type="button" class="btn btn-danger btn-sm" id="cancelAtEditComment" data-dismiss="modal"><?php echo $lang['cancel'];?></button>
            </div>
        </div>
    </div>
</div>

<!---------------------------------------------------------------------------------------------->

	<!-- script references -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>












		

 <?php include_once('assets/js/discussion/script.php');?>
  <?php include_once('assets/js/unlike/script.php');?>


</body>
</html>