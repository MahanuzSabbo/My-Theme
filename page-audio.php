<?php
// Query audio format posts
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 10, // Number of posts to show
    'tax_query' => array(
        array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-audio'),
        ),
    ),
);
$audio_posts = new WP_Query($args);

if ($audio_posts->have_posts()) :
    while ($audio_posts->have_posts()) : $audio_posts->the_post();
        // Display the audio post content
        ?>
        <article class="row format-audio">
            <div class="s-content__header col-full">
                <h1 class="s-content__header-title"><?php the_title(); ?></h1>
                <ul class="s-content__header-meta">
                    <li class="date"><?php echo get_the_date(); ?></li>
                    <li class="cat">In <?php the_category(', '); ?></li>
                </ul>
            </div>
            <div class="s-content__media col-full">
                <div class="audio-container">
                    <?php 
                    // If an audio embed is available, display it
                    if (has_post_format('audio')) {
                        the_content(); // Assuming the audio is embedded in the post content
                    }
                    ?>
                </div>
            </div>
            <div class="col-full s-content__main">
                <?php the_excerpt(); // Display excerpt ?>
            </div>
        </article>
        <?php
    endwhile;
    wp_reset_postdata();
else :
    echo '<p>No audio posts found.</p>';
endif;
?>
