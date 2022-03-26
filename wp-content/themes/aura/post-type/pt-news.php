<?php
function create_posttype_news() {
    register_post_type( 'news',
        // CPT Options
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'News' )
            ),
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'author',
                'thumbnail',
                'comments',
                'trackbacks',
                'revisions',
                'custom-fields'
            ),
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-feedback',
            'can_export' => true,
            'has_archive' => true,
            'public' => true,
            'rewrite' => array('slug' => 'news'),
            'show_in_rest' => true,
            'taxonomies' => array('category', 'post_tag'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_news' );