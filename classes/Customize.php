<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if(! class_exists( 'Customize' )) :

class Customize {

	public static function register($wp_customize)
	{
		// Add Footer Logo
		$wp_customize->add_setting('footer_logo', array(
			'default' => '',
			'sanitize_callback' => '',
		));

		$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
			'section' => 'title_tagline',
			'label' => __('Footer Logo', 'blueglass')
		)));

		$wp_customize->selective_refresh->add_partial('footer_logo', array(
			'selector' => '.footer_logo',
			'render_callback' => function() {
				$logo = get_theme_mod('footer_logo');
				$img = wp_get_attachment_image_src($logo, 'full');
				if ($img) {
					return '<img src="' . $img[0] . '" alt="">';
				} else {
					return '';
				}
			}
		));
	}
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Customize' , 'register' ) );
endif;