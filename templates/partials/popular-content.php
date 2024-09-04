
 <!-- // Popular Post 
 // About Philosophy
 // Tags -->

<section class="s-extra">
    <div class="row top">
        <div class="col-eight md-six tab-full popular">
<!--==============================Popular Post============================ -->
            <h3>Popular Posts</h3>
                <div class="block-1-2 block-m-full popular__posts">
                        <?php
                        // Define query parameters based on criteria
                                $args = array(
                                    'post_type'      => 'post',
                                    'posts_per_page' => 7,
                                    'orderby'       => 'comment_count',
                                    'order'         => 'DESC',
                                );
                        $popular_posts = new WP_Query($args);
                                if ($popular_posts->have_posts()) :
                                        while ($popular_posts->have_posts()) : $popular_posts->the_post();
                                            $post_format = get_post_format(); // Get the post format
                                            // Skip posts with 'quote' post format
                                            if ($post_format == 'quote') {
                                                continue;
                                            }
                        ?>
        <article class="col-block popular__post format-<?php echo esc_attr($post_format); ?>">
            <a href="<?php the_permalink(); ?>" class="popular__thumb">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail', array('class' => 'popular__thumb-image')); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . ''); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="popular__thumb-image">
                            <?php endif; ?>
            </a>
            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <section class="popular__meta">
                             <span class="popular__author"><span>By</span> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></span>
                             <span class="popular__date"><span>on</span> <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time></span>
                </section>
        </article>
                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else :
                                    echo '<p>No popular posts found.</p>';
                                endif;
                        ?>
                </div>
        </div>
<!--==============================Popular Post============================ -->

<!-- about  philosopy and social icon-->
        <div class="col-four md-six tab-full about">
            <h3><?php echo esc_html( get_theme_mod( 'about_text_head', '' ) ); ?></h3>
                    <p> <?php echo esc_html( get_theme_mod( 'about_paragraph', '' ) ); ?></p>
                                <ul class="about__social">
                                          <?php 
                                                $social_networks = array(
                                                    'facebook'  => 'fa-facebook',
                                                    'twitter'   => 'fa-twitter',
                                                    'instagram' => 'fa-instagram',
                                                    'pinterest' => 'fa-pinterest',
                                                );

                                foreach ($social_networks as $network => $icon) {
                                        $url = esc_url(get_theme_mod("{$network}_url", '#'));
                                                    if ($url !== '#') : ?>
                                                        <li><a href="<?php echo $url; ?>"><i class="fa <?php echo $icon; ?>" aria-hidden="true"></i></a></li>
                        <?php endif;
                                        } ?>
                                </ul>
        </div>
<!-- about philosophy and social icons -->
        

    <!--=========================Tags======================-->
        <div class="row bottom tags-wrap">
            <div class="col-full tags">
                <h3>Tags</h3>
                    <div class="tagcloud">
                            <?php wp_tag_cloud( array(
                                // 'smallest' => // Smallest font size (in pt)
                                // /'largest'  =>  // Largest font size (in pt)
                                'unit'     => '', // Font size unit (pt, em, etc.)
                                'number'   => 45, // Number of tags to display
                                'format'   => 'flat', // Display format (flat, list, or array)
                                'separator'=> ' ', // Separator between tags
                                'orderby'  => 'name', // Order by name or count
                                'order'    => 'ASC', // Order tags (ASC or DESC)
                                'show_count' => false, // Whether to show tag counts
                                'echo'     => true // Whether to output or return the tag cloud
                            ) ); ?>
                    </div>
            </div>
        </div>
    <!--=========================Tags======================-->
            </div>
</section>
