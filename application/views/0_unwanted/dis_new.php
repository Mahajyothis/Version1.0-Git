<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset='utf-8' />
  	 <link rel="stylesheet" href="<?php echo base_url('assets/disu/coms.css');?>" type="text/css">
		

		
		 <script>
		
		$(document).ready(function(){
			$("#btn3_dis").click(function(){
			$("#hide1_dis").slideToggle("slow");
			$("#hide2_dis,#hide3_dis").hide("slow");
			});
			$("#btn6_dis").click(function(){
			$("#hide2_dis").slideToggle("slow");
			$("#hide1_dis,#hide3_dis").hide("slow");
			});
			$("#btn9_dis").click(function(){
			$("#hide3_dis").slideToggle("slow");
			$("#hide2_dis,#hide1_dis").hide("slow");
			});
			
		});
		
			</script>
		
	</head>
	
	<body id="bd_dis">
			<input type="radio" id="r2" name="a">
	
	
	
	
	 <div class="fix fix-2" style="overflow-y:scroll; background-color: #E8437F;color:#000;">
	<!--total-->
	<div class="col-md-12 header_post">
			<h5 id="title_post">Postings Page</h5>
			<div class="btn-group" role="group" aria-label="..." style="float: right; margin-top: -1.8%;">
			
			<button type="button"  id="controls" class="btn btn-default">
			<i class="fa fa-close"></i></button>
			</div>
			
		</div>
		<div class="col-md-12" id="total_dis">
			<!--aside-->
			<div class="col-md-2">
			  
			</div>
			<!--comments-->
			<div class="col-md-10" id="total1_dis">
		<div class="col-md-12" id="outer1_dis">
			<div class="col-md-12" id="head_disc1">
				<div class="col-md-2" id="name_dis"><h4>Jhon Helenskey</h4></div>
				<div class="col-md-8" id="date_dis"><h4>Posted 13 March 2015 - 04:19 PM</h4></div>
				<div class="col-md-2" id="response_dis"><h4>#1</h4> </div>			
			</div>
			<!--inner1-->
				<div class="col-md-12" id="comment1_dis">
				<!--image-->
					<div class="col-md-2" >
						<img id="image_dis" src="img/111.png" width="70%;">
					</div>
					<!--message-->
					<div class="col-md-10">
						<div class="col-md-12">
							<p id="para_dis">
							
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting
							
							</p>
						</div>
						<div class="col-md-12" id="buttons_dis" style="color:#000">
								
								
										<button type="button" class="btn" id="btn1_dis"><span class="fa fa-eye i-clr" aria-hidden="true"></span> (10)</button>								
								
										<button type="button" class="btn" id="btn2_dis"><span class="fa fa-thumbs-up  i-clr" aria-hidden="true"></span> (52)</button>
								
										<button type="button"  class="btn " id="btn3_dis"><span class="fa fa-share-alt  i-clr" aria-hidden="true" ></span> (50)</button>
								
						</div>
					</div>
					<!--hide page 1-->
								<div class="col-md-12" id="hide1_dis" style="display:none;">
								
							<div class="col-md-12" id="comment2_dis" style="width: 46%;margin-left: 33%;">
								<div class="form-group">
									<label for="comment">Comment:</label>
									<textarea class="form-control_dis" rows="5" id="comment_dis"></textarea>
								</div>
							</div>
								
								</div>
								
					<!--hide page 1 end-->	
					
				</div>
			</div><!--outer-->
				<div class="col-md-12" id="outer2_dis">
					<div class="col-md-12" id="head_disc2">
						<div class="col-md-2" id="name_dis"><h4>Jhon Helenskey</h4></div>
						<div class="col-md-8" id="date_dis"><h4>Posted 13 March 2015 - 04:19 PM</h4></div>
						<div class="col-md-2" id="response_dis"><h4>#1</h4> </div>		
			
					</div>
				<!--inner2-->
				<div class="col-md-12" id="comment2_dis">
				<!--image-->
					<div class="col-md-2">
						<img id="image_dis" src="img/111.png" width="70%">
					</div>
					<!--message-->
					<div class="col-md-10">
						<div class="col-md-12">
							<p id="para_dis">
							
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting
							
							</p>
						</div>
						<div class="col-md-12"id="buttons_dis">
								
										<button type="button" class="btn" id="btn4_dis"><span class="fa fa-eye  i-clr" aria-hidden="true"></span> (10)</button>
								
										<button type="button" class="btn " id="btn5_dis"><span class="fa fa-thumbs-up  i-clr" aria-hidden="true"></span> (52)</button>
								
										<button type="button" class="btn" id="btn6_dis"><span class="fa fa-share-alt  i-clr" aria-hidden="true"></span> (56)</button>
								  
						</div>
					</div>
					
					<!--hide page 1-->
								<div class="col-md-12" id="hide2_dis" style="display:none;">
								
									<div class="col-md-12" id="comment2_dis" style="width: 46%;margin-left: 33%;">
										<div class="form-group">
											<label for="comment">Comment:</label>
											<textarea class="form-control_dis" rows="5" id="comment"></textarea>
										</div>
									</div>
								
								</div>
								
					<!--hide page 1 end-->	
				</div>
			</div>	
				
				<!--inner3-->
			<div class="col-md-12" id="outer3_dis">
					<div class="col-md-12" id="head_disc3">
					
							<div class="col-md-2" id="name_dis"><h4>Jhon Helenskey</h4></div>
							<div class="col-md-8" id="date_dis"><h4>Posted 13 March 2015 - 04:19 PM</h4></div>
							<div class="col-md-2" id="response_dis"><h4>#1</span></h4> </div>
							
					</div>
				<div class="col-md-12" id="comment3_dis">
				<!--image-->
					<div class="col-md-2">
						<img id="image_dis" src="img/111.png" width="70%" >
					</div>
					<!--message-->
					<div class="col-md-10">
						<div class="col-md-12">
							<p id="para_dis">
							
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettingfive centuries, but also the leap 
							
							</p>
						</div>
						<div class="col-md-12" id="buttons_dis">
								
								
										<button type="button" class="btn " id="btn7_dis"><span class="fa fa-eye i-clr" aria-hidden="true"></span> (10)</button>
								
										<button type="button" class="btn" id="btn8_dis"><span class="fa fa-thumbs-up i-clr" aria-hidden="true"></span> (52)</button>
								
										<button type="button" class="btn" id="btn9_dis"><span class="fa fa-share-alt i-clr" aria-hidden="true"></span> (56)</button>
								
						</div>
					</div>
					<!--hide page 1-->
								<div class="col-md-12" id="hide3_dis" style="display:none;">
								
									<div class="col-md-12" id="comment2_dis" style="width: 46%;margin-left: 33%;">
										<div class="form-group">
											<label for="comment">Comment:</label>
											<textarea class="form-control_dis" rows="5" id="comment"></textarea>
										</div>
									</div>
								
								</div>
								
					<!--hide page 1 end-->	
				
				</div>
			</div>
		
			</div>
		</div>
	</div>
	</body>
	
</html>