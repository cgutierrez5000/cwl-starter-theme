<?php

/**
 * Process block template: a heading plus numbered steps on a navy background.
 *
 * @package cwl-starter
 */

if (! defined('ABSPATH')) {
    exit; // Block direct access to this file.
}

$eyebrow = get_field('eyebrow');
$heading = get_field('heading');
$intro   = get_field('intro');

// has-navy-background gives the section its dark colors and switches the eyebrow to the lighter orange.
$wrapper_attributes = get_block_wrapper_attributes(array('class' => 'cwl-process section has-navy-background'));
?>
<section <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). 
            ?>>
    <div class="container">
        <?php if ($eyebrow) : ?>
            <p class="eyebrow"><?php echo esc_html($eyebrow); ?></p>
        <?php endif; ?>

        <?php if ($heading) : ?>
            <h2><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>

        <?php if ($intro) : ?>
            <p class="lead"><?php echo esc_html($intro); ?></p>
        <?php endif; ?>

        <?php if (have_rows('steps')) : ?>
            <ol class="grid cwl-process__list">
                <?php
                $number = 0; // Counts the steps so the numbers never need to be typed.
                while (have_rows('steps')) :
                    the_row();
                    ++$number;

                    $title = get_sub_field('title');
                    $text  = get_sub_field('text');
                ?>
                    <li class="cwl-process__step">
                        <span class="cwl-process__number">
                            <?php echo esc_html(sprintf('%02d', $number)); // 01, 02, 03... 
                            ?>
                        </span>

                        <?php if ($title) : ?>
                            <h3><?php echo esc_html($title); ?></h3>
                        <?php endif; ?>

                        <?php if ($text) : ?>
                            <p><?php echo esc_html($text); ?></p>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ol>
        <?php endif; ?>
    </div>
</section>