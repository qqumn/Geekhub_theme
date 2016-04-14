<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ghtheme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <style type="text/css">
        header > .container-elastic {
            color: inherit !important;
        }

        .social-media-icons > li > a > .fa {
            color: <?php echo get_theme_mod('header-text-color', ''); ?> !important;
        }

        header .search-field {
            color: <?php echo get_theme_mod('header-text-color', ''); ?> !important;
        }

        ::-webkit-input-placeholder {
            color: <?php echo get_theme_mod('header-text-color', ''); ?> !important;
        }

        ::-moz-placeholder {
            color: <?php echo get_theme_mod('header-text-color', ''); ?> !important;
        }

        :-moz-placeholder {
            color: <?php echo get_theme_mod('header-text-color', ''); ?> !important;
        }

        :-ms-input-placeholder {
            color: <?php echo get_theme_mod('header-text-color', ''); ?> !important;
        }

        body {
            background-color: <?php echo get_theme_mod('site-bg', ''); ?> !important;
        }

        #primary p {
            color: <?php echo get_theme_mod('site-text-color', ''); ?> !important;
        }
    </style>
    <script>

    </script>
    <?php wp_head(); ?>
</head>

<body>
<div id="page" class="site">
    <header id="masthead" class="site-header" role="banner"
            style="
                background-color :<?php echo get_theme_mod('header-bg', ''); ?>;
                color: <?php echo get_theme_mod('header-text-color', ''); ?> !important;
                ">
        <div class="container-elastic">
            <div class="container-left">
                <div class="site-branding">
                    <?php
                    if (is_front_page() && is_home()) : ?>
                        <h1 class="site-title"><a
                                style="color: <?php echo get_theme_mod('header-text-color', ''); ?> !important;"
                                href="<?php echo esc_url(home_url('/')); ?>"
                                rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a
                                style="color: <?php echo get_theme_mod('header-text-color', ''); ?> !important;"
                                href="<?php echo esc_url(home_url('/')); ?>"
                                rel="home"><?php bloginfo('name'); ?></a></p>
                        <?php
                    endif; ?>
                </div><!-- .site-branding -->
                <!--            <a class="skip-link screen-reader-text" href="#main"><span class="fa fa-chevron-down"></span></a>-->
                <?php get_search_form(true); ?>
            </div>
            <?php my_social_media_icons() ?>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
