<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Post Types
    |--------------------------------------------------------------------------
    |
    | Here you may specify the post types to be registered by Poet using the
    | Extended CPTs library. <https://github.com/johnbillion/extended-cpts>
    |
    */

    'post' => [
        'icon' => [
            'labels' => [
            'singular' => 'Icoon',
            'plural' => 'Iconen',
            'menu_name' => 'Iconen',
            'all_items' => 'Alle iconen',
            'add_new' => 'Nieuwe icoon',
            'add_new_item' => 'Nieuwe icoon',
            'edit_item' => 'Bewerk icoon',
            'new_item' => 'Nieuwe icoon',
            'view_item' => 'Bekijk icoon',
            'view_items' => 'Bekijk iconen',
            'search_items' => 'Zoek icoon',
            'not_found' => 'Geen iconen gevonden',
            'not_found_in_trash' => 'Geen iconen gevonden in de prullenbak',
            ],
            'menu_icon' => 'dashicons-category',
            'supports' => ['title', 'revisions'],
            'public' => false,
            'show_ui' => true,
            'publicly_queryable' => false,
            'query_var' => false,
            'show_in_nav_menus' => false,
            'show_in_menu' => true,
            'has_archive' => false,
            'hierarchical' => false,
            'can_export' => true,
            'capability_type' => 'post',
            'rewrite' => false,
            'exclude_from_search' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Taxonomies
    |--------------------------------------------------------------------------
    |
    | Here you may specify the taxonomies to be registered by Poet using the
    | Extended CPTs library. <https://github.com/johnbillion/extended-cpts>
    |
    */

    'taxonomy' => [],
];
