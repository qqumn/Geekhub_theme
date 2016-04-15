<?php
/*Template Name: Contact*/

get_header(); ?>
    <div class="container-elastic">
        <?php
        get_sidebar();
        ?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main map-container" role="main">
                <ul class="contact-info">
                    <li id="contact-name"><span class="fa fa-user"> </span> <?php echo get_theme_mod('name', ''); ?>
                    </li>
                    <li id="contact-address"><span class="fa fa-map-marker"> </span> <a
                            href="<?php echo get_theme_mod('address-map', ''); ?>"><?php echo get_theme_mod('address', ''); ?></a>
                    </li>
                    <li id="contact-mail"><span class="fa fa-envelope-o"> </span> <a
                            href="mailto:<?php echo get_theme_mod('mail', ''); ?>"><?php echo get_theme_mod('mail', ''); ?></a>
                    </li>
                </ul>
                <?php echo do_shortcode('[formCustom]') ?>
                <?php echo get_theme_mod('address-iframe', ''); ?>
            </main><!-- #main -->
        </div><!-- #primary -->

    </div>
<?php
get_footer();
?>

