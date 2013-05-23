            </div> <!-- end articles -->

        </div> <!-- end span9 -->

        <aside class="span3 main-sidebar">

            <?php if (!is_singular('product'))
                get_sidebar('shop'); 
            else 
                get_sidebar('single-product'); ?>

        </aside> <!-- end main-sidebar -->

    </div> <!-- end row -->

</div> <!-- end .container -->