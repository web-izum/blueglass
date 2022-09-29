<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if(! class_exists( 'Register_nav_menu' )) :

class Them_settings {

	public function __construct() {
		add_action( 'after_setup_theme', [$this, 'theme_support'] );
	}

	public static function theme_support()
	{
		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Enable support Menus.
		add_theme_support( 'menus' );

		//Selective Refresh in the Customizer
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style', 'navigation-widgets'));

		// Custom logo.
		$logo_width  = 108;
		$logo_height = 42;

		add_theme_support( 'custom-logo', array( 'height' => $logo_height, 'width' => $logo_width, 'flex-height' => true, 'flex-width' => true ) );

		// Adds links to RSS feeds of posts and comments in the head part of the HTML document.
		add_theme_support( 'automatic-feed-links' );

		// Make theme available for translation.
		load_theme_textdomain( 'blueglass' );

		// Add image size for Proposal Block
		add_image_size('proposal-image', 580, 630);
		// Add image size for Hero slider
		add_image_size('slider-xxl', 1920, 800, true);//w1920
		add_image_size('slider-xl', 1600, 800, true);//w1600
		add_image_size('slider-lg', 992, 590,true);//w992
		add_image_size('slider-sm', 576, 590, true);//w576
		add_image_size('slider-mob', 460, 590, true);// 460

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );
	}

}

endif;