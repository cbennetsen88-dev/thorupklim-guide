<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Rest_API {

    public function __construct() {
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    public function register_routes() {

        register_rest_route('tkg/v1', '/ping', [
            'methods' => 'GET',
            'callback' => function () {
                return [
                    'status' => 'ok',
                    'message' => 'ThorupKlim Guide API is running'
                ];
            }
        ]);

        register_rest_route('tkg/v1', '/locations', [
            'methods' => 'GET',
            'callback' => function () {

                $posts = get_posts([
                    'post_type' => ['tkg_experience', 'tkg_accommodation'],
                    'numberposts' => -1
                ]);

                $data = [];

                foreach ($posts as $post) {

                    $lat = get_post_meta($post->ID, '_tkg_lat', true);
                    $lng = get_post_meta($post->ID, '_tkg_lng', true);

                    if (!$lat || !$lng) continue;

                    $data[] = [
                        'title' => $post->post_title,
                        'lat' => (float) $lat,
                        'lng' => (float) $lng
                    ];
                }

                return $data;
            }
        ]);
    }
}
