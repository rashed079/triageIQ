<?php
/**
 * TriageIQ Theme — functions.php
 * Clinician-Supervised AI Triage · Laurentian University
 *
 * @author Md Rashed Azad Chowdhury <rashed06cse@gmail.com>
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'TRIAGEIQ_VERSION', '1.0.0' );
define( 'TRIAGEIQ_URI', get_template_directory_uri() );

function triageiq_setup() {
    load_theme_textdomain( 'triageiq', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', ['search-form','comment-form','comment-list','gallery','caption','style','script'] );
    add_theme_support( 'custom-logo', ['height'=>60,'width'=>200,'flex-height'=>true,'flex-width'=>true] );
    register_nav_menus(['primary' => __('Primary Menu','triageiq')]);
}
add_action( 'after_setup_theme', 'triageiq_setup' );

function triageiq_enqueue() {
    wp_enqueue_style( 'triageiq-fonts',
        'https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;700&display=swap',
        [], null );
    wp_enqueue_style( 'triageiq-style', get_stylesheet_uri(), ['triageiq-fonts'], TRIAGEIQ_VERSION );
    wp_enqueue_script( 'triageiq-main', TRIAGEIQ_URI . '/js/main.js', [], TRIAGEIQ_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'triageiq_enqueue' );

// Custom Post Type: Research Publications
function triageiq_register_cpts() {
    register_post_type('tiq_publication', [
        'labels'       => ['name'=>__('Publications','triageiq'),'singular_name'=>__('Publication','triageiq')],
        'public'       => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-media-document',
        'supports'     => ['title','editor','excerpt','thumbnail'],
        'rewrite'      => ['slug' => 'publications'],
    ]);
}
add_action( 'init', 'triageiq_register_cpts' );

// Security
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
add_filter( 'the_generator', '__return_empty_string' );
