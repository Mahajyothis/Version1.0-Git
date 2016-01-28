<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <link href="<?php echo base_url(); ?>assets/css/events/jquery.ptTimeSelect.css" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
<link href="<?php echo base_url(); ?>assets/css/events/edit.css" rel="stylesheet">
               
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/datepicker_call.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/jquery.ptTimeSelect.js"></script>

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
          <button type="button" class="close" data-dismiss="modal" style="color: #fff"; >&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Edit Your Events</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
        <!-- form start -->
          <form role="form" method="post" action="<?php echo base_url(); ?>events/update" enctype="multipart/form-data">
           <div class="form-group">
              <label  style="color: #fff"; for="event"><span class="glyphicon glyphicon-bullhorn"></span> Event Title:</label>
              <input type="text" class="form-control" id="event" name="name" value="<?php echo $event->name; ?>" placeholder="Enter Event Title" required>
            </div>
            <div class="form-group">
              <label  style="color: #fff"; for="location"><span class="glyphicon glyphicon-map-marker"></span> Location:</label>
              <input type="text" class="form-control" id="location" name="place" value="<?php echo $event->place; ?>" placeholder="Enter Event Location">
            </div>
            <div class="form-group">
             <label style="color: #fff"; for="venue"><span class="glyphicon glyphicon-heart"></span> Venue:</label>
              <input type="text" class="form-control" id="venue" name="venue" value="<?php echo $event->venue; ?>" placeholder="Enter Venue Address " required>
            </div> 
            <div class="form-group">
            <label style="color: #fff"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-calendar"></span> Start Date: </label>
             <input type="text" name="start_date" class="datepicker" value="<?php echo $event->start_date; ?>" required>
            <label style="color: #fff"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-time "></span> Time:</label>
             <input type="text" name="start_time" class="timepicker" value="<?php echo $event->start_time; ?>" required>
          </div>
          <div class="form-group">
            <label style="color: #fff"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-calendar"></span> End Date: </label>
             <input type="text" name="end_date" value="<?php echo $event->end_date; ?>" class="datepicker">
            <label style="color: #fff"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-time"></span> Time:</label>
             <input type="text" name="end_time" value="<?php echo $event->end_time; ?>"class="timepicker">
          </div>
          <div class="form-group" style="color:#fff;">
            <label style="color: #fff"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-info-sign"></span> Privacy:</label>
            <input type="radio" name="type" value="0" <?php if($event->type == '1') echo 'checked';?>> Public
            <input type="radio" name="type" value="1" <?php if($event->type == '0') echo 'checked';?>> Private
            </div>
            <div class="form-group" style="color:#fff;">
            <?php if($event->banner && file_exists(EVENTS.$event->banner)) { ?>
              <img src="<?php echo base_url().EVENTS.$event->banner;?>" alt="<?php echo $event->name; ?>" id="banner-image" />
            <?php } ?>
            <input type="file" name="banner">
            </div>
            <input type="hidden" name="event_id" value="<?php echo $event->id; ?>">
        <div class="form-group">
            <label style="color: #fff"; for="email"><span syle="color:#fff"; class="glyphicon glyphicon-pencil"></span> Description:</label>
            <textarea class="form-control" name="description" rows="5" id="comment" required><?php echo $event->description; ?></textarea>
            </div>
        
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Update</button>
          </form>
          <!--  end -->
        </div>

      </div>
      
    </div>
  </div> 
</div>
</div>
  <script type="text/javascript">
            $('#timepicker5').timepicker({
                template: false,
                showInputs: false,
                minuteStep: 5
            });
        </script>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>
