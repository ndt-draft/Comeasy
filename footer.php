        <!-- FOOTER -->
        <footer>

            <div class="footer-sidebar-container">
                <div class="container">
                    <div class="row">

                        <?php get_sidebar('footer'); ?>

                    </div> <!-- .row -->
                </div> <!-- .container -->
            </div> <!-- .footer-sidebar-container -->
                
            <div class="copyright-container">
                
                <div class="container">
                    
                    <p class="top-link-footer fr"><a href="#top">&uarr;Top</a></p>
                    <p>&copy; <?php echo date('Y'); ?> <a class="copyright-link-footer" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></p>

                </div>

            </div> <!-- end copyright-container -->

        </footer>

        <?php 
            $options = get_option('adribbon_theme');
            // google analytics code
            echo stripslashes($options['adribbon-google-analytics']); ?>

        <?php wp_footer(); ?>
        
    </body>
</html>

