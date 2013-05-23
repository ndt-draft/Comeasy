<?php
// Template Name: Full Width Template
?>

<?php get_header(); ?>

<!-- MAIN CONTENT -->
<div class="container">
    
    <div class="row">
        
        <div class="span12">
            
            <div class="articles">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="page-<?php the_ID(); ?>">
                        
                        <h1><?php the_title(); ?></h1>

                        <?php the_content(); ?>

                        <?php // display comment form
                        // comment_form(); ?>

                    </article>

                <?php endwhile; else: ?>

                    <h1><?php _e('No pages were found!', 'adribbon'); ?></h1>
                
                <?php endif; ?>

            </div> <!-- end articles -->

            <!-- Comments -->
            <div class="comments-area" id="comments">
                <?php comments_template('', true); ?>
            </div> <!-- end comments-area -->

        </div> <!-- end span12 -->

    </div> <!-- end row -->

</div> <!-- end container -->

<?php get_footer(); ?>