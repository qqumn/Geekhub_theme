<?php
/*Template Name: Gallery*/

get_header(); ?>
    <div class="container-elastic">
        <?php
        get_sidebar();
        ?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main gallery-page" role="main">
<!--                <h3 class="page-title">--><?php //the_title() ?><!--</h3>-->
<!--                <div id="options">-->
                    <?php
                    if( function_exists( 'tag_cloud' )) {
                        jss_tag_cloud( $args = '' );
                    } else {
                        echo 'Something has gone terribly wrong here!';
                    }
                    ?>
<!--                </div>-->
                <ul class="gallery photogal">
                <?php
                $wp_query = new WP_Query(
                    array(
                        'posts_per_page'	=>	-1,
                        'post_type'			=>	'gallery'
                    )
                );

                //begine loop
                while ($wp_query->have_posts()) : $wp_query->the_post();
                    ?>


                    <li class="element gallery-item <?php if( function_exists('taxonomy_gallery')){ taxonomy_gallery(); }?>">
                        <div class="gallery-thumbnail">
                            <a class="fancybox" rel="<?php if( function_exists('taxonomy_gallery')){ taxonomy_gallery(); }?>"
                               href="
                               <?php
                               $image_id = get_post_thumbnail_id();
                               $image_url = wp_get_attachment_image_src($image_id,'', true);
                               echo $image_url[0];
                               ?>">
                               <?php the_post_thumbnail();?>
                            </a>
                        </div>
                        <div class="gallery-rollover">
                            <a href="<?php the_permalink(); ?>" class="gallery-link">
                                <h3 class="gallery-item-title"><?php the_title(); ?></h3>
                            </a>
                            <p class="gallery-item-content"><?php echo wp_trim_words(get_the_content(), 2); ?></p>
<!--                        <a href="--><?php //the_permalink(); ?><!--">--><?php //if( function_exists('taxonomy_gallery')){ taxonomy_gallery('', ' / ', ''); }?><!--</a>-->
                    </li><!--end li-->

                <?php endwhile; // end of the loop. ?>

        </div><!--end content-->
            </main><!-- #main -->
        </div><!-- #primary -->

    </div>
<?php
get_footer();
