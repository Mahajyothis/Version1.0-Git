<script type="text/javascript">
		var base_url = '<?php echo base_url(); ?>';
        var offset = '<?php echo $this->config->item('page_userlist_limit')?$this->config->item('page_userlist_limit'):'3'; ?>';
        var request_ajax = true;
        var ajax_is_on = false;
        //var session_user = 'test';
        var objHeight=$('#main').height()- 50;
        var page_number = '<?php echo $this->uri->segment('3'); ?>';
        var last_scroll_top = 0;

$('#main').scroll(function(event) {

            var st = $(this).scrollTop();

            if(st > last_scroll_top){
                if ($('#main').scrollTop() + 150 > $(document).height() - $('#main').height()) {

                    var user_posts = '';

                    if (request_ajax === true && ajax_is_on === false) {
                        ajax_is_on = true; $('div#last_msg_loader1').show();
                        $('div#last_msg_loader1').html('<img src="<?php echo IMAGES;?>ajax-loader.gif" align="absmiddle" alt="Loading..."></img>');
                        $.ajax({
                            url: "<?php echo base_url(); ?>ajax/autoload/<?php echo $page_name; ?>/"+page_number,
                            data: {page_number: offset},
                            type: 'post',
                            
                            //dataType: 'json',
                            success: function(data) {
                              $('div#last_msg_loader1').html('');
                                if (data != 'No More Data') {										
                                    $('#blocks').append(data);
                                    offset = parseInt(offset)+1;
		
                                } else {
                                    request_ajax = false;
                                    //$("#last_msg_loader1").addClass('alert alert-success');
                                    $('div#last_msg_loader1').html('No More Data');
                                }
                                ajax_is_on = false;
                            }
                        });
                    }
                }
            }
            last_scroll_top = st;
        });

</script>