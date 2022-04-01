<?php
function myscripts() {
    // lib css
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/styles/bootstrap.min.css', array());
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/styles/slick.css', array());
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array());
    // lib js
    // remove wp jquery
    wp_deregister_script('jquery');
    // register new jquery
    wp_register_script('jquery', get_template_directory_uri() . '/assets/scripts/jquery-3.6.0.js', array());
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/scripts/main.js', array(), 'v1.0', true);
    wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/scripts/bootstrap.bundle.js', array(), 'v5.1.3', true);
    wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js', array(), 'v2.10.2', true);
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/scripts/slick.js', array(), 'v1.8.1', true);
}

/**
 * Thiết lập các chức năng sẽ được theme hỗ trợ
 **/
if ( ! function_exists( 'aura_theme_setup' ) ) {
    function aura_theme_setup() {
        /*
        * Thêm chức năng post thumbnail
        */
        add_theme_support( 'post-thumbnails' );
        /*
        * Thêm chức năng title-tag để tự thêm <title>
        */
        add_theme_support( 'title-tag' );
        /*
        * Thêm chức năng post format
        */
        add_theme_support( 'post-formats',
            array(
                'image',
                'video',
                'gallery',
                'quote',
                'link'
            )
        );

    }
    add_action ( 'init', 'aura_theme_setup' );
}

// Khai báo menu
if (function_exists('register_nav_menu')){
    register_nav_menu('header_main_menu', 'Header Main Menu');
}

/* Contact form 7 remove span */
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    $content = str_replace('<br />', '', $content);

    return $content;
});

// Add paginator into search page
function search_filter($query) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ($query->is_search) {
            $query->set('paged', ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
            $query->set('posts_per_page',6);
        }
    }
}
// Disable search any page
function remove_pages_from_search() {
    global $wp_post_types;
    $wp_post_types['page']->exclude_from_search = true;
}
add_action('init', 'remove_pages_from_search');
// add except into pages
add_post_type_support( 'page', 'excerpt' );
// remove_unit_tag cf7
add_filter('wpcf7_form_action_url', 'remove_unit_tag');
function remove_unit_tag($url){
    $remove_unit_tag = explode('#',$url);
    $new_url = $remove_unit_tag[0];
    return $new_url;
}
/*
 * Add theme setting
 */
//add new menu for theme-options page with page callback theme-options-page.
function add_custom_theme_page() {
    add_theme_page( 'Theme Title Settings', 'Theme Menu Settings', 'edit_theme_options', 'test-theme-options', 'theme_option_page' );
}
add_action( 'admin_menu', 'add_custom_theme_page' );
function theme_option_page() {
    ?>
    <div class="wrap">
        <h1>Theme Options Page</h1>
        <form method="post" action="options.php">
            <?php
            // display settings field on theme-option page
            settings_fields("theme-options-grp");

            // display all sections for theme-options page
            do_settings_sections("theme-options");
            submit_button();
            ?>
        </form>
    </div>
    <?php
}