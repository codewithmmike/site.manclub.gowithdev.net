<?php
require_once 'includes/custom-flatsome.php';
require_once 'includes/disable-comment.php';
require_once 'includes/shortcodes/index.php';
require 'includes/fetch/index.php';

define("WP_FLATSOME_ASSET_VERSION", time());
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('c-home-css', get_stylesheet_directory_uri() . '/assets/css/c-home.css', [], WP_FLATSOME_ASSET_VERSION);
    wp_enqueue_style('c-devlin-css', get_stylesheet_directory_uri() . '/assets/css/c-devlin.css', [], WP_FLATSOME_ASSET_VERSION);
    wp_enqueue_style('c-cate-css', get_stylesheet_directory_uri() . '/assets/css/c-cate.css', [], WP_FLATSOME_ASSET_VERSION);
    wp_enqueue_style('c-media-queries-css', get_stylesheet_directory_uri() . '/assets/css/c-media-queries.css', [], WP_FLATSOME_ASSET_VERSION);
}, 999);

add_action('wp_footer', function () {
    wp_enqueue_script('post-fetcher.js', get_stylesheet_directory_uri() . '/assets/js/classes/post-fetcher.js', [], WP_FLATSOME_ASSET_VERSION);
    wp_enqueue_script('c-home-js', get_stylesheet_directory_uri() . '/assets/js/c-home.js', [], WP_FLATSOME_ASSET_VERSION);
});

/* font */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;500;700;800;900&display=swap',
        [],
        WP_FLATSOME_ASSET_VERSION
    );
    wp_enqueue_style('c-font-css', get_stylesheet_directory_uri() . '/assets/css/c-font.css', [], WP_FLATSOME_ASSET_VERSION);
}, 999);
/* END: font */