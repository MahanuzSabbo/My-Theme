<?php

add_filter('use_block_editor_for_post', '__return_false', 10); // user old post editor
 add_filter( 'use_widgets_block_editor', '__return_false' ); // user for old widgets panel
function calling_css_js_files() {
    $template_directory = get_template_directory_uri();
    
    // Connection of CSS files with version numbers
    wp_enqueue_style('base-style', $template_directory . '/assets/css/base.css', array(), '1.0');
    wp_enqueue_style('fonts-style', $template_directory . '/assets/css/fonts.css', array(), '1.0');
    wp_enqueue_style('main-style', $template_directory . '/assets/css/main.css', array(), '1.0');
    wp_enqueue_style('vendor-style', $template_directory . '/assets/css/vendor.css', array(), '1.0');
	wp_enqueue_style( 'style.css', get_stylesheet_directory_uri() . '/style.css', array(), 1.1, 'all' );

}
add_action('wp_enqueue_scripts', 'calling_css_js_files');

function theme_enqueue_scripts() {
    // Enqueue the main JavaScript file
    wp_enqueue_script(
        'main-js', 
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'), 
        null, 
        false 
    );

    wp_enqueue_script(
        'modernizr.js', 
        get_template_directory_uri() . '/assets/js/modernizr.js',
        array('jquery'), 
        null, 
        false 
    );
    wp_enqueue_script(
        'pace.min.js', 
        get_template_directory_uri() . '/assets/js/pace.min.js',
        array('jquery'), 
        null, 
        false 
    );
    wp_enqueue_script(
        'plugins.js', 
        get_template_directory_uri() . '/assets/js/plugins.js',
        array('jquery'), 
        null, 
        false 
    );
    wp_enqueue_script(
        'jquery-3.2.1.min.js', 
        get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js',
        array('jquery'), 
        null, 
        false 
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

//feature image
function mytheme_setup() {
    add_theme_support('post-thumbnails'); // Enable featured images
}
add_action('after_setup_theme', 'mytheme_setup');
function mytheme_image_sizes() {
    add_image_size('custom-size', 800, 600, true); // Width, Height, Crop (true for hard crop)
}
add_action('after_setup_theme', 'mytheme_image_sizes');
// post tags
function display_post_tags() {
    ob_start();
    if ( has_tag() ) {
        the_tags( 'Tags: ', ', ', '' );
    }
    return ob_get_clean();
}
add_shortcode( 'post_tags', 'display_post_tags' );

//post auther social media 
function add_social_media_fields($contactmethods) {
    // Add new social media fields
    $contactmethods['facebook'] = 'Facebook URL';
    $contactmethods['twitter'] = 'Twitter URL';
    $contactmethods['instagram'] = 'Instagram URL';
    $contactmethods['google_plus'] = 'Google+ URL'; 
    return $contactmethods;
}
add_filter('user_contactmethods', 'add_social_media_fields');
//for gallery post
add_theme_support( 'post-formats', array(  'gallery','video','music', 'audio' ) );




//logo customizer
function mylogo_customize_register( $wp_customize ) {
    // Add a section for logo customization
    $wp_customize->add_section( 'logo_customization', array(
        'title'    => __( 'Logo Customization', 'Philosopy' ),
        'priority' => 30,
    ) );

    // Logo uploader setting
    $wp_customize->add_setting( 'custom_logo', array(
        'default'   => '/assets/css/img/logo.svg',// default images
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_logo', array(
        'label'    => __( 'Upload Logo', 'Philosopy' ),
        'section'  => 'logo_customization',
        'settings' => 'custom_logo',
    ) ) );

    // Logo color setting
    $wp_customize->add_setting( 'logo_color', array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logo_color_control', array(
        'label'    => __( 'Logo Color', 'Philosopy' ),
        'section'  => 'logo_customization',
        'settings' => 'logo_color',
    ) ) );

    // Logo height setting
    $wp_customize->add_setting( 'logo_height', array(
        'default'   => '100px',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'logo_height_control', array(
        'label'    => __( 'Logo Height', 'Philosopy' ),
        'section'  => 'logo_customization',
        'settings' => 'logo_height',
        'type'     => 'text',
    ) );

    // Logo width setting
    $wp_customize->add_setting( 'logo_width', array(
        'default'   => '200px',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'logo_width_control', array(
        'label'    => __( 'Logo Width', 'Philosopy' ),
        'section'  => 'logo_customization',
        'settings' => 'logo_width',
        'type'     => 'text',
    ) );

    // Logo alignment setting
    $wp_customize->add_setting( 'logo_alignment', array(
        'default'   => 'left',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'logo_alignment_control', array(
        'label'    => __( 'Logo Alignment', 'Philosopy' ),
        'section'  => 'logo_customization',
        'settings' => 'logo_alignment',
        'type'     => 'select',
        'choices'  => array(
            'left'   => __( 'Left', 'Philosopy' ),
            'center' => __( 'Center', 'Philosopy' ),
            'right'  => __( 'Right', 'Philosopy' ),
        ),
    ) );

    // Editable logo text setting
    $wp_customize->add_setting( 'logo_text', array(
        'default'   => 'Your Logo Text',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'logo_text_control', array(
        'label'    => __( 'Logo Text', 'Philosopy' ),
        'section'  => 'logo_customization',
        'settings' => 'logo_text',
        'type'     => 'text',
    ) );
     // Add Header Text Setting
  $wp_customize->add_setting('font_family', array(
    'default'   => 'Arial, sans-serif',
    'transport' => 'refresh', 
));

// Add a control for font family
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_text_control', array(
    'label'    => __('Font', 'themename'),
    'section'  => 'logo_customization',
    'settings' => 'font_family',
    'type'     => 'select',
    'choices'  => array(
        'Arial, sans-serif'       => 'Arial',
        '"Times New Roman", serif' => 'Times New Roman',
        'Georgia, serif'           => 'Georgia',
        '"Courier New", monospace' => 'Courier New',
        'Verdana, sans-serif'      => 'Verdana',
        'none' => 'None',
      
      ),)));

}

add_action( 'customize_register', 'mylogo_customize_register' );
// header design
function myheader_customize_register( $wp_customize ) {
    // Add a section for header customization
    $wp_customize->add_section( 'header_customization', array(
        'title'    => __( 'Header Customization', 'Philosopy' ),
        'priority' => 40, // Position this section in the Customizer
    ) );

    // Header font setting
    $wp_customize->add_setting( 'header_font_family', array(
        'default'   => 'Arial, sans-serif',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'header_font_family_control', array(
        'label'    => __( 'Header Font Family', 'Philosopy' ),
        'section'  => 'header_customization',
        'settings' => 'header_font_family',
        'type'     => 'select',
        'choices'  => array(
            'Arial, sans-serif'       => 'Arial',
            '"Times New Roman", serif' => 'Times New Roman',
            'Georgia, serif'           => 'Georgia',
            '"Courier New", monospace' => 'Courier New',
            'Verdana, sans-serif'      => 'Verdana',
            'none' => 'None',
        ),
    ) );

    // Header alignment setting
    $wp_customize->add_setting( 'header_alignment', array(
        'default'   => 'left',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'header_alignment_control', array(
        'label'    => __( 'Header Alignment', 'Philosopy' ),
        'section'  => 'header_customization',
        'settings' => 'header_alignment',
        'type'     => 'select',
        'choices'  => array(
            'left'   => __( 'Left', 'Philosopy' ),
            'center' => __( 'Center', 'Philosopy' ),
            'right'  => __( 'Right', 'Philosopy' ),
        ),
    ) );
}

add_action( 'customize_register', 'myheader_customize_register' );

// archive 
function my_theme_widgets_init() {
    // Archive widget registration
    register_sidebar( array(
        'id'            => 'archive_sidebar',
        'name'          => __( 'Archive Widget', 'Philosopy' ),
        'description'   => __( 'Displays archives in the footer', 'Philosopy' ),
        'before_widget' => '<div class="col-two md-four mob-full s-footer__archives">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'my_theme_widgets_init' );
 
// social media icon
function socialicon_customize_register( $wp_customize ) {
    // Add a section for About Philosophy
    $wp_customize->add_section('about_philosophy_section', array(
        'title'    => __('About Social Icon', 'Philosopy'),
        'priority' => 40,
    ));

    // Add setting for About Text Head
    $wp_customize->add_setting('about_text_head', array(
        'default'   => 'About Us',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_text_head', array(
        'label'    => __('About Text Head', 'Philosopy'),
        'section'  => 'about_philosophy_section',
        'type'     => 'text',
    ));

    // Add setting for About Paragraph
    $wp_customize->add_setting('about_paragraph', array(
        'default'   => 'This is the about section where you can write about your company or website.',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_paragraph', array(
        'label'    => __('About Paragraph', 'Philosopy'),
        'section'  => 'about_philosophy_section',
        'type'     => 'textarea',
    ));

    // Social Network URLs
    $social_networks = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter',
        'instagram' => 'Instagram',
        'pinterest' => 'Pinterest',
    );

    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting("{$network}_url", array(
            'default'   => '#',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("{$network}_url", array(
            'label'    => __("{$label} URL", 'Philosopy'),
            'section'  => 'about_philosophy_section',
            'type'     => 'url',
        ));
    }
}

add_action( 'customize_register', 'socialicon_customize_register' );


// show customize post
// function create_custom_post_type() {
//     register_post_type('books',
//         array(
//             'labels' => array(
//                 'name' => __('Books'),
//                 'singular_name' => __('Book')
//             ),
//             'public' => true,
//             'has_archive' => true,
//             'rewrite' => array('slug' => 'books'),
//             'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'date', 'tag')
//         )
//     );
// }
// add_action('init', 'create_custom_post_type');
//place holder for footer
function my_customize_register( $wp_customize ) {
    // Add the setting
    $wp_customize->add_setting( 'custom_text_setting', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    // Add the text control
    $wp_customize->add_control( 'custom_text_control', array(
        'label'       => __( 'Custom Text', 'Philosopy' ),
        'section'     => 'title_tagline',
        'settings'    => 'custom_text_setting',
        'type'        => 'text',
    ) );
}

add_action( 'customize_register', 'my_customize_register' );

// registering Main Menu & Secondary Menu
function register_my_menus() {
    register_nav_menus(array(
        'main_menu' => __('Main Menu'),
        'secondary_menu' => __('Secondary Menu', 'Philosopy'),
        'social_menu' => __('Social Media', 'Philosopy'),
    ));
}
add_action('init', 'register_my_menus');


//Our Newsletter
function about_customize_register( $wp_customize ) {
    // Add a section for About Philosophy
    $wp_customize->add_section('div_about_section', array(
        'title'    => __('About Philosophy', 'Philosopy'),
        'priority' => 40, // Adjust priority to position this section appropriately
    ));

    // Add setting for About Title
    $wp_customize->add_setting('about_title', array(
        'default'   => 'About Philosophy',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_title', array(
        'label'    => __('About Title', 'Philosopy'),
        'section'  => 'div_about_section',
        'type'     => 'text',
    ));

    // Add setting for the paragraph text
    $wp_customize->add_setting('about_paragraph', array(
        'default'   => 'Write something about philosophy here...',
        'transport' => 'refresh',
    ));

    // Add control for the paragraph text
    $wp_customize->add_control('about_paragraph_control', array(
        'label'    => __('About Paragraph', 'Philosopy'),
        'section'  => 'div_about_section',
        'settings' => 'about_paragraph',
        'type'     => 'textarea',
    ));

    // Add setting for the email input
    $wp_customize->add_setting( 'email_placeholder', array(
        'default'   => 'Enter your email here...',
        'transport' => 'refresh',
    ));

    // Add control for the email input
    $wp_customize->add_control( 'email_placeholder_control', array(
        'label'    => __( 'Email Placeholder', 'Philosopy' ),
        'section'  => 'div_about_section',
        'settings' => 'email_placeholder',
        'type'     => 'text',
    ));
}
add_action( 'customize_register', 'about_customize_register' );


// check function
// function your_function() {
//     echo 'ssssssssssssss';
// }
// add_action( 'wp_footer', 'your_function' );
