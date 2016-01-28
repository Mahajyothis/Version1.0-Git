 <!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
       <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
        <title><?php echo $lang['title']; ?></title>
        
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="../assets/css/jquery.autocomplete.css" />
   		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
      <link rel="stylesheet" href="../assets/css/mystyle_search.css">
  
     <script type="text/javascript" src="assets/js/jquery.marquee.js"></script>
<script type="text/javascript" src="../assets/js/jquery.autocomplete.js"></script>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js" type="text/javascript"></script>	
<script src="<?php echo base_url(); ?>assets/js/overlay.js" type="text/javascript"></script>
<link rel="stylesheet" href="../assets/css/overlay.css">
<script type="text/javascript" src="../assets/js/jquery.custom-scrollbar.js"></script>
<link rel="stylesheet" href="../assets/css/jquery.custom-scrollbar.css">

		</style>
		<script type="text/javascript">
    $(window).load(function () {
        $(".lft-cat-pan").customScrollbar();
    });
</script>
		 <script>
      $(document).ready(function() {
        $('.overlay').overlay();
      });
    </script>
	<style>
	.a_links_all,.lst-cat-mnu{
		color:#ffffff;
	}
	.borded-box{
		background-color: #282924;
	}
	.pencil,.lst-cat-icn{
		color:#DA960F;
	}
	.no-padding{
		padding-left:0px;
		padding-right:0px;
	}
	</style>
    </head>
    <body style="background:url('../assets/img/network-bg.jpg');background-attachment: fixed;background-position: center">
	 
	<?php  $user_row = $this->session->userdata('profile_data');  ?>
  <div class="col-sm-12 header_list navbar-fixed-top" style="z-index:9">
		<div class="col-sm-8 serch lst-nor-width7">
			
                <div class="input-group" id="grp">
                    <input type="text" id="mahajyothis_search" class="form-control" placeholder="<?php echo $lang['search']; ?>....." name="q">
                    <div class="input-group-btn" style="z-index: 9;">
                        <button class="btn btn-default" id="btn_serch" onClick="keyword_find()" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
           		
		</div>
		<div class="col-sm-2 profile  lst-nor-width3" style="z-index:9">
				<div class="pull-right">
			<a href="user/<?php echo $user_row['0']['custName'];   ?>"><img id="pro" src="<?php echo ($user_row['0']['photo'] && file_exists(UPLOADS.$user_row['0']['photo'])) ? base_url().UPLOADS.$user_row['0']['photo'] : base_url().UPLOADS.'profile.png';?>">
			<span class="usr-nme"><?php echo $user_row['0']['perdataFullName'];   ?></span></a>
			</div>
		</div>
		<div class="col-sm-2 log  lst-nor-width2" style="z-index:9">
			<a href="<?php echo base_url();?>logout"><button type="button" class="btn btn-warning btnn"><?php echo $lang['logout']; ?></button>		</a>
		</div>
	</div>
	<div class="col-md-12 toppad " style="padding-left:0; padding-right:0; ">
		<div class="col-md-2 lft-cat-pan default-skin"  id="default-skin-demo" style="min-height:100vh;" >
			<div class="col-md-12" style="padding:0">
        	<ul class="cat-mnu" style="clear:both">
            	<li class="lst-cls1" id="following_menu" onclick="following_change()"><span class="lst-cat-mnu"><?php echo $lang['following']; ?>(<?php echo $totalfollowings[0]['totalfollowings'];  ?>)</span><span class="lst-cat-icn"><i class="fa fa-gear"></i></span>
				</li>
				<li class="lst-cls1" id="followers_menu" onclick="follower_change()"><span class="lst-cat-mnu"><?php echo $lang['followers']; ?>(<?php echo $totalfollowers[0]['totalfollowers'];  ?>)</span><span class="lst-cat-icn"><i class="fa fa-gear"></i></span>
				</li>
				<li class="lst-cls1" id="mynetwork_menu" style="display:none;"><a href="<?php echo base_url(); ?>networks"><span class="lst-cat-mnu"><?php echo $lang['my_networks']; ?>(<?php echo $totalcircles[0]['totalnetworks'];  ?>)</span><span class="lst-cat-icn"><i class="fa fa-gear"></i></span></a>
				</li>
            </ul>
			</div>
			<div class="col-md-12 borded-box ">
				<div class=" col-md-12"><span  class="pan-ttle"><?php echo $lang['groups']; ?></span><span class="ihvr"><i class="fa fa-pencil-square pencil"></i></span></div>
			
        	<ul class="cat-mnu" style="clear:both">
           	
         <?php foreach($total_groups as $total){?>
         <li><a href="<?php echo base_url().'Groups';?>"><?php echo $total->grp_name;?></a></li>
        <?php }?>
        </ul>
			</div>
			<h5 style="text-align:center; color: #fff;"><?php echo $lang['people_know']; ?></h5>
			<div class="col-md-12 borded-box1 no-padding" style="height:237px;">
				
        	<!--<ul class="cat-mnu"  id="marquee-vertical" style="clear:both;width: 100%;" >-->
			
			<?php foreach($people_you_may_now as $new_members){
			
			?>
          <a href="<?php echo base_url(); ?>basicprofile?uid=<?php echo $new_members->custID; ?>">
			<li class="lst-cls1"><span class="col-sm-2 lst-nr-width2-grp" style="padding:0"> <img src="
			<?php echo ($new_members->photo && file_exists(UPLOADS.$new_members->photo)) ? base_url().UPLOADS.$new_members->photo : base_url().UPLOADS.'profile.png';?>" class="img-responsive img-circle"></span><span class="col-sm-10 lst-nr-width10-grp"  style="padding:0; padding-left:6px"> <?php echo $new_members->perdataFirstName." ".$new_members->perdataLastName; ?></span>
				</li>
				</a>
				
		  <div class="overlay" id="people<?php echo $new_members->custID;  ?>" >
      <div class="modal1">
	<div class="simp-cls"  data-overlay-trigger="people" onclick="$('#people<?php echo $new_members->custID;  ?>').trigger('hide');return false;"> <a href="#!"   >x</a> </div>
	
	
	
	<div id="know<?php echo $new_members->custID;   ?>" style="height:100%;"></div>
	<script>
	function know<?php echo $new_members->custID; ?>(){
		document.getElementById("know<?php echo $new_members->custID;   ?>").innerHTML ="   <iframe src='<?php echo base_url();?>basicprofile?uid=<?php echo $new_members->custID;  ?>' width='100%' height='100%' style='border: none;'></iframe>";
	}
     </script>
      </div>
    </div>		
				<?php } ?>
            </ul>
			</div>
        </div>
    <div>
        </div>
		<script>
		$(document).ready(function () {
		$("#mahajyothis_search").autocomplete("<?php echo base_url(); ?>networks/network_members", {
        selectFirst: true
  });
 });
</script>
            <div class="col-md-10 col-md-offset-2" style="z-index:0">  
                              <div class="row"  id="search_result">
                             
							  <div id="following">
							   <?php  foreach ($langresult->result() as $search_row)
   {
	    ?>
                              <div class="col-md-4" style="z-index:0">
                                         <div class="row back-clr-lst">
                                            <div class="col-md-12 col-height ">
                                                        <div class="col-md-3 "> 
																<div class="img-wrap-cls">	<a onclick="network<?php echo $search_row->custID;   ?>()" data-overlay-trigger="one<?php echo $search_row->custID;  ?>" href="#!">										
                                                            <img src="<?php echo ($search_row->photo && file_exists(UPLOADS.$search_row->photo)) ? base_url().UPLOADS.$search_row->photo : base_url().UPLOADS.'profile.png';?>
                                                           " class="img-responsive  center-block img-wdth-cls img-scle" > 
																</a>															
																	</div>										
                                                        <!--    <p style="padding-top: 5px;font-size: 75%;text-align: center; color:#EC971F; font-weight:bold"><span style="padding:5px"><?php  echo $totalcircles[0]['totalcircles'];  ?></span>Circles</p>-->
                                                        </div>
                                                        <div class="col-md-9 rght-lst-blck">   
                                                        <div class="row">
															<div class="col-md-12">
                                                            <p><i class="fa fa-user nor-width1"> </i><span class="nor-width8"><?php echo $search_row->perdataFirstName."&nbsp".$search_row->perdataLastName;?></span></p>
                                                            <p><i class="fa fa-briefcase nor-width1"></i> <?php echo $search_row->profQualification; ?></p>
                                                            <p><i class="fa fa-map-marker nor-width1"></i> <?php echo $search_row->addrState; ?></p>
                                                            
                                                            <?php if($search_row->is_online == 1)
                                                            {?>
                                                            <p style="color:green;"><i class="fa fa-circle"></i>&nbsp;&nbsp;&nbsp;Online</p>
                                                            <?php } else { ?>
									 <p style="color:red;"><i class="fa fa-circle"></i>&nbsp;&nbsp;&nbsp;Offline</p>
									 <?php } ?>					</div>
														</div>
                                                        	 <div class="row"> 
																 <div class="col-md-12" id="status<?php echo $search_row->custID; ?>"> 
																	 <select class="btn btn-warning" id="network_change<?php echo $search_row->custID; ?>"  style="float:right; color:#000000">
																		<option selected disabled><?php echo $lang['following']; ?></option>
																		<option value="unfollow" name="<?php echo $lang['unfollow']; ?>"><?php echo $lang['unfollow']; ?></option>
																		<option value="block" title="<?php echo $lang['block']; ?>"><?php echo $lang['block']; ?></option>
																	 </select>
																	
																 </div>
															 </div>
                                                        </div> </div> </div>
                             </div>
                              <script>
  $(document).ready(function(){
    $("#network_change<?php echo $search_row->custID; ?>").change(function(){
         var cuid=<?php echo $user_row[0]['custID'];  ?>;
		 var uid=<?php echo $search_row->custID;  ?>;
		 var status=$("#network_change<?php echo $search_row->custID; ?>").val();
		   
			$.ajax({
          url: "<?php base_url();?>following?uid="+uid+"&status="+status+"&cuid="+cuid
        }).done(function( data ) {
       if(status=='unfollow') var nstatus = "<?php echo $lang['unfollow']; ?>";
       else var nstatus = "<?php echo $lang['block']; ?>";
		   $("#status<?php echo $search_row->custID; ?>").html("<button class='btn btn-warning pull-right' style='color:#000;height: 32px;' >"+nstatus+"</button>");
		  return true;
        }); 
    });
});
  
  </script>
  
  <div class="overlay" id="one<?php echo $search_row->custID;  ?>" >
      <div class="modal1">
	<div class="simp-cls"  data-overlay-trigger="one" onclick="$('#one<?php echo $search_row->custID;  ?>').trigger('hide');return false;"> <a href="#!"   >x</a> </div>
	
	<div id="network<?php echo $search_row->custID;   ?>" style="height:100%;"></div>
	<script>
	function network<?php echo $search_row->custID; ?>(){
		document.getElementById("network<?php echo $search_row->custID;   ?>").innerHTML ="   <iframe src='<?php echo base_url();?>basicprofile?uid=<?php echo $search_row->custID;  ?>' width='100%' height='100%' style='border: none;'></iframe>";
	}
     </script>
      </div>
    </div>
							  <?php  } ?>
							 
                             </div>
						   
<div id="followers" style="display:none;">
							   <?php  foreach ($followerlist->result() as $followers_row)
   {
	    ?>
                              <div class="col-md-4" style="z-index:0;">
                                         <div class="row back-clr-lst">
                                            <div class="col-md-12 col-height ">
                                                        <div class="col-md-3"> 
																<div class="img-wrap-cls">	<a onclick="followers<?php echo $followers_row->cID;   ?>()" data-overlay-trigger="one<?php echo $followers_row->cID;  ?>" href="#!">										
                                                            <img src="<?php echo ($followers_row->photo && file_exists(UPLOADS.$followers_row->photo)) ? base_url().UPLOADS.$followers_row->photo : base_url().UPLOADS.'profile.png';?>" class="img-responsive  center-block img-wdth-cls img-scle" > 
																</a>															
																	</div>										
                                                        <!--    <p style="padding-top: 5px;font-size: 75%;text-align: center; color:#EC971F; font-weight:bold"><span style="padding:5px"><?php  echo $totalcircles[0]['totalcircles'];  ?></span>Circles</p>-->
                                                        </div>
                                                        <div class="col-md-9 rght-lst-blck">   
                                                        <div class="row">
															<div class="col-md-12">
                                                            <p><i class="fa fa-user nor-width1"> </i><span class="nor-width8"><?php echo $followers_row->perdataFirstName."&nbsp".$followers_row->perdataLastName;?></span></p>
                                                            <p><i class="fa fa-briefcase nor-width1"></i> <?php echo $followers_row->profQualification; ?></p>
                                                            <p><i class="fa fa-map-marker nor-width1"></i> <?php echo $followers_row->addrState; ?></p>
                                                            
                                                            <?php if($followers_row->is_online == 1)
                                                            {?>
                                                            <p style="color:green;"><i class="fa fa-circle"></i>&nbsp;&nbsp;&nbsp;Online</p>
                                                            <?php } else { ?>
									 <p style="color:red;"><i class="fa fa-circle"></i>&nbsp;&nbsp;&nbsp;Offline</p>
									 <?php } ?>	
                                                            
                                                            
                                                            
														</div>
														</div>
                                                        	 <div class="row"> 
																 <div class="col-md-12" id="status_u<?php echo $followers_row->cID; ?>"> 
																	 <select class="btn btn-warning" id="network_change_un<?php echo $followers_row->cID; ?>"  style="float:right; color:#000000">
																		<option selected disabled><?php echo $lang['follower']; ?></option>
																		<option value="unfollow"><?php echo $lang['unfollow']; ?></option>
																		<option value="block"><?php echo $lang['block']; ?></option>
																	 </select>
																	
																 </div>
															 </div>
                                                        </div>
                                                
                                            </div>
                                         
                                       </div>
                             </div>
                              <script>
  $(document).ready(function(){
    $("#network_change<?php echo $followers_row->custID; ?>").change(function(){
         var cuid=<?php echo $user_row[0]['custID'];  ?>;
		 var uid=<?php echo $followers_row->custID;  ?>;
		 var status=$("#network_change<?php echo $followers_row->custID; ?>").val();
		 
			$.ajax({
          url: "<?php base_url();?>following?uid="+uid+"&status="+status+"&cuid="+cuid
        }).done(function( data ) {
      if(status=='unfollow') var nstatus = "<?php echo $lang['unfollow']; ?>";
       else var nstatus = "<?php echo $lang['block']; ?>";
		   $("#status<?php echo $followers_row->custID; ?>").html("<button class='btn btn-warning pull-right' style='color:#000;height: 32px;' >"+nstatus +"</button>");
		  return true;
        }); 
    });
});
  
  </script>
  
  <script>
  $(document).ready(function(){
    $("#network_change_un<?php echo $followers_row->cID; ?>").change(function(){
         var uid=<?php echo $user_row[0]['custID'];  ?>;
		 var cid=<?php echo $followers_row->cID;  ?>;
		 var status=$("#network_change_un<?php echo $followers_row->cID; ?>").val();
		 
			$.ajax({
          url: "<?php base_url();?>following?uid="+uid+"&status="+status+"&cuid="+cid
        }).done(function( data ) {
              if(status=='unfollow') var nstatus = "<?php echo $lang['unfollow']; ?>";
       else var nstatus = "<?php echo $lang['block']; ?>";
	 	   $("#status_u<?php echo $followers_row->cID; ?>").html("<button class='btn btn-warning pull-right' style='color:#000;height: 32px;' >"+nstatus+"</button>");
		  return true;
        }); 
		  });
});
  
  </script>
  
  <div class="overlay" id="one<?php echo $followers_row->custID;  ?>" >
      <div class="modal1">
	<div class="simp-cls"  data-overlay-trigger="one" onclick="$('#one<?php echo $followers_row->custID;  ?>').trigger('hide');return false;"> <a href="#!"   >x</a> </div>
	
	<div id="followers<?php echo $followers_row->custID;   ?>" style="height:100%;"></div>
	<script>
	function followers<?php echo $followers_row->custID; ?>(){
		document.getElementById("followers<?php echo $followers_row->custID;   ?>").innerHTML ="   <iframe src='<?php echo base_url();?>basicprofile?uid=<?php echo $followers_row->custID;  ?>&cid=<?php echo $followers_row->cID;  ?>&network=follower' width='100%' height='100%' style='border: none;'></iframe>";
	}
     </script>
	
      </div>
    </div>
    <?php  } ?>
					
</div></div>
</div>
    </body>
	<script>
	function following_change(){
		document.getElementById("followers").style.display="none";
		
		document.getElementById("following").style.display="initial";
	}
	function follower_change(){
		document.getElementById("following").style.display="none";
		
		document.getElementById("followers").style.display="initial";
	}
	
	</script>
	<script>
 function keyword_find() {
      
	 var keyword=$("#mahajyothis_search").val();  
 
 
      if(keyword!=''){
		
        $.ajax({
          type:'POST',
          url: '<?php echo base_url(); ?>search',
           data:{keyword:keyword}
        }).done(function(result) {
        
		   $("#search_result").html(result);
		  return true;
        });   
      } 
	  
	if(keyword=='')
	  {
	   $("#search_result").html("<div style='color:white;font-weight:bold'><?php echo $lang['please_enter']; ?> !...</div>");
	   return false;
	  }
    }
  
  </script>
 	  <script type="text/javascript">
    $(function(){
  $('#marquee-vertical').marquee();  
 });
</script>
</html>