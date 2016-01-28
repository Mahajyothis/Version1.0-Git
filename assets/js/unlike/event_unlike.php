<script>
$(document).ready(function(){
  $(document).on('click','span.unlike',function(){
                var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
                var catid=$(this).attr('id');
                var cat="EVENT";
                var act="LIKE";
                var page="recentactivity";
               var pid=$(".user"+catid).attr('id');
                      $.ajax({
                    url: "<?php echo base_url();?>like/unlike?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid,
                                    }).done(function( data ) {
                    $("#user_unlike"+catid).html('<span id="user_like'+catid+'"><span class="small" style="padding:3px;border-radius:3px;" ><span class="small fa fa-thumbs-up like" id="'+catid+'" style="color:white;"> <?php echo $lang['like']; ?></span></span></span>').fadeIn('slow');
                      $("#user_likes"+catid).load('<?php echo base_url(); ?>groups/recent_like_count_event?id_event='+catid);
                    return true;
                });

});});
</script>