<?php
/**
 * Template Name: Categories Page 
 */

// Include header from partials
?>



<!-- Header -->
<?php   get_header();?>

<!--  category post -->
<?php   get_template_part( 'templates/partials/category-post'); ?>



<!-- content-mesonry post -->
<?php   get_template_part( 'templates/partials/content-mesonry'); ?>
 <!-- // Popular Post, About-Philosophy ,Tags -->
 <?php   get_template_part( 'templates/partials/popular-content'); ?>
 <!-- footer  -->
<?php 
  get_footer( );
  ?>