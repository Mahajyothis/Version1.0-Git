<div class="row header">
                <div class="col-xs-9">
                    <a href="<?=$this->config->item('mobile_url');?>"><img src="<?php echo base_url().MOBILE_IMAGES ?>logo.png" class="img-responsive" /></a>
                </div>
                <div class="col-xs-3">
                
                <?php  if(empty($this->session->userdata['profile_data'][0]['custID'])){ ?>
                
                	<button class="btn btn-group" type="button" data-toggle="modal" data-target="#login">
                       	<img src="<?php echo base_url().MOBILE_IMAGES ?>text-pic-before.png" class="img-responsive img-center img-circle" />                        
                    </button>
                     <?php } else { ?>
                    
                	<div class="dropdown">
                      <button class="btn btn-group dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                       	<img src="<?php echo ($this->session->userdata['profile_data'][0]['photo'] && isset($this->session->userdata['profile_data'][0]['photo'])) ? base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'] : base_url().UPLOADS.'profile.png';?>" class="img-responsive img-center img-circle" style="width:32px;height:32px;" />                        
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Logout</a></li>
                        
                      </ul>
                    </div> <?php } ?>
                </div>
            </div><!--header-->
            
         <?php  if(empty($this->session->userdata['profile_data'][0]['custID'])){ ?>
                   
<!--modal-->      
<div class="modal fade" id="reg-process" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content reg-model-bg">
      <div class="modal-header reg-head-bg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title white" id="myModalLabel"><?php echo $lang['user_register']; ?></h4>
      </div>
      <div class="modal-body white">
      	<div class="row">
		<div class="col-xs-12 no-l-pad no-r-pad">
          <!-- Nav tabs -->
          <ul class="nav nav-pills reg-pills" role="tablist">
            <li role="presentation" class="active"><a href="#reg_det" aria-controls="reg_det" role="tab" data-toggle="tab"><?php echo $lang['register_details']; ?></a></li>
            <li role="presentation"><a href="#per_det" aria-controls="per_det" role="tab" data-toggle="tab"><?php echo $lang['personal_details']; ?></a></li>
            <li role="presentation"><a href="#pro_det" aria-controls="pro_det" role="tab" data-toggle="tab"><?php echo $lang['professional_details']; ?></a></li>
            <li role="presentation"><a href="#finish_det" aria-controls="finish_det" role="tab" data-toggle="tab"><?php echo $lang['finish_details']; ?></a></li>
          </ul>
        
          <!-- Tab panes -->
          <div class="tab-content reg-con">
          <div class="load_page">
           <?php $this->load->view('register1.php'); ?>
           </div>
            <div role="tabpanel" class="tab-pane" id="per_det">
            	<form>
                <div class="row">
                    <div class="col-xs-12">                    
                        <div class="form-group">
                            <span class="file-input btn btn-sm btn-no-rad btn-cam-file btn-file text-center">
                                <img src="images/reg-pic.png" class="img-responsive"><input type="file" multiple="">
                            </span>&nbsp;&nbsp;Upload Photo
                        </div> 
                        <div class="row">
                        	<div class="col-xs-6">
                            	<label>First Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>  
                            </div>
                            <div class="col-xs-6">
                            	<label>Last Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>  
                            </div>
                        </div>                                                                    	
                        <div class="row">
                        	<div class="col-xs-7">
                            	<label>Gender</label>
                                <div class="form-group">
                                    <label class="radio-inline gen"><input type="radio" checked name="gen">Male</label><label class="radio-inline gen"><input type="radio" name="gen">Female</label>
                                </div>  
                            </div>
                            <div class="col-xs-5 no-l-pad">
                            	<label>Date of Birth</label>
                                <div class="form-group">
                                    <input type="date" class="form-control">
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-xs-6">
                            	<label>Area Code</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Area Code">
                                </div>  
                            </div>
                            <div class="col-xs-6">
                            	<label>Interested in</label>
                                <div class="form-group">
                                    <select class="form-control"><option selected disabled>--select--</option></select>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-xs-6">
                            	<label>City</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter City">
                                </div>  
                            </div>
                            <div class="col-xs-6">
                            	<label>District</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter District">
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-xs-6">
                            	<label>State</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter State">
                                </div>  
                            </div>
                            <div class="col-xs-6">
                            	<label>Country</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Country">
                                </div>  
                            </div>
                        </div>
                        <label>Address</label>
                        <div class="form-group">
                           <textarea class="form-control" placeholder="Enter Address"></textarea>
                        </div>
                        <div class="form-group text-right">
                        	<button type="button" class="btn btn-no-rad orange-bg white btn-sm mo-btn">Next</button>
                        </div>                       
                    </div>
                </div>
                </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="pro_det">
            <form>
                <div class="row">
                    <div class="col-xs-12">
                        <label>Qualificaion</label>
                        <div class="form-group">
                            <Select class="form-control"><option selected disabled>Select</option></Select>
                        </div>                                                                      	
                        <label>Profession</label>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter your Profession">
                        </div>
                        <label>Industry</label>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Industry">
                        </div>
                        <label>Description</label>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Description"></textarea>
                        </div>                         
                        <div class="form-group text-right">
                        	<button type="button" class="btn btn-no-rad orange-bg white btn-sm mo-btn">Next</button>
                        </div>                       
                    </div>
                </div>
                </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="finish_det">
            	<form>
                <div class="row">
                    <div class="col-xs-12">
                        <h4>Registration Complete</h4>                        
                        <div class="form-group text-right">
                        	<button type="button" class="btn btn-no-rad orange-bg white btn-sm mo-btn">Submit</button>
                        </div>                       
                    </div>
                </div>
                </form>
            </div>
          </div>
        </div><!--/col-xs-12-->
        </div><!--row-->      	
      </div>      
    </div>
  </div>
</div>
<!--login modal-->
<div class="modal fade log-mod" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content reg-model-bg">
         <div class="modal-header reg-head-bg">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title white" id="myModalLabel"><?php echo $lang['login']; ?></h4>
         </div>
         <div class="modal-body white">
         <div id="msg_login" class="text-center" style=" font-weight: normal;    margin-top: -16px; width: 92%;"></div>
            <form id="form_clear">              
               <label><?php echo $lang['name_or_email']; ?></label>
               <div class="input-group ">                    	
                  <span class="input-group-addon btn-no-rad login-input" id="sizing-addon2"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control btn-no-rad"  aria-describedby="sizing-addon2" placeholder="<?php echo $lang['u_or_e']; ?>" id="username" name="username" required>
               </div>
			    <span class="error_msg user"></span>
				 <p>&nbsp;</p>
				 
               <label><?php echo $lang['password']; ?></label>
               <div class="input-group">
                  <span class="input-group-addon btn-no-rad" id="sizing-addon2"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control btn-no-rad login-input" aria-describedby="sizing-addon2" placeholder="<?php echo $lang['enter_password']; ?>" name="password" id="password" required ">
               </div>
			    <span class="error_msg pass"></span>
               <div class="row f-acc">
               	<div class="col-xs-6">
                	<div class="form-group-sm text-left">                    	
                      <button type="button" class="btn btn-xs " data-toggle="modal" data-dismiss="modal" data-target="#forgot-password"><?php echo $lang['f_password']; ?> ?</button>
                   </div>
                </div>
                <div class="col-xs-6">
                	<div class="form-group-sm text-right">                    	
                      <button type="button" class="btn btn-xs" data-toggle="modal" data-dismiss="modal" data-target="#reg-process"><?php echo $lang['create_account']; ?></button>
                   </div>
                </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">            
            <button type="button" class="btn btn-no-rad orange-bg white btn-sm mo-btn login_click"><?php echo $lang['login']; ?></button>
         </div>
      </div>
   </div>
</div>
<!--forgot password-->
<div class="modal fade log-mod" id="forgot-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content reg-model-bg">
         <div class="modal-header reg-head-bg">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title white" id="myModalLabel">Forgot Password</h4>
         </div>
         <div class="modal-body white">
          
            <form>               
               <label>Name or Email</label>
               <div class="input-group ">                    	
                  <span class="input-group-addon btn-no-rad" id="sizing-addon2"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control btn-no-rad"  aria-describedby="sizing-addon2" placeholder="Enter your Username or Email">
               </div>                                             
            </form>
         </div>
         <div class="modal-footer">            
            <button type="button" class="btn btn-no-rad orange-bg white btn-sm mo-btn">Submit</button>
         </div>
      </div>
   </div></div>
   <?php } ?>
   