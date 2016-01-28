<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
$(document).ready(function(){ 
	/* ---Abhi ---*/
	$(document).on('click','#submitQuestion',function(e){
			//alert('Yaaa its marking...!');
			e.preventDefault();
			var point = $(this);
			var custID = $('#userIDQue').val();
			var titleQue = $('#titleQue').val();
			var bodyQue = $('#bodyQue').val();
			var category = $('#category').val();
			var privacy = $('#privacyQue').val();
			
			if(custID != '' && titleQue != '' && bodyQue != ''){
				point.val('Posting..');
				var dataString = 'custID='+custID+'&titleQue='+titleQue+'&bodyQue='+bodyQue+'&category='+category+'&privacy='+privacy;
				//alert(dataString);
				$.ajax({
					type: "POST",
					url: base_url+"forum/add",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data != 0) {
							$('#closeBtnCreate').click();
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
			var id = $(this).parent() .attr('id');
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
					url: base_url+"forum/delete",
					data: dataString,
					cache: false,
					success: function(data){
						data = parseInt(data);
						if(data === 1) {
							$('#singleQestion_'+id).fadeOut();
							point.parent().siblings('button').click();
							
						}
						else alert('Some error occured. Please try again'); 
						
					}
				});
			
		});
		
		
	
});
</script>