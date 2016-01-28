<form action="" method="" class="email-signup">

  <div class="form-group">
    <label class="col-md-3" for="username"><?php echo $lang['u_name']; ?>:<img id='user_loader' src='<?php echo base_url('assets/img/checking.gif'); ?>' style=' float: right;  width: 30px; display:none;'></label>
    <div class="col-md-9">
      <input class="form-control" id="uname" name="username"  type="text" placeholder="<?php echo $lang['u_name_p']; ?>*" required="required"/>
          <span class="error_msg"></span>

    </div>
  </div>
   <p>&nbsp;</p>

  <div class="form-group">
    <label class="col-md-3" for="emial"><?php echo $lang['r_email']; ?>:</label>
    <div class="col-md-9"> 

      <input class="form-control" id="r_email" name="r_email"  type="email" placeholder="<?php echo $lang['r_email_p']; ?>*" />
          <span class="error_msg"></span>

    </div>
  </div>
     <p>&nbsp;</p>

  <div class="form-group">
    <label class="col-md-3" for="email"><?php echo $lang['confirm_email']; ?>:</label>
    <div class="col-md-9"> 

      <input class="form-control" id="c_email" name="c_email" type="email" placeholder="<?php echo $lang['confirm_email_p']; ?>*" />
          <span class="error_msg"></span>

    </div>
  </div>
   <p>&nbsp;</p>

  <div class="form-group">
   <label class="col-md-3" for="password"> <?php echo $lang['r_password']; ?>:</label> 
   <div class="col-md-9">
    <input class="form-control" id="pword" name="password" type="password" placeholder="<?php echo $lang['r_password_p']; ?>*" />
              <span class="error_msg"></span>

  </div>
</div>
   <p>&nbsp;</p>

<div class="form-group">
   <label class="col-md-3" for="password"> <?php echo $lang['retype_password']; ?>:</label> 
   <div class="col-md-9">
    <input class="form-control" id="c_password" name="c_password" type="password" placeholder="<?php echo $lang['retype_password_p']; ?>*" />
              <span class="error_msg"></span>

  </div>
</div>
<input type="hidden" name="page" id="page" value="p1">
 <div class="nav-page">
   <span class="btn btn-mav nex" id="nex"  ><i class="glyphicon glyphicon-hand-right"></i></span>
 </div> 
</form>  