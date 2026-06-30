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
                        'type' => $post->post_type,
                        'lat' => (float) $lat,
                        'lng' => (float) $lng
                    ];
                }

                return $data;
            }
        ]);

        register_rest_route('tkg/v1', '/daily-guide', [
            'methods' => 'GET',
            'callback' => function () {

                $weather = ['☀️ Solskin', '🌥️ Skyet', '🌧️ Regn'];
                $activities = [
                    'Gå til stranden i Thorup',
                    'Udforsk klitterne',
                    'Besøg lokal café',
                    'Tag en kystvandring'
                ];

                return [
                    'weather' => $weather[array_rand($weather)],
                    'activity' => $activities[array_rand($activities)]
                ];
            }
        ]);

        register_rest_route('tkg/v1', '/plan-day', [
            'methods' => 'GET',
            'callback' => function () {

                if (class_exists('TKG\\Core\\Plan_Engine')) {
                    return \TKG\Core\Plan_Engine::generate_plan();
                }

                return [
                    'error' => 'Plan engine not available'
                ];
            }
        ]);
    }
}
