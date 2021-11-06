<?php defined('ABSPATH') || exit('Forbidden');

require_once(get_template_directory() . '/library/theme-init.php');
function nextus_setup()
{
}
add_action('after_setup_theme', 'nextus_setup');
