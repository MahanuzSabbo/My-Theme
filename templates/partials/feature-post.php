       
        <?php
// Arguments for WP_Query
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'meta_key'       => 'featured',
    'meta_value'     => '1',
    'orderby'       => 'date',
    'order'         => 'DESC',
    'paged'         => get_query_var('paged') ? get_query_var('paged') : 1,
);

// Custom Query
$query = new WP_Query($args);
?>

<div class="pageheader-content row">
    <div class="col-full">
        <div class="featured">
            <?php
            // Check if the query has posts
            if ($query->have_posts()) :
                // Start the loop for the big featured post
                if ($query->post_count > 0) :
                    $query->the_post(); // Get the first post
                    ?>
                    <div class="featured__column featured__column--big">
                        <div class="entry" style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>');">
                            <div class="entry__content">
                                <span class="entry__category">
                                    <?php the_category(', '); ?>
                                </span>
                                <h1>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h1>
                                <div class="entry__info">
                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="entry__profile-pic">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                                    </a>
                                    <ul class="entry__meta">
                                        <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></li>
                                        <li><?php echo get_the_date(); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endif;

                // Start the loop for the small featured posts
                if ($query->post_count > 1) :
                    ?>
                    <div class="featured__column featured__column--small">
                        <?php
                        // Reset post data to loop through the rest
                        $query->rewind_posts();

                        // Skip the first post and loop through the remaining
                        while ($query->have_posts()) : $query->the_post();
                            // Only display small featured posts
                            if ($query->current_post !== 0) :
                                ?>
                                <div class="entry" style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>');">
                                    <div class="entry__content">
                                        <span class="entry__category">
                                            <?php the_category(', '); ?>
                                        </span>
                                        <h1>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h1>
                                        <div class="entry__info">
                                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="entry__profile-pic">
                                                <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                                            </a>
                                            <ul class="entry__meta">
                                                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></li>
                                                <li><?php echo get_the_date(); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endif;
                        endwhile;
                        ?>
                    </div>
                <?php
                endif;
            else :
                // Display a message if no posts are found
                echo '<p>No posts found.</p>';
            endif;

            // Reset post data
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
 <!-- featured post  -->
<?php 

// No need for get_footer() here since it's included in the parent template
