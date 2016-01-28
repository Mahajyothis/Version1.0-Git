$(document).ready(function(){ 
	/* ---Abhi ---*/
	$(document).on('click','#submitQuestion',function(e){
			//alert('Yaaa its marking...!');
			e.preventDefault();
			var point = $(this);
			var custID = $('#userIDQue').val();
			var titleQue = $('#titleQue').val();
			var bodyQue = $('#bodyQue').val();
			var privacy = $('#privacyQue').val();
			
			if(custID != '' && titleQue != '' && bodyQue != ''){
				point.val('Posting..');
				var dataString = 'custID='+custID+'&titleQue='+titleQue+'&bodyQue='+bodyQue+'&privacy='+privacy;
				alert(dataString);
				$.ajax({
					type: "POST",
					url: "forum/add",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
							$('#hidden_new_question').find('#QueContent').html(bodyQue);
							$('#hidden_new_question').find('#Questiontitlee').html(titleQue);
							$('#hidden_new_question').find('#Question_id').html(data);
							$('#allQuestions').prepend($('#hidden_new_question').html());
							$('#closeBtn').click();
							location.reload();
						}
						else alert('Some error occured. Please try again'); 
						point.val('Save');
					}
				});
			}
			else{
				$('span.required_error').removeClass('hide');
			}
		});
		
		$(document).on('click','.deleteConfirmation',function(e){
			var id = $(this).parent().parent().attr('id');
			//alert(id);
			$('#deleteConfirmBtn').parent().attr('id',id);
		});
		
		$(document).on('click','#deleteConfirmBtn',function(e){
			var point = $(this);
			var id = $(this).parent().attr('id');
			var dataString = 'id='+id;
			//alert(dataString);
				$.ajax({
					type: "POST",
					url: "forum/delete",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data === 1) {
							$('#singleQestion_'+id).slideUp('slow',function(){
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
					url: "post/get_post",
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
					url: "post/update",
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
	
});