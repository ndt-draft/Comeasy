<?php get_header(); ?>

<!-- MAIN CONTENT -->
<div class="container">
    
    <div class="row">
        
        <div class="span9">
            
            <div class="articles">

                <nav class="main-menu clearfix">

                    <?php 
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container' => ''
                        ));
                    ?>

                    <select class="main-menu-selection">
                        
                        <option value=""><?php _e('Select Item', 'adribbon'); ?></option>

                    </select> <!-- end main-menu-selection -->
                </nav>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content'); ?>

                <?php endwhile; else: ?>

                    <?php get_template_part('not-found'); ?>
                
                <?php endif; ?>


                <?php // paginate
                if (function_exists('wp_pagenavi')) :

                    wp_pagenavi();

                else :

                    show_posts_nav();

                endif; ?>

            </div> <!-- end articles -->

        </div> <!-- end span9 -->

        <aside class="span3 main-sidebar">
            
            <?php get_sidebar(); ?>

        </aside> <!-- end main-sidebar -->

    </div> <!-- end row -->

</div> <!-- end container -->

<?php get_footer(); ?>