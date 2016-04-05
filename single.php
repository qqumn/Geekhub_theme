<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ghtheme
 */

get_header(); ?>
    <div class="container-elastic">
        <?php get_sidebar(); ?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php
                while (have_posts()) :
                    the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" class="single-post"<?php post_class(); ?> >
                        <header class="entry-header">
                            <div class="post-thumbnail">                            <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } ?>
                            </div>
                            <h2 class="single-article-title"><a
                                    href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
                            <?php the_tags('', ' • ', ''); ?>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <?php
                            echo wp_trim_words(get_the_content(), 55, '<a class="read-more" href="' . get_permalink() . '">Read more</a>');
                            ?>
                        </div><!-- .entry-content -->

                        <footer class="entry-footer">
                            <p class="footer-author"><?php the_author(); ?> on <span
                                    class="fa fa-clock"></span><?php the_date('d-m-Y') ?></p>
                        </footer><!-- .entry-footer -->
                    </article><!-- #post-## -->

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
<?php
get_footer();
