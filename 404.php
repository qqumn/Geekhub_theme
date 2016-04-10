<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ghtheme
 */

get_header(); ?>
    <div class="container-elastic">
        <?php
        get_sidebar();
        ?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <section class="error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('404 - Oops!', 'ghtmeme'); ?></h1>
                    </header><!-- .page-header -->

                    <div class="page-content">
                        <p class="main-information"><?php _e('The page you are trying to reach can&apos;t be found', 'ghtmeme'); ?></p>
                    <p class="addition-information"><?php _e('Try refining your search, or use the navigation above to locate the post.', 'liquidfolio'); ?></p>
                    <p class="back-home"><a href="<?php echo get_home_url() ?>"
                        <a href="<?php echo get_home_url() ?>"><?php _e('back to home', 'ghtmeme'); ?></a>
                    </p>
        </div><!-- .page-content -->
        </section><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->
</div>
<?php
get_footer();
