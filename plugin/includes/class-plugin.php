<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Plugin {

    public static function init() {

        // Core components
        new Post_Types();
        new Taxonomies();
        new Shortcodes();
        new Rest_API();
        new Meta_Fields();
        new Map();

        // Admin only
        if (is_admin()) {
            new \TKG\Admin\Admin();
        }
    }
}
