<?php 
// Prevent direct loading of this file
if (!empty($_SERVER['SCRIPT_FILENAME']) && 
    basename($_SERVER['SCRIPT_FILENAME']) == 'comments.php') {
    die(__('You cannot access this file directly.', 'adribbon'));
}

// check if post is pwd protected
if (post_password_required()) : ?>
    <p>
        <?php _e('This post is password protected. Enter password to view the comments.', 'adribbon'); ?>
        <?php return; ?>
    </p>
<?php endif;

if (have_comments()) : ?>

    <a href="#respond" class="article-add-comments">+</a>
    <h4><?php comments_number(__('No comments to this article', 'adribbon'),
                              __('1 comment to this article', 'adribbon'),
                              __('% comments to this article', 'adribbon')); ?></h4>

    <div class="comment-navigation">
        <?php echo paginate_comments_links(); ?>
    </div>

    <ol class="commentslist">
        <?php wp_list_comments('callback=adribbon_comments'); ?>
    </ol> <!-- end commentslist -->

    <div class="comment-navigation">
        <?php echo paginate_comments_links(); ?>
    </div>

<?php elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>

    <p><?php _e('Comments are closed.', 'adribbon'); ?></p>

<?php endif ?>

<?php 
// display comment form
comment_form();
