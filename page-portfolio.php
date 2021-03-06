<?php
/*Template Name: Portfolio*/

get_header(); ?>
    <div class="container-elastic">
        <?php
        get_sidebar();
        ?>
        <div id="primary" class="content-area">
            <ul class="cats"><?php wp_list_categories(array(
                    'taxonomy' => 'portfolio_cats',
                    'hide_empty' => false,
                    'title_li' => ''
                )) ?></ul>
            <?php $query = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 18)); ?>
            <?php if ($query->have_posts()) : ?>
                <ul class="portfolio-showcase ">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li class="portfolio-pic">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } ?>
                            <div class="rollover">
                                <h3 class="item-title">
                                    <?php the_title(); ?>
                                </h3>

                                <p><?php echo wp_trim_words(the_content(), 20) ?></p>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else :
                get_template_part('template-parts/content', 'none');
            endif; ?>
            <?php wp_reset_query(); ?>
        </div><!-- #primary -->

    </div>
<?php
get_footer();
