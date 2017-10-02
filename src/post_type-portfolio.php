<?php 
// Portfolio post type function
function create_posttype_portfolio() {
  // Set UI labels for Custom Post Type
  $labels = array(
    'name'                  => _x( 'Portfolio', 'Post Type General Name', 'legalbase' ),
    'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'legalbase' ),
    'menu_name'             => __( 'Portfolio', 'legalbase' ),
    'name_admin_bar'        => __( 'Portfolio', 'legalbase' ),
    'archives'              => __( 'Portfolio Archives', 'legalbase' ),
    'parent_item_colon'     => __( 'Parent Portfolio:', 'legalbase' ),
    'all_items'             => __( 'All Portfolio', 'legalbase' ),
    'add_new_item'          => __( 'Add New Portfolio', 'legalbase' ),
    'add_new'               => __( 'Add New', 'legalbase' ),
    'new_item'              => __( 'New Portfolio', 'legalbase' ),
    'edit_item'             => __( 'Edit Portfolio', 'legalbase' ),
    'update_item'           => __( 'Update Portfolio', 'legalbase' ),
    'view_item'             => __( 'View Portfolio', 'legalbase' ),
    'search_items'          => __( 'Search Portfolio', 'legalbase' ),
    'not_found'             => __( 'Not found', 'legalbase' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'legalbase' ),
    'featured_image'        => __( 'Featured Image', 'legalbase' ),
    'set_featured_image'    => __( 'Set featured image', 'legalbase' ),
    'remove_featured_image' => __( 'Remove featured image', 'legalbase' ),
    'use_featured_image'    => __( 'Use as featured image', 'legalbase' ),
    'insert_into_item'      => __( 'Insert into item', 'legalbase' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'legalbase' ),
    'items_list'            => __( 'Portfolio list', 'legalbase' ),
    'items_list_navigation' => __( 'Portfolio list navigation', 'legalbase' ),
    'filter_items_list'     => __( 'Filter items list', 'legalbase' ),
  );

  $rewrite = array('slug' => 'portfolio');

  $support = array( 
    'title', 
    'editor', 
    'excerpt', 
    //'author', 
    'thumbnail',
    'tags',
    'category',
    // 'comments', 
    'revisions', 
    'custom-fields', 
    // 'page-attributes',
    // 'trackbacks'
  );

  register_post_type( 'portfolio',
  // CPT Options
    array(
      'labels'                => $labels,
      'public'                => true,
      'has_archive'           => true,
      'rewrite'               => $rewrite,
      'supports'              => $support,
      'taxonomies'            => array( 'portfolio_category', 'subfields', 'tools'),
      'hierarchical'          => true,
      'show_ui'               => true,
      'show_in_rest'          => true,
      'show_in_menu'          => true,
      'menu_position'         => 4,
      'menu_icon'             => 'dashicons-welcome-view-site',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'post',
    )
  );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_portfolio' );


function updated_messages_portfolio( $messages ) {
  global $post, $post_ID;
  $messages['portfolio'] = array(
    0 => '', 
    1 => sprintf( __('Portfolio updated. <a href="%s">View portfolio</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Portfolio updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Portfolio restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Portfolio published. <a href="%s">View portfolio</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Portfolio saved.'),
    8 => sprintf( __('Portfolio submitted. <a target="_blank" href="%s">Preview portfolio</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Portfolio scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview portfolio</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Portfolio draft updated. <a target="_blank" href="%s">Preview portfolio</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'updated_messages_portfolio' );
