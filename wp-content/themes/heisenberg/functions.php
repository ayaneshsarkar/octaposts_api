<?php 

    function loadCss() {
        wp_register_style('app', get_template_directory_uri() . '/css/app.css');
        wp_enqueue_style('app');
    }

    function loadJs() {
        wp_register_script('app', get_template_directory_uri() . '/js/app.js', [], false, true);
        wp_enqueue_script('app');
    }

    add_action('wp_enqueue_scripts', 'loadCss');
    add_action('wp_enqueue_scripts', 'loadJs');

    // Theme Options
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');

    // Register Post Type Mwitter
    function registerMwitter() {
        $args = [
            'labels' => [
                'name' => 'Mweets',
                'singular_name' => 'Mweet',
            ],
                'hierarchical' => true,
                'public' => true,
                'has_archive' => true,
                'show_in_rest' => true,
                'menu_icon' => 'dashicons-twitter',
                'supports' => ['title', 'thumbnail', 'author']
        ];

        register_post_type('mweets', $args);
    }

    add_action('init', 'registerMwitter');