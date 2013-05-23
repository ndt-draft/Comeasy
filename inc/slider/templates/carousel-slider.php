<div class="homepage-title adribbon-custom-slider-container">

    <h4>
        <?php 
        $carousel_title = $options['adribbon-homepage-title-carousel-slider'];
        $carousel_title = (!empty($carousel_title) ? $carousel_title : __('Featured Products', 'adribbon'));
        echo htmlspecialchars(stripslashes($carousel_title)); ?>
    </h4>

</div> <!-- .homepage-title -->

<!-- Custom Slider Of Featured Products -->
<div class="flexslider carousel adribbon-custom-slider">
        <ul class="slides">
            <?php
                $args = array(
                'post_type' => 'product',
                'posts_per_page' => $options['adribbon-homepage-number-images-carousel-slider'],
                'product_cat' => $options['adribbon-homepage-carousel-slider-category']
            );  

            $loop = new WP_Query( $args );

            if ( $loop->have_posts() ) {
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('post-thumbnail-size'); ?>
                        </a>

                        <h6>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h6>
                    </li>    
                <?php endwhile;
            } else {
                echo __( 'No products found', 'adribbon' );
            }
            ?>  

        </ul>
</div> <!-- .flexslider -->

<script type="text/javascript" charset="utf-8">
  // Can also be used with $(document).ready()
    $('.adribbon-custom-slider').flexslider({
      animation: "slide",
      itemWidth: 210,
      itemMargin: 5,
      minItems: 2,
      maxItems: 4
    });
</script>