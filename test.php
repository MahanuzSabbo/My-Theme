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