<body class="group-page">
    <div class="main-div">
          <div class="container-fluid">
          
          <?php echo $logo_login_part; ?>
          
            <div class="grp-pic-box">
                <div class="row profile-box"><div class=" col-xs-5 profile-pic no-r-pad">
                    <img src="<?php echo ($this->session->userdata['profile_data'][0]['photo'] && isset($this->session->userdata['profile_data'][0]['photo'])) ? base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'] : base_url().UPLOADS.'profile.png';?>" class="img-responsive img-center"/>
                </div>  
                <div class="col-xs-7 no-l-pad grp-d white">
                    <h5><?php echo $this->session->userdata['profile_data'][0]['perdataFirstName']." ".$this->session->userdata['profile_data'][0]['perdataLastName'];?></h5>
                        <p><?php echo $this->session->userdata['profile_data'][0]['profProfession'];?></p>
                        <p><?php echo $this->session->userdata['profile_data'][0]['addrCity'];?>, <?php echo $this->session->userdata['profile_data'][0]['addrState'];?>, <?php echo $this->session->userdata['profile_data'][0]['addrCountry'];?>, <?php echo $this->session->userdata['profile_data'][0]['addrPostCode'];?></p>
                        <p><?php echo $this->session->userdata['profile_data'][0]['profDesignation'];?></p>                       
                </div> </div> <!--grp-pic-box-->            
            </div><!--profile-box-->  
            <div class="row">
                <div class="col-xs-12 text-right white">
                    <button class="btn btn-sm create-grp" type="button" data-toggle="modal" data-target="#create-grp-modal">Create Group&nbsp;&nbsp;<img src="<?php echo base_url().MOBILE_IMAGES ?>create-grp.png" class="img-circle"></button>
                </div>
            </div>                 
            <div class="row"> 
                <div class="col-md-12 grp-tab-con">
                      <!-- Nav tabs -->
                      <ul class="nav nav-pills text-center" role="tablist">
                        <li role="presentation" class="active"><a href="#g1" aria-controls="g1" role="tab" data-toggle="tab"><img src="<?php echo base_url().MOBILE_IMAGES ?>gh1.png" /><span>Own Group</span></a></li>
                        <li role="presentation"><a href="#g2" aria-controls="g2" role="tab" data-toggle="tab"><img src="<?php echo base_url().MOBILE_IMAGES ?>gh2.png" /><span>Network Groups</span></a></li>
                        <li role="presentation"><a href="#g3" aria-controls="g3" role="tab" data-toggle="tab"><img src="<?php echo base_url().MOBILE_IMAGES ?>gh3.png" /><span>Suggest Groups</span></a></li>                        
                      </ul>                    
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane  fade in active" id="g1">
                             <ul  class="list-unstyled comment-list grp-list">
                                <h6><a href="#"  class="white rc-comm">Own Groups</a></h6>
                                <?php if(count($results_own) != 0)
                                 {
                                    echo "<pre>";
                                    print_r($results_own);
                                    echo "</pre>";
                                    foreach ($results_own as $singleGrp) {
                                       
                                    ?>
                                            <li class="news-item">
                                <table cellpadding="">
                                <tbody><tr>
                                <td><img src="<?php echo base_url("uploads/groups/banners/".$singleGrp->grp_cover)?>" alt="<?=$singleGrp->grp_name;?>" title="<?=$singleGrp->grp_name;?>" class="img-circle" width="40"></td>
                                <td class="comment">                                    
                                    <h6><?=$singleGrp->grp_name;?></h6>
                                    <p>Members (3)</p>
                                    
                                    <p><?php if($singleGrp->privacy == 1){ echo $lang['public_group']; }else { echo $lang['private_group']; } ?></p>                                   
                                </td>     
                                <td class="eandd">
                                    <button class="edit" type="button" data-toggle="modal" data-target="#edit-grp-modal"><i class="fa fa-pencil-square-o fa-lg"></i></button><br><button class="del" type="button" data-toggle="modal" data-target="#del-grp"><i class="fa fa-trash fa-lg"></i></button>
                                </td>
                                </tr>
                                </tbody></table>  
                                </li> 
                                    <?php
                                }
                                }else
                                {
                                    echo "No groups found...!";
                                }
                                ?>
                                      
                             </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="g2">
                            <ul  class="list-unstyled comment-list grp-list">
                                <h6><a href="#"  class="white rc-comm">Network Groups</a></h6>
                                
                                <?php if(count($network_groups) != 0)
                                 {
                                   
                                    foreach ($network_groups as $singleGrp) {
                                       
                                    ?>
                                            <li class="news-item">
                                <table cellpadding="">
                                <tbody><tr>
                                <td><img src="<?php echo base_url("uploads/groups/banners/".$singleGrp->grp_cover)?>" alt="<?=$singleGrp->grp_name;?>" title="<?=$singleGrp->grp_name;?>" class="img-circle" width="40"></td>
                                <td class="comment">                                    
                                    <h6><?=$singleGrp->grp_name;?></h6>
                                    <p>Members (3)</p>
                                    
                                    <p><?php if($singleGrp->privacy == 1){ echo $lang['public_group']; }else { echo $lang['private_group']; } ?></p>                                   
                                </td>     
                                <td class="eandd">
                                    <button class="edit" type="button" data-toggle="modal" data-target="#edit-grp-modal"><i class="fa fa-pencil-square-o fa-lg"></i></button><br><button class="del" type="button" data-toggle="modal" data-target="#del-grp"><i class="fa fa-trash fa-lg"></i></button>
                                </td>
                                </tr>
                                </tbody></table>  
                                </li> 
                                    <?php
                                }
                                }else
                                {
                                    echo "No groups found...!";
                                }
                                ?>                       
                             </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane fade two-box" id="g3">
                            <ul  class="list-unstyled comment-list grp-list">
                                <h6><a href="#"  class="white rc-comm">Suggest Groups</a></h6>
                                
                                <?php if(count($results_public) != 0)
                                 {
                                    
                                    foreach ($results_public as $singleGrp) {
                                       
                                    ?>
                                            <li class="news-item">
                                <table cellpadding="">
                                <tbody><tr>
                                <td><img src="<?php echo base_url("uploads/groups/banners/".$singleGrp->grp_cover)?>" alt="<?=$singleGrp->grp_name;?>" title="<?=$singleGrp->grp_name;?>" class="img-circle" width="40"></td>
                                <td class="comment">                                    
                                    <h6><?=$singleGrp->grp_name;?></h6>
                                    <p>Members (3)</p>
                                    
                                    <p><?php if($singleGrp->privacy == 1){ echo $lang['public_group']; }else { echo $lang['private_group']; } ?></p>                                   
                                </td>     
                                <td class="eandd">
                                    <button class="edit" type="button" data-toggle="modal" data-target="#edit-grp-modal"><i class="fa fa-pencil-square-o fa-lg"></i></button><br><button class="del" type="button" data-toggle="modal" data-target="#del-grp"><i class="fa fa-trash fa-lg"></i></button>
                                </td>
                                </tr>
                                </tbody></table>  
                                </li> 
                                    <?php
                                }
                                }else
                                {
                                    echo "No groups found...!";
                                }
                                ?>              
                                
                             </ul>
                        </div>                      
                      </div>
                </div>
            </div>   
          </div><!--container-fluid-->
    </div><!--plugin-->
  
<div class="modal fade" id="create-grp-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content c-group-model-bg">
      <div class="modal-header c-group-head-bg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title white" id="myModalLabel">Create a new group</h4>
      </div>
      <div class="modal-body white">
        <form>
        <div class="row">
            <div class="col-xs-12">
                <label>Group Name</label>
                <div class="form-group">
                    <input type="text" class="form-control">
                </div>                                                                          
                <label>Group Description</label>
                <div class="form-group">
                    <textarea class="form-control"></textarea>
                </div>
                <label>Group Image</label>
                <div class="form-group">
                    <span class="file-input btn btn-sm btn-no-rad btn-cam-file btn-file text-center">
                        <i class="fa fa-camera fa-2x"></i><br>Choose File<input type="file" multiple="">
                    </span>
                </div>  
                <label>Privacy</label>
                <div class="form-group">
                    <select class="form-control"><option>Public</option></select>
                </div>              
                <div class="row form-group rad">                    
                    <div class="col-xs-5 no-r-pad">                     
                        <label>Who Can Join</label>
                    </div>
                    <div class="col-xs-7 no-l-pad text-left">
                        <input type="radio" name="who" checked> <span class="rd">Anyone</span>&nbsp;<input type="radio" name="who"> <span class="rd">Ask me</span>
                    </div>
                </div>
                <div class="row form-group rad">                    
                    <div class="col-xs-5 no-r-pad">                     
                        <label>Whant to make live</label>
                    </div>
                    <div class="col-xs-7 text-left no-l-pad">
                        <input type="radio" name="live" checked > <span class="rd">Publish</span>&nbsp;<input type="radio" name="live"> <span class="rd">Unpublish</span>
                    </div>
                </div>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-no-rad c-group-head-bg white btn-sm mo-btn">Create</button>
      </div>
    </div>
  </div>
</div> 
<!---/create-grp-modal-------->
<div class="modal fade" id="edit-grp-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content c-group-model-bg">
      <div class="modal-header c-group-head-bg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title white" id="myModalLabel">Edit Group</h4>
      </div>
      <div class="modal-body white">
        <form>
        <div class="row">
            <div class="col-xs-12">
                <label>Group Name</label>
                <div class="form-group">
                    <input type="text" class="form-control">
                </div>                                                                          
                <label>Group Description</label>
                <div class="form-group">
                    <textarea class="form-control"></textarea>
                </div>
                <label>Group Image</label>
                <div class="form-group">
                    <span class="file-input btn btn-sm btn-no-rad btn-cam-file btn-file text-center">
                        <i class="fa fa-camera fa-2x"></i><br>Choose File<input type="file" multiple="">
                    </span>
                </div>  
                <label>Privacy</label>
                <div class="form-group">
                    <select class="form-control"><option>Public</option></select>
                </div>              
                <div class="row form-group rad">                    
                    <div class="col-xs-5 no-r-pad">                     
                        <label>Who Can Join</label>
                    </div>
                    <div class="col-xs-7 no-l-pad text-left">
                        <input type="radio" name="who" checked> <span class="rd">Anyone</span>&nbsp;<input type="radio" name="who"> <span class="rd">Ask me</span>
                    </div>
                </div>
                <div class="row form-group rad">                    
                    <div class="col-xs-5 no-r-pad">                     
                        <label>Whant to make live</label>
                    </div>
                    <div class="col-xs-7 text-left no-l-pad">
                        <input type="radio" name="live" checked > <span class="rd">Publish</span>&nbsp;<input type="radio" name="live"> <span class="rd">Unpublish</span>
                    </div>
                </div>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-no-rad c-group-head-bg white btn-sm mo-btn">Create</button>
      </div>
    </div>
  </div>
</div> 
<!--edit-grp-->    
<div class="modal fade" id="del-grp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content del-model-bg">
      <div class="modal-header del-head-bg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title white" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body white">
        <div class="row">
            <div class="col-xs-12 text-center">
                <img src="<?php echo base_url().MOBILE_IMAGES ?>grp-alert.png" class="img-responsive img-center" />
                <h3>Are you sure?</h3>
                <h6>u want to Delete this group?</h6>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
            <div class="col-xs-6 text-left">
                <button type="button" class="btn btn-no-rad btn-sm mo-btn mo-can-btn white" data-dismiss="modal">Cancel</button>        
            </div>
            <div class="col-xs-6 text-right">            
                <button type="button" class="btn btn-no-rad blue-btn white btn-sm mo-btn">Delete</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div> 
    