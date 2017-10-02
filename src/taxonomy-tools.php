<?php
// add taxonomy "tools"
add_action( 'init', 'register_taxonomy_tools' );

function register_taxonomy_tools() {

  $taxonomy_tools_labels = array(
    'name' => _x( 'Tools', 'tools' ),
    'singular_name' => _x( 'Tool', 'tools' ),
    'search_items' => _x( 'Search Tools', 'tools' ),
    'popular_items' => _x( 'Popular Tools', 'tools' ),
    'all_items' => _x( 'All Tools', 'tools' ),
    'parent_item' => _x( 'Parent Tools', 'tools' ),
    'parent_item_colon' => _x( 'Parent Tools:', 'tools' ),
    'edit_item' => _x( 'Edit Tool', 'tools' ),
    'update_item' => _x( 'Update Tool', 'tools' ),
    'add_new_item' => _x( 'Add New Tool', 'tools' ),
    'new_item_name' => _x( 'New Tool Name', 'tools' ),
    'separate_items_with_commas' => _x( 'Separate Tools with commas', 'tools' ),
    'add_or_remove_items' => _x( 'Add or remove Tool', 'tools' ),
    'choose_from_most_used' => _x( 'Choose from the most used Tools', 'tools' ),
    'menu_name' => _x( 'Tools', 'tools' ),
  );

  $args = array(
    'labels'              => $taxonomy_tools_labels,
    'public'              => true,
    'show_in_nav_menus'   => true,
    'show_ui'             => true,
    'show_tagcloud'       => true,
    'show_admin_column'   => true,
    'hierarchical'        => false,
    'rewrite'             => true,
    'show_in_rest'        => true,
    'query_var'           => true
  );

  register_taxonomy( 'tools', array('portfolio'), $args );
} 