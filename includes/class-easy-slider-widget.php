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
                'separator' => 'before',
            ]
        );

        // Pengaturan Judul
        $repeater->add_control(
            'heading_title_group',
            [
                // 'label' => __( 'Pengaturan Judul', 'easy-slider' ),
                'label' => __( '🟦 Pengaturan Judul', 'easy-slider' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                
            ]
        );

        $repeater->add_control(
            'slide_title',
            [
                'label' => __( 'Judul', 'easy-slider' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Judul Slide', 'easy-slider' ),
                'label_block' => true,
                'separator' => 'before',
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
            'slide_title_color',
            [
                'label' => __( 'Warna Teks Judul', 'easy-slider' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'slide_title_typography',
                'label' => __( 'Tipografi Judul', 'easy-slider' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-title',
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'slide_title_text_shadow',
                'label' => __( 'Bayangan Teks Judul', 'easy-slider' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-title',
            ]
        );

        $repeater->add_responsive_control(
            'slide_title_margin_bottom',
            [
                'label' => __( 'Margin Bawah Judul', 'easy-slider' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );



        
        $repeater->add_control(
            'heading_subtitle_group',
            [
                'label' => __( '🟦 Pengaturan Subjudul', 'easy-slider' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'slide_subtitle',
            [
                'label' => __( 'Subjudul', 'easy-slider' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Subjudul Slide', 'easy-slider' ),
                'label_block' => true,
                'separator' => 'before',
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
            'slide_subtitle_color',
            [
                'label' => __( 'Warna Teks Subjudul', 'easy-slider' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'slide_subtitle_typography',
                'label' => __( 'Tipografi Subjudul', 'easy-slider' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-subtitle',
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'slide_subtitle_shadow',
                'label' => __( 'Bayangan Teks Subjudul', 'easy-slider' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-subtitle',
            ]
        );

        $repeater->add_responsive_control(
            'slide_subtitle_margin_bottom',
            [
                'label' => __( 'Margin Bawah Subjudul', 'easy-slider' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );



        $repeater->add_control(
            'heading_description_group',
            [
                'label' => __( '🟦 Pengaturan Deskripsi', 'easy-slider' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
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
            'slide_description_color',
            [
                'label' => __( 'Warna Deskripsi', 'easy-slider' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'slide_description_typography',
                'label' => __( 'Tipografi Deskripsi', 'easy-slider' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-description',
            ]
        );



        $repeater->add_control(
            'heading_button_group',
            [
                'label' => __( '🟦 Pengaturan Button', 'easy-slider' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
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

        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __( 'Tipografi Tombol', 'easy-slider' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-button',
            ]
        );

        $repeater->add_control(
            'button_text_color',
            [
                'label' => __( 'Warna Teks Tombol', 'easy-slider' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_control(
            'button_background_color',
            [
                'label' => __( 'Warna Latar Tombol', 'easy-slider' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'button_text_shadow',
                'label' => __( 'Text Shadow Tombol', 'easy-slider' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-button',
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'label' => __( 'Box Shadow Tombol', 'easy-slider' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-button',
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => __( 'Border Tombol', 'easy-slider' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-button',
            ]
        );

        $repeater->add_responsive_control(
            'button_border_radius',
            [
                'label' => __( 'Radius Tombol', 'easy-slider' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding Tombol', 'easy-slider' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_responsive_control(
            'button_margin',
            [
                'label' => __( 'Margin Tombol', 'easy-slider' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_responsive_control(
            'button_width',
            [
                'label' => __( 'Lebar Tombol', 'easy-slider' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-button' => 'width: {{SIZE}}{{UNIT}}; display: inline-block; text-decoration: none;',
                ],

            ]
        );

        $repeater->add_control(
            'button_text_align',
            [
                'label' => __( 'Perataan Teks Tombol', 'easy-slider' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Kiri', 'easy-slider' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Tengah', 'easy-slider' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Kanan', 'easy-slider' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .easy-slider-button' => 'text-align: {{VALUE}};',
                ],
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
        
        $this->add_responsive_control(
            'slider_height',
            [
                'label' => __( 'Tinggi Slider', 'easy-slider' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1200,
                    ],
                ],
                'default' => [
                    'size' => 500,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .easy-slider' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Padding Kontainer Konten', 'easy-slider' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => 40,
                    'right' => 40,
                    'bottom' => 40,
                    'left' => 40,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .easy-slider-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_alignment',
            [
                'label' => __( 'Perataan Konten', 'easy-slider' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __( 'Kiri', 'easy-slider' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Tengah', 'easy-slider' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => __( 'Kanan', 'easy-slider' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .easy-slider-content' => 'display: flex; flex-direction: column; align-items: {{VALUE}};',
                    '{{WRAPPER}} .easy-slider-content *' => 'text-align: {{VALUE}};',
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

        // Wrapper utama Swiper
        echo '<div class="easy-slider swiper">';

        // Wrapper slide container
        echo '<div class="swiper-wrapper">';

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

            // Repeater ID untuk custom styling
            $repeater_id = isset($slide['_id']) ? 'elementor-repeater-item-' . $slide['_id'] : '';

            echo '<div class="swiper-slide ' . esc_attr($repeater_id) . '">';
            echo '  <div class="easy-slider-slide" style="background-image: url(' . esc_url( $image_url ) . '); background-size: cover; background-position: center; height: 100%;">';
            echo '    <div class="easy-slider-content">';

            echo '<' . esc_html( $title_tag ) . ' class="easy-slider-title" style="font-size:' . esc_attr( $title_size ) . ';">' . esc_html( $title ) . '</' . esc_html( $title_tag ) . '>';
            echo '<' . esc_html( $subtitle_tag ) . ' class="easy-slider-subtitle" style="font-size:' . esc_attr( $subtitle_size ) . ';">' . esc_html( $subtitle ) . '</' . esc_html( $subtitle_tag ) . '>';
            echo '<p class="easy-slider-description">' . esc_html( $description ) . '</p>';

            if ( ! empty( $button_text ) ) {
                echo '      <a href="' . esc_url( $button_url ) . '" class="easy-slider-button">' . esc_html( $button_text ) . '</a>';
            }

            echo '    </div>'; // .easy-slider-content
            echo '  </div>';   // .easy-slider-slide
            echo '</div>';     // .swiper-slide
        }

        echo '</div>'; // .swiper-wrapper

        // Navigasi swiper
        echo '<div class="swiper-button-prev"></div>';
        echo '<div class="swiper-button-next"></div>';

        echo '</div>'; // .easy-slider.swiper
    }


}
