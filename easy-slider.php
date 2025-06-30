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

function easy_slider_enqueue_scripts() {
    wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css' );
    wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', [], null, true );
    
    wp_enqueue_script( 'easy-slider-init', plugins_url( 'assets/js/easy-slider-init.js', __FILE__ ), ['swiper'], null, true );
}
add_action( 'wp_enqueue_scripts', 'easy_slider_enqueue_scripts' );

add_action( 'elementor/frontend/after_enqueue_styles', 'easy_slider_enqueue_styles' );

function easy_slider_enqueue_styles() {
    wp_enqueue_style(
        'easy-slider-style',
        plugin_dir_url( __FILE__ ) . 'assets/css/easy-slider.css',
        [],
        '1.0'
    );
}

