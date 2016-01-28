<script>
var base_url = "<?php echo base_url();?>";

           $(document).ready(function(){
          
           $(document).on('click','button.like',function(){


                var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
                var catid=$(this).attr('id');
               
                var cat="FORUM";
                var act="LIKE";
                var page="recentactivity";
 

                var pid=$(".user"+catid).attr('id');
                $.ajax({
                    url: "<?php echo base_url();?>like?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid,
                    
                }).done(function( data ) {

                    $(".liking"+catid).html("<span class='unliking"+catid+"'><button class='pst-lke btn btn-info btn-xs unlike' id='"+catid+"'> <span class='like_count1"+catid+"'></span> <i class='fa fa-thumbs-up' style='padding-right:5px;color:white;' ></i><?php echo $lang['unlike'];?></button>");
                    $(".like_count1"+catid).load('<?php echo base_url(); ?>forum/recent_like_count?id_forum='+catid);
                    return true;
                });
});           });

        </script>
 <script>
           $(document).ready(function(){
           
           $(document).on('click','button.comment',function(){

 var pid=$(this).attr('id');
$(this).hide();
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
                    var cat="FORUM";
                    var act="EVENTCOMMENT";
                       
                    //-------------------ROhitDutta-------------------------------------
                   
                    var n = $(this).siblings("input.increment_number1");
                    n.val(Number(n.val())+1);
                    var five_value = $(this).siblings(".increment_number1").val();

                    $(this).siblings('div.display_comm1').show()

                    if(five_value > 4)
                    {
                        $(this).siblings("a.new_comments").show()
                        $(this).siblings("a.new_comments1").show()
                        $(this).parent().siblings("a.old_comments").css("display","none")
                    }
                         
                                     
                  //-----------------------------------------------------------------
                   
                    if(user_comment!=''){
                        $.ajax({
                            url: "<?php echo base_url();?>activity?user_comment",
                            type:"POST",
                            data:{user_comment:user_comment,uid:uid,cid:cid,pid:pid,cat:cat,act:act}
                        }).done(function( data ) {

                            return true;
                        });

                        $.ajax({
                            url: "<?php echo base_url();?>forum/recent_comments"

                        }).done(function( result ) {
                            $("#recent_comment"+pid).load('<?php echo base_url(); ?>forum/recent_comments?id_forum='+pid);
                            $("#user_comment"+pid).val('');


                            return true;
                        });
                        $.ajax({
                            url: "<?php echo base_url();?>forum/recent_comment_count"
                        }).done(function( result ) {
                            $("#recent_comment_count"+pid).load('<?php echo base_url(); ?>forum/recent_comment_count?id_forum='+pid);


                            return true;
                        });



                    }


                }
                $(this).show();
            });
            });

        </script>
        
        
        
        <script>
//---------------------------------------------RohitDutta----------------------------------------------
     $(document).ready(function()
     {

     $(document).on('click','a.view_more_forum_comments',function()

     {
     var curr = $(this);

     var pid=curr.attr('data-postid');
     
     var dataString = "postid="+pid;
     
     $.ajax({
            type: "GET",	 
            url: base_url+"forum/display_comments",           
            data: dataString,
            dataType: "text",
            cache: false,
             beforeSend: function()
            {
		$("#loading_img"+pid).html("<img src='<?php echo base_url();?>assets/forum/images/bar_loading.GIF'/>");
		
	    },
	    
            success:function(data) 
            {
		
               $("#recent_comment"+pid).html(data);
     	       return true;
               

            },
            complete:function()
            {
            	
            	
            	$("#loading_img"+pid).html("");
            	
            }
            
        });
     curr.hide()


     });
     });
//=======================================================================================================

$(document).ready(function()
     {

     $(document).on('click','a.new_comments1',function()

     {
     var curr = $(this);   
     var pid = $(this).siblings("input.get_postid").val();
     var dataString = "postid="+pid;

     $.ajax({
            type: "GET",	 
            url: base_url+"forum/display_comments",           
            data: dataString,
            dataType: "text",
            cache: false,
             beforeSend: function()
            {
		$("#loading_img"+pid).html("<img src='<?php echo base_url();?>assets/forum/images/bar_loading.GIF'/>");
		
	    },	    
            success:function(data) 
            {		
               $("#recent_comment"+pid).html(data);
     	       return true;               
            },
            complete:function()
            {           	
            	
            	$("#loading_img"+pid).html("");            	
            }
            
        });
     curr.hide()

     });
     });
     
//-------------------------------------------------------------------------------------------------------
</script>