<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset='utf-8' />
          <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
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
<style>	
.bottom{
height: 234px;
overflow-y: scroll;

}
#comment2{
float:right;
width:50%;
margin-right:20px;
}
#tex{
    color: #ffffff;
	text-align: center;
}
#tex1{
	margin-top:40%;
   
}
.no-padding{
	padding-left:0px;
	padding-right:0px;
	
}
.no-padding1{
	padding:0px;	
}
.pro_img_i{
	margin-bottom:3%;
	
}
.first_row-side{
	margin-top:14%;
}
.wrap-com{
margin-bottom:7px;border: 1px solid #CEC4C4;border-radius: 8px;width: 90%;min-height: 50px;word-wrap:break-word;
}
</style>
		
	</head>	
	<body style="background:url('../assets/img/network-bg.jpg');background-attachment: fixed;background-position: center">
		<div class="container total no-padding"  style="background:url('../assets/img/Recent Update Page-bg.jpg');background-position: center;border: 1px solid #5D5757; box-shadow:  1px 1px 55px black;padding-bottom:30px;">
		
			<div class="col-md-6 first_row-side">
			
			
			
				<div class="col-md-12">
					<h2 id="tex"><?php echo $notification_row['0']['custName'];   ?></h2>
				</div>
				<div class="col-md-12 pro_img_i">
					<img class="profile_view" src="<?php echo ($notification_row['0']['photo'] && file_exists(UPLOADS.$notification_row['0']['photo'])) ? base_url().UPLOADS.$notification_row['0']['photo'] : base_url().UPLOADS.'profile.png';?>" alt="User Profile">
				</div>
				<div class="col-md-12 middle">					
					<div class="container2">
						<p id="inner_content">
							<?php echo $notification_row['0']['Description'];   ?>
						</p>				
					</div>						
				</div>
					
					<div class="col-md-12">
						<p id="com1" ><i class="fa fa-thumbs-o-up">(<span id="add_like"> <?php echo $user_likes['0']['user_like'];   ?></span>)</i>   <i class="fa fa-comments-o"> (<span id="add_comment"><?php echo $total_comments['0']['total_comments'];   ?></span>)</i>   <i class="fa fa-share-square-o"><span id="add_share"> <?php echo "(".$total_share['0']['total_share'].")";   ?></span></i></p>
					</div>
				
				
			</div>
			<div class="col-md-6" style="margin-top: -3%;">
			
			
			<div class="col-md-12">
				<div class="hd1">
							<div class="total center-block" >					
									
								<div class="col_details">
									
									<h3 id="tex1"><?php echo $notification_row['0']['pDate'];   ?></h3>
									<h4 id="tex2"><?php echo $notification_row['0']['Title'];   ?></h4>
								</div>
								
							</div>							
				</div>	     
			</div>	<div class="col-md-12 bottom">
					<div class="container2">
					
					<div id="recent_comments">
					<div class="scroll_div">
					<?php 
					 $count =  count($select_com->result());
					 foreach ($select_com->result() as $comment_row)
	   				{?>
						
					
					<div class="col-md-12 even chld-cls no-padding1 wrap-com" id="first0">
							<div style="float: left;background-color: rgba(185, 214, 214, 0.48);border-radius: 8px 0 0 8px;"><div class="col-md-2 img-cls-pro"><span><img src="<?php echo ($comment_row->photo && file_exists(UPLOADS.$comment_row->photo)) ? base_url().UPLOADS.$comment_row->photo : base_url().UPLOADS.'profile.png';?>" alt="User Profile" style="width:35px;height:35px;float: left;margin-bottom:7px;border-radius: 50px;margin-top: 6px;"/></span></div></div>
						<p id="recents" ><?php echo $comment_row->uaDescription;   ?></p>
					</div></div>
					<?php  } ?>

					</div>
						<span class="user" id="<?php echo $_GET['uid']; ?>"></span>
						<span class="category" id="<?php echo $_GET['cat']; ?>" ></span>	
							
							<?php  if($liked->num_rows() >= 1){  ?>
							
							
							<span id="prof_unlike"><button type="button" id="<?php echo $this->input->get('pid'); ?>" class="btn btn-warning custom1 unlike"><?php echo $lang['unlike']; ?> <i class="fa fa-thumbs-up" id="st"></i></button></span>
							
							<?php  }else{ ?>
							
							
							<span id="prof_like"><button type="button" id="<?php echo $_GET['pid']; ?>"  class="btn btn-warning custom1 like"><?php echo $lang['like']; ?>  <i class="fa fa-thumbs-o-up" id="st"></i></button></span>
							
							
							<?php   } ?>
							<button type="button" id="btstyle" class="btn btn-warning custom2 "><?php echo $lang['comment']; ?>  <i class="fa fa-comments-o" id="st"></i></button>
							
							<?php  if($shared->num_rows() >= 1){  ?>
							
							<button type="button" id="btstyle1" class="btn btn-warning " ><?php echo $lang['shared']; ?> <i class="fa fa-share-alt" id="st"></i> </button>
							
							
							<?php  }else{ ?>
							
							<button type="button" id="btstyle" class="btn btn-warning custom3 share" ><?php echo $lang['share']; ?>  <i class="fa fa-share-alt" id="st"></i></button>
							
							
							<?php   } ?>

                        <input type="text" value="0" id="number_increment" style="display: none"/>
                        <input type="text" value="<?php echo $count;?>" id="tot_com" style="display: none"/>
                        
                       <button type="button" id="increment" class="btn btn-warning view_m_default" style="border-radius:0px;margin-top:5px;color:black;margin:1%;color:#EAE0E0;background:#C89C14; display:none" onclick="display_more_comments()">
                       <?php echo $lang['more_comments']; ?> <i class="fa fa-comments-o" id="st" ></i></button>
                       

                       
                        
							<!--privacy hide-->
								<div class="text_area" id="comment3">
									<div class="form-group" style="color: #fff;">
										<label for="comment" id="lab"><?php echo $lang['privacy']; ?></label>
										 <div class="radio">
											  <label><input type="radio" value="private" id="set_privacy" name="optradio"><?php echo $lang['private']; ?></label>
											</div>
											<div class="radio">
											  <label><input type="radio" value="public" id="set_privacy" name="optradio"><?php echo $lang['public']; ?></label>
										</div>
										<button type="button" id="btstyle" onclick="submit_share()" class="btn btn-warning custom5"><?php echo $lang['submit']; ?></button>
									</div>							
								</div>
							
							
							<!--/privacy hide-->						
							<div class="text_area" id="comment2">
								<div class="form-group">
									<label for="comment" id="lab"><?php echo $lang['comments']; ?>:</label>
									<form id="form_comment">
									<textarea class="form-control_post" rows="5" id="user_comment"></textarea>
									<button type="button" id="<?php echo $_GET['pid']; ?>" class="btn btn-warning custom4 comment"><?php echo $lang['submit']; ?> <i class="fa fa-external-link-square" id="st"></i></button></form>
								</div>
								
							</div>
							
					</div>			
				</div>
			</div>
		</div>
	</body>

	
<script>
$(document).ready(function(){
 $(document).on('click','button.comment',function() 
 {
	 var pid=$(this).attr('id');
	 var comment_user = $("#user_comment").val()
	 if(comment_user == "")
	{
		$("#user_comment").focus();
		
	}
	else
	{
	var user_comment = $("#user_comment").val();
	var uid = $(".user").attr('id');
	var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
	var cat=$(".category").attr('id');
	
	var act="COMMENT";
	var comment_count=parseInt($("#add_comment").html())+(1);
	
      if(user_comment!=''){
        $.ajax({
          url: "<?php base_url();?>activity?user_comment",
          type:"POST",
            data:{user_comment:user_comment,uid:uid,cid:cid,pid:pid,cat:cat,act:act}
        }).done(function( data ) {
                 $("#add_comment").html(comment_count);
                   $("#recent_comments").html(data);
                   
                   
                   
		 
        
		   $("#form_comment").trigger("reset");
		   $("#comment2").hide();
		   
		    //------------rohitdutta---------------

            $("#number_increment").val("0");

            var n = $("#tot_com");
            n.val(Number(n.val())+1);

            var inc1 = $("#tot_com").val();

            if(inc1 > 4)
            {
                
                $(".view_m_default").show()
               
            }
            //-----------------------------------
		  return true;
        });   
      } 
	  
	if(user_comment=='')
	  {
	   $("#user_comment").focus();
	  }
    }
 });
 });
  
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
		   $(".share").html(<?php echo $lang['shared']; ?>);
		  return true;
        });   

	  
	
    }
  
  </script>
	<script>
	$(document).ready(function(){
	$(document).on('click','button.like',function(){
	var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
	var pid=$(this).attr('id');
	var cat=$(".category").attr('id');
	var uid=$('.user').attr('id');
	var act="LIKE";
	var page="recentactivity";
        var likes=parseInt($("#add_like").html())+1;
        
	$.ajax({
          url: "<?php echo base_url();?>like?cid="+cid+"& catid="+pid+"& cat="+cat+"& act="+act+"& page="+page+"& uid="+uid
        }).done(function( data ) {
         $("#add_like").html(likes);
		  $("#prof_like").html('<span id="prof_unlike"><button type="button" id="'+pid+'" class="btn btn-warning custom1 unlike"><?php echo $lang['unlike']; ?> <i class="fa fa-thumbs-up" id="st"></i></button></span>');
		  return true;
        }); 
	
});
});

</script>
<script>
	$(document).ready(function(){
	$(document).on('click','button.unlike',function(){
	var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
	var pid=$(this).attr('id');
	var cat=$(".category").attr('id');
	var uid=$('.user').attr('id');
	var act="LIKE";
	var page="recentactivity";
	  var likes=parseInt($("#add_like").html())-1;
	$.ajax({
          url: "<?php echo base_url();?>like/unlike?cid="+cid+"& catid="+pid+"& cat="+cat+"& act="+act+"& page="+page+"& uid="+uid
        }).done(function( data ) {
       $("#add_like").html(likes);
		   $("#prof_unlike").html('<span id="prof_like"><button type="button" id="'+pid+'"  class="btn btn-warning custom1 like"><?php echo $lang['like']; ?>  <i class="fa fa-thumbs-o-up" id="st"></i></button></span>');
		  return true;
        }); 
	
});
});

</script>
 



<script>
function display_more_comments()
{

    
    
    var n = $("#number_increment");
    n.val(Number(n.val())+4);
    
    var inc=$("#number_increment").val();
    
    var pid="<?php echo $_GET['pid'];?>";
    var act="COMMENT";
    
    var dataString = "pid="+pid+"&act="+act+"&inc="+inc;

    
        $.ajax({
		            type: "GET",	 
		            url: "<?php echo base_url();?>activity/get_four_comments",           
		            data: dataString,
		            dataType: "text",
		            cache: false,
		             beforeSend: function()
		            {
				$("#increment").html("Loading...");								
			    },			    
		            success:function(data) 
		            {
				
		             $("#recent_comments").append(data);
		              
             		     $("#recent_comments").css("overflow-y: scroll; height: 300px");
             		     if(data == 0)
           			 {
               				 $(".view_m_default").hide()
               				                
           			 }
           	                 return true;		 
		               		
		            },
		            complete:function()
		            {		            			            	
		            	$("#increment").html("<?php echo $lang['more_comments']; ?>");		            	
		            }
		            
		        });    
}
if($("#add_comment").html() > 4)
{
	$(".view_m_default").show()
}
</script>

	
</html>