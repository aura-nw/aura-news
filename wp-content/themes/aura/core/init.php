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

// skip sending cf7 email
add_filter( 'wpcf7_skip_mail', 'mycustom_wpcf7_skip_mail', 10, 2 );
function mycustom_wpcf7_skip_mail( $skip_mail, $contact_form ) {
    if ( 933 == $contact_form->id() ) { $skip_mail = true;    }
    return $skip_mail;
}

// get data from table trending
add_action( 'wp_ajax_my_action', 'my_action' );
add_action( 'wp_ajax_nopriv_my_action', 'my_action' );
function my_action() {
    //do bên js để dạng json nên giá trị trả về dùng phải encode
    $keywords = isset($_GET['keywords']) ? esc_attr($_GET['keywords']) : '';
    global $wpdb;
    $keywordsMatches =  $wpdb->get_results("SELECT key_word FROM tds_search_tag_trending WHERE key_word LIKE '%$keywords%'");
    echo json_encode($keywordsMatches);
    die(); //bắt buộc phải có khi kết thúc
}

function header_custom_main_menu() {
    $menu_name = 'Main Menu'; // specify custom menu slug
    $menu_list = '';

    if ($menu_items = wp_get_nav_menu_items($menu_name)) {
        $count = 0;
        $submenu = false;
        $parent_id = 0;
        $previous_item_has_submenu = false;

        foreach ((array) $menu_items as $key => $menu_item) {
            $title = $menu_item->title;
            $url = $menu_item->url;

            // check if it's a top-level item
            if ($menu_item->menu_item_parent == 0) {
                $parent_id = $menu_item->ID;
                // write the item but DON'T close the A or LI until we know if it has children!
                $menu_list .= "\t". '<li class="nav-item mx-lg-4 mx-xl-5 h4 h3-mob mb-5 mb-lg-0 mr-md-8">
                                        <div class="dropdown">
                                            <button class="nav-link dropdown-toggle ps-0" type="button" id="dropdownMenuResources-'.$menu_item->ID.'" data-bs-toggle="dropdown">'. $title . '</button>';
            }

            // if this item has a (nonzero) parent ID, it's a second-level (child) item
            else {
                if ( !$submenu ) { // first item
                    // start the child list
                    $submenu = true;
                    $previous_item_has_submenu = true;
                    $menu_list .= '<ul class="dropdown-menu body sub-text-mob" aria-labelledby="dropdownMenuResources-'.$menu_item->ID.'">';
                }

                $menu_list .= '<li>';
                $menu_list .= '<a href="'.$url.'" class="dropdown-item h4" target="_blank">'.$title.'</a>';
                $menu_list .= '</li>' ."\n";

                // if it's the last child, close the submenu code
                if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){
                    $menu_list .= "\t\t" . '</ul></div></li>' ."\n";
                    $submenu = false;
                }
            }

            // close the parent (top-level) item
            if (empty($menu_items[$count + 1]) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id )
            {
                if ($previous_item_has_submenu)
                {
                    // the a link and list item were already closed
                    $previous_item_has_submenu = false; //reset
                }
                else {
                    // close a link and list item
                    $menu_list .= "\t" . '</div></li>' . "\n";
                }
            }

            $count++;
        }
    } else {
        $menu_list .= '<!-- no list defined -->';
    }
    echo $menu_list;
}
function footer_custom_main_menu() {
    $menu_name = 'Main Menu'; // specify custom menu slug
    $menu_list = '';

    if ($menu_items = wp_get_nav_menu_items($menu_name)) {
        $count = 0;
        $submenu = false;
        $parent_id = 0;
        $previous_item_has_submenu = false;

        foreach ((array) $menu_items as $key => $menu_item) {
            $title = $menu_item->title;
            $url = $menu_item->url;

            // check if it's a top-level item
            if ($menu_item->menu_item_parent == 0) {
                $parent_id = $menu_item->ID;
                // write the item but DON'T close the A or LI until we know if it has children!
                $menu_list .= "\t". '<div class="col-6 col-md-3">
                                        <a href="'. $url .'" target="_blank" class="body contact__title">'. $title . '</a>';
            }

            // if this item has a (nonzero) parent ID, it's a second-level (child) item
            else {
                if ( !$submenu ) { // first item
                    // start the child list
                    $submenu = true;
                    $previous_item_has_submenu = true;
                    $menu_list .= '<div class="body mt-2 mt-md-5">';
                }

                $menu_list .= '<div class="mb-4">';
                $menu_list .= '<a target="_blank" href="'.$url.'">'.$title.'</a>';
                $menu_list .= '</div>' ."\n";

                // if it's the last child, close the submenu code
                if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){
                    $menu_list .= "</div></div>";
                    $submenu = false;
                }
            }

            // close the parent (top-level) item
            if (empty($menu_items[$count + 1]) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id )
            {
                if ($previous_item_has_submenu)
                {
                    // the a link and list item were already closed
                    $previous_item_has_submenu = false; //reset
                }
                else {
                    // close a link and list item
                    $menu_list .= "\t" . '</a></div>' . "\n";
                }
            }

            $count++;
        }
    } else {
        $menu_list .= '<!-- no list defined -->';
    }
    echo $menu_list;
}