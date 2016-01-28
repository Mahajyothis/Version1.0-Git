<script type="text/javascript">
var articleID = '<?php echo isset($results->artID) ? $results->artID : ""; ?>';
var custID = '<?php echo isset($results->artCustID) ? $results->artCustID : ""; ?>';

$(document).ready(function(){
var ajax_process = false;
/* ---Abhi ---*/
$(document).on('click','.information',function(e){
		var point = $(this);
		var append_res = '';
		var article_type = point.attr('id');
		var current_article_category = $('#current_article_category').val();
		var dataString = 'getArticles=true'+'&article_type='+article_type;
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>article/categorised_article",
				data: dataString,
				cache: false,
				success: function(data){
					if(data){
						$.each(data, function(i, item) {
							append_res = append_res+'<div class="paragraph articles" id="'+item.artID+'"><p class="para">'+item.artTitle+'<br><p class="dummy">'+item.artSummary+'</p></div>';
						});
					}
					$('div.scroll').html(append_res);
					$('#current_article_category').val(article_type);
					if(current_article_category == article_type) $("#info2").toggle();
					else $("#info2").show();
					$("#info3").hide();
				}
			});
		return false;
	});
	
$(document).on('click','.articles',function(e){
		var point = $(this);
		var append_res = '';
		var article_id = point.attr('id');
		var current_article = $('#current_article').val();
		var dataString = 'getArticle=true'+'&article_id='+article_id;
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>article/article_content",
				data: dataString,
				cache: false,
				success: function(data){
					if(data){
						append_res = append_res+'<div class="userActions" id="'+data.artID+'">'+data.editArticle+data.deleteArticle+'</div>';
						append_res = append_res+'<p class="para1">'+data.artTitle+'</p>';
						if(data.artImage) append_res = append_res+'<p id="articleImage"><img src="<?php echo base_url(); ?>uploads/Article/'+data.artImage+'" alt="'+data.artTitle+'" /></p>';
						append_res = append_res+'<p class="para2">'+data.artDesc+'</p>';
						if(data.artTags) append_res = append_res+'<div class="row"><div class="col-md-12 tags">Tags:<p class="tags-sections">'+data.artTags+'</p></div></div>';
					}
					$('#info3 .actions').html(append_res);
					$('#current_article').val(article_id);
					if(current_article == article_id) $("#info3").toggle();
					else $("#info3").show();					
				}
			});
		return false;
	});

	$(document).on('click','#deleteConfirmation',function(e){
            var id = $(this).parent().attr('id');
            if(id){
            	if(confirm('Do you really want to delete this article ?')){
            		var dataString = 'deletePost=true'+'&id='+id;
	                $.ajax({
	                    type: "POST",
	                    url: "<?php echo base_url(); ?>article/delete",
	                    data: dataString,
	                    cache: false,
	                    success: function(data){
	                        data = parseInt(data);
	                        if(data === 1) {
	                        	$('#info3').css('display','none');
	                        	$('div.scroll #'+id).slideUp('slow');
	                        }
	                        else alert('Some error occured. Please try again'); 
	                        
	                    }
	                });
            	}
            }
        });

		var comment_div = $('div.coment_display');
		var more_comments_link = $('#view-more-comments');
		$(document).on('click','#view-more-comments',function()
        {
            var last_id = comment_div.find('div.coment_single').last().attr('id');
            if(last_id && articleID){
	                $.ajax({
	                    type: "POST",
	                    url: "<?php echo base_url(); ?>Article/recent_comments_article/"+articleID+"/"+last_id,
	                    data: '',
	                    cache: false,
	                    dataType: "json",
	                    success: function(data){
	                    	if(data.results) comment_div.append(data.results); 
	                    	if(data.rem_cmts == 0) more_comments_link.remove();                       
	                    }
	                });
            }
            else alert('Some error occured. Please try again !');
        });

        var new_comment = $('#new_comment_hidden');

		$(document).on('click','button#commentBtn',function()
        {
            var curr = $(this);
            var comment = $(this).siblings('textarea').val();
            var comment_count = $("span#comment_count");
            if(comment){
                var cid="<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
                var page="recentactivity";
                var cat="ARTICLE";
                var act="COMMENT";
                $.ajax
                ({                
                    url: "<?php echo base_url();?>activity?user_comment",
                    type:"POST",
                    data:{user_comment:comment,uid:custID,cid:cid,pid:articleID,cat:cat,act:act}
                }).done(function( data )
                {
                	new_comment.find('.coment_single').attr('id',data);
                	new_comment.find('.coment_single div p').html(comment.replace(/<br\s*[\/]?>/gi, "\n"));
                	comment_div.prepend(new_comment.html());
                	comment_div.scrollTop();
                	//comment_div.animate({scrollTop:offsets[target]},900);
                	curr.siblings('textarea').val('');
                	comment_count.html(parseInt(comment_count .html()) + 1);
                });
            }
            else $(this).siblings('textarea').focus();
        });
		
		var edit_comment_div = '<div id="edit-comment-div"><textarea></textarea><button id="save-edit-comment"><?php echo $lang['save']; ?></button><button id="cancel-edit-comment"><?php echo $lang['cancel']; ?></button></div>';
		$(document).on('click','span.edit-comment',function()
        {
            var curr = $(this);
			var comment = curr.siblings('.com_art_new').find('p').html();
			$('div#edit-comment-div').remove();
            curr.parent().append(edit_comment_div);
			curr.siblings('div#edit-comment-div').find('textarea').html(comment.replace(/<br\s*[\/]?>/gi, "\n"));
        });
		
		$(document).on('click','button#cancel-edit-comment',function()
        {
			$(this).parent().slideUp('slow',function(){				
				$(this).remove();				
			});
        });
		
		$(document).on('click','button#save-edit-comment',function()
        {
			if(!ajax_process){
				var curr = $(this);
				var id = curr.parent().parent().attr('id');
				var comment = curr.siblings('textarea').val().trim();
				if(comment == ''){
					curr.siblings('textarea').focus();
					return false;
				}
				if(id && comment){
						ajax_process = true;
						var dataString = 'editComment=true'+'&id='+id+'&comment='+comment;
						$.ajax({
							type: "POST",
							url: "<?php echo base_url(); ?>article/update_comment",
							data: dataString,
							cache: false,
							success: function(data){
								data = parseInt(data);
								if(data === 1) {
									curr.parent().siblings('.com_art_new').find('p').html(comment);
									curr.parent().slideUp('slow',function(){				
										$(this).remove();				
									});
								}
								else alert('Some error occured. Please try again'); 
								ajax_process = false;
							}
						});
				}
				else alert('Some error occured. Please try again'); 
			}
			else alert('Please wait until the current process to complete !');
        });
		
		$(document).on('click','span.trash-comment',function()
        {
			if(!ajax_process){
				var curr = $(this);
				var id = curr.parent().attr('id');
				if(id){
						ajax_process = true;
						var dataString = 'trashComment=true'+'&id='+id;
						$.ajax({
							type: "POST",
							url: "<?php echo base_url(); ?>article/delete_comment",
							data: dataString,
							cache: false,
							success: function(data){
								data = parseInt(data);
								if(data === 1) {
									curr.parent().slideUp('slow',function(){		
										var comment_count = $("span#comment_count");
										comment_count.html(parseInt(comment_count .html()) - 1)
										$(this).remove();				
									});
								}
								else alert('Some error occured. Please try again'); 
								ajax_process = false;
							}
						});
				}
				else alert('Some error occured. Please try again'); 
			}
			else alert('Please wait until the current process to complete !');
        });
	
});
</script>

/* Sathish */
<script>
        $(document).ready(function(){
            $(document).on('click','span.user_like',function(){
                var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
                var pid=$(".user").attr('id');
                var cat="ARTICLE";
                var act="LIKE";
                var page="recentactivity";
              var catid=$(this).attr('id');
                $.ajax({
                    url: "<?php echo base_url();?>like?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid
                }).done(function( data ) {
                    $(".user_liked").html('<span class="user_unliked"> <span class="glyphicon glyphicon-thumbs-up user_unlike" id="'+catid+'"  ><?php echo $lang['unlike']; ?><span></span></span></span>');
                    $("#user_likes").load('<?php echo base_url(); ?>forum/recent_like_count_article?id_article='+catid);
                    return true;
                });
            });
  
            
        });
        
        
        
        /*Sathish block ends */
        
    </script>
    
    
    <script>
    //---------------Rohitduta----------------------
    $(document).on('click','.deleteComment',function(e)
		{
		var comment_id = $(this).attr("data-commentid");
		
		$('#deleteComment').find('.ForDeleteComment').attr('id',comment_id);
		
		});
	
           $(document).on('click','#deleteCommentBtn',function(e)
		{
			
			var commentd_id = $(this).parent().attr('id');
			
			var dataString = 'commentd_id='+commentd_id;
			
			$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>Article/delete_single_discussion_comment",
					
					data: dataString,
					cache: false,
					success: function(data)
					{
						
						$('#singlecomment_'+commentd_id).fadeOut();
					
					}
				});
				
			
		});
		
		
		//This script is for getting single comment 
		$(document).on('click','.editComment',function(e)
		{
			
			
			
			var comment_id = $(this).attr("data-commentidedit");

			var comment_value = $(this).attr("data-comment");
			
			
			
			
			var dataString = 'comment_id='+comment_id+'&comment_value='+comment_value;
			
			var EditSingleComment = $("#editComment");
			//alert(EditSingleComment);

      			
      			$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>Article/get_single_discussion_comment",
					data: dataString,
					dataType: "json",
					cache: false,
					success: function(data)	{
						        
								EditSingleComment.find('.for_comment_id').attr('id',data[0].uaID);
								EditSingleComment.find('#edit_single_comment').val(data[0].uaDescription);
								
						
					}
				});
				
			
		});
		//This script is for update single comment
		$(document).on('click','#editCommentBtn',function(e)
		{
			
			var comment_id = $(this).parent().attr('id');
			
			
			//alert(comment_id);
			var comment_value = $('#edit_single_comment').val();
			
			
			//alert(comment_value );
			

			var dataString = 'comment_id='+comment_id+'&comment_value='+comment_value;
			
			$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>Article/update_single_discussion_comment",
					
					data: dataString,
					cache: false,
					success: function(data)
					{
						
						$('#update_com_'+comment_id).html(comment_value);
						
						//$('#cancelAtEditComment').click();
						
						
						
					
					}
				});
				
				
			
		});
    //-----------------------------------------------
    </script>
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   