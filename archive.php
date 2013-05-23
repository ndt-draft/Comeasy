<?php get_header(); ?>

<!-- MAIN CONTENT -->
<div class="container">
    
    <div class="row">
        
        <div class="span9">
            
            <div class="articles">

                <?php if (have_posts()) : ?> 

                    <article class="archive-title">
                        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

                        <?php /* If this is a category archive */ if (is_category()) { ?>
                            <h3>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h3>

                        <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                            <h3>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h3>

                        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                            <h3>Archive for <?php the_time('F jS, Y'); ?></h3>

                        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                            <h3>Archive for <?php the_time('F, Y'); ?></h3>

                        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                            <h3>Archive for <?php the_time('Y'); ?></h3>

                        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                            <h3>Author Archive</h3>

                        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                            <h3>Blog Archives</h3>
                        
                        <?php } ?>
                    </article>

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
            
            <?php get_sidebar('blog'); ?>

        </aside> <!-- end main-sidebar -->

    </div> <!-- end row -->

</div> <!-- end container -->

<?php get_footer(); ?>