<?php

namespace IdeasOnPurpose;

$autoloader = require __DIR__ . '/vendor/autoload.php';

if (!defined('VERSION')) {
    define('VERSION', defined('WP_DEBUG') ? time() : wp_get_theme()->get('Version'));
}

new ThemeInit();

/**
 * Load Scripts from the webpack generated dist/dependency-manifest.json file
 */
new ThemeInit\Manifest();

/**
 * Initialize IdeasOnPurpose/GoogleAnalytics
 */
$client_ga_id = 'UA-2565788-3';
$iop_dev_ga = 'UA-2565788-3';
new GoogleAnalytics($client_ga_id, $iop_dev_ga);


/**
 * Initialize our SVG Library for all SVGs in images/svg
 */
new SVG(__DIR__ . '/dist/images/svg');

/**
 * Register Custom Widgets
 */
// new Widgets\NAME();

/**
 * Register Custom Shortcodes
 */
// new Shortcodes\NAME();

/**
 * Enable assorted WordPress features
 */
add_action('after_setup_theme', function () {
    // Add excerpts to pages
    add_post_type_support('page', 'excerpt');

    // Theme features
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', ['search-form', 'gallery', 'caption']);

    // Gutenberg settings
    add_theme_support('editor-styles'); // https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
    add_theme_support('align-wide'); // https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#wide-alignment
    add_theme_support('disable-custom-colors'); // https: //wordpress.org/gutenberg/handbook/extensibility/theme-support/#disabling-custom-colors-in-block-color-palettes

    // Guteberg color palette
    // Matches sass/wp/_wp-editor-colors.scss
    // add_theme_support('editor-color-palette', [
    //     ['name' => 'White', 'slug' => 'white', 'color' => '#fff'],
    //     ['name' => 'Black', 'slug' => 'black', 'color' => '#000']
    // ]);
});

/**
 * Register Sidebars and disable default widgets
 */
add_action('widgets_init', function () {
    // register_sidebars();

    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Custom_HTML');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Media_Audio');
    unregister_widget('WP_Widget_Media_Gallery');
    unregister_widget('WP_Widget_Media_Video');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Tag_Cloud');
});

/**
 * Register Custom Menus
 */
add_action('after_setup_theme', function () {
    register_nav_menus([
        'menu-main' => 'Main Menu',
        'menu-footer' => 'Footer Menu',
    ]);
});

/**
 * Define additional image sizes
 * Image sizes are generated from an array of size objects
 * Each size maps like this:
 *   name:     (string)   Internal image size name (slug)
 *   dims:     (array)    Array of two integers: [w, h]
 *   display:  (string)   Show in WP Menus using this name
 *   crop:     (array|boolean)  if not false, hard-crop the resulting image
 *
 * If display_name is specified, the image size will appear in authoring menus
 */
$image_sizes = [
    ['name' => '1k', 'dims' => [1024, 1024], 'display' => '1k - 1024px'],
    ['name' => '2k', 'dims' => [2048, 2048], 'display' => '2k - 2048px'],
    ['name' => '4k', 'dims' => [3840, 3840], 'display' => '4k - 3840px'],
];
new ImageSize($image_sizes);

