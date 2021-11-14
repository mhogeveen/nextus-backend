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

