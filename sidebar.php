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
	<div class="site-branding">
		<?php
		if (is_front_page() && is_home()) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
									  rel="home"><?php bloginfo('name'); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
									 rel="home"><?php bloginfo('name'); ?></a></p>
			<?php
		endif;

		$description = get_bloginfo('description', 'display');
		if ($description || is_customize_preview()) : ?>
			<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
		endif; ?>
	</div><!-- .site-branding -->
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<?php _e('Navigation', 'ghtheme') ?>
		<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
	</nav><!-- #site-navigation -->
</aside><!-- #secondary -->
