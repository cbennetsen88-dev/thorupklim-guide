<?php

namespace TKG\Admin;

if (!defined('ABSPATH')) {
    exit;
}

class Admin {

    public function __construct() {
        add_action('admin_menu', [$this, 'menu']);
    }

    public function menu() {
        add_menu_page(
            'ThorupKlim Guide',
            'TK Guide',
            'manage_options',
            'tkg',
            [$this, 'page'],
            'dashicons-location-alt',
            25
        );
    }

    public function page() {
        echo '<div class="wrap"><h1>ThorupKlim Guide</h1><p>Sprint 1 aktiv 🚀</p></div>';
    }
}
