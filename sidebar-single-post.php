<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('single-post-sidebar')) : ?>

    <div class="sidebar-widget">
        
        <h4><?php _e('Search', 'adribbon'); ?></h4>

        <?php get_search_form(); ?>

    </div> <!-- .footer-sidebar-widget -->

<?php endif; ?>