<!DOCTYPE html>
<html lang="en">
  <head>
  <title><?php echo $lang['events'];?></title>
    <meta charset='utf-8' />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">    
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">    
    <link href="<?php echo base_url(); ?>assets/css/events/style.css" rel="stylesheet" type="text/css">    
    <link href="<?php echo base_url(); ?>assets/css/events/eventstyle1.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/events/jquery.ptTimeSelect.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/events/jquery.tokenize.css" rel="stylesheet">

  </head>
  
  <body>
  
    <!--side_bar-->
  <div class="col-md-12 total" style="padding-left: 0px;padding-right: 0px;">
  
            <div class="col-md-1 side_bar1" style="padding-left: 0px;padding-right: 0px; height:100%;">
            <div class="col-md-12 ico1">
               <a href="<?php echo base_url('user/'.$this->session->userdata['profile_data'][0]['custName']);?>"> <span style="text-decoration:none" href="#" class="fa fa-home fa-2x side"></span> </a>
              </div>
             <!-- 
              <div class="col-md-12 ico">
                <span style="text-decoration:none" href="#" class="fa fa-newspaper-o fa-2x side"></span>
              </div>
              
              <div class="col-md-12 ico">
                <span style="text-decoration:none" href="#" class="fa fa-calendar fa-2x side"></span>
              </div>
              
              <div class="col-md-12 ico">
                <span style="text-decoration:none" href="#" class="fa fa-pencil-square-o fa-2x side"></span>
              </div>
              <div class="col-md-12 ico">
                <span style="text-decoration:none" href="#" class="fa fa-cogs fa-2x side"></span>
              </div>  -->
              <div class="col-md-12 ico" id="myBtn" >
                <span style="text-decoration:none" href="#" class="fa fa-plus-square-o fa-2x side" data-toggle="tooltip" data-placement="right" title="<?php echo $lang['add_event'];?>" id="userNameField"> </span><br>              
              </div>        
            </div>
            <!--/side_bar-->
      <div class="col-md-11 right-div">
      <div class="row">
            <div class="col-md-10" style="padding:0px;">
      
              <div class="col-md-12" style="padding:0px;">
                    <div class="col-md-3" style="padding:0px">
                        <div class="col-md-12 proimg" style="padding-left: 0px;padding-right: 0px;">
                          <a href="<?php echo base_url('user/'.$this->session->userdata['profile_data'][0]['custName']);?>">
                            <img src="<?php echo ($this->session->userdata['profile_data'][0]['photo'] && file_exists(UPLOADS.$this->session->userdata['profile_data'][0]['photo'])) ? base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'] : base_url().UPLOADS.'profile.png';?>" class="img-square" alt="<?php echo $this->session->userdata['profile_data'][0]['perdataFullName']; ?>" style="width: 100%;height: 264px;">
                            <p id="pro_name"><?php echo ucwords($this->session->userdata['profile_data'][0]['perdataFullName']); ?></p>
                          </a>
                        </div>
                        <!--profile div-->
                        <div class="col-md-12 details">
                            <h6 id="head" style="margin-top: 10%;"><?php echo $lang['summary'];?></h6>
                            
                            <div class="col-md-6 left">
                             <h2 id="head2"><?php echo $DashboardCounts->invited_events;?></h2>
                              <h4 id="heada"><?php echo $lang['invited_events'];?></h4>
                            </div>
                            
                            <div class="col-md-6 right">
                              <h2 id="head2"><?php echo $DashboardCounts->network_events;?></h2>
                              <h4 id="heada"><?php echo $lang['network_events'];?></h4>
                            </div>
                              <div class="col-md-6 left1" style="padding-bottom: 0px;padding-top: 0px;height: 70px">
                                <img src="<?php echo base_url().IMAGES; ?>events/15.09.15/imh.png" style="height:50px;padding-left: 25%;padding-top: 10%">
                              </div>
                              <div class="col-md-6 right1">
                                <h2 id="head1"><?php echo $DashboardCounts->own_events;?></h2>
                                <h4 id="heada"><?php echo $lang['events'];?></h4>
                              </div>
                            <div class="col-md-6 left2">
                              
                              <h2 id="head1"><?php echo $DashboardCounts->going_events;?></h2>
                              <h4 id="heada"><?php echo $lang['going'];?></h4>
                            </div>
                            <div class="col-md-6 right2">
                              
                              <h2 id="head1"><?php echo $DashboardCounts->maybe_events;?></h2>
                              <h4 id="heada"><?php echo $lang['may_be'];?></h4>
                            </div>
                          <div class="col-md-12 allergies" style="margin-top:10px;">                                 
                            <div class="col-md-12 desies"><a href="<?php echo base_url();?>events"><h4 class="head_det"><?php echo $lang['events'];?></h4></a></div>                            
                            <div class="col-md-12 desies"><a href="<?php echo base_url();?>events/own"><h4 class="head_det"><?php echo $lang['my_events'];?></h4></a></div>                            
                            <div class="col-md-12 desies"><a href="<?php echo base_url();?>events/public"><h4 class="head_det"><?php echo $lang['public_events'];?></h4></a></div> 
                            <div class="col-md-12 desies"><a href="<?php echo base_url();?>events/private"><h4 class="head_det"><?php echo $lang['my_network_events'];?></h4></a></div>                            
                            <div class="col-md-12 desies"><a href="<?php echo base_url();?>events/interested"><h4 class="head_det"><?php echo $lang['interested _events'];?></h4></a></div>                            
                          </div>
                         </div>
                        </div>
                    <!--/profile div-->
                    <div class="col-md-8 eventback" >
                      <?php if($this->session->flashdata('flash_message')) { ?>
                        <div class="alert alert-success fade in" id="flash-message">
                              <a href="#" class="close" data-dismiss="alert">&times;</a>
                              <?php echo $this->session->flashdata('flash_message'); ?>
                        </div>
                      <?php } ?>
                      <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                        <img src="<?php echo base_url().IMAGES; ?>events/15.09.15/it2.jpg" style="width: 100%;height: 265px;">
                      </div>
                      
                      <!--event div-->
                    <div class="col-md-12 events" style="padding:0px">
                    
                      <div class="container1" >
         
                        <div class="col-md-12" id="class">                  
                            <div class="col-md-12 inner_section">
                              <div id="works"  class=" clearfix grid"> 
                              <?php if($events){
                                foreach ($events as $key => $value) { ?>
                                <figure class="effect-oscar  wowload fadeIn">
                                  <img src="<?php echo ($value->banner && file_exists(EVENTS.'thumbs/'.$value->banner)) ? base_url().EVENTS.'thumbs/'.$value->banner : base_url().EVENTS.'thumbs/'.'default-event.png';?>" alt="<?php echo $value->name ?>"/>
                                  <figcaption>
                                    <h4><?php echo $value->name; ?></h4>
                                     <p>
                
                                    <a href="<?php echo base_url().'events/view/'.$this->custom_function->create_ViewUrl($value->id,$value->name); ?>"><i class="fa fa-search-plus fa-2x" style="color:#fff;"></i></a><br>
                                    <?php if($this->session->userdata['profile_data'][0]['custID'] != $value->custID) { 
                  
    if(ISSET($value->raMessage) ){
      
    ?>
                   <button type="button" class="btn btn-info" style="margin:4%" ><?php 
                   if($value->raMessage == "JOINED") 
                   { 
                   	echo $lang['joined'];
                   }
                   else
                   {
                   	echo $lang['may_be'];
                   }
                   
                   
                   
                    ?></button>
                                                   
                  
                  <?php }else{ ?>
                  <span class="user<?php echo $value->id; ?>" id="<?php echo $value->custID; ?>">
                                   <span id="join_status<?php echo $value->id; ?>" > <button type="button" class="btn btn-success acceptBtn event_join"  id="<?php echo $value->id; ?>"><?php echo $lang['join'];?></button>
                                    <button type="button" class="btn btn-warning PendingBtn event_maybe" id="<?php echo $value->id; ?>"><?php echo $lang['may_be'];?></button></span>
                  
                                    <?php } }?>
                                   </p>
                                  </figcaption>
                 <div class="information">
                     <b class="txt_description"><?php echo $lang['description'];?>:</b><?php echo (strlen($value->description) > 15) ? substr($value->description,0,15).'..' : substr($value->description,0,15) ; ?><br>
                     <b class="txt_description"><?php echo $lang['created_by'];?>:</b><?php echo ucwords($value->perdataFullName);?><br>
                  <b class="txt_description"> <?php echo $lang['date'];?>-</b> <?php echo date("m/d/y g:i A", strtotime($value->start_date)); ?>
                  <span>|</span>
                                    <b class="txt_description"><?php echo $lang['venue'];?>-</b> <?php echo $value->venue; ?>
                 </div>
                                </figure>  
                                <?php }
                                } else{ ?>
                                  <div id="no-data-found"><?php echo $lang['sorry-no-events-found'];?></div>
                                <?php }  ?>
                                </div>     
                            </div>
                              
                        </div>
                             <ul class="pagination">
                              <?php echo $pagination;?>
                            </ul>
                              <div class="modal fade" id="myModal" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                              <div class="modal-content" style="background:rgba(10, 56, 88, 0.8)">
                              <div class="modal-header" style="padding:16px 50px;">
                                <button type="button" class="close" data-dismiss="modal" style="color: #fff"; >&times;</button>
                                <h4 style="color: #fff;"><span class="glyphicon glyphicon-lock"></span> <?php echo $lang['register_your_event'];?></h4>
                              </div>
                              <div class="modal-body" style="padding:40px 50px;height: 550px;overflow-y: scroll;">
        <!-- form start -->
          <form role="form" id="EventAddForm" method="post" action="<?php echo base_url(); ?>events/add" enctype="multipart/form-data">
            <div class="form-group">
              <p id="Validation_Error"></p>
            </div>
           <div class="form-group">
              <label  style="color: #fff"; for="event"><span class="glyphicon glyphicon-bullhorn"></span> <?php echo $lang['event_title'];?>: <span class="mandatoryFields">*</span></label>
              <input type="text" class="form-control required" id="event" name="name" placeholder="<?php echo $lang['event_title'];?> <?php echo $lang['write'];?>" required>
            </div>
            <div class="form-group">
              <label  style="color: #fff"; for="eventCategory"><span class="glyphicon glyphicon-star"></span> <?php echo $lang['event_category'];?>: <span class="mandatoryFields">*</span></label>
              <select id="tokenize" multiple="multiple" name="category[]" class="tokenize-sample form-control" required>
                <?php 
                //$selectedCategories = explode(',',$event->eventCategory);
                if($categories){
                  foreach ($categories as $key => $value) { ?>
                    <option value="<?php echo $value->id;?>"><?php echo ucwords($value->name);?></option>
                  <?php } 
                } ?>                  
              </select>
            </div>
            <div class="form-group">
              <label  style="color: #fff"; for="location"><span class="glyphicon glyphicon-map-marker"></span>  <?php echo $lang['place'];?>: <span class="mandatoryFields">*</span></label>
              <input type="text" class="form-control required" id="location" name="place" placeholder="<?php echo $lang['event'];?> <?php echo $lang['place'];?> <?php echo $lang['write'];?>" required>
            </div>
            <div class="form-group">
             <label style="color: #fff"; for="venue"><span class="glyphicon glyphicon-heart"></span>  <?php echo $lang['venue'];?>: <span class="mandatoryFields">*</span></label>
              <input type="text" class="form-control required" id="venue" name="venue" placeholder="<?php echo $lang['venue'];?> <?php echo $lang['address'];?> <?php echo $lang['write'];?>" required>
            </div> 
            <div class="form-group">
            <label style="color: #fff"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-calendar"></span>  <?php echo $lang['start_date'];?>: <span class="mandatoryFields">*</span></label>
             <input type="text" name="start_date" class="datepicker required" readonly required>
            <label style="color: #fff";> <span syle="color:#fff"; class="glyphicon glyphicon-time "></span>  <?php echo $lang['time'];?>: <span class="mandatoryFields">*</span></label>
             <input type="text" name="start_time" class="timepicker required" readonly required>
          </div>
          <div class="form-group">
            <label style="color: #fff;min-width: 98px;"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-calendar"></span>  <?php echo $lang['end_date'];?>: </label>
             <input type="text" name="end_date"  class="datepicker" readonly>
            <label style="color: #fff;min-width: 65px;"; for="date"> <span syle="color:#fff"; class="glyphicon glyphicon-time"></span>  <?php echo $lang['time'];?>:</label>
             <input type="text" name="end_time" class="timepicker" readonly>
          </div>
          <div class="form-group" style="color:#fff;">
            <label style="color: #fff";> <span syle="color:#fff"; class="glyphicon glyphicon-info-sign"></span>  <?php echo $lang['privacy'];?>: <span class="mandatoryFields">*</span></label>
            <input type="radio" name="type" value="1" checked> <?=$lang['private'];?>
            <input type="radio" name="type" value="0"> <?=$lang['public'];?>
            </div>
            <div class="form-group" style="color:#fff;">
            <label style="color: #fff";> <span syle="color:#fff"; class="glyphicon glyphicon-info-sign "></span>  <?php echo $lang['upload_image'];?>: <span class="mandatoryFields">*</span></label>
            <label for="eventImage"  id="chooseFile"><?php echo $lang['choose_an_image'];?></label>
            <input type="file" id="eventImage" class="hide" name="banner">
            <p id="fileinfo"><?php echo $lang['maximum_image_size'];?> 400X250 px</p>
            <p id="fileErrorinfo"></p>
            </div>
            
        <div class="form-group">
            <label style="color: #fff"; for="email"><span syle="color:#fff"; class="glyphicon glyphicon-pencil"></span> <?php echo $lang['description'];?>: <span class="mandatoryFields">*</span></label>
            <textarea class="form-control required" name="description" rows="5" id="comment" required></textarea>
            </div>

            <div class="form-group" style="color:#fff;">
          <label style="color: #fff" ;><span syle="color:#fff" ; class="glyphicon"></span> <?=$lang['captcha'];?>: <span class="mandatoryFields">*</span></label>
          <input type="text" name="captcha" id="captcha" autocomplete="off" class="form-control required" required />

          <div style="margin-top:10px">
            <img id="captcha_code" src="<?php echo base_url();?>article/get_captcha" />
            <button type="button" id="refreshCaptcha" style="background-color:#8B8B8B;border:0;padding:5px 10px;color:#FFF;float:left;"><?=$lang['new'];?> <?=$lang['captcha'];?></button>
          </div>
        </div>
        
              <button type="submit" class="btn btn-success btn-block" id="doSubmitEvent"><span class="glyphicon glyphicon-off"></span> <?php echo $lang['create'];?></button>
          </form>
          <!--  end -->
        </div>
                              <!-- <div class="modal-footer">
                                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> <?php echo $lang['cancel'];?></button>
                               
                   </div> -->
                   </div>
                   </div>
                   </div> 
                   </div>
                   </div>
                    <!--/sital div-->
                    </div>
                    </div>
            </div>
          <div class="col-md-2 serching" style=" padding-left: 0px;padding-right: 0px;width: 23.9%;height: 100vh;position: fixed;right: 0;">
          
            <div class="col-md-12 serch" style="padding-left:57px;padding-right: 12px;  padding-top: 10px;">
              <div class="input-group">
                  <input type="text" id="serchi" style="background-color:#e5e9ec;" class="form-control" placeholder="<?php echo $lang['search'];?>....." >
                  <span class="input-group-btn">
                    <button type="submit" id="serchi" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </span>
              </div>
            </div>
            
            <h4 id="title" style="margin-top: 60px;color:#fff;"><?php echo $lang['recent_activities'];?></h4>
            
      
   <?php  if($event_activity->num_rows()>=1){foreach($event_activity->result() as $row)  { ?>
      
           <a href="<?php echo base_url().'events/view/'.$this->custom_function->create_ViewUrl($row->id,$row->name); ?>"> <div class="col-md-12 activity" style="padding-left:0px">
              <div class="col-md-2 imgs" style="padding: 7%;">
                <img src="<?php echo base_url(); ?>uploads/<?php if(ISSET($row->photo)){ echo $row->photo;}else{echo "profile.png";} ?>"  id="proimg" style="width: 35px;border-radius:50%;">
              </div>  
              <div  class="col-md-10 content">
                <h5><strong><?php echo $lang['you'];?> </strong></h5>
                <h6><?php if($row->status==1){echo $lang['joined'];}else{echo $lang['may_be'];}?> <?php echo $row->name; ?> event on <?php echo $row->start_date;  ?></h6>
              </div>
            </div></a>
    <?php  }} ?>
            <?php if($event_notifi->num_rows()>=1){ foreach($event_notifi->result() as $row)  { ?>
      
           <a href="<?php echo base_url().'events/view/'.$this->custom_function->create_ViewUrl($row->id,$row->name); ?>"> <div class="col-md-12 activity" style="padding-left:0px">
              <div class="col-md-2 imgs" style="padding: 7%;">
                <img src="<?php echo base_url(); ?>uploads/<?php if(ISSET($row->photo)){ echo $row->photo;}else{echo "profile.png";} ?>"  id="proimg" style="width: 35px;border-radius:50%;">
              </div>  
              <div  class="col-md-10 content">
                <h5><strong><?php echo $row->perdataFullName;  ?></strong></h5>
                <h6><?php if($row->status==1){echo $lang['joined'];}else{echo "May be Join";}?> your <?php echo $row->name; ?> event on <?php echo $row->start_date;  ?></h6>
              </div>
            </div></a>
      <?php  } }?>
          </div>
  </div>
  </div>  
</div>  

<div id="new-hidden-data" class="hide">
<figure class="effect-oscar wowload fadeIn">
  <img src="" alt=""/>
  <figcaption>
    <h4></h4>
    <p>
      <a href="<?php echo base_url().'events/view/'.$this->custom_function->create_ViewUrl($value->id,$value->name); ?>"><i class="fa fa-search-plus fa-2x" style="color:#fff;"></i></a><br>
    </p>
  </figcaption>
  <div class="information">
    <b class="txt_description"><?php echo $lang['description'];?>:</b><br>
    <b class="txt_description"><?php echo $lang['created_by'];?>:</b><?php echo ucwords($this->session->userdata['profile_data'][0]['perdataFirstName'].' '.$this->session->userdata['profile_data'][0]['perdataLastName']);?><br>
    <b class="txt_description"> <?php echo $lang['date'];?>-</b><span>|</span>
    <b class="txt_description"><?php echo $lang['venue'];?>-</b>
  </div>
</figure>
</div>

  <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
      if (typeof jQuery === 'undefined') {
        document.write(unescape('%3Cscript%20src%3D%22<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js%22%3E%3C/script%3E'));
      }
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/jquery.ptTimeSelect.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/datepicker_call.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/jquery.tokenize.js"></script>
    <script>
      $(document).ready(function(){
        $("#myBtn").click(function(){
          $("#myModal").modal();
        });

        $('#tokenize').tokenize({
          newElements: false,
          displayDropdownOnFocus:true,
          //datas: "json.php"
        });
      });
    </script>
    <script type="text/javascript">
    var base_url = '<?php echo base_url();?>';
      $('#doSubmitEvent').on('click', function(e){
        captcha_validation = false;
        var curr =  $(this);
        var required = false;
        e.preventDefault();
        var fileErrorinfo = $('#fileErrorinfo');
        var Validation_Error = $('#Validation_Error');
        fileErrorinfo.html('');
        Validation_Error.html('');
        // Check category selected
        if(!$('#tokenize').val()){
          Validation_Error.html("<?=$lang['marked_with_star'];?>");
          required = true;
        }
        if(required === false){
          $('.required').each(function(){
                if(!$(this).val() && required == false){
                  Validation_Error.html("<?=$lang['marked_with_star'];?>");
                  $(this).focus();
                  required = true;
                }
          });
        }
        if(required === false){
          checkCaptcha();
          if(captcha_validation === false){
            required = true;
          }
        }
        if(required === false){
          curr.removeAttr('id');
          $("#EventAddForm").ajaxForm({ 
                  dataType: "json",
                  success : function (response) {
                      curr.attr('id','doSubmitEvent');
                      if(response.validation_err) Validation_Error.html(response.validation_err);
                      else if(response.img_error) fileErrorinfo.html(response.img_error);
                      else window.location.href = base_url+"events/own";
                  }
          }).submit();
        }
    });

    </script>
<script>
$('#userNameField').tooltip({
    'show': true,
        'placement': 'bottom',
        'title': "Add events"
});

$('#userNameField').tooltip('show');
</script>
  <script>
  $(document).ready(function(){
   $(document).on('click','button.event_join',function(){
  
var pid=$(this).attr('id');
  var status="1";
  var cid="<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
  var uID=$(".user"+pid).attr('id');

  var cat="EVENT";
  var act="JOINED";
  
    $.ajax({
          url: "<?php echo base_url();?>activity",
          type:"POST",
          data:{uid:uID,cid:cid,pid:pid,cat:cat,act:act,status:status}
        }).done(function( data ) {
      
      $("#join_status"+pid).html("<button type='button' class='btn btn-info' style='float: left;margin-left: 32%;' ><?=$lang['joined'];?></button>");
      return true;
        });   
  
 });
                               
    $(document).on('click','button.event_maybe',function(){ 
  
    var pid=$(this).attr('id');
  var status="2";
  var cid="<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
  var uID=$(".user"+pid).attr('id');

  var cat="EVENT";
  var act="Maybe Join";
  
    $.ajax({
          url: "<?php echo base_url();?>activity",
          type:"POST",
          data:{uid:uID,cid:cid,pid:pid,cat:cat,act:act,status:status}
        }).done(function( data ) {
      
      $("#join_status"+pid).html("<button type='button' class='btn btn-info' style='float: left;margin-left: 32%;' ><?=$lang['may_be'];?></button>");
      return true;
        }); 
  });                            
});

  </script> 

    <script type="text/javascript">
      function checkCaptcha(){
      $.ajax({
        url: base_url+"captcha/check",
        data:'captcha='+$("#captcha").val(),
        type: "POST",
        dataType: "json",
        async: false,
        success:function(data){
          if(parseInt(data) === 1) {
            captcha_validation = true;
          }
          else $("#captcha").focus();
        },
        error:function (){
          $("#captcha").focus();
        }
        });
    }

    $("#captcha_code").attr('src',base_url+'captcha/get_captcha');

    $(document).on('click','#refreshCaptcha',function(e){
      $("#captcha_code").attr('src',base_url+'captcha/get_captcha');
    });
  </script>

  </body>
  </html>