<?php defined('ABSPATH') || exit('Forbidden');

function nextus_setup()
{
  foreach (glob(get_template_directory() . '/library/theme/*.php') as $filename) {
    require_once $filename;
  }
}
add_action('after_setup_theme', 'nextus_setup');
