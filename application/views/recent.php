<input type="hidden" name="custID" id="custID" value="<?php
//print_r($this->session->all_userdata());
echo $this->session->userdata['profile_data'][0]['custID'];
?>">
<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function()
{
    
	$("#send_comment").click(function()
	{
        
	var url1 = "http://mahajyothis.net.dev/comment_c/post_comment";
						
	var comment_area = $("#comment_area").val();
	var custID = $("#custID").val();
	$.ajax
		({
			type:"POST",
			data:{comment_area:comment_area,custID:custID},
			dataType:"text",
			url: url1, 
			async:true,
			cache:false,
			success: function(result)
				{
					alert(result);
					
			    }
		});
    });
});
</script>
<html lang="en">
	<head>
		<meta charset='utf-8' />
		<link href="css/activity.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>
		
		$(document).ready(function(){
			$(".custom").click(function(){
			$("#comment2").slideToggle();
			});
		});
		
			</script>		
	</head>	
	<body>
		<div class="container1 center-block">
			<div class="hd1">
				<div class="total center-block" style="text-align:center;">
						<img class="profile_view" src="img/pro1.jpg" alt="User Profile">
						
					<div class="col_details">
						<h2 id="tex">Arjun Unni</h2>
						<h3 id="tex1">Sep-3-2015</h3>
						<h4 id="tex2">Lorem Ipsum </h4>
					</div>
					
				</div>
				
			</div>
			<div class=" middle">
				<div class="container2">
					<p id="inner_content">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
					</p>				
				</div>		
			</div>
			<div class="bottom">
				<div class="container2">
						<button type="button" class="btn btn-warning custom">like</button>
						<button id="comment" name="comment" type="button" class="btn btn-warning custom">comment</button>
						<button type="button" class="btn btn-warning custom">share</button>
						<div class="text_area" id="comment2">
							<div class="form-group">
							<label for="comment" id="lab">Comment:</label>
							<textarea id="comment_area" name="comment_area" class="form-control_post" rows="5" id="comment"></textarea>
							</div>
						</div>
						<input class="btn btn-warning" type="submit" name="send_comment" id="send_comment" value="send">
				</div>			
			</div>
		</div>
	</body>
	
</html>