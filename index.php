<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
            <?php
            if (have_posts()) :

                if (is_home() && !is_front_page()) : ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>

                    <?php
                endif;

                /* Start the Loop */
                while (have_posts()) : the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
                    <header class="entry-header">
                        <div class="post-thumbnail">                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } ?>
                        </div>
                        <h2 class="article-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
                        <?php the_tags('', ' • ', ''); ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php
                        echo wp_trim_words(get_the_content(), 55, '<a class="read-more" href="' . get_permalink() . '">Read more</a>');
                        ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                        <a class="post-footer-date" href="<?php the_permalink(); ?>"><span
                                class="fa fa-clock"></span><?php the_date('d-m-Y') ?></a>

                        <a class="post-footer-comments" href="<?php the_permalink(); ?>"><span
                                class="fa fa-envelope"></span><?php comments_number('no comments', 'one comment', '% comments'); ?>
                        </a>
                    </footer><!-- .entry-footer -->
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
