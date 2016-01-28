<form method="post" class="email-signup" id="register_2" enctype="multipart/form-data" action="http://version.mahajyothis.net/registration/register_user" target="hidden_upload">

    <div class="media" style="border-bottom:1px solid #FA8B1F;margin-bottom:4px; padding: 3px;">
      <div class="col-md-4">
      <div class="media-left">
          <img src="<?php echo 'http://'.$_SERVER[HTTP_HOST].'/assets/img/male.png'; ?>" id="profile" class="media-object" width="80" height="100" />
      </div>
      </div>
      <div class="media-body">
       
        <h4 class="media-heading">Please Upload Your Photo </h4>
        <input class="btn btn-mav btn-file" type="file" name="user_image" id="user_image" >
        <span class="error_msg"></span>
       	 
      </div>

    </div>

   <div class="form-group">
    <label class="col-md-3" for="first_name">First Name:</label>

    <div class="col-md-3">
    <input class="form-control" class="form-control" type="text" id="first_name" name="first_name" placeholder="First Name*" />
                  <span class="error_msg"></span>
    </div>

    <label class="col-md-3 text-right" for="last_name">Last Name:</label>
    <div class="col-md-3">
    <input class="form-control" type="text" id="last_name" name="last_name" placeholder="last Name*" />
    <span class="error_msg"></span>
    </div>
  </div>
  <p>&nbsp;</p>
  <div class="form-group">
    <label class="col-md-3"> Gender: </label> 
    <div class="col-md-4">
      <label class="col-md-2"> Male </label> <div class="col-md-1"><input type="radio" class="" maxlength="2" name="gender" id="g_male" value="male" checked></div>
      <label class="col-md-3"> Female </label> <div class="col-md-1"><input type="radio" class="" maxlength="2" name="gender" id="g_female" value="female"></div>
   </div>
 </div>
   <div class="form-group">
    <label class="col-md-2 text-right"> Birth Date: </label>
      
    <div class="col-md-3">
      <input type="text" class="form-control"  name="dob" id="dob"  placeholder="Day" >
      <span class="error_msg"></span>
    </div>  
  </div>

<p>&nbsp;</p>
   <div class="form-group">
  <label class="col-md-3">Area Code:</label>
  <div class="col-md-3">
    <input class="form-control" type="text" name="postal_code" id="postal_code" placeholder="enter area code*" />
    <span class="error_msg"></span>
  </div>
</div>
 <div class="form-group">
   <label class="col-md-3 text-right">Intrested In: </label>
   <div class="col-md-3">
     <select class="form-control" name="intrest" id="intrest">
       <option value="select">select</option>
       <option value="1">Yoga</option>
       <option value="2">Astrology</option>
       <option value="3">Other</option>
     </select>
   </div>
 </div>
 <p>&nbsp;</p>


<div class="form-group">
  <label class="col-md-3">Location:</label>
  <div class="col-md-2">
    <input class="form-control" type="text" name="district" id="district" placeholder="enter district*" />
  <span class="error_msg"></span>
  </div>

  <div class="col-md-2">
    <input class="form-control" type="text" name="city" id="city" placeholder="enter city*" />
    <span class="error_msg"></span>
  </div>

  <div class="col-md-2">
    <input class="form-control" type="text" name="state" id="state" placeholder="enter state*" />
    <span class="error_msg"></span>
  </div>

  <div class="col-md-3">
    <input class="form-control" type="text" name="country" id="country" placeholder="enter country*" />
    <span class="error_msg"></span>
  </div>
</div>
<p>&nbsp;</p>
<div class="form-group">
  <label class="col-md-3 ">Address:</label>
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

