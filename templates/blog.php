<?php get_header(); ?>

<!-- MAIN CONTENT -->
<div class="container">

    <?php 
        $options = get_option('adribbon_theme');
        if ($options['adribbon-blog-slider-disappear'] != 'checked')
            echo do_shortcode('[slider number='.$options['adribbon-blog-number-images-main-slider'].']'.$options['adribbon-blog-slider-category'].'[/slider]');
    ?>
    
    <div class="row">
        
        <div class="span<?php echo $options['adribbon-blog-fullwidth'] == 'checked' ? '12' : '9'; ?>">
            
            <div class="articles">

                <?php 
                $temp = $wp_query; // keep global $wp_query value
                $wp_query = null;

                $args = array(
                    'post_type' => 'post',
                    'paged' => $paged
                );

                $wp_query = new WP_Query( $args );

                if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                    <?php get_template_part('content'); ?>

                <?php endwhile; else: ?>

                    <?php get_template_part('not-found'); ?>
                
                <?php endif; ?>

                <?php // paginate
                if (function_exists('wp_pagenavi')) :

                    wp_pagenavi();

                else :

                    show_posts_nav();

                endif;
                 
                $wp_query = null;
                $wp_query = $temp;
                wp_reset_query(); 
                ?>

            </div> <!-- end articles -->

        </div> <!-- end span9 -->

        <?php if ($options['adribbon-blog-fullwidth'] != 'checked') : ?>

            <aside class="span3 main-sidebar">
                
                <?php get_sidebar('blog'); ?>

            </aside> <!-- end main-sidebar -->

        <?php endif; ?>

    </div> <!-- end row -->

</div> <!-- end container -->

<?php get_footer(); ?>