<script>
      $(document).ready(function() {
        $('.overlay').overlay();
        $("a.fancybox").fancybox();
      });
    </script>
    <script>
$(document).ready(function() {
 $('#cmnt-area').hide();
  $('#up-fle').hide();
   $('#add-pst-vide').hide();
    $('#event-frmm').hide();
  $('#cmnt-boxx').css('cursor','pointer');
    $('#cmnt-boxx').click(function() {
        $('#cmnt-area').slideToggle();
    });
    $('#pst-even-mnu').click(function() {
         $('#add-pst-vide').hide();
          $('#pst-dsply-blck').hide();
    $('#event-frmm').show();
    });
     $('#pst-dsply-mnu').click(function() {
        $('#add-pst-vide').hide();
        $('#pst-dsply-blck').show();
        $('#event-frmm').hide();
        $(this).addClass('active');
        $('#pst-img-mnu').removeClass('active');
    });
     $('#pst-img-mnu').click(function() {
        $('#add-pst-vide').show();
        $('#pst-dsply-blck').hide();
        $('#event-frmm').hide();
        $(this).addClass('active');
        $('#pst-dsply-mnu').removeClass('active');
    });
     $('#write-something-cmnt').click(function() {
        $('#write-something-cmnt').css('height','75px');
        $('#up-fle').show();
    });
});
    </script>
    <script>
document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
    </script>
    <script type="text/javascript">
        var ajax_process = false;
        var thumbnail_url = "<?php echo base_url('uploads/events/post');?>/"; 
        var loader_img = "<?php echo base_url('assets/img');?>/loader_20.GIF"; 
        var hidden_new_post = $('#hidden_new_post');
        $(document).on('click','#submitPost',function(e){
            if(!ajax_process){
            e.preventDefault();
            var point = $(this);            
            var postContent = $('#write-something-cmnt').val();
            var postImage = $('#savedImagesName').val();
            var event_id = $('input#event-id').val();
            if(postContent != ''){
                ajax_process = true;
                point.val("<?php echo $lang['continuing'];?>");
                var dataString = 'doPost=true'+'&postContent='+postContent+'&postImage='+postImage+'&event_id='+event_id;
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>events/post",
                    data: dataString,
                    cache: false,
                    success: function(data){
                        data = parseInt(data);
                        if(data === 0) {
                            alert('Some error occured. Please try again'); 
                        }
                        else {
                            hidden_new_post.find('.postContent').html(postContent);
                            if(postImage != '') hidden_new_post.find('.postImage').html('<a href="' + thumbnail_url + postImage+'" class="fancybox"><img class="img-responsive" src="' + thumbnail_url + postImage+'" alt="'+postImage+'" />');
                                
                            else hidden_new_post.find('.postImage').html('');
                            hidden_new_post.children('.eventPosts').attr('id','singlePost_'+data);
                            hidden_new_post.find('.userActions').attr('id',data);
                             hidden_new_post.find('.user').attr('id',data);
                              hidden_new_post.find('.like').attr('id',data);
                               hidden_new_post.find('.unlike').attr('id',data);
                               hidden_new_post.find('.comment').attr('id',data);
                                  hidden_new_post.find('.cmnt-boxx').attr('id',data);
                                  hidden_new_post.find('.recent_count').attr('id','recent_comment_count'+data);
                                  //-----------------rohitdutta---------------------------------------------
                                  hidden_new_post.find('.display_event_id').attr('value',''+data);
                                  hidden_new_post.find('.total_count_comment').attr('id','t_c_c'+data);
                                  //hidden_new_post.find('.display_event_id').attr('data-posteventid',data);
                                  //------------------------------------------------------------------------
                                  hidden_new_post.find('.recent_com').attr('id','recent_comment'+data);                                 
                                  hidden_new_post.find('.cmnt_area').attr('id','cmnt-area_'+data);
                                  hidden_new_post.find('.comnt-post').attr('id','user_comment'+data);
                               hidden_new_post.find('.new_user_likes').attr('id','user_likes'+data);
                               hidden_new_post.find('.replace_like').attr('id','user_like'+data);
                            $('#allPosts').prepend(hidden_new_post.html());
                            // Reinitialize Values
                            $('#write-something-cmnt').val('');
                            $('input#uploadFile').val('');
                            $('#t-status-images-preview-wrapper').html('');
                            $('#savedImagesName').val('');

                            /* REinitialize Scrollbar */
                                $(".htmltile").mCustomScrollbar('destroy');
                                $(".htmltile").mCustomScrollbar({
                                 mouseWheelPixels: 300,
                                 theme: 'light-thick',
                                 scrollButtons: {
                                 enable: true
                                  },
                                  advanced: {
                                  autoExpandHorizontalScroll: true
                                    }
                                   });
                          
                          /* REinitialize Scrollbar Ends */
                          
                        }
                        point.val("<?php echo $lang['continue'];?>");
                        ajax_process = false;
                    }
                });
            }
            else{
                $('p.required_error').removeClass('hide');
            }
        }
        else alert("<?php echo $lang['please-wait'];?>");
        });

        $('#uploadBtn').on('change', function(){
            if(!ajax_process){
                var curr = $(this);
                var photos = curr.val();
                if(photos){
                    ajax_process = true;
                    curr.parent().after('<img id="loader" src="'+loader_img+'">');
                    $("#event-post-form").ajaxForm({ 
                            dataType: "json",
                            success : function (response) {
                                if(response){                            
                                    if(response.img_error) {
                                        alert(response.img_error);
                                    }
                                    else{
                                        $('input#savedImagesName').val(response);
                                        $('#t-status-images-preview-wrapper').html('<div class="singleImg"><img src="' + thumbnail_url + response + '" alt="'+ response +'"/><span class="deleteImages">[x]</span></div>');
                                    }
                                    curr.parent().siblings('img#loader').remove();
                                    ajax_process = false;
                            }
                        }
                    }).submit();
                }
            }
            else alert("<?php echo $lang['please-wait'];?>");
        });

        $('#uploadBtnPhoto').on('change', function(){
            if(!ajax_process){
                var curr = $(this);
                var photos = $(this).val();
                if(photos){
                    ajax_process = true;
                    curr.parent().after('<img id="loader" src="'+loader_img+'">');
                    $("#event-post-photo-form").ajaxForm({ 
                            dataType: "json",
                            success : function (response) {
                                if(response){                            
                                    if(response.img_error) {
                                        alert(response.img_error);
                                    }
                                    else{
                                    if(response.image != '') hidden_new_post.find('.postImage').html('<a href="' + thumbnail_url + response.image+'" class="fancybox"><img class="img-responsive" src="' + thumbnail_url + response.image+'" alt="'+response.image+'" /></a>');
                                    hidden_new_post.children('.eventPosts').attr('id','singlePost_'+response.comm_id);
                                    hidden_new_post.find('.userActions').attr('id',response.comm_id);
                                    
                                    hidden_new_post.find('.user').attr('id',response.comm_id);
                              hidden_new_post.find('.like').attr('id',response.comm_id);
                               hidden_new_post.find('.unlike').attr('id',response.comm_id);
                               hidden_new_post.find('.comment').attr('id',response.comm_id);
                                  hidden_new_post.find('.cmnt-boxx').attr('id',response.comm_id);
                                  hidden_new_post.find('.recent_count').attr('id','recent_comment_count'+response.comm_id);
                                   hidden_new_post.find('.recent_com').attr('id','recent_comment'+response.comm_id);                                 
                                  hidden_new_post.find('.cmnt_area').attr('id','cmnt-area_'+response.comm_id);
                                  hidden_new_post.find('.comnt-post').attr('id','user_comment'+response.comm_id);
                               hidden_new_post.find('.new_user_likes').attr('id','user_likes'+response.comm_id);
                               hidden_new_post.find('.replace_like').attr('id','user_like'+response.comm_id);
                                    
                                    
                                    $('#allPosts').prepend(hidden_new_post.html());
                                        
                                    }
                                    curr.parent().siblings('img#loader').remove();
                                    ajax_process = false;
                            }
                        }
                    }).submit();
                }
            }
            else alert("<?php echo $lang['please-wait'];?>");
        });

    $(document).on('click','.singleImg span.deleteImages',function(e){
        if(!ajax_process){
            var point = $(this);
            var action_area = $('#savedImagesName');
            if($(this).parent().parent().attr('id') === 'edit-t-status-images-preview-wrapper') action_area = $('#EditsavedImagesName');
            var image_name = action_area.val();
            if(image_name){
                ajax_process = true;
                var dataString = 'deleteStatusImage=true'+'&image_name='+image_name;
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>events/delete_image",
                    data: dataString,
                    cache: false,
                    success: function(data){
                        data = parseInt(data);
                        if(data === 1) {
                            point.parent().slideUp('slow',function(){
                                $(this).remove();
                            });
                            action_area.val('');
                        }
                        else alert('Some error occured. Please try again'); 
                        ajax_process = false;
                        
                    }
                });
            }
        }
       else alert("<?php echo $lang['please-wait'];?>");
    });


        $(document).on('click','.postDeleteConfirmation',function(e){
            var id = $(this).parent().parent().attr('id');
            $('#deletePostConfirmBtn').parent().attr('id',id);
        });
        
        $(document).on('click','#deletePostConfirmBtn',function(e){
            if(!ajax_process){
                ajax_process = true;
                var point = $(this);
                var id = $(this).parent().attr('id');
                var dataString = 'deletePost=true'+'&id='+id;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>events/post_delete",
                        data: dataString,
                        cache: false,
                        success: function(data){
                            data = parseInt(data);
                            if(data === 1) {
                                $('#singlePost_'+id).slideUp('slow',function(){
                                    $(this).remove();
                                    
                                });
                                point.parent().siblings('button').click();
                            }
                            else alert('Some error occured. Please try again'); 
                            ajax_process = false;
                            
                        }
                    });
            }
            else alert("<?php echo $lang['please-wait'];?>");
        });

        $(document).on('click','.editData',function(e){
            if(!ajax_process){
                ajax_process = true;
                var editPostPopDivision = $('#editPostPopDivision');
                // initialization
                editPostPopDivision.find('#edit-t-status-images-preview-wrapper').html('');
                editPostPopDivision.find('#edit-post-div').html();
                editPostPopDivision.find('#EditsavedImagesName').val('');
                var id = $(this).parent().parent().attr('id');
                var dataString = 'getPost=true'+'&id='+id;
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url(); ?>events/get_post',
                        data: dataString,
                        cache: false,
                        success: function(data){
                            if(data) {        
                                    if(data.postType != '1') editPostPopDivision.find('#edit-post-div').html('<textarea class="commnt-txtara" id="edit-cmnt" placeholder="<?=$lang['write_something'];?>">'+data.description+'</textarea><p class="required_error hide" style="color:#f00"><?=$lang['enter-some-text-to-continue'];?></p>');
                                    $('#editPostType').val(data.postType);
                                    if(!(data.file == '' || data.file == 'null')){
                                        editPostPopDivision.find('#edit-t-status-images-preview-wrapper').html('<div class="singleImg"><img src="' + thumbnail_url + data.file + '" alt="'+ data.postImage +'"/>');
                                        editPostPopDivision.find('#EditsavedImagesName').val(data.file);
                                    }
                                    editPostPopDivision.find('#editPostId').val(id);
                            }
                            else alert('Some error occured. Please try again'); 
                            ajax_process = false;
                            
                        }
                    });
            }
            else alert("<?php echo $lang['please-wait'];?>");
            
        });
        
        $('#editUploadBtn').on('change', function(){
            if(!ajax_process){
                var photos = $(this).val();
                if(photos){
                    ajax_process = true;
                    $("#edit-ts-box-image-upload-form").ajaxForm({ 
                            dataType: "json",
                            success : function (response) {
                                if(response){                            
                                    if(response.img_error) {
                                        alert(response.img_error);
                                    }
                                    else{
                                        $('input#EditsavedImagesName').val(response);
                                        $('#edit-t-status-images-preview-wrapper').html('<div class="singleImg"><img src="' + thumbnail_url + response + '" alt="'+ response +'"/><span class="deleteImages">[x]</span></div>');
                                    }
                            }
                            ajax_process = false;
                        }
                    }).submit();
                }
        }
        else alert("<?php echo $lang['please-wait'];?>");
    });

        $(document).on('click','#editSavePost',function(e){
            if(!ajax_process){
                e.preventDefault();
                var point = $(this);
                $('#singlePost_'+id).find('.postImage').html('');
                var postContent = '';
                var postType = $('#editPostType').val();
                if( postType == '0') postContent = $('#edit-cmnt').val();
                var postImage = $('#EditsavedImagesName').val();
                var id = $('#editPostPopDivision').find('#editPostId').val();
                if((postType == '0' && postContent != '') || (postType == '1') ){
                    ajax_process = true;
                    point.val('Saving..');
                    var dataString = 'doPost=true'+'&postContent='+postContent+'&postType='+postType+'&id='+id+'&postImage='+postImage;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>events/post_update",
                        data: dataString,
                        cache: false,
                        success: function(data){
                            data = parseInt(data);
                            if(data === 1) {
                                $('#singlePost_'+id).find('.postContent').html(postContent);
                                if(postImage != '') $('#singlePost_'+id).find('.postImage').html('<a href="' + thumbnail_url + postImage+'" class="fancybox"><img src="' + thumbnail_url + postImage + '" alt="'+ postImage +'"/></a>');
                                else $('#singlePost_'+id).find('.postImage').html('');
                                $('#editcloseBtn').click();
                            }
                            else alert('Some error occured. Please try again'); 
                            point.val('Save');
                            ajax_process = false;
                        }
                        
                    });
                }
                else{
                    $('p.required_error').removeClass('hide');
                }
            }
            else alert("<?php echo $lang['please-wait'];?>");
        });

    </script>
    /*sathish*/
    
     <script>
$(document).ready(function(){
$(document).on('click','span.like',function(){
 var catid=$(this).attr('id');
  var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
  var pid=$(".user"+catid).attr('id');
  var cat="EVENT";
  var act="LIKE";
  var page="recentactivity";
 
  $.ajax({
          url: "<?php echo base_url();?>like?cid="+cid+"&uid="+pid+"&cat="+cat+"&act="+act+"&page="+page+"&catid="+catid
        }).done(function( data ) {
      
       
    $("#user_like"+catid).html("<span id='user_unlike"+catid+"'><span class='small fa fa-thumbs-up unlike' id='"+catid+"' style='color:green'> <?php echo $lang['unlike'];?></span></span>");
  $("#user_likes"+catid).load('<?php echo base_url(); ?>groups/recent_like_count_event?id_event='+catid);
      return true;
        }); 
  
});

$(document).on('click','button.comment',function(){
  var pid=$(this).attr('id');
  var comment_user = $("#user_comment"+pid).val();

  if(comment_user == "")
  {
    $("#user_comment"+pid).focus();
    
    
  }
  else
  {
  
   //-------------------ROhitDutta-------------------------------------

                
                var n = $(this).siblings(".total_count_comment");
                n.val(Number(n.val())+1);

            var tot_val = $(this).siblings(".total_count_comment").val();
		//alert(tot_val);
                    if(tot_val > 4)
                    {
                        $(this).siblings("a.new_comments").show()
            
                    }
                    
        //=====================================================================
                    
                    var n = $(".total_count_comment_default"+pid);
                n.val(Number(n.val())+1);

            var tot_val_default = $(".total_count_comment_default"+pid).val();
    		//alert(tot_val_default)
                    if(tot_val_default > 4)
                    {
                        
            $('a.old_comments1'+pid).show()
            $("a.old_comments"+pid).hide()
                        
                    }
                    
   
   //-----------------------------------------------------------------
  
  
  

  var user_comment = $("#user_comment"+pid).val();
  var uid = $(".user"+pid).attr('id');
  var cid = "<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
  
    var cat="EVENT";
 
  var act="EVENTCOMMENT";
  
      if(user_comment!=''){
        $.ajax({
          url: "<?php echo base_url();?>activity?user_comment",
          type:"POST",
          data:{user_comment:user_comment,uid:uid,cid:cid,pid:pid,cat:cat,act:act}
        }).done(function( data ) {
  
   
      return true;
        });   
        $.ajax({
          url: "<?php echo base_url();?>groups/recent_comments"
          //url: "<?php echo base_url();?>Events/recent_comments"
        }).done(function( data ) {
       
   
//   $("#recent_comment"+pid).load('<?php echo base_url(); ?>Events/recent_comments_event?id_event='+pid);
   $("#recent_comment"+pid).load('<?php echo base_url(); ?>groups/recent_comments_event?id_event='+pid);
   $("#user_comment"+pid).val('');
      return true;
        });  
      $.ajax({
          
          //url: "<?php echo base_url();?>groups/recent_comment_count"
                    url: "<?php echo base_url();?>Events/recent_comment_count"

        }).done(function( data ) {
  
  $("#recent_comment_count"+pid).load('<?php echo base_url(); ?>groups/recent_comment_count_event?id_event='+pid);
  $("#total_comment_count"+pid).val('<?php echo base_url(); ?>groups/recent_comment_count_event?id_event='+pid);
  //$("#recent_comment_count"+pid).load('<?php echo base_url(); ?>Events/recent_comment_count_event?id_event='+pid);
  //$("#total_comment_count"+pid).val('<?php echo base_url(); ?>Events/recent_comment_count_event?id_event='+pid);

      return true;
        });  
        
        /* REinitialize Scrollbar */
                        $(".htmltile").mCustomScrollbar('destroy');
                        $(".htmltile").mCustomScrollbar({
                         mouseWheelPixels: 300,
                         theme: 'light-thick',
                         scrollButtons: {
                         enable: true
                          },
                          advanced: {
                          autoExpandHorizontalScroll: true
                            }
                           });
                          
                          /* REinitialize Scrollbar Ends */
        
      } 
    $("#user_comment"+pid).focus();
  
    }
 });
 $('.cmnt-boxx').click(function() {
                          var id=$(this).attr('id');
                          $('#cmnt-boxx_'+id).css('cursor','pointer');
                          $('#cmnt-area_'+id).slideToggle();
                               });
                               $(document).on('click','button.join',function(){
var pid=$(this).attr('id');
  var status="1";
  var cid="<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
  var uID=$(".joinuser").attr('id');

  var cat="EVENT";
  var act="JOINED";
  
    $.ajax({
          url: "<?php echo base_url();?>activity",
          type:"POST",
          data:{uid:uID,cid:cid,pid:pid,cat:cat,act:act,status:status}
        }).done(function( data ) {
      
      $("#join_status").html("<button type='button' class='btn btn-info' style='float: left;  margin-left: 18%;' >Joined</button>");
      return true;
        });   
  
  
  
 });
                               
    $(document).on('click','button.maybe',function(){
  
    var pid=$(this).attr('id');
  var status="2";
  var cid="<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
  var uID=$(".joinuser").attr('id');
  var cat="EVENT";
  var act="Maybe Join";
      $.ajax({
          url: "<?php echo base_url();?>activity",
          type:"POST",
         data:{uid:uID,cid:cid,pid:pid,cat:cat,act:act,status:status}
        }).done(function( data ) {
      
      $("#join_status").html("<button type='button' class='btn btn-info' style='float: left;  margin-left: 18%;' >May be Join</button>");
      return true;
        });   
  
  
  
  }); 
  
  
  
                             
});

  </script> 
    
    
    /*sathish end */
    
    <script>
    //--------------------------------------------RohitDutta-----------------------------------------
     $(document).on('click','a.view_more_event_comments',function()
     {
 
    var curr= $(this);

    //var pid = curr.siblings("input.display_event_id").val();
    var pid = curr.attr("data-posteventid");
    //alert(pid)
    
    
    $.ajax({
          url: "<?php echo base_url();?>Events/null?event_post_id="+pid
        }).done(function( data ) {
       
           $("#recent_comment"+pid).load('<?php echo base_url(); ?>Events/display_comments_event?id_event='+pid);

           return true;
        });
        
    curr.hide()
        
  
     });
     
    //=========================================================================== 
     
     $(document).on('click','a.new_com',function()
     {
 
    var curr= $(this);

    var pid = curr.siblings("input.display_event_id").val();
    //var pid = curr.attr("data-posteventid");
    //alert(pid)
    
    
    $.ajax({
          url: "<?php echo base_url();?>Events/null?event_post_id="+pid
        }).done(function( data ) {
       
           $("#recent_comment"+pid).load('<?php echo base_url(); ?>Events/display_comments_event?id_event='+pid);

           return true;
        });
        
    curr.hide()
        
  
     });
    //----------------------------------------------------------------------------------------------
    </script>
    //-----------------------------Event status Change--------------------------------//
     <script>
															$(document).ready(function(){
															$(document).on('change','.maybe',function(){
														 var pid=$(this).attr('id');
														  var act=$("#"+pid).val();
														  var cid="<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
														  var uID=$(".eventuser"+pid).attr('id');
														  var cat="EVENT";
														 var status=$("#"+pid).val();
														 
														 $.ajax({
														  url: "<?php echo base_url();?>activity/event_status_change?uid="+uID+"&cid="+cid+"&pid="+pid+"&cat="+cat+"&act="+act+"&status="+status
														  
															}).done(function( data ) {
															$('.status_change_notification').show();
															setTimeout("$('.status_change_notification').fadeOut('slow')", 5000);			  
															
															 return true;
															});   
																					
															});
															$(document).on('change','.joining',function(){
														 var pid=$(this).attr('id');
														  var act=$("#"+pid).val();
														  var cid="<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
														  var uID=$(".eventuser"+pid).attr('id');
														  var cat="EVENT";
														 var status=$("#"+pid).val();
														 
														 $.ajax({
														  url: "<?php echo base_url();?>activity/event_status_change?uid="+uID+"&cid="+cid+"&pid="+pid+"&cat="+cat+"&act="+act+"&status="+status
															}).done(function( data ) {
															$('.status_change_notification').show();
															setTimeout("$('.status_change_notification').fadeOut('slow')", 5000);				  
															
															 return true;
															});   
																					
															});
															
															
															
																																			
															});
															</script>
															
															
															
															<script>
        //-----------------Rohitdutta-------------------

        //This script is for delete the forum single comment only

        $(document).on('click','.deleteComment',function(e)
        {
            var comment_id = $(this).attr("data-comment");
   	   var datapostid = $(this).attr("data-p");

            $('#deleteComment').find('.ForDeleteComment').attr('id',comment_id);
             $('#deleteComment').find('.ForDeleteComment').attr('data-postid',datapostid);



        });



        $(document).on('click','#del',function(e)
        {

            var comment_id = $(this).parent().attr('id');

          var pid = $(this).parent().attr('data-postid');
          
          
          
           var n = $("#t_c_c"+pid);
                n.val(Number(n.val())-1);

           
                    
                    var n = $(".total_count_comment_default"+pid);
                n.val(Number(n.val())-1);
          
          
          
            var dataString = 'comment_id='+comment_id;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>Groups/delete_single_comment",

                data: dataString,
                cache: false,
                success: function(data)
                {

                    $('#subcomment_'+comment_id).fadeOut();
                   

                }
            });
            $.ajax({
          
          url: "<?php echo base_url();?>groups/recent_comment_count"
        }).done(function( data ) {
  
  $("#recent_comment_count"+pid).load('<?php echo base_url(); ?>groups/recent_comment_count_event?id_event='+pid);


      return true;
        });  
        


        });







        $(document).on('click','#editCommentBtn',function(e)
        {

            var comment_id = $(this).parent().attr('id');


           
            var comment_value = $('#edit_single_comment').val();


           
	   if(comment_value != '')
	   {

            var dataString = 'comment_id='+comment_id+'&comment_value='+comment_value;

            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>Groups/edit_single_comment",

                data: dataString,
                cache: false,
                success: function(data)
                {


                    $('#singlcomment_'+comment_id).html(comment_value);

                    $('#cancelAtEditComment').click();




                }
            });
            }
            else
            {
            	$("#edit_single_comment").focus();
            }



        });














        $(document).on('click','.editComment',function(e)
        {



            var comment_id = $(this).attr("data-commentid");

            var comment_value = $(this).attr("data-commentonly");


           

            var dataString = 'comment_id='+comment_id+'&comment_value='+comment_value;

            var EditSingleComment = $("#editComment");


            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>Groups/get_single_comment",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data)	{

                    EditSingleComment.find('.for_comment_id').attr('id',data[0].uaID);
                    EditSingleComment.find('#edit_single_comment').val(data[0].uaDescription);


                }
            });


        });

        //----------------------------------------------
    </script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    