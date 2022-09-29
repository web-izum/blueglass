<?php

if(! class_exists( 'Enqueue_scripts' )) :

class Enqueue_scripts {

	public function __construct()
	{
		add_action( 'wp_enqueue_scripts',    [$this, 'register_styles'] );
		add_action( 'wp_enqueue_scripts',    [$this, 'register_scripts'] );
		add_action( 'admin_enqueue_scripts', [$this, 'register_wp_admin_style'] );
	}

	public function register_styles()
	{
		wp_enqueue_style( 'blueglass-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
		wp_enqueue_style( 'blueglass-main-style', get_template_directory_uri() . '/assets/dist/css/main.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	public function register_scripts()
	{
		wp_enqueue_script( 'blueglass-js', get_template_directory_uri() . '/assets/dist/js/main.js', array(), wp_get_theme()->get( 'Version' ), true );
		wp_script_add_data( 'blueglass-js', 'async', true );
	}

	public function register_wp_admin_style()
	{
		wp_enqueue_style( 'blueglass-wp-admin', get_template_directory_uri() .'/assets/dist/css/wp-admin.css' );
	}
}

endif;