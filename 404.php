<?php get_header(); ?>

<!-- MAIN CONTENT -->
<div class="container">
    
    <div class="row">
        
        <div class="span9">
            
            <div class="articles">

                <article>
                    <h3><?php _e('404 This is not the web page you are looking for.', 'adribbon'); ?></h3>
                </article>

            </div> <!-- end articles -->

        </div> <!-- end span9 -->

        <aside class="span3 main-sidebar">
            
            <?php // get 404 sidebar 
            get_sidebar('fourohfour'); ?>

        </aside> <!-- end main-sidebar -->

    </div> <!-- end row -->

</div> <!-- end container -->

<?php get_footer(); ?>