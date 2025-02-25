<?php

/**
 * Plugin Name: Autocrattic
 * Plugin URI:
 * Description: Autocrattic
 * Version: 1.0
 * Author: Autocrattic
 * Author URI: https://autocrattic.com
 */


// Prevent direct access to the file.

defined('ABSPATH') || exit;

add_action('init', function () {

    if (defined("BLOCKSTUDIO")) {

        $paths = [
            plugin_dir_path(__FILE__) . 'src/Blocks/Types',
        ];

        foreach ($paths as $path) {

            Blockstudio\Build::init([
                'dir'    => $path
            ]);
        }
    };
});
