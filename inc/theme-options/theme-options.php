<?php
// create custom plugin settings menu
add_action('admin_menu', 'adribbon_create_menu');

function adribbon_create_menu() {
    // create new submenu
    add_theme_page('Theme Options', 'Theme Options', 'edit_themes', 
                     basename(__FILE__), 'adribbon_settings_page');

    // add js to the header
    if ( isset( $_GET['page'] ) && $_GET['page'] == basename(__FILE__) ) {       
        add_action('admin_head', 'adribbon_theme_options_page_head');
    }

    $myopt = array(
        // general settings
        'adribbon-logo' => '',
        'adribbon-favicon' => '',
        // 'adribbon-admin-bio-disappear' => 'unchecked',
        // 'adribbon-admin-avatar' => '',
        // 'adribbon-admin-status' => '',
        'adribbon-google-analytics' => '',

        // homepage settings
        'adribbon-slider-disappear' => 'unchecked',
        'adribbon-slider-category' => '',
        'adribbon-homepage-number-images-main-slider' => 4,
        'adribbon-homepage-carousel-slider-disappear' => 'unchecked',
        'adribbon-homepage-title-carousel-slider' => 'Featured Products',
        'adribbon-homepage-carousel-slider-category' => '',
        'adribbon-homepage-number-images-carousel-slider' => 8,

        'adribbon-homepage-product-area-disappear' => 'unchecked',
        'adribbon-homepage-title-product-area' => 'Featured Products',
        'adribbon-homepage-product-area-category' => '',
        'adribbon-homepage-number-product-product-area' => 8,

        'adribbon-homepage-blog-area-disappear' => 'unchecked',
        'adribbon-homepage-title-blog-area' => 'Blog',
        'adribbon-homepage-number-post-blog-area' => 1,

        // blog settings
        'adribbon-blog-slider-disappear' => 'unchecked',
        'adribbon-blog-slider-category' => '',
        'adribbon-blog-id' => '',
        'adribbon-blog-fullwidth' => 'unchecked',
        'adribbon-blog-number-images-main-slider' => 4,

        // shop settings
        'adribbon-shop-slider-disappear' => 'unchecked',
        'adribbon-shop-slider-category' => '',
        'adribbon-shop-number-images-main-slider' => 4,
        'adribbon-shop-number-products-per-page' => 4
    );

    add_option('adribbon_theme', $myopt);

    // call register settings function
    // add_action('admin_init', 'adribbon_register_settings');
}

// js for theme option effect and ajax call
function adribbon_theme_options_page_head() { ?>
    <script src="<?php print THEMEROOT; ?>/inc/theme-options/js/theme-options-effect.js"></script>
    <link rel="stylesheet" href="<?php print THEMEROOT; ?>/inc/theme-options/css/styles.css">
<?php }

// function adribbon_register_settings() {
//     // register settings 
//     // for logo
//     register_setting('adribbon-settings-group', 'adribbon-logo');

//     // for admin status 
//     register_setting('adribbon-settings-group', 'adribbon-admin-bio-disappear');
//     register_setting('adribbon-settings-group', 'adribbon-admin-avatar');
//     register_setting('adribbon-settings-group', 'adribbon-admin-status');

//     // for slider settings
//     register_setting('adribbon-settings-group', 'adribbon-slider-disappear');
//     register_setting('adribbon-settings-group', 'adribbon-slider-category');

// }

function adribbon_settings_page() { ?>
    
    <div class="wrap">

        <div class="icon32" id="icon-themes"><br></div>
        
        <h2 class="nav-tab-wrapper">
            <a id="of-option-general-tab" href="#of-option-general" class="nav-tab nav-tab-active">General</a>
            <a id="of-option-homepage-tab" href="#of-option-homepage" class="nav-tab">Homepage</a>
            <a id="of-option-blog-tab" href="#of-option-blog" class="nav-tab">Blog</a>
            <a id="of-option-shop-tab" href="#of-option-shop" class="nav-tab">Shop</a>
        </h2>

        <form action="/" id="adribbon-settings-form" name="adribbon-settings-form">
            
            <?php // settings_fields('adribbon-settings-group'); 
                $options = get_option('adribbon_theme');
                // var_dump($options);
            ?>

            <?php 
                // GENERAL SETTINGS
                require_once('php/general-settings.php');

                // HOMEPAGE SETTINGS
                require_once('php/homepage-settings.php');
            
                // BLOG SETTINGS 
                require_once('php/blog-settings.php'); 

                // SHOP SETTINGS
                require_once('php/shop-settings.php');

            ?>

            <p class="submit">
                <input type="submit" name="submit" 
                    id="submit" class="button button-primary" value="Save Changes">
            </p>

            <input type="hidden" name="action" value="adribbon_theme_data_save">
            <input type="hidden" name="security" value="<?php echo wp_create_nonce('adribbon_theme_data'); ?>">

        </form> <!-- end adribbon-settings-form -->

        <div class="ajax-loader"></div>
        <div class="checked"></div>

    </div>
    
<?php }


// Handle ajax
add_action('wp_ajax_adribbon_theme_data_save', 'adribbon_theme_save_ajax');

function adribbon_theme_save_ajax() {
    
    check_ajax_referer('adribbon_theme_data', 'security');

    $data = $_POST;
    unset($data['security'], $data['action']);
    
    if(!is_array(get_option('adribbon_theme'))) {
        $options = array();
    } else {
        $options = get_option('adribbon_theme');
    }

    if(!empty($data)) {
        $diff = array_diff($options, $data);
        $diff2 = array_diff($data, $options);
        $diff = array_merge($diff, $diff2);
    } else {
        $diff = array();
    }
        
    if(!empty($diff)) { 
        $data = array_merge(array(
            // general settings
            'adribbon-logo' => '',
            'adribbon-favicon' => '',
            // 'adribbon-admin-bio-disappear' => 'unchecked',
            // 'adribbon-admin-avatar' => '',
            // 'adribbon-admin-status' => '',
            'adribbon-google-analytics' => '',

            // homepage settings
            'adribbon-slider-disappear' => 'unchecked',
            'adribbon-slider-category' => '',
            'adribbon-homepage-number-images-main-slider' => 4,

            'adribbon-homepage-carousel-slider-disappear' => 'unchecked',
            'adribbon-homepage-title-carousel-slider' => 'featured products',
            'adribbon-homepage-carousel-slider-category' => '',
            'adribbon-homepage-number-images-carousel-slider' => 8,
            
            'adribbon-homepage-product-area-disappear' => 'unchecked',
            'adribbon-homepage-title-product-area' => 'featured products',
            'adribbon-homepage-product-area-category' => '',
            'adribbon-homepage-number-product-product-area' => 8,

            'adribbon-homepage-blog-area-disappear' => 'unchecked',
            'adribbon-homepage-title-blog-area' => 'Blog',
            'adribbon-homepage-number-post-blog-area' => 1,

            // blog settings
            'adribbon-blog-slider-disappear' => 'unchecked',
            'adribbon-blog-slider-category' => '',
            'adribbon-blog-id' => '',
            'adribbon-blog-fullwidth' => 'unchecked',
            'adribbon-blog-number-images-main-slider' => 4,

            // shop settings
            'adribbon-shop-slider-disappear' => 'unchecked',
            'adribbon-shop-slider-category' => '',
            'adribbon-shop-number-images-main-slider' => 4,
            'adribbon-shop-number-products-per-page' => 4
        ), $data);

        if(update_option('adribbon_theme', $data)) {
            // echo json_encode(get_option('adribbon_theme'));
            die('1');
        } else {
            die('0');
        }
    } else {
        die('1');   
    }
}