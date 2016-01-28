$(function() {

    $(document).ready(function() {
        $('#locklogo').fadeIn(100);
    });


    $('#lockscreen').click(function() {
        if ($(this).hasClass('lockslide')) {
            var winheight = $(window).height();
            $(this).animate({'top': -winheight + 'px'}, 100, function() {
                $(this).hide(0);
            });
        }
        else
            $(this).fadeOut(200);
    });

    $(window).load(function() {
        $('#lockloader').fadeOut(100);
        $('#lockscreen').delay(200).trigger('click');
    });

});