<?php
if ( ! defined( 'ABSPATH' ) ) exit;

final class Easy_Slider_Init {

    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    public function init() {
        // Tunggu Elementor siap
        add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
    }

    public function register_widgets( $widgets_manager ) {
        require_once EASY_SLIDER_PATH . 'includes/class-easy-slider-widget.php';
        $widgets_manager->register( new \Easy_Slider_Widget() );
    }
}

new Easy_Slider_Init();
