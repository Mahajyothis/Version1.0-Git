<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
$(document).ready(function(){ 
	$('.recentPostsSection').hide();
	$(document).on('click','#postApost',function(e){
			
			e.preventDefault();
			var point = $(this);
			var newPostBlock = $("#new_hidden");
			
			var postApostBox = $('#postApostBox').val();
			if(postApostBox == '')
			{
			     $('#StatusError').fadeIn('slow');
			}
			else
			 {
				point.val("<?= $lang['posting'];?>");
				 $('#StatusError').fadeOut('slow');
				point.attr("disabled", "disabled");
				
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
							 //alert(data);
							 $('#postApostBox').val('');
							 
							 newPostBlock.find('.new_post').attr('id','singlePost_'+data);
							  newPostBlock.find('.user_likes').attr('id','user_likes'+data);
							    newPostBlock.find('.like').attr('id',data);
							    //---------------Rohitdutta-----------------------------------------------
				                            
 							    newPostBlock.find('#new_view_comments').attr('class','new_view_comments'+data);
				                            newPostBlock.find('#display_total_recent_comments').attr('class','display_total_recent_comments'+data);
							     //----------------------------------------------------------------------------
							    
							      newPostBlock.find('.recent_comment_count').attr('id','recent_comment_count'+data);
							      newPostBlock.find('.cmnt-area').attr('id','cmnt-area_'+data);
 							      newPostBlock.find('.comment').attr('id',data);
 								
 								//---------------Rohitdutta----------------------------
 								
 								newPostBlock.find('.get_post_id').attr('value',data);

 								newPostBlock.find('.view_more_com').attr('id','view_more'+data);

                            					newPostBlock.find('.view_more_com').attr('data-postid',''+data);
                            					
 								newPostBlock.find('.loading_img').attr('id','loading_img'+data);
 								
                            					//-----------------------------------------------------
 								newPostBlock.find('.user_comment').attr('id','user_comment'+data);
 								newPostBlock.find('.recent_comment').attr('id','recent_comment'+data);
							     newPostBlock.find('.cmnt-boxx').attr('id',data);
							  newPostBlock.find('.user_liked').attr('id','user_like'+data);
							 newPostBlock.find('.postContent').html(postApostBox);
							 newPostBlock.find('.userActions').attr('id',data);
							 
							 $('.nopostfound').hide();
							
							  $('#AllnewPosts').prepend(newPostBlock.html());
							  
							  $('.recentPostsSection').show();
							  
							  
							 
							 $('.overlay').overlay();
							
						} 
						else alert('Some error occured. Please try again'); 
						point.val("<?= $lang['post'];?>");
						point.removeAttr("disabled");
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
				});
			}
			
		});
		
	$(document).on('click','.Del_post',function(e){
	
       var id = $(this).parent().attr('id');

	   //alert(id);
	   
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
	                               if($('#GotoHide').attr('class') == "clearfix section isotope recentPostsSection")
								   {
								    $('#singlePost_'+id).fadeOut('fast',function(){
								    
									   $('section .recentPostsSection').fadeOut('slow',function(){
											$('section .recentPostsSection').attr('id','postBlock');
									   });
								   
								   $(this).remove();
								   });
								   
								   }
								   else
								   {
								        $('#GotoHide').fadeOut('slow',function(){
								         $(this).remove();
								        });
								   }
								   
								   
								  }
								  else
								  {
							       $('#singlePost_'+id).slideUp('slow',function(){
								    $(this).remove();
								   });
								  }
							
							
							point.siblings('#NoDelete').click();
							
							
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
					
				});
			}
			else{
				$('p.required_error').removeClass('hide');
			}
		});
		
		
		/* GET GROUP MEMBERS LIST USING AJAX */
		
			$(document).on('click','#GetListMembers',function(e){
			e.preventDefault();
			$('#ALLMEMS').empty();
			if(true){
				var dataString = 'getData=true';
				$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>groups/GetGroupMembers',
					//data: dataString,
					 data: { get_param: 'value' }, 
                     dataType: 'json',
					cache: false,
					success: function(data){
						if(data) {
					
						 var oneMeber ="";
				
						for (var i = 0; i < data.length; i++) {
						//alert(data[i].giID);
                 oneMeber = $('<div class="col-md-12 removeMemberBlock_'+data[i].giID+'" style="padding:5px;" id="'+data[i].giID+'"><div class="col-md-2"><img src="<?php echo base_url('uploads').'/';?>'+data[i].photo+'" style="height:60px;width:60px;padding:5px;" class="pf-img-pst" alt="User Profile"></div><div class="col-md-4" style="padding-top:20px;padding-bottom:10px;"><p>'+data[i].custName+'</p></div><div class="col-md-3" id="'+data[i].giID+'"><input type="submit" value="Remove member" class="btn btn-danger RemovememberFromGroup" /></div></div>');
                    
					 $('#ALLMEMS').append(oneMeber);
					
					   }
	                    
						}
						else alert('Some error occured. Please try again'); 
						
					}
					
				});
			}
			else{
				$('p.required_error').removeClass('hide');
			}
		});
		
		
		
		/* GET GROUP REQUESTS LIST USING AJAX */
		
			$(document).on('click','#GetRequestsList',function(e){
			e.preventDefault();
			$('#ALLREQS').empty();
			
				var dataString = 'getData=true';
				$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>groups/GetGroupUserJoinRequests',
					//data: dataString,
					 data: { get_param: 'value' }, 
                     dataType: 'json',
					cache: false,
					success: function(data){
						if(data) {
					
						 var oneMeber ="";
			
						for (var i = 0; i < data.length; i++) {
						//alert(data[i].giID);
                 oneMeber = $('<div class="col-md-12 requestBlock_'+data[i].giID+'" style="padding:5px;" id="'+data[i].giID+'"><div class="col-md-2"><img src="<?php echo base_url('uploads').'/';?>'+data[i].photo+'" style="height:60px;width:60px;padding:5px;" class="pf-img-pst" alt="User Profile"></div><div class="col-md-4" style="padding-top:20px;padding-bottom:10px;"><p>'+data[i].custName+' want to join in this group..</p></div><div class="col-md-3" id="'+data[i].giID+'"><input type="submit" value="Accept" class="btn btn-success acceptJoinRequest" />&nbsp; <input type="submit" value="Cancel" class="btn btn-danger cancleJoinRequest" /></div></div>');
                    
					 $('#ALLREQS').append(oneMeber);
					
					   }
	                    
						}
						else alert('Some error occured. Please try again'); 
						
					}
					
				});
			
		});
		
		
		
		
		
		/* --- Event section in Groups ---*/
	$(document).on('click','#postAevent',function(e){
			//alert('Event Making');
			e.preventDefault();
			var newPostEventBlock = $("#new_event_hidden");
			var point = $(this);
			var eventTitle = $('#eventTitle').val();
			var eventLocation = $('#eventLocation').val();
			var eventDate = $('#eventDate').val();
			var eventDes = $('#eventDes').val();
			if(eventTitle == '' || eventLocation == '' || eventDate == '' || eventDes == '')
			{
			    $('#StatusErrorEvent').fadeIn('slow');
			}
			else
			 {
				point.val("<?= $lang['posting'];?>");
				$('#StatusErrorEvent').fadeOut('slow');
				point.attr("disabled", "disabled");
				var dataString = 'eventTitle='+eventTitle+'&eventLocation='+eventLocation+'&eventDate='+eventDate+'&eventDes='+eventDes;
				//alert(dataString);
				//var img = Math.floor((Math.random() * 10) + 1);
				
				
				$.ajax({
					type: "POST",
					url: base_url+"groups/doEvent",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
							
							
							 newPostEventBlock.find('.new_event').attr('id','singlePost_'+data);
							 newPostEventBlock.find('.user_likes').attr('id','user_likes'+data);
							    newPostEventBlock.find('.like').attr('id',data);
							    //---------------Rohitdutta-----------------------------------------------
				                            //newPostEventBlock.find('#new_view_comments').attr('class','new_view_comments'+data);
				                            //newPostEventBlock.find('#display_total_recent_comments').attr('class','display_total_recent_comments'+data);	
                            					newPostEventBlock.find('#new_view_comments').attr('class','new_view_comments'+data);
				                            newPostEventBlock.find('#display_total_recent_comments').attr('class','display_total_recent_comments'+data);    
							     //----------------------------------------------------------------------------
							      newPostEventBlock.find('.recent_comment_count').attr('id','recent_comment_count'+data);
							     newPostEventBlock.find('.cmnt-area').attr('id','cmnt-area_'+data);
 								newPostEventBlock.find('.comment').attr('id',data);
 								//---------------Rohitdutta----------------------------
 								//newPostEventBlock.find('.get_post_id').attr('value',data);
 								
 								//newPostEventBlock.find('#new_view_comments_dummy_post').attr('class','d_p'+data);
			newPostEventBlock.find('.get_post_id').attr('value',data);

                            newPostEventBlock.find('.view_more_com').attr('id','view_more'+data);

                            newPostEventBlock.find('.view_more_com').attr('data-postid',''+data);
                            					//-----------------------------------------------------
 								newPostEventBlock.find('.user_comment').attr('id','user_comment'+data);
 								newPostEventBlock.find('.recent_comment').attr('id','recent_comment'+data);
							     newPostEventBlock.find('.cmnt-boxx').attr('id',data);
							  newPostEventBlock.find('.user_liked').attr('id','user_like'+data);
							 newPostEventBlock.find('.PostedEventtitle').html(eventTitle);
							 newPostEventBlock.find('.PostedEventContent').html(eventDes);
							 newPostEventBlock.find('.PostedEventDate').html("<i class='fa fa-calendar-times-o'></i> "+eventDate);
							 newPostEventBlock.find('.PostedEventLocation').html("<i class='fa fa-map-marker'></i> "+eventLocation);
							 
							 newPostEventBlock.find('.userActions').attr('id',data);
							 
							 $('.nopostfound').hide();
							 
							 $('#AllnewPosts').prepend(newPostEventBlock.html());
							  $('.recentPostsSection').show();
							 
							 $('.overlay').overlay();
							 
							 $('#eventPostingFORM').trigger('reset');
							 
							 
							 
						} 
						else alert('Some error occured. Please try again'); 
						point.val("<?= $lang['post'];?>");
						point.removeAttr("disabled");
						
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
						    $('#singlePost_'+id).find('.PostedEventDate').html("<i class='fa fa-calendar-times-o'></i> "+eventDate);
						    $('#singlePost_'+id).find('.PostedEventLocation').html("<i class='fa fa-map-marker'></i> "+eventLocation);
							$('#closeMeatEventedit').click();
						}
						else alert('Some error occured. Please try again'); 
						point.val('Save');
						
						
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
									exampleModalEditPhoto.find('#img_container1').html('<img id="img_preview" height="150" src="<?= base_url()."uploads/groups/fancy_show/";?>'+data.postImage+'" alt="'+data.postImage+'"></img>');
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
							
							  var memCount = parseInt($( "#MembersCountOrginal" ).html());
							 
							 var requestCount = $( "#RequestsCountOrginal" ).html();
							  if(requestCount == 1)
							  {
							      $( "#RequestsCountOrginal" ).html('0');
								  if(memCount == 0)
								  {
								  $( "#MembersCountOrginal" ).html(1);
							      }
								  else
								  {
								       $( "#MembersCountOrginal" ).html(memCount + 1);
								  }
								  
								  $( "#noMoreRequests" ).fadeIn();
								  
							  }
							  else
							  { 
							     $( "#MembersCountOrginal" ).html(memCount + 1);
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
				//alert(id);
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
				//alert(id);
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
							 var memCount = $( "#MembersCountOrginal" ).html();
							  if(memCount == 1)
							  {
							      $( "#MembersCountOrginal" ).html('0');
							      $( "#noMoremembersFound" ).fadeIn();
								  
							  }
							  else
							  {
							     $( "#MembersCountOrginal" ).html(memCount - 1);
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
	/* Status with Image */
		
		$(document).on('click','#doPostandUploadImage',function(e){
		var postContent = $('#postTextinImage').val();
		var point = $(this);
        var photos = $('#uploadPhoto').val();
		
		var newImagePostBlock = $("#new_img_status_hidden");
		
		if(postContent == "" || photos == "")
		{ 
				$('#StatusErrorPhotoStatus').fadeIn('slow');
		}
		else{
        if(photos){
             $('#StatusErrorPhotoStatus').hide();
             point.hide();
            $('#loaderIMG').fadeIn();
            ajax = true;
            $("#imageUploadwithStaus").ajaxForm({ 
                    dataType: "json",
					data: { get_param: 'value' }, 
                    success : function (response) {
                        if(response){                            
                            
								console.log(response);
				newImagePostBlock.find('.new_status_with_img').attr('id','singlePost_'+response.id);
				
				newImagePostBlock.find('.postContent').html(postContent);
				     newImagePostBlock.find('.user_likes').attr('id','user_likes'+response.id);
							    newImagePostBlock.find('.like').attr('id',response.id);
							    //---------------Rohitdutta-----------------------------------------------
				                            //newImagePostBlock.find('#new_view_comments').attr('class','new_view_comments'+response.id);
				                            //newImagePostBlock.find('#display_total_recent_comments').attr('class','display_total_recent_comments'+response.id);	
				                             newImagePostBlock.find('#new_view_comments').attr('class','new_view_comments'+response.id);
				                            newImagePostBlock.find('#display_total_recent_comments').attr('class','display_total_recent_comments'+response.id);	
                            					    
							     //----------------------------------------------------------------------------
							      newImagePostBlock.find('.recent_comment_count').attr('id','recent_comment_count'+response.id);
							     newImagePostBlock.find('.cmnt-area').attr('id','cmnt-area_'+response.id);
 								newImagePostBlock.find('.comment').attr('id',response.id);
 								//---------------Rohitdutta----------------------------
 								//newImagePostBlock.find('.get_post_id').attr('value',response.id);
 								//newImagePostBlock.find('#new_view_comments_dummy_post').attr('class','d_p'+response.id);
 								//newImagePostBlock.find('#new_view_comments_dummy_post').attr('class','d_p'+response.id);
 								newImagePostBlock.find('.get_post_id').attr('value',response.id);

                            newImagePostBlock.find('.view_more_com').attr('id','view_more'+response.id);

                            newImagePostBlock.find('.view_more_com').attr('data-postid',''+response.id);

                            					//-----------------------------------------------------
 								newImagePostBlock.find('.user_comment').attr('id','user_comment'+response.id);
 								newImagePostBlock.find('.recent_comment').attr('id','recent_comment'+response.id);
							     newImagePostBlock.find('.cmnt-boxx').attr('id',response.id);
							  newImagePostBlock.find('.user_liked').attr('id','user_like'+response.id);         
				
				newImagePostBlock.find('.userActions').attr('id',response.id);
				newImagePostBlock.find('.fancybox').attr('href','#facyme_'+response.id);
				newImagePostBlock.find('.fancybox').empty().html('<img src="<?php echo base_url();?>/uploads/groups/fancy_show/'+response.img+'" class="img-responsive" style="width: 100%;">');
				newImagePostBlock.find('.showMeUPIMG').attr('id','facyme_'+response.id);
				newImagePostBlock.find('.showMeUPIMG').empty().html('<img src="<?php echo base_url();?>/uploads/groups/fancy_show/'+response.img+'" class="img-responsive" style="width: 100%;">');
							 
							  $('.nopostfound').hide();
							
							  $('#AllnewPosts').prepend(newImagePostBlock.html());
							  
							  $('.recentPostsSection').show();
							
							  $('#imageUploadwithStaus').trigger('reset');
							 
							  $('.overlay').overlay();
							  
							  $('#img_container').fadeOut();
							 
							  $("a.fancybox").fancybox();
							 
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
		
                            $('#loaderIMG').fadeOut();
                            point.show();
                            ajax = false;
                    }
					else
					{
					  alert("Something went wrong...!");
					}
                }
            });
        }
		}
    });
			
			


		$(document).on('click','#editDataPhotoPostClick',function(e){
		
		e.preventDefault();

		var id = $('#editStatusPhotoId').val();
		
		var postContent = $('#editPhotoContent').val();
		
        var photos = $('#editStatusPhoto').val();
		
		//alert(photos +" "+ postContent +" "+id);
	
		if(postContent == "")
		{ 
				alert("Please write something...!");
		}
		
		else{
		
            $('#loaderIMG11').fadeIn();
           
            $("#EditimageUploadwithStaus").ajaxForm({ 
                    dataType: "json",
					data: { get_param: 'value' }, 
                    success : function (response) {
                        if(response){                            
							
							//alert(response.results);
							var targetBlock = $("#singlePost_"+id);
							if(response.img != null)
							{
							   targetBlock.find('.postContent').html(postContent);
							   
							   targetBlock.find('.fancybox').html('<img src="<?php echo base_url();?>uploads/groups/fancy_show/'+response.img+'" class="img-responsive" style="width: 100%;">');
							   targetBlock.find('#facyme_'+id).html('<img src="<?php echo base_url();?>uploads/groups/fancy_show/'+response.img+'" class="img-responsive" style="width: 100%;">');
							   
							}
							else
							{
							  targetBlock.find('.postContent').html(postContent);
							}
							
							//console.log(response);
							
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
						
							$('#loaderIMG11').fadeOut();
							$('#cls_edit_updat_img_with_status').click();
							
                            ajax = false;
                    }
					else
					{
					  alert("Something went wrong...!");
					}
                }
            }).submit();
        
		
		}
		
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