<?php
/**
 * Custom icons for this theme.
 */

if ( ! class_exists( 'SVG_Icons' ) ) :
	/**
	 * SVG ICONS CLASS
	 * Retrieve the SVG code for the specified icon.
	 */
	class SVG_Icons {
		/**
		 * GET SVG CODE
		 * Get the SVG code for the specified icon
		 *
		 * @param string $icon  Icon name.
		 * @param string $group Icon group.
		 * @param string $color Color.
		 */
		public static function get_svg( $icon, $group = 'ui', $color = '#fff' ) {
			if ( 'ui' === $group ) {
				$arr = self::$ui_icons;
			} elseif ( 'social' === $group ) {
				$arr = self::$social_icons;
			} else {
				$arr = array();
			}

			/**
			 * Filters array of icons.
			 * @param array $arr Array of icons.
			 */
			$arr = apply_filters( "blueglass_svg_icons_{$group}", $arr );

			/**
			 * Filters an SVG icon's color.
			 * @param string $color The icon color.
			 * @param string $icon  The icon name.
			 * @param string $group The icon group.
			 */
			$color = apply_filters( 'blueglass_svg_icon_color', $color, $icon, $group );

			if ( array_key_exists( $icon, $arr ) ) {
				$repl = '<svg class="svg-icon" aria-hidden="true" role="img" focusable="false" ';
				$svg  = preg_replace( '/^<svg /', $repl, trim( $arr[ $icon ] ) ); // Add extra attributes to SVG code.
				$svg  = str_replace( '#FFF', $color, $svg );   // Replace the color.
				$svg  = str_replace( '#', '%23', $svg );  // Urlencode hashes.
				$svg  = preg_replace( "/([\n\t]+)/", ' ', $svg ); // Remove newlines & tabs.
				$svg  = preg_replace( '/>\s*</', '><', $svg );    // Remove whitespace between SVG tags.
				return $svg;
			}
			return null;
		}

		/**
		 * GET SOCIAL LINK SVG
		 * Detects the social network from a URL and returns the SVG code for its icon.
		 * @param string $uri The URL to retrieve SVG for.
		 */
		public static function get_social_link_svg( $uri ) {
			static $regex_map; // Only compute regex map once, for performance.
			if ( ! isset( $regex_map ) ) {
				$regex_map = array();

				/**
				 * Filters array of domain mappings for social icons.
				 * @param array $social_icons_map Array of default social icons.
				 */
				$map = apply_filters( 'blueglass_social_icons_map', self::$social_icons_map );

				/**
				 * Filters array of social icons.
				 * @param array $social_icons Array of default social icons.
				 */
				$social_icons = apply_filters( 'blueglass_svg_icons_social', self::$social_icons );

				foreach ( array_keys( $social_icons ) as $icon ) {
					$domains            = array_key_exists( $icon, $map ) ? $map[ $icon ] : array( sprintf( '%s.com', $icon ) );
					$domains            = array_map( 'trim', $domains ); // Remove leading/trailing spaces, to prevent regex from failing to match.
					$domains            = array_map( 'preg_quote', $domains );
					$regex_map[ $icon ] = sprintf( '/(%s)/i', implode( '|', $domains ) );
				}
			}
			foreach ( $regex_map as $icon => $regex ) {
				if ( preg_match( $regex, $uri ) ) {
					return blueglass_get_theme_svg( $icon, 'social' );
				}
			}
			return null;
		}

		/**
		 * ICON STORAGE
		 * Store the code for all SVGs in an array.
		 * @var array
		 */
		public static $ui_icons = array(
			'arrow-down' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="24" viewBox="0 0 22 24"><polygon fill="#FFF" points="721.105 856 721.105 874.315 728.083 867.313 730.204 869.41 719.59 880 709 869.41 711.074 867.313 718.076 874.315 718.076 856" transform="translate(-709 -856)"/></svg>',

			'hamburger'  => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="#292D32"><path d="M3 7h18M3 12h18M3 17h18" stroke-width="1.5" stroke-linecap="round"/></svg>',

			'close-icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><rect x="4.929" y="3.515" width="22" height="2" rx="1" transform="rotate(45 4.929 3.515)"/><rect x="3.515" y="19.071" width="22" height="2" rx="1" transform="rotate(-45 3.515 19.071)"/></svg>',

			'link'       => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path d="M6.70846497,10.3082552 C6.43780491,9.94641406 6.5117218,9.43367048 6.87356298,9.16301045 C7.23540415,8.89235035 7.74814771,8.96626726 8.01880776,9.32810842 C8.5875786,10.0884893 9.45856383,10.5643487 10.4057058,10.6321812 C11.3528479,10.7000136 12.2827563,10.3531306 12.9541853,9.68145807 L15.3987642,7.23705399 C16.6390369,5.9529049 16.6212992,3.91168563 15.3588977,2.6492841 C14.0964962,1.38688258 12.0552769,1.36914494 10.77958,2.60113525 L9.37230725,4.00022615 C9.05185726,4.31881314 8.53381538,4.31730281 8.21522839,3.99685275 C7.89664141,3.67640269 7.89815174,3.15836082 8.21860184,2.83977385 L9.63432671,1.43240056 C11.5605503,-0.42800847 14.6223793,-0.401402004 16.5159816,1.49220028 C18.4095838,3.38580256 18.4361903,6.44763148 16.5658147,8.38399647 L14.1113741,10.838437 C13.1043877,11.8457885 11.7095252,12.366113 10.2888121,12.2643643 C8.86809903,12.1626156 7.56162126,11.4488264 6.70846497,10.3082552 Z M11.291535,7.6917448 C11.5621951,8.05358597 11.4882782,8.56632952 11.126437,8.83698955 C10.7645959,9.10764965 10.2518523,9.03373274 9.98119227,8.67189158 C9.4124214,7.91151075 8.54143617,7.43565129 7.59429414,7.36781884 C6.6471521,7.29998638 5.71724372,7.64686937 5.04581464,8.31854193 L2.60123581,10.762946 C1.36096312,12.0470951 1.37870076,14.0883144 2.64110228,15.3507159 C3.90350381,16.6131174 5.94472309,16.630855 7.21873082,15.400549 L8.61782171,14.0014581 C8.93734159,13.6819382 9.45538568,13.6819382 9.77490556,14.0014581 C10.0944254,14.320978 10.0944254,14.839022 9.77490556,15.1585419 L8.36567329,16.5675994 C6.43944966,18.4280085 3.37762074,18.401402 1.48401846,16.5077998 C-0.409583822,14.6141975 -0.436190288,11.5523685 1.43418536,9.61600353 L3.88862594,7.16156298 C4.89561225,6.15421151 6.29047483,5.63388702 7.71118789,5.7356357 C9.13190097,5.83738438 10.4383788,6.55117356 11.291535,7.6917448 Z"/></svg>',

			'add'       => '<svg width="24" height="24" viewBox="0 0 24 24" stroke="#292D32" xmlns="http://www.w3.org/2000/svg"><path d="M6 12H18" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M6 12H18" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',

			'checkmark' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99996 18.3334C14.5833 18.3334 18.3333 14.5834 18.3333 10.0001C18.3333 5.41675 14.5833 1.66675 9.99996 1.66675C5.41663 1.66675 1.66663 5.41675 1.66663 10.0001C1.66663 14.5834 5.41663 18.3334 9.99996 18.3334Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.45837 9.99993L8.81671 12.3583L13.5417 7.6416" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',

			'next'      => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.91003 19.9201L15.43 13.4001C16.2 12.6301 16.2 11.3701 15.43 10.6001L8.91003 4.08008" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>',

			'prev'      => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 19.9201L8.47997 13.4001C7.70997 12.6301 7.70997 11.3701 8.47997 10.6001L15 4.08008" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		);

		/**
		 * Social Icons – domain mappings.
		 * @var array
		 */
		public static $social_icons_map = array(
			'amazon'    => array(
				'amazon.com',
				'amazon.cn',
				'amazon.in',
				'amazon.fr',
				'amazon.de',
				'amazon.it',
				'amazon.nl',
				'amazon.es',
				'amazon.co',
				'amazon.ca',
			),
			'behance'   => array(
				'behance.net',
			),
			'codepen'   => array(
				'codepen.io',
			),
			'facebook'  => array(
				'facebook.com',
				'fb.me',
			),
			'feed'      => array(
				'feed',
			),
			'google'    => array(
				'g.page',
			),
			'lastfm'    => array(
				'last.fm',
			),
			'mail'      => array(
				'mailto:',
			),
			'pocket'    => array(
				'getpocket.com',
			),
			'tiktok'    => array(
				'tiktok.com',
			),
			'twitch'    => array(
				'twitch.tv',
			),
			'whatsapp'  => array(
				'wa.me',
				'whatsapp.com',
			),
			'wordpress' => array(
				'wordpress.com',
				'wordpress.org',
			),
		);

		/**
		 * Social Icons – svg sources.
		 * @var array
		 */
		public static $social_icons = array(

			'facebook'   => '<svg width="10" height="16" fill="#fff" xmlns="http://www.w3.org/2000/svg"><path d="M5.72 15.5h.5V9.114h2.083l.056-.436.32-2.489.073-.564H6.22V4.536c0-.338.053-.484.112-.554.042-.05.172-.157.622-.157H8.27l.5-.001V.66L8.335.603A18.09 18.09 0 0 0 6.35.5C5.3.5 4.361.823 3.686 1.49c-.678.67-1.037 1.632-1.037 2.8v1.335H.5v3.49h2.149V15.5h3.07z"/></svg>',

			'instagram'  => '<svg width="14" height="14" fill="#fff" xmlns="http://www.w3.org/2000/svg"><path d="M4.667 7a2.333 2.333 0 1 1 4.667 0 2.333 2.333 0 0 1-4.667 0zM3.406 7a3.594 3.594 0 1 0 7.189 0 3.594 3.594 0 0 0-7.19 0zm6.491-3.737a.84.84 0 1 0 1.68 0 .84.84 0 0 0-1.68 0zm-5.725 9.435c-.682-.03-1.053-.144-1.3-.24a2.174 2.174 0 0 1-.805-.524 2.16 2.16 0 0 1-.524-.805c-.096-.246-.21-.617-.24-1.3-.034-.738-.041-.96-.041-2.829 0-1.87.007-2.09.04-2.829.032-.682.146-1.052.241-1.3.128-.326.28-.56.524-.805.245-.245.478-.397.805-.523.247-.097.618-.21 1.3-.241.738-.034.96-.04 2.828-.04 1.869 0 2.09.006 2.83.04.682.03 1.052.145 1.3.24.326.127.56.28.804.524.246.245.397.479.524.805.096.247.21.618.24 1.3.035.739.042.96.042 2.83 0 1.869-.007 2.09-.041 2.828-.031.683-.146 1.054-.241 1.3-.127.327-.279.56-.524.805a2.175 2.175 0 0 1-.805.524c-.246.096-.617.21-1.3.24-.738.034-.96.041-2.829.041-1.87 0-2.09-.007-2.828-.04zM4.114.042C3.37.076 2.86.194 2.415.368c-.46.178-.85.418-1.24.807a3.42 3.42 0 0 0-.807 1.24c-.174.445-.292.954-.326 1.7C.008 4.86 0 5.098 0 7c0 1.901.008 2.14.042 2.886s.152 1.255.326 1.7c.178.46.417.85.807 1.24.39.388.78.628 1.24.807.446.173.954.291 1.7.325.746.034.984.043 2.885.043 1.901 0 2.14-.008 2.886-.043.746-.034 1.255-.152 1.7-.325.46-.18.85-.418 1.24-.807.39-.39.628-.78.807-1.24.173-.446.292-.954.325-1.7C13.992 9.14 14 8.901 14 7c0-1.9-.008-2.14-.042-2.886-.034-.745-.152-1.254-.325-1.699-.18-.46-.418-.85-.807-1.24a3.426 3.426 0 0 0-1.24-.807c-.446-.174-.954-.292-1.7-.326C9.142.008 8.903 0 7.002 0 5.1 0 4.86.008 4.114.042z"/></svg>',

			'pinterest'  => '<svg width="14" height="17" fill="#fff" xmlns="http://www.w3.org/2000/svg"><path d="M6.179 11.515c.093.064.192.121.292.174.424.219.935.356 1.464.356 3.017 0 5.06-2.762 5.06-5.969C12.996 2.864 10.368.5 7.078.5c-2.014 0-3.599.679-4.68 1.767C1.317 3.352.77 4.813.77 6.321c0 .726.191 1.524.532 2.215.338.685.852 1.32 1.54 1.641m3.337 1.338L2.84 10.177m3.338 1.338-.01.036c-.123.47-.26.99-.316 1.196-.226.876-.842 1.944-1.198 2.518l-.203.326-.368-.113c-.192-.058-.374-.128-.54-.192l-.035-.014-.284-.108-.034-.302c-.079-.687-.175-1.898.03-2.781v-.001c.07-.302.278-1.182.488-2.074a.61.61 0 0 1-.276.215c-.25.099-.481.008-.591-.044m3.337 1.338-3.337-1.338M4.214 7.87a3.93 3.93 0 0 1-.24-1.349c0-1.357.81-2.633 2.091-2.633.513 0 .938.199 1.225.549.275.336.388.768.388 1.189 0 .46-.142.996-.291 1.497l-.139.455c-.114.37-.226.732-.311 1.09L4.214 7.87zm0 0-.1.427-.025.105a.753.753 0 0 0-.181-.368c-.277-.345-.532-1.03-.532-1.678 0-1.684 1.265-3.316 3.469-3.316.965 0 1.753.327 2.298.857.543.53.874 1.29.874 2.22 0 1.11-.28 2.01-.705 2.618-.422.602-.971.907-1.56.907-.576 0-.94-.446-.815-.973l-2.723-.799z"/></svg>',

			'twitter'    => '<svg width="18" height="15" fill="#fff" xmlns="http://www.w3.org/2000/svg"><path d="M15.163 3.147c.078-.153.144-.313.198-.48l.403-1.243-1.13.656c-.45.261-.92.458-1.425.582a3.37 3.37 0 0 0-2.245-.852 3.37 3.37 0 0 0-3.376 3.482A7.665 7.665 0 0 1 2.63 2.527l-.462-.57-.362.639a3.44 3.44 0 0 0-.45 1.694c0 .477.099.93.275 1.34l-.292-.168v.898c0 .85.313 1.624.831 2.214l-.047-.01.245.801a3.342 3.342 0 0 0 1.85 2.07 5.302 5.302 0 0 1-2.27.509c-.196 0-.415-.017-.636-.035l-.308.922a8.751 8.751 0 0 0 4.683 1.36c5.61 0 8.673-4.665 8.673-8.674V5.402a5.77 5.77 0 0 0 1.334-1.489l.893-1.427-1.424.66z"/></svg>',

			'wordpress'  => '<svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M12.158,12.786L9.46,20.625c0.806,0.237,1.657,0.366,2.54,0.366c1.047,0,2.051-0.181,2.986-0.51 c-0.024-0.038-0.046-0.079-0.065-0.124L12.158,12.786z M3.009,12c0,3.559,2.068,6.634,5.067,8.092L3.788,8.341 C3.289,9.459,3.009,10.696,3.009,12z M18.069,11.546c0-1.112-0.399-1.881-0.741-2.48c-0.456-0.741-0.883-1.368-0.883-2.109 c0-0.826,0.627-1.596,1.51-1.596c0.04,0,0.078,0.005,0.116,0.007C16.472,3.904,14.34,3.009,12,3.009 c-3.141,0-5.904,1.612-7.512,4.052c0.211,0.007,0.41,0.011,0.579,0.011c0.94,0,2.396-0.114,2.396-0.114 C7.947,6.93,8.004,7.642,7.52,7.699c0,0-0.487,0.057-1.029,0.085l3.274,9.739l1.968-5.901l-1.401-3.838 C9.848,7.756,9.389,7.699,9.389,7.699C8.904,7.67,8.961,6.93,9.446,6.958c0,0,1.484,0.114,2.368,0.114 c0.94,0,2.397-0.114,2.397-0.114c0.485-0.028,0.542,0.684,0.057,0.741c0,0-0.488,0.057-1.029,0.085l3.249,9.665l0.897-2.996 C17.841,13.284,18.069,12.316,18.069,11.546z M19.889,7.686c0.039,0.286,0.06,0.593,0.06,0.924c0,0.912-0.171,1.938-0.684,3.22 l-2.746,7.94c2.673-1.558,4.47-4.454,4.47-7.771C20.991,10.436,20.591,8.967,19.889,7.686z M12,22C6.486,22,2,17.514,2,12 C2,6.486,6.486,2,12,2c5.514,0,10,4.486,10,10C22,17.514,17.514,22,12,22z"></path></svg>',

		);

	}
endif;
