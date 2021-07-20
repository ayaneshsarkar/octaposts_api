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

    function registerMwitterTags() {
        // Add new taxonomy, NOT hierarchical (like tags)
        $args = [
            'labels' => [
                'name' => 'Mweet Tags',
                'singular_name' => 'Mweet Tag',
                'all_items' => __('All Mweet Tags'),
                'edit_item' => __('Edit Mweet Tags'),
                'view_item' => __('View Mweet Tags'),
                'update_item' => __('Update Mwtag'),
                'add_new_item' => __('Add Mwtag'),
                'search_items' => __('Search Mweet Tags'),
                'popular_items' => __('Popular Mweet Tags'),
                'add_or_remove_items' => __('Add Or Remove Mweet Tags'),
                'not_found' => __('No Mweet Tags Found'),
                'separate_items_with_commas' => __('Separate Mweet Tags With Commas'),
                'choose_from_most_used' => __('Choose From Most Used Mweet Tags')
            ],
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true
        ];

        register_taxonomy('mweetTags', ['mweets'], $args);
    }

    add_action('init', 'registerMwitterTags');