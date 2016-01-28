<script>
$(document).ready(function(){
  $(document).on('click','a.unlike',function(){
                var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
                var catid=$(this).attr('id');
                var cat="DISCUSSION";
                var act="LIKE";
                var page="recentactivity";
                var pid=$(".user").attr('id');
                      $.ajax({
                    url: "<?php echo base_url();?>like/unlike?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid,
                                    }).done(function( data ) {
                    $(".unliking"+catid).html('<span class="liking'+catid+'"><span id="display_discussion_like" class="label label-success"><span class="like_count'+catid+'"></span>  <span class="glyphicon glyphicon-thumbs-up"> </span> <a href="#" class="like" id="'+catid+'"> <?php echo $lang['like'];?></a></span></span>');
                       $(".like_count"+catid).load('<?php echo base_url(); ?>Discussions/like_count?id_discussion='+catid);
                    return true;
                });

});});
</script>