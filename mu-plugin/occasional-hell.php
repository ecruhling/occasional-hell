<?php
/*
  Plugin Name: Custom Stuff for Occasional Hell
  Plugin URI: http://occasionalhell.com
  Description: MU-plugin for custom stuff that has to run on occasionalhell.com
  Version: 1.0
  Author: Erik C. Rühling
  Author URI: http://occasionalhell.com
*/

function register_custom_post_types()
{
    /**
     * Post Type: Devices.
     */
    $labels = array(
        'name'                  => __('Devices', 'sage'),
        'singular_name'         => __('Device', 'sage'),
        'menu_name'             => __('Devices', 'text_domain'),
        'name_admin_bar'        => __('Device', 'text_domain'),
        'archives'              => __('Device Archives', 'text_domain'),
        'attributes'            => __('Device Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent Device:', 'text_domain'),
        'all_items'             => __('All Devices', 'text_domain'),
        'add_new_item'          => __('Add New Device', 'text_domain'),
        'add_new'               => __('Add New Device', 'text_domain'),
        'new_item'              => __('New Device', 'text_domain'),
        'edit_item'             => __('Edit Device', 'text_domain'),
        'update_item'           => __('Update Device', 'text_domain'),
        'view_item'             => __('View Device', 'text_domain'),
        'view_items'            => __('View Devices', 'text_domain'),
        'search_items'          => __('Search Device', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into Device', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this Device', 'text_domain'),
        'items_list'            => __('Devices list', 'text_domain'),
        'items_list_navigation' => __('Device list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter Devices list', 'text_domain'),
    );

    $args = array(
        'label'               => __('Devices', 'sage'),
        'labels'              => $labels,
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'delete_with_user'    => false,
        'show_in_rest'        => true,
        'has_archive'         => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array( 'slug' => 'infdevice', 'with_front' => true ),
        'query_var'           => true,
        'menu_position'       => 5,
        'menu_icon'           => 'data:image/svg+xml;base64,' . base64_encode("<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 640 512'><path fill='#9ea3a8' d='M4.69 439.43c-6.25 6.25-6.25 16.38 0 22.63l45.26 45.25c6.25 6.25 16.38 6.25 22.63 0l235.87-235.87-67.88-67.88L4.69 439.43zM525.74 160l-52.93-52.93 34.5-34.5c6.25-6.25 6.25-16.38 0-22.63L462.06 4.69c-6.25-6.25-16.38-6.25-22.63 0l-34.5 34.5-29.81-29.82C368.87 3.12 360.68 0 352.49 0s-16.38 3.12-22.63 9.37l-96.49 96.49c-12.5 12.5-12.5 32.76 0 45.25L384 301.74V416h32c123.71 0 224-100.29 224-224v-32H525.74zM448 348.79v-37.94c39.28-16.25 70.6-47.56 86.84-86.84h37.94C560.03 286.6 510.6 336.03 448 348.79z' ></path></svg>"),
        'supports'            => array(
            'title',
            'custom-fields',
            'revisions',
            'author',
        ),
    );

    register_post_type('devices', $args);
}

add_action('init', 'register_custom_post_types');

/**
 * Change the Title placeholder text for Devices CPT
 */
function change_default_title($title)
{
    $screen = get_current_screen();
    if (isset($screen->post_type)) {
        if ('devices' == $screen->post_type) {
            $title = 'Name';
        }
    }

    return $title;
}

add_filter('enter_title_here', 'change_default_title');

/**
 * Order devices by alphabetical order on archive page.
 * @param $query
 */
function alpha_order_items($query)
{
    if ($query->is_post_type_archive('devices') && $query->is_main_query()) {
        $query->set('posts_per_page', '-1');
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}

add_action('pre_get_posts', 'alpha_order_items');

/**
 * Custom Page Title for Devices Archive Page.
 */
function devices_archive_title($title)
{

    if (is_post_type_archive('devices')) {
        $title = 'Infernal Device - Machinery of Torture & Execution - ' . get_bloginfo('name');
        return $title;
    }

    return $title;
}

add_filter('pre_get_document_title', 'devices_archive_title', 9999);
