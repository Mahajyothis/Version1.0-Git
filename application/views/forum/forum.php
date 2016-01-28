<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>.:: FORUM ::.</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="<?php echo base_url('assets/forum_n/css/business-frontpage.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/forum_n/css/bootstrap.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    	<script src="<?php echo base_url('assets/captcha/js/vpb_captcha_checker.js');?>"> </script>
    
 

</head>
<style>
.forum_modal{
width:100% !important;
}
</style>
<body>
<?php
$user = $this->session->userdata('profile_data');
?>

<div class="col-sm-12">
  <a href="<?php echo base_url();?>user/<?php echo $user[0]['custName'];?>"> 
        
		  <img src="<?php echo base_url('assets/forum_n/images/close.png');?>" width="60" height="60" style="float:right;margin-top: -0.5%;">
		  
		  </a>
		   <a href="<?php echo base_url();?>">
		  <img src="<?php echo base_url('assets/forum_n/images/home.png');?>" width="60" height="60" style="float:right;margin-top: -0.6%;    margin-right: -1%;">
       
		</a>
</div>

<div class="container" style="background-color:#FFFFFF;">
<header class="business-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <center><img src="<?php echo base_url('assets/forum_n/images/msg1.png');?>" width="230" height="230" alt="" style="margin-top:-0.3%;"/></center> </div>
        </div>
    </div>
</header>

<hr>
<div class="col-sm-12">
    <div class="col-sm-8">
        <ul class="nav navbar-nav">

            <a href="<?php echo base_url().'forum';?>"> <button type="button" class="btn btn-warning"><?php echo $lang['recent_threads']; ?></button></a>


        </ul>
    </div>
    <div class="col-sm-2">
        <form class="form-search form-inline" action="<?php echo base_url().'forum/search';?>" method="get">
        <div class="input-group">
            <input type="text" class="form-control search-query" name="search" id="search" placeholder="<?php echo $lang['search_question']; ?>..." /> <span class="input-group-btn">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
            </span>

        </div>
    </form>
    </div>
    <div class="col-sm-2">



      <!--  <a style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal"> <img src="<?php echo base_url('assets/forum_n/images/icon1.png');?>" width="30" height="30" alt=""/> Add new</a> -->
        
        <a style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal" href="#" class="btn btn-danger">
    <span class="glyphicon glyphicon-question-sign"></span>&nbsp;&nbsp;<?php echo $lang['ask_question']; ?>
  </a>


    </div>
    <hr>
    <hr>
</div>
<div class="recentQuestionSection" style="display:none;"></div>
<?php

if(empty($results))
{

    echo "<div class='col-lg-12' id='noDataFound' style='color:red;padding:35px;'>".$lang['no_data_found']."...!</div>";
}
else
{

    foreach($results as $result)
    {
      
         ?>
        <div class="row" id="singleQestion_<?php echo $result->id_que;?>" >
            <div class="col-sm-12 admin3">
                <div class="col-sm-2 adm">
                    <center><h2 style="color:#1b91f1; margin-bottom:4%;">&nbsp;</h2></center>
                    <center><a href="<?php if($result->custID == $user[0]['custID']){echo base_url('user/'.$user[0]['custName']);} else { echo base_url()."basicprofile?uid=".$result->custID; } ?>"><img src="<?php echo ($result->photo && file_exists(UPLOADS.$result->photo)) ? base_url().UPLOADS.$result->photo : base_url().UPLOADS.'profile.png';?>" class="image-responsive img-circle" width="100" height="100" alt=""/></a></center>
                    <center><p style="margin:8%;"><?php echo $result->perdataFirstName;?> <?php echo $result->perdataLastName;?></h2></p>

                        <p>
                            <img src="<?php echo base_url('assets/forum_n/images/user.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/network1.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/message1.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/facebook.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/twitter.png');?>" width="30" height="30" alt=""/></p>
                </div>
                <div class="col-sm-10">
                    <h3 style="color:#1b91f1; margin-bottom:1%;" class="forum_quo_title"><?php echo $result->titleQue;?></h3>
                    <?php if($this->session->userdata['profile_data'][0]['custID'] == $result->custID){ ?>
                        <h3  style="margin:1%;float:right; margin-top:-3%;" id="<?php echo $result->id_que;?>">
                            <a href="#editQuestion"  data-toggle="modal" data-target="#editQUestion" class="editData"> <img src="<?php echo base_url('assets/forum_n/images/edit.png');?>" width="25" height="25" alt="Edit" /></a>
                            <a href="#deleteConfirmation" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation"><img src="<?php echo base_url('assets/forum_n/images/delete.png');?>" width="25" height="25" alt="" />
                            </a>
                        </h3>
                    <?php }
                    else
                    {
                        ?>
						<h5  style="margin:1%;float:right; margin-top:-3%;" id="<?php echo $result->id_que;?>">
                        <a style="color:#808080;cursor:pointer;" data-toggle="modal" class="hideQuestionClick" title="<?php echo $lang['hide'];?>" data-target="#hideQuestion" href="#hideQuestion"><span style="float:right; margin: 0px 0px 0px 11px;" class="glyphicon glyphicon-eye-close"></span></a>
						</h5>
                       
                    <?php }  ?>
                    <p style="text-align: justify;" class="forum_quo_body">
                        <?php echo $result->bodyQue;?>
                    </p>
  <span id="recent_comment_count<?php echo $result->id_que;?>">
  <button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-repeat"style="margin:2px;"></span> <span><?php echo $result->total_comments; ?></span> <?php echo $lang['replies']; ?></button></span>
  
		 <span id="user_like<?php echo $result->id_que; ?>">
 <?php
 
 if(ISSET($result->liked)){
     ?>


     <span class="unliking<?php echo $result->id_que;   ?>">  <button class="pst-lke btn btn-info btn-xs unlike" id="<?php echo $result->id_que; ?>"> <span class="like_count1<?php echo $result->id_que; ?>"> <?php echo $result->total_likes;  ?> </span > <i class="fa fa-thumbs-up" style="padding-right:5px;color:white;" ></i><?php echo $lang['unlike']; ?></button></span>

 <?php } else { ?>

     <span class="liking<?php echo $result->id_que;   ?>">    <button   id="<?php echo $result->id_que; ?>" class="pst-lke btn btn-info like btn-xs"><span class="like_count<?php echo $result->id_que;   ?>"> <?php echo $result->total_likes;  ?></span >   <i class="fa fa-thumbs-o-up" style="padding-right:5px;" ></i><?php echo $lang['like']; ?></button></span>
 <?php }?>
  
  </span>


                    <button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-time"></span> <?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$result->dDate);?></button><br>
                    <p></p><br>
                    <?php echo $lang['replies']; ?>:
                    <p></p><br>
                    <div id="recent_comment<?php echo $result->id_que;?>" class="display_comm1">
                        <?php if(!empty($result->comments))
                        {
      			foreach($result->comments as $row)
      			{
      	
      
                            ?>
<div id="singlecomment_<?php echo $row['uaID'];?>" class="">
<div class="display_comm" id="margin" style="min-height:45px;"><p><img class="pro-disc-1" src="<?php echo ($row['photo'] && file_exists(UPLOADS.$row['photo'])) ? base_url().UPLOADS.$row['photo'] : base_url().UPLOADS.'profile.png';?>" height="40px" width="40px"><p class="fm" id="singlcomment_<?php echo $row['uaID'];?>"><?php echo $row['comment'];?></p>
                                    
                                   
                                    </p>
					
                             <!--</div>-->
 <?php 

 //if(($this->session->userdata['profile_data'][0]['custID'] == $result->custID) || ($this->session->userdata['profile_data'][0]['custID'] == $row['custID']))
 if($this->session->userdata['profile_data'][0]['custID'] == $row['custID'])
 {

	
	
 ?>  
 <div class="ed">                          
<a href="#deleteComment" data-toggle="modal" data-q="<?php echo $result->id_que;?>"  data-comment="<?php echo $row['uaID'];?>"  data-target="#deleteComment" class="deleteComment"><img src="<?php echo base_url('assets/forum_n/images/delete.png');?>" width="10" height="10" alt=""></a>
<a href="#editComment" data-toggle="modal" data-commentid="<?php echo $row['uaID'];?>"  data-commentonly="<?php echo $row['comment'];?>"  data-target="#editComment" class="editComment"><img src="<?php echo base_url('assets/forum_n/images/edit.png');?>" width="10" height="10" alt=""></a></div>
<?php
}
else if($this->session->userdata['profile_data'][0]['custID'] == $result->custID)


{

?>
<div class="ed">                          
<a href="#deleteComment" data-toggle="modal" data-q="<?php echo $result->id_que;?>"  data-comment="<?php echo $row['uaID'];?>"  data-target="#deleteComment" class="deleteComment"><img src="<?php echo base_url('assets/forum_n/images/delete.png');?>" width="10" height="10" alt=""></a>
</div>
<!--Hide -->
<!--<a href="#deleteComment" data-toggle="modal" data-q="<?php echo $result->id_que;?>" data-comment="<?php echo $row['uaID'];?>"  data-target="#deleteComment" class="deleteComment1"><img src="<?php echo base_url('assets/forum_n/images/delete.png');?>" width="8" height="8" alt=""></a>-->
<?php 
}
?>
</div>
</div>
	                    <?php  
		      	}
		      	
		      	
		      } 
		      
		      ?>
	              </div>
                    
                    <p class="d_c"></p>
                    <?php
                    $query = $this->db->query("SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='FORUM' AND ua.`catID`=".$result->id_que." ORDER BY ua.`uaID` DESC LIMIT 5");
                    $count_com = $query->result();
                    //--------------------------------------RohitDutta-----------------------------------------------
                    $ccc = count($count_com);

                    if($ccc < 5)
                    {
                        ?>

                    <?php
                    }
                    else
                    {
                        ?>
                        <a href="javascript:void(0)" class="view_more_forum_comments old_comments" style="color: darkgreen; font-weight: bold" data-postid="<?php echo $result->id_que;?>"><?=$lang['view-more-comments'];?></a>
                        <div id="loading_img<?php echo $result->id_que;?>"></div>
                    <?php
                    }
                    ?>
                    <span class="user<?php echo $result->id_que; ?>" id="<?php echo $result->custID; ?>">
                   <a href="javascript:void(0)" class="view_more_forum_comments new_comments" data-postid="<?php echo $result->id_que;?>" style="color: darkgreen; font-weight: bold;display: none"><?php echo $lang['view-more-comments']; ?></a>
                   <div id="loading_img<?php echo $result->id_que;?>"></div>
                    
                    <input type="hidden" id="values11<?php echo $result->id_que;?>"  class="increment_number1" data-totalcmments="<?php echo $ccc?>" value="<?php echo $ccc?>"/>
                    <!----------------------------------------------------------------------------------------------------------->

                    <input type="text" class="form-control" id="user_comment<?php echo $result->id_que; ?>" placeholder="<?php echo $lang['write_something_here']; ?>............." style="width:52%"><button style="float:left;margin-top:1%;margin-bottom:1%" class="btn btn-warning comment"  id="<?php echo $result->id_que;?>"><?php echo $lang['comment']; ?></button>

                    <p></p><br>
                </div>

            </div>

        </div>

		
		
        <p></p><br>

  

    <?php }  } ?>

<p></p><br>

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
     .pro-disc-1{
             
             border: 1px solid #CABFBF;
             padding: 3px;
             border-radius: 5px;
             float: left;
             margin-top:0.15%;
            }
        .fm
          {
         
          color: #3180A7;
          font-family: sans-serif;
          border:1px solid #ccc;
           padding:10px;
           border-radius: 5px;
           width:60%;
           margin-left:5%;
           min-height:45px;
           white-space: pre-wrap;      /* CSS3 */   
   white-space: -moz-pre-wrap; /* Firefox */    
   white-space: -pre-wrap;     /* Opera <7 */   
   white-space: -o-pre-wrap;   /* Opera 7 */    
   word-wrap: break-word;      /* IE */
   margin-bottom:3%;
      // width: 60%;

          }
          .ed
          {
          margin-left: 66%;
    margin-top: -4%;
          }
    

</style>
<ul class="pagination pull-right">
    <?php
    echo $links;

    ?>
</ul>
<p></p><br> <p></p><br>
</div>
<!-- /.row -->



<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>
    <!-- /.row -->
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<!-- ----------------Rohitdutta------delete comment----------->
<!----------------------- This Modal is for delete single comment----------------------------------------------->
<div class="modal fade" id="deleteComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><h2><?php echo $lang['delete_confirmation']; ?></h2>
            </div>
            <div class="modal-body">
                <?php echo $lang['do_you_want_to_delete']; ?>
            </div>
            <div class="modal-footer">

                <a href="javascript:void(0)" class="ForDeleteComment" style="text-decoration: none;" id="" data-id="">
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" id="deleteCommentBtn"><?php echo $lang['yes']; ?></button>
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo $lang['no']; ?></button>
            </div>
        </div>
    </div>
</div>











<!----------------------- This Modal is for edit single comment----------------------------------------------->
<div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><h2><?php echo $lang['edit_comment'];?></h2>
            </div>
            <div class="modal-body">
               <form method="post" enctype="multipart/form-data" id="edit_s_c">
               <input type="text" style="width:100%;" required class="form-control ForEditComment" name="edit_single_comment" id="edit_single_comment" value="">
               </form>
            </div>
            <div class="modal-footer">

                <a href="javascript:void(0)" class="for_comment_id" style="text-decoration: none;" id="">
                
                    <button type="button"  class="btn btn-success btn-sm" id="editCommentBtn"><?php echo $lang['update'];?></button>
                </a>
                <button type="button" class="btn btn-danger btn-sm" id="cancelAtEditComment" data-dismiss="modal"><?php echo $lang['cancel'];?></button>
            </div>
        </div>
    </div>
</div>
<!-- ----------------------------------------------->

<div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><h2><?php echo $lang['delete_confirmation'];?></h2> 
            </div>
            <div class="modal-body">
                <?php echo $lang['do_you_want_to_delete'];?>
            </div>
            <div class="modal-footer">

                <a href="javascript:void(0)" style="text-decoration: none;" id="">
                    <button type="button" class="btn  btn-success btn-sm" id="deleteConfirmBtn"><?php echo $lang['confirm'];?></button>
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo $lang['cancel'];?></button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><?php echo $lang['ask_question'];?></h4>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="askQuestionForm">
                    <div class="form-group">
                        <input type="hidden" required class="form-control" name="userIDQue" id="userIDQue" value="<?php echo $user[0]['custID'];?>">
                        <label for="recipient-name" class="control-label"><?php echo $lang['question'];?>:</label>
                        <input type="text" required class="form-control forum_modal" name="titleQue" id="titleQue">
                    </div>
                    <div class="form-group" id="QueDes">
                        <label for="message-text" class="control-label "><?php echo $lang['description'];?>:</label>
                        <textarea class="form-control forum_modal" name="bodyQue" id="bodyQue" required></textarea>

                    </div>



                    <div class="form-group">
                        <label for="message-text" class="control-label"><?php echo $lang['category'];?>:<small>(<?php echo $lang['for_new_category'];?>, <?php echo $lang['contact'];?>: <span style="color:red;font-style:italic;">support@mahajyothis.com</span>)</small></label>
                        <select class="form-control forum_modal"  name="category" id="category">
                            <option value='astrology'><?php echo $lang['astrology'];?></option>
                            <option value='numerology'><?php echo $lang['numerology'];?></option>
                            <option value='horoscope'><?php echo $lang['horoscope'];?></option>
                            <option value='tarot-reading'><?php echo $lang['tarot_reading'];?></option>
                            <option value='zodiac'><?php echo $lang['zodiac'];?></option>
                            <option value='fengi-shui'><?php echo $lang['fengi_shui'];?></option>
                            <option value='other'><?php echo $lang['other'];?></option>
                        </select>

                    </div>

                    <div class="form-group hide">
                        <label for="message-text" class="control-label">Privacy:</label>
                        <select class="form-control"  name="privacyQue" id="privacyQue">
                            <option value='1' selected>Public</option>
                            <option value='2'>Private</option>
                        </select>

                    </div>
                    
                        
		   <div class="form-group">
              <div style="width:300px; float:left;" align="left"><div class="vpb_captcha_wrapper"><img src="<?php echo base_url().'assets/captcha/';?>vasplusCaptcha.php?rand=<?php echo rand(); ?>" id='captchaimg' ></div>

<div style=" padding-top:5px;" align="left"><font style="font-family:Verdana, Geneva, sans-serif; font-size:11px;"><?=$lang['cant-read'];?> <span class="ccc"><a style="color:red;" href="javascript:void(0);" onClick="vpb_refresh_aptcha();" id="refCaptcha"><?=$lang['choose-another-image'];?></a></span></font></div>

</div>
            <input type="text" required class="form-control forum_modal" placeholder="<?php echo $lang['enter_above_code_here'];?>" name="vpb_captcha_code" id="vpb_captcha_code">
          </div>

            </div>
            <div class="modal-footer">
                <span class="required_error hide pull-left" style="color:red;">* <?=$lang['please-kindly-fill-all-fields'];?></span>
                <input type="submit" class="btn btn-success btn-sm" value="<?=$lang['continue'];?>" id="submitQuestion" />
			   <button type="button" class="btn btn-danger btn-sm" id='closeBtnCreate' data-dismiss="modal"><?=$lang['cancel'];?></button>
               
            </div>
            </form>

        </div>
    </div>
</div>
<!--   DUMMY BLOCK FOR NEW POST -->

<div id="hidden_new_question" class="hide">
	<div class="row" id="">
		<div class="col-sm-12 admin3">
			<div class="col-sm-2 adm">
				<center>
				<h2 style="color:#1b91f1; margin-bottom:4%;">&nbsp;</h2>
				</center>
				<center><img src="<?php echo base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'];?>" class="image-responsive img-circle" width="100" height="100" alt=""></center>
				<center>
				<p style="margin:8%;">
<?php echo $this->session->userdata['profile_data'][0]['perdataFirstName']." ".$this->session->userdata['profile_data'][0]['perdataLastName'];?>
				</p>
				<p>
                            <img src="<?php echo base_url('assets/forum_n/images/user.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/network1.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/message1.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/facebook.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/twitter.png');?>" width="30" height="30" alt=""/></p>
				</center>
			</div>
			<div class="col-sm-10">
				<h3 style="color:#1b91f1; margin-bottom:1%;" class="forum_quo_title"></h3>
				<h3 style="margin:1%;float:right; margin-top:-3%;" class="userActions" id="">
				
				<a href="#editQUestion" data-toggle="modal" data-target="#editQUestion" class="editData">
				<img src="<?php echo base_url('assets/forum_n/images/edit.png');?>" width="25" height="25" alt="Edit"></a>
				<a href="#deleteConfirmation" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation"><img src="<?php echo base_url('assets/forum_n/images/delete.png');?>" width="25" height="25" alt="">
				</a>
				</h3>
				<p style="text-align: justify;" class="forum_quo_body">
				</p>
				<span  class="recent_comment_count">
				<button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-repeat" style="margin:2px;"></span><span>0</span> <?=$lang['replies'];?></button></span>
				<span  id="user_like" >
				<button class="pst-lke btn btn-info like btn-xs"><span id="">0</span> <i class="fa fa-thumbs-o-up" style="padding-right:5px;"></i><?=$lang['like'];?> </button>
				</span>
				<button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-time"></span> Few seconds ago</button>
				<p>
				</p>
				<br>
				 <?=$lang['replies'];?>:
				<div  class="recent_comment">
				</div>
				<!---------------------------------RohitDutta---Dummy------------------------------------------>
				<p class="d_c">
				</p>
				<span class="user" >
				
				<input type="hidden" id="get_postid" class="get_postid" value="" data-postid="">
				
				<input type="hidden" id="values11" class="increment_number1" value="0">
				<a href="javascript:void(0)" class="new_comments1"  style="color: darkgreen; font-weight: bold;display: none"><?=$lang['view-more-comments'];?></a>
				 <div class="loading_img_dummy" id=""></div>
				<!----------------------------------------------------------------------------------------------------------->
				<input type="text" class="form-control user_comment" style="width:52%"  placeholder="<?php echo $lang['write_something_here'];?>............."><button style="float:left;margin-top:1%;margin-bottom:1%" class="btn btn-warning comment" ><?php echo $lang['comment'];?></button>
				<p>
				</p>
				<br>
				</span>
			</div>
		</div>
	</div>
	  <p></p><br>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="<?php echo base_url('assets/forum/js/bootstrap.min.js');?>"></script>
<?php include_once('assets/forum/js/forum.php');?>

</body>



        <div class="modal fade" id="editQUestion" tabindex="-1" role="dialog" aria-labelledby="editQUestion">
            <div class="modal-dialog" role="document" style="z-index:9999;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><?php echo $lang['update_question'];?></h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group" id="QueTitle">
                                
                                <input type="hidden" required class="form-control forum_modal" name="Question_id" id="Question_id" value="">
                                
								<label for="recipient-name" class="control-label"><?php echo $lang['question'];?>:</label>
                                <input type="text" required class="form-control forum_modal" name="Edit_titleQue" id="Edit_titleQue" value="">
                            </div>
                            <div class="form-group" id="QueDes">
                                <label for="message-text" class="control-label"><?php echo $lang['description'];?>:</label>
                                <textarea class="form-control forum_modal" name="Edit_bodyQue" id="Edit_bodyQue" required></textarea>

                            </div>

                            <div class="form-group">
                                <label for="message-text" class="control-label"><?php echo $lang['category'];?>:<small>(<?php echo $lang['for_new_category'];?>, <?php echo $lang['contact'];?> : <span style="color:red;font-style:italic;">support@mahajyothis.com</span>)</small></label>
                                <select class="form-control forum_modal"  name="categoryEdit" id="categoryEdit">
										<option value='astrology'><?php echo $lang['astrology'];?></option>
										<option value='numerology'><?php echo $lang['numerology'];?></option>
										<option value='horoscope'><?php echo $lang['horoscope'];?></option>
										<option value='tarot-reading'><?php echo $lang['tarot_reading'];?></option>
										<option value='zodiac'><?php echo $lang['zodiac'];?></option>
										<option value='fengi-shui'><?php echo $lang['fengi_shui'];?></option>
										<option value='other'><?php echo $lang['other'];?></option>
                                </select>

                            </div>

                            <div class="form-group hide">
                                <label for="message-text" class="control-label">Privacy:</label>
                                <select class="form-control"  name="privacyEdit" id="privacyEdit">
                                    <option value='1'>Public</option>
                                    <option value='2'>Private</option>
                                </select>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <span class="required_error hide pull-left" style="color:red;">* <?=$lang['please-kindly-fill-all-fields'];?></span>
                        <input type="submit" class="btn btn-success btn-sm" value="<?php echo $lang['update'];?>" id="UpdateEditedQuestion"  />
					   <button type="button" class="btn btn-danger btn-sm" id='closeBtn' data-dismiss="modal"><?php echo $lang['cancel'];?></button>
                       
                    </div>
                    </form>

                </div>
            </div>
        </div>


		
		 <div class="modal fade" id="hideQuestion" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document" style="z-index:9999;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel"><h3><?php echo $lang['hide_confirmation'];?></h3>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo $lang['do_you_want_to_hide'];?>
                                    </div>
                                    <div class="modal-footer">

                                        <a href="#" style="cursor:pointer;text-decoration: none;" class="" id="idtoHide"><button type="button" class="btn btn-success btn-sm" id="preHidethis"><?php echo $lang['hide'];?></button></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo $lang['cancel'];?></button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>




 <?php include_once('assets/js/forum/script.php');?>

 <?php include_once('assets/js/unlike/forum_script.php');?>
 
 
 <script>
$(document).ready(function() {

$('#submitQuestion').addClass('hide');

$('#vpb_captcha_code').keyup(function() {

var captchaAns = $('#vpb_captcha_code').val();

if(captchaAns != '')
{
   var dataString = 'vpb_captcha_code='+ captchaAns;
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>assets/captcha/captcha_checker.php",
			data: dataString,
			cache: false,
			success: function(response)
			{
			    data = parseInt(response);
				if(data == 0)
				{
				   $('#submitQuestion').addClass('hide');
				}
				else
				{
				   $('#submitQuestion').removeClass('hide');
				}
				
			}
		});
  
}
else
{
   $('#submitQuestion').addClass('hide');
}

});

});


</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>


</html>