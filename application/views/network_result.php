 <?php 
 

 $search_result="";
		    foreach ($langresult->result() as $search_row){
		   
		  $search_result.= "
		   <div class='col-md-4 ' >
		   <div class='row back-clr-lst'>
                                            <div class='col-md-12 col-height '>
                                                        <div class='col-md-3'>    
								               <div class='img-wrap-cls'>	<a onclick='search".$search_row->custID."()' data-overlay-trigger='one".$search_row->custID."' href='#!'>	";									
                                                          
															if(ISSET($search_row->photo)){
																 $search_result.= "<img src='uploads/".$search_row->photo."' class='img-responsive  center-block img-wdth-cls img-scle' >";}
																else{ $search_result.= "<img src='uploads/profile.png' class='img-responsive  center-block img-wdth-cls img-scle' >";}   
															
															
															 $search_result.= "</a>															
																	</div>	
                                                            <p style='padding-top: 5px;font-size: 75%;text-align: center; color:#EC971F; font-weight:bold'><span style='padding:5px'>19</span>Circles</p>
                                                        </div>
                                                        <div class='col-md-9 rght-lst-blck'>   
                                                        
                                                            <p><i class='fa fa-user nor-width1'> </i><span class='nor-width8'>".$search_row->perdataFirstName."&nbsp".$search_row->perdataLastName."</span></p>
                                                            <p><i class='fa fa-briefcase nor-width1'></i> ".$search_row->profQualification."</p>
                                                            <p><i class='fa fa-map-marker nor-width1'></i>".$search_row->addrState."</p>
														<input type='hidden' value='".$search_row->custID."' id='uid".$search_row->custID."'>";
														
                                 $follow_val="SELECT * FROM `userfollowing` WHERE `custID`=".$search_row->custID." AND `cID`=".$user_row['0']['custID']."  ";
								 $follow_rs= $this->db->query($follow_val);
								 if($follow_rs->num_rows() == 1){
														
														
                                                   $search_result.=  "<div class='row'> <div class='col-md-12' > <button class='btn btn-warning' style='float:right; color:#000000' >".$lang['following']."<span style='padding-left: 15px;'><i class='fa fa-user-plus' style='color:grey'></i></span></button> </div></div>";
								   }else{
															
  $search_result.= "<div class='row'> <div class='col-md-12' ><span id='follow_change".$search_row->custID."'> <button class='btn btn-warning' id='status_change".$search_row->custID."'  style='float:right; color:#000000' onclick='following".$search_row->custID."()'>".$lang['follow']."<span style='padding-left: 15px;'><i class='fa fa-user-plus' style='color:grey'></i></span></button> </span></div></div>";
								


								  } 												
                                                   $search_result.=  "  </div>
											
                                            </div>
                                         
                                       </div></div>";
		   
		   $search_result.= "
  <script>
      $(document).ready(function() {
        $('.overlay').overlay();
      });
    </script>
				 <script>
       
        function search_live()
            {

   var key=$('#mahajyothis_search').val();
	
            	$.ajax({
          url: '".base_url()."search/search_liveupdate?keyword='+key
        }).done(function( data ) {
       
		   $('#search_refresh').html(data);
		  return true;
        }); 
		
		
		
		
		
		
            }
 </script>			 
		<div class='overlay' id='one".$search_row->custID."' onclick='search_live()'>
      <div class='modal1'>
	<div class='simp-cls'   data-overlay-trigger='one' onclick=$('#one".$search_row->custID."').trigger('hide');return false; > <a href='#!' onclick='search_live()' >x</a> </div>
	
	<div id='search".$search_row->custID."' style='height:100%;'></div>
	<script>
	function search".$search_row->custID."(){
		document.getElementById('search".$search_row->custID."').innerHTML =<iframe src='".base_url()."basicprofile?uid=".$search_row->custID."' width='100%' height='100%' style='border: none;'></iframe>;
	}
     </script>
	
	 
	 
      </div>
    </div>		</div>		 ";
		   
		    $search_result.= "<script src='".base_url()."assets/js/overlay.js'></script>";		   
		   
		   
	   }
	   
	   echo $search_result;
	   
	   exit;
	   ?>