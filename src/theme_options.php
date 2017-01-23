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
    $html = str_replace( 'custom-logo', 'cnotv__logo', $html );
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