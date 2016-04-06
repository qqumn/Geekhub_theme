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
                <h3 class="page-title"><?php the_title() ?></h3>
                <?php $query = new WP_Query(array('post_type' => 'features', 'posts_per_page' => 18)); ?>
                <?php if ($query->have_posts()) : ?>
                    <ul class="features-list">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <li class="feature">
                                <div class="feature-thumbnail">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } ?>
                                </div>
                                <div class="feature-meta">
                                    <h3 class="feature-title">
                                        <?php the_title(); ?>
                                    </h3>
                                    <div class="feature-text">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else :
                    get_template_part('template-parts/content', 'none');
                endif; ?>
                <?php wp_reset_query(); ?>
            </main><!-- #main -->
        </div><!-- #primary -->

    </div>
<?php
get_footer();
