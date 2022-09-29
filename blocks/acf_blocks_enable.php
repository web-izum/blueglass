<?php
/**
 * ACF Gutenberg Block "Main Hero"
 */
if (!function_exists('register_acf_block_hero')) {

    function register_acf_block_hero()
    {

        acf_register_block_type(
            [
                'name'            => 'acf_block_hero',
                'title'           => __('Hero Block'),
                'description'     => __(''),
                'render_callback' => 'theme_acf_blocks_render_callback',
                'category'        => 'common',
                'icon'            => 'cover-image',
                'keywords'        => ['hero, slider'],
                'mode'            => 'edit',
                'enqueue_style' => get_template_directory_uri() . '/assets/dist/css/acf-block-hero.css',
                'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/acf-block-hero.js'
            ]
        );

    }

}

if (function_exists('register_acf_block_hero')) {
	add_action('acf/init', 'register_acf_block_hero');
}

/**
 * ACF Gutenberg Block "Proposal"
 */
if (!function_exists('register_acf_block_proposal')) {

	function register_acf_block_proposal()
	{

		acf_register_block_type(
			[
				'name'            => 'acf_block_proposal',
				'title'           => __('Proposal Block'),
				'description'     => __(''),
				'render_callback' => 'theme_acf_blocks_render_callback',
				'category'        => 'common',
				'icon'            => 'cover-image',
				'keywords'        => ['proposal'],
				'mode'            => 'edit',
				'enqueue_style' => get_template_directory_uri() . '/assets/dist/css/acf-block-proposal.css',
			]
		);

	}

}

if (function_exists('register_acf_block_proposal')) {
    add_action('acf/init', 'register_acf_block_proposal');
}

/**
 * ACF Gutenberg Block "FAQ"
 */
if (!function_exists('register_acf_block_faq')) {

	function register_acf_block_faq()
	{

		acf_register_block_type(
			[
				'name'            => 'acf_block_faq',
				'title'           => __('FAQ Block'),
				'description'     => __(''),
				'render_callback' => 'theme_acf_blocks_render_callback',
				'category'        => 'common',
				'icon'            => 'cover-image',
				'keywords'        => ['faq'],
				'mode'            => 'edit',
				'enqueue_style' => get_template_directory_uri() . '/assets/dist/css/acf-block-faq.css',
				'enqueue_script' => get_template_directory_uri() . '/assets/dist/js/acf-block-faq.js'
			]
		);

	}

}

if (function_exists('register_acf_block_faq')) {
	add_action('acf/init', 'register_acf_block_faq');
}

// ################################################################################################################## //
/**
 * Enable ACF Blocks render function
 */
if (!function_exists('theme_acf_blocks_render_callback')) {

    function theme_acf_blocks_render_callback($block)
    {

        $slug = str_replace('acf/', '', $block['name']);
        $slug = str_replace('acf-block-', '', $slug);

        if (file_exists(get_theme_file_path("/blocks/acf-block-{$slug}.php"))) {
            include(get_theme_file_path("/blocks/acf-block-{$slug}.php"));
        }

    }

}
 
