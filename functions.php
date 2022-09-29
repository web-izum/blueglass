<?php
/**
 * Include blueglass function
 */
require get_template_directory() . '/inc/blueglas-link-template.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
require get_template_directory() . '/classes/Them_settings.php';
new Them_settings();

/**
 * Register Customize.
 */
require get_template_directory() . '/classes/Customize.php';

/**
 * Register, Enqueue: Styles and Scripts.
 */
require get_template_directory() . '/classes/Enqueue_scripts.php';
new Enqueue_scripts();

/**
 * Register menus.
 */
require get_template_directory() . '/classes/Register_nav_menu.php';
new Register_nav_menu([
	'primary'  => __( 'Desktop Horizontal Menu', 'blueglass' ),
	'mobile'   => __( 'Mobile Menu', 'blueglass' ),
	'social'   => __( 'Social Menu', 'blueglass' ),
]);

/**
 * Register widgets.
 */
require get_template_directory() . '/classes/Register_widget.php';
$register_widgets = new Register_widget();
$register_widgets->register_footer_widgets();

/**
 * Add general settings.
 */
require get_template_directory() . '/classes/Add_settings.php';
$add_option = new Add_settings();

/*
 * Handle SVG icons.
 */
require get_template_directory() . '/classes/Svg_icons.php';
require get_template_directory() . '/inc/blueglass-svg-icons.php';

/**
 * Displays SVG icons in social links menu.
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $item        Menu item data object.
 * @param int      $depth       Depth of the menu. Used for padding.
 * @param stdClass $args        An object of wp_nav_menu() arguments.
 * @return string The menu item output with social icon.
 */
function blueglass_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' === $args->theme_location ) {
		$svg = SVG_Icons::get_social_link_svg( $item->url );
		if ( empty( $svg ) ) {
			$svg = blueglass_get_theme_svg( 'link' );
		}

		$item_output = str_replace( $item->post_title, $svg, $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'blueglass_nav_menu_social_icons', 10, 4 );

/*
 * GU blocks.
 */
require get_template_directory() . '/blocks/acf_blocks_enable.php';
