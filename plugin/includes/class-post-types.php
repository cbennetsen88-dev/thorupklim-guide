<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Post_Types {

    public function __construct() {
        add_action('init', [$this, 'register']);
    }

    public function register() {

        register_post_type('tkg_experience', [
            'label' => 'Oplevelser',
            'public' => true,
            'menu_icon' => 'dashicons-palmtree',
            'supports' => ['title', 'editor', 'thumbnail'],
            'show_in_rest' => true,
        ]);

        register_post_type('tkg_accommodation', [
            'label' => 'Overnatning',
            'public' => true,
            'menu_icon' => 'dashicons-building',
            'supports' => ['title', 'editor', 'thumbnail'],
            'show_in_rest' => true,
        ]);
    }
}
