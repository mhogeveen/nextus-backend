<?php

namespace NextusBackend\library\classes;

defined('ABSPATH') || exit('Forbidden');

/**
 * 
 * @package NextusBackend
 * 
 * @param   string  $type           The singular type name of the post type.
 * @param   string  $slug           The plural name of the post type.
 * @param   string  $singular_name  The singluar name of the post type.
 * @param   string  $name           The plural name of the post type.
 * @param   array   $custom_args    An array of custom args.
 * 
 * @return  void
 * 
 * @author Maarten Hogeveen
 */

class PostType
{
  public function __construct(
    string $type = '',
    ?string $slug = null,
    ?string $singular_name = null,
    ?string $name = null,
    ?array $custom_args = []
  ) {
    $this->type = $type;
    $this->slug = $slug ?: $type . 's';
    $this->singular_name = $singular_name ?: ucfirst($type);
    $this->name = $name ?: ucfirst($type) . 's';
    $this->custom_args = $custom_args;

    // Register the post type
    add_action('init', [$this, 'register']);
  }

  public function register()
  {
    $labels = [
      'name'                  => $this->name,
      'singular_name'         => $this->singular_name,
      'add_new'               => __('Add New', 'nextus'),
      'add_new_item'          => __('Add New', 'nextus') . ' ' . $this->singular_name,
      'edit_item'             => __('Edit', 'nextus') . ' ' . $this->singular_name,
      'new_item'              => __('New', 'nextus') . ' ' . $this->singular_name,
      'all_items'             => __('All', 'nextus') . ' ' . $this->name,
      'view_item'             => __('View', 'nextus') . ' ' . $this->name,
      'search_items'          => __('Search', 'nextus') . ' ' . $this->name,
      'not_found'             => __('No', 'nextus') . ' ' . strtolower($this->name) . ' ' . __('found', 'nextus'),
      'not_found_in_trash'    => __('No', 'nextus') . ' ' . strtolower($this->name) . ' ' . __('found in trash', 'nextus'),
      'parent_item_colon'     => __('Parent', 'nextus') . ' ' . strtolower($this->singular_name),
      'menu_name'             => $this->name
    ];

    $args = [
      'labels'                => $labels,
      'public'                => true,
      'publicly_queryable'    => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'show_in_rest'          => true,
      'query_var'             => true,
      'rewrite'               => ['slug' => $this->slug],
      'capability_type'       => 'post',
      'has_archive'           => true,
      'hierarchical'          => true,
      'menu_position'         => 20,
      'menu_icon'             => 'dashicons-megaphone',
      'supports'              => ['title', 'editor', 'excerpt', 'author', 'thumbnail', 'page-attributes']
    ];

    $args = array_merge($args, $this->custom_args);

    register_post_type($this->type, $args);
  }
}
