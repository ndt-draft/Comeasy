<?php 
// Disable WooCommerce styles 
define( 'WOOCOMMERCE_USE_CSS', false );

// Custom Currency
add_filter( 'woocommerce_currencies', 'add_my_currency' );
 
function add_my_currency( $currencies ) {
    $currencies['VND'] = __( 'Vietnamese Dong (VND)', 'woocommerce' );
    return $currencies;
}
 
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
 
function add_my_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'VND': $currency_symbol = 'VND'; break;
    }
    return $currency_symbol;
}


// remove built-in styles and scripts
// add_action( 'init', 'child_manage_woo_styles', 99 );
/**
 * Remove WooCommerce styles and scripts unless inside the store.
 *
 * @author Greg Rickaby
 * @since 1.0.0
 */
// function child_manage_woo_styles() {

//     wp_dequeue_style( 'woocommerce_frontend_styles' );
//     wp_dequeue_style( 'woocommerce_fancybox_styles' );
//     wp_dequeue_style( 'woocommerce_chosen_styles' );
//     wp_dequeue_script( 'woocommerce' );
//     wp_dequeue_script( 'wc_price_slider' );
//     wp_dequeue_script( 'fancybox' ); // Not using fancybox? Then uncomment this line!
//     // wp_dequeue_script( 'jqueryui' ); Not using jquery-ui? Then uncomment this line!
//     // update_option('woocommerce_enable_lightbox', 'no');
// }

// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
    woocommerce_related_products(4,4); // Display 3 products in rows of 3
}

/**
* Replace WooCommerce Default Pagination with WP-PageNavi Pagination
*
* @author WPSnacks.com
* @link http://www.wpsnacks.com
*/
//remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);

// function woocommerce_pagination() {
//     echo '<hr class="normal-ruler">';
//     wp_pagenavi();     
// }

//add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);



// Display 24 products per page. Goes in functions.php
$my_options = get_option('adribbon_theme');

$adribbon_shop_number_products_per_page = isset ($my_options['adribbon-shop-number-products-per-page']) ?
    $my_options['adribbon-shop-number-products-per-page'] : 20;

add_filter('loop_shop_per_page', create_function( '$cols', "return {$adribbon_shop_number_products_per_page};"));



/**
* This code should be added to functions.php of your theme
**/
// add_filter('woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args');
 
function custom_woocommerce_get_catalog_ordering_args( $args ) {
    if (isset($_SESSION['orderby'])) {
        switch ($_SESSION['orderby']) :
            case 'date_asc' :
                $args['orderby'] = 'date';
                $args['order'] = 'asc';
                $args['meta_key'] = '';
            break;
            case 'price_desc' :
                $args['orderby'] = 'meta_value_num';
                $args['order'] = 'desc';
                $args['meta_key'] = '_price';
            break;
            case 'title_desc' :
                $args['orderby'] = 'title';
                $args['order'] = 'desc';
                $args['meta_key'] = '';
            break;
        endswitch;
    }

    return $args;
}
 



// add_filter('woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby');
 
function custom_woocommerce_catalog_orderby( $sortby ) {
    $sortby['title_desc'] = __('Reverse-Alphabetically', 'adribbon');
    $sortby['price_desc'] = __('Price (highest to lowest)', 'adribbon');
    $sortby['date_asc'] = __('Oldest to newest', 'adribbon');
    return $sortby;
}


/* Translate woocommerce text */
/**
* filter translations, to replace some WooCommerce text with our own
* @param string $translation the translated text
* @param string $text the text before translation
* @param string $domain the gettext domain for translation
* @return string
*/
function wpse_77783_woo_bacs_ibn($translation, $text, $domain) {
    if ($domain == 'woocommerce') {
        switch ($text) {
            case 'Add to cart':
                $translation = 'Cho vào giỏ';
                break;
            case 'Select options':
                $translation = 'Lựa chọn';
                break;
        }
    }

    return $translation;
}

// add_filter('gettext', 'wpse_77783_woo_bacs_ibn', 10, 3);


function comeasy_wooshare() { ?>
    <div class="social">
    
        <?php // TWITTER ?>
        <a href="https://twitter.com/share" class="twitter-share-button" data-via="thanh4890">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

        <!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="medium" data-annotation="none"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

        <?php // FACEBOOK LIKE ?>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=253622438074629";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        
        <div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial"></div>
    
    </div>
<?php }

add_action('woocommerce_share', 'comeasy_wooshare');