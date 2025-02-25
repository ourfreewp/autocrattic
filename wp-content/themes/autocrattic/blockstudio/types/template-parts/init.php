<?php
// Path: wp-content/themes/autocrattic/blockstudio/types/template-parts/init.php

namespace Autocrattic\Types\TemplateParts;

class Controller
{
    private $post_type = 'wp2_template_part';

    private $taxonomies = ['wp2_template_part_area', 'wp2_template_type'];

    public function __construct()
    {
        add_action('init', [$this, 'register_post_type'], 10);
    }

    /**
     * Registers the Template Part custom post type.
     */
    public function register_post_type()
    {
        $labels = [
            'name'               => _x('Template Parts', 'post type general name', 'autocrattic'),
            'singular_name'      => _x('Template Part', 'post type singular name', 'autocrattic'),
            'menu_name'          => _x('Template Parts', 'admin menu', 'autocrattic'),
            'name_admin_bar'     => _x('Template Part', 'add new on admin bar', 'autocrattic'),
            'add_new'            => __('Add New', 'autocrattic'),
            'add_new_item'       => __('Add New Template Part', 'autocrattic'),
            'new_item'           => __('New Template Part', 'autocrattic'),
            'edit_item'          => __('Edit Template Part', 'autocrattic'),
            'view_item'          => __('View Template Part', 'autocrattic'),
            'all_items'          => __('All Template Parts', 'autocrattic'),
            'search_items'       => __('Search Template Parts', 'autocrattic'),
            'parent_item_colon'  => __('Parent Template Parts:', 'autocrattic'),
            'not_found'          => __('No template parts found.', 'autocrattic'),
            'not_found_in_trash' => __('No template parts found in Trash.', 'autocrattic'),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => false,
            'show_ui'            => false,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'template-part'],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => ['title', 'editor', 'thumbnail'],
            'show_in_rest'       => true,
            'rest_base'          => 'template-parts',
            'rest_namespace'     => 'wp2/v1',
            'taxonomies'         => $this->taxonomies,
        ];

        register_post_type($this->post_type, $args);
    }
}

new Controller();
