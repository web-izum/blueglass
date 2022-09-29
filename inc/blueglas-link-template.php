<?php
/**
 * Retrieves the URL to the terms conditions page.
 */
function get_terms_conditions_url() {
	$url            = '';
	$page_id = (int) get_option( 'Select_Terms_Conditions' );

	if ( ! empty( $page_id ) && get_post_status( $page_id ) === 'publish' ) {
		$url = (string) get_permalink( $page_id );
	}

	/**
	 * Filters the URL of the privacy policy page.
	 *
	 * @param string $url The URL to the privacy policy page. Empty string if it doesn't exist.
	 * @param int    $policy_page_id The ID of privacy policy page.
	 */
	return apply_filters( 'terms_conditions_url', $url, $page_id );
}

/**
 * Displays the privacy policy link with formatting, when applicable.
 *
 * @param string $before Optional. Display before privacy policy link. Default empty.
 * @param string $after  Optional. Display after privacy policy link. Default empty.
 */
function the_terms_conditions_link( $before = '', $after = '' ) {
	echo get_the_terms_conditions_link( $before, $after );
}

/**
 * Returns the privacy policy link with formatting, when applicable.
 *
 * @param string $before Optional. Display before privacy policy link. Default empty.
 * @param string $after  Optional. Display after privacy policy link. Default empty.
 * @return string Markup for the link and surrounding elements. Empty string if it doesn't exist.
 */
function get_the_terms_conditions_link( $before = '', $after = '' ) {
	$link               = '';
	$page_url = get_terms_conditions_url();
	$page_id     = (int) get_option( 'Select_Terms_Conditions' );
	$page_title         = ( $page_id ) ? get_the_title( $page_id ) : '';

	if ( $page_url && $page_title ) {
		$link = sprintf(
			'<a class="privacy-policy-link" href="%s">%s</a>',
			esc_url( $page_url ),
			esc_html( $page_title )
		);
	}

	/**
	 * Filters the privacy policy link.
	 * @param string $link The privacy policy link. Empty string if it doesn't exist.
	 * @param string $privacy_policy_url The URL of the privacy policy. Empty string if it doesn't exist.
	 */
	$link = apply_filters( 'terms_conditions_url', $link, $page_url );

	if ( $link ) {
		return $before . $link . $after;
	}

	return '';
}