<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/class-ai-guide.php';
require_once __DIR__ . '/class-weather.php';
require_once __DIR__ . '/class-recommendation-engine.php';
require_once __DIR__ . '/class-guide-mode.php';
require_once __DIR__ . '/class-plan-engine.php';
require_once __DIR__ . '/class-ai-chat.php';

class Plugin {

    public static function init() {

        // Core components
        new Post_Types();
        new Taxonomies();
        new Shortcodes();
        new Rest_API();
        new Meta_Fields();
        new Map();
        new Filters();
        new UI_Panel();

        // Intelligence layer
        new AI_Guide();
        new Weather();
        new Recommendation_Engine();
        new Guide_Mode();
        new Plan_Engine();
        new AI_Chat();

        // Admin only
        if (is_admin()) {
            new \TKG\Admin\Admin();
        }
    }
}
