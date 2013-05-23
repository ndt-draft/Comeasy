<?php
/*****************************************************************************/
/* Define Constants */
/*****************************************************************************/
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT . '/images');

/*****************************************************************************/
/* Localization */
/*****************************************************************************/
load_theme_textdomain('adribbon', get_template_directory() . '/languages');

/*****************************************************************************/
/* Support Woocommerce */
/*****************************************************************************/
add_theme_support( 'woocommerce' );

/*****************************************************************************/
/* RSS */
/*****************************************************************************/
add_theme_support( 'automatic-feed-links' );

/*****************************************************************************/
/* Add theme support for post thumbnails */
/*****************************************************************************/
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails', array('post', 'slides'));
    /*set_post_thumbnail_size(210, 210);*/

    add_image_size('post-thumbnail-size', 210, 210, true);
    add_image_size('featured-slide-size', 1170, 350, true);
}

if ( ! isset( $content_width ) ) $content_width = 784;


/*****************************************************************************/
/* Add theme support for custom background and header */
/*****************************************************************************/
if (function_exists('add_theme_support')) {
    add_theme_support('custom-background', array(
        'default-color' => 'e6e6e6',
        'default-image' => IMAGES . '/body-bg.png'
    ));
}

/*****************************************************************************/
/* Custom Header */
/*****************************************************************************/
// require( get_template_directory() . '/custom-header.php' );


/*****************************************************************************/
/* Load Javascript */
/*****************************************************************************/
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);

function my_jquery_enqueue() {
    wp_deregister_script('jquery');

    wp_register_script('jquery', THEMEROOT . '/js/jquery-1.8.3.js', array(), '1.8.3');
    wp_register_script('fitvid', THEMEROOT . '/js/jquery.fitvids.js', array('jquery'), '1.0', true);
    wp_register_script('backtotop', THEMEROOT . '/js/backtotop.js', array('jquery'), '1.0', true);
    wp_register_script('custom_js', THEMEROOT . '/js/scripts.js', array('jquery', 'fitvid'), '1.1', true);

    wp_enqueue_script('jquery');
    wp_enqueue_script('fitvid');
    wp_enqueue_script('backtotop');
    wp_enqueue_script('custom_js');
}



/*****************************************************************************/
/* Menus */
/*****************************************************************************/
function register_my_menus() {
    register_nav_menus(array(
        'top-menu' => __('Top Menu', 'adribbon'),
        'main-menu' => __('Main Menu', 'adribbon')
    ));
}

add_action('init', 'register_my_menus');

/*****************************************************************************/
/* Register Sidebar */
/*****************************************************************************/
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Homepage Sidebar', 'adribbon'),
        'id' => 'main-sidebar',
        'description' => __('The homepage sidebar area', 'adribbon'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Footer Sidebar', 'adribbon'),
        'id' => 'footer-sidebar',
        'description' => __('The footer sidebar area', 'adribbon'),
        'before_widget' => '<div class="footer-sidebar-widget span3">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Blog Sidebar', 'adribbon'),
        'id' => 'blog-sidebar',
        'description' => __('The blog sidebar area', 'adribbon'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Single Post Sidebar', 'adribbon'),
        'id' => 'single-post-sidebar',
        'description' => __('The single post sidebar area', 'adribbon'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Shop Sidebar', 'adribbon'),
        'id' => 'shop-sidebar',
        'description' => __('The shop sidebar area', 'adribbon'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Single Product Sidebar', 'adribbon'),
        'id' => 'single-product-sidebar',
        'description' => __('The single product sidebar area', 'adribbon'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Normal Page Sidebar', 'adribbon'),
        'id' => 'normal-sidebar',
        'description' => __('The normal sidebar area. This sidebar will display in theses normal pages that not home, shop, single-product, blog, single-blog-post and 404 page', 'adribbon'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('404 Page Sidebar', 'adribbon'),
        'id' => 'fourohfour-sidebar',
        'description' => __('The 404-page sidebar area', 'adribbon'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

/*****************************************************************************/
/* Comments */
/*****************************************************************************/
function adribbon_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    $args['reply_text'] = __('Reply', 'adribbon');

    if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback') : ?>
        
        <li class="pingback" id="comment-<?php comment_ID(); ?>">
            <article <?php comment_class(); ?>>    
                <header>
                    <h5><?php _e('Pingback', 'adribbon'); ?></h5>
                    <p><?php edit_comment_link(); ?></p>
                </header>

                <p><?php comment_author_link(); ?></p>
            </article>
        </li>

    <?php elseif (get_comment_type() == 'comment') : ?>
        <li id="comment-<?php comment_ID(); ?>">
            <article <?php comment_class(); ?>>
                <header class="clearfix">
                    <figure class="comment-avatar">
                        <?php echo get_avatar($comment, 63); ?>
                    </figure>

                    <h5 class="comment-author">
                        <?php if ($comment->user_id == 1) : ?>
                            <span><?php _e('Admin', 'adribbon'); ?></span>
                        <?php endif; ?>
                        
                        <?php comment_author_link(); ?>
                    </h5>
                    
                    <p class="comment-time"><?php _e('on', 'adribbon'); ?> <?php comment_date(); ?> <?php _e('at', 'adribbon'); ?> <?php comment_time(); ?>
                        <?php comment_reply_link(array_merge(
                            $args, array('depth' => $depth, 
                                         'max_depth' => $args['max_depth'])
                        )); ?>
                    </p>
                </header>

                <?php if ($comment->comment_approved == '0') : ?>

                    <p class="awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'adribbon'); ?></p>
                
                <?php endif; ?>

                <?php comment_text(); ?>
            </article>
        
    <?php endif;
}

/*****************************************************************************/
/* Custom Comment Form */
/*****************************************************************************/
function adribbon_custom_comment_form($defaults) {
    $defaults['comment_notes_before'] = '';
    $defaults['comment_notes_after'] = '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'adribbon' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>';
    $defaults['title_reply'] = __('Leave a reply', 'adribbon');
    $defaults['cancel_reply_link'] = __('Cancel reply', 'adribbon');
    $defaults['label_submit'] = __('Post Comment', 'adribbon');
    
    $defaults['id'] = 'commentform';
    $defaults['comment_field'] = '<p><textarea name="comment" id="comment" cols="30" rows="10"></textarea></p>';
    
    return $defaults;
}

add_filter('comment_form_defaults', 'adribbon_custom_comment_form');

function adribbon_custom_comment_fields($fields) {
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : ' ');

    $fields = array(
        'author' => '<p>' .
                        '<input type="text" name="author" id="author" value="' .
                            esc_attr($commenter['comment_author']) . '"' . $aria_req . '>' .
                        '<label for="author">' . __('Name', 'adribbon') . ($req ? ' *' : '') . '</label>' .
                    '</p>',
        'email'  => '<p>' .
                        '<input type="text" name="email" id="email" value="' .
                            esc_attr($commenter['comment_author_email']) . '"' . $aria_req . '>' .
                        '<label for="email">' . __('Email', 'adribbon') . ($req ? ' *' : '') . '</label>' .
                    '</p>',
        'url'    => '<p>' .
                        '<input type="text" name="url" id="url" value="' .
                            esc_attr($commenter['comment_author_url']) . '"' . $aria_req . '>' .
                        '<label for="url">' . __('Website', 'adribbon') . '</label>' .
                    '</p>'
    );

    return $fields;
}

add_filter('comment_form_default_fields', 'adribbon_custom_comment_fields');

/*****************************************************************************/
/* Related post */
/*****************************************************************************/
// add_filter('the_content', 'comeasy_related_category_posts');

function comeasy_related_category_posts($content) {
    $id = get_the_id();

    if (!is_singular('post'))
        return $content;

    $terms = get_the_terms($id, 'category');
    $cats = array();

    foreach ($terms as $term) {
        $cats[] = $term->cat_ID;
    }

    $loop = new WP_Query(
        array(
            'posts_per_page' => 3,
            'category__in' => $cats,
            'orderby' => 'rand',
            'post__not_in' => array($id)
        )
    );

    if ($loop->have_posts()) {
        $content .= '
        <h2> You Also Might Like...</h2>
        <ul class="related-category-posts">';

        while ($loop->have_posts()) {
            $loop->the_post();

            $content .= '
            <li>
                <a href="' . get_permalink() . '">' . get_the_title() . '</a>
            </li>';
        }

        $content .= '</ul>';

        wp_reset_query();
    }

    return $content;
}


/*****************************************************************************/
/* Theme Options */
/*****************************************************************************/
require_once(get_template_directory() . '/inc/theme-options/theme-options.php');
require_once(get_template_directory() . '/functions-utility.php');

/*****************************************************************************/
/* Custom Widget */
/*****************************************************************************/
require_once(get_template_directory() . '/widget/widget.php');


/*****************************************************************************/
/* Create Slider Post Type */
/*****************************************************************************/
require_once(get_template_directory() . '/inc/slider/slider_post_type.php');

/*****************************************************************************/
/* Create Slider */
/*****************************************************************************/
require_once(get_template_directory() . '/inc/slider/slider.php');




/*****************************************************************************/
/* Make the "read more" link to the post */
/*****************************************************************************/
function new_excerpt_more($more) {
    global $post;
    
    return '<a class= "more-link" href="'. get_permalink($post->ID) . '">' .
                __('Read the Rest...', 'adribbon') . 
           '</a>';
}
// add_filter('excerpt_more', 'new_excerpt_more');



/*****************************************************************************/
/* WOOCOMMERCE CONFIG */
/*****************************************************************************/
require_once(get_template_directory() . '/woocommerce/woocommerce-config.php');