<?php
/**
 * Template Name: Home 
 */

// Include header from partials
?>
<!--Footer-->
<?php get_header();?>


<!-- Featured post -->
<?php   get_template_part( 'templates/partials/feature-post'); ?>
<!-- Content post -->
<?php   get_template_part( 'templates/partials/content-mesonry'); ?>



 <!-- // Popular Post, About-Philosophy ,Tags -->
<?php   get_template_part( 'templates/partials/popular-content'); ?>

<!--Footer-->
<?php get_footer(); ?>