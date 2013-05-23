<?php get_header(); ?>

<!-- MAIN CONTENT -->
<div class="container">

    <?php 
        $options = get_option('adribbon_theme');
        if ($options['adribbon-slider-disappear'] != 'checked')
            echo do_shortcode('[slider number='.$options['adribbon-homepage-number-images-main-slider'].']'.$options['adribbon-slider-category'].'[/slider]');
    ?>
    
    <div class="row">
        
        <div class="span9">
            
            <div class="articles">
                    
                <?php 
                /* Carousel slider*/
                if ($options['adribbon-homepage-carousel-slider-disappear'] != 'checked') : ?>
                    <div class="homepage-item-container adribbon-custom-slider-container">
                        
                        <?php include(get_template_directory() .'/inc/slider/templates/carousel-slider.php'); ?>

                    </div> <!-- .homepage-item-container -->
                <?php endif; ?>


                
                <?php 
                /* Product Area */
                if ($options['adribbon-homepage-product-area-disappear'] != 'checked') : ?>
                    <div class="homepage-item-container">


                        <div class="homepage-title">
                            
                            <h4><?php 
                                $product_title = $options['adribbon-homepage-title-product-area'];
                                $product_title = (!empty($product_title) ? $product_title : __('Featured Products', 'adribbon'));
                                echo htmlspecialchars(stripslashes($product_title)); ?>
                            </h4>

                        </div> <!-- .hompage-title -->

                        <ul class="products">
                            <?php
                                wp_reset_query();
                                $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => $options['adribbon-homepage-number-product-product-area'],
                                'product_cat' => $options['adribbon-homepage-product-area-category']
                            );
                            $loop = new WP_Query( $args );

                            // global $woocommerce_loop;
                            // $woocommerce_loop['columns'] = 5;

                            if ( $loop->have_posts() ) {
                                while ( $loop->have_posts() ) : $loop->the_post(); 
                                    woocommerce_get_template_part( 'content', 'product' ); ?> 
                                <?php endwhile;
                            } else {
                                echo __( 'No products found', 'adribbon' );
                            }
                            ?>
                        </ul><!--/.products-->  

                    </div> <!-- .homepage-item-container -->
                <?php endif; ?>


                <?php 
                /* BLOG AREA */
                if ($options['adribbon-homepage-blog-area-disappear'] != 'checked') : ?>
                    <div class="homepage-item-container">


                        <div class="homepage-title homepage-blog-area-title">
                            
                            <h4><?php 
                            $blog_title = $options['adribbon-homepage-title-blog-area'];

                            $blog_title = (!empty($blog_title) ? $blog_title : 'Blog');
                            echo htmlspecialchars(stripslashes($blog_title))?></h4>

                        </div> <!-- .hompage-title -->

                        <?php 
                        wp_reset_query();
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => $options['adribbon-homepage-number-post-blog-area'],
                            'category_name' => $options['adribbon-homepage-blog-area-category']
                        );
                        $query = new WP_Query( $args );

                        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                            <?php get_template_part('content'); ?>

                        <?php endwhile; else: ?>

                            <?php get_template_part('not-found'); ?>
                        
                        <?php endif; ?>

                    </div> <!-- .homepage-item-container -->
                <?php endif; ?>


            </div> <!-- end articles -->

        </div> <!-- end span9 -->

        <aside class="span3 main-sidebar">
            
            <?php get_sidebar(); ?>

        </aside> <!-- end main-sidebar -->

    </div> <!-- end row -->

</div> <!-- end container -->

<?php get_footer(); ?>