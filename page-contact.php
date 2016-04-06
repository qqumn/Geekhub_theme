<?php
/*Template Name: Contact*/

get_header(); ?>
    <div class="container-elastic">
        <?php
        get_sidebar();
        ?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
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
                    <form action="#">
                        <input type="text" placeholder="Name" name="name" id="name">
                        <input type="text" placeholder="Website" name="website" id="website">
                        <input type="mail" placeholder="Email" name="email" id="email">
                        <textarea name="comment" placeholder="Comment" id="coment" cols="30" rows="10"></textarea>
                        <input type="submit" value="Send">
                    </form>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->

    </div>
<?php
get_footer();
