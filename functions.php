<?php
/**
 * ghtheme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ghtheme
 */
if (!function_exists('ghtmeme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function ghtmeme_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on ghtheme, use a find and replace
         * to change 'ghtmeme' to the name of your theme in all the template files.
         */
        load_theme_textdomain('ghtmeme', get_template_directory() . '/languages');
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'ghtmeme'),
        ));
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'portfolio_type',
            'caption',
        ));
        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));
        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('ghtmeme_custom_background_args', array(
            'default-color' => '#eee',
            'default-image' => '',
        )));
    }
endif;
add_action('after_setup_theme', 'ghtmeme_setup');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ghtmeme_content_width()
{
    $GLOBALS['content_width'] = apply_filters('ghtmeme_content_width', 640);
}

add_action('after_setup_theme', 'ghtmeme_content_width', 0);
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ghtmeme_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'ghtmeme'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'ghtmeme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'ghtmeme_widgets_init');
/**
 * Enqueue scripts and styles.
 */
function ghtmeme_scripts()
{
    wp_enqueue_style('ghtmeme-style-initial', get_stylesheet_uri());
    wp_enqueue_style('ghtmeme-style-main', get_template_directory_uri() . '/stylesheets/style.css');
    wp_enqueue_style('ghtmeme-portfolio-styles', get_template_directory_uri() . '/stylesheets/portfolio-styles.css');
    wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/stylesheets/flexslider.css');
    wp_enqueue_script('ghtmeme-jquery', get_template_directory_uri() . '/js/jquery-1.4.3.min.js', array(), '20151215', true);
    wp_enqueue_script('ghtmeme-fancybox', get_template_directory_uri() . '/js/jquery.fancybox-1.3.4.js', array(), '20151215', true);
    wp_enqueue_script('ghtmeme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
//    wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.js', array(), '20151215', true);

    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", array(), false, true);
    wp_enqueue_script('jquery');
    //register fancybox. change this to your local file.
    wp_deregister_script('fancybox');
    wp_register_script('fancybox', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.4/jquery.fancybox.pack.js", array(), false, true);
    wp_enqueue_script('fancybox');
    //register modernizr. change this to your local file.
    wp_deregister_script('modernizr');
    wp_register_script('modernizr', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js", array(), false, true);
    wp_enqueue_script('modernizr');
    //register isotope. change this to your local file.
    wp_deregister_script('isotope');
    wp_register_script('isotope', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/1.5.25/jquery.isotope.min.js", array(), false, true);
    wp_enqueue_script('ghtmeme-general-ck', get_template_directory_uri() . '/js/general-ck.js', array(), '20151215', true);
    wp_enqueue_script('ghtmeme-lightbox', get_template_directory_uri() . '/js/lightbox.js', array(), '20151215', true);
    wp_enqueue_script('scriptform', get_template_directory_uri() . '/js/scriptform.js', array(), '20151215', true);
    //general
    wp_register_script('main', get_template_directory_uri() . '/js/main.js', array(), false, true);
    wp_register_script('general', get_template_directory_uri() . '/js/general.js', array(), false, true);
    wp_register_script('jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), false, true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'ghtmeme_scripts');
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
function my_social_media_icons()
{
    $social_sites = my_customizer_social_media_array();
    /* any inputs that aren't empty are stored in $active_sites array */
    foreach ($social_sites as $social_site) {
        if (strlen(get_theme_mod($social_site)) > 0) {
            $active_sites[] = $social_site;
        }
    }
    /* for each active social site, add it as a list item */
    if (!empty($active_sites)) {
        echo "<ul class='social-media-icons'>";
        foreach ($active_sites as $active_site) {
            /* setup the class */
            $class = 'fa fa-' . $active_site;
            if ($active_site == 'email') {
                ?>
                <li>
                    <a class="email" target="_blank"
                       href="mailto:<?php echo antispambot(is_email(get_theme_mod($active_site))); ?>">
                        <span class="fa fa-envelope" title="<?php _e('email icon', 'text-domain'); ?>"></span>
                    </a>
                </li>
            <?php } else { ?>
                <li>
                    <a class="<?php echo $active_site; ?>" target="_blank"
                       href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
						<span class="<?php echo esc_attr($class); ?>"
                              title="<?php printf(__('%s icon', 'text-domain'), $active_site); ?>"></span>
                    </a>
                </li>
                <?php
            }
        }
        echo "</ul>";
    }
}

// Features post type registrarion
add_action('init', 'ghdev_features');
function ghdev_features()
{
    register_post_type('features', array(
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
            'custom-fields'
        ),

        'labels' => array(
            'name' => __('Features', 'ghdev'),
            'add_new' => __('Add feature', 'ghdev'),
            'all_items' => __('All features', 'ghdev')
        )
    ));
}

// Gallery post type registrarion
add_action('init', 'ghdev_gallery');
function ghdev_gallery()
{
    register_post_type('gallery', array(
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
            'custom-fields'
        ),

        'labels' => array(
            'name' => __('Gallery', 'ghdev'),
            'add_new' => __('Add picture', 'ghdev'),
            'all_items' => __('All pictures', 'ghdev')
        )
    ));
}

add_action('init', 'gallery_taxonomies', 0);
function gallery_taxonomies()
{
    register_taxonomy(
        'gallery_cats',
        'gallery',
        array(
            'labels' => array(
                'name' => 'Gallery categories',
                'add_new_item' => 'Add New Category',
                'new_item_name' => "New Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}

// Portfolio post type registrarion
add_action('init', 'ghdev_portfolio');
function ghdev_portfolio()
{
    register_post_type('portfolio', array(
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
            'custom-fields'
        ),

        'labels' => array(
            'name' => __('Portfolio', 'ghdev'),
            'add_new' => __('Add picture', 'ghdev'),
            'all_items' => __('All pictures', 'ghdev')
        )
    ));
}

add_action('init', 'portfolio_taxonomies', 0);
function portfolio_taxonomies()
{
    register_taxonomy(
        'portfolio_cats',
        'portfolio',
        array(
            'labels' => array(
                'name' => 'Portfolio categories',
                'add_new_item' => 'Add New Category',
                'new_item_name' => "New Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}
//----------------------------------------------
//--------------add theme support for thumbnails
//----------------------------------------------
if ( function_exists( 'add_theme_support')){
    add_theme_support( 'post-thumbnails' );
}
add_image_size( 'admin-list-thumb', 80, 80, true); //admin thumbnail preview
add_image_size( 'album-grid', 450, 450, true );

//----------------------------------------------
//----------register and label portfolio post type
//----------------------------------------------

////////////////////////////////
////////// NEW CODE BELOW //////
////////////////////////////////


//----------------------------------------------
//------------------------------------enqueue js
//----------------------------------------------
function jss_load_scripts(){

    //deregister for google jQuery cdn
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', "http" . ( $_SERVER['SERVER_PORT'] == 443 ? "s" : "" ) . "://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js",  array(), false, true );
    wp_enqueue_script( 'jquery' );

    //register fancybox. change this to your local file.
    wp_deregister_script( 'fancybox' );
    wp_register_script( 'fancybox', "http" . ( $_SERVER['SERVER_PORT'] == 443 ? "s" : "" ) . "://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.4/jquery.fancybox.pack.js",  array(), false, true );
    wp_enqueue_script( 'fancybox' );

    //register modernizr. change this to your local file.
    wp_deregister_script( 'modernizr' );
    wp_register_script( 'modernizr', "http" . ( $_SERVER['SERVER_PORT'] == 443 ? "s" : "" ) . "://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js",  array(), false, true );
    wp_enqueue_script( 'modernizr' );

    //register isotope. change this to your local file.
    wp_deregister_script( 'isotope' );
    wp_register_script( 'isotope', "http" . ( $_SERVER['SERVER_PORT'] == 443 ? "s" : "" ) . "://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/1.5.25/jquery.isotope.min.js",  array(), false, true );
    wp_enqueue_script( 'isotope' );

    //general
    wp_register_script( 'general', get_template_directory_uri() . '/js/general.js',  array(), false, true );
    wp_enqueue_script( 'general' );
}
//set it off
add_action( 'wp_enqueue_scripts', 'jss_load_scripts' );




/*---------------------------------*/
/*------Feedback form------*/
/*---------------------------------*/
function custom_form_action_callback() {
    global $wpdb;
    global $mail;
    $nonce=$_POST['nonce'];
    $rtr='';
    if (!wp_verify_nonce( $nonce, 'custom_form_action-nonce'))wp_die('{"error":"Error. Spam"}');
    $message="";
    $to="ghtheme@gmail.com";
    $headers = "Content-type: text/html; charset=utf-8 \r\n";
    $headers.= "From: ".$_SERVER['SERVER_NAME']." \r\n";
    $subject="Message from site ".$_SERVER['SERVER_NAME'];
    do_action('plugins_loaded');
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['website']) && !empty($_POST['mess']) ){
        $message.="Name: ".$_POST['name'];
        $message.="<br/>E-mail: ".$_POST['email'];
        $message.="<br/>Website: ".$_POST['website'];
        $message.="<br/>Message:<br/>".nl2br($_POST['mess']);
        if(mail($to, $subject, $message, $headers)){
            $rtr='{"work":"Message send!","error":""}';
        }else{
            $rtr='{"error":"Server error."}';
        }
    }else{
        $rtr='{"error":"All fields are required!"}';
    }
    echo $rtr;
    exit;
}
add_action('wp_ajax_nopriv_custom_form_send_action', 'custom_form_action_callback');
add_action('wp_ajax_custom_form_send_action', 'custom_form_action_callback');
function custom_form_stylesheet(){
    wp_enqueue_style("custom_form_style_templ",get_bloginfo('stylesheet_directory')."/style.css","0.1.2",true);
    wp_enqueue_script("custom_form_script_temp",get_bloginfo('stylesheet_directory')."/js//scriptform.js");
    wp_localize_script("custom_form_script_temp", "custom_form_Ajax", array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce('custom_form_action-nonce') ) );
}
add_action( 'wp_enqueue_scripts', 'custom_form_stylesheet' );
function formCustom() {
    $rty.='<div class="contact">';
    $rty.='<form class="contact-form">';
    $rty.='<h2>Send a message</h2>';
    $rty.='<div class="form-group"><input id="name" class="form-control" type="text" placeholder="Name"/></div>';
    $rty.='<div class="form-group"><input id="email" type="text" class="form-control" placeholder="Email"/></div>';
    $rty.='<div class="form-group"><input id="website" type="text" class="form-control" placeholder="Website"/></div>';
    $rty.='<div class="form-group"><textarea id="mess" class="form-control"></textarea></div>';
    $rty.='<button type="submit"  data-text="SUBMIT" class="button button-default" onclick="custom_form_ajax_send(\'#name\',\'#email\',\'#website\',\'#mess\'); return false;"><span>SUBMIT</span></button>';
    $rty.='</form>';
    $rty.='<div id="response"></div>';
    $rty.='</div>';
    return $rty;
}
add_shortcode( 'formCustom', 'formCustom' );


function trim_title_chars($count, $after) {
    $title = get_the_title();
    if (mb_strlen($title) > $count) $title = mb_substr($title,0,$count);
    else $after = '';
    echo $title . $after;
}