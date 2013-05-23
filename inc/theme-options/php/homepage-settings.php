<?php 
/* HOMEPAGE SETTINGS */
?>
<div id="of-option-homepage" class="theme-option">

    <h3>Homepage main slider setting</h3>

    <table class="form-table">
        <tr>
            <th>Display slider on homepage</th>
            <td>
                <label for="adribbon-slider-disappear">
                <input type="checkbox" id="adribbon-slider-disappear" 
                    name="adribbon-slider-disappear" value="checked"
                    <?php
                    echo $options['adribbon-slider-disappear'] == 'checked' ? 'checked' : '';
                    ?>>  Hide Homepage Slider
                </label>
            </td>
        </tr>

        <tr>
            <th>Homepage slider category</th>
            <td>
                <label for="adribbon-slider-category">
                <select id="adribbon-slider-category" name="adribbon-slider-category">

                    <option value="">Select a slider category</option>
                    
                    <?php $categories = get_categories('taxonomy=genre');
                    foreach ($categories as $category) : ?>

                        <option value="<?php echo $category->slug; ?>" <?php echo $options['adribbon-slider-category'] == $category->slug ? 'selected' : ''; ?>>
                            <?php echo $category->name; ?>
                        </option>

                    <?php endforeach; ?>

                </select> Choose the slider category that you want to display in the homepage.
                </label>
            </td>
        </tr>

        <tr>
            <th>Number of images in homepage main slider</th>
            <td>
                <label for="adribbon-homepage-number-images-main-slider">
                <select id="adribbon-homepage-number-images-main-slider" name="adribbon-homepage-number-images-main-slider">
                    
                    <?php 
                    for ($images_num = 1; $images_num <= 100; $images_num += 1) { ?>

                        <option value="<?php echo $images_num; ?>" <?php echo $options['adribbon-homepage-number-images-main-slider'] == $images_num ? 'selected' : ''; ?>>
                            <?php echo $images_num; ?>
                        </option>

                    <?php } ?>

                </select> Image(s)
                </label>
            </td>
        </tr>

        <?php // var_dump(get_categories('taxonomy=genre')); ?>
        
    </table> <!-- .form-table -->

    <h3>Homepage carousel slider settings</h3>

    <table class="form-table">
        <tr>
            <th>Display carousel slider on homepage</th>
            <td>
                <label for="adribbon-homepage-carousel-slider-disappear">
                <input type="checkbox" id="adribbon-homepage-carousel-slider-disappear" 
                    name="adribbon-homepage-carousel-slider-disappear" value="checked"
                    <?php
                    echo $options['adribbon-homepage-carousel-slider-disappear'] == 'checked' ? 'checked' : '';
                    ?>>  Hide Carousel Slider
                </label>
            </td>
        </tr>

        <tr>
            <th><label for="adribbon-homepage-title-carousel-slider">Title of carousel slider</label></th>
            <td>
                <input type="text" value="<?php echo htmlspecialchars(stripslashes($options['adribbon-homepage-title-carousel-slider'])); ?>" id="adribbon-homepage-title-carousel-slider" name="adribbon-homepage-title-carousel-slider" class="regular-text" placeholder="Enter title of carousel slider here.">
            </td>
        </tr>

        <tr>
            <th>Homepage carousel slider category</th>
            <td>
                <label for="adribbon-homepage-carousel-slider-category">
                <select id="adribbon-homepage-carousel-slider-category" name="adribbon-homepage-carousel-slider-category">

                    <option value="">Select a product category</option>
                    
                    <?php $categories = get_categories('taxonomy=product_cat');
                    foreach ($categories as $category) : ?>

                        <option value="<?php echo $category->slug; ?>" <?php echo $options['adribbon-homepage-carousel-slider-category'] == $category->slug ? 'selected' : ''; ?>>
                            <?php echo $category->name; ?>
                        </option>

                    <?php endforeach; ?>

                </select> Choose the product category that you want to display in the homepage carousel slider.
                </label>
            </td>
        </tr>

        <tr>
            <th>Number of images in homepage carousel slider</th>
            <td>
                <label for="adribbon-homepage-number-images-carousel-slider">
                <select id="adribbon-homepage-number-images-carousel-slider" name="adribbon-homepage-number-images-carousel-slider">

                    <option value="">Select a number</option>
                    
                    <?php 
                    for ($images_num = 4; $images_num <= 100; $images_num += 1) { ?>

                        <option value="<?php echo $images_num; ?>" <?php echo $options['adribbon-homepage-number-images-carousel-slider'] == $images_num ? 'selected' : ''; ?>>
                            <?php echo $images_num; ?>
                        </option>

                    <?php } ?>

                </select> Image(s)
                </label>
            </td>
        </tr>

    </table> <!-- .form-table -->

    <h3>Homepage product area settings</h3>

    <table class="form-table">
        <tr>
            <th>Display product area on homepage</th>
            <td>
                <label for="adribbon-homepage-product-area-disappear">
                <input type="checkbox" id="adribbon-homepage-product-area-disappear" 
                    name="adribbon-homepage-product-area-disappear" value="checked"
                    <?php
                    echo $options['adribbon-homepage-product-area-disappear'] == 'checked' ? 'checked' : '';
                    ?>>  Hide Product Area
                </label>
            </td>
        </tr>

        <tr>
            <th><label for="adribbon-homepage-title-product-area">Title of product area</label></th>
            <td>
                <input type="text" value="<?php echo htmlspecialchars(stripslashes($options['adribbon-homepage-title-product-area'])); ?>" id="adribbon-homepage-title-product-area" name="adribbon-homepage-title-product-area" class="regular-text" placeholder="Enter title of product area here.">
            </td>
        </tr>

        <tr>
            <th>Homepage product area category</th>
            <td>
                <label for="adribbon-homepage-product-area-category">
                <select id="adribbon-homepage-product-area-category" name="adribbon-homepage-product-area-category">

                    <option value="">Select a product category</option>
                    
                    <?php $categories = get_categories('taxonomy=product_cat');
                    foreach ($categories as $category) : ?>

                        <option value="<?php echo $category->slug; ?>" <?php echo $options['adribbon-homepage-carousel-slider-category'] == $category->slug ? 'selected' : ''; ?>>
                            <?php echo $category->name; ?>
                        </option>

                    <?php endforeach; ?>

                </select> Choose the product category that you want to display in the homepage product area.
                </label>
            </td>
        </tr>

        <tr>
            <th>Number of products in homepage product area</th>
            <td>
                <label for="adribbon-homepage-number-product-product-area">
                <select id="adribbon-homepage-number-product-product-area" name="adribbon-homepage-number-product-product-area">

                    <option value="">Select a number</option>
                    
                    <?php 
                    for ($images_num = 4; $images_num <= 100; $images_num += 1) { ?>

                        <option value="<?php echo $images_num; ?>" <?php echo $options['adribbon-homepage-number-product-product-area'] == $images_num ? 'selected' : ''; ?>>
                            <?php echo $images_num; ?>
                        </option>

                    <?php } ?>

                </select> Product(s)
                </label>
            </td>
        </tr>

    </table> <!-- .form-table -->

    <h3>Homepage blog area settings</h3>

    <table class="form-table">
        
        <tr>
            <th>Display blog area on homepage</th>
            <td>
                <label for="adribbon-homepage-blog-area-disappear">
                <input type="checkbox" id="adribbon-homepage-blog-area-disappear" 
                    name="adribbon-homepage-blog-area-disappear" value="checked"
                    <?php
                    echo $options['adribbon-homepage-blog-area-disappear'] == 'checked' ? 'checked' : '';
                    ?>>  Hide Blog Area
                </label>
            </td>
        </tr>

        <tr>
            <th><label for="adribbon-homepage-title-blog-area">Title of product area</label></th>
            <td>
                <input type="text" value="<?php echo htmlspecialchars(stripslashes($options['adribbon-homepage-title-blog-area'])); ?>" id="adribbon-homepage-title-blog-area" name="adribbon-homepage-title-blog-area" class="regular-text" placeholder="Enter title of blog area here.">
            </td>
        </tr>

        <tr>
            <th>Homepage blog area category</th>
            <td>
                <label for="adribbon-homepage-blog-area-category">
                <select id="adribbon-homepage-blog-area-category" name="adribbon-homepage-blog-area-category">

                    <option value="">Select a blog category</option>
                    
                    <?php $categories = get_categories();
                    foreach ($categories as $category) : ?>

                        <option value="<?php echo $category->slug; ?>" <?php echo $options['adribbon-homepage-blog-area-category'] == $category->slug ? 'selected' : ''; ?>>
                            <?php echo $category->name; ?>
                        </option>

                    <?php endforeach; ?>

                </select> Choose the blog category that you want to display in the homepage blog area.
                </label>
            </td>
        </tr>

        <tr>
            <th>Number of posts in homepage blog area</th>
            <td>
                <label for="adribbon-homepage-number-post-blog-area">
                <select id="adribbon-homepage-number-post-blog-area" name="adribbon-homepage-number-post-blog-area">

                    <option value="">Select a number</option>
                    
                    <?php 
                    for ($images_num = 1; $images_num <= 100; $images_num += 1) { ?>

                        <option value="<?php echo $images_num; ?>" <?php echo $options['adribbon-homepage-number-post-blog-area'] == $images_num ? 'selected' : ''; ?>>
                            <?php echo $images_num; ?>
                        </option>

                    <?php } ?>

                </select> Post(s)
                </label>
            </td>
        </tr>

    </table>

</div> <!-- end of-option-homepage -->