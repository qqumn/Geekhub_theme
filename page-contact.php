<?php
/*Template Name: Contact*/

get_header(); ?>
        <div class="container-elastic">
            <?php
            get_sidebar();
            ?>
            <?php echo get_theme_mod('address-iframe', ''); ?>
            <div id="primary" class="content-area">
                <main id="main" class="site-main map-container" role="main">
                            <ul class="contact-info">
                                    <li id="contact-name"><?php echo get_theme_mod('name', ''); ?></li>
                                    <li id="contact-address"><a
                                                    href="<?php echo get_theme_mod('address-map', ''); ?>"><?php echo get_theme_mod('address', ''); ?></a>
                                        </li>
                                    <li id="contact-mail"><a
                                                    href="mailto:<?php echo get_theme_mod('mail', ''); ?>"><?php echo get_theme_mod('mail', ''); ?></a>
                                        </li>
                                </ul>
                            <div class="contact-form">
                            </div>
                        </main><!-- #main -->
                </div><!-- #primary -->

        </div>
    <?php
get_footer();