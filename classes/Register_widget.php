<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if(! class_exists( 'Register_widget' )) :

class Register_widget {

	public function footer_widgets()
	{
		// Arguments used in all register_sidebar() calls.
		$shared_args = array(
			'before_title'   => '<h6 class="site-footer__widget-title">',
			'after_title'    => '</h6>',
			'before_widget'  => '<div class="site-footer__widget %2$s">',
			'after_widget'   => '</div>',
			'before_sidebar' => '',
			'after_sidebar'  => '',
		);

		// Footer #1.
		register_sidebar(
			array_merge(
				$shared_args,
				array(
					'name'        => __( 'Footer 1', 'blueglass' ),
					'id'          => 'footer-sidebar-1',
					'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'blueglass' ),
				)
			)
		);

//		 Footer #2.
		register_sidebar(
			array_merge(
				$shared_args,
				array(
					'name'        => __( 'Footer 2', 'blueglass' ),
					'id'          => 'footer-sidebar-2',
					'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'blueglass' ),
				)
			)
		);
	}

	public function register_footer_widgets()
	{
		add_action( 'widgets_init', [$this, 'footer_widgets'] );
	}
}

endif;
