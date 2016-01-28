<div class="modal fade" id="signin" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog signin-dialog">

    <!-- Modal content-->
    <div class="modal-content signin-content">
    <div class="modal-header signin-header">
        <button style="color: inherit; opacity: .9" type="button" class="close" id="close"  data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style=""><?php echo $lang['login']; ?></h4>
      </div>
      <div class="modal-body signin-body">
    <div id="msg_login" class="text-center" style=" font-weight: normal;    margin-top: -16px; width: 92%;"></div>
        <form class="form-signin col-sm-offset-2" id="form_clear" >
          <label><?php echo $lang['name_or_email']; ?></label>
          <div class="input-group input-group-sm col-md-10">
            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control login-input" placeholder="<?php echo $lang['u_or_e']; ?>" aria-describedby="sizing-addon1" id="username" name="username" required >
          </div>
          <span class="error_msg user"></span>
          <p>&nbsp;</p>

        <label><?php echo $lang['password']; ?></label>
         <div class="input-group input-group-sm col-md-10">
             <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control login-input" placeholder="<?php echo $lang['enter_password']; ?>" aria-describedby="sizing-addon1" name="password" id="password" required onkeydown="displaynone()">
        </div>
         <span class="error_msg pass"></span>
              <p>&nbsp;</p>
          <div class="form-group" >
            <a href="#" style="color:#FA8B1F" class="col-md-5" id="click-forgot"><?php echo $lang['f_password']; ?> ?</a>
            <a href="#" style="color:#FA8B1F" class="col-md-5" id="click-register"> <?php echo $lang['create_account']; ?> </a>  
          </div>
          <p>&nbsp;</p>
          <button class="btn btn-sm btn-mav col-md-4 login_click"  type="button" ><?php echo $lang['login']; ?></button>
        </form>
      </div>
      
    </div>

  </div>
</div>         