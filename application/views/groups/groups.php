<!doctype html>
<html lang="en">
    <head>       
        <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
        <title>.:: Mahajyothis groups ::.</title>
        
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

		  
          <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
		
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
		
		
		<link href="<?php echo base_url('assets/grouppage/css/overlay.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/grouppage/css/style.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/grouppage/css/style-groups.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/grouppage/css/bootstrap-cols.css');?>" rel="stylesheet">
 
     
         <script src="<?php echo base_url('assets/grouppage/js/jquery.isotope.min.js');?>" type="text/javascript"></script> <!-- jQuery Library -->
         <script src="<?php echo base_url('assets/grouppage/js/jquery.mousewheel.js');?>" type="text/javascript"></script> <!-- jQuery Library -->
         <script src="<?php echo base_url('assets/grouppage/js/tileshow.js');?>" type="text/javascript"></script> <!-- jQuery Library -->
         <script src="<?php echo base_url('assets/grouppage/js/script.js');?>" type="text/javascript"></script> <!-- jQuery Library -->
         
		 <script src="<?php echo base_url('assets/grouppage/js/overlay.js');?>" type="text/javascript"></script> <!-- jQuery Library -->
         
		  <script src="<?php echo base_url('assets/grouppage/js/jquery.mCustomScrollbar.js');?>" type="text/javascript"></script>
		  <script src="<?php echo base_url('assets/grouppage/js/jquery.confirm.js');?>" type="text/javascript"></script>
       
    </head>
    <body>
	
 <?php $user_row = $this->session->userdata('profile_data'); ?>

        <div class="header" style='z-index:999;'>
            <div class="icn-bck-clsss">
								<a style="cursor:pointer;" href="<?php echo base_url('user/'.$user_row[0]['custName']);?>">	<img src="<?=base_url("assets/grouppage/img/back-arrw.png");?>" style="margin-top: 4px;"></a>
									<span style="font-size: 28px;padding: 12px;vertical-align: top;"><?= $lang['groups'];?></span>
	
	<a data-overlay-trigger="two" href="#!"><span class="rht-tp-icn"> <img src="<?php echo base_url('assets/grouppage/img/icon Group page.png');?>"></span></a>
	
								</div>
        </div>
        
        <section id="content">

            <div class="col-md-12" style="
margin-top: -9px;border-radius: 21px;margin-left: -108px;">
<div style="margin-top:-91px">
            <section class="clearfix section" id="about">

                <!-- SECTION TITLE -->
                <h3 class="block-title"></h3>
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
             

                <div class="tile black htmltile w3 h4">
                    <div class="tilecontent">
					
                        <div class="content">
						
						<div class="thumbnail" style="float: left;width: 35.6%;border: medium none;padding: 0px;background: rgba(0, 0, 0, 0.3) none repeat scroll 0% 0%;margin-left: 0px;height: 129px;" >
                      
						 <img style="float: left;height: 97px;margin-top: 17px;width: 97px;margin-left: 19px;" src='<?php if(isset($user_row[0]['photo'])){echo base_url('uploads').'/'.$user_row[0]['photo'];}else{echo base_url('uploads').'/profile.png';} ?>' style="float:left" class="img-responsive img-circle" />
						
                  </div>
				  <div style="padding-left: 15px;float: left;width: 60%;height: 104px;background: rgba(11, 7, 7, 0.35) none repeat scroll 0% 0%;padding-top: 25px;">
                            
									
									 <h3><?php echo $user_row[0]['perdataFirstName'] ."&nbsp;"  .$user_row[0]['perdataLastName']; ?></h3>
									  <h4 class="muted"><?php echo $user_row[0]['profProfession'];  ?></h4>
									<span class="loc-txt-grp"  style="padding-right: 0px;"><?php echo $login =$user_row[0]['addrDistrict'];  ?>, <?= $login =$user_row[0]['addrState'];  ?></span></p>
								
									 <p class="fnt-clr-clss">
                                       <?php  echo $login =$user_row[0]['perdataAboutMe'];   ?>
									 
                                      </p>
									
									</div>
                            <ul class="grups-lst">
									<li class="col-md-12 no-pad-grp">
											<div class="grp-centrd-txt icn-bck-btnn" style="    float: left;
    width: 12%;
    margin: 0;">
												<img src="<?php echo base_url('assets/grouppage/img/own-groups.png');?>" style="height: 45px;">
											</div>
								<div class="hvr-cls-grp own-grp" id="owner-button" style="width: 75.9%;float: left;margin-bottom:0 "><span style="margin-bottom:0"><?= $lang['own_groups'];?></span></div>
									</li>
									
									
									<li class="col-md-12 no-pad-grp">
											<div class=" grp-centrd-txt icn-bck-clsss icn-bck-btnn" style=" float: left;
    width: 12%;
    margin: 0;">
												<img src="<?php echo base_url('assets/grouppage/img/network-groups.png');?>" style="height: 45px;">
											</div>
						<div class=" hvr-cls-grp netwrk-grp"  id="network-button"  style="width: 75.9%;float: left;margin-bottom:0 "><span style="margin-bottom:0"><?= $lang['network_groups'];?></span></div>
									</li>
									<li class="col-md-12 no-pad-grp">
											<div class="cgrp-centrd-txt icn-bck-clsss icn-bck-btnn"  style="float: left;width:12%; margin:0;padding-bottom: 5px;">
											<img src="<?php echo base_url('assets/grouppage/img/suggested-groups.png');?>" style="height: 45px;">
											</div>
							<div class=" hvr-cls-grp suggst-grp" id="suggest-button" style="width: 75.9%;float: left;margin-bottom:0; "><span style="margin-bottom:0"><?= $lang['suggest_groups'];?></span></div>
									</li>
								</ul>
                        </div>
                    </div>
                </div>
                <!-- /SECTION TILES -->

            </section>
            
							
            <section class="clearfix section" id="own-groups">

                <!-- SECTION TITLE -->
                <h3 class="block-title"><?= $lang['own_groups'];?></h3> 
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
				 <?php  
							
							    if(empty($results_own))
                                {
	?>
	<div class="tile white title-scaleup imagetile w2 h1" style="height:86px">
                   <div class="col-md-12 no-pad-grp">
				   <?php
	
								   echo "<div class='nodatafound'>No Groups found...!</div>";
								   ?>
								   </div></div>
								   <?php
								}
								else
								{
                                 
								foreach($results_own as $result)
						         {
								 
								     $query = $this->db->query('
			                         SELECT gi.* FROM group_invitation gi
			                          WHERE gi.groupID = '.$result->grp_id.' AND gi.gistatus = 1
			                          ');
		                         //$memS = $this->db->query($query)->result();
		                       //  print_r(count($query->result()) + 1);
								 
						     ?>
             <div class="tile white title-scaleup imagetile w2 h1" style="height:86px" id="group_<?php echo $result->grp_id; ?>">
                  <div class="col-md-12 no-pad-grp bck-clr-cls">
					<div class="col-md-4 nor-4 no-pad-grp" style="height:100%">
					   <div class="bck-attr-clr"></div>
						  <div class="img-rht-clsss-grp thumbnail">
						    <img src="<?=base_url()."uploads/groups/banners/".$result->grp_cover;?>" class="img-responsive img-circle" style='height: 61px;width: 62px;margin-top: 12px;margin-left: 16px;'>
								</div>
									</div>
                                            <div class="col-md-6 nor-8 no-pad-grp">
												<div class="cntnt-rht-clsss-grp" style="padding-left:7px;padding-top: 11px;">
												 <a data-toggle="tooltip" data-placement="top" title="<?=$result->grp_name;?>" id="readmore" href="<?php echo base_url().'groups/view/'.$this->custom_function->create_ViewUrl($result->grp_id,$result->grp_name);?>">
												 <h4 class="fnt-clr-clss-title">
													 <?php $string = $result->grp_name;
                                                       if (strlen($string) > 15) {
                                                       $trimstring = substr($string, 0, 15).'..';
                                                        } else {
                                                                 $trimstring = $string;
                                                               }
                                                                echo $trimstring;
               
                                                                ?>
													
													
													</h4></a>
													<p class="mrgn-btm-cls"><span style="margin-right:2px"><?= $lang['members'];?></span>   [<span ><?php print_r(count($query->result()) + 1);?></span>]</p>
													
													<p   class="mrgn-btm-cls1"><?php if($result->privacy ==1) { echo $lang['public']; } else { echo $lang['private']; } ?> <?= $lang['groups'];?> <?php if($result->status ==1) { ?> <span style="color:green;"  id="<?php echo $result->grp_id; ?>"> <a href="#" class="pubishMEbutton"><i class="fa fa-globe" style="color:red" title="un pubished, Click to pubish"></i></a></span><?php } ?></p>
													
												</div>
												
											</div>
											<div class="del-edit-icons" style="width: 10%;
background: rgba(0, 0, 0, 0.52) none repeat scroll 0% 0%;float: left;height: 100%;margin-left: 17px;">
												<div class="col-md-12" id='<?=$result->grp_id;?>'>
													<a class='editData' data-overlay-trigger="one" href="#!"><i class="fa fa-pencil-square-o" style="color: rgb(227, 227, 227);font-size: 1.4em;margin-top: 10px;margin-left: -8px;"></i></a>
												</div>
												<div class="col-md-12" id='<?=$result->grp_id;?>'>
												<a href="#" id="complexConfirm_<?=$result->grp_id;?>"><i class="fa fa-trash-o" style="color: rgb(255, 255, 255);font-size: 1.4em;margin-top: 32px;margin-left: -8px;"></i></a>
												</div>
												
												</div>
									</div>
									
									
								
									
                </div>
		
				
				
				
                 <script>
           
                $("#complexConfirm_<?=$result->grp_id;?>").confirm({
                title:"<h3><?= $lang['delete_confirmation'];?></h3>",
                text: "<?= $lang['delete_group'];?>",
                confirm: function(button) {
                    button.fadeOut(2000).fadeIn(2000);
					var dataString = 'id='+<?=$result->grp_id;?>;
				    
					$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>groups/delete',
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data === 1) {
							
							location.reload();
							
						}
						else alert('Some error occured. Please try again'); 
						
					}
				    });
                },
                cancel: function(button) {
                    button.fadeOut(1000).fadeIn(1000);
                },
                confirmButton: "<?= $lang['yes'];?>",
                cancelButton: "<?= $lang['no'];?>"
            });
            
            </script>
				<?php 
				   } 
				  }
				?>
                <!-- /SECTION TILES -->

            </section>
			  <section class="clearfix section" id="network-groups">

                <!-- SECTION TITLE -->
                <h3 class="block-title"><?php echo $lang['network_groups'];?></h3>
                <!-- /SECTION TITLE -->
                <?php  
							
							    if(empty($network_groups))
                                {
	?>
	<div class="tile white title-scaleup imagetile w2 h1" style="height:86px">
                   <div class="col-md-12 no-pad-grp">
				   <?php
	
								   echo "<div class='nodatafound'>No Groups found...!</div>";
								   ?>
								   </div></div>
								   <?php
								}
								else
								{
                                 
								foreach($network_groups as $result)
						         {
								 $query = $this->db->query('
			                         SELECT gi.*
			                         FROM group_invitation gi
			                          WHERE gi.groupID = '.$result->grp_id.' AND gi.gistatus = 1
			                          ');
						     ?>
                <!-- SECTION TILES -->
                <div class="tile white title-scaleup imagetile w2 h1" style="height:86px" id="group_<?php echo $result->grp_id; ?>">
                   <div class="col-md-12 no-pad-grp bck-clr-cls">
									
									<div class="col-md-4 nor-4 no-pad-grp">
								<div class="bck-attr-clr" style="height: 118%;"></div>
											<div class="img-rht-clsss-grp thumbnail">
												 <img src="<?=base_url()."uploads/groups/banners/".$result->grp_cover;?>" class="img-responsive img-circle" style='height: 61px;width: 62px;margin-top: 12px;margin-left: 16px;' >
											</div>
									</div>
											<div class="col-md-6 nor-8 no-pad-grp">
												<div class="cntnt-rht-clsss-grp" style="padding-left:7px;padding-top: 7px;">
													 <a data-toggle="tooltip" data-placement="top" title="<?=$result->grp_name;?>" id="readmore" href="<?php echo base_url().'groups/view/'.$this->custom_function->create_ViewUrl($result->grp_id,$result->grp_name);?>">
												 <h4 class="fnt-clr-clss-title">
													 <?php $string = $result->grp_name;
                                                       if (strlen($string) > 15) {
                                                       $trimstring = substr($string, 0, 15).'..';
                                                        } else {
                                                                 $trimstring = $string;
                                                               }
                                                                echo $trimstring;
               
                                                                ?>
													
													
													</h4></a>
													<p class="mrgn-btm-cls"><span><?= $lang['members'];?></span> <span ><i class="fa fa-users"style="color:#fff"></i></span> (<span><?php print_r(count($query->result()) + 1);?></span>)</p>
													<p   class="mrgn-btm-cls1"><?php if($result->privacy ==1) { echo $lang['public']; } else { echo $lang['private']; } ?> <?= $lang['groups'];?></p>
													<div class="grp-rht-clss">
													
												<a href="<?php echo base_url().'groups/view/'.$this->custom_function->create_ViewUrl($result->grp_id,$result->grp_name); ?>"><i class="fa fa-pencil-square-o" style="color:#fff"></i></span><span  class="textcnt-spce-grp fnt-clr-clss"><?= $lang['visit_now'];?></span></a>
													
													</div>
												</div>
											</div>
											
											<div class="del-edit-icons" style="width: 10%;
background: rgba(0, 0, 0, 0.52) none repeat scroll 0% 0%;float: left;height: 100%;margin-left: 17px;">
												
												</div>
									</div>
                </div>
                  <?php }  } ?>
				
                <!-- /SECTION TILES -->

            </section>
			  <section class="clearfix section" id="suggest-groups">

                <!-- SECTION TITLE -->
                <h3 class="block-title"><?= $lang['suggest_groups'];?></h3>
                <!-- /SECTION TITLE -->
                      <?php  
							
							    if(empty($results_public))
                                {
?>
	<div class="tile white title-scaleup imagetile w2 h1" style="height:86px">
                   <div class="col-md-12 no-pad-grp">
				   <?php
	
								   echo "<div class='nodatafound'>No Groups found...!</div>";
								   ?>
								   </div></div>
								   <?php
								}
								else
								{
                                 
								foreach($results_public as $result)
						         {
								     $query = $this->db->query('
			                         SELECT gi.* FROM group_invitation gi
			                          WHERE gi.groupID = '.$result->grp_id.' AND gi.gistatus = 1
			                          ');
						     ?>
                <!-- SECTION TILES -->
                <div class="tile white title-scaleup imagetile w2 h1" style="height:86px">
                   <div class="col-md-12 no-pad-grp bck-clr-cls">
									
									<div class="col-md-4 nor-4 no-pad-grp">
								<div class="bck-attr-clr" style="height: 118%;"></div>
											<div class="img-rht-clsss-grp thumbnail">
												 <img src="<?=base_url()."uploads/groups/banners/".$result->grp_cover;?>" class="img-responsive img-circle" style='height: 61px;width: 62px;margin-top: 12px;margin-left: 16px;'>
											</div>
									</div>
											<div class="col-md-6 nor-8 no-pad-grp">
												<div class="cntnt-rht-clsss-grp" style="padding-left:7px;padding-top: 7px;">
													 <a data-toggle="tooltip" data-placement="top" title="<?=$result->grp_name;?>" id="readmore" href="<?php echo base_url().'groups/view/'.$this->custom_function->create_ViewUrl($result->grp_id,$result->grp_name);?>">
												 <h4 class="fnt-clr-clss-title">
													 <?php $string = $result->grp_name;
                                                       if (strlen($string) > 15) {
                                                       $trimstring = substr($string, 0, 15).'..';
                                                        } else {
                                                                 $trimstring = $string;
                                                               }
                                                                echo $trimstring;
               
                                                                ?>
													
													
													</h4></a>
													<p class="mrgn-btm-cls"><span><?= $lang['members'];?></span> <span ><i class="fa fa-users"style="color:#fff"></i></span> (<span><?php print_r(count($query->result()) + 1);?></span>)</p>
													
													<p   class="mrgn-btm-cls1"><?php if($result->privacy ==1) { echo $lang['public']; } else { echo $lang['private']; } ?> <?= $lang['groups'];?></p>
													
													<div class="grp-rht-clss"><span class="icn-spce-grp">
													
													<a href="<?php echo base_url().'groups/view/'.$this->custom_function->create_ViewUrl($result->grp_id,$result->grp_name); ?>"><i class="fa fa-pencil-square-o" style="color:#fff"></i></span><span  class="textcnt-spce-grp fnt-clr-clss"><?= $lang['visit_and_join'];?></span></a>
													
													
													
													</div>
												</div>
											</div>
											<div class="del-edit-icons" style="width: 10%;
background: rgba(0, 0, 0, 0.52) none repeat scroll 0% 0%;float: left;height: 100%;margin-left: 17px;">
												
												</div>
									</div>
                </div>
				
				
				<?php 
				    }
				   }
				?>
				 <div></div>
				
                <!-- /SECTION TILES -->

            </section>
            <!-- /SECTION -->
</div>
</div>
        </section> 
		
        <!-- /MAIN CONTENT SECTION -->
<div class="overlay" id="one" style='z-index:9999;'>
      <div class="modal1">
	<div class="simp-cls">  <a href="#!"  onclick="$('.overlay#one').trigger('hide');return false;">x</a></div>
         

                <!-- SECTION TITLE -->
                <h3 class="block-title" style="margin-top: 1px;
margin-left: 9px;"><?= $lang['edit_group'];?></h3>
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
                <div class="tile black htmltile w3 h4" style="width:95%; margin-top:3px; height:100%">
                    <div class="tilecontent">
						

                            

                           

                            <form id="contactme" action="<?php echo base_url().'groups/update';?>" enctype="multipart/form-data" class="form-dark" name="cform" method="post" >
                                <div class="row-fluid"  style="margin-top:15px;">
                                    <label><?= $lang['group_name'];?> </label>
                                    <input type="text" class="span12" placeholder="<?= $lang['group_name'];?>" name="edit_groupTitle" id="EditgroupTitle">
                                </div>
								<div class="row-fluid"  >
                                    <label><?= $lang['group_description'];?></label>
                                    <textarea class="span12" name="edit_groupDes" id="EditgroupDes" placeholder="<?= $lang['group_description'];?>"></textarea>
                                </div>
                                <div class="row-fluid">
                                    <label><?= $lang['group_image'];?>: </label>
                                   <div id="img_container" style='padding:10px;'></div>
									<input type="file" name="edit_groupCover" accept='image/*' id="EditgroupCover">
                                </div>
                               
                                <div class="row-fluid">
                                    <label>Privacy</label>
                                    <select class="span12"  name="edit_groupPrivacy" id="EditgroupPrivacy">
			                          <option value='1'><?= $lang['public'];?></option>
			                          <option value='2'><?= $lang['private'];?></option>
			                       </select>
									<input type="hidden" id="EditGroupId" value="" name="edit_groupid" />
                                </div>
								
								 <div>
										<label class="col-md-3">
										  <?= $lang['who_can_join'];?> :
										</label>
										<label class="col-md-2">
										  <input type="radio" name="edit_joinRadio" id="edit_joinRadio" value="11"><span class="radio-txtss"> <?= $lang['any_one'];?></span>
										</label>
										<label class="col-md-2">
										  <input type="radio" name="edit_joinRadio" id="edit_joinRadio" value="22"><span class="radio-txtss"><?= $lang['ask_me'];?></span>
										</label>
								</div>
								<div style="margin-top:25px; clear:both;display:none;">
										<label class="col-md-3">
										  Who Can Do Post :
										</label>
										<label class="col-md-2">
										  <input type="radio" name="edit_postRadio" id="edit_postRadio" value="11"><span class="radio-txtss"><?= $lang['any_one'];?></span>
										</label>
										<label class="col-md-2">
										  <input type="radio" name="edit_postRadio" id="edit_postRadio" value="22"><span class="radio-txtss"><?= $lang['ask_me'];?></span>
										</label>
								</div>
								
									<div style="margin-top:30px; clear:both">
										<label class="col-md-3">
										  <?= $lang['want_to_make_live'];?> :
										</label>
										<label class="col-md-2">
										  <input type="radio" name="edit_PublishRadio" id="edit_PublishRadio" value="0"><span class="radio-txtss"><?= $lang['publish'];?></span>
										</label>
										<label class="col-md-2">
										  <input type="radio" name="edit_PublishRadio" id="edit_PublishRadio" value="1"><span class="radio-txtss"><?= $lang['unpublish'];?></span>
										</label>
								</div>

                               
                                <div class="row-fluid">
                                    <button type="submit" id='i_submit' class="btn btn-success pull-right"><?= $lang['update'];?></button>
                                </div>
                            </form>
                       
                    </div>
                </div>
                <!-- /SECTION TILES -->

      
      </div>
    </div>
	<div class="overlay" id="two" style='z-index:9999;'>
      <div class="modal1" style="width:30%; height:73%">
	<div class="simp-cls">  <a href="#!"  onclick="$('.overlay#two').trigger('hide');return false;">x</a></div>
         <h3 class="block-title" style="margin-top: 1px;
margin-left: 9px;"><?= $lang['create_new_group'];?></h3>
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
                <div class="tile black htmltile w3 h4" style="width:95%; margin-top:3px; height:100%">
                    <div class="tilecontent">
				
                     <form class="form-dark" name="cform" method="post" enctype="multipart/form-data" action="<?php echo base_url().'groups/add';?>">
                                <div class="row-fluid"  style="margin-top:15px;">
                                    <label><?= $lang['group_name'];?> </label>
                                     <input type="hidden" required class="form-control" name="userID" id="userID" value="<?php echo $user_row[0]['custID'];?>">
									<input type="text" class="span12" name="groupTitle" id="groupTitle" required placeholder="<?php echo $lang['group_name'];?>">
                                </div>
								<div class="row-fluid"  >
                                    <label><?= $lang['group_description'];?></label>
                                    <textarea class="span12" placeholder="<?php echo $lang['group_description'];?>" name="groupDes" id="groupDes" required></textarea>
                                </div>
                                <div class="row-fluid">
                                    <label><?= $lang['group_image'];?>: <small style='color:red;font-style:italic;'>(300x300)*</small> </label>
                                   <div id="uploadPreviewCreate" style='padding:10px;'>
								   <img style='background-color:#fff;' id='def_grp_img' width='100' src="<?=base_url()."uploads/groups/banners/groups_def.png"?>" class="img-responsive" >
								   </div>
									<input type="file" name="groupCover" id="groupCover" accept='image/*' />
                                </div>
                           
                                <div class="row-fluid">
                                    <label><?= $lang['privacy'];?></label>
                                    <select name="groupPrivacy" id="groupPrivacy" class="span12">
                                        <option value='1'><?= $lang['public'];?></option>
			                            <option value='2'><?= $lang['private'];?></option>
                                        
                                    </select>
                                </div>

								  <div>
										<label class="col-md-3">
										  <?= $lang['who_can_join'];?> :
										</label>
										<label class="col-md-2">
										  <input type="radio" name="joinRadio" id="joinRadio" checked value="11"><span class="radio-txtss"><?= $lang['any_one'];?></span>
										</label>
										<label class="col-md-2">
										  <input type="radio" name="joinRadio" id="joinRadio" value="22"><span class="radio-txtss"><?= $lang['ask_me'];?></span>
										</label>
								</div>
								<div style="margin-top:25px; clear:both;display:none;">
										<label class="col-md-3">
										  Who Can Do Post :
										</label>
										<label class="col-md-2">
										  <input type="radio" name="postRadio" checked id="postRadio" value="11"><span class="radio-txtss"><?= $lang['any_one'];?></span>
										</label>
										<label class="col-md-2">
										  <input type="radio" name="postRadio" id="postRadio" value="22"><span class="radio-txtss"><?= $lang['ask_me'];?></span>
										</label>
								</div>
								
									<div style="margin-top:30px; clear:both">
										<label class="col-md-3">
										  <?= $lang['want_to_make_live'];?> :
										</label>
										<label class="col-md-2">
										  <input type="radio" name="PublishRadio" checked id="PublishRadio" value="0"><span class="radio-txtss"><?= $lang['publish'];?></span>
										</label>
										<label class="col-md-2">
										  <input type="radio" name="PublishRadio" id="PublishRadio" value="1"><span class="radio-txtss"><?= $lang['unpublish'];?></span>
										</label>
								</div>
                                <div class="row-fluid">
                                    <button type="submit" class="btn btn-success pull-right"><?= $lang['create'];?></button>
                                </div>
								
                            </form>
                       
                    </div>
                </div>
	</div>
	</div>
      
       

    
   
		
 <script>
     $(document).ready(function(){
    $("body").hide(0).delay(0).fadeIn(500)
    });
      $(document).ready(function() {
	   
	   
	  
        $('.overlay').overlay();
		
		
		
      });
    </script>
	
		
<script>
$(document).ready(function() {

    $(document).on('click','.editData',function(e){
		var exampleModalGroupEdit = $('#one');
		var id = $(this).parent().attr('id');
		//alert('edit clicked'+id);
			//var id = $(this).parent().attr('id');
			var dataString = 'getData=true'+'&id='+id;
				$.ajax({
					type: "POST",
					url: "groups/get_group_data",
					data: dataString,
					cache: false,
					success: function(data){
						if(data) {			
							    exampleModalGroupEdit.find('#EditGroupId').val(data.grp_id);
								exampleModalGroupEdit.find('#EditgroupTitle').val(data.grp_name);
								exampleModalGroupEdit.find('#EditgroupDes').val(data.grp_description);
								exampleModalGroupEdit.find('#img_container').html('<img width="100" id="img_preview" src="<?= base_url()."uploads/groups/banners/";?>'+data.grp_cover+'" alt="'+data.grp_name+'"></img>');
								exampleModalGroupEdit.find('select option[value='+data.privacy+']').prop('selected', true);
								
								 var $edit_joinRadio = $('input:radio[name=edit_joinRadio]');
							     $edit_joinRadio.filter('[value='+data.join+']').prop('checked', true);
								
								
								var $edit_postRadio = $('input:radio[name=edit_postRadio]');
								$edit_postRadio.filter('[value='+data.postRes+']').prop('checked', true);
								
								
								var $edit_PublishRadio = $('input:radio[name=edit_PublishRadio]');
							    $edit_PublishRadio.filter('[value='+data.status+']').prop('checked', true);
							
								
							//	alert(data.grp_name);
						}
						else alert('Some error occured. Please try again'); 
						
					}
				}); 
			
		});
		
		 $(document).on('click','.pubishMEbutton',function(e){
			
			var point = $(this);
			var id = $(this).parent().attr('id');
			var dataString = 'id='+id;
			
			
			
				$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>groups/update_publish_state',
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data === 1) {
							
							point.hide();
								       
							
						}
						else alert('Some error occured. Please try again'); 
						
					}
				    });
			
		});
		
		
		
		

 $('#network-groups').hide();
 $('#suggest-groups').hide();
    $('#owner-button').click(function() {
        $('#network-groups').hide();
       $('#suggest-groups').hide(); 
		$('#own-groups').show(); 
  
    });
	 $('#network-button').click(function() {
        $('#network-groups').show();
       $('#suggest-groups').hide(); 
		$('#own-groups').hide(); 	   
    });
	 $('#suggest-button').click(function() {
        $('#network-groups').hide();
       $('#suggest-groups').show(); 
		$('#own-groups').hide(); 	   
    });

	
});
</script>

<script>
// var url = window.URL || window.webkitURL; // alternate use

function readImage(file,nameElement) {
    var input = $('#'+nameElement);
    var reader = new FileReader();
    var image  = new Image();
  
    reader.readAsDataURL(file);  
    reader.onload = function(_file) {
        image.src    = _file.target.result;              // url.createObjectURL(file);
        image.onload = function() {
            var w = this.width,
                h = this.height,
                t = file.type,                           // ext only: // file.type.split('/')[1],
                n = file.name,
                s = ~~(file.size/1024) +'KB';
				
				
				if(w > 300 && h > 300)
				{
				  
				  alert("<?= $lang['edit_upload_file'];?>");

				  
				  input.replaceWith(input.val('').clone(true));
				  return false;
				}
		       if(nameElement == 'groupCover')
			   {
               $('#def_grp_img').fadeOut();
               $( "#uploadPreviewCreate" ).empty();
               $('#uploadPreviewCreate').append('<img width="100" src="'+ this.src +'">');
			   }
			   else
			   {
			         $( "#img_container" ).empty();
			        $('#img_container').append('<img width="100" src="'+ this.src +'">');
			   }
        };
           image.onerror= function() {
            alert('Invalid file type: '+ file.type);
         };      
    };

}
$("#groupCover").change(function (e) {
    if(this.disabled) return alert("<?= $lang['unsupported_file_upload'];?>");
    var F = this.files;
    if(F && F[0]) for(var i=0; i<F.length; i++) readImage( F[i],'groupCover' );
});

$("#EditgroupCover").change(function (e) {
    if(this.disabled) return alert("<?= $lang['unsupported_file_upload'];?>");
    var F = this.files;
    if(F && F[0]) for(var i=0; i<F.length; i++) readImage( F[i],'EditgroupCover' );
});

</script>

    </body>
</html>