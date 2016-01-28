<script type="text/javascript">
    $(document).ready(function(){
        
        var auto_load_div = $('div#last_msg_loader');
        var limit = 8;
        var offset = '<?php echo $this->config->item('page_userlist_limit')?$this->config->item('page_userlist_limit'):'3'; ?>';
        var request_ajax = true;
        var ajax_is_on = false;
        var last_scroll_top = 0;
        var hidden_new_post = $('#hidden_new_post');
        var type = '<?php echo $type; ?>';

        $('#main').scroll(function(event) {
            var last_id = $('div#allPosts .singlePost:last').attr('id');
            last_id = parseInt(last_id.replace('singlePost_',''));
            if(last_id){
                var st = $(this).scrollTop();

                if(st > last_scroll_top){
                    if($('#main').scrollTop()+1 > ($('#main').prop("scrollHeight") - $(window).height())) {

                        if (request_ajax === true && ajax_is_on === false) {
                        
                            ajax_is_on = true; 
                            auto_load_div.removeClass('hide');
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
                                        /*auto_load_div.fadeOut('slow',function(){
                                            $(this).addClass('hide');
                                        });*/
                                        auto_load_div.addClass('hide');

                                    } 
                                    ajax_is_on = false;
                                }
                            });
                        }
                    }
                }
                last_scroll_top = st;
            }
        });

    $(document).on('click','#submitPost',function(e){
            e.preventDefault();
            var point = $(this);
            var hidden_new_post = $('#hidden_new_post');
            var postContent = $('#postContent').val();
            var postType = $('#postType').val();
            if(postContent != ''){
                point.val('Posting..');
                var dataString = 'doPost=true'+'&postContent='+postContent+'&postType='+postType;
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
                            hidden_new_post.find('.postContent').html(postContent);
                            hidden_new_post.children('.singlePost').attr('id','singlePost_'+data);
                            hidden_new_post.find('.userActions').attr('id',data);
                            $('#allPosts').prepend(hidden_new_post.html());
                            $('#postContent').val('');
                            $('#closeBtn').click();
                        }
                        point.val('Save');
                    }
                });
            }
            else{
                $('p.required_error').removeClass('hide');
            }
        });
        
        $(document).on('click','.deleteConfirmation',function(e){
            var id = $(this).parent().parent().attr('id');
            $('#deleteConfirmBtn').parent().attr('id',id);
        });
        
        $(document).on('click','#deleteConfirmBtn',function(e){
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
                        
                    }
                });
            
        });
        
        $(document).on('click','.editData',function(e){
            var id = $(this).parent().parent().attr('id');
            var dataString = 'getPost=true'+'&id='+id;
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>post/get_post',
                    data: dataString,
                    cache: false,
                    success: function(data){
                        if(data) {          
                                $('#editPostPopDivision').find('textarea').val(data.postContent);
                                $('#editPostPopDivision').find('select option[value='+data.postType+']').prop('selected', true); 
                                $('#editPostPopDivision').find('#editPostId').val(id);
                        }
                        else alert('Some error occured. Please try again'); 
                        
                    }
                });
            
        });
        
        $(document).on('click','#editSavePost',function(e){
            e.preventDefault();
            var point = $(this);
            var postContent = $('#editPostContent').val();
            var postType = $('#editPostType').val();
            var id = $('#editPostPopDivision').find('#editPostId').val();
            if(postContent != ''){
                point.val('Saving..');
                var dataString = 'doPost=true'+'&postContent='+postContent+'&postType='+postType+'&id='+id;
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>post/update",
                    data: dataString,
                    cache: false,
                    success: function(data){
                        data = parseInt(data);
                        if(data === 1) {
                            $('#singlePost_'+id).find('.postContent').html(postContent);
                            $('#editcloseBtn').click();
                        }
                        else alert('Some error occured. Please try again'); 
                        point.val('Save');
                    }
                    
                });
            }
            else{
                $('p.required_error').removeClass('hide');
            }
        });

        // STATUS PICTURE UPLOAD - TRIGGER ON SELECTING PICTURE
    $('#uploadTimeLinePostImages').on('change', function(){
        var thumbnail_url = 'uploads/post/thumbnails/';
        var photos = $(this).val();
        var loaders = '';
        if(photos){
            //$('input#UploadType').val('image');
            for (var i = 0; i < $(this).get(0).files.length; i++) {
                loaders += '<div class="ts-loader"><img class="loading_img" src="themes/default/images/processing.GIF" /></div>';
            };
            $('#t-status-images-preview-wrapper').append(loaders);
            $("#ts-box-image-upload-form").ajaxForm({ 
                    success : function (response) {
                        if(response){
                            var all_images= response;
                            var prev_images = $('#t-status-images').val();
                            if(prev_images) all_images = prev_images+','+response;
                            $('#t-status-images').val(all_images);
                            var images= response.split(',');
                            
                            $.each(images,function(index, value){
                                $('#t-status-images-preview-wrapper .ts-loader:first').remove();
                                $('#t-status-images-preview-wrapper').prepend('<div class="ts-wrap"><img src="' + thumbnail_url + value + '" alt="'+ value +'"/><img class="remove_photo" src="themes/default/images/close.png" /></div>');
                            });
                        }
                        else{
                            $('#t-status-images-preview-wrapper .ts-loader').remove();
                            alert("Files of type gif|jpg|png|jpeg are allowed !");
                        }
                        $(this).val('');
                    }
            }).submit();
        }
    });

    });


</script>