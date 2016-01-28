$(document).ready(function() {
	var max_length = 300;
	var description = $('#summary-details').val();
        count = description.length;
        var remaining_count = max_length-count;
        if(remaining_count<=0){
           remaining_count = 0;
           $('#summary-details').val($('#summary-details').val().substr(0, max_length));
        }
        $('#chars_left span').html(remaining_count);
		
	$('#summary-details').on({
		keyup: function(e) {
			var description = $(this).val();
			count = description.length;
			var remaining_count = max_length-count;
			if(remaining_count<=0){
				remaining_count = 0;
			   $(this).val($(this).val().substr(0, max_length));
			}
			$('#chars_left span').html(remaining_count);
		}
	});

	// CK Editor initialization
	CKEDITOR.replace( 'artDesc' );

	$("#myBtn").click(function(){
      $("#myModal").modal();
    });

    $('#tokenize').tokenize({
          newElements: false,
          displayDropdownOnFocus:true,
          //datas: "json.php"
    });

});