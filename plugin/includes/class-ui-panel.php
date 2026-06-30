<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class UI_Panel {

    public function __construct() {
        add_shortcode('tkg_panel', [$this, 'render']);
    }

    public function render() {
        return '
        <div class="tkg-panel">
            <button onclick="document.dispatchEvent(new CustomEvent(\'tkg-filter\', {detail: \"all\"}))">Alle</button>
            <button onclick="document.dispatchEvent(new CustomEvent(\'tkg-filter\', {detail: \"tkg_experience\"}))">Oplevelser</button>
            <button onclick="document.dispatchEvent(new CustomEvent(\'tkg-filter\', {detail: \"tkg_accommodation\"}))">Overnatning</button>
            <button onclick="navigator.geolocation.getCurrentPosition(function(pos){ document.dispatchEvent(new CustomEvent(\'tkg-near-me\', {detail:{lat:pos.coords.latitude,lng:pos.coords.longitude}})); })">Tæt på mig</button>
        </div>';
    }
}
