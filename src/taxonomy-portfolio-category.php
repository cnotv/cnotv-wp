<?php
// add taxonomy "portfolio_category"
add_action( 'init', 'register_taxonomy_portfolio_category' );

function register_taxonomy_portfolio_category() {

	$taxonomy_portfolio_category_labels = array(
		'name' => _x( 'Portfolio categories', 'cnotv' ),
		'singular_name' => _x( 'Portfolio category', 'cnotv' ),
		'search_items' => _x( 'Search Portfolio categories', 'cnotv' ),
		'popular_items' => _x( 'Popular Portfolio categories', 'cnotv' ),
		'all_items' => _x( 'All Portfolio categories', 'cnotv' ),
		'parent_item' => _x( 'Parent Portfolio categories', 'cnotv' ),
		'parent_item_colon' => _x( 'Parent Portfolio categories:', 'cnotv' ),
		'edit_item' => _x( 'Edit Portfolio category', 'cnotv' ),
		'update_item' => _x( 'Update Portfolio category', 'cnotv' ),
		'add_new_item' => _x( 'Add New Portfolio category', 'cnotv' ),
		'new_item_name' => _x( 'New Portfolio category Name', 'cnotv' ),
		'separate_items_with_commas' => _x( 'Separate Portfolio categories with commas', 'cnotv' ),
		'add_or_remove_items' => _x( 'Add or remove Portfolio category', 'cnotv' ),
		'choose_from_most_used' => _x( 'Choose from the most used Portfolio categories', 'cnotv' ),
		'menu_name' => _x( 'Portfolio categories', 'cnotv' ),
	);

  $args = array(
    'labels'              => $taxonomy_portfolio_category_labels,
    'public'              => true,
    'show_in_nav_menus'   => true,
    'show_ui'             => true,
    'show_tagcloud'       => false,
    'show_admin_column'   => true,
    'hierarchical'        => true,
    'rewrite'             => true,
		'show_in_rest' 				=> true,
    'query_var'           => true
  );

  register_taxonomy( 'portfolio_category', array('portfolio'), $args );
} 