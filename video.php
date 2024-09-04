<?php
/**
 * Template Name: blog
 */

// Include header from partials
?>



<!--Footer-->
<?php get_header();?>



<div class="s-content">
    <?php
    // List of post formats
    $formats = array('audio', 'video', 'gallery');

    foreach ($formats as $format) :
        // Display format name in a readable format
        $format_name = ucfirst($format); // Capitalize the first letter
        ?>
        <h2><?php echo esc_html($format_name) . ' Posts'; ?></h2>
        <div class="row narrow">
            <?php
            $format_posts = new WP_Query(array(
                'post_format' => 'post-format-' . $format,
                'posts_per_page' => 5,
            ));

            if ($format_posts->have_posts()) :
                while ($format_posts->have_posts()) : $format_posts->the_post();
                    ?>
                    <div class="col-full s-content__header" data-aos="fade-up">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="lead"><?php the_excerpt(); ?></p>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No ' . esc_html($format_name) . ' posts found.</p>';
            endif;
            ?>
        </div>
    <?php
    endforeach;

    // Query for Standard Posts (no specific format)
    ?>
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
                        // Add other formats you want to exclude
                    ),
                    'operator' => 'NOT IN',
                ),
            ),
            'posts_per_page' => 5,
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
















 <!-- // Popular Post, About-Philosophy ,Tags -->
<?php   get_template_part( 'templates/partials/popular-content'); ?>

<!--Footer-->
<?php get_footer(); ?>