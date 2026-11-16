<?php

/**
 * Block loader: registers every block found in /blocks.
 * To add a block, add a folder with a block.json. No other code changes are needed.
 *
 * @package cwl-starter
 */

if (! defined('ABSPATH')) {
    exit; // Block direct access to this file.
}

/**
 * Register each block that has a block.json inside the blocks folder.
 */
function cwl_register_blocks()
{
    // glob() returns the full path of every block.json one level down: blocks/hero/block.json, etc.
    $files = glob(get_template_directory() . '/blocks/*/block.json');

    // glob() returns false on error, so make sure we have an array before looping.
    if (! is_array($files)) {
        return;
    }

    foreach ($files as $file) {
        // register_block_type() accepts the folder that holds block.json.
        register_block_type(dirname($file));
    }
}
add_action('init', 'cwl_register_blocks');
