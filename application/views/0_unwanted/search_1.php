 
    <body>
	 <?php  $user_row = $this->session->userdata('profile_data');  ?>
			<?php 
       
	  $user = $_GET['keyword'];
	  
				$langquery="SELECT * FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
			   
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) WHERE cm.`custName` LIKE '%$user%' AND pd.`custID`!='0' "; 
				
				
				
				
				
$langresult= $this->db->query($langquery);
	   
        
        ?>
		
		
		
                            <div class="col-md-12">  
							
                              <div class="row">
							  <?php  foreach ($langresult->result() as $search_row)
   {
	
    ?>
                              <div class="col-md-4 ">
							 
                                          <div class="row back-clr-lst">
                                            <div class="col-md-12 col-height ">
                                                        <div class="col-md-3">    
														
                                                          <a href="<?php base_url();?>basicprofile?uid=<?php echo $search_row->custID;  ?>"  onclick="window.open('<?php base_url();?>basicprofile?uid=<?php echo $search_row->custID;  ?>', 'newwindow', 'width=700px','height=500px'); return false;">  <img  src="uploads/<?php echo $search_row->photo;   ?>" class="img-responsive img-circle center-block">   </a>
                                                            <p style="padding-top: 5px;font-size: 75%;text-align: center; color:#EC971F; font-weight:bold"><span style="padding:5px">19</span>Circles</p>
                                                        </div>
                                                        <div class="col-md-9 rght-lst-blck">   
                                                        
                                                            <p><i class="fa fa-user nor-width1"> </i><span class="nor-width8"><?php echo $search_row->perdataFirstName."&nbsp".$search_row->perdataLastName;?></span></p>
                                                            <p><i class="fa fa-briefcase nor-width1"></i> <?php echo $search_row->profQualification; ?></p>
                                                            <p><i class="fa fa-map-marker nor-width1"></i> <?php echo $search_row->addrState; ?></p>
														<input type="hidden" value="<?php echo $search_row->custID; ?>" id="uid<?php echo $search_row->custID; ?>">
														<?php
                                 $follow_val="SELECT * FROM `userfollowing` WHERE `custID`=".$search_row->custID." AND `cID`=".$user_row['0']['custID']."  ";
								 $follow_rs= $this->db->query($follow_val);
								 if($follow_rs->num_rows() == 1){
														?>
														
                                                        	 <div class="row"> <div class="col-md-12" > <button class="btn btn-follow" style="float:right; color:#000000" >Following<span style="padding-left: 15px;"><i class="fa fa-user-plus" style="color:grey"></i></span></button> </div></div>
								 <?php  }else{ ?>
															
 <div class="row"> <div class="col-md-12" > <button class="btn btn-follow" id="status_change<?php echo $search_row->custID; ?>"  style="float:right; color:#000000" onclick="following<?php echo $search_row->custID; ?>()">Follow<span style="padding-left: 15px;"><i class="fa fa-user-plus" style="color:grey"></i></span></button> </div></div>
								


								 <?php  } ?>															
                                                        </div>
											
                                            </div>
                                         
                                       </div>
									   
                             </div>
							 
							
							 
							 <script>
 function following<?php echo $search_row->custID; ?>() {
      
	 var uid=$("#uid<?php echo $search_row->custID; ?>").val();     
	 
      var cuid= <?php echo $user_row[0]['custID']  ?>  ;

        $.ajax({
          url: "<?php base_url();?>following?uid="+uid+" && cuid="+cuid
        }).done(function( data ) {
          
		   $("#status_change<?php echo $search_row->custID; ?>").html("Following");
		  return true;
        });   
      
    }
  
  </script>
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
                              <?php  } ?>
                             </div>
						   
         </div>

    </body>
</html>