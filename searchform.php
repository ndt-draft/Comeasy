<form action="<?php echo home_url(); ?>" method="get" id="search-form">
                    
    <input type="text" id="s" name="s" value="" placeholder="<?php _e('Search site...', 'adribbon'); ?>">

    <input type="submit" value="submit">

    <input type="hidden" value="post" name="post_type">

</form>