<form method="post" class="email-signup" id="register_2" enctype="multipart/form-data" action="http://version.mahajyothis.net/registration/register_user" target="hidden_upload">

    <div class="media" style="border-bottom:1px solid #FA8B1F;margin-bottom:4px; padding: 3px;">
      <div class="col-md-4">
      <div class="media-left">
          <img src="<?php echo base_url().'/assets/img/male.png'; ?>" id="profile" class="media-object" width="80" height="100" />
      </div>
      </div>
      <div class="media-body">
       
        <h4 class="media-heading"><?php echo $lang['photo_upload']; ?> </h4>
        <input class="btn btn-mav btn-file" type="file" name="user_image" id="user_image" >
        <span class="error_msg"></span>
       	 
      </div>

    </div>

   <div class="form-group">
    <label class="col-md-3" for="first_name"><?php echo $lang['r_f_name']; ?>:</label>

    <div class="col-md-3">
    <input class="form-control" class="form-control" type="text" id="first_name" name="first_name" placeholder="<?php echo $lang['r_f_name_p']; ?>*" />
                  <span class="error_msg"></span>
    </div>

    <label class="col-md-3 text-right" for="last_name"><?php echo $lang['r_l_name']; ?>:</label>
    <div class="col-md-3">
    <input class="form-control" type="text" id="last_name" name="last_name" placeholder="<?php echo $lang['r_l_name_p']; ?>*" />
    <span class="error_msg"></span>
    </div>
  </div>
  <p>&nbsp;</p>
  <div class="form-group">
    <label class="col-md-3"> <?php echo $lang['gender']; ?>: </label> 
    <div class="col-md-4">
      <label class="col-md-2"> <?php echo $lang['male']; ?> </label> <div class="col-md-1"><input type="radio" class="" maxlength="2" name="gender" id="g_male" value="male" checked></div>
      <label class="col-md-3"> <?php echo $lang['female']; ?> </label> <div class="col-md-1"><input type="radio" class="" maxlength="2" name="gender" id="g_female" value="female"></div>
   </div>
 </div>
   <div class="form-group">
    <label class="col-md-2 text-right"> <?php echo $lang['dob']; ?>: </label>
      
    <div class="col-md-3">
      <input type="text" class="form-control"  name="dob" id="dob"  placeholder="Day" >
      <span class="error_msg"></span>
    </div>  
  </div>

<p>&nbsp;</p>
   <div class="form-group">
  <label class="col-md-3"><?php echo $lang['area_code']; ?>:</label>
  <div class="col-md-3">
    <input class="form-control" type="text" name="postal_code" id="postal_code" placeholder="<?php echo $lang['eac']; ?>*" />
    <span class="error_msg"></span>
  </div>
</div>
 <div class="form-group">
   <label class="col-md-3 text-right"><?php echo $lang['interested_in']; ?>: </label>
   <div class="col-md-3">
     <select class="form-control" name="intrest" id="intrest">
      <?php 		print_r($categories);	echo 'hi';								//$selectedCategories = $this->input->post('artCategory'); 
      if($categories){ 
      	foreach ($categories as $key => $value) { ?>	
      	<option  value="<?php echo $value->id;?>"><?php echo ucwords($value->name);?></option>
										<?php  
											}} ?>
     </select>
   </div>
 </div>
 <p>&nbsp;</p>


<div class="form-group">
  <label class="col-md-3"><?php echo $lang['location']; ?>:</label>
  <div class="col-md-2">
    <input class="form-control" type="text" name="district" id="district" placeholder="<?php echo $lang['enter_district']; ?>*" />
  <span class="error_msg"></span>
  </div>

  <div class="col-md-2">
    <input class="form-control" type="text" name="city" id="city" placeholder="<?php echo $lang['enter_city']; ?>*" />
    <span class="error_msg"></span>
  </div>

  <div class="col-md-2">
    <input class="form-control" type="text" name="state" id="state" placeholder="<?php echo $lang['enter_state']; ?>*" />
    <span class="error_msg"></span>
  </div>

  <div class="col-md-3">
    <input class="form-control" type="text" name="country" id="country" placeholder="<?php echo $lang['enter_country']; ?>*" />
    <span class="error_msg"></span>
  </div>
</div>
<p>&nbsp;</p>
<div class="form-group">
  <label class="col-md-3 "><?php echo $lang['address']; ?>:</label>
  <div class="col-md-9">
    <textarea class="form-control" type="text" name="address" id="address" rows="1" cols="12"></textarea>
        <span class="error_msg"></span>
  </div>
</div>
<input type="hidden" name="page" id="page" value="p2">
<input type="hidden" name="cust_id" id="cust_id" value="41">
<input type="hidden" name="reg" id="reg" value="2">

 <div class="nav-page">
   <button class="btn btn-mav nex" id="nex" type="submit"><i class="glyphicon glyphicon-hand-right"></i></span>
 </div> 
 
 
</form>
<iframe id="hidden_upload" name="hidden_upload" style="display:none" ></iframe>