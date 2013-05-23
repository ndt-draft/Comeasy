<?php $options = get_option('adribbon_theme'); ?>

<?php if (is_page($options['adribbon-blog-id'])) // blog page
    // only blog settings
    require_once(get_template_directory() . '/templates/blog.php');
else 
    // only default settings
    require_once(get_template_directory() . '/templates/default.php');
