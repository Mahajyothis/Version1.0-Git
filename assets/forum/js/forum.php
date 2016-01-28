<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
$(document).ready(function(){ 
	
	$(document).on('click','#submitQuestion',function(e){
			
			e.preventDefault();
			
			var newQuestionBloclk = $("#hidden_new_question");
			var point = $(this);
			var custID = $('#userIDQue').val();
			var titleQue = $('#titleQue').val();
			var bodyQue = $('#bodyQue').val();
			var category = $('#category').val();
			var privacy = $('#privacyQue').val();
			
			if(custID != '' && titleQue != '' && bodyQue != ''){
				
				point.val("<?=$lang['continuing'];?>");
				var dataString = 'custID='+custID+'&titleQue='+titleQue+'&bodyQue='+bodyQue+'&category='+category+'&privacy='+privacy;

				$.ajax({
					type: "POST",
					url: base_url+"forum/add",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
						//alert(data);
						
						 newQuestionBloclk.find('.row').attr('id','singleQestion_'+data);
						 //--------------------RohitDutta----------------------------------------------------
						 newQuestionBloclk.find('.get_postid').attr('value',''+data);
						 newQuestionBloclk.find('.increment_number1').attr('id','values11'+data);
						 newQuestionBloclk.find('.loading_img_dummy').attr('id','loading_img'+data);
						 //----------------------------------------------------------------------------------
						 newQuestionBloclk.find('.forum_quo_title').html(titleQue);
						 
						 newQuestionBloclk.find('.forum_quo_body').html(bodyQue);
						 
						 newQuestionBloclk.find('.recent_comment_count').attr('id','recent_comment_count'+data);
						 newQuestionBloclk.find('.user').attr('id',+custID);
						 newQuestionBloclk.find('#'+custID).attr('class','user'+data);
						 newQuestionBloclk.find('#user_like').attr('class','liking'+data);
						 newQuestionBloclk.find('.like').attr('id',data);
						 newQuestionBloclk.find('.userActions').attr('id',data);
						 newQuestionBloclk.find('.comment').attr('id',data);
 						 newQuestionBloclk.find('.user_comment').attr('id','user_comment'+data);
 						 newQuestionBloclk.find('.recent_comment').attr('id','recent_comment'+data);
						 
						 newQuestionBloclk.find('.user_like').children('button').attr('id',data);
						
						  $('.recentQuestionSection').prepend(newQuestionBloclk.html());
							  
						 $('.recentQuestionSection').fadeIn();
						 
						 $('#noDataFound').fadeOut();
						 
						 $('#askQuestionForm').trigger('reset');
						 
						 point.val("<?=$lang['continue'];?>");
						
							$('#closeBtnCreate').click();
							
						}
						else alert('Some error occured. Please try again'); 

					}
				});
			}
			else{
				$('span.required_error').removeClass('hide');
			}
		});
		
		
		
		
		$(document).on('click','.editData',function(e){
			var id = $(this).parent().attr('id');
			var dataString = 'getData=true'+'&id='+id+'&get_param=value';
			
			var EditQuestionBloclk = $("#editQUestion");
			

      			$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>forum/getOnethread',
					data: dataString,
					dataType: "json",
					cache: false,
					success: function(data){
						if(data) {			
						        
								//alert(data[0].id_que);
								
								EditQuestionBloclk.find('#Edit_titleQue').val(data[0].titleQue);
								EditQuestionBloclk.find('#Edit_bodyQue').val(data[0].bodyQue);
								EditQuestionBloclk.find('#Question_id').val(data[0].id_que);
								EditQuestionBloclk.find('select[name="categoryEdit"] option[value='+data[0].category+']').prop('selected', true);
						}
						else alert('Some error occured. Please try again'); 
						
					}
				});
			
		});
		
		
		$(document).on('click','#UpdateEditedQuestion',function(e){
			
				e.preventDefault();
			var point = $(this);
			var id = $('#Question_id').val();
			var titleQue = $('#Edit_titleQue').val();
			var bodyQue = $('#Edit_bodyQue').val();
			var category = $('#categoryEdit').val();
			var privacy = 1;
			
		
		if(titleQue != '' && bodyQue != ''){
				point.val("<?=$lang['updating'];?>");
				var dataString = 'id='+id+'&titleQue='+titleQue+'&bodyQue='+bodyQue+'&category='+category+'&privacy='+privacy;

				$.ajax({
					type: "POST",
					url: base_url+"forum/update",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) 
						{
						
							$('#singleQestion_'+id).find('.forum_quo_title').html(titleQue);
							$('#singleQestion_'+id).find('.forum_quo_body').html(bodyQue);
							point.siblings('button').click();
							
						}
						else 
						
						alert("<?=$lang['you-have-not-changed-anything'];?>"); 
						point.val("<?=$lang['update'];?>");
					}
				});
			}
			else{
				$('span.required_error').removeClass('hide');
			}
		});
		
		
		
		
		$(document).on('click','.deleteConfirmation',function(e){
			var id = $(this).parent() .attr('id');
			//alert(id);
			$('#deleteConfirmBtn').parent().attr('id',id);
		});
		
		$(document).on('click','.hideQuestionClick',function(e){
			var id = $(this).parent().attr('id');
			$('#idtoHide').attr('class',id);
		});
		
		
		$(document).on('click','#preHidethis',function(e){
			var point = $(this);
			var id = $(this).parent().attr('class');
		    
			e.preventDefault();
		
			var dataString = 'id='+id;
			//alert(dataString);
				$.ajax({
					type: "POST",
					url: base_url+"forum/update_visableStatus",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
						    
							//alert($('#singleQestion_'+id).siblings('div .row').attr('id'));
							
							$('#singleQestion_'+id).fadeOut();
							point.parent().siblings('button').click();
							
						}
						else alert('Some error occured. Please try again'); 
						
					}
				});
			
		});
		
		
		
		$(document).on('click','#deleteConfirmBtn',function(e){
			var point = $(this);
			var id = $(this).parent().attr('id');
			var dataString = 'id='+id;
			//alert(dataString);
				$.ajax({
					type: "POST",
					url: base_url+"forum/delete",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data === 1) {
						    
							//alert($('#singleQestion_'+id).siblings('div .row').attr('id'));
							
							$('#singleQestion_'+id).fadeOut();
							point.parent().siblings('button').click();
							
						}
						else alert('Some error occured. Please try again'); 
						
					}
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
var p_id = $(this).attr("data-q");

$('#deleteComment').find('.ForDeleteComment').attr('id',comment_id);
$('#deleteComment').find('.ForDeleteComment').attr('data-id',p_id);



});








$(document).on('click','#deleteCommentBtn',function(e)
{
			
			var comment_id = $(this).parent().attr('id');
			var pid = $(this).parent().attr('data-id');
			
			
			
			var n = $("#values11"+pid );
			
			
               		n.val(Number(n.val())-1);
			
			var dataString = 'comment_id='+comment_id;
			
			
			$.ajax({
					type: "POST",
					url: base_url+"forum/delete_single_comment",
					
					data: dataString,
					cache: false,
					success: function(data)
					{
					
						//alert(data)
						$('#singlecomment_'+comment_id).fadeOut();
						
						
					
					}
				});
				
				
				$.ajax({
                            url: "<?php echo base_url();?>forum/recent_comment_count"
                        }).done(function( result ) {
                            $("#recent_comment_count"+pid).load('<?php echo base_url(); ?>forum/recent_comment_count?id_forum='+pid);


                            return true;
                            
                            
                        });
                        
				
			
		});
		
		
$(document).on('click','.deleteComment1',function(e)
{
var comment_id = $(this).attr("data-comment");
var p_id = $(this).attr("data-q");

$('#deleteComment').find('.ForDeleteComment').attr('id',comment_id);
$('#deleteComment').find('.ForDeleteComment').attr('data-id',p_id);



});		
		
$(document).on('click','#deleteCommentBtn',function(e)
{
			
			var comment_id = $(this).parent().attr('id');
			var pid = $(this).parent().attr('data-id');
			
			
			
			var n = $("#values11"+pid );
			
			
               		n.val(Number(n.val())-1);
			
			var dataString = 'comment_id='+comment_id;
			
			
			$.ajax({
					type: "POST",
					url: base_url+"forum/delete_single_comment1",
					
					data: dataString,
					cache: false,
					success: function(data)
					{
						//alert(data)
						$('#singlecomment_'+comment_id).fadeOut();
						
					
					}
				});
				
				
				$.ajax({
                            url: "<?php echo base_url();?>forum/recent_comment_count"
                        }).done(function( result ) {
                            $("#recent_comment_count"+pid).load('<?php echo base_url(); ?>forum/recent_comment_count?id_forum='+pid);


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
					url: base_url+"forum/edit_single_comment",
					
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
			
			
			//alert(comment_id_only);
			//alert(comment_only);
			
			var dataString = 'comment_id='+comment_id+'&comment_value='+comment_value;
			
			var EditSingleComment = $("#editComment");

      			
      			$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>forum/get_single_comment',
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