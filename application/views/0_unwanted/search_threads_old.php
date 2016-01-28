<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>.:: FORUM ::.</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="<?php echo base_url('assets/forum_n/css/business-frontpage.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/forum_n/css/bootstrap.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>



</head>

<body>
<?php
$user = $this->session->userdata('profile_data');
?>

<div class="col-sm-12">
  <a href="<?php echo base_url();?>user/<?php echo $user[0]['custName'];?>"> 
        
		  <span class="pull-right btn-danger" style="padding-left:3px;padding-right:3px;color:#fff;">X</span>
       
		</a>
</div>

<div class="container" style="background-color:#FFFFFF;">
<header class="business-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <center><img src="<?php echo base_url('assets/forum_n/images/msg1.png');?>" width="230" height="230" alt="" style="margin-top:2%;"/></center> </div>
        </div>
    </div>
</header>

<hr>
<div class="col-sm-12">
    <div class="col-sm-9">
        <ul class="nav navbar-nav">

            <a href="<?php echo base_url().'forum';?>"> <button type="button" class="btn btn-info">Recent Threads</button></a>


        </ul>
    </div>
    <div class="col-sm-2">
        <form action="<?php echo base_url().'forum/get_search';?>" method="get" class="search-form">
            <div class="form-group has-feedback">
                <label for="search" class="sr-only">Search</label>
                <input type="text" class="form-control" name="search" id="search" placeholder="Search thread...">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
        </form>
    </div>
    <div class="col-sm-1">



        <a style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal"> <img src="<?php echo base_url('assets/forum_n/images/icon1.png');?>" width="30" height="30" alt=""/></a>


    </div>
    <hr>
    <hr>
</div>
<div class="recentQuestionSection" style="display:none;"></div>
<?php

if(empty($all))
{

    echo "<div class='col-lg-12' id='noDataFound' style='color:red;padding:35px;'>No data found...!</div>";
}
else
{

    foreach($all as $result)
    {
      
      
   ?>
        <div class="row" id="singleQestion_<?php echo $result->id_que;?>">
            <div class="col-sm-12 admin3">
                <div class="col-sm-2 adm">
                    <center><h2 style="color:#1b91f1; margin-bottom:4%;">&nbsp;</h2></center>
                    <center><img src="<?php echo ($result->photo && file_exists(UPLOADS.$result->photo)) ? base_url().UPLOADS.$result->photo : base_url().UPLOADS.'profile.png';?>" class="image-responsive img-circle" width="100" height="100" alt=""/></center>
                    <center><p style="margin:8%;"><?php echo $result->custName;?></h2></p>

                        <p>
                            <img src="<?php echo base_url('assets/forum_n/images/adm1.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/adm2.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/adm3.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/adm4.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/adm5.png');?>" width="30" height="30" alt=""/></p>
                </div>
                <div class="col-sm-10">
                    <h3 style="color:#1b91f1; margin-bottom:1%;" class="forum_quo_title"><?php echo $result->titleQue;?></h3>
                    <?php if($this->session->userdata['profile_data'][0]['custID'] == $result->custID){ ?>
                        <h3  style="margin:1%;float:right; margin-top:-3%;" id="<?php echo $result->id_que;?>">
                            <a href="#editQuestion"  data-toggle="modal" data-target="#editQUestion" class="editData"> <img src="<?php echo base_url('assets/forum_n/images/icon3.png');?>" width="25" height="25" alt="Edit" /></a>
                            <a href="#deleteConfirmation" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation"><img src="<?php echo base_url('assets/forum_n/images/icon4.png');?>" width="25" height="25" alt="" />
                            </a>
                        </h3>
                    <?php }
                    else
                    {
                        ?>
						<h5  style="margin:1%;float:right; margin-top:-3%;" id="<?php echo $result->id_que;?>">
                        <a style="color:#808080;cursor:pointer;" data-toggle="modal" class="hideQuestionClick" title="hide" data-target="#hideQuestion" href="#hideQuestion"><span style="float:right; margin: 0px 0px 0px 11px;" class="glyphicon glyphicon-eye-close"></span></a>
						</h5>
                       
                    <?php }  ?>
                    <p style="text-align: justify;" class="forum_quo_body">
                        <?php echo $result->bodyQue;?>
                    </p>
  <span id="recent_comment_count<?php echo $result->id_que;?>">
  <button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-repeat"style="margin:2px;"></span> <span><?php echo $result->total_comments; ?></span> Replys</button></span>
  
		 <span id="user_like<?php echo $result->id_que; ?>">
 <?php
 
 if(ISSET($result->liked)){
     ?>


     <button class="pst-lke btn btn-info btn-xs">(<span> <?php echo $result->total_likes;  ?></span>) <i class="fa fa-thumbs-up" style="padding-right:5px;color:white;" ></i>liked</button>

 <?php } else { ?>

     <button   id="<?php echo $result->id_que; ?>" class="pst-lke btn btn-info like btn-xs">(<span><?php echo $result->total_likes;  ?></span>)<i class="fa fa-thumbs-o-up" style="padding-right:5px;" ></i>like</button>
 <?php }?>
  
  </span>


                    <button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-time"></span> <?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$result->dDate);?></button>
                    <p></p><br>
                    Replies:
                    <div id="recent_comment<?php echo $result->id_que;?>" class="display_comm1">
                        <?php if(!empty($result->comments)){
      foreach($result->comments as $row){
      	
      
                            ?>

                            <div class="display_comm" style="border: 1px solid #9A9090;padding: 1%;border-radius: 10px;margin-bottom:1% " id="margin" ><p><img src="/uploads/<?php

                                    if(ISSET($row['photo'])){
                                        echo $row['photo'];
                                    }
                                    else{
                                        echo "profile.png";
                                    }




                                    ?>" height="25px" width="25px" style="margin-left:1%"><b style="margin-left:1%;color: #3180A7;font-family: sans-serif;"><?php echo $row['comment'];?></b></div>

                        <?php  
      }} ?>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------->
                    <p class="d_c"></p>
                    <?php
                    $query = $this->db->query("SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='FORUM' AND ua.`catID`=".$result->id_que." ORDER BY ua.`uaID` DESC LIMIT 5");
                    $count_com = $query->result();
                    $ccc = count($count_com);

                    if($ccc < 5)
                    {
                        ?>

                    <?php
                    }
                    else
                    {
                        ?>
                        <a href="javascript:void(0)" class="view_more_forum_comments" style="color: darkgreen; font-weight: bold">view more comments</a>
                    <?php
                    }
                    ?>
                    <span class="user<?php echo $result->custID; ?>" id="<?php echo $result->custID; ?>">
                    <a href="javascript:void(0)" class="view_more_forum_comments1" style="color: darkgreen; font-weight: bold;display: none">view more comments</a>
                    <input type="text" id="get_postid" class="get_postid" value="<?php echo $result->id_que;?>" style="display: none" />
                    <input type="text"  class="increment_number" value="4" style="display: none"/>
                    <input type="text" id="values"  class="increment_number1" value="<?php echo $ccc?>" style="display: none"/>
                    <!----------------------------------------------------------------------------------------------------------->

                    <input type="text" class="form-control" id="user_comment<?php echo $result->id_que; ?>" placeholder="Write Something Here............."><button style="float:right;margin-top:1%;margin-bottom:1%" class="btn btn-warning comment"  id="<?php echo $result->id_que;?>">Submit</button>

                    <p></p><br>
                </div>

            </div>

        </div>

		
		
        <p></p><br>

       
       





    <?php }  } ?>

<p></p><br>

 <p></p><br>
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
                    <button type="button" class="btn btn-danger btn-sm" id="deleteConfirmBtn">Confirm</button>
                </a>
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
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
                <form method="post" enctype="multipart/form-data" id="askQuestionForm">
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
                        <label for="message-text" class="control-label">Category:<small>(For new category, Contact : <span style="color:red;font-style:italic;">support@mahajyothis.com</span>)</small></label>
                        <select class="form-control"  name="category" id="category">
                            <option value='astrology'>Astrology</option>
                            <option value='numerology'>Numerology</option>
                            <option value='horoscope'>Horoscope</option>
                            <option value='tarot-reading'>Tarot reading</option>
                            <option value='zodiac'>Zodiac</option>
                            <option value='fengi-shui'>Fengi shui</option>
                            <option value='other'>Other</option>
                        </select>

                    </div>

                    <div class="form-group hide">
                        <label for="message-text" class="control-label">Privacy:</label>
                        <select class="form-control"  name="privacyQue" id="privacyQue">
                            <option value='1' selected>Public</option>
                            <option value='2'>Private</option>
                        </select>

                    </div>

            </div>
            <div class="modal-footer">
                <span class="required_error hide pull-left" style="color:red;">* Please kindly fill all fields.</span>
                <button type="button" class="btn btn-danger btn-sm" id='closeBtnCreate' data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success btn-sm" value="Ask forum" id="submitQuestion" />
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
<?php echo $this->session->userdata['profile_data'][0]['custName'];?>
				</p>
				<p>
					<img src="<?php echo base_url('assets/forum_n/images/adm1.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/adm2.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/adm3.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/adm4.png');?>" width="30" height="30" alt=""/><img src="<?php echo base_url('assets/forum_n/images/adm5.png');?>" width="30" height="30" alt=""/>
				</p>
				</center>
			</div>
			<div class="col-sm-10">
				<h3 style="color:#1b91f1; margin-bottom:1%;" class="forum_quo_title"></h3>
				<h3 style="margin:1%;float:right; margin-top:-3%;" class="userActions" id="">
				
				<a href="#editQUestion" data-toggle="modal" data-target="#editQUestion" class="editData">
				<img src="http://satish.mahajyothis.net.local/assets/forum_n/images/icon3.png" width="25" height="25" alt="Edit"></a>
				<a href="#deleteConfirmation" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation"><img src="http://satish.mahajyothis.net.local/assets/forum_n/images/icon4.png" width="25" height="25" alt="">
				</a>
				</h3>
				<p style="text-align: justify;" class="forum_quo_body">
				</p>
				<span id="recent_comment_count82" class="recent_comment_count">
				<button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-repeat" style="margin:2px;"></span><span>0</span> Replys</button></span>
				<span id="user_like82" class="user_like">
				<button id="" class="pst-lke btn btn-info like btn-xs">(<span>0</span>)<i class="fa fa-thumbs-o-up" style="padding-right:5px;"></i>like </button>
				</span>
				<button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-time"></span> Few seconds ago</button>
				<p>
				</p>
				<br>
				 Replies:
				<div id="recent_comment82" class="display_comm1">
				</div>
				<!----------------------------------------------------------------------------------------------------------->
				<p class="d_c">
				</p>
				<span class="user8" id="8">
				<a href="javascript:void(0)" class="view_more_forum_comments1" style="color: darkgreen; font-weight: bold;display: none">view more comments</a>
				<input type="text" id="get_postid" class="get_postid" value="82" style="display: none">
				<input type="text" class="increment_number" value="4" style="display: none">
				<input type="text" id="values" class="increment_number1" value="0" style="display: none">
				<!----------------------------------------------------------------------------------------------------------->
				<input type="text" class="form-control" id="user_comment82" placeholder="Write Something Here............."><button style="float:right;margin-top:1%;margin-bottom:1%" class="btn btn-warning comment" id="82">Submit</button>
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
                        <h4 class="modal-title">Update Question</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group" id="QueTitle">
                                
                                <input type="hidden" required class="form-control" name="Question_id" id="Question_id" value="">
                                
								<label for="recipient-name" class="control-label">Question:</label>
                                <input type="text" required class="form-control" name="Edit_titleQue" id="Edit_titleQue" value="">
                            </div>
                            <div class="form-group" id="QueDes">
                                <label for="message-text" class="control-label">Description:</label>
                                <textarea class="form-control" name="Edit_bodyQue" id="Edit_bodyQue" required></textarea>

                            </div>

                            <div class="form-group">
                                <label for="message-text" class="control-label">Category:<small>(For new category, Contact : <span style="color:red;font-style:italic;">support@mahajyothis.com</span>)</small></label>
                                <select class="form-control"  name="categoryEdit" id="categoryEdit">
                                    <option value='astrology'>Astrology</option>
                                    <option value='numerology'>Numerology</option>
                                    <option value='horoscope'>Horoscope</option>
                                    <option value='tarot-reading'>Tarot reading</option>
                                    <option value='zodiac'>Zodiac</option>
                                    <option value='fengi-shui'>Fengi shui</option>
                                    <option value='other'>Other</option>
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
                        <span class="required_error hide pull-left" style="color:red;">* Please kindly fill all fields.</span>
                        <button type="button" class="btn btn-danger btn-sm" id='closeBtn' data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success btn-sm" value="Update" id="UpdateEditedQuestion"  />
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
                                        <h4 class="modal-title" id="exampleModalLabel"><h3>Hide conformation</h3>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to hide?
                                    </div>
                                    <div class="modal-footer">

                                        <a href="#" style="cursor:pointer;" class="" id="idtoHide"><button type="button" class="btn btn-danger btn-sm" id="preHidethis">Hide</button></a>
                                        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>





<script>


    $(document).ready(function()
    {
        $(".view_more_forum_comments").click(function()

        {
            var curr = $(this);
            var postid = $(this).siblings('input.get_postid').val();
            var limits = "limits";

            var inc = $(this).siblings("input.increment_number").val();
            $.ajax
            ({
                url: "<?php echo base_url();?>Forum/display_comments?limits="+limits+"&& postid="+postid+"&& inc="+inc
            }).done(function( data ) {



                curr.siblings('.display_comm1').hide()
                curr.siblings('.d_c').html(data)


                var rowCount = curr.siblings('.d_c ').find('.display_comm').length;

                if(rowCount < 4)
                {
                    curr.hide();
                }



            });


        });
    });
</script>

<script>


    $(document).ready(function()
    {
        $(".view_more_forum_comments1").click(function()

        {
            var curr = $(this);
            var postid = $(this).siblings('input.get_postid').val();
            var limits = "limits";
            var inc = $(this).siblings("input.increment_number").val();
            $.ajax
            ({
                url: "<?php echo base_url();?>Forum/display_comments?limits="+limits+"&& postid="+postid+"&& inc="+inc
            }).done(function( data ) {



                curr.siblings('.display_comm1').hide()


                curr.siblings('.d_c').html(data)


                var rowCount = curr.siblings('.d_c ').find('.display_comm').length;

                if(rowCount < 4)
                {
                    curr.hide();
                }

            });


        });
    });
</script>

<script>
    $(document).ready(function(){
        $(".view_more_forum_comments").click(function(){
            var n = $(this).siblings(".increment_number");
            n.val(Number(n.val())+4);
        });
        $(".view_more_forum_comments1").click(function(){
            var n = $(this).siblings(".increment_number");
            n.val(Number(n.val())+4);
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(".btn-warning").click(function()
        {

            var n = $(this).siblings(".increment_number1");
            n.val(Number(n.val())+1);


            var five_value = $(this).siblings("#values").val();

            $(this).siblings('.display_comm1').show()
            //$(this).siblings('.d_c').hide()

            if(five_value > 4)
            {
                $(this).siblings(".view_more_forum_comments1").show()
                $(this).siblings(".view_more_forum_comments").hide()


            }


        });
    });
</script>
 <?php include_once('assets/js/forum/script.php');?>

</html>