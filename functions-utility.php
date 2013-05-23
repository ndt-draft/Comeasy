<?php 
function makeShortURL($URLToConvert) {  
    // $shortURL= file_get_contents("http://tinyurl.com/api-create.php?url=" . $URLToConvert);  
    // return $shortURL;  
    return $URLToConvert;  
}

function show_posts_nav() {
    global $wp_query;
    $show_nav = ($wp_query->max_num_pages > 1);

    if ($show_nav) { ?>
        <div class="article-nav clearfix">
                    
            <p class="article-nav-pre fl">
                <?php next_posts_link(__('&laquo; Previous Posts', 'adribbon'), $wp_query->max_num_pages); ?>
            </p>
            <p class="article-nav-next fr">
                <?php previous_posts_link(__('Next Posts &raquo;', 'adribbon'), $wp_query->max_num_pages); ?>
            </p>
        
        </div> 
    <?php }
}