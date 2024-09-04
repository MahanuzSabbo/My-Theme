<!-- Disply post 
 // get post
 //post author
 // post date
 //post content
 //post image
 // category 
 // Pagination-->
<section class="s-content">
    <div class="row masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>
            <?php
            // Custom query to get posts
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 10,
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $post_format = get_post_format(); // Get the post format
            ?>
                <article class="masonry__brick entry format-<?php echo esc_attr($post_format); ?>" data-aos="fade-up">
                    <div class="entry__thumb">
                        <?php if ($post_format == 'quote') : ?>
                            <blockquote>
                                <p><?php the_title(); // Display the quote text ?></p>
                                <cite><?php echo esc_html(get_post_meta(get_the_ID(), 'quote_author', true)); // Display the author ?></cite>
                            </blockquote>
                        <?php elseif ($post_format == 'image' || !$post_format) : ?>
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="entry__thumb-link">
                                    <?php the_post_thumbnail('large', ['class' => 'entry__thumb-image']); ?>
                                </a>
                            <?php endif; ?>
                        <?php elseif ($post_format == 'video') : ?>
                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'video_url', true)); ?>" data-lity>
                                <?php the_post_thumbnail('large', ['class' => 'entry__thumb-image']); ?>
                            </a>
                        <?php elseif ($post_format == 'gallery') : ?>
                            <div class="gallery">
                                <?php
                                $gallery_images = get_post_meta(get_the_ID(), 'gallery_images', true);
                                if ($gallery_images) {
                                    $image_ids = explode(',', $gallery_images); // Split the IDs into an array
                                    foreach ($image_ids as $image_id) {
                                        $image_id = trim($image_id); // Trim any extra spaces
                                        if ($image_id) {
                                            echo '<div class="gallery__item">';
                                            echo wp_get_attachment_image($image_id, 'large'); // Display the image
                                            echo '</div>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        <?php elseif ($post_format == 'audio') : ?>
                            <a href="<?php the_permalink(); ?>" class="entry__thumb-link">
                                <?php the_post_thumbnail('large', ['class' => 'entry__thumb-image']); ?>
                            </a>
                            <div class="audio-wrap">
                                <audio id="player" src="<?php echo esc_url(get_post_meta(get_the_ID(), 'audio_url', true)); ?>" width="100%" height="42" controls></audio>
                            </div>
                        <?php elseif ($post_format == 'link') : ?>
                            <div class="link-wrap">
                                <p><?php the_title(); // Display the link text ?></p>
                                <cite>
                                    <a target="_blank" href="<?php echo esc_url(get_post_meta(get_the_ID(), 'link_url', true)); ?>">
                                        <?php echo esc_url(get_post_meta(get_the_ID(), 'link_url', true)); ?>
                                    </a>
                                </cite>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($post_format != 'quote') : // Only show this section if it's not a quote post ?>
                        <div class="entry__text">
                            <div class="entry__header">
                                <div class="entry__date">
                                    <a href="<?php the_permalink(); ?>"><?php the_time('F j, Y'); ?></a>
                                </div>
                                <h1 class="entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            </div>
                            <div class="entry__excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="entry__meta">
                                <span class="entry__meta-links">
                                    <?php
                                    $categories = get_the_category();
                                    $cat_list = '';
                                    foreach ($categories as $category) {
                                        $cat_list .= '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->cat_name) . '</a> ';
                                    }
                                    echo trim($cat_list); // Remove trailing space
                                    ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                </article>
            <?php
                endwhile;
            else:
                echo '<p>' . esc_html__('No posts found.', 'Philosopy') . '</p>';
            endif;

            wp_reset_postdata();
            ?>
        </div>
    </div>
<!-- ================================Pagination===========================-->
    <div class="row">
        <div class="col-full">
        <nav class="pgn">
            <!-- // Pagination -->
             <ul class="pgn__prev">
            <?php
            the_posts_pagination( array(
                "screen_reader_text" => ' ',
                "prev_text"          => "New Posts",
                "next_text"          => "Old Posts"

            ) );
            echo the_posts_pagination();
            ?>
            </ul>
            </nav>
        </div>
    </div>
<!-- ================================Pagination===========================-->
</section>