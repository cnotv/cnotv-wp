<?php
// add taxonomy "subfields"
add_action( 'init', 'register_taxonomy_subfields' );

function register_taxonomy_subfields() {

	$taxonomy_subfields_labels = array(
		'name' => _x( 'Subfields', 'subfields' ),
		'singular_name' => _x( 'Subfield', 'subfields' ),
		'search_items' => _x( 'Search Subfields', 'subfields' ),
		'popular_items' => _x( 'Popular Subfields', 'subfields' ),
		'all_items' => _x( 'All Subfields', 'subfields' ),
		'parent_item' => _x( 'Parent Subfields', 'subfields' ),
		'parent_item_colon' => _x( 'Parent Subfields:', 'subfields' ),
		'edit_item' => _x( 'Edit Subfield', 'subfields' ),
		'update_item' => _x( 'Update Subfield', 'subfields' ),
		'add_new_item' => _x( 'Add New Subfield', 'subfields' ),
		'new_item_name' => _x( 'New Subfield Name', 'subfields' ),
		'separate_items_with_commas' => _x( 'Separate Subfields with commas', 'subfields' ),
		'add_or_remove_items' => _x( 'Add or remove Subfield', 'subfields' ),
		'choose_from_most_used' => _x( 'Choose from the most used Subfields', 'subfields' ),
		'menu_name' => _x( 'Subfields', 'subfields' ),
	);

  $args = array(
    'labels'              => $taxonomy_subfields_labels,
    'public'              => true,
    'show_in_nav_menus'   => true,
    'show_ui'             => true,
    'show_tagcloud'       => true,
    'show_admin_column'   => true,
    'hierarchical'        => false,
    'rewrite'             => true,
    'query_var'           => true
  );

  register_taxonomy( 'subfields', array('portfolio'), $args );
} 