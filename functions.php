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
            'gallery',
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
            'default-color' => 'ffffff',
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
    wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

    wp_enqueue_script('ghtmeme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('ghtmeme-jquery', get_template_directory_uri() . '/js/jquery-1.4.3.min.js', array(), '20151215', true);
    wp_enqueue_script('ghtmeme-fancybox', get_template_directory_uri() . '/js/jquery.fancybox-1.3.4.js', array(), '20151215', true);

    wp_enqueue_script('ghtmeme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

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
                        <i class="fa fa-envelope" title="<?php _e('email icon', 'text-domain'); ?>"></i>
                    </a>
                </li>
            <?php } else { ?>
                <li>
                    <a class="<?php echo $active_site; ?>" target="_blank"
                       href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
                        <i class="<?php echo esc_attr($class); ?>"
                           title="<?php printf(__('%s icon', 'text-domain'), $active_site); ?>"></i>
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

// Gallery post type registration
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
            'name' => __('Gallery items', 'ghdev'),
            'add_new' => __('Add gallery item', 'ghdev'),
            'all_items' => __('Full gallery', 'ghdev')
        )
    ));
}




