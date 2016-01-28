<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
$(document).ready(function(){ 
	/* ---Abhi Post section in Groups ---*/
	$(document).on('click','#postApost',function(e){
			
			e.preventDefault();
			var point = $(this);
			var postApostBox = $('#postApostBox').val();
			if(postApostBox == '')
			{
			    alert('Please write something, and hit post...');
			}
			else
			 {
				point.val('Posting..');
				var dataString = 'postApostContent='+postApostBox;
				//alert(dataString);
				$.ajax({
					type: "POST",
					url: base_url+"groups/doPost",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
							
							 $('#postApostBox').val('');
							 location.reload();
						} 
						else alert('Some error occured. Please try again'); 
						point.val('Post');
	
					}
				});
			}
			
		});
		
	$('.Del_post').click(function() {
       var id = $(this).parent().attr('id');

	   $('#deleteConfirmBtn').parent().attr('id',id);
	
	   if($('#singlePost_'+id).siblings().attr('id') == undefined)
	   {
	         $(this).parents('section #postBlock').attr('id', 'GotoHide');
	   }

    });
		
		
		
		$(document).on('click','.deleteConfirmation',function(e){
			var id = $(this).parent().parent().attr('id');
			$('#deleteConfirmBtn').parent().attr('id',id);
		});
		
		$(document).on('click','#deleteConfirmBtn',function(e){
			var point = $(this);
			var id = $(this).parent().attr('id');
			var dataString = 'id='+id;
			
				$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>groups/delete_post',
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data === 1) {
							 if($('#singlePost_'+id).siblings().attr('id') == undefined)
	                              {
	                               $('#GotoHide').fadeOut('slow');
								  }
								  else
								  {
							       $('#singlePost_'+id).slideUp('slow',function(){
								    $(this).remove();
								   });
								  }
							
							
							point.siblings('#NoDelete').click();
							
						}
						else alert('Some error occured. Please try again'); 
						
					}
				});
			
		});
		
		
		
		$(document).on('click','.editData',function(e){
			var id = $(this).parent().attr('id');
			//alert(id);
			var dataString = 'getData=true'+'&id='+id;
			
      			$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>groups/get_group_post_data',
					data: dataString,
					cache: false,
					success: function(data){
						if(data) {			
								$('#editStatusInGroupsInner').find('textarea').val(data.postContent);
								$('#editStatusInGroupsInner').find('#editPostId').val(id);
						}
						else alert('Some error occured. Please try again'); 
						
					}
				});
			
		});
		
		$(document).on('click','#editSavePost',function(e){
			e.preventDefault();
			var point = $(this);
			var postContent = $('#editPostContent').val();
			var id = $('#editStatusInGroupsInner').find('#editPostId').val();
			if(postContent != ''){
				point.val('Saving..');
				var dataString = 'doPost=true'+'&postContent='+postContent+'&id='+id;
				$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>groups/update_post_data',
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data === 1) {
							$('#singlePost_'+id).find('.postContent').html(postContent);
							$('#CloseMeatEDIT').click();
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
		
		
		
		
		
		/* --- Event section in Groups ---*/
	$(document).on('click','#postAevent',function(e){
			//alert('Event Making');
			e.preventDefault();
			var point = $(this);
			var eventTitle = $('#eventTitle').val();
			var eventLocation = $('#eventLocation').val();
			var eventDate = $('#eventDate').val();
			var eventDes = $('#eventDes').val();
			if(eventTitle == '' || eventLocation == '' || eventDate == '' || eventDes == '')
			{
			    alert('Please fill all fields, and hit Create...');
			}
			else
			 {
				point.val('Postings..');
				var dataString = 'eventTitle='+eventTitle+'&eventLocation='+eventLocation+'&eventDate='+eventDate+'&eventDes='+eventDes;
				//alert(dataString);
				$.ajax({
					type: "POST",
					url: base_url+"groups/doEvent",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
							 alert('Posted successfully...!');
							 //$('#postApostBox').val('');
							 location.reload();
						} 
						else alert('Some error occured. Please try again'); 
						point.val('Post');
	
					}
				});
			}
			
		});
		
		
		$(document).on('click','.editDataEvent',function(e){
			var id = $(this).parent().attr('id');
			var dataString = 'getData=true'+'&id='+id;
		//	alert(id);
      			$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>groups/get_group_post_data',
					data: dataString,
					cache: false,
					success: function(data){
						if(data) {			
								$('#editEventSection').find('#eventTitleEdit').val(data.eventTitle);
								$('#editEventSection').find('#eventLocationEdit').val(data.eventLocation);
								$('#editEventSection').find('#eventDateEdit').val(data.eventDate);
								$('#editEventSection').find('#eventDesEdit').val(data.postContent);
								$('#editEventSection').find('#eventPostId').val(id);
						}
						else alert('Some error occured. Please try again'); 
						
					}
				});
			
		});
		
		$(document).on('click','#eventEditsubmit',function(e){
			e.preventDefault();
			var point = $(this);
			var eventTitle = $('#eventTitleEdit').val();
			var eventLocation = $('#eventLocationEdit').val();
			var eventDate = $('#eventDateEdit').val();
			var postContent = $('#eventDesEdit').val();
			var id = $('#eventPostId').val();
			if(postContent != '' && eventTitle != '' && eventLocation != '' && eventDate != ''){
				point.val('Saving..');
				var dataString = 'eventTitle='+eventTitle+'&eventLocation='+eventLocation+'&eventDate='+eventDate+'&eventDes='+postContent+'&id='+id;
				$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>groups/update_event_data',
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data === 1) {
						
						    $('#singlePost_'+id).find('.PostedEventtitle').html(eventTitle);
						    $('#singlePost_'+id).find('.PostedEventContent').html(postContent);
						    $('#singlePost_'+id).find('.PostedEventDate').html(eventDate);
						    $('#singlePost_'+id).find('.PostedEventLocation').html(eventLocation);
							$('#closeMeatEventedit').click();
						}
						else alert('Some error occured. Please try again'); 
						point.val('Save');
					}
					
				});
			}
			else{
				alert('Please enter the valid data...!');
				return false;
			}
		});
		
		
		$(document).on('click','.editDataPhotoPost',function(e){
		var exampleModalEditPhoto = $('#editStatusWithPhoto');
			var id = $(this).parent().attr('id');
			var dataString = 'getData=true'+'&id='+id;
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>groups/get_group_post_data",
					data: dataString,
					cache: false,
					success: function(data){
						if(data) {			
								exampleModalEditPhoto.find('#editPhotoContent').val(data.postContent);
								if(data.postImage != ''){
									exampleModalEditPhoto.find('#img_container1').html('<img id="img_preview" height="200" src="<?= base_url()."uploads/groups/posts/";?>'+data.postImage+'" alt="'+data.postImage+'"></img>');
								}
								exampleModalEditPhoto.find('#editStatusPhotoId').val(data.id);
						}
						else alert('Some error occured. Please try again'); 
						
					}
				});
			
		});
		
		$(document).on('click','#JoinGroupIcon',function(e){
		        
				 e.preventDefault();
				 var dataString = 'doMem=true';
				 $.ajax({
					type: "POST",
					url: base_url+"groups/makeAMemberInGroup",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
						
							 location.reload();
						} 
						else alert('Some error occured. Please try again'); 
					}
				});
			       
			});
			
			$(document).on('click','.acceptJoinRequest',function(e){
		        var point = $(this);
				var id = $(this).parent().attr('id');
				 e.preventDefault();
				 var dataString = 'id='+id;
				 $.ajax({
					type: "POST",
					url: base_url+"groups/AdminRequestAccept",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
						     
							 point.siblings('.cancleJoinRequest').hide();
							 point.val('Accepted');
							 $('.requestBlock_'+id).fadeOut(1000);
							 var requestCount = $( "#RequestsCountOrginal" ).html();
							  if(requestCount == 1)
							  {
							      $( "#RequestsCountOrginal" ).html('0');
							      $( "#noMoreRequests" ).fadeIn();
								  
							  }
							  else
							  {
							     $( "#RequestsCountOrginal" ).html(requestCount - 1);
							  }
							
							
							
							
						} 
						else alert('Some error occured. Please try again'); 
					}
				});
			       
			});
			
			$(document).on('click','.cancleJoinRequest',function(e){
		         e.preventDefault();
				  var point = $(this);
				 var id = $(this).parent().attr('id');
				alert(id);
				 var dataString = 'doRem=true&id='+id;
				 $.ajax({
					type: "POST",
					url: base_url+"groups/leaveGroup",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
							
							point.siblings('.acceptJoinRequest').hide();
							 point.val('Cancelled');
							 $('.requestBlock_'+id).fadeOut(2000);
							 var requestCount = $( "#RequestsCountOrginal" ).html();
							  if(requestCount == 1)
							  {
							      $( "#RequestsCountOrginal" ).html('0');
							      $( "#noMoreRequests" ).fadeIn();
								  
							  }
							  else
							  {
							     $( "#RequestsCountOrginal" ).html(requestCount - 1);
							  }
						} 
						else alert('Some error occured. Please try again'); 
					}
				});
			       
			});
			
			$(document).on('click','.RemovememberFromGroup',function(e){
		         e.preventDefault();
				  var point = $(this);
				 var id = $(this).parent().attr('id');
				alert(id);
				 var dataString = 'doRem=true&id='+id;
				 $.ajax({
					type: "POST",
					url: base_url+"groups/leaveGroup",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
							
							point.siblings('.acceptJoinRequest').hide();
							 point.val('Removed');
							 $('.removeMemberBlock_'+id).fadeOut(2000);
							 var requestCount = $( "#MembersCountOrginal" ).html();
							  if(requestCount == 1)
							  {
							      $( "#MembersCountOrginal" ).html('0');
							      $( "#noMoremembersFound" ).fadeIn();
								  
							  }
							  else
							  {
							     $( "#MembersCountOrginal" ).html(requestCount - 1);
							  }
						} 
						else alert('Some error occured. Please try again'); 
					}
				});
			       
			});
			
			
			
			$(document).on('click','.LeaveGroup',function(e){
		         e.preventDefault();
				 var id = $(this).parent().attr('id');
				 
				 var dataString = 'doRem=true&id='+id;
				 $.ajax({
					type: "POST",
					url: base_url+"groups/leaveGroup",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
							// alert('Leaved successfully...!');
							 
							 location.reload();
						} 
						else alert('Some error occured. Please try again'); 
					}
				});
			       
			});
		
		var auto_load_div = $('div#last_msg_loader');
        var limit = 8;
        var offset = '<?php echo $this->config->item('page_userlist_limit')?$this->config->item('page_userlist_limit'):'3'; ?>';
        var request_ajax = true;
        var ajax_is_on = false;
        var last_scroll_top = 0;
        var hidden_new_post = $('#hidden_new_post');

        $(window).scroll(function(event) {
            var last_id = $('div#allPosting .singlePost:last').attr('id');
			last_id = parseInt(last_id.replace('singlePost_',''));
            if(last_id){
                var st = $(this).scrollTop();

                if(st > last_scroll_top){
                    if ($(window).scrollTop()+1 > $(document).height() - $(window).height()) {

                        if (request_ajax === true && ajax_is_on === false) {
                        
                            ajax_is_on = true; 
                            auto_load_div.removeClass('hide');
                            var dataString = 'getPosts=true&last_id='+last_id;
                            $.ajax({
                                url: "<?php echo base_url(); ?>groups/autoload",
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
                                            $('#allPosting').append(item);
                                        });
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
		
		
	
});
</script>