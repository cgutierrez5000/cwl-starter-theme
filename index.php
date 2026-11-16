<?php
/**
 * Fallback template. Used for any page without a more specific template.
 *
 * @package cwl-starter
 */

get_header();
?>

<main>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?>>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_content(); ?>
    </article>
<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>