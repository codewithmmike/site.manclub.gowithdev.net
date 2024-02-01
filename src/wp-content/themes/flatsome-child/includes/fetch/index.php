<?php
require 'acf.php';
require 'rest-api-post-urls.php';

// Config Route
// function register_api_endpoints()
// {
//     register_rest_route('wp/v2', 'post-urls', array(
//         'methods' => 'POST',
//         'callback' => 'get_post_urls',
//     ));
// }
// add_action('rest_api_init', 'register_api_endpoints'); 


add_action('wp_footer', function () {
    wp_enqueue_script('post-fetcher.js', get_stylesheet_directory_uri() . '/includes/fetch/scripts.js', [], WP_FLATSOME_ASSET_VERSION);
});