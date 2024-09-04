<?php
/**
 * Template Name: Gallery Posts
 */

get_header(); ?>

<div class="s-content">
    <h2>Gallery Posts</h2>
    <div class="row narrow">
        <?php
        $gallery_posts = new WP_Query(array(
            'post_format' => 'post-format-gallery',
            'posts_per_page' => 10,
        ));

        if ($gallery_posts->have_posts()) :
            while ($gallery_posts->have_posts()) : $gallery_posts->the_post();
                ?>
                <div class="col-full s-content__header" data-aos="fade-up">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php
                    // Get gallery images
                    $gallery = get_post_gallery(get_the_ID(), false);
                    if ($gallery) {
                        $gallery_ids = explode(',', $gallery['ids']);
                        foreach ($gallery_ids as $id) {
                            echo wp_get_attachment_image($id, 'medium');
                        }
                    }
                    ?>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No gallery posts found.</p>';
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
