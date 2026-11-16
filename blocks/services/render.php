<?php

/**
 * Services block template: a heading plus a grid of cards.
 *
 * @package cwl-starter
 */

if (! defined('ABSPATH')) {
    exit; // Block direct access to this file.
}

$eyebrow = get_field('eyebrow');
$heading = get_field('heading');
$intro   = get_field('intro');

$wrapper_attributes = get_block_wrapper_attributes(array('class' => 'cwl-services section'));
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

        <?php // have_rows() is true while the repeater has rows left; the_row() moves to the next one. 
        ?>
        <?php if (have_rows('cards')) : ?>
            <div class="grid cwl-services__grid">
                <?php
                while (have_rows('cards')) :
                    the_row();

                    // get_sub_field() reads a field inside the current repeater row.
                    $title       = get_sub_field('title');
                    $text        = get_sub_field('text');
                    $highlighted = get_sub_field('highlighted');

                    // Add a modifier class for the featured card.
                    $card_class = $highlighted ? 'card card--highlight' : 'card';
                ?>
                    <article class="<?php echo esc_attr($card_class); ?>">
                        <?php if ($title) : ?>
                            <h3><?php echo esc_html($title); ?></h3>
                        <?php endif; ?>

                        <?php if ($text) : ?>
                            <p><?php echo esc_html($text); ?></p>
                        <?php endif; ?>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>