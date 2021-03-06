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
	/* 4.2 Footer data customizer */
	$wp_customize->add_section('contact_data', array(
		'title' => __('Contact data', 'ghdev'),
		'priority' => 120
	));
	$wp_customize->add_setting('mail', array(
		'default' => 'mail@host.com',
		'transport' => 'refresh'
	));
	$wp_customize->add_setting('address', array(
		'default' => 'Street City 123',
		'transport' => 'refresh'
	));
	$wp_customize->add_setting('name', array(
		'default' => 'LExa Lexa',
		'transport' => 'refresh'
	));
	$wp_customize->add_setting('address-map', array(
		'default' => '',
		'transport' => 'refresh'
	));
	$wp_customize->add_setting('address-iframe', array(
		'default' => '<iframe src="https://www.google.com/maps/d/embed?mid=z2N67GlBupFo.kmu8VpDq63ns" width="640" height="480"></iframe>',
		'transport' => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'mail-input', array(
		'label' => __('Email', 'ghdev'),
		'section' => 'contact_data',
		'settings' => 'mail',
		'priority' => 1
	)));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'name-input', array(
		'label' => __('Name', 'ghdev'),
		'section' => 'contact_data',
		'settings' => 'name',
		'priority' => 1
	)));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'address-input', array(
		'label' => __('Address', 'ghdev'),
		'section' => 'contact_data',
		'settings' => 'address',
		'priority' => 1
	)));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'address-map', array(
		'label' => __('Google maps link', 'ghdev'),
		'section' => 'contact_data',
		'settings' => 'address-map',
		'priority' => 1
	)));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'address-iframe', array(
		'label' => __('Google maps iframe', 'ghdev'),
		'section' => 'contact_data',
		'settings' => 'address-iframe',
		'priority' => 1
	)));
	/* 4.3 header logo customizer */
	$wp_customize->add_section('ghdev_logo', array(
		'title' => __('Logo image', 'ghdev'),
		'priority' => 120
	));
	$wp_customize->add_setting('image', array(
		'default' => 'none',
		'transport' => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Logo image', 'ghdev'),
		'section' => 'ghdev_logo',
		'settings' => 'image',
		'priority' => 1
	)));

	$wp_customize->add_section('header_colours', array(
		'title' => __('Header colours', 'ghdev'),
		'priority' => 120
	));
	$wp_customize->add_setting('header-bg', array(
		'default' => '#db4437',
		'transport' => 'refresh'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'head_bg_color',
			array(
				'label' => __('Header Background Color', 'ghdev'),
				'section' => 'header_colours',
				'settings' => 'header-bg',
			))
	);
	$wp_customize->add_setting('header-text-color', array(
		'default' => '#fff',
		'transport' => 'refresh'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'head_txt_color',
			array(
				'label' => __('Header Text Color', 'ghdev'),
				'section' => 'header_colours',
				'settings' => 'header-text-color',
			))
	);


	$wp_customize->add_section('site_colours', array(
		'title' => __('Colors', 'ghdev'),
		'priority' => 120
	));
	$wp_customize->add_setting('site-bg', array(
		'default' => '#323335',
		'transport' => 'refresh'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_bg_colour',
			array(
				'label' => __('Header Background Color', 'ghdev'),
				'section' => 'site_colours',
				'settings' => 'site-bg',
			))
	);
	$wp_customize->add_setting('site-text-color', array(
		'default' => '#363636',
		'transport' => 'refresh'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_text_colour',
			array(
				'label' => __('Site Text Color', 'ghdev'),
				'section' => 'site_colours',
				'settings' => 'site-text-color',
			))
	);


}
add_action( 'customize_register', 'ghtmeme_customize_register' );


function my_customizer_social_media_array()
{

	/* store social site names in array */
	$social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');

	return $social_sites;
}



