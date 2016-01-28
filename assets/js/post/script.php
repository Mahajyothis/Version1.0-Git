<script type="text/javascript">
var ajax_process = false;
var uri_segment = '<?php echo $this->uri->segment('2');?>';
    $(document).ready(function(){
    // Call fancybox
        $("a.fancybox").fancybox();
        
        var thumbnail_url = '<?php echo base_url();?>uploads/post/';


        var auto_load_div = $('div#last_msg_loader');
        var limit = 4;
        var offset = '<?php echo $this->config->item('page_userlist_limit')?$this->config->item('page_userlist_limit'):'3'; ?>';
        var request_ajax = true;
        var ajax_is_on = false;
        var last_scroll_top = 0;
        var hidden_new_post = $('#hidden_new_post');
        var type = '<?php echo $type; ?>';

        $('#main').scroll(function(event) {
            var last_id = $('div#allPosts .singlePost:last').attr('id');
            last_id = parseInt(last_id.replace('singlePost_',''));
            //if(last_id){
                var st = $(this).scrollTop();

                if(st > last_scroll_top){
                    if($('#main').scrollTop() + $(window).height() == $('#main')[0].scrollHeight) {
                        if (request_ajax === true && ajax_is_on === false) {
                        
                            ajax_is_on = true; 
                            //auto_load_div.removeClass('hide');
                            auto_load_div.fadeIn('slow',function(){
                                            $(this).removeClass('hide');
                                        });
                            var dataString = 'getPosts=true&last_id='+last_id+'&type='+type;
                            $.ajax({
                                url: "<?php echo base_url(); ?>ajax/status_autoload",
                                data: dataString,
                                type: 'post',
                                dataType: "json",
                                success: function(data) {
                                    if( !$.isArray(data) ||  !data.length ) {
                                        request_ajax = false;
                                        auto_load_div.html('No More Data');
                                    }
                                    else{ 

                                        $.each(data, function(i, item) {
                                            $('#allPosts').append(item);
                                            
                                            
                                            
                                            
                                        });
                                        auto_load_div.fadeOut('slow',function(){
                                            $(this).addClass('hide');
                                        });
                                        
                                        //auto_load_div.addClass('hide');

                                    } 
                                    ajax_is_on = false;
                                }
                            });
                        }
                    }
                }
                last_scroll_top = st;
            //}
        });
    $(document).on('click','#new_post',function(e){
            $('#exampleModal').find('input#savedImagesName').val('');
            $('#exampleModal').find('#postContent').val('');
            $('#t-status-images-preview-wrapper').html('')
        });

    $(document).on('click','#submitPost',function(e){
        if(!ajax_process){
            e.preventDefault();
            var point = $(this);
            var hidden_new_post = $('#hidden_new_post');
            var postContent = $('#postContent').val();
            var postType = $('#postType').val();
            var postImage = $('#savedImagesName').val();
            if(postContent != ''){
                ajax_process = true;
                point.val("<?= $language['posting'];?>");
                var dataString = 'doPost=true'+'&postContent='+postContent+'&postType='+postType+'&postImage='+postImage;
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>post/create",
                    data: dataString,
                    cache: false,
                    success: function(data){
                        data = parseInt(data);
                        if(data === 0) {
                            alert('Some error occured. Please try again'); 
                        }
                        else {
							if(uri_segment == 'public' && postType == 1) window.location.href = '<?php echo base_url(); ?>post/private';
							else if(uri_segment == 'private' && postType == 0) window.location.href = '<?php echo base_url(); ?>post/public';
							else{
								hidden_new_post.find('.postContent').html(postContent);
								if(postImage != '') hidden_new_post.find('.postImage').html('<a href="<?php echo base_url().POSTS; ?>'+postImage+'" class="fancybox"><img src="<?php echo base_url().POSTS; ?>'+postImage+'" alt="'+postImage+'" />');
								else hidden_new_post.find('.postImage').html('');
								hidden_new_post.children('.singlePost').attr('id','singlePost_'+data);
								hidden_new_post.find('.userActions').attr('id',data);
								hidden_new_post.find('.user').attr('id','user'+data);
								hidden_new_post.find('.comnt-post').attr('id','user_comment'+data);
								hidden_new_post.find('.user_comment').attr('id',data);
								 hidden_new_post.find('.user_like').attr('id',data);
									hidden_new_post.find('.recent_com').attr('id','recent_comment'+data);
									 hidden_new_post.find('.new_liked_post').attr('id','user_like'+data);
									 hidden_new_post.find('.new_user_likes').attr('id','user_likes'+data);
										hidden_new_post.find('.recent_count').attr('id','recent_comment_count'+data);
											
								//----------------------RohitDutta------------------------------
								 //hidden_new_post.find('.increment_id').attr('value',''+data);
								 hidden_new_post.find('.new_comments').attr('data-postpostid',''+data);
								 hidden_new_post.find('.loading_img_sub').attr('id','loading_img_sub'+data);

								//--------------------------------------------------------------                         
								
								if(postType == '1') hidden_new_post.find('.userActions small.showPostType').html('<img src="<?php echo base_url().IMAGES;?>post/private.png" title="Private Post" alt="Private Post">');
								else hidden_new_post.find('.userActions small.showPostType').html('');
								$('#allPosts').prepend(hidden_new_post.html());
								$('#postContent').val('');
								$('#closeBtn').click();
								$('#main').animate({ scrollTop: 0 }, "slow");
							}
							
                        }
                        point.val("<?= $language['post'];?>");
                        ajax_process = false;
                    }
                });
            }
            else{
                $('p.required_error').removeClass('hide');
            }
        }
        else alert('Please wait until the current process to complete !');
    });

        $(document).on('click','.singleImg span.deleteImages',function(e){
            if(!ajax_process){
                var point = $(this);
                if(point.parent().parent().attr('id') == 't-status-images-preview-wrapper'){
                    var action_area = $('#savedImagesName');
                }
                else{
                    var action_area = $('#EditsavedImagesName');
                }
                var image_name = action_area.val();
                if(image_name){
                    ajax_process = true;
                    var dataString = 'deleteStatusImage=true'+'&image_name='+image_name;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>post/delete_image",
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
            else alert('Please wait until the current process to complete !');
        });
        
        $(document).on('click','.deleteConfirmation',function(e){
            var id = $(this).parent().parent().attr('id');
            $('#deleteConfirmBtn').parent().attr('id',id);
        });
        
        $(document).on('click','#deleteConfirmBtn',function(e){
            if(!ajax_process){
                ajax_process = true;
                var point = $(this);
                var id = $(this).parent().attr('id');
                var dataString = 'deletePost=true'+'&id='+id;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>post/delete",
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
            else alert('Please wait until the current process to complete !');
            
        });
        
        $(document).on('click','.editData',function(e){
            if(!ajax_process){
                ajax_process = true;
                var editPostPopDivision = $('#editPostPopDivision');
                var id = $(this).parent().parent().attr('id');
                var dataString = 'getPost=true'+'&id='+id;
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url(); ?>post/get_post',
                        data: dataString,
                        cache: false,
                        success: function(data){
                            if(data) {          
                                    editPostPopDivision.find('textarea').val(data.postContent);
                                    if(!(data.postImage == '' || data.postImage == 'null')){
                                        editPostPopDivision.find('#edit-t-status-images-preview-wrapper').html('<div class="singleImg"><img src="' + thumbnail_url + data.postImage + '" alt="'+ data.postImage +'"/><span class="deleteImages">[x]</span></div>');
                                        editPostPopDivision.find('#EditsavedImagesName').val(data.postImage);
                                    }
                                    editPostPopDivision.find('select option[value='+data.postType+']').prop('selected', true); 
                                    editPostPopDivision.find('#editPostId').val(id);
                            }
                            else alert('Some error occured. Please try again'); 
                            ajax_process = false;
                        }
                    });
            }
            else alert('Please wait until the current process to complete !');
            
        });
        
        $(document).on('click','#editSavePost',function(e){
            if(!ajax_process){
                e.preventDefault();
                var point = $(this);
                var postContent = $('#editPostContent').val();
                var postType = $('#editPostType').val();
                var postImage = $('#EditsavedImagesName').val();
                var id = $('#editPostPopDivision').find('#editPostId').val();
                if(postContent != ''){
                    ajax_process = true;
                    point.val('Saving..');
                    var dataString = 'doPost=true'+'&postContent='+postContent+'&postType='+postType+'&id='+id+'&postImage='+postImage;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>post/update",
                        data: dataString,
                        cache: false,
                        success: function(data){
                            data = parseInt(data);
                            if(data === 1) {
                                $('#singlePost_'+id).find('.postContent').html(postContent);
                                if(postImage != '') $('#singlePost_'+id).find('.postImage').html('<a href="' + thumbnail_url + postImage + '" class="fancybox"><img src="' + thumbnail_url + postImage + '" alt="'+ postImage +'"/></a>');
                                else $('#singlePost_'+id).find('.postImage').html('');
                                if(postType == '1') $('#singlePost_'+id).find('.userActions small.showPostType').html('<img src="<?php echo base_url().IMAGES;?>post/private.png" title="Private Post" alt="Private Post">');
                                else $('#singlePost_'+id).find('.userActions small.showPostType').html('');
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
            else alert('Please wait until the current process to complete !');
        });

        // STATUS PICTURE UPLOAD - TRIGGER ON SELECTING PICTURE
    $('#uploadTimeLinePostImages').on('change', function(){
        if(!ajax_process){
            var photos = $(this).val();
            var loaders = '';
            if(photos){
                ajax_process = true;
                //$('input#UploadType').val('image');
                for (var i = 0; i < $(this).get(0).files.length; i++) {
                    loaders += '<div class="ts-loader"><img class="loading_img" src="<?php echo base_url();?>assets/img/preloader.gif" /></div>';
                };
                $('#t-status-images-preview-wrapper').append(loaders);
                $("#ts-box-image-upload-form").ajaxForm({ 
                        dataType: "json",
                        success : function (response) {
                            if(response){                            
                                $('#t-status-images-preview-wrapper .ts-loader').remove();
                                if(response.img_error) {
                                    alert(response.img_error);
                                }
                                else{
                                    $('#exampleModal').find('input#savedImagesName').val(response);
                                    $('#t-status-images-preview-wrapper').html('<div class="singleImg"><img src="' + thumbnail_url + response + '" alt="'+ response +'"/><span class="deleteImages">[x]</span></div>');
                                }
                        }
                        ajax_process = false;
                    }
                }).submit();
            }
        }
        else alert('Please wait until the current process to complete !');
    });

 // STATUS PICTURE UPLOAD - EDIT - TRIGGER ON SELECTING PICTURE
    $('#EdituploadTimeLinePostImages').on('change', function(){
        if(!ajax_process){
            var photos = $(this).val();
            var loaders = '';
            if(photos){
                ajax_process = true;
                //$('input#UploadType').val('image');
                for (var i = 0; i < $(this).get(0).files.length; i++) {
                    loaders += '<div class="ts-loader"><img class="loading_img" src="<?php echo base_url();?>assets/img/preloader.gif" /></div>';
                };
                $('#edit-t-status-images-preview-wrapper').append(loaders);
                $("#edit-ts-box-image-upload-form").ajaxForm({ 
                        dataType: "json",
                        success : function (response) {
                            if(response){                            
                                $('#edit-t-status-images-preview-wrapper .ts-loader').remove();
                                if(response.img_error) {
                                    alert(response.img_error);
                                }
                                else{
                                    $('#editPostPopDivision').find('input#EditsavedImagesName').val(response);
                                    $('#edit-t-status-images-preview-wrapper').html('<div class="singleImg"><img src="' + thumbnail_url + response + '" alt="'+ response +'"/><span class="deleteImages">[x]</span></div>');
                                }
                        }
                        ajax_process = false;
                    }
                }).submit();
            }
        }
        else alert('Please wait until the current process to complete !');
    });



$(document).on('click','span.sub_sub_user_like',function(){
    var catid=$(this).attr('id');
    var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
    var pid=$(".sub_user"+catid).attr('id');
    var cat="POST";
    var act="SUB_SUB_LIKE";
    var page="recentactivity";
    
    $.ajax({
          url: "<?php echo base_url();?>like?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid
        }).done(function( data ) {
            
    $("#user_sub_like"+catid).html('<span id="user_sub_unlike'+catid+'"><span class="small  fa fa-thumbs-up sub_sub_user_unlike" style="color:green" id="'+catid+'"> <?= $language["unlike"];?></span>'); 
     $("#user_sub_likes"+catid).load('<?php echo base_url(); ?>post/recent_sub_sub_like_count?id_post='+catid);
          return true;
        }); 
    }
);


$(document).on('click','span.user_like',function(){

var catid=$(this).attr('id');

    var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
        var pid=$(".user"+catid).attr('id');
    var cat="POST";
    var act="LIKE";
    var page="recentactivity";
    
    $.ajax({
          url: "<?php echo base_url();?>like?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid
        }).done(function( data ) {
            
            
    $("#user_like"+catid).html("<span id='user_unlike"+catid+"'><span class='small fa fa-thumbs-up unlike' id='"+catid+"' style='color:green'> <?= $language['unlike'];?></span></span>"); 
     $("#user_likes"+catid).load('<?php echo base_url(); ?>post/recent_like_count?id_post='+catid);
          return true;
        }); 
    
});


$(document).on('click','span.sub_user_like',function(){

    var catid=$(this).attr('id');
    var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
    var pid=$(".user_sub"+catid).attr('id');
    var cat="POST";
    var act="SUB_LIKE";
    var page="recentactivity";
    
    
    $.ajax({
          url: "<?php echo base_url();?>like?cid="+cid+"&uid="+pid+"&cat="+cat+"&act="+act+"&page="+page+"&catid="+catid
        }).done(function( data ) {
            
            
    $("#use_like"+catid).html('<span  id="use_unlike'+catid+'"><span class="small fa fa-thumbs-up  sub_user_unlike" id="'+catid+'" style="color:green"> <?= $language["unlike"];?></span></span>' );
    $("#use_likes"+catid).load('<?php echo base_url(); ?>post/recent_sub_like_count?id_post='+catid);
          return true;
        }); 
    


    });
    
    
$(document).on('click','span.enter_sub_comment',function(){

 var id=$(this).attr('id');
 $(".sub_com"+id).toggle();
 }); 

     $(document).on('click','button.sub_comment',function(){
     var pid=$(this).attr('id');
                        var comment_user = $("#user_sub_comment"+pid).val()
                        if(comment_user == "")
                        {
                            $("#user_sub_comment"+pid).focus();

                        }
                        else
                        {
                            var user_comment = $("#user_sub_comment"+pid).val();
                            var uid = $(".sub_user"+pid).attr('id');
                            var cid = "<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
                            var cat="POST";
                            var act="SUB_COMMENT";
                            
                            
                   
                            
                            
                            if(user_comment!=''){
                                $.ajax({
                                    url: "<?php echo base_url();?>activity?user_comment",
                                    type:"POST",
                                    data:{user_comment:user_comment,uid:uid,cid:cid,pid:pid,cat:cat,act:act}
                                }).done(function( data ) {
                                                                    
                                                                       return true;
                                                                    });
                                $.ajax({
                                    url: "<?php echo base_url();?>post/recent_comments"
                                }).done(function( data ) {
                                     $("#recent_sub_comment"+pid).load('<?php echo base_url(); ?>post/recent_sub_comments?id_post='+pid);
                                    $("#user_sub_comment"+pid).val('');
                                   
                                   
                                   
                                   
                             //-----------------Rohitdutta--------------------
                            
                                //for sub post comments
                            //var n = $(".total_sub_comments"+pid);
                            //n.val(Number(n.val())+1);
                            //var tot_sub_value = $("#sub_inc_id"+pid).val();
        
                            //alert(tot_sub_value)
                    //var tot_sub_value = $("#recent_sub_comment_count"+pid).html()
                    //alert(tot_sub_value )
                            //if(tot_sub_value > 1)
                            //{
                                //$("a.new_sub_comments"+pid).show()
                                                       
        
                                //$("a.old_sub_comments"+pid).show()
                                //$("a.old_sub_comments"+pid).css("display","none");
                                
                                //alert("hiiiiiiiii");
                                
        
                                
                            //}
                            
                            
                          //-----------------Rohitdutta--------------------          
                            
                                   
                                   
                                    return true;
                                });
                                      $.ajax({
                                    url: "<?php echo base_url();?>post/recent_sub_comment_count"
                                 }).done(function( result ) {
                              $("#recent_sub_comment_count"+pid).load('<?php echo base_url(); ?>post/recent_sub_comment_count?id_post='+pid);
                                   
                                    
                                    return true;
                                    
                                    
                                });
                            }


                        }
                     });
                     
                     
                     
                     
  $(document).on('click','button.user_comment',function(){
var pid=$(this).attr('id');

                        var comment_user = $("#user_comment"+pid).val();
                        if(comment_user == "")
                        {
                            $("#user_comment"+pid).focus();

                        }
                        else
                        {
                            var user_comment = $("#user_comment"+pid).val();
                            var uid = $(".user"+pid).attr('id');
                            var cid = "<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
                            var cat="POST";
                            var act="COMMENT";
                            
                            
                    //-----------------Rohitdutta--------------------
                            
                            //for post comments
                  
                    
                    var tot_value = $("#recent_comment_count"+pid).html()


                    
                    if(tot_value > 3)
                    {
                        $(this).siblings("a.new_comments").show()
                                               

                        $(this).siblings("a.old_comments").css("display","none")
                    }
                    
                              
                  //-----------------Rohitdutta--------------------       
                                              
                            
                            if(user_comment!=''){
                                $.ajax({
                                    url: "<?php echo base_url();?>activity?user_comment",
                                    type:"POST",
                                   data:{user_comment:user_comment,uid:uid,cid:cid,pid:pid,cat:cat,act:act}
                                }).done(function( data ) {
                                                                     
                                                                       return true;
                                                                    });
                                $.ajax({
                                    url: "<?php echo base_url();?>post/recent_comments"
                                }).done(function( data ) {
                                     $("#recent_comment"+pid).load('<?php echo base_url(); ?>post/recent_comments?id_post='+pid);
                                    $("#user_comment"+pid).val('');
                                    
                                    
                                    return true;
                                });
                                      $.ajax({
                                    url: "<?php echo base_url();?>post/recent_comment_count"
        }).done(function( result ) {
 $("#recent_comment_count"+pid).load('<?php echo base_url(); ?>post/recent_comment_count?id_post='+pid);
                                   
                                    return true;
                                    
                                    
                                });
                            }


                        }
                   });
      
            
});

</script>

<script>
//-------------------------------RohitDutta---------------------------------------

$(document).ready(function()
     {

     $(document).on('click','a.view_more_post_comments',function()

     
     {
     
     
     var curr = $(this);

     var pid=curr.attr('data-postpostid');
     
     var dataString = "id_post="+pid;
     
     $.ajax({
            type: "GET",	 
            url: "<?php echo base_url();?>Post/display_post_post_comments",           
            data: dataString,
            dataType: "text",
            cache: false,
             beforeSend: function()
            {
		$("#loading_img"+pid).html("<img src='<?php echo base_url();?>assets/img/post/bar_loading_post.GIF'/>");
		
	    },
	    
            success:function(data) 
            {
		
               $("#recent_comment"+pid).html(data)
     	       return true;
               

            },
            complete:function()
            {
            	
            	
            	$("#loading_img"+pid).html("");
            	
            }
            
        });
     curr.hide()

        

     });
     });
//=======================================================================================================


$(document).ready(function()
     {

     $(document).on('click','a.view_more_post_sub_comments',function()

     {
     var curr = $(this);

     
     var pid=curr.attr('data-subpostpostid');
     
    var dataString = "id_post="+pid;

     $.ajax({
            type: "GET",	 
            url: "<?php echo base_url();?>Post/display_sub_post_comments",           
            data: dataString,
            dataType: "text",
            cache: false,
             beforeSend: function()
            {
		$("#loading_img_sub"+pid).html("<img src='<?php echo base_url();?>assets/img/post/bar_loading_post.GIF'/>");
		
	    },
	    
            success:function(data) 
            {
		
               $("#recent_sub_comment"+pid).html(data)
     	       return true;
               

            },
            complete:function()
            {
            	
            	
            	$("#loading_img"+pid).html("");
            	
            }
            
        });
     curr.hide()


     });
     });

//--------------------------------------------------------------------------------

    //-----------------Rohitdutta-------------------

    //This script is for delete the forum single comment only

    $(document).on('click','.deleteComment',function(e)
    {
        var comment_id = $(this).attr("data-comment");
        var p_id = $(this).attr("data-p");



        $('#deleteComment').find('.ForDeleteComment').attr('id',comment_id);
        $('#deleteComment').find('.ForDeleteComment').attr('data-basepost',p_id);








    });



    $(document).on('click','#del',function(e)
    {

       
       
	       
	        var comment_id = $(this).parent().attr('id');
	        var pid = $(this).parent().attr('data-basepost');
	
	
	       
	        var dataString = 'deleteComment=true'+'&comment_id='+comment_id ;
	        
	        $.ajax({
	            type: "POST",
	            url: "<?php echo base_url();?>Post/delete_single_comment",
	
	            data: dataString,
	            cache: false,
	            success: function(data)
	            {
	
	                
	                $('#subcomment_'+comment_id).slideUp('slow',function()
			{$(this).remove(); });
       
	                var reduce_comment = $("#recent_comment_count"+pid);
			reduce_comment.html(parseInt(reduce_comment.html()) - 1)
	
	
	            }
	        });
        
        
  

    });



$(document).on('click','.deleteComment_sub',function(e)
    {
        var comment_id = $(this).attr("data-comment");

        var p_id = $(this).attr("data-p");
        
        var subp = $(this).attr("data-subp");




        $('#deleteComment_sub').find('.ForDeleteComment_sub').attr('id',comment_id);
        $('#deleteComment_sub').find('.ForDeleteComment_sub').attr('data-subpost',p_id);
        $('#deleteComment_sub').find('.ForDeleteComment_sub').attr('data-sspo',subp);




    });



    $(document).on('click','#del_sub',function(e)
    {

        var comment_id = $(this).parent().attr('id');

	 var pid= $(this).parent().attr('data-sspo');
		
        
        var dataString = 'deleteComment=true'+'&comment_id='+comment_id;

	        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>Post/delete_single_comment",

            data: dataString,
            cache: false,
            success: function(data)
            {
 		$('#subcomment_'+comment_id).slideUp('slow',function()
			{$(this).remove(); });
               
                
		var reduce_sub_comment = $("#recent_sub_comment_count"+pid);
		reduce_sub_comment.html(parseInt(reduce_sub_comment.html()) - 1)


            }
        });
        
        /*
        $.ajax({
                                    url: "<?php echo base_url();?>post/recent_sub_comment_count"
                                 }).done(function( result ) {
                              $("#recent_sub_comment_count"+pid).load('<?php echo base_url(); ?>post/recent_sub_comment_count?id_post='+pid);
                                   
                                    
                                    return true;
                                    
                                    
                                });*/
        
        
       
       


    });




    $(document).on('click','#editCommentBtn',function(e)
    {

        var comment_id = $(this).parent().attr('id');


        
        var comment_value = $('#edit_single_comment').val();
        
        


       if(comment_value != "")
       {


        var dataString = 'comment_id='+comment_id+'&comment_value='+comment_value;

        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>Post/edit_single_comment",

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
            url: "<?php echo base_url();?>Post/get_single_comment",
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