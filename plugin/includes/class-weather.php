<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Weather {

    public function __construct() {
        add_shortcode('tkg_weather', [$this, 'render']);
    }

    public function render() {

        $weather = [
            "☀️ Solskin i Thorup",
            "🌥️ Let skyet",
            "🌧️ Regnvejr - café tid"
        ];

        return '<div class="tkg-weather"><h3>Vejr</h3><p>' . $weather[array_rand($weather)] . '</p></div>';
    }
}
