<script>
$(document).ready(function(){
  $(document).on('click','button.unlike',function(){
                var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
                var catid=$(this).attr('id');
                var cat="FORUM";
                var act="LIKE";
                var page="recentactivity";
               var pid=$(".user"+catid).attr('id');
                      $.ajax({
                    url: "<?php echo base_url();?>like/unlike?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid,
                                    }).done(function( data ) {
                    $(".unliking"+catid).html('<span class="liking'+catid+'"><button id="'+catid+'" class="pst-lke btn btn-info like btn-xs"> <span class="like_count'+catid+'"></span > <i class="fa fa-thumbs-o-up" style="padding-right:5px;" ></i><?php echo $lang['like'];?></button></span>').fadeIn('slow');
                       $(".like_count"+catid).load('<?php echo base_url(); ?>forum/recent_like_count?id_forum='+catid).fadeIn('slow');
                    return true;
                });

});});
</script>