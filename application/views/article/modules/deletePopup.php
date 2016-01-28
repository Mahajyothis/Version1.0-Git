<div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="z-index:9999;">
        <div class="modal-content">
            <form action="<?php echo base_url().'article/delete'?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"><h2><?php echo $lang['delete_confirmation']; ?></h2>
                </div>
                <div class="modal-body">
                   <?php echo $lang['delete_message']; ?> ?
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="event-id" name="article_id" value="<?php echo $results->artID;?>">
                    <a href="javascript:void(0)" id="">
                        <button type="submit" class="btn btn-danger" id="deleteConfirmBtn"><?php echo $lang['confirm']; ?></button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $lang['cancel']; ?></button>
                </div>
            </form>
        </div>
    </div>
</div>