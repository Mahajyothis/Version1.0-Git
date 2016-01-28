<script>
        $(document).ready(function(){
            $(document).on('click','span.user_unlike',function(){
                var cid="<?php  echo $this->session->userdata['profile_data'][0]['custID'];   ?>";
                var pid=$(".user").attr('id');
                var cat="ARTICLE";
                var act="LIKE";
                var page="recentactivity";
                var catid=$(this).attr('id');
                $.ajax({
                    url: "<?php echo base_url();?>like/unlike?cid="+cid+"&& uid="+pid+"&& cat="+cat+"&& act="+act+"&& page="+page+"&catid="+catid
                }).done(function( data ) {
                    $(".user_unliked").html('<span class="user_liked"> <span class="glyphicon glyphicon-thumbs-up user_like" id="'+catid+'"  ><?php echo $lang['like']; ?><span></span></span></span>');
                    $("#user_likes").load('<?php echo base_url(); ?>forum/recent_like_count_article?id_article='+catid);
                    return true;
                });
            });
            });
            </script>