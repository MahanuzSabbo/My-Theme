
<?php if (is_home() || is_front_page()) : ?>

<link rel="base" href="<?php echo get_template_directory_uri();?>/assets/css/base.css">
<link rel="vendor" href="<?php echo get_template_directory_uri();?>/assets/css/vendor.css">
<link rel="main" href="<?php echo get_template_directory_uri();?>/assets/css/main.css">
<link rel="fonts" href="<?php echo get_template_directory_uri();?>/assets/css/fonts.css">
<?php endif; ?>
<?php if (is_home() || is_front_page()) : ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/pace.min.js"></script>
<?php endif; ?>



<link rel="shortcut icon" href="favicon.ico" type="<?php echo get_theme_mod( 'add_menu');?>">
<link rel="icon" href="favicon.ico" type="image/x-icon">

    
</head>
<body <?php body_class(); ?>>
    
<?php get_header(); ?>


<?php if (is_home() || is_front_page()) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/base.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/vendor.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/fonts.css">
    <?php endif; ?>
<body id="top">

<section class="s-pageheader s-pageheader--home">
<header class="header ">
<div class="header__content row">
<div class="header__logo <?php echo get_theme_mod( 'add_menu');?>">
<a class="logo" href="index.html">
<img src="<?php echo get_theme_mod( 'add_logo');?>" alt="Homepage">
</a>
</div>


<ul class="header__social">
<?php if ( is_active_sidebar( 'social_icon_sidebar' ) ){ 

dynamic_sidebar( 'social_icon_sidebar' ); }
?>
</ul> 
<a class="header__search-trigger" href="#0"></a>
<div class="header__search">
<form role="search" method="get" class="header__search-form" action="#">
<label>
<span class="hide-content">Search for:</span>
<input type="search" class="search-field" placeholder="Type Keywords" value name="s" title="Search for:" autocomplete="off">
</label>
<input type="submit" class="search-submit" value="Search">
</form>
<a href="#0" title="Close Search" class="header__overlay-close">Close</a>
</div> 
<a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
<nav class="header__nav-wrap">
<h2 class="header__nav-heading h6">Site Navigation</h2>
<ul class="header__nav">
<ul class="sub-menu">
<?php
// show all the page with menu section
wp_nav_menu(array(
    'theme_location' => 'main_menu',  
    'menu_class' => 'main-menu',      
));
?>
</ul
<li class="current"><a href="index.html" title>Home</a></li>
</ul> 
 
<a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>
</nav> 
</div> 
</header> 



<div class="pageheader-content row">
<div class="col-full">
<div class="featured">

<?php
// Query for latest posts
$latest_posts = new WP_Query(array(
    'posts_per_page' => 2, 
));

// Start the loop
if ($latest_posts->have_posts()) : 
    while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
        <div class="featured__column featured__column--big">
            <div class="entry" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">
                <div class="entry__content">
                    <span class="entry__category">
                        <a href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>">
                            <?php echo get_the_category()[0]->name; ?>
                        </a>
                    </span>
                    <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <div class="entry__info">
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="entry__profile-pic">
                            <?php echo get_avatar(get_the_author_meta('ID'), 64); ?>
                        </a>
                        <ul class="entry__meta">
                            <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">By <?php the_author(); ?></a></li>
                            <li>on <?php echo get_the_date(); ?></li>
                        </ul>
                    </div>
                </div> 
            </div> 
        </div>
    <?php endwhile;
    wp_reset_postdata(); 
else :
    echo '<p>No posts found.</p>';
endif;
?>
















</div> 
</div> 
</div> 
</section> 

<section class="s-content">
    <div class="row masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>
           

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                
             
                        <div class="entry__thumb">
                            <a href="echo '<p><?php 'Post URL: ' . get_the_permalink()?></p>" class="entry__thumb-link">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array('srcset' => wp_get_attachment_image_srcset(get_post_thumbnail_id()))); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>" alt="">
                                <?php endif; ?>
                            </a>
                            <div class="audio-wrap">
                                <?php if (get_post_meta(get_the_ID(), 'audio_url', true)) : ?>
                                    <audio id="player" src="<?php echo esc_url(get_post_meta(get_the_ID(), 'audio_url', true)); ?>" width="100%" height="42" controls="controls"></audio>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="entry__text">
                            <div class="entry__header">
                                <div class="entry__date">
                                    <a href="<?php  the_permalink(); ?>"><?php the_time('F j, Y'); ?></a>
                                </div>
                                <h1 class="entry__title"><a href="<?php the_permalink(); ?>"><?php  echo  the_title();  ?></a></h1>
                            </div>
                            <div class="entry__excerpt">
                                <?php echo '====================='.the_excerpt(); ?>
                            </div>
                            <div class="entry__meta">
                                <span class="entry__meta-links">
                                    <?php  the_category(' '); ?>
                                </span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="s-extra">
<div class="row top">
<div class="col-eight md-six tab-full popular">
<h3>Popular Posts</h3>
<div class="block-1-2 block-m-full popular__posts">




<!-- // most popular post -->
<article class="masonry__brick entry format-video" data-aos="fade-up">
    <div class="entry__thumb video-image">
        <?php
        $popular_posts_query = new WP_Query(array(
            'posts_per_page' => 5, // Number of popular posts to show
            'meta_key' => 'post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'ignore_sticky_posts' => 1 // Ignore sticky posts
        ));

        if ($popular_posts_query->have_posts()) :
            while ($popular_posts_query->have_posts()) : $popular_posts_query->the_post(); ?>

            <a href="<?php the_permalink(); ?>" class="entry__thumb-link">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', array('srcset' => wp_get_attachment_image_srcset(get_post_thumbnail_id()))); ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/default-image.jpg" alt="Default Image">
                <?php endif; ?>
            </a>
        </div>
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
                    <?php the_category(' '); ?>
                </span>
            </div>
        </div>

        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No popular posts found.</p>';
        endif;
        ?>
    </div>
</article>



</div> 
</div> 



<div class="col-four md-six tab-full about">

<h3>About Philosophy</h3>
<p>

<?php if ( is_active_sidebar( 'about_sidebar' ) ){ 

dynamic_sidebar( 'about_sidebar' ); }
?>

</p>
<ul class="about__social">
    
<?php if ( is_active_sidebar( 'social_icon_sidebar' ) ){ 

dynamic_sidebar( 'social_icon_sidebar' ); }
?>

</ul> 
</div> 
</div> 
<div class="row bottom tags-wrap">
    <div class="col-full tags">
        <h3>Tags</h3>
        <div class="tagcloud">
            <?php 
            // Display tag cloud with specific arguments
            wp_tag_cloud(array(
         // Output the tags
            )); 
            ?>
        </div> 
    </div> 
</div> 

</section> 





<?php get_footer(); ?>










<footer class="s-footer">
<div class="s-footer__main">
<div class="row">
<div class="col-two md-four mob-full s-footer__sitelinks">
<h4>Quick Links</h4>
<ul class="header__nav">

<?php
// show all the page with menu section
wp_nav_menu(array(
    'theme_location' => 'main_menu',  
    'menu_class' => 'main-menu',      
));
?>



</ul> 
</div> 
<div class="col-two md-four mob-full s-footer__archives">
<h4>Archives</h4>
<ul class="s-footer__linklist">
<?php 
    if (is_active_sidebar('achive_sidebar')) {
        dynamic_sidebar('achive_sidebar');
    } 
 ?>
</ul>
</div> 
<div class="col-two md-four mob-full s-footer__social">
<h4>Social</h4>
<div class="footer-content">
        <div class="social-media-links">
            <?php
            // Define the social media sites
            $social_sites = array(
                'facebook' => __('Facebook URL', 'text_domain'),
                'instagram' => __('Instagram URL', 'text_domain'),
                'twitter' => __('Twitter URL', 'text_domain'),
                'pinterest' => __('Pinterest URL', 'text_domain'),
                'googleplus' => __('Google+ URL', 'text_domain'),
                'linkedin' => __('LinkedIn URL', 'text_domain'),
            );

            // Loop through each social site and display a link if the URL is set
            foreach ($social_sites as $slug => $label) {
                $url = get_theme_mod($slug.'_url'); // Retrieve the URL from Customizer
                if ($url) {
                    echo '<a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer" title="' . esc_attr($label) . '">' . esc_html($label) . '</a><br>'; // Added <br> for line break
                }
            }
            ?>
        </div>

        <!-- Other footer content -->

    </div>
</div>
<div class="col-five md-full end s-footer__subscribe">
<h4>Our Newsletter</h4>
<?php 
// NEWS FEED AREA

    if (is_active_sidebar('newsletter_sidebar')) {
        dynamic_sidebar('newsletter_sidebar');
    } 
 ?>
 <!-- EMAIL AREA -->
<div class="subscribe-form">
<?php 
        if(is_active_sidebar( 'social_icon_sidebar' )){
            dynamic_sidebar('social_icon_sidebar');
        }
?>

<form id="mc-form" class="group" novalidate="true">
<input type="email" value name="EMAIL" class="email" id="mc-email" placeholder="<?php echo esc_attr(get_theme_mod('email_placeholder', 'Enter your email address')); ?>" >
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
<!--  footer copyright -->
<span> ©Copyright <?php echo bloginfo( 'name' ) ?> </span>
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



<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
    </script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8b70c15339a7770a","version":"2024.8.0","serverTiming":{"name":{"cfL4":true}},"token":"cd0b4b3a733644fc843ef0b185f98241","b":1}' crossorigin="anonymous"></script>

<?php wp_footer();?>