

<?php


// widgets area at footer side
function my_theme_widgets_init() {
 
   //footer center register
    register_sidebar( array(
        'id'            => 'achive_sidebar',
        'name'          =>__( 'Archive widget', 'Philosopy' ),
        'description'   => 'write your page name',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

// footer right sidebar register
    register_sidebar( array(
        'id'            => 'social_sidebar',
        'name'          =>__( 'Social widget', 'Philosopy' ),
        'description'   => 'write your page name',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );


    // About widgets

    register_sidebar( array(
        'id'            => 'newsletter_sidebar',
        'name'          =>__( 'Newsletter widget', 'Philosopy' ),
        'description'   => 'write your about details',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );


    register_sidebar( array(
        'id'            => 'social_icon_sidebar',
        'name'          =>__( 'Social icon widget', 'Philosopy' ),
        'description'   => 'write anything u want to add',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'id'            => 'about_sidebar',
        'name'          =>__( 'About widget', 'Philosopy' ),
        'description'   => 'write anything u want to add',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    // register_sidebar( array(
    //     'id'            => 'social',
    //     'name'          =>__( 'Social widget', 'Philosopy' ),
    //     'description'   => 'write anything u want to add',
    //     'before_widget' => '',
    //     'after_widget'  => '',
    //     'before_title'  => '',
    //     'after_title'   => '',
    // ) );

}

add_action( 'widgets_init', 'my_theme_widgets_init' );
// social url widget 

function philosophy_customizer_settings($wp_customize) {
    $wp_customize->add_section('social_media_section', array(
        'title'    => __('Social Media Links', 'text_domain'),
        'priority' => 30,
    ));

    $social_sites = array(
        'facebook' => __('Facebook URL', 'text_domain'),
        'instagram' => __('Instagram URL', 'text_domain'),
        'twitter' => __('Twitter URL', 'text_domain'),
        'pinterest' => __('Pinterest URL', 'text_domain'),
        'googleplus' => __('Google+ URL', 'text_domain'),
        'linkedin' => __('LinkedIn URL', 'text_domain'),
    );

    foreach ($social_sites as $slug => $label) {
        $wp_customize->add_setting($slug.'_url', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control($slug.'_url', array(
            'label'    => $label,
            'section'  => 'social_media_section',
            'type'     => 'url',
        ));
    }

}
add_action('customize_register', 'philosophy_customizer_settings');

// show popular post 
function display_post_views($content) {
    if (is_single()) {
        $view_count = get_post_meta(get_the_ID(), 'post_views_count', true);
        $content .= '<p>View Count: ' . $view_count . '</p>';
    }
    return $content;
}
add_filter('the_content', 'display_post_views');
//email subscrib form
function handle_subscribe_form() {
    // Check if the form is submitted
    if (isset($_POST['subscribe_email'])) {
        $email = sanitize_email($_POST['subscribe_email']);
        $to = get_option('admin_email'); // Change this if you want a specific email address
        $subject = 'New Subscription';
        $message = 'A new subscription request has been received from: ' . $email;
        $headers = array('Content-Type: text/html; charset=UTF-8');

        if (is_email($email)) {
            // Send the email
            wp_mail($to, $subject, $message, $headers);
            // Redirect to the referrer with success parameter
            wp_redirect(add_query_arg('subscribed', 'true', wp_get_referer()));
        } else {
            // Redirect to the referrer with failure parameter
            wp_redirect(add_query_arg('subscribed', 'false', wp_get_referer()));
        }
        exit;
    }
}

// Hook into admin_post and admin_post_nopriv actions
add_action('admin_post_subscribe_to_newsletter', 'handle_subscribe_form');
add_action('admin_post_nopriv_subscribe_to_newsletter', 'handle_subscribe_form');


// Menu section to show all the pages
function register_my_menus() {
    register_nav_menus(array(
        'main_menu' => __('Main Menu', 'yourtheme'),
    ));
  }
  add_action('init', 'register_my_menus');

// // check function connection
// function your_function() {
//     echo 'ssssssssssssss';
// }
// add_action( 'wp_footer', 'your_function' );

//Header image customization & left right bar and footer function
function header_customizar_register($wp_customize){
    $wp_customize ->add_section('customize_header_area', array(
        'title' => __('Header Area', 'launcher'),
        'description' => 'Add header'
    )) ;

    $wp_customize ->add_setting('add_logo', array(

    ));

    $wp_customize ->add_control(new WP_Customize_Image_Control($wp_customize, 'add_logo', array(
        'label' => 'Upload Logo',
        'setting'=> 'add_logo', 
        'section'=> 'customize_header_area',
    )));


// Menu Positioning
$wp_customize->add_section('menu_option', array(
    'title'       => __('Menu Placement', 'launcher'),
    'description' => 'Change your logo position'
));

$wp_customize->add_setting('add_menu', array(
    'default' => 'right_menu',
    
));

$wp_customize->add_control('add_menu', array(
    'label'    => 'Menu Position',
    'section'  => 'menu_option',
    'settings' => 'add_menu',
    'type'     => 'radio',
    'choices'  => array(
        'left_menu'   => 'Left Menu',
        'right_menu'  => 'Right Menu',
        'center_menu' => 'Center Menu',
    ),
));

}
add_action('customize_register', 'header_customizar_register');

// add notification  part
function customizer_settings_register($wp_customize) {
    // Add section for notifications
    $wp_customize->add_section('notification_section', array(
        'title'    => __('Notification Area', 'your-theme-slug'),
        'priority' => 30,
    ));

    // Add setting for notification text
    $wp_customize->add_setting('notification_text', array(
        'default'   => 'Some Notifications',
        'transport' => 'refresh',
    ));

    // Add control for notification text
    $wp_customize->add_control('notification_text_control', array(
        'label'    => __('Notification Text', 'your-theme-slug'),
        'section'  => 'notification_section',
        'settings' => 'notification_text',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'customizer_settings_register');

// show customize post
  function create_custom_post_type() {
    register_post_type('books',
        array(
            'labels' => array(
                'name' => __('Books'),
                'singular_name' => __('Book')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'books'),
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
        )
    );
}
add_action('init', 'create_custom_post_type');

         

  // options table
//add_action('wp_footer', function(){

    // update_option('name_sss', 'ssssss');

   // $nam= get_option( 'name_sss');

    //echo $nam;
//});

?>