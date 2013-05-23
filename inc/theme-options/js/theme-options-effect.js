jQuery('document').ready(function ($) {
        $('#adribbon-settings-form .theme-option').hide().first().show();

        $('.nav-tab-wrapper').on('click', 'a', function () {
            var $this = $(this),
                newActiveId = $this.attr('href'),
                currentActiveId = $('.nav-tab-wrapper').find('.nav-tab-active').attr('href');
            
            $this.addClass('nav-tab-active').
                siblings().removeClass('nav-tab-active');

            if (newActiveId == currentActiveId) {  
                return false;
            }

            $(currentActiveId).hide(); // hide old active id option
            $(newActiveId).fadeIn(); // fade in new active id option

            return false;
        });

        // for ajax call when submit form
        $('#adribbon-settings-form').submit(function () {
            // e.preventDefault(); 
            var $wrap = $('.wrap'),
                $ajaxLoader = $('.ajax-loader'),
                $checked = $('.checked');

            $wrap.css({
                'opacity': '0.6'
            });

            $ajaxLoader.show();

            $.post(ajaxurl, $(this).serialize())
                .error(function () {
                    alert('error');
                }).success(function(data) {
                    $('.wrap').css({'opacity': '1'})
                    $('.ajax-loader').hide();

                    $checked.fadeIn();

                    setTimeout(function () {
                        $checked.fadeOut();
                    }, 1500);
                });

            return false;
        });
    });