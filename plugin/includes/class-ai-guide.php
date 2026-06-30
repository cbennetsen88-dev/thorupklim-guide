<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class AI_Guide {

    public function __construct() {
        add_shortcode('tkg_ai', [$this, 'render']);
    }

    public function render() {

        $suggestions = [
            "🌊 Tag til Thorup Strand",
            "🌿 Gå en tur i klitterne",
            "🏖️ Besøg kysten",
            "🍽️ Find lokal mad"
        ];

        return '<div class="tkg-ai"><h3>AI Guide</h3><p>' . $suggestions[array_rand($suggestions)] . '</p></div>';
    }
}
