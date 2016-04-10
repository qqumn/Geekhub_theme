<?php
/*Template Name: Slideshow*/

get_header(); ?>
    <div class="container-elastic">
        <?php
        get_sidebar();
        ?>
        <div id="primary" class="content-area portfolio-full-width">
            <main id="main" class="site-main" role="main">
                <section class="slider-wrapper">
                    <div class="flexslider">
                        <?php $query = new WP_Query(array('post_type' => 'gallery', 'posts_per_page' => 24)); ?>
                        <?php if ($query->have_posts()) : ?>
                            <ul class="slideshow slides">
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <li class="slideshow-item">
                                        <div class="slideshow-thumbnail">
                                            <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail();
                                            } ?>
                                        </div>
                                        <div class="slideshow-rollover">
                                                <h3 class="feature-title">
                                                    <?php trim_title_chars(10, ' ...'); ?>
                                                </h3>
                                            <div class="feature-content"><?php echo wp_trim_words(get_the_content(), 15); ?></div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php else :
                            get_template_part('template-parts/content', 'none');
                        endif; ?>
                        <?php wp_reset_query(); ?>
                        </ul>
                    </div>
                </section>
            </main><!-- #main -->
        </div><!-- #primary -->

    </div>
<?php
get_footer();
