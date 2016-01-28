		
/*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
                changeYear: true,
                yearRange: "2013:2050",
                dateFormat: 'yy-mm-dd',
                onSelect: function(selected,evnt) {
                     $(this).blur();
                }
    });
	
	$('.timepicker').ptTimeSelect({
		containerClass: "timeCntr",
		containerWidth: "350px",
		setButtonLabel: "Select",
		minutesLabel: "min",
		hoursLabel: "Hrs",
		zIndex:9999,
		popupImage:     undefined,
        onFocusDisplay: true,

	});
  }
  
   

);