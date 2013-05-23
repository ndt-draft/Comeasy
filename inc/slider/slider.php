<?php

// enqueue flexslider files
function wptuts_slider_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_style('flex-style', get_template_directory_uri() . '/inc/slider/css/flexslider.css');
    wp_enqueue_script('flex-script', get_template_directory_uri() . '/inc/slider/js/jquery.flexslider.js', array('jquery'), '2.1');
}

add_action('wp_enqueue_scripts', 'wptuts_slider_scripts');

// initialize slider
function wptuts_slider_initialize() { ?>
    
    <script>
        jQuery(window).load(function () {
            jQuery('.adribbon-main-slider').flexslider({
                animation: 'fade',          // user option
                direction: 'horizontal',    // user option
                slideshowSpeed: 7000,       // user option
                animationSpeed: 600         // user option 
                // ... user option
            });
        });
    </script>

<?php }

add_action('wp_head', 'wptuts_slider_initialize');

// create slider
function wptuts_slider_template($term, $number) {
    // query arguments
    $args = array(
        'post_type' => 'slides', 
        'posts_per_page' => $number, // user option
    );

    if ($term != '')
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'genre',
                'field' => 'slug',
                'terms' => $term 
            )
        );

    // the query
    $the_query = new WP_Query($args);

    // check if the query return any posts
    if ($the_query->have_posts()) {
        // start the slider ?>

        <div class="flexslider adribbon-main-slider">
            <div class="flex-viewport">
                <ul class="slides">
                    <?php 
                    // the loop
                    while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <li>
                            <?php 
                            if (get_post_meta(get_the_id(), 'wptuts_slideurl', true) != '') { ?>
                                <a href="<?php echo esc_url(get_post_meta(get_the_id(), 'wptuts_slideurl', true)); ?>">
                            <?php } 

                            // the slide's image
                            echo the_post_thumbnail('featured-slide-size');

                            // close off the slide'link if there is one
                            if (get_post_meta(get_the_id(), 'wptuts_slideurl', true) != '') { ?>
                                </a>
                            <?php } ?>
                        </li>
                    <?php endwhile; ?>
                </ul> <!-- .slides -->
            </div>
        </div> <!-- .flexslider -->

    <?php }

    wp_reset_postdata();
}

// slider shortcode
function wptuts_slider_shortcode($atts, $content = '') {
    extract(shortcode_atts(
        array(
            'number' => 4
        ), $atts
    ));


    ob_start();
    wptuts_slider_template($content, $number);
    $slider = ob_get_clean();
    return $slider;
}

add_shortcode('slider', 'wptuts_slider_shortcode');
