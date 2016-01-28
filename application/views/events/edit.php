<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
  <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/> -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">    
  <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?>assets/css/events/jquery.ptTimeSelect.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/events/edit.css" rel="stylesheet">
               

</head>
<body>

<div class="container">
<!-- Modal content-->
	  <div class="row">
	  <div class="col-md-12">
	  <div class="col-md-2"></div>
	   <div class="col-md-8">
      <div class="modal-content" id="edit_container">
        <div class="modal-header" style="padding:16px 50px;">
          <a href="<?php echo base_url().'events/view/'.$this->custom_function->create_ViewUrl($event->id,$event->name) ?>"><button type="button" class="close" data-dismiss="modal" style="color: #fff"; >&times;</button></a>
          <h4><span class="glyphicon glyphicon-lock"></span> <?=$lang['edit-your-events'];?></h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
        <!-- form start -->
          <form role="form" method="post" action="" enctype="multipart/form-data">
          <?php if($this->session->flashdata('success')){ ?>      
            <div class="col-md-12 alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Congrats!</strong> <?php echo $this->session->flashdata('success');?>
            </div>
          <?php } ?>
            <?php if(!validation_errors()){ ?>
            <div class="col-md-12 alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <?=$lang['marked_with_star'];?>
            </div>
            <?php } ?>
           <div class="form-group">
              <label  style="color: #fff"; for="event"><span class="glyphicon glyphicon-bullhorn"></span> <?=$lang['event_title'];?>: <span class="mandatoryFields">*</span></label>
              <input type="text" class="form-control required" id="event" name="name" value="<?php echo $event->name; ?>" placeholder="Enter Event Title" required>
            </div>
            <div class="form-group">
              <label  style="color: #fff"; for="location"><span class="glyphicon glyphicon-map-marker"></span> <?=$lang['place'];?>: <span class="mandatoryFields">*</span></label>
              <input type="text" class="form-control required" id="location" name="place" value="<?php echo $event->place; ?>" placeholder="Enter Event Location">
            </div>
            <div class="form-group">
             <label style="color: #fff"; for="venue"><span class="glyphicon glyphicon-heart"></span> <?=$lang['venue'];?>: <span class="mandatoryFields">*</span></label>
              <input type="text" class="form-control required" id="venue" name="venue" value="<?php echo $event->venue; ?>" placeholder="Enter Venue Address " required>
            </div> 
            <div class="form-group">
            <label style="color: #fff"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-calendar"></span> <?=$lang['start_date'];?> <span class="mandatoryFields">*</span></label>
             <input type="text" name="start_date" class="datepicker required" value="<?php echo $event->start_date; ?>" required>
            <label style="color: #fff"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-time "></span> <?=$lang['time'];?>: <span class="mandatoryFields">*</span></label>
             <input type="text" name="start_time" class="timepicker required" value="<?php echo $event->start_time; ?>" required>
          </div>
          <div class="form-group">
            <label style="color: #fff;min-width: 92px;"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-calendar"></span> <?=$lang['end_date'];?>: </label>
             <input type="text" name="end_date" value="<?php echo $event->end_date; ?>" class="datepicker">
            <label style="color: #fff;min-width: 65px;"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-time"></span> <?=$lang['time'];?>:</label>
             <input type="text" name="end_time" value="<?php echo $event->end_time; ?>"class="timepicker">
          </div>
          <div class="form-group" style="color:#fff;">
            <label style="color: #fff"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-info-sign"></span> <?=$lang['privacy'];?>: <span class="mandatoryFields">*</span></label>
            <input type="radio" name="type" value="0" <?php if($event->type == '1') echo 'checked';?>> <?=$lang['public'];?>
            <input type="radio" name="type" value="1" <?php if($event->type == '0') echo 'checked';?>> <?=$lang['private'];?>
            </div>
            <div class="form-group" style="color:#fff;">
            <?php if($event->banner && file_exists(EVENTS.$event->banner)) { ?>
              <img src="<?php echo base_url().EVENTS.$event->banner;?>" alt="<?php echo $event->name; ?>" id="banner-image" />
            <?php } ?>
            <label style="color: #fff";> <span syle="color:#fff"; class="glyphicon glyphicon-info-sign "></span> <?=$lang['upload_image'];?>: <span class="mandatoryFields">*</span></label>
            <label for="eventImage"  id="chooseFile"><?=$lang['choose_an_image'];?></label>
            <input type="file" id="eventImage" class="hide required" name="banner">
            <p id="fileinfo"><?=$lang['maximum_image_size'];?> 400X250 px</p>
            <p id="fileErrorinfo"><?php if(!empty($up_res['img_error'])) echo $up_res['img_error'];?></p>
            </div>
            <input type="hidden" name="event_id" value="<?php echo $event->id; ?>">
        <div class="form-group">
            <label style="color: #fff"; for="email"><span syle="color:#fff"; class="glyphicon glyphicon-pencil required"></span> <?=$lang['description'];?>:  <span class="mandatoryFields">*</span></label>
            <textarea class="form-control" name="description" rows="5" id="comment" required><?php echo $event->description; ?></textarea>
            </div>
        
              <button type="submit" class="btn btn-success btn-block edit_btns" id="edit_update"><span class="glyphicon glyphicon-thumbs-up"></span> <?=$lang['update'];?></button>
              <a href="<?php echo base_url().'events/view/'.$this->custom_function->create_ViewUrl($event->id,$event->name) ?>"><button type="button" class="btn btn-danger btn-block  edit_btns" id="edit_cancel"><span class="glyphicon glyphicon-hand-left"></span> <?=$lang['cancel'];?></button>
          </form>
          <!--  end -->
        </div>

      </div>
      
    </div>
  </div> 
</div>
</div>
<!--
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>if (typeof jQuery === 'undefined') {
  document.write(unescape('%3Cscript%20src%3D%22<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js%22%3E%3C/script%3E'));
}
</script>
-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/datepicker_call.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/jquery.ptTimeSelect.js"></script>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });

    $('#timepicker5').timepicker({
                template: false,
                showInputs: false,
                minuteStep: 5
            });
});
</script>

</body>
</html>