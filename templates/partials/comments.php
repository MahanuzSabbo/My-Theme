<div class="comments-wrap">
    <div id="comments" class="row">
        <div class="col-full">
            <h3 class="h2">
                <?php
                // Get the number of approved comments
                $alpha_cn = get_comments_number();
                echo esc_html($alpha_cn) . " " . __("Comments", "Philosopy");
                ?>
            </h3>

            <?php 
            // Fetch comments
            $args = array(
                'status'  => 'approve',
                'post_id' => get_the_ID(),
            );

            $comments_query = new WP_Comment_Query;
            $comments       = $comments_query->query($args);

            if ($comments) : ?>
                <ol class="commentlist">
                    <?php foreach ($comments as $comment) : ?>
                        <li class="depth-1 comment">
                            <div class="comment__avatar">
                                <?php echo get_avatar($comment, 64, null, null, array('class' => 'comment_avatar')); ?>
                            </div>
                            <div class="comment__content">
                                <div class="comment__info">
                                    <cite><?php echo get_comment_author($comment); ?></cite>
                                    <div class="comment__meta">
                                        <time class="comment__time"><?php echo get_comment_date('', $comment); ?> @ <?php echo get_comment_time('', $comment); ?></time>
                                        <?php
                                        // Reply link
                                        comment_reply_link(array(
                                            'reply_text' => __('Reply', 'Philosopy'),
                                            'depth'      => 1,
                                            'max_depth'  => 3,
                                            'comment'    => $comment,
                                        ));
                                        ?>
                                    </div>
                                </div>
                                <div class="comment__text">
                                    <p><?php echo get_comment_text($comment); ?></p>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php else : ?>
                <p><?php _e('No comments found.', 'Philosopy'); ?></p>
            <?php endif; ?>

            <?php
            // Check if comments are closed
            if (!comments_open()) {
                _e('Comments are closed.', 'Philosopy');
            }
            ?>

            <?php
            // Define custom classes for the form and submit button
            $comment_form_args = array(
                'class_form'        => 'custom-comment-form',
                'class_submit'      => 'submit btn--primary btn--large full-width',
                'label_submit'      => __('Submit', 'Philosopy'),
                'title_reply'       => __('Add a Comment', 'Philosopy'),
                'fields'            => array(
                    'author' => '<div class="form-field"><input id="author" name="author" type="text" class="full-width" placeholder="' . __('Your Name', 'Philosopy') . '" required></div>',
                    'email'  => '<div class="form-field"><input id="email" name="email" type="email" class="full-width" placeholder="' . __('Your Email', 'Philosopy') . '" required></div>',
                    'url'    => '<div class="form-field"><input id="url" name="url" type="url" class="full-width" placeholder="' . __('Website', 'Philosopy') . '"></div>',
                ),
                'comment_field'     => '<div class="message form-field"><textarea id="comment" name="comment" class="full-width" placeholder="' . __('Your Message', 'Philosopy') . '" required></textarea></div>',
            );

            // Display the form with custom rendering
            ?>
            <div class="<?php echo esc_attr($comment_form_args['class_form']); ?>">
                <form name="commentform" id="commentform" method="post" action="<?php echo esc_url(home_url('/wp-comments-post.php')); ?>">
                    <fieldset>
                        <?php
                        // Render each field individually
                        foreach ($comment_form_args['fields'] as $field) {
                            echo $field;
                        }

                        // Render the comment field last
                        echo $comment_form_args['comment_field'];
                        ?>

                        <!-- Render the submit button -->
                        <button type="submit" class="<?php echo esc_attr($comment_form_args['class_submit']); ?>">
                            <?php echo esc_html($comment_form_args['label_submit']); ?>
                        </button>
                    </fieldset>
                </form>
            </div> <!-- .custom-comment-form -->

        </div> <!-- .col-full -->
    </div> <!-- .row -->
</div> <!-- .comments-wrap -->
