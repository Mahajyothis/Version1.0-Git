<script>

           $(document).ready(function(){
          
           $(document).on('click','a.like',function(){


                var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
                var catid=$(this).attr('id');
               
                var cat="DISCUSSION";
                var act="LIKE";
                var page="recentactivity";


                var pid=$(".user").attr('id');
               
                $.ajax({
                    url: "<?php echo base_url();?>like?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid,
                    
                }).done(function( data ) {


                    $(".liking"+catid).html('<span class="unliking'+catid+'"><span class="label label-success"><span class="like_count1'+catid+'"></span> <span class="glyphicon glyphicon-thumbs-up"></span>  <a href="#" class="unlike" id="'+catid+'"> <?php echo $lang['unlike']; ?> </a></span></span>');
                     $(".like_count1"+catid).load('<?php echo base_url(); ?>Discussions/like_count?id_discussion='+catid);
                    return true;
                });
});

        

           });

        </script>
 <script>
           $(document).ready(function(){
           
           $(document).on('click','button.comment',function(){

	   var pid=$(this).attr('id');
	   $(this).hide();
                var comment_user = $("#user_comment").val();

                if(comment_user == "")
                {
                    $("#user_comment").focus();

                }
                else
                {
                    
                    var user_comment = $("#user_comment").val();
                    var uid = $(".user").attr('id');
                    var cid = "<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
                   
                    var cat="DISCUSSION";

                    var act="COMMENT";
                 
                    if(user_comment!=''){
                        $.ajax({
                            url: "<?php echo base_url();?>activity?user_comment",
                            type:"POST",
                            data:{user_comment:user_comment,uid:uid,cid:cid,pid:pid,cat:cat,act:act}
                        }).done(function( data ) {

                            return true;
                        });

                        $.ajax({
                            url: "<?php echo base_url();?>Discussions/display_commentssss?did="+pid
                        }).done(function( data) {
                            $(".recent_comment").html(data);
                            $("#user_comment").val('');
			//---------------------------RohitDutta-------------------------------------

			var five_val = $(".five_value").val()    
                    
                        var n = $(".five_value");
                        n.val(Number(n.val())+1);

                        if(five_val > 3)
                        {
                            $(".view_more_discussion_comments").show()
                        }

                        $(".d_c").hide()
			//--------------------------------------------------------------------------


                            return true;
                        });
                        $.ajax({
                            url: "<?php echo base_url();?>Discussions/comment_count"
                        }).done(function( result ) {
                            $(".incc").load('<?php echo base_url(); ?>Discussions/comment_count?id_discussion='+pid);


                            return true;
                        });



                    }


                }
                $(this).show();
            });
            });







	//--------------------------------RohitDutta-------------------------------------------
	
           $(document).ready(function()
           {
               $(".view_more_discussion_comments").click(function()
               {

                   var discussion_id ='<?php echo $result->id_dis;?>';
                   var curr = $(this);
                   var dataString = "discussion_id="+discussion_id;
		   
		            $.ajax({
		            type: "GET",	 
		            url: "<?php echo base_url();?>Discussions/display_more_comments",           
		            data: dataString,
		            dataType: "text",
		            cache: false,
		             beforeSend: function()
		            {
				$("#loading_img").html("<img src='<?php echo base_url();?>assets/forum/images/bar_loading.GIF'/>");
				
			    },
			    
		            success:function(data) 
		            {
				
		              $(".recent_comment").append(data);
		     	       return true;
		               
		
		            },
		            complete:function()
		            {
		            	
		            	
		            	//$("#loading_img").html("");
		            	$("#loading_img").remove();
		            	
		            	
		            }
		            
		        });
                   curr.hide()


               });
           });
	  
           $(document).ready(function()
           {
            var five_val = $(".five_value").val()

               if(five_val > 4)
               {
                   $(".view_more_discussion_comments").show()
               }
           });
          //----------------------------------------------------------
	
          $(document).on('click','.deleteComment',function(e)
		{
		var comment_id = $(this).attr("data-commentid");
		var d_id = $(this).attr("data-d");
		
		

		$('#deleteComment').find('.ForDeleteComment').attr('id',comment_id);
		$('#deleteComment').find('.ForDeleteComment').attr('data-dis',d_id);
		
		
		
		});
		
           
           
           $(document).on('click','#deleteCommentBtn',function(e)
		{
			
			
			
			var n = $(".five_value");
                        n.val(Number(n.val())-1);
			
			var commentd_id = $(this).parent().attr('id');
			
			var pid = $(this).parent().attr('data-dis');
			
			

			
			var dataString = 'commentd_id='+commentd_id;
			$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>Discussions/delete_single_discussion_comment",
					
					data: dataString,
					cache: false,
					success: function(data)
					{
						
						
						$('#singlecomment_'+commentd_id).slideUp('slow',function()
						{$(this).remove(); });
					
					}
				});
			
                        var dataString2 = 'id_discussion='+pid;
                        $.ajax({
					type: "GET",
					url: "<?php echo base_url();?>Discussions/comment_count",
					
					data: dataString2,
					cache: false,
					success: function(data)
					{
						
						$(".incc").html(data);


                            			return true;
						
					
					}
				});	
				
			
		});
		//---------------------------------------------------------
		
		$(document).on('click','.deleteComment2',function(e)
		{
		var comment_id = $(this).attr("data-commentid");
		var d_id = $(this).attr("data-d");

		$('#deleteComment2').find('.ForDeleteComment2').attr('id',comment_id);
		$('#deleteComment2').find('.ForDeleteComment2').attr('data-dis',d_id);
		
		
		
		});
		$(document).on('click','#deleteCommentBtn2',function(e)
		{
			
			
			
			var n = $(".five_value");
                        n.val(Number(n.val())-1);
			
			var commentd_id = $(this).parent().attr('id');
			
			var pid = $(this).parent().attr('data-dis');

			
			var dataString = 'commentd_id='+commentd_id;
			$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>Discussions/delete_single_discussion_comment1",
					
					data: dataString,
					cache: false,
					success: function(data)
					{
						
						
						$('#singlecomment_'+commentd_id).slideUp('slow',function()
						{$(this).remove(); });
					
					}
				});
				
			/*
			$.ajax({
                            url: "<?php echo base_url();?>Discussions/comment_count"
                        }).done(function( result ) {
                            $(".incc").load('<?php echo base_url(); ?>Discussions/comment_count?id_discussion='+pid);


                            return true;
                        });
                        */	
			var dataString2 = 'id_discussion='+pid;
                        $.ajax({
					type: "GET",
					url: "<?php echo base_url();?>Discussions/comment_count",
					
					data: dataString2,
					cache: false,
					success: function(data)
					{
						
						$(".incc").html(data);


                            			return true;
						
					
					}
				});	
			
		});
		
		//---------------------------------------------------------
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
					url: "<?php echo base_url();?>Discussions/get_single_discussion_comment",
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
			
			

			var comment_value = $('#edit_single_comment').val();
			
			

			
	 if(comment_value != '')
             {
			var dataString = 'comment_id='+comment_id+'&comment_value='+comment_value;
			
			$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>Discussions/update_single_discussion_comment",
					
					data: dataString,
					cache: false,
					success: function(data)
					{
						
						$('#update_com_'+comment_id).html(comment_value);
						
						$('#cancelAtEditComment').click();
						
						
						
					
					}
				});
				}
				else
             {
                 $("#edit_single_comment").focus();

             }

				
				
			
		});
		
           //---------------------------------------------------------------------------




        </script>