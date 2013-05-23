<?php

// create custom post type
function register_slides_posttype() {
    $labels = array(
        'name'               => _x('Slides', 'post type general name', 'adribbon'),
        'singular_name'      => _x('Slide', 'post type singular name', 'adribbon'),
        'add_new'            => __('Add New Slide', 'adribbon'),
        'add_new_item'       => __('Add New Slide', 'adribbon'),
        'edit_item'          => __('Edit Slide', 'adribbon'),
        'new_item'           => __('New Slide', 'adribbon'),
        'view_item'          => __('View Slide', 'adribbon'),
        'search_items'       => __('Search Slides', 'adribbon'),
        'not_found'          => __('Slide', 'adribbon'),
        'not_found_in_trash' => __('Slide', 'adribbon'),
        'parent_item_colon'  => __('Slide', 'adribbon'),
        'menu_name'          => __('Slides', 'adribbon')
    );

    $taxonomies = array();

    $supports = array('title', 'thumbnail');

    $post_type_args = array(
        'labels'             => $labels,
        'singular_label'     => __('Slide', 'adribbon'),
        'public'             => true,
        'show_ui'            => true,
        'publicly_queryable' => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => true,
        'rewrite'            => array('slug' => 'slides', 'with_front' => false),
        'supports'           => $supports,
        'menu_position'      => 6,
        'menu_icon'          => get_template_directory_uri() . '/inc/slider/images/icon.png',
        'taxonomies'         => $taxonomies
    );

    register_post_type('slides', $post_type_args);

    // register taxonomy for slides post type
    register_taxonomy('genre', 'slides', array(
        'label' => __('Categories', 'adribbon'),
        'rewrite' => array('slug' => 'genre'),
        'hierarchical' => true,
        'query_var' => true
    ));
}

add_action('init', 'register_slides_posttype');


// Meta Box for Slider URL
     
$slidelink_2_metabox = array( 
    'id' => 'slidelink',
    'title' => 'Slide Link',
    'page' => array('slides'),
    'context' => 'normal',
    'priority' => 'default',
    'fields' => array( 
        array(
            'name'          => 'Slide URL',
            'desc'          => '',
            'id'                => 'wptuts_slideurl',
            'class'             => 'wptuts_slideurl',
            'type'          => 'text',
            'rich_editor'   => 0,            
            'max'           => 0,
            'std' => ''      
        ),
    )
);          
             
add_action('admin_menu', 'wptuts_add_slidelink_2_meta_box');
function wptuts_add_slidelink_2_meta_box() {
 
    global $slidelink_2_metabox;        
 
    foreach($slidelink_2_metabox['page'] as $page) {
        add_meta_box($slidelink_2_metabox['id'], $slidelink_2_metabox['title'], 'wptuts_show_slidelink_2_box', $page, 'normal', 'default', $slidelink_2_metabox);
    }
}
 
// function to show meta boxes
function wptuts_show_slidelink_2_box()  {
    global $post;
    global $slidelink_2_metabox;
    global $wptuts_prefix;
    global $wp_version;
     
    // Use nonce for verification
    echo '<input type="hidden" name="wptuts_slidelink_2_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
     
    echo '<table class="form-table">';
 
    foreach ($slidelink_2_metabox['fields'] as $field) {
        // get current post meta data
 
        $meta = get_post_meta($post->ID, $field['id'], true);
         
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', stripslashes($field['name']), '</label></th>',
                '<td class="wptuts_field_type_' . str_replace(' ', '_', $field['type']) . '">';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" /><br/>', '', stripslashes($field['desc']);
                break;
        }
        echo    '<td>',
            '</tr>';
    }
     
    echo '</table>';
}   
 
// Save data from meta box
add_action('save_post', 'wptuts_slidelink_2_save');
function wptuts_slidelink_2_save($post_id) {
    global $post;
    global $slidelink_2_metabox;
     
    // verify nonce
    if (isset($_POST['wptuts_slidelink_2_meta_box_nonce']) &&
        !wp_verify_nonce($_POST['wptuts_slidelink_2_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
 
    // check permissions
    if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    
     
    foreach ($slidelink_2_metabox['fields'] as $field) {
        
        if (isset($_POST[$field['id']])) { 

            $old = get_post_meta($post_id, $field['id'], true);
            $new = $_POST[$field['id']];
             
            if ($new && $new != $old) {
                if($field['type'] == 'date') {
                    $new = wptuts_format_date($new);
                    update_post_meta($post_id, $field['id'], $new);
                } else {
                    if(is_string($new)) {
                        $new = $new;
                    } 
                    update_post_meta($post_id, $field['id'], $new);   
                }
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
    }
}


/* 
 * style for admin panel
 */
add_filter('manage_edit-slides_columns', 'adribbon_manager_edit_columns');

function adribbon_manager_edit_columns($columns) {
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => "Slide Name",
        'cat' => 'Category'
    );

    return $columns;
}

add_action('manage_slides_posts_custom_column', 'adribbon_manager_custom_columns');

function adribbon_manager_custom_columns($column) {
    global $post;

    $custom = get_post_custom();

    switch ($column) {
        case 'cat':
            echo get_the_term_list($post->ID, 'genre', '', ', ');
    }
}