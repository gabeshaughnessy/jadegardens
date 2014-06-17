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
        'menu_icon' => ACF__PLUGIN_DIR.'/images/product_icon.svg',
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

//set up taxonomies for products

add_action( 'init', 'create_product_taxonomies', 0 );

function create_product_taxonomies() {
    
     //Strain
    $labels = array(
        'name'              => _x( 'Strain', 'taxonomy general name' ),
        'singular_name'     => _x( 'Strain', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Strains' ),
        'all_items'         => __( 'All Strains' ),
        'edit_item'         => __( 'Edit Strain' ),
        'update_item'       => __( 'Update Strain' ),
        'add_new_item'      => __( 'Add New Strain' ),
        'new_item_name'     => __( 'New Strain Name' ),
        'menu_name'         => __( 'Strains' ),
        'add_or_remove_items' => __( 'Add or remove strains' ),
        'choose_from_most_used' => __( 'Choose from the most used strains' ),
        'separate_items_with_commas' => __('Separate strains with commas')
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );

    register_taxonomy( 'strain', array( 'product' ), $args );
   
   //Product Type
    $labels = array(
        'name'              => _x( 'Product Type', 'taxonomy general name' ),
        'singular_name'     => _x( 'Product Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Product Types' ),
        'all_items'         => __( 'All Product Types' ),
        'parent_item'       => __( 'Parent Product Type' ),
        'parent_item_colon' => __( 'Parent Product Type:' ),
        'edit_item'         => __( 'Edit Product Type' ),
        'update_item'       => __( 'Update Type' ),
        'add_new_item'      => __( 'Add New Product Type' ),
        'new_item_name'     => __( 'New Product Type Name' ),
        'menu_name'         => __( 'Product Types' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array(  'hierarchical' => true ),
    );

    register_taxonomy( 'product-type', array( 'product' ), $args );
 
    
    //Product Usages 
    $labels = array(
        'name'              => _x( 'Product Usages', 'taxonomy general name' ),
        'singular_name'     => _x( 'Product Usage', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Usages' ),
        'all_items'         => __( 'All Usages' ),
        'parent_item'       => __( 'Parent Usage' ),
        'parent_item_colon' => __( 'Parent Usage:' ),
        'edit_item'         => __( 'Edit Usage' ),
        'update_item'       => __( 'Update Usage' ),
        'add_new_item'      => __( 'Add New Usage' ),
        'new_item_name'     => __( 'New Usage Name' ),
        'menu_name'         => __( 'Product Usages' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array(  'hierarchical' => true ),
    );

    register_taxonomy( 'usage', array( 'product' ), $args );

}
?>
