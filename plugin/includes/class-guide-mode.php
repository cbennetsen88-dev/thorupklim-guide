<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Guide_Mode {

    public function __construct() {
        add_shortcode('tkg_dashboard', [$this, 'render']);
    }

    public function render() {

        return '<div class="tkg-dashboard">
            <h2>🌍 Guide Mode</h2>
            <button onclick="document.dispatchEvent(new Event(\'tkg-ai-refresh\'))">Start min dag</button>
            <div id="tkg-ai-output"></div>
        </div>';
    }

    public static function generate_daily_guide() {

        $weather = ["☀️ Solskin", "🌥️ Skyet", "🌧️ Regn"];
        $activities = [
            "Tag til stranden i Thorup",
            "Gå en tur i klitterne",
            "Besøg lokal café",
            "Udforsk naturen"
        ];

        return [
            'weather' => $weather[array_rand($weather)],
            'activity' => $activities[array_rand($activities)]
        ];
    }
}
