<?php
/**
 * Site footer: footer content, wp_footer() hook, and closing tags.
 *
 * @package cwl-starter
 */
?>
<footer class="site-footer">
<?php cwl_the_logo( 'footer' ); ?>
    <p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
</footer>

<?php wp_footer(); ?>
</body>
</html>