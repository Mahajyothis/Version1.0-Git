<div class="modal fade" id="register" role="dialog">
  <div class="modal-dialog register-dialog">

    <!-- Modal content-->
    <div class="modal-content register-content">
      <div class="modal-header register-header">
        <button type="button" class="close" data-dismiss="modal" style="color: inherit; opacity: .9">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span><?php echo $lang['user_register']; ?></h4>
      </div>
      <div class="modal-body register-body" >
       <div class="head-page">
        <div class="page-nav">
          <span class="img-txt1 "><?php echo $lang['register_details']; ?></span>
          <span class="img-txt2 "><?php echo $lang['personal_details']; ?></span>
          <span class="img-txt2 "><?php echo $lang['professional_details']; ?></span>
          <span class="img-txt2 "><?php echo $lang['finish_details']; ?></span>
        </div>
        <!--h4 class="text-center register-form-name" style="color:limegreen"> Register Details</h4-->
      </div>  
      <div class="load_page">
       <?php $this->load->view('register1.php'); ?>     
     </div>       
   </div>        
 </div>  
 
</div>

</div>

