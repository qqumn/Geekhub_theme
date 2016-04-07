<?php
/*Template Name: Features */

get_header(); ?>
    <div class="container-elastic">
        <?php
        get_sidebar();
        ?>
        <div id="primary" class="content-area">
            <div class="features-block">
            <main id="main" class="site-main" role="main">
                <h3 class="page-title"><?php the_title() ?></h3>
                <?php $query = new WP_Query(array('post_type' => 'features', 'posts_per_page' => 18)); ?>
                <?php if ($query->have_posts()) : ?>
                    <ul class="features-list">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <li class="feature">
                                    <?php if (has_post_thumbnail()) {?>
                                        <div class="feature-thumbnail" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID))[0]; ?>);"></div>
                                    <?php } ?>
                                <div class="feature-meta">
                                    <h3 class="feature-title">
                                        <?php the_title(); ?>
                                    </h3>
                                    <div class="feature-text">
                                        <?php
                                        echo wp_trim_words(get_the_content(), 20);
                                        ?>
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
            </div><!--features-block-->
        </div><!-- #primary -->

    </div>
<?php
get_footer();
