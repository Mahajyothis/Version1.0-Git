<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset='utf-8' />
		<link href="../assets/css/activity.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>
		
		$(document).ready(function(){
			$(".custom2").click(function(){
			$("#comment2").slideToggle();	
			$("#comment3").hide();
			});
		    $(".custom3").click(function(){
			$("#comment3").slideToggle();
			$("#comment2").hide();			
			});
			$(".custom4").click(function(){			
			//$("#comment2").hide();
			});
			$(".custom5").click(function(){			
			$("#comment3").hide();
			});
		});
		
			</script>		
	</head>	
	<body>
		<div class="container1 center-block">
			<div class="hd1">
				<div class="total center-block" >
						<img class="profile_view" src="../uploads/<?php echo $notification_row['0']['photo'];  ?>" alt="User Profile">
						
					<div class="col_details">
						<h2 id="tex"><?php echo $notification_row['0']['custName'];   ?></h2>
						<h3 id="tex1"><?php echo $notification_row['0']['pDate'];   ?></h3>
						<h4 id="tex2"><?php echo $notification_row['0']['Title'];   ?></h4>
					</div>
					
				</div>
				
			</div>
			<div class=" middle">
				<div class="container2">
					<p id="inner_content">
						<?php echo $notification_row['0']['Description'];   ?>
					</p>				
				</div>		
			</div>
			<div class="bottom">
				<div class="container2">
				<h5 id="com1"><i class="fa fa-thumbs-o-up"><span id="add_like"> <?php echo "(".$user_likes['0']['user_like'].")";   ?></span></i>   <i class="fa fa-comments-o"> <span id="add_comment"><?php echo "(".$total_comments['0']['total_comments'].")";   ?></span></i>   <i class="fa fa-share-square-o"><span id="add_share"> <?php echo "(".$total_share['0']['total_share'].")";   ?></span></i></h5>
				<div id="recent_comments">
				<?php 
				 foreach ($select_com->result() as $comment_row)
   {?>
					
				
				<div class="col-md-12 even chld-cls" id="first0" style="margin-bottom:7px;"><span><img src="../uploads/<?php echo $comment_row->photo;   ?>" alt="User Profile" style="width: 10%;float: left;margin-bottom:7px;"/></span>
					<p id="recents" ><?php echo $comment_row->uaDescription;   ?></p>
				</div>
				<?php  } ?>
				</div>
						
						
						<?php  if($liked->num_rows() >= 1){  ?>
						
						
						<button type="button" id="btstyle" class="btn btn-warning custom1">liked</button>
						
						<?php  }else{ ?>
						
						
						<span id="user_like"><button type="button" id="btstyle" onclick="user_like()" class="btn btn-warning custom1">like</button></span>
						
						
						<?php   } ?>
						
						
						
						<button type="button" id="btstyle" class="btn btn-warning custom2">comment</button>
						
						<?php  if($shared->num_rows() >= 1){  ?>
						
						<button type="button" id="btstyle" class="btn btn-warning " >shared</button>
						
						
						<?php  }else{ ?>
						
						<button type="button" id="btstyle" class="btn btn-warning custom3 share" >share</button>
						
						
						<?php   } ?>
						
						
						<!--privacy hide-->
							<div class="text_area" id="comment3">
								<div class="form-group" style="color: #fff;">
									<label for="comment" id="lab">Privacy</label>
									 <div class="radio">
										  <label><input type="radio" value="private" id="set_privacy" name="optradio">Private</label>
										</div>
										<div class="radio">
										  <label><input type="radio" value="public" id="set_privacy" name="optradio">Public</label>
									</div>
									<button type="button" id="btstyle" onclick="submit_share()" class="btn btn-warning custom5">Submit</button>
								</div>							
							</div>
						
						
						<!--/privacy hide-->						
						<div class="text_area" id="comment2">
							<div class="form-group">
								<label for="comment" id="lab">Comment:</label>
								<form id="form_comment">
								<textarea class="form-control_post" rows="5" id="user_comment"></textarea>
								<button type="button" id="btstyle" onclick="submit_comment()" class="btn btn-warning custom4">Submit</button></form>
							</div>
							
						</div>
						
				</div>			
			</div>
		</div>
	</body>
	<?php
$user_row = $this->session->userdata('profile_data');?>
	
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
	var user_comment = $("#user_comment").val();
	var uid = "<?php echo $_GET['uid'];?>";
	var cid = "<?php  echo $user_row['0']['custID']; ?>";
	var pid="<?php echo $_GET['pid'];?>";
    var cat="<?php echo $_GET['cat'];?>";
	
	var act="COMMENT";
      if(user_comment!=''){
        $.ajax({
          url: "<?php base_url();?>activity?user_comment="+user_comment+"&& uid="+uid+"&& cid="+cid+"&& pid="+pid+"&& cat="+cat+"&& act="+act
        }).done(function( data ) {
			$("#add_comment").html("<?php echo "(".($total_comments['0']['total_comments']+1).")";  ?>");
          $("#recent_comments").html(data);
		  
		   $("#form_comment").trigger("reset");
		   $("#comment2").hide();
		  return true;
        });   
      } 
	  
	if(user_comment=='')
	  {
	   $("#user_comment").focus();
	  }
    }
 }
  
  </script>
	<script>
 function submit_share() {
	 
      var user_share = $('#set_privacy:checked').val();
	  var uid = "<?php echo $_GET['uid'];?>";
	  var cid = "<?php  echo $user_row['0']['custID']; ?>";
	var pid="<?php echo $_GET['pid'];?>";
    var cat="<?php echo $_GET['cat'];?>";
	var act="SHARE";
      
        $.ajax({
          url: "<?php base_url();?>activity?user_share="+user_share+"&& uid="+uid+"&& cid="+cid+"&& pid="+pid+"&& cat="+cat+"&& act="+act
        }).done(function( data ) {
        
		 	$("#add_share").html("<?php echo "(".($total_share['0']['total_share']+1).")";  ?>");
		   $(".share").html("shared");
		  return true;
        });   

	  
	
    }
  
  </script>
	<script>
function user_like(){
	var cid="<?php  echo $user_row[0]['custID'];   ?>";
	var pid="<?php echo $_GET['uid'];?>";
	var cat="<?php echo $_GET['cat'];?>";
	var act="LIKE";
	var page="recentactivity";
	
	$.ajax({
          url: "<?php echo base_url();?>like?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page
        }).done(function( data ) {
       $("#add_like").html("<?php echo "(".($user_likes['0']['user_like']+1).")";  ?>");
		   $("#user_like").load("../liked_1.html");
		  return true;
        }); 
	
}



</script>



	
</html>