<?php
/**
 * Template Name: Video Posts
 */

get_header(); ?>

<div class="s-content s-content--narrow s-content--no-padding-bottom">
    <?php
    // Query for posts with video content
$video_posts = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 10, // Adjust the number of posts displayed
        'tax_query'      => array(
            array(
                'taxonomy' => 'post_format',
                'field'    => 'slug',
                'terms'    => 'post-format-video', // Only fetch video posts
            ),
        ),
    ));
if ($video_posts->have_posts()) :
        while ($video_posts->have_posts()) : $video_posts->the_post();
            ?>
            <article class="row format-video">
                <div class="s-content__header col-full">
                    <h1 class="s-content__header-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h1>
                    <ul class="s-content__header-meta">
                        <li class="date"><?php echo get_the_date(); ?> </li>
                          <a href="#0"><?php the_category(','); ?></a>
                          </ul>
                    </div>
                    <div class="col-full s-content__main">
                    <p class="lead">

                    <?php the_content(); // Display the video content ?>
                        </p>
                     
                        <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No video posts found.</p>';
    endif;
    ?> </ul>
    <p class="s-content__tags">
<span>Post Tags</span>
<span class="s-content__tag-list">
<?php the_tags('',''); ?>
</span>
</p>
<div class="s-content__author">
    <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php the_author(); ?>">
    <div class="s-content__author-about">
        <h4 class="s-content__author-name">
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
        </h4>
        <p><?php echo get_the_author_meta('description'); ?></p>
        <ul class="s-content__author-social">
            <?php if (get_the_author_meta('facebook')) : ?>
                <li><a href="<?php echo esc_url(get_the_author_meta('facebook')); ?>">Facebook</a></li>
            <?php endif; ?>
            <?php if (get_the_author_meta('twitter')) : ?>
                <li><a href="<?php echo esc_url(get_the_author_meta('twitter')); ?>">Twitter</a></li>
            <?php endif; ?>
            <?php if (get_the_author_meta('googleplus')) : ?>
                <li><a href="<?php echo esc_url(get_the_author_meta('googleplus')); ?>">GooglePlus</a></li>
            <?php endif; ?>
            <?php if (get_the_author_meta('instagram')) : ?>
                <li><a href="<?php echo esc_url(get_the_author_meta('instagram')); ?>">Instagram</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<div class="s-content__pagenav">
    <div class="s-content__nav">
        <div class="s-content__prev">
            <?php previous_post_link('%link', '<span>Previous Post</span>%title'); ?>
        </div>
        <div class="s-content__next">
            <?php next_post_link('%link', '<span>Next Post</span>%title'); ?>
        </div>
    </div>
</div>

<div class="s-content__tags">
    <?php the_tags('<ul class="s-content__tags-list"><li>', '</li><li>', '</li></ul>'); ?>
</div>


                </div> <!-- s-content__header -->
                </div> 
    </article>
</div> <!-- s-content -->

<!-- Comments part -->
<?php get_template_part('templates/partials/comments'); ?>

<!-- Popular Post, About-Philosophy, Tags -->
<?php get_template_part('templates/partials/popular-content'); ?>

<!-- Footer -->
<?php get_footer(); ?>
