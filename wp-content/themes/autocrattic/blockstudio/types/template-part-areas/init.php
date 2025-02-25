<?php
// Path: wp-content/themes/autocrattic/blockstudio/types/template-part-areas/init.php

namespace Autocrattic\Types\TemplatePartAreas;

class Controller
{

    private $taxonomy = 'wp2_template_part_area';

    private $post_type = 'wp2_template_part';

    public function __construct()
    {

        add_action('init', [$this, 'register_taxonomy'], 11);
        add_action('admin_menu', [$this, 'add_submenu']);
    }


    /**
     * Registers the Template Part Areas taxonomy.
     */
    public function register_taxonomy()
    {
        $labels = [
            'name'              => _x('Template Part Areas', 'taxonomy general name', 'autocrattic'),
            'singular_name'     => _x('Template Part Area', 'taxonomy singular name', 'autocrattic'),
            'search_items'      => __('Search Template Part Areas', 'autocrattic'),
            'all_items'         => __('All Template Part Areas', 'autocrattic'),
            'parent_item'       => __('Parent Template Part Area', 'autocrattic'),
            'parent_item_colon' => __('Parent Template Part Area:', 'autocrattic'),
            'edit_item'         => __('Edit Template Part Area', 'autocrattic'),
            'update_item'       => __('Update Template Part Area', 'autocrattic'),
            'add_new_item'      => __('Add New Template Part Area', 'autocrattic'),
            'new_item_name'     => __('New Template Part Area Name', 'autocrattic'),
            'menu_name'         => __('Template Part Areas', 'autocrattic'),
        ];

        $args = [
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_in_menu'      => false,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rest_base'         => 'template-part-areas',
            'rest_namespace'    => 'wp2/v1',
            'rewrite'           => ['slug' => 'template-part-area'],
        ];

        register_taxonomy($this->taxonomy, [$this->post_type], $args);
    }


    public function add_submenu()
    {
        add_submenu_page(
            'themes.php',
            __('Template Part Areas', 'autocrattic'),
            __('Template Part Areas', 'autocrattic'),
            'edit_theme_options',
            'edit-tags.php?taxonomy=' . $this->taxonomy
        );
    }
}

new Controller();
