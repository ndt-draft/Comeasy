(function($) {
    $('.top-link-footer').on('click', 'a', function () {
        $('body,html').animate({
            scrollTop: 0
        }, 1000);

        return false;
    });
}(jQuery));