<?php

function get_post_urls()
{
    $urls = $_POST['urls'];
    $results = array();
    foreach ($urls as $url) {
        $post_id = url_to_postid($url);
        $post = get_post($post_id);
        if ($post) {
            $link_cuoc_ngay = get_field('link_cuoc_ngay', $post_id);
            $results[] = array(
                'url' => $url,
                'link_cuoc_ngay' => $link_cuoc_ngay,
            );
        }
    }
    return ['data' => $results];
}

function register_api_endpoints()
{
    register_rest_route('wp/v2', 'post-urls', array(
        'methods' => 'POST',
        'callback' => 'get_post_urls',
    ));
}
add_action('rest_api_init', 'register_api_endpoints');
