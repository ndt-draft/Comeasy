<?php
class Adribbon_Social_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'adribbon_social_widget',
            'Adribbon Social Widget',
            array('description' => __('Displays Social Sidebar Widget', 'adribbon'))
        );
    }


    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['facebook'] = strip_tags($new_instance['facebook']);
        $instance['twitter'] = strip_tags($new_instance['twitter']);
        $instance['gplus'] = strip_tags($new_instance['gplus']);
        $instance['shape'] = $new_instance['shape'];

        return $instance;
    }


    public function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
            'title' => 'Social Network',
            'facebook' => '',
            'twitter' => '',
            'gplus' => '',
            'shape' => ''
        ));

        $title = $instance['title'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $gplus = $instance['gplus'];
        $shape = $instance['shape'];
    ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'adribbon' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:', 'adribbon' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:', 'adribbon' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'gplus' ); ?>"><?php _e( 'Google Plus:', 'adribbon' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'gplus' ); ?>" name="<?php echo $this->get_field_name( 'gplus' ); ?>" type="text" value="<?php echo esc_attr( $gplus ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'shape' ); ?>-square"><?php _e( 'Square Icon', 'adribbon' ); ?></label> 
        <input id="<?php echo $this->get_field_id( 'shape' ); ?>-square" name="<?php echo $this->get_field_name( 'shape' ); ?>" type="radio" value="square" <?php echo ($shape == 'square') ? 'checked' : ''; ?>>

        <label for="<?php echo $this->get_field_id( 'shape' ); ?>-round"><?php _e( 'Round Icon', 'adribbon' ); ?></label> 
        <input id="<?php echo $this->get_field_id( 'shape' ); ?>-round" name="<?php echo $this->get_field_name( 'shape' ); ?>" type="radio" value="round" <?php echo ($shape == 'round') ? 'checked' : ''; ?>>
        </p>


    <?php } // end function form


    // display
    public function widget($args, $instance) { 
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $title = ($title != '') ? trim($title) : 'Social Network';  
        $facebook = trim($instance['facebook']);
        $twitter = trim($instance['twitter']);
        $gplus = trim($instance['gplus']);

        if ($instance['shape'] == '' || $instance['shape'] == 'square') 
            $shape = '';
        else 
            $shape = '/round';
    
        echo $before_widget;
            echo $before_title . $title . $after_title; ?>

            <div class="social-share-area">

                <?php if (!empty($facebook)) : ?>
                
                    <a href="<?php echo $facebook; ?>">
                        <img src="<?php print IMAGES; ?>/icon<?php echo $shape; ?>/facebook.png" alt="">
                    </a>

                <?php endif; ?>

                <?php if (!empty($twitter)) : ?>
                
                    <a href="<?php echo $twitter; ?>">
                        <img src="<?php print IMAGES; ?>/icon<?php echo $shape; ?>/twitter.png" alt="">
                    </a>

                <?php endif; ?>

                <?php if (!empty($gplus)) : ?>

                    <a href="<?php echo $gplus; ?>">
                        <img src="<?php print IMAGES; ?>/icon<?php echo $shape; ?>/google.png" alt="">
                    </a>
                    
                <?php endif; ?>

            </div> <!-- end social-share-area -->
        
        <?php echo $after_widget; ?>

    <?php } // end function widget

} // end Adribbon_Social_Widget class


// register widget
add_action("widgets_init", 'register_my_widget');

function register_my_widget() {
    register_widget('Adribbon_Social_Widget');
}
