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
    }
}
