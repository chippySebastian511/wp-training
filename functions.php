<?php
require get_template_directory() . '/includes/abcd.php';


// function simple_theme()
// {
//     add_theme_support('post-thumbnails');
// }
// add_action('after_setup_theme', 'simple_theme');


function create_posttype()
{
    register_post_type(
        'books',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('books'),
                'singular_name' => __('Book')
            ),
            $rewrite = array(
                'slug' => 'books',
            ),
            // $rewrite = array('slug' => 'book'),
            'public' => true,
            'has_archive' => false,
            // 'rewrite' => array('slug' => 'book'),

        )
    );
    // function custom_post_type()
    // {
    //     register_post_type(
    //         'books',
    //         array(
    //             'labels'  => array(
    //                 'name'    => 'Books',

    //             ),
    //             $rewrite = array(
    //                 'slug' => 'books',
    //                 'pages' => true,
    //                 'feeds' => true,

    //             ),
    //             'public'      => true,
    //             'has_archive' => true,
    //         )

    //     );
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');
/* Custom Post Type End */


function my_first_taxonomy()
{

    $args = array(

        'labels' => array(
            'name' => 'book category',
            'singular_name' => 'category',
        ),

        'public' => true,
        'hierarchical' => true,

    );


    register_taxonomy('book title', array('books'), $args);
}
add_action('init', 'my_first_taxonomy');

// second taxonomy

function my_second_taxonomy()
{

    $args = array(

        'labels' => array(
            'name' => 'book tags',
            'singular_name' => 'tags',
        ),

        'public' => true,
        'hierarchical' => true,

    );
    register_taxonomy('book topic', array('books'), $args);
}
add_action('init', 'my_second_taxonomy');



add_action('pre_get_posts', 'add_my_post_types_to_query');

function add_my_post_types_to_query($query)
{
    if (is_home() && $query->is_main_query())
        $query->set('post_type', array('post', 'books'));
    return $query;
}

function custom_new_menu()
{
    register_nav_menus(
        array(

            'header' => 'Header Menu',
            // 'footer' => 'Footer Menu',
        )
    );
}
add_action('init', 'custom_new_menu');
