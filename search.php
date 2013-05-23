<?php get_header(); ?>

<!-- MAIN CONTENT -->
<div class="container">
    
    <div class="row">
        
        <div class="span9">
            
            <div class="articles">

                <?php if (have_posts()) : ?> 

                    <article class="archive-title">
                        <h3><?php _e('Search Results for: ', 'adribbon'); ?><?php echo get_search_query(); ?></h3>
                    </article> <!-- .archive-title -->

                <?php while (have_posts()) : the_post(); ?>

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
            
            <?php get_sidebar('normal'); ?>

        </aside> <!-- end main-sidebar -->

    </div> <!-- end row -->

</div> <!-- end container -->

<?php get_footer(); ?>