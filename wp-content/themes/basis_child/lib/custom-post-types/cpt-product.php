<?php
/*
Registers the post_type 'product'
*/

// Action
add_action( 'init', 'jg_product_register' );

// Registration Function
function jg_product_register() {

    // CPT Label
    $singular_name = 'Product';
    $plural_name = 'Products';

    // arguments
    $args = array(
        'public' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'has_archive' => true,
        'show_ui' => true,
        'show_in_admin_bar' => true,
        'hierarchical' => true, //supports wp_list_pages
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions'
        ),
        'rewrite' => array(
            //'slug' => __('products')
        ),
        'labels' => array(
            'name' => $singular_name,
            'singular_name' => $singular_name,
            'add_new' => 'Add New ' . $singular_name,
            'menu_name' => $plural_name,
            'add_new_item' => 'Add New ' . $singular_name,
            'edit_item' => 'Edit ' . $singular_name,
            'new_item' => 'New ' . $singular_name,
            'view_item' => 'View ' . $singular_name,
            'search_items' => 'Search ' . $plural_name,
            'not_found' => 'No ' . $plural_name . ' Found',
            'not_found_in_trash' => 'No ' . $plural_name . ' Found In Trash',
        )
    );

    // registrer_post_type()
    register_post_type( 'product', $args  );

}
?>
