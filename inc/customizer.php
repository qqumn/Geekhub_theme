<?php
/**
 * ghtheme Theme Customizer.
 *
 * @package ghtheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ghtmeme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section('my_social_settings', array(
		'title' => __('Social Media Icons', 'text-domain'),
		'priority' => 35,
	));

	$social_sites = my_customizer_social_media_array();
	$priority = 5;
	foreach ($social_sites as $social_site) {

		$wp_customize->add_setting("$social_site", array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		));

		$wp_customize->add_control($social_site, array(
			'label' => __("$social_site url:", 'text-domain'),
			'section' => 'my_social_settings',
			'type' => 'text',
			'priority' => $priority,
		));

		$priority = $priority + 5;
	}

}
add_action( 'customize_register', 'ghtmeme_customize_register' );


function my_customizer_social_media_array()
{

	/* store social site names in array */
	$social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');

	return $social_sites;
}



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ghtmeme_customize_preview_js() {
	wp_enqueue_script( 'ghtmeme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ghtmeme_customize_preview_js' );
