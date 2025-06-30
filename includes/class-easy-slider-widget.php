<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit;

class Easy_Slider_Widget extends Widget_Base {

    public function get_name() {
        return 'easy_slider';
    }

    public function get_title() {
        return 'Easy Slider';
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {
        // === TAB CONTENT ===
        $this->start_controls_section(
            'slides_section',
            [
                'label' => __( 'Slides', 'easy-slider' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'slide_image',
            [
                'label' => __( 'Gambar', 'easy-slider' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'slide_title',
            [
                'label' => __( 'Judul', 'easy-slider' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Judul Slide', 'easy-slider' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slide_title_tag',
            [
                'label' => __( 'Tag Judul', 'easy-slider' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
            ]
        );

        $repeater->add_control(
            'slide_title_size',
            [
                'label' => __( 'Ukuran Font Judul', 'easy-slider' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 32,
                    'unit' => 'px',
                ],
            ]
        );

        $repeater->add_control(
            'slide_subtitle',
            [
                'label' => __( 'Subjudul', 'easy-slider' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Subjudul Slide', 'easy-slider' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slide_subtitle_tag',
            [
                'label' => __( 'Tag Subjudul', 'easy-slider' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'h4',
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
            ]
        );

        $repeater->add_control(
            'slide_subtitle_size',
            [
                'label' => __( 'Ukuran Font Subjudul', 'easy-slider' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 80,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 18,
                    'unit' => 'px',
                ],
            ]
        );

        $repeater->add_control(
            'slide_description',
            [
                'label' => __( 'Deskripsi', 'easy-slider' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Ini adalah deskripsi slide.', 'easy-slider' ),
                'rows' => 3,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slide_button_text',
            [
                'label' => __( 'Teks Tombol', 'easy-slider' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Lihat Selengkapnya', 'easy-slider' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slide_button_url',
            [
                'label' => __( 'URL Tombol', 'easy-slider' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://example.com',
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => __( 'Slide', 'easy-slider' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ slide_title }}}',
            ]
        );

        $this->end_controls_section(); // END Content Section

        // === TAB STYLE ===
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style Umum', 'easy-slider' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Warna Judul', 'easy-slider' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-slider-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); // END Style Section
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $slides = $settings['slides'];

        if ( empty( $slides ) ) {
            echo '<p>Belum ada slide ditambahkan.</p>';
            return;
        }

        echo '<div class="easy-slider-wrapper">';

        foreach ( $slides as $slide ) {
            $image_url = isset( $slide['slide_image']['url'] ) ? $slide['slide_image']['url'] : '';
            $title = $slide['slide_title'];
            $subtitle = $slide['slide_subtitle'];
            $description = $slide['slide_description'];
            $button_text = $slide['slide_button_text'];
            $button_url = isset( $slide['slide_button_url']['url'] ) ? $slide['slide_button_url']['url'] : '#';

            // tag & size
            $title_tag = !empty($slide['slide_title_tag']) ? $slide['slide_title_tag'] : 'h2';
            $title_size = isset($slide['slide_title_size']['size']) ? $slide['slide_title_size']['size'] . 'px' : '32px';

            $subtitle_tag = !empty($slide['slide_subtitle_tag']) ? $slide['slide_subtitle_tag'] : 'h4';
            $subtitle_size = isset($slide['slide_subtitle_size']['size']) ? $slide['slide_subtitle_size']['size'] . 'px' : '18px';

            echo '<div class="easy-slider-slide" style="background-image: url(' . esc_url( $image_url ) . ');">';
            echo '  <div class="easy-slider-content">';

            
            echo '<' . esc_html( $title_tag ) . ' class="easy-slider-title" style="font-size:' . esc_attr( $title_size ) . ';">' . esc_html( $title ) . '</' . esc_html( $title_tag ) . '>';
            echo '<' . esc_html( $subtitle_tag ) . ' class="easy-slider-subtitle" style="font-size:' . esc_attr( $subtitle_size ) . '; color: #fff;">' . esc_html( $subtitle ) . '</' . esc_html( $subtitle_tag ) . '>';
            echo '<p class="easy-slider-description" style="color: #fff;">' . esc_html( $description ) . '</p>';

            if ( ! empty( $button_text ) ) {
                echo '    <a href="' . esc_url( $button_url ) . '" class="easy-slider-button">' . esc_html( $button_text ) . '</a>';
            }

            echo '  </div>';
            echo '</div>';
        }

        echo '</div>';
    }
}
