jQuery(document).ready(function () {

    // jQuery('.article-preview-image').on('mouseenter', 'img', function (){
    //     jQuery('.cover').animate({
    //         'top': 0
    //     });
    // });

    // jQuery('.cover').on('mouseout', function (){
    //     $(this).animate({
    //         'top': '100%'
    //     });
    // });
    
    var listItems = "";

    // grab to selection top-menu
    jQuery('.top-menu-nav a').each(function (index) {
        listItems += '<option value="' + this.href + '">' + this.innerHTML + '</option>'; 
    });

    jQuery('.top-menu-selection').append(listItems);

    listItems = "";
    
    // grab to selection main-menu
    jQuery('.main-menu a').each(function (index) {
        listItems += '<option value="' + this.href + '">' + this.innerHTML + '</option>'; 
    });

    jQuery('.main-menu-selection').append(listItems);

    // click to an item in selection menu and redirect
    jQuery('.top-menu-selection').on('change', function () {
        window.location = this.value;
        console.log(this.value);
    });

    jQuery('.main-menu-selection').on('change', function () {
        window.location = this.value;
        console.log(this.value);
    });

    // adaptive video
    jQuery('.video-container').fitVids();


    // remove woocommerce style
    jQuery('#woocommerce_frontend_styles-css').remove();

    // fix woocommerce billing address css
    // $('.shipping_address').css({'overflow': 'visible'});
    $('#shiptobilling-checkbox').off('change').on('change', function (e) {
        if ($(this).is(':checked')) 
            $('.shipping_address').hide();
        else
            $('.shipping_address').show();

    });
}); 

// var HoverImage = {
//     init: function (config) {
//         this.config = config;
//         this.bindEvents();
//     },

//     bindEvents: function () {
//         this.config.container.on('mouseenter', 'img', 'showCoverImage');
//         this.config.cover.on('mouseout', 'hideCoverImage');
//     },

//     showCoverImage: function () {
//         var self = HoverImage;
//         self.config.cover.animate({
//             'top': 0
//         });
//     },

//     hideCoverImage: function () {
//         var self = HoverImage;

//         self.config.cover.animate({
//             'top': 0
//         });
//     }
// };

// HoverImage.init({
//     container: jQuery('.article-preview-image'),
//     cover: jQuery('.cover')
// });
