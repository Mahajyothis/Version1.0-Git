<script>
$(document).ready(function(){
  $(document).on('click','span.unlike',function(){
                var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
                var catid=$(this).attr('id');
              
                var cat="POST";
                var act="LIKE";
                var page="recentactivity";
               var pid=$(".user"+catid).attr('id');
                      $.ajax({
                    url: "<?php echo base_url();?>like/unlike?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid,
                                    }).done(function( data ) {
                    $("#user_unlike"+catid).html(' <span  style="padding:3px;border-radius:3px;" id="user_like'+catid+'"><span  class="small glyphicon glyphicon-thumbs-up user_like" id="'+catid+'">  <?= $language["likes"];?></span></span>').fadeIn('slow');
                      $("#user_likes"+catid).load('<?php echo base_url(); ?>post/recent_like_count?id_post='+catid);
                    return true;
                });

});
  $(document).on('click','span.sub_sub_user_unlike',function(){
                var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
                var catid=$(this).attr('id');
                var cat="POST";
                var act="SUB_SUB_LIKE";
                var page="recentactivity";
                var pid=$(".sub_user"+catid).attr('id');
                      $.ajax({
                    url: "<?php echo base_url();?>like/unlike?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid,
                                    }).done(function( data ) {
                    $("#user_sub_unlike"+catid).html('<span id="user_sub_like'+catid+'"><span class="small  fa fa-thumbs-o-up sub_sub_user_like" id="'+catid+'"> <?= $language["likes"];?></span></span>').fadeIn('slow');
                      $("#user_sub_likes"+catid).load('<?php echo base_url(); ?>post/recent_sub_sub_like_count?id_post='+catid);
                    return true;
                });

});
  $(document).on('click','span.sub_user_unlike',function(){
                var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
                var catid=$(this).attr('id');
                var cat="POST";
                var act="SUB_LIKE";
                var page="recentactivity";
                var pid=$(".user_sub"+catid).attr('id');
                      $.ajax({
                    url: "<?php echo base_url();?>like/unlike?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid,
                                    }).done(function( data ) {
                    $("#use_unlike"+catid).html('<span id="use_like'+catid+'"><span class="small  fa fa-thumbs-o-up sub_user_like" id="'+catid+'"> <?= $language["likes"];?></span></span>').fadeIn('slow');
                      $("#use_likes"+catid).load('<?php echo base_url(); ?>post/recent_sub_like_count?id_post='+catid);
                    return true;
                });

});




});
</script>