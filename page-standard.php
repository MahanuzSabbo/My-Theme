<?php
/**
 * Template Name: Standard Posts
 */

get_header(); ?>

<div class="s-content">
    <h2>Standard Posts</h2>
    <div class="row narrow">
        <?php
        $standard_posts = new WP_Query(array(
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_format',
                    'field'    => 'slug',
                    'terms'    => array(
                        'post-format-audio',
                        'post-format-video',
                        'post-format-gallery',
                    ),
                    'operator' => 'NOT IN',
                ),
            ),
            'posts_per_page' => 10,
        ));

        if ($standard_posts->have_posts()) :
            while ($standard_posts->have_posts()) : $standard_posts->the_post();
                ?>
                <div class="col-full s-content__header" data-aos="fade-up">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="lead"><?php the_excerpt(); ?></p>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No standard posts found.</p>';
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
