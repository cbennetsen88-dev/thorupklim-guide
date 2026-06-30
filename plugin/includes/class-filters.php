<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Filters {

    public function __construct() {
        add_shortcode('tkg_filters', [$this, 'render']);
    }

    public function render() {
        return '
        <div class="tkg-filters">
            <button data-filter="all">Alle</button>
            <button data-filter="tkg_experience">Oplevelser</button>
            <button data-filter="tkg_accommodation">Overnatning</button>
        </div>';
    }
}
