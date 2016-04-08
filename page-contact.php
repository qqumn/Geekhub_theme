<?php
/*
Template Name: Contact
 */
?>
<?php get_header(); ?>
    <div class="container-elastic">
        <?php
        get_sidebar();
        ?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <?php
                if (have_posts()) :

                    if (is_home() && !is_front_page()) : ?>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>

                        <?php
                    endif;

                    /* Start the Loop */
                    while (have_posts()) : the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->

                        </article><!-- #post-## -->
                    <?php endwhile;

                    the_posts_navigation();

                else :

                    get_template_part('template-parts/content', 'none');

                endif; ?>

            </main><!-- #main -->
        </div><!-- #primary -->

    </div>
<?php
get_footer();