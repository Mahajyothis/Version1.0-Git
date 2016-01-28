        <form action="" method="" class="email-signup">
          <div class="form-group">

          <label class="col-md-3" for="first_name"><?php echo $lang['qualification']; ?>:</label>
          <div class="col-md-9">
          <select  class="form-control" id="qualification">
            <option value=""><?php echo $lang['select']; ?></option>
            <option value="Graduate"><?php echo $lang['graduate']; ?></option>
            <option value="Under Graduate"><?php echo $lang['under_graduate']; ?></option>
            <option value="others"><?php echo $lang['other']; ?></option>
          </select>
          <span class="error_msg"></span>
          </div>
   <p>&nbsp;</p>
        </div>
        <div class="form-group">
          <label class="col-md-3" for="Profession"><?php echo $lang['profession']; ?>:</label>
        <div class="col-md-9">
          <input class="form-control" id="profession" name="profession" class="form-control" type="text" placeholder="<?php echo $lang['enter_profession']; ?>" />
          <span class="error_msg"></span>
        </div>
        </div>
   <p>&nbsp;</p>

        <div class="form-group">
          <label class="col-md-3" for="Industry"><?php echo $lang['industry']; ?>:</label>
          <div class="col-md-9"> 
          <input class="form-control" id="industry" name="industry" type="text" placeholder="<?php echo $lang['enter_industry']; ?>" />
          <span class="error_msg"></span>

          </div>
        </div>
   <p>&nbsp;</p>

        <div class="form-group">
         <label class="col-md-3" for="Description"> <?php echo $lang['description']; ?>:</label> 
         <div class="col-md-9">
            <input class="form-control" id="description" name="description" type="text" placeholder="<?php echo $lang['enter_description']; ?>" />
            <span class="error_msg"></span>
        </div>
        </div>
        <input type="hidden" name="page" id="page" value="p3">

 <div class="nav-page">
   <span class="btn btn-mav nex" id="nex" ><i class="glyphicon glyphicon-hand-right"></i></span>
 </div>
      </form>
