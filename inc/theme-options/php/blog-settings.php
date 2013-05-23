<?php 
/* BLOG SETTINGS */
?>
<div id="of-option-blog"  class="theme-option">

    <h3>Blog general settings</h3>

    <table class="form-table">
        <tr>
            <th>Blog page</th>
            <td>
                <label for="adribbon-blog-id">
                <select id="adribbon-blog-id" name="adribbon-blog-id">

                    <option value="">Select a page</option>
                    
                    <?php $pages = get_pages();
                    foreach ($pages as $index => $page) : ?>

                        <option value="<?php echo $page->ID; ?>" <?php echo $options['adribbon-blog-id'] == $page->ID ? 'selected' : ''; ?>>
                            <?php echo $page->post_title; ?>
                        </option>

                    <?php endforeach; ?>

                </select> Choose page for displaying blog
                </label>
            </td>
        </tr>

        <tr>
            <th>Fullwidth Blog Page</th>
            <td>
                <label for="adribbon-blog-fullwidth">
                <input type="checkbox" id="adribbon-blog-fullwidth" 
                    name="adribbon-blog-fullwidth" value="checked"
                    <?php
                    echo $options['adribbon-blog-fullwidth'] == 'checked' ? 'checked' : '';
                    ?>>  Display Fullwidth Blog (Hide Blog Sidebar)
                </label>
            </td>
        </tr>

    </table> <!-- .form-table -->

    <h3>Blog main slider settings</h3>

    <table class="form-table">
        
        <tr>
            <th>Display slider on blog</th>
            <td>
                <label for="adribbon-blog-slider-disappear">
                <input type="checkbox" id="adribbon-blog-slider-disappear" 
                    name="adribbon-blog-slider-disappear" value="checked"
                    <?php
                    echo $options['adribbon-blog-slider-disappear'] == 'checked' ? 'checked' : '';
                    ?>>  Hide Blog Slider
                </label>
            </td>
        </tr>

        <tr>
            <th>Blog slider category</th>
            <td>
                <label for="adribbon-blog-slider-category">
                <select id="adribbon-blog-slider-category" name="adribbon-blog-slider-category">
                    
                    <option value="">Select a slider category</option>

                    <?php $categories = get_categories('taxonomy=genre');
                    foreach ($categories as $category) : ?>

                        <option value="<?php echo $category->slug; ?>" <?php echo $options['adribbon-slider-category'] == $category->slug ? 'selected' : ''; ?>>
                            <?php echo $category->name; ?>
                        </option>

                    <?php endforeach; ?>

                </select> Choose the slider category that you want to display in the blog page.
                </label>
            </td>
        </tr>

        <tr>
            <th>Number of images in blog main slider</th>
            <td>
                <label for="adribbon-blog-number-images-main-slider">
                <select id="adribbon-blog-number-images-main-slider" name="adribbon-blog-number-images-main-slider">
                    
                    <?php 
                    for ($images_num = 1; $images_num <= 100; $images_num += 1) { ?>

                        <option value="<?php echo $images_num; ?>" <?php echo $options['adribbon-blog-number-images-main-slider'] == $images_num ? 'selected' : ''; ?>>
                            <?php echo $images_num; ?>
                        </option>

                    <?php } ?>

                </select> Image(s)
                </label>
            </td>
        </tr>

    </table> <!-- .form-table -->
    
</div> <!-- end of-option-blog -->