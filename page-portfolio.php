<?php
/*Template Name: Gallery*/

get_header(); ?>
    <div class="container-elastic">
        <?php
        get_sidebar();
        ?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main portfolio-page" role="main">
                <div id="options">
                    <?php
                    if (function_exists('jss_tag_cloud')) {
                        jss_tag_cloud($args = '');
                    } else {
                        echo 'Something has gone terribly wrong here!';
                    }
                    ?>
                </div>
                <ul class="portfolio photogal">
                    <?php
                    $wp_query = new WP_Query(
                        array(
                            'posts_per_page' => -1,
                            'post_type' => 'portfolio_type'
                        )
                    );

                    //begine loop
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                        ?>


                        <li class="element portfolio-item <?php if (function_exists('jss_taxonomy_portfolio')) {
                            jss_taxonomy_gallery();
                        } ?>">
                            <div class="portfolio-thumbnail">
                                <a class="fancybox" rel="<?php if (function_exists('jss_taxonomy_name')) {
                                    jss_taxonomy_gallery();
                                } ?>"
                                   href="
                               <?php
                                   $image_id = get_post_thumbnail_id();
                                   $image_url = wp_get_attachment_image_src($image_id, '', true);
                                   echo $image_url[0];
                                   ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            </div>
                            <div class="portfolio-rollover">
                                <a href="<?php the_permalink(); ?>" class="portfolio-link">
                                    <h3 class="portfolio-item-title"><?php trim_title_chars(7, ' ...'); ?></h3>
                                </a>
                                <p class="portfolio-item-content"><?php echo wp_trim_words(get_the_content(), 2); ?></p>
                                <p class="portfolio-item-category">
                                    <?php if( function_exists('jss_taxonomy_portfolio')){ ?>
                                        <a href="<?php the_permalink(); ?>"><?php jss_taxonomy_portfolio('', ' / ', ''); ?></a>
                                    <?php }?>
                                </p>
                        </li><!--end li-->

                    <?php endwhile; // end of the loop. ?>

        </div><!--end content-->
        </main><!-- #main -->
    </div><!-- #primary -->

    </div>
<?php
get_footer();
