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

</div>
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider.js"></script>
<script type="text/javascript">
    // Can also be used with $(document).ready()
    jQuery(window).load(function () {
        jQuery('.flexslider').flexslider({
            animation: "slide"
        });
    });
</script>
</body>
</html>