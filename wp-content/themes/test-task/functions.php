<?php

require_once( __DIR__ . '/inc/' . 'widget-contacts.php' );

add_action( 'wp_enqueue_scripts', 'tt_scripts' );

function tt_scripts() {
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '8.0.1', 'all' );
    wp_enqueue_style( 'swiper-css', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', array(), 1.0, 'all' );
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/main.css', array( 'normalize', 'swiper-css' ), time() );

    // Deregister core jQuery
    wp_deregister_script('jquery');
    // Register
    wp_register_script('jquery','http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '3.3.1', true);
	wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'swiper', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', array(), null, true );
    wp_enqueue_script( 'aspnet', get_template_directory_uri() . '/assets/js/aspnet.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/main.js', array( 'swiper', 'jquery', 'aspnet' ), time(), true );
}

register_nav_menus( array(
    'menu-header' => 'Header menu',
    'menu-footer' => 'Footer menu',
) );

// Add post thumbnails
add_theme_support( 'post-thumbnails' );

// Custom logo
add_action( 'after_setup_theme', 'tt_custom_logo_setup' );

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

// Widgets
add_action( 'widgets_init', 'register_si_widgets' );

function register_si_widgets() {

    register_sidebar( array(
        'name'          => 'Footer Widget',
        'id'            => 'tt_footer',
        'description'   => 'Footer section',
        'before_widget' => '<div class="tt-footer-widget">',
        'after_widget'  => '</div>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer Copyright',
        'id'            => 'tt_copyright',
        'description'   => 'Footer section',
        'class'         => '',
        'before_widget' => null,
        'after_widget'  => null,
    ) );

    register_sidebar( array(
        'name'          => 'Contacts',
        'id'            => 'tt_contacts',
        'description'   => 'Shape section',
        'class'         => '',
        'before_widget' => null,
        'after_widget'  => null,
    ) );

    register_widget( 'tt_widget_contacts' );
}

// Register custom post type
add_action( 'init', 'tt_register_types' );

function tt_register_types() {
    register_post_type( 'reviews', [
        'labels' => [
            'name'               => __( 'Reviews', 'test-task' ),
            'singular_name'      => __( 'Reviews', 'test-task' ),
            'add_new'            => __( 'Add review', 'test-task' ),
            'add_new_item'       => __( 'Add new review', 'test-task' ),
            'edit_item'          => __( 'Edit reviews', 'test-task' ),
            'new_item'           => __( 'New reviews', 'test-task' ),
            'view_item'          => __( 'View reviews', 'test-task' ),
            'search_items'       => __( 'Search reviews', 'test-task' ),
            'not_found'          => __( 'Not fount reviews', 'test-task' ),
            'not_found_in_trash' => __( 'Not found review in trash reviews', 'test-task' ),
            'menu_name'          => __( 'Reviews', 'test-task' ),
        ],
        'public'              => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-admin-users',
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'taxonomies'          => [],
        'has_archive'         => true,
    ]);
}

add_filter( 'wp_mail_content_type', 'filter_content_type' );

function filter_content_type( $content_type ){
	return 'text/html';
}
