<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Map {

    public function __construct() {
        add_shortcode('tkg_map', [$this, 'render']);
    }

    public function render() {

        return '
        <div id="tkg-map" style="height:500px;"></div>

        <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (typeof L === "undefined") return;

            var map = L.map("tkg-map").setView([57.2, 9.0], 11);

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: "© OpenStreetMap"
            }).addTo(map);
        });
        </script>';
    }
}
