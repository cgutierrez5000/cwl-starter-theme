<?php

/**
 * Hero block template.
 *
 * @package cwl-starter
 */

if (! defined('ABSPATH')) {
    exit; // Block direct access to this file.
}

// Read the fields. get_field() returns null or an empty string when a field is empty.
$eyebrow   = get_field('eyebrow');
$heading   = get_field('heading');
$highlight = get_field('heading_highlight');
$intro     = get_field('intro');

// In the editor, show placeholders so an empty block isn't invisible.
if (! empty($is_preview) && empty($heading)) {
    $heading = __('Hero heading goes here', 'cwl-starter');
}

$wrapper_attributes = get_block_wrapper_attributes(array('class' => 'cwl-hero section has-navy-background'));
?>
<section <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). 
            ?>>
    <div class="container">
        <?php if ($eyebrow) : ?>
            <p class="eyebrow"><?php echo esc_html($eyebrow); ?></p>
        <?php endif; ?>

        <?php if ($heading) : ?>
            <h1>
                <?php echo esc_html($heading); ?>
                <?php if ($highlight) : ?>
                    <span class="cwl-hero__highlight"><?php echo esc_html($highlight); ?></span>
                <?php endif; ?>
            </h1>
        <?php endif; ?>

        <?php if ($intro) : ?>
            <p class="lead"><?php echo esc_html($intro); ?></p>
        <?php endif; ?>

        <p>
            <?php cwl_the_button(get_field('button_primary'), 'accent'); ?>
            <?php cwl_the_button(get_field('button_secondary'), 'outline'); ?>
        </p>
    </div>
</section>