<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Shortcodes {

    public function __construct() {
        add_shortcode('tkg_guide', [$this, 'render_guide']);
    }

    public function render_guide() {
        return '<div class="tkg-guide">ThorupKlim Guide er aktiv 🚀</div>';
    }
}
