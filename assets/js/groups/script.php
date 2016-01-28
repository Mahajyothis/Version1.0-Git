<script>
$(document).ready(function(){
$(document).on('click','span.like',function(){

   var catid=$(this).attr('id');
  var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
  var pid=$(".user"+catid).attr('id');;
  var cat="GROUP";
  var act="LIKE";
  var page="recentactivity";
 
  $.ajax({
          url: "<?php echo base_url();?>like?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid
        }).done(function( data ) {
      
       
    $("#user_like"+catid).html("<span id='user_unlike"+catid+"'><span class='small fa fa-thumbs-up unlike' id='"+catid+"' style='color:green'> <?= $lang['unlike'];?></span></span>");
  $("#user_likes"+catid).load('<?php echo base_url(); ?>groups/recent_like_count?id_post='+catid);
      return true;
        }); 
  
});

  $(document).on('click','button.comment',function(){

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
  
    var cat="GROUP";
 
  var act="COMMENT";
  
  
  
  
   //-----------------------Rohitdutta------------------------------------



      var n = $(".display_total_recent_comments"+pid);
      n.val(Number(n.val())+1);
      var tot_val = $(".display_total_recent_comments"+pid).val();
      if(tot_val > 4)
      {


         $("#view_more"+pid).show()
         $("#view_more_com"+pid).hide()

      }
     
      
  
    //-----------------------------------------------------------
  
 
  
      if(user_comment!=''){
        $.ajax({
          url: "<?php echo base_url();?>activity?user_comment",
          type:"POST",
          data:{user_comment:user_comment,uid:uid,cid:cid,pid:pid,cat:cat,act:act}
        }).done(function( data ) {
  
   
      return true;
        });   
        $.ajax({
          url: "<?php echo base_url();?>groups/recent_comments"
        }).done(function( data ) {
       
   $("#recent_comment"+pid).load('<?php echo base_url(); ?>groups/recent_comments?id_post='+pid);
   $("#user_comment"+pid).val('');
      return true;
        });  
      $.ajax({
          url: "<?php echo base_url();?>groups/recent_comment_count"
        }).done(function( data ) {
  
  $("#recent_comment_count"+pid).load('<?php echo base_url(); ?>groups/recent_comment_count?id_post='+pid);
      return true;
        });  
        
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
        
        
        
        $("#user_comment"+pid).focus();
        
        
        
      } 
    
    }
 });
 
 
 $(document).on('click','span.cmnt-boxx',function() {
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
                          var id=$(this).attr('id');
                          $('#cmnt-area_'+id).css('cursor','pointer');
                          $('#cmnt-area_'+id).slideToggle();
                           /* REinitialize Scrollbar */
                        
                          
						  /* REinitialize Scrollbar Ends */
                               });
 
 });
 
 
 // ----------------------Rohitdutta------------------------------------------------------------------------------>

$(document).ready(function()
          {

              $(document).on('click','a.view_more_com',function()

              {

                  var curr = $(this);

                  var pid = curr.attr("data-postid");

                  var dataString = 'post_id='+pid;


                  $.ajax({
                      type: "GET",
                      url: "<?php echo base_url();?>Groups/display_all_comments",

                      data: dataString,
                      cache: false,
                                            
                      beforeSend: function()
	              {
			$("#loading_img"+pid).html("<img src='<?php echo base_url();?>assets/groups/img/loading_img_groups.GIF'/>");	

		      },	    
                      success: function(data)
                      {
                          $('#recent_comment'+pid).html(data);
                          
                      },
                      complete:function()
            	      {            	            	
		          $("#loading_img"+pid).html("");            	
            	      }
                  });
		  curr.hide()

              });

          });

// ---------------------------------------------------------------------------------------------------->
  
</script>
<script>
			$(document).ready(function () {
				$(document).on('keyup','.mahajyothis_search',function(){
				 
				 var keyword=$(this).val();
				 var groupID=$(".groupid").attr('id');
				var admin=$(".admin").attr('id');
							$.ajax({
          url: "<?php echo base_url();?>searching/groupaddmembers?keyword="+keyword+"&groupID="+groupID+"&admin="+admin
        }).done(function( data ) {
		 $(".search_result").html(data);
		
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
				  
				  });
				    $(".mahajyothis_search").focus();
		  return true;
		 
        }); 
         
				  
			 
				  
				  
		$(document).on('click','span.user_details',function(){		  
				  
			var id=$(this).attr('title');
				  var uid=$(this).attr('id');
				   var groupID=$(".groupid").attr('id');
				    var status="0";
				  
			$.ajax({
          url: "<?php echo base_url();?>groups/invitations?uid="+uid+"&groupid="+groupID+"&status="+status
        }).done(function( data ) {
		 $(".search_result").html("Invitation has been Sent to "+id);
		 
		  
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
                            $(".mahajyothis_search").val('');
                           return true;
        });   
			 	  
			 });	  
		 });
		</script>
		
		
		
		
		
		
		
		<script>
		//--------------------------rohit------------------------------
		//This script is for delete the forum single comment only

          $(document).on('click','.deleteComment',function(e)
          {
              var comment_id = $(this).attr("data-comment");
		var datapostid = $(this).attr("data-p");

              $('#deleteComment').find('.ForDeleteComment').attr('id',comment_id);
               $('#deleteComment').find('.ForDeleteComment').attr('data-postid',datapostid);



          });



          $(document).on('click','#del',function(e)
          {

              
              
              
              
              var comment_id = $(this).parent().attr('id');

              var pid = $(this).parent().attr('data-postid');
              
	      var n = $(".display_total_recent_comments"+pid);
              n.val(Number(n.val())-1);
              
              var dataString = 'comment_id='+comment_id;
              
               var dataString1 = 'id_post='+pid;
              
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Groups/delete_single_comment",

                  data: dataString,
                  cache: false,
                  success: function(data)
                  {

                      $('#subcomment_'+comment_id).fadeOut();
                      /*$('#subcomment_'+comment_id).slideUp('slow',function()
                      {
			$(this).remove();
			});*/

                  }
              });
              /*
              $.ajax({
                  url: "<?php echo base_url();?>groups/recent_comment_count"
              }).done(function( data ) {

                  $("#recent_comment_count"+pid).load('<?php echo base_url(); ?>groups/recent_comment_count?id_post='+pid);
                  return true;
              });
              */
              
              $.ajax({
                  type: "GET",
                  url: "<?php echo base_url();?>groups/recent_comment_count",

                  data: dataString1 ,
                  cache: false,
                  success: function(data)
                  {

                     $("#recent_comment_count"+pid).html(data);
	             return true;
                      

                  }
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
                  url: "<?php echo base_url();?>Groups/edit_single_comment",

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


              if(comment_value != '')
             {

              var dataString = 'comment_id='+comment_id+'&comment_value='+comment_value;

              var EditSingleComment = $("#editComment");


              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Groups/get_single_comment",
                  data: dataString,
                  dataType: "json",
                  cache: false,
                  success: function(data)	{

                      EditSingleComment.find('.for_comment_id').attr('id',data[0].uaID);
                      EditSingleComment.find('#edit_single_comment').val(data[0].uaDescription);


                  }
              });
              }
               else
             {
                 $("#edit_single_comment").focus();

             }


          });

		//-------------------------------------------------------------
		</script>