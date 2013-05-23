<div class="container">

    <?php 
        $options = get_option('adribbon_theme');
        if ($options['adribbon-shop-slider-disappear'] != 'checked' && !is_singular('product'))
            echo do_shortcode('[slider number='.$options['adribbon-shop-number-images-main-slider'].']'.$options['adribbon-shop-slider-category'].'[/slider]');
    ?>
    
    <div class="row">
        
        <div class="span9">
            
            <div class="articles">


            

        