<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Taxonomies {

    public function __construct() {
        add_action('init', [$this, 'register']);
    }

    public function register() {

        register_taxonomy('tkg_category', ['tkg_experience', 'tkg_accommodation'], [
            'label' => 'Kategori',
            'hierarchical' => true,
            'show_in_rest' => true,
        ]);

        register_taxonomy('tkg_location', ['tkg_experience', 'tkg_accommodation'], [
            'label' => 'Lokation',
            'hierarchical' => false,
            'show_in_rest' => true,
        ]);
    }
}
