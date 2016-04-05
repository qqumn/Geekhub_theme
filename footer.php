<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ghtheme
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container-elastic">
        <div class="site-info">
            <a href="#masthead"><span class="fa fa-chevron-up"></span></a>
            <?php printf(esc_html__('Theme: %1$s by %2$s.', 'ghtmeme'), 'ghtmeme', '<a href="http://underscores.me/" rel="designer">gh-wp-team</a>'); ?>
        </div><!-- .site-info -->
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
