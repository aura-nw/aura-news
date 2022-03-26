<?php
/**
 * Define constants
 * These contants will be used globally
 */
define('TEMPLATE_URL', get_template_directory_uri());
define('THEME_URL', get_stylesheet_directory());
define('IMAGE_URL', TEMPLATE_URL . '/assets/images');
define('NO_IMAGE_URL', 'http://lorempixel.com/g/500/500');
define('CORE', THEME_URL . '/core');
add_action('wp_enqueue_scripts', 'myscripts');

require_once(get_template_directory() . '/core/init.php');
// Include post-type
include_once(get_template_directory() . '/post-type/pt-news.php');
// Include short-code
include_once(get_template_directory() . '/shortcode/related-news.php');
include_once(get_template_directory() . '/shortcode/shared-news.php');
?>
