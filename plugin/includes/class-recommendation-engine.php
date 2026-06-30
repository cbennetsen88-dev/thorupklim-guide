<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Recommendation_Engine {

    public function __construct() {
        add_shortcode('tkg_today', [$this, 'render']);
    }

    public function render() {

        $tips = [
            "📍 Udforsk en strand",
            "🚶 Gå en kysttur",
            "📸 Find fotospots",
            "🌅 Se solnedgang"
        ];

        return '<div class="tkg-today"><h3>Dagens forslag</h3><p>' . $tips[array_rand($tips)] . '</p></div>';
    }
}
