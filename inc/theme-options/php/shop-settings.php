<?php 
/* SHOP SETTINGS */
?>
<div id="of-option-shop"  class="theme-option">

    <h3>Shop main slider settings</h3>

    <table class="form-table">

        <tr>
            <th>Display slider on Shop</th>
            <td>
                <label for="adribbon-shop-slider-disappear">
                <input type="checkbox" id="adribbon-shop-slider-disappear" 
                    name="adribbon-shop-slider-disappear" value="checked"
                    <?php
                    echo $options['adribbon-shop-slider-disappear'] == 'checked' ? 'checked' : '';
                    ?>>  Hide Shop Slider
                </label>
            </td>
        </tr>

        <tr>
            <th>Shop slider category</th>
            <td>
                <label for="adribbon-shop-slider-category">
                <select id="adribbon-shop-slider-category" name="adribbon-shop-slider-category">
                    
                    <option value="">Select a slider category</option>

                    <?php $categories = get_categories('taxonomy=genre');
                    foreach ($categories as $category) : ?>

                        <option value="<?php echo $category->slug; ?>" <?php echo $options['adribbon-slider-category'] == $category->slug ? 'selected' : ''; ?>>
                            <?php echo $category->name; ?>
                        </option>

                    <?php endforeach; ?>

                </select> Choose the slider category that you want to display in the shop page.
                </label>
            </td>
        </tr>

        <tr>
            <th>Number of images in shop main slider</th>
            <td>
                <label for="adribbon-shop-number-images-main-slider">
                <select id="adribbon-shop-number-images-main-slider" name="adribbon-shop-number-images-main-slider">
                    
                    <?php 
                    for ($images_num = 1; $images_num <= 100; $images_num += 1) { ?>

                        <option value="<?php echo $images_num; ?>" <?php echo $options['adribbon-shop-number-images-main-slider'] == $images_num ? 'selected' : ''; ?>>
                            <?php echo $images_num; ?>
                        </option>

                    <?php } ?>

                </select> Image(s)
                </label>
            </td>
        </tr>

    </table> <!-- .form-table -->

    <h3>Shop products settings</h3>

    <table class="form-table">
        <tr>
            <th>Number of products per page</th>
            <td>
                <label for="adribbon-shop-number-products-per-page">
                <select id="adribbon-shop-number-products-per-page" name="adribbon-shop-number-products-per-page">
                    
                    <?php 
                    for ($products_num = 4; $products_num < 100; $products_num += 4) { ?>

                        <option value="<?php echo $products_num; ?>" <?php echo $options['adribbon-shop-number-products-per-page'] == $products_num ? 'selected' : ''; ?>>
                            <?php echo $products_num; ?>
                        </option>

                    <?php } ?>

                </select> Products
                </label>
            </td>
        </tr>
    </table> <!-- .form-table -->
    
</div> <!-- end of-option-shop -->