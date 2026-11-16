<?php

/**
 * Hero block template.
 *
 * Variables ACF gives this file: $block (settings), $is_preview (true in the editor).
 *
 * @package cwl-starter
 */

if (! defined('ABSPATH')) {
    exit; // Block direct access to this file.
}

// Adds the block's classes and any anchor (id) the editor set, safely escaped by WordPress.
$wrapper_attributes = get_block_wrapper_attributes(array('class' => 'cwl-hero section has-navy-background'));
?>
<section <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). 
            ?>>
    <div class="container">
        <p class="eyebrow">Eyebrow text</p>
        <h1>Hero heading goes here</h1>
        <p class="lead">A short introduction that explains what you do.</p>
        <p>
            <a class="btn btn--accent" href="#">Start a project</a>
            <a class="btn btn--outline" href="#">See selected work</a>
        </p>
    </div>
</section>