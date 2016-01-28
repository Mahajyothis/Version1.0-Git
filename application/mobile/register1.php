 <div role="tabpanel" class="tab-pane active" id="reg_det">
            	<form class="email-signup">
                <div class="row">
                    <div class="col-xs-12">
                        <label><?php echo $lang['u_name']; ?></label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="uname" name="username" placeholder="<?php echo $lang['u_name_p']; ?>">
							 <span class="error_msg"></span>
                        </div>                                                                      	
                        <label><?php echo $lang['r_email']; ?></label>
                        <div class="form-group">
                            <input type="email" class="form-control" id="r_email" name="r_email" placeholder="<?php echo $lang['r_email_p']; ?>">
							 <span class="error_msg"></span>
                        </div>
                        <label><?php echo $lang['confirm_email']; ?></label>
                        <div class="form-group">
                            <input type="email" class="form-control" id="c_email" name="c_email" placeholder="<?php echo $lang['confirm_email_p']; ?>">
							 <span class="error_msg"></span>
                        </div>
                        <label><?php echo $lang['r_password']; ?></label>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pword" name="password" placeholder="<?php echo $lang['r_password_p']; ?>">
							 <span class="error_msg"></span>
                        </div>
                        <label><?php echo $lang['retype_password']; ?></label>
                        <div class="form-group">
                            <input type="password" class="form-control" id="c_password" name="c_password" placeholder="<?php echo $lang['retype_password_p']; ?>">
							 <span class="error_msg"></span>
                        </div> 
						<input type="hidden" name="page" id="page" value="p1">
                        <div class="form-group text-right">
                        	<button type="button" class="btn btn-no-rad orange-bg white btn-sm mo-btn nex" id="nex">Next</button>
                        </div>                       
                    </div>
                </div>
                </form>                	
            </div>