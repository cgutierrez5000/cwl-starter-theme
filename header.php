<?php
/**
 * Site header: document head, opening <body>, and the site header bar.
 *
 * @package cwl-starter
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <?php cwl_the_logo( 'header' ); ?>
        <!-- your <nav> block stays here -->
    </div>
</header>