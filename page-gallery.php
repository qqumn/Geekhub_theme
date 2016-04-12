<?php
/*Template Name: Gallery*/

get_header(); ?>
    <div class="container-elastic">
        <?php
        get_sidebar();
        ?>
        <div id="primary" class="content-area">
            <ul class="cats"><?php wp_list_categories(array(
                    'taxonomy' => 'gallery_cats',//cats,kitties,kittens
                    'hide_empty' => false,
                    'title_li' => ''
                )) ?></ul>
            <?php $query = new WP_Query(array('post_type' => 'gallery', 'posts_per_page' => 18)); ?>
            <?php if ($query->have_posts()) : ?>
                <ul class="gallery-showcase">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li class="gallery-pic">
                            <a href="<?php the_permalink() ?>" class="fancybox">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } ?>
                                <div class="rollover">
                                    <h3 class="item-title">
                                        <?php the_title(); ?>
                                    </h3>
                                </div>
                                </a>
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
