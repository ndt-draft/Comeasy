<?php 
    $options = get_option('adribbon_theme');
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="author" content="">

        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicon and Apple Icons -->
        <link rel="shortcut icon" href="<?php 
            $favicon = $options['adribbon-favicon'];

            if (trim($favicon) != '')
                echo $favicon;
            else 
                print IMAGES . '/icon/favicon.ico';
        ?>">

        <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    </head>
    
    <?php 
    // $customBg = trim( get_option('adribbon-custom-bg') );
    // $bodyBg = get_option('adribbon-body-bg');
    // $bodyBgStyle = '';

    // if ($customBg == '') {

    //     switch ($bodyBg) {
    //         case 'pink':
    //             $bodyBg = IMAGES . '/texture-bg/pink-bg.png';
    //             break;

    //         case 'pastel-yellow-orange':
    //             $bodyBg = IMAGES . '/texture-bg/pastel-yellow-orange-bg.png';
    //             break;

    //         case 'pastel-pea-green':
    //             $bodyBg = IMAGES . '/texture-bg/pastel-pea-green-bg.png';
    //             break;

    //         case 'giant-goldfish':
    //             $bodyBg = IMAGES . '/texture-bg/giant-goldfish-bg.png';
    //             break;

    //         case 'throwing-clover':
    //             $bodyBg = IMAGES . '/texture-bg/throwing-clover-bg.png';
    //             break;
            
    //         default:
    //             $bodyBg = IMAGES . '/body-bg.png';
    //             break;
    //     }

    // } else {
    //     $bodyBg = $customBg;
    // }

    // $bodyBgStyle = 'style="background: url(' . $bodyBg . ')"';

    ?>

    <body <?php body_class('woocommerce woocommerce-page'); ?>>
        <header class="main-header" id="top">

            <div class="top-menu-container">
                
                <div class="container">
                    <div class="row">
                        
                        <nav class="top-menu-nav span9">
                            <?php 
                                wp_nav_menu(array(
                                    'theme_location' => 'top-menu',
                                    'container' => ''
                                ));
                            ?>

                            <select class="top-menu-selection">
                            
                                <option value=""><?php _e('Select Item', 'adribbon'); ?></option>

                            </select> <!-- end top-menu-selection -->
                        </nav> <!-- end top-menu-nav -->

                        <div class="top-search-form span3 fr">
                            <?php get_search_form(); ?>
                        </div>

                    </div> <!-- end row -->

                </div> <!-- end container -->

            </div> <!-- end top-menu-container -->

            <div class="logo-container">
                <div class="container">
                    <div class="logo">

                        <?php 
                        $logo = $options['adribbon-logo'] == '' ? 
                                ( IMAGES . '/logo.png' ) :
                                $options['adribbon-logo']; 
                        ?>
                   
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo $logo; ?>" alt="logo">
                        </a>

                        <p class="logo-description"><?php bloginfo('description'); ?></p>

                        <!-- <h1>logo</h1> -->
                                           
                    </div> <!-- .logo -->
                </div> <!-- .container -->
            </div> <!-- .logo-container -->

            <div class="main-menu-container">
                <div class="container">
                    <nav class="main-menu clearfix">

                        <?php 
                            wp_nav_menu(array(
                                'theme_location' => 'main-menu',
                                'container' => ''
                            ));
                        ?>

                        <select class="main-menu-selection">
                            
                            <option value=""><?php _e('Select Item', 'adribbon'); ?></option>

                        </select> <!-- end main-menu-selection -->
                    </nav>
                </div>
            </div> <!-- .main-menu-container -->

        </header>