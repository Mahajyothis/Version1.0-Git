<?php 
if($results) foreach($results as $result);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo $result->titleQue;?></title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
				<link href="<?php echo base_url('assets/dis/inner/css/styles.css');?>" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.7.2.js"></script>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
	
</head>
	<body onload="get_all_com()">
<div class="wrapper">
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
		   
            <!-- /sidebar --> <!-- main -->
            <div class="column col-sm-9" id="main">
                <div class="padding">
                    <div class="full col-sm-9"> <!-- content -->
                        <div class="col-sm-12" id="featured">   
                          <div class="page-header text-muted">
                          <a href="<?php echo base_url()."forum";?>"><span class="glyphicon glyphicon-chevron-left"></span> Back to forum</a>
                          </div> 
                        </div> <!--/top story-->
                        <div class="row">    
                         <div class="col-sm-12"><img src="<?php echo ($result->photo && file_exists(UPLOADS.$result->photo)) ? base_url().UPLOADS.$result->photo : base_url().UPLOADS.'profile.png';?>" class="img-thumbnail" alt="Cinque Terre" width="150" height="150"></div>
							</div>
							<div class="col-sm-12"> 
                              <h4><?php echo $result->custName;?></h4>
							</div>
					<div class="col-sm-12">
					<div class="row">
					         <h3><?php echo $result->titleQue;?></h3>
                             <p class="readings" >
							 <?php echo $result->bodyQue;?>
							 
							 </p>
                             </div>
							 <div class="col-sm-12">

                                <span id="add_like" > <?php echo $total_likes[0]['total_likes']; ?>  </span>

                                <?php  if($liked->num_rows() >= 1){  ?>
                                    <span class="label label-info"><span class="fa fa-thumbs-o-up"></span> <span id="add_like"> <?php echo $total_likes[0]['total_likes']; ?>  </span>  Liked</span>

                                <?php  }else{  ?>
                                    <span id="user_like"><span class="label label-info"  onclick="user_like()"><span class="fa fa-thumbs-o-up"></span> Like</span> </span>


                                <?php   }  ?>


                                <span class="label label-info"><span class="glyphicon glyphicon-comment"></span> <?php echo $total_replies[0]['total_replies']; ?> Replies</span>
                                <span class="label label-danger"><span class="glyphicon glyphicon-time"></span>  <?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$result->dDate);?></span>
                            </div>
							<div class="col-sm-12">
							 <br>
                            <p class="comment"><b>Replies:</b></p>
	                       </div>
						   <!--<div id="recent_comments">-->
                               <span id="v_m_c"></span>
                           </div>

						   
						   
						   
						   <div class="col-sm-12">
                            <p class="idea">Tell Us What You Think!</p>
<!--                               <input type="button" class="view_more_forum_comments" value="view more comments">-->
                               <a href="javascript:void(0);"  class="view_more_forum_comments" style="color: darkgreen; font-weight: bold; display: none">view more comments</a>
                               <input type="text" class="increment" value="4" style="display: none">
                               <input type="text" id="increment_number_for_comment" class="increment_number_for_comment" value="4" style="display: none">

	                       </div>
						   <div class="col-md-12">
						    <div class="col-sm-10">	
					<textarea class="form-control" style="border-radius:0px;background-color:#eee;color:#808008;" id="user_comment"></textarea>
					
	                       </div>
						   <div class="col-md-2 submit" style="margin-top:10px;">
						   <button type="button" class="btn btn-success" onclick="submit_comment()">Submit</button>
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
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	<?php  $user_row = $this->session->userdata('profile_data'); ?>
	<script>

function user_like(){
	var cid="<?php  echo $user_row[0]['custID'];   ?>";
	var pid="<?php echo $result->custID; ?>";
	var cat="FORUM";
	var act="LIKE";
	var page="recentactivity";
	var catid="<?php echo $result->id_que; ?>";
	$.ajax({
          url: "<?php echo base_url();?>like?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid
        }).done(function( data )
        {
           $("#add_like").html("<?php echo "(".($total_likes['0']['total_likes']+1).")";  ?>");
		   $("#user_like").load("/liked_2.html");
		   return true;
        }); 
	
}

	</script>
	<script>

 function submit_comment()
 {

     var comment_user = $("#user_comment").val()
     if(comment_user == "")
     {
         $("#user_comment").focus();

     }
     else
     {

         //var n = $(".increment_number_for_comment");
         //n.val(Number(n.val())+1);

         var user_comment = $("#user_comment").val();
         var uid = "<?php echo $result->custID; ?>";
         var cid = "<?php  echo $user_row['0']['custID']; ?>";
         var pid="<?php echo $result->id_que; ?>";
         var cat="FORUM";

         var act="DISCOMMENT";

         if(user_comment!=''){
             $.ajax({
                 url: "<?php echo base_url();?>activity?user_comment="+user_comment+"&uid="+uid+"&cid="+cid+"&pid="+pid+"&cat="+cat+"&act="+act
             }).done(function( data ) {
                 $("#v_m_c").html(data);
                 $(".increment").val("4")
                 $("#user_comment").val('')
                 var rowCount = $('#v_m_c div').length;
                 if(rowCount == 4)
                 {
                     var n = $(".increment_number_for_comment");
                     n.val(Number(n.val())+1);
                     var vvv = $(".increment_number_for_comment").val()
                     if(vvv > 5)
                     {
                        $(".view_more_forum_comments").show()
                     }
                 }


                 return true;
             });
         }


     }
 }
  </script>
    <?php
    $id = $this->uri->segment(3);
    $iid = explode("-",$id);
    $iiid = $iid[0];
    ?>
    <!--------------This java script is for display more comments  ---------->
    <script>
        $(document).ready(function()
        {
            $(".view_more_forum_comments").click(function()


            {


                var inc = $(".increment").val();


                var catID = "<?php echo $iiid?>";

                $.ajax
                ({
                    url: "<?php echo base_url();?>Forum/comment_views1?catID="+catID+"&& inc="+inc
                }).done(function( data ) {
                    $("#v_m_c").html(data)

                    var rowCount = $('#v_m_c div').length;
                    if(rowCount < 4)
                    {
                        $(".view_more_forum_comments").hide()
                    }



                });

            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".view_more_forum_comments").click(function(){
                var n = $(".increment");
                n.val(Number(n.val())+4);
            });
        });
    </script>
    <script>
        function get_all_com()

            {



                //var limits = "limits";
                var catID = "<?php echo $iiid?>"

                $.ajax
                ({
                    url: "<?php echo base_url();?>Forum/comment_views?catID="+catID
                }).done(function( data )
                {


                    $("#v_m_c").html(data);
                    var rowCount = $('#v_m_c div').length;

                    if(rowCount == 4)
                    {
                        var inb = $("#increment_number_for_comment").val('6')
                            $(".view_more_forum_comments").show()
                    }






                });

            }


    </script>


	
</html>