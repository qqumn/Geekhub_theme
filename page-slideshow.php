<?php
/*Template Name: Slideshow*/

get_header(); ?>
    <div class="container-elastic">
        <?php
        get_sidebar();
        ?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <h3 class="page-title"><?php the_title() ?></h3>
                <?php $query = new WP_Query(array('post_type' => 'gallery', 'posts_per_page' => 24)); ?>
                <?php if ($query->have_posts()) : ?>
                    <ul class="gallery">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <li class="gallery-item">
                                <div class="gallery-thumbnail">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } ?>
                                </div>
                                <div class="gallery-rollover">
                                    <a href="<?php the_permalink(); ?>" class="gallery-link">
                                        <h3 class="feature-title">
                                            <?php the_title(); ?>
                                        </h3>
                                    </a>
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
