 <!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Listing Page</title>
        
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
   		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
      <link rel="stylesheet" href="../assets/css/mystyle.css">
    
     
<script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<style>
		
		</style>
    </head>
    <body>
	<?php  $user_row = $this->session->userdata('profile_data');  ?>
  <div class="col-sm-12 header_list">
		<div class="col-sm-7 serch lst-nor-width7">
			<form class="navbar-form" role="search">
                <div class="input-group" id="grp">
                    <input type="text" id="mahajyothis_search" class="form-control" placeholder="Search....." name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-default" id="btn_serch" onclick="keyword_find()" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>		
		</div>
		<div class="col-sm-3 profile  lst-nor-width3" style="z-index:9">
				<div class="pull-right">
			<img id="pro" src="uploads/<?php echo $user_row['0']['photo'];   ?>">
			<span class="usr-nme"><?php echo $user_row['0']['custName'];   ?></span>
			</div>
		</div>
		<div class="col-sm-2 log  lst-nor-width2" style="z-index:9">
			<a href="<?php echo base_url();?>logout"><button type="button" class="btn btn-warning btnn">Logout</button>		</a>
		</div>
	</div>
	<div class="col-md-12" style="padding-left:0; padding-right:0">
		<div class="col-md-2 lft-cat-pan" style="min-height:100vh" >
			<div class="col-md-12" style="padding:0">
        	<ul class="cat-mnu" style="clear:both">
            	<li class="lst-cls1"><a href="<?php echo base_url();?>networks"><span class="lst-cat-mnu">My Networks</span><span class="lst-cat-icn"><i class="fa fa-gear"></i></span></a>
				</li>
				<li class="lst-cls1"><span class="lst-cat-mnu">lorum ipsum lorum ipsum</span><span class="lst-cat-icn"><i class="fa fa-gear"></i></span>
				</li>
				<li class="lst-cls1"><span class="lst-cat-mnu">lorum ipsum lorum ipsum</span><span class="lst-cat-icn"><i class="fa fa-gear"></i></span>
				</li>
            </ul>
			</div>
			<div class="col-md-12 borded-box">
				<div class=" col-md-12"><span  class="pan-ttle">Groups</span><span class="ihvr"><i class="fa fa-pencil-square"></i></span></div>
        	<ul class="cat-mnu" style="clear:both">
            	<li class="lst-cls1"><span class="col-sm-2 lst-nr-width2-grp" style="padding:0"> <img src="img/profile.jpg" class="img-responsive"></span><span class="col-sm-10 lst-nr-width10-grp"  style="padding:0; padding-left:6px"> lorum <span style="color:#EF580D; font-weight:bold">ipsum</span> lorum lorum ipsum</span>
				</li>
				<li class="lst-cls1"><span class="col-sm-2 lst-nr-width2-grp" style="padding:0"> <img src="img/profile.jpg" class="img-responsive"></span><span class="col-sm-10 lst-nr-width10-grp"  style="padding:0; padding-left:6px"> lorum <span style="color:#EF580D; font-weight:bold">ipsum</span> lorum lorum ipsum</span>
				</li>
				<li class="lst-cls1"><span class="col-sm-2 lst-nr-width2-grp" style="padding:0"> <img src="img/profile.jpg" class="img-responsive"></span><span class="col-sm-10 lst-nr-width10-grp"  style="padding:0; padding-left:6px"> lorum <span style="color:#EF580D; font-weight:bold">ipsum</span> lorum lorum ipsum</span>
				</li>
            </ul>
			</div>
			<div class="col-md-12 borded-box" >
				<h3 style="text-align:center">Recent Updates</h3>
        	<ul class="cat-mnu" style="clear:both">
            	<li class="lst-cls1"><span class="col-sm-2 lst-nr-width2-grp" style="padding:0"> <img src="img/profile.jpg" class="img-responsive img-circle"></span><span class="col-sm-10 lst-nr-width10-grp"  style="padding:0; padding-left:6px"> lorum <span style="color:#EF580D; font-weight:bold">ipsum</span> lorum lorum ipsum</span>
				</li>
				<li class="lst-cls1"><span class="col-sm-2 lst-nr-width2-grp" style="padding:0"> <img src="img/profile.jpg" class="img-responsive img-circle"></span><span class="col-sm-10 lst-nr-width10-grp"  style="padding:0; padding-left:6px"> lorum <span style="color:#EF580D; font-weight:bold">ipsum</span> lorum lorum ipsum</span>
				</li>
				<li class="lst-cls1"><span class="col-sm-2 lst-nr-width2-grp" style="padding:0"> <img src="img/profile.jpg" class="img-responsive img-circle"></span><span class="col-sm-10 lst-nr-width10-grp"  style="padding:0; padding-left:6px"> lorum <span style="color:#EF580D; font-weight:bold">ipsum</span> lorum lorum ipsum</span>
				</li>
            </ul>
			</div>
        </div>
		<?php 
       
	
	   
	   
  
	   
	   
	   
				$langquery="SELECT * FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`)
				LEFT JOIN `userfollowing` as ufg ON(ufg.`custID`=cm.`custID`)
				
				WHERE ufg.`cID`=".$user_row[0]['custID'].""; 
				
				
				
				
				
$langresult= $this->db->query($langquery);
	   
        
        ?>
		
		<script>


     $(document).ready(function () {

  $("#mahajyothis_search").autocomplete("../classes/auto.php", {

        selectFirst: true
  });
 });

</script>
                       <div class="col-md-10">  
                              <div class="row"  id="search_result">
							  
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
														
                                                        	 <div class="row"> <div class="col-md-12" > <button class="btn btn-follow"  style="float:right; color:#000000">Following<span style="padding-left: 15px;"><i class="fa fa-user-plus" style="color:grey"></i></span></button> </div></div>
                                                        </div>
                                                
                                            </div>
                                         
                                       </div>
                             </div>
                             
							  <?php  } ?>
							 
							 
							 
						  
                             </div>
						   
         </div>
</div>
    </body>
	<script>
 function keyword_find() {
      
	 var keyword=$("#mahajyothis_search").val();  
 
 
      if(keyword!=''){
		
        $.ajax({
          url: "http://mahajyothis.net.dev/search?keyword="+keyword
        }).done(function( data ) {
        
		   $("#search_result").load("http://mahajyothis.net.dev/search?keyword="+keyword);
		  return true;
        });   
      } 
	  
	if(keyword=='')
	  {
	   $("#search_result").html("Please Enter Search Value");
	   return false;
	  }
    }
  
  </script>
</html>