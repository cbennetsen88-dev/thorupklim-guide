<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Meta_Fields {

    public function __construct() {
        add_action('add_meta_boxes', [$this, 'add_boxes']);
        add_action('save_post', [$this, 'save']);
    }

    public function add_boxes() {

        add_meta_box(
            'tkg_location_box',
            'Lokation (GPS)',
            [$this, 'render_box'],
            ['tkg_experience', 'tkg_accommodation']
        );
    }

    public function render_box($post) {

        $lat = get_post_meta($post->ID, '_tkg_lat', true);
        $lng = get_post_meta($post->ID, '_tkg_lng', true);

        echo '<label>Latitude</label>';
        echo '<input type="text" name="tkg_lat" value="' . esc_attr($lat) . '" style="width:100%;" />';

        echo '<label>Longitude</label>';
        echo '<input type="text" name="tkg_lng" value="' . esc_attr($lng) . '" style="width:100%;" />';
    }

    public function save($post_id) {

        if (isset($_POST['tkg_lat'])) {
            update_post_meta($post_id, '_tkg_lat', sanitize_text_field($_POST['tkg_lat']));
        }

        if (isset($_POST['tkg_lng'])) {
            update_post_meta($post_id, '_tkg_lng', sanitize_text_field($_POST['tkg_lng']));
        }
    }
}
