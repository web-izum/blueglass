<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if(! class_exists( 'Add_settings' )) :

class Add_settings {

	public function __construct() {}

	// Registering the field
	public function add_option_field_select_terms_conditions_page()
	{

		register_setting( 'reading', 'Select_Terms_Conditions' );

		add_settings_field(
			'select_terms_conditions',
			__('Select Terms Conditions Page', 'blueglass'),
			[$this, 'wpdocs_setting_callback_function'], //Function to Call
			'reading',
			'default',
			array(
				'id' => 'select_terms_conditions',
				'option_name' => 'Select_Terms_Conditions'
			)
		);
	}

	// Adding options to registered field
	// CallBack Function

	public function wpdocs_setting_callback_function($val) {
		$id = $val['id'];
		$option_name = $val['option_name'];
		printf(
		/* translators: %s: Select field to choose the page for posts. */
			wp_dropdown_pages(
				array(
					'name'              => $option_name,
					'echo'              => 0,
					'show_option_none'  => __( '&mdash; Select &mdash;' ),
					'option_none_value' => '0',
					'selected'          => get_option( $option_name ),
				)
			)
		);
	}

	public function init()
	{
		add_action( 'admin_menu', [$this, 'add_option_field_select_terms_conditions_page'] );
	}
}

endif;
