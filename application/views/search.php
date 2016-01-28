 
 <script>
        function search_live()
            {

   var key=$("#mahajyothis_search").val();
	
            	$.ajax({
          url: "<?php echo base_url();?>search",
          type:"POST",
          data:{keyword:key}
        }).done(function( data ) {
       
		   $("#search_refresh").html(data);
		  return true;
        }); 
		
            }
 </script>
 
    <body >
	 <?php  $user_row = $this->session->userdata('profile_data');  ?>
			
		  <script src="..assets/js/overlay.js"></script>
    
    <script>
      $(document).ready(function() {
        $('.overlay').overlay();
      });
    </script>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
                         <div class="col-md-12">   <div class="row" id="search_refresh">
							  <?php  foreach ($langresult->result() as $search_row)
   {
    ?>
	               <div class="col-md-4 " >
							 
                                          <div class="row back-clr-lst">
                                            <div class="col-md-12 col-height ">
                                                        <div class="col-md-3">    
														
                                                         <div class="img-wrap-cls">	<a onclick="search<?php echo $search_row->custID;   ?>()" data-overlay-trigger="one<?php echo $search_row->custID;  ?>" href="#!">										
                                                            <img src="<?php echo ($search_row->photo && file_exists(UPLOADS.$search_row->photo)) ? base_url().UPLOADS.$search_row->photo : base_url().UPLOADS.'profile.png';?>" class="img-responsive  center-block img-wdth-cls img-scle" > 
																</a>															
																	</div>	
                                                            
                                                        </div>
                                                        <div class="col-md-9 rght-lst-blck">   
                                                        
                                                            <p><i class="fa fa-user nor-width1"> </i><span class="nor-width8"><?php echo $search_row->perdataFirstName."&nbsp".$search_row->perdataLastName;?></span></p>
                                                            <p><i class="fa fa-briefcase nor-width1"></i> <?php if(strlen($search_row->profQualification) > 13) echo substr($search_row->profQualification, 0,13).'...'; else echo $search_row->profQualification; ?></p>
                                                            <p><i class="fa fa-map-marker nor-width1"></i> <?php echo $search_row->addrState; ?></p>
														<input type="hidden" value="<?php echo $search_row->custID; ?>" id="uid<?php echo $search_row->custID; ?>">
														<?php
								 if(!empty($search_row->following)){
														?>
														
                                                        	 <div class="row"> <div class="col-md-12" > <button class="btn btn-warning" style="float:right; color:#000000" ><?php echo $lang['following']; ?><span style="padding-left: 15px;"><i class="fa fa-user-plus" style="color:grey"></i></span></button> </div></div>
								 <?php  }else{ ?>
															
 <div class="row"> <div class="col-md-12" ><span class="follow_change<?php echo $search_row->custID; ?>"> <button class="btn btn-warning following" style="float:right; color:#000000" id="<?php echo $search_row->custID; ?>"><?php echo $lang['follow']; ?><span style="padding-left: 15px;"><i class="fa fa-user-plus" style="color:grey"></i></span></button> </span></div></div>
								<?php  } ?>															
                                                        </div>			
                                            </div>
                                       </div>
                             </div>		 
			<div class="overlay" id="one<?php echo $search_row->custID;  ?>" onclick="search_live()">
      <div class="modal1">
	<div class="simp-cls"   data-overlay-trigger="one" onclick="$('#one<?php echo $search_row->custID;  ?>').trigger('hide');return false;" > <a href="#!" onclick="search_live()">x</a> </div>
	
	<div id="search<?php echo $search_row->custID;   ?>" style="height:100%;"></div>
	<script>
	function search<?php echo $search_row->custID; ?>(){
		document.getElementById("search<?php echo $search_row->custID;   ?>").innerHTML =" <iframe src='<?php echo base_url();?>basicprofile?uid=<?php echo $search_row->custID;  ?>' width='100%' height='100%' style='border: none;'></iframe>";
	}
     </script>
	
      </div>
    </div>			 
                              <?php  } ?>
                             </div>
						   
         </div>

    </body>
	<script>
	$(document).ready(function(){
		$("#following_menu").hide();
		$("#followers_menu").hide();
		$("#mynetwork_menu").show()
		
	});
	
	</script>
	 <script>
			 $(document).ready(function(){
			 $(document).on('click','button.following',function(){
                         var uid=$(this).attr('id'); 
                         var cuid= <?php echo $user_row[0]['custID']  ?>  ;

        $.ajax({
          url: "<?php base_url();?>following?uid="+uid+" && cuid="+cuid
        }).done(function( data ) {
        
		   $(".follow_change"+uid).html('<button class="btn btn-warning" style="float:right;color:#000000" ><?php echo $lang['following']; ?><span style="padding-left:15px"><i class="fa fa-user-plus" style="color:grey"></i></span></button>');
		  return true;
        });   
      
    });
    });
  
  </script>	 
	
</html>