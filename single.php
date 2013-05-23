<?php get_header(); ?>

<!-- MAIN CONTENT -->
<div class="container">
    
    <div class="row">
        
        <div class="span9">
            
            <div class="articles">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content-single'); ?>               

                <?php endwhile; else: ?>

                    <?php get_template_part('not-found'); ?>
                
                <?php endif; ?>

            </div> <!-- end articles -->


            <!-- Comments -->
            <div class="comments-area" id="comments">
                <?php comments_template('', true); ?>
            </div> <!-- end comments-area -->

        </div> <!-- end span9 -->

        <aside class="span3 main-sidebar">
            
            <?php get_sidebar('single-post'); ?>

        </aside> <!-- end main-sidebar -->

    </div> <!-- end row -->

</div> <!-- end container -->


<?php get_footer(); ?>