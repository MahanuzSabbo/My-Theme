<!-- Header -->
<?php  get_header();?>

<!-- Post  -->
<?php   get_template_part( 'templates/Blog/blog'); ?>

<!-- Post details -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<article class="row format-standard <?php the_ID(); ?>" <?php post_class(); ?>>
<div class="s-content__header col-full"></div>
<!-- Post Title -->
    <h1 class="s-content__header-title">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h1>
    <ul class="s-content__header-meta">
    By <?php the_author_posts_link(); ?>
<li class="date"><?php echo get_the_date(); ?></li>
<li>
In
<!-- Post Category -->
<a href="#0"><?php the_category(','); ?></a>
<!-- <a href="#0">Travel</a> -->
</li>
</ul>
<div class="s-content__media col-full">
    <div class="s-content__post-thumb">
        <img src="images/thumbs/single/standard/standard-1000.jpg" srcset="images/thumbs/single/standard/standard-2000.jpg 2000w,
                                    images/thumbs/single/standard/standard-1000.jpg 1000w,
                                    images/thumbs/single/standard/standard-500.jpg 500w" sizes="(max-width: 2000px) 100vw, 2000px" alt>
    </div>
</div> 

<div class="col-full s-content__main">
<p class="lead">
    <!-- not working -->
   <!-- for full content -->
         <?php the_content(); ?></p>
         <!-- Images -->
         <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('full'); ?>
            </a>
            <?php endif; ?>
<img src="images/wheel-1000.jpg" srcset="images/wheel-2000.jpg 2000w, images/wheel-1000.jpg 1000w, images/wheel-500.jpg 500w" sizes="(max-width: 2000px) 100vw, 2000px" alt>

<p class="s-content__tags">
<span>Post Tags</span>
<!-- Post tags -->
<span class="s-content__tag-list"><?php the_tags('','',''); ?>
</span>
</p> 

<?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no post found.', 'philosophy' ); ?></p>
        <?php endif; ?>

<?php get_header(); ?>


<div class="s-content__author">
<img src="images/avatars/user-03.jpg" alt>
<div class="s-content__author-about">
<h4 class="s-content__author-name">
<a href="#0"><?php the_author( );?> </a>
</h4>
<?php echo get_the_author_meta('description'); ?>
<p>Email: <?php echo get_the_author_meta('user_email'); ?></p>
<p>Website: <a href="<?php echo get_the_author_meta('user_url'); ?>"><?php echo get_the_author_meta('user_url'); ?></a></p>
<?php
    // Get author ID
    $author_id = get_the_author_meta('ID');

    // Get social media URLs
    $facebook = get_the_author_meta('facebook', $author_id);
    $twitter = get_the_author_meta('twitter', $author_id);
    $instagram = get_the_author_meta('instagram', $author_id);
    $google_plus = get_the_author_meta('google_plus', $author_id); // Deprecated, but you can still display it

    // Display social media links if they exist
    if ($facebook || $twitter || $instagram || $google_plus) {
        echo 'ul class="s-content__author-social">';
        if ($facebook) {
            echo '<li><a href="' . esc_url($facebook) . '" target="_blank">Facebook</a></li>';
        }
        if ($twitter) {
            echo '<li><a href="' . esc_url($twitter) . '" target="_blank">Twitter</a></li>';
        }
        if ($instagram) {
            echo '<li><a href="' . esc_url($instagram) . '" target="_blank">Instagram</a></li>';
        }
        if ($google_plus) {
            echo '<li><a href="' . esc_url($google_plus) . '" target="_blank">Google+</a></li>';
        }
        echo '</div>';
        
    }
else {echo 'no social media id';}
?>
</div>
</div>

<div class="s-content__pagenav">
<div class="s-content__nav">
<div class="s-content__prev">
<a href="#0" rel="prev">
<span>Previous Post</span>
Tips on Minimalist Design
</a>
</div>
<div class="s-content__next">
<a href="#0" rel="next">
<span>Next Post</span>
Less Is More
</a>
</div>
</div>
</div> 
</div> 
</article>




<!-- post comments & reply -->
<?php   get_template_part( 'templates/partials/comments'); ?>
 <!-- Popular Post, About-Philosophy ,Tags  -->
 <?php   get_template_part( 'templates/partials/popular-content'); ?>

<!-- // Footer -->
<?php get_footer(); ?>
