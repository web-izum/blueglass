<?php
/**
 * Twenty Twenty SVG Icon helper functions
 */

if ( ! function_exists( 'blueglass_the_theme_svg' ) ) {
	/**
	 * Output and Get Theme SVG.
	 * Output and get the SVG markup for an icon in the TwentyTwenty_SVG_Icons class.
	 *
	 * @param string $svg_name The name of the icon.
	 * @param string $group    The group the icon belongs to.
	 * @param string $color    Color code.
	 */
	function blueglass_the_theme_svg( $svg_name, $group = 'ui', $color = '' ) {
		echo blueglass_get_theme_svg( $svg_name, $group, $color ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in twentytwenty_get_theme_svg().
	}
}

if ( ! function_exists( 'blueglass_get_theme_svg' ) ) {

	/**
	 * Get information about the SVG icon.
	 * @param string $svg_name The name of the icon.
	 * @param string $group    The group the icon belongs to.
	 * @param string $color    Color code.
	 */
	function blueglass_get_theme_svg( $svg_name, $group = 'ui', $color = '' ) {

		// Make sure that only our allowed tags and attributes are included.
		$svg = SVG_Icons::get_svg( $svg_name, $group, $color );

		if ( ! $svg ) {
			return false;
		}
		return $svg;
	}
}
