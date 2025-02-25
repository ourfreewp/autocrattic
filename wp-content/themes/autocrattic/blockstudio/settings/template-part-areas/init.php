<?php
// Path: wp-content/themes/autocrattic/blockstudio/settings/template-part-areas/init.php

namespace Autocrattic\Settings\TemplatePartAreas;

class Controller
{

    /**
     * Text domain for translations.
     *
     * @var string
     */
    private $text_domain = 'autocrattic';

    /**
     * Holds all template part definitions.
     *
     * @var array
     */
    private $template_parts = [];

    /**
     * Holds all template part area definitions.
     *
     * @var array
     */
    private $template_part_areas = [];

    /**
     * The taxonomy used to retrieve template parts/areas.
     *
     * @var string
     */
    private $taxonomy = 'wp2_template_part_area';

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->template_part_areas = $this->get_template_part_areas();
        // Preload template parts immediately.
        $this->template_parts = $this->get_template_parts();
    }


    public function init()
    {
        $this->template_part_areas = $this->get_template_part_areas();
        $this->template_parts = $this->get_template_parts();

        // Register filters early
        add_filter('default_wp_template_part_areas', [$this, 'filter_default_wp_template_part_areas'], 30);
        add_filter('wp_theme_json_data_theme', [$this, 'filter_theme_json_theme'], 30);
    }

    /**
     * Update theme.json data with template parts.
     *
     * @param object $theme_json
     * @return object
     */
    public function filter_theme_json_theme($theme_json)
    {
        $data = $theme_json->get_data();
        $data['version'] = 3;
        $data['templateParts'] = $this->template_parts;
        return $theme_json->update_with($data);
    }

    /**
     * Merge the default template part areas with our custom areas.
     * We now load custom areas on-demand to ensure taxonomy terms are available.
     *
     * @param array $default_area_definitions
     * @return array
     */
    public function filter_default_wp_template_part_areas($default_area_definitions)
    {
        // Lazy-load the custom areas.
        $custom_areas = $this->get_template_part_areas();

        // Append each custom area as a numerically indexed array item.
        foreach ($custom_areas as $area) {
            if (isset($area['area'])) {
                $default_area_definitions[] = array(
                    'area'        => $area['area'],
                    'area_tag'    => $area['area_tag'],
                    'label'       => $area['label'],
                    'description' => $area['description'],
                    'icon'        => $area['icon'],
                );
            }
        }

        return $default_area_definitions;
    }

    /**
     * Retrieves template part areas from taxonomy terms.
     * We explicitly set 'fields' => 'all' to ensure we get WP_Term objects.
     *
     * @return array
     */
    private function get_template_part_areas()
    {
        $terms = get_terms([
            'taxonomy'   => $this->taxonomy,
            'hide_empty' => false,
            'fields'     => 'all',
        ]);

        if (is_wp_error($terms)) {
            return [];
        }

        $template_part_areas = [];

        foreach ($terms as $term) {
            $template_part_areas[] = [
                'area'        => $term->slug,
                'area_tag'    => 'div',
                'label'       => $term->name,
                'description' => $term->description,
                'icon'        => 'layout',
            ];
        }

        return $template_part_areas;
    }

    /**
     * Retrieves template parts from the theme's parts folder.
     *
     * @return array
     */
    private function get_template_parts()
    {
        // Define the parts folder path inside the active theme.
        $parts_path = get_stylesheet_directory() . '/parts';

        // Return empty array if the directory doesn't exist.
        if (! is_dir($parts_path)) {
            return [];
        }

        // Retrieve all HTML files in the parts folder.
        $files = glob($parts_path . '/*.html');

        $template_parts = [];
        if ($files) {
            foreach ($files as $file) {
                // Get the filename without extension.
                $filename = basename($file);
                $slug = str_replace('.html', '', $filename);

                // Use the slug without the extension for parsing.
                $area = $this->get_area_by_part_slug($slug);

                $template_type = $this->get_template_type_by_part_slug($slug);

                $title = $this->generate_title($slug, $area, $template_type);

                $template_parts[] = [
                    'area'  => $area,
                    'name'  => $slug,
                    'title' => $title,
                ];
            }
        }
        return $template_parts;
    }

    /**
     * Converts a slug to a human-readable title.
     *
     * @param string $slug
     * @return string
     */
    private function generate_title($slug, $area, $template_type)
    {
        // Replace hyphens with spaces.
        $title = $template_type . ': ' . $area;

        $title = str_replace(['-', '_'], ' ', $title);

        $title = ucwords($title);

        $overrides = $this->check_for_overrides($title, $slug, $area, $template_type);

        if ($overrides) {
            $title = $overrides['title'];
        }

        return $title;
    }

    /**
     * Checks if the template part has an area name override.
     *
     * @param string $slug
     * @param string $area
     * @param string $template_type
     * @return string|false
     */
    private function check_for_overrides($title, $slug, $area, $template_type)
    {
        return [
            'area' => $area,
            'title' => $title,
        ];
    }

    /**
     * Retrieves the area for a given template part slug.
     *
     * @param string $slug
     * @return string
     */
    private function get_area_by_part_slug($slug)
    {
        // the slug is {area}-part-{template-type} and we need to return the area
        $parts = explode('-part-', $slug);
        return $parts[0];
    }

    /**
     * Retrieves the template type for a given template part slug.
     *
     * @param string $slug
     * @return string
     */
    private function get_template_type_by_part_slug($slug)
    {
        // the slug is {area}-part-{template-type} and we need to return the template type
        $parts = explode('-part-', $slug);
        return isset($parts[1]) ? $parts[1] : '';
    }
}

$controller = new Controller();
$controller->init();
