<?php

add_action( 'wp_enqueue_scripts', 'tt_scripts' );

function tt_scripts() {
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '8.0.1', 'all' );
    wp_enqueue_style( 'swiper-css', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', array(), 1.0, 'all' );
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/main.css', array( 'normalize', 'swiper-css' ), time() );

    wp_enqueue_script( 'swiper', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', array(), null, true );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/main.js', array( 'swiper' ), time(), true );
}

register_nav_menus( array(
    'menu-header'   => 'Header menu',
    'menu-footer' => 'Footer menu',
) );

function tt_custom_logo_setup() {
    $defaults = array(
        'height'               => 60,
        'width'                => 290,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,
    );

    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'tt_custom_logo_setup' );

register_sidebar( array(
    'name'          => 'Footer Widget',
    'id'            => 'tt_sidebar',
    'description'   => 'Footer',
    'before_widget' => '<div class="tt-footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
) );

register_sidebar( array(
    'name'          => 'Footer Widget 2',
    'id'            => 'footer',
    'description'   => 'Footer section',
    'before_widget' => '<div class="mk-footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
) );