<?php
/*Template Name: Portfolio*/

get_header(); ?>
    <div class="container-elastic">
        <?php
        get_sidebar();
        ?>
        <div id="primary" class="content-area">
            <div class="button-group filter-button-group">
                <button data-filter="*">All</button>
                <?php
                $cats = get_categories(array(
                    'taxonomy' => 'portfolio_cats',
                    'hide_empty' => true,
                    'title_li' => ''
                ));


                foreach ($cats as $cat) {
                    ?>
                    <button
                        data-filter=".portfolio_cats-<?php echo $cat->category_nicename ?>"> <?php echo $cat->cat_name ?></button>

                    <?php
                }
                ?>
            </div>

            <?php $query = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 18)); ?>
            <?php if ($query->have_posts()) : ?>
                <ul class="portfolio-showcase ">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li <?php post_class(); ?>>
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } ?>
                            <div class="rollover">
                                <h3 class="item-title">
                                    <?php trim_title_chars(7, ' ...'); ?>
                                </h3>

                                <p><?php echo substr(get_the_content(), 0, 20) ?></p>
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
?>
