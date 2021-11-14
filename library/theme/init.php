<?php defined('ABSPATH') || exit('Forbidden');

/**
 * Enqueue script and styles.
 * 
 * @return void
 * 
 * See: https://developer.wordpress.org/reference/functions/wp_enqueue_scripts/
 */
function scripts()
{
  wp_enqueue_style('styles', get_stylesheet_uri());
  wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'scripts');

/**
 * Disallow the theme editor.
 */
if (!defined('DISALLOW_FILE_EDIT')) {
  define('DISALLOW_FILE_EDIT', true);
}

/**
 * Remove default posts and comment admin menus.
 * 
 * @return void
 * 
 * See: https://developer.wordpress.org/reference/hooks/admin_menu/
 */
function custom_admin_menus()
{
  remove_menu_page('edit.php');
  remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'custom_admin_menus');

add_theme_support('post-thumbnails');
add_theme_support('menus');

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'rel_canonical', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
