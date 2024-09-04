
<footer class="s-footer">
    <div class="s-footer__main">
        <div class="row">
            <div class="col-two md-four mob-full s-footer__sitelinks">
                <h4> <?php

$custom_text = get_theme_mod( 'custom_text_setting', '' );

// Display the custom text if it's set
if ( ! empty( $custom_text ) ) {
    echo esc_html( $custom_text ) ;
}
?>
</h4>     
    <?php
        wp_nav_menu( array(
            'theme_location' => 'secondary_menu',
            'menu_class' => 's-footer__linklist', 
        ) );
?> 
 
 </div>
<!-- <ul class="s-footer__linklist"></ul>
//                     <li><a href="#0">Home</a></li>
//                     <li><a href="#0">Blog</a></li>
//                     <li><a href="#0">Styles</a></li>
//                     <li><a href="#0">About</a></li>
//                     <li><a href="#0">Contact</a></li>
//                     <li><a href="#0">Privacy Policy</a></li>
//                 </ul> -->
          

            <div class="col-two md-four mob-full s-footer__archives">
                <h4><?php _e( 'Archives', 'Philosopy' ); ?></h4>
                           
                <ul class="s-footer__linklist">
                <?php
                // Fallback: Display archives if the widget is not active
                wp_get_archives( array(
                    'type'            => 'monthly',
                    'show_post_count' => false,
                    'echo'            => true,
                ) );
                ?>
                </ul> 
            </div> 
            <div class="col-two md-four mob-full s-footer__social">

            <h4>Social</h4>
            <ul class="s-footer__linklist">
            <?php 
           
                $social_networks = array(
                    'facebook'  => 'Facebook',
                    'twitter'   => 'Twitter',
                    'instagram' => 'Instagram',
                    'pinterest' => 'Pinterest',
                );

                foreach ($social_networks as $network => $icon) {
                    $url = esc_url(get_theme_mod("{$network}_url", '#'));
                    if ($url !== '#') : ?>
                        <li><a href="<?php echo $url; ?>"> <?php echo $icon ?></a></li>
                    <?php endif;
                    
                } ?>
                </ul>
                <!-- <h4>Social</h4>
                <ul class="s-footer__linklist">
                    <li><a href="#0">Facebook</a></li>
                    <li><a href="#0">Instagram</a></li>
                    <li><a href="#0">Twitter</a></li>
                    <li><a href="#0">Pinterest</a></li>
                    <li><a href="#0">Google+</a></li>
                    <li><a href="#0">LinkedIn</a></li>
                </ul> -->
            </div>
            <div class="col-five md-full end s-footer__subscribe">
                <h4><?php echo esc_html(get_theme_mod('about_title', 'About Philosophy')); ?></h4>
                
               
                <div class="about-section">

    <p><?php echo esc_html(get_theme_mod('about_paragraph', 'Write something about philosophy here.')); ?></p>
  

                <div class="subscribe-form">
               <?php  $email_placeholder = get_theme_mod( 'email_placeholder', 'Enter your email here...' );
?>
                    <form id="mc-form" class="group" novalidate="true">
                        <input type="email" value name="EMAIL" class="email" id="mc-email" placeholder="<?php echo esc_attr( $email_placeholder ); ?>"
                            required>
                        <input type="submit" name="subscribe" value="Send">
                        <label for="mc-email" class="subscribe-message"></label>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="s-footer__bottom">
        <div class="row">
            <div class="col-full">
                <div class="s-footer__copyright">
                    <span>© Copyright Philosophy 2018</span>
                    <span>Site Template by <a href="https://colorlib.com/">Colorlib</a></span>
                </div>
                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- <div id="preloader">
    <div id="loader">
        <div class="line-scale">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div> -->

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>

</body>

<!-- Mirrored from preview.colorlib.com/theme/philosophy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Aug 2024 06:20:44 GMT -->

</html>
<?php wp_footer();?>