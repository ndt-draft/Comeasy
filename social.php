<!-- FACEBOOK SHARE BUTTON -->

<?php
    $title=urlencode(get_the_title());
    $url=urlencode(get_permalink());
    $summary=urlencode(get_the_excerpt());
    $image=urlencode(get_the_post_thumbnail());
?>

<a onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo $url; ?>&t=<?php echo $title; ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)" title="<?php _e('Click to share this post on Facebook', 'adribbon'); ?>">
    <img src="<?php print IMAGES; ?>/icon/facebook.png" alt="Facebook Share Button">
</a>

<!-- TWITTER SHARE BUTTON -->

<a onClick="window.open('https://twitter.com/share?url=<?php echo $url; ?>&text=<?php echo $title; ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)" title="<?php _e('Click to share this post on Twitter', 'adribbon'); ?>"><img src="<?php print IMAGES; ?>/icon/twitter.png" alt="Twitter Share Button"></a>

<!-- GOOGLE SHARE BUTTON -->
<a title="<?php _e('Click to share this post on Google+', 'adribbon'); ?>" href="#" onclick="popUp=window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false"><img src="<?php print IMAGES; ?>/icon/google.png" alt="Google Plus Share Button"></a>

<!-- LINK BUTTON -->
<a class="cover-link" href="<?php the_permalink(); ?>" title="<?php _e('View Detail', 'adribbon'); ?>">
    <img src="<?php print IMAGES; ?>/icon/link.png" alt="Post Link Button">
</a>