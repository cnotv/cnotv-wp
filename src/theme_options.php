<?php 
// ================================================================================================
// Theme basic functionalities setup
if ( ! function_exists( 'cnotv_setup' ) ) :
function cnotv_setup() {
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'custom-logo', array(
    // 'height'      => 240,
    // 'width'       => 240,
    'flex-height' => true,
  ) );
}
endif;
add_action( 'after_setup_theme', 'cnotv_setup' );

add_filter( 'get_custom_logo', 'change_logo_class' );
function change_logo_class( $html ) {
  $html = str_replace( 'custom-logo', 'c-logo', $html );
  return $html;
}



// Add SVG support
function cc_mime_types( $mimes ){
   $mimes['svg'] = 'image/svg+xml';
   return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );

// after Wordpress 4.7.1
function ignore_upload_ext($checked, $file, $filename, $mimes){

  //we only need to worry if WP failed the first pass
  if(!$checked['type']){
    //rebuild the type info
    $wp_filetype = wp_check_filetype( $filename, $mimes );
    $ext = $wp_filetype['ext'];
    $type = $wp_filetype['type'];
    $proper_filename = $filename;

    //preserve failure for non-svg images
    if($type && 0 === strpos($type, 'image/') && $ext !== 'svg'){
      $ext = $type = false;
    }

    //everything else gets an OK, so e.g. we've disabled the error-prone finfo-related checks WP just went through. whether or not the upload will be allowed depends on the <code>upload_mimes</code>, etc.

    $checked = compact('ext','type','proper_filename');
  }
  return $checked;
}
add_filter('wp_check_filetype_and_ext', 'ignore_upload_ext', 10, 4);




function taxonomy_cloud($taxonomy, $heading = null) {
  if($taxonomy) {
    $terms = get_terms( $taxonomy );

    if (!empty( $terms ) && !is_wp_error( $terms )):
      $template .= '<section class="c-section">';
      $template .= '<h2 class="h5">'.($heading ? $heading : $taxonomy).'</h2>';
          
      foreach($terms as $term ):
       $template .= '<a href="'. esc_url( get_term_link( $term ) ). '">'. $term->name. '</a> ';
      endforeach;

      $template .= '</section>';
    endif;
  } else {
    echo 'no cloud';
  }

  return $template;
}



// Share buttons generator
function share_button($social){
  $link = get_the_permalink();
  // $shortlink = shortlink($link);

  if ($social == 'facebook') {
    return 'https://www.facebook.com/sharer/sharer.php?u='. $link;
  };
  if ($social == 'twitter') {
    $text = get_the_title();
    if (strlen($text) > 111) $text = substr($text,0,111). '...';
    return 'https://twitter.com/intent/tweet?text='. $text .' - '. $link;
  };
  if ($social == 'linkedin') {
    return 'https://www.linkedin.com/shareArticle?mini=true&url='. $link .'&title='. get_the_title() .'&summary='. get_the_excerpt() .'&source=https://firma.de';
  };
  if ($social == 'mail') {
    return 'mailto:?subject='. get_the_title() .'&body='. get_the_excerpt() .' - '. $link .'" title="'. get_the_title();
  };
}