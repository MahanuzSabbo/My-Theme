<!-- header design -->
<head>
<meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="<?php bloginfo('name'); ?>">
    <title><?php wp_title(''); ?></title>
    <?php
        wp_head();
    ?>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/modernizr.js?v=1"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/pace.min.js?v=1"></script>
</head>
<body id="top">
<div class="s-pageheader">
    <header class="header">
        <div class="header__content row">
            
        <?php
        // Retrieve customizer values
        $logo_url = get_theme_mod('custom_logo');
        $logo_color = get_theme_mod('logo_color', '#000000');
        $logo_height = get_theme_mod('logo_height', '100px');
        $logo_width = get_theme_mod('logo_width', '200px');
        $logo_alignment = get_theme_mod('logo_alignment', 'left');
        $logo_text = get_theme_mod('logo_text', 'Your Logo Text');
        $font_family = get_theme_mod('font_family', 'Arial, sans-serif');

        // Define alignment classes
        $alignment_class = '';
        if ($logo_alignment === 'center') {
            $alignment_class = 'logo-center';
        } elseif ($logo_alignment === 'right') {
            $alignment_class = 'logo-right';
        } else {
            $alignment_class = 'logo-left';
        }
        ?>
     <!-- header design -->
    <div class="header__logo <?php echo get_theme_mod($alignment_class); ?> ">
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url(get_template_directory_uri(). '/assets/img/logo.svg');?> " alt="" srcset="">
            </a>
    </div>
        <!-- social media icon -->
    <ul class="header__social">
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
                <a class="header__search-trigger" href="#0"></a>
<!-- search box -->
                <div class="header__search">
                    <form role="search" method="get" class="header__search-form" action="#">
                        <label>
                            <span class="hide-content">Search for:</span>
                            <input type="search" class="search-field" placeholder="Type Keywords" value name="s"
                                title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                    </form>
                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>
                </div>
            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
                <nav class="header__nav-wrap" >
                     <h2 class="header__nav-heading h6">Site Navigation</h2>
    <!-- Your logo and other header content here -->
                      <?php
                        $menu_html=wp_nav_menu( ['menu'=>'main_menu',
                        'menu_class'=>'header__nav',
                        'echo'=>false] );
                        echo str_replace('class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children','class="menu-item menu-item-type-post_type menu-item-object-page has-children',$menu_html);
                      ?>  
                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>
                </nav>
                </div>
        </header>
    </div>
<!-- header design -->

 

