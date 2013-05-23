<?php get_header(); ?>

<!-- MAIN CONTENT -->
<div class="container">
    
    <div class="row">
        
        <div class="span9">
            
            <div class="articles">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="page-<?php the_ID(); ?>">
                        
                        <h1><?php the_title(); ?></h1>

                        <?php the_content(); ?>

                        <?php 
                            $args = array(
                                'before' => '<p class="post-navigation">',
                                'after' => '</p>',
                                'pagelink' => __('Page %', 'adribbon')
                            );
                        ?>

                        <?php wp_link_pages($args); ?>

                    </article>

                <?php endwhile; else: ?>

                    <h1><?php _e('No pages were found!', 'adribbon'); ?></h1>
                
                <?php endif; ?>

            </div> <!-- end articles -->

            <!-- Comments -->
            <div class="comments-area" id="comments">
                <?php comments_template('', true); ?>
            </div> <!-- end comments-area -->

        </div> <!-- end span9 -->

        <aside class="span3 main-sidebar">
            
            <?php get_sidebar('normal'); ?>

        </aside> <!-- end main-sidebar -->

    </div> <!-- end row -->

</div> <!-- end container -->

<?php get_footer(); ?>