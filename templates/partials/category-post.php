

<div class="s-content">
    <?php
    // List of category slugs
    $categories = array('Design', 'Photography', 'Lifestyle','Family', 'Health', 'Cooking'); 
    foreach ($categories as $category_slug) :
        $category_obj = get_category_by_slug($category_slug);
        if ($category_obj) :
            ?>
            <h2><?php echo esc_html($category_obj->name); ?></h2>
            <div class="row narrow">
                <?php
                $category_posts = new WP_Query(array(
                    'category_name' => $category_slug,
                    'posts_per_page' => 5,
                ));

                if ($category_posts->have_posts()) :
                    while ($category_posts->have_posts()) : $category_posts->the_post();
                        ?>
                        <div class="col-full s-content__header" data-aos="fade-up">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="lead"><?php the_excerpt(); ?></p>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No posts found in this category.</p>';
                endif;
                ?>
            </div>
        <?php
        endif;
    endforeach;
    ?>
</div>


