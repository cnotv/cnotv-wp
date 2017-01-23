<?php

namespace App;

use Roots\Sage\Template;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
    wp_enqueue_style( 'google_fonts1', '//fonts.googleapis.com/css?family=Merriweather+Sans:300,300italic,400,700', false, null );
    wp_enqueue_style( 'google_fonts2', '//fonts.googleapis.com/css?family=Montserrat:400,700', false, null );
    // wp_enqueue_script('sage/scrollspy', 'https://raw.githubusercontent.com/Dogfalo/materialize/master/js/scrollspy.js', ['jquery'], null, true);
    // wp_enqueue_script('sage/jqueryeasing', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', ['jquery'], null, true);
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable plugins to manage the document title
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link http://codex.wordpress.org/Post_Thumbnails
     * @link http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
     * @link http://codex.wordpress.org/Function_Reference/add_image_size
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable post formats
     * @link http://codex.wordpress.org/Post_Formats
     */
    add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

    /**
     * Enable HTML5 markup support
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Use main stylesheet for visual editor
     * @see assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
});

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer A', 'sage'),
        'id'            => 'sidebar-footer-a'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer B', 'sage'),
        'id'            => 'sidebar-footer-b'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer C', 'sage'),
        'id'            => 'sidebar-footer-c'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer D', 'sage'),
        'id'            => 'sidebar-footer-d'
    ] + $config);
});
