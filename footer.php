<?php

/**
 * Site footer: footer content, wp_footer() hook, and closing tags.
 *
 * @package cwl-starter
 */
?>
<footer class="site-footer">
    <div class="container">
        <?php cwl_the_logo('footer'); ?>
        <p>&copy; <?php echo esc_html(gmdate('Y')); ?> <?php bloginfo('name'); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>