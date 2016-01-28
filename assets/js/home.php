<script>


     $(document).ready(function () {

  $(".home_search").autocomplete("<?php echo base_url(); ?>main_search_controller", {

        selectFirst: true
  });
 });

</script>