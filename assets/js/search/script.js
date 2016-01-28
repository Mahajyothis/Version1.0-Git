$(document).ready(function() {

	/*==== ISOTOPE LAYOUT ====*/
    var $container = $('.section');

    $container.isotope({
        itemSelector: '.tile',
        layoutMode: 'masonryHorizontal',
        masonryHorizontal: {
            rowHeight: 0
        }
    });

    /*==== SCROLLBARS ====*/
    $("#horizon-scroll").mCustomScrollbar({
        scrollButtons: {
            enable: true
        },
		theme:"dark",
        mouseWheelPixels: 500,
        horizontalScroll: true,
        advanced: {
            autoScrollOnFocus: false,
            autoExpandHorizontalScroll: true
        }
    });
	
	$(".demo-x").mCustomScrollbar({
		axis:"x",
		advanced:{autoExpandHorizontalScroll:true}
	});

	

});