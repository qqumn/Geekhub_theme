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
    wp_enqueue_style('flexslider', get_template_directory_uri() . 'flexslider.css');
    wp_enqueue_script('ghtmeme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('ghtmeme-jquery', get_template_directory_uri() . '/js/jquery-1.4.3.min.js', array(), '20151215', true);
    wp_enqueue_script('ghtmeme-fancybox', get_template_directory_uri() . '/js/jquery.fancybox-1.3.4.js', array(), '20151215', true);
    wp_enqueue_script('ghtmeme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
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
    wp_enqueue_script('isotope');
    wp_enqueue_script('ghtmeme-general-ck', get_template_directory_uri() . '/js/general-ck.js', array(), '20151215', true);
    wp_enqueue_script('ghtmeme-lightbox', get_template_directory_uri() . '/js/lightbox.js', array(), '20151215', true);
    //general
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

//----------------------------------------------
//--------------add theme support for thumbnails
//----------------------------------------------
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}
add_image_size('admin-list-thumb', 80, 80, true); //admin thumbnail preview
add_image_size('album-grid', 450, 450, true);
//----------------------------------------------
//----------register and label portfolio_type post type
//----------------------------------------------
$portfolio_type_labels = array(
    'name' => _x('Portfolio', 'post type general name'),
    'singular_name' => _x('Portfolio', 'post type singular name'),
    'add_new' => _x('Add New', 'portfolio_type'),
    'add_new_item' => __("Add New Portfolio"),
    'edit_item' => __("Edit Portfolio"),
    'new_item' => __("New Portfolio"),
    'view_item' => __("View Portfolio"),
    'search_items' => __("Search Portfolio"),
    'not_found' => __('No portfolies found'),
    'not_found_in_trash' => __('No portfolies found in Trash'),
    'parent_item_colon' => ''
);
$portfolio_type_args = array(
    'labels' => $portfolio_type_labels,
    'public' => true,
    'publicly_portfoliable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'capability_type' => 'post',
    'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'tags'),
    'menu_icon' => get_bloginfo('template_directory') . '/images/photo-album.png' //16x16 png if you want an icon
);
register_post_type('portfolio_type', $portfolio_type_args);
//----------------------------------------------
//------------------------create custom taxonomy
//----------------------------------------------
add_action('init', 'jss_create_portfolio_type_taxonomies', 0);
function jss_create_portfolio_type_taxonomies()
{
    register_taxonomy(
        'phototype', 'portfolio_type',
        array(
            'hierarchical' => true,
            'label' => 'Portfolio Types',
            'singular_label' => 'Portfolio Type',
            'rewrite' => true
        )
    );
}

//----------------------------------------------
//--------------------------admin custom columns
//----------------------------------------------
//admin_init
add_action('manage_posts_custom_column', 'jss_custom_columns');
add_filter('manage_edit-portfolio_type_columns', 'jss_add_new_portfolio_type_columns');
function jss_add_new_portfolio_type_columns($columns)
{
    $columns = array(
        'cb' => '<input type="checkbox">',
        'jss_post_thumb' => 'Thumbnail',
        'title' => 'Portfolio Photo Title',
        'phototype' => 'Portfolio Photo Type',
        'author' => 'Author',
        'date' => 'Date'
    );
    return $columns;
}

function jss_custom_columns($column)
{
    global $post;
    switch ($column) {
        case 'jss_post_thumb' :
            echo the_post_thumbnail('admin-list-thumb');
            break;
        case 'description' :
            the_excerpt();
            break;
        case 'phototype' :
            echo get_the_term_list($post->ID, 'phototype', '', ', ', '');
            break;
    }
}

//add thumbnail images to column
add_filter('manage_posts_columns', 'jss_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'jss_add_post_thumbnail_column', 5);
add_filter('manage_custom_post_columns', 'jss_add_post_thumbnail_column', 5);
// Add the column
function jss_add_post_thumbnail_column($cols)
{
    $cols['jss_post_thumb'] = __('Thumbnail');
    return $cols;
}

function jss_display_post_thumbnail_column($col, $id)
{
    switch ($col) {
        case 'jss_post_thumb':
            if (function_exists('the_post_thumbnail'))
                echo the_post_thumbnail('admin-list-thumb');
            else
                echo 'Not supported in this theme';
            break;
    }
}

//----------------------------------------------
//-------------------custom tag cloud generation
//----------------------------------------------
function jss_generate_tag_cloud($tags, $args = '')
{
    global $wp_rewrite;
    //don't touch these defaults or the sky will fall
    $defaults = array(
        'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 0,
        'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
        'topic_count_text_callback' => 'default_topic_count_text',
        'topic_count_scale_callback' => 'default_topic_count_scale', 'filter' => 1
    );
    //determine if the variable is null
    if (!isset($args['topic_count_text_callback']) && isset($args['single_text']) && isset($args['multiple_text'])) {
        //var_export
        $body = 'return sprintf (
	    	_n(' . var_export($args['single_text'], true) . ', ' . var_export($args['multiple_text'], true) . ', $count), number_format_i18n( $count ));';
        //create_function
        $args['topic_count_text_callback'] = create_function('$count', $body);
    }
    //parse arguments from above
    $args = wp_parse_args($args, $defaults);
    //extract the variables
    extract($args);
    //check to see if they are empty and stop
    if (empty($tags))
        return;
    //apply the sort filter
    $tags_sorted = apply_filters('tag_cloud_sort', $tags, $args);
    //check to see if the tags have been pre-sorted
    if ($tags_sorted != $tags) { // the tags have been sorted by a plugin
        $tags = $tags_sorted;
        unset($tags_sorted);
    } else {
        if ('RAND' == $order) {
            shuffle($tags);
        } else {
            // SQL cannot save you
            if ('name' == $orderby)
                uasort($tags, create_function('$a, $b', 'return strnatcasecmp($a->name, $b->name);'));
            else
                uasort($tags, create_function('$a, $b', 'return ($a->count > $b->count);'));
            if ('DESC' == $order)
                $tags = array_reverse($tags, true);
        }
    }
    //check number and slice array
    if ($number > 0)
        $tags = array_slice($tags, 0, $number);
    //set array
    $counts = array();
    //set array for alt tag
    $real_counts = array();
    foreach ((array)$tags as $key => $tag) {
        $real_counts[$key] = $tag->count;
        $counts[$key] = $topic_count_scale_callback($tag->count);
    }
    //determine min coutn
    $min_count = min($counts);
    //default wordpress sizing
    $spread = max($counts) - $min_count;
    if ($spread <= 0)
        $spread = 1;
    $font_spread = $largest - $smallest;
    if ($font_spread < 0)
        $font_spread = 1;
    $font_step = $font_spread / $spread;
    $a = array();
    //iterate thought the array
    foreach ($tags as $key => $tag) {
        $count = $counts[$key];
        $real_count = $real_counts[$key];
        $tag_link = '#' != $tag->link ? esc_url($tag->link) : '#';
        $tag_id = isset($tags[$key]->id) ? $tags[$key]->id : $key;
        $tag_name = $tags[$key]->name;
        //If you want to do some custom stuff, do it here like we did
        //call_user_func
        $a[] = "<a href='#filter' class='tag-link-$tag_id'
		data-option-value='.$tag_name'
		title='" . esc_attr(call_user_func($topic_count_text_callback, $real_count)) . "'>$tag_name</a>"; //background-color is added for validation purposes.
    }
    //set new format
    switch ($format) :
        case 'array' :
            $return =& $a;
            break;
        case 'list' :
            //create our own setup of how it will display and add all
            $return = "<ul id='filters' class='option-set' data-option-key='filter'>\n\t
		<li><a href='filter' data-option-value='*' class='selected'>All</a></li>
		<li>";
            //join
            $return .= join("</li>\n\t<li>", $a);
            $return .= "</li>\n</ul>\n";
            break;
        default :
            //return
            $return = join($separator, $a);
            break;
    endswitch;
    //create new filter hook so we can do this
    return apply_filters('jss_generate_tag_cloud', $return, $tags, $args);
}

//----------------------------------------------
//---------------------custom tag cloud function
//----------------------------------------------
//the function below is very similar to 'wp_tag_cloud()' currently located in: 'wp-includes/category-template.php'
function jss_tag_cloud($args = '')
{
    //set some default
    $defaults = array(
        'format' => 'list', //display as list
        'taxonomy' => 'phototype', //our custom post type taxonomy
        'hide_empty' => 'true',
        'echo' => true, //touch this and it all blows up
        'link' => 'view'
    );
    //use wp_parse to merge the argus and default values
    $args = wp_parse_args($args, $defaults);
    //go fetch the terms of our custom taxonomy. query by descending and order by most posts
    $tags = get_terms($args['taxonomy'], array_merge($args, array('orderby' => 'count', 'order' => 'DESC')));
    //if there are no tags then end function
    if (empty($tags))
        return;
    //set the minimum number of posts the tag must have to display (change to whatever)
    $min_num = 1;
    //logic to display tag or not based on post count
    foreach ($tags as $key => $tag) {
        //if the post container lest than the min_num variable set above
        if ($tag->count < $min_num) {
            //unset it and destroy part of the array
            unset($tags[$key]);
        }
    }
    foreach ($tags as $key => $tag) {
        if ('edit' == $args['link'])
            //display the link to edit the tag, if the user is logged in and has rights
            $link = get_edit_tag_link($tag->term_id, $args['taxonomy']);
        else
            //get the permalink for the taxonomy
            $link = get_term_link(intval($tag->term_id), $args['taxonomy']);
        //check if there is an error
        if (is_wp_error($link))
            return false;
        $tags[$key]->link = $link;
        $tags[$key]->id = $tag->term_id;
    }
    //generate our tag cloud
    $return = jss_generate_tag_cloud($tags, $args); // here is where whe list what we are sorting
    //create a new filter hook
    $return = apply_filters('jss_tag_cloud', $return, $args);
    if ('array' == $args['format'] || empty($args['echo']))
        return $return;
    echo $return;
}

//Hooks a function to a specific filter action.
//hook function to filter
add_filter('wp_tag_cloud', 'jss_tag_cloud');
//----------------------------------------------
//-------------------------get CPT taxonomy name
//----------------------------------------------
function jss_taxonomy_name()
{
    global $post;
    //get terms for CPT
    $terms = get_the_terms($post->ID, 'phototype');
    //iterate through array
    foreach ($terms as $termphoto) {
        //echo taxonomy name as class
        echo ' ' . $termphoto->name;
    }
}

/*--------------*/
/*GALLERY*/
//----------------------------------------------
//----------register and label gallery post type
//----------------------------------------------
$gallery_labels = array(
    'name' => _x('Gallery', 'post type general name'),
    'singular_name' => _x('Gallery', 'post type singular name'),
    'add_new' => _x('Add New', 'gallery'),
    'add_new_item' => __("Add New Gallery"),
    'edit_item' => __("Edit Gallery"),
    'new_item' => __("New Gallery"),
    'view_item' => __("View Gallery"),
    'search_items' => __("Search Gallery"),
    'not_found' => __('No galleries found'),
    'not_found_in_trash' => __('No galleries found in Trash'),
    'parent_item_colon' => ''

);
$gallery_args = array(
    'labels' => $gallery_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'capability_type' => 'post',
    'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'tags'),
    'menu_icon' => get_bloginfo('template_directory') . '/images/photo-album.png' //16x16 png if you want an icon
);
register_post_type('gallery', $gallery_args);


//----------------------------------------------
//------------------------create custom taxonomy
//----------------------------------------------
add_action('init', 'create_gallery_taxonomies', 0);

function create_gallery_taxonomies()
{
    register_taxonomy(
        'gallerytype', 'gallery',
        array(
            'hierarchical' => true,
            'label' => 'Gallery Types',
            'singular_label' => 'Gallery Type',
            'rewrite' => true
        )
    );
}

//----------------------------------------------
//--------------------------admin custom columns
//----------------------------------------------
//admin_init
add_action('manage_posts_custom_column', 'custom_gellary_columns');
add_filter('manage_edit-gallery_columns', 'add_new_gallery_columns');

function add_new_gallery_columns($columns)
{
    $columns = array(
        'cb' => '<input type="checkbox">',
        'post_thumb' => 'Thumbnail',
        'title' => 'Gallery Photo Title',
        'gallerytype' => 'Gallery Photo Type',
        'author' => 'Author',
        'date' => 'Date'

    );
    return $columns;
}

function custom_gellary_columns($column)
{
    global $post;

    switch ($column) {
        case 'post_thumb' :
            echo the_post_thumbnail('admin-list-thumb');
            break;
        case 'description' :
            the_excerpt();
            break;
        case 'gallerytype' :
            echo get_the_term_list($post->ID, 'gallerytype', '', ', ', '');
            break;
    }
}

//add thumbnail images to column
add_filter('manage_posts_columns', 'add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'add_post_thumbnail_column', 5);
add_filter('manage_custom_post_columns', 'add_post_thumbnail_column', 5);

// Add the column
function add_post_thumbnail_column($cols)
{
    $cols['post_thumb'] = __('Thumbnail');
    return $cols;
}

function display_post_thumbnail_columntag_cloud($col, $id)
{
    switch ($col) {
        case 'post_thumb':
            if (function_exists('the_post_thumbnail'))
                echo the_post_thumbnail('admin-list-thumb');
            else
                echo 'Not supported in this theme';
            break;
    }
}

//----------------------------------------------
//-------------------custom tag cloud generation
//----------------------------------------------

function generate_gallery_tag_cloud($tags, $args = '')
{
    global $wp_rewrite;

    //don't touch these defaults or the sky will fall
    $defaults = array(
        'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 0,
        'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
        'topic_count_text_callback' => 'default_topic_count_text',
        'topic_count_scale_callback' => 'default_topic_count_scale', 'filter' => 1
    );

    //determine if the variable is null
    if (!isset($args['topic_count_text_callback']) && isset($args['single_text']) && isset($args['multiple_text'])) {
        //var_export
        $body = 'return sprintf (
	    	_n(' . var_export($args['single_text'], true) . ', ' . var_export($args['multiple_text'], true) . ', $count), number_format_i18n( $count ));';
        //create_function
        $args['topic_count_text_callback'] = create_function('$count', $body);
    }

    //parse arguments from above
    $args = wp_parse_args($args, $defaults);

    //extract the variables
    extract($args);

    //check to see if they are empty and stop
    if (empty($tags))
        return;

    //apply the sort filter
    $tags_sorted = apply_filters('tag_cloud_sort', $tags, $args);

    //check to see if the tags have been pre-sorted
    if ($tags_sorted != $tags) { // the tags have been sorted by a plugin
        $tags = $tags_sorted;
        unset($tags_sorted);
    } else {
        if ('RAND' == $order) {
            shuffle($tags);
        } else {
            // SQL cannot save you
            if ('name' == $orderby)
                uasort($tags, create_function('$a, $b', 'return strnatcasecmp($a->name, $b->name);'));
            else
                uasort($tags, create_function('$a, $b', 'return ($a->count > $b->count);'));

            if ('DESC' == $order)
                $tags = array_reverse($tags, true);
        }
    }
    //check number and slice array
    if ($number > 0)
        $tags = array_slice($tags, 0, $number);

    //set array
    $counts = array();

    //set array for alt tag
    $real_counts = array();

    foreach ((array)$tags as $key => $tag) {
        $real_counts[$key] = $tag->count;
        $counts[$key] = $topic_count_scale_callback($tag->count);
    }

    //determine min coutn
    $min_count = min($counts);

    //default wordpress sizing
    $spread = max($counts) - $min_count;
    if ($spread <= 0)
        $spread = 1;
    $font_spread = $largest - $smallest;
    if ($font_spread < 0)
        $font_spread = 1;
    $font_step = $font_spread / $spread;

    $a = array();

    //iterate thought the array
    foreach ($tags as $key => $tag) {
        $count = $counts[$key];
        $real_count = $real_counts[$key];
        $tag_link = '#' != $tag->link ? esc_url($tag->link) : '#';
        $tag_id = isset($tags[$key]->id) ? $tags[$key]->id : $key;
        $tag_name = $tags[$key]->name;

        //If you want to do some custom stuff, do it here like we did
        //call_user_func
        $a[] = "<a href='#filter' class='tag-link-$tag_id'
		data-option-value='.$tag_name'
		title='" . esc_attr(call_user_func($topic_count_text_callback, $real_count)) . "'>$tag_name</a>"; //background-color is added for validation purposes.
    }

    //set new format
    switch ($format) :
        case 'array' :
            $return =& $a;
            break;
        case 'list' :
            //create our own setup of how it will display and add all
            $return = "<ul id='filters' class='option-set' data-option-key='filter'>\n\t
		<li><a href='filter' data-option-value='*' class='selected'>All</a></li>
		<li>";
            //join
            $return .= join("</li>\n\t<li>", $a);
            $return .= "</li>\n</ul>\n";
            break;
        default :
            //return
            $return = join($separator, $a);
            break;
    endswitch;
    //create new filter hook so we can do this
    return apply_filters('generate_tag_cloud', $return, $tags, $args);
}

//----------------------------------------------
//---------------------custom tag cloud function
//----------------------------------------------

//the function below is very similar to 'wp_tag_cloud()' currently located in: 'wp-includes/category-template.php'
function tag_cloud($args = '')
{
    //set some default
    $defaults = array(
        'format' => 'list', //display as list
        'taxonomy' => 'gallerytype', //our custom post type taxonomy
        'hide_empty' => 'true',
        'echo' => true, //touch this and it all blows up
        'link' => 'view'
    );

    //use wp_parse to merge the argus and default values
    $args = wp_parse_args($args, $defaults);

    //go fetch the terms of our custom taxonomy. query by descending and order by most posts
    $tags = get_terms($args['taxonomy'], array_merge($args, array('orderby' => 'count', 'order' => 'DESC')));

    //if there are no tags then end function
    if (empty($tags))
        return;

    //set the minimum number of posts the tag must have to display (change to whatever)
    $min_num = 1;

    //logic to display tag or not based on post count
    foreach ($tags as $key => $tag) {
        //if the post container lest than the min_num variable set above
        if ($tag->count < $min_num) {
            //unset it and destroy part of the array
            unset($tags[$key]);
        }
    }

    foreach ($tags as $key => $tag) {
        if ('edit' == $args['link'])

            //display the link to edit the tag, if the user is logged in and has rights
            $link = get_edit_tag_link($tag->term_id, $args['taxonomy']);
        else
            //get the permalink for the taxonomy
            $link = get_term_link(intval($tag->term_id), $args['taxonomy']);

        //check if there is an error
        if (is_wp_error($link))
            return false;

        $tags[$key]->link = $link;
        $tags[$key]->id = $tag->term_id;
    }
    //generate our tag cloud
    $return = generate_tag_cloud($tags, $args); // here is where whe list what we are sorting

    //create a new filter hook
    $return = apply_filters('tag_cloud', $return, $args);

    if ('array' == $args['format'] || empty($args['echo']))
        return $return;

    echo $return;
}

//Hooks a function to a specific filter action.
//hook function to filter
add_filter('wp_tag_cloud', 'tag_cloud');

//----------------------------------------------
//-------------------------get CPT taxonomy name
//----------------------------------------------
function taxonomy_gallery()
{
    global $post;

    //get terms for CPT
    $terms = get_the_terms($post->ID, 'gallerytype');
    //iterate through array
    foreach ($terms as $termphoto) {
        //echo taxonomy name as class
        echo ' ' . $termphoto->name;
    }
}