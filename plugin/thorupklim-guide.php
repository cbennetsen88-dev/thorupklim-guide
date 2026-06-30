<?php
/**
 * Plugin Name: ThorupKlim Guide
 * Description: Lokal guide til Thorup-Klim området med oplevelser, overnatning og interaktive features.
 * Version: 0.1.0
 * Author: ThorupKlim Project
 * Text Domain: thorupklim-guide
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define constants
define('TKG_VERSION', '0.1.0');
define('TKG_PATH', plugin_dir_path(__FILE__));
define('TKG_URL', plugin_dir_url(__FILE__));

// Load plugin core
require_once TKG_PATH . 'includes/class-plugin.php';

add_action('plugins_loaded', function () {
    \TKG\Core\Plugin::init();
});
