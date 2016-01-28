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
                            
                                
                                    <h1 class="wappheading text-center"><?php echo $lang['email_heading']; ?> </h1>
                                    
                                    <section class="wappmesaanger">
                                    
                                        <div class="alert alert-success hide">
                                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                                            <strong><?php echo $lang['success']; ?>!</strong> <?php echo $lang['msg_sent']; ?>!
                                        </div>

                                        <form method="post"  class="form-horizontal" id="textMessage">
                                                                                                                                
                                            <div class="form-group hide">
                                                <label for="to" class="control-label col-xs-2 text-right"><?php echo $lang['to']; ?></label>
                                                <div class="col-xs-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                        <input type="email" class="form-control" name="reciepient" id="t-reciepient" value="<?php echo $userData->emailID; ?>" placeholder="<?php echo $lang['email_p']; ?>.." >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                        <input type="text" class="form-control" name="subject" id="t-subject" value="" placeholder="<?php echo $lang['enter_subject']; ?>.." required >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <!-- <label for="inputPassword" class="control-label col-xs-2 text-right">Msg</label> -->
                                                <div class="col-xs-12">
                                                        <textarea rows="4" name="message" id="t-message" value="Test" required ></textarea>
                                                </div>
                                            </div>                                         
                                            
                                            
                                            <div class="form-group">
                                                <label for="Send" class="control-label col-xs-4 text-right"></label>
                                                <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <input type="button" value="<?php echo $lang['send']; ?>" name="doEmail" class="btn btn-primary btn-send" id="doEmail">
                                                    </div>
                                                </div>
                                                
                                                <!-- <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <button type="button" class="btn btn-danger btn-cancel">CANCEL</button>
                                                    </div>
                                                </div> -->
                                            </div>
                                            
                                        </form>
                                    
                                    </section>
                            
                            </section>
            <!-- Modal HTML FOR WHATSAPP Ends -->

    <!-- Business Service Scripts -->
    <script type="text/javascript" src="<?php echo base_url().JS; ?>jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().JS; ?>bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
    <script type="text/javascript"> 
      var base_url = "<?php echo base_url()?>";
      var aff_fields = "<?php echo $lang['aff_fields']; ?>";
      var sending = "<?php echo $lang['sending']; ?>";
      var send = "<?php echo $lang['send']; ?>";
      var no_suject= "<?php echo $lang['no_suject']; ?>";

      // CK Editor initialization
	CKEDITOR.replace( 'message' );
    </script>
    <script type="text/javascript" src="<?php echo base_url().JS;?>business_services/email.js"></script>
    <!-- Business Service Scripts Ends-->
</body>
</html>