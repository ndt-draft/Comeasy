<article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">

    <?php if (has_post_thumbnail()): ?>

        <figure class="article-preview-image">
            <div class="cover">
                    
                <?php get_template_part('social'); ?>

            </div> <!-- end cover -->

            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail-size'); ?></a>
        </figure> <!-- end article-preview-image -->

    <?php endif; ?>
    

    <div class="article-preview-content" <?php if (!has_post_thumbnail()) echo 'style="margin-left: auto"'; ?>>
        
        <header>
            
            <p class="article-meta-categories">
                <?php the_category('  \\  '); ?>
            </p>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p class="article-meta-extra">
                <?php the_author_posts_link(); ?> <?php _e('on', 'adribbon'); ?> <?php the_date(get_option('date_format')); ?><?php
                    if (comments_open() && !post_password_required()) {
                        echo '. ';
                        comments_popup_link(__('No comments', 'adribbon'), 
                                            __('1 comment', 'adribbon'), 
                                            __('% comments', 'adribbon') );
                        echo '.';
                    }                    
                ?>
            </p>

        </header>

        <?php // the_content(__('Read more...', 'adribbon')); 
            the_excerpt(); ?>

    </div> <!-- end article-preview-content -->
</article>