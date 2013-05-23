<article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">

    <?php if (has_post_thumbnail()): ?>

        <figure class="article-preview-image">
            <?php the_post_thumbnail('post-thumbnail-size'); ?>
        </figure> <!-- end article-preview-image -->

    <?php endif; ?>
    

    <div class="article-preview-content" <?php if (!has_post_thumbnail()) echo 'style="margin-left: auto"'; ?>>
        
        <header>
            
            <p class="article-meta-categories">
                <?php the_category('  \\  '); ?>
            </p>
            <h1><?php the_title(); ?></h1>
            <p class="article-meta-extra">
                <?php the_author_posts_link(); ?> <?php _e('on', 'adribbon'); ?> <?php the_date(get_option('date_format')); ?><?php
                    if (comments_open() && !post_password_required()) {
                        echo '. ';
                        comments_popup_link(__('No comments', 'adribbon'), __('1 comment', 'adribbon'), __('% comments', 'adribbon') );
                        echo '.';
                    }                    
                ?>
            </p>

            <div class="social-share-area">

                <?php get_template_part('social', 'post'); ?>
                
            </div> <!-- end social-share-area -->

        </header>

    </div> <!-- end article-preview-content -->

</article>

<div class="post-content"> 

    <?php the_content(); ?>

    <?php 
        $args = array(
            'before' => '<p class="post-navigation">',
            'after' => '</p>',
            'pagelink' => 'Page %'
        );
    ?>

    <?php wp_link_pages($args); ?>

    <?php if (has_tag()): ?>
        <p class="tag-container"><?php the_tags(__('Tags: ', 'adribbon')); ?></p>
    <?php endif; ?>

</div> <!-- end post-content -->

<div class="article-author">

    <p><?php _e('Article by ', 'adribbon'); ?><?php the_author_posts_link(); ?></p>
    <p><?php echo get_the_author_meta('description'); ?></p>

</div>