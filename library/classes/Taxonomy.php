<?php

namespace NextusBackend\library\classes;

defined('ABSPATH') || exit('Forbidden');

/**
 * 
 * @package NextusBackend
 * 
 * @param   string  $taxonomy       The plural name of the taxonomy.
 * @param   string  $singular_name  The singular name of the taxonomy.
 * @param   array   $object_types   The object types with which the taxonomy should be associated.
 * 
 * @return  void
 * 
 * @author Maarten Hogeveen
 */

class Taxonomy
{
  public function __construct(
    string $name = '',
    string $singular_name = '',
    array $object_type = [],
    array $args = []
  ) {
    $this->taxonomy = strlen($name) > 32 ? $name : substr($name, 0, 31);
    $this->singular_name = $singular_name ?: $name . 's';
    $this->object_type = $object_type ?: '';
    $this->args = $args;

    add_action('init', [$this, 'register']);
  }

  public function register()
  {
    $labels = [
      'name'                  => ucfirst($this->taxonomy),
      'singular_name'         => ucfirst($this->singular_name),
      'add_new'               => __('Add New', 'nextus'),
      'add_new_item'          => __('Add New', 'nextus') . ' ' . $this->singular_name,
      'edit_item'             => __('Edit', 'nextus') . ' ' . $this->singular_name,
      'new_item'              => __('New', 'nextus') . ' ' . $this->singular_name,
      'all_items'             => __('All', 'nextus') . ' ' . $this->taxonomy,
      'view_item'             => __('View', 'nextus') . ' ' . $this->taxonomy,
      'search_items'          => __('Search', 'nextus') . ' ' . $this->taxonomy,
      'not_found'             => __('No', 'nextus') . ' ' . strtolower($this->taxonomy) . ' ' . __('found', 'nextus'),
      'not_found_in_trash'    => __('No', 'nextus') . ' ' . strtolower($this->taxonomy) . ' ' . __('found in trash', 'nextus'),
      'parent_item_colon'     => __('Parent', 'nextus') . ' ' . strtolower($this->singular_name),
      'menu_name'             => ucfirst($this->taxonomy)
    ];

    $args = [
      'labels' => $labels,
      'public' => true,
      'hierarchical' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
    ];

    $args = array_merge($args, $this->args);

    register_taxonomy($this->taxonomy, $this->object_type, $args);
  }
}
