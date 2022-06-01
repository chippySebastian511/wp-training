<?php
/*
* Plugin Name: Ingredients Taxonomy
* Description: A short example showing how to add a taxonomy called Ingredients.
* Version: 1.0
* Author: wpastra.com
* Author URI: https://wpastra.com/
*/

function wporg_register_taxonomy_ingredients()
{
    $labels = array(
        'name'              => _x('book', 'taxonomy general name'),
        'singular_name'     => _x('singlebook', 'taxonomy singular name'),
        'search_items'      => __('Search book'),
        'all_items'         => __('All book'),
        'parent_item'       => __('Parent book'),
        'parent_item_colon' => __('Parent book:'),
        'edit_item'         => __('Edit book'),
        'update_item'       => __('Update book'),
        'add_new_item'      => __('Add New book'),
        'new_item_name'     => __('New book Name'),
        'menu_name'         => __('book'),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'book'],
    );
    register_taxonomy('ingredients', ['post'], $args);
}
add_action('init', 'wporg_register_taxonomy_ingredients');
