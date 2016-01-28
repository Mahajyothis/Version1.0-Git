 <div role="tabpanel" class="tab-pane" id="per_det">
            	<form method="post" class="email-signup" id="register_2" enctype="multipart/form-data" action="http://version.mahajyothis.net/registration/register_user" target="hidden_upload">
                <div class="row">
                    <div class="col-xs-12">                    
                        <div class="form-group">
                            <span class="file-input btn btn-sm btn-no-rad btn-cam-file btn-file text-center">
                                <img src="<?php echo MOBILE_IMAGES.'reg-pic.png'" class="img-responsive"> <input class="btn btn-mav btn-file" type="file" name="user_image" id="user_image" >
                                <span class="error_msg"></span>
                            </span>&nbsp;&nbsp;<?php echo $lang['photo_upload']; ?>
                        </div> 
                        <div class="row">
                        	<div class="col-xs-6">
                            	<label><?php echo $lang['r_f_name']; ?></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="<?php echo $lang['r_f_name_p']; ?>">
                                </div>  
                            </div>
                            <div class="col-xs-6">
                            	<label><?php echo $lang['r_l_name']; ?></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="<?php echo $lang['r_l_name_p']; ?>">
                                </div>  
                            </div>
                        </div>                                                                    	
                        <div class="row">
                        	<div class="col-xs-7">
                            	<label><?php echo $lang['gender']; ?></label>
                                <div class="form-group">
                                    <label class="radio-inline gen"><input type="radio" name="gender" id="g_male" value="male" checked><?php echo $lang['male']; ?></label><label class="radio-inline gen"><input type="radio"name="gender" id="g_female" value="female"><?php echo $lang['female']; ?></label>
                                </div>  
                            </div>
                            <div class="col-xs-5 no-l-pad">
                            	<label> <?php echo $lang['dob']; ?></label>
                                <div class="form-group">
                                    <input type="date" name="dob" id="dob" class="form-control">
                                      <span class="error_msg"></span>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-xs-6">
                            	<label><?php echo $lang['area_code']; ?></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="<?php echo $lang['eac']; ?>*">
                                     <span class="error_msg"></span>
                                </div>  
                            </div>
                            <div class="col-xs-6">
                            	<label><?php echo $lang['interested_in']; ?></label>
                                <div class="form-group">
                                   <select class="form-control" name="intrest" id="intrest">
      <?php 			//$selectedCategories = $this->input->post('artCategory'); 
      if($categories){ 
      	foreach ($categories as $key => $value) { ?>	
      	<option  value="<?php echo $value->id;?>"><?php echo ucwords($value->name);?></option>
										<?php  
											}} ?>
     </select>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-xs-6">
                            	<label>City</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="<?php echo $lang['enter_city']; ?>">
                                </div>  
                            </div>
                            <div class="col-xs-6">
                            	<label>District</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="<?php echo $lang['enter_district']; ?>">
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-xs-6">
                            	<label>State</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="<?php echo $lang['enter_state']; ?>">
                                </div>  
                            </div>
                            <div class="col-xs-6">
                            	<label>Country</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="<?php echo $lang['enter_country']; ?>">
                                </div>  
                            </div>
                        </div>
                        <label><?php echo $lang['address']; ?></label>
                        <div class="form-group">
                           <textarea class="form-control" placeholder="Enter Address"></textarea>
                           <span class="error_msg"></span>
                        </div>
                        <input type="hidden" name="page" id="page" value="p2">
<input type="hidden" name="cust_id" id="cust_id" value="41">
<input type="hidden" name="reg" id="reg" value="2">

                        <div class="form-group text-right">
                        	<button type="button" class="btn btn-no-rad orange-bg white btn-sm mo-btn nex" id="nex">Next</button>
                        </div>                       
                    </div>
                </div>
                </form>
            </div>