<form action="http://blog.mahajyothis.net/index.php/component/users/?task=user.login" target="_blank" method="post" class="form-validate form-horizontal well" style="display:none">
	<fieldset>
		<div class="control-group">
			<div class="control-label">
				<label id="username-lbl" for="username" class="required">
				Username<span class="star">&nbsp;*</span></label>
			</div>
			<div class="controls">
				<input type="text" name="username" id="username" value="<?php echo $this->session->userdata['profile_data'][0]['custName'] ?>" class="validate-username required" size="25" required="" aria-required="true" autofocus="">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="password-lbl" for="password" class="required">
				Password<span class="star">&nbsp;*</span></label>
			</div>
			<div class="controls">
				<input type="password" name="password" id="password" value="<?php echo $this->session->userdata['profile_data'][0]['joomlaPWD'] ?>" class="validate-password required" size="25" maxlength="99" required="" aria-required="true">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label>Remember me</label>
			</div>
			<div class="controls">
				<input id="remember" type="checkbox" name="remember" class="inputbox" value="yes">
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary">
				Log in </button>
			</div>
		</div>
		<input type="hidden" name="return" value="aW5kZXgucGhwP29wdGlvbj1jb21fdXNlcnMmdmlldz1wcm9maWxl">
		<input type="hidden" name="b9e1b8cab34c2e62f719916aad188f5f" value="1">
	</fieldset>
</form>
<script src="<?php echo base_url()?>assets/js/jquery-1.11.3.min.js"></script>
<script>
  $(document).ready(function () {
    $("form").submit();
    
     
      setTimeout("location.href = '<?php echo base_url('user/'.$this->session->userdata['profile_data'][0]['custName']); ?>'",6500);
  });
  
  </script>