<?php
/**
 * Plugin Name: EasySlider
 * Description: Custom Elementor Widget - EasySlider.
 * Version: 1.0
 * Author: Nama Kamu
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'EASY_SLIDER_PATH', plugin_dir_path( __FILE__ ) );
define( 'EASY_SLIDER_URL', plugin_dir_url( __FILE__ ) );

require_once EASY_SLIDER_PATH . 'includes/class-easy-slider-init.php';

add_action( 'admin_menu', 'easy_slider_register_admin_menu' );

function easy_slider_register_admin_menu() {
    add_menu_page(
        'EasySlider',                // Page title
        'EasySlider',                // Menu title
        'manage_options',            // Capability
        'easy-slider-settings',     // Menu slug
        'easy_slider_admin_page',   // Callback function
        'dashicons-images-alt2',    // Icon
        1000                         // Position (besar = paling bawah)
    );
}

function easy_slider_admin_page() {
    ?>
    <div class="wrap">
        <h1>EasySlider Settings</h1>
        <p>Ini halaman pengaturan untuk widget EasySlider.</p>
    </div>
    <?php
}
