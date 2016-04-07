<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ghtheme
 */


?>

<aside id="secondary" class="widget-area" role="complementary">
	<h1 class="sidebar-header">
		<a href="<?php echo get_site_url(); ?>">
			<img src="<?php echo get_theme_mod('image', ''); ?>"/>
			
		</a>
	</h1>
	<nav id="site-navigation" class="main-navigation" role="navigation">
<!--		--><?php //_e('Navigation', 'ghtheme') ?>
		<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
	</nav><!-- #site-navigation -->
</aside><!-- #secondary -->
