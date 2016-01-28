<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
$(document).ready(function(){ 
	
		
	$(document).on('click','#CreateNewdiscussion',function(e){
	
			e.preventDefault();
	
			var newDiscussionBloclk = $("#DummyDisBLOCK");
			var point = $(this);
			
			var custID = $('#userID').val();
			var titleDis = $('#titleDis').val();
			var bodyDis = $('#bodyDis').val();
			var category = $('#category').val();
			var privacy = $('#privacy').val();
			
			if(custID != '' && titleDis != '' && bodyDis != ''){
				point.val("<?php echo $lang['starting_discussion']; ?>");
				var dataString = 'custID='+custID+'&titleDis='+titleDis+'&bodyDis='+bodyDis+'&category='+category+'&privacy='+privacy;

				$.ajax({
					type: "POST",
					url: base_url+"discussions/add",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
						
						 newDiscussionBloclk.find('.discussion_block').attr('id','singleDiscussion_'+data);
						 
						 newDiscussionBloclk.find('.dicussion-title-a').html(titleDis);
						 
						 newDiscussionBloclk.find('.dicussion-title-a').attr('href',base_url+'discussions/view/'+data);
					
					     newDiscussionBloclk.find('.read-more').html(bodyDis);
						 
						 
						 if(privacy ==  1)
						 {
						     newDiscussionBloclk.find('.privacyBlock').html('<a data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $lang['public'];?> <?php echo $lang['discussion']; ?>"> <span class="small glyphicon glyphicon-globe"></span> <?php echo $lang['public'];?></a>');
						 }
						 else
						 {
						     newDiscussionBloclk.find('.privacyBlock').html('<a data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $lang['private'];?> <?php echo $lang['discussion']; ?>"> <span class="small glyphicon glyphicon-globe"></span> <?php echo $lang['private'];?></a>');
						 }
						 
					     newDiscussionBloclk.find('.did').val(data);
						 
						 newDiscussionBloclk.find('.userActions').attr('id',data);
						 
						   $('#noDataFound').hide();
						 
						   $('#recentDiscussionsSection').prepend(newDiscussionBloclk.html());
						  
						   $('#recentDiscussionsSection').fadeIn();
						  
						     point.val('<?php echo $lang["start-discussion"];?>');
						 
							 $('#closeBtnCreate').click();
							 
							  $('#refCaptcha').click();
							 
							 $('#NewDiscussionFORM').trigger('reset');
							 
							 $('span.required_error').addClass('hide');
							
							 $('[data-toggle="tooltip"]').tooltip();
							
						}
						else alert('Some error occured. Please try again'); 

					}
				});
			}
			else{
				$('span.required_error').removeClass('hide');
			}
		});
		
		
    $(document).on('click','#closeBtnCreate',function(e){
     
	 $('#NewDiscussionFORM').trigger('reset');
   
   });
		
		
		$(document).on('click','.editDisc',function(e){
			
			var id = $(this).parent().attr('id');
		
			var dataString = 'getData=true'+'&id='+id+'&get_param=value';
			
			var EditDiscussinBloclk = $("#EditDiscussionmodel");

      			$.ajax({
					type: "POST",
					url: '<?php echo base_url();?>discussions/getOneDiscussion',
					data: dataString,
					dataType: "json",
					cache: false,
					success: function(data){
						if(data) {			
						        
								
							    EditDiscussinBloclk.find('#Edit_titleDis').val(data[0].titleDis);
								EditDiscussinBloclk.find('#Edit_bodyDis').val(data[0].bodyDis);
								EditDiscussinBloclk.find('#Discussion_id_for_edit').val(data[0].id_dis);
								EditDiscussinBloclk.find('select[name="categoryEdit"] option[value='+data[0].category+']').prop('selected', true); 
								EditDiscussinBloclk.find('select[name="Edit_privacy"] option[value='+data[0].privacy+']').prop('selected', true); 
						}
						else alert('Some error occured. Please try again'); 
						
					}
				});
			
		});
		
		
		$(document).on('click','#UpdateEditedDiscussion',function(e){
			
			e.preventDefault();
			
			var point = $(this);
			var id = $('#Discussion_id_for_edit').val();
			var titleDis = $('#Edit_titleDis').val();
			var bodyDis = $('#Edit_bodyDis').val();
			var category = $('#categoryEdit').val();
			var privacy =  $('#Edit_privacy').val();

		   if(titleDis != '' && bodyDis != ''){
				
				point.val("<?php echo $lang['updating'];?>..");
				
				 var dataString = 'id='+id+'&titleDis='+titleDis+'&bodyDis='+bodyDis+'&category='+category+'&privacy='+privacy;

				 
				$.ajax({
					type: "POST",
					url: base_url+"discussions/update",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) 
						{
						
							$('#singleDiscussion_'+id).find('.dicussion-title-a').html(titleDis);
							$('#singleDiscussion_'+id).find('.read-more').html(bodyDis);
							
							if(privacy ==  1)
						    {
						     $('#singleDiscussion_'+id).find('.privacyBlock').html('<a data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $lang['public'];?> <?php echo $lang['discussion']; ?>"> <span class="small glyphicon glyphicon-globe"></span> <?php echo $lang['public'];?></a>');
						   }
						    else
						   {
						     $('#singleDiscussion_'+id).find('.privacyBlock').html('<a data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $lang['private'];?> <?php echo $lang['discussion']; ?>"> <span class="small glyphicon glyphicon-globe"></span> <?php echo $lang['private'];?></a>');
						   }
						 
							
							
							
							point.siblings('button').click();
							
						}
						else 
						{
						alert("<?=$lang['you-have-not-changed-anything'];?>"); 
						}
			point.val("<?php echo $lang['update'];?>");
						$('[data-toggle="tooltip"]').tooltip();
					}
				});
			}
			else{
				$('span.required_error').removeClass('hide');
			}
		});
		
		
		
		
		$(document).on('click','.DelDiscConfrm',function(e){
			var id = $(this).parent() .attr('id');
			//alert(id);
			$('#deleteConfirmBtn').parent().attr('id',id);
		});
		
			$(document).on('click','#deleteConfirmBtn',function(e){
			var point = $(this);
			var id = $(this).parent().attr('id');
			var dataString = 'id='+id;
				$.ajax({
					type: "POST",
					url: base_url+"discussions/delete",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data === 1) {
						    
							//alert($('#singleDiscussion_'+id).siblings('div .row').attr('id'));
							
							$('#singleDiscussion_'+id).fadeOut();
							point.siblings('button').click();
							
						}
						else alert('Some error occured. Please try again'); 
						
					}
				});
			
		});
		
		$(document).on('click','.hideDisClick',function(e){
			var id = $(this).parent().attr('id');
			$('#idtoHide').attr('class',id);
		});
		
		
		$(document).on('click','#preHidethis',function(e){
			var point = $(this);
			var id = $(this).parent().attr('class');
		    
			e.preventDefault();
		
			var dataString = 'id='+id;
			
				$.ajax({
					type: "POST",
					url: base_url+"discussions/update_visableStatus",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
						    
							
							$('#singleDiscussion_'+id).fadeOut();
							point.parent().siblings('button').click();
							
						}
						else alert('Some error occured. Please try again'); 
						
					}
				});
			
		});
		
	
	
});
</script>