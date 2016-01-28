<!doctype html>
<html lang="en">
    <head>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
        <link href="<?php echo base_url().CSS;?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url().CSS;?>business_services/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- Modal HTML FOR WHATSAPP -->
            
                            <!-- Whatsapp section -->
                            <section class="wappsection">
                            
                                
                                    <h1 class="wappheading text-center"><?php echo $lang['whatsapp_heading']; ?></h1>
                                    
                                    <section class="wappmesaanger">
                                    
                                        <div class="alert alert-success hide">
                                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                                            <strong><?php echo $lang['success']; ?>!</strong> <?php echo $lang['msg_sent']; ?>!
                                        </div>

                                        <form action="<?php echo base_url();?>business/send_whatsapp_msg" method="post"  class="form-horizontal" id="WhatsappMsg" enctype="multipart/form-data">
                                        
                                            <div class="form-group hide">
                                                <label for="Username" class="control-label col-xs-2 text-right"><?php echo $lang['from']; ?></label>
                                                <div class="col-xs-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                        <input type="text" class="form-control hide" placeholder="<?php echo $lang['mahajyothis']; ?>" readonly disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group hide">
                                                <label for="to" class="control-label col-xs-2 text-right"><?php echo $lang['to']; ?></label>
                                                <div class="col-xs-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                        <input type="text" class="form-control hide" name="reciepient" id="w-reciepient" value="919946372766" placeholder="<?php echo $lang['mobile_no']; ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="inputPassword" class="control-label col-xs-2 text-right"><?php echo $lang['msg']; ?></label>
                                                <div class="col-xs-10">
                                                        <textarea rows="4" name="message" id="w-message" value="Test"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="input-file" class="control-label col-xs-2 text-right"><?php echo $lang['image']; ?></label>
                                                <div class="col-xs-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>
                                                        <label for="input-file" class="control-label form-control wapp-control text-left"><?php echo $lang['upload_image']; ?> . . . </label>
                                                        <input id="input-file" name="image[]"  multiple type="file" class="file hide file-loading form-control w-files" >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="input-audio" class="control-label col-xs-2 text-right"><?php echo $lang['audio']; ?></label>
                                                <div class="col-xs-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-music"></span></span>
                                                        <label for="input-audio" class="control-label form-control wapp-control text-left"><?php echo $lang['upload_audio']; ?> . . .  </label>
                                                        <input id="input-audio" name="audio[]"  multiple type="file" class="file hide file-loading form-control w-files" >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="input-video" class="control-label col-xs-2 text-right"><?php echo $lang['video']; ?></label>
                                                <div class="col-xs-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-facetime-video"></span></span>
                                                        <label for="input-video" class="control-label form-control wapp-control text-left"><?php echo $lang['upload_video']; ?> . . . </label>
                                                        <input id="input-video" name="video[]" multiple type="file" class="file hide file-loading form-control w-files" >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="Location" class="control-label col-xs-2 text-right"><?php echo $lang['location']; ?></label>
                                                <div class="col-xs-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                                                        <input type="text" name="w-location" id="w-location" class="form-control" placeholder="<?php echo $lang['location_name']; ?>...">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="Latitude" class="control-label col-xs-2 text-right"></label>
                                                <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                                                        <input type="text" name="w-latitude" id="w-latitude" class="form-control" placeholder="<?php echo $lang['latitude']; ?>...">
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 longitude">
                                                    <div class="input-group">
                                                        <input type="text" name="w-longitude" id="w-longitude" class="form-control" placeholder="<?php echo $lang['longitude']; ?>...">
                                                    </div>
                                                </div>
                                                <div class="col-xs-1 wapplang">
                                                        <span class="input-group-addon" id="select-location"><span class="glyphicon glyphicon-screenshot"></span></span>
                                                </div>                      
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="Send" class="control-label col-xs-4 text-right"></label>
                                                <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <input type="button" value="<?php echo $lang['send']; ?>" name="doWhatsappMsg" class="btn btn-primary btn-send" id="doWhatsappMsg">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </form>
                                    
                                    </section>
                            
                            </section>
            <!-- Modal HTML FOR WHATSAPP Ends -->

    <!-- Business Service Scripts -->
    <script type="text/javascript" src="<?php echo base_url().JS; ?>jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().JS; ?>jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo base_url().JS; ?>bootstrap.min.js"></script>
    <script type="text/javascript"> 
      var base_url = "<?php echo base_url()?>";
      var images = base_url+"<?php echo IMAGES; ?>";
      var sending = "<?php echo $lang['sending']; ?> ";
      var be_patient = "<?php echo $lang['be_patient']; ?> ";
      var msg_sent = "<?php echo $lang['msg_sent']; ?> ";
       var city_name = "<?php echo $lang['city_name']; ?> ";
       var address_not_found = "<?php echo $lang['address_not_found']; ?> ";
        var geocoder_failed = "<?php echo $lang['geocoder_failed']; ?> ";
         var something_wrong = "<?php echo $lang['something_wrong']; ?> ";
          var file_limit = "<?php echo $lang['file_limit']; ?> ";
          var files = "<?php echo $lang['files']; ?> ";
          var send= "<?php echo $lang['send']; ?> ";
    </script>
    <script type="text/javascript" src="<?php echo base_url().JS;?>business_services/whatsapp.js"></script>
    <!-- Business Service Scripts Ends-->
</body>
</html>