<?php
// Path: wp-content/themes/autocrattic/blockstudio/types/template-types/init.php

namespace Autocrattic\Types\TemplateTypes;

class Controller
{

    private $taxonomy = 'wp2_template_type';

    private $post_type = 'wp2_template_part';

    public function __construct()
    {
        add_action('init', [$this, 'register_taxonomy'], 11);
        add_action('admin_menu', [$this, 'add_submenu']);
    }

    /**
     * Registers the Template Types taxonomy.
     */
    public function register_taxonomy()
    {
        $labels = [
            'name'              => _x('Template Types', 'taxonomy general name', 'autocrattic'),
            'singular_name'     => _x('Template Type', 'taxonomy singular name', 'autocrattic'),
            'search_items'      => __('Search Template Types', 'autocrattic'),
            'all_items'         => __('All Template Types', 'autocrattic'),
            'parent_item'       => __('Parent Template Type', 'autocrattic'),
            'parent_item_colon' => __('Parent Template Type:', 'autocrattic'),
            'edit_item'         => __('Edit Template Type', 'autocrattic'),
            'update_item'       => __('Update Template Type', 'autocrattic'),
            'add_new_item'      => __('Add New Template Type', 'autocrattic'),
            'new_item_name'     => __('New Template Type Name', 'autocrattic'),
            'menu_name'         => __('Template Types', 'autocrattic'),
        ];

        $args = [
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rest_base'         => 'template-types',
            'rest_namespace'    => 'wp2/v1',
            'rewrite'           => ['slug' => 'template-type'],
        ];

        register_taxonomy('wp2_template_type', ['wp2_template_part'], $args);
    }

    public function add_submenu()
    {
        add_submenu_page(
            'themes.php',
            __('Template Types', 'autocrattic'),
            __('Template Types', 'autocrattic'),
            'edit_theme_options',
            'edit-tags.php?taxonomy=' . $this->taxonomy
        );
    }
}

new Controller();
