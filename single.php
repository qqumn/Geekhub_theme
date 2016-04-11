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

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                        <header class="entry-header">
                            <div class="post-thumbnail">                            <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } ?>
                            </div>
                            <h2 class="single-article-title"><a
                                    href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
                            <span class="author-meta"> by <span
                                    class="author-name"><?php the_author(); ?></span>, <?php the_date(); ?></span>
                            <?php the_tags('', ' • ', ''); ?>
                        </header><!-- .entry-header -->
                        <div class="entry-content">
                            <?php
                            the_content();
                            ?>
                        </div><!-- .entry-content -->
                        <div class="postreply">
                            <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif; ?>
                        </div>
                    </article><!-- #post-## -->


                <?php endwhile; // End of the loop.
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
<?php
get_footer();
