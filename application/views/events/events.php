<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Events</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/events/bootstrap.min.css" rel="stylesheet" type="text/css">
     <!-- Custom styles -->
    <link href="<?php echo base_url(); ?>assets/css/events/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/events/offcanvas.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/events/jquery.ptTimeSelect.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/events/jquery.tokenize.css" rel="stylesheet">
  </head>
   <!-- body -->
  <body>
    <!-- .Nav Bar -->
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <!-- <a class="navbar-brand" href="#">Project name</a>-->
        </div>
        <div id="navbar" class="collapse navbar-collapse">
         <!-- <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>-->
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
	<!-- Main container -->
    <div class="container-fluid container-pad">
	<!-- offcanvas -->
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><span class=" glyphicon glyphicon-search"></span></button>
          </p>
          <div class="profile-img">
               <div class="pf-pic">
              	 <a href="<?php echo base_url('user/'.$this->session->userdata['profile_data'][0]['custName']);?>">
                            <img src="<?php echo ($this->session->userdata['profile_data'][0]['photo'] && file_exists(UPLOADS.$this->session->userdata['profile_data'][0]['photo'])) ? base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'] : base_url().UPLOADS.'profile.png';?>" alt="<?php echo $this->session->userdata['profile_data'][0]['perdataFullName']; ?>">
                            <!-- <p id="pro_name"><?php echo ucwords($this->session->userdata['profile_data'][0]['perdataFullName']); ?></p> -->
                          </a>
               </div>
          </div>
          <div class="row btns-row">
             <div class="col-md-1">
           			 <button  class="btn-style1 add-events col-xs-12" id="myBtn"><span class="glyphicon glyphicon-calendar"></span><span><?php echo $lang['add_event'];?></span></button>
             </div>
            <div class="col-md-7">
                    <button  class="btn btn-style2 col-xs-12 <?php if($this->uri->segment(2) == '') echo 'active';?>"><span class="btn-arrows"></span><a href="<?php echo base_url();?>events" class="etitles"><?php echo $lang['events'];?></a></button>
                    <button  class="btn btn-style2 col-xs-12 <?php if($this->uri->segment(2) == 'own') echo 'active';?>"><span class="btn-arrows"></span><a href="<?php echo base_url();?>events/own" class="etitles"><?php echo $lang['my_events'];?></a></button>
                    <button  class="btn btn-style2 col-xs-12 <?php if($this->uri->segment(2) == 'public') echo 'active';?>"><span class="btn-arrows"></span><a href="<?php echo base_url();?>events/public" class="etitles"><?php echo $lang['public_events'];?></a></button>
                    <button  class="btn btn-style2 col-xs-12 <?php if($this->uri->segment(2) == 'private') echo 'active';?>"><span class="btn-arrows"></span><a href="<?php echo base_url();?>events/private" class="etitles"><?php echo $lang['my_network_events'];?></a></button>
                    <button  class="btn btn-style2 col-xs-12 <?php if($this->uri->segment(2) == 'interested') echo 'active';?>"><span class="btn-arrows"></span><a href="<?php echo base_url();?>events/interested" class="etitles"><?php echo $lang['interested _events'];?></a></button>
                    
           	 </div>
            <div class="col-md-4">
                  <div class="btns-right">
                        <button  class="btn btn-style3"><span class="right-btnss"><?php echo $lang['invited_events'];?></span><span class="btns-numbers"><?php echo $DashboardCounts->invited_events;?></span></button>
                        <button  class="btn btn-style3"><span class="right-btnss"><?php echo $lang['network_events'];?></span><span class="btns-numbers"><?php echo $DashboardCounts->network_events;?></span></button>
                        <button  class="btn btn-style3"><span class="right-btnss"><?php echo $lang['events'];?></span><span class="btns-numbers"><?php echo $DashboardCounts->own_events;?></span></button>
                        <button  class="btn btn-style3"><span class="right-btnss"><?php echo $lang['going'];?></span><span class="btns-numbers"><?php echo $DashboardCounts->going_events;?></span></button>
                        <button  class="btn btn-style3"><span class="right-btnss last-btnss"><?php echo $lang['may_be'];?></span><span class="btns-numbers last-btnss"><?php echo $DashboardCounts->maybe_events;?></span></button>
                  </div>
           	 </div>
          </div><!--/.col-xs-12.col-sm-9-->
          <div class="row">
           <div class="col-md-12 main-padding">
		   <?php if($events){
              foreach ($events as $key => $value) { ?>
        <div class="col-md-2 box-padding">
          <div class="thumbnail">
          <div class="col-md-12 mouse-over-desc">
           		 <div class="btn btns-hover center-block" id="user<?php echo $value->id; ?>">
					 <?php if($this->session->userdata['profile_data'][0]['custID'] != $value->custID) { 
						if(ISSET($value->raMessage) ){ ?>
                   <div class="col-md-6 col-xs-6 btn-rspmain">
                        <button  class="btn btn-style4 join-btn"><span class=""><?php echo ($value->raMessage == "JOINED") ? $lang['joined'] : $lang['may_be']; ?></span></button>
                   </div>
					<?php } else{ ?>
					<div id="join_status<?php echo $value->id; ?>">
					<div class="col-md-6 col-xs-6 btn-rspmain">
                        <button  class="btn btn-style4 join-btn acceptBtn event_join" id="<?php echo $value->id; ?>"><?php echo $lang['join'];?></button>
                   </div>
                    <div class="col-md-5  col-xs-6 btn-rspmain ">
                         <button  class="btn btn-style4 maybe-btn PendingBtn event_maybe" id="<?php echo $value->id; ?>"><?php echo $lang['may_be'];?></button>
                    </div>
					</div>
					<?php } } ?>
               </div>
          </div>
          <div class="thum-img">
              <img class="img-responsive" src="<?php echo ($value->banner && file_exists(EVENTS.'thumbs/'.$value->banner)) ? base_url().EVENTS.'thumbs/'.$value->banner : base_url().EVENTS.'thumbs/'.'default-event.png';?>" alt="<?php echo $value->name ?>"  draggable="false">
              <div class="favrs"><a href=""><span class="glyphicon glyphicon-heart"></span></a></div>
          </div>
           <div class="thum-content">
              <p> <span class="thum-titles"><?php echo $lang['description'];?></span>:<span><?php echo (strlen($value->description) > 15) ? substr($value->description,0,15).'..' : substr($value->description,0,15) ; ?></span>   </p>
               <p> <span class="thum-titles"><?php echo $lang['created_by'];?></span>:<span><?php echo ucwords($value->perdataFullName);?></span>  </p>
               <p> <span class="thum-titles"><?php echo $lang['date'];?></span>:<span><?php echo date("m/d/y g:i A", strtotime($value->start_date)); ?></span>        </p>
               <p> <span class="thum-titles"><?php echo $lang['venue'];?></span>:<span><?php echo $value->venue; ?></span>        </p>
            </div>
          </div>
        </div>
		   <?php } } else{ ?>
		  <div id="no-data-found"><?php echo $lang['sorry-no-events-found'];?></div>
		<?php }  ?>
        <!--<button class="btn pull-right next-btn" type="button">Next</button>
		<button class="btn pull-right privious-btn"  type="button">Privious</button>-->
		
        </div>
		<ul class="pagination">
		  <?php echo $pagination;?>
		</ul>
        
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-8 col-sm-3 sidebar-offcanvas" id="sidebar">
          <!-- .search-->
		 <div class="list-group">
           <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control search-bar" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger search-btn" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
	 <h5 class="notifications"><?php echo $lang['recent_activities'];?></h5>
		<?php  if($event_activity->num_rows()>=1){foreach($event_activity->result() as $row)  { ?>
            <a href="<?php echo base_url().'events/view/'.$this->custom_function->create_ViewUrl($row->id,$row->name); ?>" class="row list-group-item">
                <div class="col-md-2">
                    
                	<img src="<?php echo base_url(); ?>uploads/<?php if(ISSET($row->photo)){ echo $row->photo;}else{echo "profile.png";} ?>" class="img-circle search-image" alt="">
                     
                </div>
                <div class="col-md-10">
                	<span><?php echo $lang['you'];?></span><br>
                    <span><?php if($row->status==1){echo $lang['joined'];}else{echo $lang['may_be'];}?> <?php echo $row->name; ?> event on <?php echo $row->start_date;  ?></span>
                </div>
            </a>
			<?php  }} ?>
            <?php if($event_notifi->num_rows()>=1){ foreach($event_notifi->result() as $row)  { ?>
			<a href="<?php echo base_url().'events/view/'.$this->custom_function->create_ViewUrl($row->id,$row->name); ?>" class="row list-group-item">
                <div class="col-md-2">
                   
                	<img src="<?php echo base_url(); ?>uploads/<?php if(ISSET($row->photo)){ echo $row->photo;}else{echo "profile.png";} ?>" class="img-circle search-image" alt="">
                   
                </div>
                <div class="col-md-10">
                	<span><?php echo $row->perdataFullName;  ?></span><br>
                    <span><?php if($row->status==1){echo $lang['joined'];}else{echo "May be Join";}?> your <?php echo $row->name; ?> event on <?php echo $row->start_date;  ?></span>
                </div>
            </a>
			<?php  } }?>
		</div> <!-- / .search-->
        </div><!--/.sidebar-offcanvas-->
        
      </div><!--/row-->

  
	<!--.footer-->
     <footer class="row">
    	<div class="col-md-12 footer">
        
        </div>
	</footer>
	<!-- /.footer-->

    </div><!--/.Main container-->
	
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
	
	<div id="new-hidden-data" class="hide">
	<figure class="effect-oscar wowload fadeIn">
	  <img src="" alt=""/>
	  <figcaption>
		<h4></h4>
		<p>
		  <a href=""><i class="fa fa-search-plus fa-2x" style="color:#fff;"></i></a><br>
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/jquery.ptTimeSelect.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/datepicker_call.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/jquery.tokenize.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/events/offcanvas.js"></script>
    <script>
	function viewport() {
		var e = window, a = 'inner';
		if (!('innerWidth' in window )) {
			a = 'client';
			e = document.documentElement || document.body;
		}
		return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
	}
	function updateVw(){
		var vw = (viewport().width/100);
		jQuery('html').css({
			'font-size' : vw + 'px'
		});
	}
	jQuery(window).ready(function(){
		updateVw();
	});
	jQuery(window).resize(function(){
		updateVw();
	});
</script>
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
      
      $("#join_status"+pid).html("<button type='button' class='btn btn-info' style='float: left;margin-left: 50%;' ><?=$lang['joined'];?></button>");
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
      
      $("#join_status"+pid).html("<button type='button' class='btn btn-info' style='float: left;margin-left: 50%;' ><?=$lang['may_be'];?></button>");
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
